<div class="modal fade" id="new" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"
    data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">
                    Tambah banner baru
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true" id="disp"></button>
            </div>
            <div class="modal-body">
                <form id="newform" class="needs-validation" novalidate="" method="POST"
                    action="{{ route('superadmin.banner.create') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="position-relative mb-2 col-md-12">
                            <div class="form-floating">
                                <x-input-float :id="__('time')" type="text" class="bg-white" value="5" required />
                                <x-label-float :value="__('Waktu tayang*')" />
                            </div>
                        </div>
                    </div>

                    <div class="row ">
                        <div class="position-relative mb-2 col-md-12">
                            <div class="form-floating mb-1">
                                <x-input-float :id="__('img')" type="file" value=""
                                    class="file-custom form-control-sm d-file" accept="image/png, image/jpeg"
                                    required />
                                <x-invalid :value="__('Masukkan gambar, .png atau .jpg')" />
                                <x-label-float :value="__('File')" />
                            </div>
                            <small class="text-muted">Hanya mendukung file .png atau .jpg.<br>* Default 5
                                detik</small>

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
