<?PHP /*
header("Content-type: application/vnd.ms-excel"); 
header("Content-Disposition: attachment; filename=P005.xls" ); 
header("Expires: 0"); 
header("Cache-Control: must-revalidate, post-check=0,pre-check=0"); 
header("Pragma: public");

*/
//$_post["Proveedor"]

$var  = $_GET["Cod_Proveedor"];


$len = filesize('Cubos/' . $var. '.xls');
header('Content-type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename=Cubos/'.$var.'.xls');
header('Content-Length: '.$len);
readfile('Cubos/' . $var . '.xls');
?>
