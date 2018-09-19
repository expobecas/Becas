<?php
class Pagos extends Validator{
    /*DATOS DE LOS PATROCINADORES*/
    private $id_recibo = null;
    private $fecha_recibo = null;
    private $id_patrocinador = null;
    private $monto = null;
    private $fecha_entregado = null;
     /*SET & GET PAGOS*/
     public function setId_recibo($value)
     {
         if($this->validateId($value))
         {
             $this->id_recibo = $value;
             return true;
         }
         else
         {
             return false;
         }
     }
     public function getId_recibo()
     {
         return $this->id_recibo;
     }

     public function setFechaRecibo($value)
    {
      if($this->validateAlphanumeric($value, 1, 60))
      {
          $this->fecha_recibo = $value;
          return true;
      }
      else
      {
          return false;
      }
    }
    public function getFechaRecibo()
    {
        return $this->fecha_recibo;
    }

    public function setId_patrocinador($value)
    {
        if($this->validateId($value))
        {
            $this->id_patrocinador = $value;
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getId_patrocinador()
    {
        return $this->id_patrocinador;
    }

    public function setMonto($value){
        if($this->validateAlphanumeric($value, 1, 50)){
            $this->monto = $value;
            return true;
        }else{
            return false;
        }
    }
    public function getMonto(){
        return $this->monto;
    }

    public function setFechaEntregado($value)
    {
      if($this->validateAlphanumeric($value, 1, 60))
      {
          $this->fecha_entregado = $value;
          return true;
      }
      else
      {
          return false;
      }
    }
    public function getFechaEntregado()
    {
        return $this->fecha_entregado;
    }

    public function getPagos(){
        $sql = "SELECT id_recibo, fecha_emi_recibo, patrocinadores.nombre_empresa, monto, fecha_entregado FROM pagos INNER JOIN patrocinadores USING(id_patrocinador) ";
        $params = array(null);
        return Database::getRows($sql, $params);
    }
    public function readPagos(){
        $sql = "SELECT id_recibo, fecha_emi_recibo, id_patrocinador, monto, fecha_entregado FROM pagos INNER JOIN patrocinadores USING (id_patrocinador) WHERE id_recibo = ?";
        $params = array($this->id_recibo);
        $pago = Database::getRow($sql, $params);
        if($pago){
            $this->id_recibo = $pago['id_recibo'];
            $this->fecha_recibo = $pago['fecha_emi_recibo'];
            echo $pago['fecha_emi_recibo'];
            $this->id_patrocinador = $pago['id_patrocinador'];
            $this->monto = $pago['monto'];
            $this->fecha_entregado = $pago['fecha_entregado'];
            return true;
        }else{
            return null;
    }
}

public function searchPagos($value){
    $sql = "SELECT id_recibo, fecha_emi_recibo, patrocinadores.id_patrocinador, monto, fecha_entregado FROM pagos INNER JOIN patrocinadores USING(id_patrocinador) WHERE patrocinadores.id_patrocinador LIKE ?% ORDER BY patrocinadores.id_patrocinador";
    $params =array("%$value%");
    return Database::getRows($sql, $params);
}

public function createPagos(){
    $sql = "INSERT INTO pagos(fecha_emi_recibo, id_patrocinador, monto, fecha_entregado) VALUES (?, ?, ?, ?)";
    $params = array($this->fecha_recibo, $this->id_patrocinador,$this->monto, $this->fecha_entregado);
    return Database::executeRow($sql, $params);    
    
}

public function updatePagos(){
    $sql = "UPDATE pagos SET fecha_emi_recibo= ?, id_patrocinador= ?,monto= ?,fecha_entregado= ? WHERE id_recibo = ?";
    $params = array($this->fecha_recibo, $this->id_patrocinador,$this->monto, $this->fecha_entregado, $this->id_recibo);
    return Database::executeRow($sql, $params);
}

public function deletePagos(){
    $sql = "DELETE FROM pagos WHERE id_recibo = ?";
    $params = array($this->id_recibo);
    return Database::executeRow($sql, $params);   
}  

public function getPatrocinadores(){
    $sql = "SELECT id_patrocinador, nombre_empresa FROM patrocinadores";
    $params = array(null);
    return Database::getRows($sql, $params);	
}
}