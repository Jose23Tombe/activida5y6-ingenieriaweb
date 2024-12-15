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


<style>
    body{
        background-color: #0083b8
;
    }
    .container-1{
        text-align: center;
        color: white;
        border: 1px solid black;
        padding: 20px
    }
    .container-fluid{
        text-align: center;
        color: white;
        border: 1px ;
        padding: 20px
    }
    .container-fluid2{
        text-align: center;
        justify-content: flex-end;
        color: white;
        border: 1px ;
        padding: 0px
    }
    .container-2{
        text-align: center;
        color: white;
        border: 1px ;
        padding: 20px
    }
    .containers{
        text-align: left;
        color: white;
        border: 1px ;
        padding: 20px
    }


</style>
</head>
<body>
     <br>
     <div class ="containers">
     <?php
      echo'
        <form method="POST" action= "cerrar_sesion.php">
            <button type="submit" class=""btn btn-success">Cerrar Sesion</button>
        </form>';
        ?>    
<div class="container">
    <center><h1>Gestión de imagenes</h1></center>

<br>
  
<div class="container-1">
    <h1>Subir Imagen</h1><br><br>
    <div class="container-fluid">
       <form action="" method="POST" enctype="multipart/form-data">
            <label for="imagen" class="font-montserrat">Selecciona una imagen:</label>
            <input type="file" name="imagen" id="imagen" required><br><br><br>
            <div class="container-fluid2"> 
                    <label><center>Comentarios:</center></label><br>
                    <textarea name="description" required></textarea>
                    <div class="container-2">
                    <label for="album">Selecciona un álbum:</label><br>
                    <select name="album_id" id="album"><br>
                        <option value="1">Vacaciones</option>
                        <option value="2">Familia</option>
                        <option value="2">Trabajo</option>
                        <option value="2">Privadas</option>
                    </select><br><br>
                    <label for="etiquetas">Etiquetas (separadas por comas):</label><br>
                    <input type="text" name="etiquetas" id="etiquetas" placeholder="paisaje, playa, verano"><br><br>

                    <button type="submit" class="btn btn-success">Subir Imagen</button>

            </div>
            </form>
     </div><br><br>
        
</div><br><br>

        
</div>

    




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>


</body>
</html>


