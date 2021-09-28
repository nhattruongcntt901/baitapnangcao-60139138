<?php
    $a = rand(1,4);
    $b = rand(10,100);
    echo "a = ".$a;
    echo "<br>b= ".$b."<br>";
    switch ($a) {
        case 1:
            echo "Chu vi hình vuông là: ".$b*4;
            echo "<br>Diện tích hình vuông là: ".$b*$b;
            break;
        case 2:
            echo "Diện tích hình tròn là: ".$b*$b*3.14;
            echo "<br>Chu vi hình tròn là: ".$b*2*3.14;
            break;
        case 3:
            echo "Chu vi hình tam giác đều là: ".$b*3;
            echo "<br>Diện tích tam giác đều là: ".$b*$b*sqrt(3/4);
            break;
        case 4:
            echo "Chu vi hình chữ nhật là: ".($a+$b)*2;
            echo "<br>Diện tích hình chữ nhật là: ".$a*$b;
            break;
      }
?>