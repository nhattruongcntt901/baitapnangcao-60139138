<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link
        href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="http://localhost/baitap/css/style2.css">
    <link rel="stylesheet" href="http://localhost/baitap/css/font.css">
    <title>TT SOCIAL</title>
    <style>
    .flex-doc {
        display: -webkit-box;
        display: -moz-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        align-items: center;
    }

    .flex-ngang {
        display: -webkit-box;
        display: -moz-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        justify-content: center
    }

    #xoso {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #xoso td,
    #xoso th {
        border: 1px solid white;
        padding: 8px;
    }



    #xoso th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        color: white;
    }

    .noilen {
        z-index: 1;
    }

    .div-g {
        margin-left: 20px;
        margin-right: 20px;
    }

    img[src*="https://cdn.000webhost.com/000webhost/logo/footer-powered-by-000webhost-white2.png"] {
        display: none;
    }
    </style>
</head>

<body>
    <?php
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $thoigian = date("d-m-Y");
        echo "<h2 style='color:white;padding-top:20px' align='center'>Kết quả xổ số kiến thiết tỉnh Khánh Hòa ngày $thoigian</h2>";

    if(isset($_POST['so_ve']))
    {
        $so_ve = $_POST['so_ve'];
        $array = [];
    }
        function kiemtra($ngaunhien,$giai){
            global $so_ve,$array;
            $array_tam = [$ngaunhien,$giai];
            if($giai==8)
            {
                $so_ve_tam = substr($so_ve,-2);
            }
            else if($giai==7)
            {
                $so_ve_tam = substr($so_ve,-3);
            }
            else if($giai==6||$giai==5)
            {
                $so_ve_tam = substr($so_ve,-4);
            }
            else if($giai==4||$giai==3||$giai==2)
            {
                $so_ve_tam = substr($so_ve,-5);
                
            }
            else if($giai==1||$giai==0)
            {
                $so_ve_tam = $so_ve;
            }
            if($so_ve_tam==$ngaunhien)
            {
                array_push($array,$array_tam);
            }
                    
            
        }
        function giai($n)
        {
            if($n==8)
                return giai8();
            if($n==7)
                return giai7(); 
            if($n==6)
                return giai6();
            if($n==5)
                return giai5();
            if($n==4)
                return giai4();
            if($n==3)
                return giai3();              
            if($n==2)
                return giai2();
            if($n==1)
                return giai1();
            if($n==0)
                return giai0();
        }

        function giai8(){
            if(!isset($_SESSION['giai8']))
            {
                $ngaunhien = rand(0,99);
                $ngaunhien = sprintf("%02d", $ngaunhien);
                $_SESSION['giai8']=$ngaunhien;
                return $ngaunhien;
            }
            else
            {
                kiemtra($_SESSION['giai8'],8);
                return $_SESSION['giai8'];
            } 
        }
        function giai7(){
            if(!isset($_SESSION['giai7']))
            {
                $ngaunhien = rand(0,999);
                $ngaunhien = sprintf("%03d", $ngaunhien);
                $_SESSION['giai7']=$ngaunhien;
                return $ngaunhien;
            }
            else
            {
                kiemtra($_SESSION['giai7'],7);
                return $_SESSION['giai7'];
            } 
        }
        function giai6(){
            $a = "";
            if(!isset($_SESSION['giai6']))
            {
                $array_tam = [];
                for($i=0;$i<3;$i++)
                {
                    $ngaunhien = rand(0,9999);
                    $ngaunhien = sprintf("%04d", $ngaunhien);
                    $array_tam[$i] = $ngaunhien;
                    $a.= "<div class='div-g'>".$ngaunhien ."</div>";
                }
                $_SESSION['giai6']=$array_tam;
                return $a;
            }
            else
            {
                $array_tam=$_SESSION['giai6'];
                foreach($array_tam as $value){
                    kiemtra($value,6);
                    $a.=  "<div class='div-g'>".$value."</div>";
                }
                return $a;
            }
        }
        function giai5(){
            if(!isset($_SESSION['giai5']))
            {
                $ngaunhien = rand(0,9999);
                $ngaunhien = sprintf("%04d", $ngaunhien);
                $_SESSION['giai5']=$ngaunhien;
                return $ngaunhien;
            }
            else
            {
                kiemtra($_SESSION['giai5'],5);
                return $_SESSION['giai5'];
            }
        }
        function giai4(){
            $a = "";
            if(!isset($_SESSION['giai4']))
            {
                $array_tam = [];
                for($i=0;$i<7;$i++)
                {
                    $ngaunhien = rand(0,99999);
                    $ngaunhien = sprintf("%05d", $ngaunhien);
                    $array_tam[$i] = $ngaunhien;
                    $a .= "<div class='div-g'>".$ngaunhien ."</div>";
                }
                $_SESSION['giai4']=$array_tam;
                return $a;
            }
            else
            {
                $array_tam=$_SESSION['giai4'];
                foreach($array_tam as $value){
                    kiemtra($value,4);
                    $a .= "<div class='div-g'>".$value."</div>";
                }
                return $a;
            }
        }
        function giai3(){
            $a = "";
            if(!isset($_SESSION['giai3']))
            {
                $array_tam = [];
                for($i=0;$i<2;$i++)
                {
                    $ngaunhien = rand(0,99999);
                    $ngaunhien = sprintf("%05d", $ngaunhien);
                    $array_tam[$i] = $ngaunhien;
                    $a .= "<div class='div-g'>".$ngaunhien ."</div>";
                }
                $_SESSION['giai3']=$array_tam;
                return $a;
            }
            else
            {
                $array_tam=$_SESSION['giai3'];
                foreach($array_tam as $value){
                    kiemtra($value,3);
                    $a .= "<div class='div-g'>".$value."</div>";
                }
                return $a;
            }
        }
        function giai2(){
            if(!isset($_SESSION['giai2']))
            {
                $ngaunhien = rand(0,99999);
                $ngaunhien = sprintf("%05d", $ngaunhien);
                $_SESSION['giai2']=$ngaunhien;
                return $ngaunhien;
            }
            else
            {
                kiemtra($_SESSION['giai2'],2);
                return $_SESSION['giai2'];
            }
        }
        function giai1(){
            if(!isset($_SESSION['giai1']))
            {
                $ngaunhien = rand(0,999999);
                $ngaunhien = sprintf("%06d", $ngaunhien);
                $_SESSION['giai1']=$ngaunhien;
                return $ngaunhien;
            }
            else
            {
                kiemtra($_SESSION['giai1'],1);
                return $_SESSION['giai1'];
            }
        }
        function giai0(){
            if(!isset($_SESSION['giai0']))
            {
                $ngaunhien = rand(0,999999);
                $ngaunhien = sprintf("%06d", $ngaunhien);
                $_SESSION['giai0']=$ngaunhien;
                return $ngaunhien;
            }
            else
            {
                kiemtra($_SESSION['giai0'],0);
                return $_SESSION['giai0'];
            }
        }

    ?>
    <div class='flex-ngang'>
        <form class='post w-50 flex-ngang noilen' action='bai3.php' method='POST' style='margin-top:10vh'>
            <div>
                <h2 style='color:rgb(255,255,255,0.6)'>Hãy nhập vé số của bạn</h2>
                <div class='form-outline'>
                    <div style="margin-left:20px;" class="flex-doc">
                        <span class="material-icons-outlined">straighten</span>
                        <input class="form-in" value="<?php if(isset($_POST['so_ve'])) echo $_POST['so_ve']; ?>" type="text" maxlength="6" name="so_ve"  placeholder="Số vé..." required />
                    </div>
                </div>
                <button class="w-100 btn" type="submit"
                    style="background-color: rgb(60, 59, 97);color:white">Kiểm tra</button>
            </div>
        </form>
    </div>
    <div class='flex-ngang' style='margin-top:20px'><a href='unset.php'><span class="btn btn-warning material-icons-outlined">refresh</span></a></div>
    <div class='flex-ngang' style='margin-top:20px'>
        <div class='post' style='width:70%'>
            <table id='xoso' style='font-weight:bold'>
            <?php
                for($i=8;$i>=0;$i--)
                {
                    {
                        echo "<tr>
                        <td style='width: 120px;'>";
                        if($i==0)
                            echo "Giải Đặc biệt";
                        else
                            echo "Giải $i"; 
                        echo"</td>
                        <td class='flex-ngang'"; 
                        if($i==8 || $i==0)
                            echo "style='color:rgb(52, 50, 100);font-size:2em'"; 

                        echo ">".giai($i)."</td>
                            </tr>";
                    }
                }
            ?>

            </table>
        </div>
    </div>
    
