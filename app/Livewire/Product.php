<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Product as ProductModel;

class Product extends Component
{
    public $products, $name, $price, $product_id;
    public $is_open = false;

    #[Layout('layouts.app')]
    public function render()
    {
        $this->products = ProductModel::all();
        return view('livewire.product');
    }

    public function create()
    {
        // $this->resetInputField();
        // $this->openModal();
    $this->resetInputField();
    $this->openModal();
    $this->dispatch('createProductModalOpened');
    }

    public function openModal()
    {
        $this->is_open = true;
    }

    public function closeModal()
    {
        $this->is_open = false;
    }

    public function resetInputField()
    {
        $this->name = '';
        $this->price = '';
        $this->product_id = '';
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'price' => 'required|numeric'
        ]);

        ProductModel::updateOrCreate(['id' => $this->product_id], [
            'name' => $this->name,
            'price' => $this->price
        ]);

        session()->flash('message', 
        $this->product_id ? 'Product Updated Successfully.' : 'Product Created Successfully');
        $this->closeModal();
        $this->resetInputField();
    }

    public function edit($id)
    {
        $product = ProductModel::findOrFail($id);
        $this->product_id = $id;
        $this->name = $product->name;
        $this->price = $product->price;

        $this->openModal();
    }

    public function delete($id)
    {
        ProductModel::find($id)->delete();
        session()->flash('message', 'Product Deleted Successfully');
    }
}
