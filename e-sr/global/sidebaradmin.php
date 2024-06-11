 <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li <?php if($GLOBALS['a']=='index'){echo 'class="active"';}?>>
          <a href="index.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span> 
          </a>
        </li>
		<li><a><i class="fa fa-print"></i><span>Masters</span>
		<span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span></a>
		 <ul class="treeview-menu">
			<li><a href="add_dept.php"><i class="fa fa-cubes"></i><span>Department</span></a></li>
			
			<li><a href="add_increment_type.php"><i class="fa fa-user-plus"></i><span>Increment Type</span></a></li>
		
			 
			
			 <li><a href="add_penalty_award.php"><i class="fa fa-user-plus"></i><span>Penalty Awarded</span></a></li>
			 <li><a href="add_penalty_effected.php"><i class="fa fa-user-plus"></i><span></span>Penalty Effected</a></li>
		
			 <li><a href="add_property_source.php"><i class="fa fa-user-plus"></i><span>Property Source</span></a></li>
			 <li><a href="add_awards.php"><i class="fa fa-user-plus"></i><span>Awards</span></a></li>
		
			 <li><a href="add_movable_item.php"><i class="fa fa-user-plus"></i><span>Property Item Movable</span></a></li>
			 <li><a href="add_inmovable_item.php"><i class="fa fa-user-plus"></i><span>Property Item Inmovable</span></a></li>
			  <li><a href="community.php"><i class="fa fa-user-plus"></i><span>Community</span></a></li>
			   <li><a href="add_religion.php"><i class="fa fa-user-plus"></i><span>Religion</span></a></li>
			   <li><a href="add_recruitment_code.php"><i class="fa fa-user-plus"></i><span>Recruitment</span></a></li>
		
          </ul>
		</li>
        <li <?php if($GLOBALS['a']=='sr_entry'){echo 'class="active"';}?>><a href="biodata_entry.php"><i class="fa fa-search"></i> <span>SR Entry</span></a></li>
        <li <?php if($GLOBALS['a']=='update_search' || $GLOBALS['a']=='sr_update'){echo 'class="active"';}?>><a href="sr_update_search.php"><i class="fa fa-upload"></i><span>Update SR</span></a></li>
         <li <?php if($GLOBALS['a']=='sr_search' || $GLOBALS['a']=='display_sr'){echo 'class="active"';}?>><a href="sr_search.php"><i class="fa fa-upload"></i><span>SR Search</span></a></li>
        <li><a><i class="fa fa-print"></i><span>SR VIEW</span>
		<span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span></a>
		  <ul class="treeview-menu">
			 <li><a href="sr_view.php"><i class="fa fa-upload"></i> <span>Tabular View SR</span></a></li>
			  <li><a href="#"><i class="fa fa-upload"></i> <span>Single View SR</span></a></li>
          </ul>
          <li><a href="history_search.php"><i class="fa fa-book"></i> <span>SR History</span></a></li>
          <li><a href="print_sr.php"><i class="fa fa-book"></i> <span>SR Book Sample</span></a></li>
		</li>
       
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
