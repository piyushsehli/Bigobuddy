<?php
	session_start();
	require_once("config.php");
	$obj = new task;
	

	if(isset($_GET["stateid"]))
	{
		$stateid = $_GET["stateid"];
		$query = "select * from cities where stateid='$stateid'";
		$data = mysqli_query($obj->con,$query);

		header('Content-type: text/xml');
		$dom = new DOMDocument();
		$cities = $dom->createElement('cities');
		$dom->appendChild($cities);

		while($row = mysqli_fetch_assoc($data))
		{
			extract($row);

			$id = $dom->createElement('cityid');
			$idText = $dom->createTextNode($cityid);
			$id->appendChild($idText);
			
			$name = $dom->createElement('cityname');
			$cityText = $dom->createTextNode($cityname);
			$name->appendChild($cityText);

			$city = $dom->createElement('city');
			$city->appendChild($id);
			$city->appendChild($name);
			$cities->appendChild($city);

		}

		$xmlString = $dom->saveXML();
		echo $xmlString;
	}
?>