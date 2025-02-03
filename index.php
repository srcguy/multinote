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
    <h1>MultiNote - notes for everybody</h1>
    <?php
            if(isset($_COOKIE['mess']) && $_COOKIE['mess'] == "Success!" && isset($_COOKIE['login']))
            {
                header("Location: notes.php");
            }
        ?>
    <form action="login.php" method="GET"> <!-- pamietajcie ze in real life scenario uzywamy POST-->
        <div class="mb-3">
            <label class="form-label" for="login">Login</label><br>
            <input type="text" name="login" id="login">
        </div>
        <div class="mb-3">
            <label class="form-label" for="pass">Password</label><br>
            <input type="password" name="pass" id="pass">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-light">Submit</button>
        </div>
        <div class="mb-3">
            <button name="account" value="1" class="btn btn-warning">I don't have an account</button>
        </div>
        <?php
            if(isset($_COOKIE['mess']))
            {
                echo "<p class='text-danger-emphasis'>" . $_COOKIE['mess']  . "</p>";
                setcookie("mess", "", time() - 1);
            }
        ?>
    </form>
  </body>
</html>