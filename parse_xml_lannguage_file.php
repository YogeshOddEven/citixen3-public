<?php
libxml_use_internal_errors(TRUE);
 if(isset($_REQUEST['language']) && $_REQUEST['language']!="en")
 {
    $file_name="Spanish.xml";
 }else
 {
    $file_name="English.xml";
 }
$objXmlDocument = simplexml_load_file($file_name);
 
if ($objXmlDocument === FALSE) {
    echo "There were errors parsing the XML file.\n";
    foreach(libxml_get_errors() as $error) {
        echo $error->message;
    }
    exit;
}
 
$objJsonDocument = json_encode($objXmlDocument);
$arrOutput = json_decode($objJsonDocument, TRUE);
 
// echo "<pre>";
print_r($arrOutput);
?>