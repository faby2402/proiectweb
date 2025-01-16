<?php
session_start();
include('config.php');

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Protejare împotriva SQL injection
    $username = $conn->real_escape_string($username);

    // Verifică dacă există utilizatorul
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Verifică parola
        if (password_verify($password, $row['password'])) {
            // Parola corectă, sesiunea este setată
            $_SESSION['username'] = $username;
            header('Location: account.php');  // Redirecționează către pagina de cont
            exit();
        } else {
            echo "Parola incorectă!";
        }
    } else {
        echo "Username inexistent!";
    }
}
?>

<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <title>Autentificare</title>
    <!-- Includem fonturi din Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Open+Sans|Lora|Merriweather|Quicksand">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            text-align: center;
        }
        header {
            background-color: #4CAF50;
            color: white;
            padding: 20px;
            font-size: 24px;
        }
        .form-container {
            margin-top: 50px;
        }
        input[type="text"], input[type="password"] {
            padding: 10px;
            margin: 10px 0;
            width: 250px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        .button {
            background-color: #4CAF50;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }
        .button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<header>
    Autentificare
</header>

<div class="form-container">
    <form method="POST" action="">
        Username: <input type="text" name="username" required><br>
        Parola: <input type="password" name="password" required><br>
        <input type="submit" name="submit" value="Loghează-te" class="button">
    </form>
    <p>Nu ai cont? <a href="register.php" class="button">Înregistrează-te</a></p>
</div>

</body>
</html>
