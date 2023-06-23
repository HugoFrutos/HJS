<?php
use PHPUnit\Framework\TestCase;


require_once 'clases/Gasto.php';
require_once 'clases/Conexion.php';

class TotalTest extends TestCase
{
    public function testTotal()
    {
        // Preparar
        $f1 = '2023-01-23';
        $f2 = '2023-12-23';
        
        // Actuar
        $objeto = new Gasto(); 
        $resultado = $objeto->total($f1, $f2);

        // Obtener el valor numérico del resultado de la consulta
        $valorNumerico = mysqli_fetch_row($resultado)[0];
        
        // Afirmar
        $this->assertEquals(2200, $valorNumerico);
    }
}

?>