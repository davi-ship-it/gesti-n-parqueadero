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
            // Retirar vehículo con confirmación
            echo "Ingrese la placa del vehículo a retirar: ";
            $placa = trim(fgets(STDIN));
            $resultado = $parqueadero->buscarPiso($placa);
            
            if ($resultado !== null) {
                $vehiculo = $resultado['vehiculo'];
                // Mostrar los datos del vehículo
                echo "===== Información del Vehículo =====\n";
                $vehiculo->mostrarDatos();
                echo "Ubicación: Piso " . $resultado['piso'] . " Puesto " . $resultado['puesto'] . "\n";
                
                // Preguntar si desea retirar el vehículo
                echo "¿Desea retirar el vehículo? (s/n): ";
                $confirmar = strtolower(trim(fgets(STDIN)));
                
                if ($confirmar === 's') {
                    // Pedir la hora de salida
                    echo "Ingrese la hora de salida (formato: YYYY-MM-DD HH:MM:SS): ";
                    $horaSalida = trim(fgets(STDIN));
                    $vehiculo->registrarSalida($horaSalida);
                    
                    // Calcular y mostrar el costo del parqueo
                    echo "Costo del parqueo: $" . $vehiculo->calcularCosto() . " USD\n";
                    
                    // Eliminar el vehículo automáticamente
                    if ($parqueadero->eliminarVehiculoPorPlaca($placa)) {
                        echo "Vehículo retirado correctamente.\n";
                    } else {
                        echo "Error al retirar el vehículo.\n";
                    }
                } else {
                    echo "Operación cancelada. El vehículo no ha sido retirado.\n";
                }
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

