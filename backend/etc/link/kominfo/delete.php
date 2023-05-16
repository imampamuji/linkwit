<?php 
require "functions.php";

$id = $_GET["id"];

if(delete($id) > 0){
    echo "<script>
            alert('Data link berhasil dihapus');
            document.location.href = 'edit/index.php';
         </script>  
        ";
}
else {
    echo "<script>
            alert('Data link gagal dihapus');
            document.location.href = 'edit/index.php';
        </script>  
        ";
    
}
