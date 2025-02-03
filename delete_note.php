<?php

    $conn = mysqli_connect("localhost", "root", "", "notes"); #tutaj se zmień ewentualnie uzytkownika albo haslo

    $sql = "DELETE FROM notes WHERE id_user=" . $_COOKIE['user_id'] . " AND id='" . $_GET['butt'] . "'";

    $result = $conn->query($sql);

    header("Location: notes.php")

?>