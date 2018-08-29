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
		//ini_set('display_errors', 1);
	    //ini_set('display_startup_errors', 1);
        //error_reporting(E_ALL);
		//ambil data barang relasi ke suplier
		//buat koneksi
		$conection = new mysqli("localhost", "root", "", "db_toko");
		//cek koneksi
		if ($conection->connect_error) {
			die("Connection failed: " . $conection->connect_error);
		}
		
		//get data supplier
		$id = $_GET['id'];
		$sql_sup   = "SELECT * FROM supllier WHERE suplierId='$id'";
		$query_sup = $conection->query($sql_sup);
		while($row_sup=$query_sup->fetch_array()){
			$suplierIdView 		= $row_sup['suplierId'];
			$suplierNamaView 	= $row_sup['suplierNama'];
			$suplierAlamatView 	= $row_sup['suplierAlamat'];
			$suplierKotaView 	= $row_sup['suplierKota'];
			$suplierTeleponView = $row_sup['suplierTelepon'];
		}
		
		//post data parameter
		$suplierId 		= $_POST['suplierId'];
		$suplierNama    = $_POST['suplierNama'];
		$suplierAlamat 	= $_POST['suplierAlamat'];
		$suplierKota 	= $_POST['suplierKota'];
		$suplierTelepon = $_POST['suplierTelepon'];
		
		if(!empty($suplierId)){
			$sql_update = "UPDATE supllier SET 
						  suplierNama='$suplierNama', 
						  suplierAlamat='$suplierAlamat',
						  suplierKota='$suplierKota',
						  suplierTelepon='$suplierTelepon'
						  WHERE suplierId='$suplierId'";

			if ($conection->query($sql_update) === TRUE) {
				echo "Update successfully";
				header("Location: supplier.php");
			} else {
				echo "Error: " . $sql_update . "<br>" . $conection->error;
			}
		} 
		
	?>
    <!-- Page Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h1 class="mt-5">FORM EDIT SUPPLIER</h1>
			<form class="form-horizontal" method="POST" action="edit_supplier.php">
			  <div class="form-group">
				<input type="text" class="form-control" name="suplierId" value="<?php echo $suplierIdView; ?>" style="width: 120px;" readonly>
			  </div>
			  <div class="form-group">
				<input type="text" class="form-control" name="suplierNama" value="<?php echo $suplierNamaView; ?>" style="width: 320px;" required>
			  </div>
			  <div class="form-group">
				<input type="text" class="form-control" name="suplierAlamat" value="<?php echo $suplierAlamatView; ?>" style="width: 520px;" required>
			  </div>
			  <div class="form-group">
				<input type="text" class="form-control" name="suplierKota" value="<?php echo $suplierKotaView; ?>" style="width: 220px;" required>
			  </div>
			  <div class="form-group">
				<input type="text" class="form-control" name="suplierTelepon" value="<?php echo $suplierTeleponView; ?>" style="width: 320px;" required>
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
