<?php

require_once("DAO_Interface.php");

class DAO_Eventos implements DAO_Interface {

    private static $instance = null;

    //Evitamos asi la contruccion de la clase
    private function __construct() {  }

    //Para acceder a la instacia de la clase
     public static function getInstance() {
        if (self::$instance == null) {
          self::$instance = new DAO_Eventos();
        }
        return self::$instance;
      }

	//METODOS
  public function createElement($transfer) {//crea usuario
      return false;
	}
//--------------------------
	public function getElementById($id){
		$app = Aplicacion::getSingleton();
		$db = $app->conexionBd();
		$consulta = "SELECT * FROM evento WHERE nombre ='$id'";//consulta sql
		$results = mysqli_query($db, $consulta);

		if (mysqli_num_rows($results) == 1) {  //si se encuentra la fila, el usuario y contraseña son correctas
			$eventos = mysqli_fetch_assoc($results);
			//cambio
			if($eventos["Img_Evento"] == NULL)	{
					return new  eventoTransfer($eventos["Nombre"],$eventos["Localizacion"],
          $eventos["Precio"],$eventos["Cantidad"],$eventos["Fecha"],$eventos["Img_Evento"]);
			}
			else{
			    return new eventoTransfer($eventos["Nombre"],$eventos["Localizacion"],
          $eventos["Precio"],$eventos["Cantidad"],$eventos["Fecha"],$eventos["Img_Evento"]);
			}
		}
		else {
			return ;//NULL
		}
	}
//--------------------------
	public function deleteElement($id) {
    return false;
	}
//--------------------------
	public function updateElement($id, $campo, $nuevoValor) {
		return false;
	}

    //--------------------------
	public function getAllElements(){
		$app = Aplicacion::getSingleton();
		$db = $app->conexionBd();
		$lista= array();

		$consul = "SELECT * FROM evento ORDER BY nombre";
		$query = mysqli_query($db, $consul);

		if ($query){
			while($fila = mysqli_fetch_assoc($query)){
                $transfer = new eventoTransfer($fila["Nombre"],$fila["Localizacion"],
                $fila["Precio"],$fila["Cantidad"],$fila["Fecha"],$fila["Img_Evento"]);
				array_push($lista, $transfer);
			}
		}
    return empty($lista) ? null : $lista;
	}

	public function getElementByEmail($gmail) {
	 return false;
	}
  public function getAllElementsById($id) {
    $app = Aplicacion::getSingleton();
    $db = $app->conexionBd();
    $lista= array();

    $consul = "SELECT * FROM evento ORDER BY $id";
    $query = mysqli_query($db, $consul);

    if ($query){
      while($fila = mysqli_fetch_assoc($query)){
                $transfer = new eventoTransfer($fila["Nombre"],$fila["Localizacion"],
                $fila["Precio"],$fila["Cantidad"],$fila["Fecha"],$fila["Img_Evento"]);
        array_push($lista, $transfer);
      }
    }
    return empty($lista) ? null : $lista;
  }
	public function crearUnion($id_user, $nombre_evento){
		$app = Aplicacion::getSingleton();
		$db = $app->conexionBd();
		$consul = "INSERT INTO user_apunta_evento (ID_Usuario, Event_Name) VALUES('$id_user', '$nombre_evento')";
		$rs = $db->query($consul);
		if(!$rs) echo "<br>".$db->error."<br>";
		return $rs;
	}
	public function eliminarUnion($id,$event){
		$app = Aplicacion::getSingleton();
		$db = $app->conexionBd();
		$consulta="DELETE FROM user_apunta_evento WHERE ID_Usuario ='$id' AND Event_Name ='$event'";
		$res = mysqli_query($db, $consulta)? true : false;
    	return $res;
	}
	public function existeUnion($id_user, $nombre_evento){
		$app = Aplicacion::getSingleton();
		$db = $app->conexionBd();
		$consul = "SELECT * FROM user_apunta_evento WHERE ID_Usuario ='$id_user' AND Event_Name ='$nombre_evento'";
		$query = mysqli_query($db, $consul);
		if(mysqli_num_rows($query)==0)
			return false;
		else
			return true;
	}
	public function numberUsersEvent($nombre){
		$app = Aplicacion::getSingleton();
		$db = $app->conexionBd();
		$consul = "SELECT * FROM user_apunta_evento WHERE Event_Name ='$nombre'";
		$query = mysqli_query($db, $consul);
		return mysqli_num_rows($query);
	}
}
?>
