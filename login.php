<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <title>Zircon</title>
</head>
<body>

    <div class="contenedor">
      <div class="cart1">
          <img src="img/zircon-logo.png" class="logozir">
          <div class="contxt">
<img src="img/logo-inversf.png" class="logoinver">
<h2>bienvenido </h2>
</div>
      </div>
      <div class="cart2">
          <form action="funcionesphp/login.php" method="post" class="formlogin">
              <h2>login</h2>
              <input type="text" placeholder="Usuario" name="usr" required>
              <input type="password" placeholder="Contraseña" name="pass" required>
              <input type="submit" value="Ingresar">
          </form>
      </div>
    </div>
</body>
</html>