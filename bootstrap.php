<?php

require_once "vendor/autoload.php";

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

// Create a simple "default" Doctrine ORM configuration for Annotations
$isDevMode = true;
$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/src"), $isDevMode);
// or if you prefer yaml or XML
//$config = Setup::createXMLMetadataConfiguration(array(__DIR__."/config/xml"), $isDevMode);
// $config = Setup::createYAMLMetadataConfiguration(array(__DIR__."/config/yaml"), $isDevMode);

// database configuration parameters
$conn = array(
    'driver' => 'pdo_sqlsrv',
    'host' => '(local)',
    'user'     => 'sa',
    'password' => 'soeusei',
    'dbname'   => 'doctrine-test',
);


// obtaining the entity manager
$entityManager = EntityManager::create($conn, $config);

use Src\Product;

$id = 5;
$newName = "novo rato";

$product = $entityManager->find('Src\Product', $id);

if ($product === null) {
    echo "Product $id does not exist.\n";
    exit(1);
}

$product->name = $newName;

$entityManager->flush();
