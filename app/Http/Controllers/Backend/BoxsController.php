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


use App\Models\Boxs;

class BoxsController extends Controller
{

    public function box_add()
    {
        return view('backend/box/box-add', [
            'default_pagename' => 'เพิ่มกล่อง',
        ]);
    }
    public function box_edit(Request $request, $id)
    {
        $box = Boxs::find($id);
        return view('backend/box/box-edit', [
            'default_pagename' => 'แก้ไขกล่อง',
            'box' => $box,
        ]);
    }

    public function box(Request $request)
    {
        $box = Boxs::query()
        ->orderBy('id', 'desc')
        ->paginate(10);

        $query = Boxs::query()
            ->orderBy('id', 'desc');

        if ($request->filled('keyword')) {
            $keyword = $request->input('keyword');
            $query->where(function ($query) use ($keyword) {
                $query->where('name', 'LIKE', '%' . $keyword . '%');
            });
        }

        $resultPerPage = 10;
        $query = $query->paginate($resultPerPage);

        return view('backend/box/box', [
            'default_pagename' => 'กล่อง',
            'box' => $box,
            'query' => $query,
        ]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function box_add_action(Request $request)
    {

        // dd($request);

        $request->validate([
            'name' => ['required', 'string', 'max:255'],

        ]);



        $box = new Boxs;
        $box->name = $request->name;
        $box->box_type_id = $request->box_type_id;
        $box->width = $request->width;
        $box->length = $request->length;
        $box->height = $request->height;
        $box->dimension = ($request->width * $request->length * $request->height);
        $box->weight = $request->weight;
        $box->active = 1;
        $box->save();



        return redirect(route('box'))->with('success', 'บันทึกข้อมูลสำเร็จ !!!');
    }

    public function box_edit_action(Request $request)
    {
        // dd($request);

        // $request->validate([

        // ]);

        $box = Boxs::find($request->box);
        $box->name = $request->name;
        $box->box_type_id = $request->box_type_id;
        $box->width = $request->width;
        $box->length = $request->length;
        $box->height = $request->height;
        $box->dimension = ($request->width * $request->length * $request->height);
        $box->weight = $request->weight;
        $box->active = $request->active;
        $box->update();

        // event(new Registered($box));



        return redirect(route('box'))->with('success', 'บันทึกข้อมูลสำเร็จ !!!');
    }





}
