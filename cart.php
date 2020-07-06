<!DOCTYPE html>
<html>

<head>
  <link rel="shortcut icon" type="image/x-icon" href="https://cdn.discordapp.com/attachments/384268061542318080/702014828855820328/favicon.png">
  <link rel="stylesheet" href="style.css">
  <meta charset="utf-8" />
  <script type="module" src="https://unpkg.com/ionicons@5.0.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule="" src="https://unpkg.com/ionicons@5.0.0/dist/ionicons/ionicons.js"></script>
  <title>Ресторан</title>
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
  <?php include_once("php/nav.php") ?>
  <div class="container">
    <div class="row" style="max-width:100%">
      <div style="min-height:300px" class="col-5" id="cart">
        <h1 style="font-size:45px;margin-bottom:35px;height:60px;" class="headerText ml-4">Заказ</h1>
        <ul class="list-group list-group-flush" id="list"></ul>
      </div>
      <div class="col-1"></div>
      <div class="col-6" style="float:right;">
        <form style="margin-top:60px;margin-left:10px;">
          <div class="form-group">
            <label for="FormControlInput2">ФИО</label>
            <input class="form-control" id="FormControlInput2" type="text" onkeypress='validateText(event)' required>
          </div>
          <div class="form-group">
            <label for="FormControlInput3">Телефон</label>
            <input class="form-control" id="FormControlInput3" type='text' onkeypress='validateNum(event)' maxlength="11" placeholder="Пример: 87777777777" required>
          </div>
          <div class="form-group">
            <label for="FormControlInput4">Адрес</label>
            <input class="form-control" id="FormControlInput4" placeholder="Пример: Гагарина 54,кв. 9, подъезд 1, этаж 4" required>
          </div>
        </form>
        <button type="submit" class="btn btn-primary mt-3" onclick="send();">Оформить заказ</button>
      </div>
    </div>

    <hr>
  </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
<script type="text/javascript" src="JS/jquery-3.3.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="JS/main.js"></script>
<script src="JS/empty.js"></script>
<script src="JS/validation.js"></script>
<script>
    if (localStorage.getItem("Session") !== null &&
      <?php
      if ($_GET) {
        echo "false";
      } else {
        echo "true";
      }
      ?>) {
      window.location = "cart.php?inf=" + localStorage.getItem("Session");
    }
    <?php
    if ($_GET) {
      require_once 'php/connect.php';
      $login = $_GET['inf'];
      $link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));
      $query = "SELECT * FROM `users` WHERE login='$login'";
      $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
      $row = mysqli_fetch_row($result);
      mysqli_close($link);
      echo "
 document.getElementById('FormControlInput2').value = '$row[3]';
 document.getElementById('FormControlInput3').value = '$row[4]';
 document.getElementById('FormControlInput4').value = '$row[5]';
 ";
    }
    ?>

  function send() {
    var name = document.getElementById("FormControlInput2").value;
    var phone = document.getElementById("FormControlInput3").value;
    var address = document.getElementById("FormControlInput4").value;
    var dishlist = "";
    for (i = 0; i < menuList.length; i++) {
      if (localStorage.getItem(menuList[i]) !== null && localStorage.getItem(menuList[i]) != 0) {
        dishlist += menuNameList[menuList[i]] + ": " + localStorage.getItem(menuList[i]) + ";";
      }
    }
    if (finalSum != 0) {
      if (!empty(name) && !empty(phone) && !empty(address) && !empty(dishlist)) {
        $.post(
          "php/send.php", {
            name: name,
            phone: phone,
            address: address,
            price: finalSum,
            dishlist: dishlist
          }
        );
        localStorage.setItem("sushi", 0);
        localStorage.setItem("baursak", 0);
        localStorage.setItem("fish", 0);
        localStorage.setItem("pizza", 0);
        localStorage.setItem("pilaf", 0);
        localStorage.setItem("manti", 0);
        localStorage.setItem("steak", 0);
        localStorage.setItem("kebab", 0);
        localStorage.setItem("sum", 0);
        location.href = 'index.php?cong=' + name;
      }
    }
  }
</script>

</html>