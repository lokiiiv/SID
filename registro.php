<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>

<!--------------------
--------------------->

<!--META-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LOGIN</title>

<!--STYLESHEETS-->
<link href="css/style.css" rel="stylesheet" type="text/css" />

<!--SCRIPTS-->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script>
<!--Slider-in icons-->
<script type="text/javascript">
		$(document).ready(function() {
			$(".username").focus(function() {
				$(".user-icon").css("left","-48px");
			});
			$(".username").blur(function() {
				$(".user-icon").css("left","0px");
			});
			
			$(".password").focus(function() {
				$(".pass-icon").css("left","-48px");
			});
			$(".password").blur(function() {
				$(".pass-icon").css("left","0px");
			});
		});
		//comentario aqui

		$("#enviar").on("click",function formulario() {
			if ($("#nombre")[0].value=="" || $("#contra")[0].value=="") {
				alert("Falta algo");
				return false;
			}
			return true;
		});

		
</script>

</head>
<body>

<!--WRAPPER-->
<div id="wrapper">

	<!--SLIDE-IN ICONS-->
    <div class="user-icon"></div>
    <div class="pass-icon"></div>
    <!--END SLIDE-IN ICONS-->

<!--LOGIN FORM-->
<form name="login-form" class="login-form" action="insertara.php" method="POST" >

	<!--HEADER-->
    <div class="header">
    <!--TITLE--><h1>Registro</h1><!--END TITLE-->
    <!--DESCRIPTION--><span>Llena todos los campos. En la parte de 'Puesto' selecciona 1 si eres docente o 3 si eres Jefe de división.</span><!--END DESCRIPTION-->
    </div>
    <!--END HEADER-->
	
	<!--CONTENT-->
    <div class="content">
	<!--USERNAME--><label for="nombre">Email</label>
									<input type="text" name="email" class="form-control" id="email" autofocus required placeholder="Ingresa tu e-mail"><!--END USERNAME-->
    <!--PASSWORD--><label for="email">Usuario</label>
									<input type="text" name="nombre" class="form-control" id="nombre"  required placeholder="Escribe tu nombre"><!--END PASSWORD-->
					<label for="usuario">Pass</label>
									<input type="password" name="pass" class="form-control" id="pass" autofocus required placeholder="********">
					<label for="password">Puesto</label>
									<select class="form-control color" id="privi" name="privi"  >
                                                        <option>&nbsp;</option>
                                                        <option value='1'>1</option>
                                                        
                                                        <option value='3'>3</option>
                                                        
                                                        </select>
    </div>
    <!--END CONTENT-->
    
    <!--FOOTER-->
    <div class="footer">
    <!--LOGIN BUTTON-->
    <input type="submit" value="Registrar" id="regis" name="regis" class="button">
      <!--END LOGIN BUTTON-->
    <!--REGISTER BUTTON--><!--input type="submit" name="submit" value="Register" class="register" /--><!--END REGISTER BUTTON-->
    </div>
    <!--END FOOTER-->

</form>
<!--END LOGIN FORM-->

</div>
<!--END WRAPPER-->

<!--GRADIENT--><div class="gradient"></div><!--END GRADIENT-->

</body>
</html>