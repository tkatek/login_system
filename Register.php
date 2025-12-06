<?php
include 'db.php';
if (isset($_POST["Register-btn"])) {
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password =   $_POST["password"]  ;
    $confirm_password = $_POST["confirm-password"];
    
  if(empty($username)){
    echo "fill the name";
        exit;
  }



   if(empty($email)){
    echo "fill the name";
        exit;
  }
  if (!filter_var($email ,  FILTER_VALIDATE_EMAIL)) {
    echo 'invalide email format';
     exit;
  }


   if(empty($password)){
    echo "fill the name";
        exit;
  }

   if(empty($confirm_password)){
    echo "fill the name";
        exit;
  }

  if ($password !==$confirm_password) {
    echo "password not match";
    exit;
    # code...
  }

  $hasedpass = password_hash($password , PASSWORD_DEFAULT);



    $sql = "INSERT INTO info (username , email , password) VALUES (:username , :email , :password)";
    $stmt = $pdo->prepare($sql);
    

    if ($stmt->execute([
        ":username" =>$username,
        ":email" => $email,
        ":password" => $hasedpass
    ])) {
        header("Location: Login.php");

    } else {    
        echo "registration failed";
    }   

        # code...
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
    <h2>Register</h2>
    <form action="" method="post">
        <input type="name" name="username" placeholder="name " required>
        <input type="email" name="email" placeholder="email" required>
        <input type="password" name="password" placeholder="password" required>
        <input type="password" name="confirm-password" placeholder="comfirm-password"  required>
        <input type="submit" value="Register" name="Register-btn" >
    </form>
   
</div>
    
</body>
</html>