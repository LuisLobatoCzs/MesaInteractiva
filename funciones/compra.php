<?php
 include '../library/configServer.php';
 include '../library/consulSQL.php';
 sleep(4);
      
$consulta=ejecutarSQL::consultar("update usuarioactual set categoria=4 where 1");

$consulta=ejecutarSQL::consultar("select numUsuario from usuarioactual where 1");
$row= mysql_fetch_row($consulta);
$user = $row[0]; 
$consulta=ejecutarSQL::consultar("update usuarios set categoria=4 where id='$user'");

?>

