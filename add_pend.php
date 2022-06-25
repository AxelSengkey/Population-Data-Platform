<?php
    if(isset($_POST['nik'])) $nik=$_POST["nik"];
    if(isset($_POST['pName'])) $pName=$_POST["pName"];
    if(isset($_POST['pob'])) $pob=$_POST["pob"];
    if(isset($_POST['dob'])) $dob=$_POST["dob"];
    if(isset($_POST['gender'])) $gender=$_POST["gender"];
    if(isset($_POST['adr'])) $adr=$_POST["adr"];
    if(isset($_POST['rel'])) $rel=$_POST["rel"];
    if(isset($_POST['mar'])) $mar=$_POST["mar"];
    if(isset($_POST['job'])) $job=$_POST["job"];

    $response = 0;
    if(isset($_FILES['photo']['name'])) {     
        $filename = $_FILES['photo']['name'];
        $location = 'upload/'.$filename;
        if(move_uploaded_file($_FILES['photo']['tmp_name'],$location)) {
            $response = 1;
        }
    }
    echo $response;


    //$con=mysqli_connect("localhost","id17543566_ssip2021b","Ssip2021111-","id17543566_ssip2");
    $con=mysqli_connect("localhost","root","","hah_pdp");
    $sql="INSERT INTO HAH_PDP(p_nik,p_name,p_pob,p_dob,p_gender,p_adr,p_rel,p_mar,p_job,p_photo) VALUES('$nik','$pName','$pob','$dob','$gender','$adr','$rel','$mar','$job','$filename')";
    $create_query=mysqli_query($con,$sql);
?>