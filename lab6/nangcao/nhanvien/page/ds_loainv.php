<?php 
    include("../include/ketnoi.php");
    $sql = "SELECT * FROM loai_nv";
    $ketqua = mysqli_query($ketnoi,$sql);
?>

<div style="padding:20px">
    <h2>Danh sách loại nhân viên</h2>
    <hr width="100%" color="black" style="opacity: 30%;">
</div>



<div class='container'>
    <div style='height:70vh;overflow-y:scroll'>
        <table id='customers'>
            <tr class='sticky-top' style='top:-1px'>
                <th>ID</th>
                <th>Tên Loại Nhân Viên</th>
            </tr>

            <?php
            if(mysqli_num_rows($ketqua)>0)
            {
                while($row = mysqli_fetch_assoc($ketqua))
                {
                    $id        = $row['id_loainv'];
                    $tenloai        = $row['tenloai_nv'];
        ?>
            <tr>
                <td><?php echo $id;?></td>
                <td><?php echo $tenloai  ;?></td>
            </tr>
            <?php
                }
            }
        ?>

        </table>
    </div>
</div>