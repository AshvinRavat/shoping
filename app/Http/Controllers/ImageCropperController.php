<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Str;

class ImageCropperController extends Controller
{
     public function index()
    {
        return view('image-croping');
    }

    public function upload(Request $request)
    {
        $data = $request->all();
        $data = count($data);     
        for ($i = 1; $i < $data; $i++) {

            $inputName = 'cropped_image_' . $i;

            if ($request->has($inputName) && !empty($request->$inputName)) {
                $croppedImageData = $request->input($inputName);
                $imageData = Str::replaceFirst('data:image/png;base64,', '', $croppedImageData);
                $imageData = base64_decode($imageData);

                $imageName = time() . '_' . $i . '.png'; // Unique file name for each image

                $filePath = public_path('upload/') . $imageName; 
                file_put_contents($filePath, $imageData);
            }
        }   
    }

    public function sessionData(Request $request)
    {
        session([
            'image_data_'.$request->dynamic_id => $request->image_data
        ]);

        return response()->json([
            'success' => 'Image Uploaded Successfully',
        ]);
    }

    public function cropImageUploadAjax(Request $request)
    {
        $path = public_path('upload/');
        !is_dir($path) &&
            mkdir($path, 0777, true);

        $image_parts      = explode(";base64,", $request->image);
        $image_type_aux   = explode("image/", $image_parts[0]);
        $image_type       = $image_type_aux[1];
        $image_base64     = base64_decode($image_parts[1]);
        $image_name       = uniqid() . '.png';
        $image_full_path  = $path . $image_name;
        file_put_contents($image_full_path, $image_base64);

        session()->put('image_url', $image_name);

        return response()->json([
            'success' => 'Image Uploaded Successfully',
            'image_url' => $image_name
        ]);
    }
}
