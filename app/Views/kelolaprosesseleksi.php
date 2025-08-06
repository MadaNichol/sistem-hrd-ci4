<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Proses Seleksi</title>
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
<?php 
  $currentUrl = $_SERVER['REQUEST_URI'];
  $isMasterOpen = str_contains($currentUrl, '/kelolakaryawan') 
                || str_contains($currentUrl, '/kelolasuratkontrak') 
                || str_contains($currentUrl, '/kelolajabatan') 
                || str_contains($currentUrl, '/kelolakategori')
                || str_contains($currentUrl, '/kelolarole')
                || str_contains($currentUrl, '/kelolauser');
?>
<div class="flex min-h-screen">
    <!-- Sidebar -->
    <div class="bg-gray-500 text-white w-64 p-4 border-r flex flex-col justify-between">
  <div>
    <div class="text-center mb-8">
      <img src="<?= base_url('img/logo_pt_xyz.jpg') ?>" alt="Logo" class="mx-auto mb-4 rounded-full" width="100" height="100">
      <h1 class="text-xl font-bold">PT XYZ</h1>
    </div>
    <nav class="space-y-1">
      <a href="/hrd" class="block py-2.5 px-4 rounded hover:bg-gray-700 font-semibold">
        <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
      </a>
      <a href="/kelolacalonkaryawan" class="block py-2 px-4 rounded hover:bg-gray-700">
        <i class="fas fa-folder-open mr-2"></i> Calon Karyawan
      </a>
      <a href="/kelolaprosesseleksi" class="block py-2 px-4 rounded hover:bg-gray-700">
        <i class="fas fa-folder-open mr-2"></i> Proses Seleksi
      </a>
      <a href="/kelolahasilseleksi" class="block py-2 px-4 rounded hover:bg-gray-700">
        <i class="fas fa-folder-open mr-2"></i> Hasil Seleksi
      </a>
      <a href="/kelolapengelolaansk" class="block py-2 px-4 rounded hover:bg-gray-700">
        <i class="fas fa-folder-open mr-2"></i> Surat Kontrak
      </a>

      <!-- Master Dropdown -->
      <div>
        <button id="toggleMasterMenu" class="w-full text-left py-2.5 px-4 rounded hover:bg-gray-700 flex items-center justify-between">
          <span><i class="fas fa-cogs mr-2"></i> Master</span>
          <i class="fas fa-chevron-down" id="masterMenuIcon"></i>
        </button>
        <div id="masterMenu" class="mt-1 ml-4 hidden flex-col space-y-1">
          <a href="/kelolakaryawan" class="block py-2 px-4 rounded hover:bg-gray-700">
            <i class="fas fa-users mr-2"></i> Karyawan
          </a>
          <a href="/kelolasuratkontrak" class="block py-2 px-4 rounded hover:bg-gray-700">
            <i class="fas fa-file-alt mr-2"></i> Kontrak
          </a>
          <a href="/kelolajabatan" class="block py-2 px-4 rounded hover:bg-gray-700">
            <i class="fas fa-briefcase mr-2"></i> Jabatan
          </a>
          <a href="/kelolarole" class="block py-2 px-4 rounded hover:bg-gray-700">
            <i class="fas fa-user mr-2"></i> Role
          </a>
          <a href="/kelolakategori" class="block py-2 px-4 rounded hover:bg-gray-700">
            <i class="fas fa-tags mr-2"></i> Kategori
          </a>
          <a href="/kelolauser" class="block py-2 px-4 rounded hover:bg-gray-700">
            <i class="fas fa-user mr-2"></i> User
          </a>
        </div>
      </div>
    </nav>
  </div>

    <div class="text-center mt-6">
    <img src="<?= base_url('img/hrd.jpg') ?>" alt="Admin Profile" class="mx-auto rounded-full mb-2" width="50" height="50">
    <p class="font-bold text-white">Admin HRD</p>
    <a href="<?= base_url('/logout') ?>" class="mt-4 inline-block py-2 px-4 border border-white-400 bg-red-600 hover:bg-red-700 rounded text-white">
      <i class="fas fa-sign-out-alt mr-2"></i> Log Out
    </a>
  </div>
  </div>
  <!-- Konten -->
  <div class="flex-1 p-4 bg-white">
        <h1 class="text-2xl font-bold mb-4">Proses Seleksi</h1>
        <p class="mb-8">Welcome, Admin HRD</p>
        <div class="flex justify-between items-center mb-4">
            <!-- Kolom Pencarian -->
            <input type="text" id="searchInput" placeholder="Cari nama"
                   class="px-4 py-2 border border-gray-300 rounded-md shadow-sm w-64">
        </div>
    <div class="w-full bg-white shadow rounded-lg overflow-x-auto">
      <table class="w-full table-auto">
        <thead class="bg-gray-100 border-b">
          <tr>
            <th class="px-4 py-2 text-center text-sm font-semibold">ID Calon Karyawan</th>
            <th class="px-4 py-2 text-center text-sm font-semibold">Nama Karyawan</th>
            <th class="px-4 py-2 text-center text-sm font-semibold">Status</th>
          </tr>
        </thead>
        <tbody>
                <?php foreach ($calonkaryawan as $row): ?>
          <tr class="border-b hover:bg-gray-50">
            <td class="px-4 py-2 text-center text-sm"><?= $row['id_calonkaryawan'] ?></td>
            <td class="px-4 py-2 text-center text-sm"><?= $row['nama_calonkaryawan'] ?></td>
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
                       data-id="<?= $row['id_calonkaryawan'] ?>"
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

        fetch('/auth/updateStatusPenguji', {
          method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: JSON.stringify({
                id_calonkaryawan: id,
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

    // Dropdown Master Menu toggle (optional if JS interaction is still wanted)
    const toggleMasterMenu = document.getElementById('toggleMasterMenu');
    const masterMenu = document.getElementById('masterMenu');
    const masterMenuIcon = document.getElementById('masterMenuIcon');

    toggleMasterMenu.addEventListener('click', () => {
        masterMenu.classList.toggle('hidden');
        masterMenuIcon.classList.toggle('fa-chevron-down');
        masterMenuIcon.classList.toggle('fa-chevron-up');
        });
</script>
</body>
</html>