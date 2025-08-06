<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="w-full max-w-xl bg-white p-8 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">Edit User</h1>

        <form action="/auth/updateuser/<?= $user['id_user'] ?>" method="post" class="space-y-4">
            <div>
                <label for="id_user" class="block text-sm font-medium text-gray-700">ID User</label>
                <input type="text" id="id_user" name="id_user" value="<?= $user['id_user'] ?>" required
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            <div>
                <label for="nama_user" class="block text-sm font-medium text-gray-700">Username</label>
                <input type="text" id="nama_user" name="nama_user" value="<?= $user['nama_user'] ?>" required
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="text" id="email" name="email" value="<?= $user['email'] ?>" required
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="text" id="password" name="password" value="<?= $user['password'] ?>" required
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            <div>
                <label for="id_role" class="block text-sm font-medium text-gray-700">ID Role</label>
                <input type="text" id="id_role" name="id_role" value="<?= $user['id_role'] ?>" required
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            <div class="flex justify-between items-center">
                <a href="/kelolauser"
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
