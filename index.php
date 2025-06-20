<?php
// Verifica si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores de los campos de entrada
    $numero1 = $_POST['numero1'];
    $numero2 = $_POST['numero2'];
    $operacion = $_POST['operacion'];

    // Validar que los números sean válidos
    if (is_numeric($numero1) && is_numeric($numero2)) {
        // Realizar la operación seleccionada
        switch ($operacion) {
            case 'suma':
                $resultado = $numero1 + $numero2;
                break;
            case 'resta':
                $resultado = $numero1 - $numero2;
                break;
            case 'multiplicacion':
                $resultado = $numero1 * $numero2;
                break;
            case 'division':
                if ($numero2 != 0) {
                    $resultado = $numero1 / $numero2;
                } else {
                    $resultado = "Error: División por cero.";
                }
                break;
            default:
                $resultado = "Operación no válida.";
        }
    } else {
        $resultado = "Por favor ingrese números válidos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora PHP</title>
    <!-- Agregar Bootstrap desde CDN -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f8ff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .calculator-container {
            background-color: #f1f8ff;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            padding: 30px;
            width: 100%;
            max-width: 400px;
            border: 3px solid #7c42ed; /* Borde colorido */
            text-align: center;
        }

        h2 {
            color: #7c42ed;
        }

        .form-control {
            margin-bottom: 15px;
        }

        .btn-custom {
            background-color: #7c42ed;
            color: white;
            border: none;
            border-radius: 5px;
            width: 100%;
            padding: 10px;
            transition: background-color 0.3s ease;
        }

        .btn-custom:hover {
            background-color: #cf91ed;
        }

        .resultado {
            font-weight: bold;
            font-size: 1.5rem;
            color: #28a745;
        }

        @media (max-width: 600px) {
            .calculator-container {
                width: 90%;
                padding: 20px;
            }

            h2 {
                font-size: 20px;
            }
        }
    </style>
</head>
<body>

<div class="calculator-container">
    <h2>Calculadora Básica en PHP</h2>

    <!-- Formulario para ingresar los números y seleccionar la operación -->
    <form method="POST" action="">
        <div class="form-group">
            <label for="numero1">Número 1:</label>
            <input type="text" class="form-control" id="numero1" name="numero1" value="<?php echo isset($numero1) ? $numero1 : ''; ?>" required>
        </div>

        <div class="form-group">
            <label for="numero2">Número 2:</label>
            <input type="text" class="form-control" id="numero2" name="numero2" value="<?php echo isset($numero2) ? $numero2 : ''; ?>" required>
        </div>

        <div class="form-group">
            <label for="operacion">Operación:</label>
            <select class="form-control" id="operacion" name="operacion" required>
                <option value="suma" <?php echo isset($operacion) && $operacion == 'suma' ? 'selected' : ''; ?>>Suma</option>
                <option value="resta" <?php echo isset($operacion) && $operacion == 'resta' ? 'selected' : ''; ?>>Resta</option>
                <option value="multiplicacion" <?php echo isset($operacion) && $operacion == 'multiplicacion' ? 'selected' : ''; ?>>Multiplicación</option>
                <option value="division" <?php echo isset($operacion) && $operacion == 'division' ? 'selected' : ''; ?>>División</option>
            </select>
        </div>

        <div>
            <input type="submit" class="btn btn-custom" value="Calcular">
        </div>
    </form>

    <!-- Mostrar el resultado -->
    <?php if (isset($resultado)) : ?>
        <div class="resultado mt-4">
            <h3>Resultado: <?php echo $resultado; ?></h3>
        </div>
    <?php endif; ?>
</div>

<!-- Agregar Bootstrap JS y dependencias -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
