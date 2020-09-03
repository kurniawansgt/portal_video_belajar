<script type="text/javascript"> 
function deletedata(id, skip, search){ 
    var ask = confirm("Do you want to delete ID " + id + " ?");
    if (ask == true) {
        site = "index.php?model=video_pembelajaran&action=deleteFormJQuery&skip=" + skip + "&search=" + search + "&id=" + id;
        target = "content";
        showMenu(target, site);
    }
}
function searchData() {
     var searchdata = document.getElementById("search").value;
     site =  'index.php?model=video_pembelajaran&action=showAllJQuery&search='+searchdata;
     target = "content";
     showMenu(target, site);
}
$(document).ready(function(){
    $('#search').keypress(function(e) {
            if(e.which == 13) {
                searchData();
            }
    });
});
</script>

<h1>VIDEO PEMBELAJARAN</h1>
<div id="header_list">
</div>
<table width="95%" >
    <tr>
        <td align="left">
            <img alt="Move First"  src="./img/icon/icon_move_first.gif" onclick="showMenu('content', 'index.php?model=video_pembelajaran&action=showAllJQuery&search=<?php echo $search ?>');" >
            <img alt="Move Previous" src="./img/icon/icon_move_prev.gif" onclick="showMenu('content', 'index.php?model=video_pembelajaran&action=showAllJQuery&skip=<?php echo $previous ?>&search=<?php echo $search ?>');">
             Page <?php echo $pageactive ?> / <?php echo $pagecount ?> 
            <img alt="Move Next" src="./img/icon/icon_move_next.gif" onclick="showMenu('content', 'index.php?model=video_pembelajaran&action=showAllJQuery&skip=<?php echo $next ?>&search=<?php echo $search ?>');" >
            <img alt="Move Last" src="./img/icon/icon_move_last.gif" onclick="showMenu('content', 'index.php?model=video_pembelajaran&action=showAllJQuery&skip=<?php echo $last ?>&search=<?php echo $search ?>');">
            <a href="index.php?model=video_pembelajaran&action=export&search=<?php echo $search ?>">Export</a>
            <a href="index.php?model=video_pembelajaran&action=printdata&search=<?php echo $search ?>" target="_"><img src="./images/icon_print.png"/></a>
        </td>
        <td align="right">
            <input type="text" name="search" id="search" value="<?php echo $search ?>" >&nbsp;&nbsp;
            <input type="button" class="btn btn-info btn-sm" value="Cari Data" onclick="searchData()">
            <?php if($isadmin || $ispublic || $isentry){ ?>
            <input type="button" class="btn btn-warning btn-sm" value="Tambah Data" name="new" onclick="showMenu('header_list', 'index.php?model=video_pembelajaran&action=showFormJQuery')"> 
            <?php } ?>
        </td>
    </tr>
</table>
<table border="1"  cellpadding="2" style="border-collapse: collapse;" width="95%">
    <tr>
        <th>ID</th>
        <th>JUDUL VIDEOD</th>
        <th>DESKRIPSI</th>
        <th>URL VIDEO</th>
        <th>URL FORM</th>
        <th>AKSI</th>
    </tr>
    <?php
    
    $no = 1;
    
    if ($video_pembelajaran_list != "") { 
        foreach($video_pembelajaran_list as $video_pembelajaran){
            $pi = $no + 1;
            $bg = ($pi%2 != 0) ? "#E1EDF4" : "#F0F0F0";
    ?>
    <tr bgcolor="<?php echo $bg;?>">
        <td><a href='#' onclick="showMenu('header_list', 'index.php?model=video_pembelajaran&action=showDetailJQuery&id=<?php echo $video_pembelajaran->getId();?>')"><?php echo $video_pembelajaran->getId();?></a> </td>
        <td><?php echo $video_pembelajaran->getJudul_video();?></td>
        <td><?php echo $video_pembelajaran->getDeskripsi_video();?></td>
        <td><?php echo $video_pembelajaran->getUrl_video();?></td>
        <td><?php echo $video_pembelajaran->getUrl_form();?></td>
        <td align="center" class="combobox">
            <?php if($isadmin || $ispublic || $isupdate){ ?>
            <a href='#' onclick="showMenu('header_list', 'index.php?model=video_pembelajaran&action=showFormJQuery&id=<?php echo $video_pembelajaran->getid();?>&skip=<?php echo $skip ?>&search=<?php echo $search ?>')">[Edit]</a> | 
            <?php } ?>
            <?php if($isadmin || $ispublic || $isdelete){ ?>
            <a href='#' onclick="deletedata('<?php echo $video_pembelajaran->getId()?>','<?php echo $skip ?>','<?php echo $search ?>')">[Delete]</a>
            <?php } ?>
        </td>
    </tr>
    <?php
            $no++;
        }
    }
    ?>
</table>
<br>