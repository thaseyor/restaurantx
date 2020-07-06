<!DOCTYPE html>
<html>

<head>
  <link rel="shortcut icon" type="image/x-icon" href="https://cdn.discordapp.com/attachments/384268061542318080/702014828855820328/favicon.png">
  <link rel="stylesheet" href="style.css">
  <meta charset="utf-8" />
  <script type="module" src="https://unpkg.com/ionicons@5.0.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule="" src="https://unpkg.com/ionicons@5.0.0/dist/ionicons/ionicons.js"></script>
  <title>Ресторан</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
  <?php include_once("php/nav.php") ?>
  <div class="container" style="width:30%;margin-top:70px;">
    <form>
      <div class="form-group">
        <label for="InputLogin" style="font-size:26px">Логин</label>
        <input type="text" class="form-control" id="InputLogin" style="font-size:25px">
      </div>
      <div class="form-group">
        <label for="InputPassword" style="font-size:26px">Пароль</label>
        <input type="password" class="form-control" id="InputPassword" style="font-size:25px">
      </div>
      <div class="form-group">
        <label for="InputName" style="font-size:26px">Имя</label>
        <input type="text" class="form-control" id="InputName" onkeypress='validateText(event)' style="font-size:25px">
      </div>
      <div class="form-group">
        <label for="InputPhone" style="font-size:26px">Телефон</label>
        <input type="text" class="form-control" onkeypress='validateNum(event)' maxlength="11" id="InputPhone" style="font-size:25px">
      </div>
      <div class="form-group">
        <label for="InputAddress" style="font-size:26px">Адрес</label>
        <input type="text" class="form-control" id="InputAddress" style="font-size:25px">
      </div>
    </form>
    <button type="submit" class="btn btn-primary mt-4" style="font-size:23px" onclick="reg()">Зарегистрироваться</button>
  </div>
</body>
<script type="text/javascript" src="JS/jquery-3.3.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="JS/empty.js"></script>
<script src="JS/validation.js"></script>
<script>
  function reg() {
    var login = document.getElementById("InputLogin").value;
    var password = document.getElementById("InputPassword").value;
    var name = document.getElementById("InputName").value;
    var phone = document.getElementById("InputPhone").value;
    var address = document.getElementById("InputAddress").value;
    if (!empty(name) && !empty(phone) && !empty(address) && !empty(password) && !empty(login)) {
      $.post(
        "php/reg.php", {
          name: name,
          phone: phone,
          address: address,
          login: login,
          password: password
        }
      );
    localStorage.setItem("Session", login);
    window.location.href = "index.php";
    }
  }
</script>

</html>