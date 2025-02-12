@extends('layouts.app-admin')
@section('title', 'Kategori')

@push('css')
    {{-- CSS Only For This Page --}}
    <link rel="stylesheet" href="{{ asset('vendor/DataTables/datatables.min.css') }}">
@endpush

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h4 class="card-title">Data Kategori</h4>
                        </div>
                        <button class="btn btn-success" data-toggle="modal" data-target="#addKategoriModal"><i
                                class="fa-regular fa-plus"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered w-100" id="table-1">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th>Nama</th>
                                <th>Deskripsi</th>
                                <th class="text-center">Ikon</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kategori as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ Str::limit($item->deskripsi, 50) ?? '-' }}</td>
                                    @if ($item->icon)
                                        <td class="text-center">
                                            <img src="{{ asset('storage/' . $item->icon) }}" alt="icon" width="50">
                                        </td>
                                    @else
                                        <td class="text-center">-</td>
                                    @endif
                                    <td>
                                        <button onclick="edit('{{ $item->id }}')" class="btn btn-primary"><i
                                                class="fa-regular fa-edit"></i></button>
                                        <a href="{{ route('admin.kategori.delete', $item->id) }}" class="btn btn-danger" data-confirm-delete="true">
                                            <i class="fa-regular fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addKategoriModal" tabindex="-1" role="dialog" aria-labelledby="addKategoriModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addKategoriModalLabel">Tambah Kategori</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{ route('admin.kategori.store') }}" method="POST" class="form-with-loading"
                    enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama Kategori</label>
                            <input type="text" class="form-control" name="nama" id="nama"
                                placeholder="Masukkan nama kategori" required>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi Kategori</label>
                            <textarea name="deskripsi" id="deskripsi" cols="10" rows="5" class="form-control"
                                placeholder="Masukan deskripsi kategori"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="icon">Ikon Kategori</label>
                            <input type="file" class="form-control" name="icon" id="icon"
                                placeholder="Masukkan ikon">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-link" type="button" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success btn-loading">
                            <span class="btn-text">Tambah</span>
                            <span class="spinner-border spinner-border-sm d-none" role="status"></span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editKategoriModal" tabindex="-1" role="dialog" aria-labelledby="editKategoriModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editKategoriModalLabel">Tambah Kategori</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="" method="POST" class="form-with-loading" enctype="multipart/form-data"
                    id="editForm">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label for="editKategoriNama">Nama Kategori</label>
                            <input type="text" class="form-control" name="nama" id="editKategoriNama"
                                placeholder="Masukkan nama kategori" required>
                        </div>
                        <div class="form-group">
                            <label for="editKategoriDeskripsi">Deskripsi Kategori</label>
                            <textarea name="deskripsi" id="editKategoriDeskripsi" cols="10" rows="5" class="form-control"
                                placeholder="Masukan deskripsi kategori"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="icon">Ikon Kategori</label>
                            <input type="file" class="form-control" name="icon" id="icon"
                                placeholder="Masukkan ikon">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-link" type="button" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success btn-loading">
                            <span class="btn-text">Tambah</span>
                            <span class="spinner-border spinner-border-sm d-none" role="status"></span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('js')
    {{-- JS Only For This Page --}}
    <script src="{{ asset('vendor/DataTables/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#table-1').DataTable({
                responsive: true
            });
        });
    </script>
    <script>
        const edit = (id) => {
            const editUrl = `{{ route('admin.kategori.store', ':id') }}`

            $.getJSON(`${window.location.origin}/admin/kategori/data/${id}`, (data) => {
                $('#editForm').attr('action', editUrl.replace(':id', id))

                $('#editKategoriNama').val(data.nama)
                $('#editKategoriDeskripsi').val(data.deskripsi)
            })

            const myModal = new bootstrap.Modal(document.getElementById('editKategoriModal'))
            myModal.show()
        }
    </script>
@endpush
