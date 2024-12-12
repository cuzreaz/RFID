<!-- proses penyimpanan -->

<?php
    include "koneksi.php";

    //baca ID data yang akan diedit
    $id = $_GET['id'];

    //baca data siswa berdasarkan id
    $cari = mysqli_query($konek, "select * from siswa where id='$id'");
    $hasil = mysqli_fetch_array($cari);


    //jika tombol simpan diklik
    if(isset($_POST['btnSimpan']))
    {
        //baca isi input form
        $nokartu    = $_POST['nokartu'];
        $nama       = $_POST['nama'];
        $alamat     = $_POST['alamat'];

        //simpan ke tabel siswa
       $simpan = mysqli_query($konek, "update siswa set nokartu='$nokartu', nama='$nama', alamat='$alamat' where id='$id'");

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
?>

<!DOCTYPE html>
<html>
<head>
    <?php include "header.php"; ?>
    <title>Tambah Data Siswa</title>
</head>
<body>
    
    <?php include "menu.php"; ?>

    <!-- isi -->
    <div class="container-fluid">
        <h3>Tambah Data Siswa</h3>

        <!-- form input -->
        <form method="POST">
            <div class="form-group">
                <label>No.Kartu</label>
                <input type="text" name="nokartu" id="nokartu" placeholder="nomor kartu RFID" class="form-control" style="width: 200px" value="<?php echo $hasil['nokartu']; ?>">
            </div>
            <div class="form-group">
                <label>Nama Siswa</label>
                <input type="text" name="nama" id="nama" placeholder="nama siswa" class="form-control" style="width: 400px" value="<?php echo $hasil['nama']; ?>">
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <textarea class="form-control" name="alamat" id="alamat" placeholder="alamat" style="width: 400px"><?php echo $hasil['alamat']; ?></textarea>
            </div>

            <button class="btn btn-primary" name="btnSimpan" id="btnSimpan">Simpan</button>
        </form>
    </div>
    <?php include "footer.php"; ?>
</body>
</html>