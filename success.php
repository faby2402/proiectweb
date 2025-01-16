<?php
// După înregistrare, utilizatorul va fi redirecționat aici.
?>

<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="5;url=login.php"> <!-- Redirecționează după 5 secunde -->
    <title>Înregistrare reușită</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f4f4f9;
            padding-top: 50px;
        }
        .message {
            background-color: #4CAF50;
            color: white;
            padding: 30px;
            border-radius: 10px;
            width: 60%;
            margin: auto;
            font-size: 20px;
        }
        .message p {
            font-size: 18px;
        }
    </style>
</head>
<body>

    <div class="message">
        <h2>Te-ai înregistrat cu succes!</h2>
        <p>Vei fi redirecționat către pagina de login în câteva momente.</p>
    </div>

</body>
</html>
