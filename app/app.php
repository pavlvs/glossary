<?php

define('APP_PATH', dirname(__FILE__) . '/../');

require 'config.php';
require 'functions.php';
require 'data/Data.php';
require 'data/FileDataProvider.php';
require 'data/MysqlDataProvider.php';

Data::initialize(new MysqlDataProvider(CONFIG['db']));
