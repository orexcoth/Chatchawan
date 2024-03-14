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


use App\Models\BoxType;

class BoxTypeController extends Controller
{

    public function box_type_add()
    {
        return view('backend/box_type/box_type-add', [
            'default_pagename' => 'เพิ่มประเภทกล่อง',
        ]);
    }
    public function box_type_edit(Request $request, $id)
    {
        $box_type = BoxType::find($id);
        return view('backend/box_type/box_type-edit', [
            'default_pagename' => 'แก้ไขประเภทกล่อง',
            'box_type' => $box_type,
        ]);
    }

    public function box_type(Request $request)
    {
        $box_type = BoxType::query()
        // ->where('phone',$request->s)
        ->orderBy('id', 'desc')
        ->paginate(16);

        $query = BoxType::query()
            ->orderBy('id', 'desc');

        if ($request->filled('keyword')) {
            $keyword = $request->input('keyword');
            $query->where(function ($query) use ($keyword) {
                $query->where('name', 'LIKE', '%' . $keyword . '%');
            });
        }

        $resultPerPage = 24;
        $query = $query->paginate($resultPerPage);

        return view('backend/box_type/box_type', [
            'default_pagename' => 'ประเภทกล่อง',
            'box_type' => $box_type,
            'query' => $query,
        ]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function box_type_add_action(Request $request)
    {

        // dd($request);

        $request->validate([
            'name' => ['required', 'string', 'max:255'],

        ]);



        $box_type = new BoxType;
        $box_type->name = $request->name;
        $box_type->active = 1;
        $box_type->save();



        return redirect(route('box_type'))->with('success', 'บันทึกข้อมูลสำเร็จ !!!');
    }

    public function box_type_edit_action(Request $request)
    {
        // dd($request);

        // $request->validate([

        // ]);

        $box_type = BoxType::find($request->box_type);
        $box_type->name = $request->name;
        $box_type->active = $request->active;
        $box_type->update();

        // event(new Registered($box_type));



        return redirect(route('box_type'))->with('success', 'บันทึกข้อมูลสำเร็จ !!!');
    }





}
