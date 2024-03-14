@extends('../backend/layout/side-menu')

@section('subhead')
    <title>Backend - {{ $default_pagename }}</title>
@endsection

@section('subcontent')
    @php

        use App\Models\usersModel;

        $users = usersModel::where('role', 'distributor')->where('active', 1)->orderBy('id')->get();

    @endphp
    <div class="intro-y mt-8 flex flex-col items-center sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">{{ $default_pagename }}</h2>
        <div class="mt-4 flex w-full sm:mt-0 sm:w-auto">
        </div>
    </div>
    <form method="post" action="{{ route('distributor_sub_add_action') }}" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-12 gap-6 mt-5">
            <!-- <div class="intro-y col-span-12 lg:col-span-3"></div> -->
            <div class="intro-y col-span-12 lg:col-span-12">
                <!-- BEGIN: Form Layout -->
                <div class="intro-y box p-5">


                    <div class="p-5">
                        <div class="grid grid-cols-12 gap-x-5">
                            <div class="col-span-12 xl:col-span-6">
                                <div class="mt-3">
                                    <label for="" class="form-label">ผู้จัดจำหน่าย</label>
                                    <select data-placeholder="กรุณาเลือกข้อมูล..." class="tom-select w-full" name="users_id"
                                        required>
                                        @foreach ($users as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <div class="col-span-12 xl:col-span-6">
                                <div class="mt-3 ">
                                    <label for="" class="form-label">ชื่อผู้จัดจำหน่ายรายย่อย</label>
                                    <input type="text" class="form-control w-full" value="" name="name"
                                        autocomplete="off" required />
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
