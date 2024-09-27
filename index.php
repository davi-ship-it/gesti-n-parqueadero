

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Parqueadero</title>
</head>
<body>
    <form method="POST" action="">
        <label for="vehiculos">Ingrese las placas de los vehículos (separados por comas):</label>
        <input type="text" id="vehiculos" name="vehiculos" placeholder="Ejemplo: ABC123,DEF456" required>
        <br><br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>

<?php
require_once './clases/Parqueadero.php';


    /*Placas:
    
     'ABC123',
    'DEF456',
    'GHI789',
    'JKL012',
    'MNO345',
    'PQR678',
    'STU901',
    'VWX234',
    'YZA567',
    'BCD890',
    'EFG123',
    'HIJ456',
    'KLM789' */
$parqueadero = new Parqueadero();



// Agregar vehículos
$vehiculo1 = new Vehiculo('ABC123', 'Toyota', 'Rojo', 'Juan Perez', '123456', '2024-08-30 06:00:00');

$vehiculo2 = new Vehiculo('DEF456', 'Honda', 'Azul', 'Maria Garcia', '789012', '2024-08-30 09:00:00');
$vehiculo3 = new Vehiculo('GHI789', 'Ford', 'Negro', 'Carlos Lopez', '345678', '2024-08-30 07:30:00');
$vehiculo4 = new Vehiculo('JKL012', 'Chevrolet', 'Blanco', 'Ana Ruiz', '901234', '2024-08-30 08:00:00');
$vehiculo5 = new Vehiculo('MNO345', 'Mazda', 'Gris', 'Pedro Gomez', '567890', '2024-08-30 10:00:00');
$vehiculo6 = new Vehiculo('PQR678', 'Hyundai', 'Verde', 'Laura Martinez', '234567', '2024-08-30 11:00:00');
$vehiculo7 = new Vehiculo('STU901', 'Kia', 'Amarillo', 'Luis Hernandez', '890123', '2024-08-30 12:00:00');
$vehiculo8 = new Vehiculo('VWX234', 'Nissan', 'Azul', 'Sara Mejia', '456789', '2024-08-30 13:00:00');
$vehiculo9 = new Vehiculo('YZA567', 'Renault', 'Rojo', 'Miguel Angel', '678901', '2024-08-30 14:00:00');
$vehiculo10 = new Vehiculo('BCD890', 'Peugeot', 'Negro', 'Jorge Castillo', '345678', '2024-08-30 15:30:00');
$vehiculo11 = new Vehiculo('EFG123', 'Subaru', 'Blanco', 'Daniela Osorio', '901234', '2024-08-30 16:00:00');
$vehiculo12 = new Vehiculo('HIJ456', 'Volkswagen', 'Gris', 'Julian Rios', '567890', '2024-08-30 17:00:00');
$vehiculo13 = new Vehiculo('KLM789', 'BMW', 'Verde', 'Esteban Suarez', '234567', '2024-08-30 18:00:00');

// Agregar los vehículos al parqueadero
$parqueadero->agregarPiso($vehiculo1);

$parqueadero->agregarPiso($vehiculo2);
$parqueadero->agregarPiso($vehiculo3);
$parqueadero->agregarPiso($vehiculo4);
$parqueadero->agregarPiso($vehiculo5);
$parqueadero->agregarPiso($vehiculo6);
$parqueadero->agregarPiso($vehiculo7);
$parqueadero->agregarPiso($vehiculo8);
$parqueadero->agregarPiso($vehiculo9);
$parqueadero->agregarPiso($vehiculo10);
$parqueadero->agregarPiso($vehiculo11);
$parqueadero->agregarPiso($vehiculo12);
$parqueadero->agregarPiso($vehiculo13);

// Registrar la salida de los vehículos
$vehiculo1->registrarSalida('2024-08-30 10:00:00');

$vehiculo2->registrarSalida('2024-08-30 15:00:00');
$vehiculo3->registrarSalida('2024-08-30 10:30:00');
$vehiculo4->registrarSalida('2024-08-30 13:00:00');
$vehiculo5->registrarSalida('2024-08-30 14:00:00');
$vehiculo6->registrarSalida('2024-08-30 18:00:00');
$vehiculo7->registrarSalida('2024-08-30 15:00:00');
$vehiculo8->registrarSalida('2024-08-30 16:00:00');
$vehiculo9->registrarSalida('2024-08-30 17:00:00');
$vehiculo10->registrarSalida('2024-08-30 18:30:00');
$vehiculo11->registrarSalida('2024-08-30 19:00:00');
$vehiculo12->registrarSalida('2024-08-30 20:00:00');
$vehiculo13->registrarSalida('2024-08-30 21:00:00');

// Buscar y calcular el costo para cada vehículo

$vehiculosBuscar = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $vehiculosInput = $_POST['vehiculos'];

    $vehiculosBuscar = array_map('trim', explode(',', $vehiculosInput));}

$parqueadero->mostrarUbicacionCosto($vehiculosBuscar);


