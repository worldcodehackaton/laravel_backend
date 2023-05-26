<?php

namespace App\Caster;

use Illuminate\Support\Facades\Hash;
use Spatie\DataTransferObject\Caster;

class HashMakeCaster implements Caster
{
    public function cast(mixed $value): mixed
    {
        return Hash::make($value);
    }
}
