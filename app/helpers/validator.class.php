<?php
class Validator{
	private $imageName = null;
	private $imageError = null;
	private $passwordError = null;

	public function getImageName(){
		return $this->imageName;
	}
	public function getImageError(){
		switch($this->imageError){
			case 1:
				$error = "El tipo de la imagen debe ser gif, jpg o png";
				break;
			case 2:
				$error = "La dimensión de la imagen es incorrecta";
				break;
			case 3:
				$error = "El tamaño de la imagen debe ser menor a 2MB";
				break;
			default:
				$error = "Ocurrió un problema con la imagen";
		}
		return $error;
	}

	public function validateForm($fields){
		foreach($fields as $index => $value){
			$value = strip_tags(trim($value));
			$fields[$index] = $value;
		}
		return $fields;
	}

	public function validateId($value){
		if(filter_var($value, FILTER_VALIDATE_INT, array('min_range' => 1))){
			return true;
		}else{
			return false;
		}
	}

	public function validateImage($file, $value, $max_width, $max_heigth){
		if($file['size'] <= 2097152){
		   list($width, $height, $type) = getimagesize($file['tmp_name']);
		   if($width <= $max_width && $height <= $max_heigth){
			   if($type == 1 || $type == 2 || $type == 3){
				   if($value){
					   $this->imageName = $value;
				   }else{
					   $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
					   $this->imageName = uniqid().".".$extension;
				   }
				   return true;
			   }else{
				   $this->imageError = 1;
				   return false;
			   }
		   }else{
			   $this->imageError = 2;
			   return false;
		   }
		}else{
		   $this->imageError = 3;
		   return false;
		}
   }

	public function validateEmail($email){
		if(filter_var($email, FILTER_VALIDATE_EMAIL)){
			return true;
		}else{
			return false;
		}
	}

	public function validateAlphabetic($value, $minimum, $maximum){
		if(preg_match("/^[a-zA-ZñÑáÁéÉíÍóÓúÚ\s]{".$minimum.",".$maximum."}$/", $value)){
			return true;
		}else{
			return false;
		}
	}

	public function validateAlphanumeric($value, $minimum, $maximum){
		if(preg_match("/^[a-zA-Z0-9ñÑáÁéÉíÍóÓúÚ\(\)\-\,\|\/\#\_\°\@\s\.]{".$minimum.",".$maximum."}$/", $value)){
			return true;
		}else{
			return false;
		}
	}

	public function validateMoney($value){
		if(preg_match("/^((?:\d{1,3}[,\.]?)+\d*)$/", $value)){
			return true;
		}else{
			return false;
		}
	}

	/*public function validatePassword($value){
		if(strlen($value) > 5){
			return true;
		}else{
			return false;
		}
	}*/

	public function validatePassword($value){
		$mayuscula = preg_match('/[A-ZÑÁÉÍÓÚ]+/', $value);
		$minuscula = preg_match('/[a-zñáéíóú]+/', $value);
		$numero = preg_match('/[0-9]+/', $value);
		$signos = preg_match('/[\.\,]+/', $value);
		$espacio = preg_match("/[\s]+/", $value);
		if($mayuscula)
		{
			if($minuscula)
			{
				if($numero)
				{
					if($signos)
					{
						if(!$espacio)
						{
							if(strlen($value) >= 8)
							{
								return true;
							}
							else
							{
								$this->passwordError = 6;
								return false;
							}
						}
						else
						{
							$this->passwordError = 5;
							return false;
						}
					}
					else
					{
						$this->passwordError = 4;
						return false;
					}
				}
				else
				{
					$this->passwordError = 3;
					return false;
				}
			}
			else
			{
				$this->passwordError = 2;
				return false;
			}
		}
		else
		{
			$this->passwordError = 1;
			return false;
		}
	}

	public function getErrorPassword(){
		switch($this->passwordError)
		{
			case 1:
				$error = 'La contraseña no tiene al menos una mayuscula';
				break;
			case 2:
				$error = 'La contraseña no tiene al menos una minuscula';
				break;
			case 3:
				$error = 'La contraseña no tiene al menos un número';
				break;
			case 4:
				$error = 'La contraseña debe de tener un signo("," ó ".")';
				break;
			case 5:
				$error = 'La contraseña no debe de tener espacios';
				break;
			case 6:
				$error = 'La contraseña debe de tener al menos 8 caracteres';
				break;
			default:
				$error = 'Ocurrio un problema al guardar la contraseña';
		}
		return $error;
	}
}
?>