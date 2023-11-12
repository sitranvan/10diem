<style>
    * {
        margin: 0;
        padding: 0;
    }

    body {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    form {
        padding: 20px;
        border: 1px solid #ccc;
        width: 380px;
        height: auto;
        margin-top: 20px;
    }

    input[type="text"],
    select {
        width: 100%;
        padding: 5px 10px;
    }

    input[type="checkbox"] {
        margin-top: 5px;
    }

    p {
        margin-bottom: 5px;
    }

    h1 {
        text-align: center;
    }

    .form-group {
        margin-top: 10px;
    }

    button {
        margin-top: 30px;
        padding: 10px 40px;
        text-align: center;
    }
</style>


<form enctype="multipart/form-data" action="result.php" method="POST">
    <h1>Nhập thông tin</h1>
    <div class="form-group">
        <p>Họ tên</p>
        <input name="fullname" type="text">
    </div>
    <div class="form-group">
        <p>Email</p>
        <input name="email" type="text">
    </div>
    <div class="form-group">
        <p>Giới tính</p>
        <input name="gender" value="Nam" type="radio"> Nam
        <input name="gender" value="Nữ" type="radio"> Nữ
    </div>
    <div class="form-group">
        <p>Sở thích</p>
        <input value="Nghe nhạc" type="checkbox" name="interest[]"> Nghe nhạc
        <br>
        <input value="Đọc sách" type="checkbox" name="interest[]"> Đọc sách
        <br>
        <input value="Xem phim" type="checkbox" name="interest[]"> Xem phim
    </div>

    <div class="form-group">
        <p>Tỉnh thành</p>
        <select name="province" id="">
            <option value="">Chọn tỉnh</option>
            <option value="Hồ Chí Minh">Hồ Chí Minh</option>
            <option value="Đồng Nai">Đồng Nai</option>
        </select>
    </div>

    <div class="form-group">
        <p>Ảnh đại diện</p>
        <input name="avatarFile" type="file">
    </div>
    <div style="text-align: center;">
        <button type="submit">Xác nhận</button>
        <button class="reset" type="button">Reset</button>

    </div>

</form>

<script>
    const btnReset = document.querySelector('.reset')
    btnReset.addEventListener('click', () => {
        window.location.reload();
    })
</script>