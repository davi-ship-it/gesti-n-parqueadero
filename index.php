<?php
require_once './clases/Parqueadero.php';

$parqueadero = new Parqueadero();

// Agregar vehículos
$vehiculo1 = new Vehiculo('ABC123', 'Toyota', 'Rojo', 'Juan Perez', '123456', '2024-08-30 06:00:00');
$vehiculo2 = new Vehiculo('DEF456', 'Honda', 'Azul', 'Maria Garcia', '789012', '2024-08-30 09:00:00');

$parqueadero->agregarVehiculo($vehiculo1);
$parqueadero->agregarVehiculo($vehiculo2);

// Registrar la salida del vehículo antes de calcular el costo
$vehiculo1->registrarSalida('2024-08-30 10:00:00'); // Hora de salida para vehiculo1
$vehiculo2->registrarSalida('2024-08-30 15:00:00'); // Hora de salida para vehiculo2

// Buscar el vehículo y calcular el costo
$busqueda = $parqueadero->buscarVehiculo('ABC123');
if ($busqueda !== null) {
    echo "Vehículo encontrado en el piso " . $busqueda['piso'] . ", puesto " . $busqueda['puesto'] . ".<br>";
    echo "Placa: " . $busqueda['vehiculo']->getPlaca() . "<br>";
    echo "Costo del parqueo: $" . $busqueda['vehiculo']->calcularCosto() . " USD<br>";
} else {
    echo "Vehículo no encontrado.<br>";
}

// Retirar un vehículo
$costo = $parqueadero->retirarVehiculo('ABC123');
if ($costo !== null) {
    echo "Vehículo retirado. Costo del parqueo: $" . $costo . " USD<br>";
} else {
    echo "Vehículo no encontrado para retirar.<br>";
}

?>
