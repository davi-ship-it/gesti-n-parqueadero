<?php
require_once 'Piso.php';

class Parqueadero {
    protected $pisos = [];

    public function __construct() {
        for ($i = 1; $i <= 4; $i++) {
            $this->pisos[$i] = new Piso($i);
        }
    }

    public function agregarPiso($vehiculo) {
        foreach ($this->pisos as $piso) {
            if ($piso->agregarPuesto($vehiculo)) {
                return true;
            }
        }
        return false;
    }

    public function buscarPiso($placa) {
        foreach ($this->pisos as $piso) {
            $resultado = $piso->buscarPuesto($placa);
            if ($resultado !== null) {
                return $resultado;
            }
        }
        return null;
    }
}

?>
