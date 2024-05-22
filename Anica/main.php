
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
</head>
<style>
body {
    background-image: url('mara.jpg.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    color: #444;
    font-family: 'Roboto', sans-serif;
    text-align: center;
}

.container {
    margin-top: 50px;
    width: 100%;
    max-width: 400px;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    background-color: rgba(255, 255, 255, 0.8);
    border-radius: 5px;
}

h2 {
    color: #333;
    margin-bottom: 20px;
}

label {
    color: #666;
}

.form-control {
    border-color: #ccc;
}

.btn-primary {
    background-color: #2E8B57;
    border-color: #2E8B57;
    width: 100%;
    margin-top: 10px;
    color: #444;
}

.btn-primary:hover {
    background-color: #276747;
    border-color: #276747;
}

.btn-secondary {
    background-color: #2E8B57;
    border-color: #2E8B57;
    width: 100%;
    margin-top: 10px;
    color: #444;
}

.btn-secondary:hover {
    background-color: #276747;
    border-color: #276747;
}

.alert-danger {
    background-color: #FFCCCC;
    border-color: #FF3333;
    color: #FF3333;
    text-align: center;
    padding: 10px;
    margin-top: 10px;
    border-radius: 5px;
}

p {
    margin-top: 20px;
}

a {
    color: #6CA6CD;
    text-decoration: none;
}

a:hover {
    color: #053488;
}
</style>

<body>
        <div class="container">
            <h2>Prijavite se</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <div class="form-group">
                    <label for="username">Korisničko ime:</label>
                    <input type="text" class="form-control" id="username" name="username">
                </div>
                <div class="form-group">
                    <label for="password">Lozinka:</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <button type="submit" class="btn btn-primary">Prijavite se</button>
                <a href="main.php" class="btn btn-secondary">Povratak</a>
            </form>
            <p>Nemate nalog? <a href="register.php">Registrujte se ovde</a></p>
        </div>
    
        <?php
            
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "baza_anica";
    
            $conn = new mysqli($servername, $username, $password, $database);
    
            
            if ($conn->connect_error) {
                die("Neuspela konekcija sa bazom podataka: " . $conn->connect_error);
            }
    
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                
                $username = $_POST["username"];
                $password = $_POST["password"];
    
                
                $sql = "SELECT * FROM korisnici WHERE username = '$username' AND password = '$password'";
                $result = $conn->query($sql);
    
                if ($result->num_rows > 0) {
                    
                    header("Location: main2.php");
                    exit();
                } else {
                    
                    echo '<div class="alert-danger">Pogrešno korisničko ime ili lozinka.</div>';
                }
            }
    
            
            $conn->close();
        ?>
    </body>
    </html>