<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class productImageController extends Controller
{
    //
    public function destroy(ProductImage $image)
    {
        if ($image->image_path && Storage::disk('public')->exists($image->image_path)) {
            Storage::disk('public')->delete($image->image_path);
        }

        $image->delete();

        return back()->with('success', 'Image deleted successfully.');
    }

    // Set image as default
    public function setDefault(ProductImage $image)
    {
        ProductImage::where('product_id', $image->product_id)
            ->update(['is_default' => false]);

 
        $image->update(['is_default' => true]);

        return back()->with('success', 'Default image updated.');
    }
}


