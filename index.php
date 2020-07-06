<!DOCTYPE html>
  <html>
    <head>
      <link rel="shortcut icon" type="image/x-icon" href="https://cdn.discordapp.com/attachments/384268061542318080/702014828855820328/favicon.png">
      <link rel="stylesheet" href="style.css">
      <meta charset="utf-8" />
      <script type="module" src="https://unpkg.com/ionicons@5.0.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule="" src="https://unpkg.com/ionicons@5.0.0/dist/ionicons/ionicons.js"></script>
      <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
      <title>Ресторан X</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <?php
        $json = json_decode(file_get_contents("recipes.json"), JSON_UNESCAPED_UNICODE);
      ?>
    <body>
<?php include_once("php/nav.php") ?>
    <div id="carouselExampleIndicators" class="carousel slide"  data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner h-100" style="text-shadow: 3px 3px 5px black, 0 0 3em black;">
        <div class="carousel-item active">
          <img class="d-block w-100" src="https://gcdn.tomesto.ru/img/place/000/024/595/restoran-zamechatelnye-lyudi-na-ilinke_f1cb0_full-146911.jpg" alt="First slide">
          <div class="carousel-caption d-none d-md-block text-white">
            <h5 style="font-size:54px;" class="carousel-text">Специально для любителей морепродуктов и других рыбных деликатесов!</h5>
          </div>
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="https://sxodim.com/uploads/astana/2016/01/service-5-1200x800.jpg" alt="Second slide">
          <div class="carousel-caption d-none d-md-block">
            <h5 style="font-size:54px;" class="carousel-text">В нашем ресторане гостям предлагают блюда Европы и Востока.</h5>
          </div>
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="https://koloro.ua/media/upload/images/dizajn-restorana-putevoditel-po-novym-tendencijam%20%289%29.jpg" alt="Third slide">
          <div class="carousel-caption d-none d-md-block">
            <h5 style="font-size:54px;" class="carousel-text">Смешение двух культур чувствуется не только в меню, но и в интерьере.</h5>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    <hr>
    <div style="padding-bottom:2vh;font-size:24px;max-width:100%;" class="pl-4 mt-4 row">
    <div class="col-auto mr-4">
    Доставка заказов на сумму до 5000 тенге происходит за 600 тенге.
    <br><br>
    Действует система скидок:
<br>
- при праздновании дня рождения – скидка 10%
 <button
 style="border-radius:20px;width:32px;height:32px;background-position:50% 50%;background-repeat: no-repeat;background-size:13px;background-image:url('files/1363011.png')"
 class="btn btn-secondary pb-4 mb-1 ml-4" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
  </button>
<br>
- при заказе на 20 000 тенге и более – скидка 15%
</div>
<div class="collapse col-5" id="collapseExample">
  <div class="card card-body">
  <ul>
    <li>Все уточнения по поводу дня рождения происходят во время переговоров с курьером</li>
    <li>Cкидки не суммируются </li>
  </ul></div>
</div>
  </div>
    <hr>
<h1 style="text-align:center;font-size:45px;margin-bottom:35px;">Меню</h1>
<ul style="display:grid;grid-template-columns:repeat(auto-fit, minmax(400px, 1fr));grid-gap:10px; list-style:none;padding-left:15px;padding-right:15px;">
  <li>
  <div class="card">
        <img class="card-img-top" style="height: 250px;" src="https://academy.oetker.ru/upload/resize_cache/iblock/195/750_430_2/19519a82c8131d46d8e7a4718fb7e2d2.png" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Греческая Пицца <span class="badge badge-secondary">2100тг.</span></h5>
          <p class="card-text">Много лет назад пицца считалась едой бедных людей, в наше же время ее едят все, независимо от социальной принадлежности.</p>
          <button class="btn btn-primary" type="submit" onclick="addItem('pizza')">Добавить в заказ</button>
          <button type="button" class="btn btn-primary float-right" data-html="true" data-trigger="focus" data-toggle="popover" title=" <?php print_r($json["pizza"][0]["name"]); ?>"
           data-content='
<ul class="list-group list-group-flush">
  <?php
  foreach($json["pizza"][0]["ingredients"][0] as $k => $e){
    echo  $e. " <br> " ;
  }
  ?>
  </ul>
  <hr>
  <h6 class="mt-1">Время приготовления- <?php print_r($json["pizza"][0]["time"]); ?> минут</h6>'
>Ингредиенты</button>
        </div>
      </div>
