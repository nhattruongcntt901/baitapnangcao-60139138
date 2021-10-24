<?php include("../include/ketnoi.php");  ?>
<!-- Gắn hàm kiểm tra level admin vào?-->
<?php include("../chucnang/kiemtra_level_admin.php");
//Từ level 2 trở lên được phép vào
kiemtra_level_admin(2);
?>

<!DOCTYPE html>
<html lang="en">
<!-- Head Tag -->
<?php include('head.php'); ?>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- include sidebar-->
        <?php include('sidebar.php'); ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column w-100">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <!-- Page Heading -->
                    <div style='width:100%'>
                        <span class="h3 mb-4 text-gray-800">Thêm admin mới</span>
                        <div style='float:right'><span
                                style='padding-right:20px;color:black'><b>Chào,<?php echo $_SESSION['username']; ?></b></span><a
                                href="../chucnang/xuly_logout_admin.php"><button class='btn btn-warning'>Đăng
                                    Xuất</button></a></div>
                    </div>
                </nav>
                <!-- End of Topbar -->
                <!-- Begin Page Content-->
                <div class="container-fluid">
                    <form action="../chucnang/add_user_admin.php" method="post">
                        <div class="form-group">
                            <label>Username *</label>
                            <input type="text" name="username" class="form-control" placeholder="Username" autofocus
                                required value="<?php echo !empty($data['username']) ? $data['username'] : ''; ?>" />
                            <?php if (!empty($errors['username'])) echo $errors['username']; ?>

                        </div>
                        <div class="form-group">
                            <label>Password *</label>
                            <input type="text" name="password" class="form-control" placeholder="Password" autofocus
                                required value="<?php echo !empty($data['password']) ? $data['password'] : ''; ?>" />
                            <?php if (!empty($errors['password'])) echo $errors['password']; ?>
                        </div>

                        <div class="form-group">
                           
                            <!--                        <input type="text" name="level" class="form-control" placeholder="Level" autofocus required-->
                            <!--                               value="--><?php //echo !empty($data['level']) ? $data['level'] : ''; ?>
                            <!--"/>-->
                            <!--                        --><?php //if (!empty($errors['level'])) echo $errors['level']; ?>
                            
                            <select name="level">
                                <option value="1">Level 1</option>
                                <option value="2">Level 2</option>
                            </select>
                        </div>
                        <input type="submit" name="add_user" class="btn btn-success btn-block" value="Save Nhạc">
                    </form>
                </div>
                <!-- /.container-fluid -->

            </div>
            <?php  include ('footer.php'); ?>
            <!-- /.container-fluid -->
        </div>
    </div>
    <!-- End of Main Content -->
    <!--Footer -->

</body>

</html>