<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css">

</head>
<body>
    <!-- Button untuk menampilkan modal box -->
<button onclick="showAddModal()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
  Tambah Link
</button>

<!-- Modal box untuk menambah data link -->
<div id="add-modal" class="fixed z-10 inset-0 overflow-y-auto hidden">
  <div class="flex items-center justify-center min-h-screen">
    <div class="bg-gray-500 bg-opacity-75 absolute inset-0"></div>

    <div class="bg-white rounded-lg overflow-hidden shadow-xl w-1/2">
      <div class="p-4">
        <h2 class="font-bold text-2xl mb-4">Tambah Link</h2>

        <form action="add_link.php" method="post">
          <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="block_title">
              Judul Link
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="block_title" type="text" name="block_title" required>
          </div>

          <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="block_link">
              Link
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="block_link" type="text" name="block_link" required>
          </div>

          <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="block_emoji">
              Emoji
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="block_emoji" type="text" name="block_emoji" required>
          </div>

          <div class="flex items-center justify-end">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
              Tambah
            </button>
            <button onclick="hideAddModal()" class="bg-gray-400 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded ml-4 focus:outline-none focus:shadow-outline">
              Batal
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  function showAddModal() {
    document.getElementById("add-modal").classList.remove("hidden");
  }

  function hideAddModal() {
    document.getElementById("add-modal").classList.add("hidden");
  }
</script>

</body>
</html>