<?php 
	//error_reporting(0);

	require '../../../vendor/autoload.php';
	session_start();
	//echo "okok";
	use PhpOffice\PhpSpreadsheet\Spreadsheet;
	use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
	use PhpOffice\PhpSpreadsheet\IOFactory;
	$directorio = 'archivoss/';
	$archivo=$_SESSION["archivo"];
	$extension=$_SESSION["extension"];
	$cadealea=$_SESSION["cadealea"];
	$subir_archivo=$_SESSION["subirarchivo"];
	//echo "ok";	
	//leyendo archivo de excel
	$documento=IOFactory::load($archivo);
	//echo $documento->getSheetNames();
	$totalDeHojas = $documento->getSheetNames();

		//echo "okok";
	$indiceHoja=0;

	$hojaActual = $documento->getSheet($indiceHoja);
	//echo "<h3>Hoja: ".$totalDeHojas[$indiceHoja]."</h3>";

	//LEYENDO LAS PARTES QUE COINCIDEN EN TODOS LOS TEMAS
	$compl="";
	$programa = $hojaActual->getCellByColumnAndRow(5, 11);// Programa educativo
	$compl=$programa;
	$planestudios = $hojaActual->getCellByColumnAndRow(17, 11);// plan estudios
	$compl=$compl."!#%&/".$planestudios;
	$nombreasignatura = $hojaActual->getCellByColumnAndRow(5, 12);// nombreasignatura
	$compl=$compl."!#%&/".$nombreasignatura;
	$claveasignatura = $hojaActual->getCellByColumnAndRow(17, 12);// clave asignatura
	$compl=$compl."!#%&/".$claveasignatura;
	$credito = $hojaActual->getCellByColumnAndRow(21, 12);// Créditos
	$compl=$compl."!#%&/".$credito;
	$nomtema = $hojaActual->getCellByColumnAndRow(25, 12);// Número de tema
	$compl=$compl."!#%&/".$nomtema;
	$semestre = $hojaActual->getCellByColumnAndRow(5, 13);// semestre
	$compl=$compl."!#%&/".$semestre;
	$claveg1 = $hojaActual->getCellByColumnAndRow(13, 13);// Clave grupo 1
	$compl=$compl."!#%&/".$claveg1;
	$claveg2 = $hojaActual->getCellByColumnAndRow(15, 13);// Clave grupo 2
	$compl=$compl."!#%&/".$claveg2;
	$claveg3 = $hojaActual->getCellByColumnAndRow(17, 13);// Clave grupo 3
	$compl=$compl."!#%&/".$claveg3;
	$claveg4 = $hojaActual->getCellByColumnAndRow(19, 13);// Clave grupo 4
	$compl=$compl."!#%&/".$claveg4;
	$periodo = $hojaActual->getCellByColumnAndRow(23, 13);// Periodo
	$compl=$compl."!#%&/".$periodo;

	$caracterizacion = $hojaActual->getCellByColumnAndRow(2, 18);// caracterizacion
	$compl=$compl."!#%&/".$caracterizacion;

	$intencion = $hojaActual->getCellByColumnAndRow(2, 21);// intencion
	$compl=$compl."!#%&/".$intencion;

	$previas = $hojaActual->getCellByColumnAndRow(2, 24);// Previas
	$compl=$compl."!#%&/".$previas;

	$especifica = $hojaActual->getCellByColumnAndRow(2, 27);//especifica asignatura
	$compl=$compl."!#%&/".$especifica;
	///
	//$cadea="";
	//for ($i=0; $i < count($totalDeHojas); $i++) { 
	//	$cadea=$cadea.$totalDeHojas[$i];
	//}
	//$compl=$compl."!#%&/";



	echo $compl;
	//unlink($archivo);

	
?>