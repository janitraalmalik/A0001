<nav class="navbar navbar-default dashbrdAdmin">
  <div class="container-fluid">
    <div class="navbar-header">
        <ul id="navbar" class="nav navbar-nav navbar-dashbrdAdmin">
            <li><a href="<?php echo site_url(); ?>"><span>Beranda</span></a></li>
            <!--<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Interior Appereance <span class="caret"></span></a>
            	<ul class="dropdown-menu" role="menu">
            		<li><a href="<?php echo site_url('/InteriorAprcMng/IntrSeat/'); ?>"><span>Seat</span></a></li>
            		<li><a href="<?php echo site_url('#'); ?>"><span>Cabin General</span></a></li>
            		<li><a href="<?php echo site_url('#'); ?>"><span>Lavatory</span></a></li>
            		<li><a href="<?php echo site_url('#'); ?>"><span>Galley</span></a></li>
            		<li><a href="<?php echo site_url('#'); ?>"><span>Attendant Seat</span></a></li>
            		<li><a href="<?php echo site_url('#'); ?>"><span>Carpet</span></a></li> 
            	</ul>
            </li>
            <li><a href="<?php echo site_url('#'); ?>"><span>Eksterior Appereance </span></a></li>-->
            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Cabin Template <span class="caret"></span></a>
            	<ul class="dropdown-menu" role="menu">
            		<li><a href="<?php echo site_url('/aircraft_mapgenerate/'); ?>"><span>Generator Cabin Template</span></a></li>
            		<li><a href="<?php echo site_url('/aircraft_mapgenerate/list_template/'); ?>"><span>List Cabin Template</span></a></li> 
            	</ul>
            </li>
            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Master Data <span class="caret"></span></a>
            	<ul class="dropdown-menu" role="menu">
            		<li><a href="<?php echo site_url('/masterData/AircraftManufacture/'); ?>"><span>Air Craft Manufacture</span></a></li>
            		<li><a href="<?php echo site_url('/masterData/AircraftType/'); ?>"><span>A/C Type</span></a></li> 
            		<li><a href="<?php echo site_url('/masterData/AircraftReg'); ?>"><span>A/C Registration</span></a></li>
					<li><a href="<?php echo site_url('/masterData/FaultCodeItems'); ?>"><span>Fault Code Items</span></a></li>
					<li><a href="<?php echo site_url('/masterData/FaultCodeItemsDetail'); ?>"><span>Fault Code Items Detail</span></a></li>
					<li><a href="<?php echo site_url('/masterData/FaultTypes'); ?>"><span>Fault Types</span></a></li>
            		<li><a href="<?php echo site_url('/masterData/CabinItems'); ?>"><span>Cabin Items</span></a></li> 
            	</ul>
            </li>
        </ul>      
    </div>
  </div>
</nav>

