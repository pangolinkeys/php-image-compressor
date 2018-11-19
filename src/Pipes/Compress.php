<?php

namespace Pangolinkeys\Image\Pipes;

use Pangolinkeys\Pipe\Contracts\ProvidesPipeline;

class Compress implements ProvidesPipeline
{

    /**
     * Process the queue item.
     *
     * @param $resource
     * @return mixed
     */
    function handle($resource)
    {
        $url = $resource;
        $info = getimagesize($resource);
        if (array_key_exists('mime', $info)) {
            switch ($info['mime']) {
                case 'image/jpeg':
                    $resource = imagecreatefromjpeg($resource);
                    break;
                case 'image/png' :
                    $resource = imagecreatefrompng($resource);
                    break;
            }
            imagejpeg($resource, $url, 20);
        }

        return $resource;
    }
}