<?php
  $servername = "proyectofinaldb.mysql.database.azure.com";
  $username = "DBUser";
  $password = "Darkness01222591837";
  $dbname = "proyecto";
  
  // Crear conexión
  $conn = new mysqli($servername, $username, $password, $dbname);
  
  // Comprobar conexión
  if ($conn->connect_error) {
      die("Conexión fallida: " . $conn->connect_error);
  }
?>
