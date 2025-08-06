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

  <!-- Konten Kanan -->
  <div class="flex-1 p-6 bg-white">
    <h1 class="text-2xl font-bold mb-4">Kelola Karyawan</h1>
    <p class="mb-8">Welcome, Direktur</p>

    <!-- Kolom Pencarian -->
    <div class="flex justify-end mb-4">
      <input type="text" id="searchInput" placeholder="Cari Nama Karyawan"
             class="px-4 py-2 border border-gray-300 rounded-md shadow-sm w-64">
    </div>

    <!-- Tabel Data Karyawan -->
    <div class="w-full bg-white shadow rounded-lg overflow-x-auto">
      <table class="w-full table-auto">
        <thead class="bg-gray-100 border-b">
        <tr>
          <th class="px-4 py-2 text-center text-sm font-semibold text-gray-700">ID Karyawan</th>
          <th class="px-4 py-2 text-center text-sm font-semibold text-gray-700">Nama</th>
          <th class="px-4 py-2 text-center text-sm font-semibold text-gray-700">Alamat</th>
          <th class="px-4 py-2 text-center text-sm font-semibold text-gray-700">No Telp</th>
          <th class="px-4 py-2 text-center text-sm font-semibold text-gray-700">Status</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($karyawann as $k): ?>
          <tr class="border-b hover:bg-gray-50">
            <td class="px-4 py-2 text-center text-sm text-gray-600"><?= $k['id_karyawan'] ?></td>
            <td class="px-4 py-2 text-center text-sm text-gray-600"><?= $k['nama'] ?></td>
            <td class="px-4 py-2 text-center text-sm text-gray-600"><?= $k['alamat'] ?></td>
            <td class="px-4 py-2 text-center text-sm text-gray-600"><?= $k['no_telp'] ?></td>
            <td class="px-4 py-2 text-center text-sm">
              <span class="inline-block px-2 py-1 rounded-full text-xs font-medium 
                <?= $k['status'] == 'Aktif' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' ?>">
                <?= $k['status'] ?>
              </span>
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
      const name = row.querySelector("td:nth-child(2)").textContent.toLowerCase();
      row.style.display = name.includes(query) ? "" : "none";
    });
  });
</script>
</body>
</html>
