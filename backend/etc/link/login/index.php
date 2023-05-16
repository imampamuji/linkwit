<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="max-w-sm mx-auto mt-4 p-6 bg-white rounded-md shadow-md">
        <h2 class="text-xl font-bold mb-4">Login</h2>
        <form method="POST" action="../func/login.php">
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="username">Username</label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="username" type="text" name="username" placeholder="Masukkan username" required>
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 font-bold mb-2" for="password">Password</label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="password" type="password" name="password" placeholder="Masukkan password" required>
            </div>
            <div class="flex items-center justify-between">
                <button
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit" name="login">
                    Login
                </button>
            </div>
        </form>
    </div>

</body>

</html>