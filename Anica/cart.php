<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_POST['action'])) {
    $action = $_POST['action'];
    $product = $_POST['product'];

    switch ($action) {
        case 'add':
            $_SESSION['cart'][] = $product;
            break;
        case 'remove':
            if (($key = array_search($product, $_SESSION['cart'])) !== false) {
                unset($_SESSION['cart'][$key]);
            }
            break;
    }
}
?>

<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Korpa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('mara.jpg.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            font-family: 'Roboto', sans-serif;
        }
        .cart-container {
            margin-top: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .cart-item {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .cart-item h4 {
            color: #332b1a;
        }
        .cart-item .cena,
        .cart-item .boja {
            color: #555;
        }
        .cart-item button {
            float: right;
        }
        .btn-secondary {
            background-color: #2E8B57 !important;
            color: #444 !important;
            border: none !important;
        }
        .btn-secondary:hover {
            background-color: #2E8B57 !important;
            color: #444 !important;
        }
    </style>
</head>
<body>
<div class="container cart-container">
    <h2>Vaša korpa</h2>
    <?php if (empty($_SESSION['cart'])): ?>
        <p>Korpa je prazna.</p>
    <?php else: ?>
        <ul class="list-group">
            <?php 
            
            $proizvodi = array(
                "Diesel" => array("cena" => 450, "boja" => "roze"),
                "Diesel" => array("cena" => 420, "boja" => "zlatna"),
                "Diesel" => array("cena" => 350, "boja" => "roze"),
                "Dior" => array("cena" => 1080, "boja" => "crna"),
                "Dior" => array("cena" => 1290, "boja" => "braon"),
                "Louis Vuitton" => array("cena" => 2450, "boja" => "braon"),
                "Chanel" => array("cena" => 850, "boja" => "crna"),
                "Valentino" => array("cena" => 780, "boja" => "zuta")
            );

            $ukupna_cena = 0;
            foreach ($_SESSION['cart'] as $item): 
                $naziv = $item;
                $cena = $proizvodi[$item]['cena'];
                $boja = $proizvodi[$item]['boja'];
                $ukupna_cena += $cena;
            ?>
                <li class="list-group-item cart-item">
                    <h4><?php echo $naziv; ?></h4>
                    <p class="cena">Cena: <?php echo $cena; ?> EUR</p>
                    <p class="boja">Boja: <?php echo $boja; ?></p>
                    <form action="cart.php" method="POST" style="display: inline;">
                        <input type="hidden" name="product" value="<?php echo $item; ?>">
                        <input type="hidden" name="action" value="remove">
                        <button type="submit" class="btn btn-danger">Ukloni</button>
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>
        <p>Ukupna cena: <?php echo $ukupna_cena; ?> EUR</p>

    <?php endif; ?>
    <a href="main2.php" class="btn btn-secondary mt-3">Nastavi kupovinu</a>
</div>
</body>
</html>
