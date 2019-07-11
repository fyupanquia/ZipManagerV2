<?php
require_once("ZipManager.php");

$zip = new ZipManager();
var_dump( $zip->toList("test.zip") );
var_dump( $zip->descompress("test.zip") );