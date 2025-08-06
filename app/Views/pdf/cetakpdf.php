<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Surat Kontrak</title>
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
    <h2 class="text-center font-bold uppercase mb-6">Surat Kontrak Kerja</h2>

    <div class="space-y-2 mb-6">
        <p><strong>Nama :</strong> <?= $pengelolaansk['nama'] ?></p>
        <p><strong>ID SK :</strong> <?= $pengelolaansk['id_sk'] ?></p>
        <p><strong>Jenis Kontrak :</strong> <?= $pengelolaansk['jenis_kontrak'] ?></p>
        <p><strong>Tanggal Mulai Kontrak :</strong> <?= $pengelolaansk['tanggal_kontrak_mulai'] ?></p>
        <p><strong>Tanggal Berakhir Kontrak :</strong> <?= $pengelolaansk['tanggal_berakhir_kontrak'] ?></p>
        <p><strong>Jabatan :</strong> <?= $pengelolaansk['nama_jabatan'] ?></p>
        <p><strong>Kategori Departemen :</strong> <?= $pengelolaansk['kategori_karyawan'] ?></p>
        
    </div>

    <p class="mb-6">Dengan ini surat kontrak disusun dan berlaku sesuai dengan ketentuan yang telah disepakati oleh kedua belah pihak.</p>

    <div class="ttd-kanan">
        <p class="mb-2">Jakarta, <?= date('d F Y') ?></p>
        <p class="mb-2">Yang Bersangkutan,</p>
        <div class=""></div><p><p>
        <p><?= $pengelolaansk['nama_user'] ?></p>
    </div>
</body>
</html>
