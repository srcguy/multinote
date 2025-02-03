<?php
    $conn = mysqli_connect("localhost", "root", "", "notes"); #tutaj se zmień ewentualnie uzytkownika albo haslo

    $sql = "SELECT count(*) as n from users where login='". $_GET['login'] . "'";

    $result = $conn->query($sql);

    $row = $result->fetch_assoc();

    if ($row['n'] > 0)
    {
        setcookie("mess" , "Account with that name already exists", time() + (36800 * 60));
        header("Location: account.php");
    }
    else
    {
        $sql = "INSERT INTO users (login, pass) values ('". $_GET['login'] . "', '" . $_GET['pass'] . "')";
        $result = $conn->query($sql);
        setcookie("mess", "Account created", time() + (36800 * 60));
        header("Location: index.php");
    }
?>