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


use App\Models\Unit;

class UnitController extends Controller
{

    public function unit_add()
    {
        return view('backend/unit/unit-add', [
            'default_pagename' => 'เพิ่มหน่วยนับ',
        ]);
    }
    public function unit_edit(Request $request, $id)
    {
        $unit = Unit::find($id);
        return view('backend/unit/unit-edit', [
            'default_pagename' => 'แก้ไขหน่วยนับ',
            'unit' => $unit,
        ]);
    }

    public function unit(Request $request)
    {
        $unit = Unit::query()
        // ->where('phone',$request->s)
        ->orderBy('id', 'desc')
        ->paginate(16);

        $query = Unit::query()
            ->orderBy('id', 'desc');

        if ($request->filled('keyword')) {
            $keyword = $request->input('keyword');
            $query->where(function ($query) use ($keyword) {
                $query->where('name', 'LIKE', '%' . $keyword . '%');
            });
        }

        $resultPerPage = 24;
        $query = $query->paginate($resultPerPage);

        return view('backend/unit/unit', [
            'default_pagename' => 'หน่วยนับ',
            'unit' => $unit,
            'query' => $query,
        ]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function unit_add_action(Request $request)
    {

        // dd($request);

        $request->validate([
            'name' => ['required', 'string', 'max:255'],

        ]);



        $unit = new Unit;
        $unit->name = $request->name;
        $unit->active = 1;
        $unit->save();



        return redirect(route('unit'))->with('success', 'บันทึกข้อมูลสำเร็จ !!!');
    }

    public function unit_edit_action(Request $request)
    {
        // dd($request);

        // $request->validate([

        // ]);

        $unit = Unit::find($request->unit);
        $unit->name = $request->name;
        $unit->active = $request->active;
        $unit->update();

        // event(new Registered($unit));



        return redirect(route('unit'))->with('success', 'บันทึกข้อมูลสำเร็จ !!!');
    }





}
