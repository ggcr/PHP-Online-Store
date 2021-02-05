<?php

require_once __DIR__.'/../model/connectaDb.php';
require_once __DIR__.'/../model/categories.php';

$conn = connectaBD();
$categories = getCategories($conn);
validarDades($categories);

include __DIR__.'/../view/view_categories.php';