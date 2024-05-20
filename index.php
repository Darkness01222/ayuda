<?php
include 'db.php';

// Leer todos los items
$items = $conn->query("SELECT * FROM items");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CRUD con PHP y MySQL</title>
</head>
<body>
    <h1>CRUD con PHP y MySQL</h1>

    <h2>Crear nuevo item</h2>
    <form action="process.php" method="post">
        <input type="hidden" name="action" value="create">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required>
        <label for="descripcion">Descripción:</label>
        <input type="text" name="descripcion" required>
        <label for="cantidad">Cantidad:</label>
        <input type="number" name="cantidad" required>
        <input type="submit" value="Crear">
    </form>

    <h2>Items almacenados</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Cantidad</th>
            <th>Acciones</th>
        </tr>
        <?php while($item = $items->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $item['id']; ?></td>
                <td><?php echo $item['nombre']; ?></td>
                <td><?php echo $item['descripcion']; ?></td>
                <td><?php echo $item['cantidad']; ?></td>
                <td>
                    <a href="process.php?delete=<?php echo $item['id']; ?>">Eliminar</a>
                    <a href="index.php?edit=<?php echo $item['id']; ?>">Editar</a>
                </td>
            </tr>
        <?php } ?>
    </table>

    <?php if (isset($_GET['edit'])) {
        $id = $_GET['edit'];
        $result = $conn->query("SELECT * FROM items WHERE id=$id");
        $item = $result->fetch_assoc();
    ?>
        <h2>Editar item</h2>
        <form action="process.php" method="post">
            <input type="hidden" name="action" value="update">
            <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" value="<?php echo $item['nombre']; ?>" required>
            <label for="descripcion">Descripción:</label>
            <input type="text" name="descripcion" value="<?php echo $item['descripcion']; ?>" required>
            <label for="cantidad">Cantidad:</label>
            <input type="number" name="cantidad" value="<?php echo $item['cantidad']; ?>" required>
            <input type="submit" value="Actualizar">
        </form>
    <?php } ?>

    <?php $conn->close(); ?>
</body>
</html>
