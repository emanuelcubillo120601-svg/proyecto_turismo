<?php

declare(strict_types=1);

session_start();


require_once __DIR__ .
    "/../app/helpers/CsrfHelper.php";


require_once __DIR__ .
    "/../app/helpers/ImagenHelper.php";


CsrfHelper::token();


require_once __DIR__ .
    "/../routes/web.php";