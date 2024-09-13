<?php

$accepted_origins = array("http://localhost:8080", "https://www.codeworld.com");


$imageFolder =  (dirname(__FILE__)) . '/uploads/';

if (isset($_SERVER['HTTP_ORIGIN'])) {
	if (in_array($_SERVER['HTTP_ORIGIN'], $accepted_origins)) {
		header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
	} else {
		header("HTTP/1.1 403 Origin Denied");
		return;
	}
}

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
	header("Access-Control-Allow-Methods: POST, OPTIONS");
	return;
}

reset($_FILES);
$temp = current($_FILES);

if (is_uploaded_file($temp['tmp_name'])) {
	if (preg_match("/([^\w\s\d\-_~,;:\[\]\(\).])|([\.]{2,})/", $temp['name'])) {
		header("HTTP/1.1 400 Invalid file name.");
		return;
	}

	if (!in_array(strtolower(pathinfo($temp['name'], PATHINFO_EXTENSION)), array("gif", "jpg", "jpeg", "png"))) {
		header("HTTP/1.1 400 Invalid extension");
		return;
	}

	$filetowrite = $imageFolder . $temp['name'];
	$application_position = strpos($filetowrite, 'application');
	$relative_path = substr($filetowrite, $application_position);

	if (move_uploaded_file($temp['tmp_name'], $filetowrite)) {
		$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' ? "https://" : "http://";
		$baseurl = $protocol . $_SERVER["HTTP_HOST"] . rtrim(dirname($_SERVER['REQUEST_URI']), "/") . "/";

		echo json_encode(array('location' => '/' . $relative_path));
	} else {
		header("HTTP/1.1 400 upload failed");
		return;
	}
} else {
	header("HTTP/1.1 500 Server Error");
}
