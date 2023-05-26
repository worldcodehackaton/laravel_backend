<?php

namespace App\Contracts;

use Symfony\Component\HttpFoundation\StreamedResponse;

interface ExportContract
{
    public function download(string $filename = null): StreamedResponse;
}
