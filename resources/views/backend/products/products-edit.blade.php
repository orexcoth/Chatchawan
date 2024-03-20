@extends('../backend/layout/side-menu')

@section('subhead')
    <title>Backend - {{ $default_pagename }}</title>
@endsection

@section('subcontent')
    @php
        use App\Models\Regions;
        use App\Models\Unit;
        use App\Models\BoxType;
        use App\Models\ProductBoxType;
        use App\Models\ProductGroup;
        use App\Models\TypeProducts;

        $regions = Regions::where('active', 1)->orderBy('id')->get();
        $units = Unit::where('active', 1)->orderBy('id')->get();
        $box_type = BoxType::where('active', 1)->orderBy('id')->get();
        $PBT = ProductBoxType::where('products_id', $products->id)
            ->pluck('box_type_id')
            ->toArray();
        $type_products = TypeProducts::where('active', 1)->orderBy('id')->get();

    @endphp
    <div class="intro-y mt-8 flex flex-col items-center sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">{{ $default_pagename }}</h2>
        <div class="mt-4 flex w-full sm:mt-0 sm:w-auto">
        </div>
    </div>
    <form method="post" action="{{ route('products_edit_action') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="products" value="{{ $products->id }}" />
        <div class="grid grid-cols-12 gap-6 mt-5">
            <!-- <div class="intro-y col-span-12 lg:col-span-3"></div> -->
            <div class="intro-y col-span-12 lg:col-span-12">
                <!-- BEGIN: Form Layout -->
                <div class="intro-y box p-5">

                    <div class="p-5">
                        <div class="grid grid-cols-12 gap-x-5">
                            <div class="col-span-12 xl:col-span-6">
                                <div class="mt-3 ">
                                    <label for="" class="form-label">รหัสสินค้า</label>
                                    <input type="text" class="form-control w-full" value="{{ $products->product_code }}"
                                        name="product_code" autocomplete="off" required />
                                </div>
                            </div>
                            <div class="col-span-12 xl:col-span-6">

                            </div>
                            <div class="col-span-12 xl:col-span-6">
                                <div class="mt-3 ">
                                    <label for="" class="form-label">ชื่อสินค้า TH</label>
                                    <input type="text" class="form-control w-full" value="{{ $products->name_th }}"
                                        name="name_th" autocomplete="off" required />
                                </div>
                            </div>
                            <div class="col-span-12 xl:col-span-6">

                                <div class="mt-3 ">
                                    <label for="" class="form-label">ชื่อสินค้า EN</label>
                                    <input type="text" class="form-control w-full"
                                        value="{{ $products->name_en }}"name="name_en" autocomplete="off" required />
                                </div>


                            </div>
                            <div class="col-span-12 xl:col-span-6">
                                <div class="mt-3 ">
                                    <label for="" class="form-label">รายละเอียดสินค้า</label>
                                    <textarea class="form-control w-full" name="detail" cols="10" rows="10" style="height: 80px">{{ $products->detail }}</textarea>

                                </div>
                            </div>
                            <div class="col-span-12 xl:col-span-6">

                                <div class="mt-3 ">
                                    <label for="" class="form-label">ประเภทของกล่องที่บบรรจุ</label>
                                    <select data-placeholder="กรุณาเลือกข้อมูล..." class="tom-select w-full"
                                        id="box_type_id" name="box_type_id[]" multiple>
                                        @foreach ($box_type as $item)
                                            <option value="{{ $item->id }}"
                                                @if (in_array($item->id, $PBT)) selected @endif>{{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-span-6 xl:col-span-3">
                                <div class="mt-3 ">
                                    <label for="" class="form-label">กว้าง</label>
                                    <input type="number" class="form-control w-full"
                                        value="{{ $products->width }}"name="width" step="0.01" autocomplete="off" />
                                </div>

                            </div>

                            <div class="col-span-6 xl:col-span-3">
                                <div class="mt-3 ">
                                    <label for="" class="form-label">ยาว</label>
                                    <input type="number" class="form-control w-full" value="{{ $products->length }}"
                                        name="length" step="0.01" autocomplete="off" />
                                </div>
                            </div>

                            <div class="col-span-6 xl:col-span-3">
                                <div class="mt-3 ">
                                    <label for="" class="form-label">สูง</label>
                                    <input type="number" class="form-control w-full" value="{{ $products->height }}"
                                        name="height" step="0.01" autocomplete="off" />
                                </div>

                            </div>

                            <div class="col-span-6 xl:col-span-3">
                                <div class="mt-3 ">
                                    <label for="" class="form-label">น้ำหนัก (KG)</label>
                                    <input type="number" class="form-control w-full" value="{{ $products->weight }}"
                                        name="weight" step="0.01" autocomplete="off" />
                                </div>
                            </div>

                            <div class="col-span-6 xl:col-span-3">
                                <div class="mt-3">
                                    <label for="" class="form-label">หน่วยนับ</label>
                                    <select data-placeholder="กรุณาเลือกข้อมูล..." class="tom-select w-full"
                                        name="unit_id" required>
                                        @foreach ($units as $item)
                                            <option value="{{ $item->id }}"
                                                @if ($item->id == $products->unit_id) selected @endif>{{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>


                            <div class="col-span-6 xl:col-span-3">
                                <div class="mt-3">
                                    <label for="" class="form-label">ประเภทสินค้า</label>
                                    <select data-placeholder="กรุณาเลือกข้อมูล..." class="tom-select w-full"
                                        name="type_id" required>
                                        @foreach ($type_products as $item)
                                            <option value="{{ $item->id }}"
                                                @if ($item->id == $products->type_id) selected @endif>{{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{-- <div class="col-span-6 xl:col-span-3">
                                <div class="mt-3 ">

                                    <label for="" class="form-label">ประเภทการจัดส่ง</label>
                                    <select class="form-control w-full" name="pack_type_id" required>
                                        <option value="1" selected>ผ่านเกษตร</option>
                                        <option value="2">ไม่ผ่านเกษตร</option>
                                    </select>
                                </div>
                            </div> --}}



                            <div class="col-span-6 xl:col-span-3">
                                <div class="mt-3 ">
                                    <label for="" class="form-label">สถานะ</label>
                                    <select class="form-control w-full" name="active" required>
                                        <option value="1" selected>ใช้งาน</option>
                                        <option value="0">ไม่ใช้งาน</option>
                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="grid grid-cols-12 gap-x-5">
                            <div class="col-span-12 xl:col-span-12">

                                <div class="mt-3 ">
                                    <h6 for="" class="form-label">กลุ่มสินค้า</h6>
                                    <hr>

                                    @foreach ($regions as $item)
                                        <div inputgroup="inputGroup" class="flex group input-group  mt-3">
                                            <div id="input-group-3"
                                                class="py-2 px-3 bg-slate-100 border shadow-sm border-slate-200 text-slate-600"
                                                style="width: 30%;">
                                                {{ $item->name }}
                                            </div>
                                            @php
                                                $PG = ProductGroup::where('products_id', $products->id)
                                                    ->where('regions_id', $item->id)
                                                    ->pluck('group_name')
                                                    ->toArray();

                                            @endphp

                                            <select data-placeholder="กรุณาเลือกข้อมูล..." class="tom-select w-full"
                                                name="group[{{ $item->id }}][]" multiple>
                                                @for ($i = 0; $i < 6; $i++)
                                                    @php
                                                        $f = $i + 1;
                                                    @endphp
                                                    <option value="{{ $i + 1 }}"
                                                        @if (in_array($f, $PG)) selected @endif>
                                                        {{ $i + 1 }}
                                                    </option>
                                                @endfor

                                            </select>

                                        </div>
                                    @endforeach


                                </div>

                            </div>

                        </div>
                    </div>



                    <div class="text-right mt-5">
                        <a href="{{ route('products') }}" class="btn btn-danger w-24">ยกเลิก</a>
                        <button type="submit" class="btn btn-primary w-24">บันทึก</button>
                    </div>
                </div>
                <!-- END: Form Layout -->
            </div>
        </div>
    </form>
@endsection

@section('script')
    <script></script>
@endsection
