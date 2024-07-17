<?php

namespace App\Livewire;

use App\Models\Option;
use Livewire\Attributes\On;
use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;

class Filter extends Component
{

    use WithPagination;
    public $family_id;

    public $category_id;

    public $subcategory_id;

    public $options;

    public $selected_features = [];

    public $orderBy = 1;

    public $search;

    public function mount()
    {

        $this->options = Option::when($this->family_id, function ($query) {
            $query->whereHas('products.subcategory.category', function ($query) {
                $query->where('family_id', $this->family_id);
            })->with([
                'features' => function ($query) {
                    $query->whereHas('variants.product.subcategory.category', function ($query) {
                        $query->where('family_id', $this->family_id);
                    });
                }
            ]);
        })
            ->when($this->category_id, function ($query) {
                $query->whereHas('products.subcategory', function ($query) {
                    $query->where('category_id', $this->category_id);
                })->with([
                    'features' => function ($query) {
                        $query->whereHas('variants.product.subcategory', function ($query) {
                            $query->where('category_id', $this->category_id);
                        });
                    }
                ]);
            })
            ->when($this->subcategory_id, function ($query) {
                $query->whereHas('products', function ($query) {
                    $query->where('subcategory_id', $this->subcategory_id);
                })->with([
                    'features' => function ($query) {
                        $query->whereHas('variants.product', function ($query) {
                            $query->where('subcategory_id', $this->subcategory_id);
                        });
                    }
                ]);
            })
            ->get()->toArray();
    }

    #[On('search')]
    public function search($search)
    {
        $this->search = $search;
    }
    public function render()
    {

        $products = Product::when($this->family_id, function ($query) {
            $query->whereHas('subcategory.category', function ($query) {
                $query->where('family_id', $this->family_id);
            });
        })
            ->when($this->category_id, function ($query) {
                $query->whereHas('subcategory', function ($query) {
                    $query->where('category_id', $this->category_id);
                });
            })
            ->when($this->subcategory_id, function ($query) {
                $query->where('subcategory_id', $this->subcategory_id);
            })
            ->when($this->orderBy == 1, function ($query) {
                $query->orderBy('created_at', 'desc');
            })
            ->when($this->orderBy == 2, function ($query) {
                $query->orderBy('price', 'desc');
            })
            ->when($this->orderBy == 3, function ($query) {
                $query->orderBy('price', 'asc');
            })
            ->when($this->selected_features, function ($query) {
                $query->whereHas('variants.features', function ($query) {
                    $query->whereIn('features.id', $this->selected_features);
                });
            })
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->paginate(24);

        return view('livewire.filter', compact('products'));
    }
}