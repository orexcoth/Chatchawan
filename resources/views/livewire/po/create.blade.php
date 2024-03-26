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
            <div class="col-span-4">
                <label class="form-label">ผู้จัดจำหน่าย</label>
                <select class="tom-select w-full">
                    <option value="">กรุณาเลือก</option>
                </select>
            </div>
            <div class="col-span-4">
                <label class="form-label">ทวีป</label>
                <select class="tom-select w-full">
                    <option value="">กรุณาเลือก</option>
                </select>
            </div>
        </div>
        <div class="intro-y box p-5 w-full mx-auto my-5 grid gap-4">
            <div class="col-span-12">
                <p class="text-lg">ข้อมูลสินค้า</p>
            </div>
            <div class="col-span-12">
                <label class="form-label">ผู้จัดจำหน่ายรายย่อย</label>
                <select class="tom-select" style="width: 40%;">
                    <option value="">กรุณาเลือก</option>
                </select>
            </div>
            <div class="col-span-4">
                <label class="form-label">สินค้า</label>
                <select class="tom-select w-full">
                    <option value="">กรุณาเลือก</option>
                </select>
            </div>
            <div class="col-span-4">
                <label class="form-label">Customer Code</label>
                <input type="text" class="form-control">
            </div>
            <div class="col-span-1">
                <label class="form-label">ขนาด</label>
                <input type="text" class="form-control">
            </div>
            <div class="col-span-1">
                <label class="form-label">unit</label>
                <input type="text" class="form-control">
            </div>
            <div class="col-span-1">
                <label class="form-label">จำนวน</label>
                <input type="text" class="form-control">
            </div>
            <div class="col-span-12 flex justify-end my-4">
                <div class="mx-1">
                    <a href="{{ route('po.index') }}" class="btn btn-danger w-24">ยกเลิก</a>
                </div>
                <div class="mx-1">
                    <button type="submit" class="btn btn-primary w-24">บันทึก</button>
                </div>
            </div>
        </div>
    </form>
</div>
