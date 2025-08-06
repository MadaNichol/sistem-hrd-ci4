<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah User</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-purple-100">
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4 text-center">Tambah User</h1>
        <form action="/simpanuser" method="post" class="bg-white p-6 rounded shadow-md">
            <div class="mb-4">
                <label for="id_user" class="block text-sm font-medium text-gray-700">ID User</label>
                <input type="text" name="id_user" id="id_id_userrole" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
            </div>   

            <div class="mb-4">
                <label for="nama_user" class="block text-sm font-medium text-gray-700">Username</label>
                <input type="text" name="nama_user" id="nama_user" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="text" name="email" id="email" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="text" name="password" id="password" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
            </div>

            <div class="mb-4">
                <label for="id_role" class="block text-sm font-medium text-gray-700">ID Role</label>
                <input type="text" name="id_role" id="id_role" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
            </div>

            <button type="submit" class="w-full bg-blue-500 text-white font-bold py-2 rounded hover:bg-blue-600">Simpan</button>
        </form>
    </div>
</body>
</html>
