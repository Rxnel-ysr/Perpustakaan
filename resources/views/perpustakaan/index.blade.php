<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Perpustakaan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #333;
            color: white;
            padding: 15px 0;
            text-align: center;
        }

        nav {
            display: flex;
            justify-content: center;
            background-color: #444;
            padding: 10px 0;
        }

        nav a {
            color: white;
            text-decoration: none;
            padding: 14px 20px;
            margin: 0 10px;
            background-color: #555;
            border-radius: 4px;
        }

        nav a:hover {
            background-color: #666;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .content {
            text-align: center;
            padding: 20px;
        }

        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>

<body>

    <header>
        <h1>Perpustakaan</h1>
    </header>

    <div class="container-lg">
        <div class="content">
            <h2>Data peminjam</h2>
            <p>Data peminjam buku di perpustakaan.</p>
        </div>
    </div>
    <div class="container-lg p-3" id="Perpustakaan">
        <div class="menu d-sm-flex justify-content-between mx-auto">
            <h3>Data peminjam</h3>
            <div class="btn">
                <a href="{{ route('perpustakaan.create') }}" class="btn btn-warning btn-sm">Tambah data</a>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Buku</th>
                    <th scope="col">Waktu Dipinjam</th>
                    <th scope="col"> Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($Perpustakaans as $Perpustakaan)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td scope="row">{{ $Perpustakaan->nama }}</td>
                    <td scope="row">{{ $Perpustakaan->alamat }}</td>
                    <td scope="row">{{ $Perpustakaan->buku }}</td>
                    <td scope="row">{{ $Perpustakaan->waktu }}</td>
                    <td scope="row">
                        <div class="d-flex">
                            <a href="{{ route('perpustakaan.edit', $Perpustakaan->id) }}" class="btn btn-warning me-3">Edit</a>
                            <form action="{{ route('perpustakaan.destroy', $Perpustakaan->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <p>Data kosong</p>
                @endforelse
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if ($messages = Session::get('success'))
    <script>
        Swal.fire({
            title: "Success!",
            text: "Data berhasil dibuat!",
            icon: "success",
            conf
            });
    </script>
    @endif

    <footer>
        <p>&copy; Perpustakaan.</p>
    </footer>
</body>

</html>