<?php

namespace App\DTO;

use Spatie\DataTransferObject\DataTransferObject;
use Illuminate\Http\UploadedFile;

class ProductDTO extends DataTransferObject
{
    public string $name;
    public string $price;
    public string $description;
    public int $store_id;
    public int $category_id;
    public string $calc_type;
    /**
     * @var array<UploadedFile> $images
     */
    public array $images;

    public static function fromRequest($request): static
    {
        return new self($request->all());
    }
}
