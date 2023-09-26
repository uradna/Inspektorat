<div class="modal fade" id="pass" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"
    data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">
                    Ubah password admin
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true" id="disp"></button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" novalidate="" method="POST"
                    action="{{ route('superadmin.admin.password') }}">
                    @csrf
                    <input type="hidden" id="p-id" name="id">
                    <div class="row">
                        <div class="position-relative mb-2 col-md-12">
                            <div class="form-floating">
                                <x-input-float id="p-name" name="name" type="text" readonly disabled />
                                <x-label-float :value="__('Nama')" />
                            </div>
                        </div>

                        <div class="position-relative mb-2 col-md-12">
                            <div class="form-floating">
                                <x-input-float id="p-user" name="username" type="text" readonly disabled />
                                <x-label-float :value="__('Username')" />
                            </div>
                        </div>

                        <div class="position-relative mb-2 col-md-12">
                            <div class="form-floating">
                                <x-input-float id="p-pd" name="pd" type="text" readonly disabled />
                                <x-label-float :value="__('Perangkat daerah')" />
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
