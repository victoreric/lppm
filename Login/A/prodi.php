<?php 
include 'menuA.php';
include '../link.php';

// fungsi view data
function view($conn){ ?>
    <div>
        <ul class='breadcrumb'>
        <li class='breadcrumb-item'><a href='index.php'><i class='fas fa-home'></i></a></li>
        <li class='breadcrumb-item'><a href='#'>Master Data</a></li>
        <li class='breadcrumb-item'><a href='prodi.php'>Progam studi</a></li>
        </ul>
        </div>
    <div class='container'>
    <div class="card">    
    <div class="card-header text-center">Program Studi</div>
        <div class="card-body">
        <a href="prodi.php?aksi=add" class="btn btn-success mb-2 fa fa-plus-circle" role="button"> </a>
        
        
        <table class="table table-bordered table-hover">
            <thead class="bg-dark text-white">
                <tr>
                    <th>id.</th>
                    <th>Program Studi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php  
                $queri="SELECT * FROM prodi";
                $sql=mysqli_query($conn,$queri);
                while($hasil=mysqli_fetch_array($sql)){
                ?>
                <tr>
                    <td><?php echo $hasil['id_prodi']; ?></td>
                    <td><?php echo $hasil['prodi']; ?></td>
                    <td><a href='prodi.php?aksi=update&id=<?php echo $hasil['id_prodi']; ?>' class='btn-sm btn-warning fas fa-edit'> </a>
                        
                    <a href="prodi.php?aksi=delete&id=<?php echo $hasil['id_prodi'];?>" onclick="javascript:return confirm('Anda Yakin untuk menghapus data ini?')" class="btn-sm btn-danger fas fa-trash-alt mt-1"> </a>
                        
                    </td>
                </tr>
                <?php  } ?>
            </tbody>
        </table>
        </div>
    </div>
    </div>
<?php } ?>
<!-- end fungsi tampil data -->

<!-- tambahdata -->
<?php 
function add($conn){ ?>
    <div>
        <ul class='breadcrumb'>
        <li class='breadcrumb-item'><a href='index.php'><i class='fas fa-home'></i></a></li>
        <li class='breadcrumb-item'><a href='prodi.php'>Master Data</a></li>
        <li class='breadcrumb-item'><a href='prodi.php?aksi=add'>Tambah Program Studi</a></li>
        </ul>
    </div>
    <div class="container">
        <div class="card">
            <div class="card-header text-center"> Tambah Program Studi</div>
            <div class="card-body">
                <form action="" method="POST">
                <div class="form-group">
                    <label for="id">id program studi:</label>
                    <input type="number" class="form-control" id="id" placeholder="" name="id">
                </div>
                <div class="form-group">
                    <label for="prodi">Program Studi:</label>
                    <input type="text" class="form-control" id="prodi" placeholder="" name="prodi">
                </div>
                <div class="panel-footer mt-5">
                    <button type="submit" name='simpan' class="btn btn-success  mr-5">Simpan</button>
                    <a href="prodi" class="btn btn-danger">Batal</a>
                </div>
                </form>
            </div>
        </div>
    </div>   
<?php 
if(isset($_POST['simpan'])){
    $id=$_POST['id'];
    $prodi=$_POST['prodi'];

    $query="INSERT INTO prodi (id_prodi, prodi) VALUES ('$id','$prodi')";
    $sql=mysqli_query($conn,$query);

    if($sql){
        echo "<script> alert ('Berhasil menambahkan program studi '); window.location='prodi.php'; </script>" ;
    }else{
        echo "<script>alert('Terjadi kegagalan. ID telah terdaftar') </script>";
    }
}
} ?>
<!-- endtambahdata -->

<!-- hapus data -->
<?php 
function delete($conn){
    if(isset($_GET['aksi']) && isset($_GET['id']) ){
        $id=$_GET['id'];
        $queri="DELETE FROM prodi WHERE id_prodi=$id ";
        $sql=mysqli_query($conn,$queri);

        if($sql){
            echo "<script>alert('Berhasil menghapus data');window.location='prodi.php'; </script>";
        }
    }
}
?>
<!-- endhapus data -->

<!-- updatedata -->
<?php 
function update($conn){
    $id=$_GET['id']; ?>

    <div>
        <ul class='breadcrumb'>
            <li class='breadcrumb-item'><a href='index.php'><i class='fas fa-home'></i></a></li>
            <li class='breadcrumb-item'><a href='prodi.php'>Master Data</a></li>
            <li class='breadcrumb-item'><a href='prodi.php?aksi=update&id=<?php echo $id; ?>'>Update Program Studi</a></li>
        </ul>
    </div>
    <div class="container">
        <div class="card">
            <div class="card-header text-center">Update Program Studi</div>
            <?php 
            $queri="SELECT * FROM prodi WHERE id_prodi=$id";
            $sql=mysqli_query($conn,$queri);
            while($hasil=mysqli_fetch_array($sql)){
            ?>
            <div class="card-body">
                <form action="" method="POST">
                <div class="form-group">
                    <label for="id">id Program studi:</label>
                    <input type="number" class="form-control" id="id" value="<?php echo $hasil['id_prodi']; ?>" name="id">
                </div>
                <div class="form-group">
                    <label for="prodi">Program studi:</label>
                    <input type="text" class="form-control" id="prodi" value="<?php echo $hasil['prodi']; ?>" name="prodi">
                </div>
                <div class="panel-footer mt-5">
                    <button type="submit" name='update' class="btn btn-success  mr-5">Simpan</button>
                    <a href="prodi.php" class="btn btn-danger">Batal</a>
                </div>
                </form>
            </div>
            <?php } ?>
        </div>
    </div>

    <!-- updateProses -->
    <?php
    if(isset($_POST['update'])){
        $id_new=$_POST['id'];
        $prodi=$_POST['prodi'];

        $queri="UPDATE prodi SET id_prodi='$id_new', prodi='$prodi' WHERE id_prodi=$id ";
        $sql=mysqli_query($conn,$queri);

        if($sql){
            echo"<script>alert('berhasil update data');window.location='prodi.php';</script>";
        }else{
            echo"<script>alert('terjadi kegagalan. Id Surat terdaftar');window.location='prodi.php';</script>";
        }
    }
    ?>
<?php } ?>
<!-- endUpdatedata -->

<!-- Program Utama -->

<?php
if (isset($_GET['aksi'])){
    switch($_GET['aksi']){
        case "add":
            add($conn);
            break;
        case "update":
            update($conn);
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


<?php include '../footer.php'; ?>