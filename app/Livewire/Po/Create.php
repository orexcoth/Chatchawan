<?php

namespace App\Livewire\Po;

use App\Models\DistributorSub;
use App\Models\Products;
use App\Models\Regions;
use App\Models\User;
use Livewire\Component;

class Create extends Component
{
    public $products = [];
    public function render()
    {
        $distributors = User::where('role', 'distributor')->where('active', 1)->get();
        $regions = Regions::where('active', 1)->get();
        $sub_distributors = DistributorSub::where('users_id', auth()->user()->id)->where('active', 1)->get();
        $products_data = Products::where('active', 1)->get();
        return view('livewire.po.create', compact('distributors', 'regions', 'sub_distributors', 'products_data'));
    }
}
