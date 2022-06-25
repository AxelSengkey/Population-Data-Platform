<?php
    if(isset($_POST['id'])) $kode=$_POST["id"];
    if(isset($_POST['nik'])) $nik=$_POST["nik"];
    if(isset($_POST['pName'])) $pName=$_POST["pName"];
    if(isset($_POST['pob'])) $pob=$_POST["pob"];
    if(isset($_POST['dob'])) $dob=$_POST["dob"];
    if(isset($_POST['gender'])) $gender=$_POST["gender"];
    if(isset($_POST['adr'])) $adr=$_POST["adr"];
    if(isset($_POST['rel'])) $rel=$_POST["rel"];
    if(isset($_POST['mar'])) $mar=$_POST["mar"];
    if(isset($_POST['job'])) $job=$_POST["job"];

    //$con=mysqli_connect("localhost","id17543566_ssip2021b","Ssip2021111-","id17543566_ssip2");
    $con=mysqli_connect("localhost","root","","hah_pdp");
    
    if ($_FILES['photo']['name'] == '') {
        $sql2="UPDATE HAH_PDP SET
            p_nik='$nik',
            p_name='$pName',
            p_pob='$pob',
            p_dob='$dob',
            p_gender='$gender',
            p_adr='$adr',
            p_rel='$rel',
            p_mar='$mar',
            p_job='$job'
            WHERE id='$kode'";
    } else {
        $sql = "SELECT p_photo FROM HAH_PDP WHERE id='".$kode."'";
        $read_query = mysqli_query($con,$sql);
        $data = mysqli_fetch_array($read_query);
        unlink('upload/'.$data[0]);   

        $response = 0;
        if(isset($_FILES['photo']['name'])) {  
            $filename = $_FILES['photo']['name'];
            $location = 'upload/'.$filename;
            if(move_uploaded_file($_FILES['photo']['tmp_name'],$location)) {
                $response = 1;
            }
        }
        echo $response;

        $sql2="UPDATE HAH_PDP SET
            p_nik='$nik',
            p_name='$pName',
            p_pob='$pob',
            p_dob='$dob',
            p_gender='$gender',
            p_adr='$adr',
            p_rel='$rel',
            p_mar='$mar',
            p_job='$job',
            p_photo='$filename'
            WHERE id='$kode'";
    }

    
    $read_query=mysqli_query($con,$sql2);
?>

