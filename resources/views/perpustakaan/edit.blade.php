<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Halaman Edit Data</title>
</head>

<body>
    <form action="{{ route('perpustakaan.update', $Perpustakaan->id) }}" method="POST" class="p-3 m-3 align-center">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @csrf
        @method('PUT')
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Nama</span>
            <input type="text" class="form-control" aria-label="Username"
                aria-describedby="basic-addon1" name="nama" value="{{ $Perpustakaan->nama }}">
        </div>
    
        <div class="input-group mb-3">
            <span class="input-group-text">Alamat</span>
            <input type="text" class="form-control" aria-label="Alamat" name="alamat" value="{{ $Perpustakaan->alamat }}"></input>
        </div>
    
        <div class="input-group mb-3">
            <span class="input-group-text">Buku</span>
            <input type="text" class="form-control" aria-label="Sebutkan buku yang akan dipinjam" name="buku" value="{{ $Perpustakaan->buku }}"></input>
        </div>
        <div class="input-group justify-content-even">
            <button class="btn btn-md btn-warning" type="submit">Kirim</button>
            <a href="{{ route('perpustakaan.index') }}" class="btn btn-md btn-warning btn-icon">Kembali</a>
        </div>
    </form>
</body>

</html>