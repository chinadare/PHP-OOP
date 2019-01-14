<?php
require_once("core/init.php");
$user = new User();

$database = DB:: getinstance()->query('SELECT COUNT (c_id) FROM tbl_customer');

$database = $row[0];

$page_rows = 10;

$last = ceil($database/$page_rows);

if($last < 1){
	$last = 1;
}

$pagenum = 1;

if(isset($_GET['pn'])){
	$pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);
}

if($pagenum < 1){
	$pagenum = 1;
}elseif($pagenum > $last){
	$pagenum = $last;
}

$limit = 'LIMIT'.($pagenum - 1) * $page_rows .','. $page_rows;

$database = DB:: getinstance()->query('SELECT c_id,full_name FROM tbl_customer ORDER BY c_id DESC $limit');

$textline1 = "tbl_customer (<br> of </br>)";
$textline2 = "Page <b>$pagenum</b> of <b>$last</b>";

$paginationCtrls = '';

if($last != 1){
	if($pagenum > 1){
		$previous = $pagenum - 1;

		$paginationCtrls = '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$previous.'">previous</a> &nbsp;&nbsp;';
		for($i = $pagenum-4; $i < $pagenum; $i++){
			if($i > 0){
			$paginationCtrls = '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'">'.$i.'</a> &nbsp;&nbsp;';
			}
		} 
	}
	$paginationCtrls .= ''.$pagenum.'&nbsp;';

	for($i = $pagenum+1; $i < $last; $i++){
			

			$paginationCtrls = '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'">'.$i.'</a> &nbsp;&nbsp;';
			if($i >= $pagenum+4){
				break;
			}
		} 
	if($pagenum != $last){
		$next = $pagenum + 1;

		$paginationCtrls = '&nbsp;&nbsp; <a href="'.$_SERVER['PHP_SELF'].'?pn='.$next.'">next</a> ';
		
	}


}

$list = '';
foreach($database->results() as $database){
	$database->c_id; 
	$database->full_name; 
	$database->full_name;
	$database->full_name;

	$list .= '<p><a href="testimonial.php?id='.$c_id.'">'.$full_name.' '.$full_name.' Testimonial</a> - Click the link to view this testimonial<br>Written '.$full_name.'</p>';


}


?>