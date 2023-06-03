<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

// class Product extends Model
// {
//     use HasFactory;

//     protected $fillable = [
//         'name',
//         'slug',
//         'price',
//         'images',
//     ];

//     public function categories()
//     {
//         return $this->belongsToMany(Category::class);
//     }

//     public function images()
//     {
//         return $this->hasMany(Image::class);
//     }

//     public function setImagesAttribute($value)
//     {
//         $attributeName = 'images';
//         $disk = 'public';
//         $destinationPath = 'images/products';

//         if (!is_array($value)) {
//             return $this->attributes[$attributeName] = $value;
//         }

//         $uploadedImages = [];

//         foreach ($value as $image) {
//             $filename = Str::random(20) . '.' . $image->getClientOriginalExtension();

//             $path = $image->storeAs($destinationPath, $filename, $disk);

//             $uploadedImages[] = $path;
//         }

//         $this->attributes[$attributeName] = $uploadedImages;
//     }

//     public function getImagesAttribute()
//     {
//         $images = $this->attributes['images'] ?? null;

//         if (is_array($images)) {
//             $urlArray = [];
//             foreach ($images as $image) {
//                 $urlArray[] = Storage::url($image);
//             }
//             return $urlArray;
//         }

//         return null;
//     }
// }

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'price',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function setImagesAttribute($value)
    {
        $attributeName = 'images';
        $disk = 'public';
        $destinationPath = 'images/products';

        if (!is_array($value)) {
            return $this->attributes[$attributeName] = $value;
        }

        $uploadedImages = [];

        foreach ($value as $image) {
            $filename = Str::random(20) . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs($destinationPath, $filename, $disk);
            $uploadedImages[] = $path;
        }

        $this->attributes[$attributeName] = $uploadedImages;
    }

//     public function getImagesAttribute()
//     {
//         $images = $this->attributes['images'] ?? null;

//         if (is_array($images)) {
//             $urlArray = [];
//             foreach ($images as $image) {
//                 $urlArray[] = Storage::url($image);
//             }
//             return $urlArray;
//         }

//         return null;
//     }
}
