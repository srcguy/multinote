<?php
       $conn = mysqli_connect("localhost", "root", "", "notes"); #tutaj se zmień ewentualnie uzytkownika albo haslo

       $sql = "INSERT INTO notes (id_user, note) values (". $_COOKIE['user_id'] . ", '" . $_GET['note'] . "')";
   
       $result = $conn->query($sql);
   
       header("Location: notes.php")
?>