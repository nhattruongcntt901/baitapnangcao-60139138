<?php

abstract class NGUOI{
    protected $maso,$hoten,$ngaysinh,$gioitinh;


    public function set_maso($maso){
        $this->maso = $maso;
    }
    public function set_hoten($hoten){
        $this->hoten = $hoten;
    }
    public function set_ngaysinh($ngaysinh){
        $this->ngaysinh = $ngaysinh;
    }
    public function set_gioitinh($gioitinh){
        $this->gioitinh = $gioitinh;
    } 


    public function get_maso(){
        return $this->maso;
    }
    public function get_hoten(){
        return $this->hoten;
    }
    public function get_ngaysinh(){
        return $this->ngaysinh;
    }
    public function get_gioitinh(){
        return $this->gioitinh;
    }
    abstract public function tinhthuong();
}
class NV_VANPHONG extends NGUOI{
    const luongcoban = 1450000;
    protected $namcongtac;
    function set_namcongtac($namcongtac){
        $this->namcongtac = $namcongtac;
    }
    function get_namcongtac(){
        return $this->namcongtac;
    }

    function tinhthuong(){
        if($this->namcongtac>=22 && $this->namcongtac <=25)
        {
            return self::luongcoban*$this->namcongtac*1.1; 
        }
        else if($this->namcongtac>=26 && $this->namcongtac <=30)
        {
            return self::luongcoban*$this->namcongtac*1.2;
        }
        else if($this->namcongtac > 30)
        {
            return self::luongcoban*$this->namcongtac;
        }
        else 
            return "Số năm công tác không hợp lệ";
    }
}
class NV_PHUCVU extends NGUOI{
    protected $chucvu,$songaycong;

