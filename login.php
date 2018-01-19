<?php 

session_start();
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="">

    <title>Log-In</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/login.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<div class="container" style="margin-top:40px">
  <div class="row">
    <div class="col-sm-6 col-md-4 col-md-offset-4">
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong> Log-In</strong>
        </div>
        <div class="panel-body">
          <form role="form" action="#" method="POST">
          <fieldset>
          <div class="row">
              <div class="center-block">
                <img class="profile-img" src="img/login.jpg" alt="">
              </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-10  col-md-offset-1 ">
                  <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon">
			 <i class="glyphicon glyphicon-user"></i>
			</span>
                          <input class="form-control" placeholder="Nombre de Usuario" name="loginname" type="text" required autofocus>
                      </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon">
			   <i class="glyphicon glyphicon-lock"></i>
                          </span>
                          <input class="form-control" placeholder="Contraseña" name="password" type="password" value="" required>
                        </div>
                        </div>
                          <div class="form-group">
                              <input type="submit" class="btn btn-lg btn-primary btn-block" value="Ingresar">
                          </div>
                    </div>
                </div>
                </fieldset>
                </form>
              </div>
                <div class="panel-footer ">
                    No olvides iniciar sesión! <a href="#" onClick=""> Iniciar Aquí  </a>
                </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>

<?php 

  include("conectar.php");
  if($_POST){

    $usuario = $_POST["loginname"];
    $clave = $_POST["password"];

    $sql_user = "SELECT * FROM usuario WHERE usuario = '$usuario' AND clave = '$clave'";
    $consulta = mysqli_query($link,$sql_user);
    $contar = mysqli_num_rows($consulta);
    $user = mysqli_fetch_array($consulta);
    $id_user = $user["id_usuario"];
    $nombre = $user["nombre"];
    $tipo = $user["tipo_usuario"];
    if($contar > 0){
        $_SESSION["login"] = "OK";
        $_SESSION["id_user"] = $id_user;
        $_SESSION["nombre"] = $nombre;
        $_SESSION["tipo"] = $tipo;

        header("Location:dashboard.php");
        mysqli_close($link);
        die();

     }else{
      echo "<script>alert('usuario o calve son incorrectos')</script>";
      mysqli_close($link);
     }
  }

 ?>

