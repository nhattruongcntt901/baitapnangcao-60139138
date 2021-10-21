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
// chuyển trang danh sách
function danhsach() {
    window.location = "http://localhost/baitap/lab6/nangcao/nhanvien/page/danhsach_nv.php?page=1"
}

// Chuyển trang thêm
function them() {
    window.location = "http://localhost/baitap/lab6/nangcao/nhanvien/page/them_nv.php";
}

//chuyển trang loại nhân viên
function loainv() {
    window.location = "http://localhost/baitap/lab6/nangcao/nhanvien/page/ds_loanv.php";

}
//chuyển trang phòng ban
function phongban() {
    window.location = "http://localhost/baitap/lab6/nangcao/nhanvien/page/ds_phongban.php";

}
//chuyển trang tra cứu
function tracuu() {
    window.location = "http://localhost/baitap/lab6/nangcao/nhanvien/page/tracuu_nv.php";

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