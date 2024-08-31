<?php
require_once("Vehiculo.php");
class Piso {
    protected $numeroPiso;
    protected $puestos;

    public function __construct($numeroPiso) {
        $this->numeroPiso = $numeroPiso;
        $this->puestos = [];
    }

    public function agregarVehiculo1($vehiculo) {
        if (count($this->puestos) < 10) {
            $this->puestos[] = $vehiculo;
            return true;
        }
        return false;
    }

    public function buscarVehiculo1($placa) {
        foreach ($this->puestos as $index => $vehiculo) {
            if ($vehiculo->getPlaca() === $placa) { 
                // Renderiza la información del vehículo si se encuentra
                $vehiculo->getImprimirInfoVehiculo();
                return [
                    'piso' => $this->numeroPiso, 
                    'puesto' => $index + 1,
                    'vehiculo' => $vehiculo
                ];

            
            }
        }
        return null; // Vehículo no encontrado
    }
    

    
}

?>
