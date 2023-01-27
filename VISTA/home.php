<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    
    <!-- Estilo -->
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
        .usuario{
            text-align: center;
            color: #ffffff;
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
        
    </style>
</head>
<body>
    <p class='usuario'>Bienvenido/a <?php  session_start(); echo $_SESSION['logInAcc']; ?></p>
    <form action="../CONTROLADOR/launcher.php?op=3" method="post">
        <button type='submit' class="recibir">
            Bandeja de Entrada
        </button>
    </form>
    
    <form action="../CONTROLADOR/launcher.php?op=4" method="post">
        <button type='submit' class="enviar">
            Crear Mensajes
        </button>
    </form>
    
    <form action="../CONTROLADOR/launcher.php?op=exit" method="post">
        <button type='submit' class="exit">
            Cerrar Session
        </button>
    </form>
    
</body>
</html>

