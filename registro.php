<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
</head>
<body>
        <?php
            //recolectar información del formulario
            $nombre = $_POST["nombre"];
            $apellido = $_POST["apellido"];
            $email = $_POST["email"];
            $celular = $_POST["celular"];
            $usuario = $_POST["Usuario"];
            $pass = $_POST["Pass"];
            // Crear vector de almacenamiento en firebase
            $data = '{"Usuario":"'.$usuario.'","Pass":"'.$pass.'","nombre":"'.$nombre.'",
            "apellido":"'.$apellido.'","email":"'.$email.'","celular":"'.$celular.'"}';
            // Url de firebase de realtime
            $url = 'https://act-5y6-default-rtdb.firebaseio.com/prueba.json';
            // Inicio de comunicación por curl
            $ch = curl_init();
            curl_setopt($ch,CURLOPT_URL,$url);
            curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
            curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
            curl_setopt($ch,CURLOPT_POST,1);
            curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
            curl_setopt($ch,CURLOPT_HTTPHEADER,array('Content-Type: text/plain'));

            $response = curl_exec($ch);
            if(curl_errno($ch))
            {
                echo 'Error:'.curl_errno($ch);
            }
            else
            {
                echo '
                    <center>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <h1>Felicidades registro exitoso, puedas dar click en el boton para ingresar con tu cuenta</h1>
                                <a class="btn btn-primary btn-lg mr-3 mb-3" href="loginhtml.php" role="button" >Iniciar Sesion</a>                                
                            </div>
                        </div>
                    </div>
                    </center>';
               
            }
        ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    
</body>
</html>