<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sistem Informasi Laundry</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <script src="https://code.jquery.com/jquery-3.6.0.js" ></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>

</head>
<body>
    <!-- cek apakah sdh login -->
    <?php
    session_start();
    if($_SESSION['status']!="login"){
        header("location:../index.php?pesan=belum_login");
    }
    ?>

    <?php
    include '../koneksi.php';
    ?>
    <div class="container">
        <div class="col-md-10 col-md-offset-1">
            <?php
            $id = $_GET['id'];

            //mengambil data pelanggan yg ber id di atas dr tabel pelanggan
            $transaksi = mysqli_query($koneksi, "SELECT * FROM transaksi,pelanggan WHERE transaksi_id='$id' and transaksi_pelanggan=pelanggan_id");
            while($t=mysqli_fetch_array($transaksi)){
            ?>
            <center><h2>LAUNDRY SMKN 7 Baleendah</h2></center>
            <h3></h3>

            <a href="transaksi_invoice_cetak.php?id=<?php echo $id; ?>" target="_blank" class="btn btn-primary pull-right"><i class="glyphicon
            glyphicon-print"></i> CETAK</a>

            <br/>
            <br/>

            <table class="table">
                <tr>
                    <th width="20%">No. Invoice</th>
                    <th>:</th>
                    <td>INVOICE-<?php echo $t['transaksi_id']; ?></td>
                </tr>
                <tr>
                    <th width="20%">Tgl. Laundry</th>
                    <th>:</th>
                    <td><?php echo $t['transaksi_tgl']; ?></td>
                </tr>
                <tr>
                    <th>Nama Pelanggan</th>
                    <th>:</th>
                    <td><?php echo $t['pelanggan_nama']; ?></td>
                </tr>
                <tr>
                    <th>HP</th>
                    <th>:</th>
                    <td><?php echo $t['pelanggan_hp']; ?></td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <th>:</th>
                    <td><?php echo $t['pelanggan_alamat']; ?></td>
                </tr>
                <tr>
                    <th>Berat Cucian (Kg)</th>
                    <th>:</th>
                    <td><?php echo $t['transaksi_berat']; ?></td>
                </tr>
                <tr>
                    <th>Tgl. Selesai</th>
                    <th>:</th>
                    <td><?php echo $t['transaksi_tgl_selesai']; ?></td>
                </tr>
                <tr>
                    <th>Status</th>
                    <th>:</th>
                    <td>
                        <?php
                        if($t['transaksi_status']=="0"){
                            echo "<div class='label label-warning'>PROSES</div>";
                        } else if($t['transaksi_status']=="1"){
                            echo "<div class='label label-info'>DICUCI</div>";
                        } else if($t['transaksi_status']=="2"){
                            echo "<div class='label label-success'>SELESAI</div>";
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <th>Harga</th>
                    <th>:</th>
                    <td><?php echo "Rp. ".number_format($t['transaksi_harga'])." ,-"; ?></td>
                </tr>
            </table>

            <br/>

            <h4 class="text-center">Daftar Cucian</h4>
            <table class="table table-bordered table-striped">
                <tr>
                    <th>Jenis Pakaian</th>
                    <th width="20%">Jumlah</th>
                </tr>
                <?php
                $id = $t['transaksi_id'];
                $pakaian = mysqli_query($koneksi, "SELECT * FROM pakaian WHERE pakaian_transaksi='$id'");
                while($p=mysqli_fetch_array($pakaian)){
                ?>
                <tr>
                    <td><?php echo $p['pakaian_jenis']; ?></td>
                    <td width="5%"><?php echo $p['pakaian_jumlah']; ?></td>
                </tr>
                <?php } ?>
            </table>

            <br/>
            <p><center><i>"Terimakasih telah mempercayakan cucian anda pada kami".</i></center></p>
            <?php } ?>
        </div>
    </div>

    
</body>
</html>