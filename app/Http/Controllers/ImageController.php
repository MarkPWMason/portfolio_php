<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function getImage($fileName)
    {
        try {
            $result = Storage::disk('s3')->response('portfolioScreenshots/' . $fileName);
            return $result;
        } catch (Exception $e) {
            dd($e);
        }
    }
}
