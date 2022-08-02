<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;


class Product extends Model 
{
    use HasFactory;

    protected $fillable = [
    	'name', 'price', 'image', 'energy', 'weight', 'delivery', 'description'
    ];

    public static function validate($request) {
    	$validated = $request->validate([
            'name' => 'required|max:100',
            'price' => 'required|integer',
            'image' => 'required|image|max:10000',
            'energy' => 'nullable|integer',
            'weight' => 'nullable|integer',
            'delivery' => 'nullable|integer',
            'description' => 'nullable|max:200',            
        ]);

        return $validated;
    }

    public static function createUriImage($request) {

    	$path = $request->file('image')->store('public');

        $uri = asset('data/'.explode("/", $path)[1]);

        return $uri;

    }

	

}