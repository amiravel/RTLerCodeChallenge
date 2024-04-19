<?php

namespace App\Utilities;

use App\Utilities\Contracts\ResponseInterface;

class Response implements ResponseInterface
{

    public function item($data)
    {
        return response($data, 200);
    }
}
