<?php
if(isset($ui_messages)){
	foreach($ui_messages as $msg){
		$msg_class = 	($msg['severity'] == 'SUCCESS' ? 'success' : 
						($msg['severity'] == 'INFO' ? 'info' : 
						($msg['severity'] == 'WARNING' ? 'warning' : 
						($msg['severity'] == 'ERROR' ? 'danger' : 
						'default'))));
		
					
?>
	<div class="alert alert-<?php echo $msg_class ?> fade in">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-close"></i></button>
		<?php
		if(!empty($msg['title'])){
		?>
		<h4><?php echo $msg['title'] ?></h4>
		<?php
		}
		?>
		
		<p><?php echo $msg['message'] ?></p>
		
		<?php
		if(isset($msg['actions'])){
		?>
		<p>
			<?php 
			foreach($msg['actions'] as $item){
			?>
			<a href="<?php echo $item['action'] ?>" class="btn btn-default"><?php echo $item['label'] ?></a>
			<?php
			}
			?>
		</p>
		<?php
		}
		?>
	</div>
<?php
	}
}
?>
		