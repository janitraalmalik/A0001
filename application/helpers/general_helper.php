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

function net14($date){
    $newdate = replaceIsWeekend($date);
    $newdate = strtotime ( '+14 day' , strtotime ( $date ) ) ;
    $newdate = date ( 'd-m-Y' , $newdate );
    if(date('N', strtotime($newdate)) == 6){
        $newdate = strtotime ( '+2 day' , strtotime ( $newdate ) ) ;
    }elseif(date('N', strtotime($newdate)) == 7){
        $newdate = strtotime ( '+1 day' , strtotime ( $newdate ) ) ;
    } //(date('N', strtotime($newdate)) >= 6);
    $newdate = date ( 'd-m-Y' , $newdate );
    return $newdate;
}

function replaceIsWeekend($date){
    $newdate = $date;
    if(date('N', strtotime($newdate)) == 6){
        $newdate = strtotime ( '+2 day' , strtotime ( $newdate ) ) ;
    }elseif(date('N', strtotime($newdate)) == 7){
        $newdate = strtotime ( '+1 day' , strtotime ( $newdate ) ) ;
    }
    $newdate = date ( 'd-m-Y' , $newdate );
    return $newdate; 
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

function options($src, $id, $ref_val, $text_field, $selected=''){
	$options = '';
	foreach ($src->result() as $row) {
		$opt_value	= $row->$id;
		$text_value	= $row->$text_field;
		
		if ($row->$id == $ref_val) {
			$options .= '<option value="'.$opt_value.'" '. $selected .'>'.$text_value.'</option>';
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

function tgl_indo($date){
    $date = date('d-m-Y', strtotime($date));
	return $date;
}

function dateTOSql($date){
    if(!empty($date)){
   	    $date = date('Y-m-d', strtotime($date));
        return $date;
    }else{
        
	  return NULL;
    }
}

function generateCodeVendor($jns_usaha) {
    $CI =& get_instance();
    
    $dt = $CI->db->select('COUNT(vend_kd) as code')
                                ->where('deleted_at =',null)
                                ->where('kd_jns_usaha',$jns_usaha)
                                ->get('p_m_vendor_supplier')->row();
    $code  = $dt->code;
    $codelen  = strlen($dt->code);
    $codeResult = $code + 1;
    
    $nomer = str_repeat("0", 5 - $codelen) . $codeResult;	
	return $nomer;
}

function generateCodePO($jns_usaha) {
    $CI =& get_instance();
    
    $dt = $CI->db->select('COUNT(po_no) as code')
                                ->where('deleted_at =',null)
                                ->where('kd_jns_usaha',$jns_usaha)
                                ->get('p_t_po')->row();
    $code  = $dt->code;
    $codelen  = strlen($dt->code);
    $codeResult = $code + 1;
    
    $nomer = str_repeat("0", 5 - $codelen) . $codeResult;	
	return $nomer;
}

function post($key= '', $clean = false){
	if($key){
		$CI =& get_instance();	
		return $CI->input->post($key);
	}else{
		return $_POST;
	}
}

function selectCat($parent, $level, $paramID='') {
    
    $CI 	=& get_instance();
    
    $result = $CI->db->query("SELECT a.id, a.cat_brg_nama, a.cat_brg_parent, Deriv1.Count FROM p_m_cat_barang a
                                LEFT OUTER JOIN (
                                	SELECT
                                		cat_brg_parent,
                                		COUNT(*) AS Count
                                	FROM
                                		p_m_cat_barang
                                    WHERE deleted_at IS NULL
                                	GROUP BY
                                		cat_brg_parent
                                ) Deriv1 ON a.id = Deriv1.cat_brg_parent
                                 WHERE a.deleted_at IS NULL AND a.cat_brg_parent=" . $parent);
    $selected = '';
    foreach($result->result() as $row){
        
        if($paramID == $row->id){
            $selected = 'selected';
        }
        
        if ($row->Count > 0) {
            echo "<option value='" . $row->id . "' " . $selected . ">" . str_repeat('&nbsp;&nbsp;',$level) . '- ' . $row->cat_brg_nama . "</option>";
            selectCat($row->id, $level + 1, $paramID);
        } elseif ($row->Count == 0) {
            echo "<option value='" . $row->id . "' " . $selected . ">" . str_repeat('&nbsp;&nbsp;',$level) . '- ' . $row->cat_brg_nama . "</option>";
        } else;
    }
     
}

function getNameCategory($param) {
    
    if(empty($param)) { return false; }
    
    $CI 	=& get_instance();
    
    $result = $CI->db->query("SELECT cat_brg_nama FROM p_m_cat_barang WHERE deleted_at IS NULL AND id=" . $param)->row();
    
    return $result->cat_brg_nama;
}

function getNameVendor($param,$jns_usaha) {
    
    if(empty($param)) { return false; }
    
    $CI 	=& get_instance();
    
    $result = $CI->db->query("SELECT vend_name AS nameData FROM p_m_vendor_supplier WHERE deleted_at IS NULL AND kd_jns_usaha = '" . $jns_usaha . "' AND vend_kd=" . $param)->row();
    
    return $result->nameData;
}

function numberFormat($param){
	return number_format($param);
}

function getStatusPO($param, $jns_usaha) {
    
    if(empty($param)) { return false; }
    
    $CI 	=& get_instance();
    
    $result = $CI->db->query("SELECT sts_nama AS nameData FROM p_m_status WHERE deleted_at IS NULL AND kd_jns_usaha = '" . $jns_usaha . "' AND id=" . $param)->row();
    
    return $result->nameData;
}


/* End of file gmf_helper.php */
/* Location: ./application/helpers/gmf_helper.php */