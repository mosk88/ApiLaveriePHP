
<?php
//Utilisation de l'autoload pour require tous les fichiers dans src/

use Src\Entity\Service;
use Src\Manager\DataBaseManager;
use Src\Manager\ServiceManager;

require_once('vendor/autoload.php');

// TODO Renvoyer toutes les données d'une table au format JSON

//Instanciation de mon ServiceManager
$serviceManager = new ServiceManager();

$services = $serviceManager->findAll(3);
//dump($services);
// Convertir mes données en Objets



//Renseigne le format du Body pour la reponse
//header("Content-type: application/json");
//Lorsque j'utilise json_encode sur un Objet, il ne renverra que les proprietes PUBLIC, si ma Class implemente JSONSerializable
// La fonction jsonSerialize de ma classe sera appellée
//echo(json_encode($service));

$newService = new Service(1,$_POST['service_name'], $_POST['service_price']);
$serviceManager->add($newService);
echo(json_encode($serviceManager));




