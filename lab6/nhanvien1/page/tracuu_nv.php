<?php
include("../include/head.php");
$rowsPerPage = 3; //số mẩu tin trên mỗi trang, giả sử là 10
if (!isset($_GET['page'])) {
    $_GET['page'] = 1;
}
$offset = ($_GET['page'] - 1) * $rowsPerPage;
$page_hientai = $_GET['page'];
$sql = "SELECT * FROM loai_nv";
$loai_nv = mysqli_query($ketnoi, $sql);
$sql = "SELECT * FROM phongban";
$phongban = mysqli_query($ketnoi, $sql);
if(isset($_GET['tracuu'])||isset($_SESSION['tracuu']))
{
    if(isset($_GET['tracuu']))
    {
        $_SESSION['tracuu'] = $_GET['tracuu'];
    }
        
    if(isset($_GET['hoten']))
    {
        $_SESSION['hoten'] = $_GET['hoten'];

    }
        
    if(isset($_GET['loainv']))
    {
        $_SESSION['loainv'] = $_GET['loainv'];
        
    }
       
    if(isset($_GET['phongban']))
    {
        $_SESSION['phongban'] = $_GET['phongban'];
       
    }
        

    if(isset($_SESSION['hoten'])&&isset($_SESSION['phongban'])&&isset($_SESSION['loainv']))
    {
        if($_SESSION['hoten']!=""||$_SESSION['phongban']!=""||$_SESSION['loainv']!="")
        {
            $tu_khoa = $_SESSION['hoten'];
            $tu_khoa = str_replace(" ","%",$tu_khoa);
            $id_phongban = $_SESSION['phongban'];
            $id_loainv = $_SESSION['loainv'];
            $sql = "SELECT * FROM nhanvien a,loai_nv b,phongban c WHERE a.id_loainv=b.id_loainv and a.id_phong = c.id_phong and CONCAT_WS(' ',ho_nv, ten_nv) like '%$tu_khoa%' and a.id_phong like '%$id_phongban%' and a.id_loainv like '%$id_loainv%' ORDER BY id_nv DESC LIMIT $offset,$rowsPerPage";
            $ketqua = mysqli_query($ketnoi,$sql);
            
            $sql_sodong = "SELECT * FROM nhanvien a,loai_nv b,phongban c WHERE a.id_loainv=b.id_loainv and a.id_phong = c.id_phong and CONCAT_WS(' ',ho_nv, ten_nv) like '%$tu_khoa%' and a.id_phong like '%$id_phongban%' and a.id_loainv like '%$id_loainv%' ORDER BY id_nv DESC";
            $ketqua_sodong = mysqli_query($ketnoi, $sql_sodong);
            $sodong = mysqli_num_rows($ketqua_sodong);
            $page = ceil($sodong / $rowsPerPage);
        }
        else
        {
            $sql = "SELECT * FROM nhanvien a,loai_nv b,phongban c WHERE a.id_loainv=b.id_loainv and a.id_phong = c.id_phong ORDER BY id_nv DESC LIMIT $offset,$rowsPerPage";
            $ketqua = mysqli_query($ketnoi,$sql);
            $sql_sodong = "SELECT * FROM nhanvien a,loai_nv b,phongban c WHERE a.id_loainv=b.id_loainv and a.id_phong = c.id_phong ORDER BY id_nv DESC";
            $ketqua_sodong = mysqli_query($ketnoi, $sql_sodong);
            $sodong = mysqli_num_rows($ketqua_sodong);
            $page = ceil($sodong / $rowsPerPage);
        }
    }
    else
    {
        $sql = "SELECT * FROM nhanvien a,loai_nv b,phongban c WHERE a.id_loainv=b.id_loainv and a.id_phong = c.id_phong ORDER BY id_nv DESC LIMIT $offset,$rowsPerPage";
        $ketqua = mysqli_query($ketnoi,$sql);

        $sql_sodong = "SELECT * FROM nhanvien a,loai_nv b,phongban c WHERE a.id_loainv=b.id_loainv and a.id_phong = c.id_phong ORDER BY id_nv DESC";
        $ketqua_sodong = mysqli_query($ketnoi, $sql_sodong);
        $sodong = mysqli_num_rows($ketqua_sodong);
        $page = ceil($sodong / $rowsPerPage);
    }
}
else
{
    $sql = "SELECT * FROM nhanvien a,loai_nv b,phongban c WHERE a.id_loainv=b.id_loainv and a.id_phong = c.id_phong ORDER BY id_nv DESC LIMIT $offset,$rowsPerPage";
    $ketqua = mysqli_query($ketnoi, $sql);

    $sql_sodong = "SELECT * FROM nhanvien a,loai_nv b,phongban c WHERE a.id_loainv=b.id_loainv and a.id_phong = c.id_phong ORDER BY id_nv DESC";
    $ketqua_sodong = mysqli_query($ketnoi, $sql_sodong);
    $sodong = mysqli_num_rows($ketqua_sodong);
    $page = ceil($sodong / $rowsPerPage);
}

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
        <div id='tracuu_nv' onclick="tracuu()" class="like flex-doc gian-doc clicked">
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
        <div><button onclick="dangxuat()" class='btn font-lato-heavy'
                style='background-color:rgb(62, 59, 105);position:relative;top:60px;width:250px;height:50px'>Đăng
                Xuất</button></div>
    </div>

    <div id='content' style="margin-left:275px;">

        <div style="padding:20px">
            <h2>Tra cứu nhân viên</h2>
            <hr width="100%" color="black" style="opacity: 30%;">
        </div>
        <div class='flex-ngang'>
            <div class='form-outline-black w-50'>
                <div class='flex-ngang'>
                    <div class="row no-gutters w-100 ">
                        <div class='col-md-6'>
                            <div class="form-outline-black flex-doc">
                                <span class="material-icons-outlined color-black">manage_accounts</span>
                                <select
                                    class='font-lato-heavy color-black form-select w-100' id='loai_nv' name='loai_nv'
                                    required>
                                    <option value="" disabled selected>Loại Nhân Viên</option>
                                    <?php
                                    if (mysqli_num_rows($loai_nv) > 0) {
                                        while ($row = mysqli_fetch_assoc($loai_nv)) {
                                            $id         = $row['id_loainv'];
                                            $tenloai    = $row['tenloai_nv'];
                                            if($id == $_SESSION['loainv'])
                                                echo "<option value='$id' selected>$id - $tenloai</option>";
                                            else
                                                echo "<option value='$id'>$id - $tenloai</option>";
                                        }
                                    }
                                    ?>
                                    <option value="">Tất cả</option>
                                </select>
                            </div>
                        </div>
                        <div class='col-md-6'>
                            <div class="form-outline-black flex-doc">
                                <span class="material-icons-outlined color-black">room_preferences</span>
                                <select
                                    class='font-lato-heavy color-black form-select w-100' id='phongban_nv'
                                    name='phongban_nv' required>
                                    <option value="" disabled selected>Chọn Phòng Ban</option>
                                    <?php
                                    if (mysqli_num_rows($phongban) > 0) {
                                        while ($row = mysqli_fetch_assoc($phongban)) {
                                            $id         = $row['id_phong'];
                                            $tenphong   = $row['tenphong'];
                                            if($id == $_SESSION['phongban'])
                                                echo "<option value='$id' selected>$id - $tenphong</option>";
                                            else
                                                echo "<option value='$id'>$id - $tenphong</option>";
                                        }
                                    }
                                    ?>
                                    <option value="">Tất cả</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class='flex-ngang'>
                    <div class="row no-gutters">
                        <div class='col-md-12'>
                            <div class="form-outline-black flex-doc">
                                <span class="material-icons-outlined color-black">face</span>
                                <input class='font-lato-heavy color-black w-100' type="text"
                                    id='ten_nv' value="<?php if(isset($_SESSION['hoten'])) echo $_SESSION['hoten']; ?>" name='ten_nv' placeholder="Họ tên nhân viên..." required />
                            </div>
                        </div>
                    </div>
                </div>
                <button class='btn btn-success w-100' onclick="tracuu_nhanvien()">Tra Cứu</button>
            </div>
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
                    <td><img src="../anh_nv/<?php echo $anh ?>" style='object-fit:cover;border-radius:50%' width='50px'
                            height='50px' />
                    </td>
                    <td><?php echo $loai; ?></td>
                    <td><?php echo $phong; ?></td>
                </tr>
                        <?php
                                }
                            }
                            ?>
                <tr class='flex-ngang'>
                        <?php if ($page_hientai != 1) { ?>
                        <!-- Trang đầu -->
                        <a style='padding:10px;<?php echo "color:blue"; ?>'
                            href="http://localhost/baitap/lab6/nhanvien1/page/tracuu_nv.php?page=1">Trang Đầu</a>
                        <!-- Trang trước -->

                        <a style='padding:10px;<?php echo "color:blue"; ?>'
                            href="http://localhost/baitap/lab6/nhanvien1/page/tracuu_nv.php?page=<?php echo $page_hientai - 1; ?>">Trang
                            Trước</a>
                        <?php } ?>

                        <!-- Các trang thành phần -->
                        <?php
                    for ($i = 1; $i <= $page; $i++) {
                    ?>
                        <a style='padding:10px;<?php if ($i == $_GET['page']) {
                                                    echo "color:red";
                                                }else echo "color:blue"; ?>'
                            href="http://localhost/baitap/lab6/nhanvien1/page/tracuu_nv.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                        <?php
                    }
                    ?>

                        <!-- Trang sau -->
                        <?php if ($page_hientai != $page) { ?>
                        <a style='padding:10px;<?php echo "color:blue"; ?>'
                            href="http://localhost/baitap/lab6/nhanvien1/page/tracuu_nv.php?page=<?php echo $page_hientai + 1; ?>">Trang
                            Sau</a>


                        <!-- Trang cuối    -->
                        <a style='padding:10px;<?php echo "color:blue";?>'
                            href="http://localhost/baitap/lab6/nhanvien1/page/tracuu_nv.php?page=<?php echo $page; ?>">Trang
                            Cuối</a>
                        <?php } ?>
                </tr>
            </table>
            
        </div>
    </div>
</body>
<script src="../js/index.js"></script>

</html>