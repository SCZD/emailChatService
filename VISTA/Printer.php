<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Printer
 *
 * @author SCZD
 */
class Printer {
    public static function home(){
        header('Location: '.'../VISTA/home.php');
    }
    public static function errorLogIn(){
        echo 'Contrasena incorrecta';
    }
    
    public static function recibirMail(){
        header('Location: '.'../VISTA/recibirMail.php');
    }
    
    public static function enviarMail(){
        header('Location: '.'../VISTA/enviarMail.php');
    }
    
    public static function responderMail(){
        header('Location: '.'../VISTA/responderMail.php');
    }
    
    public static function portalLogin(){
        header('Location: '.'../VISTA/index.php');
    }
}
