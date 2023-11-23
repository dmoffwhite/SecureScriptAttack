<!DOCTYPE html>
<html lang="es">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./images/logo.png">
    <link rel="stylesheet" href="styles/diseño.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>CyberBook</title>
    <script>
        //Redirigir a index.html después de 3 segundos
        setTimeout(function () {
            window.location.href = 'index.html';
        }, 3000); 
    </script>
    <style>
        body{
            background-color: #282829;
            color: white;
        }
    </style>
</head>

<body>
    
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["inputcomen"])) {
            $comentario = htmlspecialchars($_POST["inputcomen"]);
            
            if (!empty($comentario)) {
                echo "<h2>¡Mensaje enviado con éxito!</h2>";
                echo "<p>Comentario: $comentario</p>";
                
            }else{
                echo "El comentario no puede estar vacío.";
                exit();
            }
        } else {
            echo "Campo no presente en la solicitud.";
            exit();
        }
    }
    ?>
</body>

</html>
