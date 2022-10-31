<?php
	class database {
		private $dbhost;
		private $dbuser;
		private $dbpass;
		private $dbname;

		function __construct($a, $b, $c, $d){
			$this->dbhost = $a;
			$this->dbuser = $b;
			$this->dbpass = $c;
			$this->dbname = $d;
		}

	function conn_mysql(){
		$konek_db = mysqli_connect($this->dbhost,$this->dbuser,$this->dbpass,$this->dbname);
		return  $konek_db;
	}
}

		class barang{
			public $kode;
			public $nama;
			public $merk;
			public $satuan;
			public $keterangan;
			public $kondisi;
			public $depresiasi;
			public $lama;
			public $harga;
			public $lokasi;
			public $jumlah;

		function set_all($set_kode, $set_nama, $set_merk, $set_satuan, $set_keterangan, $set_kondisi, $set_depresiasi, $set_lama, $set_harga, $set_lokasi, $set_jumlah){
			$this->kode = $set_kode;
			$this->nama = $set_nama;
			$this->merk = $set_merk;
			$this->satuan = $set_satuan;
		}

		function get_kode(){
			return $this->kode;
		}
		function get_nama(){
			return $this->nama;
		}
		function get_merk(){
			return $this->merk;
		}
		function get_satuan(){
			return $this->satuan;
		}
		function get_keterangan(){
			return $this->keterangan;
		}
		function get_kondisi(){
			return $this->kondisi;
		}
		function get_depresiasi(){
			return $this->depresiasi;
		}
		function get_lama(){
			return $this->lama;
		}
		function get_harga(){
			return $this->harga;
		}
		function get_lokasi(){
			return $this->lokasi;
		}
		function get_jumlah(){
			return $this->jumlah;
		}

			
		function tambahbarang($koneksi, $kode, $nama, $merk, $satuan, $keterangan, $kondisi, $depresiasi, $lama, $harga, $lokasi, $jumlah){
			$sql = mysqli_query($koneksi, "INSERT into barang (kode, nama, merk, satuan, keterangan, kondisi, depresiasi, lama, harga, lokasi, jumlah) values ('$kode', '$nama', '$merk', '$satuan', '$keterangan', '$kondisi', '$depresiasi', '$lama', '$harga', '$lokasi', '$jumlah');");
			if($sql){
						?>
					<script type="text/javascript">
						
						alert ("Data Berhasil Ditambah")
						window.location.href="/rpl/?page=barang";

					</script><?php	
			}
		}

		function tambahpinjam($koneksi, $id_peminjam, $kode_barang, $jumlah, $tgl_pinjam, $tgl_kembali){
            $data = mysqli_query($koneksi,"SELECT * from barang where kode='$kode_barang'");
			$ambil = mysqli_fetch_array($data);
			$stock = $ambil['jumlah'];
			$sisa = $stock-$jumlah;

			$sql = mysqli_query($koneksi, "INSERT into peminjaman (id_peminjam, kode_barang, jumlah_pinjam, tgl_pinjam, batas, status) values ('$id_peminjam', '$kode_barang', '$jumlah', '$tgl_pinjam', '$tgl_kembali', 'Pending');");
			$sql1 = $koneksi->query("UPDATE barang set jumlah='$sisa' where kode='$kode_barang'");
			if($sql && $sql1){
						?>
					<script type="text/javascript">
						
						alert ("Data Berhasil Ditambah")
						window.location.href="/rpl/?page=peminjaman";

					</script><?php	
			}
		}

		function updatebarang($koneksi, $id, $kode, $nama, $merk, $satuan, $keterangan, $kondisi, $depresiasi, $lama, $harga, $lokasi, $jumlah){
			$sql = mysqli_query($koneksi, "UPDATE barang set kode='$kode', nama='$nama', merk='$merk', satuan='$satuan', keterangan='$keterangan', kondisi='$kondisi', depresiasi='$depresiasi', lama='$lama', harga='$harga', lokasi='$lokasi', jumlah='$jumlah' where id='$id'");
			if($sql){
						?>
					<script type="text/javascript">
						
						alert ("Update Data Berhasil")
						window.location.href="/rpl/?page=barang";

					</script><?php	
			}
		}

		function hapusbarang($koneksi, $id){
			$sql = mysqli_query($koneksi, "DELETE from barang where id = '$id'");
			if($sql){
						?>
					<script type="text/javascript">
						
						alert ("Data Berhasil Dihapus")
						window.location.href="/rpl/?page=barang";

					</script><?php	
			}
		}
	}

      $host = '127.0.0.1';
      $user = 'root';
      $pass = '';
      $db = 'rpl';
      $db = new database($host,$user,$pass,$db);
      $koneksi = $db->conn_mysql();


	if (isset($_POST['submit'])){
		    $post_kode = $_POST['kode'];
		    $post_nama = $_POST['nama'];
		    $post_merk = $_POST['merk'];
		    $post_satuan = $_POST['satuan'];
		    $post_keterangan = $_POST['keterangan'];
		    $post_kondisi = $_POST['kondisi'];
		    $post_depresiasi = $_POST['depresiasi'];
		    $post_lama = $_POST['lama'];
		    $post_harga = $_POST['harga'];
		    $post_lokasi = $_POST['lokasi'];
		    $post_jumlah = $_POST['jumlah'];

		$tes = new barang;

		$tes->tambahbarang($koneksi, $post_kode, $post_nama, $post_merk, $post_satuan, $post_keterangan, $post_kondisi, $post_depresiasi, $post_lama, $post_harga, $post_lokasi, $post_jumlah);
	}

	if (isset($_POST['pinjam'])){
		    $post_id_peminjam = $_POST['id_peminjam'];
		    $post_kode_barang = $_POST['kode_barang'];
		    $post_jumlah = $_POST['jumlah'];
		    $post_tgl_pinjam = $_POST['tgl_pinjam'];
		    $post_tgl_kembali = $_POST['tgl_kembali'];

		$pinjam = new barang;

		$pinjam->tambahpinjam($koneksi, $post_id_peminjam, $post_kode_barang, $post_jumlah, $post_tgl_pinjam, $post_tgl_kembali);
	}


        function tampildata($koneksi){
        $tampil = mysqli_query($koneksi, "SELECT * from barang");

        while($d = mysqli_fetch_array($tampil)){
	      ?>
	      <td><?= $d["kode"] ?></td>
	      <td><?= $d["nama"] ?></td>
	      <td><?= $d["merk"] ?></td>
	      <td><?= $d["satuan"] ?></td>
	      <td><?= $d["keterangan"] ?></td>
	      <td><?= $d["kondisi"] ?></td>
	      <td><?= $d["depresiasi"] ?></td>
	      <td><?= $d["lama"] ?></td>
	      <td><?= $d["harga"] ?></td>
	      <td><?= $d["lokasi"] ?></td>
	      <td><?= $d["jumlah"] ?></td>
	      <td><?= $d["tgl_input"] ?></td>

	      <td>
        	<form method="post" action="function.php">
		  	<a class="btn btn-primary btnset2" href="?page=barang&tindakan=edit&id=<?= $d["id"] ?>">Edit</a>
        	<input type="hidden" name="id" value="<?= $d["id"] ?>">
		  	<input type="submit" name="delete" class="btn btn-danger" value="Delete" onclick = "return confirm('Hapus Data ?')">
		  </td>
		  	</form>
	    </tr>
	      <?php
	       }}


        function tampilpinjam($koneksi){
        $tampil = mysqli_query($koneksi, "SELECT * from peminjaman INNER JOIN barang ON peminjaman.kode_barang=barang.kode INNER JOIN user ON peminjaman.id_peminjam=user.id");

        while($d = mysqli_fetch_array($tampil)){
	      ?>
	      <td>PJ0<?= $d["id_peminjaman"] ?></td>
	      <td><?= $d["nama_user"] ?></td>
	      <td><?= $d["kode_barang"] ?></td>
	      <td><?= $d["nama"] ?></td>
	      <td><?= $d["jumlah_pinjam"] ?></td>
	      <td><?= $d["tgl_pinjam"] ?></td>
	      <td><?= $d["batas"] ?></td>
	      <td><?= $d["tgl_kembali"] ?></td>
	      <td><?= $d["kondisi_awal"] ?></td>
	      <td><?= $d["kondisi_kembali"] ?></td>
	      <td><?= $d["terlambat"] ?></td>
	      <td><?= $d["denda"] ?></td>
	      <td><?= $d["status"] ?></td>

	      <td>
	      	<?php 
                if ($_SESSION['admin'] || $_SESSION['superadmin']) { 
                    $stat = $d['status'];
                    if($stat == "Pending"){
	      	?>
		  	<a class="btn btn-success btnset2" href="/rpl/page/peminjaman/approve.php?id=<?= $d["id_peminjaman"] ?>">Terima</a>
		  	<a class="btn btn-danger btnset2" href="/rpl/page/peminjaman/reject.php?id=<?= $d["id_peminjaman"] ?>">Tolak</a>
		  	<?php 
		  		}else if($stat == "Booked"){
	      	?>
		  	<a class="btn btn-success btnset2" href="?page=peminjaman&tindakan=confirm&id=<?= $d["id_peminjaman"] ?>">Konfirmasi</a>
		  	<a class="btn btn-danger btnset2" href="/rpl/page/peminjaman/cancel.php?id=<?= $d["id_peminjaman"] ?>">Batalkan</a>
		  	<?php 
		  		}else if($stat == "Process"){
	      	?>
		  	<a class="btn btn-success btnset2" href="?page=peminjaman&tindakan=return&id=<?= $d["id_peminjaman"] ?>">Kembalikan</a>
		  	<a class="btn btn-danger btnset2" href="?page=peminjaman&tindakan=lost&id=<?= $d["id_peminjaman"] ?>">Hilang</a>
		  <?php }else{} ?>
		  </td>
		  	</form>
	    </tr>
	      <?php
	       }}}

	    function tampiluser($koneksi){
        $tampil = mysqli_query($koneksi, "SELECT * from user where role = 'user'");
        $no = 1;

        while($d = mysqli_fetch_array($tampil)){
	      ?>
	      <td><?= $no++ ?></td>
	      <td><?= $d["nama_user"] ?></td>
	      <td><?= $d["email"] ?></td>
	      <td><?= $d["password"] ?></td>
	      <td>
        	<form method="post" action="function.php">
		  	<a class="btn btn-primary btnset2" href="?page=barang&tindakan=edit&id=<?= $d["id"] ?>">Edit</a>
        	<input type="hidden" name="id" value="<?= $d["id"] ?>">
		  	<input type="submit" name="delete" class="btn btn-danger" value="Delete" onclick = "return confirm('Hapus Data ?')">
		  </td>
		  	</form>
	    </tr>
	      <?php
	       }}


	if (isset($_POST['delete'])){
		    $post_id = $_POST['id'];

		$hapus = new barang;
		$hapus->hapusbarang($koneksi, $post_id);
	}

	if (isset($_POST['update'])){
		    $post_id = $_POST['id'];	
		    $post_kode = $_POST['kode'];
		    $post_nama = $_POST['nama'];
		    $post_merk = $_POST['merk'];
		    $post_satuan = $_POST['satuan'];
		    $post_keterangan = $_POST['keterangan'];
		    $post_kondisi = $_POST['kondisi'];
		    $post_depresiasi = $_POST['depresiasi'];
		    $post_lama = $_POST['lama'];
		    $post_harga = $_POST['harga'];
		    $post_lokasi = $_POST['lokasi'];
		    $post_jumlah = $_POST['jumlah'];

		$update = new barang;

		$update->updatebarang($koneksi, $post_id, $post_kode, $post_nama, $post_merk, $post_satuan, $post_keterangan, $post_kondisi, $post_depresiasi, $post_lama, $post_harga, $post_lokasi, $post_jumlah);
	}
?>