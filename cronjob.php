<?php


// $con = new mysqli("localhost","mustbon_happyhour","h36GSm5Eu(9S","mustbon_happyhour");
 $con = new mysqli('locahost', 'root', '', 'auth');

mysqli_query($con,"UPDATE `users` SET `otp`=0");
mysqli_query($con,"UPDATE `users` SET `forgot_token`=0");

