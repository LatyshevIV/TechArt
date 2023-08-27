<?php 

$par1_ip = "wav4721680.mysql";
$par2_name = "wav4721680_mysql";
$par3_p = "BGmo_F5K";
$par4_db = "wav4721680_db";

$induction = mysqli_connect($par1_ip, $par2_name, $par3_p, $par4_db);

if ($induction == false)
{
	echo "Ошибка подключения";
}

?>