<?php
    if(isset($_GET['kode'])) $kode=$_GET["kode"];
	//$con=mysqli_connect("localhost","id17543566_ssip2021b","Ssip2021111-","id17543566_ssip2");
	$con=mysqli_connect("localhost","root","","hah_pdp");
	$sql = "SELECT * FROM HAH_PDP WHERE id='".$kode."'";
	$read_query=mysqli_query($con,$sql);
	$data = mysqli_fetch_array($read_query);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HAH Population Data</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="dist/css/adminlte.min.css">
	<!-- Select2 -->
	<link rel="stylesheet" href="plugins/select2/css/select2.min.css">
	<link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<!-- Alert -->
	<script src="plugins/alert.js"></script>
	<script src="edit_code.php"></script>
</head>
<body onload="view($kode)">
	<!-- Site wrapper -->
	<div>
		<!-- Navbar -->
		<nav class="navbar navbar-red navbar-light">

			<!-- SEARCH FORM -->
			<ul class="navbar-nav ml-auto">
				<li class="nav-item d-none d-sm-inline-block">
					<a href="index.html" class="nav-link">
						<font color="white">
							<b>POPULATION DATA PLATFORM</b>
						</font>
					</a>
				</li>
			</ul>

		</nav>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->


		<!-- Content Wrapper. Contains page content -->
		<div>

			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">

                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fa fa-edit"></i> Ubah Data</h3>
                        </div>
                        <form id="pplForm" action="" method="post" enctype="multipart/form-data">
                        <div class="card-body">

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Id</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" id="id" name="id" value="<?php echo $kode; ?>" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">NIK</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="nik" name="nik" value="<?php echo $data['p_nik']; ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="pName" name="pName" value="<?php echo $data['p_name']; ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">TTL</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="pob" name="pob" value="<?php echo $data['p_pob']; ?>">
                                </div>
                                <div class="col-sm-3">
                                    <input type="date" class="form-control" id="dob" name="dob" value="<?php echo $data['p_dob']; ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-3">
                                    <select name="gender" id="gender" class="form-control">
                                        <option>- Pilih -</option>
                                        <?php
                                            if ($data['p_gender'] == "L") echo "<option value='L' selected>L</option>";
                                            else echo "<option value='L'>L</option>";

                                            if ($data['p_gender'] == "P") echo "<option value='P' selected>P</option>";
                                            else echo "<option value='P'>P</option>";
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="adr" name="adr" value="<?php echo $data['p_adr']; ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Agama</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="rel" name="rel" value="<?php echo $data['p_rel']; ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Status Perkawinan</label>
                                <div class="col-sm-3">
                                    <select name="mar" id="mar" class="form-control">
                                        <option>- Pilih -</option>
                                        <?php
                                            if ($data['p_mar'] == "Sudah") echo "<option value='Sudah' selected>Sudah</option>";
                                            else echo "<option value='Sudah'>Sudah</option>";

                                            if ($data['p_mar'] == "Belum") echo "<option value='Belum' selected>Belum</option>";
                                            else echo "<option value='Belum'>Belum</option>";
                                            
                                            if ($data['p_mar'] == "Cerai Mati") echo "<option value='Cerai Mati' selected>Cerai Mati</option>";
                                            else echo "<option value='Cerai Mati'>Cerai Mati</option>";

                                            if ($data['p_mar'] == "Cerai Hidup") echo "<option value='Cerai Hidup' selected>Cerai Hidup</option>";
                                            else echo "<option value='Cerai Hidup'>Cerai Hidup</option>";
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Pekerjaan</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="job" name="job" value="<?php echo $data['p_job']; ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Foto</label>
                                <div class="col-sm-6">
                                    <img id="preview" src="upload/<?php echo $data['p_photo']; ?>" width="150">
                                    <input type="file" id="photo" name="photo" onchange="PreviewImage()">
                                </div>
                            </div>

                        </div>
                        <div class="card-footer">
                            <input type="submit" name="Ubah" value="Simpan" class="btn btn-success" onclick="editPend()">
                            <a href="index.html" title="Kembali" class="btn btn-secondary">Kembali</a>
                        </div>
                        </form>
                    </div>
                        <!-- /.card-body -->

				</div>
			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->

		<footer>
			<div class="float-right d-none d-sm-block">
				Copyright &copy;
				<a target="_blank" href="">
					<strong> Ara-ara~</strong>
				</a>
				All rights reserved.
			</div>
			<b>HOHO~ 2021</b>
		</footer>
	</div>
    <script>
        function PreviewImage() {
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("photo").files[0]);

            oFReader.onload = function (oFREvent) {
                document.getElementById("preview").src = oFREvent.target.result;
            }
        }

        function editPend() {
            let x1 = new XMLHttpRequest();
            let pplForm = document.getElementById('pplForm');
            let formData = new FormData(pplForm);
            x1.open("POST","edit_pend_save.php",true);
            x1.send(formData);
            x1.onreadystatechange=function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                }
            }
        }
        
    </script>
	<!-- ./wrapper -->

	<!-- jQuery -->
	<script src="plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- Select2 -->
	<script src="plugins/select2/js/select2.full.min.js"></script>
	<!-- DataTables -->
	<script src="plugins/datatables/jquery.dataTables.js"></script>
	<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
	<!-- AdminLTE App -->
	<script src="dist/js/adminlte.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="dist/js/demo.js"></script>
	<!-- page script -->
	<script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>


</body>
</html>