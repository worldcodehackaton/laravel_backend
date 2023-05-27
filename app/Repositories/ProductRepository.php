<?php

namespace App\Repositories;

use App\Contracts\RepositoryContract;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\UploadedFile;

class ProductRepository extends RepositoryContract
{
    public function __construct(
        private Product $model
    ) {
    }

    public function getQuery()
    {
        return $this->model->query();
    }

    public function fill(array $data): static
    {
        $this->model->fill($data);

        return $this;
    }

    public function save(): static
    {
        $this->model->save();

        return $this;
    }

    /**
     * @var UploadedFile[] $files
     */
    public function saveMediaBatch(array $files): static
    {
        $paths = [];

        foreach ($files as $file) {
            $paths[]['path'] = $this->saveMedia($file);
        }

        $this->model->images()->createMany($paths);

        return $this;
    }

    public function saveMedia(UploadedFile $file)
    {
        return $file->storePublicly('product_images', 'public');
    }

    public function all(): Collection
    {
        return $this->model->all();
    }

    public function findOrFail(int $id): Product
    {
        return $this->model->findOrFail($id);
    }
}
