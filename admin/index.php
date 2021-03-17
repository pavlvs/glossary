<?php
session_start();
require '../app/app.php';

ensureUserIsAuthenticated();

view('admin/index', getTerms());
