<?php
session_start();
if(!isset($_SESSION['username_admin'])){
   echo "<script> alert('Anda Belum Login'); window.location='../index'; </script>";
} 
?>
 <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Student Affairs">
        <meta name="author" content="Victor Pattiradjawane">
        <title>Suket v.2</title>
        <link href="../vendor/css/sb-admin-2.min.css" rel="stylesheet">
    </head>
    <body>
<?php
$file=$_GET['f'];
?>

<div class="container-fluid">   
    <div class="embed-responsive embed-responsive-1by1">

    <!-- <div class="embed-responsive embed-responsive-21by9">
  <iframe class="embed-responsive-item" src="..."></iframe>
</div> -->
        <iframe class="embed-responsive-item" src="../files/berkas_ak/<?php echo $file;?>" alt=""></iframe>
    </div>  
</div>
</body>
</html>


