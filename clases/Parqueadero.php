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
    public function agregarVehiculo($vehiculo) {
        foreach ($this->pisos as $piso) {
            if ($piso->agregarVehiculo1($vehiculo)) {
                return true;
            }
        }
        return false; // No hay espacios disponibles en todo el parqueadero
    }

    // Método para buscar un vehículo en el parqueadero
    public function buscarVehiculo($placa) {
        foreach ($this->pisos as $piso) {
            $resultado = $piso->buscarVehiculo1($placa);
            if ($resultado !== null) {
                return $resultado;
            }
        }
        return null; // Vehículo no encontrado
    }
    public function mostrarUbicacionCosto($vehiculosBuscar){
        foreach ($vehiculosBuscar as $placa) {
            $busqueda = $this->buscarVehiculo($placa);
            
            if ($busqueda !== null) {

                echo "<b>Ubicacion:</b> <br>Piso: " . $busqueda['piso'] . "<br>
                 Puesto: " . $busqueda['puesto'] . "<br>";
        
                echo "<b>Costo del parqueo:</b> $" . $busqueda['vehiculo']->calcularCosto() . " USD<br><br><hr>";
        
              
            } else {
                echo "Vehículo no encontrado.<br><br><hr>";
            }
    }

}
}
   
?>
