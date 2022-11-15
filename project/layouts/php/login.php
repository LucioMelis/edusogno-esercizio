<?php
$msg = "";
//Recupero dati dal form POST
if(isset($_POST['email']) && isset($_POST['password'])){
    $user = $_POST['email'];
    $passw = $_POST['password'];
    $passw_hash = md5($passw);

    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "task_edusogno";

// Creo Connessione
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check della connessione
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM utenti WHERE email='$user' AND password='$passw_hash'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        //Attivo la sessione
        session_start();
        $_SESSION['datiUtente'] = $result->fetch_assoc();
        $_SESSION['login'] = true;
        //Redirect della pagina php dashboard
        header("location: dashboard.php");
    } else {
        $msg = "Nome utente o password errati";
    }
    $conn->close();
}
?>

<!-- Template Home Page -->
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Signin Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin" method="post" action="login.php">
      <img class="mb-4" src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
      <div class="checkbox mb-3">
        <label>
        <?php 
        if(strlen($msg) > 0){
           print $msg;
        }else{
            echo '<input type="checkbox" value="remember-me"> Remember me';
        }
        ?> 
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    </form>
  </body>
</html>
