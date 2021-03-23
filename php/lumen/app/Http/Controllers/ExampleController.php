<?php

namespace App\Http\Controllers;

use App\Models\CommonType;

class ExampleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
        
    }
    
    public function orm()
    {
        $a = CommonType::query()->where("type_id", 1)->first();
        return "Hello {$a->type_name}";
    }

    //
}
