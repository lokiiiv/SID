 <?php 
$fechaA = $_POST['fechaA'];
$dura = $_POST['dura'];
echo "$dura";
echo "<br>";
echo "$fechaA";
$Evid=$_POST['Evid'];  echo "$Evid";
$nomdoce = $_POST['nomdoce']; echo "$nomdoce";
$it1 = $_POST['it1']; echo "$it1";
$it0 = $_POST['it0+count']; echo "$it0";
?> 

<!DOCTYPE html>
<html>
<head>
	<title>imprimir</title>
</head>
<body>

<div class="col-md-3" > <h4> <font color ="#RRVAA">Fecha de aplicación:
                  </font> <input type="text" id="fechaA" name="fechaA" style="width: 70%; height: 2em" value="<?php echo date("m/d/Y"); ?>" size="10" readonly="readonly" /> </h4> </div>

                   <div class="col-md-3 " ><h4><font color ="#RRVAA">Duración:
                  </font><input id="dura" name="dura" style="width: 95%; height: 2em" readonly="readonly" value="10"> </h4> </div>

                <div class="col-md-6 "> <h4> <font color ="#RRVAA">Evidencia: </font> <input  id="Evid" name="Evid" style="width: 100%; height: 2em"  readonly="readonly" value="Exposición" > </h4> </div>
                <input type="submit" value="enviar">

</body>
</html>






