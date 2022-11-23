<?php

use App\Controllers\OfferController;

require __DIR__ . '../vendor/autoload.php';

$controller = new OfferController();
echo $controller->getOffer();
