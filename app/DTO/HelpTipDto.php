<?php

namespace App\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class HelpTipDto extends DataTransferObject
{
    public string $title;
    public string $image;
    public string $markup;
    public string $for_role;

    public static function fromRequest($request)
    {
        return new self($request->all());
    }
}
