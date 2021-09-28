<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #xoso {
          font-family: Arial, Helvetica, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }
        
        #xoso td, #xoso th {
          border: 1px solid #ddd;
          padding: 8px;
        }
        
        #xoso tr:nth-child(even){background-color: #f2f2f2;}
        
        #xoso tr:hover {background-color: #ddd;}
        
        #xoso th {
          padding-top: 12px;
          padding-bottom: 12px;
          text-align: left;
          background-color: #04AA6D;
          color: white;
        }
        .flex-ngang {
        display: -webkit-box;
        display: -moz-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        justify-content: center
    }
    .div-g{
        margin-left:50px;
        margin-right:50px;
    }
    </style>
</head>
<body>
    <?php
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $thoigian = date("d-m-Y");
        echo "<h2 align='center'>Kết quả xổ số kiến thiết tỉnh Khánh Hòa ngày $thoigian</h2>";
    ?>
    <table id='xoso' style='font-weight:bold'>
        <tr>
            <td style="width: 80px;">Giải 8</td>
            <td class='flex-ngang' style='color:red'>
                <?php
                    $ngaunhien = rand(0,99);
                    if($ngaunhien<10)
                        echo "0".$ngaunhien;
                    else 
                        echo $ngaunhien;                         
                ?>
             </td>
        </tr>
        <tr>
            <td style="width: 80px;">Giải 7</td>
            <td class='flex-ngang'>
                <?php
                    $ngaunhien = rand(0,999);
                    if($ngaunhien<10)
                        echo "00".$ngaunhien;
                    else if($ngaunhien<100)
                        echo "0".$ngaunhien;
                    else echo $ngaunhien;                         
                ?>
            </td>
        </tr>
        <tr>
            <td style="width: 80px;">Giải 6</td>
            <td class='flex-ngang'>
            <?php
                for($i=0;$i<3;$i++)
                {
                    $ngaunhien=rand(1,9999);
                    if($ngaunhien<10)
                        echo "<div class='div-g'>000".$ngaunhien."</div>";
                    else if($ngaunhien<100)
                        echo "<div class='div-g'>00".$ngaunhien."</div>";
                    else if($ngaunhien<1000)
                        echo "<div class='div-g'>0".$ngaunhien."</div>"; 
                    else
                        echo "<div class='div-g'>".$ngaunhien."</div>"; 
                }
            ?>
            </td>
        </tr>
        <tr>
            <td style="width: 80px;">Giải 5</td>
            <td class='flex-ngang'>
                <?php
                    $ngaunhien = rand(0,9999);
                    if($ngaunhien<10)
                        echo "000".$ngaunhien;
                    else if($ngaunhien<100)
                        echo "00".$ngaunhien;
                    else if($ngaunhien<1000) 
                        echo "0".$ngaunhien;
                    else 
                        echo $ngaunhien;                         
                ?>
            </td>
        </tr>
        <tr>
            <td style="width: 80px;">Giải 4</td>
            <td class='flex-ngang'>
            <?php
                for($i=0;$i<7;$i++)
                {
                    
                    $ngaunhien = rand(0,99999);
                    if($ngaunhien<10)
                        echo "<div class='div-g'>0000".$ngaunhien."</div>";
                    else if($ngaunhien<100)
                        echo "<div class='div-g'>000".$ngaunhien."</div>";
                    else if($ngaunhien<1000)
                        echo "<div class='div-g'>00".$ngaunhien."</div>"; 
                    else if($ngaunhien<10000)
                        echo "<div class='div-g'>0".$ngaunhien."</div>";
                    else 
                        echo "<div class='div-g'>".$ngaunhien."</div>"; 
                }
            ?>
            </td>
        </tr>
        <tr>
            <td style="width: 80px;">Giải 3</td>
            <td class='flex-ngang'>
            <?php
                for($i=0;$i<2;$i++)
                {
                    
                    $ngaunhien = rand(0,99999);
                    if($ngaunhien<10)
                        echo "<div class='div-g'>0000".$ngaunhien."</div>";
                    else if($ngaunhien<100)
                        echo "<div class='div-g'>000".$ngaunhien."</div>";
                    else if($ngaunhien<1000)
                        echo "<div class='div-g'>00".$ngaunhien."</div>"; 
                    else if($ngaunhien<10000)
                        echo "<div class='div-g'>0".$ngaunhien."</div>";
                    else 
                        echo "<div class='div-g'>".$ngaunhien."</div>"; 
                }
            ?>
            </td>
        </tr>
        <tr>
            <td style="width: 80px;">Giải 2</td>
            <td class='flex-ngang'>
                <?php
                    $ngaunhien = rand(0,99999);
                    if($ngaunhien<10)
                        echo "0000".$ngaunhien;
                    else if($ngaunhien<100)
                        echo "000".$ngaunhien;
                    else if($ngaunhien<1000) 
                        echo "00".$ngaunhien;
                    else if($ngaunhien<10000)
                        echo "0".$ngaunhien;
                    else    
                        echo $ngaunhien;                         
                ?>
            </td>
        </tr>
        <tr>
            <td style="width: 80px;">Giải 1</td>
            <td class='flex-ngang'>
                <?php
                    $ngaunhien = rand(0,99999);
                    if($ngaunhien<10)
                        echo "0000".$ngaunhien;
                    else if($ngaunhien<100)
                        echo "000".$ngaunhien;
                    else if($ngaunhien<1000) 
                        echo "00".$ngaunhien;
                    else if($ngaunhien<10000)
                        echo "0".$ngaunhien;
                    else    
                        echo $ngaunhien;                         
                ?>
            </td>
        </tr>
        <tr>
            <td style="width: 80px;">Giải ĐB</td>
            <td class='flex-ngang'  style='color:red'>
                <?php
                    $ngaunhien = rand(0,99999);
                    if($ngaunhien<10)
                        echo "0000".$ngaunhien;
                    else if($ngaunhien<100)
                        echo "000".$ngaunhien;
                    else if($ngaunhien<1000) 
                        echo "00".$ngaunhien;
                    else if($ngaunhien<10000)
                        echo "0".$ngaunhien;
                    else    
                        echo $ngaunhien;                         
                ?>
            </td>
        </tr>
    </table>
</body>
</html>

