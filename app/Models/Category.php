<?php

namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Category extends Model
{
   protected $table = 'categories';
 
    protected $fillable = [
        'name'
    ];
 
    protected $casts = [
        'parent_id' =>  'integer',
        'featured'  =>  'boolean',
        'menu'      =>  'boolean'
    ];

public function setNameAttribute($value){
    $this->attributes['name'] = $value;
    $this->attributes['slug'] = Str::slug($value);
}
public function parent()
{
    return $this->belongsTo(Category::class, 'parent_id');
}
public function children()
{
    return $this->hasMany(Category::class, 'parent_id');
}
}