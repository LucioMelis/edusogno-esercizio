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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($name)) {
      $name_err = "Valid first name is required";
    } else {
        if(trim($name))
        $nameErr = "Only letters and white space allowed";
      }
    }
    
    if (empty($_POST["email"])) {
      $emailErr = "Email is required";
    } else {
      $email = test_input($_POST["email"]);
      // check if e-mail address is well-formed
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
      }
    }
      
    if (empty($_POST["website"])) {
      $website = "";
    } else {
      $website = test_input($_POST["website"]);
      // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
      if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
        $websiteErr = "Invalid URL";
      }
    }
  
    if (empty($_POST["comment"])) {
      $comment = "";
    } else {
      $comment = test_input($_POST["comment"]);
    }
  
    if (empty($_POST["gender"])) {
      $genderErr = "Gender is required";
    } else {
      $gender = test_input($_POST["gender"]);
    }
  }
  






?>