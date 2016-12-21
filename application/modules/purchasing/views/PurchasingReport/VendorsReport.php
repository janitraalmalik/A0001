<?php 
    $module = $this->uri->segment(1);
    $submodule = $this->uri->segment(2); 
    $uri = $module . '/' . $submodule; 
?>
<style>
    .footReport{   border-top: 2px solid #6b6b6b!important;
        border-bottom: 2px solid #6b6b6b!important;}
</style>
<section class="content-header">
    <form  class="form-horizontal" role="form" action=""  method="get">
        <div class="row">
            <div class="col-md-8">
                <div class="box-body">
                    <div class="form-group">
                      <div class="col-sm-6">    
                        <a 
                            target="_BLANK"
                            href="<?php echo base_url($uri) ?>/<?php echo $linkPDF ?>" 
                            class="btn btn-success">
                            Cetak PDF
                        </a>
                        <a 
                            target="_BLANK"
                            href="<?php echo base_url($uri) ?>/<?php echo $linkExcel ?>" 
                            class="btn btn-success">
                            Export Excel
                        </a>
                      </div>
                    </div>
                </div>
            </div>
        
        </div>
        
    </form>
</section>
<section class="content">
    <h3 class="text-center"><b><?php echo $this->_roleName ?></b></h3>
    <h4 class="text-center"><?php echo $moduleTitle; ?></h4>
	<table id="datatables" class="table table-bordered table-hover">
		<thead>
			<tr class="info">
				<th width="2%">No.</th>
				<th width="10%"> Kode </th>
				<th width="15%"> Nama Perusahaan</th>
				<th width=""> No. Telpn</th>
				<th width=""> PIC</th>
			</tr>
		</thead>
        <tbody>
            <?php if(!empty($contentData)):?>
                <?php $no=1; foreach($contentData as $row): ?>
                    <tr>
                        <td><?php echo $no;?></td>
                        <td><?php echo $row['vend_kd'];?></td>
                        <td><?php echo $row['vend_name'];?></td>
                        <td><?php echo $row['vend_tlp'];?></td>
                        <td><?php echo $row['vend_pic'];?></td>
                    </tr>                
                <?php $no++; endforeach; ?>
            <?php endif;?>
        </tbody>
	</table>
</section>
