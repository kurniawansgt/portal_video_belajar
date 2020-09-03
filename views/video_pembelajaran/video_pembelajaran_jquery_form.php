<script language="javascript" type="text/javascript">
        (function() {
            $('form').ajaxForm({
                beforeSubmit: function() {
                },
                complete: function(xhr) {
                        alert($.trim(xhr.responseText));
                        showMenu('content', 'index.php?model=video_pembelajaran&action=showAllJQuery&skip=<?php echo $skip ?>&search=<?php echo $search ?>');
                }
             });
        })();
        function validate(evt){
            var e = evt || window.event;
            var key = e.keyCode || e.which;
            if((key <48 || key >57) && !(key ==8 || key ==9 || key ==13  || key ==37  || key ==39 || key ==46)  ){
                e.returnValue = false;
                if(e.preventDefault)e.preventDefault();
            }
        }
</script>

<form name="frmvideo_pembelajaran" id="frmvideo_pembelajaran" method="post" action="index.php?model=video_pembelajaran&action=saveFormJQuery">
    <table>        
        <input type="hidden" style="text-align: right;" onkeypress="validate(event);"  name="id" id="id" value="<?php echo $video_pembelajaran_->getId();?>" size="5" ReadOnly  >

        <tr> 
            <td><label>JUDUL VIDEO</label></td> 
            <td><input type="text" class="form-control" name="judul_video" id="judul_video" value="<?php echo $video_pembelajaran_->getJudul_video();?>" size="40"   ></td>
        </tr>

        <tr> 
            <td><label>DESKRIPSI</label></td> 
            <td><textarea rows="10" cols="50" class="form-control" name="deskripsi_video" id="deskripsi_video"><?php echo $video_pembelajaran_->getDeskripsi_video();?></textarea></td>
        </tr>

        <tr> 
            <td><label>URL Video</label></td> 
            <td><input type="text" class="form-control" name="url_video" id="url_video" value="<?php echo $video_pembelajaran_->getUrl_video();?>" size="40"   ></td>
        </tr>

        <tr> 
            <td><label>URL Form</label></td> 
            <td><input type="text" class="form-control" name="url_form" id="url_form" value="<?php echo $video_pembelajaran_->getUrl_form();?>" size="40"   ></td>
        </tr>
        
        <tr> 
            <td><label>Thumbnail</label></td> 
            <td><input type="file" class="form-control" name="thumbnail_video" id="thumbnail_video" value="<?php echo $video_pembelajaran_->getThumbnail_video();?>" size="40"   ></td>
        </tr>

        <tr>
            <td></td>
            <td><input type="submit" name="submit" value="Submit" class="btn btn-group" ></td>
        </tr>
    </table>
</form>

<br>
<br>
