<?php

namespace App\DTO;

use App\Caster\HashMakeCaster;
use Spatie\DataTransferObject\DataTransferObject;
use Spatie\DataTransferObject\Attributes\CastWith;

class ClientDto extends DataTransferObject
{
    public string $name;
    public string $email;
    #[CastWith(HashMakeCaster::class)]
    public string $password;

    public static function fromRequest($request)
    {
        return new self($request->all());
    }
}
