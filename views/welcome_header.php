<br><br>
<div class="col-xs-12">
    <?php
    if($initial_company->getBgfile()!=""){
        ?>
    <img class="img-responsive" src="./images_medium/<?php echo $initial_company->getBgfile();?>" height="300" width="300" />
        <?php
    }else{
        ?>
        <img class="img-responsive" src="./images/noimage.png" />
        <?php
    }
    
    ?>    
</div>
<div class="cleaner"></div>
<br>