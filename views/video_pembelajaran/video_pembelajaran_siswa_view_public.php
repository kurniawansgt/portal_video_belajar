<?php
    ob_start();
    ini_set("diplay_errors",1);
    
    $titleVideo = $detail_video->getJudul_video();
    $UrlVideo = str_replace("https://", "", $detail_video->getUrl_video());
    $UrlVideoArr = explode("/", $UrlVideo);
    $idVideo = str_replace(" ","",$UrlVideoArr[1]);
    $UrlGForm = str_replace("https://", "", $detail_video->getUrl_form());
    $UrlGFormArr = explode("/", $UrlGForm);
    $idGForm = $UrlGFormArr[1];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title></title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>        
        <?php
        include_once './views/library.php';
        ?>
    </head>    
    <body class="skin-blue">      
        <div id="content" align="center">
            <input type="hidden" name="idVideo" id="idVideo" value="<?php echo $idVideo;?>">
            <input type="hidden" name="idGForm" id="idGForm" value="<?php echo $idGForm;?>">
            <input type="hidden" name="UrlGForm" id="UrlGForm" value="<?php echo $detail_video->getUrl_form();?>">
            <p></p>
            <center><p><span style="font-family: 'calibri';font-size: 25px"><?php echo strtoupper($titleVideo);?></span></p></center>        
            <center><div id="player" style="border-radius: 10px;"></div></center>   
            <center>
                <div>
                <?php
                    if($UrlGForm != ""){
                ?>            
                <input type="button" class="btn-facebook btn" value="Lewati Video" onclick="skipVideo()">                
                <?php
                    } else {
                ?>
                <span style="font-size: 15px; font-weight: bold">Google Form Tidak Tersedia.</span>
                <?php
                    }
                ?>
                </div>
            </center>    
        </div>                
        <div class="clearfix"></div>
        <script>        
            if (typeof tag === "undefined") { 
                var tag = document.createElement('script');            
                tag.src = "https://www.youtube.com/iframe_api";
                var firstScriptTag = document.getElementsByTagName('script')[0];
                firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
            } else {
               onYouTubeIframeAPIReady();
            }

            var idVideo = document.getElementById('idVideo').value;
            var gForm = document.getElementById('UrlGForm').value;
            var player;
            function onYouTubeIframeAPIReady() {
              player = new YT.Player('player', {
                height: '580',
                width: '1130',
                videoId: idVideo,
                events: {
                    'onReady': onPlayerReady,
                    'onStateChange': onPlayerStateChange
                },
                playerVars: { 
                    'controls': 1, // parameter mempercepat video
                    'showinfo': 0,
                    'disablekb': 1,
                    'iv_load_policy': 3,
                    'modestbranding': 1,
                    'rel': 0,

                }
              });
            }

            function onPlayerReady(event) {
              event.target.playVideo();
            }

            function onPlayerStateChange(event) {
                if (event.data == 0){                                                             
                    showGForm(gForm);
                }
            }    
            
            function showGForm(gform){            
                showMenu('content','index.php?model=video_pembelajaran_siswa&action=showFormGoogle&type=public&link='+gform);
            }
            
            function skipVideo(){
                showGForm(gForm);
            }
        </script>
    </body>
</html>