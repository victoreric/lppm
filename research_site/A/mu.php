<?php include 'menuA.php';
include '../link.php';?>

<?php
// Program Utama MENU Manajemen user
if (isset($_GET['aksi'])){
    switch($_GET['aksi']){
        case "edit":
            edit($conn);
            break;
        case "delete":
            delete($conn);
            break;
        default:
            view($conn);
        }
} else {
    view($conn);
}
?>

<?php
// fungsi view data
function view($conn){ ?>
<div>
<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>
    <li class="breadcrumb-item"><a href="#">Master Data</a></li>
    <li class="breadcrumb-item"><a href="mu.php">Manajemen Akun Pengguna</a></li>
  </ul>
</div>

<div class="container"> 
<div class="card mb-5">
  <div class="card-header bg-primary text-white text-center h5"> Managemen akun pengguna 
  </div>
  <div class="card-body table-responsive">
  <!-- <a href="" class="btn-sm btn-info far fa-file"> Tambah data </a> -->
  <!-- <p></p> -->
  <table id="example1" class="table table-bordered table-hover table-responsive-justify">
		<thead>
			<tr class="bg-primary text-center">
				<th>No.</th>
				<th>NIM</th>
				<th>Nama Lengkap</th>
        <th> Handphone </th>
				<th>Level</th>
				<th>Active</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<?php
		$no=0;
		$query="SELECT * FROM reg ORDER BY active";
		$sql = mysqli_query($conn,$query);
		while($hasil=mysqli_fetch_array($sql)){
			$no++;
		?>
			<tr>
				<td> <?php echo $no;  ?></td>
				<td><?php echo $hasil['nim']; ?></td>
				<td><?php echo $hasil['nama']; ?></td>
        <td><?php echo $hasil['hp']; ?></td>
				<td><?php echo $hasil['level'];  ?></td>
				<td><?php echo $hasil['active'];  ?></td>
				<td class='text-center' > <a href='mu.php?aksi=edit&n= <?php echo $hasil['nim'] ;?> ' class='btn-sm btn-warning fas fa-edit' > edit</a>
     
           		<a href="mu.php?aksi=delete&nim=<?php echo $hasil['nim'] ;?>" class="btn-sm btn-danger fas fa-trash-alt mt-2" onclick="javascript:return confirm('Anda Yakin menghapus data ini?')" > hapus </a> 
				</td>
			</tr>
		
		<?php } ?>
		</table>
  </div>
</div>
</div>
<?php } 
// endFungsiViewData
?>


<?php
// fungsi edit data
function edit($conn){  ?>
	<div>
	<ul class="breadcrumb">
		<li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>
		<li class="breadcrumb-item"><a href="#">Master Data</a></li>
		<li class="breadcrumb-item"><a href="mu.php?aksi=view">Manajemen Akun Pengguna</a></li>
		<li class="breadcrumb-item"><a href="#">Update Akun Pengguna</a></li>
	</ul>
	</div>
<?php	
$n=$_GET['n'];
$query="SELECT * FROM reg where nim=$n";
$sql=mysqli_query($conn,$query);
$hasil=mysqli_fetch_array($sql);
?>

<div class="container">
<div class="card mb-5">
  <div class="card-header bg-primary text-white text-center h5">Edit User Account</div>
  <div class="card-body">
  <form method="POST" action="" enctype="multipart/form-data">  
 		 <label for="nim" class="">NIM:</label>
         <input name="nim" type="number" class="form-control" id="nim" placeholder="NIM/ NIP" value="<?php echo $hasil['nim']; ?>">
         <br>       
  		<label for="nama" class="">Nama:</label>
         <input name="nama" type="text" class="form-control" id="nama" placeholder="Nama Lengkap" value="<?php echo $hasil['nama']; ?>">
         <br>
       
         <label for='level'>Level</label>
         <select name="level" id="level" class="form-control">
            <option value="100" <?php if($hasil['level']=='100'){echo 'selected';} ?>>Administrator</option>
            <option value="101" <?php if($hasil['level']=='101'){echo 'selected';}  ?>>User</option>
         </select>
         
         <br>
         <label for='active'> Active</label>
         <select name='active' id='active' class="form-control">
            <option value="Y" <?php if($hasil['active']=='Y'){echo 'selected'; }  ?>> Ya</option>
            <option value="N" <?php if($hasil['active']=='N'){echo 'selected';}  ?> >Tidak</option>
         </select>
         <br>

         <a href="#demo" class="btn btn-warning" data-toggle="collapse">Klik disini untuk ganti password</a>
         <div id="demo" class="collapse">
           
            <input type="checkbox" size="30px" name="klikubah" value="true"> Ceklis jika ingin mengubah password<br>
            <label for="inputpassword" class="">Masukan Password Baru:</label>
                <input name="inputpassword" type="password" class="form-control" id="inputpassword" placeholder="Password baru">
         </div>
         <br>
         <div class='text-center'>
         <input class="btn btn-success btn-submit" type="submit" name="ubah" value="Ubah">
         <a href="mu.php" ><input class="btn btn-success btn-danger" type="button" value="Batal"></a>
         </div>
      </form>
  </div>
</div>
</div>


<?php  
//proses edit data  
if (isset($_POST['ubah']))
{
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $level=$_POST['level'];
    $active=$_POST['active'];
   
   $query = "UPDATE reg set nim='$nim', nama='$nama', level='$level', active='$active' WHERE nim=$n ";

   $sql= mysqli_query($conn,$query);

   if(isset($_POST['klikubah'])){
      $newpass=md5($_POST['inputpassword']);
      $nim = $_POST['nim'];
      $nama = $_POST['nama'];
      $level=$_POST['level'];
      $active=$_POST['active'];

      $query2 = "UPDATE reg set nim='$nim', nama='$nama', pass='$newpass', level='$level', active='$active' WHERE nim=$n";

      $sql2= mysqli_query($conn,$query2);

      if($sql2){ // Cek jika proses simpan ke database sukses atau tidak
         // Jika Sukses, Lakukan :   
       echo "<script> alert ('User Account dan password berhasil diubah');window.location='mu.php
       ';</script>"; 
      }
else {
     echo "gagal";
     } 
   }
    if($sql){ // Cek jika proses simpan ke database sukses atau tidak
                // Jika Sukses, Lakukan :   
              echo "<script> alert ('User Account berhasil diubah');window.location='mu.php';</script>"; 
             }
      else {
            echo "gagal";
            }           
}

}?>
<!-- endFungsiEditData -->


<!-- hapus data -->
<?php 
function delete($conn){
    if(isset($_GET['aksi']) && isset($_GET['nim']) ){
        $nim=$_GET['nim'];
        $queri="DELETE FROM reg WHERE nim=$nim ";
        $sql=mysqli_query($conn,$queri);

        if($sql){
            echo "<script>alert('Berhasil menghapus data');window.location='mu.php'; </script>";
        }
    }
}
?>
<!-- endhapus data -->

<script type="text/javascript">  
    $(function () {  
     $("#example1").dataTable();  
     $('#example2').dataTable({  
      "bPaginate": true,  
      "bLengthChange": false,  
      "bFilter": false,  
      "bSort": true,  
      "bInfo": true,  
      "bAutoWidth": false  
     });  
    });  
   </script> 



<?php 
include '../footer.php';
?>



