<?php
include("../include/head.php");
if(isset($_GET['id_nv']))
{
    $id_nv = $_GET['id_nv'];
    $sql="SELECT * FROM nhanvien WHERE id_nv = $id_nv";
    $row = mysqli_fetch_assoc(mysqli_query($ketnoi,$sql));
    $ho_nv      = $row['ho_nv'];
    $ten_nv     = $row['ten_nv'];
    $ns_nv      = $row['ns_nv'];
    $gioitinh_nv= $row['gioitinh_nv'];
    $diachi_nv  = $row['diachi_nv'];
    $anh_nv     = $row['anh_nv'];
    $id_loainv  = $row['id_loainv'];
    $id_phongban= $row['id_phong'];


    $sql = "SELECT * FROM loai_nv";
    $loai_nv = mysqli_query($ketnoi, $sql);
    $sql = "SELECT * FROM phongban";
    $phongban = mysqli_query($ketnoi, $sql);
    
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
        <h2>Chỉnh sửa thông tin nhân viên</h2>
        <hr width="100%" color="black" style="opacity: 30%;">
    </div>

    <div class='flex-ngang'>
        <img src="../anh_nv/<?php echo $anh_nv;?>" style="border-radius:50%;object-fit:cover;height:150px;width: 150px;"/><br>
    </div>
    <div class='flex-ngang'>
        <span class='font-lato-heavy' style='color:black'>Ảnh đại diện</span>
    </div>
    
    <div class='container flex-ngang'>
        <form name='them_nv' class='w-75 form-outline-black' action="../chucnang/update_nv.php" method="post" enctype="multipart/form-data" style='padding:20px'>
            <div class="row no-gutters">
                <div class='col-md-6'>
                    <input value="<?php echo $id_nv;?>" class='d-none d-md-none' name='id_nv'>
                    <div class="form-outline-black flex-doc">
                        <span class="material-icons-outlined color-black">badge</span>
                        <input class='font-lato-heavy color-black w-100' value="<?php echo $ho_nv;?>" type="text" id='ho_nv' name='ho_nv' placeholder="Họ của bạn..." required />
                    </div>
                </div>
                <div class='col-md-6'>
                    <div class="form-outline-black flex-doc">
                        <span class="material-icons-outlined color-black">face</span>
                        <input class='font-lato-heavy color-black w-100' value="<?php echo $ten_nv;?>" type="text" id='ten_nv' name='ten_nv' placeholder="Tên của bạn..." required />
                    </div>
                </div>
            </div>
            <div class="row no-gutters">
                <div class='col-md-6'>
                    <div class="form-outline-black flex-doc">
                        <span class="material-icons-outlined color-black">event</span>
                        <input class='font-lato-heavy color-black w-100' value="<?php echo $ns_nv;?>" type="text" id='ngaysinh_nv' name='ngaysinh_nv' placeholder="Ngày sinh của bạn..." onfocus="(this.type='date')" required />
                    </div>
                </div>
                <div class='col-md-6'>
                    <div class="form-outline-black flex-doc">
                        <span class="material-icons-outlined color-black">wc</span>
                        <select class='font-lato-heavy color-black form-select w-100' id='gioitinh_nv' name='gioitinh_nv' required>
                            <option value="" disabled selected>Chọn giới tính</option>
                            <option value="0" <?php if($gioitinh_nv==0) echo "selected"; ?>>Nam</option>
                            <option value="1" <?php if($gioitinh_nv==1) echo "selected"; ?>>Nữ</option>
                            <option value="2" <?php if($gioitinh_nv==2) echo "selected"; ?>>Khác</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row no-gutters">
                <div class='col-md-6'>
                    <div class="form-outline-black flex-doc">
                        <span class="material-icons-outlined color-black">location_on</span>
                        <input class='font-lato-heavy color-black w-100' value="<?php echo $diachi_nv;?>" type="text" id='diachi_nv' name='diachi_nv' placeholder="Địa chỉ..." required />
                    </div>
                </div>
                <div class='col-md-6'>
                    <div class="form-outline-black flex-doc">
                        <span class="material-icons-outlined color-black">photo_camera_front</span>
                        <div style='display:inline-block;width:100px'><span class='color-black' style='font-size:0.8em'>Ảnh
                                đại diện</span></div>
                        <input class='font-lato-heavy color-black' type="file" id='upload_anh' name='upload_anh' placeholder="Ảnh đại diện của bạn..." accept="image/png, image/jpeg, image/jpg"/>
                    </div>
                </div>
            </div>
            <div class="row no-gutters">
                <div class='col-md-6'>
                    <div class="form-outline-black flex-doc">
                        <span class="material-icons-outlined color-black">manage_accounts</span>
                        <select class='font-lato-heavy color-black form-select w-100' id='loai_nv' name='loai_nv' required>
                            <option value="" disabled selected>Loại Nhân Viên</option>
                            <?php
                            if (mysqli_num_rows($loai_nv) > 0) {
                                while ($row = mysqli_fetch_assoc($loai_nv)) {
                                    $id         = $row['id_loainv'];
                                    $tenloai    = $row['tenloai_nv'];
                                    if($id_loainv==$id)
                                        echo "<option value='$id' selected>$id - $tenloai</option>";
                                    else
                                        echo "<option value='$id'>$id - $tenloai</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class='col-md-6'>
                    <div class="form-outline-black flex-doc">
                        <span class="material-icons-outlined color-black">room_preferences</span>
                        <!-- <input class='font-lato-heavy color-black' type="text" name='ten_nv' placeholder="Tên của bạn..."/> -->
                        <select class='font-lato-heavy color-black form-select w-100' id='phongban_nv' name='phongban_nv' required>
                            <option value="" disabled selected>Chọn Phòng Ban</option>
                            <?php
                            if (mysqli_num_rows($phongban) > 0) {
                                while ($row = mysqli_fetch_assoc($phongban)) {
                                    $id         = $row['id_phong'];
                                    $tenphong   = $row['tenphong'];
                                    if($id_phongban==$id)
                                        echo "<option value='$id' selected>$id - $tenphong</option>";
                                    else
                                        echo "<option value='$id'>$id - $tenphong</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <div>

                <button class='w-100 btn' onclick="open_thongbao()" style='background-color:rgb(117, 114, 179);color:white' type='submit'>Cập nhật</button>
            </div>
            <div class='flex-ngang' style='margin:10px'>
                <button class='w-50 btn' style='background-color:rgb(43, 41, 87);color:white' type='reset'>Reset</button>
            </div>
        </form>
    </div>
     <div style='height:200px'></div>                       

</div>
</body>
    <script src="../js/index.js"></script>
</html>