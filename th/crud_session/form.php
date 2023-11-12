<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>



<body style="display: flex; justify-content: center;">
    <form class="w-25" enctype="multipart/form-data" action="show.php" method="POST">
        <h1>Nhập thông tin</h1>
        <div class="form-group">
            <p>Họ tên</p>
            <input class="form-control" name="fullname" type="text">
        </div>
        <div class="form-group">
            <p>Email</p>
            <input class="form-control" name="email" type="text">
        </div>
        <div class="form-group">
            <p>Giới tính</p>
            <input name="gender" value="Nam" type="radio"> Nam
            <input name="gender" value="Nữ" type="radio"> Nữ
        </div>
        <button class="btn btn-success mt-4 w-100">Xác nhận</button>
    </form>
</body>

</html>