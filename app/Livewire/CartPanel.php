<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;

class CartPanel extends Component
{
    public $cartItems = [];
    public $subtotal = 0;
    public $delivery = 2500;
    public $total = 0;

    public function mount()
    {
        $this->loadCart();
    }

    public function loadCart()
    {
        if (Auth::check()) {
            $this->cartItems = CartItem::where('user_id', Auth::id())
                ->with('product')
                ->get();

            $this->calculateTotals();
        }
    }

    public function calculateTotals()
    {
        $this->subtotal = $this->cartItems->sum(function ($item) {
            return $item->quantity * $item->product->price;
        });
        $this->total = $this->subtotal + $this->delivery;
    }

    public function updateQuantity($id, $quantity)
    {
        $item = CartItem::where('user_id', Auth::id())->where('id', $id)->first();
        if ($item) {
            $quantity = (int) $quantity;
            if ($quantity > 0) {
                $item->quantity = $quantity;
                $item->save();
            } else {
                $item->delete();
            }
            $this->dispatch('cart-updated');
            $this->loadCart();
        }
    }

    public function remove($id)
    {
        CartItem::where('user_id', Auth::id())->where('id', $id)->delete();
        $this->dispatch('cart-updated');
        $this->loadCart();
    }

    public function render()
    {
        return view('livewire.cart-panel');
    }
}
