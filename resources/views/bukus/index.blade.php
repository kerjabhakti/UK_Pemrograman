<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem CRUD Buku</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background:#f5f7fa;
        }

        .navbar-brand{
            font-weight:bold;
        }

        .card{
            border:none;
            border-radius:15px;
            box-shadow:0 5px 20px rgba(0,0,0,.08);
        }

        .table th{
            vertical-align:middle;
            text-align:center;
        }

        .table td{
            vertical-align:middle;
        }

        .btn{
            border-radius:8px;
        }

        .page-title{
            font-weight:bold;
        }

        .badge-total{
            font-size:15px;
        }
    </style>

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">

    <div class="container">

        <a class="navbar-brand" href="#">
            📚 Sistem CRUD Buku
        </a>

    </div>

</nav>

<div class="container mt-5">

    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show">

            {{ session('success') }}

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert">
            </button>

        </div>

    @endif


    <div class="card">

        <div class="card-header bg-white">

            <div class="d-flex justify-content-between align-items-center">

                <div>

                    <h3 class="page-title mb-1">
                        📖 Daftar Buku
                    </h3>

                    <small class="text-muted">
                        Data buku yang tersimpan pada database.
                    </small>

                </div>

                <div>

                    <span class="badge bg-primary badge-total">
                        Total :
                        {{ count($bukus) }}
                    </span>

                </div>

            </div>

        </div>

        <div class="card-body">

            <div class="mb-3">

                <a href="{{ route('bukus.create') }}"
                   class="btn btn-success">

                    ➕ Tambah Buku

                </a>

            </div>

            <div class="table-responsive">

                <table class="table table-hover table-bordered align-middle">

                    <thead class="table-primary text-center">

                    <tr>

                        <th width="60">No</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th width="120">Tahun</th>
                        <th width="180">Aksi</th>

                    </tr>

                    </thead>

                    <tbody>

                    @forelse($bukus as $buku)

                        <tr>

                            <td class="text-center">
                                {{ $loop->iteration }}
                            </td>

                            <td>{{ $buku->judul }}</td>

                            <td>{{ $buku->penulis }}</td>

                            <td>{{ $buku->penerbit }}</td>

                            <td class="text-center">
                                {{ $buku->tahun_terbit }}
                            </td>

                            <td class="text-center">

                                <a
                                    href="{{ route('bukus.edit',$buku->id) }}"
                                    class="btn btn-warning btn-sm">

                                    ✏ Edit

                                </a>

                                <form
                                    action="{{ route('bukus.destroy',$buku->id) }}"
                                    method="POST"
                                    class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus data buku ini?')">

                                        🗑 Hapus

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="6" class="text-center py-4">

                                <h5>📚 Belum Ada Data Buku</h5>

                                <small class="text-muted">
                                    Silakan klik tombol
                                    <strong>Tambah Buku</strong>
                                    untuk menambahkan data.
                                </small>

                            </td>

                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>