<?php 
$a = "";
$b = "";
$c = "";
    if(isset($_POST['m'])&&isset($_POST['n']))
    {
        if(is_numeric($_POST['m'])&&is_numeric($_POST['n']))
        {
            $mang = [];
            $m = $_POST['m'];
            $n = $_POST['n'];
            for($i=0;$i<$m;$i++)
            {
                for($j=0;$j<$n;$j++)
                {
                    $mang[$i][$j] = rand(-200,200);
                }
            }
            foreach($mang as $value)
            {
                foreach($value as $value2)
                {
                    // Câu a
                    $a .= $value2." ";
                    // Câu b
                    if($value2%2!=0)
                        $b++;
                    //Câu c
                    if($value2!=0)
                    {
                        $value2=1;
                        $c .= $value2." ";
                    }
                    else
                    {
                        $c .= $value2." ";
                    } 
                }
                $a.= "&#10;";
                $c.= "&#10;";
            }
            
        }
    }
    $result = "Câu 1. IN RA MA TRẬN MxN:&#10;$a&#10;Câu 2. Đếm phần tử có số cuối là lẻ: $b&#10;Câu 3. Thay thế các phần tử khác 0 thành 1, In ra ma trận sau khi thay thế: &#10;$c";
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
    
    <div class='flex-ngang'>
        <form class='post w-50 flex-ngang noilen' action='bai4.php' method='POST' style='margin-top:5vh'>
            <div>
                <h2 style='color:rgb(255,255,255,0.6)'>Hãy nhập n và m</h2>
                <div class='form-outline'>
                    <div style="margin-left:20px;" class="flex-doc">
                        <span class="material-icons-outlined">straighten</span>
                        <input value='<?php if(isset($_POST['m'])) echo $_POST['m']; ?>' class="form-in" type="text" maxlength="6" name="m"  placeholder="Nhập m" required />
                    </div>
                </div>
                <div class='form-outline'>
                    <div style="margin-left:20px;" class="flex-doc">
                        <span class="material-icons-outlined">straighten</span>
                        <input value='<?php if(isset($_POST['n'])) echo $_POST['n']; ?>' class="form-in" type="text" maxlength="6" name="n"  placeholder="Nhập n" required />
                    </div>
                </div>
                <button class="w-100 btn" type="submit"
                    style="background-color: rgb(60, 59, 97);color:white">Kiểm tra</button>
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
    <script>
        function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}
    </script>
</body>

</html>