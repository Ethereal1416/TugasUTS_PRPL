<?php

require('../../function.php');

$id_peminjaman = $_GET['id'];
$status = "Rejected";

$sql = $koneksi->query("SELECT * from peminjaman INNER JOIN barang ON peminjaman.kode_barang=barang.kode where id_peminjaman = '$id_peminjaman'");

$ambil = mysqli_fetch_array($sql);
$kode = $ambil['kode_barang'];
$stock = $ambil['jumlah'];
$jumlah_pinjam = $ambil['jumlah_pinjam'];

$total = $stock+$jumlah_pinjam;

$sql = $koneksi->query("UPDATE barang set jumlah='$total' where kode='$kode'");
$sql1 = $koneksi->query("UPDATE peminjaman set status='$status' where id_peminjaman='$id_peminjaman'");


if ($sql && $sql1) {
    ?>
        <script type="text/javascript">

            alert ("Ditolak");
            window.location.href="/manpro/?page=peminjaman";

        </script>
    <?php
    }

?>
