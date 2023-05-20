<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'price',
        'images' // Update the attribute name to 'images'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Set the images attribute and upload the files to the storage disk.
     *
     * @param mixed $value
     * @return void
     */
    public function setImagesAttribute($value)
    {
        $attributeName = "images";
        $disk = "public";
        $destinationPath = "images/products";

        // If the value is not an array, it means we're updating the product and don't want to upload new images
        if (!is_array($value)) {
            return $this->attributes[$attributeName] = $value;
        }

        $uploadedImages = [];

        foreach ($value as $image) {
            // Generate a unique filename for the image
            $filename = Str::random(20) . '.' . $image->getClientOriginalExtension();

            // Upload the image to the storage disk
            $path = $image->storeAs($destinationPath, $filename, $disk);

            // Add the image path to the array of uploaded images
            $uploadedImages[] = $path;
        }

        // Set the images attribute to the array of uploaded image paths
        $this->attributes[$attributeName] = $uploadedImages;
    }

    public function images1(){
        return $this->hasMany(Image::class);
    }

    /**
     * Get the full URL for the images attribute.
     *
     * @return string|null
     */
    public function getImagesAttribute()
    {
        $images = $this->attributes['images'];

        if (is_array($images)) {
            $urlArray = [];
            foreach ($images as $image) {
                $urlArray[] = Storage::url($image);
            }
            return $urlArray;
        }

        return null;
    }
}
