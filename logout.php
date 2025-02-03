<?php

    setcookie("mess", "Loged out", time() + (86400 * 30), "/");
    setcookie("login", "", time() - 1, "/");
    setcookie("user_id", "", time() - 1, "/");

    header("Location: index.php")

?>