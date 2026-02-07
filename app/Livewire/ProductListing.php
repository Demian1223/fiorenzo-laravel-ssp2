<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use Livewire\WithPagination;

class ProductListing extends Component
{
    use WithPagination;

    public $gender = null;
    public $categorySlug = null;
    public $sort = ''; // 'price_asc', 'price_desc'
    public $search = '';

    public function mount($gender = null, $categorySlug = null)
    {
        $this->gender = $gender;
        $this->categorySlug = $categorySlug;
    }

    public function updatedSort()
    {
        $this->resetPage();
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = Product::query()->with(['category', 'brand']);

        // Search Filter
        if ($this->search) {
            $query->where(function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                    ->orWhereHas('brand', function ($b) {
                        $b->where('name', 'like', '%' . $this->search . '%');
                    });
            });
        }

        // Gender Filter
        if ($this->gender) {
            $query->where(function ($q) {
                $q->where('gender', $this->gender)
                    ->orWhere('gender', 'Unisex');
            });
        }

        // Category Filter
        if ($this->categorySlug) {
            // Normalize slug for comparison (start with exact match)
            $slug = strtolower($this->categorySlug);

            // Map common slugs to potential DB values if different
            // This is a safety net for inconsistent data
            $searchTerms = [$slug];

            if ($slug === 'bags' || $slug === 'bag') {
                $searchTerms = ['bag', 'bags', 'handbag', 'handbags'];
            } elseif ($slug === 'ready-to-wear' || $slug === 'readytowear') {
                $searchTerms = ['ready-to-wear', 'readytowear', 'clothing'];
            } elseif ($slug === 'shoes' || $slug === 'shoe') {
                $searchTerms = ['shoe', 'shoes', 'footwear'];
            }

            $query->where(function ($q) use ($searchTerms, $slug) {
                // Check category string column case-insensitively
                foreach ($searchTerms as $term) {
                    $q->orWhere('category', 'LIKE', "%{$term}%");
                }

                // Also check relation if it exists
                $q->orWhereHas('category', function ($c) use ($slug) {
                    $c->where('slug', $slug);
                });
            });
        }

        // Sorting
        if ($this->sort === 'price_asc') {
            $query->orderBy('price', 'asc');
        } elseif ($this->sort === 'price_desc') {
            $query->orderBy('price', 'desc');
        } else {
            $query->latest();
        }

        return view('livewire.product-listing', [
            'products' => $query->paginate(12)
        ]);
    }
}
