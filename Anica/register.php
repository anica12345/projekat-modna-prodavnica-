<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registracija</title>
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

    h2 {
        margin-top: 50px; 
        font-size: 2.5em; 
    }

    form {
        margin-top: 50px; 
    }

    input[type="submit"],
    .btn-primary,
    .btn-secondary {
        background-color: #2E8B57; 
        color: #444; 
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 5px; 
        transition: 0.3s ease; 
        width: 200px; 
        border: none;
    }

    input[type="submit"]:hover,
    .btn-primary:hover,
    .btn-secondary:hover {
        background-color: #276747; 
        border: none;
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

    .error {
        color: #dc3545; 
        margin-top: 10px; 
    }

    .message {
        color: #28a745; 
        margin-top: 20px; 
    }
</style>
<body>
    <div class="container">
        <h2>Registracija</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-container">
            <div class="form-group">
                <label for="username">Korisničko ime:</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Lozinka:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Potvrdite lozinku:</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
            </div>
            <button type="submit" class="btn btn-primary" name="register">Registrujte se</button>
            <a href="login.php" class="btn btn-secondary">Prijavite se</a>
            <a href="index.php" class="btn btn-secondary">Povratak</a>
        </form>

        <?php
            
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "baza_anica";

            $conn = new mysqli($servername, $username, $password, $database);

           
            if ($conn->connect_error) {
                die("Neuspela konekcija sa bazom podataka: " . $conn->connect_error);
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
                
                $username = $_POST["username"];
                $password = $_POST["password"];
                $confirm_password = $_POST["confirm_password"];

                
                $sql_check_username = "SELECT * FROM korisnici WHERE username = '$username'";
                $result_check_username = $conn->query($sql_check_username);

                if ($result_check_username->num_rows > 0) {
                    
                    echo '<div class="alert-danger">Korisničko ime već postoji. Molimo odaberite drugo.</div>';
                } else {
                    
                    if ($password === $confirm_password) {
                        
                        $sql_register_user = "INSERT INTO korisnici (username, password) VALUES ('$username', '$password')";
                        if ($conn->query($sql_register_user) === TRUE) {
                           
                            echo '<div class="alert-success">Uspešno ste registrovali nalog.</div>';
                        } else {
                            
                            echo '<div class="alert-danger">Greška prilikom registracije. Molimo pokušajte ponovo.</div>';
                        }
                    } else {
                        
                        echo '<div class="alert-danger">Lozinke se ne podudaraju.</div>';
                    }
                }
            }

            
            $conn->close();
        ?>
    </div>
</body>
</html>



