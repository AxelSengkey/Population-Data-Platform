<?php
    if(isset($_GET['kode'])) $kode=$_GET["kode"];

    // $con=mysqli_connect("localhost","id17543566_ssip2021b","Ssip2021111-","id17543566_ssip2");
    $con=mysqli_connect("localhost","root","","hah_pdp");
    $sql = "SELECT p_photo FROM HAH_PDP WHERE id='".$kode."'";
    $read_query = mysqli_query($con,$sql);
    $data = mysqli_fetch_array($read_query);

    unlink('upload/'.$data[0]);

    $sql2 = "DELETE FROM HAH_PDP WHERE id='".$kode."'";
    $delete_query = mysqli_query($con,$sql2);
?>