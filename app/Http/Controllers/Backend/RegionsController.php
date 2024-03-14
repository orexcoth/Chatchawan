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


use App\Models\Regions;

class RegionsController extends Controller
{

    public function regions_add()
    {
        return view('backend/regions/regions-add', [
            'default_pagename' => 'เพิ่มทวีป',
        ]);
    }
    public function regions_edit(Request $request, $id)
    {
        $regions = Regions::find($id);
        return view('backend/regions/regions-edit', [
            'default_pagename' => 'แก้ไขทวีป',
            'regions' => $regions,
        ]);
    }

    public function regions(Request $request)
    {
        $regions = Regions::query()
        // ->where('phone',$request->s)
        ->orderBy('id', 'desc')
        ->paginate(16);

        $query = Regions::query()
            ->orderBy('id', 'desc');

        if ($request->filled('keyword')) {
            $keyword = $request->input('keyword');
            $query->where(function ($query) use ($keyword) {
                $query->where('name', 'LIKE', '%' . $keyword . '%');
            });
        }

        $resultPerPage = 24;
        $query = $query->paginate($resultPerPage);

        return view('backend/regions/regions', [
            'default_pagename' => 'ทวีป',
            'regions' => $regions,
            'query' => $query,
        ]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function regions_add_action(Request $request)
    {

        // dd($request);

        $request->validate([
            'name' => ['required', 'string', 'max:255'],

        ]);



        $regions = new Regions;
        $regions->name = $request->name;
        $regions->active = 1;
        $regions->save();



        return redirect(route('regions'))->with('success', 'บันทึกข้อมูลสำเร็จ !!!');
    }

    public function regions_edit_action(Request $request)
    {
        // dd($request);

        // $request->validate([

        // ]);

        $regions = Regions::find($request->regions);
        $regions->name = $request->name;
        $regions->active = $request->active;
        $regions->update();

        // event(new Registered($regions));



        return redirect(route('regions'))->with('success', 'บันทึกข้อมูลสำเร็จ !!!');
    }





}
