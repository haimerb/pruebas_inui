<?php 

/**
 * @autor Haymer Barbeti
 */
class Paciente {

	private $table = 'inui.paciente';
	private $conection;

	public function __construct() {
		
	}

	
	/** 
	 * Estaablece la configuracion
	 * 
	 */
	public function getConection(){
		$dbObj = new Db();
		$this->conection = $dbObj->conection;
	}

	/**
	 * recupera todos los pacientes
	 */
	public function getPacientes(){
		$this->getConection();
		$sql = "SELECT * FROM ".$this->table;
		$stmt = $this->conection->prepare($sql);
		$stmt->execute();

		return $stmt->fetchAll();
	}

	/* 
	 * recupera pacientes por id
	 */
	public function getPacienteById($id){
		if(is_null($id)) return false;
		$this->getConection();
		$sql = "SELECT * FROM ".$this->table. " WHERE id = ?";
		$stmt = $this->conection->prepare($sql);
		$stmt->execute([$id]);

		return $stmt->fetch();
	}

	/** 
	 * Crea el paciente 
	 */
	public function save($param){
		$this->getConection();
		/**
		 * Seteamos valores por defecto
		 */
		$title = $content = "";
		/**
		 * Se verifica si exite
		 */
		$exists = false;
		if(isset($param["id"]) and $param["id"] !=''){
			$actualPaciente = $this->getPacienteById($param["id"]);
			if(isset($actualPaciente["id"])){
				$exists = true;	
				/**
				 * Valores actuales
				 */
				$id = $param["id"];
				$tipo_id = $param["tipo_id"];
				$nombre = $param["nombre"];
				$apellido = $param["apellido"];
				$telefono = $param["telefono"];
				$email = $param["email"];
				$genero = $param["genero"];

				
			}
		}
		/**
		 * Recepción de valores
		 */
		if(isset($param["id"])) $id = $param["id"];
		if(isset($param["tipo_id"])) $tipo_id = $param["tipo_id"];
		if(isset($param["nombre"])) $nombre = $param["nombre"];
		if(isset($param["apellido"])) $apellido = $param["apellido"];
		if(isset($param["telefono"])) $telefono = $param["telefono"];
		if(isset($param["email"])) $email = $param["email"];
		if(isset($param["genero"])) $genero = $param["genero"];
		/**
		 * Operaciones de bases de datos
		 */
		if($exists){
			$sql = "UPDATE ".$this->table. " SET id=?,tipo_id=?, nombre=?, apellido=?, telefono=?, email=?, genero=?  WHERE id=?";
			$stmt = $this->conection->prepare($sql);
			$res = $stmt->execute([$id,$tipo_id,$nombre,$apellido,$telefono,$email,$genero, $id]);
		}else{
			$sql = "INSERT INTO ".$this->table. " (id,tipo_id, nombre, apellido, telefono, email, genero) values(?,?,?,?,?,?,?)";
			$stmt = $this->conection->prepare($sql);
			$stmt->execute([$id,$tipo_id,$nombre,$apellido,$telefono,$email,$genero]);
			$id = $this->conection->lastInsertId();
		}	

		return $id;	

	}
	/**
	 * Eliminar por id
	 */
	public function deletePacienteById($id){
		$this->getConection();
		$sql = "DELETE FROM ".$this->table. " WHERE id = ?";
		$stmt = $this->conection->prepare($sql);
		return $stmt->execute([$id]);
	}

}

?>