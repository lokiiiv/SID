<?php
// Cargamos la librería dompdf que hemos instalado en la carpeta dompdf
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;

$grupo = $_GET['grupo'];
echo $grupo;
$html= //file_get_contents_curl("http://localhost/webs/proyectoIns/V2/proyecto/theme/generarInstrumentacion.php");
'<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
	<title></title>
	<meta name="generator" content="LibreOffice 6.2.8.2 (Linux)"/>
	<meta name="author" content="PC-15"/>
	<meta name="created" content="2009-03-11T16:24:58"/>
	<meta name="changed" content="2020-01-12T23:26:08.063357211"/>
	<meta name="AppVersion" content="15.0300"/>
	<meta name="DocSecurity" content="0"/>
	<meta name="HyperlinksChanged" content="false"/>
	<meta name="LinksUpToDate" content="false"/>
	<meta name="ScaleCrop" content="false"/>
	<meta name="ShareDoc" content="false"/>
	<meta name="WorkbookGuid" content="f12d54b6-09a8-44f6-a7f3-f390cfee3c8d"/>
	
	<style type="text/css">
		body,div,table,thead,tbody,tfoot,tr,th,td,p { font-family: arial; font-size:14px; }
		a.comment-indicator:hover + comment { background:#ffd; position:absolute; display:block; border:1px solid black; padding:0.5em;  } 
		a.comment-indicator { background:red; display:inline-block; border:1px solid black; width:0.5em; height:0.5em;  } 
		comment { display:none;  } 
	</style>
	
</head>

<body>



<table align="center" cellspacing="0" border="0" style="width: 90%;">
	<colgroup width="11"></colgroup>
	<colgroup span="5" width="56"></colgroup>
	<colgroup width="120"></colgroup>
	<colgroup span="20" width="56"></colgroup>
	<tr>
		<td style="border-top: 1px solid #000000; border-left: 1px solid #000000" height="8" align="left" valign=middle><br></td>
		<td style="border-top: 1px solid #000000" align="left" valign=middle><br></td>
		<td style="border-top: 1px solid #000000" align="left" valign=middle><br></td>
		<td style="border-top: 1px solid #000000" align="left" valign=middle><br></td>
		<td style="border-top: 1px solid #000000" align="left" valign=middle><font face="Arial Narrow"><br></font></td>
		<td style="border-top: 1px solid #000000" align="left" valign=middle><br></td>
		<td style="border-top: 1px solid #000000" align="left" valign=middle><br></td>
		<td style="border-top: 1px solid #000000" align="left" valign=middle><br></td>
		<td style="border-top: 1px solid #000000" align="left" valign=middle><br></td>
		<td style="border-top: 1px solid #000000" align="left" valign=middle><font face="Arial Narrow"><br></font></td>
		<td style="border-top: 1px solid #000000" align="left" valign=middle><br></td>
		<td style="border-top: 1px solid #000000" align="left" valign=middle><br></td>
		<td style="border-top: 1px solid #000000" align="left" valign=middle><br></td>
		<td style="border-top: 1px solid #000000" align="left" valign=middle><br></td>
		<td style="border-top: 1px solid #000000" align="left" valign=middle><br></td>
		<td style="border-top: 1px solid #000000" align="left" valign=middle><br></td>
		<td style="border-top: 1px solid #000000" align="left" valign=middle><br></td>
		<td style="border-top: 1px solid #000000" align="left" valign=middle><br></td>
		<td style="border-top: 1px solid #000000" align="left" valign=middle><br></td>
		<td style="border-top: 1px solid #000000" align="left" valign=middle><br></td>
		<td style="border-top: 1px solid #000000" align="left" valign=middle><br></td>
		<td style="border-top: 1px solid #000000" align="left" valign=middle><br></td>
		<td style="border-top: 1px solid #000000" align="left" valign=middle><br></td>
		<td style="border-top: 1px solid #000000" align="left" valign=middle><br></td>
		<td style="border-top: 1px solid #000000" align="left" valign=middle><br></td>
		<td style="border-top: 1px solid #000000" align="left" valign=middle><br></td>
		<td style="border-top: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle><br></td>
	</tr>
	<tr>
		<td style="border-left: 1px solid #000000" height="18" align="left" valign=middle><br></td>
		<td align="left" valign=middle><br></td>
		<td align="left" valign=middle><br><img src="../../images/itesa.png" width=175 height=76></td>
		<td align="left" valign=middle><br></td>
		<td colspan=22 align="right" valign=middle>Instituto Tecnológico Superior del Oriente del Estado de Hidalgo</td>
		<td style="border-right: 1px solid #000000" align="left" valign=middle><br></td>
	</tr>
	<tr>
		<td style="border-left: 1px solid #000000" height="19" align="left" valign=middle><br></td>
		<td align="left" valign=middle><br></td>
		<td align="left" valign=middle><br></td>
		<td align="left" valign=middle><br></td>
		<td align="left" valign=middle><br></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td colspan=14 align="right" valign=middle bgcolor="#C6D9F1"><b>SISTEMA DE GESTIÓN DE LA CALIDAD</b></td>
		<td style="border-right: 1px solid #000000" align="left" valign=middle><br></td>
	</tr>
	<tr>
		<td style="border-left: 1px solid #000000" height="23" align="left" valign=middle><br></td>
		<td align="left" valign=middle><br></td>
		<td align="left" valign=middle><br></td>
		<td align="left" valign=middle><br></td>
		<td align="left" valign=middle><br></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td colspan=14 align="right" valign=middle><b>Instrumentación Didáctica</b></td>
		<td style="border-right: 1px solid #000000" align="left" valign=middle><br></td>
	</tr>
	<tr>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000" height="5" align="left" valign=middle><br></td>
		<td style="border-bottom: 1px solid #000000" align="left" valign=middle><br></td>
		<td style="border-bottom: 1px solid #000000" align="left" valign=middle><br></td>
		<td style="border-bottom: 1px solid #000000" align="left" valign=middle><br></td>
		<td style="border-bottom: 1px solid #000000" align="left" valign=middle><font face="Arial Narrow"><br></font></td>
		<td style="border-bottom: 1px solid #000000" align="left" valign=middle><br></td>
		<td style="border-bottom: 1px solid #000000" align="left" valign=middle><br></td>
		<td style="border-bottom: 1px solid #000000" align="left" valign=middle><br></td>
		<td style="border-bottom: 1px solid #000000" align="left" valign=middle><br></td>
		<td style="border-bottom: 1px solid #000000" align="left" valign=middle><font face="Arial Narrow"><br></font></td>
		<td style="border-bottom: 1px solid #000000" align="left" valign=middle><br></td>
		<td style="border-bottom: 1px solid #000000" align="left" valign=middle><br></td>
		<td style="border-bottom: 1px solid #000000" align="left" valign=middle><br></td>
		<td style="border-bottom: 1px solid #000000" align="left" valign=middle><br></td>
		<td style="border-bottom: 1px solid #000000" align="left" valign=middle><br></td>
		<td style="border-bottom: 1px solid #000000" align="left" valign=middle><br></td>
		<td style="border-bottom: 1px solid #000000" align="left" valign=middle><br></td>
		<td style="border-bottom: 1px solid #000000" align="left" valign=middle><br></td>
		<td style="border-bottom: 1px solid #000000" align="left" valign=middle><br></td>
		<td style="border-bottom: 1px solid #000000" align="left" valign=middle><br></td>
		<td style="border-bottom: 1px solid #000000" align="left" valign=middle><br></td>
		<td style="border-bottom: 1px solid #000000" align="left" valign=middle><br></td>
		<td style="border-bottom: 1px solid #000000" align="left" valign=middle><br></td>
		<td style="border-bottom: 1px solid #000000" align="left" valign=middle><br></td>
		<td style="border-bottom: 1px solid #000000" align="left" valign=middle><br></td>
		<td style="border-bottom: 1px solid #000000" align="left" valign=middle><br></td>
		<td style="border-bottom: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle><br></td>
	</tr>
	<tr>
		<td height="6" align="left" valign=middle><br></td>
		<td align="left" valign=middle><br></td>
		<td align="left" valign=middle><br></td>
		<td align="left" valign=middle><br></td>
		<td align="left" valign=middle><font face="Arial Narrow"><br></font></td>
		<td align="left" valign=middle><br></td>
		<td align="left" valign=middle><br></td>
		<td align="left" valign=middle><br></td>
		<td align="left" valign=middle><br></td>
		<td align="left" valign=middle><font face="Arial Narrow"><br></font></td>
		<td align="left" valign=middle><br></td>
		<td align="left" valign=middle><br></td>
		<td align="left" valign=middle><br></td>
		<td align="left" valign=middle><br></td>
		<td align="left" valign=middle><br></td>
		<td align="left" valign=middle><br></td>
		<td align="left" valign=middle><br></td>
		<td align="left" valign=middle><br></td>
		<td align="left" valign=middle><br></td>
		<td align="left" valign=middle><br></td>
		<td align="left" valign=middle><br></td>
		<td align="left" valign=middle><br></td>
		<td align="left" valign=middle><br></td>
		<td align="left" valign=middle><br></td>
		<td align="left" valign=middle><br></td>
		<td align="left" valign=middle><br></td>
		<td align="left" valign=middle><br></td>
	</tr>
	<tr>
		<td height="19" align="left" valign=middle><br></td>
		<td colspan=3 align="center" valign=middle bgcolor="#C6D9F1"><b><font size=1>DOCUMENTO</font></b></td>
		<td style="border-bottom: 1px solid #1f497d" colspan=6 align="center" valign=middle><b><font face="Arial Narrow">-?<br></font></b></td>
		<td colspan=5 align="center" valign=middle bgcolor="#C6D9F1"><b><font size=1>CLÁUSULA ISO 9001 2008</font></b></td>
		<td style="border-bottom: 1px solid #1f497d" colspan=4 align="center" valign=middle><b><font face="Arial Narrow">-?<br></font></b></td>
		<td colspan=4 align="center" valign=middle bgcolor="#C6D9F1"><b><font size=1>REVISIÓN</font></b></td>
		<td style="border-bottom: 1px solid #000000" align="center" valign=middle><b><font face="Arial Narrow">-?<br></font></b></td>
		<td style="border-bottom: 1px solid #000000" align="center" valign=middle><b><font face="Arial Narrow"><br></font></b></td>
		<td style="border-bottom: 1px solid #000000" align="center" valign=middle><b><font face="Arial Narrow"><br></font></b></td>
		<td align="left" valign=middle><font face="Arial Narrow"><br></font></td>
	</tr>
	<tr>
		<td height="5" align="left" valign=middle><br></td>
		<td align="left" valign=middle><b><font size=1><br></font></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><br></td>
		<td align="left" valign=middle><font face="Arial Narrow"><br></font></td>
		<td align="left" valign=middle><br></td>
		<td align="left" valign=middle><br></td>
		<td align="left" valign=middle><br></td>
		<td align="left" valign=middle><br></td>
		<td align="left" valign=middle><br></td>
		<td align="left" valign=middle><b><font size=1><br></font></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><br></td>
		<td align="left" valign=middle><br></td>
		<td align="left" valign=middle><br></td>
		<td align="left" valign=middle><b><font face="Arial Narrow"><br></font></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><br></td>
		<td align="left" valign=middle><br></td>
		<td align="left" valign=middle><br></td>
		<td align="left" valign=middle><br></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="left" valign=middle><br></td>
	</tr>
	<tr>
		<td height="19" align="left" valign=middle><br></td>
		<td colspan=3 align="center" valign=middle bgcolor="#C6D9F1"><b><font size=1>RESPONSABLE</font></b></td>
		<td style="border-bottom: 1px solid #1f497d" align="center" valign=middle><b><font face="Arial Narrow">-?<br></font></b></td>
		<td style="border-bottom: 1px solid #1f497d" align="center" valign=middle><b><font face="Arial Narrow"><br></font></b></td>
		<td style="border-bottom: 1px solid #1f497d" align="center" valign=middle><b><font face="Arial Narrow"><br></font></b></td>
		<td style="border-bottom: 1px solid #1f497d" align="center" valign=middle><b><font face="Arial Narrow"><br></font></b></td>
		<td style="border-bottom: 1px solid #1f497d" align="center" valign=middle><b><font face="Arial Narrow"><br></font></b></td>
		<td style="border-bottom: 1px solid #1f497d" align="center" valign=middle><b><font face="Arial Narrow"><br></font></b></td>
		<td colspan=5 align="center" valign=middle bgcolor="#C6D9F1"><b><font size=1>FECHA DE EMISIÓN</font></b></td>
		<td style="border-bottom: 1px solid #1f497d" colspan=4 align="center" valign=middle sdnum="2058;0;@"><b><font face="Arial Narrow">-?<br></font></b></td>
		<td colspan=4 align="center" valign=middle bgcolor="#C6D9F1"><b><font size=1>CÓDIGO DEL DOCUMENTO</font></b></td>
		<td style="border-bottom: 1px solid #000000" colspan=3 align="center" valign=middle><b><font face="Arial Narrow">-?<br></font></b></td>
		<td align="left" valign=middle><font face="Arial Narrow"><br></font></td>
	</tr>
	<tr>
		<td height="8" align="left" valign=middle><br></td>
		<td align="left" valign=middle><b><font size=1><br></font></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><br></td>
		<td align="left" valign=middle><font face="Arial Narrow"><br></font></td>
		<td align="left" valign=middle><br></td>
		<td align="left" valign=middle><br></td>
		<td align="left" valign=middle><br></td>
		<td align="left" valign=middle><br></td>
		<td align="left" valign=middle><br></td>
		<td align="left" valign=middle><br></td>
		<td align="left" valign=middle><b><font size=1><br></font></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><br></td>
		<td align="left" valign=middle><br></td>
		<td align="left" valign=middle><br></td>
		<td align="left" valign=middle><font face="Arial Narrow"><br></font></td>
		<td align="left" valign=middle><br></td>
		<td align="left" valign=middle><br></td>
		<td align="left" valign=middle><br></td>
		<td align="left" valign=middle><br></td>
		<td align="left" valign=middle><br></td>
		<td align="left" valign=middle><br></td>
		<td align="left" valign=middle><br></td>
		<td align="left" valign=middle><br></td>
		<td align="left" valign=middle><br></td>
		<td align="left" valign=middle><br></td>
	</tr>
	<tr>
		<td height="36" align="left" valign=middle><br></td>
		<td style="border-top: 3px solid #ffffff; border-bottom: 3px solid #ffffff; border-left: 3px solid #ffffff; border-right: 3px solid #ffffff" colspan=3 align="center" valign=middle bgcolor="#C6D9F1"><b>Programa Educativo:</b></td>
		<td style="border-top: 3px solid #ffffff; border-bottom: 3px solid #ffffff; border-left: 3px solid #ffffff" colspan=9 align="center" valign=middle bgcolor="#F1F5F9"><i>-?<br></i></td>
		<td style="border-top: 3px solid #ffffff; border-bottom: 3px solid #ffffff" colspan=3 align="center" valign=middle bgcolor="#C6D9F1"><b>Plan de estudios:</b></td>
		<td style="border-right: 2px solid #ffffff" colspan=10 align="center" valign=middle bgcolor="#F1F5F9"><i>-?<br></i></td>
		<td align="left" valign=middle><br></td>
	</tr>
	<tr>
		<td height="36" align="center" valign=middle><b><br></b></td>
		<td style="border-top: 3px solid #ffffff; border-bottom: 3px solid #ffffff; border-left: 3px solid #ffffff; border-right: 3px solid #ffffff" colspan=3 align="center" valign=middle bgcolor="#C6D9F1"><b>Nombre de la asignatura:</b></td>
		<td style="border-top: 3px solid #ffffff; border-bottom: 3px solid #ffffff; border-left: 3px solid #ffffff" colspan=10 align="center" valign=middle bgcolor="#F1F5F9"><i>-?<br></i></td>
		<td style="border-top: 3px solid #ffffff; border-bottom: 3px solid #ffffff" colspan=2 align="center" valign=middle bgcolor="#C6D9F1"><b>Clave de la asignatura:</b></td>
		<td style="border-top: 3px solid #ffffff; border-bottom: 3px solid #ffffff" colspan=2 align="center" valign=middle bgcolor="#F1F5F9"><i>-?<br></i></td>
		<td style="border-top: 3px solid #ffffff; border-bottom: 3px solid #ffffff" colspan=2 align="center" valign=middle bgcolor="#C6D9F1"><b>Créditos:</b></td>
		<td style="border-top: 3px solid #ffffff; border-bottom: 3px solid #ffffff; border-right: 3px solid #ffffff" colspan=2 align="center" valign=middle bgcolor="#F1F5F9" sdnum="2058;0;@">-?<br></td>
		<td style="border-top: 3px solid #ffffff; border-bottom: 3px solid #ffffff; border-left: 3px solid #ffffff" colspan=2 align="center" valign=middle bgcolor="#C6D9F1"><b>Número de Tema:</b></td>
		<td style="border-top: 3px solid #ffffff; border-bottom: 3px solid #ffffff; border-left: 3px solid #ffffff; border-right: 3px solid #ffffff" colspan=2 align="center" valign=middle bgcolor="#F1F5F9" sdnum="2058;0;0"><i><br></i></td>
		<td align="left" valign=bottom><b><br></b></td>
	</tr>
	<tr>
		<td height="36" align="center" valign=middle><b><br></b></td>
		<td style="border-top: 3px solid #ffffff; border-bottom: 3px solid #ffffff; border-left: 3px solid #ffffff; border-right: 3px solid #ffffff" colspan=3 align="center" valign=middle bgcolor="#C6D9F1"><b>Semestre:</b></td>
		<td style="border-top: 3px solid #ffffff; border-bottom: 3px solid #ffffff; border-left: 3px solid #ffffff" colspan=5 align="center" valign=middle bgcolor="#F1F5F9"><i>-?<br></i></td>
		<td style="border-top: 3px solid #ffffff; border-bottom: 3px solid #ffffff; border-left: 3px solid #ffffff; border-right: 3px solid #ffffff" colspan=3 align="center" valign=middle bgcolor="#C6D9F1"><b>Clave de grupo:</b></td>
		<td style="border-top: 3px solid #ffffff; border-bottom: 3px solid #ffffff" colspan=2 align="center" valign=middle bgcolor="#F1F5F9"><i><font size=3>-?<br></font></i></td>
		<td style="border-top: 3px solid #ffffff; border-bottom: 3px solid #ffffff; border-left: 3px solid #ffffff; border-right: 3px solid #ffffff" colspan=2 align="center" valign=middle bgcolor="#F1F5F9"><i><font size=3><br></font></i></td>
		<td style="border-top: 3px solid #ffffff; border-bottom: 3px solid #ffffff; border-left: 3px solid #ffffff; border-right: 3px solid #ffffff" colspan=2 align="center" valign=middle bgcolor="#F1F5F9"><i><font size=3><br></font></i></td>
		<td style="border-top: 3px solid #ffffff; border-bottom: 3px solid #ffffff; border-left: 3px solid #ffffff; border-right: 3px solid #ffffff" colspan=2 align="center" valign=middle bgcolor="#F1F5F9"><i><font size=3><br></font></i></td>
		<td style="border-top: 3px solid #ffffff; border-bottom: 3px solid #ffffff; border-left: 3px solid #ffffff; border-right: 3px solid #ffffff" colspan=2 align="center" valign=middle bgcolor="#C6D9F1"><b>Periodo:</b></td>
		<td style="border-top: 3px solid #ffffff; border-bottom: 3px solid #ffffff; border-left: 3px solid #ffffff; border-right: 3px solid #ffffff" colspan=4 align="center" valign=middle bgcolor="#F1F5F9"><i>-?<br></i></td>
		<td align="left" valign=bottom><b><br></b></td>
	</tr>
	<tr>
		<td height="36" align="center" valign=middle><b><br></b></td>
		<td style="border-top: 3px solid #ffffff; border-bottom: 3px solid #ffffff; border-left: 3px solid #ffffff; border-right: 3px solid #ffffff" colspan=3 align="center" valign=middle bgcolor="#C6D9F1"><b>Nombre del docente:</b></td>
		<td style="border-top: 3px solid #ffffff; border-bottom: 3px solid #ffffff; border-left: 3px solid #ffffff" colspan=22 align="center" valign=middle bgcolor="#F1F5F9"><i><br></i></td>
		<td align="left" valign=middle><b><br></b></td>
	</tr>
	<tr>
		<td height="34" align="center" valign=middle><b><br></b></td>
		<td style="border-top: 3px solid #ffffff; border-bottom: 3px solid #ffffff; border-left: 3px solid #ffffff; border-right: 3px solid #ffffff" colspan=25 align="center" valign=middle bgcolor="#C6D9F1"><b><font size=4>Instrumentación Didáctica</font></b></td>
		<td align="left" valign=middle><b><br></b></td>
	</tr>
	<tr>
		<td height="8" align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
	</tr>
	<tr>
		<td height="34" align="left" valign=middle><b><br></b></td>
		<td style="border-top: 3px solid #ffffff; border-left: 3px solid #ffffff; border-right: 3px solid #ffffff" colspan=25 align="left" valign=middle bgcolor="#C6D9F1"><b>1.- Caracterización de la asignatura</b></td>
		<td align="left" valign=middle><b><br></b></td>
	</tr>
	<tr>
		<td height="100" align="left" valign=middle><b><br></b></td>
		<td style="border-top: 1px solid #254061; border-bottom: 1px solid #254061; border-left: 1px solid #254061; border-right: 1px solid #254061" colspan=25 align="left" valign=top sdnum="2058;0;@">-?<br><br><br></td>
		<td align="left" valign=middle><b><br></b></td>
	</tr>
	<tr>
		<td height="6" align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
	</tr>
	<tr>
		<td height="34" align="left" valign=middle><b><br></b></td>
		<td style="border-top: 3px solid #ffffff; border-left: 3px solid #ffffff; border-right: 3px solid #ffffff" colspan=25 align="left" valign=middle bgcolor="#C6D9F1"><b>2.- Intención didáctica</b></td>
		<td align="left" valign=middle><b><br></b></td>
	</tr>
	<tr>
		<td height="100" align="left" valign=middle><b><br></b></td>
		<td style="border-top: 1px solid #254061; border-bottom: 1px solid #254061; border-left: 1px solid #254061; border-right: 1px solid #254061" colspan=25 align="left" valign=top sdnum="2058;0;@">-?<br><br><br></td>
		<td align="left" valign=middle><b><br></b></td>
	</tr>
	<tr>
		<td height="7" align="left" valign=middle><b><br></b></td>
		<td align="justify" valign=middle sdnum="2058;0;@"><br></td>
		<td align="justify" valign=middle sdnum="2058;0;@"><br></td>
		<td align="justify" valign=middle sdnum="2058;0;@"><br></td>
		<td align="justify" valign=middle sdnum="2058;0;@"><br></td>
		<td align="justify" valign=middle sdnum="2058;0;@"><br></td>
		<td align="justify" valign=middle sdnum="2058;0;@"><br></td>
		<td align="justify" valign=middle sdnum="2058;0;@"><br></td>
		<td align="justify" valign=middle sdnum="2058;0;@"><br></td>
		<td align="justify" valign=middle sdnum="2058;0;@"><br></td>
		<td align="justify" valign=middle sdnum="2058;0;@"><br></td>
		<td align="justify" valign=middle sdnum="2058;0;@"><br></td>
		<td align="justify" valign=middle sdnum="2058;0;@"><br></td>
		<td align="justify" valign=middle sdnum="2058;0;@"><br></td>
		<td align="justify" valign=middle sdnum="2058;0;@"><br></td>
		<td align="justify" valign=middle sdnum="2058;0;@"><br></td>
		<td align="justify" valign=middle sdnum="2058;0;@"><br></td>
		<td align="justify" valign=middle sdnum="2058;0;@"><br></td>
		<td align="justify" valign=middle sdnum="2058;0;@"><br></td>
		<td align="justify" valign=middle sdnum="2058;0;@"><br></td>
		<td align="justify" valign=middle sdnum="2058;0;@"><br></td>
		<td align="justify" valign=middle sdnum="2058;0;@"><br></td>
		<td align="justify" valign=middle sdnum="2058;0;@"><br></td>
		<td align="justify" valign=middle sdnum="2058;0;@"><br></td>
		<td align="justify" valign=middle sdnum="2058;0;@"><br></td>
		<td align="justify" valign=middle sdnum="2058;0;@"><br></td>
		<td align="left" valign=middle><b><br></b></td>
	</tr>
	<tr>
		<td height="34" align="left" valign=middle><b><br></b></td>
		<td style="border-top: 3px solid #ffffff; border-left: 3px solid #ffffff; border-right: 3px solid #ffffff" colspan=25 align="left" valign=middle bgcolor="#C6D9F1"><b>3.-Competencias previas</b></td>
		<td align="left" valign=middle><b><br></b></td>
	</tr>
	<tr>
		<td height="50" align="left" valign=middle><b><br></b></td>
		<td style="border-top: 1px solid #254061; border-bottom: 1px solid #254061; border-left: 1px solid #254061; border-right: 1px solid #254061" colspan=25 align="left" valign=top sdnum="2058;0;@">-?<br><br><br></td>
		<td align="left" valign=middle><b><br></b></td>
	</tr>
	<tr>
		<td height="7" align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
	</tr>
	<tr>
		<td height="34" align="center" valign=middle><b><br></b></td>
		<td style="border-top: 3px solid #ffffff; border-left: 3px solid #ffffff; border-right: 3px solid #ffffff" colspan=25 align="left" valign=middle bgcolor="#C6D9F1"><b>4.- Competencia específica de la asignatura</b></td>
		<td align="left" valign=middle><b><br></b></td>
	</tr>
	<tr>
		<td height="50" align="center" valign=middle><b><br></b></td>
		<td style="border-top: 1px solid #254061; border-bottom: 1px solid #254061; border-left: 1px solid #254061; border-right: 1px solid #254061" colspan=25 align="left" valign=top sdnum="2058;0;@">-?<br><br><br></td>
		<td align="left" valign=bottom><b><br></b></td>
	</tr>
	<tr>
		<td height="5" align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="left" valign=bottom><b><br></b></td>
	</tr>
	<tr>
		<td height="48" align="center" valign=middle><b><br></b></td>
		<td style="border-top: 2px solid #ffffff; border-bottom: 2px solid #ffffff; border-left: 2px solid #ffffff; border-right: 2px solid #ffffff" colspan=6 align="center" valign=middle bgcolor="#F1F5F9"><b>Tema:</b></td>
		<td style="border-top: 1px solid #254061; border-bottom: 1px solid #254061; border-left: 2px solid #ffffff" align="left" valign=top><br></td>
		<td style="border-top: 1px solid #254061; border-bottom: 1px solid #254061; border-right: 1px solid #254061" colspan=18 align="left" valign=top><br></td>
		<td align="left" valign=bottom><b><br></b></td>
	</tr>
	<tr>
		<td height="8" align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="left" valign=bottom><b><br></b></td>
	</tr>
	<tr>
		<td height="30" align="center" valign=middle><b><br></b></td>
		<td colspan=25 align="left" valign=middle bgcolor="#B9CDE5"><b>5.- Competencia específica del tema:</b></td>
		<td align="left" valign=middle><b><br></b></td>
	</tr>
	<tr>
		<td height="49" align="center" valign=middle><b><br></b></td>
		<td style="border-top: 1px solid #254061; border-bottom: 1px solid #254061; border-left: 1px solid #254061; border-right: 1px solid #254061" colspan=25 align="left" valign=top sdnum="2058;0;@"><br></td>
		<td align="left" valign=bottom><b><br></b></td>
	</tr>
	<tr>
		<td height="5" align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="left" valign=bottom><b><br></b></td>
	</tr>
	<tr>
		<td height="24" align="center" valign=middle><b><br></b></td>
		<td colspan=25 align="center" valign=middle bgcolor="#F1F5F9"><b>Competencias genéricas a desarrollar</b></td>
		<td align="left" valign=bottom><b><br></b></td>
	</tr>
	<tr>
		<td height="7" align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="left" valign=bottom><b><br></b></td>
	</tr>
	<tr>
		<td height="48" align="center" valign=middle><b><br></b></td>
		<td style="border-top: 1px solid #254061; border-bottom: 1px solid #254061; border-left: 1px solid #254061; border-right: 1px solid #254061" colspan=25 align="left" valign=middle sdnum="2058;0;@"><br></td>
		<td align="left" valign=bottom><b><br></b></td>
	</tr>
	<tr>
		<td height="8" align="center" valign=middle><b><br></b></td>
		<td align="left" valign=middle sdnum="2058;0;0.00"><b><br></b></td>
		<td align="justify" valign=middle sdnum="2058;0;@"><br></td>
		<td align="justify" valign=middle sdnum="2058;0;@"><br></td>
		<td align="justify" valign=middle sdnum="2058;0;@"><br></td>
		<td align="justify" valign=middle sdnum="2058;0;@"><br></td>
		<td align="justify" valign=middle sdnum="2058;0;@"><br></td>
		<td align="justify" valign=middle sdnum="2058;0;@"><br></td>
		<td align="justify" valign=middle sdnum="2058;0;@"><br></td>
		<td align="justify" valign=middle sdnum="2058;0;@"><br></td>
		<td align="justify" valign=middle sdnum="2058;0;@"><br></td>
		<td align="justify" valign=middle sdnum="2058;0;@"><br></td>
		<td align="justify" valign=middle sdnum="2058;0;@"><br></td>
		<td align="justify" valign=middle sdnum="2058;0;@"><br></td>
		<td align="justify" valign=middle sdnum="2058;0;@"><br></td>
		<td align="justify" valign=middle sdnum="2058;0;@"><br></td>
		<td align="justify" valign=middle sdnum="2058;0;@"><br></td>
		<td align="justify" valign=middle sdnum="2058;0;@"><br></td>
		<td align="justify" valign=middle sdnum="2058;0;@"><br></td>
		<td align="justify" valign=middle sdnum="2058;0;@"><br></td>
		<td align="justify" valign=middle sdnum="2058;0;@"><br></td>
		<td align="justify" valign=middle sdnum="2058;0;@"><br></td>
		<td align="justify" valign=middle sdnum="2058;0;@"><br></td>
		<td align="justify" valign=middle sdnum="2058;0;@"><br></td>
		<td align="justify" valign=middle sdnum="2058;0;@"><br></td>
		<td align="justify" valign=middle sdnum="2058;0;@"><br></td>
		<td align="left" valign=bottom><b><br></b></td>
	</tr>
	<tr>
		<td height="4" align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="left" valign=bottom><b><br></b></td>
	</tr>
	<tr>
		<td height="34" align="center" valign=middle><b><br></b></td>
		<td style="border-top: 3px solid #ffffff; border-bottom: 3px solid #ffffff; border-left: 3px solid #ffffff; border-right: 3px solid #ffffff" colspan=25 align="left" valign=middle bgcolor="#C6D9F1"><b>6.- Proceso enseñanza  aprendizaje</b></td>
		<td align="left" valign=middle><b><br></b></td>
	</tr>
	<tr>
		<td height="4" align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="left" valign=bottom><b><br></b></td>
	</tr>
	<tr>
		<td height="42" align="left" valign=middle><br></td>
		<td style="border-top: 1px solid #254061; border-bottom: 1px solid #254061; border-left: 1px solid #4f6228; border-right: 1px solid #4f6228" colspan=4 align="center" valign=middle bgcolor="#F1F5F9"><b>Temas y subtemas</b></td>
		<td style="border-top: 1px solid #254061; border-bottom: 1px solid #254061; border-left: 1px solid #4f6228; border-right: 1px solid #4f6228" colspan=8 align="center" valign=middle bgcolor="#F1F5F9"><b>Actividades de enseñanza (Docente)</b></td>
		<td style="border-top: 1px solid #254061; border-bottom: 1px solid #254061; border-left: 1px solid #4f6228; border-right: 1px solid #4f6228" colspan=7 align="center" valign=middle bgcolor="#F1F5F9"><b>Actividades de aprendizaje (estudiante)</b></td>
		<td style="border-top: 1px solid #254061; border-bottom: 1px solid #254061; border-left: 1px solid #4f6228; border-right: 1px solid #4f6228" colspan=6 align="center" valign=middle bgcolor="#F1F5F9"><b>Recursos y apoyos didácticos</b></td>
		<td align="left" valign=middle><br></td>
	</tr>
	<tr>
		<td height="183" align="left" valign=middle><br></td>
		<td style="border-top: 1px solid #254061; border-bottom: 1px solid #000000; border-left: 1px solid #4f6228; border-right: 1px solid #4f6228" colspan=4 rowspan=5 align="left" valign=top><br></td>
		<td style="border-top: 1px solid #254061; border-bottom: 1px solid #4f6228; border-left: 1px solid #4f6228; border-right: 1px solid #4f6228" colspan=8 align="left" valign=top><br></td>
		<td style="border-top: 1px solid #254061; border-bottom: 1px solid #4f6228; border-left: 1px solid #4f6228; border-right: 1px solid #4f6228" colspan=7 align="left" valign=top><br></td>
		<td style="border-top: 1px solid #254061; border-bottom: 1px solid #4f6228; border-left: 1px solid #4f6228; border-right: 1px solid #4f6228" colspan=6 rowspan=2 align="center" valign=middle><br></td>
		<td align="left" valign=middle><br></td>
	</tr>
	<tr>
		<td height="150" align="left" valign=middle><br></td>
		<td style="border-top: 1px solid #4f6228; border-bottom: 1px solid #4f6228; border-left: 1px solid #4f6228; border-right: 1px solid #4f6228" colspan=8 align="left" valign=top><br></td>
		<td style="border-top: 1px solid #4f6228; border-bottom: 1px solid #4f6228; border-left: 1px solid #4f6228; border-right: 1px solid #4f6228" colspan=7 align="left" valign=top><br></td>
		<td align="left" valign=middle><br></td>
	</tr>
	<tr>
		<td height="63" align="left" valign=middle><br></td>
		<td style="border-top: 1px solid #4f6228; border-bottom: 1px solid #4f6228; border-left: 1px solid #4f6228; border-right: 1px solid #4f6228" colspan=8 rowspan=3 align="left" valign=top><br></td>
		<td style="border-top: 1px solid #4f6228; border-bottom: 1px solid #4f6228; border-left: 1px solid #4f6228; border-right: 1px solid #4f6228" colspan=7 rowspan=3 align="left" valign=top><br></td>
		<td style="border-top: 1px solid #4f6228; border-bottom: 1px solid #4f6228; border-left: 1px solid #4f6228; border-right: 1px solid #4f6228" colspan=6 rowspan=3 align="left" valign=top><br></td>
		<td align="left" valign=middle><br></td>
	</tr>
	<tr>
		<td height="29" align="left" valign=middle><br></td>
		<td align="left" valign=middle><br></td>
	</tr>
	<tr>
		<td height="108" align="left" valign=middle><br></td>
		<td align="left" valign=middle><br></td>
	</tr>
	<tr>
		<td height="61" align="center" valign=middle><b><br></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=19 align="right" valign=middle bgcolor="#F1F5F9"><b>Horas teórico-prácticas</b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=6 align="center" valign=middle><b><font size=1 color="#000000"><br></font></b></td>
		<td align="left" valign=top><b><br></b></td>
	</tr>
	<tr>
		<td height="52" align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><br></td>
		<td align="center" valign=middle><br></td>
		<td align="center" valign=middle><br></td>
		<td align="center" valign=middle><br></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="left" valign=bottom><b><br></b></td>
	</tr>
	<tr>
		<td height="34" align="center" valign=middle><b><br></b></td>
		<td style="border-top: 3px solid #ffffff; border-bottom: 3px solid #ffffff; border-left: 3px solid #ffffff; border-right: 3px solid #ffffff" colspan=25 align="left" valign=middle bgcolor="#C6D9F1"><b>Prácticas en laboratorios o talleres</b></td>
		<td align="left" valign=middle><b><br></b></td>
	</tr>
	<tr>
		<td height="41" align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="left" valign=bottom><b><br></b></td>
	</tr>
	<tr>
		<td height="31" align="left" valign=middle><br></td>
		<td style="border-top: 1px solid #254061; border-bottom: 1px solid #254061" align="center" valign=middle bgcolor="#F1F5F9"><b>No.</b></td>
		<td style="border-top: 1px solid #254061; border-bottom: 1px solid #254061; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=16 align="center" valign=middle bgcolor="#F1F5F9"><b>Título de la práctica</b></td>
		<td style="border-top: 1px solid #254061; border-bottom: 1px solid #254061" colspan=8 align="center" valign=middle bgcolor="#F1F5F9"><b>Laboratorio</b></td>
		<td align="left" valign=middle><br></td>
	</tr>
	<tr>
		<td height="34" align="left" valign=middle><br></td>
		<td style="border-top: 1px solid #254061; border-bottom: 1px solid #254061; border-right: 1px solid #4f6228" align="right" valign=top><br></td>
		<td style="border-top: 1px solid #254061; border-bottom: 1px solid #254061; border-left: 1px solid #4f6228; border-right: 1px solid #4f6228" colspan=16 align="left" valign=top><br></td>
		<td style="border-top: 1px solid #254061; border-bottom: 1px solid #254061; border-left: 1px solid #4f6228" colspan=8 align="left" valign=top><br></td>
		<td align="left" valign=middle><br></td>
	</tr>
	<tr>
		<td height="34" align="left" valign=middle><br></td>
		<td style="border-top: 1px solid #254061; border-bottom: 1px solid #254061; border-right: 1px solid #4f6228" align="right" valign=top><br></td>
		<td style="border-top: 1px solid #254061; border-bottom: 1px solid #254061; border-left: 1px solid #4f6228; border-right: 1px solid #4f6228" colspan=16 align="left" valign=top><br></td>
		<td style="border-top: 1px solid #254061; border-bottom: 1px solid #254061; border-left: 1px solid #4f6228" colspan=8 align="left" valign=top><br></td>
		<td align="left" valign=middle><br></td>
	</tr>
	<tr>
		<td height="34" align="left" valign=middle><br></td>
		<td style="border-top: 1px solid #254061; border-bottom: 1px solid #254061; border-right: 1px solid #4f6228" align="right" valign=top><br></td>
		<td style="border-top: 1px solid #254061; border-bottom: 1px solid #254061; border-left: 1px solid #4f6228; border-right: 1px solid #4f6228" colspan=16 align="left" valign=top><br></td>
		<td style="border-top: 1px solid #254061; border-bottom: 1px solid #254061; border-left: 1px solid #4f6228" colspan=8 align="left" valign=top><br></td>
		<td align="left" valign=middle><br></td>
	</tr>
	<tr>
		<td height="34" align="left" valign=middle><br></td>
		<td style="border-top: 1px solid #254061; border-bottom: 1px solid #254061; border-right: 1px solid #4f6228" align="right" valign=top><br></td>
		<td style="border-top: 1px solid #254061; border-bottom: 1px solid #254061; border-left: 1px solid #4f6228; border-right: 1px solid #4f6228" colspan=16 align="left" valign=top><br></td>
		<td style="border-top: 1px solid #254061; border-bottom: 1px solid #254061; border-left: 1px solid #4f6228" colspan=8 align="left" valign=top><br></td>
		<td align="left" valign=middle><br></td>
	</tr>
	<tr>
		<td height="34" align="left" valign=middle><br></td>
		<td style="border-top: 1px solid #254061; border-bottom: 1px solid #254061; border-right: 1px solid #4f6228" align="right" valign=top><br></td>
		<td style="border-top: 1px solid #254061; border-bottom: 1px solid #254061; border-left: 1px solid #4f6228; border-right: 1px solid #4f6228" colspan=16 align="left" valign=top><br></td>
		<td style="border-top: 1px solid #254061; border-bottom: 1px solid #254061; border-left: 1px solid #4f6228" colspan=8 align="left" valign=top><br></td>
		<td align="left" valign=middle><br></td>
	</tr>
	<tr>
		<td height="7" align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="left" valign=bottom><b><br></b></td>
	</tr>
	<tr>
		<td height="34" align="center" valign=middle><b><br></b></td>
		<td style="border-left: 3px solid #ffffff; border-right: 3px solid #ffffff" colspan=25 align="left" valign=middle bgcolor="#C6D9F1"><b>7.- Estrategia de evaluación</b></td>
		<td align="left" valign=middle><b><br></b></td>
	</tr>
	<tr>
		<td height="6" align="center" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
	</tr>
	<tr>
		<td height="34" align="center" valign=middle><b><br></b></td>
		<td colspan=25 align="left" valign=middle bgcolor="#F1F5F9"><b>Criterios de evaluación</b></td>
		<td align="left" valign=bottom><b><br></b></td>
	</tr>
	<tr>
		<td height="7" align="center" valign=middle><b><br></b></td>
		<td style="border-bottom: 1px solid #10243e" align="center" valign=middle><b><br></b></td>
		<td style="border-bottom: 1px solid #10243e" align="center" valign=middle><b><br></b></td>
		<td style="border-bottom: 1px solid #10243e" align="center" valign=middle><b><br></b></td>
		<td style="border-bottom: 1px solid #10243e" align="center" valign=middle><b><br></b></td>
		<td style="border-bottom: 1px solid #10243e" align="center" valign=middle><b><br></b></td>
		<td style="border-bottom: 1px solid #10243e" align="center" valign=middle><b><br></b></td>
		<td style="border-bottom: 1px solid #10243e" align="center" valign=middle><b><br></b></td>
		<td style="border-bottom: 1px solid #10243e" align="center" valign=middle><b><br></b></td>
		<td style="border-bottom: 1px solid #10243e" align="center" valign=middle><b><br></b></td>
		<td style="border-bottom: 1px solid #10243e" align="center" valign=middle><b><br></b></td>
		<td style="border-bottom: 1px solid #10243e" align="center" valign=middle><b><br></b></td>
		<td style="border-bottom: 1px solid #10243e" align="center" valign=middle><b><br></b></td>
		<td style="border-bottom: 1px solid #10243e" align="center" valign=middle><b><br></b></td>
		<td style="border-bottom: 1px solid #10243e" align="center" valign=middle><b><br></b></td>
		<td style="border-bottom: 1px solid #10243e" align="center" valign=middle><b><br></b></td>
		<td style="border-bottom: 1px solid #10243e" align="center" valign=middle><b><br></b></td>
		<td style="border-bottom: 1px solid #10243e" align="center" valign=middle><b><br></b></td>
		<td style="border-bottom: 1px solid #10243e" align="center" valign=middle><b><br></b></td>
		<td style="border-bottom: 1px solid #10243e" align="center" valign=middle><b><br></b></td>
		<td style="border-bottom: 1px solid #10243e" align="center" valign=middle><b><br></b></td>
		<td style="border-bottom: 1px solid #10243e" align="center" valign=middle><b><br></b></td>
		<td style="border-bottom: 1px solid #10243e" align="center" valign=middle><b><br></b></td>
		<td style="border-bottom: 1px solid #10243e" align="center" valign=middle><b><br></b></td>
		<td style="border-bottom: 1px solid #10243e" align="center" valign=middle><b><br></b></td>
		<td style="border-bottom: 1px solid #10243e" align="center" valign=middle><b><br></b></td>
		<td align="left" valign=bottom><b><br></b></td>
	</tr>
	<tr>
		<td height="35" align="left" valign=middle><br></td>
		<td style="border-bottom: 1px solid #254061; border-right: 1px solid #000000" colspan=3 align="center" valign=middle bgcolor="#F1F5F9"><b>Indicador</b></td>
		<td style="border-bottom: 1px solid #254061; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=15 align="center" valign=middle bgcolor="#F1F5F9"><b>Descripción del índicador</b></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #254061; border-left: 1px solid #000000" colspan=7 align="center" valign=middle bgcolor="#F1F5F9"><b>Valor del indicador</b></td>
		<td align="left" valign=middle><br></td>
	</tr>
	<tr>
		<td height="32" align="left" valign=middle><br></td>
		<td style="border-top: 1px solid #254061; border-bottom: 1px solid #254061; border-right: 1px solid #000000" colspan=3 align="center" valign=middle><b>A</b></td>
		<td style="border-top: 1px solid #254061; border-bottom: 1px solid #254061; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=15 align="left" valign=middle>Se adapta a situaciones y contextos complejos</td>
		<td style="border-top: 1px solid #254061; border-bottom: 1px solid #254061; border-left: 1px solid #000000" colspan=7 align="center" valign=middle><b><br></b></td>
		<td align="left" valign=middle><br></td>
	</tr>
	<tr>
		<td height="32" align="left" valign=middle><br></td>
		<td style="border-top: 1px solid #254061; border-bottom: 1px solid #254061; border-right: 1px solid #000000" colspan=3 align="center" valign=middle><b>B</b></td>
		<td style="border-top: 1px solid #254061; border-bottom: 1px solid #254061; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=15 align="left" valign=middle>Hace aportaciones a las actividades académicas desarrolladas</td>
		<td style="border-top: 1px solid #254061; border-bottom: 1px solid #254061; border-left: 1px solid #000000" colspan=7 align="center" valign=middle><b><br></b></td>
		<td align="left" valign=middle><br></td>
	</tr>
	<tr>
		<td height="32" align="left" valign=middle><br></td>
		<td style="border-top: 1px solid #254061; border-bottom: 1px solid #254061; border-right: 1px solid #000000" colspan=3 align="center" valign=middle><b>C</b></td>
		<td style="border-top: 1px solid #254061; border-bottom: 1px solid #254061; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=15 align="left" valign=middle>Propone y/o explica soluciones o procedimientos no vistos en clase (creatividad)</td>
		<td style="border-top: 1px solid #254061; border-bottom: 1px solid #254061; border-left: 1px solid #000000" colspan=7 align="center" valign=middle><b><br></b></td>
		<td align="left" valign=middle><br></td>
	</tr>
	<tr>
		<td height="32" align="left" valign=middle><br></td>
		<td style="border-top: 1px solid #254061; border-bottom: 1px solid #254061; border-right: 1px solid #000000" colspan=3 align="center" valign=middle><b>D</b></td>
		<td style="border-top: 1px solid #254061; border-bottom: 1px solid #254061; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=15 align="left" valign=middle>Introduce recursos y experiencias que promueven un pensamiento crítico</td>
		<td style="border-top: 1px solid #254061; border-bottom: 1px solid #254061; border-left: 1px solid #000000" colspan=7 align="center" valign=middle><b><br></b></td>
		<td align="left" valign=middle><br></td>
	</tr>
	<tr>
		<td height="32" align="left" valign=middle><br></td>
		<td style="border-top: 1px solid #254061; border-bottom: 1px solid #254061; border-right: 1px solid #000000" colspan=3 align="center" valign=middle><b>E</b></td>
		<td style="border-top: 1px solid #254061; border-bottom: 1px solid #254061; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=15 align="left" valign=middle>Incorpora conocimientos y actividades interdisciplinarias en su aprendizaje</td>
		<td style="border-top: 1px solid #254061; border-bottom: 1px solid #254061; border-left: 1px solid #000000" colspan=7 align="center" valign=middle><b><br></b></td>
		<td align="left" valign=middle><br></td>
	</tr>
	<tr>
		<td height="32" align="left" valign=middle><br></td>
		<td style="border-top: 1px solid #254061; border-bottom: 1px solid #254061; border-right: 1px solid #000000" colspan=3 align="center" valign=middle><b>F</b></td>
		<td style="border-top: 1px solid #254061; border-bottom: 1px solid #254061; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=15 align="left" valign=middle>Realiza su trabajo de manera autónoma y autorregulada</td>
		<td style="border-top: 1px solid #254061; border-bottom: 1px solid #254061; border-left: 1px solid #000000" colspan=7 align="center" valign=middle><b><br></b></td>
		<td align="left" valign=middle><br></td>
	</tr>
	<tr>
		<td height="7" align="left" valign=middle><br></td>
		<td style="border-top: 1px solid #254061; border-bottom: 1px solid #10243e" colspan=25 align="center" valign=middle><b><br></b></td>
		<td align="left" valign=middle><br></td>
	</tr>
	<tr>
		<td height="41" align="left" valign=middle><br></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=4 align="center" valign=middle bgcolor="#F1F5F9"><b>Desempeño</b></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="center" valign=middle bgcolor="#F1F5F9"><b>Nivel de desempeño</b></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #000000; border-right: 1px solid #000000" colspan=16 align="center" valign=middle bgcolor="#F1F5F9"><b>Índicadores de alcance</b></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="center" valign=middle bgcolor="#F1F5F9"><b>Valoración númerica</b></td>
		<td align="left" valign=middle><br></td>
	</tr>
	<tr>
		<td height="615" align="left" valign=middle><br></td>
		<td style="border-bottom: 1px solid #10243e; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=4 rowspan=4 align="center" valign=middle><b>Competencia alcanzada</b></td>
		<td style="border-bottom: 1px solid #10243e; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="center" valign=middle><b>Excelente</b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #10243e; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=16 align="left" valign=top><br></td>
		<td style="border-bottom: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="center" valign=middle><b>95-100</b></td>
		<td align="left" valign=middle><br></td>
	</tr>
	<tr>
		<td height="34" align="left" valign=middle><br></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="center" valign=middle><b>Notable</b></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=16 align="left" valign=middle>Cumple cuatro de los indicadores diferidos en desempeño excelente</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #10243e; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="center" valign=middle><b>85-94</b></td>
		<td align="left" valign=middle><br></td>
	</tr>
	<tr>
		<td height="34" align="left" valign=middle><br></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="center" valign=middle><b>Bueno</b></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=16 align="left" valign=middle>Cumple tres de los indicadores diferidos en desempeño excelente</td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="center" valign=middle><b>75-84</b></td>
		<td align="left" valign=middle><br></td>
	</tr>
	<tr>
		<td height="34" align="left" valign=middle><br></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="center" valign=middle><b>Suficiente</b></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=16 align="left" valign=middle>Cumple dos de los indicadores diferidos en desempeño excelente</td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="center" valign=middle><b>70-74</b></td>
		<td align="left" valign=middle><br></td>
	</tr>
	<tr>
		<td height="48" align="left" valign=middle><br></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=4 align="center" valign=middle><b>Compentencia no alcanzada</b></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="center" valign=middle><b>Insuficiente</b></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-left: 1px solid #000000" colspan=15 align="left" valign=middle>No se cumple con el 100% de evidencias conceptuales, procedimentales y actitudinales de los indicadores diferidos en el desempeño excelente.</td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-right: 1px solid #000000" align="left" valign=middle><b><br></b></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="center" valign=middle><b>N/A (no alcanzada)</b></td>
		<td align="left" valign=middle><br></td>
	</tr>
	<tr>
		<td height="6" align="left" valign=middle><br></td>
		<td colspan=7 align="center" valign=middle><b><br></b></td>
		<td colspan=7 align="center" valign=middle><b><br></b></td>
		<td colspan=6 align="center" valign=middle><b><br></b></td>
		<td colspan=5 align="center" valign=middle><b><br></b></td>
		<td align="left" valign=middle><br></td>
	</tr>
	<tr>
		<td height="34" align="left" valign=middle><br></td>
		<td colspan=25 align="left" valign=middle bgcolor="#F1F5F9"><b>Matríz de evaluación</b></td>
		<td align="left" valign=middle><br></td>
	</tr>
	<tr>
		<td height="6" align="left" valign=middle><br></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="left" valign=middle><br></td>
	</tr>
	<tr>
		<td height="29" align="left" valign=middle><br></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-left: 1px solid #10243e; border-right: 1px solid #000000" colspan=7 rowspan=2 align="center" valign=middle bgcolor="#F1F5F9"><b>Evidencia de aprendizaje</b></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-left: 1px solid #000000; border-right: 1px solid #10243e" colspan=2 rowspan=2 align="center" valign=middle bgcolor="#F1F5F9"><b>%</b></td>
		<td style="border-top: 1px solid #10243e; border-left: 1px solid #10243e; border-right: 1px solid #10243e" colspan=6 align="center" valign=middle bgcolor="#F1F5F9"><b>Indicador de alcance</b></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-left: 1px solid #10243e; border-right: 1px solid #10243e" colspan=10 align="center" valign=middle bgcolor="#F1F5F9"><b>Método de evaluación </b></td>
		<td align="left" valign=middle><br></td>
	</tr>
	<tr>
		<td height="29" align="left" valign=middle><br></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-left: 1px solid #10243e; border-right: 1px solid #10243e" align="left" valign=middle bgcolor="#F1F5F9"><b>A</b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #10243e; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#F1F5F9"><b>B</b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #10243e; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#F1F5F9"><b>C</b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #10243e; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#F1F5F9"><b>D</b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #10243e; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#F1F5F9"><b>E</b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #10243e; border-left: 1px solid #000000" align="center" valign=middle bgcolor="#F1F5F9"><b>F</b></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-left: 1px solid #10243e; border-right: 1px solid #10243e" colspan=7 align="center" valign=middle bgcolor="#F1F5F9"><b>Instrumento</b></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-left: 1px solid #10243e; border-right: 1px solid #10243e" align="center" valign=middle bgcolor="#F1F5F9"><b>P</b></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-left: 1px solid #10243e; border-right: 1px solid #10243e" align="center" valign=middle bgcolor="#F1F5F9"><b>C</b></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-left: 1px solid #10243e; border-right: 1px solid #10243e" align="center" valign=middle bgcolor="#F1F5F9"><b>A</b></td>
		<td align="left" valign=middle><br></td>
	</tr>
	<tr>
		<td height="34" align="left" valign=middle><br></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-left: 1px solid #10243e; border-right: 1px solid #10243e" colspan=7 align="left" valign=top><b><br></b></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-left: 1px solid #10243e; border-right: 1px solid #10243e" colspan=2 align="center" valign=middle><b><br></b></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-left: 1px solid #10243e; border-right: 1px solid #10243e" align="left" valign=middle><b><br></b></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-left: 1px solid #10243e; border-right: 1px solid #10243e" align="center" valign=middle><b><br></b></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-left: 1px solid #10243e; border-right: 1px solid #10243e" align="center" valign=middle><b><br></b></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-left: 1px solid #10243e; border-right: 1px solid #10243e" align="center" valign=middle><b><br></b></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-left: 1px solid #10243e; border-right: 1px solid #10243e" align="center" valign=middle><b><br></b></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-left: 1px solid #10243e; border-right: 1px solid #10243e" align="center" valign=middle><b><br></b></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-left: 1px solid #10243e; border-right: 1px solid #10243e" colspan=7 align="left" valign=top><b><br></b></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-left: 1px solid #10243e; border-right: 1px solid #10243e" align="left" valign=middle><b><br></b></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-left: 1px solid #10243e; border-right: 1px solid #10243e" align="left" valign=middle><b><br></b></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-left: 1px solid #10243e; border-right: 1px solid #10243e" align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><br></td>
	</tr>
	<tr>
		<td height="34" align="left" valign=middle><br></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-left: 1px solid #10243e; border-right: 1px solid #10243e" colspan=7 align="left" valign=top><b><br></b></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-left: 1px solid #10243e; border-right: 1px solid #10243e" colspan=2 align="center" valign=middle><b><br></b></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-left: 1px solid #10243e; border-right: 1px solid #10243e" align="left" valign=middle><b><br></b></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-left: 1px solid #10243e; border-right: 1px solid #10243e" align="center" valign=middle><b><br></b></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-left: 1px solid #10243e; border-right: 1px solid #10243e" align="center" valign=middle><b><br></b></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-left: 1px solid #10243e; border-right: 1px solid #10243e" align="center" valign=middle><b><br></b></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-left: 1px solid #10243e; border-right: 1px solid #10243e" align="center" valign=middle><b><br></b></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-left: 1px solid #10243e; border-right: 1px solid #10243e" align="center" valign=middle><b><br></b></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-left: 1px solid #10243e; border-right: 1px solid #10243e" colspan=7 align="left" valign=top><b><br></b></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-left: 1px solid #10243e; border-right: 1px solid #10243e" align="left" valign=middle><b><br></b></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-left: 1px solid #10243e; border-right: 1px solid #10243e" align="left" valign=middle><b><br></b></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-left: 1px solid #10243e; border-right: 1px solid #10243e" align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><br></td>
	</tr>
	<tr>
		<td height="34" align="left" valign=middle><br></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-left: 1px solid #10243e; border-right: 1px solid #10243e" colspan=7 align="left" valign=top><b><br></b></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-left: 1px solid #10243e; border-right: 1px solid #10243e" colspan=2 align="center" valign=middle><b><br></b></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-left: 1px solid #10243e; border-right: 1px solid #10243e" align="left" valign=middle><b><br></b></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-left: 1px solid #10243e; border-right: 1px solid #10243e" align="center" valign=middle><b><br></b></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-left: 1px solid #10243e; border-right: 1px solid #10243e" align="center" valign=middle><b><br></b></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-left: 1px solid #10243e; border-right: 1px solid #10243e" align="center" valign=middle><b><br></b></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-left: 1px solid #10243e; border-right: 1px solid #10243e" align="center" valign=middle><b><br></b></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-left: 1px solid #10243e; border-right: 1px solid #10243e" align="center" valign=middle><b><br></b></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-left: 1px solid #10243e; border-right: 1px solid #10243e" colspan=7 align="left" valign=top><b><br></b></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-left: 1px solid #10243e; border-right: 1px solid #10243e" align="left" valign=middle><b><br></b></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-left: 1px solid #10243e; border-right: 1px solid #10243e" align="left" valign=middle><b><br></b></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-left: 1px solid #10243e; border-right: 1px solid #10243e" align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><br></td>
	</tr>
	<tr>
		<td height="34" align="left" valign=middle><br></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-left: 1px solid #10243e; border-right: 1px solid #10243e" colspan=7 align="left" valign=top><b><br></b></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-left: 1px solid #10243e; border-right: 1px solid #10243e" colspan=2 align="center" valign=middle><b><br></b></td>
		<td style="border-bottom: 1px solid #10243e; border-left: 1px solid #10243e; border-right: 1px solid #10243e" align="left" valign=middle><b><br></b></td>
		<td style="border-bottom: 1px solid #10243e; border-left: 1px solid #10243e; border-right: 1px solid #10243e" align="center" valign=middle><b><br></b></td>
		<td style="border-bottom: 1px solid #10243e; border-left: 1px solid #10243e; border-right: 1px solid #10243e" align="center" valign=middle><b><br></b></td>
		<td style="border-bottom: 1px solid #10243e; border-left: 1px solid #10243e; border-right: 1px solid #10243e" align="center" valign=middle><b><br></b></td>
		<td style="border-bottom: 1px solid #10243e; border-left: 1px solid #10243e; border-right: 1px solid #10243e" align="center" valign=middle><b> </b></td>
		<td style="border-bottom: 1px solid #10243e; border-left: 1px solid #10243e; border-right: 1px solid #10243e" align="center" valign=middle><b><br></b></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-left: 1px solid #10243e; border-right: 1px solid #10243e" colspan=7 align="left" valign=top><b><br></b></td>
		<td style="border-bottom: 1px solid #10243e; border-left: 1px solid #10243e; border-right: 1px solid #10243e" align="left" valign=middle><b><br></b></td>
		<td style="border-bottom: 1px solid #10243e; border-left: 1px solid #10243e; border-right: 1px solid #10243e" align="left" valign=middle><b><br></b></td>
		<td style="border-bottom: 1px solid #10243e; border-left: 1px solid #10243e; border-right: 1px solid #10243e" align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><br></td>
	</tr>
	<tr>
		<td height="34" align="left" valign=middle><br></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-left: 1px solid #10243e; border-right: 1px solid #10243e" colspan=7 align="center" valign=middle><b>Total</b></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-left: 1px solid #10243e; border-right: 1px solid #10243e" colspan=2 align="center" valign=middle><b><br></b></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-left: 1px solid #10243e; border-right: 1px solid #10243e" align="left" valign=middle><b><br></b></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-left: 1px solid #10243e; border-right: 1px solid #10243e" align="left" valign=middle><b><br></b></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-left: 1px solid #10243e; border-right: 1px solid #10243e" align="left" valign=middle><b><br></b></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-left: 1px solid #10243e; border-right: 1px solid #10243e" align="left" valign=middle><b><br></b></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-left: 1px solid #10243e; border-right: 1px solid #10243e" align="left" valign=middle><b><br></b></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-left: 1px solid #10243e; border-right: 1px solid #10243e" align="left" valign=middle><b><br></b></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-left: 1px solid #10243e" align="left" valign=middle><b><br></b></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e" align="left" valign=middle><b><br></b></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e" align="left" valign=middle><b><br></b></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e" align="left" valign=middle><b><br></b></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e" align="left" valign=middle><b><br></b></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e" align="left" valign=middle><b><br></b></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-right: 1px solid #10243e" align="left" valign=middle><b><br></b></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-left: 1px solid #10243e; border-right: 1px solid #10243e" align="left" valign=middle><b><br></b></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-left: 1px solid #10243e; border-right: 1px solid #10243e" align="left" valign=middle><b><br></b></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-left: 1px solid #10243e; border-right: 1px solid #10243e" align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><br></td>
	</tr>
	<tr>
		<td height="8" align="left" valign=middle><br></td>
		<td colspan=25 align="center" valign=middle><b><br></b></td>
		<td align="left" valign=middle><br></td>
	</tr>
	<tr>
		<td height="34" align="left" valign=middle><br></td>
		<td colspan=25 align="left" valign=middle bgcolor="#C6D9F1"><b>8.- Calendarización de evaluación en semanas</b></td>
		<td align="left" valign=middle><br></td>
	</tr>
	<tr>
		<td height="8" align="left" valign=middle><br></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><br></td>
	</tr>
	<tr>
		<td height="40" align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><br></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=4 align="center" valign=middle bgcolor="#F1F5F9"><b>Grupo</b></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-left: 1px solid #000000" colspan=4 align="center" valign=middle sdnum="2058;0;@"><br></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-left: 1px solid #10243e" colspan=4 align="center" valign=middle bgcolor="#F1F5F9"><b>Fecha de inicio programado</b></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-left: 1px solid #10243e; border-right: 1px solid #10243e" colspan=3 align="center" valign=middle sdnum="2058;2058;DD/MM/AAAA"><br></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-right: 1px solid #10243e" colspan=4 align="center" valign=middle bgcolor="#F1F5F9"><b>Fecha de Término</b></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-left: 1px solid #10243e; border-right: 1px solid #000000" colspan=3 align="center" valign=middle sdnum="2058;2058;DD/MM/AAAA"><br></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><br></td>
	</tr>
	<tr>
		<td height="40" align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><br></td>
		<td style="border-top: 1px solid #254061; border-bottom: 1px solid #254061; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=4 align="center" valign=middle bgcolor="#F1F5F9"><b>Grupo</b></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-left: 1px solid #000000" colspan=4 align="center" valign=middle sdnum="2058;0;@"><br></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-left: 1px solid #10243e" colspan=4 align="center" valign=middle bgcolor="#F1F5F9"><b>Fecha de inicio programado</b></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-left: 1px solid #10243e; border-right: 1px solid #10243e" colspan=3 align="center" valign=middle sdnum="2058;2058;DD/MM/AAAA"><br></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-right: 1px solid #10243e" colspan=4 align="center" valign=middle bgcolor="#F1F5F9"><b>Fecha de Término</b></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-left: 1px solid #10243e; border-right: 1px solid #000000" colspan=3 align="center" valign=middle sdnum="2058;2058;DD/MM/AAAA"><br></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><br></td>
	</tr>
	<tr>
		<td height="40" align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><br></td>
		<td style="border-top: 1px solid #254061; border-bottom: 1px solid #254061; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=4 align="center" valign=middle bgcolor="#F1F5F9"><b>Grupo</b></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-left: 1px solid #000000" colspan=4 align="center" valign=middle sdnum="2058;0;@"><br></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-left: 1px solid #10243e" colspan=4 align="center" valign=middle bgcolor="#F1F5F9"><b>Fecha de inicio programado</b></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-left: 1px solid #10243e; border-right: 1px solid #10243e" colspan=3 align="center" valign=middle sdnum="2058;2058;DD/MM/AAAA"><br></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-right: 1px solid #10243e" colspan=4 align="center" valign=middle bgcolor="#F1F5F9"><b>Fecha de Término</b></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #10243e; border-left: 1px solid #10243e; border-right: 1px solid #000000" colspan=3 align="center" valign=middle sdnum="2058;2058;DD/MM/AAAA"><br></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><br></td>
	</tr>
	<tr>
		<td height="40" align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><br></td>
		<td style="border-top: 1px solid #254061; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=4 align="center" valign=middle bgcolor="#F1F5F9"><b>Grupo</b></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #000000; border-left: 1px solid #000000" colspan=4 align="center" valign=middle sdnum="2058;0;@"><br></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #000000; border-left: 1px solid #10243e" colspan=4 align="center" valign=middle bgcolor="#F1F5F9"><b>Fecha de inicio programado</b></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #000000; border-left: 1px solid #10243e; border-right: 1px solid #10243e" colspan=3 align="center" valign=middle sdnum="2058;2058;DD/MM/AAAA"><br></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #000000; border-right: 1px solid #10243e" colspan=4 align="center" valign=middle bgcolor="#F1F5F9"><b>Fecha de Término</b></td>
		<td style="border-top: 1px solid #10243e; border-bottom: 1px solid #000000; border-left: 1px solid #10243e; border-right: 1px solid #000000" colspan=3 align="center" valign=middle sdnum="2058;2058;DD/MM/AAAA"><br></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><br></td>
	</tr>
	<tr>
		<td height="11" align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><br></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><br></td>
	</tr>
	<tr>
		<td height="34" align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><br></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=4 align="center" valign=middle bgcolor="#F1F5F9"><b>Semana</b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=middle bgcolor="#F1F5F9" sdval="1" sdnum="2058;"><b>1</b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=middle bgcolor="#F1F5F9" sdval="2" sdnum="2058;"><b>2</b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=middle bgcolor="#F1F5F9" sdval="3" sdnum="2058;"><b>3</b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=middle bgcolor="#F1F5F9" sdval="4" sdnum="2058;"><b>4</b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=middle bgcolor="#F1F5F9" sdval="5" sdnum="2058;"><b>5</b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=middle bgcolor="#F1F5F9" sdval="6" sdnum="2058;"><b>6</b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=middle bgcolor="#F1F5F9" sdval="7" sdnum="2058;"><b>7</b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=middle bgcolor="#F1F5F9" sdval="8" sdnum="2058;"><b>8</b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=middle bgcolor="#F1F5F9" sdval="9" sdnum="2058;"><b>9</b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=middle bgcolor="#F1F5F9" sdval="10" sdnum="2058;"><b>10</b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=middle bgcolor="#F1F5F9" sdval="11" sdnum="2058;"><b>11</b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=middle bgcolor="#F1F5F9" sdval="12" sdnum="2058;"><b>12</b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=middle bgcolor="#F1F5F9" sdval="13" sdnum="2058;"><b>13</b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=middle bgcolor="#F1F5F9" sdval="14" sdnum="2058;"><b>14</b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=middle bgcolor="#F1F5F9" sdval="15" sdnum="2058;"><b>15</b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=middle bgcolor="#F1F5F9" sdval="16" sdnum="2058;"><b>16</b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=middle bgcolor="#F1F5F9" sdval="17" sdnum="2058;"><b>17</b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=middle bgcolor="#F1F5F9" sdval="18" sdnum="2058;"><b>18</b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><br></td>
	</tr>
	<tr>
		<td height="56" align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><br></td>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=4 align="center" valign=middle bgcolor="#F1F5F9"><b>Tiempo planeado</b></td>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle><b><br></b></td>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle><b><br></b></td>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle><b><br></b></td>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle><b><br></b></td>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle><b><br></b></td>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle><b><br></b></td>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle><b><br></b></td>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle><b><br></b></td>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle><b><br></b></td>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle><b><br></b></td>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle><b><br></b></td>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle><b><br></b></td>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle><b><br></b></td>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle><b><br></b></td>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle><b><br></b></td>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle><b><br></b></td>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle><b><br></b></td>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><br></td>
	</tr>
	<tr>
		<td height="35" align="left" valign=middle><br></td>
		<td align="left" valign=middle><br></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=4 align="center" valign=middle bgcolor="#F1F5F9"><b>Tiempo real</b></td>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle><b><font color="#1F497D"><br></font></b></td>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle><b><font color="#1F497D"><br></font></b></td>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle><b><font color="#1F497D"><br></font></b></td>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle><b><font color="#1F497D"><br></font></b></td>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle><b><font color="#1F497D"><br></font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle><br></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle><br></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle><br></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle><br></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle><b><br></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle><b><br></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle><b><br></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle><b><br></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle><b><br></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle><b><br></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle><b><br></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle><b><br></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><br></td>
	</tr>
	<tr>
		<td height="4" align="left" valign=middle><br></td>
		<td align="left" valign=middle><br></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><br></td>
		<td align="left" valign=middle><br></td>
		<td align="left" valign=middle><br></td>
		<td align="left" valign=middle><br></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><br></td>
	</tr>
	<tr>
		<td height="22" align="left" valign=middle><br></td>
		<td align="left" valign=middle><br></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b>SD</b></td>
		<td colspan=20 align="left" valign=middle><b>Seguimiento departamental</b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><br></td>
	</tr>
	<tr>
		<td height="22" align="left" valign=middle><br></td>
		<td align="left" valign=middle><br></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b>ED</b></td>
		<td colspan=20 align="left" valign=middle><b>Evaluación diagnóstica</b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><br></td>
	</tr>
	<tr>
		<td height="22" align="left" valign=middle><br></td>
		<td align="left" valign=middle><br></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b>Efn</b></td>
		<td colspan=20 align="left" valign=middle><b>Evaluación formativa (competencia especifica)</b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><br></td>
	</tr>
	<tr>
		<td height="22" align="left" valign=middle><br></td>
		<td align="left" valign=middle><br></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b>ES</b></td>
		<td colspan=20 align="left" valign=middle><b>Evaluación sumativa</b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><br></td>
	</tr>
	<tr>
		<td height="4" align="left" valign=middle><br></td>
		<td align="left" valign=middle><br></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><br></td>
		<td align="left" valign=middle><br></td>
		<td align="left" valign=middle><br></td>
		<td align="left" valign=middle><br></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><br></td>
	</tr>
	<tr>
		<td height="11" align="left" valign=middle><br></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><br></td>
	</tr>
	<tr>
		<td height="5" align="left" valign=middle><br></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="center" valign=middle sdnum="2058;2058;D&quot; de &quot;MMMM&quot; de &quot;AAAA;@"><br></td>
		<td align="center" valign=middle sdnum="2058;2058;D&quot; de &quot;MMMM&quot; de &quot;AAAA;@"><br></td>
		<td align="center" valign=middle sdnum="2058;2058;D&quot; de &quot;MMMM&quot; de &quot;AAAA;@"><br></td>
		<td align="center" valign=middle sdnum="2058;2058;D&quot; de &quot;MMMM&quot; de &quot;AAAA;@"><br></td>
		<td align="center" valign=middle sdnum="2058;2058;D&quot; de &quot;MMMM&quot; de &quot;AAAA;@"><br></td>
		<td align="center" valign=middle sdnum="2058;2058;D&quot; de &quot;MMMM&quot; de &quot;AAAA;@"><br></td>
		<td align="center" valign=middle sdnum="2058;2058;D&quot; de &quot;MMMM&quot; de &quot;AAAA;@"><br></td>
		<td align="center" valign=middle sdnum="2058;2058;D&quot; de &quot;MMMM&quot; de &quot;AAAA;@"><br></td>
		<td align="center" valign=middle sdnum="2058;2058;D&quot; de &quot;MMMM&quot; de &quot;AAAA;@"><br></td>
		<td align="center" valign=middle sdnum="2058;2058;D&quot; de &quot;MMMM&quot; de &quot;AAAA;@"><br></td>
		<td align="center" valign=middle sdnum="2058;2058;D&quot; de &quot;MMMM&quot; de &quot;AAAA;@"><br></td>
		<td align="center" valign=middle sdnum="2058;2058;D&quot; de &quot;MMMM&quot; de &quot;AAAA;@"><br></td>
		<td align="center" valign=middle sdnum="2058;2058;D&quot; de &quot;MMMM&quot; de &quot;AAAA;@"><br></td>
		<td align="center" valign=middle sdnum="2058;2058;D&quot; de &quot;MMMM&quot; de &quot;AAAA;@"><br></td>
		<td align="center" valign=middle sdnum="2058;2058;D&quot; de &quot;MMMM&quot; de &quot;AAAA;@"><br></td>
		<td align="center" valign=middle sdnum="2058;2058;D&quot; de &quot;MMMM&quot; de &quot;AAAA;@"><br></td>
		<td align="center" valign=middle sdnum="2058;2058;D&quot; de &quot;MMMM&quot; de &quot;AAAA;@"><br></td>
		<td align="center" valign=middle sdnum="2058;2058;D&quot; de &quot;MMMM&quot; de &quot;AAAA;@"><br></td>
		<td align="center" valign=middle sdnum="2058;2058;D&quot; de &quot;MMMM&quot; de &quot;AAAA;@"><br></td>
		<td align="center" valign=middle sdnum="2058;2058;D&quot; de &quot;MMMM&quot; de &quot;AAAA;@"><br></td>
		<td align="left" valign=middle><br></td>
	</tr>
	<tr>
		<td height="34" align="center" valign=middle><b><br></b></td>
		<td style="border-bottom: 3px solid #ffffff; border-left: 3px solid #ffffff; border-right: 3px solid #ffffff" colspan=25 align="left" valign=middle bgcolor="#C6D9F1"><b>9- Fuentes de Información</b></td>
		<td align="left" valign=middle><b><br></b></td>
	</tr>
	<tr>
		<td height="4" align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="left" valign=bottom><b><br></b></td>
	</tr>
	<tr>
		<td height="47" align="center" valign=middle><b><br></b></td>
		<td style="border-bottom: 1px solid #254061" align="center" valign=middle><b><br></b></td>
		<td style="border-bottom: 1px solid #254061" colspan=24 align="left" valign=top><br></td>
		<td align="left" valign=bottom><b><br></b></td>
	</tr>
	<tr>
		<td height="25" align="left" valign=middle><br></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="left" valign=middle><br></td>
	</tr>
	<tr>
		<td height="25" align="left" valign=middle><br></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="left" valign=middle><br></td>
	</tr>
	<tr>
		<td height="31" align="left" valign=middle><br></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td colspan=9 align="center" valign=middle bgcolor="#C6D9F1"><b>Docente que imparte asignatura</b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="left" valign=middle><br></td>
	</tr>
	<tr>
		<td height="31" align="left" valign=middle><br></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td colspan=9 rowspan=2 align="center" valign=middle bgcolor="#F1F5F9"><br></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="left" valign=middle><br></td>
	</tr>
	<tr>
		<td height="31" align="left" valign=middle><br></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="left" valign=middle><br></td>
	</tr>
	<tr>
		<td height="31" align="left" valign=middle><br></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td colspan=9 align="center" valign=middle bgcolor="#F1F5F9"><i><br></i></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="left" valign=middle><br></td>
	</tr>
	<tr>
		<td height="31" align="left" valign=middle><br></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="center" valign=middle><b><br></b></td>
		<td align="left" valign=middle><br></td>
	</tr>
	<tr>
		<td height="30" align="left" valign=middle><br></td>
		<td align="center" valign=middle><br></td>
		<td colspan=10 align="center" valign=middle bgcolor="#C6D9F1"><b>Validó</b></td>
		<td align="left" valign=middle><b><br></b></td>
		<td align="center" valign=middle><br></td>
		<td align="center" valign=middle><br></td>
		<td align="center" valign=middle><br></td>
		<td colspan=10 align="center" valign=middle bgcolor="#C6D9F1"><b>Autorizó</b></td>
		<td align="left" valign=middle><br></td>
	</tr>
	<tr>
		<td height="24" align="left" valign=middle><br></td>
		<td align="center" valign=middle><br></td>
		<td colspan=10 rowspan=2 align="center" valign=middle bgcolor="#F1F5F9"><br></td>
		<td align="left" valign=middle><br></td>
		<td align="center" valign=middle><br></td>
		<td align="center" valign=middle><br></td>
		<td align="center" valign=middle><br></td>
		<td colspan=10 rowspan=2 align="center" valign=middle bgcolor="#F1F5F9"><br></td>
		<td align="left" valign=middle><br></td>
	</tr>
	<tr>
		<td height="24" align="left" valign=middle><br></td>
		<td align="center" valign=middle><br></td>
		<td align="left" valign=middle><br></td>
		<td align="center" valign=middle><br></td>
		<td align="center" valign=middle><br></td>
		<td align="center" valign=middle><br></td>
		<td align="left" valign=middle><br></td>
	</tr>
	<tr>
		<td height="46" align="left" valign=middle><br></td>
		<td align="center" valign=middle><br></td>
		<td colspan=10 align="center" valign=top bgcolor="#F1F5F9"><i><br></i></td>
		<td align="left" valign=top><br></td>
		<td align="center" valign=top><br></td>
		<td align="center" valign=top><br></td>
		<td align="center" valign=top><br></td>
		<td colspan=10 align="center" valign=top bgcolor="#F1F5F9"><i><br></i></td>
		<td align="left" valign=middle><br></td>
	</tr>
	<tr>
		<td height="24" align="left" valign=middle><br></td>
		<td align="center" valign=middle><br></td>
		<td colspan=10 align="center" valign=middle bgcolor="#F1F5F9"><i><font color="#000000"><br></font></i></td>
		<td align="left" valign=middle><br></td>
		<td align="center" valign=middle><br></td>
		<td align="center" valign=middle><br></td>
		<td align="center" valign=middle><br></td>
		<td colspan=10 align="center" valign=middle bgcolor="#F1F5F9"><i><br></i></td>
		<td align="left" valign=middle><br></td>
	</tr>
</table>

<br clear=left>
<!-- ************************************************************************** -->
</body>

</html>
';

// Instanciamos un objeto de la clase DOMPDF.
$pdf = new DOMPDF();
 
// Definimos el tamaño y orientación del papel que queremos.
$pdf->set_paper("A3", "portrait");
//$pdf->set_paper(array(0,0,104,250));
 
// Cargamos el contenido HTML.
$pdf->load_html($html);
 
// Renderizamos el documento PDF.
$pdf->render();
 
// Enviamos el fichero PDF al navegador.
$pdf->stream('Tema.pdf');

function file_get_contents_curl($url) {
	$crl = curl_init();
	$timeout = 5;
	curl_setopt($crl, CURLOPT_URL, $url);
	curl_setopt($crl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($crl, CURLOPT_CONNECTTIMEOUT, $timeout);
	$ret = curl_exec($crl);
	curl_close($crl);
	return $ret;
}
?>