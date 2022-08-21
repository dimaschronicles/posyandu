<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <style>
        .header {
            text-align: center;
        }

        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <div class="header">
        <p>
            <span style="font-size: 18px;"><b>POSYANDU KAMBOJA</b></span><br>
            <span style="font-size: 13px;"><i>Desa Jatinegara RW03</i></span>
        </p>
        <hr style="line-height: 2;">
    </div>

    <div class="content">
        <div class="header">
            <h3>Laporan Pemeriksaan Ibu Hamil</h3>
        </div>
        <div class="tanggal">
            <p style="font-size: 14px;">
                Petugas : <?= session('nama'); ?><br>
                Mulai Tanggal : <?= @$_GET['tanggal_dari']; ?><br>
                Sampai Tanggal : <?= @$_GET['tanggal_sampai']; ?>
            </p>
        </div>
        <div class="data-obat">
            <table style="width: 100%; text-align: center;">
                <tr>
                    <th style="width: 5%;">No</th>
                    <th>Nama</th>
                    <th>Usia Kandungan</th>
                    <th>Berat Badan</th>
                    <th>Lingkar Lengan</th>
                    <th>Tinggi Fundus</th>
                    <th>Keterangan</th>
                </tr>
                <?php
                $i = 1;
                foreach ($periksaIbu as $value) : ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $value['nama_ibu']; ?></td>
                        <td><?= $value['uk_periksa_ibu']; ?></td>
                        <td><?= $value['bb_periksa_ibu']; ?></td>
                        <td><?= $value['lila_periksa_ibu']; ?></td>
                        <td><?= $value['tfundus_periksa_ibu']; ?></td>
                        <td><?= $value['keterangan_periksa_ibu']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <div class="ttd">

        </div>
    </div>

    <script type="text/javascript">
        var css = '@page { size: landscape; }',
            head = document.head || document.getElementsByTagName('head')[0],
            style = document.createElement('style');

        style.type = 'text/css';
        style.media = 'print';

        if (style.styleSheet) {
            style.styleSheet.cssText = css;
        } else {
            style.appendChild(document.createTextNode(css));
        }

        head.appendChild(style);
        window.print();
        window.onafterprint = window.close;
    </script>
</body>

</html>