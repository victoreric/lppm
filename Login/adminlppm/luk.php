<?php
// session_start();
// if(!isset($_SESSION['nidn_login'])){
//    echo "<script> alert('Anda Belum Login'); window.location='../index'; </script>";
//    session_destroy();
// } 
// else {
?>
 <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Sistem Informasi LPPM Unpatti">
        <meta name="author" content="Victor Pattiradjawane">
        <title>Proposal Penelitian </title>
        <link href="../vendor/css/sb-admin-2.min.css" rel="stylesheet">
    </head>
    <body>
<?php
$file=$_GET['f'];
// echo $file;
?>

<div class="container-fluid">   
    <div class="embed-responsive embed-responsive-1by1">
        <iframe class="embed-responsive-item" src="../G/files/penelitian/<?php echo $file;?>" alt=""></iframe>
    </div>  
</div>
</body>
</html>


<?php 
// } 
?>