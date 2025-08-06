<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Roboto', sans-serif;
    }

    .clip-miring {
      clip-path: polygon(0% 0, 100% 0, 100% 100%, 0% 100%);
    }

    @media (max-width: 768px) {
      .clip-miring {
        clip-path: none;
      }
    }
  </style>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

  <div class="w-full max-w-4xl bg-white rounded-lg shadow-md overflow-hidden flex flex-col md:flex-row">
    <div class="md:w-1/2 bg-blue-400 text-white p-10 flex flex-col justify-center clip-miring">
      <h2 class="text-3xl font-bold mb-6 text-white text-center">Login</h2>
      <form action="/auth/processLogin" method="post" class="space-y-4">
        <div>
          <label for="nama_user" class="block text-sm text-white mb-1">Username</label>
          <input type="text" name="nama_user" id="nama_user" placeholder="Username"
                 class="w-full px-4 py-2 rounded-md bg-white text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-300" required />
        </div>
        <div>
          <label for="password" class="block text-sm text-white mb-1">Password</label>
          <input type="password" name="password" id="password" placeholder="Password"
                 class="w-full px-4 py-2 rounded-md bg-white text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-300" required />
        </div>
        <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-md transition duration-300">
          Login
        </button>
      </form>
    </div>

    <div class="md:w-1/2 bg-white flex items-center justify-center p-4">
      <img src="<?= base_url('img/login.jpg') ?>" alt="KT" class="max-w-full h-auto rounded-md">
    </div>
  </div>

</body>
</html>
