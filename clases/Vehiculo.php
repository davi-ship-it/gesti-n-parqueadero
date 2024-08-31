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

    // Métodos GET para acceder a las propiedades del vehículo

    public function getInfoVehiculo(){
        $arrVehiculo = [
            "Placa" => $this->placa,
            "Marca" => $this->marca,
            "Color" => $this->color,
            "Nombre de Cliente" => $this->nombreCliente,
            "Documento del Cliente" => $this->documentoCliente,
            "Hora de Ingreso" => $this->horaIngreso,
            "Hora de Salida" => $this->horaSalida
        ];
        
        return $arrVehiculo;
      
    }
    public function getImprimirInfoVehiculo() {
        $arrVehiculo = $this->getInfoVehiculo();
    
        foreach ($arrVehiculo as $atributo => $valor) {
            echo "<b><p>$atributo:</p></b>";
            echo "<p>$valor</p>";
           
        }
    }

    public function getPlaca() {
        return $this->placa; 
        }

}



?>
