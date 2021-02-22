<ul class="sidebar-menu tree" data-widget="tree">
    <li class="header">Main Navigation</li>
    <?php
            if($menu_active_parent == 'Dashboard'){
                echo "<li class='active '>";
            }else{
                echo "<li>";
            }
    ?>
        <a href="<?php echo base_url();?>mod_dashboard"><i class="fa fa-home"></i> <span>Dashboard</span></a> 
    </li>
    <?php print_r($this->ModelMenu->MenuAdmin($parent=0,$hasil=null,$menu_active_parent,$menu_active_sub,$menu_active_sub1)); ?>
</ul>