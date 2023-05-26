<?php

namespace App\Export;

use App\Contracts\ExportContract;

class ExportFactory
{
    public static function handle(string $export): ExportContract
    {
        switch ($export) {
            case 'report-test':
                return app(OrderStatExport::class);
                break;
        }
    }
}
