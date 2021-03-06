@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row m-1">
                            <div class="col-md-6">
                                <h3>Data Kategori</h3>
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#tambahData">
                                    <i class="fas fa-plus"></i>
                                    Tambah
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-striped table-bordered" id="data">
                            <thead>
                                <tr class="text-center">
                                    <th>Nama</th>
                                    <th>Slug</th>
                                    <th>Endpoint</th>
                                    <th width="10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->slug }}</td>
                                        <td>{{ $category->endpoint }}</td>
                                        <td class="text-center">
                                            <button class="btn btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#editData" onclick="ubahData(`{{ $category }}`)">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <form class="d-inline" action="{{ route('kategori.destroy', $category->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="button"
                                                    onclick="fungsiHapus(this.form)">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="tambahData" tabindex="-1" aria-labelledby="tambahDataLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahDataLabel">Tambah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('kategori.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nama">
                        </div>
                        <div class="mb-3">
                            <label for="endpoint" class="form-label">Endpoint</label>
                            <input type="text" class="form-control" id="endpoint" name="endpoint"
                                placeholder="/movie/lates">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editData" tabindex="-1" aria-labelledby="editDataLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editDataLabel">Ubah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nama">
                        </div>
                        <div class="mb-3">
                            <label for="endpoint" class="form-label">Endpoint</label>
                            <input type="text" class="form-control" id="endpoint" name="endpoint"
                                placeholder="/movie/lates">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(function() {
            $('#data').DataTable({
                processing: true,
                serverSide: false,
                responsive: true,
                order: []
            });
        });

        function ubahData(data) {
            var data = JSON.parse(data);
            $('#editData form').attr('action', `{{ url('/admin/kategori') }}/${data.id}`);
            $('#editData form input[name="name"]').val(data.name);
            $('#editData form input[name="endpoint"]').val(data.endpoint);
        }
    </script>
@endsection
