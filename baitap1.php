<?php
    $min = 10;
    $max = 1000;
    $ngaunhien=rand($min, $max);

    $sochuso = strlen($ngaunhien);

    echo "Số ngẫu nhiên: ".$ngaunhien."<br>";
     
    echo "<b>Câu b. Số $ngaunhien có $sochuso số</b><br>";

    timmax($ngaunhien);

    function timmax($n)
    {
        $n = strval($n);
        $max = $n[0];
        for($i=0;$i<strlen($n);$i++)
        {
            if($n[$i] > $max)
            {
                $max = $n[$i];
            } 
        }
        echo "<b>Câu c. Số lớn nhất trong số $n là $max</b><br>";
    }
    

    function lasonguyento($n) {
        // so nguyen n < 2 khong phai la so nguyen to
        if ($n < 2) {
            return false;
        }
        // check so nguyen to khi n >= 2
        $squareRoot = sqrt ( $n );
        for($i = 2; $i <= $squareRoot; $i ++) {
            if ($n % $i == 0) {
                return false;
            }
        }
        return true;
    }
     
    echo ("<b>Câu a. Các số nguyên tố nhỏ hơn $ngaunhien là:</b> <br>");
    for($i = 0; $i <= $ngaunhien; $i ++)
    {
        if (lasonguyento ($i)) 
        {
            echo ($i . " ");
        }
    }
    echo "<br><button onclick='reload()'>Tải lại trang</button>";
?>
<script>
    function reload(){
        window.location ='baitap1.php';
    }
</script>