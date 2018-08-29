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
              <a class="nav-link" href="index.php">Home
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
		
		//get data master supplier
		$sql = "SELECT * FROM supllier ORDER BY suplierId ASC";
		$query = $conection->query($sql);
		
		//post data parameter
		$barangId 		= $_POST['barangId'];
		$barangKategori = $_POST['barangKategori'];
		$barangNama 	= $_POST['barangNama'];
		$barangHarga 	= $_POST['barangHarga'];
		$barangStok 	= $_POST['barangStok'];
		$barangSuplier 	= $_POST['barangSuplier'];
		
		if(!empty($barangId)){
			$sql = "INSERT INTO barang (barangId, barangKategori, barangNama, barangHarga, barangStok, barangSuplier)
				VALUES ('$barangId', '$barangKategori', '$barangNama', '$barangHarga', '$barangStok', '$barangSuplier')";

			if ($conection->query($sql) === TRUE) {
				echo "New record created successfully";
				header("Location: barang.php");
			} else {
				echo "Error: " . $sql . "<br>" . $conection->error;
			}
		}
		
	?>
    <!-- Page Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h1 class="mt-5">FORM TAMBAH BARANG</h1>
			<form class="form-horizontal" method="POST" action="tambah_barang.php">
			  <div class="form-group">
				<input type="text" class="form-control" name="barangId" placeholder="Barang ID" style="width: 120px;" required>
			  </div>
			  <div class="form-group">
				<input type="text" class="form-control" name="barangKategori" placeholder="Kategori" style="width: 320px;" required>
			  </div>
			  <div class="form-group">
				<input type="text" class="form-control" name="barangNama" placeholder="Nama Barang" style="width: 520px;" required>
			  </div>
			  <div class="form-group">
				<input type="text" class="form-control" name="barangHarga" placeholder="Harga" style="width: 220px;" required>
			  </div>
			  <div class="form-group">
				<input type="text" class="form-control" name="barangStok" placeholder="Stok" style="width: 120px;" required>
			  </div>
			  <div class="form-group">
				<select class="form-control" name="barangSuplier" style="width: 320px;" required>
					<option value="0" selected="selected">Pilih Supplier</option>
					<?php 
						if($query->num_rows > 0){
							while($row=$query->fetch_array()){ 
					?>
						<option value="<?php echo $row['suplierId']; ?>"><?php echo $row['suplierNama']; ?></option>
					<?php 
							}
						} 
					?>
				</select>
			  </div>
			  <p style="float: right;">
				<button type="submit" class="btn btn-success">SIMPAN</button>
			  </p>
			</form>
          
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
