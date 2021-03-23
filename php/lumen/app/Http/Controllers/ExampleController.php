<?php

namespace App\Http\Controllers;

use App\Models\CommonType;
use App\Models\Doctrine\CommonTypeForDoctrine;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\QueryBuilder;

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
        
        //Eloquent
        //$t = CommonType::query()->where("type_id", 1)->first();
        //return "Hello {$t->type_name}";


        //Doctrine
        /** @var EntityManager $em */
        $em = app('em');
        $repo = $em->getRepository('Main:CommonTypeForDoctrine');
        $t = $repo->find(1);
        return "Hello {$t->getTypeName()}";
    }

    //
}
