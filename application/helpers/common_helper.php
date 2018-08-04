<?php 
function public_url($url=''){
	return base_url('public/'.$url);
}

function pre($list){
	echo "<pre>";
	print_r($list);
 }

 function show_date($value='')
 {
 	echo date("d-m-Y", strtotime($value));
 }

 ?>
