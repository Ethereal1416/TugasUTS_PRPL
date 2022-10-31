<?php

require('../../function.php');

$id_peminjaman = $_GET['id'];
$status = "Booked";

$sql = $koneksi->query("UPDATE peminjaman set status='$status' where id_peminjaman='$id_peminjaman'");


if ($sql) {
    ?>
        <script type="text/javascript">

            alert ("Diterima");
            window.location.href="/manpro/?page=peminjaman";

        </script>
    <?php
    }

?>
