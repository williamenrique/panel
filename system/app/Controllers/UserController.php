<?php
class User extends Controllers{
	public function __construct(){
		session_start();
		if (empty($_SESSION['login'])) {
			header("Location:".base_url().'login');
		}
		//invocar para que se ejecute el metodo de la herencia
		parent::__construct();
	}
	public function perfil(){
		//invocar la vista con views y usamos getView y pasamos parametros esta clase y la vista
		//incluimos un arreglo que contendra toda la informacion que se enviara al home
		$data['page_tag'] = "Dashboard - Personal";
		$data['page_title'] = "Pagina Principal";
		$data['page_menu_open'] = "empty";
		$data['page_link'] = "empty";
		$data['page_function'] = "function.user.js";
		$this->views->getViews($this, "perfil", $data);
	}
	public function imgUp(){
		$archivos_permitidos = array('pdf', 'jpg', 'png', 'svg');
		// capturo las partes del nombre del archivo
		$fileData = pathinfo($_FILES['file']['name']);
		if(!$_FILES['file']['name'] == null){
			$max_size = 2000000;
			$fileExtension = strtolower($fileData['extension']);
			if(!in_array($fileExtension, $archivos_permitidos)){
				$arrResponse = ["status" => false, "msg" => "No se acepta ese tipo de formato"];
			}elseif ($_FILES['file']['size'] > $max_size) {
				$arrResponse = ["status" => false, "msg" => "Imagen demasiado grande"];
			}else{
				$arrResponse = ["status" => true, "msg" => "Hasta aqui bien"];
				$fileBase =  $_SESSION['ruta'];
	 			$fileHash = substr(md5($fileBase . uniqid(microtime() . mt_rand())), 0, 8);
				 if (!file_exists($fileBase))
					mkdir($fileBase, 0777, true);
					$namFile = 'Profile-'. $fileHash . "." . $fileExtension;
					$filePath = $fileBase . $namFile;
					// TODO: preguntar si la imagen actual existe para eliminarla antes de subir una nueva
				if(move_uploaded_file($_FILES['file']['tmp_name'], $filePath)){
					$requestUpdate = $this->model->imgProfile($_SESSION['idUser'],$namFile);
					if($requestUpdate){
						$arrResponse = ["status" => true, "msg" => "Archivo guardado con exito"];
						sessionUser($_SESSION['idUser']);
					}
				}else{
					$arrResponse = ["status" => false, "msg" => "Ah ocurrido un error al guardar"];
				}
			}
		}else{
			$arrResponse = ["status" => false, "msg" => "Ah ocurrido un error"];
		}
		echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		die();
	}
}