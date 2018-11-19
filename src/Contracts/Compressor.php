<?php

namespace Pangolinkeys\Image\Contracts;

interface Compressor
{
    function compress($resource);
}