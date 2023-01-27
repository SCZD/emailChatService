<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap');
        *{
            outline: none;
            font-family: 'Open Sans', sans-serif;
        }
        body{
            background-color: #b5838d;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        button{
            border: none;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 25px;
            width: 150px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
        }
        button:hover{
            cursor: pointer;
        }
        h1{
            color: #ffffff;
            text-transform: uppercase;
        }
        .estiloMensaje{
            margin-bottom: 25px;
            display: flex;
            flex-direction: column;
            width: 750px;
        }
        .estiloBtns{
            display: flex;
            justify-content: right;
            margin-top: 5px;
        }
        .estiloBtns > button{
            margin-left: 10px;
        }
        
        .estiloTexto{
            border-radius: 5px;
            padding: 10px;
            background: #ffffff;
        }
        
        .remitenteFecha{
            display: flex;
            justify-content: space-between;
            color: #ffffff;
        }
    </style>
</head>
<body>
    
    <h1>Bandeja de entrada</h1>
        
    <form action="../CONTROLADOR/launcher.php?op=3"  method="post">
        <button type='submit' name="update">ACTUALIZAR</button>
    </form>
    <form action="../CONTROLADOR/launcher.php?op=receive" method="post">
        <?php
            session_start();
            foreach ($_SESSION['arrMenssages'] as $v) {
                echo '<div class="estiloMensaje">';
                
                    echo '<div class="remitenteFecha">';
                        echo '<p class="remitente">';
                            echo 'De: ' . $v[1];
                        echo '</p>';
                        
                        echo '<p class="fecha">';
                            echo 'Fecha: ' . $v[2];
                        echo '</p>';
                    echo '</div>';
                
                    echo '<div class="estiloTexto">';
                        echo '<p>';
                            echo $v[0];
                        echo '</p>';
                    echo '</div>';
                    
                    echo '<div class="estiloBtns">';
                        echo "<button type='submit' name='btnOpcion' value='responder;" . $v[1] . ";" . $v[2].";'> Responder! </button>\n";
                        echo "<button type='submit' name='btnOpcion' value='borrar;" . $v[1] . ";" . $v[2].";'> Borrar! </button>\n";
                    echo '</div>';
                echo '</div>';
            }
        ?>
    </form>
</body>
</html>


