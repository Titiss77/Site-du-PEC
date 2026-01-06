<?php

namespace App\Controllers;

use App\Models\BureauModel;

class Bureau extends BaseController
{
    public function index()
    {
        $model = new BureauModel();
        
        $data = [
            'titrePage' => 'Le Bureau du PEC',
            'membres'   => $model->getTrombinoscope(),
        ];

        return view('v_bureau', $data);
    }
}