<?php
    $min = 1;
    $max = 10;

    $ngaunhien = rand($min,$max);

    echo "Bảng cửu chương $ngaunhien<br>";

    for($i=1;$i<=10;$i++)
    {
        echo $ngaunhien."x".$i."=".$ngaunhien*$i."<br>";
    }
    echo "<br><button onclick='reload()'>Tải lại trang</button>";
?>
<script>
    function reload(){
        window.location ='baitap2.php';
    }
</script>