<?php 
        if(isset($_POST['so_ve']))
        if(!empty($array))
        {

?>
<dialog id='thong_bao' class='dialog-table animate__animated animate__bounceInDown'>
    <div>
        <div class='flex-ngang flex-doc'>
            <span class='div-g' style='color:rgb(52, 50, 100)'><b>Chúc mừng bạn đã trúng giải</b></span>
            <span onclick='close_thongbao()' class="btn btn-warning material-icons-outlined like" style='color:white'>close</span>
        </div>
    </div>
    <div style='margin-top:20px'>

        <?php
            foreach ($array as $value){
                $giai = $value[1];
                $so = $value[0];
                if($giai == 0)
                {
                    $giai = "Đặc Biệt";
                }
                echo "<div><span style='color:rgb(52, 50, 100)'><b>Giải $giai: </b></span><span style='color:rgb(52, 50, 100)'>$so</span></div>";
            }
        ?>
    </div>
</dialog>
<?php
            }
            else{
                ?>
                <dialog id='thong_bao' class='dialog-table animate__animated animate__bounceInDown'>
    <div>
        <div class='flex-ngang flex-doc'>
            <span class='div-g' style='color:rgb(52, 50, 100)'><b>Chúc bạn may mắn lần sau</b></span>
            <span onclick='close_thongbao()' class="btn btn-warning material-icons-outlined like" style='color:white'>close</span>
        </div>
    </div>
</dialog>
                <?php
            }
?>
    <script>
        var thongbao = document.getElementById('thong_bao');
            thongbao.showModal();
        async function close_thongbao(){
            thongbao.classList.add("animate__backOutUp");
            thongbao.classList.remove("animate__bounceInDown");
            await sleep(600);
            thongbao.close();
            
        }
        function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}
    </script>
</body>

</html>