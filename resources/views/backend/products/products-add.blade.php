@extends('../backend/layout/side-menu')

@section('subhead')
    <title>Backend - {{ $default_pagename }}</title>
@endsection

@section('subcontent')
    @php
        use App\Models\Regions;
        use App\Models\Unit;
        use App\Models\BoxType;

        $regions = Regions::where('active', 1)->orderBy('id')->get();
        $units = Unit::where('active', 1)->orderBy('id')->get();
        $box_type = BoxType::where('active', 1)->orderBy('id')->get();

    @endphp
    <?php
    // echo "<pre>";
    // print_r($page_name);
    // echo "</pre>";
    ?>
    <div class="intro-y mt-8 flex flex-col items-center sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">{{ $default_pagename }}</h2>
        <div class="mt-4 flex w-full sm:mt-0 sm:w-auto">
        </div>
    </div>
    <form method="post" action="{{ route('products_add_action') }}" enctype="multipart/form-data">
        @csrf
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
                                    <input type="text" class="form-control w-full" value="" name="product_code"
                                        autocomplete="off" required />
                                </div>
                            </div>
                            <div class="col-span-12 xl:col-span-6">

                            </div>
                            <div class="col-span-12 xl:col-span-6">
                                <div class="mt-3 ">
                                    <label for="" class="form-label">ชื่อสินค้า TH</label>
                                    <input type="text" class="form-control w-full" value="" name="name_th"
                                        autocomplete="off" required />
                                </div>
                                <div class="mt-3 ">
                                    <label for="" class="form-label">รายละเอียดสินค้า</label>
                                    <textarea class="form-control w-full" name="detail" cols="10" rows="10" style="height: 80px"></textarea>

                                </div>
                            </div>
                            <div class="col-span-12 xl:col-span-6">

                                <div class="mt-3 ">
                                    <label for="" class="form-label">ชื่อสินค้า EN</label>
                                    <input type="text" class="form-control w-full" value="" name="name_en"
                                        autocomplete="off" required />
                                </div>
                                <!-- <div class="mt-3">
                                                        <label for="" class="form-label">แอคทีฟ</label>
                                                        <select class="form-control w-full" name="active" required >
                                                            <option value="1" selected >แอคทีฟ</option>
                                                            <option value="2" >ไม่แอคทีฟ</option>
                                                        </select>
                                                    </div> -->


                            </div>
                            <div class="col-span-6 xl:col-span-3">
                                <div class="mt-3 ">
                                    <label for="" class="form-label">กว้าง</label>
                                    <input type="number" class="form-control w-full" value="" name="width"
                                        autocomplete="off" />
                                </div>

                                <div class="mt-3">
                                    <label for="" class="form-label">หน่วยนับ</label>
                                    <select data-placeholder="กรุณาเลือกข้อมูล..." class="tom-select w-full"
                                        name="unit_id" required>
                                        @foreach ($units as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>


                            </div>
                            <div class="col-span-6 xl:col-span-3">
                                <div class="mt-3 ">
                                    <label for="" class="form-label">ยาว</label>
                                    <input type="number" class="form-control w-full" value="" name="lengt"
                                        autocomplete="off" />
                                </div>

                                <div class="mt-3">
                                    <label for="" class="form-label">ประเภทสินค้า</label>
                                    <select class="form-control w-full" name="type_id" required>
                                        <option value="Vegetable" selected>Vegetable</option>
                                        <option value="Fruit">Fruit</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-span-6 xl:col-span-3">
                                <div class="mt-3 ">
                                    <label for="" class="form-label">สูง</label>
                                    <input type="number" class="form-control w-full" value="" name="high"
                                        autocomplete="off" />
                                </div>
                                <div class="mt-3 ">
                                    <label for="" class="form-label">ประเภทการจัดส่ง</label>
                                    <select class="form-control w-full" name="type_id" required>
                                        <option value="Vegetable" selected>ผ่านเกษตร</option>
                                        <option value="Fruit">ไม่ผ่านเกษตร</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-span-6 xl:col-span-3">
                                <div class="mt-3 ">
                                    <label for="" class="form-label">น้ำหนัก</label>
                                    <input type="number" class="form-control w-full" value="" name="weight"
                                        autocomplete="off" />
                                </div>

                                <div class="mt-3 ">
                                    <label for="" class="form-label">สถานะ</label>
                                    <select class="form-control w-full" name="active" required>
                                        <option value="1" selected>ใช้งาน</option>
                                        <option value="0">ไม่ใช้งาน</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-span-12 xl:col-span-6">

                                <div class="mt-3 ">
                                    <label for="" class="form-label">ประเภทของกล่องที่บบรรจุ</label>
                                    <select data-placeholder="กรุณาเลือกข้อมูล..." class="tom-select w-full"
                                        id="box_type_id" name="box_type_id[]" multiple>
                                        @foreach ($box_type as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>




                            </div>
                        </div>

                        <div class="grid grid-cols-12 gap-x-5">
                            <div class="col-span-12 xl:col-span-12">

                                <div class="mt-3 ">
                                    <label for="" class="form-label">กลุ่มสินค้า</label>

                                    @foreach ($regions as $item)
                                        <div inputgroup="inputGroup" class="flex group input-group  mt-3">
                                            <div id="input-group-3"
                                                class="py-2 px-3 bg-slate-100 border shadow-sm border-slate-200 text-slate-600"
                                                style="width: 30%;">
                                                {{ $item->name }}
                                            </div>

                                            <select data-placeholder="กรุณาเลือกข้อมูล..."
                                                class="tom-select w-full" id="crud-form-2" multiple>
                                                @for ($i = 0; $i < 6; $i++)
                                                    <option value="{{ $i + 1 }}">{{ $i + 1 }}
                                                    </option>
                                                @endfor
                                                {{-- <option value="1" selected>Sport & Outdoor</option>
                                                <option value="2">PC & Laptop</option>
                                                <option value="3" selected>Smartphone & Tablet</option>
                                                <option value="4">Photography</option> --}}
                                            </select>

                                        </div>
                                    @endforeach


                                </div>

                            </div>

                        </div>
                    </div>




                    <div class="text-right mt-5">
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
