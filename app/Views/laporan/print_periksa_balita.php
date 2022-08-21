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
            <h3>Laporan Pemeriksaan Balita</h3>
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
                    <th>Nama Balita</th>
                    <th>Jenis Kelamin</th>
                    <th>Tinggi Badan</th>
                    <th>Berat Badan</th>
                    <th>Lingkar Kepala</th>
                    <th>Keterangan</th>
                </tr>
                <?php
                $i = 1;
                foreach ($periksaBalita as $value) : ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $value['nama_balita']; ?></td>
                        <td><?= $value['jk_balita']; ?></td>
                        <td><?= $value['tb_periksa']; ?></td>
                        <td><?= $value['bb_periksa']; ?></td>
                        <td><?= $value['lk_periksa']; ?></td>
                        <td><?= $value['keterangan_periksa']; ?></td>
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