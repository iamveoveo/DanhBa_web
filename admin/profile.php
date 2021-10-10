<?php include("particals/header.php"); ?>

<?php
    $email = $_SESSION['user'];

    $sql = "select * from db_nguoidung where email = '$email'";
    $res = mysqli_query($conn, $sql);

    if(mysqli_num_rows($res) == 1){
        $row = mysqli_fetch_assoc($res);
    }
?>

<style>
.form-control:focus {
    box-shadow: none;
    border-color: #BA68C8
}

.profile-button {
    background: rgb(99, 39, 120);
    box-shadow: none;
    border: none
}

.profile-button:hover {
    background: #682773
}

.profile-button:focus {
    background: #682773;
    box-shadow: none
}

.profile-button:active {
    background: #682773;
    box-shadow: none
}

.back:hover {
    color: #682773;
    cursor: pointer
}

.labels {
    font-size: 11px
}

.add-experience:hover {
    background: #BA68C8;
    color: #fff;
    cursor: pointer;
    border: solid 1px #BA68C8
}
</style>
    <div class="container rounded bg-white mt-5 mb-5 pe-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <img class="rounded-circle mt-5 avatar" width="150px" src="<?php echo $row['image_name']; ?>">
                    <span class="font-weight-bold"><?php echo $row['name']; ?></span>
                    <span class="text-black-50"><?php echo $row['email']; ?></span>
                </div>
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">THÔNG TIN CÁ NHÂN</h4>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Họ và tên</label><input type="text"
                                class="form-control" placeholder="Họ và tên" value="<?php echo $row['name']; ?>"
                                name="name" disabled></div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels">Ngày sinh</label><input type="date"
                                class="form-control" name="ngaysinh" min="1940-01-01"
                                value="<?php echo $row['ngaysinh']; ?>" disabled></div>
                        <div class="col-md-6">
                            <label class="labels">Giới tính</label>
                            <select name="gioitinh" class="form-select" disabled>
                                <option value=null<?php echo $row['gioitinh']==null?' selected="selected"':'' ?>>
                                </option>
                                <option value="Nam" <?php echo $row['gioitinh']=='Nam'?' selected="selected"':'' ?>>Nam
                                </option>
                                <option value="Nữ" <?php echo $row['gioitinh']=='Nữ'?' selected="selected"':'' ?>>Nữ
                                </option>
                                <option value="Khác" <?php echo $row['gioitinh']=='Khác'?' selected="selected"':'' ?>>
                                    Khác</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Số điện thoại</label><input type="text"
                                class="form-control" placeholder="Số điện thoại" name="sdt"
                                value="<?php echo $row['sdt']; ?>" disabled></div>
                        <div class="col-md-12"><label class="labels">Địa chỉ</label><input type="text"
                                class="form-control" placeholder="Địa chỉ" name="diachi"
                                value="<?php echo $row['diachi']; ?>" disabled></div>
                    </div>
                    <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button"
                            name="edit" data-bs-toggle="modal" data-bs-target="#exampleModal">Chỉnh sửa</button></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center experience"><span>Edit
                            Experience</span><span class="border px-3 p-1 add-experience"><i
                                class="fa fa-plus"></i>&nbsp;Experience</span></div><br>
                    <div class="col-md-12"><label class="labels">Experience in Designing</label>
                        br
                        CHƯA HOÀN THIỆN
                        <!-- <input type="text" class="form-control" placeholder="experience" value=""></div> <br> -->
                        <div class="col-md-12"><label class="labels">Additional Details</label>
                            <!-- <input type="text" class="form-control" placeholder="additional details" value=""> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header text-light" style="background-color:#8f8f8f;">
                <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa thông tin cá nhân</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-5 border-right">
                            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                                <img class="rounded-circle mt-5 avatar" width="150px" src="<?php echo $row['image_name']; ?>">
                                <span class="font-weight-bold"><?php echo $row['name']; ?></span>
                                <span class="text-black-50"><?php echo $row['email']; ?></span>
                            </div>
                            <div class="text-right">
                                <label class="labels">Thay đổi ảnh đại diện</label>
                                <input type="file" class="form-control" name="file_image" id="file_image">
                            </div>
                        </div>
                        <div class="col-md-6 border-right">
                            <div class="p-3 py-5">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="text-right">THÔNG TIN CÁ NHÂN</h4>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12"><label class="labels">Họ và tên</label><input type="text"
                                            class="form-control" placeholder="Họ và tên" value="<?php echo $row['name']; ?>"
                                            name="name"></div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6"><label class="labels">Ngày sinh</label><input type="date"
                                            class="form-control" name="ngaysinh" min="1940-01-01"
                                            value="<?php echo $row['ngaysinh']; ?>"></div>
                                    <div class="col-md-6">
                                        <label class="labels">Giới tính</label>
                                        <select name="gioitinh" class="form-select">
                                            <option
                                                value=null<?php echo $row['gioitinh']==null?' selected="selected"':'' ?>>
                                            </option>
                                            <option value="Nam"
                                                <?php echo $row['gioitinh']=='Nam'?' selected="selected"':'' ?>>Nam</option>
                                            <option value="Nữ"
                                                <?php echo $row['gioitinh']=='Nữ'?' selected="selected"':'' ?>>Nữ</option>
                                            <option value="Khác"
                                                <?php echo $row['gioitinh']=='Khác'?' selected="selected"':'' ?>>Khác
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12"><label class="labels">Số điện thoại</label><input type="text"
                                            class="form-control" placeholder="Số điện thoại" name="sdt"
                                            value="<?php echo $row['sdt']; ?>"></div>
                                    <div class="col-md-12"><label class="labels">Địa chỉ</label><input type="text"
                                            class="form-control" placeholder="Địa chỉ" name="diachi"
                                            value="<?php echo $row['diachi']; ?>"></div>
                                </div>
                                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit"
                                        name="submit">Chỉnh sửa</button></div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
    if(isset($_POST['submit'])){
        $target_dir = "images/";
        $target_file = $target_dir . basename($_FILES["file_image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["file_image"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["file_image"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
            // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["file_image"]["tmp_name"], $target_file)) {
                echo "The file ". htmlspecialchars( basename( $_FILES["file_image"]["name"])). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }

        $sql1 = "update db_nguoidung set 
                image_name='$target_file'
                where email = '$email' ; ";
        $res1 = mysqli_query($conn, $sql1);

        if($res1 == TRUE){
            echo "thêm ảnh thành công";
            header("location: ".SITEURL."admin/profile.php");
        }
    }
?>

<?php include("particals/footer.php"); ?>