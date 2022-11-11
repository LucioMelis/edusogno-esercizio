<?php
//Definisco delle veriabili
$name = $_POST['name'];
$surname = $_POST['surname'];
$email = $_POST ['email'];
$password = $_POST['password'];
$password_confirm = $__POST ['password_confirmation'];


$name_err = '';
$surname_err = '';
$email_err = '';
$password_err = '';

if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password_confirmation']) && isset($_POST['name'])){

}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($name)) {
      $name_err = "Name is required";
    } else {
      $name = check($name);
      // controlla se il nome contiene solo lettere e spazi bianchi
    //   if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
    //     $name_err = "Only letters and white space allowed";
    //   }
    }
    
    if (empty($email)) {
      $email_err = "Email is required";
    } else {
      // controlla se email è valida
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_err = "Invalid email format";
      }
    }
      
    if (empty($surname)) {
      $surname_err = "Surname is required";
    } else {
      $surname = check($surname);
      // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
      if (!preg_match("/^[a-zA-Z-' ]*$/",$surname)) {
        $surname_err = "Only letters and white space allowed";
      }
    }
  
    if(empty($password)){
        $password_err = 'Please enter your password';
    }else{
        if($password != $password_confirm ){
            $password_err = 'Passwords are not the same';
        }
    }
  }
  
  function check($data){
	$data = trim($data);
    $data = ucwords($data);
    return $data;
}

?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../../../../favicon.ico">

  <title>Register example for Bootstrap</title>

  <!-- Bootstrap core CSS -->
  <link href="../dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../css/register.css" rel="stylesheet">
</head>

<body class="bg-light">

  <div class="container">
    <div class="py-5 text-center">
      <img class="d-block mx-auto mb-4" src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="#"
        width="72" height="72">
      <h2>Register Account</h2>
      <p class="lead">Below is an example form built entirely with Bootstrap's form controls. Each required form group
        has a validation state that can be triggered by attempting to submit the form without completing it.</p>
    </div>

    <div class="row">
      <div class="col-md-8 order-md-1">
        <h4 class="mb-3">Insert your data</h4>
        <form class="needs-validation" action="register.php" method="POST">
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="firstName">First name</label>
              <input type="text" class="form-control" id="firstName" name="name" placeholder="" value="" required>
              <div class="invalid-feedback">
                <?php echo $name_err; ?>
              </div>
             </div>
            <div class="col-md-6 mb-3">
              <label for="lastName">Last name</label>
              <input type="text" class="form-control" id="lastName" name="surname" placeholder="" value="" required>
              <div class="invalid-feedback">
              <?php echo $surname_err; ?>
              </div>
            </div>
          </div>

          <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" required>
            <div class="invalid-feedback">
            <?php echo $email_err; ?>
            </div>
          </div>

          <div class="mb-3">
            <label for="new-password">Password</label>
            <input type="password" class="form-control" id="address" name="password" placeholder="" required>
            <div class="invalid-feedback">
            <?php echo $password_error; ?>
            </div>
          </div>

          <div class="mb-3">
            <label for="confirm-password">Confirm your password</label>
            <input type="password" class="form-control" id="address2" name="password_confirmation" placeholder="" required>
            <div class="invalid-feedback">
            <?php echo $password_error; ?>
            </div>
          </div>

          <!-- SUBMIT -->
          
          <hr class="mb-4">
          <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to register</button>
        </form>
      </div>
    </div>

    <footer class="my-5 pt-5 text-muted text-center text-small">
      <p class="mb-1">&copy; 2017-2018 Company Name</p>
      <ul class="list-inline">
        <li class="list-inline-item"><a href="#">Privacy</a></li>
        <li class="list-inline-item"><a href="#">Terms</a></li>
        <li class="list-inline-item"><a href="#">Support</a></li>
      </ul>
    </footer>
  </div>

  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
  <script src="../assets/js/vendor/popper.min.js"></script>
  <script src="../dist/js/bootstrap.min.js"></script>
  <script src="../assets/js/vendor/holder.min.js"></script>
  <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function () {
        'use strict';

        window.addEventListener('load', function () {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');

          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function (form) {
            form.addEventListener('submit', function (event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
  </script>
</body>

</html>
