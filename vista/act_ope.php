<html>
    <head>
        <title>actualizar empelado</title>

            <!--sytle-->
            <link rel="stylesheet" href="css/bg.css">
            <link rel="stylesheet" href="../css/act_ope.css">
            <link rel="stylesheet" href="../css/mat_pri.css">
            
          
            <!--fuente roboto-->
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&family=Saira:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    </head>
    <body>
    <img class="logo"src="../img/logo.png" alt="" width="15%" height="15%">
    
        <font face="tahoma"><h3>
        <?php
        require_once "conexion_bd.php";
        $registro=mysqli_query($conex, 'select * from operario') or die ("error".mysqli_error($conex));
        while($reg=mysqli_fetch_array($registro)){
        }
        mysqli_close($conex);
        ?>
        <table align="center" width="50%" height="10%" border="1" bordercolor="black"><tr >
        <form action="../controller/act_ope2.php" method="post">
            
                <tr>
                    <th colspan="2">
                        
                        Ingrese el codigo del empleado a actualizar:    
                    </th>
                </tr>
                <tr>
                    <th>
                        <br>
                        <input type="text" name="cod" size=5 placeholder="ingrese ID"><br><br>
                        
                    </th>
                <th>
                <input type="submit" value="buscar">
                </th>
            </tr>
        </form>
        </table > 
        <br>
        <center>
        <table align="center" width="50%" height="5%" border="1" bordercolor="black">
            <tr>
                <th>
                    <br>
                <form action="mat_pri.html" method="post">
                <input type="submit" value="menu principal">
                </th>
            </tr>
        </form>
        </table>
        </center>
    </body>
</html>