<?php

namespace App\Http\Controllers;

use App\Models\CommonType;
use App\Models\Propel\CommonTypeForPropelQuery;
use Doctrine\ORM\EntityManager;

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
    
    public function eloquent()
    {
        app()->withEloquent();
        //Eloquent
        $t = CommonType::query()->where("type_id", 1)->first();
        return "Hello {$t->type_name}, from eloquent";
    }

    public function propel()
    {
        /** @var \Propel\Runtime\Connection\ConnectionInterface $propel */
        $propel = app('propel');
        $t = CommonTypeForPropelQuery::create()
            ->findOneByTypeId(1);
        return "Hello {$t->getTypeName()}, from propel";
    }

    public function doctrine()
    {
        //Doctrine
        /** @var EntityManager $em */
        $em = app('em');
        $repo = $em->getRepository('Main:CommonTypeForDoctrine');
        $t = $repo->find(1);
        return "Hello {$t->getTypeName()}, from doctrine";
    }

}
