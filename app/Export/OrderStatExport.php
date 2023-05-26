<?php

namespace App\Export;

use App\Adapters\ExcelAdapter;
use App\Contracts\ExportContract;
use App\Repositories\OrderRepository;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Symfony\Component\HttpFoundation\StreamedResponse;

class OrderStatExport implements ExportContract
{
    public function __construct(
        protected ExcelAdapter $excel
    ) {
    }

    public function download(string $filename = null): StreamedResponse
    {
        $replace = ['date' => Carbon::now()];
        $filename = $filename ?? __('filename.order.stat-export', $replace);

        $exportExcel = $this->excel
            ->setData($this->getData());

        return $exportExcel->download($filename);
    }

    public function getData(): array
    {
        return $this->getOrders()->toArray();
    }

    public function getOrders(): Collection
    {
        /** @var OrderRepository $repository */
        $repository = app(OrderRepository::class);

        return $repository->all();
    }
}
