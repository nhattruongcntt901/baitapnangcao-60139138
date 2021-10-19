<?php
class NGUOI{
    protected $hoten,$diachi,$gioitinh;

    function set_hoten($hoten){
        return $this->hoten = $hoten;
    }
    function set_diachi($diachi){
        return $this->diachi = $diachi;
    }
    function set_gioitinh($gioitinh){
        return $this->gioitinh = $gioitinh;
    }
    function get_hoten(){
        return $this->hoten;
    }
    function get_diachi(){
        return $this->diachi;
    }
    function get_gioitinh(){
        if($this->gioitinh==0)
            return "Nam";
        else if($this->gioitinh==1)
            return "Nữ";
        else
            return "Khác";
    }
}
class SINH_VIEN extends NGUOI{
    protected $lophoc,$nganhhoc;
    function set_lophoc($lophoc){
        return $this->lophoc=$lophoc;
    }
    function set_nganhhoc($nganhhoc){
        return $this->nganhhoc=$nganhhoc;
    }
    function get_lophoc(){
        return $this->lophoc;
    }
    function get_nganhhoc(){
        if($this->nganhhoc=="cntt")
            return "Công nghệ Thông tin";
        else if($this->nganhhoc=="kt")
            return "Kinh Tế";
        else
            return "Khác";
    }
}
class GIANG_VIEN extends NGUOI{
    var $trinhdo;
    const luongcoban = 1500000;
    function set_trinhdo($trinhdo){
        return $this->trinhdo=$trinhdo;
    }
    function get_trinhdo(){
        if($this->trinhdo=="Cử nhân")
            return $this->trinhdo;
        else if($this->trinhdo=="Thạc sĩ")
            return $this->trinhdo;
        else if($this->trinhdo=="Tiến sĩ")
            return $this->trinhdo;
    }
    function get_luongcoban(){
        if($this->trinhdo=="Cử nhân")
            return self::luongcoban*2.34;
        else if($this->trinhdo=="Thạc sĩ")
            return self::luongcoban*3.67;
        else if($this->trinhdo=="Tiến sĩ")
            return self::luongcoban*5.66;
    }
}
?>
<?php
$result = "";
    if(isset($_POST['chucvu']))
    {
        if($_POST['chucvu']=="Giảng viên")
        {
            if(isset($_POST['hoten'])&&isset($_POST['gioitinh'])&&isset($_POST['diachi'])&&isset($_POST['trinhdo']))
            {
                $gv = new GIANG_VIEN();
                $gv->set_hoten($_POST['hoten']);
                $gv->set_gioitinh($_POST['gioitinh']);
                $gv->set_diachi($_POST['diachi']);
                $gv->set_trinhdo($_POST['trinhdo']);

                $hoten = $gv->get_hoten();
                $gioitinh = $gv->get_gioitinh();
                $diachi = $gv->get_diachi();
                $trinhdo = $gv->get_trinhdo();
                $luong = $gv->get_luongcoban();
                $result = "Họ tên: $hoten &#10;Giới tính: $gioitinh&#10;Địa chỉ: $diachi&#10;Trình độ: $trinhdo&#10;Lương: $luong";
            }
        }
        else
        {
            if(isset($_POST['hoten'])&&isset($_POST['gioitinh'])&&isset($_POST['diachi'])&&isset($_POST['lophoc'])&&isset($_POST['nganhhoc']))
            {
                $sv = new SINH_VIEN();
                $sv->set_hoten($_POST['hoten']);
                $sv->set_gioitinh($_POST['gioitinh']);
                $sv->set_diachi($_POST['diachi']);
                $sv->set_lophoc($_POST['lophoc']);
                $sv->set_nganhhoc($_POST['nganhhoc']);

                $hoten = $sv->get_hoten();
                $gioitinh = $sv->get_gioitinh();
                $diachi = $sv->get_diachi();
                $lop = $sv->get_lophoc();
                $nganhhoc = $sv->get_nganhhoc();
                if($nganhhoc=="Công nghệ Thông tin")
                {
                    $diemthuong = 1;
                }
                else if($nganhhoc=="Kinh Tế")
                {
                    $diemthuong = 1.5;
                }
                else
                {
                    $diemthuong = 0;
                }
                $result = "Họ tên: $hoten &#10;Giới tính: $gioitinh&#10;Địa chỉ: $diachi&#10;Lớp: $lop&#10;Ngành: $nganhhoc&#10;Điểm thưởng: $diemthuong&#10;";
            }
        }
    }
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
    <link rel="stylesheet" href="../../css/style2.css">
    <link rel="stylesheet" href="../../css/font.css">
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
        margin-left:20px;
        margin-right:20px;
    }
    img[src*="https://cdn.000webhost.com/000webhost/logo/footer-powered-by-000webhost-white2.png"] {
        display: none;
    }
    </style>
