<?php

define('APP_PATH', dirname(__FILE__) . '/../');

require 'config.php';
require 'functions.php';
require 'data/Data.php';
require 'data/FileDataProvider.php';

Data::initialize(new FileDataProvider(CONFIG['dataFile']));
