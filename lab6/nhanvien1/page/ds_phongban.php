<?php
include("../include/head.php");
$sql = "SELECT * FROM phongban";
    $ketqua = mysqli_query($ketnoi,$sql);
?>

<body>
    <div class="nav-bar">
        <div style="width:100%;height:75px" class="flex-ngang flex-doc">
            <div style="color:white">
                <h4 class='font-lato-heavy'>Chào bạn, <?php echo $name_user; ?></h4>
            </div>
        </div>
        <div class="flex-ngang">
            <hr width="100%" color="white" style="opacity: 30%;">
        </div>
        <div id='ds_nv' onclick="danhsach()" class="like flex-doc gian-doc">
            <span class="material-icons-outlined" style="font-size: 2.5em;">toc</span>
            <span>Danh sách nhân viên</span>
        </div>
        <hr width="50%" color="white" style="opacity: 30%;">
        <div id='them_nv' onclick="them()" class="like flex-doc gian-doc">
            <span class="material-icons-outlined" style="font-size: 2.5em;">person_add</span>
            <span>Thêm</span>
        </div>
        <hr width="50%" color="white" style="opacity: 30%;">
        <div id='tracuu_nv' onclick="tracuu()" class="like flex-doc gian-doc">
            <span class="material-icons-outlined" style="font-size: 2.5em;">search</span>
            <span>Tra cứu nhân viên</span>
        </div>
        <hr width="50%" color="white" style="opacity: 30%;">
        <div id='ds_loainv' onclick="loainv()" class="like flex-doc gian-doc">
            <span class="material-icons-outlined" style="font-size: 2.5em;">toc</span>
            <span>Loại nhân viên</span>
        </div>
        <hr width="50%" color="white" style="opacity: 30%;">
        <div id='ds_phongban' onclick="phongban()" class="like flex-doc gian-doc clicked">
            <span class="material-icons-outlined" style="font-size: 2.5em;">toc</span>
            <span>Phòng Ban</span>
        </div>
        <div><button onclick="dangxuat()" class='btn font-lato-heavy'
                style='background-color:rgb(62, 59, 105);position:relative;top:60px;width:250px;height:50px'>Đăng
                Xuất</button></div>
    </div>
    <div id='content' style="margin-left:275px;">
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
                    $id        = $row['id_phong'];
                    $tenloai        = $row['tenphong'];
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
    </div>
</body>
<script src="../js/index.js"></script>

</html>