</head>

<body>
    <div id='dangki' style='height:80vh;width: 60%;margin-left:auto;margin-right:auto;margin-top:15vh'
        class='post flex-ngang flex-doc animate__animated'>
        <form action="baitapthem.php" method="POST" autocomplete="off" name='dangki'>
            <h2 class="font-lato-light">Đăng kí</h2>
            <div class='row flex-ngang'>
                <div class='form-outline'>
                    <div style="margin-left:20px;" class="flex-doc flex-ngang">
                        <div class='giancach'>
                            <span>Giảng viên</span>
                            <input id='gv' onclick="change(this.id)" type='radio' name='chucvu' value='Giảng viên' checked='true'/>
                        </div>   
                        <div class='giancach'>
                            <span>Sinh viên</span>
                            <input id='sv' onclick="change(this.id)" type='radio' name='chucvu' value='Sinh viên'/>
                        </div> 
                    </div>
                </div>
            </div>
            <div class='row flex-ngang'>
                <div class='form-outline col-md-5'>
                    <div style="margin-left:20px;" class="flex-doc">
                        <span class="material-icons-outlined">badge</span>
                        <input class="form-in" onkeyup="kiemtradangki()" minlength="2" maxlength="30" type="text"
                            autocomplete="off" name="hoten" id='hoten' placeholder="Họ tên" required />
                    </div>
                </div>
                <div class='form-outline col-md-5'>
                    <div class="flex-doc">
                        <select class='select-in w-100' name='gioitinh' required>
                            <option value="" disabled selected>Chọn giới tính</option>
                            <option value="0">Nam</option>
                            <option value="1">Nữ</option>
                            <option value="2">Khác</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class='row flex-ngang'>
                <div class='form-outline col-md-5'>
                    <div style="margin-left:20px;" class="flex-doc">
                        <span class="material-icons-outlined">badge</span>
                        <input class="form-in" type="text"
                            autocomplete="off" name="diachi" placeholder="Địa chỉ" required />
                    </div>
                </div>
                <div id='trinhdo' class='form-outline col-md-5'>
                    <div class="flex-doc">
                        <select class='select-in w-100' name='trinhdo'>
                            <option value="" disabled selected>Chọn trình độ</option>
                            <option value="Cử nhân">Cử nhân</option>
                            <option value="Thạc sĩ">Thạc sĩ</option>
                            <option value="Tiến sĩ">Tiến sĩ</option>
                        </select>
                    </div>
                </div>
                <div id='lop' class='form-outline col-md-5 d-md-none'>
                    <div style="margin-left:20px;" class="flex-doc">
                        <span class="material-icons-outlined">badge</span>
                        <input class="form-in" type="text"
                            autocomplete="off" name="lophoc" placeholder="Lớp học"/>
                    </div>
                </div>
            </div>
            <div id='nganh' class='row flex-ngang d-md-none'>
                <div class='form-outline col-md-5'>
                    <div class="flex-doc">
                        <select class='select-in w-100' name='nganhhoc'>
                            <option value="" disabled selected>Chọn ngành học</option>
                            <option value="cntt">CNTT</option>
                            <option value="kt">Kinh Tế</option>
                            <option value="khac">Khác</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="flex-ngang">
                <button class="w-75 btn" type="submit" style="background-color: rgb(60, 59, 97);color:white">Show thông tin</button>
            </div>
        </form>
    </div>

    <div class='flex-ngang' style='margin-top:40px'>
        <div class='post font-lato-heavy animate__animated animate__backInLeft w-75'
                style='font-size: 1em;color:rgb(71, 69, 110)'>
                <b>Kết quả</b>
                <div class='row no-gutters flex-ngang'>
                    <hr width='90%' color='white' style='opacity: 30%;' />
                </div>
                <div>
                    <textarea class='dangbai' rows='5' disabled="disabled"><?php
                            echo $result;            
                        ?></textarea>
        </div>
    </div>
    </div>
    
</body>
<script>
    var lop = document.getElementById('lop');
    var nganh = document.getElementById('nganh');
    var trinhdo = document.getElementById('trinhdo');
    function change(chucvu){
        if(chucvu=="gv")
        {
            lop.classList.add('d-md-none');
            nganh.classList.add('d-md-none');
            trinhdo.classList.remove('d-md-none');
        }
        else
        {
            lop.classList.remove('d-md-none');
            nganh.classList.remove('d-md-none');
            trinhdo.classList.add('d-md-none');
        }
    }
</script>
</html>