<?php
$errors = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $gender = $_POST['gender'] ?? '';
    $interest = $_POST['interest'] ?? '';
    $province = $_POST['province'];
    $avatarFileName = $_FILES['avatarFile']['name'] ?? '';

    if (empty($fullname)) {
        $errors[] = 'Họ tên bắt buộc nhập';
    } else {
        if (strlen($fullname) <= 3) {
            $errors[] = 'Họ tên phải lớn hơn 3 ký tự';
        }
    }

    if (empty($email)) {
        $errors[] = 'Email bắt buộc nhập';
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Email không đúng định dạng';
        }
    }

    if (empty($gender)) {
        $errors[] = 'Giới tính bắt buộc chọn';
    }
    if (empty($interest)) {
        $errors[] = 'Sở thích bắt buộc chọn';
    }
    if (empty($province)) {
        $errors[] = 'Tỉnh thành bắt buộc chọn';
    }
    if (empty($avatarFileName)) {
        $errors[] = 'Ảnh đại diện bắt buộc chọn';
    } else {
        $allowExt = ['jpg', 'jpeg', 'png', 'gif'];
        $ext = strtolower(pathinfo($avatarFileName, PATHINFO_EXTENSION));
        if (!in_array($ext, $allowExt)) {
            $errors[] = 'Định dạng phải là jpg, jpeg, png, gif';
        }

        $targetFilePath = 'uploads/' . $avatarFileName;
        move_uploaded_file($_FILES['avatarFile']['tmp_name'], $targetFilePath);
    }

    if (empty($errors)) {
        echo '<h2>Thông tin</h2>';
        echo '<p style="color: green;">' . "Họ tên: " . $fullname . '</p>';
        echo '<p style="color: green;">' . "Email: " . $email . '</p>';
        echo '<p style="color: green;">' . "Giới tính: " . $gender . '</p>';

        echo '<p style="color: green;">Sở thích</p>';
        foreach ($interest as $value) {
            echo '<span style="color: green;">' . $value . ", " . '</span>';
        }
        echo '<p style="color: green;">' . "Tỉnh: " . $province . '</p>';
    } else {
        foreach ($errors as $error) {
            echo '<p style="color: red;">' . $error . '</p>';
        }
    }

    echo '<p style="color: green;">Ảnh đại diện</p>';
    echo '<img width="100px" src="' . $targetFilePath . '" alt="avatar">';
}
