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
    </style>
</head>
<?php
    $hoten = $_POST['hoten'];
    $sdt = $_POST['sdt'];
    $diachi = $_POST['diachi'];
    $gioitinh = $_POST['gioitinh'];
    $quoctich = $_POST['quoctich'];
    $monhoc = $_POST['monhoc'];
    $ghichu = $_POST['ghichu'];
?>
<body>
    <div class='flex-doc flex-ngang' style='height:100vh;'>
        <div class="post w-50 row">
            <div class='col-md-6'>
                <p>Họ tên:</p>
                <p>Số điện thoại:</p>
                <p>Địa chỉ:</p>
                <p>Giới tính:</p>
                <p>Quốc tịch:</p>
                <p>Cách môn đã học:</p>
                <p>Ghi chú:</p>
            </div>
            <div class='col-md-6'>
                <p><?php echo $hoten; ?></p>
                <p><?php echo $sdt; ?></p>
                <p><?php echo $diachi; ?></p>
                <p><?php echo $gioitinh; ?></p>
                <p><?php echo $quoctich;?></p>
                <p><?php
                            foreach($monhoc as $value) {
                                echo $value.", ";
                            } ?></p>
                <p><?php echo $ghichu; ?></p>
                <div class='flex-ngang'>
                    <a href="javascript:window.history.back(-1);">Trở về trang trước</a>
                </div>
            </div>
        </div>
        
    </div>
</body>

</html>