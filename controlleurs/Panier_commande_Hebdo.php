<?php
session_start();
require_once("../vues/dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM Panier WHERE NB_personne='" . $_GET["code"] . "'");
			$itemArray = array($productByCode[0]["NB_personne"]=>array('panier_libelle'=>$productByCode[0]["panier_libelle"], 'NB_personne'=>$productByCode[0]["NB_personne"], 'quantity'=>$_POST["quantity"], 'panier_prix'=>$productByCode[0]["panier_prix"], 'image_panier'=>$productByCode[0]["image_panier"]));
			
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["NB_personne"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["NB_personne"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["code"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
}
}
?>