<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Correo en PHP</title>
        
        <!-- Estilo -->
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap');
            *{
                outline: none;
                font-family: 'Open Sans', sans-serif;
            }
            body{
                background-color: #B5838D;
                display: flex;
                align-items: center;
                flex-direction: column;
                justify-content: center;
                height: 100vh;
                margin: 0;
            }
            .labelText{
                font-weight: bold;
                color: #ffffff;
                text-align: center;
                text-transform: uppercase;
            }
            form{
                margin-bottom: 50px;
                border-radius: 5px;
                padding:10px;
                display: flex;
                flex-direction: column;
                justify-content: center;
                background-color: #E5989B;
                width: 450px;
                box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
                transition: all 0.3s cubic-bezier(.25,.8,.25,1);
            }
            input{
                margin-bottom: 10px;
            }
            .subLabel{
                margin-bottom: 10px;
                color: #ffffff;
            }
            button{
                background-color: #6D6875;
                border: none;
                border-radius: 5px;
                color: #ffffff;
                margin-top: 15px;
                padding: 5px;
            }
            form:hover {
                box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
            }
            button:hover{
                cursor: pointer;
            }
            input{
                padding: 5px;
                border: none;
                border-radius: 5px;
            }
        </style>
        
        
    </head>
    <body>
        <form action="../CONTROLADOR/launcher.php?op=1" method="post">
            <p class="labelText">Login</p>
            <span class="subLabel">Correo:</span> 
            <input type="email" name="email" placeholder="Correo" required>
            <span class="subLabel">Contrasena: </span>
            <input type="password" name="password" placeholder="Password" required>
            <label for="geoPositionLogIn" class="subLabel">Zona Geografica: </label>
            <select name="zona" id="geoPositionLogIn">
              <option value="EUW">Western europe</option>
              <option value="EUNE">Eastern Europe</option>
              <option value="NA">Nort America</option>
              <option value="JP">Japan</option>
            </select>
            <button type="submit" value="Submit">Log In</button>
        </form>
        <form action="../CONTROLADOR/launcher.php?op=2" method="post">
            <p class="labelText">Register</p>
            <span class="subLabel">Nombre Compleo:</span>
            <input type="text" name="nombre" placeholder="Nombre Completo" required>
            <span class="subLabel">Contrasena:</span>
            <input type="password" name="password" placeholder="Password" required>
            <span class="subLabel">Correo:</span>
            <input type="email" name="email" placeholder="Email" required>
            
            <label for="geoPositionRegister" class="subLabel">Zona Geografica: </label>
            <select name="zona" id="geoPositionRegister">
              <option value="EUW">Western europe</option>
              <option value="EUNE">Eastern Europe</option>
              <option value="NA">Nort America</option>
              <option value="JP">Japan</option>
            </select>
            <button type="submit" value="Submit">Register</button>
        </form>
    </body>
</html>
