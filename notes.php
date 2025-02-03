<?php

    $conn = mysqli_connect("localhost", "root", "", "notes"); #tutaj se zmień ewentualnie uzytkownika albo haslo

    if (isset($_COOKIE['user_id']))
    {
      $sql = "SELECT * from notes where id_user = " . $_COOKIE['user_id'];

      $result = $conn->query($sql);
  
      setcookie("mess", "Success!", time() + (86400 * 30), "/");
    }
    else
    {
      setcookie("mess", "Log in", time() + (86400 * 30), "/");
      header("Location: index.php");
    }

?>
<!doctype html>
<html lang="en" data-bs-theme="dark">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Logowanie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
  </head>
  <body class="p-3">
    <?php
        echo "<h1>" . "Hi " . $_COOKIE['login'] . "!" . "</h1>";

        while($row = $result->fetch_assoc()) {
            echo "<div class='container-xxl border border-light rounded-3 p-3'><h2>" . $row['note'] . "</h2>" ;
            echo "
            
            <form action='delete_note.php'>
              <button class='btn btn-danger' name='butt' value=".$row['id'].">Delete</button>
            </form>
            </div>
            <br>
            ";
        }
    ?>
    <div class='container-xxl border border-light rounded-3 p-3'>
      <form action="create_note.php">
        <div class="mb-3">
          <textarea rows="2" cols="30" name="note"></textarea>
        </div>
        <button class="btn btn-light">Create a new note</button>
      </form>
      <br>
      <form action="logout.php">
          <button class="btn btn-light">Log out</button>
      </form>
      <br>
      <form action="delete_acc.php">
          <button class="btn btn-danger">Delete account</button>
      </form>
    </div>
  </body>
</html>