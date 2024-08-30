<?php

class Vehiculo {
    protected $placa;
    protected $marca;
    protected $color;
    protected $nombreCliente;
    protected $documentoCliente;
    protected $horaIngreso;
    protected $horaSalida;

    public function __construct($placa, $marca, $color, $nombreCliente, $documentoCliente, $horaIngreso) {
        $this->placa = $placa;
        $this->marca = $marca;
        $this->color = $color;
        $this->nombreCliente = $nombreCliente;
        $this->documentoCliente = $documentoCliente;
        $this->horaIngreso = $horaIngreso;
        $this->horaSalida = null; // Inicializar como null para identificar si no se ha registrado salida
    }

    public function registrarSalida($horaSalida) {
        $this->horaSalida = $horaSalida;
    }

    public function calcularCosto() {
        // Verificar si la hora de salida se ha establecido
        if ($this->horaSalida === null) {
            return 0; // Retornar 0 si no se ha registrado la salida
        }

        $horas = (strtotime($this->horaSalida) - strtotime($this->horaIngreso)) / 3600;
        return round($horas) * 2; // $2 USD por hora
    }

    public function getPlaca() {
        return $this->placa;
    }
}

?>
