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
<?php
    if(isset($_POST['so']))
    {
        $n = $_POST['so'];
        $sochuso = strlen($n);
        $solonnhat = timmax($n);
        $snt_behon_n = "";
        if(is_numeric($n)==true && $n>=10 && $n<=1000)
        {
            for($i = 0; $i <= $n; $i ++)
            {
                if (lasonguyento($i)==true) 
                {
                    $snt_behon_n .=" ".$i; 
                }
            }
            $ketqua = "C??u a. C??c s??? nguy??n t??? nh??? h??n $n l??: $snt_behon_n&#10;C??u b. S??? $n c?? $sochuso ch??? s???&#10;C??u c. Ch??? s??? l???n nh???t trong $n l?? $solonnhat";
        }
    }
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
        return $max;
    }
    function lasonguyento($n) {
        // so nguyen n < 2 khong phai la so nguyen to
        if ($n < 2) {
            return false;
        }
        // check so nguyen to khi n >= 2
        $squareRoot = sqrt($n);
        for($i = 2; $i <= $squareRoot; $i ++) {
            if ($n % $i == 0) {
                return false;
            }
        }
        return true;
    }
?>
    <div class='flex-ngang'>
        <form class='post w-50 flex-ngang noilen' action='baitaptrenlop1.php' method='POST' style='margin-top:10vh'>
            <div>
                <h2 style='color:rgb(255,255,255,0.6)'>H??y nh???p 1 s??? N</h2>
                <div class='form-outline'>
                    <div style="margin-left:20px;" class="flex-doc">
                        <span class="material-icons-outlined">straighten</span>
                        <input class="form-in" type="number" name="so"
                            <?php if(isset($_POST['so'])) echo "value='$n'" ?> placeholder="Nh???p N"
                            required />
                    </div>
                </div>
                <button class="w-100 btn" type="submit"
                    style="background-color: rgb(60, 59, 97);color:white">T??nh</button>
            </div>
        </form>
    </div>
    <div class='row no-gutters w-100' style='margin-top:5vh'>
        <div class='col-md-3'></div>
        <div class='col-md-6 flex-ngang'>
            <div class='post font-lato-heavy animate__animated animate__backInLeft w-100'
                style='font-size: 1em;color:rgb(71, 69, 110)'>
                <b>K???t qu???</b>
                <div class='row no-gutters flex-ngang'>
                    <hr width='90%' color='white' style='opacity: 30%;' />
                </div>
                <div>
                    <textarea class='dangbai' rows='5'><?php
                            if(isset($_POST['so']))
                            {
                                if(is_numeric($n)==true && $n>=10 && $n<=1000)
                                    echo $ketqua;
                                else
                                    echo "B???n ???? nh???p N < 10 ho???c N >1000";
                            }                
                        ?></textarea>
                </div>
            </div>
        </div>
        <div class='col-md-3'></div>
    </div>
</body>

</html>