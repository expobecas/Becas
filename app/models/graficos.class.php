<?php
class Graficos extends Validator{

      
   public function grafico1(){
		$sql = "SELECT usuarios.id_usuario, tipo_usuario.tipo_usuario, COUNT(tipo_usuario.tipo_usuario) AS 'Cantidad Ingresada' FROM (usuarios INNER JOIN tipo_usuario ON tipo_usuario.id_tipo = usuarios.id_tipo) GROUP BY tipo_usuario.tipo_usuario";
		$params = array(null);
		return Database::getRows($sql, $params);
	}

    public function grafico2(){
		$sql = "SELECT solicitud.id_solicitud, genero.genero, COUNT(genero.id_genero) As 'Cantidad Ingresada' FROM (solicitud INNER JOIN genero ON genero.id_genero = solicitud.id_genero) GROUP BY solicitud.id_genero 
		";
		$params = array(null);
		return Database::getRows($sql, $params);
	}

	public function grafico3(){
		$sql = "SELECT patrocinadores.id_patrocinador, tipo_patrocinador.tipo_patrocinador, COUNT(tipo_patrocinador.id_tipo_patro) as 'Cantidad Ingresada' FROM (patrocinadores INNER JOIN tipo_patrocinador ON tipo_patrocinador.id_tipo_patro = patrocinadores.id_tipo_patro) GROUP BY patrocinadores.id_tipo_patro";
		$params = array(null);
		return Database::getRows($sql, $params);
      }
      public function grafico4(){
		$sql = "SELECT detalle_solicitud.id_detalle, estado_solicitud.estado_solicitud, COUNT(estado_solicitud.id_estado) as 'Cantidad Ingresada' FROM (detalle_solicitud INNER JOIN estado_solicitud ON estado_solicitud.id_estado = detalle_solicitud.id_estado) GROUP BY detalle_solicitud.id_estado";
		$params = array(null);
		return Database::getRows($sql, $params);
      }

      public function grafico5(){
		$sql = "SELECT id_estudiante, grado, COUNT(grado) as 'Cantidad Ingresada' FROM estudiantes GROUP BY grado ";
		$params = array(null);
		return Database::getRows($sql, $params);
	}
	public function grafico6(){
		$sql = "SELECT id_estudiante, especialidad, COUNT(especialidad) as 'Cantidad Ingresada' FROM estudiantes GROUP BY especialidad";
		$params = array(null);
		return Database::getRows($sql, $params);
	}
	public function grafico7(){
		$sql = "SELECT id_becas, patrocinadores.nombre_empresa, COUNT(patrocinadores.nombre_empresa) as 'Cantidad Ingresada' FROM becas, patrocinadores GROUP BY patrocinadores.nombre_empresa";
		$params = array(null);
		return Database::getRows($sql, $params);
	}
	public function grafico8(){
		$sql = "SELECT id_becas, patrocinadores.nombre_empresa, COUNT(id_becas) as 'Cantidad Ingresada' FROM becas, patrocinadores GROUP BY patrocinadores.nombre_empresa";
		$params = array(null);
		return Database::getRows($sql, $params);
	}

	public function grafico9(){
		$sql = "SELECT id_recibo, patrocinadores.nombre_empresa, COUNT(patrocinadores.nombre_empresa) as 'Cantidad Ingresada' FROM pagos, patrocinadores GROUP BY patrocinadores.nombre_empresa";
		$params = array(null);
		return Database::getRows($sql, $params);
	}

	public function grafico10(){
		$sql = "SELECT id_becas, fecha_ini_beca, COUNT(fecha_ini_beca) as 'Cantidad Ingresada' FROM becas GROUP BY fecha_ini_beca";
		$params = array(null);
		return Database::getRows($sql, $params);
	}



}
?>