<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\CartItem;
use Livewire\Attributes\On;

class CartIcon extends Component
{
    public $count = 0;

    public function mount()
    {
        $this->updateCount();
    }

    #[On('cart-updated')]
    public function updateCount()
    {
        if (Auth::check()) {
            $this->count = CartItem::where('user_id', Auth::id())->whereHas('product')->sum('quantity');
        } else {
            $this->count = 0; // Or session if we supported guest
        }
    }

    public function render()
    {
        return view('livewire.cart-icon');
    }
}
