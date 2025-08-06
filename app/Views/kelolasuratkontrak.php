<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Kelola Karyawan</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
</head>
<body>
<?php 
  $currentUrl = $_SERVER['REQUEST_URI'];
  $isMasterOpen = str_contains($currentUrl, '/kelolakaryawan') 
                || str_contains($currentUrl, '/kelolasuratkontrak') 
                || str_contains($currentUrl, '/kelolajabatan') 
                || str_contains($currentUrl, '/kelolapengelolaansk') 
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
            <i class="fas <?= $isMasterOpen ? 'fa-chevron-up' : 'fa-chevron-down' ?>" id="masterMenuIcon"></i>
          </button>
          <div id="masterMenu" class="mt-1 ml-4 flex-col space-y-1 <?= $isMasterOpen ? '' : 'hidden' ?>">
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

  <!-- Konten Kanan -->
  <div class="flex-1 p-4 bg-white">
    <h1 class="text-2xl font-bold mb-4">Surat Kontrak</h1>
    <p class="mb-8">Welcome, Admin HRD</p>

    <div class="flex justify-between items-center mb-4">
      <!-- Tombol Tambah Karyawan -->
      <a href="/auth/tambahsuratkontrak" class="inline-block bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
        Tambah Surat Kontrak
      </a>

      <!-- Kolom Pencarian -->
      <input type="text" id="searchInput" placeholder="Cari surat kontrak"
             class="px-4 py-2 border border-gray-300 rounded-md shadow-sm w-64">
    </div>

    <div class="w-full bg-white shadow rounded-lg overflow-x-auto">
      <table class="w-full table-auto">
        <thead class="bg-gray-100 border-b">
        <tr>
          <th class="px-4 py-2 text-center text-sm font-semibold text-gray-700">ID Surat Kontrak</th>
          <th class="px-4 py-2 text-center text-sm font-semibold text-gray-700">Jenis Kontrak</th>
          <th class="px-4 py-2 text-center text-sm font-semibold text-gray-700">Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($kontrakk as $kontrak): ?>
          <tr class="bg-gray-50 border-b">
            <td class="px-4 py-2 text-center text-sm text-gray-600"><?= $kontrak['id_kontrak'] ?></td>
            <td class="px-4 py-2 text-center text-sm text-gray-600"><?= $kontrak['jenis_kontrak'] ?></td>
            <td class="px-4 py-2 text-center text-sm space-x-2">
              <!-- Edit -->
              <a href="/auth/editsuratkontrak/<?= $kontrak['id_kontrak'] ?>"
                class="text-yellow-500 hover:text-yellow-600" title="Edit">
                <i class="fas fa-edit text-lg"></i>
              </a>

              <!-- Delete -->
              <a href="/deletesuratkontrak/<?= $kontrak['id_kontrak'] ?>"
                onclick="return confirm('Yakin hapus data ini?')"
                class="text-red-600 hover:text-red-700" title="Delete">
                <i class="fas fa-trash-alt text-lg"></i>
              </a>
            </td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<script>
  const searchInput = document.getElementById("searchInput");
  const tableRows = document.querySelectorAll("tbody tr");

  searchInput.addEventListener("keyup", function () {
    const query = this.value.toLowerCase();

    tableRows.forEach(row => {
      // Cari berdasarkan kolom 2 (jenis kontrak) misal
      const jenisKontrak = row.querySelector("td:nth-child(2)").textContent.toLowerCase();

      if (jenisKontrak.includes(query)) {
        row.style.display = "";
      } else {
        row.style.display = "none";
      }
    });
  });

  // Dropdown Master Menu toggle
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
