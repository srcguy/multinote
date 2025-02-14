<?php

    $conn = mysqli_connect("localhost", "root", "", "notes"); #tutaj se zmień ewentualnie uzytkownika albo haslo

    $sql = "SELECT * from users";

    $result = $conn->query($sql);

    $rows = $result->fetch_all(MYSQLI_ASSOC);

    if (isset($_GET['account']))
    {
        header("Location: account.php");
        exit;
    }

    foreach ($rows as $row) {
        if ($_GET['login'] == $row['login'] && hash('sha256', $row['salt'] . $_GET['pass']) == $row['pass'])
        {
            setcookie("user_id", $row['id'], time() + (86400 * 30), "/");
            setcookie("login", $row['login'], time() + (86400 * 30), "/");
            header("Location: notes.php");
            exit;
        }
    }

    setcookie("mess", "Invalid login or password", time() + (86400 * 30), "/");
    header("Location: index.php");
    exit;
?>