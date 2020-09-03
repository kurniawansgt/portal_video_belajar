<html>
    <title>Daftar Video Edukasi</title>
    <script>
        function showDetailVideo(id){
            openForm('index.php?model=video_pembelajaran_siswa&action=showDetailVideo&id='+id);
        }
        function showGForm(gform){            
            showMenu('content','index.php?model=video_pembelajaran_siswa&action=showFormGoogle&type=private&link='+gform);
        }
        function showTinyURL(idvideo){            
            showMenu('tinyurl'+idvideo,'index.php?model=video_pembelajaran_siswa&action=showTinyUrl&idvideo='+idvideo);
            document.getElementById('btnCopy'+idvideo).disabled = false;
        }
        function copyTextURL(divid) {            
            if (document.selection) {
                var range = document.body.createTextRange();
                range.moveToElementText(document.getElementById(divid));
                range.select().createTextRange();
                document.execCommand("copy");
            } else if (window.getSelection) {
                var range = document.createRange();
                range.selectNode(document.getElementById(divid));
                window.getSelection().addRange(range);
                document.execCommand("copy");
                alert("Text has been copied")
            }
        } 
    </script>
    <body>        
        <table border="0" width="98%" style="border-collapse: collapse" cellpadding="5">            
            <?php   
                $thumbnailVideo = "";
                foreach($video_pembelajaran_siswa_list as $video_pembelajaran){
                    $idVideo = $video_pembelajaran->getId();                    
                    if($video_pembelajaran->getThumbnail_video()!=""){
                        $thumbnailVideo = "./views/video_pembelajaran/files/".$video_pembelajaran->getThumbnail_video();
                    } else {
                        $thumbnailVideo = "./images/".$video_pembelajaran->getThumbnail_video();
                    }
            ?>
            <tr>
                <td width="20%" align="center" valign="top">
                    <img src="<?php echo $thumbnailVideo;?>" height="130" width="200" style="border-radius: 3px 3px 3px 3px; border: 1px solid">                    
                </td>
                <td width="80%" valign="top">
                    <p><b><?php echo strtoupper($video_pembelajaran->getJudul_video());?></b></p>
                    <p><?php echo $video_pembelajaran->getDeskripsi_video();?></p>                    
                    <p>
                        <input type="button" value="Lihat Video" class="btn-github btn" onclick="showDetailVideo('<?php echo $video_pembelajaran->getId();?>')">
                        <input type="button" value="Perpendek URL" class="btn-group btn" onclick="showTinyURL('<?php echo $idVideo;?>')">
                        <?php if($video_pembelajaran->getUrl_form()==""){ ?>
                        <span style="font-size: 13px; color: red">(Google Form Tidak Tersedia)</span>
                        <?php } ?>
                    </p>
                    <p>
                    <div id="tinyurl<?php echo $idVideo;?>" style="font-family: 'calibri'; font-size: 15px; font-weight: bold; display: inline-block"></div>
                    <input type="button" id="btnCopy<?php echo $idVideo;?>" value="Copy URL" disabled="disabled" style="display:inline-block; cursor: pointer" class="btn-file btn" onclick="copyTextURL('<?php echo "tinyurl".$idVideo;?>')">
                    </p>
                </td>
            </tr>
            <?php
                }
            ?>
        </table>    
    </body>
</html>
<br><br>