<?php
include_once("conexionBaseDatos.php");

class Consultorio
{
    // Definición de Atributos
    private $idConsultorio;
    private $nombre;
    private $Conexion;

    // Método Inicializador
    public function crearConsultorio($idConsultorio, $nombre)
    {
        $this->idConsultorio = $idConsultorio;
        $this->nombre = $nombre;
    }

    // Definición de Métodos Get y Set (Accesores y Modificadores)
    public function setIdConsultorio($idConsultorio)
    {
        $this->idConsultorio = $idConsultorio;
    }

    public function getIdConsultorio()
    {
        return ($this->idConsultorio);
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getNombre()
    {
        return ($this->nombre);
    }

    // Métodos Asociados al CRUD
    public function agregarConsultorio()
    {
        $this->Conexion = Conectarse();
        $sql = "insert into consultorios(idConsultorio, conNombre)
                values ('$this->idConsultorio', '$this->nombre')";
        $resultado = $this->Conexion->query($sql);
        $this->Conexion->close();
        return $resultado;
    }

    public function consultarConsultorio($idConsultorio)
    {
        $this->Conexion = Conectarse();
        $sql = "select * from consultorios where idConsultorio='$idConsultorio'";
        $resultado = $this->Conexion->query($sql);
        $this->Conexion->close();
        return $resultado;
    }

    public function consultarConsultorios()
    {
        $this->Conexion = Conectarse();
        $sql = "select * from consultorios";
        $resultado = $this->Conexion->query($sql);
        $this->Conexion->close();
        return $resultado;
    }

    public function actualizarConsultorio()
    {
        $this->Conexion = Conectarse();
        $sql = "update consultorios set conNombre='$this->nombre'
                where idConsultorio='$this->idConsultorio'";
        $resultado = $this->Conexion->query($sql);
        $this->Conexion->close();
        return $resultado;
    }

    public function eliminarConsultorio($idConsultorio)
    {
        $this->Conexion = Conectarse();
        $sql = "delete from consultorios where idConsultorio='$idConsultorio'";
        $resultado = $this->Conexion->query($sql);
        $this->Conexion->close();
        return $resultado;
    }
}
?>