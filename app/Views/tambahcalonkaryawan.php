<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Calon Karyawan</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
  <div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4 text-center">Tambah Calon Karyawan</h1>

    <form action="/simpancalonkaryawan" method="post" class="bg-purple p-6 rounded shadow-md">
      <div class="mb-4">
        <label for="id_calonkaryawan" class="block text-sm font-medium text-gray-700">ID Calon Karyawan</label>
        <input type="text" name="id_calonkaryawan" id="id_calonkaryawan" required class="mt-1 block w-full border border-purple-300 rounded-md shadow-sm p-2">
      </div>

      <div class="mb-4">
        <label for="nama_calonkaryawan" class="block text-sm font-medium text-gray-700">Nama</label>
        <input type="text" name="nama_calonkaryawan" id="nama_calonkaryawan" required class="mt-1 block w-full border border-purple-300 rounded-md shadow-sm p-2">
      </div>

      <div class="mb-4">
        <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
        <input type="text" name="alamat" id="alamat" required class="mt-1 block w-full border border-purple-300 rounded-md shadow-sm p-2">
      </div>

      <div class="mb-4">
        <label for="no_telp" class="block text-sm font-medium text-gray-700">No Telepon</label>
        <input type="text" name="no_telp" id="no_telp" required class="mt-1 block w-full border border-purple-300 rounded-md shadow-sm p-2">
      </div>

      <div class="mb-4">
        <label for="nama_jabatan" class="block text-sm font-medium text-gray-700">Jabatan Yang Dipilih</label>
        <select name="nama_jabatan" id="nama_jabatan" required class="mt-1 block w-full border border-purple-300 rounded-md shadow-sm p-2">
          <option value="">Pilih Jabatan</option>
          <?php foreach ($namajabatan as $jab): ?>
            <option value="<?= $jab['nama_jabatan'] ?>" data-id="<?= $jab['id_jabatan'] ?>">
              <?= $jab['nama_jabatan'] ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>

      <!-- Hidden id_jabatan -->
            <div class="mb-4">
                <label for="id_jabatan" class="block text-sm font-medium text-gray-700"></label>
                <input type="hidden" name="id_jabatan" id="id_jabatan" required class="mt-1 block w-full border border-purple-300 rounded-md shadow-sm p-2">
            </div>

      <button type="submit" class="w-full bg-blue-500 text-white font-bold py-2 rounded hover:bg-blue-600">Simpan</button>
    </form>
  </div>

   <script>
  document.addEventListener('DOMContentLoaded', function () {
    const select = document.getElementById('nama_jabatan');
    const idField = document.getElementById('id_jabatan');

    function setIdJabatan() {
      const selected = select.options[select.selectedIndex];
      idField.value = selected.getAttribute('data-id') || '';
    }

    // Jalankan saat select berubah
    select.addEventListener('change', setIdJabatan);

    // Jalankan sekali saat halaman load
    setIdJabatan();
  });
</script>

</body>
</html>
