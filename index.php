<?php

/**
 * Index.php
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);


// Load composer
require_once 'vendor/autoload.php';

new App\Trade();