<?php

namespace App\Helpers;

use App\Http\Controllers\Controller;

use Image;

class ImageResize extends Controller
{

  static function storeIt($image, $path, $size)
  {
      // Codes for resize & store images Starts
      //get filename with extension
      $fileNameWithExtension = $image->getClientOriginalName();
      //get filename without extension
      $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
      //get file extension
      $extension = $image->getClientOriginalExtension();
      //filename to store
      $fileNameToStore = str_replace(' ', '-', $fileName).'-'.time().'.'.$extension;

      //Upload File
      $imagePath = $image->storeAs("images/$path", $fileNameToStore);
      $thumbnailPathSmall = $image->storeAs("images/$path/img_small", $fileNameToStore);
      $thumbnailPathMedium = $image->storeAs("images/$path/img_medium", $fileNameToStore);
      //Resize image here

      //Thumbnail Medium
      $thubmnailRealPathMedium = public_path("/storage/$thumbnailPathMedium");
      $thumbnailMedium = Image::make($thubmnailRealPathMedium)->resize($size['m']['x'], $size['m']['y'], function($constraint) {
          $constraint->aspectRatio();
      });
      $thumbnailMedium->save($thubmnailRealPathMedium);

      // Thumbnail Small
      $thubmnailRealPathSmall = public_path("/storage/$thumbnailPathSmall");
      $thumbnailSmall = Image::make($thubmnailRealPathSmall)->resize($size['s']['x'], $size['s']['y'], function($constraint) {
          $constraint->aspectRatio();
      });
      $thumbnailSmall->save($thubmnailRealPathSmall);
      // Codes for resize & store images Ends

      return (object) [
        'image' => $imagePath,
        'img_medium' => $thumbnailPathMedium,
        'img_small' => $thumbnailPathSmall
      ];
  }
}
