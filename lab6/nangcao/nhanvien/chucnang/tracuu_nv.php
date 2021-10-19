<?php 
    include("../include/ketnoi.php");
    if(isset($_GET['hoten'])&&isset($_GET['phongban'])&&isset($_GET['loainv']))
    {
        if($_GET['hoten']!=""||$_GET['phongban']!=""||$_GET['loainv']!="")
        {
            $tu_khoa = $_GET['hoten'];
            $tu_khoa = str_replace(" ","%",$tu_khoa);
            $id_phongban = $_GET['phongban'];
            $id_loainv = $_GET['loainv'];

            $sql = "SELECT * FROM nhanvien a,loai_nv b,phongban c WHERE a.id_loainv=b.id_loainv and a.id_phong = c.id_phong and CONCAT_WS(' ',ho_nv, ten_nv) like '%$tu_khoa%' and a.id_phong like '%$id_phongban%' and a.id_loainv like '%$id_loainv%' ORDER BY id_nv DESC";
            $ketqua = mysqli_query($ketnoi,$sql);
        }
        else
        {
            $sql = "SELECT * FROM nhanvien a,loai_nv b,phongban c WHERE a.id_loainv=b.id_loainv and a.id_phong = c.id_phong ORDER BY id_nv DESC";
            $ketqua = mysqli_query($ketnoi,$sql);
        }
    }
    else
    {
        $sql = "SELECT * FROM nhanvien a,loai_nv b,phongban c WHERE a.id_loainv=b.id_loainv and a.id_phong = c.id_phong ORDER BY id_nv DESC";
        $ketqua = mysqli_query($ketnoi,$sql);
    }
    
    
?>

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
    <td><img src="anh_nv/<?php echo $anh ?>" style='object-fit:cover;border-radius:50%' width='50px' height='50px' />
    </td>
    <td><?php echo $loai;?></td>
    <td><?php echo $phong;?></td>
</tr>
<?php
                }
            }
            else
            {
                echo "Không có dữ liệu";
            }
        ?>