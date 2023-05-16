<?php

require 'functions.php';
$acc = query("SELECT * FROM info_account");
$info_acc = $acc[0];
$username = $info_acc['username'];
$data_link = query("SELECT block_title, block_link, block_emoji FROM data_link WHERE username = '$username'");

echo var_dump($info_acc);
echo "<br>";
echo var_dump($data_link);
?>

<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="min-h-screen bg-gray-100">
    <!-- Google Tag Manager (noscript) -->
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M9PSH69" height="0" width="0" style="display:none;visibility:hidden">
        </iframe>
    </noscript>
    <!-- End Google Tag Manager (noscript) -->

    <!-- Head Start -->
    <div class="max-w-7xl mx-auto">
        <div>
            <figure class="p-4">
                <img class="w-32 h-32 rounded-full mx-auto" src="./assets/img/<?= $info_acc["img_logo"]; ?>" alt="profile picture" width="400" height="400">
                <div class="pt-2 text-center space-y-4">
                    <figcaption class="font-medium">
                        <div class="text-[#CC9A2F] font-normal pb-4">
                            <a href="<?= $info_acc["link_username"]; ?>"><?= $info_acc["username"]; ?></a>
                        </div>
                        <div class="text-[#1D345E] text-xl font-bold">
                            <?= $info_acc["title"]; ?>
                        </div>
                        <div class="text-[#1D345E] text-xs font-semibold tracking-wide">
                            <?= $info_acc["sub_title"]; ?>
                        </div>
                    </figcaption>
                </div>
            </figure>
        </div>
    </div>
    <!-- Head End  -->

    <?php foreach( $data_link as $data ) : ?>
    <!-- Link Start  -->
    <div class="w-full mx-auto max-w-lg 3">
        <div class="pt-2 text-center space-y-2 p-5 ">
            <a href="<?=$data['block_link']?>" target="_blank" class="flex rounded-lg  justify-center bg-[#1D345E] shadow-slate-200 hover:shadow-[#CC9A2F] px-5 py-4 text-lg leading-6 font-medium shadow-md hover:shadow-lg transition ease-in-out duration-150">
                <div class="flex text-white">
                    <p class="mr-3 h-6 w-6"><?=$data['block_emoji']?></p>
                    <?=$data['block_title']?>
                </div>
            </a>
        </div>
    </div>
    <?php endforeach; ?>

    
    <!-- Footer Start -->
    <div class="container mx-auto w-full my-5 ">
        <p class=" flex text-center justify-center whitespace-pre-wrap text-xs"> Made with ❤️ By<a href="#" class="hover:text-[#CC9A2F]"> Kominfo BEM KM UNY</a></p>
    </div>
    <!-- Footer End -->

</body>

</html>