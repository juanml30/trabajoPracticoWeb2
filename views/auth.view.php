<?php
require_once './libs/smarty-3.1.39/libs/Smarty.class.php';

class AuthView {
    private $smarty; 

    function __construct() {
        $this->smarty = new Smarty();
    }

    function showFormLogin($error = null) {
        $this->smarty->assign('error', $error);
        $this->smarty->display('templates/formLogin.tpl');
    }

    
}
