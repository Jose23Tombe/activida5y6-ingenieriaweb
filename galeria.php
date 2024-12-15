<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $album = $_POST['album'];
    $tags = explode(',', $_POST['tags']);
    $image = $_FILES['imagen'];

    if ($image['error'] === UPLOAD_ERR_OK) {
        $firebase = getFirebase();
        $storage = $firebase->getStorage();
        $database = $firebase->getDatabase();

        // Subir la imagen al almacenamiento de Firebase
        $bucket = $storage->getBucket();
        $imageName = uniqid() . '-' . $image['nombre'];
        $file = $bucket->upload(
            file_get_contents($image['tmp_nombre']),
            ['nombre' => 'imagen/' . $imageName]
        );

        // Guardar imagenes en la base de datos
        $imageUrl = $file->info()['mediaLink'];
        $database->getReference('imagen')->push([
            'album' => $album,
            'tags' => $tags,
            'url' => $imageUrl,
            'comments' => []
        ]);

        echo "Imagen subida exitosamente.";
    } else {
        echo "Error al subir la imagen.";
    }
} else {
    echo "Método no permitido.";
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tag = trim($_POST['tag']);
    $firebase = getFirebase();
    $database = $firebase->getDatabase();

    $images = $database->getReference('images')->getValue();

    echo "<h1>Resultados de búsqueda</h1>";
    foreach ($images as $image) {
        if (in_array($tag, $image['tags'])) {
            echo "<div>";
            echo "<img src='{$image['url']}' alt='Imagen' style='max-width:300px;'><br>";
            echo "Álbum: {$image['album']}<br>";
            echo "Etiquetas: " . implode(', ', $image['tags']) . "<br>";
            echo "</div><hr>";
        }
    }
} else {
    echo "Método no permitido.";
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $imageUrl = $_POST['image_url'];
    $comment = $_POST['comment'];

    $firebase = getFirebase();
    $database = $firebase->getDatabase();

    // Buscar la imagen por URL y añadir el comentario
    $images = $database->getReference('images')->getValue();
    foreach ($images as $key => $image) {
        if ($image['url'] == $imageUrl) {
            $database->getReference('images/' . $key . '/comments')->push($comment);
            echo "Comentario añadido.";
            break;
        }
    }
} else {
    echo "Comentario invalido.";
}
