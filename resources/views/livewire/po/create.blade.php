<div>
    <form>
        <div class="intro-y box p-5 w-full mx-auto grid gap-4">
            <div class="col-span-12">
                <p class="text-lg">ข้อมูลใบ PO</p>
            </div>
            <div class="col-span-4">
                <label class="form-label">วันที่</label>
                <input type="date" class="form-control">
            </div>
            @if (auth()->user()->role == 'admin')
                <div class="col-span-4">
                    <label class="form-label">ผู้จัดจำหน่าย</label>
                    <select class="tom-select w-full">
                        <option value="">กรุณาเลือก</option>
                        @foreach ($distributors as $distributor)
                            <option value="{{ $distributor->id }}">{{ $distributor->name }}</option>
                        @endforeach
                    </select>
                </div>
            @endif
            <div class="col-span-4">
                <label class="form-label">ทวีป</label>
                <select class="tom-select w-full">
                    <option value="">กรุณาเลือก</option>
                </select>
            </div>
        </div>
        <div class="intro-y box p-5 w-full mx-auto my-5">
            <div class="flex">
                <input type="number" class="form-control w-20 mx-2 my-4" placeholder="จำนวน">
                <button type="submit" class="btn btn-primary w-24 ml-3 mx-2 my-4">
                    เพิ่มสินค้า
                </button>
            </div>
            <div class="grid gap-4">
                <div class="col-span-12">
                    <p class="text-lg">ข้อมูลสินค้า</p>
                </div>
                <div>
                    <label class="form-label">ผู้จัดจำหน่ายรายย่อย</label>
                    <select class="tom-select" style="width: 15rem;">
                        <option value="">กรุณาเลือก</option>
                        @foreach ($sub_distributors as $sub_distributor)
                            <option value="{{ $sub_distributor->id }}">{{ $sub_distributor->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="form-label">สินค้า</label>
                    <select class="tom-select" style="width: 15rem;">
                        <option value="">กรุณาเลือก</option>
                        @foreach ($products_data as $product)
                            <option value="{{ $product->id }}">{{ $product->name_th }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="form-label">Customer Code</label>
                    <input type="text" class="form-control">
                </div>
                <div>
                    <label class="form-label">ขนาด</label>
                    <input type="text" class="form-control">
                </div>
                <div>
                    <label class="form-label">unit</label>
                    <input type="text" class="form-control">
                </div>
                <div>
                    <label class="form-label">จำนวน</label>
                    <input type="text" class="form-control">
                </div>
                <div class="col-span-12 flex justify-end my-4">
                    <div class="mx-1">
                        <a href="{{ route('po.index') }}" class="btn btn-danger w-24">ยกเลิก</a>
                    </div>
                    <div class="mx-1">
                        <a href="{{ route('po.detail') }}" class="btn btn-primary w-24">บันทึก</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
