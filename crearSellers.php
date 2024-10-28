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
    if (isset($_POST['nombre']) && isset($_POST['email']) && isset($_POST['phone'])) {
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        $stmt = $db->prepare("INSERT INTO sellers (nombre, email, phone) VALUES (?, ?, ?)");
        if ($stmt === false) {
            die("Error en la preparación de la consulta: " . $db->error);
        }

        $stmt->bind_param("sss", $nombre, $email, $phone);
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
    <h2>Crear Seller Form</h2>
    <div>
        <form method="POST" action="crearSellers.php">
            <fieldset>
                <div>
                    <legend>Fill all form fields to create a new seller.</legend>
                </div>
                <div>
                    <label for="nombre">Name</label>
                    <input type="text" id="nombre" name="nombre" required>
                </div>

                <div>
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                
                <div>
                    <label for="phone">Phone</label>
                    <input type="text" id="phone" name="phone" required>
                </div>

                <div>
                    <button type="submit">Create a new seller</button>
                </div>
            </fieldset>
        </form>
    </div>
</section>

<?php
include "footer.php";
?>
