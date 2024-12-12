<!-- proses penyimpanan -->

<?php
    include "koneksi.php";

    //jika tombol simpan diklik
    if(isset($_POST['btnSimpan']))
    {
        //baca isi input form
        $nokartu    = $_POST['nokartu'];
        $nama       = $_POST['nama'];
        $alamat     = $_POST['alamat'];

        //simpan ke tabel siswa
        $simpan = mysqli_query($konek, "insert into siswa(nokartu, nama, alamat)values('$nokartu', '$nama', '$alamat')");

        //jika berhasil tersimpan, tampilkan pesan tersimpan,
        //kembali ke data siswa
        if($simpan)
        {
            echo "
                <script>
                    alert('Tersimpan');
                    location.replace('datasiswa.php');
                </script>
            ";
        }
        else
        {
            echo "
                <script>
                    alert('Gagal Tersimpan');
                    location.replace('datasiswa.php');
                </script>
            ";
        }

    }

    //kosongkan tambel tmprfid
    mysqli_query($konek, "delete from tmprfid");
?>

<!DOCTYPE html>
<html>
<head>
    <?php include "header.php"; ?>
    <title>Tambah Data Siswa</title>

    <!-- Pembacaan no kartu otomatis -->
    <script type="text/javascript">
        $(document).ready(function(){
            setInterval(function(){
                $("#norfid").load('nokartu.php')
            }, 1);  //pembacaan file nokartu.php, tiap 1 detik = 1000
        });
    </script>
</head>
<body>
    
    <?php include "menu.php"; ?>

    <!-- isi -->
    <div class="container-fluid">
        <h3>Tambah Data Siswa</h3>

        <!-- form input -->
        <form method="POST">
            <div id="norfid"></div>
            
            <div class="form-group">
                <label>Nama Siswa</label>
                <input type="text" name="nama" id="nama" placeholder="nama siswa" class="form-control" style="width: 400px">
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <textarea class="form-control" name="alamat" id="alamat" placeholder="alamat" style="width: 400px"></textarea>
            </div>

            <button class="btn btn-primary" name="btnSimpan" id="btnSimpan">Simpan</button>
        </form>
    </div>
    <?php include "footer.php"; ?>
</body>
</html>