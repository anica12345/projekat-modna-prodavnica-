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
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
        }
        .navbar {
            padding: 1rem 2rem;
            background-color: white;
            border-bottom: 1px solid #e5e5e5;
        }
        .navbar-brand {
            font-size: 24px;
            font-weight: bold;
        }
        .navbar-brand img {
            height: 50px;
            width: 50px;
        }
        .navbar-nav .nav-link {
            font-size: 18px;
            color: #333;
        }
        .navbar-nav .nav-link.cart-btn {
            color: #444 !important;
        }
        .hero-section {
            position: relative;
            height: 100vh;
            background: url('mara.jpg.jpg') center center/cover no-repeat;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            filter: brightness(80%);
        }
        .hero-section::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: inherit;
            filter: blur(8px);
            z-index: -1;
        }
        .hero-section h1 {
            color: #f1c40f; 
            font-size: 60px;
            font-family: 'Playfair Display', serif;
            text-transform: uppercase;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            margin: 0;
            padding: 0 20px;
            text-align: center;
        }
        .container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 5px;
        }
        .products-section {
            padding: 3rem 2rem;
            background-color: #f8f8f8;
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
        .product img {
            height: 300px !important;
            width: 300px !important;
            object-fit: cover;
            border-radius: 5px;
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
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="#">
        <img src="mara.jpg.jpg" alt="Logo" style="height: 50px; width: auto;">
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
                    <a class="nav-link" href="login.php">Prijavite se</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="register.php">Registrujte se</a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<section class="hero-section">
    <h1>Mesto dobre kupovine</h1>
</section>
<section class="products-section">
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
                    echo "<div class='col-md-4'>";
                    echo "<div class='product'>";
                    echo "<img src='" . htmlspecialchars($row['slika']) . "' alt='" . htmlspecialchars($row['ime']) . "' class='img-fluid'>";
                    echo "<h4>" . htmlspecialchars($row['ime']) . "</h4>";
                    echo "<p><strong>Cena:</strong> " . htmlspecialchars($row['cena']) . " EUR</p>";
                    echo "<p>" . htmlspecialchars($row['opis']) . "</p>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "<p>Nema proizvoda u bazi.</p>";
            }

            $conn->close();
            ?>
        </div>
    </div>
</section>
<footer>
    <div class="container">
        <p>&copy; 2024 MARA. Sva prava zadržana.</p>
        <ul class="list-inline">
            <li class="list-inline-item"><a href="#">Instagram</a></li>
            <li class="list-inline-item"><a href="#">Twitter</a></li>
            <li class="list-inline-item"><a href="#">Facebook</a></li>
        </ul>
    </div>
</footer>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
