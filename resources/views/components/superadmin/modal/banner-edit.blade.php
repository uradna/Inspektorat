<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"
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
                <form class="needs-validation" novalidate="" method="POST"
                    action="{{ route('superadmin.banner.edit') }}">
                    @csrf
                    <input type="hidden" name="id" id="idx">
                    <div class="row">
                        <div class="position-relative mb-2 col-md-12">
                            <div class="form-floating">
                                <x-input-float :id="__('namafile')" type="text" class="bg-white timex" readonly
                                    disabled />
                                <x-label-float :value="__('File')" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="position-relative mb-2 col-md-12">
                            <div class="form-floating">
                                <select class="form-select" name="aktif" id="aktif">
                                    <option value="1">Ya</option>
                                    <option value="0">Tidak</option>
                                </select>
                                <x-invalid :value="__('Pilih salah satu')" />
                                <label for="floatingSelect">Tampilkan</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="position-relative mb-2 col-md-12">
                            <div class="form-floating">
                                <x-input-float :id="__('time')" type="text" class="bg-white timex" required />
                                <x-invalid :value="__('Harus diisi, angka dalam detik')" />
                                <x-label-float :value="__('Waktu tayang')" />
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
