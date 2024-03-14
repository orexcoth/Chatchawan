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


use App\Models\Products;

class ProductsController extends Controller
{

    public function products_add()
    {
        return view('backend/products/products-add', [
            'default_pagename' => 'เพิ่มสินค้า',
        ]);
    }
    public function products_edit(Request $request, $id)
    {
        $products = Products::find($id);
        return view('backend/products/products-edit', [
            'default_pagename' => 'แก้ไขสินค้า',
            'products' => $products,
        ]);
    }

    public function products(Request $request)
    {
        $products = Products::query()
        // ->where('phone',$request->s)
        ->orderBy('id', 'desc')
        ->paginate(16);

        $query = Products::query()
            ->orderBy('id', 'desc');

        if ($request->filled('keyword')) {
            $keyword = $request->input('keyword');
            $query->where(function ($query) use ($keyword) {
                $query->where('name_th', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('name_en', 'LIKE', '%' . $keyword . '%');
            });
        }

        $resultPerPage = 24;
        $query = $query->paginate($resultPerPage);

        return view('backend/products/products', [
            'default_pagename' => 'สินค้า',
            'products' => $products,
            'query' => $query,
        ]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function products_add_action(Request $request)
    {

        // dd($request);

        $request->validate([
            // 'name' => ['required', 'string', 'max:255'],
            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:'.productssModel::class],
            // 'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // $products = productssModel::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        // ]);

        $products = new Products;

        // if($request->hasFile('photo')){

        //     $oldPath = public_path($products->photo);
        //     if(File::exists($oldPath)){
        //         File::delete($oldPath);
        //     }

        //     $file = $request->file('photo');
        //     $destinationPath = public_path('/uploads/photo');
        //     $filename = $file->getClientOriginalName();

        //     $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        //     $newfilenam = time() . '.' .$ext;
        //     $file->move($destinationPath, $newfilenam);
        //     $filepath = 'uploads/photo/'.$newfilenam;

        //     $products->photo = $filepath;
        // }

        $products->name_th = $request->name_th;
        $products->name_en = $request->name_en;
        $products->detail = $request->detail;
        $products->width = $request->width;
        $products->lengt = $request->lengt;
        $products->high = $request->high;
        $products->dimension = ($request->width*$request->lengt*$request->high);

        $products->weight = $request->weight;
        $products->unit_id = $request->unit_id;
        $products->type_id = $request->type_id;
        $products->pack_type_id = $request->pack_type_id;
        $products->box_type_id = $request->box_type_id;
        $products->active = 1;

        $products->save();

        // event(new Registered($products));

        // if(1==1){
        //     $productssavelog = auth()->products();
        //     $idsavelog = auth()->products()->id;
        //     $emailsavelog = auth()->products()->email;
        //     $para = array(
        //         'part' => 'backend',
        //         'products' => $idsavelog,
        //         'ref' => $products->id,
        //         'remark' => 'products '.$idsavelog.' Create new products!',
        //         'event' => 'create products',
        //     );
        //     $result = (new LogsSaveController)->create_log($para);
        // }

        return redirect(route('products'))->with('success', 'บันทึกข้อมูลสำเร็จ !!!');
    }

    public function products_edit_action(Request $request)
    {
        // dd($request);

        $request->validate([

        ]);

        $products = Products::find($request->products);

        // if($request->hasFile('photo')){

        //     $oldPath = public_path($products->photo);
        //     if(File::exists($oldPath)){
        //         File::delete($oldPath);
        //     }

        //     $file = $request->file('photo');
        //     $destinationPath = public_path('/uploads/photo');
        //     $filename = $file->getClientOriginalName();

        //     $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        //     $newfilenam = time().'-'.uniqid().'.' .$ext;
        //     $file->move($destinationPath, $newfilenam);
        //     $filepath = 'uploads/photo/'.$newfilenam;

        //     $products->photo = $filepath;
        // }

        $products->name_th = $request->name_th;
        $products->name_en = $request->name_en;
        $products->detail = $request->detail;
        $products->width = $request->width;
        $products->lengt = $request->lengt;
        $products->high = $request->high;
        $products->dimension = ($request->width*$request->lengt*$request->high);

        $products->weight = $request->weight;
        $products->unit_id = $request->unit_id;
        $products->type_id = $request->type_id;
        $products->pack_type_id = $request->pack_type_id;
        $products->box_type_id = $request->box_type_id;
        $products->active = $request->active;

        $products->update();

        return redirect(route('products'))->with('success', 'บันทึกข้อมูลสำเร็จ !!!');
    }





}
