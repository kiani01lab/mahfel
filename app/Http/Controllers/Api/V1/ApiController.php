<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function includedFormQueryParams(string $relations): bool
    {
        $params = request()->get('include');

        if (!isset($params)) {
            return false;
        }

        $includes = explode(',', strtolower($params));

        return in_array(strtolower($relations), $includes);
    }
}
