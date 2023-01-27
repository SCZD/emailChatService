<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responder Mail</title>
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
        h1{
            color: #ffffff;
        }
        .remitenteFecha{
            display: flex;
            justify-content: space-between;
            color: #ffffff;
        }
        form{
            width: 750px;
        }
        .estiloTexto{
            color: #ffffff;
            font-weight: bold;
        }
        label{
            color: #ffffff;
        }
        textarea{
            width: 750px;
            resize: vertical;
        }
        button{
            border: none;
            border-radius: 5px;
            padding: 10px;
            margin-top: 25px;
            width: 150px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
        }
        button:hover{
            cursor: pointer;
        }
        .estiloEnviar{
            display: flex;
            justify-content: right;
        }
    </style>
</head>
<body>
    <h1>Responder</h1>
    <form action="../CONTROLADOR/launcher.php?op=resend" method="post">
        <?php
            session_start();
            $rS = $_SESSION['onlyMessage'];
            
            echo '<div class="remitenteFecha">';
                echo '<div class="remitente">';
                    echo 'De: ' . $rS[1];
                echo '</div>';
                
                echo '<div class="fecha">';
                    echo 'Fecha: ' . $rS[2];
                echo '</div>';
            
            echo '</div>';
            
            echo '<div class="estiloTexto">';
                echo '<p>' . $rS[0] . '</p>';
            echo '</div>';
        ?>
        <label for="message">Respuesta: </label>
        <div class="estiloRespuesta">
            <textarea name="message" rows="4" cols="50" required></textarea>
        </div>
        <div class="estiloEnviar">
            <button type='submit'> Enviar!</button>
        </div>
        <input type="hidden" name="destinatario" value="<?php echo $rS[1] ?>">
    </form>
</body>
</html>



