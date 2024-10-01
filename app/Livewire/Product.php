<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use App\Models\Product as ProductModel;

class Product extends Component
{
    public $products, $name, $price, $product_id;

    #[Layout('layouts.app')]
    public function render()
    {
        $this->products = ProductModel::all();
        return view('livewire.product')->title('Products');
    }

    public function resetInputField()
    {
        $this->name = '';
        $this->price = '';
        $this->product_id = '';
    }

    #[On('')]
    public function store()
    {
        $this->validate([
            'name' => 'required',
            'price' => 'required|numeric',
        ]);

        $saved = ProductModel::updateOrCreate(
            ['id' => $this->product_id],
            [
                'name' => $this->name,
                'price' => $this->price,
            ],
        );

        if ($saved) {
            $this->dispatch('swal', title: 'Success!', text: 'Product ' . $this->name .  ' has been saved successfully!', icon: 'success', confirmButtonText: 'Done');
            $this->resetInputField();
            $this->dispatch('product-created')->self();
        }
    }

    public function edit($id)
    {
        $product = ProductModel::findOrFail($id);
        $this->product_id = $id;
        $this->name = $product->name;
        $this->price = $product->price;
    }

    public function delete($id)
    {
        $productDeleted = ProductModel::find($id)->delete();

        if ($productDeleted) {
            $this->dispatch('swal', title: 'Success!', text: 'Product has been deleted successfully!', icon: 'success', confirmButtonText: 'Done');
        }
    }
}
