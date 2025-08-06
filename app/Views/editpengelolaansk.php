<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit SK</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="w-full max-w-xl bg-white p-8 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">Edit SK</h1>

        <form action="/auth/updatepengelolaansk/<?= $pengelolaansk['id_sk'] ?>" method="post" class="space-y-4">
            <div>
                <label for="nama" class="block text-s.m font-medium text-gray-700">Nama</label>
                <input type="text" id="nama" name="nama" value="<?= $pengelolaansk['nama'] ?>" required
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            <div>
                <label for="id_karyawan" class="block text-sm font-medium text-gray-700"></label>
                <input type="hidden" id="id_karyawan" name="id_karyawan" value="<?= $pengelolaansk['id_karyawan'] ?>" required
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            <div>
                <label for="id_jabatan" class="block text-sm font-medium text-gray-700"></label>
                <input type="hidden" id="id_jabatan" name="id_jabatan" value="<?= $pengelolaansk['id_jabatan'] ?>" required
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            <div>
                <label for="id_sk" class="block text-sm font-medium text-gray-700">ID SK</label>
                <input type="text" id="id_sk" name="id_sk" value="<?= $pengelolaansk['id_sk'] ?>" required
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            <div>
                <label for="id_kontrak" class="block text-sm font-medium text-gray-700"></label>
                <input type="hidden" id="id_kontrak" name="id_kontrak" value="<?= $pengelolaansk['id_kontrak'] ?>" required
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            <div>
                <label for="id_kategori" class="block text-sm font-medium text-gray-700"></label>
                <input type="hidden" id="id_kategori" name="id_kategori" value="<?= $pengelolaansk['id_kategori'] ?>" required
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            <div>
                <label for="id_user" class="block text-sm font-medium text-gray-700"></label>
                <input type="hidden" id="id_user" name="id_user" value="<?= $pengelolaansk['id_user'] ?>" required
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            <div>
                <label for="jenis_kontrak" class="block text-sm font-medium text-gray-700">Jenis Kontrak</label>
                <input type="text" id="jenis_kontrak" name="jenis_kontrak" value="<?= $pengelolaansk['jenis_kontrak'] ?>" required
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            <div>
                <label for="tanggal_kontrak_mulai" class="block text-sm font-medium text-gray-700">Tanggal Mulai Kontrak</label>
                <input type="date" id="tanggal_kontrak_mulai" name="tanggal_kontrak_mulai" value="<?= $pengelolaansk['tanggal_kontrak_mulai'] ?>" required
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            <div>
                <label for="tanggal_berakhir_kontrak" class="block text-sm font-medium text-gray-700">Tanggal Berakhir Kontrak</label>
                <input type="date" id="tanggal_berakhir_kontrak" name="tanggal_berakhir_kontrak" value="<?= $pengelolaansk['tanggal_berakhir_kontrak'] ?>" required
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            <div>
                <label for="nama_jabatan" class="block text-sm font-medium text-gray-700">Jabatan</label>
                <input type="text" id="nama_jabatan" name="nama_jabatan" value="<?= $pengelolaansk['nama_jabatan'] ?>" required
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            <div>
                <label for="kategori_karyawan" class="block text-sm font-medium text-gray-700">Kategori Departemen</label>
                <input type="text" id="kategori_karyawan" name="kategori_karyawan" value="<?= $pengelolaansk['kategori_karyawan'] ?>" required
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            <div>
                <label for="nama_user" class="block text-sm font-medium text-gray-700">Penanda Tangan</label>
                <input type="" id="nama_user" name="nama_user" value="<?= $pengelolaansk['nama_user'] ?>" required readonly
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300">
            </div>


            <div class="flex justify-between items-center">
                <a href="/kelolapengelolaansk"
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