</li>
  <li>
  <div class="card">
        <img class="card-img-top" style="height: 250px;" src="https://www.gastronom.ru/binfiles/images/20150224/b815531f.jpg" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Стейк <span class="badge badge-secondary">1400тг.</span>&nbsp<span class="badge badge-danger">ФИРМЕННОЕ</span></h5>
          <p class="card-text">Из говядины. Для получения качественного блюда мы используем только мясо молодых бычков (от года до полутора лет) определённых пород.</p>
          <button class="btn btn-primary" type="submit" onclick="addItem('steak')">Добавить в заказ</button>
          <button type="button" class="btn btn-primary float-right" data-html="true" data-trigger="focus" data-toggle="popover" title=" <?php print_r($json["steak"][0]["name"]); ?>"
           data-content='
<ul class="list-group list-group-flush">
  <?php
  foreach($json["steak"][0]["ingredients"][0] as $k => $e){
    echo  $e. " <br> " ;
  }
  ?>
  </ul>
  <hr>
  <h6 class="mt-1">Время приготовления- <?php print_r($json["steak"][0]["time"]); ?> минут</h6>'
>Ингредиенты</button>
        </div>
      </div>
</li>
  <li>
  <div class="card">
        <img class="card-img-top" style="height: 250px;" src="https://sushi-master.kz/upload/iblock/ef0/ef0de91de37e7d42de92218e3a4afd6c.jpg" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Суши <span class="badge badge-secondary">1450тг.</span></h5>
          <p class="card-text">Суши - блюдо японской кухни, правильно приготовленные суши - вкусная и полезная закуска.</p><br>
          <button class="btn btn-primary" type="submit" onclick="addItem('sushi')">Добавить в заказ</button>
          <button type="button" class="btn btn-primary float-right" data-html="true" data-trigger="focus" data-toggle="popover" title=" <?php print_r($json["sushi"][0]["name"]); ?>"
           data-content='
<ul class="list-group list-group-flush">
  <?php
  foreach($json["sushi"][0]["ingredients"][0] as $k => $e){
    echo  $e. " <br> " ;
  }
  ?>
  </ul>
  <hr>
  <h6 class="mt-1">Время приготовления- <?php print_r($json["sushi"][0]["time"]); ?> минут</h6>'
>Ингредиенты</button>
        </div>
      </div>
</li>

  <li>
  <div class="card">
        <img class="card-img-top" style="height: 250px;" src="https://www.naobed.kz/miniposter/miniposter.php?src=https://www.naobed.kz/uploads/posts/2016-03/1456999878_shashlyk-iz-baraniny-sochnyj.jpg&q=85&w=690&h=400" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Шашлык из баранины <span class="badge badge-secondary">4200тг.</span></h5>
          <p class="card-text">Самым популярным и проверенным рецептом считается шашлык из баранины с добавлением уксуса. </p><br>
          <button class="btn btn-primary" type="submit" onclick="addItem('kebab')">Добавить в заказ</button>
          <button type="button" class="btn btn-primary float-right" data-html="true" data-trigger="focus" data-toggle="popover" title=" <?php print_r($json["kebab"][0]["name"]); ?>"
           data-content='
<ul class="list-group list-group-flush">
  <?php
  foreach($json["kebab"][0]["ingredients"][0] as $k => $e){
    echo  $e. " <br> " ;
  }
  ?>
  </ul>
  <hr>
  <h6 class="mt-1">Время приготовления- <?php print_r($json["kebab"][0]["time"]); ?> минут</h6>'
>Ингредиенты</button>
        </div>
      </div>
</li>
<li>
<div class="card">
        <img class="card-img-top" style="height: 250px;" src="https://vkusnie-vkusnosti.ru/wp-content/uploads/2018/12/bistriy_plov.jpg" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Плов <span class="badge badge-secondary">900тг.</span></h5>
          <p class="card-text">Национальное блюдо, приготовленное по рецепту из солнечного Узбекистана.</p><br>
          <button class="btn btn-primary" type="submit" onclick="addItem('pilaf')">Добавить в заказ</button>
          <button type="button" class="btn btn-primary float-right" data-html="true" data-trigger="focus" data-toggle="popover" title=" <?php print_r($json["pilaf"][0]["name"]); ?>"
           data-content='
<ul class="list-group list-group-flush">
  <?php
  foreach($json["pilaf"][0]["ingredients"][0] as $k => $e){
    echo  $e. " <br> " ;
  }
  ?>
  </ul>
  <hr> 
  <h6 class="mt-1">Время приготовления- <?php print_r($json["pilaf"][0]["time"]); ?> минут</h6>'
>Ингредиенты</button></div>
        </div>
