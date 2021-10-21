<?php
include("include/ketnoi.php");
    session_start();
    // if(!isset($_SESSION['id_user']))
    // {
    //     header("Location: login/");
    // }
    // else
    // {
    //     $id_user = $_SESSION['id_user'];
    //     $sql = "SELECT name_user FROM user WHERE id_user = $id_user";
    //     $ketqua = mysqli_query($ketnoi,$sql);
    //     $row = mysqli_fetch_assoc($ketqua);
    //     $name_user = $row['name_user']; 
    // }
    if(!isset($_COOKIE['id_user']))
    {
        header("Location: login/");
    }
    else
    {
        $id_user = $_COOKIE['id_user'];
        $sql = "SELECT name_user FROM user WHERE id_user = $id_user";
        $ketqua = mysqli_query($ketnoi,$sql);
        $row = mysqli_fetch_assoc($ketqua);
        $name_user = $row['name_user'];
        header("Location: page/danhsach_nv.php?page=1"); 
    }
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

<body>
    
    <dialog id='thong_bao' class='dialog-table animate__animated animate__bounceInDown'>
        <div>
            <div>
                <span class='div-g' style='color:rgb(52, 50, 100)'><b>Thông báo</b></span>
                <span onclick='close_thongbao()' class="btn btn-warning material-icons-outlined like float-right"
                    style='color:white'>close</span>
            </div>
        </div>
        <div style='margin-top:20px'>
            <span class='font-lato-heavy color-black'>Đã thêm nhân viên thành công</span>
        </div>
    </dialog>
    <!-- menu -->
    <div class="nav-bar">
        <div style="width:100%;height:75px" class="flex-ngang flex-doc">
            <div style="color:white">
                <h4 class='font-lato-heavy'>Chào bạn, <?php echo $name_user;?></h4>
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
    <!-- menu end -->
    <!-- content -->
    <div id='content' style="margin-left:275px;">

    
    </div>
    <footer class='flex-ngang flex-doc' style="margin-left:275px;margin-top:50px;height:150px;background-color: rgb(62, 59, 105);">
        <div style='padding:20px'>
            <p align='center'  class='font-lato-heavy'>Design by Nhật Trường</p>
            <p align='center'  class='font-lato-heavy'>Bài tập LAB6</p>
            <p align='center'  class='font-lato-heavy'>Copyright ©</p>
        </div>
    </footer>
    <!-- content end -->
</body>

</html>