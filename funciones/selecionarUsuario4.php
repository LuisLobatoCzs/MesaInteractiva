<?php
 include '../library/configServer.php';
 include '../library/consulSQL.php';
 sleep(4);

 $actual=ejecutarSQL::consultar("update usuarioactual set numUsuario=4 where 1");

$status=ejecutarSQL::consultar("select status from usuarios where id=4");
$row = mysql_fetch_row($status);
echo $row[0];

 if($row[0]==0){
    $cambia=ejecutarSQL::consultar("update usuarios set status=1 where id=4");
    echo "0";
 }else{
     $cambia=ejecutarSQL::consultar("update usuarios set status=0 where id=4");
    echo "1";
 }
?>
