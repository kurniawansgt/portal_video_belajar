<?php
    require_once './models/master_user.class.php';
    require_once './controllers/master_user.controller.php';
    require_once './models/video_pembelajaran.class.php';
    require_once './controllers/video_pembelajaran.controller.generate.php';
    if (!isset($_SESSION)){
        session_start();
    }

    class video_pembelajaranController extends video_pembelajaranControllerGenerate
    {
        function __construct($video_pembelajaran, $dbh) {
            $this->modulename = 'PENGATURAN_VIDEO_PEMBELAJARAN';
            $this->video_pembelajaran = $video_pembelajaran;
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
            //$this->isadmin = unserialize($_SESSION[config::$ISADMIN]);
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
        }
        
        function saveFormPost() {
            $id = isset($_POST['id'])?$_POST['id'] : "";
	    $judul_video = isset($_POST['judul_video'])?$_POST['judul_video'] : "";
	    $deskripsi_video = isset($_POST['deskripsi_video'])?$_POST['deskripsi_video'] : "";
	    $thumbnail_video = isset($_FILES['thumbnail_video']['tmp_name'])?$_FILES['thumbnail_video']['tmp_name'] : "";
	    $url_video = isset($_POST['url_video'])?$_POST['url_video'] : "";
	    $url_form = isset($_POST['url_form'])?$_POST['url_form'] : "";
            
            if($thumbnail_video != ""){
                $get_filename = $_FILES['thumbnail_video']['name'];
                $get_the_file = $_FILES['thumbnail_video']['tmp_name'];
                $target_file = "./views/video_pembelajaran/files/" . $get_filename;
                move_uploaded_file($get_the_file, $target_file);
            } else {
                $get_filename = "logo_youtube_kecil.png";
            }
            
	    $this->video_pembelajaran->setId($id);
	    $this->video_pembelajaran->setJudul_video($judul_video);
	    $this->video_pembelajaran->setDeskripsi_video($deskripsi_video);
	    $this->video_pembelajaran->setThumbnail_video($get_filename);
	    $this->video_pembelajaran->setUrl_video($url_video);
	    $this->video_pembelajaran->setUrl_form($url_form);            
            $this->saveData();
        }
    }
?>
