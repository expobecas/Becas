<?php

class Solicitud extends Validator
{
    private $id_solicitud = null;
    private $id_estudiante = null;
    private $id_genero = null;
    private $religion = null;
    private $encargado = null;
    private $direccion = null;
    private $correo = null;
    private $tel_fijo = null;
    private $cel_papa = null;
    private $cel_mama = null;
    private $cel_hijo = null;
    private $fecha_nacimiento = null;
    private $lugar_nacimiento = null;
    private $pais_nacimiento = null;
    private $estudios_finan = null;
    private $id_institucion_proveniente = null;
    private $fecha = null;
    private $nombres_responsable = null;
    private $apellidos_responsable = null;
    private $id_estado = null;

    public function setIdSolicitud($value)
    {
        if($this->validateId($value))
        {
            $this->id_solicitud = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getIdSolicitud()
    {
        return $this->id_solicitud;
    }

    public function setIdEstudiante($value)
    {
        if($this->validateId($value))
        {
            $this->id_estudiante = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getIdEstudiante()
    {
        return $this->id_estudiante;
    }

    public function setIdGenero($value)
    {
        if($this->validateId($value))
        {
            $this->id_genero = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getIdGenero()
    {
        return $this->id_genero;
    }

    public function setReligion($value)
    {
        if($this->validateAlphabetic($value, 1, 30))
        {
            $this->religion = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getReligion()
    {
        return $this->religion;
    }

    public function setEncargado($value)
    {
        if($this->validateAlphabetic($value, 1, 30))
        {
            $this->encargado = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getEncargado()
    {
        return $this->encargado;
    }

    public function setDireccion($value)
    {
        if($this->validateAlphanumeric($value, 1, 50))
        {
            $this->direccion = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getDireccion()
    {
        return $this->direccion;
    }

    public function setCorreo($value)
    {
        if($this->validateAlphanumeric($value, 1, 50))
        {
            $this->correo = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getCorreo()
    {
        return $this->correo;
    }

    public function setTelFijo($value)
    {
        if($this->validateId($value))
        {
            $this->tel_fijo = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getTelFijo()
    {
        return $this->tel_fijo;
    }

    public function setCelMama($value)
    {
        if($this->validateId($value))
        {
            $this->cel_mama = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getCelMama()
    {
        return $this->cel_mama;
    }

    public function setCelPapa($value)
    {
        if($this->validateId($value))
        {
            $this->cel_papa = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getCelPapa()
    {
        return $this->cel_papa;
    }

    public function setCelHijo($value)
    {
        if($this->validateId($value))
        {
            $this->cel_hijo = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getCelHijo()
    {
        return $this->cel_hijo;
    }

    public function setFechaNacimiento($value)
    {
        if($this->validateAlphanumeric($value, 1, 10))
        {
            $this->fecha_nacimiento = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getFechaNacimiento()
    {
        return $this->fecha_nacimiento;
    }

    public function setLugarNacimiento($value)
    {
        if($this->validateAlphanumeric($value, 1, 25))
        {
            $this->lugar_nacimiento = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getLugarNacimiento()
    {
        return $this->lugar_nacimiento;
    }

    public function setPaisNacimiento($value)
    {
        if($this->validateAlphanumeric($value, 1, 25))
        {
            $this->pais_nacimiento = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getPaisNacimiento()
    {
        return $this->pais_nacimiento;
    }

    public function setEstudiosFinan($value)
    {
        if($this->validateAlphanumeric($value, 1, 30))
        {
            $this->estudios_finan = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getEstudiosFinan()
    {
        return $this->estudios_finan;
    }

    public function setIdInstitucion($value)
    {
        if($this->validateId($value))
        {
            $this->id_institucion_proveniente = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getIdInstitucion()
    {
        return $this->id_institucion_proveniente;
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

    public function setNombresResponsable($value)
    {
        if($this->validateAlphabetic($value, 1, 30))
        {
            $this->nombres_responsable = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getNombresResponsable()
    {
        return $this->nombres_responsable;
    }

    public function setApellidosResponsable($value)
    {
        if($this->validateAlphabetic($value, 1, 30))
        {
            $this->apellidos_responsable = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getApellidosResponsable()
    {
        return $this->apellidos_responsable;
    }
    public function setId_estado($value)
    {
        if($this->validateId($value))
        {
            $this->id_estado = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getId_estado()
    {
        return $this->id_solicitud;
    }

    //Metodos para el manejo del SCRUD
    public function getGeneros()
    {
        $sql = "SELECT id_genero, genero FROM genero";
        $params = array(null);
        return Database::getRows($sql, $params);
    }

    //Metodos para el manejo del SCRUD

    /****************************************************************************************************************************************************************************
     *************************************************************METODOS PARA SCRUD DE LA SOLICITUD***********************************************************************************
     ***************************************************************************************************************************************************************************/
    public function checkSolicitud()
    {
        $sql = "SELECT s.id_solicitud FROM solicitud s INNER JOIN estudiantes e ON s.id_estudiante = e.id_estudiante WHERE e.id_estudiante = ?";
        $params = array($this->id_estudiante);
        return Database::getRow($sql, $params);
    }

    public function createSolicitud()
    {
        $sql = "INSERT INTO solicitud(id_estudiante, id_genero, religion, encargado, direccion, correo, tel_fijo, cel_papa, cel_mama, cel_hijo, fecha_nacimiento, lugar_nacimiento, pais_nacimiento, estudios_finan, id_institucion_proveniente, fecha, nombres_responsable, apellidos_responsable) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $params = array($this->id_estudiante, $this->id_genero, $this->religion, $this->encargado, $this->direccion, $this->correo, $this->tel_fijo, $this->cel_papa, $this->cel_mama, $this->cel_hijo, $this->fecha_nacimiento, $this->lugar_nacimiento, $this->pais_nacimiento, $this->estudios_finan, $this->id_institucion_proveniente, $this->fecha, $this->nombres_responsable, $this->apellidos_responsable);
        $solicitud = Database::executeRow($sql, $params);
        if($solicitud)
        {
            $this->id_solicitud = Database::getLastRowId();
        }
    }


    /****************************************************************************************************************************************************************************
     *************************************************************VISTA DE TABLAS - INDEX VIEW***********************************************************************************
     ***************************************************************************************************************************************************************************/
    public function getVistageneral() {
        $sql    = "SELECT solicitud.id_solicitud, primer_nombre, primer_apellido, n_carnet, grado, especialidad, encargado, tel_fijo, detalle_solicitud.id_detalle, solicitud.fecha FROM solicitud INNER JOIN estudiantes USING(id_estudiante) INNER JOIN detalle_solicitud ON detalle_solicitud.id_solicitud = solicitud.id_solicitud";
        $params = array(null);
        return Database::getRows($sql, $params);
    }
    public function getUltimasSol() {
        $sql    = "SELECT solicitud.id_solicitud, primer_nombre, primer_apellido, n_carnet, grado, especialidad, encargado, tel_fijo, detalle_solicitud.id_detalle FROM solicitud INNER JOIN estudiantes USING(id_estudiante) INNER JOIN detalle_solicitud ON detalle_solicitud.id_solicitud = solicitud.id_solicitud ORDER BY solicitud.id_solicitud ASC";
        $params = array(null);
        return Database::getRows($sql, $params);
    }
    public function getArchivoSolicitud() {
        $sql    = "SELECT solicitud.id_solicitud, primer_nombre, primer_apellido, n_carnet, grado, especialidad, encargado, tel_fijo, detalle_solicitud.id_detalle, solicitud.fecha FROM solicitud INNER JOIN estudiantes USING(id_estudiante) INNER JOIN detalle_solicitud ON detalle_solicitud.id_solicitud = solicitud.id_solicitud WHERE detalle_solicitud.id_estado = ? ORDER BY solicitud.fecha DESC";
        $params = array($this->id_estado);
        return Database::getRows($sql, $params);
    }
    public function getAprobadas() {
        $sql = "SELECT solicitud.id_solicitud, primer_nombre, primer_apellido, n_carnet, grado, especialidad, encargado, tel_fijo FROM detalle_solicitud INNER JOIN solicitud USING(id_solicitud) INNER JOIN estudiantes ON solicitud.id_estudiante = estudiantes.id_estudiante WHERE detalle_solicitud.id_estado = 1";
        $params = array(null);
        return Database::getRows($sql, $params);
    }
    public function getRechazadas() {
        $sql = "SELECT solicitud.id_solicitud, primer_nombre, primer_apellido, n_carnet, grado, especialidad, encargado, tel_fijo FROM detalle_solicitud INNER JOIN solicitud USING(id_solicitud) INNER JOIN estudiantes ON solicitud.id_estudiante = estudiantes.id_estudiante WHERE detalle_solicitud.id_estado = 3";
        $params = array(null);
        return Database::getRows($sql, $params);
    }
    public function getSolicitudPorTipo() {
        $sql = "SELECT e.estado_solicitud, m.primer_nombre, m.primer_apellido, m.n_carnet, m.especialidad, m.grado FROM detalle_solicitud INNER JOIN solicitud s USING(id_solicitud) INNER JOIN estudiantes m USING(id_estudiante) INNER JOIN estado_solicitud e USING (id_estado) WHERE id_estado = 1";
        $params = array(null);
        return Database::getRows($sql, $params);

    }
    public function getSolicitudPorTipo2() {
        $sql = "SELECT e.estado_solicitud, m.primer_nombre, m.primer_apellido, m.n_carnet, m.especialidad, m.grado FROM detalle_solicitud INNER JOIN solicitud s USING(id_solicitud) INNER JOIN estudiantes m USING(id_estudiante) INNER JOIN estado_solicitud e USING (id_estado) WHERE id_estado = 2";
        $params = array(null);
        return Database::getRows($sql, $params);

    }
    public function getSolicitudPorTipo3() {
        $sql = "SELECT e.estado_solicitud, m.primer_nombre, m.primer_apellido, m.n_carnet, m.especialidad, m.grado FROM detalle_solicitud INNER JOIN solicitud s USING(id_solicitud) INNER JOIN estudiantes m USING(id_estudiante) INNER JOIN estado_solicitud e USING (id_estado) WHERE id_estado = 3";
        $params = array(null);
        return Database::getRows($sql, $params);   

    }

    /****************************************************************************************************************************************************************************
     *************************************************************METODOS PARA SCRUD DEL REPORTE DE LA SOLICITUD*****************************************************************
     ***************************************************************************************************************************************************************************/

    public function getSolicitud()
    {
        $sql = "SELECT s.id_solicitud, s.id_estudiante, g.genero, s.religion, s.encargado, s.direccion, s.correo, s.tel_fijo, s.cel_papa, s.cel_mama, s.cel_hijo, s.fecha_nacimiento, s.lugar_nacimiento, s.pais_nacimiento, s.estudios_finan, ip.nombre_institucion, ip.lugar_institucion, ip.cuota_pagada, ip.año, s.fecha, s.nombres_responsable, s.apellidos_responsable, es.primer_nombre, es.segundo_nombre, es.primer_apellido, es.segundo_apellido, es.n_carnet, es.grado, es.especialidad 
        FROM solicitud s INNER JOIN estudiantes es ON s.id_estudiante = es.id_estudiante INNER JOIN genero g ON s.id_genero = g.id_genero INNER JOIN institucion_proveniente ip ON s.id_institucion_proveniente = ip.id_institucion_proveniente
        WHERE s.id_solicitud = ? ";
        $params = array($this->id_solicitud);
        return Database::getRow($sql, $params);
    }

    public function getPropiedad()
    {
        $sql = "SELECT p.id_propiedad, p.tipo_propiedad, p.cuota_mensual, p.valor_casa 
        FROM propiedad p INNER JOIN intermedia_propiedad inp ON p.id_propiedad = inp.id_propiedad INNER JOIN integrante_familia inf ON inp.id_integrante = inf.id_integrante INNER JOIN solicitud s ON inf.id_solicitud = s.id_solicitud 
        WHERE s.id_solicitud = ?";
        $params = array($this->id_solicitud);
        return Database::getRow($sql, $params);
    }

    public function getGrupoFamiliar()
    {
        $sql = "SELECT gf.ingreso_familiar, gf.id_gastos, gf.total_gastos, gf.id_solicitud, gf.monto_deuda, rf.monto, rf.periodo_recibido, rf.benefactor FROM grupo_familiar gf INNER JOIN solicitud s ON gf.id_solicitud = s.id_solicitud LEFT JOIN remesas_familiar rf ON gf.id_familia = rf.id_familia WHERE s.id_solicitud = ?";
        $params = array($this->id_solicitud);
        return Database::getRow($sql, $params);
        
    }
}
?>