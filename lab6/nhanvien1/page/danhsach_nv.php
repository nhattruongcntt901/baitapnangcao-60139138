<?php
include("../include/head.php");
$rowsPerPage = 4; //số mẩu tin trên mỗi trang, giả sử là 10
if (!isset($_GET['page'])) {
    $_GET['page'] = 1;
}
$offset = ($_GET['page'] - 1) * $rowsPerPage;
$page_hientai = $_GET['page'];
$sql = "SELECT * FROM nhanvien a,loai_nv b,phongban c WHERE a.id_loainv=b.id_loainv and a.id_phong = c.id_phong ORDER BY id_nv DESC LIMIT $offset,$rowsPerPage";
$ketqua = mysqli_query($ketnoi, $sql);

$sql_sodong = "SELECT * FROM nhanvien a,loai_nv b,phongban c WHERE a.id_loainv=b.id_loainv and a.id_phong = c.id_phong ORDER BY id_nv DESC";
$ketqua_sodong = mysqli_query($ketnoi, $sql_sodong);
$sodong = mysqli_num_rows($ketqua_sodong);
$page = ceil($sodong / $rowsPerPage);

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
        <div id='ds_nv' onclick="danhsach()" class="like flex-doc gian-doc clicked">
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
        <div id='ds_phongban' onclick="phongban()" class="like flex-doc gian-doc">
            <span class="material-icons-outlined" style="font-size: 2.5em;">toc</span>
            <span>Phòng Ban</span>
        </div>
        <div><button onclick="dangxuat()" class='btn font-lato-heavy' style='background-color:rgb(62, 59, 105);position:relative;top:60px;width:250px;height:50px'>Đăng Xuất</button></div>
    </div>
    <div id='content' style="margin-left:275px;">
        <div style="padding:20px">
            <h2>Danh sách nhân viên</h2>
            <hr width="100%" color="black" style="opacity: 30%;">
        </div>



        <div class='container'>
            <table id='customers'>
                <tr>
                    <th>ID</th>
                    <th>Họ Tên</th>
                    <th>Ngày Sinh</th>
                    <th>Giới Tính</th>
                    <th>Địa chỉ</th>
                    <th>Ảnh</th>
                    <th>Loại NV</th>
                    <th>Phòng Ban</th>
                    <th>Chức năng</th>
                </tr>

                <?php
                if (mysqli_num_rows($ketqua) > 0) {
                    while ($row = mysqli_fetch_assoc($ketqua)) {
                        $id        = $row['id_nv'];
                        $ho        = $row['ho_nv'];
                        $ten       = $row['ten_nv'];
                        $gioitinh  = $row['gioitinh_nv'];
                        $ngaysinh  = $row['ns_nv'];
                        $diachi    = $row['diachi_nv'];
                        $anh       = $row['anh_nv'];
                        $loai      = $row['tenloai_nv'];
                        $phong     = $row['tenphong'];
                ?>
                        <tr>
                            <td><?php echo $id; ?></td>
                            <td width='220px'><?php echo $ho . " " . $ten; ?></td>
                            <td width='100px'><?php echo $ngaysinh; ?></td>
                            <td><?php if ($gioitinh == 0) echo "Nam";
                                else if ($gioitinh == 1) echo "Nữ";
                                else echo "Khác"; ?></td>
                            <td width='350px'><?php echo $diachi; ?></td>
                            <td><img src="../anh_nv/<?php echo $anh ?>" style='object-fit:cover;border-radius:50%' width='50px' height='50px' /></td>
                            <td><?php echo $loai; ?></td>
                            <td><?php echo $phong; ?></td>
                            <td width="100px"><a href="update_nv.php?id_nv=<?php echo $id; ?>" style='padding-right:10px;color:green' class="material-icons-outlined">edit</a><a href="../chucnang/delete_nv.php?id_nv=<?php echo $id; ?>" style='color:red' class="material-icons-outlined">delete</a></td>
                        </tr>
                <?php
                    }
                }
                ?>

            </table>
            <div>
                <?php if ($page_hientai != 1) { ?>
                    <!-- Trang đầu -->
                    <a style='padding:10px;<?php echo "color:blue"; ?>' href="http://localhost/baitapnhomphp/admin/dashboard_table_song.php?page=1">Trang Đầu</a>
                    <!-- Trang trước -->

                    <a style='padding:10px;<?php echo "color:blue"; ?>' href="http://localhost/baitapnhomphp/admin/dashboard_table_song.php?page=<?php echo $page_hientai - 1; ?>">Trang Trước</a>
                <?php } ?>

                <!-- Các trang thành phần -->
                <?php
                for ($i = 1; $i <= $page; $i++) {
                ?>
                    <a style='padding:10px;<?php if ($i == $_GET['page']) {
                                                echo "color:red";
                                            } else echo "color:blue"; ?>' href="http://localhost/baitapnhomphp/admin/dashboard_table_song.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                <?php
                }
                ?>

                <!-- Trang sau -->
                <?php if ($page_hientai != $page) { ?>
                    <a style='padding:10px;<?php echo "color:blue"; ?>' href="http://localhost/baitapnhomphp/admin/dashboard_table_song.php?page=<?php echo $page_hientai + 1; ?>">Trang Sau</a>


                    <!-- Trang cuối    -->
                    <a style='padding:10px;<?php echo "color:blue"; ?>' href="http://localhost/baitapnhomphp/admin/dashboard_table_song.php?page=<?php echo $page; ?>">Trang Cuối</a>
                <?php } ?>
            </div>
        </div>
    </div>
</body>
<script src="../js/index.js"></script>

</html>