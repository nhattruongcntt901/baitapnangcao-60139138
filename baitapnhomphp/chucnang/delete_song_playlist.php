<?php
    include("../include/chucnang.php");
    if(isset($_GET['id_nhac']))
    {
        $id_nhac = $_GET['id_nhac'];

        delete_table('thuviennhac','id_nhac',$id_nhac);
    }
?>