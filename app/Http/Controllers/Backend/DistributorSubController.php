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


use App\Models\DistributorSub;

class DistributorSubController extends Controller
{

    public function distributor_sub_add()
    {
        return view('backend/distributor_sub/distributor_sub-add', [
            'default_pagename' => 'เพิ่มผู้จัดจำหน่ายรายย่อย',
        ]);
    }
    public function distributor_sub_edit(Request $request, $id)
    {
        $distributor_sub = DistributorSub::find($id);
        return view('backend/distributor_sub/distributor_sub-edit', [
            'default_pagename' => 'แก้ไขผู้จัดจำหน่ายรายย่อย',
            'distributor_sub' => $distributor_sub,
        ]);
    }

    public function distributor_sub(Request $request)
    {
        $distributor_sub = DistributorSub::query()
        // ->where('phone',$request->s)
        ->orderBy('id', 'desc')
        ->paginate(16);

        $query = DistributorSub::query()
            ->orderBy('id', 'desc');

        if ($request->filled('keyword')) {
            $keyword = $request->input('keyword');
            $query->where(function ($query) use ($keyword) {
                $query->where('name', 'LIKE', '%' . $keyword . '%');
            });
        }

        $resultPerPage = 24;
        $query = $query->paginate($resultPerPage);

        return view('backend/distributor_sub/distributor_sub', [
            'default_pagename' => 'ผู้จัดจำหน่ายรายย่อย',
            'distributor_sub' => $distributor_sub,
            'query' => $query,
        ]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function distributor_sub_add_action(Request $request)
    {

        // dd($request);

        $request->validate([
            'name' => ['required', 'string', 'max:255'],

        ]);



        $distributor_sub = new DistributorSub;
        $distributor_sub->name = $request->name;
        $distributor_sub->users_id = $request->users_id;
        $distributor_sub->active = 1;
        $distributor_sub->save();



        return redirect(route('distributor_sub'))->with('success', 'บันทึกข้อมูลสำเร็จ !!!');
    }

    public function distributor_sub_edit_action(Request $request)
    {
        // dd($request);

        // $request->validate([

        // ]);

        $distributor_sub = DistributorSub::find($request->distributor_sub);
        $distributor_sub->name = $request->name;
        $distributor_sub->users_id = $request->users_id;
        $distributor_sub->active = $request->active;
        $distributor_sub->update();

        // event(new Registered($distributor_sub));



        return redirect(route('distributor_sub'))->with('success', 'บันทึกข้อมูลสำเร็จ !!!');
    }





}
