<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function angka($number){
	if ($number == '') $number = 0;
	return number_format($number, 0, ',', '.');
}

function my_number_format($number){
	if ($number == '') $number = 0;
	return number_format($number, 0, ',', '.');
}

function my_number_format_comma($number){
	if ($number == '') $number = 0;
	return number_format($number, 2, '.', ',');
}

function my_number_format_dot($number){
	if ($number == '') $number = 0;
	return number_format($number, 2, ',', '.');
}

function excel_header($filename){
	header("Content-type: application/octet-stream");
	header("Content-Disposition: attachment; filename=$filename");
	header("Pragma: no-cache");
	header("Expires: 0");
}

function form_data($names){
	$CI =& get_instance();

	foreach ($names as $name) {
		$prefix = substr($name, 0, 3);
	
		if ($prefix == 'num') {
			$name = substr($name, 4);
			$data[$name] = str_replace('.', '', $CI->input->post($name));
		}
		else {
			$data[$name] = $CI->input->post($name);
		}
	}
	
	return $data;
}

function newline(){
	echo "<br />";
}

function seo_title($s){
	$c = array (' ');
	$d = array ('-','/','\\',',','.','#',':',';','\'','"','[',']','{','}',')','(','|','`','~','!','@','%','$','^','&','*','=','?','+');

	$s = str_replace($d, '', $s); // Hilangkan karakter yang telah disebutkan di array $d

	$s = strtolower(str_replace($c, '-', $s)); // Ganti spasi dengan tanda - dan ubah hurufnya menjadi kecil semua
	return $s;
}

function options($src, $id, $ref_val, $text_field){
	$options = '';
	foreach ($src->result() as $row) {
		$opt_value	= $row->$id;
		$text_value	= $row->$text_field;
		
		if ($row->$id == $ref_val) {
			$options .= '<option value="'.$opt_value.'" selected>'.$text_value.'</option>';
		}
		else {
			$options .= '<option value="'.$opt_value.'">'.$text_value.'</option>';
		}
	}
	return $options;
}

function password($raw_password) {
	return MD5('*123#'.$raw_password);
}

function result_to_arr($datasrc, $field) {
	$return_arr = array();
	foreach ($datasrc->result() as $row) {
		$return_arr[] = $row->$field;
	}
	return $return_arr;
}

function strip_comma($text) {
	return str_replace(',', '', $text);
}

function strip_dot($text) {
	return str_replace('.', '', $text);
}

function nama_format($text) {
    $nama = explode(' ',$text);
    if(!isset($nama[1])){
        return $nama[0];
    }else{
        return $nama[0].' '.$nama[1];
    }	
}

function tab(){
	echo "\t";
}

function terbilang($n) {
	$dasar = array(1 => 'Satu', 'Dua', 'Tiga', 'Empat', 'Lima', 'Enam','Tujuh', 'Delapan', 'Sembilan');
	$angka = array(1000000000, 1000000, 1000, 100, 10, 1);
	$satuan = array('Milyar', 'Juta', 'Ribu', 'Ratus', 'Puluh', '');
	$str = '';
	$i = 0;

	if ($n == 0) {
		$str = 'Nol';
	}
	else {
		while ($n != 0) {
			$count = (int)($n / $angka[$i]);
			if ($count >= 10) {
				$str .= terbilang($count).' '.$satuan[$i].' ';
			}
			else if ($count > 0 AND $count < 10) {
				$str .= $dasar[$count].' '.$satuan[$i].' ';
			}
			$n -= $angka[$i] * $count;
			$i++;
		}
		$str = preg_replace("/Satu Puluh (\w+)/i", "\\1 belas", $str);
		$str = preg_replace("/Satu (Ribu|Ratus|Puluh|belas)/i", "se\\1", $str);
	}
	return $str;
}

function tgl_indo($tgl){
	$tanggal = substr($tgl,8,2);
	$bulan = getBulan(substr($tgl,5,2));
	$tahun = substr($tgl,0,4);

	return $tanggal.' '.$bulan.' '.$tahun;		 
}	

function getBulan($bln){
	switch ($bln){
		case 1: return "Januari"; break;
		case 2:	return "Februari"; break;
		case 3:	return "Maret";	break;
		case 4:	return "April";	break;
		case 5:	return "Mei"; break;
		case 6:	return "Juni"; break;
		case 7:	return "Juli"; break;
		case 8:	return "Agustus"; break;
		case 9:	return "September";	break;
		case 10: return "Oktober"; break;
		case 11: return "November";	break;
		case 12: return "Desember";	break;
	}
}

function tgl_str($date){
	$exp = explode('-',$date);
	if(count($exp) == 3) {
		$date = $exp[2].'-'.$exp[1].'-'.$exp[0];
	}
	return $date;
}

function tgl_sql($date){
	$exp = explode('-',$date);
	if(count($exp) == 3) {
		$date = $exp[2].'-'.$exp[1].'-'.$exp[0];
	}
	return $date;
}

function tgl_sql_export($date){
    if(!empty($date)){
    	$exp = explode('/',$date);
    	if(count($exp) == 3) {
    		$date = $exp[2].'-'.$exp[1].'-'.$exp[0];
            $date = date('Y-m-d', strtotime($date));
    	}
	  return $date;
    }else{
        
	  return NULL;
    }
}

function generate_code(){
	$CI 	=& get_instance();
	
	$query = "
		SELECT 
		MAX(company_code) AS kode 
		FROM company
	";
	$row = $CI->db->query($query)->row_array();
	$id = $row['kode'];
	$max_id = substr($id, 1,3);
	$plus = $max_id+1;
	if($plus<10){
		$kode = "C00".$plus;
	}
	else{
		$kode = "C0".$plus;
	}	
	
	return $kode;
}

function generate_code_max($company_fk){
	$CI 	=& get_instance();
	
	$query = "
		SELECT 
		MAX(employee_code) AS kode 
		FROM transaction.employee_organization
		WHERE company_fk = '{$company_fk}'
	";
	
	$row = $CI->db->query($query)->row_array();
	$id = $row['kode'];
	$max_id = substr($id, 4,4);
	$plus = $max_id+1;
	if($plus<10){
		$kode = $company_fk."000".$plus;
	}
	else if($plus<99){
		$kode = $company_fk."00".$plus;
	}	
	else if($plus<999){
		$kode = $company_fk."0".$plus;
	}	
	else if($plus<9999){
		$kode = $company_fk.$plus;
	}
	
	return $kode;
}

function generate_code_date(){
	$CI 	=& get_instance();			
	$reg 	= "";
	
	$CI->db->select('employee_number');
	$CI->db->from('employee');
	$CI->db->order_by('employee_number', 'desc');
	$CI->db->limit(1);
	$query = $CI->db->get();
	
	if ($query->num_rows()>0) {
		$rows = $query->row();
		$row_id = $rows->employee_number;
		$id_row = substr($row_id,8);
		$reg = $id_row+1;
		
		if (strlen($reg)==1){$reg='000'.$reg;} 
		elseif(strlen($reg)==2){$reg='00'.$reg;}
		elseif(strlen($reg)==3){$reg='0'.$reg;}
		else {$reg=$reg;}
		
		$reg=date("y").date("m").date("d").$reg;
	} 
	else{
		$reg=date("y").date("m").date("d").'0001';
	}
	return $reg;
}

/* End of file gmf_helper.php */
/* Location: ./application/helpers/gmf_helper.php */