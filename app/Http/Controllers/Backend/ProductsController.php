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
use Illuminate\Support\Facades\DB;


use App\Models\Products;
use App\Models\ProductGroup;
use App\Models\ProductBoxType;



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
            // ->orderBy('id', 'desc')
            ->paginate(10);

        $query = Products::query();
        // ->orderBy('id', 'desc');

        if ($request->filled('keyword')) {
            $keyword = $request->input('keyword');
            $query->where(function ($query) use ($keyword) {
                $query->where('product_code', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('name_th', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('name_en', 'LIKE', '%' . $keyword . '%');
            });
        }

        $resultPerPage = 10;
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
        DB::beginTransaction();
        try {


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
            $products->product_code = $request->product_code;
            $products->name_th = $request->name_th;
            $products->name_en = $request->name_en;
            $products->detail = $request->detail;
            $products->width = $request->width;
            $products->length = $request->length;
            $products->height = $request->height;
            $products->dimension = ($request->width * $request->length * $request->height);
            $products->weight = $request->weight;
            $products->unit_id = $request->unit_id;
            $products->type_id = $request->type_id;
            $products->active = 1;
            if ($products->save()) {

                if ($request->group != '') {

                    $groups  = $request->group;
                    foreach ($groups as $key => $group) {
                        foreach ($group as $value) {
                            $product_group = new ProductGroup;
                            $product_group->products_id = $products->id;
                            $product_group->regions_id = $key;
                            $product_group->group_name = $value;
                            $product_group->active = 1;
                            $product_group->save();
                        }
                    }
                }
                if ($request->box_type_id != '') {

                    $box_type_id  = $request->box_type_id;
                    foreach ($box_type_id as $value) {
                        $product_type = new ProductBoxType;
                        $product_type->products_id = $products->id;
                        $product_type->box_type_id  = $value;
                        $product_type->active = 1;
                        $product_type->save();
                    }
                }
            }

            DB::commit();
            return redirect(route('products'))->with('success', 'บันทึกข้อมูลสำเร็จ !!!');
        } catch (\Exception $e) {
            return redirect(route('products_add'))->with('success', 'บันทึกข้อมูลไม่สำเร็จ !!!');
        }

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


    }

    public function products_edit_action(Request $request)
    {
        // dd($request);

        DB::beginTransaction();
        try {


            $request->validate([]);

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

            $products->product_code = $request->product_code;
            $products->name_th = $request->name_th;
            $products->name_en = $request->name_en;
            $products->detail = $request->detail;
            $products->width = $request->width;
            $products->length = $request->length;
            $products->height = $request->height;
            $products->dimension = ($request->width * $request->length * $request->height);
            $products->weight = $request->weight;
            $products->unit_id = $request->unit_id;
            $products->type_id = $request->type_id;
            $products->active = $request->active;
            if ($products->update()) {

                if ($request->group != '') {
                    $PG = ProductGroup::where('products_id', $products->id)->delete();
                    $groups  = $request->group;
                    foreach ($groups as $key => $group) {
                        foreach ($group as $value) {
                            $product_group = new ProductGroup;
                            $product_group->products_id = $products->id;
                            $product_group->regions_id = $key;
                            $product_group->group_name = $value;
                            $product_group->active = 1;
                            $product_group->save();
                        }
                    }
                }
                if ($request->box_type_id != '') {
                    $PBT = ProductBoxType::where('products_id', $products->id)->delete();
                    $box_type_id  = $request->box_type_id;
                    foreach ($box_type_id as $value) {
                        $product_type = new ProductBoxType;
                        $product_type->products_id = $products->id;
                        $product_type->box_type_id  = $value;
                        $product_type->active = 1;
                        $product_type->save();
                    }
                }
            }


            DB::commit();
            return redirect(route('products'))->with('success', 'บันทึกข้อมูลสำเร็จ !!!');
        } catch (\Exception $e) {
            return redirect(route('products_edit') . '/' . $request->products)->with('success', 'บันทึกข้อมูลไม่สำเร็จ !!!');
        }
    }


    public function importExcel(Request $request)
    {
        $this->validate($request, [
            'serial_number_import_excel' => 'required|file|mimes:xls,xlsx'
        ]);
        $the_file = $request->file('serial_number_import_excel');

        try {

            $spreadsheet = IOFactory::load($the_file->getRealPath());
            $sheet        = $spreadsheet->getActiveSheet();
            $row_limit    = $sheet->getHighestDataRow();
            $row_range    = range(2, $row_limit);
            DB::transaction(function () use ($sheet, $row_range) {
                $data = [];
                foreach ($row_range as $row) {

                    $product_name   = $sheet->getCell('A' . $row)->getValue();
                    $type_name      = $sheet->getCell('B' . $row)->getValue();
                    $serial_number  = $sheet->getCell('C' . $row)->getValue();
                    $lot            = $sheet->getCell('D' . $row)->getValue();
                    $year_from      = $sheet->getCell('E' . $row)->getValue();

                    // $found = serialnumber::where('serial_number_no', $serial_number)->first();
                    // if (!$found) {
                    if ($serial_number != NULL) {
                        // $serialnumber = new serialnumber;
                        // $serialnumber->serial_number_no = $serial_number;
                        // $serialnumber->serial_number_product_name = $product_name;
                        // $serialnumber->serial_number_type_name = $type_name;
                        // $serialnumber->serial_number_lot = $lot;
                        // $serialnumber->serial_number_year_from = $year_from ? $year_from : null;
                        // $serialnumber->save();

                        $data[] = [
                            'serial_number_no' => $serial_number,
                            'serial_number_product_name' => $product_name,
                            'serial_number_type_name' => $type_name,
                            'serial_number_lot' => $lot,
                            'serial_number_year_from' => $year_from ? $year_from : null,
                        ];
                    }
                }

                serialnumber::insert($data);
                // คำนวณเวลาที่ใช้

            });
        } catch (\Exception $e) {
            return back()->withErrors('There was a problem uploading the data!');
        }
        return back()->withSuccess('Great! Data has been successfully uploaded.');
    }


    public function products_import_action(Request $request)
    {

        DB::beginTransaction();
        try {


            $spreadsheet = IOFactory::load($the_file->getRealPath());
            $sheet        = $spreadsheet->getActiveSheet();
            $row_limit    = $sheet->getHighestDataRow();
            $row_range    = range(2, $row_limit);
            DB::transaction(function () use ($sheet, $row_range) {
                $data = [];
                foreach ($row_range as $row) {

                    $product_code   = $sheet->getCell('A' . $row)->getValue();
                    $name_th        = $sheet->getCell('B' . $row)->getValue();
                    $name_en        = $sheet->getCell('C' . $row)->getValue();
                    $width          = $sheet->getCell('D' . $row)->getValue();
                    $length         = $sheet->getCell('E' . $row)->getValue();
                    $height         = $sheet->getCell('F' . $row)->getValue();
                    $weight         = $sheet->getCell('G' . $row)->getValue();
                    $unit_id        = $sheet->getCell('H' . $row)->getValue();
                    $box_type_id    = $sheet->getCell('I' . $row)->getValue();
                    $group1         = $sheet->getCell('J' . $row)->getValue();
                    $group2         = $sheet->getCell('K' . $row)->getValue();
                    $group3         = $sheet->getCell('L' . $row)->getValue();


                    if ($product_code != NULL) {

                        $products = new Products;
                        $products->product_code = $product_code;
                        $products->name_th = $name_th;
                        $products->name_en = $name_en;
                        // $products->detail = $detail;
                        $products->width = $width;
                        $products->length = $length;
                        $products->height = $height;
                        $products->dimension = ($width * $length * $height);
                        $products->weight = $weight;
                        $products->unit_id = $unit_id;
                        // $products->type_id = $type_id;
                        $products->active = 1;
                        if ($products->save()) {

                            if ($group1 != '') {
                                $group1_list = explode(",", $group1);
                                foreach ($group1_list as $value) {
                                    $product_group = new ProductGroup;
                                    $product_group->products_id = $products->id;
                                    $product_group->regions_id =1;
                                    $product_group->group_name = $value;
                                    $product_group->active = 1;
                                    $product_group->save();
                                }
                            }
                            if ($group2 != '') {
                                $group2_list = explode(",", $group2);
                                foreach ($group2_list as $value) {
                                    $product_group = new ProductGroup;
                                    $product_group->products_id = $products->id;
                                    $product_group->regions_id =2;
                                    $product_group->group_name = $value;
                                    $product_group->active = 1;
                                    $product_group->save();
                                }
                            }
                            if ($group3 != '') {
                                $group3_list = explode(",", $group3);
                                foreach ($group3_list as $value) {
                                    $product_group = new ProductGroup;
                                    $product_group->products_id = $products->id;
                                    $product_group->regions_id =3;
                                    $product_group->group_name = $value;
                                    $product_group->active = 1;
                                    $product_group->save();
                                }
                            }
                            if ($box_type_id != '') {

                                $box_type_id_list = explode(",", $box_type_id);
                                foreach ($box_type_id_list as $value) {
                                    $product_type = new ProductBoxType;
                                    $product_type->products_id = $products->id;
                                    $product_type->box_type_id  = $value;
                                    $product_type->active = 1;
                                    $product_type->save();
                                }
                            }
                        }
                    }
                }
            });


            DB::commit();
            return redirect(route('products'))->with('success', 'บันทึกข้อมูลสำเร็จ !!!');
        } catch (\Exception $e) {
            return redirect(route('products_add'))->with('success', 'บันทึกข้อมูลไม่สำเร็จ !!!');
        }
    }
}
