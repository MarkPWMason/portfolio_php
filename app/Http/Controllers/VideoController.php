<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    public function getVideo($fileName)
    {
        $result = Storage::disk('s3')->response('portfolioVideos/' . $fileName);
        return $result;
    }
}
