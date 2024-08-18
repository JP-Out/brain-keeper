<?php
// Inclua o arquivo de configuração da sessão e o método de logout
require_once 'app/Session/Login.php';

// Chame o método de logout da classe Login
App\Session\Login::logout();
?>
