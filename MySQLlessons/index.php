<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP + MySQL</title>
</head>
<body>

<h1> php + mysql </h1>
<?php

    function printResults($result){
        if($result->num_rows > 0){
//        print_r($result->fetch_assoc()) . '<br>'; //вивід першого айді з таблиці з повними даними
//        print_r($result->fetch_all()). '<br>'; //вивід усіх записів з таблу
            while($row = $result->fetch_assoc()){
                echo "<b>ID: </b>". $row['id']. '<br>';
                echo "Name: ". $row['name']. '<br>';
                echo "Bio: ". $row['bio']. '<br>'. '<br>';
            }
        }
        echo '<hr>';
    }

    $mysql = new mysqli("localhost", "root", "", "php-mysql");
    $mysql->query("SET NAMES 'utf8'");

//    if($mysql->connect_error){    //установка помилки
//        echo 'Error Number:' . $mysql->connect_errno . '<br>'; //вивід номеру помилки
//        echo 'Error:' . $mysql->connect_error . '<br>'; //вивід помилки
//    } else {
//        //echo 'Host Info: ' . $mysql->host_info;   //помилки немає
//        //$mysql->query("DROP TABLE `example`"); //delete table
//        $mysql->query("CREATE TABLE `users`(  //створення таблиці
//    id INT(11) NOT NULL,
//    name VARCHAR(50) NOT NULL,
//    bio TEXT NOT NULL,
//    PRIMARY KEY(id)
//)");
//    }
//    for ($i = 1; $i <= 5; $i++) {
//    $name = "Barmaley #" . $i;
//    $mysql->query("INSERT INTO `users` (`name`, `bio`) VALUES('$name', 'ebuchiy')");
//}

//    $mysql->query("UPDATE `users` SET `bio` = 'Ueban' WHERE `id` >= 4");
//    $mysql->query("DELETE FROM `users` WHERE `id` = 8 AND `name` = 'Barmaley #5'");
//    print_r($result); //data about table
//    echo "Nums: ". $result->num_rows; //вивести інфо про кількість записів\айді в таблиці
    $result =  $mysql->query("SELECT * FROM `users`");
    print_r(printResults($result));

    $result =  $mysql->query("SELECT `id`, `name` FROM `users`");
    print_r(printResults($result));

    $result =  $mysql->query("SELECT * FROM `users` WHERE `id` >= 5 ORDER BY `id` DESC "); //вивід даних від 5 айді зі зіоронею сортировкою
    print_r(printResults($result));

    $result =  $mysql->query("SELECT * FROM `users` LIMIT 2,1"); //вивід даних до вказаного ліміту (в приколаді показано вивід третього запису, пропускаючі перші два)
    print_r(printResults($result));

    $mysql->close();

?>
</body>
</html>
