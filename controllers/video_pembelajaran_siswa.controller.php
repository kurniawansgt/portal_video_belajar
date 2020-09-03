<?php
    require_once './models/master_user.class.php';
    require_once './controllers/master_user.controller.php';
    require_once './models/video_pembelajaran.class.php';
    require_once './controllers/video_pembelajaran.controller.php';
    if (!isset($_SESSION)){
        session_start();
    }

    class video_pembelajaran_siswaController extends video_pembelajaranController
    {
        /*function __construct($video_pembelajaran_siswa, $dbh) {
            $this->modulename = 'VIDEO_PEMBELAJARAN_SISWA';
            $this->video_pembelajaran_siswa = $video_pembelajaran_siswa;
            $this->dbh = $dbh;            
            $user = isset($_SESSION[config::$LOGIN_USER])? unserialize($_SESSION[config::$LOGIN_USER]): new master_user() ;
            $this->user = $user->getUser();
            $this->ip =  $_SERVER['REMOTE_ADDR'];
            $master_module = new master_module();
            $master_moduleController = new master_moduleController($master_module, $this->dbh);
            $master_module_list = $master_moduleController->showFindData("module", "=", $this->modulename);            
            if(count($master_module_list) == 0) {
                $master_module_list[] = new master_module();
            }
            foreach ($master_module_list as $master_module){
                $this->ispublic = $master_module->getPublic() > 0 ? true : false;                
            }            
            $this->isadmin = unserialize($_SESSION[config::$ISADMIN]);
            if(isset($_SESSION[config::$MASTER_GROUP_DETAIL_LIST]) ){
                $master_group_detail_list = unserialize($_SESSION[config::$MASTER_GROUP_DETAIL_LIST]);
            }else{
                $master_group_detail_list[] = new master_group_detail();
            }
            foreach($master_group_detail_list as $master_group_detail) {
                if($master_group_detail->getModule() == $this->modulename) {
                    $this->isread = $master_group_detail->getRead();
                    $this->isconfirm = $master_group_detail->getConfirm();
                    $this->isentry = $master_group_detail->getEntry();
                    $this->isupdate = $master_group_detail->getUpdate();
                    $this->isdelete = $master_group_detail->getDelete();
                    $this->isprint = $master_group_detail->getPrint();
                    $this->isexport = $master_group_detail->getExport();
                    $this->isimport = $master_group_detail->getImport();
                    break;
                }                
            }
            $this->toolsController = new toolsController();
        }*/
                
        function get_tiny_url($url){  
            $ch = curl_init();  
            $timeout = 5;  
            curl_setopt($ch,CURLOPT_URL,'http://tinyurl.com/api-create.php?url='.$url);  
            curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);  
            curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);  
            $data = curl_exec($ch);  
            curl_close($ch);  
            return $data;  
        }        
        
        function showTinyUrl(){
            $idVideo = $_REQUEST['idvideo'];
            //$rootPath = $_SERVER['SERVER_NAME']."/apps/grab_data_demo/";
            $rootPath = $_SERVER['SERVER_NAME']."/portal_video_belajar/";
            $urlVideo = $rootPath."index.php?model=video_pembelajaran_siswa&action=showVideoBelajarPublic&id=".$idVideo;            
            $urlTiny = $this->get_tiny_url($urlVideo);
            echo str_replace(" ", "", $urlTiny);
        }
        
        function showListVideo(){
            $sql = "SELECT * FROM video_pembelajaran ORDER BY id DESC";
            return $this->createList($sql);
        }
        
        function showListJQuery(){
            $video_pembelajaran_siswa_list = $this->showListVideo();
            
            require_once './views/video_pembelajaran/video_pembelajaran_siswa_list.php';
        }
        
        function showDetailVideo(){
            $id = $_REQUEST['id'];
            
            $detail_video = $this->showData($id);            
            
            require_once './views/video_pembelajaran/video_pembelajaran_siswa_detail.php';
        }
        
        function showFormGoogle(){
            $url = $_REQUEST['link'];
            $type = $_REQUEST['type'];
            $page;
            if($type=="public"){
                $page = "google_form_view_public.php";
            } else {
                $page = "google_form_view.php";
            }
            require_once './views/video_pembelajaran/'.$page;
        }
        
        function showVideoBelajarPublic(){            
            $id = $_REQUEST['id'];
            
            $detail_video = $this->showData($id);            
            
            require_once './views/video_pembelajaran/video_pembelajaran_siswa_view_public.php';
        }
    }