<?php 
    include("../include/ketnoi.php");
    $rowsPerPage=3; //số mẩu tin trên mỗi trang, giả sử là 10
    if (!isset($_GET['page']))
    { 
        $_GET['page'] = 1;
    }
    $offset =($_GET['page']-1)*$rowsPerPage;
    $page_hientai = $_GET['page'];
    $sql = "SELECT * FROM nhanvien a,loai_nv b,phongban c WHERE a.id_loainv=b.id_loainv and a.id_phong = c.id_phong ORDER BY id_nv DESC LIMIT $offset,$rowsPerPage";
    $ketqua = mysqli_query($ketnoi,$sql);

    $sql_sodong = "SELECT * FROM nhanvien a,loai_nv b,phongban c WHERE a.id_loainv=b.id_loainv and a.id_phong = c.id_phong ORDER BY id_nv DESC";
    $ketqua_sodong = mysqli_query($ketnoi,$sql_sodong);
    $sodong = mysqli_num_rows($ketqua_sodong);
    $page = round($sodong/$rowsPerPage);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
        </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
        </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
        </script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link
        href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/font.css">
    <link rel="stylesheet" href="css/form.css">
    <title>TT SOCIAL</title>
    <style>
        .flex-doc {
            display: -webkit-box;
            display: -moz-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            align-items: center;
        }

        .flex-ngang {
            display: -webkit-box;
            display: -moz-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            justify-content: center
        }

        .gian-doc {
            margin-top: 10px;
            margin-bottom: 10px;
        }
    </style>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: rgb(117, 114, 179);
            color: white;
        }
    </style>
</head>
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
                <td><img src="../anh_nv/<?php echo $anh ?>" style='object-fit:cover;border-radius:50%' width='50px'
                        height='50px' /></td>
                <td><?php echo $loai;?></td>
                <td><?php echo $phong;?></td>
            </tr>
            <?php
                }
            }
        ?>

        </table>
        <div class='flex-ngang'>
        <?php if($page_hientai!=1){ ?>
            <!-- Trang đầu -->
        <a style='padding:10px;<?php if($i==$_GET['page']){echo "color:red";}?>' href="http://localhost/baitap/lab6/nangcao/nhanvien/page/danhsach_nv.php?page=1">Trang Đầu</a>
            <!-- Trang trước -->
            
            <a style='padding:10px;<?php if($i==$_GET['page']){echo "color:red";}?>' href="http://localhost/baitap/lab6/nangcao/nhanvien/page/danhsach_nv.php?page=<?php echo $page_hientai-1;?>">Trang Trước</a>
        <?php } ?>

        <!-- Các trang thành phần -->
        <?php 
            for($i=1;$i<=$page;$i++)
            {    
        ?> 
            <a style='padding:10px;<?php if($i==$_GET['page']){echo "color:red";}?>' href="http://localhost/baitap/lab6/nangcao/nhanvien/page/danhsach_nv.php?page=<?php echo $i;?>"><?php echo $i;?></a>
        <?php
            }
        ?>

        <!-- Trang sau -->
        <?php if($page_hientai!=$page){ ?>
        <a style='padding:10px;<?php if($i==$_GET['page']){echo "color:red";}?>' href="http://localhost/baitap/lab6/nangcao/nhanvien/page/danhsach_nv.php?page=<?php echo $page_hientai+1;?>">Trang Sau</a>
            

         <!-- Trang cuối    -->
            <a style='padding:10px;<?php if($i==$_GET['page']){echo "color:red";}?>' href="http://localhost/baitap/lab6/nangcao/nhanvien/page/danhsach_nv.php?page=<?php echo $page;?>">Trang Cuối</a>
                <?php } ?>
        </div>
</div>