<?php
$ketqua1 = "";
$ketqua2 = "";
$ketqua3 = "";
$ketqua4 = "";
    if(isset($_POST['n']))
    {
        if(is_numeric($_POST['n']))
        {
            $n = $_POST['n'];
            $array = [];
            for($i=0;$i<$n;$i++)
            {
                $array[$i]=rand(-200,200);
            }
            // cau a
            foreach($array as $value){
                $ketqua1 .= $value." ";
            }
            //Cau b
            asort($array);
            foreach($array as $value){
                $ketqua2 .= $value." ";
            }
            if(isset($_POST['giatri'])&&isset($_POST['vitri']))
            {
                //Cau c
                if(is_numeric($_POST['giatri'])&&isset($_POST['vitri']))
                {
                    $vitri = $_POST['vitri'];
                    $giatri = $_POST['giatri'];
                    array_splice( $array, $vitri, 0, $giatri); 
                }
                foreach($array as $value){
                    $ketqua3 .= $value." ";
                }
                
                // Câu d
                $i=0;
                $array_tam1=[];
                $array_tam2=[];
                foreach($array as $value){
                    if($i<$vitri)
                        $array_tam1[$i] = $value;
                    if($i==$vitri)
                        {
                            asort($array_tam1);
                            array_push($array_tam1,$value);
                        }
                    if($i>$vitri)
                        $array_tam2[$i] = $value;
                    $i++;
                }
                arsort($array_tam2);
                $array = $array_tam1 + $array_tam2;
                foreach($array as $value){
                    $ketqua4 .= $value." ";
                } 
            }
        }
        
        else 
            echo "<script> alert('Số nhập vào không phải số nguyên');</script>";
    }
    
$result = "1.Mảng ngẫu nhiên: $ketqua1&#10;2. Sắp xếp mảng: $ketqua2&#10;3.Sau khi thêm: $ketqua3&#10;4.Sau khi sắp xếp: $ketqua4";
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
    <link rel="stylesheet" href="http://localhost/css/font.css">
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

    .noilen {
        z-index: 1;
    }

    img[src*="https://cdn.000webhost.com/000webhost/logo/footer-powered-by-000webhost-white2.png"] {
        display: none;
    }
    </style>
</head>

<body>
    <div class='flex-ngang'>
        <form class='post w-50 flex-ngang noilen' action='bai1.php' method='POST' style='margin-top:10vh'>
            <div>
                <h2 style='color:rgb(255,255,255,0.6)'>Hãy nhập 1 số N</h2>
                <div class='form-outline'>
                    <div style="margin-left:20px;" class="flex-doc">
                        <span class="material-icons-outlined">straighten</span>
                        <input class="form-in" type="number" name="n"
                            <?php if(isset($_POST['n'])) echo "value='$n'" ?> placeholder="Nhập N"
                            required />
                    </div>
                </div>
                <div class='form-outline'>
                    <div style="margin-left:20px;" class="flex-doc">
                        <span class="material-icons-outlined">straighten</span>
                        <input class="form-in" type="number" name="giatri"
                            <?php if(isset($_POST['giatri'])) echo "value='$giatri'" ?> placeholder="Nhập giá trị"
                             />
                    </div>
                </div>
                <div class='form-outline'>
                    <div style="margin-left:20px;" class="flex-doc">
                        <span class="material-icons-outlined">straighten</span>
                        <input class="form-in" type="number" name="vitri"
                            <?php if(isset($_POST['vitri'])) echo "value='$vitri'" ?> placeholder="Vị trí cần chèn"
                            />
                    </div>
                </div>
                <button class="w-100 btn" type="submit"
                    style="background-color: rgb(60, 59, 97);color:white">Tính</button>
            </div>
        </form>
    </div>
    <div class='row no-gutters w-100' style='margin-top:5vh'>
        <div class='col-md-3'></div>
        <div class='col-md-6 flex-ngang'>
            <div class='post font-lato-heavy animate__animated animate__backInLeft w-100'
                style='font-size: 1em;color:rgb(71, 69, 110)'>
                <b>Kết quả</b>
                <div class='row no-gutters flex-ngang'>
                    <hr width='90%' color='white' style='opacity: 30%;' />
                </div>
                <div>
                    <textarea class='dangbai' rows='5'><?php
                            echo $result;            
                        ?></textarea>
                </div>
            </div>
        </div>
        <div class='col-md-3'></div>
    </div>
</body>

</html>