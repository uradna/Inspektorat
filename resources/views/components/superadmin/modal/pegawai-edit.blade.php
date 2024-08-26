<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"
    data-bs-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">
                    Ubah data pegawai
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true" id="dise"></button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" novalidate="" method="POST"
                    action="{{ route('superadmin.pegawai.edit') }}">
                    @csrf
                    <input type="hidden" class="e-id" name="id" value="">
                    <div class="row">
                        <div class="position-relative mb-2 col-md-6">
                            <div class="form-floating">
                                <x-input-float :id="__('name')" type="text" class="e-name" required />
                                <x-invalid :value="__('Nama harus diisi')" />
                                <x-label-float :value="__('Nama Lengkap')" />
                            </div>
                        </div>

                        <div class="position-relative mb-2 col-md-6">
                            <div class="form-floating">
                                <x-input-float type="text" class="e-nip" readonly disabled />
                                <x-label-float :value="__('NIP')" />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="position-relative mb-2 col-md-6 form-floating">
                            <div class="form-floating">
                                <x-input-float :id="__('email')" type="email" class="e-email" required />
                                <x-invalid :value="__('Masukkan alamat email yang benar')" />
                                <x-label-float :value="__('Alamat email')" />
                            </div>
                        </div>

                        <div class="position-relative mb-2 col-md-6">
                            <div class="form-floating">
                                <x-input-float :id="__('phone')" type="text" pattern="[0-9]{8,14}" class="e-phone"
                                    required />
                                <x-invalid :value="__('Masukkan nomor HP yang benar, angka tanpa spasi')" />
                                <x-label-float :value="__('Nomor HP / WA')" />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="position-relative mb-2 col-md-6 form-floating">
                            <div class="form-floating">
                                <x-input-float :id="__('pd')" type="text" class="e-pd" required list="listPD"
                                    autocomplete="off" />
                                <x-invalid :value="__('Pilih perangkat daerah')" />
                                <x-label-float :value="__('Perangkat daerah')" />
                                <datalist id="listPD">
                                    @foreach (getPerangkat() as $n => $d)
                                        <option value="{{ $d->nama }}"></option>
                                    @endforeach
                                </datalist>
                            </div>
                        </div>

                        <div class="position-relative mb-2 col-md-6">
                            <div class="form-floating">
                                <x-input-float :id="__('satker')" type="text" class="e-satker" />
                                <x-invalid :value="__('Masukkan satker / Unit kerja')" />
                                <x-label-float :value="__('Satker / Unit kerja')" />
                            </div>
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
