<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>

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

        .form-label{
            font-weight:600;
        }

        .btn{
            border-radius:8px;
        }
    </style>

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">

    <div class="container">

        <a class="navbar-brand" href="{{ route('bukus.index') }}">
            📚 Sistem CRUD Buku
        </a>

    </div>

</nav>

<div class="container mt-5">

    <div class="card">

        <div class="card-header bg-white">

            <h3 class="mb-1">
                ✏ Edit Buku
            </h3>

            <small class="text-muted">
                Perbarui informasi buku yang dipilih.
            </small>

        </div>

        <div class="card-body">

            @if ($errors->any())

                <div class="alert alert-danger">

                    <strong>Terjadi kesalahan!</strong>

                    <ul class="mb-0 mt-2">

                        @foreach ($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif

            <form action="{{ route('bukus.update', $buku->id) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="mb-3">

                    <label class="form-label">Judul Buku</label>

                    <input
                        type="text"
                        name="judul"
                        class="form-control"
                        value="{{ old('judul', $buku->judul) }}"
                        placeholder="Masukkan judul buku">

                </div>

                <div class="mb-3">

                    <label class="form-label">Penulis</label>

                    <input
                        type="text"
                        name="penulis"
                        class="form-control"
                        value="{{ old('penulis', $buku->penulis) }}"
                        placeholder="Masukkan nama penulis">

                </div>

                <div class="mb-3">

                    <label class="form-label">Penerbit</label>

                    <input
                        type="text"
                        name="penerbit"
                        class="form-control"
                        value="{{ old('penerbit', $buku->penerbit) }}"
                        placeholder="Masukkan nama penerbit">

                </div>

                <div class="mb-4">

                    <label class="form-label">Tahun Terbit</label>

                    <input
                        type="number"
                        name="tahun_terbit"
                        class="form-control"
                        value="{{ old('tahun_terbit', $buku->tahun_terbit) }}"
                        placeholder="Contoh: 2025">

                </div>

                <div class="d-flex justify-content-between">

                    <a href="{{ route('bukus.index') }}"
                       class="btn btn-secondary">

                        ← Kembali

                    </a>

                    <button
                        type="submit"
                        class="btn btn-warning">

                        💾 Update Buku

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>