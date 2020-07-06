<?php
$url = $_SERVER['REQUEST_URI'];
echo '<div ></div>
<nav style="position:fixed;z-index:1000;width:100%;" class="navbar navbar-expand-lg navbar-light bg-light">
<a class="navbar-brand" href="index.php" style="width:165px;height:35px;background-image:url(https://cdn.discordapp.com/attachments/384268061542318080/702015537169039381/logo.png);background-size: cover;"></a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">
    <li class="nav-item">
      <a class="nav-link" style="display:flex" href="cart.php"><ion-icon style="margin-top:3px;" name="cart-sharp"></ion-icon>&nbspКорзина</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" style="display:flex" href="contacts.php"><ion-icon style="margin-top:3px;" name="person-sharp"></ion-icon>&nbspКонтакты</a>
    </li>
  </ul>
  <div id="usver"></div>
</div>
</nav>
<div style="height:56px;"></div>';
?>
<script>
  if (localStorage.getItem("Session")!== null) {
    var a1 = document.createElement("a");
        a1.className = "btn btn-danger mr-2";
        a1.innerHTML = "Выйти";
        a1.setAttribute("role", "button");
        a1.setAttribute("onclick", "localStorage.removeItem('Session');");
        a1.setAttribute("href", "index.php");
        document.getElementById("usver").appendChild(a1);
  } else {
    <?php 
      if ($url == "/sites/soch/registration.php") {
        echo '
        var a2 = document.createElement("a");
        a2.className = "btn btn-primary mr-4";
        a2.setAttribute("role", "button");
        a2.innerHTML = "Вход";
        a2.setAttribute("href", "login.php");
        document.getElementById("usver").appendChild(a2);
        ';
      } else if ($url == "/sites/soch/login.php") {
        echo '
        var a1 = document.createElement("a");
        a1.className = "btn btn-primary mr-2";
        a1.setAttribute("role", "button");
        a1.innerHTML = "Регистрация";
        a1.setAttribute("href", "registration.php");
        document.getElementById("usver").appendChild(a1);
          ';
      } else {
        echo '
        var a2 = document.createElement("a");
        a2.className = "btn btn-primary mr-4";
        a2.setAttribute("role", "button");
        a2.innerHTML = "Вход";
        a2.setAttribute("href", "login.php");
        document.getElementById("usver").appendChild(a2);
           var a1 = document.createElement("a");
        a1.className = "btn btn-primary mr-2";
        a1.setAttribute("role", "button");
        a1.innerHTML = "Регистрация";
        a1.setAttribute("href", "registration.php");
        document.getElementById("usver").appendChild(a1);
           ';
      }
      ?>
    
  }
</script>