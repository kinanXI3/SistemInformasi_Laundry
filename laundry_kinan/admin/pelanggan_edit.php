<?php include 'header.php'; ?>

<div class="container">
    <br/>
    <br/>
    <br/>
    <div class="col-md-5 col-md-offset-3">

        <div class="panel">
            <div class="panel-heading">
                <h4>Edit Pelanggan</h4>
            </div>
            <div class="panel-body">
                <?php
                include '../koneksi.php';

                $id = $_GET['id'];
                $data = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE pelanggan_id = '$id'");
                while ($d=mysqli_fetch_array($data)){
                ?>

                <form method="post" action="pelanggan_update.php">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="hidden" name="id" value="<?php echo $d['pelanggan_id']; ?>">
                        <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama.." value="<?php echo $d['pelanggan_nama']; ?>">
                    </div>

                    <div class="form-group">
                        <label>HP</label>
                        <input type="number" class="form-control" name="hp" placeholder="Masukkan No HP.." value="<?php echo $d['pelanggan_hp']; ?>">
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" name="alamat" placeholder="Masukkan Alamat.." value="<?php echo $d['pelanggan_alamat']; ?>">
                    </div>
                    <br/>
                    <input type="submit" class="btn btn-primary" value="Simpan">
                </form>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>