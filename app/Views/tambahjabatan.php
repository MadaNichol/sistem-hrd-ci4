<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Jabatan</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4 text-center">Tambah Jabatan</h1>
        <form action="/simpanjabatan" method="post" class="bg-white p-6 rounded shadow-md">
        <div class="mb-4">
                <label for="id_jabatan" class="block text-sm font-medium text-gray-700">ID Jabatan</label>
                <input type="text" name="id_jabatan" id="id_jabatan" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
            </div>   
        <div class="mb-4">
                <label for="nama_jabatan" class="block text-sm font-medium text-gray-700">Nama Jabatan</label>
                <input type="text" name="nama_jabatan" id="nama_jabatan" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
            </div>

            <button type="submit" class="w-full bg-blue-500 text-white font-bold py-2 rounded hover:bg-blue-600">Simpan</button>
        </form>
    </div>
</body>
</html>
