<?php
    class video_pembelajaran
    {
	var $id;
	var $judul_video;
	var $deskripsi_video;
	var $thumbnail_video;
	var $url_video;
	var $url_form;

        var $primarykey = "id";
        
	public function getId() {
	   return $this->id;
	}

	public function setId($id) {
	   $this->id = $id;
	}
	public function getJudul_video() {
	   return $this->judul_video;
	}

	public function setJudul_video($judul_video) {
	   $this->judul_video = $judul_video;
	}
	public function getDeskripsi_video() {
	   return $this->deskripsi_video;
	}

	public function setDeskripsi_video($deskripsi_video) {
	   $this->deskripsi_video = $deskripsi_video;
	}
	public function getThumbnail_video() {
	   return $this->thumbnail_video;
	}

	public function setThumbnail_video($thumbnail_video) {
	   $this->thumbnail_video = $thumbnail_video;
	}
	public function getUrl_video() {
	   return $this->url_video;
	}

	public function setUrl_video($url_video) {
	   $this->url_video = $url_video;
	}
	public function getUrl_form() {
	   return $this->url_form;
	}

	public function setUrl_form($url_form) {
	   $this->url_form = $url_form;
	}
         
    }
?>
