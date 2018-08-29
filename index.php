<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>TOKO INDONESIA</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
      <div class="container">
        <a class="navbar-brand" href="#">Toko Indonesia</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="barang.php">Barang</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="supplier.php">Supplier</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <?php
		//ambil data barang relasi ke suplier
		//buat koneksi
		$conection = new mysqli("localhost", "root", "", "db_toko");
		//cek koneksi
		if ($conection->connect_error) {
			die("Connection failed: " . $conection->connect_error);
		}
		//sql query
		$sql = "SELECT 
					barangId, barangKategori, barangNama, barangHarga, barangStok, suplierNama 
				FROM barang 
					LEFT JOIN supllier ON barang.barangSuplier=supllier.suplierId
				ORDER BY 
					barangId";
		$query = $conection->query($sql);
	?>
    <!-- Page Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h1 class="mt-5">DAFTAR BARANG</h1>
          <table class="table table-striped">
			<tr>
				<th>ID BARANG</th>
				<th>KATEGORI</th>
				<th>NAMA BARANG</th>
				<th>HARGA</th>
				<th>STOK</th>
				<th>SUPPLIER</th>
			</tr>
	<?php 
		if($query->num_rows > 0){
			while($row=$query->fetch_array()){
	?>
			<tr>
				<td><?php echo $row['barangId']; ?></td>
				<td><?php echo $row['barangKategori']; ?></td>
				<td><?php echo $row['barangNama']; ?></td>
				<td><?php echo $row['barangHarga']; ?></td>
				<td><?php echo $row['barangStok']; ?></td>
				<td><?php echo $row['suplierNama']; ?></td>
			</tr>
		<?php } ?>
	
	<?php } else { ?>
			<tr>
				<td colspan="6">Belum Ada Barang</td>
			</tr>
	<?php } ?>
		  </table>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
