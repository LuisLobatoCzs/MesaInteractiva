<?php 
    session_start(); 
    error_reporting(E_PARSE);
    if(!isset($_SESSION['contador'])){
        $_SESSION['contador'] = 0;
    }
?>


<section id="container-carrito-compras">
    <div class="container"> 
            <div class="row">    
                <a href="#" onclick="samsung();"> <img src="imagenes/ds.png"> Samsung J7</a>
                <a href="#" onclick="xiaomi();"> <img src="imagenes/ds.png"> Xiaomi mi 8</a>
                <a href="#" onclick="motorola();"> <img src="imagenes/ds.png"> Moto G6 play</a> 
                <a href="#" onclick="huawei();"> <img src="imagenes/ds.png"> Huawei Mate 20</a>
                <a href="#" onclick="nokia();"> <img src="imagenes/ds.png"> Nokia 5</a>
                <a href="#" onclick="sony();"> <img src="imagenes/ds.png"> Sony Xperia XA</a>
            </div>
    </div>
</section>

<nav id="navbar-auto-hidden">
        <div class="row hidden-xs">
            <div class="col-xs-4">    
                <div class="col-xs-2">  
                    <a href="#" class="table-cell-td carrito-button-nav all-elements-tooltip" data-toggle="tooltip" data-placement="bottom">
                        <img src="imagenes/disp.png">
                    </a>
                </div>
            </div>
            <div class="col-xs-8">
                <div class="contenedor-tabla pull-right">
                    <div class="contenedor-tr">
                        <a href="#" onclick="compara();" class="table-cell-td"></a>
                    
                        <a href="#" onclick="Usuario1();" class="table-cell-td">Usuario 1</a>
                        <a href="#" onclick="Usuario2();" class="table-cell-td">Usuario 2</a>
                        <a href="#" onclick="Usuario3();" class="table-cell-td">Usuario 3</a>
                        <a href="#" onclick="Usuario4();" class="table-cell-td">Usuario 4</a>
                    </div>
                </div>
            </div>
        </div>
</nav>
    <script>
        function Usuario1(){
            $.post("funciones/selecionarUsuario1.php",
            {
            },
            function(data,status){                  
            });
        }
        function Usuario2(){
            $.post("funciones/selecionarUsuario2.php",
            {
            },
            function(data,status){                  
            });
        }function Usuario3(){
            $.post("funciones/selecionarUsuario3.php",
            {
            },
            function(data,status){                  
            });
        }function Usuario4(){
            $.post("funciones/selecionarUsuario4.php",
            {
            },
            function(data,status){                  
            });
        }
        function compara(){
            $.post("funciones/compara.php",
            {
            },
            function(data,status){                  
            });
        }
        function samsung(){
            $.post("funciones/samsung.php",
            {
            },
            function(data,status){                  
            });
        }
        function xiaomi(){
            $.post("funciones/xiaomi.php",
            {
            },
            function(data,status){                  
            });
        }
        function huawei(){
            $.post("funciones/huawei.php",
            {
            },
            function(data,status){                  
            });
        }
        function motorola(){
            $.post("funciones/motorola.php",
            {
            },
            function(data,status){                  
            });
        }
        function nokia(){
            $.post("funciones/nokia.php",
            {
            },
            function(data,status){                  
            });
        }
        function sony(){
            $.post("funciones/sony.php",
            {
            },
            function(data,status){                  
            });
        }
    </script>

<?php 
    
?>