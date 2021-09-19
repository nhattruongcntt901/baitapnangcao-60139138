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
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/font.css">
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
    </style>
</head>
<body>
<h2 align='center' class='font-lato-heavy'>Bảng cửu chương</h2>

<?php
    for($i=1;$i<=10;$i++)
    {
        if($i==1 || $i==6)
        echo "<div class='flex-ngang flex-doc' style='margin-bottom:20px'>";
            echo "<div id='cuuchuong$i' class='font-lato-heavy post animate__animated d-md-none' style='margin-left:10px;margin-right:10px'>";
            for($j=1;$j<=10;$j++)
            {
                echo $i."x".$j."=".$j*$i."<br>";
            }
            echo "</div>";
        if($i==5 || $i==10)
        echo "</div>";
    }
?>
<script>
    chayhieuung();
    async function chayhieuung(){
        for(var i=1;i<=10;i++)
        {
            hieuung(i);
            await sleep(200);
        }
    }
    function hieuung(id){
        var cchuong = document.getElementById('cuuchuong'+id);
            cchuong.classList.remove('d-md-none');
            cchuong.classList.add('animate__backInRight');
    }
    function sleep(ms) {
        return new Promise(resolve => setTimeout(resolve, ms));
    }
</script>
</body>
</html>