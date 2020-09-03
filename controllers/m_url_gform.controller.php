<?php
    require_once './models/master_user.class.php';
    require_once './controllers/master_user.controller.php';
    require_once './models/m_url_gform.class.php';
    require_once './controllers/m_url_gform.controller.generate.php';
    require_once './models/report_query.class.php';
    require_once './controllers/report_query.controller.php';
    
    if (!isset($_SESSION)){
        session_start();
    }

    class m_url_gformController extends m_url_gformControllerGenerate
    {
        function __construct($m_url_gform, $dbh) {
            $this->modulename = 'GRAB_DATA_GFORM';
            $this->m_url_gform = $m_url_gform;
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
        }
        
        function showAllJQuery(){
            if ($this->ispublic || $this->isadmin || $this->isread ){
                $last = $this->countDataAll();
                $limit = isset($_REQUEST["limit"]) ? $_REQUEST["limit"] : $this->limit;
                $skip = isset($_REQUEST["skip"]) ? $_REQUEST["skip"] : 0;
                $search = isset($_REQUEST["search"]) ? $_REQUEST["search"] : "";

                $sisa = intval($last % $limit);

                if ($sisa > 0) {
                    $last = $last - $sisa;
                }else if ($last - $limit < 0){
                    $last = 0;
                }else{
                    $last = $last -$limit;
                }

                $previous = $skip - $limit < 0 ? 0 : $skip - $limit ;

                if ($skip + $limit > $last) {
                    $next = $last;
                }else if($skip == 0 ) {
                    $next = $skip + $limit + 1;
                }else{
                    $next = $skip + $limit;
                }
                $first = 0;

                $pageactive = $last == 0 ? $sisa == 0 ? 0 : 1 : intval(($skip / $limit)) + 1;
                $pagecount = $last == 0 ? $sisa == 0 ? 0 : 1 : intval(($last / $limit)) + 1;
                
                $bsearch = isset($_REQUEST["search"]) ;
                $where = "";
                if ($bsearch) {
                    $search = $_REQUEST["search"] ;
                   $where .= " AND (id like '%".$search."%'";
                   $where .= "       or  nama_dokumen like '%".$search."%'";
                   $where .= "       or  url_gform_response like '%".$search."%')";                   
                }
            
                $sql = "SELECT * FROM m_url_gform WHERE user_id='".$this->user."'".$where;
                $sql .= " ORDER BY id";
                
                //$m_url_gform_list = $this->showDataAllLimit();
                $m_url_gform_list = $this->createList($sql);
                $isadmin = $this->isadmin;
                $ispublic = $this->ispublic;
                $isread = $this->isread;
                $isconfirm = $this->isconfirm;
                $isentry = $this->isentry;
                $isupdate = $this->isupdate;
                $isdelete = $this->isdelete;
                $isprint = $this->isprint;
                $isexport = $this->isexport ;
                $isimport = $this->isimport;
                require_once './views/m_url_gform/m_url_gform_jquery_list.php';
            }else{
                echo "You cannot access this module";
            }
        }
        function saveFormPost() {
            $id = isset($_POST['id'])?$_POST['id'] : "";
	    $nama_dokumen = isset($_POST['nama_dokumen'])?$_POST['nama_dokumen'] : "";
	    $url_gform_response = isset($_POST['url_gform_response'])?$_POST['url_gform_response'] : "";
            $url_gform = isset($_POST['url_gform'])?$_POST['url_gform'] : "";
	    $user_id = $this->user;
	    $save_to_db = isset($_POST['save_to_db'])?$_POST['save_to_db'] : "";
	    $active = isset($_POST['active'])?$_POST['active'] : "";
	    $created_date = isset($_POST['id'])?date("Y-m-d H:i:s") : "";
	    $updated_date = isset($_POST['id'])?date("Y-m-d H:i:s") : "";
	    $ip_address = $this->ip;
            
            $checkDoc = $this->checkDokumen($nama_dokumen);
            if($checkDoc > 0 && $id==""){
                echo "Nama Dokumen sudah ada di dalam database, silahkan gunakan Nama Dokumen lain.";
            } else {            
                $this->m_url_gform->setId($id);
                $this->m_url_gform->setNama_dokumen($nama_dokumen);
                $this->m_url_gform->setUrl_gform($url_gform);
                $this->m_url_gform->setUrl_gform_response($url_gform_response);
                $this->m_url_gform->setUser_id($user_id);
                $this->m_url_gform->setSave_to_db($save_to_db);
                $this->m_url_gform->setActive($active);
                $this->m_url_gform->setCreated_date($created_date);
                $this->m_url_gform->setUpdated_date($updated_date);
                $this->m_url_gform->setIp_address($ip_address);            
                $this->saveData();
                
                $lastID = ($id != "") ? $id : $this->lastID;
                echo "~".$lastID."~".$active;
            }
        }
        
        function checkDokumen($nama_dokumen){
            $sql = "SELECT count(*) jml FROM m_url_gform WHERE nama_dokumen='".$nama_dokumen."'";
            $row = $this->dbh->query($sql)->fetch();
            return $row[0];
        }
        
        function csvToArray($file, $delimiter) { 
            if (($handle = fopen($file, 'r')) !== FALSE) { 
                $i = 0;                 
                while (($lineArray = fgetcsv($handle, 4000, $delimiter, '"')) !== FALSE) { 
                    for ($j = 0; $j < count($lineArray); $j++) { 
                        $arr[$i][$j] = $lineArray[$j]; 
                    } 
                    $i++; 
                } 
                fclose($handle); 
            } 
            return $arr; 
        }
        
        function getDataGform($namadokumen,$urlSpreedSheet){                        
            $feed = $urlSpreedSheet;             
            $keys = array();
            $newArray = array();
            
            $data = $this->csvToArray($feed, ',');
            $count = count($data) - 1;
            $labels = array_shift($data);  

            foreach ($labels as $label) {
                $keys[] = $label;
            }

            $keys[] = 'id';

            for ($i = 0; $i < $count; $i++) {
                $data[$i][] = $i;
            }
            
            for ($j = 0; $j < $count; $j++) {
                $d = array_combine($keys, $data[$j]);
                $newArray[$j] = $d;
            }
            
            return $newArray;
        }
        
        function createTableSpreedsheet($id){            
            $data = $this->showData($id);
            
            $namadokumen = $data->getNama_dokumen();
            $urlSpreedSheet = $data->getUrl_gform_response();
            $tableName = strtolower(str_replace(" ", "_", $namadokumen));
            
            $rows = $this->getDataGform($namadokumen,$urlSpreedSheet);
            $kolom = $rows[0];
            $row = "";
            $i = 0;
                        
            ksort($kolom);
            foreach ($kolom as $key=>$data){   
                $fieldName = str_replace(" ", "_", $key);
                if($fieldName == "id"){
                    $row .= "`".$fieldName."`".($i < count($kolom)-1 ? " INT(5),":" INT(5)");    
                } else {
                    $row .= "`".$fieldName."`".($i < count($kolom)-1 ? " VARCHAR(255),":" VARCHAR(255)");    
                }
                $i++;
            }

            $atas = "CREATE TABLE `$tableName` (";
            $tengah = $row;     
            $tengah .= ", PRIMARY KEY (`id`)";
            $bawah = ");";

            $sqlCreate = $atas.$tengah.$bawah;
            $result = $this->dbh->query($sqlCreate);                        
            $this->insertDataSpreedsheet($rows, $tableName);
        }
        
        function insertDataSpreedsheet($rows_data,$tableName) {            
            $row = "";
            $kolom = $rows_data[0];
            ksort($kolom);
            for($a=0;$a<count($rows_data);$a++){
                $row .= "(";
                $dataDtl = $rows_data[$a];                
                $i = 0;
                foreach($kolom as $key => $value){                                        
                    if($key == "id"){
                        $row .= "'".($dataDtl[$key]+1)."'".($i < count($kolom)-1 ? "," : "");
                    } else {
                        $row .= "'".$dataDtl[$key]."'".($i < count($kolom)-1 ? "," : "");
                    }
                    $i++;
                }
                $row .= ") ".($a < count($rows_data)-1 ? ",":"");
            }            
            
            $top = "INSERT INTO `$tableName` VALUES ";
            $middle = $row;
            $bottom = ";";
            
            $sqlInsert = $top.$middle.$bottom;            
            $result = $this->dbh->query($sqlInsert);            
        }
        
        function checkTable($tableName){
            $checkTable = "SHOW TABLES FROM `g_form` WHERE Tables_in_g_form='$tableName';";
            //$checkTable = "SHOW TABLES FROM `corw9744_grab_data` WHERE Tables_in_corw9744_grab_data='$tableName';";
            $rs = $this->dbh->query($checkTable);
            $rowcount = $rs->rowCount();
            
            return $rowcount;
        }
        
        function showColsRecord($id){
            $data = $this->showData($id);
            
            $namadokumen = $data->getNama_dokumen();
            $urlSpreedSheet = $data->getUrl_gform_response();
            $tableName = strtolower(str_replace(" ", "_", $namadokumen));
            
            $rows = $this->getDataGform($namadokumen,$urlSpreedSheet);
            $kolom = $rows[0];
            
            $column = "";
            ksort($kolom);
            $i = 0;
            foreach ($kolom as $key=>$data){   
                $fieldName = str_replace(" ", "_", $key);    
                $fieldNameAlias = strtoupper($key);
                if($fieldName == "id"){
                    $column .= $fieldName." AS `".$fieldNameAlias."`".($i < count($kolom)-1 ? ",":"");
                } else {
                    $column .= " CONCAT(".$fieldName.",' ') AS `".$fieldNameAlias."`".($i < count($kolom)-1 ? ",":"");
                }
                $i++;
            }
            return $column;
        }
                
        function showRecord(){
            $id = $_REQUEST['id'];
            $data = $this->showData($id);
            
            $namadokumen = $data->getNama_dokumen();
            $tableName = strtolower(str_replace(" ", "_", $namadokumen));
            $save_to_db = $data->getSave_to_db();
            
            if($save_to_db == 1){
                $checkTable = $this->checkTable($tableName);
                if($checkTable > 0){
                    $sql = "DROP TABLE `$tableName`;";
                    $rs = $this->dbh->query($sql);

                    $this->createTableSpreedsheet($id);
                } else {
                    $this->createTableSpreedsheet($id);
                }

                $this->showDataQueryTable($id, $tableName, $namadokumen);
            } else {
                $checkTable = $this->checkTable($tableName);
                if($checkTable > 0){
                    $sql = "DROP TABLE `$tableName`;";
                    $rs = $this->dbh->query($sql);
                }
                $this->showDataOnTable($id);
            }
        }
        
        function showDataOnTable($id){
            $data = $this->showData($id);
            
            $namadokumen = $data->getNama_dokumen();
            $urlSpreedSheet = $data->getUrl_gform_response();
            $tableName = strtolower(str_replace(" ", "_", $namadokumen));
            
            $rows = $this->getDataGform($namadokumen,$urlSpreedSheet);
            $kolom = $rows[0];
            $row = "";
            $i = 0;
                        
            $topPos = "<center><p><span style=\"font-family:'calibri'; font-size: 24px;\">".strtoupper($namadokumen)."</span></p></center>";
            $topPos .= "<center><p><input type=\"button\" value=\"Refresh Data\" class=\"btn btn-github\" style=\"font-family:'calibri'; font-size: 15px;\" onclick=\"showRecordGForm('".$id."')\">&nbsp;";
            $topPos .= "<button class=\"btn btn-facebook\" style=\"font-family:'calibri'; font-size: 15px;\" onclick=\"exportTableToExcel('tblData', '".$namadokumen."')\">Export Data To Excel File</button></p></center>";
            $openDiv = "<div style=\"overflow: auto; width: 99%;\">";
            $closeDiv = "</div>";
            $openTable = "<table id=\"tblData\" class=\"table-bordered1\" style=\"border-collapse:collapse;width:95%\" align=\"center\">";
            $closeTable = "</table>";
            $openTr = "<tr>";
            $closeTr = "</tr>";
            $opentTh = "<th>";
            $closeTh = "</th>";
            $openTd = "<td>";
            $closeTd = "</td>";
            $kolomName = "";
            ksort($kolom);
            foreach($kolom as $key=>$data){
                $kolomName .= $opentTh.strtoupper($key).$closeTh;
            }
            $top = $openTable.$openTr.$kolomName.$closeTr;
            
            for($a=0;$a<count($rows);$a++){
                $dataDtl = $rows[$a];
                $isiKolom = "";
                foreach($kolom as $key=>$data){
                    if($key == "id"){
                        $isiKolom .= $openTd.($dataDtl[$key]+1).$closeTd;
                    } else {
                        $isiKolom .= $openTd.$dataDtl[$key].$closeTd;
                    }
                }
                $row .= $openTr.$isiKolom.$closeTr;
            }
            
            echo $topPos.$openDiv.$top.$row.$closeTable.$closeDiv."<br><br>";
        }
        
        function showDataQueryTable($id, $tableName, $namadokumen){
            $qryColumn = $this->showColsRecord($id);
                        
            $sql = "SELECT ".$qryColumn." FROM `$tableName` ORDER BY `id`";
            
            
            $report_query = new report_query();
            $report_queryCtrl = new report_queryController($report_query, $this->dbh);
            $openDiv = "<div style=\"overflow: auto; width: 99%;\">";
            $closeDiv = "</div>";
            $topPos = "<center><p><span style=\"font-family:'calibri'; font-size: 24px;\">".strtoupper($namadokumen)."</span></p></center>";
            $topPos .= "<center><p><input type=\"button\" value=\"Refresh Data\" class=\"btn btn-github\" style=\"font-family:'calibri'; font-size: 15px;\" onclick=\"showRecordGForm('".$id."')\">&nbsp;";
            $topPos .= "<button class=\"btn btn-facebook\" style=\"font-family:'calibri'; font-size: 15px;\" onclick=\"exportTableToExcel('tblData', '".$namadokumen."')\">Export Data To Excel File</button></p></center>";
            echo $topPos.$openDiv.$report_queryCtrl->generatetableview($sql, 0, 0, 0).$closeDiv;    
        }
    }
?>
