<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laporan Data Karyawan</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th, table td {
            border: 1px solid #cccccc;
            padding: 6px;
            text-align: center;
        }

        table thead {
            background-color: #eeeeee;
        }

        .status-aktif {
            color: green;
            font-weight: bold;
        }

        .status-nonaktif {
            color: red;
            font-weight: bold;
        }

        h1 {
            font-size: 16px;
            text-align: left;
            margin-bottom: 10px;
        }

        .footer {
            margin-top: 20px;
            font-size: 10px;
            text-align: right;
            color: gray;
        }
    </style>
</head>
<body>
    <h1>Laporan Data Karyawan<br>PT Seraya Makmur Indonesia</h1>

    <table>
        <thead>
            <tr>
                <th>ID Karyawan</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>No Telp</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($karyawann as $k): ?>
            <tr>
                <td><?= $k['id_karyawan'] ?></td>
                <td><?= $k['nama'] ?></td>
                <td><?= $k['alamat'] ?></td>
                <td><?= $k['no_telp'] ?></td>
                <td class="<?= $k['status'] == 'Aktif' ? 'status-aktif' : 'status-nonaktif' ?>">
                    <?= $k['status'] ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="footer">
        Dicetak pada: <?= date('d-m-Y H:i') ?>
    </div>
</body>
</html>
