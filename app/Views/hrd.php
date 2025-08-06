<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard HRD</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
</head>

<body class="bg-gray-100">
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


    <!-- Main Content -->
    <div class="flex-1 p-6 bg-white">
      <h1 class="text-2xl font-bold mb-4">Dashboard</h1>
      <p class="mb-8">Welcome, Admin HRD</p>

      <!-- Menu Cards -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
        <div class="bg-white p-6 rounded shadow text-center">
          <a href="/kelolakaryawan">
            <img src="<?= base_url('img/kelolakaryawan.jpg') ?>" alt="Kelola Karyawan Icon" class="mx-auto mb-4" width="100" height="100">
            <h2 class="font-bold">Kelola Karyawan</h2>
          </a>
        </div>
        <div class="bg-white p-6 rounded shadow text-center">
          <a href="/kelolapengelolaansk">
            <img src="<?= base_url('img/suratkontrak.jpg') ?>" alt="Surat Kontrak Icon" class="mx-auto mb-4" width="100" height="100">
            <h2 class="font-bold">Surat Kontrak</h2>
          </a>
        </div>
      </div>

      <!-- Data Karyawan -->
      <div class="bg-white p-6 rounded shadow mb-8" id="karyawan-container">
        <h2 class="font-bold mb-4">Data Karyawan</h2>
        <div class="relative mb-4">
          <input type="text" id="searchKaryawan" class="w-full p-2 border rounded" placeholder="Search">
          <i class="fas fa-search absolute top-3 right-3 text-gray-400"></i>
        </div>
        <div class="overflow-x-auto">
          <table class="min-w-full text-left whitespace-nowrap" id="tableKaryawan">
            <thead>
              <tr class="bg-gray-100">
                <th class="border-b p-2">Id</th>
                <th class="border-b p-2">Name</th>
                <th class="border-b p-2">Alamat</th>
                <th class="border-b p-2">No. Tlp</th>
                <th class="border-b p-2">Status</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($karyawan as $k) : ?>
                <tr class="hover:bg-gray-50">
                  <td class="border-b p-2"><?= esc($k['id_karyawan']) ?></td>
                  <td class="border-b p-2"><?= esc($k['nama']) ?></td>
                  <td class="border-b p-2"><?= esc($k['alamat']) ?></td>
                  <td class="border-b p-2"><?= esc($k['no_telp']) ?></td>
                  <td class="border-b p-2"><?= esc($k['status']) ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>

    </div>
  </div>

  <script>
    // Search filter
    document.getElementById('searchKaryawan').addEventListener('input', function () {
      const searchTerm = this.value.toLowerCase();
      const rows = document.querySelectorAll('#tableKaryawan tbody tr');

      rows.forEach(row => {
        const rowText = row.textContent.toLowerCase();
        row.style.display = rowText.includes(searchTerm) ? '' : 'none';
      });
    });

    // Sidebar toggle menu
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
