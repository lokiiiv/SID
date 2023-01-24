 <?php 
                   session_start();
                    $_SESSION['CARGADO']="Okay";
                 ?>


<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Barra de progreso con jQuery Demo</title>



<link rel="stylesheet" href="css/font-awesome.min.css">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" href="css/styles.css">
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>


<script>
$(document).ready(function() {
    var percent = 0;
    
    timerId = setInterval(function() {
        //increment progress bar
        percent += 25;
        $('.progress-bar').css('width', percent+'%');
        $('.progress-bar').attr('aria-valuenow', percent);
        $('.progress-bar').text(percent+'%');

        //complete
        if (percent == 100) {
            clearInterval(timerId);
            $('.information').show();
        }

    }, 1000);
});
</script>
</head>

<body>
    <div class="row">
        <div id="content" class="col-lg-3" style="margin-left: auto; margin-right: auto;">
            <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
            </div>
            <br/>
            <div class="information" style="display:none;">              
                <div class="alert alert-info">CARGADO EXITOSAMENTE!</div>

            </div>
             <form method="post" action="index.php">

        <input type="submit" value ="Continuar">   
        </form>
        </div>
       
    </div>
</body>
</html>
