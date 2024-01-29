<?php

namespace App\Http\Requests\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

use App\Models\User;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ];
    }

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function authenticate()
    {
        $this->ensureIsNotRateLimited();

        // if (user not exist)
        // {
        //     if(login hebat true){
        //         create user
        //     }
        // }

        // if (user exist){
        //     if(pass md5)
        //     reset password
        // }

        // if(user aktif)



        $count = DB::table('users')->where('username', $this->username)->count();

        //new cpns/user

        //reset password md5 -> bcrypt
        if ($count == 1) {
            $user = DB::table('users')->where('username', $this->username)->first();
            if ($user->password == md5($this->password)) {
                $p = Hash::make($this->password);
                $update = DB::table('users')->where('username', $this->username)->update(['password' => $p]);
                $this->password = $p;
            }
            if (! $user->aktif) {
                $del = DB::table('hapuses')->where('user_id', $user->id)->count();
                if($del == 0) {
                    $update = DB::table('users')->where('username', $this->username)->update(['aktif' => '1']);
                }
            }

            if (! User::where('username', $this->username)->first()->aktif) {
                RateLimiter::hit($this->throttleKey());

                throw ValidationException::withMessages([
                    'email' => __('auth.failed'),
                ]);
            }

            $response = Http::asForm()->post('https://simashebat.ponorogo.go.id/simple-login-api.php', [
                'username' => $this->username,
                'password' => $this->password,]);
            $result = json_decode($response->getBody()->getContents());
            if($result != null) {
                if ($result->success) {
                    $p = Hash::make($this->password);
                    $update = DB::table('users')->where('username', $this->username)->update(['password' => $p]);
                    $this->password = $p;
                }
            }
        }

        if ($count == 0) {
            $response = Http::asForm()->post('https://simashebat.ponorogo.go.id/simple-login-api.php', [
                        'username' => $this->username,
                        'password' => $this->password,]);
            $result = json_decode($response->getBody()->getContents());
            if($result != null) {
                if ($result->success) {
                    $new['username'] = $result->data->nip_baru;
                    $new['password'] = Hash::make($this->password);
                    $new['name'] = ucwords(strtolower($result->data->nama));
                    $new['nip'] = $result->data->nip_baru;
                    $new['email'] = $result->data->email;
                    $new['phone'] = $result->data->no_hp;
                    User::create($new);
                }
            } else {
                if (! Auth::attempt($this->only('username', 'password'), $this->boolean('remember'))) {
                    RateLimiter::hit($this->throttleKey());

                    throw ValidationException::withMessages([
                        'email' => __('auth.api'),
                    ]);
                }
            }

        }

        if (! Auth::attempt($this->only('username', 'password'), $this->boolean('remember'))) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }

        RateLimiter::clear($this->throttleKey());
    }

    /**
     * Ensure the login request is not rate limited.
     *
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensureIsNotRateLimited()
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the rate limiting throttle key for the request.
     *
     * @return string
     */
    public function throttleKey()
    {
        return Str::lower($this->input('email')) . '|' . $this->ip();
    }
}
