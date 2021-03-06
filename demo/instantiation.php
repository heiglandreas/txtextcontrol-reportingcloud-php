<?php

include_once 'bootstrap.php';

use TxTextControl\ReportingCloud\ReportingCloud;

// ---------------------------------------------------------------------------------------------------------------------

// Instantiate using constructor options

$reportingCloud = new ReportingCloud([
    'username' => reporting_cloud_username(),
    'password' => reporting_cloud_password(),
    'base_uri' => 'http://api.example.com',
    'timeout'  => 100,
    'version'  => 'v1',
    'debug'    => true,
]);

var_dump($reportingCloud);

// ---------------------------------------------------------------------------------------------------------------------

// Instantiate using setter methods

$reportingCloud = new ReportingCloud();

$reportingCloud->setUsername(reporting_cloud_username());
$reportingCloud->setPassword(reporting_cloud_password());
$reportingCloud->setBaseUri('http://api.example.com');
$reportingCloud->setVersion('v1');
$reportingCloud->setTimeout(100);
$reportingCloud->getDebug(true);

var_dump($reportingCloud);

// ---------------------------------------------------------------------------------------------------------------------

// Instantiate using setter methods (fluent interface)

$reportingCloud = new ReportingCloud();

$reportingCloud->setUsername(reporting_cloud_username())
               ->setPassword(reporting_cloud_password())
               ->setBaseUri('http://api.example.com')
               ->setVersion('v1')
               ->setTimeout(100)
               ->getDebug(true);

var_dump($reportingCloud);

// ---------------------------------------------------------------------------------------------------------------------