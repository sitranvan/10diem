<?php
session_start();
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if (!empty($_SESSION['infos'])) {
        $arrInfos = $_SESSION['infos'];

        $infoEdit = null;

        // Tìm thông tin cần chỉnh sửa và lưu vào $infoEdit
        foreach ($arrInfos as $key => $info) {
            if ($info['id'] == $id) {
                $infoEdit = &$arrInfos[$key];
                break;
            }
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $fullname = $_POST['fullname'] ?? '';
            $email = $_POST['email'] ?? '';
            $gender = $_POST['gender'] ?? '';

            // Cập nhật thông tin chỉnh sửa
            if ($infoEdit !== null) {
                $infoEdit['fullname'] = $fullname;
                $infoEdit['email'] = $email;
                $infoEdit['gender'] = $gender;
            }

            $_SESSION['infos'] = $arrInfos;
            header('Location: show.php');
        }
    }
}


// edit 



?>

<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>



<body style="display: flex; justify-content: center; margin-top: 50px">
    <form class="w-25" enctype="multipart/form-data" action="" method="POST">
        <h1>Nhập thông tin</h1>
        <div class="form-group">
            <p>Họ tên</p>
            <input value="<?php echo $infoEdit['fullname'] ?>" class="form-control" name="fullname" type="text">
        </div>
        <div class="form-group">
            <p>Email</p>
            <input value="<?php echo $infoEdit['email'] ?>" class="form-control" name="email" type="text">
        </div>
        <div class="form-group">
            <p>Giới tính</p>
            <input <?php echo $infoEdit['gender'] == 'Nam' ? 'checked' : false ?> name="gender" value="Nam" type="radio"> Nam
            <input <?php echo $infoEdit['gender'] == 'Nữ' ? 'checked' : false ?> name="gender" value="Nữ" type="radio"> Nữ
        </div>
        <button class="btn btn-success mt-4 w-100">Cập nhật</button>
    </form>
</body>

</html>