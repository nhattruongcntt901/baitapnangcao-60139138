<?php
include("../include/chucnang.php");
if(isset($_GET['id_nv']))
{
    $id_nv = $_GET['id_nv'];
    delete_table('nhanvien','id_nv',$id_nv);
}
header("location: http://localhost/baitap/lab6/nhanvien1/page/danhsach_nv.php?page=1");

?>