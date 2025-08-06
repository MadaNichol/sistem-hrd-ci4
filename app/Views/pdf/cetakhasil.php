<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cetak Hasil</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            font-size: 14px;
            line-height: 1.6;
            background-color: #fff;
            color: #000;
            padding: 2.5rem;
        }

        .text-center {
            text-align: center;
        }

        .font-bold {
            font-weight: bold;
        }

        .uppercase {
            text-transform: uppercase;
        }

        .mb-6 {
            margin-bottom: 1.5rem;
        }

        .mb-4 {
            margin-bottom: 1rem;
        }

        .mb-2 {
            margin-bottom: 0.5rem;
        }

        .w-full {
            width: 100%;
        }

        .space-y-2 > * + * {
            margin-top: 0.5rem;
        }

        .ttd-kanan {
            text-align: right;
            margin-top: 4rem;
        }

        .signature-line {
            margin-top: 3rem;
            border-top: 1px solid #000;
            width: 200px;
            margin-left: auto;
        }

        .text-sm {
            font-size: 12px;
        }
    </style>
</head>
<body>
    <h2 class="text-center font-bold uppercase mb-6">Hasil Interview</h2>

    <div class="space-y-2 mb-6">
        <p><strong>ID Calon Karyawan :</strong> <?= $calon_karyawan['id_calonkaryawan'] ?></p>
        <p><strong>Nama Calon Karyawan :</strong> <?= $calon_karyawan['nama_calonkaryawan'] ?></p>
        <p><strong>Jabatan :</strong> <?= $calon_karyawan['nama_jabatan'] ?></p>
        <p><strong>Alamat :</strong> <?= $calon_karyawan['alamat'] ?></p>
        <p><strong>No Telepon :</strong> <?= $calon_karyawan['no_telp'] ?></p>
        <p><strong>Keputusan :</strong> <?= $hasilseleksi['keputusan'] ?></p>
    </div>

    <p class="mb-6">Dengan ini surat kontrak disusun dan berlaku sesuai dengan ketentuan yang telah disepakati oleh kedua belah pihak.</p>

    <div class="ttd-kanan">
        <p class="mb-2">Jakarta, <?= date('d F Y') ?></p>
        <p class="mb-2">Yang Bersangkutan,</p>
        <div class=""></div><p><p>
        <p><?= $calon_karyawan['nama_calonkaryawan'] ?></p>
    </div>
</body>
</html>
