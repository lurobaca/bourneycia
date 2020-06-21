<?php

if($_GET['mi_pdf']=='Solicitud')
{	$len = filesize('Pdf/Solicitud.pdf');
	header('Content-type: application/pdf');
	header('Content-Disposition: attachment; filename="Pdf/Solicitud.pdf');
	header('Content-Length: '.$len);
	readfile('Pdf/Solicitud.pdf');
}
else
{

	$len = filesize('Pdf/revista.pdf');
	header('Content-type: application/pdf');
	header('Content-Disposition: attachment; filename="Pdf/revista.pdf');
	header('Content-Length: '.$len);
	readfile('Pdf/revista.pdf');
}
?>