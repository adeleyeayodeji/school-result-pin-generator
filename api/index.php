<?php
require __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'connection.php';
header("Content-Type: application/json");
//allow get request
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With");

if (isset($_GET["pin"]) && !empty($_GET["pin"])) {
    //query pin and count 
    $pin = sha1($_GET["pin"]);
    $checking = $_GET["checking"];
    $stmt = $pdo->prepare('SELECT * FROM tblpin WHERE pin = :pin AND leftcount > 0');
    $stmt->execute(['pin' => $pin]);
    $pinresult = $stmt->fetch();
    if ($pinresult) {
        //check if checking is true
        if ($checking == 'true') {
            echo json_encode(['status' => 'success', 'message' => 'Pin Available', 'leftcount' => $pinresult['leftcount']]);
            die;
        }
        $leftcount = (int)$pinresult['leftcount'] - 1;
        //update count
        $stmt = $pdo->prepare('UPDATE tblpin SET leftcount = :leftcount WHERE pin = :pin');
        $stmt->execute(['pin' => $pin, 'leftcount' => $leftcount]);
        //get error
        $error = $stmt->errorInfo();
        // var_dump($error);
        echo json_encode(['status' => 'success', 'message' => 'Pin Used Successfully', 'leftcount' => $leftcount]);
        die;
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Pin Exhausted']);
        die;
    }
}
die;
