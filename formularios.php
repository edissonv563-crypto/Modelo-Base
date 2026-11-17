<?php
include_once("medico.php");
include_once("consultorio.php");
include_once("medicamento.php");

$mensaje = "";

// Procesamiento con método POST e invocación de métodos de las clases
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["modulo"])) {
    if ($_POST["modulo"] == "medico") {
        $objMedico = new Medico();
        $objMedico->crearMedico(
            $_POST["identificacion"],
            $_POST["nombres"],
            $_POST["apellidos"],
            $_POST["especialidad"],
            $_POST["telefono"],
            $_POST["correo"]
        );
        $objMedico->agregarMedico();
        $mensaje = "Médico procesado correctamente: " . $objMedico->getNombres();
    } elseif ($_POST["modulo"] == "consultorio") {
        $objConsultorio = new Consultorio();
        $objConsultorio->crearConsultorio($_POST["idConsultorio"], $_POST["nombre"]);
        $objConsultorio->agregarConsultorio();
        $mensaje = "Consultorio procesado correctamente: " . $objConsultorio->getNombre();
    } elseif ($_POST["modulo"] == "medicamento") {
        $objMedicamento = new Medicamento();
        $objMedicamento->crearMedicamento(
            $_POST["codigo"],
            $_POST["nombre"],
            $_POST["presentacion"],
            $_POST["laboratorio"]
        );
        $objMedicamento->agregarMedicamento();
        $mensaje = "Medicamento procesado correctamente: " . $objMedicamento->getNombre();
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión Centro Médico - AA2-EV01</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
<div class="contenedor">
    <?php if ($mensaje != "") { echo "<p><strong>$mensaje</strong></p>"; } ?>

    <!-- Formulario HTML para Médico -->
    <div class="tarjeta-formulario">
        <h2>Registro de Médico</h2>
        <form method="POST" action="formularios.php">
            <input type="hidden" name="modulo" value="medico">
            <label>Identificación:</label>
            <input type="text" name="identificacion" required>
            <label>Nombres:</label>
            <input type="text" name="nombres" required>
            <label>Apellidos:</label>
            <input type="text" name="apellidos" required>
            <label>Especialidad:</label>
            <input type="text" name="especialidad" required>
            <label>Teléfono:</label>
            <input type="text" name="telefono" required>
            <label>Correo:</label>
            <input type="email" name="correo" required>
            <button type="submit">Guardar Médico</button>
        </form>
    </div>

    <!-- Formulario HTML para Consultorio -->
    <div class="tarjeta-formulario">
        <h2>Registro de Consultorio</h2>
        <form method="POST" action="formularios.php">
            <input type="hidden" name="modulo" value="consultorio">
            <label>ID Consultorio:</label>
            <input type="text" name="idConsultorio" required>
            <label>Nombre del Consultorio:</label>
            <input type="text" name="nombre" required>
            <button type="submit">Guardar Consultorio</button>
        </form>
    </div>

    <!-- Formulario HTML para Medicamento -->
    <div class="tarjeta-formulario">
        <h2>Registro de Medicamento</h2>
        <form method="POST" action="formularios.php">
            <input type="hidden" name="modulo" value="medicamento">
            <label>Código:</label>
            <input type="text" name="codigo" required>
            <label>Nombre:</label>
            <input type="text" name="nombre" required>
            <label>Presentación:</label>
            <input type="text" name="presentacion" required>
            <label>Laboratorio:</label>
            <input type="text" name="laboratorio" required>
            <button type="submit">Guardar Medicamento</button>
        </form>
    </div>
</div>
</body>
</html>