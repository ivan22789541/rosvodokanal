<?php 
require "connect.php";
session_start();

if($_SESSION['user']['email']) {} else {
    echo "<script>alert('Сначала авторизируйтесь!'); location.href='auth.php'</script>";
}

if(isset($_POST['type']) and isset($_POST['city']) and isset($_POST['fullname']) and isset($_POST['phone']) and isset($_POST['email']) and isset($_POST['adress'])) {
    $type = $_POST['type'];
    $city = $_POST['city'];
    $fullname = $_POST['fullname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $adress = $_POST['adress'];

    $user_id = $_SESSION['user']['id'];

    if (true) {
        $sql = "INSERT INTO application (`type`, `city`, `fullname`, `phone`, `email`, `adress`, `user_id`, `status`) VALUES ('$type', '$city', '$fullname', '$phone', '$email', '$adress', '$user_id', 'Ожидание')";
        $result = mysqli_query($connect, $sql);
        if($result) { 
            echo "<script>alert('Успешно отправленна на рассмотрение, c вами свяжуться!'); location.href='status.php';</script>"; 
        } else { 
            echo "<script>alert('ошибка!')</script>"; 
        }    
    }
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
    
    <form action="" style="margin: 200px auto;" method="POST">
        <h2>Установка индивидуального прибора учета</h2>
        <div class="form-group">
            <select name="type" id="" class="form-control">
                <option value="">Тип работы</option>
                <option value="Приборы учета воды">Приборы учета воды</option>
                <option value="Лаборатория">Лаборатория</option>
                <option value="Услуги на сетях водоснабжения и водоотведения">Услуги на сетях водоснабжения и водоотведения</option>
                <option value="Сантехнические услуги">Сантехнические услуги</option>
                <option value="Вывоз стоков">Вывоз стоков</option>
                <option value="Проектирование и строительство">Проектирование и строительство</option>
            </select>
        </div>
        <div class="form-group">
            <input class="form-control" name="city" type="text" placeholder="Город/район">
        </div>
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
            <input class="form-control" name="adress" type="text" placeholder="Район вашего проживания">
        </div>
        <button class="btn btn-primary">Подать заявку</button>
    </form>
</div>

<?php include("components/footer/footer.php"); ?>
</body>
</html>