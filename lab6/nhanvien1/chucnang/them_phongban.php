<?php
    include("../include/chucnang.php");
    if(isset($_POST['phongbannv']))
    {
        $tenphong = $_POST['phongbannv'];
        $table          = 'phongban';
        $col            = ['tenphong'];
        $value          = [$tenphong];
        insert_table($table,$col,$value);
    }
?>