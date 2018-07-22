<?php
class Casos extends Validator
{
    private $id_caso = null;
    private $descripcion = null;
    private $fecha = null;
    private $id_cita = null;

    public function setIdCaso($value)
    {
        if($this->validateId($value))
        {
            $this->id_caso = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getIdCaso()
    {
        return $this->id_caso;
    }

    public function setDescripcion($value)
    {
        if($this->validateAlphanumeric($value, 1, 500))
        {
            $this->descripcion = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setFecha($value)
    {
        if($this->validateAlphanumeric($value, 1, 10))
        {
            $this->fecha = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getFecha()
    {
        return $this->fecha;
    }
    
    public function setIdCita($value)
    {
        if($this->validateId($value))
        {
            $this->id_cita = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getIdCita()
    {
        return $this->id_cita;
    }

    //Metodos para el SCRUD
    public function checkCitatbCasos()
    {
        $sql = "SELECT cs.id_cita FROM citas c INNER JOIN casos cs ON c.id = cs.id_cita INNER JOIN detalle_solicitud d ON c.id_detalle = d.id_detalle WHERE d.id_detalle = ?";
        $params = array($this->id_cita);
        return Database::getRow($sql, $params);
    }

    public function checkCitatbCitas()
    {
        $sql = "SELECT c.id FROM citas c INNER JOIN detalle_solicitud d ON c.id_detalle = d.id_detalle WHERE d.id_detalle = ?";
        $params = array($this->id_cita);
        return Database::getRow($sql, $params);
    }

    public function getIdCitas()
    {
        $sql = "SELECT c.id FROM citas c INNER JOIN detalle_solicitud d ON c.id_detalle = d.id_detalle WHERE d.id_detalle = ?";
        $params = array($this->id_cita);
        return Database::getRow($sql, $params);
    }
    public function getCasos()
    {
        $sql = "SELECT c.id_caso, c.descripcion, c.fecha, c.id_cita, es.estado_solicitud, e.n_carnet, e.primer_nombre, e.segundo_nombre, e.primer_apellido, e.segundo_apellido, ct.start FROM casos c INNER JOIN citas ct ON c.id_cita = ct.id INNER JOIN detalle_solicitud d ON ct.id_detalle = d.id_detalle INNER JOIN estado_solicitud es ON d.id_estado = es.id_estado INNER JOIN solicitud s ON d.id_solicitud = s.id_solicitud INNER JOIN estudiantes e ON s.id_estudiante = e.id_estudiante";
        $params = array(null);
        return Database::getRows($sql, $params);
    }

    public function createCaso()
    {
        $sql = "INSERT INTO casos(descripcion, fecha, id_cita) VALUES(?, ?, ?)";
        $params = array($this->descripcion, $this->fecha, $this->id_cita);
        return Database::executeRow($sql, $params);
    }

    public function updateCaso()
    {
        $sql = "UPDATE casos SET descripcion = ? WHERE id_caso = ?";
        $params = array($this->descripcion, $this->id_caso);
        return Database::executeRow($sql ,$params);
    }

    public function deleteCaso()
    {
        $sql = "DELETE FROM casos WHERE id_caso = ?";
        $params = array($this->id_caso);
        return Database::executeRow($sql, $params);
    }
}
?>