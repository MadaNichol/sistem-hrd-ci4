<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Laporan Karyawan</title>
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

    <!-- Konten Utama -->
    <div class="flex-1 p-10">
        <h1 class="text-2xl font-bold mb-2">Cetak Laporan Karyawan</h1>
        <p class="mb-6">Welcome, Direktur</p>

        <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow">
            <h2 class="text-xl font-semibold mb-4 text-center">Pilih Filter Laporan</h2>

            <form action="<?= base_url('auth/generate_pdf') ?>" method="get" target="_blank" class="flex flex-col md:flex-row md:items-center md:space-x-4 space-y-4 md:space-y-0">
  <div class="flex-1">
    <label for="status" class="block font-medium text-gray-700 mb-1">Status Karyawan</label>
    <select name="status" id="status" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-pink-300">
      <option value="">Semua</option>
      <option value="Aktif">Aktif</option>
      <option value="Tidak Aktif">Tidak Aktif</option>
    </select>
  </div>

  <div class="md:w-auto w-full">
    <button type="submit"
            class="w-full md:w-auto bg-pink-600 text-white py-2 px-6 rounded hover:bg-pink-700 transition duration-200 flex items-center justify-center space-x-2">
      <i class="fas fa-file-pdf"></i>
      <span>Cetak PDF</span>
    </button>
  </div>
</form>

        </div>
    </div>
</div>
</body>
</html>
