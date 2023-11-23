<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/logo.png">
    <link rel="stylesheet" href="styles/diseño.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>CyberBook Secure</title>
    <style>
        /* Estilos para las cards */
        .card {
            display: flex;
            border: 1px solid #ccc;
            padding: 10px;
            margin: 10px;
            width: auto;
            border-radius: 10px;
        }

        .card-content {
            display: flex;
            flex-wrap: wrap;
        }

        img {
            max-width: 80px;
            height: auto;
            margin-right: 10px;
            /* Espacio entre la imagen y el nombre */
        }

        h5 {
            margin: 0;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar">
            <div class="nav1">
                <div class="navbar-brand">
                    <img class="logonavbar" src="images/logo.png">
                </div>

                <div class="searchdiv">
                    <form action="resultados.php" method="post">
                        <input class="inputsearch" id="search" name="search" type="text"
                            placeholder="Buscar en CyberBook" maxlength="20" minlength="1" onkeyup="this.value=filtroNumLet(this.value)">
                    </form>

                </div>
            </div>
            <div class="nav2">
                <a href="index.html"><img class="iconNavbar" src="images/home.png"> </a>
                <a><img class="iconNavbar" src="images/videos.png"> </a>
                <a><img class="iconNavbar" src="images/market.png"> </a>
                <a><img class="iconNavbar" src="images/grupo.png"> </a>
                <a><img class="iconNavbar" src="images/match.png"> </a>
            </div>
            <div class="navbar-menu">
                <a> <img class="iconNavbar" src="images/msj.png"> </a>
                <a> <img class="iconNavbar" src="images/noti.png"> </a>
                <a> <img class="iconNavbar" src="images/avatar.png"> </a>
            </div>
        </nav>

    </header>

    <div class="containerAll">
        <div class="left">
            <h5>My name</h5>
            <br>
            <h5>Amigos</h5>
            <br>
            <h5>Eventos</h5>
            <br>
            <h5>Recuerdos</h5>
            <br>
            <h5>Guardados</h5>
            <hr>
        </div>
        <div class="center">
            <div class="carrusel">
                <?php
                if (isset($_POST["search"])) {
                    $termino_busqueda = htmlspecialchars($_POST["search"]);//Sanitizar el input
                
                    // Validar la longitud del término de búsqueda
                    if (strlen($termino_busqueda) < 1 || strlen($termino_busqueda) > 20) {
                        echo "<p>El término de búsqueda debe tener de 1 a 20 caracteres.</p>";
                    } else {
                        // Validar caracteres permitidos (por ejemplo, solo letras y números)
                        if (!preg_match("/^[a-zA-Z0-9]+$/", $termino_busqueda)) {
                            echo "<p>El término de búsqueda solo puede contener letras y números.</p>";
                        } else {
                
                            // Imprimir los resultados
                            echo "<h2>Resultados de la búsqueda para '" . $termino_busqueda . "':</h2>";
                            echo "<p>Aquí irían los resultados obtenidos de la base de datos.</p>";
                        }
                    }
                } else {
                    echo "<p>No se ha proporcionado un término de búsqueda.</p>";
                }
                ?>
                <hr>
                <h4>Sugerencias de amigos</h4>
                <div id="animalesContainer"></div>

            </div>
        </div>
        <div class="right">
            <h5>Publicidad</h5>
            <br>
            <h5>Cumpleaños</h5>
            <br>
            <h5>Contactos</h5>
        </div>
    </div>

    <script>
        //       
        function filtroNumLet(string) {
        let out = '';
        let filtro = '0123456789ABCDEFGHIJKLMNÑOPQRSTUVWXYZabcdefghijklmnñopqrstuvwxyz ';
        for (let i = 0; i < string.length; i++)
            if (filtro.indexOf(string.charAt(i)) != -1)
                out += string.charAt(i);
        return out;
        }
        //
        //Obtener datos de animales desde un servidor o almacenarlos localmente
        fetch('animals.json')
            .then(response => response.json())
            .then(data => {
                // Mapear cada objeto JSON a un div HTML y agregarlo al contenedor
                data.forEach(animal => {
                    var card = document.createElement("div");
                    card.classList.add("card");

                    // Contenido de la card
                    var cardContent = document.createElement("div");
                    cardContent.classList.add("card-content");

                    var imagen = document.createElement("img");
                    imagen.src = animal.imagen;
                    imagen.alt = animal.nombre;

                    var nombre = document.createElement("h5");
                    nombre.textContent = animal.nombre;

                    // Agregar la imagen y el nombre al contenido de la card
                    cardContent.appendChild(imagen);
                    cardContent.appendChild(nombre);

                    // Agregar el contenido a la card
                    card.appendChild(cardContent);

                    // Agregar la card al contenedor
                    document.getElementById("animalesContainer").appendChild(card);
                });
            })
            .catch(error => console.error('Error al obtener los datos:', error));
    </script>

</body>

</html>