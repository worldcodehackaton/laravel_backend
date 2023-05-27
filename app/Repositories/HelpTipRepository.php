<?php

namespace App\Repositories;

use App\Contracts\RepositoryContract;
use App\Models\HelpTip;
use Illuminate\Database\Eloquent\Collection;

class HelpTipRepository extends RepositoryContract
{
    public function __construct(
        private HelpTip $model
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

    public function forRoleFactory(string $for_role)
    {
        switch ($for_role) {
            case 'admin':
                return $this->model->forAdmins()->get();
            case 'client':
                return $this->model->forClients()->get();
            case 'farmer':
                return $this->model->forFarmers()->get();
        }
    }
}
