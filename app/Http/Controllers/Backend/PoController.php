<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PoController extends Controller
{
    public function index()
    {
        return view('backend/po/index', [
            'default_pagename' => 'PO',
        ]);
    }

    public function create()
    {
        return view('backend/po/create', [
            'default_pagename' => 'สร้างใบ PO',
        ]);
    }

    public function detail()
    {
        return view('backend/po/detail', [
            'default_pagename' => 'รายละเอียด PO',
        ]);
    }
}
