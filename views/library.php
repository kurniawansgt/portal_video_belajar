<link rel="shortcut icon" href="./images/<?php echo $fav;?>"/>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
<link href="css/morris/morris.css" rel="stylesheet" type="text/css" />
<link href="css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
<link href="css/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" />
<link href="css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
<link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
<link href="css/chart.css" rel="stylesheet" type="text/css" />
<link href="css/chart2.css" rel="stylesheet" type="text/css" />
<link href="css/style_slider.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/owl.carousel.css" rel="stylesheet">
<link href="css/tables.css" rel="stylesheet">  
<link href="css/form_style.css" rel="stylesheet" type="text/css" />
<link href="css/css_popup.css" rel="stylesheet" type="text/css" />
<link href="./calendar/CalendarControl.css" rel="stylesheet" type="text/css">
<link rel="Stylesheet" type="text/css" href="jHtmlArea/style/jqueryui/ui-lightness/jquery-ui-1.7.2.custom.css" />
<link rel="Stylesheet" type="text/css" href="jHtmlArea/style/jHtmlArea.css" />

<script type="text/javascript" src="js/popup.js"></script>
<script src="js/202/jquery.min.js"></script>
<script src="js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/raphael-min.js"></script>
<script src="js/plugins/morris/morris.min.js" type="text/javascript"></script>
<script src="js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
<script src="js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
<script src="js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
<script src="js/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<script src="js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
<script src="js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
<script src="js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
<script src="js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
<script src="js/AdminLTE/dashboard.js" type="text/javascript"></script>   
<script src="js/chart.js" type="text/javascript"></script>     
<script language="javascript" type="text/javascript" src="js/jschart.js"></script>
<script type="text/javascript" src="js/jquery-1.8.2.js"></script>
<script type="text/javascript" src="js/js.js"></script>
<script type="text/javascript" src="js/jquery.min.slider.js"></script>
<script src="js/owl.carousel.js"></script>
<script src="./jsgraph/highcharts.js"></script>
<script src="./jsgraph/modules/exporting.js"></script>
<script src="./calendar/CalendarControl.js" language="javascript"></script>        
<script src="./nicEdit/nicEdit.js" type="text/javascript" ></script>
<script src="./js/jquery.form.js" type="text/javascript" ></script>
<script src="./js/jquery.autocomplete.js" type="text/javascript" ></script>
<script type="text/javascript" src="jHtmlArea/scripts/jquery-ui-1.7.2.custom.min.js"></script>
<script type="text/javascript" src="jHtmlArea/scripts/jHtmlArea-0.8.js"></script>
<script type='text/javascript' src='js/jquery.formatCurrency-1.4.0.js'></script>
<script type="text/javascript" >
    function showMenu(position, page) {
        ajax_loadContent(position,page);
    }
    
    function closeDetail(id) {
        document.getElementById(id).innerHTML = "";
    }

    function openPopup() {
        document.getElementById('popup').style.visibility = "visible";
    }
    
    function openPopupImage() {
        document.getElementById('popupimage').style.visibility = "visible";
    }
    
    function closePopup() {
        document.getElementById('popup').style.visibility = "hidden";
        document.getElementById('popup').innerHTML = "";
        Popup.hide('popup');
    }
    
    function closePopupImage() {
        document.getElementById('popupimage').style.visibility = "hidden";
        document.getElementById('popupimage').innerHTML = "";
        Popup.hide('popupimage');
    }
    
    function openMember(id){
        url = 'index.php?model=customer&action=showDetailJQuery&id=' + id;
        openForm(url);
    }

    function openDetailReport(dbname,date,status,id){
        var url = 'index.php?model=report_query&action=showDetailReportJQuery&id='+id+'&parameter1='+dbname+'&parameter2='+date+'&parameter3='+status;
        openForm(url);
    }
    
    function openForm(url){
        openPopup();
        ajax_loadContent('popup',url);
        Popup.showModal('popup',null,null,null);
        return false;
    }
    
    function openFormImage(url){
        openPopupImage();
        ajax_loadContent('popupimage',url);
        Popup.showModal('popupimage',null,null,null);
        return false;
    }
    
    function hideshow(which){
        if (document.getElementById(which).style.visibility=="hidden"){
            document.getElementById(which).setAttribute("style","visibility:visible;height:auto");
        }else{
            document.getElementById(which).setAttribute("style","visibility:hidden;height:0");
        }
    }
    
    function exportData(sql){
        var l = 20;
        var t = 20;
        var w = 20;
        var h = 20;
        var windowprops = "location=no,scrollbars=yes,menubars=no,toolbars=no, toolbox=no,resizable=no" + ",left=" + l + ",top=" + t + ",width=" + w + ",height=" + h;				
        var URL = 'index.php?model=report_query&action=showExportTable&sql='+sql;
        popup = window.open(URL,"",windowprops);
    }
</script>