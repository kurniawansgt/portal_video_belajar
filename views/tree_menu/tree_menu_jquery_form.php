<script language="javascript" type="text/javascript">
        (function() {
            $('form').ajaxForm({
                beforeSubmit: function() {
                },
                complete: function(xhr) {
                        alert($.trim(xhr.responseText));
                        showMenu('content', 'index.php?model=tree_menu&action=showAllJQuery&skip=<?php echo $skip ?>&search=<?php echo $search ?>');
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

<br>


<form name="frmtree_menu" id="frmtree_menu" method="post" action="index.php?model=tree_menu&action=saveFormJQuery">
    <table >
        <tr> 
            <td class="textBold">Id</td> 
            <td><input type="text" style="text-align: right;" onkeypress="validate(event);"  name="id" id="id" value="<?php echo $tree_menu_->getId();?>" size="5" ReadOnly  ></td>
        </tr>

        <tr> 
            <td class="textBold">Nama_menu</td> 
            <td><input type="text"  name="nama_menu" id="nama_menu" value="<?php echo $tree_menu_->getNama_menu();?>" size="40"   ></td>
        </tr>

        <tr> 
            <td class="textBold">Parent_id</td> 
            <td><input type="text" style="text-align: right;" onkeypress="validate(event);"  name="parent_id" id="parent_id" value="<?php echo $tree_menu_->getParent_id();?>" size="5"   ></td>
        </tr>


        <tr>
            <td></td>
            <td><input type="submit" name="submit" value="Submit" class="btn btn-danger btn-sm" ></td>
        </tr>
    </table>
</form>

<br>
<br>
