<style type="text/css">
    .inner_slide_menu_link
    {
        padding-left: 15px;
    }
    .inner_slide_menu_link i
    {
        padding-right: 15px;
    }
</style>
<!-- Sidebar menu-->
			<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
			<aside class="app-sidebar ">
				<div class="sidebar-img">
					<a class="navbar-brand" href="index.php?pid=home" style="background: white;">
                    	<?php 
                            $clogo = get_admin_settings('clogo'); 
                            $default="assets/img/brand/logo.png";
                            $logo="";
                            /*if($clogo!="" && file_exists("img/".$clogo))
                            {
                                $logo="img/".$clogo;
                            }else
                            {*/
                                $logo=$default;
                            // }
                        ?>
                        <img alt="..." class="navbar-brand-img main-logo" src="<?php echo $logo; ?>"> 
                        <img alt="..." class="navbar-brand-img logo" src="<?php echo $logo; ?>">
                    </a>
					<ul class="side-menu">
						<li class="slide">
							<a class="side-menu__item" href="index.php?pid=home"><i class="side-menu__icon fe fe-home"></i><span class="side-menu__label">Dashboard</span></a>
						</li>
                        <!--<li class="slide">
							<a class="side-menu__item" href="index.php?pid=calendar"><i class="side-menu__icon fe fe-home"></i><span class="side-menu__label">Calendar</span></a>
						</li>-->
                        
                    

                    
                    
                        
                    <?php /*if(get_access('fare') == 1){ ?>
                        <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-list"></i><span class="side-menu__label">Fare & Toll Fees </span><i class="angle fa fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                
                                <?php if(get_access('view_fare') == 1){?>
                                <li><a href="index.php?pid=view_all_vehicle_fare" class="slide-item">All Fares</a></li>
                                
                            <?php } ?>
                            <?php if(get_access('add_fare') == 1){?>
                                <li><a href="index.php?pid=add_vehicle_fare" class="slide-item">Add Vehicle Fare</a></li>
                                
                            <?php } ?>
                            <?php if(get_access('view_fare') == 1){?>
                                <li><a href="index.php?pid=view_all_vehicle_toll_fees" class="slide-item">All Toll Fees</a></li>
                                
                            <?php } ?>
                            <?php if(get_access('add_fare') == 1){?>
                                <li><a href="index.php?pid=add_vehicle_toll_fees" class="slide-item">Add Toll Fees</a></li>
                                
                            <?php } ?>
                            </ul>
                        </li>

                        
                    <?php }*/ ?>
                    <?php if(get_access('crime_types') == 1){?>
                    <li class="slide">
                            
                        <a  class="side-menu__item" href="index.php?pid=crime_type"><i class="side-menu__icon fa fa-list"></i><span class="side-menu__label">Crime Types</span></a>
                    </li>
                    <?php } ?>
                    <?php if(get_access('country') == 1){?>
                    <li class="slide">
                            
                        <a  class="side-menu__item" href="index.php?pid=countries"><i class="side-menu__icon fa fa-list"></i><span class="side-menu__label">Countries</span></a>
                    </li>
                    <?php } ?>
                    <?php if(get_access('crime_type_fields') == 1){?>
                    <li class="slide">
                        <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-file"></i><span class="side-menu__label">Crime Type Fields </span><i class="angle fa fa-angle-right"></i></a>
                        <ul class="slide-menu">
                            
                            <?php 
                                $sel_crime_types=mysqli_query($conn,"SELECT * from cz_crime_type ");
                                while($fet_crime_type=mysqli_fetch_assoc($sel_crime_types))
                                {
                                    ?>
                                        <li><a href="index.php?pid=crime_type_fields&type=<?php echo $fet_crime_type['id']; ?>" class="slide-item"><?php echo $fet_crime_type['name']; ?></a></li>                     
                                    <?php
                                }
                            ?>
                                
                            
                        </ul>
                    </li>
                    <?php } ?>
                    <?php if(get_access('crime_type_values') == 1){?>
                    <li class="slide">
                        <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-file"></i><span class="side-menu__label">Crime Type Values </span><i class="angle fa fa-angle-right"></i></a>
                        <ul class="slide-menu">
                            
                            <?php 
                                $sel_crime_categories=mysqli_query($conn,"SELECT * from cz_crime_type_fields WHERE field_type='dropdown'AND value_type='dynamic' ");
                                while($fet_crime_categories_vals=mysqli_fetch_assoc($sel_crime_categories))
                                {
                                    $type=$fet_crime_categories_vals['type'];
                                    $type_name="";
                                    $type_name=GetSingleFieldDataFromTable("cz_crime_type","name"," id='".$type."' ",$is_stat_chk="0");
                                    if($type_name!="" && $type_name!="0")
                                    {
                                        $field_name=$type_name." | ".$fet_crime_categories_vals['field_name'];
                                    }else
                                    {
                                        $field_name=$fet_crime_categories_vals['field_name'];
                                    }
                                    ?>
                                        <li><a href="index.php?pid=crime_type_category&type=<?php echo $fet_crime_categories_vals['type']; ?>&field=<?php echo $fet_crime_categories_vals['id']; ?>" class="slide-item"><?php echo $field_name." "; ?></a></li>                     
                                    <?php
                                    
                                }
                            ?>
                                
                            
                        </ul>
                    </li>
                    <?php } ?>
                    <?php if(get_access('user') == 1){?>            
                    <li class="slide">
                        <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-users"></i><span class="side-menu__label">Manage Users </span><i class="angle fa fa-angle-right"></i></a>
                        <ul class="slide-menu">
                            <li><a href="index.php?pid=view_all_users" class="slide-item">All Users</a></li>                     
                        </ul>
                    </li>
                    <?php } ?>
                    
                    <?php if(get_access('crime') == 1){?>    
                    <li class="slide">
                        <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-list"></i><span class="side-menu__label">Manage Crimes </span><i class="angle fa fa-angle-right"></i></a>
                        <ul class="slide-menu">
                            <li><a href="index.php?pid=view_all_crimes" class="slide-item">All Crimes</a></li>                     
                            <li><a href="index.php?pid=view_all_crime_requests" class="slide-item">Crime Update Requests</a></li>                     
                        </ul>
                    </li>
                    <?php } ?>    
                    <!--            
                    <li class="slide">
                            
                        <a  class="side-menu__item" href="index.php?pid=property_types&type=3"><i class="side-menu__icon fa fa-list"></i><span class="side-menu__label">Property Types</span></a>
                    </li>
                    <li class="slide">
                            
                        <a  class="side-menu__item" href="index.php?pid=sexual_abuse_types&type=4"><i class="side-menu__icon fa fa-list"></i><span class="side-menu__label">Sexual Abuse Victim Types</span></a>
                    </li>
                    <li class="slide">
                            
                        <a  class="side-menu__item" href="index.php?pid=domestic_violence_types&type=5"><i class="side-menu__icon fa fa-list"></i><span class="side-menu__label">Domestic Violence Victim Types</span></a>
                    </li>
                    <li class="slide">
                            
                        <a  class="side-menu__item" href="index.php?pid=disturbance_types&type=7"><i class="side-menu__icon fa fa-list"></i><span class="side-menu__label">Disturbance Types</span></a>
                    </li>
                    <li class="slide">
                            
                        <a  class="side-menu__item" href="index.php?pid=fraud_types&type=11"><i class="side-menu__icon fa fa-list"></i><span class="side-menu__label">Fraud Types</span></a>
                    </li>
                    <li class="slide">
                            
                        <a  class="side-menu__item" href="index.php?pid=vandalism_types&type=13"><i class="side-menu__icon fa fa-list"></i><span class="side-menu__label">Vandalism Types</span></a>
                    </li>-->
                    
                    
                    <?php /*if(get_access('transaction') == 1){?>
                        <li class="slide">
                            
                            <a  class="side-menu__item" href="index.php?pid=view_all_transactions"><i class="side-menu__icon fa fa-list"></i><span class="side-menu__label">Transactions</span></a>
                        </li>
                    <?php }*/ ?>
                    
                    <?php if(get_access('notification') == 1){?>
                       <!-- <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-bell"></i><span class="side-menu__label">Notifications </span><i class="angle fa fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                
                                <?php if(get_access('add_notification') == 1){?>
                                <li><a href="index.php?pid=add_notification" class="slide-item">Add Notification</a></li>    
                                <?php } ?>
                                <?php if(get_access('view_notification') == 1){?>
                                <li><a href="index.php?pid=view_all_notifications" class="slide-item">All Notifications</a></li>
                                
                            <?php } ?>
                            </ul>
                        </li> -->
                    <?php } ?>
                    <?php if(get_access('admin_user') == 1){?>    
                        <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-user-secret"></i><span class="side-menu__label">Manage Admin Users</span><i class="angle fa fa-angle-right"></i></a>
                            <ul class="slide-menu">
                            <?php if(get_access('add_admin_user') == 1){?>
                                <li><a href="index.php?pid=add_employee" class="slide-item">Add Admin User</a></li>
                            <?php } ?>
                            <?php if(get_access('update_admin_user') == 1){?>    
                                <li><a href="index.php?pid=view_all_employee" class="slide-item">All Admin Users</a></li>
                            <?php } ?>    
                                <?php if(get_access('update_admin_user_roles') == 1){?>
                                <li><a href="index.php?pid=user_role" class="slide-item">Admin User Roles</a></li>
                                <?php } ?>    
                            </ul>
                        </li>
                    <?php } ?>    
                        
                                
                        <?php if(get_access('admin_settings') == 1){ ?>        
                            <li class="slide">
                                <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-cogs"></i><span class="side-menu__label">Settings</span><i class="angle fa fa-angle-right"></i></a>
                                <ul class="slide-menu">
                                    <li class="slide">
                                        
                                            <?php /*if(get_access('admin_settings') == 1){*/ ?><a href="index.php?pid=settings" class="slide-item">Radius Settings</a><?php /*}*/ ?>
                                            <?php /*if(get_access('state') == 1){?><li><a href="index.php?pid=state" class="slide-item">States</a></li><?php } ?>
                                            <?php if(get_access('district') == 1){?><li><a href="index.php?pid=district" class="slide-item">Districts</a></li><?php }*/ ?>
                                            <?php /*if(get_access('bank') == 1){?><li><a href="index.php?pid=bank" class="slide-item">Banks</a></li><?php }*/ ?>
                                        
                                    </li>
                                     
                                </ul>
                            </li>
                        <?php } ?>
                         
					</ul>
				</div>
			</aside>
			<!-- Sidebar menu-->