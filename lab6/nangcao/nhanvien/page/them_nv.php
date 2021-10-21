<?php
include("../include/chucnang.php");
$sql = "SELECT * FROM loai_nv";
$loai_nv = mysqli_query($ketnoi, $sql);
$sql = "SELECT * FROM phongban";
$phongban = mysqli_query($ketnoi, $sql);
include("../include/head.php");
?>
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
        <h2>Thêm nhân viên</h2>
        <hr width="100%" color="black" style="opacity: 30%;">
    </div>
    <div class='container flex-ngang'>
        <form name='them_nv' class='w-75 form-outline-black' onsubmit="return submit_them_nhanvien()" method="post" enctype="multipart/form-data" style='padding:20px'>
            <div class="row no-gutters">
                <div class='col-md-6'>
                    <div class="form-outline-black flex-doc">
                        <span class="material-icons-outlined color-black">badge</span>
                        <input class='font-lato-heavy color-black w-100' type="text" id='ho_nv' name='ho_nv' placeholder="Họ của bạn..." required />
                    </div>
                </div>
                <div class='col-md-6'>
                    <div class="form-outline-black flex-doc">
                        <span class="material-icons-outlined color-black">face</span>
                        <input class='font-lato-heavy color-black w-100' type="text" id='ten_nv' name='ten_nv' placeholder="Tên của bạn..." required />
                    </div>
                </div>
            </div>
            <div class="row no-gutters">
                <div class='col-md-6'>
                    <div class="form-outline-black flex-doc">
                        <span class="material-icons-outlined color-black">event</span>
                        <input class='font-lato-heavy color-black w-100' type="text" id='ngaysinh_nv' name='ngaysinh_nv' placeholder="Ngày sinh của bạn..." onfocus="(this.type='date')" required />
                    </div>
                </div>
                <div class='col-md-6'>
                    <div class="form-outline-black flex-doc">
                        <span class="material-icons-outlined color-black">wc</span>
                        <select class='font-lato-heavy color-black form-select w-100' id='gioitinh_nv' name='gioitinh_nv' required>
                            <option value="" disabled selected>Chọn giới tính</option>
                            <option value="0">Nam</option>
                            <option value="1">Nữ</option>
                            <option value="2">Khác</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row no-gutters">
                <div class='col-md-6'>
                    <div class="form-outline-black flex-doc">
                        <span class="material-icons-outlined color-black">location_on</span>
                        <input class='font-lato-heavy color-black w-100' type="text" id='diachi_nv' name='diachi_nv' placeholder="Địa chỉ..." required />
                    </div>
                </div>
                <div class='col-md-6'>
                    <div class="form-outline-black flex-doc">
                        <span class="material-icons-outlined color-black">photo_camera_front</span>
                        <div style='display:inline-block;width:100px'><span class='color-black' style='font-size:0.8em'>Ảnh
                                đại diện</span></div>
                        <input class='font-lato-heavy color-black' type="file" id='upload_anh' name='upload_anh' placeholder="Ảnh đại diện của bạn..." accept="image/png, image/jpeg, image/jpg" required />
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
                                    echo "<option value='$id'>$id - $tenphong</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <div>

                <button class='w-100 btn' onclick="open_thongbao()" style='background-color:rgb(117, 114, 179);color:white' type='submit'>Thêm nhân
                    viên</button>
            </div>
            <div class='flex-ngang' style='margin:10px'>
                <button class='w-50 btn' style='background-color:rgb(43, 41, 87);color:white' type='reset'>Reset</button>
            </div>
        </form>
    </div>

    <div style='margin-top:20px'>
        <h2 align='center'>Thêm loại nhân viên</h2>
        <div class='container flex-ngang'>
            <form class='form-outline-black' style='padding:20px' onsubmit="return submit_them_loainhanvien()">
                <div class="row no-gutters">
                    <div class='col-md-12'>
                        <div class="form-outline-black flex-doc">
                            <span class="material-icons-outlined color-black">badge</span>
                            <input class='font-lato-heavy color-black w-100' type="text" id='tenloai' name='tenloai' placeholder="Nhập tên loại nhân viên..." required />
                        </div>
                    </div>
                </div>
                <div>
                    <button class='w-100 btn' style='background-color:rgb(117, 114, 179);color:white' type='submit'>Thêm loại nhân viên</button>
                </div>
            </form>
        </div>
    </div>
    <div style='margin-top:20px'>
        <h2 align='center'>Thêm phòng ban</h2>
        <div class='container flex-ngang'>
            <form class='form-outline-black' style='padding:20px' onsubmit="return submit_them_phongban()">
                <div class="row no-gutters">
                    <div class='col-md-12'>
                        <div class="form-outline-black flex-doc">
                            <span class="material-icons-outlined color-black">badge</span>
                            <input class='font-lato-heavy color-black w-100' type="text" id='phongbannv' name='phongbannv' placeholder="Nhập tên phòng ban..." required />
                        </div>
                    </div>
                </div>
                <div>
                    <button class='w-100 btn' style='background-color:rgb(117, 114, 179);color:white' type='submit'>Thêm phòng ban</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
<script src="../js/index.js"></script>
</html>