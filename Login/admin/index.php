<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Victor EP">
    <title>Admin Information System LPPM</title>
    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="../vendor/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<!-- <body class="bg-gradient-primary"> -->
<body background="../vendor/img/butterfly-bg.jpg">
<!-- login Form -->
<?php
    session_start();
    if(isset($_SESSION['nama_admin'])){
    if($_SESSION['level_admin']=='100' && $_SESSION['active_admin']=='Y'){
        header('location:../A');
    }
    elseif($_SESSION['level_admin']=='102' && $_SESSION['active_admin']=='Y'){
        header('location:../dekan');
    }
    elseif($_SESSION['level_admin']=='103' && $_SESSION['active_admin']=='Y'){
        header('location:../reviewer');
    }
    elseif($_SESSION['level_admin']=='104' && $_SESSION['active_admin']=='Y'){
        header('location:../adminlppm');
    }
    else {
        echo "<script> alert ('User dan Pasword belum diaktifkan. Hubungi administrator'); window.location='index.php'; </script>" ;
        session_destroy();
        }
    }
    include "../link.php"; 
    ob_start()
?>
<div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <!-- <div class="col-lg-6 d-none d-lg-block bg-login-hrd_vic"> -->
                <div class="col-lg-6">
                <img src="../assets/img/admin-1.png" alt="login" class="col-lg-12 d-none d-lg-block">    
                </div>
         
    <div class="col-lg-6">
        <div class="p-2">
            <div class="text-center">
                <img src="../assets/img/unpattilogo.png" width="250" height="250" alt="logo" class="logo">
                 <h1 class="h4 text-gray-900 mb-4">Administrator & Reviewer</h1>
                 <h5 class="h4 text-gray-900 mb-2">LPPM Information system</h5>
            </div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                <div class="form-group">
                    <input type="text" name='username' class="form-control form-control-user" pattern="[A-Za-z0-9]{}" placeholder="Masukan Username">
                </div>
                <div class="form-group">
                    <input type="password"  name='password' class="form-control form-control-user" id="" placeholder="Password">
                </div>
                <div class="form-group">
                    <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                    </div>
                </div>                 
                    <input class='btn btn-primary btn-user btn-block' type="submit" name="login" id="login" value='Login'>
            </form>
            <hr>
            <div class="text-center">
                <a class="small" data-toggle='modal' data-target='#myModal' href=''>Lupa Password?</a>
            </div>
            <!-- <div class="text-center">
                 Belum punya akun?<a class="small" href="reg.php"> Daftar disini!</a>
            </div> -->
            <nav class="login-card-footer-nav mt-5">
                <!-- <a href="../../"> << back to infofatek</a> -->
               
            </nav>
                
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
</div>

 <!-- The Modal -->
 <div class="modal fade" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Information System LPPM</h4>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                            Hubungi Admin LPPM
                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
<!-- loginProses -->

<?php
    if(isset($_POST['login'])){
	$username=$_POST['username'];
	$password=md5($_POST['password']);

	$query="SELECT * FROM login WHERE username='$username' AND password='$password'";
	$sql=mysqli_query($conn,$query);
	$cek=mysqli_num_rows($sql);

	if ($cek==1 ) {
		$hasil=mysqli_fetch_array($sql);
        $_SESSION['id_login']=$hasil['id_login'];
		$_SESSION['nama_admin']=$hasil['nama'];
		$_SESSION['username_admin']=$hasil['username'];
        $_SESSION['nip']=$hasil['nip'];
        $_SESSION['fakultas']=$hasil['fakultas'];
		$_SESSION['level_admin']=$hasil['level'];
        $_SESSION['active_admin']=$hasil['active'];

		if($_SESSION['level_admin']=='100' && $_SESSION['active_admin']=='Y'){
            header('location:../A/index.php');
		}
        elseif($_SESSION['level_admin']=='102' && $_SESSION['active_admin']=='Y'){
            header('location:../dekan/index.php');
        }
        elseif($_SESSION['level_admin']=='103' && $_SESSION['active_admin']=='Y'){
            header('location:../reviewer');
        }
        elseif($_SESSION['level_admin']=='104' && $_SESSION['active_admin']=='Y'){
            header('location:../adminlppm/index.php');
        }
        elseif($_SESSION['level_admin']=='105' && $_SESSION['active_admin']=='Y'){
            header('location:../keuangan/index.php');
        }
		else {
			session_destroy();
			echo "<script> alert ('User dan Pasword belum diaktifkan..! Hubungi Admin LPPM'); window.location='index.php'; </script>" ;
		}
	}
	else{
        session_destroy();
 		echo "<script> alert ('User dan Pasword tidak terdaftar. Hubungi Admin LPPM.'); window.location='index.php'; </script>" ;
	}
}
?>
    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="../vendor/js/sb-admin-2.min.js"></script>
</body>
</html>
<?php
ob_flush();
// session_destroy()
?>