    function set_chucvu($chucvu){
        $this->chucvu = $chucvu;
    }
    function set_songaycong($songaycong){
        $this->songaycong = $songaycong;
    }
    function get_chucvu(){
        return $this->chucvu;
    }
    function get_songaycong(){
        return $this->songaycong;
    }
    function tinhthuong(){
        if($this->songaycong==28)
        {
            return 50000*28;
        }
        else if($this->songaycong<28 && $this->songaycong>=0)
        {
            return $this->songaycong*40000;
        }
        else 
            return "Số ngày công không hợp lệ để tính thưởng";
    }
}
?>
<?php
$ketqua = "";
if(isset($_POST['nhanvien']))
{
    if($_POST['nhanvien']=="vp")
    {
        if(isset($_POST['maso'])&&isset($_POST['hoten'])&&isset($_POST['ngaysinh'])&&isset($_POST['gioitinh'])&&isset($_POST['namct']))
        {
            $vp = new NV_VANPHONG();
            $vp->set_maso($_POST['maso']);
            $vp->set_hoten($_POST['hoten']);
            $vp->set_ngaysinh($_POST['ngaysinh']);
            $vp->set_gioitinh($_POST['gioitinh']);
            $vp->set_namcongtac($_POST['namct']);

            $maso = $vp->get_maso();
            $hoten = $vp->get_hoten();
            $ngaysinh = $vp->get_ngaysinh();
            $gioitinh = $vp->get_gioitinh();
            $namcongtac = $vp->get_namcongtac();
            $thuong = $vp->tinhthuong();
            if(is_numeric($thuong))
            {
                $thuong = number_format($thuong);
                strval($thuong);
                $thuong = $thuong." VNĐ"; 
            }
            $ketqua = "Mã số: $maso&#10;Họ tên: $hoten &#10;Giới tính: $gioitinh&#10;Ngày sinh: $ngaysinh&#10;Năm công tác: $namcongtac&#10;Thưởng: $thuong";
        }
    }
    else
    {
        if(isset($_POST['maso'])&&isset($_POST['hoten'])&&isset($_POST['ngaysinh'])&&isset($_POST['gioitinh'])&&isset($_POST['chucvu'])&&isset($_POST['songaycong']))
        {
            $pv = new NV_PHUCVU();
            $pv->set_maso($_POST['maso']);
            $pv->set_hoten($_POST['hoten']);
            $pv->set_ngaysinh($_POST['ngaysinh']);
            $pv->set_gioitinh($_POST['gioitinh']);
            $pv->set_chucvu($_POST['chucvu']);
            $pv->set_songaycong($_POST['songaycong']);

            $maso = $pv->get_maso();
            $hoten = $pv->get_hoten();
            $ngaysinh = $pv->get_ngaysinh();
            $gioitinh = $pv->get_gioitinh();
            $chucvu = $pv->get_chucvu();
            $songaycong = $pv->get_songaycong();
            $thuong = $pv->tinhthuong();
            if(is_numeric($thuong))
            {
                $thuong = number_format($thuong);
                strval($thuong);
                $thuong = $thuong." VNĐ"; 
            }

            $ketqua = "Mã số: $maso&#10;Họ tên: $hoten &#10;Giới tính: $gioitinh&#10;Ngày sinh: $ngaysinh&#10;Chức vụ: $chucvu&#10;Số ngày công: $songaycong&#10;Thưởng: $thuong";
        }
    }
}
else
    {
        $ketqua = "lỗi";
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

    .giancach {
        margin-left: 20px;
        margin-right: 20px;
    }

    body {
        background-color: rgb(61, 57, 116);
        background-repeat: no-repeat;
        background-size: cover;
        font-family: 'Lato', sans-serif !important;
    }

    img {
        object-fit: cover;
    }

    ul,
    li {
        list-style-type: none;
        padding-top: 1.7vh;
        padding-bottom: 1.7vh;
        width: 90%;
        border-radius: 10px;
    }

    ul li span:hover {
        cursor: pointer;
    }

    span {
        color: rgb(255, 255, 255, 0.7);
        font-size: 20px;
    }

    a {
        text-decoration: none;
        color: white;
    }

    .cl-select {
        background-color: rgb(141, 140, 178, 1);
        transition: background-color 0.2s;
    }

    .cl-select-none {
        background-color: rgb(141, 140, 178, 0);
        transition: background-color 0.2s;
    }

    #li {
        opacity: 0;
        -webkit-transition: all 2s ease-in-out;
        -moz-transition: all 2s ease-in-out;
        -ms-transition: all 2s ease-in-out;
        -o-transition: all 2s ease-in-out;
        transition: all 2s ease-in-out;
    }

    .searchbox {
        border: solid rgb(255, 255, 255, 0.5) 1px;
        border-radius: 30px;
    }

    input:focus,
    textarea:focus,
    select:focus,
    button:focus {
        outline: none;
    }

    ::placeholder {
        /* Chrome, Firefox, Opera, Safari 10.1+ */
        color: white;
        opacity: 0.5;
        /* Firefox */
    }

    dialog {
        border: none;
        outline: none;
        border-radius: 5px;
    }

    .post {
        border: none;
        outline: none;
        border-radius: 10px;
        color: #333;
        font-family: sans-serif;
        line-height: 1.5;
        width: 100%;
        padding: 1rem 2rem;
        -webkit-backdrop-filter: blur(10px);
        backdrop-filter: blur(10px);
        background-color: rgba(255, 255, 255, 0.5);
        z-index: 1;
    }

    .dialog-table1 {
        -webkit-backdrop-filter: blur(10px);
        backdrop-filter: blur(10px);
        background-color: rgba(255, 255, 255, 0.5);
        border-radius: 10px;
    }

    .dialog-table {
        -webkit-backdrop-filter: blur(10px);
        backdrop-filter: blur(10px);
        background-color: rgba(255, 255, 255, 0.5);
        border-radius: 10px;
    }

    .binhluan {
        border: none;
        outline: none;
        border-radius: 20px;
        font-family: sans-serif;
        width: 100%;
        background-color: rgb(61, 57, 116);
        animation: modan 0.5s forwards;
    }

    @keyframes modan {
        from {
            height: 0px;
            opacity: 0;
        }

        to {
            top: -50vh;
            opacity: 1;
            height: 50vh;
        }
    }

    @supports ((-webkit-backdrop-filter: none) or (backdrop-filter: none)) {
        .binhluan {
            background-color: rgb(61, 57, 116);
            -webkit-backdrop-filter: blur(2em);
            backdrop-filter: blur(2em);
        }
    }

    .noilen {
        z-index: 1;
    }

    .dangbai {
        width: 100%;
        height: 90%;
        background-color: transparent;
        border: none;
        color: rgba(0, 0, 0, 0.5);
        font-size: 30px;

    }

    /* width */
    ::-webkit-scrollbar {
        width: 10px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
        box-shadow: inset 0 0 5px grey;
        border-radius: 10px;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
        background: rgb(199, 199, 199);
        border-radius: 10px;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        background: #d1d1d1;
    }

    .cachdong {
        margin-top: 15px;
        margin-bottom: 15px;
    }

    .shawdow {
        filter: drop-shadow(6px 6px 4px rgb(0, 0, 0, 0.4));
    }

    .parent {
        width: 45%;
        height: 600px;
        display: table-cell;
        vertical-align: bottom;
    }

    .child {
        vertical-align: bottom;
    }

    div.b {
        word-wrap: break-word;
    }

    .form-in {
        background-color: transparent;
        border: none;
        margin-top: 10px;
        margin-bottom: 10px;
        border-radius: 20px;
        width: 80%;
        margin-left: 10px;
        color: rgb(66, 65, 107);
        font-family: Lato-Heavy;
    }

    .form-in::placeholder {
        /* Chrome, Firefox, Opera, Safari 10.1+ */
        color: white;
        opacity: 0.8;
        /* Firefox */
        font-family: Lato-Light;
    }

    .form-in:focus {
        /* Chrome, Firefox, Opera, Safari 10.1+ */
        background-color: transparent;
        margin-top: 10px;
        margin-bottom: 10px;
        border-radius: 20px;
        color: rgb(66, 65, 107);
        font-family: Lato-Heavy;
        margin-left: 10px;
    }

    .form-outline {
        border: solid 1px rgba(255, 255, 255, 0.5);
        border-radius: 20px;
        margin: 10px;
        width: 500px;
    }

    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }

    .select-in {
        background-color: transparent;
        height: 7vh;
        border: none;
        color: rgb(255, 255, 255, 0.6);
    }

    option {
        color: rgba(114, 124, 182, 0.6);
    }

    .xacnhanmail {
        width: 200px;
        height: 100px;
        font-size: 3em
    }

    .xacnhanmail::placeholder {
        font-size: 0.8em;
    }

    .like {
        cursor: pointer;
    }

    .like:hover {
        cursor: pointer;
    }
    </style>
