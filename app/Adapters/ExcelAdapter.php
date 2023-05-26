<?php

namespace App\Adapters;

use Rap2hpoutre\FastExcel\FastExcel;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ExcelAdapter
{
    public function __construct(
        public FastExcel $fastExcel
    ) {
    }

    /**
     * @var Illuminate\Support\Collection|Illuminate\Database\Eloquent\Collection $data
     */
    public function setData($data): static
    {
        $this->fastExcel->data($data);

        return $this;
    }

    public function download(string $filename): StreamedResponse
    {
        return $this->fastExcel->download($filename);
    }
}
