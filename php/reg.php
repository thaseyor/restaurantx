<?php
 require_once 'connect.php';
 $name = $_POST['name'];
 $phone= $_POST['phone'];
 $address= $_POST['address'];
 $login= $_POST['login'];
 $passwordAd= $_POST['password'];

 $link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));
 $query ="SELECT `id` FROM `users` WHERE 1";
 $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
 $id = mysqli_num_rows($result)+1;
 $query ="INSERT INTO `users`(`id`, `login`, `password`, `name`, `Phone number`, `Address`) VALUES ($id ,'$login','$passwordAd','$name',$phone,' $address')";
 $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
 mysqli_close($link);
 ?>