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
                ->get()
                ->filter(fn($item) => $item->product !== null);

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
            // Recalculate immediately
            $this->loadCart();
            $this->dispatch('cart-updated');
        }
    }

    public function remove($id)
    {
        $item = CartItem::where('user_id', Auth::id())->where('id', $id)->first();

        if ($item) {
            $item->delete();
            $this->loadCart();
            $this->dispatch('cart-updated');
        }
    }

    public function render()
    {
        return view('livewire.cart-panel');
    }
}
