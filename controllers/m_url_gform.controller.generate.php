<?php
    require_once './models/m_url_gform.class.php';
    require_once './models/master_module.class.php';
    require_once './controllers/master_module.controller.php';
    require_once './models/master_group_detail.class.php';
    require_once './controllers/master_group_detail.controller.php';
    require_once './models/report_query.class.php';
    require_once './controllers/report_query.controller.php';
    require_once './controllers/tools.controller.php';
    require_once './database/config.php';

    if (!isset($_SESSION)) {
        session_start();
    }
 
    class m_url_gformControllerGenerate
    {
        protected $m_url_gform;
        var $modulename = "m_url_gform";
        var $dbh;
        var $limit = 20;
        var $user = "None";
        var $ip = "";
        var $isadmin = false;
        var $ispublic = false;
        var $isread = false;
        var $isconfirm = false;
        var $isentry = false;
        var $isupdate = false;
        var $isdelete = false;
        var $isprint = false;
        var $isexport = false;
        var $isimport = false;
        var $lastID = "";
        var $toolsController;
        function __construct($m_url_gform, $dbh) {
            $this->modulename = strtoupper($this->modulename);
            $this->m_url_gform = $m_url_gform;
            $this->dbh = $dbh;            
                                     
            $user = isset($_SESSION[config::$LOGIN_USER])? unserialize($_SESSION[config::$LOGIN_USER]): new master_user() ;
            $this->user = $user->getUser();
            $this->ip =  $_SERVER['REMOTE_ADDR'];
            if ($this->modulename != "MASTER_MODULE") {
                $master_module = new master_module();
                $master_moduleController = new master_moduleController($master_module, $this->dbh);
                $master_module_list = $master_moduleController->showFindData("module", "=", $this->modulename);            
                if(count($master_module_list) == 0) {
                    $master_module_list[] = new master_module();
                }
            }else{
                $master_module_list = $this->showFindData("module", "=", $this->modulename);
            }
            foreach ($master_module_list as $master_module){
                $this->ispublic = $master_module->getPublic() > 0 ? true : false;                
            }            
            if(isset($_SESSION[config::$ISADMIN])) {
                $this->isadmin = unserialize($_SESSION[config::$ISADMIN]);
            }else{
                $this->isadmin = false;
            }

            $this->isadmin = isset($_SESSION[config::$ISADMIN]) ? unserialize($_SESSION[config::$ISADMIN]) : false;
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
        
        function insertData(){
            $datetime = date("Y-m-d H:i:s");
            
            $sql = "INSERT INTO m_url_gform ";
            $sql .= " ( ";
	    $sql .= "`id`,";
	    $sql .= "`nama_dokumen`,";
	    $sql .= "`url_gform_response`,";
	    $sql .= "`url_gform`,";
	    $sql .= "`save_to_db`,";
	    $sql .= "`user_id`,";
	    $sql .= "`active`,";
	    $sql .= "`created_date`,";
	    $sql .= "`updated_date`,";
	    $sql .= "`ip_address` ";
            $sql .= ") ";
            $sql .= " VALUES (";
	    $sql .= " null,";
	    $sql .= "'".$this->toolsController->replacecharSave($this->m_url_gform->getNama_dokumen(), $this->dbh)."',";
	    $sql .= "'".$this->toolsController->replacecharSave($this->m_url_gform->getUrl_gform_response(), $this->dbh)."',";
	    $sql .= "'".$this->toolsController->replacecharSave($this->m_url_gform->getUrl_gform(), $this->dbh)."',";
	    $sql .= "'".$this->toolsController->replacecharSave($this->m_url_gform->getSave_to_db(), $this->dbh)."',";
	    $sql .= "'".$this->toolsController->replacecharSave($this->m_url_gform->getUser_id(), $this->dbh)."',";
	    $sql .= "'".$this->toolsController->replacecharSave($this->m_url_gform->getActive(), $this->dbh)."',";
	    $sql .= "'".$this->toolsController->replacecharSave($this->m_url_gform->getCreated_date(), $this->dbh)."',";
	    $sql .= "'".$this->toolsController->replacecharSave($this->m_url_gform->getUpdated_date(), $this->dbh)."',";
	    $sql .= "'".$this->toolsController->replacecharSave($this->m_url_gform->getIp_address(), $this->dbh)."' ";

            $sql .= ")";
            $execute = $this->dbh->query($sql);
        }
        
        
        function updateData(){
            $datetime = date("Y-m-d H:i:s");
            $sql = "UPDATE m_url_gform SET ";
	    $sql .= "`id` = '".$this->toolsController->replacecharSave($this->m_url_gform->getId(),$this->dbh)."',";
	    $sql .= "`nama_dokumen` = '".$this->toolsController->replacecharSave($this->m_url_gform->getNama_dokumen(),$this->dbh)."',";
	    $sql .= "`url_gform_response` = '".$this->toolsController->replacecharSave($this->m_url_gform->getUrl_gform_response(),$this->dbh)."',";
	    $sql .= "`url_gform` = '".$this->toolsController->replacecharSave($this->m_url_gform->getUrl_gform(),$this->dbh)."',";
	    $sql .= "`save_to_db` = '".$this->toolsController->replacecharSave($this->m_url_gform->getSave_to_db(),$this->dbh)."',";
	    $sql .= "`user_id` = '".$this->toolsController->replacecharSave($this->m_url_gform->getUser_id(),$this->dbh)."',";
	    $sql .= "`active` = '".$this->toolsController->replacecharSave($this->m_url_gform->getActive(),$this->dbh)."',";
	    $sql .= "`created_date` = '".$this->toolsController->replacecharSave($this->m_url_gform->getCreated_date(),$this->dbh)."',";
	    $sql .= "`updated_date` = '".$this->toolsController->replacecharSave($this->m_url_gform->getUpdated_date(),$this->dbh)."',";
	    $sql .= "`ip_address` = '".$this->toolsController->replacecharSave($this->m_url_gform->getIp_address(),$this->dbh)."' ";
            $sql .= "WHERE id = '".$this->m_url_gform->getId()."'";                
            $execute = $this->dbh->query($sql);
        }
        
        function deleteData($id){
            $sql = "DELETE FROM m_url_gform WHERE id = '".$id."'";
            $execute = $this->dbh->query($sql);
        }
        
        function showData($id){
            $sql = "SELECT * FROM m_url_gform WHERE id = '".$this->toolsController->replacecharFind($id,$this->dbh)."'";

            $row = $this->dbh->query($sql)->fetch();
            $this->loadData($this->m_url_gform, $row);
            
            return $this->m_url_gform;
        }
        
        function checkData($id){
            $sql = "SELECT count(*) FROM m_url_gform where id = '".$id."'";
            $row = $this->dbh->query($sql)->fetch();
            return $row[0];
        }
        
        function showDataAll(){
            $sql = $this->findDataWhere("");
            return $this->createList($sql);            
        }
        function showDataAllQuery(){
            return $this->findDataWhere($this->showDataWhereQuery());
        }
        function countDataAll(){            
            $sql = $this->findCountDataWhere($this->showDataWhereQuery());
            $row = $this->dbh->query($sql)->fetch();
            return $row[0];
        }

        function showDataWhereQuery(){
            $bsearch = isset($_REQUEST["search"]) ;
            $where = "";
            if ($bsearch) {
                $search = $_REQUEST["search"] ;
               $where .= " where id like '%".$search."%'";
               $where .= "       or  nama_dokumen like '%".$search."%'";
               $where .= "       or  url_gform_response like '%".$search."%'";
               $where .= "       or  url_gform like '%".$search."%'";

            }            
            return $where;
        }        
        function showDataAllLimit(){
            $sql = $this->showDataAllLimitQuery();
            return $this->createList($sql);            
        }

        function showDataAllLimitQuery(){            
            $skip = isset($_REQUEST["skip"]) ? $_REQUEST["skip"] : 0;
            $limit = isset($_REQUEST["limit"]) ? $_REQUEST["limit"] : 20;
            $sql = $this->showDataAllQuery();
            $sql .= " limit ". $skip . ", ". $limit;
            return $sql;
        }
        function showFindData($field, $operator ,$keyword){
            $sql = $this->findData($field, $operator ,$keyword);
            return $this->createList($sql);
        }
        
        function findData($field, $operator ,$keyword){
            $where = "WHERE (".$field." ". $operator ."  '$keyword')";
            return $this->findDataWhere($where);
        }
        function findDataWhere($where){
            $sql = "SELECT * FROM m_url_gform  ".$where;
            $sql .= " ORDER BY id";
            return $sql;
        }
        function findCountDataWhere($where){
            $sql = "SELECT count(id)  FROM m_url_gform  ".$where;
            $sql .= " ORDER BY id";
            return $sql;
        }
        function findDataSql($sql){
            return $this->createList($sql);            
        }

        function createList($sql){
            $m_url_gform_List = array();
            foreach ($this->dbh->query($sql) as $row) {
                    $m_url_gform_ = new m_url_gform();
                    $this->loadData($m_url_gform_, $row);
                    $m_url_gform_List[] = $m_url_gform_;
            }
            return $m_url_gform_List;            
        }

                
        function loadData($m_url_gform,$row){
	    $m_url_gform->setId($row['id']);
	    $m_url_gform->setNama_dokumen($row['nama_dokumen']);
	    $m_url_gform->setUrl_gform_response($row['url_gform_response']);
	    $m_url_gform->setUrl_gform($row['url_gform']);
	    $m_url_gform->setSave_to_db($row['save_to_db']);
	    $m_url_gform->setUser_id($row['user_id']);
	    $m_url_gform->setActive($row['active']);
	    $m_url_gform->setCreated_date($row['created_date']);
	    $m_url_gform->setUpdated_date($row['updated_date']);
	    $m_url_gform->setIp_address($row['ip_address']);

        }

        function show(){
            $this->showAll();
        }
        
        function showAll(){
            if ($this->ispublic || $this->isadmin || $this->isread ){
                $last = $this->countDataAll();
                $limit = isset($_REQUEST["limit"]) ? $_REQUEST["limit"] : $this->limit;
                $skip = isset($_REQUEST["skip"]) ? $_REQUEST["skip"] : 0;
                $search = isset($_REQUEST["search"]) ? $_REQUEST["search"] : "";

                $sisa = $last % $limit;

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

                $m_url_gform_list = $this->showDataAllLimit();

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

                require_once './views/m_url_gform/m_url_gform_list.php';
            }else{
                echo "You cannot access this module";
            }
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

                $m_url_gform_list = $this->showDataAllLimit();
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
        
        function showDetail(){
            if ($this->ispublic || $this->isadmin || $this->isread ){
                $id = $_GET['id'];
                $m_url_gform_ = $this->showData($id);
                require_once './views/m_url_gform/m_url_gform_detail.php';
            }else{
                echo "You cannot access this module";
            }
        }
        function showDetailJQuery(){
            if ($this->ispublic || $this->isadmin || $this->isread ){
                $id = $_GET['id'];
                $m_url_gform_ = $this->showData($id);
                require_once './views/m_url_gform/m_url_gform_jquery_detail.php';
            }else{
                echo  "You cannot access this module";
            }
        }
        
        function showForm(){
            if ($this->ispublic || $this->isadmin || ($this->isread && $this->isupdate)){
                $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : 0;
                $m_url_gform_ = $this->showData($id);
                require_once './views/m_url_gform/m_url_gform_form.php';
            }else{
                echo "You cannot access this module";
            }
        }

        function showFormJQuery(){
            if ($this->ispublic || $this->isadmin || ($this->isread && $this->isupdate)){
                $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : 0;
                $skip = isset($_REQUEST["skip"]) ? $_REQUEST["skip"] : 0;
                $search = isset($_REQUEST["search"]) ? $_REQUEST["search"] : "";
                $m_url_gform_ = $this->showData($id);
                require_once './views/m_url_gform/m_url_gform_jquery_form.php';
            }else{
                echo "You cannot access this module";
            }
        }        
        function deleteForm(){
            if ($this->ispublic || $this->isadmin || ($this->isread && $this->isdelete)){
                $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : 0;
                $this->deleteData($id);
                $this->showAll();
            }else{
                echo "You cannot access this module";
            }
        }
        function deleteFormJQuery(){
            if ($this->ispublic || $this->isadmin || ($this->isread && $this->isdelete)){
                $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : 0;
                $this->deleteData($id);
                $this->showAllJQuery();
            }else{
                echo "You cannot access this module";
            }
        }
        function saveFormJQuery(){
            $this->saveFormPost();
        }
        function saveForm(){
            $this->saveFormPost();
            $this->showAll();
        }                
        function saveFormPost(){
	    $id = isset($_POST['id'])?$_POST['id'] : "";
	    $nama_dokumen = isset($_POST['nama_dokumen'])?$_POST['nama_dokumen'] : "";
	    $url_gform_response = isset($_POST['url_gform_response'])?$_POST['url_gform_response'] : "";
	    $url_gform = isset($_POST['url_gform'])?$_POST['url_gform'] : "";
	    $save_to_db = isset($_POST['save_to_db'])?$_POST['save_to_db'] : "";
	    $user_id = isset($_POST['user_id'])?$_POST['user_id'] : "";
	    $active = isset($_POST['active'])?$_POST['active'] : "";
	    $created_date = isset($_POST['created_date'])?$_POST['created_date'] : "";
	    $updated_date = isset($_POST['updated_date'])?$_POST['updated_date'] : "";
	    $ip_address = isset($_POST['ip_address'])?$_POST['ip_address'] : "";
	    $this->m_url_gform->setId($id);
	    $this->m_url_gform->setNama_dokumen($nama_dokumen);
	    $this->m_url_gform->setUrl_gform_response($url_gform_response);
	    $this->m_url_gform->setUrl_gform($url_gform);
	    $this->m_url_gform->setSave_to_db($save_to_db);
	    $this->m_url_gform->setUser_id($user_id);
	    $this->m_url_gform->setActive($active);
	    $this->m_url_gform->setCreated_date($created_date);
	    $this->m_url_gform->setUpdated_date($updated_date);
	    $this->m_url_gform->setIp_address($ip_address);            
            $this->saveData();
        }
        public function saveData(){
            $check = $this->checkData($this->m_url_gform->getId());
            if($check == 0){
                if ($this->ispublic || $this->isadmin || ($this->isread && $this->isentry)){
                    $this->insertData();
                    $last_id = $this->dbh->lastInsertId();
                    $this->setLastId($last_id);
                    echo "Data is Inserted";
                }else{
                    echo "You cannot insert data this module";
                }
            } else {
                if ($this->ispublic || $this->isadmin || ($this->isread && $this->isupdate)){
                    $this->updateData();
                    echo "Data is updated";
                }else{
                    echo "You cannot update this module";
                }
            }
        }
        public function export() {
            $sql = $this->findDataWhere($this->showDataWhereQuery());
            header("Content-Type:application/csv",false);
            header("Content-Disposition: attachment; filename=". $this->getModulename() .".csv");           
            if($this->getModulename() != "report_query"){
                $report_query = new report_query();
                $report_query_controller = new report_queryController($report_query, $this->dbh);
                echo $report_query_controller->exportcsv($sql);
            }else{
                echo $this->exportcsv($sql);                
            }
        }
        public function printdata() {
            $sql = $this->findDataWhere($this->showDataWhereQuery());
            echo "<html>";
            echo "<head>";
            echo "</head>";
            echo "<body onLoad=\"window.print();window.close()\">";
            echo "<H1>".$this->getModulename()."</H1>";
            if($this->getModulename() != "report_query"){
                $report_query = new report_query();
                $report_query_controller = new report_queryController($report_query, $this->dbh);
                echo $report_query_controller->generatetableview($sql);
            }else{
                echo $this->generatetableview($sql);                
            }
            echo "</body>";
            echo "</html>";
        }
        public function getM_url_gform() {
            return $this->m_url_gform;
        }
        public function setM_url_gform($m_url_gform) {
            $this->m_url_gform = $m_url_gform;
        }
        public function getDbh() {
            return $this->dbh;
        }
        public function setDbh($dbh) {
            $this->dbh = $dbh;
        }
        public function getModulename() {
            return $this->modulename;
        }

        public function setModulename($modulename) {
            $this->modulename = $modulename;
        }

        public function getLimit() {
            return $this->limit;
        }

        public function setLimit($limit) {
            $this->limit = $limit;
        }

        public function getUser() {
            return $this->user;
        }

        public function setUser($user) {
            $this->user = $user;
        }

        public function getIp() {
            return $this->ip;
        }

        public function setIp($ip) {
            $this->ip = $ip;
        }

        public function getIsadmin() {
            return $this->isadmin;
        }

        public function setIsadmin($isadmin) {
            $this->isadmin = $isadmin;
        }

        public function getIspublic() {
            return $this->ispublic;
        }

        public function setIspublic($ispublic) {
            $this->ispublic = $ispublic;
        }

        public function getIsread() {
            return $this->isread;
        }

        public function setIsread($isread) {
            $this->isread = $isread;
        }

        public function getIsconfirm() {
            return $this->isconfirm;
        }

        public function setIsconfirm($isconfirm) {
            $this->isconfirm = $isconfirm;
        }

        public function getIsentry() {
            return $this->isentry;
        }

        public function setIsentry($isentry) {
            $this->isentry = $isentry;
        }

        public function getIsupdate() {
            return $this->isupdate;
        }

        public function setIsupdate($isupdate) {
            $this->isupdate = $isupdate;
        }

        public function getIsdelete() {
            return $this->isdelete;
        }

        public function setIsdelete($isdelete) {
            $this->isdelete = $isdelete;
        }

        public function getIsprint() {
            return $this->isprint;
        }

        public function setIsprint($isprint) {
            $this->isprint = $isprint;
        }

        public function getIsexport() {
            return $this->isexport;
        }

        public function setIsexport($isexport) {
            $this->isexport = $isexport;
        }

        public function getIsimport() {
            return $this->isimport;
        }

        public function setIsimport($isimport) {
            $this->isimport = $isimport;
        }

        public function setLastId($id){
            $this->lastID = $id;
        }
        
        public function getLastId(){
            return $this->lastID;
        }
    }
?>
