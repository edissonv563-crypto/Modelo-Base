<?php
include_once("conexionBaseDatos.php");

class Medicamento
{
    // Definición de Atributos
    private $codigo;
    private $nombre;
    private $presentacion;
    private $laboratorio;
    private $Conexion;

    // Método Inicializador
    public function crearMedicamento($codigo, $nombre, $presentacion, $laboratorio)
    {
        $this->codigo = $codigo;
        $this->nombre = $nombre;
        $this->presentacion = $presentacion;
        $this->laboratorio = $laboratorio;
    }

    // Definición de Métodos Get y Set (Accesores y Modificadores)
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }

    public function getCodigo()
    {
        return ($this->codigo);
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getNombre()
    {
        return ($this->nombre);
    }

    public function setPresentacion($presentacion)
    {
        $this->presentacion = $presentacion;
    }

    public function getPresentacion()
    {
        return ($this->presentacion);
    }

    public function setLaboratorio($laboratorio)
    {
        $this->laboratorio = $laboratorio;
    }

    public function getLaboratorio()
    {
        return ($this->laboratorio);
    }

    // Métodos Asociados al CRUD
    public function agregarMedicamento()
    {
        $this->Conexion = Conectarse();
        $sql = "insert into medicamentos(medCodigo, medNombre, medPresentacion, medLaboratorio)
                values ('$this->codigo', '$this->nombre', '$this->presentacion', '$this->laboratorio')";
        $resultado = $this->Conexion->query($sql);
        $this->Conexion->close();
        return $resultado;
    }

    public function consultarMedicamento($codigo)
    {
        $this->Conexion = Conectarse();
        $sql = "select * from medicamentos where medCodigo='$codigo'";
        $resultado = $this->Conexion->query($sql);
        $this->Conexion->close();
        return $resultado;
    }

    public function consultarMedicamentos()
    {
        $this->Conexion = Conectarse();
        $sql = "select * from medicamentos";
        $resultado = $this->Conexion->query($sql);
        $this->Conexion->close();
        return $resultado;
    }

    public function actualizarMedicamento()
    {
        $this->Conexion = Conectarse();
        $sql = "update medicamentos set medNombre='$this->nombre', medPresentacion='$this->presentacion', medLaboratorio='$this->laboratorio'
                where medCodigo='$this->codigo'";
        $resultado = $this->Conexion->query($sql);
        $this->Conexion->close();
        return $resultado;
    }

    public function eliminarMedicamento($codigo)
    {
        $this->Conexion = Conectarse();
        $sql = "delete from medicamentos where medCodigo='$codigo'";
        $resultado = $this->Conexion->query($sql);
        $this->Conexion->close();
        return $resultado;
    }
}
?>