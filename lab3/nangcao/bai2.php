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
    $dongia = "20000";
    if(isset($_POST['csmoi'])&&isset($_POST['cscu'])&&isset($_POST['dongia'])&&isset($_POST['chuho']))
    {
        if($_POST['csmoi']>$_POST['cscu']&&$_POST['csmoi']>=0&&$_POST['cscu']>=0&&$_POST['dongia']>=0)
        {
            $tench = $_POST['chuho'];
            $csm = $_POST['csmoi'];
            $csc = $_POST['cscu'];
            $dongia = $_POST['dongia'];

            $tinhtien = ($csm-$csc)*$dongia;
        }
        else
            echo "Giá trị nhập vào không hợp lệ";
    }
?>
    <div class='flex-doc flex-ngang' style='height:100vh'>
        <form class='post w-50 flex-ngang noilen' action='bai2.php' method='POST'>
            <div>
                <h2 style='color:rgb(255,255,255,0.6)'>Thanh toán tiền điện</h2>
                <div class='form-outline'>
                    <div style="margin-left:20px;" class="flex-doc">
                        <span class="material-icons-outlined">person</span>
                        <input class="form-in" type="text" name="chuho" <?php if(isset($_POST['csmoi'])&&isset($_POST['cscu'])&&isset($_POST['dongia'])&&isset($_POST['chuho'])) if($_POST['csmoi']>$_POST['cscu']&&$_POST['csmoi']>=0&&$_POST['cscu']>=0&&$_POST['dongia']>=0) echo "value='$tench'" ?>  placeholder="Chủ hộ" required />
                    </div>
                </div>
                <div class='form-outline'>
                    <div style="margin-left:20px;" class="flex-doc">
                        <span class="material-icons-outlined">pin</span>
                        <input class="form-in" type="number" name="cscu" <?php if(isset($_POST['csmoi'])&&isset($_POST['cscu'])&&isset($_POST['dongia'])&&isset($_POST['chuho'])) if($_POST['csmoi']>$_POST['cscu']&&$_POST['csmoi']>=0&&$_POST['cscu']>=0&&$_POST['dongia']>=0) echo "value='$csc'" ?>  placeholder="Nhập chỉ số cũ" required />
                        <span>KW</span>
                    </div>
                </div>
                <div class='form-outline'>
                    <div style="margin-left:20px;" class="flex-doc">
                        <span class="material-icons">pin</span>
                        <input class="form-in" type="number" name="csmoi" <?php if(isset($_POST['csmoi'])&&isset($_POST['cscu'])&&isset($_POST['dongia'])&&isset($_POST['chuho'])) if($_POST['csmoi']>$_POST['cscu']&&$_POST['csmoi']>=0&&$_POST['cscu']>=0&&$_POST['dongia']>=0) echo "value='$csm'" ?>  placeholder="Nhập chỉ số mới" required />
                        <span>KW</span>
                    </div>
                </div>
                <div class='form-outline'>
                    <div style="margin-left:20px;" class="flex-doc">
                        <span class="material-icons-outlined">attach_money</span>
                        <input class="form-in" type="number" name="dongia" value='<?php echo $dongia; ?>' placeholder="Đơn giá" required />
                        <span>VNĐ</span>
                    </div>
                </div>
                <div class='flex-ngang flex-doc'>
                    <span>Số tiền cần thanh toán</span>
                    <div class="flex-doc form-outline w-50">
                        <div class='flex-ngang flex-doc container'>
                            <span class="material-icons">payment</span>
                            <input class="form-in" readonly='true' type="text" name="chisomoi" <?php if(isset($_POST['csmoi'])&&isset($_POST['cscu'])&&isset($_POST['dongia'])&&isset($_POST['chuho'])) if($_POST['csmoi']>$_POST['cscu']&&$_POST['csmoi']>=0&&$_POST['cscu']>=0&&$_POST['dongia']>=0) echo "value='$tinhtien'" ?> required />
                            <span>VNĐ</span>
                        </div>
                    </div>
                </div>
                <button class="w-100 btn" type="submit"
                    style="background-color: rgb(60, 59, 97);color:white">Tính</button>
            </div>
        </form>
    </div>
</body>

</html>