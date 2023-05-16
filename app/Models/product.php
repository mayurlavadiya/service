<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'price',
        'image'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Set the image attribute and upload the file to the storage disk.
     *
     * @param mixed $value
     * @return void
     */
    public function setImageAttribute($value)
    {
        $attributeName = "image";
        $disk = "public";
        $destinationPath = "images/products";

        // If the value is not a file, it means we're updating the product and don't want to upload a new image
        if (!is_file($value)) {
            return $this->attributes[$attributeName] = $value;
        }

        // Generate a unique filename for the image
        $filename = Str::random(20) . '.' . $value->getClientOriginalExtension();

        // Upload the image to the storage disk
        $path = $value->storeAs($destinationPath, $filename, $disk);

        // Set the image attribute to the path of the uploaded image
        $this->attributes[$attributeName] = $path;
    }
}
