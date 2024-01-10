<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use App\Jobs\RemoveFaces;
use App\Jobs\ResizeImage;
use App\Models\Condition;
use Livewire\WithFileUploads;
use App\Jobs\GoogleVisionSearch;
use App\Jobs\GoogleVisionLabelImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class FormProducts extends Component
{
    
    use WithFileUploads;
    
    public $name;
    public $description;
    public $category;
    public $condition;
    public $price;
    
    public $temporary_images;
    public $images = [];
    
    public $categories;
    public $conditions;
    
    protected $rules = [
        "name"=>'required|min:5',
        "description"=>'required|min:10|max:255',
        "category"=>'required',
        "condition"=>'required',
        "price"=>'required|decimal:0,2',
        "temporary_images.*"=>'image|max:1024',
        "images.*"=>'image|max:1024'
        
        
    ];
    
    
    public function updatedTemporaryImages(){
        if ($this->validate(['temporary_images.*'=>'image|max:1024'])) {
            foreach ($this->temporary_images as $image) {
                $this->images[] = $image;
            }
        }
    }
    
    public function removeImage($key){
        if (in_array($key, array_keys($this->images))) {
            unset($this->images[$key]);
        }
    }
    public function store(){
        $this->validate();
        
        $category = Category::find($this->category);   
        $condition = Condition::find($this->condition);
        
        
        $product = $category->products()->create([
            'name' => $this->name,
            'description' => $this->description,
            'user_id' => Auth::user()->id,     
            'price' => $this->price,
        ]);
        
        $condition->products()->save($product);
        
        if(count($this->images)){
            foreach ($this->images as $image) {
                // $product->images()->create(['path'=>$image->store('images', 'public')]);
                $newFileName = "products/{$product->id}";
                $newImage = $product->images()->create(['path'=>$image->store($newFileName, "public")]);
                
                RemoveFaces::withChain([

                new ResizeImage($newImage->path, 400,300),
                new GoogleVisionSearch($newImage->id),
                new GoogleVisionLabelImage($newImage->id)

                ])->dispatch($newImage->id);
                
                
            }
            File::deleteDirectory(storage_path('storage\app\livewire-tmp'));
            
            $product->user()->associate(Auth::user());
            
            $product->save();
        }
        
        
        $this->reset();
        redirect()->route('products.create');
        session()->flash('success', 'Annuncio creato con successo');
        
    }

    public function render()
    {
        $this->categories= Category::all();
        $this->conditions= Condition::all();
        return view('livewire.form-products');
    }
}
