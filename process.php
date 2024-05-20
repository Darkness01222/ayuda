<?php
include 'db.php';

// Función para insertar un nuevo item
if (isset($_POST['action']) && $_POST['action'] == 'create') {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $cantidad = $_POST['cantidad'];
    $stmt = $conn->prepare("INSERT INTO items (nombre, descripcion, cantidad) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $nombre, $descripcion, $cantidad);
    $stmt->execute();
    $stmt->close();
    header("Location: index.php");
    exit();
}

// Función para actualizar un item
if (isset($_POST['action']) && $_POST['action'] == 'update') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $cantidad = $_POST['cantidad'];
    $stmt = $conn->prepare("UPDATE items SET nombre = ?, descripcion = ?, cantidad = ? WHERE id = ?");
    $stmt->bind_param("ssii", $nombre, $descripcion, $cantidad, $id);
    $stmt->execute();
    $stmt->close();
    header("Location: index.php");
    exit();
}

// Función para eliminar un item
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $stmt = $conn->prepare("DELETE FROM items WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
    header("Location: index.php");
    exit();
}
?>
