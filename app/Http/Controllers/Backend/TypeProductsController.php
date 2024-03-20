<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LogsSaveController;

use App\Providers\RouteServiceProvider;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\Rules;


use App\Models\TypeProducts;

class TypeProductsController extends Controller
{

    public function type_products_add()
    {
        return view('backend/type_products/type_products-add', [
            'default_pagename' => 'เพิ่มประเภทสินค้า',
        ]);
    }
    public function type_products_edit(Request $request, $id)
    {
        $type_products = TypeProducts::find($id);
        return view('backend/type_products/type_products-edit', [
            'default_pagename' => 'แก้ไขประเภทสินค้า',
            'type_products' => $type_products,
        ]);
    }

    public function type_products(Request $request)
    {
        $type_products = TypeProducts::query()
        // ->where('phone',$request->s)
        ->orderBy('id', 'desc')
        ->paginate(16);

        $query = TypeProducts::query()
            ->orderBy('id', 'desc');

        if ($request->filled('keyword')) {
            $keyword = $request->input('keyword');
            $query->where(function ($query) use ($keyword) {
                $query->where('name', 'LIKE', '%' . $keyword . '%');
            });
        }

        $resultPerPage = 24;
        $query = $query->paginate($resultPerPage);

        return view('backend/type_products/type_products', [
            'default_pagename' => 'ประเภทสินค้า',
            'type_products' => $type_products,
            'query' => $query,
        ]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function type_products_add_action(Request $request)
    {

        // dd($request);

        $request->validate([
            'name' => ['required', 'string', 'max:255'],

        ]);



        $type_products = new TypeProducts;
        $type_products->name = $request->name;
        $type_products->active = 1;
        $type_products->save();



        return redirect(route('type_products'))->with('success', 'บันทึกข้อมูลสำเร็จ !!!');
    }

    public function type_products_edit_action(Request $request)
    {
        // dd($request);

        // $request->validate([

        // ]);

        $type_products = TypeProducts::find($request->type_products);
        $type_products->name = $request->name;
        $type_products->active = $request->active;
        $type_products->update();

        // event(new Registered($type_products));



        return redirect(route('type_products'))->with('success', 'บันทึกข้อมูลสำเร็จ !!!');
    }





}
