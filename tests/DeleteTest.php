<?php
use PHPUnit\Framework\TestCase;

require_once 'clases/Gasto.php';
require_once 'clases/Conexion.php';

class DeleteTest extends TestCase
{
    public function testDelete()
    {
        // Preparar
        $id = 1; // ID del gasto a eliminar
        
        // Actuar
        $objeto = new Gasto(); 
        $resultado = $objeto->delete($id);
        
        // Afirmar
        $this->assertTrue($resultado);
    }
}


?>