<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $table = "albums";

    protected $fillable = [
        'description',
        'image_path'
    ];

    protected $hidden = [
        'image_path'
    ];

    protected $appends = [
        'image_url'
    ];

    public function getImageUrlAttribute()
    {
        return asset('storage/' . $this->attributes['image_path']);
    }

}
