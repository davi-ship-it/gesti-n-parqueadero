<?php
require_once("Vehiculo.php");

class Parqueadero {
    private $pisos;

    public function __construct() {
        $this->pisos = [
            1 => array_fill(0, 10, null), 
            2 => array_fill(0, 10, null), 
            3 => array_fill(0, 10, null), 
            4 => array_fill(0, 10, null), 
        ];
    }

    public function agregarPiso($vehiculo) {
        // Buscar el primer puesto vacío en cualquier piso
        foreach ($this->pisos as $piso => $puestos) {
            foreach ($puestos as $indice => $puesto) {
                if ($puesto === null) {
                    // Asignar el vehículo al puesto vacío
                    $this->pisos[$piso][$indice] = $vehiculo;
                    return true; // Registro exitoso
                }
            }
        }
        return false; // Si no hay espacio
    }

    public function buscarPiso($placa) {
        // Buscar el vehículo por placa en el parqueadero
        foreach ($this->pisos as $piso => $puestos) {
            foreach ($puestos as $indice => $vehiculo) {
                if ($vehiculo !== null && $vehiculo->getPlaca() === $placa) {
                    return [
                        'piso' => $piso,
                        'puesto' => $indice + 1, // Retornar el puesto (usamos +1 para evitar índice 0)
                        'vehiculo' => $vehiculo
                    ];
                }
            }
        }
        return null; // No se encontró el vehículo
    }

    public function eliminarVehiculoPorPlaca($placa) {
        // Eliminar el vehículo del parqueadero
        foreach ($this->pisos as $piso => $puestos) {
            foreach ($puestos as $indice => $vehiculo) {
                if ($vehiculo !== null && $vehiculo->getPlaca() === $placa) {
                    $this->pisos[$piso][$indice] = null; // Eliminar el vehículo
                    return true;
                }
            }
        }
        return false; // Si no se encontró el vehículo
    }
}


