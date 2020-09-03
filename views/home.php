<?php
    ob_start();
    ini_set("diplay_errors",1);
    include_once './controllers/layout.controller.php';
    include_once './controllers/master_user.controller.php';
    include_once './models/master_user.class.php';
    include_once './controllers/tools.controller.php';
    
    $layout = new layoutController($dbh);
    if(!isset($_SESSION)) {
        session_start();
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title><?php echo $initial_company->getCompany_name();?></title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>        
        <?php
            if($initial_company->getBgfile()!=""){
                $fav=$initial_company->getLogo();            
            }else{
                $fav="nologo.png";
            }        
            
            include_once './views/library.php';
        ?>       
    </head>
    <body class="skin-blue">
        <div id="popup" style="width:80%; height:auto; overflow:auto; padding-bottom:0px; margin-left: 0px; margin-top: -17px; border-radius: 10px"></div>
        <div id="popupimage" style="width:40%; height:auto; overflow:auto; padding-bottom:0px; margin-left: auto;"></div>
        <?php
            $layout->getHeader();
            $layout->getMenuSlider();
        ?>
        <div id="contentmenu"></div>                
        <div id="content" align="center">                  
        <?php
            $layout->getMenuContent();              
        ?>                                                                            
        </div>                
        <div class="clearfix"></div>
        <?php              
            $layout->getFooter();
                      
            if (isset($_SESSION[config::$LOGIN_USER])) {                  
        ?>            
        <script type="text/javascript">
           $("#contentmenu").load('index.php?model=master_module&action=showMenu&id=12');      
        </script>
        <?php                             
            }
        ?>
    </body>
</html>