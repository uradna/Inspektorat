<x-admin-layout>
    <x-slot name="title">
        {{ __('Gratifikasi Online - Bantuan') }}
    </x-slot>

    <x-slot name="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Bantuan</li>
    </x-slot>

    <x-slot name="header">
        {{ __('Bantuan - Admin') }}
    </x-slot>

    <x-slot name="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class=" card-body">
                        <h4 class="header-title mb-3">Frequently Asked Questions</h4>
                        {{-- {{ dd($data) }} --}}
                        <div class="accordion accordion-flush" id="accordionBantuan">
                            {{-- @php($i = 1) --}}
                            @foreach ($data as $d)
                                <div class="accordion-item">{{-- START --}}
                                    <h2 class="accordion-header" id="heading_{{ $d->id }}">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#item_{{ $d->id }}"
                                            aria-expanded="false" aria-controls="item_{{ $d->id }}">
                                            <strong> {{ $d->judul }} </strong>
                                        </button>
                                    </h2>
                                    <div id="item_{{ $d->id }}" class="accordion-collapse collapse"
                                        aria-labelledby="heading_1" data-bs-parent="#accordionBantuan">
                                        <div class="accordion-body">
                                            {!! $d->isi !!}
                                        </div>
                                    </div>
                                </div>{{-- END --}}
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    <x-slot name="script"></x-slot>
</x-admin-layout>
