<?php

namespace App\Http\Livewire\Table;

use App\Http\Livewire\Table\Abstract\DataTableComponentCustom;
use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class CategoriesTable extends DataTableComponentCustom
{
    public function builder(): Builder
    {
        return Category::query()
            ->with([
                'createdBy:name',
            ]);
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")->sortable(),
            Column::make("Name", "name")
                ->searchable()
                ->sortable(),
            Column::make("Created by", "createdBy.name")
                ->sortable(),
        ];
    }
}
