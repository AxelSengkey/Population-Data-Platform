<?php
    $no = 1;
    //$con=mysqli_connect("localhost","id17543566_ssip2021b","Ssip2021111-","id17543566_ssip2");
    $con=mysqli_connect("localhost","root","","hah_pdp");
    $sql="SELECT id,p_nik,p_name,p_pob,p_dob,p_gender,p_adr,p_rel,p_mar,p_job,p_photo FROM HAH_PDP";
    $read_query=mysqli_query($con,$sql);

    while ($data = $read_query->fetch_assoc()) {
?>

        <tr>
            <td>
                <?php echo $no++; ?>
            </td>
            <td>
                <?php echo $data['p_nik']; ?>
            </td>
            <td>
                <?php echo $data['p_name']; ?>
            </td>
            <td>
                <?php echo $data['p_pob']; ?>,
                <?php echo $data['p_dob']; ?>
            </td>
            <td>
                <?php echo $data['p_gender']; ?>
            </td>
            <td>
                <?php echo $data['p_adr']; ?>
            </td>
            <td>
                <?php echo $data['p_rel']; ?>
            </td>
            <td>
                <?php echo $data['p_mar']; ?>
            </td>
            <td>
                <?php echo $data['p_job']; ?>
            </td>
            <td>
                <img src="upload/<?php echo $data['p_photo']; ?>" width="150">
            </td>

            <td>
                <?php $kode = $data['id']; ?>
                <a href="edit_pend.php?kode=<?php echo $kode; ?>" title="Ubah" class="btn btn-success btn-sm">
                    <i class="fa fa-edit"></i>
                </a>
                <a href="" onclick="del(<?php echo $kode; ?>);" title="Hapus" class="btn btn-danger btn-sm">
                    <i class="fa fa-trash"></i>
                </a>
            </td>
        </tr>

        <?php
    }
?>