<?php
    include("../include/chucnang.php");
    if(isset($_POST['tenloai']))
    {
        $tenloai = $_POST['tenloai'];
        $table          = 'loai_nv';
        $col            = ['tenloai_nv'];
        $value          = [$tenloai];
        insert_table($table,$col,$value);
    }
?>