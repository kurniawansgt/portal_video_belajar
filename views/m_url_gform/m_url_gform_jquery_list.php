<script type="text/javascript"> 
function deletedata(id, skip, search){ 
    var ask = confirm("Do you want to delete ID " + id + " ?");
    if (ask == true) {
        site = "index.php?model=m_url_gform&action=deleteFormJQuery&skip=" + skip + "&search=" + search + "&id=" + id;
        target = "content";
        showMenu(target, site);
    }
}
function showRecordGForm(id){    
    var site = "index.php?model=m_url_gform&action=showRecord&id="+id;
    var target = "content";
    showMenu(target, site);
}
function searchData() {
     var searchdata = document.getElementById("search").value;
     site =  'index.php?model=m_url_gform&action=showAllJQuery&search='+searchdata;
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
function exportTableToExcel(tableID, filename = ''){
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xls':'excel_data.xls';
    
    // Create download link element
    downloadLink = document.createElement("a");
    
    document.body.appendChild(downloadLink);
    
    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
    
        // Setting the file name
        downloadLink.download = filename;
        
        //triggering the function
        downloadLink.click();
    }
}
</script>

<h1>Konfigurasi Integrasi Data Google Form</h1>
<div id="header_list">
</div>
<table width="95%" >
    <tr>
        <td align="left">
            <img alt="Move First"  src="./img/icon/icon_move_first.gif" onclick="showMenu('content', 'index.php?model=m_url_gform&action=showAllJQuery&search=<?php echo $search ?>');" >
            <img alt="Move Previous" src="./img/icon/icon_move_prev.gif" onclick="showMenu('content', 'index.php?model=m_url_gform&action=showAllJQuery&skip=<?php echo $previous ?>&search=<?php echo $search ?>');">
             Page <?php echo $pageactive ?> / <?php echo $pagecount ?> 
            <img alt="Move Next" src="./img/icon/icon_move_next.gif" onclick="showMenu('content', 'index.php?model=m_url_gform&action=showAllJQuery&skip=<?php echo $next ?>&search=<?php echo $search ?>');" >
            <img alt="Move Last" src="./img/icon/icon_move_last.gif" onclick="showMenu('content', 'index.php?model=m_url_gform&action=showAllJQuery&skip=<?php echo $last ?>&search=<?php echo $search ?>');">
            <a href="index.php?model=m_url_gform&action=export&search=<?php echo $search ?>">Export</a>
            <a href="index.php?model=m_url_gform&action=printdata&search=<?php echo $search ?>" target="_"><img src="./images/icon_print.png"/></a>
        </td>
        <td align="right">
            <input type="text" name="search" id="search" value="<?php echo $search ?>" >&nbsp;&nbsp;
            <input type="button" class="btn btn-foursquare" value="Cari Data" onclick="searchData()">
            <?php if($isadmin || $ispublic || $isentry){ ?>
            <input type="button" class="btn btn-facebook" value="Tambah Data" name="new" onclick="showMenu('header_list', 'index.php?model=m_url_gform&action=showFormJQuery')"> 
            <?php } ?>
        </td>
    </tr>
</table>
<div style="overflow: auto; width: 98%;">
<table border="1"  cellpadding="2" style="border-collapse: collapse;" width="95%">
    <tr>
        <th style="text-align: center" width="5%">ID</th>
        <th style="text-align: center" width="20%">Nama Dokumen</th>
        <th style="text-align: center" width="15%">URL Google Form</th>
        <th style="text-align: center" width="30%">URL Respon Form</th>
        <th style="text-align: center" width="15%">Pengguna</th>
        <th style="text-align: center" width="15%">Aksi</th>
    </tr>
    <?php   
        $no = 1;

        if ($m_url_gform_list != "") { 
            foreach($m_url_gform_list as $m_url_gform){
                $pi = $no + 1;
                $bg = ($pi%2 != 0) ? "#E1EDF4" : "#F0F0F0";
    ?>
    <tr bgcolor="<?php echo $bg;?>">
        <td align="center"><a href='#' onclick="showMenu('header_list', 'index.php?model=m_url_gform&action=showDetailJQuery&id=<?php echo $m_url_gform->getId();?>')"><?php echo $m_url_gform->getId();?></a> </td>
        <td align="center"><?php echo $m_url_gform->getNama_dokumen();?></td>
        <td align="center"><a href="<?php echo $m_url_gform->getUrl_gform();?>" target="_blank"><?php echo $m_url_gform->getUrl_gform();?></a></td>
        <td align="center"><?php echo $m_url_gform->getUrl_gform_response();?></td>
        <td align="center"><?php echo $m_url_gform->getUser_id();?></td>
        <td align="center" class="combobox">
            <?php if($isadmin || $ispublic || $isupdate){ ?>
            <a href='#' onclick="showMenu('header_list', 'index.php?model=m_url_gform&action=showFormJQuery&id=<?php echo $m_url_gform->getid();?>&skip=<?php echo $skip ?>&search=<?php echo $search ?>')">[Edit]</a> | 
            <?php } ?>
            <?php if($isadmin || $ispublic || $isdelete){ ?>
            <a href='#' onclick="deletedata('<?php echo $m_url_gform->getId()?>','<?php echo $skip ?>','<?php echo $search ?>')">[Delete]</a>
            <?php } ?>
            <?php if($m_url_gform->getActive()==1){ ?>
            <a href="#" onclick="showRecordGForm('<?php echo $m_url_gform->getId();?>')"> | [Grab Data]</a>
            <?php } ?>
        </td>
    </tr>
    <?php
                $no++;
            }
        }
    ?>
</table>
</div>