<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Sistem informasi LPPM</title>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="vendor/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<?php include 'link.php'; ?>
<!-- <body class="bg-gradient-primary"> -->
<body background="vendor/img/butterfly-bg.jpg">
    <div class="row container-fluid">
        <!--firstCol  -->
        <div class="col-sm-4"></div>
        <!-- secondCol -->
        <div class="col-sm-4">
            <div class="card my-5">
                <div class="card-body">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Buat Akun Baru!</h1>
                    </div>
                    <form method="POST" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nidn">NIDN :</label>
                            <input type="text" maxlength="10" class="form-control" id='nidn' name='nidn' placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label for="pass">Password untuk login</label>
                                <input type="password" class="form-control" name='pass' id='pass' placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" class="form-control " name="nama" id='nama' placeholder="" required>
                        </div>

                        <div class="form-group">
                            <label for="nip">NIP :</label>
                            <input type="text" maxlength = "18"  class="form-control" id='nip' name='nip' placeholder="" required>
                        </div>

                        <div class="form-group">
                            <label for="fakultas">Fakultas</label>
                            <select name="fakultas" class="form-control" id='fakultas' required>
                                <option value=''> --Pilih Fakultas-- </option>
                                <?php 
                                    $queryFak="SELECT * From mstr_fakultas";
                                    $sqlFak= mysqli_query($conn,$queryFak);
                                    while ($hasilFak = mysqli_fetch_array($sqlFak))
                                    {
                                    echo "<option value='".$hasilFak['id_fakultas']."' >" .$hasilFak['fakultas_name']. "</option>";
                                    }
                                ?>
                            </select> 
                        </div>

                        <div class="form-group">
                            <label for="prodi">Program Studi</label>
                            <select name="prodi" class="form-control" id='prodi' required>
                                <option value=''> --Pilih Program Studi-- </option>
                                <?php 
                                    $queryProdi="SELECT * From mstr_prodi";
                                    $sqlProdi= mysqli_query($conn,$queryProdi);
                                    while ($hasilProdi = mysqli_fetch_array($sqlProdi))
                                    {
                                    echo "<option value='".$hasilProdi['id_prodi']."' >" .$hasilProdi['prodi']. "</option>";
                                    }
                                ?>
                            </select> 
                        </div>

                        <div class="form-group">
                            <label for='golongan'>Pangkat/ Golongan</label>
                                <select name="golongan" id='golongan' class="form-control" required >
                                <option value=''>-- Pilih Pangkat / Golongan --</option>
                                <option> Penata Muda TK.I / III.b </option>
                                <option> Penata/ III.c </option>
                                <option> Penata TK.I / III.d </option>
                                <option> Pembina/ IV.a </option>
                                <option> Pembina TK.I/ IV.b </option>
                                <option> Pembina Utama Muda/ IV.c </option>
                                <option> Pembina Utama Madya/ IV.d </option>
                                </select>
                        </div>
                        <div class="form-group">
                            <label for='jafung'>Jabatan Fungsional</label>
                                <select name="jafung" id='jafung' class="form-control" required >
                                <option value=''>-- Pilih Jabatan Fungsional --</option>
                                <option> Tenaga Pengajar </option>
                                <option> Asisten Ahli</option>
                                <option> Lektor </option>
                                <option> Lektor Kepala</option>
                                <option> Guru Besar</option>
                                </select>
                        </div>

                        <div class="form-group">
                            <label for="sinta_id">Sinta_ID :</label>
                            <input type="text" maxlength="7" class="form-control" id='sinta_id' name='sinta_id' placeholder="" required>
                        </div>

                        <div class="form-group">
                            <label for="hindex">Overall Score Sinta dan H-index Scopus :</label>
                            <input type="number" min="1" class="form-control" id='hindex' name='hindex' placeholder="" required>
                        </div>

                        <div class="form-group">
                            <label for='jk' >Jenis Kelamin</label>
                                <select name="jk" id='jk' class="form-control" required >
                                <option value=''>-- Pilih Jenis Kelamin --</option>
                                <option> Laki-Laki </option>
                                <option> Perempuan </option>
                                </select>
                            </div>
                        <div class="form-group">
                            <label for="tmplahir">Tempat lahir</label>
                            <input type="text" class="form-control " name="tmplahir" id='tmplahir' placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label for="tglahir">Tanggal Lahir</label>
                            <input type="date" class="form-control " name="tglahir" id='tglahir' placeholder="" required>
                        </div>
                     
                        <div class="form-group">
                            <label for="hp">Nomor Handphone</label>
                            <input type="number" class="form-control " name="hp" id='hp' placeholder="" required>
                        </div>

                        <div class="form-group">
                            <Label for='email'>Email:</Label>
                            <input type="email" class="form-control" name='email' id='email' placeholder="" required>
                        </div>
                    
                        <div class="col"><button type="submit" name="simpan" class="btn btn-primary btn-user btn-block">Daftar Akun </button></div>

                        <div class="col mt-2"><button type="reset" name="reset" class="btn btn-warning btn-user">Reset</button></div>
                    </form>
                    <hr>
                    <div class="text-center">
                        <a class="small" href="index.php">Sudah Punya Akun? Login!</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- ThirdCol -->
        <div class="col-sm-4"></div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="vendor/js/sb-admin-2.min.js"></script>

</body>
</html>

<!-- login proses -->
<?php
include 'link.php';
if (isset($_POST['simpan'])) {
    $nidn=$_POST['nidn'];
    $pass=MD5($_POST['pass']);
    $nama=$_POST['nama'];
    $nip=$_POST['nip'];
    $fakultas=$_POST['fakultas'];
    $prodi=$_POST['prodi'];
    $golongan=$_POST['golongan'];
    $jafung=$_POST['jafung'];
    $sinta_id=$_POST['sinta_id'];
    $hindex=$_POST['hindex'];
    $jk=$_POST['jk'];
    $tmplahir=$_POST['tmplahir'];
    $tglahir=$_POST['tglahir'];
    $hp=$_POST['hp'];
    $email=$_POST['email'];

    $queryReg="INSERT INTO reg (nidn, pass, nama, nip, fakultas, prodi, golongan,jafung, sinta_id,hindex, jk, tmplahir, tglahir, hp, email, level, active) VALUES ('$nidn','$pass','$nama','$nip','$fakultas','$prodi','$golongan','$jafung','$sinta_id','$hindex','$jk','$tmplahir','$tglahir','$hp','$email','101','N')";

    $sql=mysqli_query($conn,$queryReg);


    if($sql){
        echo "<script> alert ('Berhasil menambahkan akun baru! Namun, akun anda belum diaktifkan. Silahkan menunggu verifikasi dari Admin LPPM Unpatti. '); 
        window.location='index.php'; </script>" ;
    }else {
        echo "terjadi kesalahan selama penyimpanan";
    }
}
?>