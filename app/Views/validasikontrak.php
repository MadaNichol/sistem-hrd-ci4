<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Validasi Kontrak</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
  <style>
    .toggle-dot {
      transition: transform 0.3s ease;
    }
    .bg-pending { background-color: #9ca3af; }
    .bg-disetujui { background-color: #22c55e; }
    .bg-ditolak { background-color: #ef4444; }
  </style>
</head>
<body>
<div class="flex min-h-screen">
  <!-- Sidebar -->
  <div class="bg-gray-600 text-white w-64 p-4 border-r flex flex-col justify-between">
    <div>
      <div class="text-center mb-8">
        <img src="<?= base_url('img/logo_pt_xyz.jpg') ?>" alt="Logo" class="mx-auto mb-4 rounded-full" width="100" height="100">
        <h1 class="text-xl font-bold">PT XYZ</h1>
      </div>
      <nav class="space-y-1">
        <a href="/karyawandirektur" class="block py-2.5 px-4 rounded hover:bg-gray-700 font-semibold">
          <i class="fas fa-users mr-2"></i> Karyawan
        </a>
        <a href="/pengelolaanskdirektur" class="block py-2.5 px-4 rounded hover:bg-gray-700 transition">
          <i class="fas fa-folder-open mr-2"></i> Pengelolaan Surat Kontrak
        </a>
        <a href="/validasikontrak" class="block py-2.5 px-4 rounded hover:bg-gray-700 transition">
          <i class="fas fa-check-circle mr-2"></i> Validasi Kontrak
        </a>
        <a href="/cetakkaryawandirektur" class="block py-2.5 px-4 rounded hover:bg-gray-700 transition">
          <i class="fas fa-print mr-2"></i> Cetak Laporan
        </a>
      </nav>
    </div>

    <div class="text-center mt-6">
      <img src="<?= base_url('img/direktur.jpg') ?>" alt="Admin Profile" class="mx-auto rounded-full mb-2" width="50" height="50">
      <p class="font-bold text-white">Direktur</p>
      <a href="<?= base_url('/logout') ?>" class="mt-4 inline-block py-2 px-4 border border-white bg-red-600 hover:bg-red-700 rounded text-white">
        <i class="fas fa-sign-out-alt mr-2"></i> Log Out
      </a>
    </div>
  </div>
  <!-- Konten -->
  <div class="flex-1 p-4">
    <h1 class="text-2xl font-bold mb-4">Validasi Kontrak</h1>
    <p class="mb-8">Welcome, Direktur</p>
    <div class="w-full bg-white shadow rounded-lg overflow-x-auto">
      <table class="w-full table-auto">
        <thead class="bg-gray-100 border-b">
          <tr>
            <th class="px-4 py-2 text-center text-sm font-semibold text-gray-700">Nama</th>
            <th class="px-4 py-2 text-center text-sm font-semibold text-gray-700">ID SK</th>
            <th class="px-4 py-2 text-center text-sm font-semibold text-gray-700">Jenis Kontrak</th>
            <th class="px-4 py-2 text-center text-sm font-semibold text-gray-700">Tanggal Mulai</th>
            <th class="px-4 py-2 text-center text-sm font-semibold text-gray-700">Tanggal Berakhir</th>
            <th class="px-4 py-2 text-center text-sm font-semibold text-gray-700">Jabatan</th>
            <th class="px-4 py-2 text-center text-sm font-semibold text-gray-700">User</th>
            <th class="px-4 py-2 text-center text-sm font-semibold text-gray-700">Status</th>
          </tr>
        </thead>
        <tbody>
                <?php foreach ($pengelolaansk as $row): ?>
          <tr class="border-b hover:bg-gray-50">
            <td class="px-4 py-2 text-center text-sm text-gray-600"><?= $row['nama'] ?></td>
            <td class="px-4 py-2 text-center text-sm text-gray-600"><?= $row['id_sk'] ?></td>
            <td class="px-4 py-2 text-center text-sm text-gray-600"><?= $row['jenis_kontrak'] ?></td>
            <td class="px-4 py-2 text-center text-sm text-gray-600"><?= $row['tanggal_kontrak_mulai'] ?></td>
            <td class="px-4 py-2 text-center text-sm text-gray-600"><?= $row['tanggal_berakhir_kontrak'] ?></td>
            <td class="px-4 py-2 text-center text-sm text-gray-600"><?= $row['nama_jabatan'] ?></td>
            <td class="px-4 py-2 text-center text-sm text-gray-600"><?= $row['nama_user'] ?></td>
            <td class="px-4 py-2 text-center">
              <?php
            $status = $row['status'];
            $bgClass = $status === 'disetujui' ? 'bg-disetujui' :
                      ($status === 'ditolak' ? 'bg-ditolak' : 'bg-pending');
            $translateClass = $status === 'disetujui' ? 'translate-x-9' :
                              ($status === 'ditolak' ? 'translate-x-0' : 'translate-x-5');
            ?>
              <label class="relative inline-block w-16 h-7 cursor-pointer">
                <input type="checkbox"
                       class="sr-only toggle-input"
                       data-id="<?= $row['id_sk'] ?>"
                       data-status="<?= $status ?>"
                       checked>
                <div class="block w-full h-full rounded-full transition-colors duration-300 <?= $bgClass ?>"></div>
                <div class="dot absolute top-0 left-0 w-7 h-7 bg-white rounded-full shadow toggle-dot <?= $translateClass ?>"></div>
              </label>
            </td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<script>
document.querySelectorAll('.toggle-input').forEach(input => {
    input.addEventListener('change', function () {
        const id = this.dataset.id;
        const dot = this.nextElementSibling.nextElementSibling;
        const bg = this.nextElementSibling;
        let currentStatus = this.dataset.status;
        let nextStatus = '';
        let bgClass = '';
        let translateClass = '';

        if (this.dataset.clicked === "false") {
            nextStatus = 'disetujui';
            bgClass = 'bg-disetujui';
            translateClass = 'translate-x-9';
            this.dataset.clicked = 'true';
        } else {
            if (currentStatus === 'disetujui') {
                nextStatus = 'ditolak';
                bgClass = 'bg-ditolak';
                translateClass = 'translate-x-0';
            } else if (currentStatus === 'ditolak') {
                nextStatus = 'pending';
                bgClass = 'bg-pending';
                translateClass = 'translate-x-5';
            } else {
                nextStatus = 'disetujui';
                bgClass = 'bg-disetujui';
                translateClass = 'translate-x-9';
            }
        }

        bg.className = 'block w-full h-full rounded-full transition-colors duration-300 ' + bgClass;
        dot.className = 'dot absolute top-0 left-0 w-7 h-7 bg-white rounded-full shadow toggle-dot ' + translateClass;

        this.dataset.status = nextStatus;

        fetch('/auth/updateStatusValidasi', {
          method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: JSON.stringify({
                id_sk: id,
                status: nextStatus
            })
        }).then(response => response.json())
          .then(data => {
              console.log('Status berhasil diperbarui:', data);
          }).catch(error => {
              console.error('Gagal update:', error);
          });

        this.checked = true;
    });
});
</script>
</body>
</html>