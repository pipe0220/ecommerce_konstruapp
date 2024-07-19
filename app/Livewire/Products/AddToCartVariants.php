<?php

namespace App\Livewire\Products;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Attributes\Computed;
use App\Models\Feature;
class AddToCartVariants extends Component
{

    public $product;

    public $qty = 1;

    public $selectedFeatures = [];

    public function mount()
    {
        foreach ($this->product->options as $option){
            $features = collect($option->pivot->features);
            $this->selectedFeatures[$option->id] = $features->first()['id'];
        }
    }

    #[Computed]
    public function variant(){
        return $this->product->variants->filter(function($variant){
            return !array_diff($variant->features->pluck('id')->toArry(), $this->selectedFeatures);
        })->first();
    }

    public function add_to_cart()
    {

        Cart::instance('shopping');
        Cart::add([
            'id' => $this->product->id,
            'name' => $this->product->name,
            'qty' => $this->qty,
            'price' => $this->product->price,
            'options' => [
                'image' => $this->variant->image,
                'sku' => $this->variant->sku,
                'features' => Feature::whereIn('id',$this->selectedFeatures)
                                    ->pluck('description', 'id')
                                    ->toArray()
            ]
        ]);

        if (auth()->check()) {
            Cart::store(auth()->id());
        }

        $this->dispatch('cartUpdated', Cart::count());

        $this->dispatch('swal',[
            'icon' => 'success',
            'title' => '¡Bien Hecho!',
            'text' => 'El producto se agrego al carrito'
        ]);
    }

    public function render()
    {
        return view('livewire.products.add-to-cart-variants');
    }
}
