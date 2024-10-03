<?php

class Vehiculo {
    protected $placa;
    protected $marca;
    protected $color;
    protected $nombreCliente;
    protected $documentoCliente;
    protected $horaIngreso;
    protected $horaSalida;

    public function __construct(string $placa, $marca, $color, $nombreCliente, $documentoCliente, $horaIngreso) {
        $this->placa = $placa;
        $this->marca = $marca;
        $this->color = $color;
        $this->nombreCliente = $nombreCliente;
        $this->documentoCliente = $documentoCliente;
        $this->horaIngreso = $horaIngreso;
        $this->horaSalida = null;
    }
    public function mostrarDatos() {
        echo "\n===== Datos del Vehículo =====\n";
        echo "Placa: " . $this->placa . "\n";
        echo "Marca: " . $this->marca . "\n";
        echo "Color: " . $this->color . "\n";
        echo "Dueño: " . $this->nombreCliente . "\n";
        echo "Documento del Dueño: " . $this->documentoCliente . "\n";
        echo "Hora de Ingreso: " . $this->horaIngreso . "\n";
        if ($this->horaSalida) {
            echo "Hora de Salida: " . $this->horaSalida . "\n";
        }
        echo "=============================\n";
    }

    

    public function registrarSalida($horaSalida) {
        $this->horaSalida = $horaSalida;
    }

    public function calcularCosto() {
        if ($this->horaSalida === null) {
            return 0;
        }

        $horas = (strtotime($this->horaSalida) - strtotime($this->horaIngreso)) / 3600;
        return round($horas) * 2; // $2 USD por hora
    }

    public function getPlaca() {
        return $this->placa; 
    }
}



