<?php
        // Configuration
        $hostname = 'localhot:33060';
        $username = 'homestead';
        $password = 'secret';
        $database = 'homestead';
 
        // $secretKey = "mySecretKey"; // Change this value to match the value stored in the client javascript below 
            $conn = new PDO('mysql:host=localhost;dbname=homestead', $username, $password);

        try {
            $conn = new PDO('mysql:host=127.0.0.1;dbname=homestead', $username, $password);
        } catch(PDOException $e) {
            echo '<h1>An error has ocurred.</h1><pre>', $e->getMessage() ,'</pre>';
        }
        // $hash = $_GET['hash'];
        // $realHash = md5($_GET['name'] . $_GET['score'] . $secretKey); 
        // if($realHash == $hash) { 
            try {
                    $sql = "INSERT INTO highscores (name, score) VALUES ('".$_GET['name']."','".$_GET['score']."')";
                    $sth = $conn->query($sql);

            } catch(Exception $e) {
                echo '<h1>An error has ocurred.</h1><pre>', $e->getMessage() ,'</pre>';
            }
        // } 
?>