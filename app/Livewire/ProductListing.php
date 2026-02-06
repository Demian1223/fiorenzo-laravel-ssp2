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
            $query->where('gender', $this->gender);
        }

        // Category Filter
        if ($this->categorySlug) {
            if ($this->gender) {
                // If gender is set (e.g. 'men' or 'women'), check for string match in 'category' column used for sidebar
                // But we passed slug from controller, let's map it or check DB structure
                // In ShopController, for gender views, it used: where('category', $dbCategory)
                // Let's implement robust logic:
                $dbCategory = match ($this->categorySlug) {
                    'ready-to-wear' => 'readytowear',
                    'bags' => 'bag',
                    default => $this->categorySlug,
                };

                $query->where(function ($q) use ($dbCategory) {
                    $q->where('category', $dbCategory)
                        ->orWhere('category', $this->categorySlug);
                });

            } else {
                // Main Shop Index: uses Category model relation
                $category = Category::where('slug', $this->categorySlug)->first();
                if ($category) {
                    $query->where('category_id', $category->id);
                }
            }
        }

        // Sorting
        if ($this->sort === 'price_asc') {
            $query->orderBy('price', 'asc');
        } elseif ($this->sort === 'price_desc') {
            $query->orderBy('price', 'desc');
        } else {
            $query->latest();
        }

        $products = $query->paginate(12);

        return view('livewire.product-listing', [
            'products' => $products
        ]);
    }
}
