<?php
// Rimuovi la sessione
session_unset();
// distruggi la sessione session
session_destroy();

header("location: ../index.php");
?>