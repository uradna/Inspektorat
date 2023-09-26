<div class="modal fade" id="del" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"
    data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">
                    Hapus data pegawai
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true" id="disd"></button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" novalidate="" method="POST"
                    action="{{ route('superadmin.pegawai.delete') }}">
                    @csrf
                    <input type="hidden" class="d-id" name="user_id">
                    <div class="row">
                        <div class="position-relative mb-2 col-md-12">
                            <div class="form-floating">
                                <x-input-float :id="__('name')" type="text" class="d-name" readonly disabled />
                                <x-label-float :value="__('Nama Lengkap')" />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="position-relative mb-2 col-md-12">
                            <div class="form-floating">
                                <x-input-float :id="__('nip')" type="text" class="d-nip" readonly disabled />
                                <x-label-float :value="__('NIP')" />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="position-relative mb-2 col-md-12">
                            <div class="form-floating">
                                <x-input-float :id="__('alasan')" type="text" class="bg-white" required />
                                <x-invalid :value="__('Masukkan alasan penghapusan user')" />
                                <x-label-float :value="__('Alasan')" />
                            </div>
                        </div>
                    </div>

                    <div class="row ">
                        <div class="position-relative mb-2 col-md-12">
                            {{-- <div class="form-floating mb-1">
                                <x-input-float :id="__('file')" type="file" value=""
                                    class="file-custom form-control-sm d-file" accept=".pdf" required />
                                <x-invalid :value="__('Masukkan dokumen')" />
                                <x-label-float :value="__('Dokumen pendukung')" />
                            </div>
                            <small class="text-muted">Upload scan dokumen pendukung, seperti SK, dalam bentuk
                                file PDF.</small><br> --}}
                            {{-- <hr> --}}
                            <small class="text-muted">Fitur ini untuk pegawai yang <b>pensiun</b>,
                                <b>meninggal dunia</b> atau <b>mutasi ke luar daerah</b>.</small> <br>
                            <small class="text-muted">Untuk pegawai yang mutasi antar perangkat daerah, gunakan
                                fitur <b>Edit</b>.</small><br>
                        </div>
                    </div>
                    <div class="row g-2 mt-1">
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
