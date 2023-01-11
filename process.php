<?php
require __DIR__ . DIRECTORY_SEPARATOR . 'connection.php';
if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    //md5
    $password = md5($password);
    //login
    $stmt = $pdo->prepare('SELECT * FROM users WHERE email = :email AND password = :password');
    $stmt->execute(['email' => $email, 'password' => $password]);
    $user = $stmt->fetch();
    if ($user) {
        $_SESSION['user_id'] = $user['id'];
        header('Location: dashboard.php');
    } else {
        $error = 'Wrong email or password';
    }
}

//check for pin
if (isset($_POST["pin"]) && !empty($_POST["pin"])) {
    $count = $_POST["count"];
    $string_to_encrypt = date('Y') . rand(0, 500) . time() . rand(0, 500);
    $length = strlen($string_to_encrypt);
    $encrypted_string = encrypt($string_to_encrypt, $length);
    // $decrypted_string=decrypt($encrypted_string, $password);
    $stmt = $pdo->prepare("INSERT INTO tblpin(pin, keytext, leftcount) VALUES(?, ?, ?)");
    $stmt->execute([$encrypted_string, $string_to_encrypt, $count]);
    //get last id
    $last_id = $pdo->lastInsertId();
    //get error
    $error = $stmt->errorInfo();
    // var_dump($error);
    echo "Pin Generated Successfully with ID: " . $last_id;
}
