<?php

namespace App\DTO;

use App\Caster\HashMakeCaster;
use Spatie\DataTransferObject\DataTransferObject;
use Spatie\DataTransferObject\Attributes\CastWith;

class UserDto extends DataTransferObject
{
    public string $name;
    public string $email;
    #[CastWith(HashMakeCaster::class)]
    public string $password;
    public string $role;

    public static function fromRequest($request)
    {
        return new self($request->all());
    }
}
