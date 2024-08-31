<?php
require_once("Vehiculo.php");
class Piso {
    protected $numeroPiso;
    protected $puestos;

    public function __construct($numeroPiso) {
        $this->numeroPiso = $numeroPiso;
        $this->puestos = [];
    }

    public function agregarVehiculo($vehiculo) {
        if (count($this->puestos) < 10) {
            $this->puestos[] = $vehiculo;
            return true;
        }
        return false;
    }

    public function buscarVehiculo($placa) {
        foreach ($this->puestos as $index => $vehiculo) {
            if ($vehiculo->getPlaca() === $placa) { // Aquí se llama a getPlaca()
                return ['piso' => $this->numeroPiso, 'puesto' => $index + 1, 'vehiculo' => $vehiculo];
            }
        }
        return null;
    }

    
}

?>
