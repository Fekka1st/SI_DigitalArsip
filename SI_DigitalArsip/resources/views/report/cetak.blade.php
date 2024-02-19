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
        .text-right {
            text-align: right;
        }

        .mt-5 {
            margin-top: 10%;
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
                <p class="mb-4">Hal: Laporan Berkas </p>
            </div>
            <div style="align-content: center; align-self: center">
                <table border="1" cellspacing="0" cellpadding="5">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Standar</th>
                            <th scope="col">Jumlah Berkas</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $key => $berkas)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $berkas->nama_standarisasi }}</td>
                            <td>{{ $berkas->jumlah_berkas }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="text-right mt-5">

                <p>Cianjur, {{ now()->format('d F Y') }}</p>
                <br><br>
                <p>(Tanda tangan)</p>
                <p>{{$namaUser}}</p>
            </div>
        </div>
    </div>
    <script type="text/php">
        if ( isset($pdf) ) {
            $pdf->page_script('
                if ($PAGE_COUNT > 1) {
                    $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal", 10);
                    $size = 12;
                    $pageText = "Halaman " . $PAGE_NUM ;
                    $y = 550;
                    $x = 420;
                    $pdf->text($x, $y, $pageText, $font, $size);
                }
            ');
        }
    </script>
</body>

</html>
