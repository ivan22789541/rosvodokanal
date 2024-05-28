<?php 
session_start();
require "connect.php";

$user_id = $_SESSION['user']['id'];

$exam_user = "SELECT * FROM `application` WHERE `user_id` = '$user_id'";
$result = mysqli_query($connect, $exam_user); 
$resp = $result->fetch_all(MYSQLI_ASSOC);

$exam_admin = "SELECT * FROM `application` WHERE `status` = 'Ожидание'";
$result_admin = mysqli_query($connect, $exam_admin); 
$resp_admin = $result_admin->fetch_all(MYSQLI_ASSOC);

if($_SESSION['user']['email']) {} else {
    header('Location: '. 'index.php');
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
    
    <div class="container">
        <div style="margin-top: 200px;">
            <a href="logout.php">Выйти</a>
            <?php 
            if($_SESSION['user']['role'] == 'user') {
                if(count($resp) == 0) {
                    echo "<h1 style='color: lightblue; text-align: center; margin-top: 40px;'>У вас еще нету заявок</h1>";
                }
                    for ($i=0; $i < count($resp); $i++) {

            ?> 
            <div class="item">
                <h3>Заявка № 1</h3>
                <h5>Статус: 
                    <?php if($resp[$i]['status'] == "Одобрено") { echo "<style> .y {color: green} </style>"; ?><span class="y"><?= $resp[$i]['status'] ?></span> <?php } ?>
                    <?php if($resp[$i]['status'] == "Ожидание") { echo "<style> .x {color: #ffa100} </style>"; ?><span class="x"><?= $resp[$i]['status'] ?></span> <?php } ?>
                    <?php if($resp[$i]['status'] == "Отказ") { echo "<style> .z {color: red} </style>"; ?><span class="z"><?= $resp[$i]['status'] ?></span> <?php } ?>
                </h5>
                <h5>ФИО: <?= $resp[$i]['fullname'] ?></h5>
                <h5>Вид работ: <?= $resp[$i]['type'] ?></h5>
                <h5>Город: <?= $resp[$i]['city'] ?></h5>
                <h5>Телефон: <?= $resp[$i]['phone'] ?></h5>
                <h5>E-mail: <?= $resp[$i]['email'] ?></h5>
            </div>
            <?php } } else if($_SESSION['user']['role'] == 'admin') { 
                if(count($resp_admin) == 0) {
                    echo "<h1 style='color: lightblue; text-align: center; margin-top: 40px;'>У вас еще нету заявок</h1>";
                }
                for ($i=0; $i < count($resp_admin); $i++) {
                ?>
                <div class="item">
                    <h3>Заявка № 1</h3>
                    <h5>Статус: 
                        <?php if($resp_admin[$i]['status'] == "Ожидание") { echo "<style> .x {color: #ffa100} </style>"; ?><span class="x"><?= $resp_admin[$i]['status'] ?></span> <?php } ?>
                    </h5>
                    <h5>ФИО: <?= $resp_admin[$i]['fullname'] ?></h5>
                    <h5>Вид работ: <?= $resp_admin[$i]['type'] ?></h5>
                    <h5>Город: <?= $resp_admin[$i]['city'] ?></h5>
                    <h5>Телефон: <?= $resp_admin[$i]['phone'] ?></h5>
                    <h5>E-mail: <?= $resp_admin[$i]['email'] ?></h5>
                    <div style="display:flex;">
                    <?php 
                    
                    if(isset($_POST['yes'])) {
                        $id = $_POST['yes'];
                        $exam_user = "UPDATE `application` SET `status`='Одобрено' WHERE `id` = '$id'";
                        $result = mysqli_query($connect, $exam_user); 
                        echo "<script>alert('одобрена!'); location.href='status.php';</script>";
                    }
                    if(isset($_POST['no'])) {
                        $id = $_POST['no'];
                        $exam_user = "UPDATE `application` SET `status`='Отказ' WHERE `id` = '$id'";
                        $result = mysqli_query($connect, $exam_user); 
                        echo "<script>alert('отклонена!'); location.href='status.php';</script>";
                    }
                    
                    
                    ?>
                    <form action="" method="POST"><input style="position: absolute; top: -1000px;" name="yes" type="text" value="<?= $resp_admin[$i]['id'] ?>"><button class="btn btn-success">Одобрить</button></form>
                    <form action="" method="POST"><input style="position: absolute; top: -1000px;" name="no" type="text" value="<?= $resp_admin[$i]['id'] ?>"><button class="btn btn-danger">Отказать</button></form>
                </div>
                </div>
            <?php } } ?>
        </div>
    </div>
</div>

<?php include("components/footer/footer.php"); ?>
</body>
</html>