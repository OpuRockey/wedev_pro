<?php
define('BASE_PATH',dirname(__FILE__, 2));
define('BASE_URL', dirname(sprintf(
    "%s://%s%s",
    isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
    $_SERVER['SERVER_NAME'],
    $_SERVER['REQUEST_URI']
  )
));

//echo BASE_PATH ;

include BASE_PATH . "/core/Core.php" ;