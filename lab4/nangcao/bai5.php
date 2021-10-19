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
    td{
        color:rgb(52, 50, 100);
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

    $mang = [
        array("A001","Sửa tắm X-Men",       "Chai 50ml",    "50"),
        array("A002","Dầu gội đầu Lifeboy", "Chai 50ml",    "20"),
        array("B001","Dầu ăn Cái Lân",      "Chai 1 lít",   "10"),
        array("B002","Đường cát",           "Kg",           "15"),
        array("C001","Chén sứ Minh Long",   "Bộ 10 cái",    "2"),
    ];
    if(isset($_POST['maso'])&&isset($_POST['name'])&&isset($_POST['dvt'])&&isset($_POST['soluong']))
    {
        if(is_numeric($_POST['soluong']))
        {
            $maso = $_POST['maso'];
            $name = $_POST['name'];
            $dvt  = $_POST['dvt'];
            $soluong = $_POST['soluong'];
            
            $push = [$maso,$name,$dvt,$soluong];
            array_push($mang,$push);
        }
    }

?>
    <div class='flex-ngang animate__animated animate__backInDown'>
        <form class='post w-50 flex-ngang noilen' action='bai5.php' method='POST' style='margin-top:2vh'>
            <div>
                <h2 style='color:rgb(255,255,255,0.6)'>Hãy nhập thông tin sản phẩm</h2>
                <div class='flex-doc w-100'>
                    <div class='form-outline w-75'>
                        <div style="margin-left:20px;" class="flex-doc">
                            <span class="material-icons-outlined">straighten</span>
                            <input class="form-in" type="text" value='<?php if(isset($_POST['maso'])) echo $_POST['maso']; ?>' name="maso"  placeholder="Mã Sản Phẩm" required />
                        </div>
                    </div>
                    <div class='form-outline w-75'>
                        <div style="margin-left:20px;" class="flex-doc">
                            <span class="material-icons-outlined">category</span>
                            <input class="form-in" type="text" value='<?php if(isset($_POST['name'])) echo $_POST['name']; ?>' name="name"  placeholder="Tên Sản Phẩm" required />
                        </div>
                    </div>
                </div>
                <div class='flex-doc w-100'>
                    <div class='form-outline w-75'>
                        <div style="margin-left:20px;" class="flex-doc">
                            <span class="material-icons-outlined">calculate</span>
                            <input class="form-in" type="text" value='<?php if(isset($_POST['dvt'])) echo $_POST['dvt']; ?>' name="dvt"  placeholder="Đơn vị tính" required />
                        </div>
                    </div>
                    <div class='form-outline w-75'>
                        <div style="margin-left:20px;" class="flex-doc">
                            <span class="material-icons-outlined">pin</span>
                            <input class="form-in" type="text" value='<?php if(isset($_POST['soluong'])) echo $_POST['soluong']; ?>' name="soluong"  placeholder="Số lượng" required />
                        </div>
                    </div>
                </div>
                
                <button class="w-100 btn" type="submit"
                    style="background-color: rgb(60, 59, 97);color:white">Thêm</button>
            </div>
        </form>
    </div>
    <div class='flex-ngang animate__animated animate__backInLeft' style='margin-top:20px'>
        <div class='post' style='width:70%'>
            <table id='xoso' style='font-weight:bold'>
                <tr>
                    <th>Mã mặt hàng</th>
                    <th>Tên mặt hàng</th>
                    <th>Đơn vị tính</th>
                    <th>Số lượng</th>
                </tr>
                <?php
                    foreach($mang as $item)
                    {
                        echo "<tr>";
                        foreach ($item as $value)
                        {
                            echo "<td>$value</td>";
                        }
                        echo "</tr>";
                    }
                ?>
            </table>
        </div>
    </div>
</body>

</html>