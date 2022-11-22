<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    //membuat method response
    protected function hasilRespons($code,$status,$data){
        return response()->json([
                'Code'=>$code,
                'Status'=>$status,
                'Data'=>$data
            ]);
    }
}


