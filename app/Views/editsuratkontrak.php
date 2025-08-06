<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Surat Kontrak</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="w-full max-w-xl bg-white p-8 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">Edit Surat Kontrak</h1>

        <form action="/auth/updatesuratkontrak/<?= $kontrakk['id_kontrak'] ?>" method="post" class="space-y-4">
            <div>
                <label for="id_kontrak" class="block text-sm font-medium text-gray-700">ID Kontrak</label>
                <input type="text" id="id_kontrak" name="id_kontrak" value="<?= $kontrakk['id_kontrak'] ?>" required
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            <div>
                <label for="jenis_kontrak" class="block text-sm font-medium text-gray-700">Jenis Kontrak</label>
                <input type="text" id="jenis_kontrak" name="jenis_kontrak" value="<?= $kontrakk['jenis_kontrak'] ?>" required
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            <div class="flex justify-between items-center">
                <a href="/kelolasuratkontrak"
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
