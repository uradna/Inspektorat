<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"
    data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">
                    Tambah data pegawai
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true" id="dise"></button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" novalidate="" method="POST"
                    action="{{ route('superadmin.pegawai.add') }}">
                    @csrf

                    <div class="row">
                        <div class="position-relative mb-2 col-md-12">
                            <div class="form-floating">
                                <x-input-float :id="__('name')" type="text" required
                                    value="{{ old('name') ?? '' }}" />
                                <x-invalid :value=" __('Nama harus diisi')" />
                                <x-label-float :value="__('Nama Lengkap')" />
                            </div>
                        </div>

                        <div class="position-relative mb-2 col-md-12">
                            <div class="form-floating">
                                <x-input-float :id="__('nip')" type="text" pattern="[0-9]{18}" required
                                    value="{{ old('nip') ?? '' }}" />
                                <x-invalid :value=" __('NIP harus diisi dengan benar, 18 digit angka')" />
                                <x-label-float :value="__('NIP')" />
                            </div>
                        </div>

                        <div class="position-relative mb-2 col-md-12 form-floating">
                            <div class="form-floating">
                                @if (!empty($pd))
                                    <x-input-float :id="__('pd')" type="text" list="listPD" autocomplete="off"
                                        value="{{ $pd }}" readonly />
                                @else
                                    <x-input-float :id="__('pd')" type="text" list="listPD" autocomplete="off"
                                        value="{{ old('pd') }}" />
                                @endif

                                <x-invalid :value="__('Pilih perangkat daerah')" />
                                <x-label-float :value="__('Perangkat daerah')" />
                                <datalist id="listPD">
                                    @foreach (getPerangkat() as $n => $d)
                                        <option value="{{ $d->nama }}"></option>
                                    @endforeach
                                </datalist>
                            </div>
                        </div>
                        <div class="position-relative mb-2 col-md-12">
                            <small class="text-muted">
                                {{-- Nama dan NIP wajib di isi.<br> --}}
                                Password = NIP
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
