<script language="javascript" type="text/javascript">
        (function() {
            $('form').ajaxForm({
                beforeSubmit: function() {
                },
                complete: function(xhr) {
                        var msg = $.trim(xhr.responseText);
                        var msgExp = msg.split("~");
                        var pesan = msgExp[0];
                        var id = msgExp[1];
                        var status = msgExp[2];
                        alert(pesan+"\nRecord ID:"+id);
                        if(status==0){
                            showMenu('content', 'index.php?model=m_url_gform&action=showAllJQuery&skip=<?php echo $skip ?>&search=<?php echo $search ?>');
                        } else {
                            showMenu('content','index.php?model=m_url_gform&action=showRecord&id='+id);
                        }
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

<form name="frmm_url_gform" id="frmm_url_gform" method="post" action="index.php?model=m_url_gform&action=saveFormJQuery">
    <table >
        <input type="hidden" style="text-align: right;" onkeypress="validate(event);"  name="id" id="id" value="<?php echo $m_url_gform_->getId();?>" size="5" ReadOnly  >
        <div class="form-group">
        <tr> 
            <td class="textBold"><label>NAMA DOKUMEN</label></td> 
            <td><input type="text" class="form-control" name="nama_dokumen" id="nama_dokumen" required="required" value="<?php echo $m_url_gform_->getNama_dokumen();?>" size="40"   ></td>
        </tr>

        <tr> 
            <td class="textBold"><label>URL GOOGLE FORM</label></td> 
            <td><input type="text" class="form-control" name="url_gform" id="url_gform" required="required" value="<?php echo $m_url_gform_->getUrl_gform();?>"></td>
        </tr>
        
        <tr> 
            <td class="textBold"><label>URL INTEGRATION</label></td> 
            <td><textarea rows="3" class="form-control" cols="70" name="url_gform_response" id="url_gform_response" required="required"><?php echo $m_url_gform_->getUrl_gform_response();?></textarea></td>
        </tr>

        <tr> 
            <td class="textBold"><label>SIMPAN KE DATABASE</label></td> 
            <td>                
                <input type="radio" name="save_to_db" id="save_to_db" value="1" <?php if($m_url_gform_->getSave_to_db()=="1" || $m_url_gform_->getId()=="") echo "checked";?>>&nbsp;Ya&nbsp;
                <input type="radio" name="save_to_db" id="save_to_db" value="0" <?php if($m_url_gform_->getSave_to_db()=="0") echo "checked";?>>&nbsp;Tidak&nbsp;
            </td>
        </tr>
        
        <tr> 
            <td class="textBold"><label>STATUS</label></td> 
            <td>                
                <input type="radio" name="active" id="active" value="1" <?php if($m_url_gform_->getActive()=="1" || $m_url_gform_->getId()=="") echo "checked";?>>&nbsp;Aktif&nbsp;
                <input type="radio" name="active" id="active" value="0" <?php if($m_url_gform_->getActive()=="0") echo "checked";?>>&nbsp;Tidak Aktif&nbsp;
            </td>
        </tr>
        
        <tr>
            <td></td>
            <td><input type="submit" name="submit" value="SUBMIT" class="btn btn-instagram" ></td>
        </tr>
        </div>
    </table>
</form>

<br>
<br>
