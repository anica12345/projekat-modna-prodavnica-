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
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .cart-item {
            margin-bottom: 10px;
        }
        .btn-secondary {
            background-color: #2E8B57 !important;
            color: #444 !important;
            border: none !important;
        }
        .btn-secondary:hover {
            background-color: #276747 !important;
            color: #444 !important;
        }
    </style>
</head>
<body>
<div class="container cart-container">
    <h2 class="text-center mb-4">Vaša korpa</h2>
    <?php if (empty($_SESSION['cart'])): ?>
        <div class="alert alert-info" role="alert">
            Korpa je prazna.
        </div>
    <?php else: ?>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Proizvodi u korpi</h5>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Naziv proizvoda</th>
                                <th>Cena</th>
                                <th>Boja</th>
                                <th>Opcije</th>
                            </tr>
                        </thead>
                        <tbody>
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

                            foreach ($_SESSION['cart'] as $item): 
                                $naziv = $item;
                                $cena = $proizvodi[$item]['cena'];
                                $boja = $proizvodi[$item]['boja'];
                            ?>
                            <tr>
                                <td><?php echo $naziv; ?></td>
                                <td><?php echo $cena; ?> EUR</td>
                                <td><?php echo $boja; ?></td>
                                <td>
                                    <form action="cart.php" method="POST">
                                        <input type="hidden" name="product" value="<?php echo $item; ?>">
                                        <input type="hidden" name="action" value="remove">
                                        <button type="submit" class="btn btn-danger btn-sm">Ukloni</button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php 
$ukupna_cena = 0;
foreach ($_SESSION['cart'] as $item): 
    $cena = $proizvodi[$item]['cena'];
    $ukupna_cena += $cena;
endforeach;
?>

        <p class="mt-3">Ukupna cena: <?php echo $ukupna_cena; ?> EUR</p>
    <?php endif; ?>
    <a href="torbe.php" class="btn btn-secondary mt-3">Nastavi kupovinu</a>
</div>
</body>
</html>
