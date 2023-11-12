<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullname = $_POST['fullname'] ?? '';
    $email = $_POST['email'] ?? '';
    $gender = $_POST['gender'] ?? '';

    $newData = [
        'id' => rand(),
        'fullname' => $fullname,
        'email' => $email,
        'gender' => $gender,
    ];
    $_SESSION['infos'][] = $newData;
}

if (!empty($_SESSION['infos'])) {
    $arrInfos = $_SESSION['infos'];
}

?>

<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <a class="btn btn-success w-25 mb-5 " href="form.php">Thêm</a>
    <table class="table">
        <tr>
            <th width="5%">STT</th>
            <th>Họ tên</th>
            <th>Email</th>
            <th>Gới tính</th>
            <th width="15%">Hành động</th>
        </tr>
        <?php
        if (!empty($arrInfos)) {
            foreach ($arrInfos as $key => $info) {
        ?>
                <tr>
                    <td><?= $key + 1 ?></td>
                    <td><?= $info['fullname'] ?></td>
                    <td><?= $info['email'] ?></td>
                    <td><?= $info['gender'] ?></td>
                    <td>
                        <a onclick="return confirm('Bạn có muốn xóa hay không?')" class="btn btn-sm btn-danger" href="delete.php?id=<?= $info['id'] ?>">Xóa</a>
                        <a class="btn btn-sm btn-success" href="edit.php?id=<?= $info['id'] ?>">Sửa</a>

                    </td>
                </tr>
        <?php }
        } ?>
    </table>

</body>

</html>