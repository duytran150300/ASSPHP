<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Niconne&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&family=Niconne&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/login.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <title>Login</title>
</head>

<body>
    <div class="container">

        <div class="image">
            <h1>Welcome To <span>Machi Shop</span></h1>
        </div>
        <form action="<?= ROOT_PATH ?>login" method="post" class="content">
            <h1>Login</h1>
            <div class="form-group">
                <label for="">UserName</label>
                <input type="text" class="form-control" name="username" id="txt" aria-describedby="helpId" placeholder="UserName">

            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" class="form-control" name="password" id="txt" placeholder="Password">
            </div>
            <a class="fp" href="<?= ROOT_PATH ?>register">Do not have an account?</a>
            <a class="fp" href="<?= ROOT_PATH ?>forgot-password">Forgot Password?</a>
            <br>
            <div class="g-recaptcha" data-sitekey="6LclKncpAAAAAJsl6jDgzKGp0Iyh3xpO5jAFA7l5"></div>
            <button type="submit" class="btn"> Login</button>
        </form>

    </div>
</body>

</html>

<script>
    $(document).on('click', '.btn', function() {
        var response = grecaptcha.getResponse();

        if (response.length === 0) {
            event.preventDefault(); // Ngăn chặn gửi biểu mẫu nếu reCAPTCHA chưa được nhấp chuột
            alert("Vui lòng xác nhận bạn không phải là robot.");
        } else {

            alert('Register successfully');
        }

    });
</script>