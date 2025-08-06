<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Calon Karyawan</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="w-full max-w-xl bg-white p-8 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">Edit Calon Karyawan</h1>

        <form action="/auth/updatecalonkaryawan/<?= $calon_karyawan['id_calonkaryawan'] ?>" method="post" class="space-y-4">
            <div>
                <label for="id_calonkaryawan" class="block text-sm font-medium text-gray-700">ID Calon Karyawan</label>
                <input type="text" id="id_calonkaryawan" name="id_calonkaryawan" value="<?= $calon_karyawan['id_calonkaryawan'] ?>" required
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-purple-300">
            </div>

            <div>
                <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                <input type="text" id="nama_calonkaryawan" name="nama_calonkaryawan" value="<?= $calon_karyawan['nama_calonkaryawan'] ?>" required
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-purple-300">
            </div>

            <div>
                <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                <input type="text" id="alamat" name="alamat" value="<?= $calon_karyawan['alamat'] ?>" required
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-purple-300">
            </div>

            <div>
                <label for="no_telp" class="block text-sm font-medium text-gray-700">No Telepon</label>
                <input type="text" id="no_telp" name="no_telp" value="<?= $calon_karyawan['no_telp'] ?>" required
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-purple-300">
            </div>

            <div>
                <label for="id_jabatan" class="block text-sm font-medium text-gray-700"></label>
                <input type="hidden" id="id_jabatan" name="id_jabatan" value="<?= $calon_karyawan['id_jabatan'] ?>" required
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-purple-300">
            </div>

            <div>
                <label for="nama_jabatan" class="block text-sm font-medium text-gray-700">Jabatan</label>
                <input type="text" id="nama_jabatan" name="nama_jabatan" value="<?= $calon_karyawan['nama_jabatan'] ?>" required
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-purple-300">
            </div>


            <div class="flex justify-between items-center">
                <a href="/kelolacalonkaryawan"
                   class="text-sm text-blue-600 hover:underline">← Kembali</a>
                <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-md transition">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</body>
</html>
