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
        .estiloMensaje{
            display: flex;
            flex-direction: column;
        }
        label{
            color: #ffffff;
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
        .estiloBtn{
            display: flex;
            justify-content: right;
        }
        form{
            width: 750px;
        }
        textarea{
            width: 750px;
            resize: vertical;
        }
        h1{
            color: #ffffff;
        }
    </style>
</head>
<body>
    <h1>Enviar correo</h1>
    <form action="../CONTROLADOR/launcher.php?op=send" method="post">
        
        <div class="estiloEnviar">
            <label for="emailsSendMail">Enviar a: </label>
            <select name="destinatario" id="emailsSendMail">
            <?php
                session_start();
                $rS = $_SESSION;
                $rS['arrEmails'];
                foreach ($rS['arrEmails'] as $v) {?>
                    <option value="<?php echo $v?>"><?php echo $v?></option>
                    <?php
                }
                    ?>
            </select>
        </div>
        <div class="estiloMensaje">
            <label for="message">Mensaje: </label>
            <textarea name="message" rows="4" cols="50" required></textarea> 
        </div>
        <div class="estiloBtn">
            <button type='submit'> Enviar!</button>
        </div>
    </form>
</body>
</html>
