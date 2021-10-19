<?php 
    include("../include/ketnoi.php");
    $sql = "SELECT * FROM loai_nv";
    $loai_nv = mysqli_query($ketnoi,$sql);
    $sql = "SELECT * FROM phongban";
    $phongban = mysqli_query($ketnoi,$sql);
    $sql = "SELECT * FROM nhanvien a,loai_nv b,phongban c WHERE a.id_loainv=b.id_loainv and a.id_phong = c.id_phong ORDER BY id_nv DESC";
            $ketqua = mysqli_query($ketnoi,$sql);
?>

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
                        <select onchange="tracuu_nhanvien()" class='font-lato-heavy color-black form-select w-100' id='loai_nv' name='loai_nv'
                            required>
                            <option value="" disabled selected>Loại Nhân Viên</option>
                            <?php
                                        if(mysqli_num_rows($loai_nv)>0)
                                        {
                                            while($row = mysqli_fetch_assoc($loai_nv))
                                            {
                                                $id         = $row['id_loainv'];
                                                $tenloai    = $row['tenloai_nv'];
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
                        <select onchange="tracuu_nhanvien()" class='font-lato-heavy color-black form-select w-100' id='phongban_nv'
                            name='phongban_nv' required>
                            <option value="" disabled selected>Chọn Phòng Ban</option>
                            <?php
                                        if(mysqli_num_rows($phongban)>0)
                                        {
                                            while($row = mysqli_fetch_assoc($phongban))
                                            {
                                                $id         = $row['id_phong'];
                                                $tenphong   = $row['tenphong'];
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
                        <input onkeyup="tracuu_nhanvien()" class='font-lato-heavy color-black w-100' type="text"
                            id='ten_nv' name='ten_nv' placeholder="Họ tên nhân viên..." required />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class='container'>

    <div style='height:50vh;overflow-y:scroll'>
        <table id='customers'>

            <tr class='sticky-top' style='top:-1px'>
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
            if(mysqli_num_rows($ketqua)>0)
            {
                while($row = mysqli_fetch_assoc($ketqua))
                {
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
                <td><?php echo $id;?></td>
                <td width='220px'><?php echo $ho." ".$ten;?></td>
                <td width='100px'><?php echo $ngaysinh;?></td>
                <td><?php if($gioitinh==0) echo "Nam"; else if($gioitinh==1) echo "Nữ"; else echo "Khác";?></td>
                <td width='350px'><?php echo $diachi;?></td>
                <td><img src="anh_nv/<?php echo $anh ?>" style='object-fit:cover;border-radius:50%' width='50px'
                        height='50px' />
                </td>
                <td><?php echo $loai;?></td>
                <td><?php echo $phong;?></td>
            </tr>
        <?php
                }}
        ?>

        </table>
    </div>
</div>