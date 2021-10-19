
<form action="upload.php" method="post" enctype="multipart/form-data">
    <input type="file" name='upload_img' accept="image/*"/>
    <button type="submit">Upload Ảnh!</button>
</form>

<?php

if(isset($_FILES['upload_img']['name']))
{   
    echo "Upload thành công";
    $thumuc     = "anh_upload/";
    $name       = "upload_img";
    $ten_file   = $_FILES['upload_img']['name'];
    
    upload_image_file($thumuc,$name,$ten_file);
    echo "<img src='anh_upload/$ten_file' style='object-fit:cover' width='300' height='300' /><br>";
    echo "Size: ".$_FILES['upload_img']['size']."<br>";
    echo "Name: ".$_FILES['upload_img']['name']."<br>";
}

function upload_image_file($thumuc,$name,$ten_file){

    $upload_name    = $_FILES["$name"]["name"];
    $upload_size    = $_FILES["$name"]["size"];
    $upload_tmpname = $_FILES["$name"]['tmp_name'];


    $file_path = $thumuc.$upload_name;
    $file_type = strtolower(pathinfo($file_path, PATHINFO_EXTENSION));
    $tenfile = $ten_file;
    $file_path = $thumuc.$tenfile;
    $type = array('jpg','jpeg','png','gif');
    
    if(in_array($file_type,$type))
    {
        $dk = true;
        if(isset($_POST["submit"])) 
        {
            $check = getimagesize($upload_tmpname);
            if($check !== false) 
            {
              echo "Đây là hình- " . $check["mime"] . ".";
              $dk = true;
              if($upload_size>2097152)
                {
                    echo "File dung lượng lớn";
                    $dk = false;
                }
                if(file_exists($file_path))
                {
                    echo "File Trùng";
                    $dk = false;
                }
            } 
            else
            {
              echo "File is not an image.";
              $dk = false;
            }
        }
    }
    if($dk == true)
    {
        move_uploaded_file($upload_tmpname,$file_path);
    }
}
?>
  