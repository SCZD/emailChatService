<?php

include '../MODELO/DataBase.php';
include '../VISTA/Printer.php';
class Main {
    
    public static function onCreate(){
        // Gestion Session y Datos
        session_start();
        $rS = $_SESSION;
        $rR = $_REQUEST;
        // Gestion de BBDD
        $sistemaGestorBasesDatos = new DataBase("Gestor", "localhost", "user", "pass", "openchat");

        // Log In
        if($rR['op'] == 1){
            $logIn = $sistemaGestorBasesDatos->logIn($rR['email'], $rR['password'],$rR['zona']);
            if($logIn){
                $_SESSION['logInAcc'] = $rR['email'];
                $_SESSION['logInNombre'] = $rR['nombre'];
                //$_SESSION['autoLogin'] = true;
                Printer::home();
                return;
            }
            Printer::errorLogIn();
        }else if($rR['op'] == 2){
            // Register
            $_SESSION['logInAcc'] = $rR['email'];
            $sistemaGestorBasesDatos->register($rR['nombre'],$rR['password'],$rR['email'],$rR['zona']);
            Printer::home();
        }else if($rR['op'] == 3){
            $sistemaGestorBasesDatos->getMessages();
            Printer::recibirMail();
        }else if($rR['op'] == 4){
            $sistemaGestorBasesDatos->getEmails();
            Printer::enviarMail();
        }else if($rR['op'] == 'send'){
            $sistemaGestorBasesDatos->sendMessage(
                    htmlspecialchars($_POST['message']),
                    htmlspecialchars($_POST['destinatario'])
            );
            Printer::home();
        }else if($rR['op'] == 'receive'){
            $reDirect = $sistemaGestorBasesDatos->whichOneSendDelete(htmlspecialchars($_POST['btnOpcion']));
            if($reDirect){
                Printer::responderMail();
                return;
            }
            $sistemaGestorBasesDatos->getMessages();
            Printer::recibirMail();
        }else if($rR['op'] == 'resend'){
            $sistemaGestorBasesDatos->sendMessage(
                    htmlspecialchars($_POST['message']),
                    htmlspecialchars($_POST['destinatario'])
            );
            $sistemaGestorBasesDatos->getMessages();
            Printer::recibirMail();
        }else if($rR['op'] == 'exit'){
            Printer::portalLogin();
            session_destroy();
        }
        
    }
}
