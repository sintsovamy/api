<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index()
    {
        return 'страница заказов';
    }

    public function store()
    {
        return 'размещение заказа';
    }


}
