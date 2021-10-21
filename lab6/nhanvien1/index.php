<?php
include("include/ketnoi.php");
    session_start();
    if(!isset($_SESSION['id_user']))
    {
        header("Location: login/");
    }
    else
    {
        $id_user = $_SESSION['id_user'];
        $sql = "SELECT name_user FROM user WHERE id_user = $id_user";
        $ketqua = mysqli_query($ketnoi,$sql);
        $row = mysqli_fetch_assoc($ketqua);
        $name_user = $row['name_user'];
        header("Location: page/danhsach_nv.php?page=1");  
    }
?>