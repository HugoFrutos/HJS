<?php

use PHPUnit\Framework\TestCase;

require_once 'clases/Gasto.php';
require_once 'clases/Conexion.php';

class MostrarTest extends TestCase
{
    public function testMostrar()
    {
        // Actuar
        $objeto = new Gasto(); 
        $resultado = $objeto->mostrar();
        
        // Afirmar
        $this->assertNotNull($resultado);
        $this->assertInstanceOf(mysqli_result::class, $resultado);
    }
}


?>