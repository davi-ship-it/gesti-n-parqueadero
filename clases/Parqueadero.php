<?php
require_once 'Piso.php';

class Parqueadero {
    protected $pisos = [];

    public function __construct() {
        // Crear los 4 pisos
        for ($i = 1; $i <= 4; $i++) {
            $this->pisos[$i] = new Piso($i);
        }
    }

    // Método para agregar un vehículo al parqueadero, buscando el primer piso con espacio
    public function agregarVehiculo(Vehiculo $vehiculo) {
        foreach ($this->pisos as $piso) {
            if ($piso->agregarVehiculo($vehiculo)) {
                return true;
            }
        }
        return false; // No hay espacios disponibles en todo el parqueadero
    }

    // Método para retirar un vehículo del parqueadero y reorganizar los puestos
    public function retirarVehiculo($placa) {
        foreach ($this->pisos as $piso) {
            $costo = $piso->retirarVehiculo($placa);
            if ($costo !== null) {
                // Reorganizar los puestos en todos los pisos después de retirar el vehículo
                foreach ($this->pisos as $p) {
                    $p->reorganizarPuestos();
                }
                return $costo;
            }
        }
        return null; // Vehículo no encontrado en todo el parqueadero
    }

    // Método para buscar un vehículo en el parqueadero
    public function buscarVehiculo($placa) {
        foreach ($this->pisos as $piso) {
            $resultado = $piso->buscarVehiculo($placa);
            if ($resultado !== null) {
                return $resultado;
            }
        }
        return null; // Vehículo no encontrado
    }
}
?>
