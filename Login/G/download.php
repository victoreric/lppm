<?php
// surat akti kuliah
    include 'menu.php';
    include '../link.php';
?>
 
<!-- Main content starts -->
<div>
<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>
    <li class="breadcrumb-item"><a href="#">Download File penting</a></li>
    <!-- <li class="breadcrumb-item"><a href="propen.php">download</a></li> -->
  </ul>
</div>

<div class="container">
<div class="card">
  <div class="card-header text-center">Download Files</div>
  <div class="card-body">
    <ul class="list-group">
        <li class="list-group-item">
            <a href="files/penting_file/Final Panduan Penelitian dan PkM Unpatti 2024.pdf" download>
                Panduan Penelitian dan Pkm Unpatti 2024
                <!-- <img src="" alt="Panduan Penelitian dan Pkm Unpatti 2024" width="104" height="142"> -->
            </a>
        </li>
        <li class="list-group-item">
            <a href="files/penting_file/Kesediaan Kerjasama.docx" download>
            Format Surat Kesediaan Kerjasama
                <!-- <img src="" alt="Format Surat Kesediaan Kerjasama" width="104" height="142"> -->
            </a>
        </li>
        <li class="list-group-item">
            <a href="files/penting_file/Penerbitan SK Rektor.docx" download>
            Format Surat Permohonan Penerbitan SK Rektor
                <!-- <img src="" alt="Format Surat Permohonan Penerbitan SK Rektor" width="104" height="142"> -->
            </a>
        </li>
        <li class="list-group-item">
            <a href="files/penting_file/Permohonan Pembayaran.docx" download>
            Format Surat Permohonan Pembayaran
                <!-- <img src="" alt="Format Surat Permohonan Pembayaran" width="104" height="142"> -->
            </a>
        </li>
        <li class="list-group-item">
            <a href="files/penting_file/Permohonan Pencairan.docx" download>
            Format Surat Permohonan Pencairan Dana
                <!-- <img src="" alt="Format Surat Permohonan Pencairan Dana" width="104" height="142"> -->
            </a>
        </li>
    </ul>
</div>
</div>
</div>

<!-- scriptValidasiFileSize -->
<script type="text/javascript">
var uploadField = document.getElementById("filepenelitian");
uploadField.onchange = function() {
    if(this.files[0].size > 3000000){ // ini untuk ukuran 500KB, 1000000 untuk 1 MB.
       alert("Maaf. File Terlalu Besar ! Maksimal Upload 3 MB");
       this.value = "";
    };
};
</script> 

<?php include '../footer.php'; ?>

