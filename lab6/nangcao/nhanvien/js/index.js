//thêm nhân viên không cần reload
function submit_them_nhanvien() {
    var data = new FormData();
    data.append("ho_nv", document.getElementById("ho_nv").value);
    data.append("ten_nv", document.getElementById("ten_nv").value);
    data.append("ngaysinh_nv", document.getElementById("ngaysinh_nv").value);
    data.append("gioitinh_nv", document.getElementById("gioitinh_nv").value);
    data.append("diachi_nv", document.getElementById("diachi_nv").value);
    data.append("loai_nv", document.getElementById("loai_nv").value);
    data.append("phongban_nv", document.getElementById("phongban_nv").value);
    data.append("upload_anh", document.forms['them_nv']['upload_anh'].files[0]);
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "chucnang/them_nv.php");
    xhr.onload = function () {
        console.log(this.response);
    };
    xhr.send(data);
    return false;
}
//thêm loại nhân viên không cần reload
function submit_them_loainhanvien() {
    var data = new FormData();
    data.append("tenloai", document.getElementById("tenloai").value);
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "chucnang/them_loainv.php");
    xhr.onload = function () {
        console.log(this.response);
    };
    xhr.send(data);
    return false;
}
//thêm loại nhân viên không cần reload
function submit_them_phongban() {
    var data = new FormData();
    data.append("phongbannv", document.getElementById("phongbannv").value);
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "chucnang/them_phongban.php");
    xhr.onload = function () {
        console.log(this.response);
    };
    xhr.send(data);
    return false;
}

var danhsach_nv = document.getElementById('ds_nv');
var them_nv = document.getElementById('them_nv');
var tracuu_nv = document.getElementById('tracuu_nv');
var loai_nv = document.getElementById('ds_loainv');
var phong_ban = document.getElementById('ds_phongban');
first_load();
async function first_load(){
    document.getElementById('content').innerHTML = "<div style='height:85vh' class='flex-ngang flex-doc'><div class='lds-ring'><div></div><div></div><div></div><div></div></div></div>";
    await sleep(1000);
    danhsach(); 
}

var time = 1000;
function loading(){
    document.getElementById('content').innerHTML = "<div style='height:85vh' class='flex-ngang flex-doc'><div class='lds-ring'><div></div><div></div><div></div><div></div></div></div>";
}
// chuyển trang danh sách
async function danhsach() {
    danhsach_nv.classList.add("clicked");
    them_nv.classList.remove("clicked");
    tracuu_nv.classList.remove("clicked");
    loai_nv.classList.remove("clicked");
    phong_ban.classList.remove("clicked");
    loading();
    await sleep(time);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('content').innerHTML =
                this.responseText;
        }
    };
    xhttp.open('GET', 'page/danhsach_nv.php', true);
    xhttp.send();

}

// Chuyển trang thêm
async function them() {
    danhsach_nv.classList.remove("clicked");
    them_nv.classList.add("clicked");
    tracuu_nv.classList.remove("clicked");
    loai_nv.classList.remove("clicked");
    phong_ban.classList.remove("clicked");
    loading();
    await sleep(time);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('content').innerHTML =
                this.responseText;
        }
    };
    xhttp.open('GET', 'page/them_nv.php', true);
    xhttp.send();

}

//chuyển trang loại nhân viên
async function loainv() {
    danhsach_nv.classList.remove("clicked");
    them_nv.classList.remove("clicked");
    tracuu_nv.classList.remove("clicked");
    loai_nv.classList.add("clicked");
    phong_ban.classList.remove("clicked");
    loading();
    await sleep(time);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('content').innerHTML =
                this.responseText;
        }
    };
    xhttp.open('GET', 'page/ds_loainv.php', true);
    xhttp.send();

}
//chuyển trang phòng ban
async function phongban() {
    danhsach_nv.classList.remove("clicked");
    them_nv.classList.remove("clicked");
    tracuu_nv.classList.remove("clicked");
    loai_nv.classList.remove("clicked");
    phong_ban.classList.add("clicked");
    loading();
    await sleep(time);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('content').innerHTML =
                this.responseText;
        }
    };
    xhttp.open('GET', 'page/ds_phongban.php', true);
    xhttp.send();

}
//chuyển trang tra cứu
async function tracuu() {
    danhsach_nv.classList.remove("clicked");
    them_nv.classList.remove("clicked");
    tracuu_nv.classList.add("clicked");
    loai_nv.classList.remove("clicked");
    phong_ban.classList.remove("clicked");
    loading();
    await sleep(time);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('content').innerHTML =
                this.responseText;
        }
    };
    xhttp.open('GET', 'page/tracuu_nv.php', true);
    xhttp.send();

}
//Thông báo sau khi thêm nhân viên
var thongbao = document.getElementById('thong_bao');
//hàm mở thông báo và các điều kiện kèm theo
function open_thongbao() {
    var ho = document.getElementById("ho_nv").value;
    var ten = document.getElementById("ten_nv").value;
    var ns = document.getElementById("ngaysinh_nv").value;
    var gt = document.getElementById("gioitinh_nv").value;
    var dc = document.getElementById("diachi_nv").value;
    var loai = document.getElementById("loai_nv").value;
    var phong = document.getElementById("phongban_nv").value;
    var anh = document.forms['them_nv']['upload_anh'].files[0];

    if (ho != "" && ten != "" && ns != "" && gt != "" && dc != "" && loai != "" && phong != "" && anh != undefined) {
        console.log(anh);
        thongbao.showModal();
        thongbao.classList.remove("animate__backOutUp");
        thongbao.classList.add("animate__bounceInDown");
    }
    else
        console.log("lỗi");

}
//hàm đóng thông báo
async function close_thongbao() {
    thongbao.classList.add("animate__backOutUp");
    thongbao.classList.remove("animate__bounceInDown");
    await sleep(600);
    thongbao.close();
}
function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}
//hàm tra cứu nhân viên trong page tra cứu nhân viên, dùng ajax để liên kết tới chucnang/tracuu_nv.php
function tracuu_nhanvien() {
    var ten = document.getElementById("ten_nv").value;
    var phongban = document.getElementById("phongban_nv").value;
    var loainv = document.getElementById("loai_nv").value;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('customers').innerHTML =
                this.responseText;
        }
    };
    xhttp.open('GET', 'chucnang/tracuu_nv.php?hoten=' + ten + '&phongban=' + phongban + '&loainv=' + loainv, true);
    xhttp.send();
}
function dangxuat(){
    window.location = "http://localhost/baitap/lab6/nangcao/nhanvien/login/dangxuat.php";
}