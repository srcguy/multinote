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
        $salt = bin2hex(random_bytes(8));
        $pass = $salt . $_GET['pass'];
        $hash = hash('sha256', $pass);
        $sql = "INSERT INTO users (login, pass, salt) values ('". $_GET['login'] . "', '" . $hash . "', '" . $salt . "')";
        $result = $conn->query($sql);
        setcookie("mess", "Account created", time() + (36800 * 60));
        header("Location: index.php");
    }
?>