<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table ='category';
    protected $guarded = [ 'id', 'create_at', 'updated_at' ];

    
    public function books()
    {
        return $this->hasMany(Book::class, 'category_id');
    }
    
}
