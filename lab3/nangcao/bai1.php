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
    <link rel="stylesheet" href="http://localhost/baitap/css/style.css">
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
        z-index: 1;
    }

    .flex-ngang {
        display: -webkit-box;
        display: -moz-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        justify-content: center
    }
    .cangiua{
        margin:auto;

    }
    .noilen{
  z-index: 1;
}
    img[src*="https://cdn.000webhost.com/000webhost/logo/footer-powered-by-000webhost-white2.png"] {
        display: none;
    }
    </style>
</head>

<body>
    <?php
    if(isset($_POST['chieudai'])&&isset($_POST['chieurong']))
    {
        if($_POST['chieudai']!="" && $_POST['chieurong']!="")
        {
            $chieudai = $_POST['chieudai'];
            $chieurong =$_POST['chieurong'];
            $dientich = $chieudai*$chieurong;
            echo"
            <div class='row w-100' style='position:fixed;margin-top:33vh'>
                <div class='col-md-10'>
        
                </div>
                <div class='col-md-2'>
                    <div class='post font-lato-heavy animate__animated animate__bounceInDown' style='font-size: 1em;color:rgb(71, 69, 110)' id='checkloidk'>
                        <b>Kết quả</b>
                        <div class='row no-gutters flex-ngang'>
                            <hr width='90%' color='white' style='opacity: 30%;' />
                        </div>
                        <div>
                            <p>Chiều dài: $chieudai</p>
                            <p>Chiều rộng: $chieurong</p>
                            <p>Diện tích: $dientich</p>
                        </div>
                    </div>
                </div>
            </div>
            ";
        }
    }
?>
    <div style='height:100vh;' class='flex-doc flex-ngang'>
        <form class='post w-50 flex-ngang noilen' action='bai1.php' method='POST'>
            <div>
                <h2 style='color:rgb(255,255,255,0.6)'>Tính diện tích hình chữ nhật</h2>
                <div class='form-outline'>
                    <div style="margin-left:20px;" class="flex-doc">
                        <span class="material-icons-outlined">straighten</span>
                        <input class="form-in" type="text" name="chieudai" <?php if(isset($_POST['chieudai'])&&isset($_POST['chieurong'])) echo "value='$chieudai'" ?>  placeholder="Nhập chiều dài" required />
                    </div>
                </div>
                <div class='form-outline'>
                    <div style="margin-left:20px;" class="flex-doc">
                        <span class="material-icons-outlined" style='transform: rotate(90deg);'>straighten</span>
                        <input class="form-in" type="text" name="chieurong" <?php if(isset($_POST['chieudai'])&&isset($_POST['chieurong'])) echo "value='$chieurong'" ?> placeholder="Nhập chiều rộng" required />
                    </div>
                </div>
                <button class="w-100 btn" type="submit"
                    style="background-color: rgb(60, 59, 97);color:white">Tính</button>
            </div>
        </form>
    </div>
</body>

</html>