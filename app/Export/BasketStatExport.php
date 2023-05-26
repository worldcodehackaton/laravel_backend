<?php

namespace App\Export;

use App\Adapters\ExcelAdapter;
use App\Contracts\ExportContract;
use App\Repositories\BasketRepository;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Symfony\Component\HttpFoundation\StreamedResponse;

class BasketStatExport implements ExportContract
{
    public function __construct(
        protected ExcelAdapter $excel
    ) {
    }

    public function download(string $filename = null): StreamedResponse
    {
        $replace = ['date' => Carbon::now()];
        $filename = $filename ?? __('filename.basket.stat-export', $replace);

        $exportExcel = $this->excel
            ->setData($this->getData());

        return $exportExcel->download($filename);
    }

    public function getData(): array
    {
        return $this->getBaskets()->toArray();
    }

    public function getBaskets(): Collection
    {
        /** @var BasketRepository $repository */
        $repository = app(BasketRepository::class);

        return $repository->all();
    }
}
