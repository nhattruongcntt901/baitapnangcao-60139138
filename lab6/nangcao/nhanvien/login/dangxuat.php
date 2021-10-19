<?php
    // session_start();
    // session_unset();
    setcookie('name_user',$row['id_user'],time()+0,"/");
    
    header("Location: http://localhost/baitap/lab6/nangcao/nhanvien");
?>