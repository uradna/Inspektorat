<div class="modal fade" id="search" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"
    data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">
                    Pencarian Pegawai
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true" id="disp"></button>
            </div>

            <div class="modal-body">
                <form class="needs-validation @if ($errors->any()) was-validated @endif" novalidate="" method="GET"
                    action="{{ route('superadmin.pegawai.search') }}">
                    <div class="row ">
                        <div class="position-relative mb-2 col-md-12">
                            <div class="form-floating input-group input-group-merge">
                                <x-input-float :id="__('name')" type="text" value="" onkeyup="success()"
                                    onkeydown="onlyName()" />
                                <x-invalid :value="__('Masukkan nama pegawai')" />
                                <x-label-float :value="__('Nama Pegawai')" style="z-index: 5 !important;" />
                            </div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="position-relative mb-2 col-md-12">
                            <div class="form-floating input-group input-group-merge">
                                <x-input-float :id="__('nip')" type="text" value="" pattern="[0-9]{0,18}"
                                    onkeyup="success()" onkeydown="onlyNip()" />
                                <x-invalid :value="__('Harus angka, tanpa spasi, maksimal 18 digit')" />
                                <x-label-float :value="__('NIP')" style="z-index: 5 !important;" />
                            </div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="position-relative mb-2 col-md-12 text-muted">
                            Isi salah satu.
                        </div>
                    </div>
                    @csrf
                    <div class="row g-2 mt-1">
                        <div class="col-md-12 text-end">
                            <button type="submit" class="btn btn-info" id="cari" disabled>
                                CARI
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
