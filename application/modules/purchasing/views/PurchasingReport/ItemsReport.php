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
                      <label for="inputEmail3" class="col-sm-2 control-label">Kategori</label>
                      <div class="col-sm-6">
                            <select class="form-control select2 input-sm" id="kdBarang" name="kdBarang">
                                <option value="0">All</option>
                                <?php $parent = (!empty($inputGet['kdBarang']))? $inputGet['kdBarang'] : ''; echo selectCat(0,1,$parent); ?>
                            </select>
                      </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">&nbsp;</label>
                          <div class="col-sm-6">    
                            <button type="submit" class="btn btn-primary">Cari</button>
                            <a 
                                href="<?php echo base_url($uri) ?>/<?php echo $linkPDF ?>?kdBarang=<?php echo (!empty($inputGet['kdBarang']))? $inputGet['kdBarang'] : '';?>" 
                                class="btn btn-success">
                                Cetak PDF
                            </a>
                            <a 
                                href="<?php echo base_url($uri) ?>/<?php echo $linkExcel ?>?kdBarang=<?php echo (!empty($inputGet['kdBarang']))? $inputGet['kdBarang'] : '';?>"" 
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
				<th width="20%"> Kode </th>
				<th width="56%"> Nama</th>
				<th width="15%"> Kategori</th>
			</tr>
		</thead>
        <tbody>
            <?php if(!empty($contentData)):?>
                <?php $no=1; foreach($contentData as $row): ?>
                    <tr>
                        <td><?php echo $no;?></td>
                        <td><?php echo $row['brg_kd'];?></td>
                        <td><?php echo $row['brg_nama'];?></td>
                        <td><?php echo getNameCategory($row['cat_barang_id']);?></td>
                    </tr>                
                <?php $no++; endforeach; ?>
            <?php endif;?>
        </tbody>
	</table>
</section>
