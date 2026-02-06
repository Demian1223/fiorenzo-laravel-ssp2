<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class NavbarSearch extends Component
{
    public $search = '';
    public $results = [];

    public function updatedSearch()
    {
        if (strlen($this->search) < 2) {
            $this->results = [];
            return;
        }

        $this->results = Product::where('name', 'like', '%' . $this->search . '%')
            ->orWhereHas('brand', function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->take(8)
            ->get();
    }

    public function render()
    {
        return view('livewire.navbar-search');
    }
}
