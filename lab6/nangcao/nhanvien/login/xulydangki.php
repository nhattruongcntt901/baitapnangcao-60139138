<?php 
ob_start();
if(!isset($_COOKIE['hoten']))
    header("Location: http://localhost/");
include("head.php");
    include("ketnoi.php");
    if(isset($_POST['nhapma'])||isset($_COOKIE['random']))
    {
        $nhapma = $_POST['nhapma'];
        $marandom = $_COOKIE['random'];
        if($nhapma==$marandom)
        {
            $hoten = $_COOKIE['hoten'];
            $ngaysinh = $_COOKIE['ngaysinh'];
            $gioitinh = $_COOKIE['gioitinh'];
            $email = $_COOKIE['email'];
            $tendn = $_COOKIE['tendn'];
            $mk = $_COOKIE['mk'];
            $sdt = $_COOKIE['sdt'];
            $sql= "INSERT INTO `taikhoan`(`n_user`, `p_user`, `hoten_user`, `email`, `sdt`, `gioitinh`) VALUES ('$tendn','$mk','$hoten','$email','$sdt','$gioitinh')";
            $ketqua = mysqli_query($ketnoi,$sql);
            setcookie( "hoten", "", time()- 130, "/","", 0);
            setcookie( "ngaysinh", "", time()- 130, "/","", 0);
            setcookie( "gioitinh", "", time()- 130, "/","", 0);
            setcookie( "email", "", time()- 130, "/","", 0);
            setcookie( "tendn", "", time()- 130, "/","", 0);
            setcookie( "mk", "", time()- 130, "/","", 0);
            setcookie( "sdt", "", time()- 130, "/","", 0);
            if(isset($_COOKIE['tbsai']))
                setcookie( "tbsai", "", time()- 130, "/","", 0);

                setcookie('no_reload', true, time() + 0, "/");
        }
        else
        {
            setcookie("tbsai","Mã không đúng",time()+120, "/");
            header("Location: xacnhanmail.php");
        }
    }
    else    
        echo "lỗi1";
?>

    <div style='width:100%;margin-top:250px;color: rgb(255,255,255,0.6)' ><h3 align='center'><b>Bạn đã đăng ký tài khoản TT Social thành công</b> <i style='color:green;font-size:50px' class="bi bi-check-circle-fill"></i></h3></div>
    <div class='flex-ngang'><a href='http://localhost'><button class='btn' style='background-color:rgb(137, 135, 202);color:white'>Bấm vào đây để quay về trang chủ</button></a></div>