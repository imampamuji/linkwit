<?php

require '../functions.php';
$acc = query("SELECT * FROM info_account");
$info_acc = $acc[0];
$username = $info_acc['username'];
$data_link = query("SELECT id, block_title, block_link, block_emoji FROM data_link WHERE username = '$username'");
echo var_dump($info_acc);
echo "<br>";
echo var_dump($data_link);
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.19.0/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

    <?php
    // ADD
    // cek tombol submit data ud di tekan/blm
    if (isset($_POST["submit"])) {
        if (addData($_POST, $username) > 0) {
            echo "<script>
                    alert('Data link baru berhasil ditambahkan');
                    document.location.href = 'index.php';
                  </script>  
            ";
        } else {
            echo "<script>
                    alert('Data link baru gagal ditambahkan');
                    document.location.href = 'index.php';
                  </script>  
            ";
        }
    }

    
    ?>

    <!-- MODAL BOX ADD -->
    <input type="checkbox" id="my-modal" class="modal-toggle" />
    <div class="modal">
        <div class="modal-box flex">
            <div class="mx-auto">
                <label for="my-modal" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
                <h3 class="font-bold text-lg">Tambah Data Blok</h3>
                <p class="py-4">Silakan tambah data sesuai kebutuhan kamu!</p>
                <form action="" method="POST">
                    <div class="w-full flex">
                        <div class=" w-full">
                            <div class="w-full">
                                <div class="form-control w-full max-w-xs">
                                    <label for="block_emoji" class="label">
                                        <span class="label-text">Emoji Blok</span>
                                    </label>
                                    <input required type="text" name="block_emoji" id="block_emoji" placeholder="Masukkan Emoticon" class="input input-bordered w-full max-w-xs" />
                                </div>
                            </div>
                            <div>
                                <div class="form-control w-full max-w-xs">
                                    <label for="block_title" class="label">
                                        <span class="label-text">Judul Blok</span>
                                    </label>
                                    <input required type="text" name="block_title" id="block_title" placeholder="Masukkan Judul" class="input input-bordered w-full max-w-xs" />
                                </div>
                            </div>
                            <div>
                                <div class="form-control w-full max-w-xs">
                                    <label for="block_link" class="label">
                                        <span class="label-text">Tautan Blok</span>
                                    </label>
                                    <input required type="text" name="block_link" id="block_link" placeholder="Masukkan Tautan" class="input input-bordered w-full max-w-xs" />
                                    <div class="modal-action">
                                        <button for="my-modal" type="submit" name="submit" class="btn btn-sm btn-success">SIMPAN</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    

    <div class="container p-7 max-w-lg mx-auto">
        <div class="overflow-x-auto w-full">
            <!-- The button to open modal -->
            <div class="mx-auto flex justify-end">
                <div class=" pb-2 scale-90">
                    <!-- <a href="#my-modal-2" class="btn  ">+ Tambah</a> -->
                    <label for="my-modal" class="btn btn-xs modal-button">+ Tambah</label>
                </div>
            </div>

            <table class="table w-full mx-auto">
                <!-- head -->
                <thead>
                    <tr>
                        <th>Data</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data_link as $data) : ?>
                        <!-- row 1 -->
                        <tr class="">
                            <td class="w-1/2">
                                <span class="mr-3 "><?= $data['block_emoji'] ?></span>
                                <span class="font-bold"><?= $data['block_title'] ?></span>
                                <br>
                                <div class="w-full  py-1">
                                    <!-- text-ellipsis -->
                                    <p class="text-cyan-500 text-ellipsis  text-xs overflow-hidden ">
                                        <?= $data['block_link'] ?></p>
                                </div>
                            </td>
                            <td class=" bg-none text-center ">
                                <div class=" w-full mx-auto inline">
                                    <div class="justify-center">
                                        <a href="index.php?id=<?= $data['id'] ?>" id="btn-update" for="my-modal-update" class="hover:cursor-pointer btn btn-xs btn-primary">ubah</a>
                                        <a href="../delete.php?id=<?= $data['id'] ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data link <?= $data['block_title'] ?>?')" class="btn  btn-xs btn-secondary">hapus</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <!-- foot -->
                <tfoot>
                    <tr>
                        <th>Data</th>
                        <th class="text-center">Action</th>
                    </tr>
                </tfoot>

            </table>
        </div>
    </div>
    
    <?php 
    $id = $_GET["id"];
    var_dump($id);
    $dataSelectUpdate = query("SELECT * FROM data_link WHERE id = $id");
    var_dump($dataSelectUpdate);
    ?>

    

    <!-- MODAL BOX UPDATE -->
    <input type="checkbox" id="my-modal-update" class="modal-toggle" />
    <div class="modal" id="modal-update">
        <div class="modal-box flex">
            <div class="mx-auto">
                <label for="my-modal-update" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
                <h3 class="font-bold text-lg">Tambah Data Blok</h3>
                <p class="py-4">Silakan tambah data sesuai kebutuhan kamu!</p>
                <form action="" method="POST">
                    <div class="w-full flex">
                        <div class=" w-full">
                            <div class="w-full">
                                <div class="form-control w-full max-w-xs">
                                    <label for="block_emoji" class="label">
                                        <span class="label-text">Emoji Blok</span>
                                    </label>
                                    <input required type="text" name="block_emoji" id="block_emoji" placeholder="Masukkan Emoticon" class="input input-bordered w-full max-w-xs" />
                                </div>
                            </div>
                            <div>
                                <div class="form-control w-full max-w-xs">
                                    <label for="block_title" class="label">
                                        <span class="label-text">Judul Blok</span>
                                    </label>
                                    <input required type="text" name="block_title" id="block_title" placeholder="Masukkan Judul" class="input input-bordered w-full max-w-xs" />
                                </div>
                            </div>
                            <div>
                                <div class="form-control w-full max-w-xs">
                                    <label for="block_link" class="label">
                                        <span class="label-text">Tautan Blok</span>
                                    </label>
                                    <input required type="text" name="block_link" id="block_link" placeholder="Masukkan Tautan" class="input input-bordered w-full max-w-xs" />
                                    <div class="modal-action">
                                        <button for="my-modal-upadate" type="submit-update" name="submit-update" class="btn btn-sm btn-success">SIMPAN</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
<script>
    const url = "localhost/link_bem_tailwind/kominfo/edit/index.php?id=<?= $data['id'] ?>";
    const modalUpdate = document.querySelector("#modal-update");
    if (window.location.href === url){
        modalUpdate.classList.add("modal-open");
    }
    function hrefID(){
        
        // location.href = url;
        
        
        

        if(document.referrer==url) {
            
        }
    }
    
</script>

</html>