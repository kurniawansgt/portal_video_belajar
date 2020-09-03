<?php
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
    <body>
        <input type="hidden" name="idVideo" id="idVideo" value="<?php echo $idVideo;?>">
        <input type="hidden" name="idGForm" id="idGForm" value="<?php echo $idGForm;?>">
        <input type="hidden" name="UrlGForm" id="UrlGForm" value="<?php echo $detail_video->getUrl_form();?>">
        <p></p>
        <center><p><span style="font-family: 'calibri';font-size: 25px"><?php echo strtoupper($titleVideo);?></span></p></center>        
        <center><div id="player" style="border-radius: 10px;"></div></center>  
        <center>
            <div>
                <input type="button" class="btn-facebook btn" value="Tutup Jendela" onclick="closePopup()">                
            </div>
        </center>
    </body>
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
            height: '450',
            width: '800',
            videoId: idVideo,
            events: {
                'onReady': onPlayerReady,
                'onStateChange': onPlayerStateChange
            },
            playerVars: { 
                'controls': 1, // set parameter fitur percepat video
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
              //window.open(document.getElementById('UrlGForm').value,'_blank');            
              closePopup();
              showGForm(gForm);
            }
        }                    
    </script>     
</html>
<br>