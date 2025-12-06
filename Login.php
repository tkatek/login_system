<?php
include 'db.php';
if (isset($_POST["login"])) {

$email = $_POST["email"];
$password = $_POST["password"];
$sql = "SELECT * FROM info WHERE email = :email";
$stmt = $pdo->prepare($sql);
$stmt->execute([":email" => $email]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user && password_verify($password,$user['password'])){
    echo "login successful";
} else {
    echo "invalid email or password";
}
header("Location: Dashboard.php");



}




?>






 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
        }
        .regester-card{
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        .regester-card h2{
            text-align: center;
            margin-bottom: 20px;
        }
        .regester-card form{
            display: flex;
            flex-direction: column;
        }
        .regester-card input[type="name"],
        .regester-card input[type="email"],
        .regester-card input[type="password"]{
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .regester-card input[type="submit"]{
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .regester-card input[type="submit"]:hover{
            background-color: #218838;
        }
    </style>
</head>
<body>



<div class="regester-card">
    <h2>login</h2>
    <form action="" method="post">
        <input type="email" name="email" placeholder="email" required>
        <input type="password" name="password" placeholder="password" required>
        <input type="submit" value="log-in" name="login" >
    </form>
   
</div>
    
</body>
</html>