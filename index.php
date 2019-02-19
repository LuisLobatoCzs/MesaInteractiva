<!DOCTYPE html>
<html lang="es">
<head>
    <title>Inicio</title>
    <?php include './inc/link.php'; ?>
</head>
<body id="container-page-index">
    <?php 
        include './inc/navbar.php';
        include './library/configServer.php';
        include './library/consulSQL.php';
    ?>
    <?php
        echo '
            <font color="white">
            <div>
            <br><br><br><br><br>
        ';
        
        $var=0;
        $actual=ejecutarSQL::consultar("select SUM(status) from usuarios where 1");
        $row = mysql_fetch_row($actual);
        $var=$row[0];

        if($var==0){
            echo '
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">  
                            <div align="center">
                                <br><br><br><br><br><br>
                                <font color="#97bbb9" size="50">
                                Mesa Interactiva
                            </div>
                        </div>
                    </div
                </div>
            ';
        } 
        else if($var==1){
            $actual=ejecutarSQL::consultar("select numUsuario from usuarioactual where 1");
            $row1 = mysql_fetch_row($actual);
            $numUsuarioActual = $row1[0];
                                   
            $cel1=ejecutarSQL::consultar("select celular1 from usuarios where id='$numUsuarioActual'");
            $row2 = mysql_fetch_row($cel1);
            $numCelular1 = $row2[0];

            $cel2=ejecutarSQL::consultar("select celular2 from usuarios where id='$numUsuarioActual'");
            $row2 = mysql_fetch_row($cel1);
            $numCelular2 = $row2[0];
              
            $info=ejecutarSQL::consultar("select modelo from celular where id='$numCelular1'");
            $row3 = mysql_fetch_row($info);
            $modelo = $row3[0];

            $foto =ejecutarSQL::consultar("select imagen from celular where id='$numCelular1'");
            $row4 = mysql_fetch_row($foto);
            $imagen = $row4[0];
        
            
            $cate=ejecutarSQL::consultar("select categoria from usuarioactual where 1");
            $row = mysql_fetch_row($cate);
            $cat = $row[0];

            if($cat==NULL){
                $Contenido="Selecciona una categoria";
            }
            else if($cat==1){
                $consulta=ejecutarSQL::consultar("select sistema from celular where id='$numCelular1'");
                $row5= mysql_fetch_row($consulta);
                $Contenido = $row5[0];
                $ca="Detalles del sistema";
            }
            else if($cat==2){
                $consulta=ejecutarSQL::consultar("select conectividad from celular where id='$numCelular1'");
                $row5= mysql_fetch_row($consulta);
                $Contenido = $row5[0];
                $ca="Conectividad";
            }
            else if($cat==3){
                $consulta=ejecutarSQL::consultar("select camara from celular where id='$numCelular1'");
                $row5= mysql_fetch_row($consulta);
                $Contenido = $row5[0];
                $ca="Prestaciones de Cámara";
             }
            else if($cat==4){
                $consulta=ejecutarSQL::consultar("select compra from celular where id='$numCelular1'");
                $row5= mysql_fetch_row($consulta);
                $Contenido = $row5[0]; 
                $ca="Opciones de Compra";  
            }
            


            echo '
                <font color="black" size="2">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12" style="height:440px">
                            <div style="height:440px" class="col-xs-4">
                                
                                usuario',$row1[0],'<font color="black" size="6">
                                ',$modelo,'   
                                <br> 
                                <img src="',$imagen,'.jpg">

                            </div>

                            <div style="height:440px" class="col-xs-8">
                             
                                <div class="row">
                                    <div class="col-xs-12" style="height:70px" align="center">
                                        
                                        ',$ca,'

                                    </div>
                                    <div class="col-xs-12" style="height:300px">
                                        
                                        ',$Contenido,'

                                    </div>
                                    <div class="col-xs-12"style="height:20px">
                                        <a href="#" onclick="sistema();">
                                            <img src="imagenes/botones/sistema.png" width="70" height="70">
                                        </a>
                                        <a href="#" onclick="conectividad();">
                                            <img src="imagenes/botones/conectividad.png" width="70" height="70">
                                        </a>
                                        <a href="#" onclick="camara();">
                                            <img src="imagenes/botones/camara.png" width="70" height="70">
                                        </a>
                                        <a href="#" onclick="compra();">
                                            <img src="imagenes/botones/compra.png" width="70" height="70">
                                        </a>

                                        
                                    </div>
                                </div>
                            
                            </div>

                        </div>
                    </div
                </div>

                <script>
                    function sistema(){
                        $.post("funciones/sistema.php",{},
                        function(data,status){});
                    }
                    function conectividad(){
                        $.post("funciones/conectividad.php",{},
                        function(data,status){});
                    }
                    function camara(){
                        $.post("funciones/camara.php",{},
                        function(data,status){});
                    }
                    function compra(){
                        $.post("funciones/compra.php",{},
                        function(data,status){});
                    }
                </script>
            ';
        } 
        else if($var==2){
            /*Define usuario 1*/
            $activo1=ejecutarSQL::consultar("select id from usuarios where id=1 or id=3 and status=1");
            $row1 = mysql_fetch_row($activo1);
            $numUsuario= $row1[0];

            /*Define usuario 2*/
            $activo2=ejecutarSQL::consultar("select id from usuarios where id=2 or id=4 and status=1");
            $row2 = mysql_fetch_row($activo2);
            $numUsuario2= $row2[0];

            /*Usuario en interaccion --  Se usa solo para comparar*/
            $actual=ejecutarSQL::consultar("select numUsuario from usuarioactual where 1");
            $row = mysql_fetch_row($actual);
            $numUsuarioActual = $row[0];
            
            /*Dispositivos del usuario 1*/                      
            $cel1=ejecutarSQL::consultar("select celular1 from usuarios where id='$numUsuario'");
            $row2 = mysql_fetch_row($cel1);
            $numCelular1 = $row2[0];

            /*Dispositivos del usuario 2*/
            $cel2=ejecutarSQL::consultar("select celular1 from usuarios where id='$numUsuario2'");
            $row2 = mysql_fetch_row($cel2);
            $numCelular2 = $row2[0];


            /*Consultas para usario 1*/  
            $info=ejecutarSQL::consultar("select modelo from celular where id='$numCelular1'");
            $row3 = mysql_fetch_row($info);
            $modelo = $row3[0];

            $foto =ejecutarSQL::consultar("select imagen from celular where id='$numCelular1'");
            $row4 = mysql_fetch_row($foto);
            $imagen = $row4[0];
            
            $cate=ejecutarSQL::consultar("select categoria from usuarios where id='$numUsuario'");
            $row = mysql_fetch_row($cate);
            $cat = $row[0];

            /*Consultas para usario 2*/  
            $info=ejecutarSQL::consultar("select modelo from celular where id='$numCelular2'");
            $row3 = mysql_fetch_row($info);
            $modelo2 = $row3[0];

            $foto =ejecutarSQL::consultar("select imagen from celular where id='$numCelular2'");
            $row4 = mysql_fetch_row($foto);
            $imagen2 = $row4[0];
            
            $cate=ejecutarSQL::consultar("select categoria from usuarios where id='$numUsuario2'");
            $row = mysql_fetch_row($cate);
            $cat2 = $row[0];


            /*Seleccion de contenidos para usuario 1*/
            if($cat==NULL){
                $Contenido="Selecciona una categoria";
            }
            else if($cat==1){
                $consulta=ejecutarSQL::consultar("select sistema from celular where id='$numCelular1'");
                $row5= mysql_fetch_row($consulta);
                $Contenido = $row5[0];
                $ca="Detalles del sistema";
            }
            else if($cat==2){
                $consulta=ejecutarSQL::consultar("select conectividad from celular where id='$numCelular1'");
                $row5= mysql_fetch_row($consulta);
                $Contenido = $row5[0];
                $ca="Conectividad";
            }
            else if($cat==3){
                $consulta=ejecutarSQL::consultar("select camara from celular where id='$numCelular1'");
                $row5= mysql_fetch_row($consulta);
                $Contenido = $row5[0];
                $ca="Prestaciones de Cámara";
             }
            else if($cat==4){
                $consulta=ejecutarSQL::consultar("select compra from celular where id='$numCelular1'");
                $row5= mysql_fetch_row($consulta);
                $Contenido = $row5[0]; 
                $ca="Opciones de Compra";  
            }


            /*Seleccion de contenidos para usuario 2*/
            if($cat2==NULL){
                $Contenido2="Selecciona una categoria";
            }
            else if($cat2==1){
                $consulta=ejecutarSQL::consultar("select sistema from celular where id='$numCelular2'");
                $row5= mysql_fetch_row($consulta);
                $Contenido2 = $row5[0];
                $ca2="Detalles del sistema";
            }
            else if($cat2==2){
                $consulta=ejecutarSQL::consultar("select conectividad from celular where id='$numCelular2'");
                $row5= mysql_fetch_row($consulta);
                $Contenido2 = $row5[0];
                $ca2="Conectividad";
            }
            else if($cat2==3){
                $consulta=ejecutarSQL::consultar("select camara from celular where id='$numCelular2'");
                $row5= mysql_fetch_row($consulta);
                $Contenido2 = $row5[0];
                $ca2="Prestaciones de Cámara";
             }
            else if($cat2==4){
                $consulta=ejecutarSQL::consultar("select compra from celular where id='$numCelular2'");
                $row5= mysql_fetch_row($consulta);
                $Contenido2 = $row5[0]; 
                $ca2="Opciones de Compra";  
            }
            echo '
                <div class="container">
                    <div class="row">
                        <div class="col-xs-6" style="height:440px">
                            <div style="height:440px; width:555px;">
                               

                                
                                usuario',$numUsuario,'<font color="black" size="6">
                                ',$modelo,'   
                                <br>
                                                                
                                <div class="row">
                                    <div class="col-xs-12" style="height:440px">
                                        <font color="black" size="4">
                                      <img src="',$imagen,'.jpg" width="130" height="150" >&nbsp;&nbsp;&nbsp;
                                       ',$ca,'
                                        <div style="height:200px; width:555px;">
                                            ',$Contenido,'
                                        </div>

                                    
                                        <div style="height:40px; width:555px;" align="center">
                                           
                                            <a href="#" onclick="sistema();">
                                                <img src="imagenes/botones/sistema.png" width="50" height="50">
                                            </a>
                                            <a href="#" onclick="conectividad();">
                                                <img src="imagenes/botones/conectividad.png" width="50" height="50">
                                            </a>
                                            <a href="#" onclick="camara();">
                                                <img src="imagenes/botones/camara.png" width="50" height="50">
                                            </a>
                                            <a href="#" onclick="compra();">
                                                <img src="imagenes/botones/compra.png" width="50" height="50">
                                            </a>

                                   
                                        </div>
                                    
                                    </div>
                                </div>
                                    
                                


                            </div> 
                        </div>
                        <div class="col-xs-6" style="height:440px">
                            <div style="height:440px; width:555px;">



                                <font color="white" size="4">
                                usuario',$numUsuario2,'<font color="black" size="6">
                                ',$modelo2,'   
                                <br>
                                                                
                                <div class="row">
                                    <div class="col-xs-12" style="height:440px">
                                    <font color="black" size="4">
                                      <img src="',$imagen2,'.jpg" width="130" height="150" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                       ',$ca2,'
                                        <div style="height:200px; width:555px;">
                                            ',$Contenido2,'
                                        </div>

                                    
                                        <div style="height:40px; width:555px;" align="center">
                                           
                                            <a href="#" onclick="sistema();">
                                                <img src="imagenes/botones/sistema.png" width="50" height="50">
                                            </a>
                                            <a href="#" onclick="conectividad();">
                                                <img src="imagenes/botones/conectividad.png" width="50" height="50">
                                            </a>
                                            <a href="#" onclick="camara();">
                                                <img src="imagenes/botones/camara.png" width="50" height="50">
                                            </a>
                                            <a href="#" onclick="compra();">
                                                <img src="imagenes/botones/compra.png" width="50" height="50">
                                            </a>

                                   
                                        </div>
                                    
                                    </div>
                                </div>
                                



                                
                            </div> 
                        </div>
                    </div
                </div>

                <script>
                    function sistema(){
                        $.post("funciones/sistema.php",{},
                        function(data,status){});
                    }
                    function conectividad(){
                        $.post("funciones/conectividad.php",{},
                        function(data,status){});
                    }
                    function camara(){
                        $.post("funciones/camara.php",{},
                        function(data,status){});
                    }
                    function compra(){
                        $.post("funciones/compra.php",{},
                        function(data,status){});
                    }
                </script>
            ';  
        }
        /* 3 o 4 Usuarios*/
        else{

            /*Define usuarios*/
            $numUsuario=1;
            $numUsuario2=2;
            $numUsuario3=3;
            $numUsuario4=4;

            /*Usuario en interaccion --  Se usa solo para comparar*/
            $actual=ejecutarSQL::consultar("select numUsuario from usuarioactual where 1");
            $row = mysql_fetch_row($actual);
            $numUsuarioActual = $row[0];
            
            /*Dispositivos del usuario 1*/                      
            $cel1=ejecutarSQL::consultar("select celular1 from usuarios where id='$numUsuario'");
            $row2 = mysql_fetch_row($cel1);
            $numCelular1 = $row2[0];

            /*Dispositivos del usuario 2*/
            $cel2=ejecutarSQL::consultar("select celular1 from usuarios where id='$numUsuario2'");
            $row2 = mysql_fetch_row($cel2);
            $numCelular2 = $row2[0];

            /*Dispositivos del usuario 3*/
            $cel2=ejecutarSQL::consultar("select celular1 from usuarios where id='$numUsuario3'");
            $row2 = mysql_fetch_row($cel2);
            $numCelular3 = $row2[0];

            /*Dispositivos del usuario 3*/
            $cel2=ejecutarSQL::consultar("select celular1 from usuarios where id='$numUsuario4'");
            $row2 = mysql_fetch_row($cel2);
            $numCelular4 = $row2[0];


            /*Consultas para usario 1*/  
            $info=ejecutarSQL::consultar("select modelo from celular where id='$numCelular1'");
            $row3 = mysql_fetch_row($info);
            $modelo = $row3[0];

            $foto =ejecutarSQL::consultar("select imagen from celular where id='$numCelular1'");
            $row4 = mysql_fetch_row($foto);
            $imagen = $row4[0];
            
            $cate=ejecutarSQL::consultar("select categoria from usuarios where id='$numUsuario'");
            $row = mysql_fetch_row($cate);
            $cat = $row[0];

            /*Consultas para usario 2*/  
            $info=ejecutarSQL::consultar("select modelo from celular where id='$numCelular2'");
            $row3 = mysql_fetch_row($info);
            $modelo2 = $row3[0];

            $foto =ejecutarSQL::consultar("select imagen from celular where id='$numCelular2'");
            $row4 = mysql_fetch_row($foto);
            $imagen2 = $row4[0];
            
            $cate=ejecutarSQL::consultar("select categoria from usuarios where id='$numUsuario2'");
            $row = mysql_fetch_row($cate);
            $cat2 = $row[0];

             /*Consultas para usario 3*/  
            $info=ejecutarSQL::consultar("select modelo from celular where id='$numCelular3'");
            $row3 = mysql_fetch_row($info);
            $modelo3 = $row3[0];

            $foto =ejecutarSQL::consultar("select imagen from celular where id='$numCelular3'");
            $row4 = mysql_fetch_row($foto);
            $imagen3 = $row4[0];
            
            $cate=ejecutarSQL::consultar("select categoria from usuarios where id='$numUsuario3'");
            $row = mysql_fetch_row($cate);
            $cat3 = $row[0];

             /*Consultas para usario 4*/  
            $info=ejecutarSQL::consultar("select modelo from celular where id='$numCelular4'");
            $row3 = mysql_fetch_row($info);
            $modelo4 = $row3[0];

            $foto =ejecutarSQL::consultar("select imagen from celular where id='$numCelular4'");
            $row4 = mysql_fetch_row($foto);
            $imagen4 = $row4[0];
            
            $cate=ejecutarSQL::consultar("select categoria from usuarios where id='$numUsuario4'");
            $row = mysql_fetch_row($cate);
            $cat4 = $row[0];


            /*Seleccion de contenidos para usuario 1*/
            if($cat==NULL){
                $Contenido="Selecciona una categoria";
            }
            else if($cat==1){
                $consulta=ejecutarSQL::consultar("select sistema from celular where id='$numCelular1'");
                $row5= mysql_fetch_row($consulta);
                $Contenido = $row5[0];
                $ca="Detalles del sistema";
            }
            else if($cat==2){
                $consulta=ejecutarSQL::consultar("select conectividad from celular where id='$numCelular1'");
                $row5= mysql_fetch_row($consulta);
                $Contenido = $row5[0];
                $ca="Conectividad";
            }
            else if($cat==3){
                $consulta=ejecutarSQL::consultar("select camara from celular where id='$numCelular1'");
                $row5= mysql_fetch_row($consulta);
                $Contenido = $row5[0];
                $ca="Prestaciones de Cámara";
             }
            else if($cat==4){
                $consulta=ejecutarSQL::consultar("select compra from celular where id='$numCelular1'");
                $row5= mysql_fetch_row($consulta);
                $Contenido = $row5[0]; 
                $ca="Opciones de Compra";  
            }


            /*Seleccion de contenidos para usuario 2*/
            if($cat2==NULL){
                $Contenido2="Selecciona una categoria";
            }
            else if($cat2==1){
                $consulta=ejecutarSQL::consultar("select sistema from celular where id='$numCelular2'");
                $row5= mysql_fetch_row($consulta);
                $Contenido2 = $row5[0];
                $ca2="Detalles del sistema";
            }
            else if($cat2==2){
                $consulta=ejecutarSQL::consultar("select conectividad from celular where id='$numCelular2'");
                $row5= mysql_fetch_row($consulta);
                $Contenido2 = $row5[0];
                $ca2="Conectividad";
            }
            else if($cat2==3){
                $consulta=ejecutarSQL::consultar("select camara from celular where id='$numCelular2'");
                $row5= mysql_fetch_row($consulta);
                $Contenido2 = $row5[0];
                $ca2="Prestaciones de Cámara";
             }
            else if($cat2==4){
                $consulta=ejecutarSQL::consultar("select compra from celular where id='$numCelular2'");
                $row5= mysql_fetch_row($consulta);
                $Contenido2 = $row5[0]; 
                $ca2="Opciones de Compra";  
            }

            /*Seleccion de contenidos para usuario 3*/
            if($cat3==NULL){
                $Contenido3="Selecciona una categoria";
            }
            else if($cat3==1){
                $consulta=ejecutarSQL::consultar("select sistema from celular where id='$numCelular3'");
                $row5= mysql_fetch_row($consulta);
                $Contenido3 = $row5[0];
                $ca3="Detalles del sistema";
            }
            else if($cat3==2){
                $consulta=ejecutarSQL::consultar("select conectividad from celular where id='$numCelular3'");
                $row5= mysql_fetch_row($consulta);
                $Contenido3 = $row5[0];
                $ca3="Conectividad";
            }
            else if($cat3==3){
                $consulta=ejecutarSQL::consultar("select camara from celular where id='$numCelular3'");
                $row5= mysql_fetch_row($consulta);
                $Contenido3 = $row5[0];
                $ca3="Prestaciones de Cámara";
             }
            else if($cat3==4){
                $consulta=ejecutarSQL::consultar("select compra from celular where id='$numCelular3'");
                $row5= mysql_fetch_row($consulta);
                $Contenido3 = $row5[0]; 
                $ca3="Opciones de Compra";  
            }

            /*Seleccion de contenidos para usuario 4*/
            if($cat4==NULL){
                $Contenido4="Selecciona una categoria";
            }
            else if($cat4==1){
                $consulta=ejecutarSQL::consultar("select sistema from celular where id='$numCelular4'");
                $row5= mysql_fetch_row($consulta);
                $Contenido4 = $row5[0];
                $ca4="Detalles del sistema";
            }
            else if($cat4==2){
                $consulta=ejecutarSQL::consultar("select conectividad from celular where id='$numCelular4'");
                $row5= mysql_fetch_row($consulta);
                $Contenido4 = $row5[0];
                $ca4="Conectividad";
            }
            else if($cat4==3){
                $consulta=ejecutarSQL::consultar("select camara from celular where id='$numCelular4'");
                $row5= mysql_fetch_row($consulta);
                $Contenido4 = $row5[0];
                $ca4="Prestaciones de Cámara";
             }
            else if($cat4==4){
                $consulta=ejecutarSQL::consultar("select compra from celular where id='$numCelular4'");
                $row5= mysql_fetch_row($consulta);
                $Contenido4 = $row5[0]; 
                $ca4="Opciones de Compra";  
            }



            echo '
                <div class="container">
                    <div class="row">
                        <div class="col-xs-6" style="height:220px">
                            

                            <div style="height:220px; width:555px;" >
                                
                                <div class="col-xs-1">
                                    <a href="#" onclick="sistema();">
                                        <img src="imagenes/botones/sistema.png" width="30" height="30">
                                    </a>
                                    <a href="#" onclick="conectividad();">
                                        <img src="imagenes/botones/conectividad.png" width="30" height="30">
                                    </a>
                                    <a href="#" onclick="camara();">
                                        <img src="imagenes/botones/camara.png" width="30" height="30">
                                    </a>
                                    <a href="#" onclick="compra();">
                                        <img src="imagenes/botones/compra.png" width="30" height="30">
                                    </a>
                                </div>
                                <div class="col-xs-4">
                                    <img src="',$imagen,'.jpg" width="120" height="150">
                                </div>
                                <div class="col-xs-7">
                                    <font color="black" size=5>
                                    ',$ca,'<br><font color="black" size=2>
                                    ',$Contenido,'
                                </div>

                            </div> 
                            

                            <div style="height:220px; width:555px;" >
                                
                                <div class="col-xs-1">
                                    <a href="#" onclick="sistema();">
                                        <img src="imagenes/botones/sistema.png" width="30" height="30">
                                    </a>
                                    <a href="#" onclick="conectividad();">
                                        <img src="imagenes/botones/conectividad.png" width="30" height="30">
                                    </a>
                                    <a href="#" onclick="camara();">
                                        <img src="imagenes/botones/camara.png" width="30" height="30">
                                    </a>
                                    <a href="#" onclick="compra();">
                                        <img src="imagenes/botones/compra.png" width="30" height="30">
                                    </a>
                                </div>
                                <div class="col-xs-4">
                                    <img src="',$imagen3,'.jpg"width="120" height="150">
                                </div>
                                <div class="col-xs-7">
                                    <font color="black" size=5>
                                    ',$ca3,'<br><font color="black" size=2>
                                    ',$Contenido3,'
                                </div>

                            </div>


                        </div>
                        
                        <div class="col-xs-6" style="height:220px">
                            

                            <div style="height:220px; width:555px;" >
                                
                                <div class="col-xs-1">
                                    <a href="#" onclick="sistema();">
                                        <img src="imagenes/botones/sistema.png" width="30" height="30">
                                    </a>
                                    <a href="#" onclick="conectividad();">
                                        <img src="imagenes/botones/conectividad.png" width="30" height="30">
                                    </a>
                                    <a href="#" onclick="camara();">
                                        <img src="imagenes/botones/camara.png" width="30" height="30">
                                    </a>
                                    <a href="#" onclick="compra();">
                                        <img src="imagenes/botones/compra.png" width="30" height="30">
                                    </a>
                                </div>
                                <div class="col-xs-4">
                                    <img src="',$imagen2,'.jpg"width="120" height="150">
                                </div>
                                <div class="col-xs-7">
                                    <font color="black" size=5>
                                    ',$ca2,'<br><font color="black" size=2>
                                    ',$Contenido2,'
                                </div>

                            </div> 
                            <div style="height:220px; width:555px;" >
                                
                                <div class="col-xs-1">
                                    <a href="#" onclick="sistema();">
                                        <img src="imagenes/botones/sistema.png" width="30" height="30">
                                    </a>
                                    <a href="#" onclick="conectividad();">
                                        <img src="imagenes/botones/conectividad.png" width="30" height="30">
                                    </a>
                                    <a href="#" onclick="camara();">
                                        <img src="imagenes/botones/camara.png" width="30" height="30">
                                    </a>
                                    <a href="#" onclick="compra();">
                                        <img src="imagenes/botones/compra.png" width="30" height="30">
                                    </a>
                                </div>
                                <div class="col-xs-4">
                                    <img src="',$imagen4,'.jpg"width="120" height="150">
                                </div>
                                <div class="col-xs-7">
                                    <font color="black" size=5>
                                    ',$ca4,'<br><font color="black" size=2>
                                    ',$Contenido4,'
                                </div>

                            </div> 



                        </div>
                    </div
                </div>
                <script>
                    function sistema(){
                        $.post("funciones/sistema.php",{},
                        function(data,status){});
                    }
                    function conectividad(){
                        $.post("funciones/conectividad.php",{},
                        function(data,status){});
                    }
                    function camara(){
                        $.post("funciones/camara.php",{},
                        function(data,status){});
                    }
                    function compra(){
                        $.post("funciones/compra.php",{},
                        function(data,status){});
                    }
                </script>
            ';  
        }
    ?>
    </div>
</body>
</html>