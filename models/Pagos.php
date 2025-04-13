<?php
namespace Models;
require_once __DIR__ . "/../models/BaseModel.php";

use Exception;
class Pagos extends BaseModel
{
    private int $id_pago;
    private \DateTime $fecha_pago;
    private float $monto;
    private int $id_venta;
    private int $id_metodo_pago;

    public function __construct($pdo)
    {
        parent::__construct($pdo);
    }

    // Métodos para procedimientos de almacenamientos
    public function crearPago($fecha_pago, $monto, $id_venta, $id_metodo_pago)
    {
        return $this->callProcedure('crear', [$fecha_pago, $monto, $id_venta, $id_metodo_pago]);
    }

    public function obtenerPagos()
    {
        return $this->callProcedure('visualizar', []);
    }

    public function obtenerListaUsuarioPagos($id_usuario)
    {
        return $this->callProcedure('lista_usuario', [$id_usuario]);
    }

    public function obtenerInfoPagos($id_pago, $id_usuario) {
        try {
            // 1. Ejecutar el procedimiento
            $result = $this->callProcedure('info_modal', [$id_pago, $id_usuario]);
            
            // 2. Debug detallado
            error_log("Resultado crudo del SP: " . print_r($result, true));
            
            // 3. Verificar y procesar el resultado
            if (empty($result)) {
                error_log("El SP no devolvió resultados para id_pago: $id_pago, id_usuario: $id_usuario");
                return [];
            }
            
            // 4. Asegurar que tomamos el primer resultado (si es un array de arrays)
            $primerResultado = is_array($result[0] ?? null) ? $result[0] : $result;
            
            // 5. Validar campos mínimos
            if (!isset($primerResultado['id_pago'])) {
                error_log("El resultado no tiene la estructura esperada");
                return [];
            }
            
            return $primerResultado;
        } catch (Exception $e) {
            error_log("Error en obtenerInfoPagos: " . $e->getMessage());
            return ['error' => $e->getMessage()];
        }
    }
    
    // Getters y Setters
    public function getIdPago(): int
    {
        return $this->id_pago;
    }

    public function setIdPago(int $id_pago): void
    {
        $this->id_pago = $id_pago;
    }

    public function getFechaPago(): \DateTime
    {
        return $this->fecha_pago;
    }

    public function setFechaPago(\DateTime $fecha_pago): void
    {
        $this->fecha_pago = $fecha_pago;
    }

    public function getMonto(): float
    {
        return $this->monto;
    }

    public function setMonto(float $monto): void
    {
        $this->monto = $monto;
    }

    public function getIdVenta(): int
    {
        return $this->id_venta;
    }

    public function setIdVenta(int $id_venta): void
    {
        $this->id_venta = $id_venta;
    }

    public function getIdMetodoPago(): int
    {
        return $this->id_metodo_pago;
    }

    public function setIdMetodoPago(int $id_metodo_pago): void
    {
        $this->id_metodo_pago = $id_metodo_pago;
    }
}
