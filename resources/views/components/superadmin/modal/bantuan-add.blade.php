<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"
    data-bs-backdrop="static">
    {{--  --}}
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">
                    Tambah bantuan
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true" id="dise"></button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" novalidate="" method="POST"
                    action="{{ route('superadmin.help.create') }}">
                    @csrf
                    <input type="hidden" name="for" value="{{ $u }}">
                    <div class="row">
                        <div class="position-relative mb-2 col-md-12">
                            <div class="form-floating">
                                <x-input-float :id="__('judul')" type="text" required />
                                <x-invalid :value=" __('Judul harus diisi')" />
                                <x-label-float :value="__('Judul / Pertanyaan')" />
                            </div>
                        </div>

                        <div class="position-relative mb-2 col-md-12">
                            <div class="">
                                <textarea name="isi" id="isi" class="form-control" placeholder="Isi bantuan"></textarea>
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
                <script>
                    ClassicEditor
                        .create(document.querySelector('#isi'), {
                            removePlugins: ['Heading', 'Table', 'MediaEmbed', 'Indent'],
                        })
                        .catch(error => {
                            console.error(error);
                        });

                </script>
            </div>
        </div>
    </div>
</div>
