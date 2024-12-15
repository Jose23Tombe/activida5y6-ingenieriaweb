<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <nav class="navbar navbar-expand-lg bg-body-tertiary"data-bs-theme="dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.html">DRAGVOU</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>
                    
          </div>
        </div>
    </nav>

    <br>
    <br>
    <br>


</head>
<body>
<center><h4>Bienvenidos a Dragvou- Galeria de imagenes</h4> <br></center>
<div class="container">
        <div class="card">
          <form action="" method="post">
            <div class="mb-3">
              <center><label for="exampleInputEmail1" class="form-label">Usuario</label></center>
              <input type="text" name="Usuario" class="form-control" id="Usuario" aria-describedby="emailHelp">
            </div>
              <div class="mb-3">
                <center><label for="exampleInputPassword1" class="form-label">Password</label></center>
                <input type="password" name="Pass" class="form-control" id="Pass">
              </div>
            <center><button type="submit" name="boton" class="btn btn-primary">Ingresar</button></center>
        </div>
      </form>
      
      <?php
        session_start();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Obtener el valor del campo 'usuario' del formulario
            $Usuario = $_POST['Usuario'];
            $pass = $_POST['pass'];
            

            // URL de tu base de datos de Firebase Realtime Database
            $url = 'https://act-5y6-default-rtdb.firebaseio.com/prueba.json'; // Reemplaza con tu URL

            // Inicializar cURL
            $ch = curl_init();

            // Configurar cURL para hacer una solicitud GET
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Para devolver el resultado de la solicitud
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Desactivar verificación SSL si es necesario

            // Ejecutar la solicitud
            $response = curl_exec($ch);

            // Verificar si hubo algún error en la solicitud cURL
            if (curl_errno($ch)) {
                echo 'Error: ' . curl_error($ch);
            } else {
                // Decodificar la respuesta JSON
                $data = json_decode($response, true);

                $registroEncontrado = false;
                // Buscar el registro con el usuario ingresado
                foreach ($data as $key => $record) {
                    if (strcasecmp($record['Usuario'], $Usuario) === 0 && strcasecmp($record['pass'], $pass) === 0){     
                      $registroEncontrado = true;
                        $_SESSION['pass'] = $pass;
                        header("Location: paginaprincipalhtml.php"); // Redirigir a la página principal
                        break;
                    }
                }

                if (!$registroEncontrado) {
                    echo '<p>usuario o contraseña incorrectos </p>';
                }
                
            }

            // Cerrar cURL
            curl_close($ch);
        }
    
        ?>






<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>
</html>