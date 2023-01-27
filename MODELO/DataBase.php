<?php
class DataBase {
    
    private $nombre;
    private $dbObjeto;
    
    public function __construct($nombre,$area,$user,$pass,$nombreDB){
        $this->nombre = $nombre;
        $this->dbObjeto = new mysqli($area, $user, $pass, $nombreDB);
    }
    
    public function register($nombre,$password,$email,$zona){
        $query = "INSERT INTO users VALUES('". 
            $nombre.
            "','".
            $password.
            "','". 
            $email. 
            "','".
            $zona.
        "')";
        $this->dbObjeto->query($query);
    }
    
    public function logIn($email, $password, $zona){
        $query = "SELECT * FROM users where users.password like '".
                $password.
                "' and users.email like '".
                $email."' and users.zone like '"
                .$zona.
        "'";
        if($this->dbObjeto->query($query)->num_rows == 0){
            return false;
        }else{
            return true;
        }
    }
    
    public function getEmails(){
        $query = "SELECT users.email from users order by users.email asc";
        $result = $this->dbObjeto->query($query);
        $stack = array();
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                array_push($stack, $row["email"]);
            }
        }
        $_SESSION['arrEmails'] = $stack;
    }
    
    public function getMessages(){
        $query = "select * from correo where correo.emailTo like '". 
                $_SESSION['logInAcc'] . "' order by correo.date desc";
        $arrMessages = array();
        $result = $this->dbObjeto->query($query);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                array_push($arrMessages, array($row["message"],$row["email"],$row['date']));
            }
        }
        $_SESSION['arrMenssages'] = $arrMessages;
    }
    
    public function sendMessage($message, $destinatario){
        $query = "INSERT INTO correo values('". 
                $_SESSION['logInAcc'].
                "','".
                $destinatario.
                "','".
                $message.
                "',now())";
        $this->dbObjeto->query($query);
    }
    
     public function whichOneSendDelete($path){
        $str_arr = explode(';', $path);
        
        $where = $str_arr[0];
        $remitente = $str_arr[1];
        $fecha = $str_arr[2];
        
        if($where == 'responder'){
            $this->getOnlyOneMail($remitente, $fecha); // true es enviar
            return true;
        }else{
            $this->deleteMessage($remitente, $fecha); // false es borrar
            return false;
        }
    }
    
    public function deleteMessage($remitente, $fecha){
        $query = "delete from correo where correo.email like '".
                $remitente.
                "' and correo.date like '".
                $fecha.
        "'";
        $this->dbObjeto->query($query);
    }
    
    public function getOnlyOneMail($remitente, $fecha){
        $query = "select * from correo where correo.email like '". 
                $remitente . 
                "' and correo.date like '". 
                $fecha. 
        "'";
        $result = $this->dbObjeto->query($query);
        
        //Solo va ha haber uno asique
        $arrOnlyMessage = '';
        while($row = $result->fetch_assoc()) {
            $arrOnlyMessage = array($row["message"],$row["email"],$row['date']);
        }
        $_SESSION['onlyMessage'] = $arrOnlyMessage;
    }
}
