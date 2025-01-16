<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <title>Bine ați venit!</title>
    <style>
        body {
            font-family: Arial, sans-serif;
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
        .container {
            margin-top: 50px;
        }
        .button {
            background-color: #4CAF50;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 20px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .button:hover {
            background-color: #45a049;
        }
        p {
            font-size: 18px;
        }
    </style>
</head>
<body>

<header>
    Bine ați venit!
</header>

<div class="container">
    <p>Înregistrați-vă pentru a avea acces la contul dvs.:</p>
    <a href="register.php" class="button">Înregistrează-te</a>

    <p>Ai deja un cont? Loghează-te acum:</p>
    <a href="login.php" class="button">Loghează-te</a>
</div>

</body>
</html>
