<?php
    require_once './models/master_user.class.php';
    require_once './controllers/master_user.controller.php';
    require_once './models/tree_menu.class.php';
    require_once './controllers/tree_menu.controller.generate.php';
    if (!isset($_SESSION)){
        session_start();
    }

    class tree_menuController extends tree_menuControllerGenerate
    {
        function showAllJQuery(){
            require_once './views/tree_menu/tree_menu.php';
        }
    }
?>
