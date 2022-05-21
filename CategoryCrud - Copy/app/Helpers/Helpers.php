<?php

use Illuminate\Support\Facades\Storage;

function upload($file, $path)
{
    $image = Storage::disk('public')->put($path, $file);
    return $url = Storage::url($image);
}
