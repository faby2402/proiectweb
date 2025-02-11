<?php
session_start();
include('config.php');

// Verificăm dacă utilizatorul este autentificat
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}

$username = $_SESSION['username'];

// Preia datele utilizatorului din baza de date
$sql = "SELECT * FROM users WHERE username = '$username'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if (isset($_POST['update'])) {
    $new_email = $_POST['email'];
    $new_address = $_POST['address'];
    $new_cnp = $_POST['cnp'];

    // Protejează împotriva SQL injection
    $new_email = $conn->real_escape_string($new_email);
    $new_address = $conn->real_escape_string($new_address);
    $new_cnp = $conn->real_escape_string($new_cnp);

    // Actualizează informațiile în baza de date
    $update_sql = "UPDATE users SET email = '$new_email', address = '$new_address', cnp = '$new_cnp' WHERE username = '$username'";

    if ($conn->query($update_sql) === TRUE) {
        echo "Datele au fost actualizate cu succes!";
    } else {
        echo "Eroare la actualizarea datelor: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <title>Contul meu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            padding-top: 50px;
            text-align: center;
        }
        h2 {
            color: #333;
        }
        .form-container {
            background-color: white;
            padding: 30px;
            width: 400px;
            margin: auto;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        input[type="text"], input[type="email"], input[type="password"], input[type="textarea"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        input[type="submit"], button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover, button:hover {
            background-color: #45a049;
        }
        .password-container {
            display: flex;
            align-items: center;
        }
        .password-container input[type="password"] {
            width: 80%;
        }
        .password-container button {
            width: 20%;
            margin-left: 10px;
        }
    </style>
    <script>
        // Funcție pentru a arăta sau ascunde parola
        function togglePassword() {
            var passwordField = document.getElementById("password");
            var passwordButton = document.getElementById("togglePasswordButton");
            if (passwordField.type === "password") {
                passwordField.type = "text";
                passwordButton.innerHTML = "Ascunde parola";
            } else {
                passwordField.type = "password";
                passwordButton.innerHTML = "Arată parola";
            }
        }
    </script>
</head>
<body>

    <h2>Contul meu</h2>

    <div class="form-container">
        <form method="POST" action="">

            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="<?php echo $row['username']; ?>" disabled><br>

            <label for="password">Parola:</label>
            <div class="password-container">
                <input type="password" id="password" name="password" value="<?php echo $row['password']; ?>" readonly><br>
                <button type="button" id="togglePasswordButton" onclick="togglePassword()">Arată parola</button>
            </div><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>"><br>

            <label for="address">Adresă:</label>
            <input type="text" id="address" name="address" value="<?php echo $row['address']; ?>"><br>

            <label for="cnp">CNP:</label>
            <input type="text" id="cnp" name="cnp" value="<?php echo $row['cnp']; ?>"><br>

            <input type="submit" name="update" value="Actualizează datele">
        </form>
    </div>

    <br>
    <a href="logout.php">Logout</a>

</body>
</html>
