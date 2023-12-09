<?php

namespace App\Livewire;

use App\Models\Product as ModelsProduct;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Livewire\WithPagination;

class Product extends Component
{
    use WithFileUploads;
    use WithPagination;



    public function render()
    {
        $products = ModelsProduct::paginate(5);


        // return view('livewire.product', ['products' => $this->products]);
        return view('livewire.product', compact("products"));
    }

    public $showFrom = false;

    public function show() {
        $this->showFrom = true;
    }

    public function hide() {
        $this->showFrom = false;
    }

    public $editMode = false;

    public $id;

    #[Validate('required')]
    public $product_name;

    #[Validate('required')]
    public $brand;

    #[Validate('required')]
    public $TransactionDate;

    #[Validate('required')]
    public $Amount;

    #[Validate('required')]
    public $description;

    #[Validate('image|max:1024')]
    public $image;


    public function store() {
       $this->validate();

       $path = $this->image->store("image", "public");

       ModelsProduct::create([
        "product_name" => $this->product_name,
        "brand" => $this->brand,
        "TransactionDate" => $this->TransactionDate,
        "Amount" => $this->Amount,
        "description" => $this->description,
        "image" => $path,
       ]);
       session()->flash('message', 'File successfully Uploaded.');

       $this->reset();
    }

}
