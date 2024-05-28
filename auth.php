<?php
session_start();
require "connect.php";

if(isset($_POST['email']) and isset($_POST['password'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);
				
    $sql = "SELECT * FROM users WHERE email = '$email' and password = '$password'";
    $result = mysqli_query($connect, $sql) or die(mysqli_error($connect));
    $count = mysqli_num_rows($result);

    if($count == 1) {
        $_SESSION['email'] = $email;
        $user = mysqli_fetch_assoc($result);
        $_SESSION['user'] = [
            "id" => $user['id'],
            "fullname" => $user['fullname'],
            "email" => $user['email'],
            "phone" => $user['phone'],
            "role" => $user['role'],
        ];
    } else {
        echo "<script>alert('Логин или Пароль неверный!!!');</script>";
    }
} 

if(isset($_SESSION['email'])) {
	$email = $_SESSION['email'];
	header('Location: status.php');
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
        <h2>Авторизация</h2>
        <div class="form-group">
            <input class="form-control" name="email" type="text" placeholder="Ваш Email">
        </div>
        <div class="form-group">
            <input class="form-control" name="password" type="password" placeholder="Ваш пароль">
        </div>
        <button class="btn btn-primary">Войти</button>
        <p>Если нету аккаунта то <a href="reg.php">зарегистрируйтесь</a></p>
    </form>
</div>

<?php include("components/footer/footer.php"); ?>
</body>
</html>