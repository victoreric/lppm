<?php 
include 'menuA.php';
include '../link.php';

// fungsi view data
function view($conn){ ?>
    <div>
        <ul class='breadcrumb'>
        <li class='breadcrumb-item'><a href='index.php'><i class='fas fa-home'></i></a></li>
        <li class='breadcrumb-item'><a href='#'>Master Data</a></li>
        <li class='breadcrumb-item'><a href='jenis.php'>Jenis Surat Permohonan</a></li>
        </ul>
        </div>
    <div class='container'>
    <div class="card">    
    <div class="card-header text-center">Jenis Surat Permohonan</div>
        <div class="card-body">
        <a href="jenis.php?aksi=add" class="btn btn-success mb-2 fa fa-plus-circle" role="button"> Tambah</a>
        <table class="table table-bordered table-hover">
            <thead class="bg-dark text-white">
                <tr>
                    <th>id.</th>
                    <th>Jenis Surat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php  
                $queri="SELECT * FROM jenis_suket";
                $sql=mysqli_query($conn,$queri);
                while($hasil=mysqli_fetch_array($sql)){
                ?>
                <tr>
                    <td><?php echo $hasil['id_jenis']; ?></td>
                    <td><?php echo $hasil['jenis']; ?></td>
                    <td><a href='jenis.php?aksi=update&id=<?php echo $hasil['id_jenis']; ?>' class='btn-sm btn-warning fas fa-edit'> </a>
                        
                    <a href="jenis.php?aksi=delete&id=<?php echo $hasil['id_jenis'];?>" onclick="javascript:return confirm('Anda Yakin untuk menghapus data ini?')" class="btn-sm btn-danger fas fa-trash-alt mt-1"> </a>
                        
                    </td>
                </tr>
                <?php  } ?>
            </tbody>
        </table>
        </div>
    </div>
    </div>
<?php } ?>
<!-- end fungsi view data -->

<!-- tambahdata -->
<?php 
function add($conn){ ?>
    <div>
        <ul class='breadcrumb'>
        <li class='breadcrumb-item'><a href='index.php'><i class='fas fa-home'></i></a></li>
        <li class='breadcrumb-item'><a href='jenis.php'>Master Data</a></li>
        <li class='breadcrumb-item'><a href='jenis.php?aksi=add'>Tambah Jenis Surat Permohonan</a></li>
        </ul>
    </div>
    <div class="container">
        <div class="card">
            <div class="card-header text-center">Jenis Surat Permohonan</div>
            <div class="card-body">
                <form action="" method="POST">
                <div class="form-group">
                    <label for="id">id Jenis Surat:</label>
                    <input type="number" class="form-control" id="id" placeholder="" name="id">
                </div>
                <div class="form-group">
                    <label for="jenis">Jenis Surat:</label>
                    <input type="text" class="form-control" id="jenis" placeholder="" name="jenis">
                </div>
                <div class="panel-footer mt-5">
                    <button type="submit" name='simpan' class="btn btn-success  mr-5">Simpan</button>
                    <a href="jenis.php" class="btn btn-danger">Batal</a>
                </div>
                </form>
            </div>
        </div>
    </div>   
<?php 
if(isset($_POST['simpan'])){
    $id=$_POST['id'];
    $jenis=$_POST['jenis'];

    $query="INSERT INTO jenis_suket (id_jenis, jenis) VALUES ('$id','$jenis')";
    $sql=mysqli_query($conn,$query);

    if($sql){
        echo "<script> alert ('Berhasil menambahkan jenis surat '); window.location='jenis.php'; </script>" ;
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
        $queri="DELETE FROM jenis_suket WHERE id_jenis=$id ";
        $sql=mysqli_query($conn,$queri);

        if($sql){
            echo "<script>alert('Berhasil menghapus data');window.location='jenis.php'; </script>";
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
            <li class='breadcrumb-item'><a href='jenis.php'>Master Data</a></li>
            <li class='breadcrumb-item'><a href='jenis.php?aksi=update&id=<?php echo $id; ?>'>Update Jenis Surat Permohonan</a></li>
        </ul>
    </div>
    <div class="container">
        <div class="card">
            <div class="card-header text-center">Update Jenis Surat Permohonan</div>
            <?php 
            $queri="SELECT * FROM jenis_suket WHERE id_jenis=$id";
            $sql=mysqli_query($conn,$queri);
            while($hasil=mysqli_fetch_array($sql)){
            ?>
            <div class="card-body">
                <form action="" method="POST">
                <div class="form-group">
                    <label for="id">id Jenis Surat:</label>
                    <input type="number" class="form-control" id="id" value="<?php echo $hasil['id_jenis']; ?>" name="id">
                </div>
                <div class="form-group">
                    <label for="jenis">Jenis Surat:</label>
                    <input type="text" class="form-control" id="jenis" value="<?php echo $hasil['jenis']; ?>" name="jenis">
                </div>
                <div class="panel-footer mt-5">
                    <button type="submit" name='update' class="btn btn-success  mr-5">Simpan</button>
                    <a href="jenis.php" class="btn btn-danger">Batal</a>
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
        $jenis=$_POST['jenis'];

        $queri="UPDATE jenis_suket SET id_jenis='$id_new', jenis='$jenis' WHERE id_jenis=$id ";
        $sql=mysqli_query($conn,$queri);

        if($sql){
            echo"<script>alert('berhasil update data');window.location='jenis.php';</script>";
        }else{
            echo"<script>alert('terjadi kegagalan. Id Surat terdaftar');window.location='jenis.php';</script>";
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