<?php
session_start();
include('config.php');

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    // Criptare parolă
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Verifică dacă există deja un utilizator cu acest username
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "Username deja utilizat!";
    } else {
        // Inregistrează utilizatorul în baza de date
        $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$hashedPassword', '$email')";
        if ($conn->query($sql) === TRUE) {
            // După succesul înregistrării, redirecționează către pagina de cont
            $_SESSION['username'] = $username;  // Setează sesiunea pentru utilizator
            header('Location: account.php');  // Redirecționare către contul utilizatorului
            exit();
        } else {
            echo "Eroare la înregistrare: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <title>Înregistrare</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f9;
            padding-top: 50px;
            text-align: center;
        }
        h2 {
            color: #333;
        }
        form {
            background-color: white;
            padding: 30px;
            width: 300px;
            margin: auto;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        input[type="text"], input[type="password"], input[type="email"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<h2>Înregistrează-te</h2>
<form method="POST" action="">
    Username: <input type="text" name="username" required><br>
    Parola: <input type="password" name="password" required><br>
    Email: <input type="email" name="email" required><br>
    <input type="submit" name="submit" value="Înregistrează-te">
</form>

</body>
</html>
