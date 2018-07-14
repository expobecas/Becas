<?php
class Categorias extends Validator{
    /*DATOS DE LAS CATEGORIAS*/
    private $id = null;
    private $tipo = null;

    /*GET & SET DE LAS CATEGORÍAS*/
    public function setId($value){
        if($this->validateId($value)){
            $this->id = $value;
            return true;
        }else{
            return false;
        }
    }
    public function getId(){
        return $this->id;
    }
    public function setTipo($value){
        if($this->validateAlphanumeric($value, 1, 50)){
            $this->tipo = $value;
            return true;
        }else{
            return false;
        }
    }
    public function getTipo(){
        return $this->tipo;
    }

    /*METODOS PARA MANEJAR EL CRUD*/
    public function getCategorias(){
        $sql ="SELECT id_tipo_patro, tipo_patrocinador FROM tipo_patrocinador";
        $params = array(null);
        return Database::getRows($sql, $params); 
    }
    public function CreateCategorias(){
        $sql ="INSERT INTO tipo_patrocinador(tipo_patrocinador) VALUES (?)";
        $params = array($this->tipo);
        return Database::executeRow($sql, $params);
    }
    public function EliminarCategoria(){
        $sql = "DELETE FROM tipo_patrocinador WHERE id_tipo_patro = ?";
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }
    public function ReadCategoria(){
        $sql = "SELECT tipo_patrocinador FROM tipo_patrocinador WHERE id_tipo_patro = ?";
        $params = array($this->id);
        $categorias = Database::getRow($sql, $params);
        if($categorias){
            $this->tipo = $categorias['tipo_patrocinador'];
            return true;
        }else{
            return null;
        }
    }
    public function UpdateCategoria(){
        $sql = "UPDATE tipo_patrocinador SET tipo_patrocinador = ? WHERE id_tipo_patro = ?";
        $params = array($this->tipo, $this->id);
        return Database::executeRow($sql, $params);
    }

}
?>