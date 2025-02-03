<?php

    $conn = mysqli_connect("localhost", "root", "", "notes"); #tutaj se zmień ewentualnie uzytkownika albo haslo

    $sql1 = "DELETE FROM notes WHERE id_user=(SELECT users.id from users WHERE login='". $_COOKIE['login'] . "');";

    $sql2 = "DELETE FROM users WHERE login='". $_COOKIE['login'] . "';";

    $result = $conn->query($sql1);

    $result = $conn->query($sql2);

    setcookie("mess", "Account deleted", time() + (36800 * 60));

    header("Location: index.php");

?>