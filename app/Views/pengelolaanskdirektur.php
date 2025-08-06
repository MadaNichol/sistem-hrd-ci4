<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <div class="flex-1 p-4">
        <h1 class="text-2xl font-bold mb-4">Pengelolaan Surat Kontrak</h1>
        <p class="mb-8">Welcome, Direktur</p>

        <div class="flex justify-end mb-4">
            <input type="text" id="searchInput" placeholder="Cari Surat Kontrak"
                   class="px-4 py-2 border border-gray-300 rounded-md shadow-sm w-64">
        </div>


        <div class="w-full bg-white shadow rounded-lg overflow-x-auto">
            <table class="w-full table-auto">
                <thead class="bg-gray-100 border-b">
                    <tr>
                        <th class="px-4 py-2 text-center text-sm font-semibold text-gray-700">Nama</th>
                        <th class="px-4 py-2 text-center text-sm font-semibold text-gray-700">ID SK</th>
                        <th class="px-4 py-2 text-center text-sm font-semibold text-gray-700">Jenis Kontrak</th>
                        <th class="px-4 py-2 text-center text-sm font-semibold text-gray-700">Tanggal Mulai Kontrak</th>
                        <th class="px-4 py-2 text-center text-sm font-semibold text-gray-700">Tanggal Berakhir Kontrak</th>
                        <th class="px-4 py-2 text-center text-sm font-semibold text-gray-700">Nama Jabatan</th>
                        <th class="px-4 py-2 text-center text-sm font-semibold text-gray-700">Kategori Departemen</th>
                        <th class="px-4 py-2 text-center text-sm font-semibold text-gray-700">Nama User</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pengelolaansk as $pengelolaansk): ?>
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-2 text-center text-sm text-gray-600"><?= $pengelolaansk['nama'] ?></td>
                            <td class="px-4 py-2 text-center text-sm text-gray-600"><?= $pengelolaansk['id_sk'] ?></td>
                            <td class="px-4 py-2 text-center text-sm text-gray-600"><?= $pengelolaansk['jenis_kontrak'] ?></td>
                            <td class="px-4 py-2 text-center text-sm text-gray-600"><?= $pengelolaansk['tanggal_kontrak_mulai'] ?></td>
                            <td class="px-4 py-2 text-center text-sm text-gray-600"><?= $pengelolaansk['tanggal_berakhir_kontrak'] ?></td>
                            <td class="px-4 py-2 text-center text-sm text-gray-600"><?= $pengelolaansk['nama_jabatan'] ?></td>
                            <td class="px-4 py-2 text-center text-sm text-gray-600"><?= $pengelolaansk['kategori_karyawan'] ?></td>
                            <td class="px-4 py-2 text-center text-sm text-gray-600"><?= $pengelolaansk['nama_user'] ?></td>
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
            const nama = row.querySelector("td:nth-child(3)").textContent.toLowerCase();

            if (nama.includes(query)) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
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
