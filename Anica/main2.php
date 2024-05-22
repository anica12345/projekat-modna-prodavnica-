<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('mara.jpg.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            font-family: 'Roboto', sans-serif;
        }
        
        .navbar-brand img {
            height: 50px;
            width: 50px;
        }
        .navbar-nav .nav-link {
            color: #444 !important;
        }
        .navbar-nav .nav-link.cart-btn {
            color: #444 !important;
        
        }
        .container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 5px;
        }
        .product {
            background-color: rgba(255, 255, 255, 0.8);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 20px;
            transition: 0.5s;
        }
        .product:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }
        .product h4 {
            font-size: 18px;
            margin-bottom: 10px;
            color: #332b1a;
        }
        .product p {
            font-size: 14px;
            color: #555;
        }
        .img-fluid {
            height: 300px !important;
            width: 300px !important;
            object-fit: cover;
            border-radius: 5px;
        }
        footer {
            background-color: #BEBEBE;
            padding: 20px 0;
            margin-top: 40px;
            text-align: center;
            width: 100%;
        }
        footer h4 {
            font-size: 16px;
            margin-bottom: 10px;
            color: #332b1a;
        }
        footer p {
            font-size: 14px;
            margin-bottom: 5px;
            color: #332b1a;
        }
        footer .list-inline-item a {
            color: #332b1a;
            text-decoration: none;
            
        }
        footer .list-inline-item a:hover {
            text-decoration: underline;
            
        }
    </style>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="mara.jpg.jpg" alt="Logo" style="height: 50px; width: auto;">
            </a>
            <a class="navbar-brand" href="#" style="position: absolute; left: 50%; transform: translateX(-50%); font-family: 'Open Sans', sans-serif;">
    <span style="color: black; font-weight: bold;">TORBE</span>
</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Proizvodi
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Torbe</a>
                <a class="dropdown-item" href="#">Pantalone</a>
                <a class="dropdown-item" href="#">Haljine</a>
                <a class="dropdown-item" href="#">Majice</a>
            </div>
        </li>
                    
                    <li class="nav-item">
                        <a class="nav-link cart-btn" href="cart.php">Korpa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link cart-btn" href="logout.php">Odjava</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<div class="container">
    
    <div class="row">
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "baza_anica";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Neuspela konekcija na bazu: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM tasne";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='col-md-3'>";
                echo "<div class='product'>";
                echo "<h4>" . $row['ime'] . "</h4>";
                echo "<p><strong>Cena:</strong> " . htmlspecialchars($row['cena']) . " EUR</p>"; 
                echo "<img src='" . $row['slika'] . "' alt='" . $row['ime'] . "' class='img-fluid'>";
                echo "<p>" . $row['opis'] . "</p>";
                

                $boja = $row['velicine'];
                switch ($boja) {
                    case "roze":
                        echo "<p><strong>Boja:</strong> <span style='color: pink;'>&#11044;</span> Roze</p>";
                        break;
                    case "crna":
                        echo "<p><strong>Boja:</strong> <span style='color: black;'>&#11044;</span> Crna</p>";
                        break;
                    case "zlatna":
                        echo "<p><strong>Boja:</strong> <span style='color: gold;'>&#11044;</span> Zlatna</p>";
                        break;
                    case "braon":
                        echo "<p><strong>Boja:</strong> <span style='color: brown;'>&#11044;</span> Braon</p>";
                        break;
                    case "bela":
                        echo "<p><strong>Boja:</strong> <span style='color: white;'>&#11044;</span> Bela</p>";
                        break;
                    case "plava":
                        echo "<p><strong>Boja:</strong> <span style='color: blue;'>&#11044;</span> Plava</p>";
                        break;
                    case "zelena":
                        echo "<p><strong>Boja:</strong> <span style='color: green;'>&#11044;</span> Zelena</p>";
                        break;
                    case "crvena":
                        echo "<p><strong>Boja:</strong> <span style='color: red;'>&#11044;</span> Crvena</p>";
                        break;
                    case "zuta":
                        echo "<p><strong>Boja:</strong> <span style='color: yellow;'>&#11044;</span> Žuta</p>";
                        break;
                    default:
                        echo "<p><strong>Boja:</strong> " . $boja . "</p>";
                }
                echo "<form action='cart.php' method='POST' style='display: inline;'>";
                echo "<input type='hidden' name='product' value='" . $row['ime'] . "'>";
                echo "<input type='hidden' name='action' value='add'>";
                echo "<button type='submit' class='btn btn-light' style='background-color: #2E8B57; border: none; color: #444;'>Dodaj u korpu</button>";

                
                echo "</form>";
                echo "</div>";
                echo "</div>"; 
            }
        } else {
            echo "Nema proizvoda u bazi.";
        }

        $conn->close();
        ?>
    </div>
</div>
<footer>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h4>Lokacija</h4>
            <p>Miloja Pavlovica bb, Kragujevac, Srbija</p>
        </div>
        <div class="col-md-4">
            <h4>Telefon</h4>
            <p>+1234567890</p>
        </div>
        <div class="col-md-4">
            <h4>Radno vreme</h4>
            <p>Ponedeljak - Petak, 9:00 - 17:00</p>
        </div>
    </div>
    <hr style="border-top: 1px solid #444;">
    <div class="row">
        <div class="col-md-12 text-center">
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#" style="color: #332b1a;">Instagram</a></li>
                <li class="list-inline-item"><a href="#" style="color: #332b1a;">Twitter</a></li>
                <li class="list-inline-item"><a href="#" style="color: #332b1a;">Facebook</a></li>
            </ul>
        </div>
    </div>
</div>
    </footer>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>