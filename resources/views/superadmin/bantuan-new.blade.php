<x-superadminwide-layout>
    <x-slot name="style">
        <script src="{{ asset('js/ckeditor.js') }}"></script>
        <style>
            .ck.ck-content:not(.ck-comment__input *) {
                height: 300px;
                overflow-y: auto;
            }

            .ck-rounded-corners .ck.ck-editor__main>.ck-editor__editable {

                color: black !important;
            }

        </style>

    </x-slot>

    <x-slot name="title">
        {{ __('Dashboard Superadmin - Bantuan Baru') }}
    </x-slot>

    <x-slot name="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Bantuan Baru</li>
    </x-slot>

    <x-slot name="header">
        {{ __('Data Bantuan') }}
    </x-slot>

    <x-slot name="content">
        <div class="row">
            <div class="col-12">
                <div class="card ">
                    <div class=" card-body">
                        <h4 class="header-title mb-3">Buat Bantuan Baru
                        </h4>


                        <div class="modal-body">
                            <form class="needs-validation" novalidate="" method="POST"
                                action="{{ route('superadmin.help.create') }}">

                                <div>
                                    <a href="{{ url()->previous() }}" class="btn btn-secondary mb-1">
                                        <i class="uil-arrow-left"></i> Kembali
                                    </a>

                                    <button type="submit" class="btn btn-success mb-1 float-end">
                                        <i class="mdi mdi-content-save"></i> Simpan
                                    </button>
                                </div>
                                @csrf
                                {{-- <input type="hidden" name="id"> --}}

                                <div class="row">
                                    <div class="position-relative mb-2 col-md-9">
                                        <div class="form-floating">
                                            <x-input-float :id="__('judul')" type="text" class="xjudul" required />
                                            <x-invalid :value=" __('Judul harus diisi')" />
                                            <x-label-float :value="__('Judul / Pertanyaan')" />
                                        </div>
                                    </div>

                                    <div class="position-relative mb-2 col-md-3 form-floating">
                                        <div class="form-floating">
                                            <select class="form-select" id="floatingSelect"
                                                aria-label="Floating label select example" name="for">
                                                <option @if ($u == 'user') selected @endif value="user">User Pegawai</option>
                                                <option @if ($u == 'admin') selected @endif value="admin">User Admin</option>
                                                <option @if ($u == 'superadmin') selected @endif value="superadmin">User
                                                    Superadmin</option>
                                            </select>
                                            <label for="floatingSelect">Bantuan untuk</label>
                                        </div>
                                    </div>

                                    <div class="position-relative mb-2 col-md-12">
                                        <div class="">
                                            <textarea name="isi" id="isi" placeholder="Isi bantuan" required>

                                            </textarea>
                                        </div>
                                    </div>

                                </div>
                            </form>
                            <script>
                                // import {
                                //     ImageInsert
                                // } from '@ckeditor/ckeditor5-image';
                                ClassicEditor
                                    .create(document.querySelector('#isi'), {
                                        // removePlugins: ['Heading', 'Table', 'MediaEmbed', 'Indent'],
                                        // plugins: ['ImageInsert'],
                                        toolbar: ['bold', 'italic', '|', 'numberedList',
                                            'bulletedList', '|', 'blockQuote', 'link', '|', 'undo', 'redo',
                                            // 'insertImage', 'imageUpload'
                                            // 'imageUpload',
                                        ]
                                    })
                                    .catch(error => {
                                        console.error(error);
                                    });

                            </script>
                        </div>


                    </div>
                </div>
            </div>
        </div>


    </x-slot>

    <x-slot name="script">


    </x-slot>

</x-superadminwide-layout>
