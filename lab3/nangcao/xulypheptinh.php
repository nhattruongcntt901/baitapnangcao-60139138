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
    .giancach{
        margin-left:10px;
        margin-right:10px;
    }
    .noilen{
  z-index: 1;
}
    </style>
</head>

<body>
<?php
    $so1=$_POST['so1'];
    $so2=$_POST['so2'];
    $pheptoan = $_POST['pheptoan'];
    switch($pheptoan)
    {
        case "cong":
            $ketqua = $so1+$so2;
            $pheptoan = "Cộng";
            break;
        case "tru":
            $ketqua = $so1-$so2;
            $pheptoan = "Trừ";
            break;
        case "nhan":
            $ketqua = $so1*$so2;
            $pheptoan = "Nhân";
            break;
        case "chia":
            $ketqua = $so1/$so2;
            $pheptoan = "Chia";
            break;
    }

?>
    <div class='flex-doc flex-ngang' style='height:100vh'>
        <form class='post w-50 flex-ngang animate__animated animate__zoomInUp noilen' action='xulypheptinh.php' method='POST'>
            <div>
                <h2 style='color:rgb(255,255,255,0.6)'>Phép tính hai số</h2>
                <div>
                    <div style="margin-left:20px;" class="flex-doc">
                        <h3 style='color:rgb(255,255,255,0.6)'>Chọn phép tính: <?php echo $pheptoan; ?></h3>
                    </div>
                </div>
                <div class='form-outline'>
                    <div style="margin-left:20px;" class="flex-doc">
                    <span class="material-icons">pin</span>
                        <input class="form-in" type="number" readonly='true' value='<?php echo $so1 ?>' placeholder="Số 1" required />
                    </div>
                </div>
                <div class='form-outline'>
                    <div style="margin-left:20px;" class="flex-doc">
                    <span class="material-icons-outlined">pin</span>
                        <input class="form-in" type="number" readonly='true' value='<?php echo $so2 ?>' placeholder="Số 2" required />
                    </div>
                </div>
                <div class='flex-ngang flex-doc'>
                    <span>Kết quả</span>
                    <div class="flex-doc form-outline w-50">
                        <div class='flex-ngang flex-doc container'>
                            <span class="material-icons">calculate</span>
                            <input class="form-in" value='<?php echo $ketqua; ?>' readonly='true' type="number"  required />
                        </div>
                    </div>
                </div>
                <div class='flex-ngang'>
                    <a href="javascript:window.history.back(-1);">Trở về trang trước</a>
                </div>
            </div>
        </form>
    </div>
</body>

</html>