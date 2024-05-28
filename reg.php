<?php
require "connect.php";

if(isset($_POST['fullname']) and isset($_POST['email']) and isset($_POST['password']) and isset($_POST['phone'])) {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = md5($_POST['password']);

    $exam_user = "SELECT * FROM users WHERE email = '$email'";
    $exam_result = mysqli_query($connect, $exam_user); 
    $num = mysqli_num_rows($exam_result);
    
    if($num == 0) {
        $sql = "INSERT INTO users (email, password, fullname, phone, role) VALUES ('$email', '$password', '$fullname', '$phone', 'user')";
        $result = mysqli_query($connect, $sql);
        if($result) { 
            echo "<script>alert('Регистрация прошла успешна'); location.href='auth.php';</script>"; 
        } else { 
            echo "<script>alert('Произошла ошибка при регистрации!')</script>"; 
        }    
    } else { 
        echo "<script>alert('Пользователь с таким именем существует!')</script>"; 
    }
}

session_start();

if(isset($_SESSION['login'])) {
	$login = $_SESSION['login'];
    header("Location: profile.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Rosvodokanal.ru</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/logo.png" rel="icon">
  <link href="assets/img/logo.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
<?php include("components/header/header.php"); ?>

<div class="main">
    
    <form action="" style="margin: 200px auto; padding: 0px 20px;" method="POST">
        <h2>Регистрация</h2>
        <div class="form-group">
            <input class="form-control" name="fullname" type="text" placeholder="Фамилия Имя Отчество">
        </div>
        <div class="form-group">
            <input class="form-control" name="phone" type="text" placeholder="Ваш телефон">
        </div>
        <div class="form-group">
            <input class="form-control" name="email" type="text" placeholder="Ваш Email">
        </div>
        <div class="form-group">
            <input class="form-control" name="password" type="password" placeholder="Ваш пароль">
        </div>
        <button class="btn btn-primary">Зарегистрироваться</button>
        <p>Если есть аккаунта то <a href="auth.php">авторизируйтесь</a></p>
    </form>
</div>

<?php include("components/footer/footer.php"); ?>
</body>
</html>