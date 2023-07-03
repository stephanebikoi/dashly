<?php 

namespace App\Core;

use Exception;
use Throwable;

class NotFoundException extends Exception {
    
    public function __construct($message = "", $code = 0, ?Throwable $previous = null) {

        parent::__construct($message, $code, $previous);
    }

    public function error404 () {

        http_response_code(404);
        require ROOT.'/views/' . 'errors/404.php';
    }
}
