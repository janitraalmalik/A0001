<aside class="main-sidebar">
	<section class="sidebar">
	  <!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu">
			<li class="header">MAIN MENU</li>
			<li class="active treeview">
				<a href="<?php echo site_url('/dashboard'); ?>">
					<i class="fa fa-dashboard"></i> <span>Dashboard</span>
				</a>
			</li>
			<?php 
			$users_group = $this->session->userdata('users')->id_users_group_fk;
			$uri = $this->uri->segment(1);
			
			$query = "
				SELECT m.*, 
					ma.id_menu_akses 
				FROM menu AS m 
				JOIN (SELECT * FROM menu_akses WHERE id_users_group_fk = '{$users_group}') AS ma 
				  ON ma.id_menu_fk = m.id_menu 
				WHERE m.module = '{$uri}'
				ORDER BY m.id_menu 		
			";
			$menu = $this->db->query($query);
			
			foreach($menu->result() as $mn) :
			?>
				<li><a href="<?php echo site_url($mn->uri); ?>"><i class="fa fa-chevron-circle-right "></i><?php echo $mn->nama; ?></a></li>
			<?php endforeach; ?>
		</ul>
	</section>
</aside>