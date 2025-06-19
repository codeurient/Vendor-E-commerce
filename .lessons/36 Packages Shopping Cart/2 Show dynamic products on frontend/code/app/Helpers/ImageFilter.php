<?php

namespace App\Helpers;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ImageFilter
{

    const BLUR_VAL = 15;

    private $blur;
    private $pathToImage;
    private $savePath;

    public function __construct($pathToImage = null,  $savePath = null, $blur = null) {

        $this->blur         = $blur ?? self::BLUR_VAL;
        $this->pathToImage  = $pathToImage;
        $this->savePath     = $savePath;

    }

    public function applyPixelateGreyscale()
    {
        $manager = new ImageManager(new Driver());

        $image = $manager->read($this->pathToImage)
                         ->cover(400, 400)
                         ->pixelate($this->blur)
                         ->greyscale();

        $image->save($this->savePath);

        return response($image->toJpeg(quality: 65))->header('Content-Type', 'image/jpeg');

    }
}
