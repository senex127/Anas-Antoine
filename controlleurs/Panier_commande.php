<?php
session_start();
require_once("../vues/dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM Produit WHERE prod_description='" . $_GET["code"] . "'");
			$itemArray = array($productByCode[0]["prod_description"]=>array('prod_nom'=>$productByCode[0]["prod_nom"], 'prod_description'=>$productByCode[0]["prod_description"], 'quantity'=>$_POST["quantity"], 'prod_prix'=>$productByCode[0]["prod_prix"], 'prod_image'=>$productByCode[0]["prod_image"]));
			
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["prod_description"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["prod_description"] == $k) {
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