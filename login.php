<!DOCTYPE html>
<html>

<head>
  <link rel="shortcut icon" type="image/x-icon" href="https://cdn.discordapp.com/attachments/384268061542318080/702014828855820328/favicon.png">
  <link rel="stylesheet" href="style.css">
  <meta charset="utf-8" />
  <script type="module" src="https://unpkg.com/ionicons@5.0.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule="" src="https://unpkg.com/ionicons@5.0.0/dist/ionicons/ionicons.js"></script>
  <title>Ресторан</title>
  <link rel="stylesheet" type="text/css" href="jquery.toast.min.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
  <?php include_once("php/nav.php") ?>
  <div class="container" style="width:30%;margin-top:100px;">
    <form method="post" action="login.php">
      <div class="form-group">
        <label for="InputLogin" style="font-size:26px">Логин</label>
        <input type="text" class="form-control" id="InputLogin" name="login" style="font-size:25px">
      </div>
      <div class="form-group">
        <label for="InputPassword" style="font-size:26px">Пароль</label>
        <input type="password" class="form-control" id="InputPassword" name="password" style="font-size:25px">
      </div>
      <button type="submit" class="btn btn-primary mt-4" style="font-size:23px">Войти</button>
    </form>
  </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
<script type="text/javascript" src="JS/jquery-3.3.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="JS/empty.js"></script>
<script>
  <?php
if($_POST){
  require_once 'php/connect.php';
 $login= $_POST['login'];
 $passwordAd= $_POST['password'];
 $link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));
 $query ="SELECT * FROM `users` WHERE login='$login'";
 $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
 $row = mysqli_fetch_row($result);
 mysqli_close($link);
 if($passwordAd == $row[2]){
   echo "localStorage.setItem('Session', '$login');"; 
   echo 'window.location.href = "index.php";';
 }

}
?>
</script>

</html>