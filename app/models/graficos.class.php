<?php
class Graficos extends Validator{

      
   public function grafico1(){
		$sql = "SELECT usuarios.id_usuario, tipo_usuario.id_tipo, COUNT(usuarios.id_tipo) AS 'Cantidad Ingresada' FROM (usuarios INNER JOIN tipo_usuario ON tipo_usuario.id_tipo = usuarios.id_tipo) GROUP BY usuarios.id_tipo ";
		$params = array(null);
		return Database::getRows($sql, $params);
	}

    public function grafico2(){
		$sql = "SELECT clientes.id_cliente, generos.genero, COUNT(clientes.id_genero) AS 'Cantidad Ingresada' FROM (clientes INNER JOIN generos ON generos.id_genero = clientes.id_genero) GROUP BY clientes.id_genero 
		";
		$params = array(null);
		return Database::getRows($sql, $params);
	}

	public function grafico3(){
		$sql = "SELECT id_producto, t.talla, COUNT(p.id_talla) AS 'Cantidad Ingresada' FROM (producto p INNER JOIN tallas t ON t.id_talla = p.id_talla) GROUP BY p.id_talla";
		$params = array(null);
		return Database::getRows($sql, $params);
      }
      public function grafico4(){
		$sql = "SELECT id_factura, p.nombre, d.cantidad, COUNT(p.id_producto) AS 'Cantidad Ingresada' FROM (detalle_factura d INNER JOIN producto p ON p.id_producto = d.id_producto) GROUP BY d.id_producto ";
		$params = array(null);
		return Database::getRows($sql, $params);
      }

      public function grafico5(){
		$sql = "SELECT id_factura, p.nombre, d.cantidad, MAX(p.precio) AS 'Cantidad Ingresada' FROM (detalle_factura d INNER JOIN producto p ON p.id_producto = d.id_producto) GROUP BY d.id_producto ";
		$params = array(null);
		return Database::getRows($sql, $params);
	}



}
?>