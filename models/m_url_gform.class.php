<?php
    class m_url_gform
    {
	var $id;
	var $nama_dokumen;
	var $url_gform_response;
	var $url_gform;
	var $save_to_db;
	var $user_id;
	var $active;
	var $created_date;
	var $updated_date;
	var $ip_address;

        var $primarykey = "id";
        
	public function getId() {
	   return $this->id;
	}

	public function setId($id) {
	   $this->id = $id;
	}
	public function getNama_dokumen() {
	   return $this->nama_dokumen;
	}

	public function setNama_dokumen($nama_dokumen) {
	   $this->nama_dokumen = $nama_dokumen;
	}
	public function getUrl_gform_response() {
	   return $this->url_gform_response;
	}

	public function setUrl_gform_response($url_gform_response) {
	   $this->url_gform_response = $url_gform_response;
	}
	public function getUrl_gform() {
	   return $this->url_gform;
	}

	public function setUrl_gform($url_gform) {
	   $this->url_gform = $url_gform;
	}
	public function getSave_to_db() {
	   return $this->save_to_db;
	}

	public function setSave_to_db($save_to_db) {
	   $this->save_to_db = $save_to_db;
	}
	public function getUser_id() {
	   return $this->user_id;
	}

	public function setUser_id($user_id) {
	   $this->user_id = $user_id;
	}
	public function getActive() {
	   return $this->active;
	}

	public function setActive($active) {
	   $this->active = $active;
	}
	public function getCreated_date() {
	   return $this->created_date;
	}

	public function setCreated_date($created_date) {
	   $this->created_date = $created_date;
	}
	public function getUpdated_date() {
	   return $this->updated_date;
	}

	public function setUpdated_date($updated_date) {
	   $this->updated_date = $updated_date;
	}
	public function getIp_address() {
	   return $this->ip_address;
	}

	public function setIp_address($ip_address) {
	   $this->ip_address = $ip_address;
	}
         
    }
?>
