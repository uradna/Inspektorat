<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">
                    Edit jadwal
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"
                    id="disp"></button>
            </div>

            <div class="modal-body">
                <form class="needs-validation @if ($errors->any()) was-validated @endif" novalidate="" method="POST"
                    action="{{ route('superadmin.jadwal.edit') }}">
                    @csrf
                    <input type="hidden" name="id" id="e-id">
                    {{-- ----- --}}
                    <div class="row">
                        <div class="position-relative mb-2 col-md-6">
                            <div class="form-floating">
                                <x-input-float type="text" id="etahun"
                                    value="{{ old('etahun') ?? '' }}" readonly />
                                <x-label-float :value="__('Tahun')" />
                            </div>
                        </div>

                        <div class="position-relative mb-2 col-md-6">
                            <div class="form-floating">
                                <x-input-float type="text" id="esemester"
                                    value="{{ old('esemester') ?? '' }}" readonly />
                                <x-label-float :value="__('Semester')" />
                            </div>
                        </div>
                    </div>
                    {{-- ----- --}}
                    <div class="row ">
                        <div class="position-relative mb-2 col-md-12">
                            <div class="form-floating input-group input-group-merge">
                                <x-input-float :id="__('eakhir')" type="date" min="{{ date('Y-m-d') }}"
                                    value="{{ old('eakhir') ?? '' }}" required />
                                <x-invalid :value="__('Tanggal harus dipilih, tidak boleh hari ini.')" />
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
