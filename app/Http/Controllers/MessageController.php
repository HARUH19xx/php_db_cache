<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function getMessage() {
        return response(json_encode(['message' => 'こんにちは、みなさん！'], JSON_UNESCAPED_UNICODE))
               ->header('Content-Type', 'application/json');
    }    
}
