<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Attributes\SearchUsingPrefix;
use Laravel\Scout\Searchable;

class Car extends Model
{
    use HasFactory , Searchable;

    protected $fillable = ['title', 'content', 'luggage', 'doors', 'passengers', 'price', 'active', 'image','category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    #[SearchUsingPrefix(['id', 'title'])]
    public function toSearchableArray()
    {
        return[
            'id'         =>$this->id,
            'title'      =>$this->title,
            'price'      =>$this->price,
            'category_id'=>$this->category_id
        ];
    }
}
