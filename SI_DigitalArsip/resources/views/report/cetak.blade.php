<html>

<head>
    <title>Rekap Berkas</title>
    <style type="text/css">
         body {
            font-family: arial;
            background-color: #fff;
        }

        .rangkasurat {
            width: 980px;
            margin: 0 auto;
            background-color: #fff;
            height: 500px;
            padding: 20px;
        }

        table {
            width: 100%; /* Agar tabel menyesuaikan lebar parent (rangkasurat) */
            border-bottom: 5px solid #000;
            padding: 2px;
            margin: 0 auto; /* Tengahkan tabel */
        }

        .tengah {
            text-align: center;
            line-height: 5px;
        }

    </style>
</head>

<body>
    <div class="rangkasurat">
        <table width="100%">
            <tr>
                <td>
                    <img src="https://www.unsur.ac.id/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Flogo-unsur.f2e3bf9b.png&w=1920&q=75"width="140px" />
                </td>
                <td class="tengah">
                    <h1>LAPORAN REKAP BERKAS</h1>
                    <h1>UNIVERSITAS SURYAKANCANA</h1>
                    <b>
                        Jl. Pasir Gede Raya no 13 Bojongherang Kec. Cianjur
                        Kab. Cianjur Prop. Jawa Barat 43216</b>
                </td>
            </tr>
        </table>

        <div class="container mt-4">
            <div class="text-center">
                <p class="mb-4">Dibuat pada tanggal: {{ now() }}</p>
            </div>
            <div style="align-content: center; align-self: center">
                <table border="1" cellspacing="0" cellpadding="5">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Berkas</th>
                            <th scope="col">Standarisasi</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Sub-Kategori</th>

                            <th scope="col">Nama Staff</th>
                            <th scope="col">Tanggal Berkas Masuk</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $key => $berkas)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $berkas->NamaBerkas }}</td>
                            <td>{{ $berkas->nama_standarisasi }}</td>
                            <td>{{ $berkas->Nama_Kategori }}</td>
                            <td>{{ $berkas->Nama_SubKategori }}</td>

                            <td>{{ $berkas->nama_staff }}</td>
                            <td>{{ $berkas->created_at }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
