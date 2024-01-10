<?php

namespace App\Models;

use App\Models\User;

use App\Models\Image;
use App\Models\Category;
use App\Models\Condition;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, Searchable;
    protected $fillable=['name','description','category','condition','price','user_id', 'category_id' ];

    public function toSearchableArray(){
        $condition= $this->condition;
        $category= $this->category;
        $array= [
            'id'=>$this->id,
            'name'=>$this->name,
            'description'=>$this->description,
            'category'=>$category,
            'condition'=>$condition,
        ];
        return $array;

    }
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function condition(){
        return $this->belongsTo(Condition::class);
    }

    public function images(){
        return $this->hasMany(Image::class);
    }

    public static function toBeRevisionedCount(){
        return Product::where('is_accepted', null)->count();
       }
       public function setAccepted($value){
        $this->is_accepted = $value;
        $this->save();
        return true;
       }
       
}


