<div class="modal fade" id="new" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">
                    Tambah jadwal baru
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"
                    id="disp"></button>
            </div>
            <div class="modal-body">
                <form class="needs-validation @if ($errors->any()) was-validated @endif" novalidate="" method="POST"
                    action="{{ route('superadmin.jadwal.create') }}">
                    @csrf

                    {{-- ----- --}}
                    <div class="row">
                        <div class="position-relative mb-2 col-md-6">
                            <div class="form-floating">
                                <x-input-float id="tahun" type="text" value="{{ $aktif->tahun_baru }}"
                                    pattern="\d{4}" required />
                                <x-invalid :value="__('Tahun harus diisi')" />
                                <x-label-float :value="__('Tahun')" />
                            </div>
                        </div>

                        <div class="position-relative mb-2 col-md-6">
                            <div class="form-floating">
                                <select class="form-select text-dark" name="semester" required>

                                    <option value="1" @if (old('semester') != null && old('pangkat') == 1) selected @elseif (old('pangkat') == null && $aktif->semester_baru == 1) selected @endif>
                                        1 (satu)
                                    </option>
                                    <option value="2" @if (old('semester') != null && old('pangkat') == 2) selected @elseif (old('pangkat') == null && $aktif->semester_baru == 2) selected @endif>
                                        2 (dua)
                                    </option>

                                </select>
                                <x-invalid :value="__('Semester harus dipilih')" />
                                <x-label-float :value="__('Semester')" />
                            </div>
                        </div>
                    </div>
                    {{-- ----- --}}
                    <div class="row ">
                        <div class="position-relative mb-2 col-md-12">
                            <div class="form-floating input-group input-group-merge">
                                <x-input-float :id="__('akhir')" type="date" min="{{ date('Y-m-d') }}"
                                    value="{{ old('akhir') ?? '' }}" required />
                                <x-invalid :value="__('Tanggal harus dipilih')" />
                                <x-label-float :value="__('Dibuka hingga')"
                                    style="z-index: 5 !important;" />
                            </div>
                        </div>
                    </div>

                    <div class="row g-2 mt-1">
                        <div class="col-md-12 text-end">
                            <button type="button" class="btn btn-lighter me-2"
                                data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-info">
                                SIMPAN
                            </button>
                        </div>
                    </div>
                    {{-- {{ dd($errors) }} --}}
                </form>
            </div>
        </div>
    </div>
</div>
