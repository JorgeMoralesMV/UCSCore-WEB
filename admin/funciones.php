<?php
    function check($usuario, $clave){
        return ($usuario == "webmaster" && $clave == "123456");
    }
    function logged(){
        if(isset($_POST[@username]) && isset($_POST[@password])){
            $_SESSION = $_POST;
            return @check($_POST[username],$_POST[password]);
        }else{
            if(@check($_SESSION[username],$_SESSION[password])){
                return true;
            }else{
                return false;
            }
        }        
    }
?>