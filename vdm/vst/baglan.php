<?php

try {
    $db = new PDO("mysql:host=localhost;dbname=pdofirma", 'root', 'BBA14-33');
    //echo "veritabanı bağlantısı başarılı";
} 

catch (PDOException $e) {
    echo $e->getMessage();
}

?>