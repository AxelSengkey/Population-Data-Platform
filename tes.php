<?php
    $s_keyword="";
    if (isset($_POST['s_keyword'])) $s_keyword=$_POST['s_keyword'];
    $search_keyword = '%'.$s_keyword.'%';
    $no = 1;
    //$con=mysqli_connect("localhost","id17543566_ssip2021b","Ssip2021111-","id17543566_ssip2");
    $con=mysqli_connect("localhost","root","","hah_pdp");
    $sql="SELECT * FROM HAH_PDP WHERE id LIKE ? OR p_nik LIKE ? OR p_name LIKE ? OR p_pob LIKE ? OR p_dob LIKE ? OR p_gender LIKE ? OR p_adr LIKE ? OR p_rel LIKE ? OR p_mar LIKE ? OR p_job LIKE ? OR p_photo LIKE ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param('sssssssssss', $search_keyword, $search_keyword, $search_keyword, $search_keyword, $search_keyword, $search_keyword, $search_keyword, $search_keyword, $search_keyword, $search_keyword, $search_keyword);
    $stmt->execute();
    $res1 = $stmt->get_result();
    echo($s_keyword);

    if ($res1->num_rows > 0) {
        while ($data = $res1->fetch_assoc()) {
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
    } else {
?> 
        <tr>
            <td colspan='11'>Tidak ada data ditemukan</td>
        </tr>
<?php
    }
?>