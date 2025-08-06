<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pengelolaan SK</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-white-100">
            <div class="container mx-auto p-6">
               <h1 class="text-2xl font-bold mb-4 text-center">Tambah Pengelolaan SK</h1>
               <form action="/simpanpengelolaansk" method="post" class="bg-purple p-6 rounded shadow-md">
            <div class="mb-4">
                <label for="id_sk" class="block text-sm font-medium text-gray-700">ID SK</label>
                <input type="text" name="id_sk" id="id_sk" required class="mt-1 block w-full border border-purple-300 rounded-md shadow-sm p-2">
            </div>

            <div class="mb-4">
               <label for="nama" class="block text-sm font-medium text-gray-700">Nama Karyawan</label>
               <select id="nama" name="nama" class="border p-2 w-full" onchange="isiNamaKaryawan()">
               <option value="">Pilih Nama Karyawan</option>
               <?php foreach ($k as $k): ?>
               <option value="<?= $k['nama'] ?>" data-id="<?= $k['id_karyawan'] ?>"><?= $k['nama'] ?></option>
               <?php endforeach; ?>
            </select>
            </div>

            <div class="mb-4">
                <label for="id_karyawan" class="block text-sm font-medium text-gray-700"></label>
                <input type="hidden" name="id_karyawan" id="id_karyawan" required class="mt-1 block w-full border border-purple-300 rounded-md shadow-sm p-2">
            </div>

            <div class="mb-4">
            <label for="nama_jabatan" class="block text-sm font-medium text-gray-700">Jabatan</label>
            <select name="nama_jabatan" id="nama_jabatan" class="mt-1 block w-full border border-purple-300 rounded-md shadow-sm p-2" required>
                <option value="">Pilih Jabatan</option>
                <?php foreach ($jabatan as $jab): ?>
                <option value="<?= $jab['nama_jabatan'] ?>" data-id="<?= $jab['id_jabatan'] ?>"><?= $jab['nama_jabatan'] ?></option>
                <?php endforeach; ?>
            </select>
            </div>

            <div class="mb-4">
            <label for="kategori_karyawan" class="block text-sm font-medium text-gray-700">Kategori Departemen</label>
            <select name="kategori_karyawan" id="kategori_karyawan" class="mt-1 block w-full border border-purple-300 rounded-md shadow-sm p-2" required onchange="isiKategori()">
                <option value="">Pilih Kategori</option>
                <?php foreach ($kategori as $kt): ?>
                <option value="<?= $kt['kategori_karyawan'] ?>" data-id="<?= $kt['id_kategori'] ?>">
                <?= $kt['kategori_karyawan'] ?>
                </option>
                <?php endforeach; ?>
            </select>
            </div>

            <div class="mb-4">
            <label for="jenis_kontrak" class="block text-sm font-medium text-gray-700">Jenis Kontrak</label>
            <select name="jenis_kontrak" id="jenis_kontrak" class="mt-1 block w-full border border-purple-300 rounded-md shadow-sm p-2" required onchange="isiKontrak()">
                <option value="">Pilih Kontrak</option>
                <?php foreach ($kontrak as $ktr): ?>
                <option value="<?= $ktr['jenis_kontrak'] ?>" data-id="<?= $ktr['id_kontrak'] ?>">
                <?= $ktr['jenis_kontrak'] ?>
                </option>
                <?php endforeach; ?>
            </select>
            </div>

            <div class="mb-4">
                <label for="id_kontrak" class="block text-sm font-medium text-gray-700"></label>
                <input type="hidden" name="id_kontrak" id="id_kontrak" required class="mt-1 block w-full border border-purple-300 rounded-md shadow-sm p-2">
            </div>

            <div class="mb-4">
                <label for="id_kategori" class="block text-sm font-medium text-gray-700"></label>
                <input type="hidden" name="id_kategori" id="id_kategori" required class="mt-1 block w-full border border-purple-300 rounded-md shadow-sm p-2">
            </div>

            <div class="mb-4">
                <label for="id_user" class="block text-sm font-medium text-gray-700"></label>
                <input type="hidden" name="id_user" id="id_user" required class="mt-1 block w-full border border-purple-300 rounded-md shadow-sm p-2">
            </div>

            <div class="mb-4">
                <label for="tanggal_kontrak_mulai" class="block text-sm font-medium text-gray-700">Tanggal Mulai Kontrak</label>
                <input type="date" name="tanggal_kontrak_mulai" id="tanggal_kontrak_mulai" required class="mt-1 block w-full border border-purple-300 rounded-md shadow-sm p-2">
            </div>

            <div class="mb-4">
                <label for="tanggal_berakhir_kontrak" class="block text-sm font-medium text-gray-700">Tanggal Berakhir Kontrak</label>
                <input type="date" name="tanggal_berakhir_kontrak" id="tanggal_berakhir_kontrak" required class="mt-1 block w-full border border-purple-300 rounded-md shadow-sm p-2">
            </div>

            <div class="mb-4">
                <label for="id_jabatan" class="block text-sm font-medium text-gray-700"></label>
                <input type="hidden" name="id_jabatan" id="id_jabatan" required class="mt-1 block w-full border border-purple-300 rounded-md shadow-sm p-2">
            </div>

            <div class="mb-4">
    <label class="block text-sm font-medium text-gray-700">Penanda tangan</label>

    <input type="hidden" name="nama_user" value="<?= $direktur['nama_user'] ?>">
    <input type="hidden" name="id_user" value="<?= $direktur['id_user'] ?>">

    <div class="mt-1 p-2 bg-gray-100 border border-gray-300 rounded-md">
        <?= $direktur['nama_user'] ?>
    </div>
</div>

            <button type="submit" class="w-full bg-blue-500 text-white font-bold py-2 rounded hover:bg-blue-600">Simpan</button>
        </form>
        
           <script>
    function isiNamaKaryawan() {
        const select = document.getElementById('nama');
        const idInput = document.getElementById('id_karyawan');
        const selectedOption = select.options[select.selectedIndex];
        const idKaryawan = selectedOption.getAttribute('data-id');
        idInput.value = idKaryawan || '';
    }

    function isiKategori() {
        const select = document.getElementById('kategori_karyawan');
        const selectedOption = select.options[select.selectedIndex];
        const idKategori = selectedOption.getAttribute('data-id');
        document.getElementById('id_kategori').value = idKategori || '';
    }

    function isiKontrak() {
        const select = document.getElementById('jenis_kontrak'); // ✅ perbaikan di sini
        const selectedOption = select.options[select.selectedIndex];
        const idKontrak = selectedOption.getAttribute('data-id');
        document.getElementById('id_kontrak').value = idKontrak || '';
    }

    function isiUser() {
        const select = document.getElementById('nama_user');
        const selectedOption = select.options[select.selectedIndex];
        const idUser = selectedOption.getAttribute('data-id');
        document.getElementById('id_user').value = idUser || '';
    }

    document.getElementById('nama_jabatan').addEventListener('change', function () {
        const selectedOption = this.options[this.selectedIndex];
        const idJabatan = selectedOption.getAttribute('data-id');
        document.getElementById('id_jabatan').value = idJabatan || '';
    });
</script>

    </div>
</body>
</html>
