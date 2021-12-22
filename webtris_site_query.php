<?php
	//pull json site data
	$content=file_get_contents("http://webtris.highwaysengland.co.uk/api/v1.0/sites");
	$data=json_decode($content, true);
	$num = $data['row_count'];
	
	//explode multi-dimentional arrays
	for ($i = 0; $i < $num; $i++) {
		$id[$i] = $data['sites'][$i]['Id'];
		$name[$i] = $data['sites'][$i]['Name'];
		
		list($name[$i],$gpsE[$i],$gpsN[$i],$direction[$i]) = explode(";", $name[$i]);		

		$description[$i] = $data['sites'][$i]['Description'];
		$road[$i] = substr($description[$i], 0, strpos($description[$i],"/"));
		$mkrno[$i] = substr($description[$i], strpos($description[$i],"/")+1, 4);
		$cway[$i] = substr($description[$i], strpos($description[$i],"/")+5, 1);
		$longitude[$i] = $data['sites'][$i]['Longitude'];
		$latitude[$i] = $data['sites'][$i]['Latitude'];
		$status[$i] = $data['sites'][$i]['Status'];
	} 
?>
