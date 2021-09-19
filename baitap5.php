<?php

$min = -100;
$max = 100;
$ngaunhien=rand($min, $max);

$path = "soNT.txt";

$fileNT = fopen($path,"a");

if(lasonguyento($ngaunhien)==true)
{
    fwrite($fileNT,"$ngaunhien ");
    echo "$ngaunhien là số nguyên tố";
    echo "<br><a href='soNT.txt'>Mở file</a>";
}
else
{
    echo "$ngaunhien không là số nguyên tố";
}
echo "<br><button onclick='reload()'>Tải lại trang</button>";
   



function lasonguyento($n) {
    // so nguyen n < 2 khong phai la so nguyen to
    if ($n < 2) {
        return false;
    }
    // check so nguyen to khi n >= 2
    $squareRoot = sqrt ($n);
    for($i = 2; $i <= $squareRoot; $i ++) {
        if ($n % $i == 0) {
            return false;
        }
    }
    return true;
}
?>
<script>
    function reload(){
        window.location ='baitap5.php';
    }
</script>