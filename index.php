<?php

require_once './clases/Parqueadero.php';

$parqueadero = new Parqueadero(); // Inicializamos la clase Parqueadero

function solicitarDatosVehiculo() {
    echo "Ingrese los datos del vehículo:\n";
    echo "Placa: ";
    $placa = trim(fgets(STDIN));
    
    echo "Marca: ";
    $marca = trim(fgets(STDIN));
    
    echo "Color: ";
    $color = trim(fgets(STDIN));
    
    echo "Nombre del dueño: ";
    $dueno = trim(fgets(STDIN));
    
    echo "Documento del dueño: ";
    $documento = trim(fgets(STDIN));
    
    echo "Hora de ingreso (formato: YYYY-MM-DD HH:MM:SS): ";
    $horaIngreso = trim(fgets(STDIN));
    
    // Crear el objeto Vehículo con los datos ingresados
    $vehiculo = new Vehiculo($placa, $marca, $color, $dueno, $documento, $horaIngreso);
    
    return $vehiculo;
}

function menu() {
    echo "\n===== Sistema de Parqueadero =====\n";
    echo "1. Registrar Vehículo\n";
    echo "2. Retirar Vehículo\n";
    echo "3. Salir\n";
    echo "Seleccione una opción: ";
    $opcion = trim(fgets(STDIN));
    
    return $opcion;
}

while (true) {
    $opcion = menu();
    
    switch ($opcion) {
        case 1:
            // Registrar vehículo
            $vehiculo = solicitarDatosVehiculo();
            if ($parqueadero->agregarPiso($vehiculo)) {
                echo "Vehículo registrado correctamente.\n";
            } else {
                echo "No hay espacio disponible en el parqueadero.\n";
            }
            break;
        
        case 2:
            // Retirar vehículo
            echo "Ingrese la placa del vehículo a retirar: ";
            $placa = trim(fgets(STDIN));
            $resultado = $parqueadero->buscarPiso($placa);
            
            if ($resultado !== null) {
                echo "Ingrese la hora de salida (formato: YYYY-MM-DD HH:MM:SS): ";
                $horaSalida = trim(fgets(STDIN));
                $vehiculo = $resultado['vehiculo'];
                $vehiculo->registrarSalida($horaSalida);
                
                echo "Ubicación: Piso " . $resultado['piso'] . " Puesto " . $resultado['puesto'] . "\n";
                echo "Costo del parqueo: $" . $vehiculo->calcularCosto() . " USD\n";
            } else {
                echo "Vehículo con placa $placa no encontrado.\n";
            }
            break;
        
        case 3:
            echo "Saliendo del sistema...\n";
            exit;
        
        default:
            echo "Opción no válida. Intente nuevamente.\n";
    }
}


