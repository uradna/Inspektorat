<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"
    data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">
                    Tambah data admin
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true" id="dise"></button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" novalidate="" method="POST"
                    action="{{ route('superadmin.admin.add') }}">
                    @csrf

                    <div class="row">
                        <div class="position-relative mb-2 col-md-12">
                            <div class="form-floating">
                                <x-input-float :id="__('name')" type="text" required
                                    value="{{ old('name') ?? '' }}" />
                                <x-invalid :value=" __('Nama harus diisi')" />
                                <x-label-float :value="__('Nama')" />
                            </div>
                        </div>

                        <div class="position-relative mb-2 col-md-12">
                            <div class="form-floating">
                                <x-input-float :id="__('username')" type="text" required
                                    value="{{ old('username') ?? '' }}" />
                                <x-invalid :value=" __('Username harus diisi')" />
                                <x-label-float :value="__('Username')" />
                            </div>
                        </div>

                        <div class="position-relative mb-2 col-md-12 form-floating">
                            <div class="form-floating">
                                <x-input-float :id="__('pd')" type="text" list="listPD" autocomplete="off"
                                    value="{{ old('pd') }}" required />
                                <x-invalid :value="__('Pilih perangkat daerah')" />
                                <x-label-float :value="__('Perangkat daerah')" />
                                <datalist id="listPD">
                                    @foreach (getPerangkat() as $n => $d)
                                        <option value="{{ $d->nama }}"></option>
                                    @endforeach
                                </datalist>
                            </div>
                        </div>
                        <div class="position-relative mb-2 col-md-12 form-floating">
                            <div class="form-floating">
                                <select class="form-select" id="floatingSelect"
                                    aria-label="Floating label select example" name="level">
                                    <option selected>Open this select menu</option>
                                    <option value="1">Admin Perangkat Daerah</option>
                                    <option value="2">Superadmin</option>
                                </select>
                                <label for="floatingSelect">Hak akses</label>
                            </div>
                        </div>


                        <div class="position-relative mb-2 col-md-12">
                            <div class="form-floating input-group input-group-merge">
                                <x-input-float :id="__('password')" type="password" required />
                                <div class="input-group-text" data-password="false">
                                    <span class="password-eye"></span>
                                </div>
                                <x-invalid :value="__('Password harus diisi, minimal 8 karakter')" />
                                <x-label-float :value="__('Password baru')" style="z-index: 5 !important;" />
                            </div>
                        </div>



                        <div class="position-relative mb-2 col-md-12">
                            <small class="text-muted">
                                {{-- Nama dan NIP wajib di isi.<br> --}}
                                {{-- Password = NIP --}}
                            </small>
                        </div>
                    </div>




                    <div class="row g-2">
                        <div class="col-md-12 text-end">
                            <button type="button" class="btn btn-lighter me-2" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-info">
                                SIMPAN
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
