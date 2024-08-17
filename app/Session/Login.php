<?php
namespace App\Session;

class Login{
    private static function init(){
        if(session_status() !== PHP_SESSION_ACTIVE){
            session_start();
        }        
    }

    public static function getUsuarioLogado(){
        self::init();
        return self::isLogged() ? $_SESSION['usuario'] : null;
    }

    public static function isLogged(){
        self::init();
        return isset($_SESSION['usuario']['id']);
    }

    public static function requiredLogin(){
        if(!self::isLogged()){
            header('location: login.php');
            exit;
        }
    }

    public static function requiredLogout(){
        if(self::isLogged()){
            header('location: index.php');
            exit;
        }
    }

    public static function login($objUsuario){
        self::init();
        $_SESSION['usuario'] = [
            'id' => $objUsuario->id,
            'nome' => $objUsuario->nome,
            'email' => $objUsuario->email
        ];
        header('location: index.php');
        exit;
    }

    public static function logout(){
        self::init();
        unset($_SESSION['usuario']);        
        header('location: login.php');
        exit;
    }
}
?>