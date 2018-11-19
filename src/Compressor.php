<?php

namespace Pangolinkeys\Image;

use Pangolinkeys\Image\Contracts\Compressor as CompressorContract;
use Pangolinkeys\Image\Pipes\Compress;
use Pangolinkeys\Pipe\InitializePipeline;
use Pangolinkeys\Pipe\Pipeline;

class Compressor implements CompressorContract
{
    use Pipeline;

    public function compress($resource)
    {
        return $this->pipe(
            new InitializePipeline($resource),
            new Compress
        );
    }
}