</head>

<body>
    <div id='dangki' style='height:80vh;width: 60%;margin-left:auto;margin-right:auto;margin-top:15vh'
        class='post flex-ngang flex-doc animate__animated'>
        <form action="qlnv.php" method="POST" autocomplete="off" name='dangki'>
            <h2 class="font-lato-light">Đăng kí</h2>
            <div class='row flex-ngang'>
                <div class='form-outline'>
                    <div style="margin-left:20px;" class="flex-doc flex-ngang">
                        <div class='giancach'>
                            <span>NV Văn Phòng</span>
                            <input id='vp' onclick="change(this.id)" type='radio' name='nhanvien' value='vp'
                                checked='true' />
                        </div>
                        <div class='giancach'>
                            <span>NV Phục Vụ</span>
                            <input id='pv' onclick="change(this.id)" type='radio' name='nhanvien' value='pv' />
                        </div>
                    </div>
                </div>
            </div>
            <div class='row flex-ngang'>
                <div class='form-outline col-md-5'>
                    <div style="margin-left:20px;" class="flex-doc">
                        <span class="material-icons-outlined">badge</span>
                        <input class="form-in" type="number" autocomplete="off" name="maso" placeholder="Mã Số"
                            required />
                    </div>
                </div>
                
                <div class='form-outline col-md-5'>
                    <div class="flex-doc">
                        <select class='select-in w-100' name='gioitinh' required>
                            <option value="" disabled selected>Chọn giới tính</option>
                            <option value="Nam">Nam</option>
                            <option value="Nữ">Nữ</option>
                            <option value="Khác">Khác</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class='row flex-ngang'>
               <div class='form-outline col-md-5'>
                    <div style="margin-left:20px;" class="flex-doc">
                        <span class="material-icons-outlined">badge</span>
                        <input class="form-in" minlength="2" maxlength="30" type="text"
                            autocomplete="off" name="hoten" placeholder="Họ tên" required />
                    </div>
                </div>
                <div class='form-outline col-md-5'>
                    <div style="margin-left:20px;" class="flex-doc">
                        <span class="material-icons-outlined">badge</span>
                        <input id='ngaysinh' placeholder="Ngày sinh" name='ngaysinh' class="form-in" type="text" onfocus="(this.type='date')" id="date" require>
                    </div>
                </div>
            </div>
            <div id='nvvp' class='row flex-ngang'>
                <div class='form-outline col-md-5'>
                    <div style="margin-left:20px;" class="flex-doc">
                        <span class="material-icons-outlined">badge</span>
                        <input class="form-in"  type="text"
                            autocomplete="off" name="namct" placeholder="Năm công tác"/>
                    </div>
                </div>
            </div>
            <div id='nvpv' class='row flex-ngang d-md-none'>
                <div class='form-outline col-md-5'>
                    <div style="margin-left:20px;" class="flex-doc">
                        <span class="material-icons-outlined">badge</span>
                        <input class="form-in" type="text"
                            autocomplete="off" name="chucvu" placeholder="Chức vụ" />
                    </div>
                </div>
                <div class='form-outline col-md-5'>
                    <div style="margin-left:20px;" class="flex-doc">
                        <span class="material-icons-outlined">badge</span>
                        <input class="form-in"  type="number"
                            autocomplete="off" name="songaycong" max='28' min='0' placeholder="Số ngày công"/>
                    </div>
                </div>
            </div>

            <div class="flex-ngang">
                <button class="w-75 btn" type="submit" style="background-color: rgb(60, 59, 97);color:white">Show thông
                    tin</button>
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
                            echo $ketqua;            
                        ?></textarea>
            </div>
        </div>
    </div>

</body>
<script>
var nvvp= document.getElementById('nvvp');
var nvpv = document.getElementById('nvpv');

function change(nv) {
    if (nv == "pv") {
        nvvp.classList.add('d-md-none');
        nvpv.classList.remove('d-md-none');
    } else {
        nvvp.classList.remove('d-md-none');
        nvpv.classList.add('d-md-none');
    }
}
</script>

</html>