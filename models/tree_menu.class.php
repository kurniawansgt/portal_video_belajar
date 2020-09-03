<?php
    class tree_menu
    {
	var $id;
	var $nama_menu;
	var $parent_id;

        var $primarykey = "id";
        
	public function getId() {
	   return $this->id;
	}

	public function setId($id) {
	   $this->id = $id;
	}
	public function getNama_menu() {
	   return $this->nama_menu;
	}

	public function setNama_menu($nama_menu) {
	   $this->nama_menu = $nama_menu;
	}
	public function getParent_id() {
	   return $this->parent_id;
	}

	public function setParent_id($parent_id) {
	   $this->parent_id = $parent_id;
	}
         
    }
?>