</li>
  <li>
  <div class="card">
        <img class="card-img-top" style="height: 250px;" src="https://img-global.cpcdn.com/recipes/b6a152dddc01615d22b9df0446fa1d9e35a6578b421656d3fe858fa6bb529276/751x532cq70/sudak-zapiechiennyi-v-dukhovkie-rietsiept-s-foto-%D0%BE%D1%81%D0%BD%D0%BE%D0%B2%D0%BD%D0%BE%D0%B5-%D1%84%D0%BE%D1%82%D0%BE-%D1%80%D0%B5%D1%86%D0%B5%D0%BF%D1%82%D0%B0.jpg" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Судак запечённый <span class="badge badge-secondary">12000тг.</span></h5>
          <p class="card-text">Подаётся с овощами гриль.</p><br><br>
          <button class="btn btn-primary" type="submit" onclick="addItem('fish')">Добавить в заказ</button>
          <button type="button" class="btn btn-primary float-right" data-html="true" data-trigger="focus" data-toggle="popover" title=" <?php print_r($json["fish"][0]["name"]); ?>"
           data-content='
<ul class="list-group list-group-flush">
  <?php
  foreach($json["fish"][0]["ingredients"][0] as $k => $e){
    echo  $e. " <br> " ;
  }
  ?>
  </ul>
  <hr>
  <h6 class="mt-1">Время приготовления- <?php print_r($json["fish"][0]["time"]); ?> минут</h6>'
>Ингредиенты</button>
        </div>
      </div>
</li>
  <li>
  <div class="card">
        <img class="card-img-top" style="height: 250px;" src="https://ic.pics.livejournal.com/zoya_bushan/71520752/332142/332142_original.jpg" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Бауырсаки <span class="badge badge-secondary">450тг.</span>&nbsp<span class="badge badge-danger">ХАЛЯЛЬ</span></h5>
          <p class="card-text">Оказывается, в порах теста образуются частицы, насыщенные кислородом. Следовательно, съеденный бауырсак продлевает жизнь человека.</p>
          <button class="btn btn-primary" type="submit" onclick="addItem('baursak')">Добавить в заказ</button>
          <button type="button" class="btn btn-primary float-right" data-html="true"  data-trigger="focus" data-toggle="popover" title=" <?php print_r($json["baursak"][0]["name"]); ?>"
           data-content='
<ul class="list-group list-group-flush">
  <?php
  foreach($json["baursak"][0]["ingredients"][0] as $k => $e){
    echo  $e. " <br> " ;
  }
  ?>
  </ul>
  <hr>
  <h6 class="mt-1">Время приготовления- <?php print_r($json["baursak"][0]["time"]); ?> минут</h6>'
>Ингредиенты</button>
        </div>
      </div>
</li>
  <li>
  <div class="card">
        <img class="card-img-top" style="height: 250px;" src="https://static.1000.menu/img/content-v2/74/41/39051/zamorojennye-manty-v-multivarke_1569492250_1_max.jpg" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Манты <span class="badge badge-secondary">1000тг.</span></h5>
          <p class="card-text">Манты – традиционное азиатское горячее мясное блюдо. Тесто с мясной начинкой, приготовленное на пару, это и есть манты.</p>
          <button class="btn btn-primary" type="submit" onclick="addItem('manti')">Добавить в заказ</button>
          <button type="button" class="btn btn-primary float-right" data-html="true" data-trigger="focus" data-toggle="popover" title=" <?php print_r($json["manti"][0]["name"]); ?>"
           data-content='
<ul class="list-group list-group-flush">
  <?php
  foreach($json["manti"][0]["ingredients"][0] as $k => $e){
    echo  $e. " <br> " ;
  }
  ?>
  </ul>
  <hr>
  <h6 class="mt-1">Время приготовления- <?php print_r($json["manti"][0]["time"]); ?> минут</h6>'
>Ингредиенты</button>
        </div>
      </div>
</li>
</ul>
    <hr>
    <div style="min-height:300px" id="cart">
      <h1 style="font-size:45px;margin-bottom:35px;" class="headerText ml-4">Заказ</h1>
      <ul class="list-group list-group-flush" id="list"></ul>
    </div>
    <a class="btn btn-primary btn-lg mt-1 mb-1" style="margin-left:45px;" href="cart.php" role="button"><ion-icon name="cart-sharp" size="small"></ion-icon> Корзина</a>
    <hr>
    
  </body>
  <?php
  if($_POST){
 require_once 'php/connect.php';
 $name = $_POST['name'];
 $phone= $_POST['phone'];
 $address= $_POST['address'];

 $link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));
 $query ="SELECT `id` FROM `users` WHERE 1";
  $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
  $id = mysqli_num_rows($result)+1;
 $query ="INSERT INTO `users`(`id`, `Name`, `Phone number`, `Address`) VALUES ($id ,'$name','$phone','$address')";
 $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
}
?> 	
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
  <script type="text/javascript" src="JS/jquery-3.3.1.min.js"></script>
  <script src="https://unpkg.com/@popperjs/core@2"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="JS/main.js"></script>
  <script><?php
  if(!empty($_GET['cong'])){
      echo 'swal("Готово!", "Мы уже готовим ваш заказ, '.$_GET['cong'].'!", "success")';
  }
  ?></script>
</html>