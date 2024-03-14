@extends('../backend/layout/side-menu')

@section('subhead')
    <title>Backend - {{ $default_pagename }}</title>
@endsection

@section('subcontent')
    <?php
    // echo "<pre>";
    // print_r($box_type);
    // echo "</pre>";
    ?>
    <div class="intro-y mt-8 flex flex-col items-center sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">{{ $default_pagename }}</h2>
        <div class="mt-4 flex w-full sm:mt-0 sm:w-auto">
        </div>
    </div>
    <form method="post" action="{{ route('box_type_edit_action') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="box_type" value="{{ $box_type->id }}" />
        <div class="grid grid-cols-12 gap-6 mt-5">
            <!-- <div class="intro-y col-span-12 lg:col-span-3"></div> -->
            <div class="intro-y col-span-12 lg:col-span-12">
                <!-- BEGIN: Form Layout -->
                <div class="intro-y box p-5">


                    <div class="p-5">
                        <div class="grid grid-cols-12 gap-x-5">
                            <div class="col-span-12 xl:col-span-6">
                                <div class="mt-3 ">
                                    <label for="" class="form-label">ชื่อประเภทกล่อง</label>
                                    <input type="text" class="form-control w-full" value="{{ $box_type->name }}"
                                        name="name" autocomplete="off" required />
                                </div>
                            </div>
                            <div class="col-span-12 xl:col-span-6">
                                <div class="mt-3 ">
                                    <label for="" class="form-label">สถานะ</label>
                                    <select class="form-control w-full" name="active" required>
                                        <option value="1" @if ($box_type->active == 1) selected @endif>ใช้งาน
                                        </option>
                                        <option value="0" @if ($box_type->active == 0) selected @endif>ไม่ใช้งาน
                                        </option>
                                    </select>
                                </div>
                            </div>

                        </div>


                    </div>



                    <div class="text-right mt-5">
                        <a href="{{ route('box_type') }}" class="btn btn-danger w-24">ยกเลิก</a>
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
