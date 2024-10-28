<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<?php
include "header.php";
require "connect-db.php";

$db = connectdb();
if (!$db) {
    die("Error al conectar a la base de datos.");
}

echo "<pre>";
var_dump($_POST);
echo "</pre>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['name'], $_POST['descripcion'], $_POST['precio'], $_POST['num_habitaciones'], $_POST['num_wc'], $_POST['num_garage'])) {
        $titulo = $_POST['name'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $habitaciones = $_POST['num_habitaciones'];
        $wc = $_POST['num_wc'];
        $garage = $_POST['num_garage'];

        $query = "INSERT INTO propiedades (titulo, descripcion, precio, habitaciones, wc, garage) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $db->prepare($query);
        if ($stmt === false) {
            die("Error en la preparación de la consulta: " . $db->error);
        }

        $stmt->bind_param("ssiiii", $titulo, $descripcion, $precio, $habitaciones, $wc, $garage);
        $response = $stmt->execute();
        if ($response) {
            echo "Registro completado.";
        } else {
            echo "Fallo en el registro: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Por favor, complete todos los campos del formulario.";
    }
}

?>

<section>
    <h2>Create a new property Form</h2>
    <div>
        <form method="POST" action="crearPropiedades.php">
            <fieldset>
                <div>
                    <legend>Fill all form fields to create a new property.</legend>
                </div>
                <div>
                    <label for="name">Nombre de la propiedad</label>
                    <input type="text" id="name" name="name" required>
                </div>
                
                <div>
                    <label for="precio">Precio</label>
                    <input type="number" id="precio" name="precio" required>
                </div>
                
                <div>
                    <label for="descripcion">Descripción</label>
                    <input type="text" id="descripcion" name="descripcion" required>
                </div>
                
                <div>
                    <label for="num_habitaciones">Número de habitaciones</label>
                    <input type="number" id="num_habitaciones" name="num_habitaciones" required>
                </div>
                
                <div>
                    <label for="num_wc">Número de baños</label>
                    <input type="number" id="num_wc" name="num_wc" required>
                </div>
                
                <div>
                    <label for="num_garage">Número de garages</label>
                    <input type="number" id="num_garage" name="num_garage" required>
                </div>
                
                <div>
                    <button type="submit">Create a new property</button>
                </div>
            </fieldset>
        </form>
    </div>
</section>

<?php
include "footer.php";
?>
</html>
