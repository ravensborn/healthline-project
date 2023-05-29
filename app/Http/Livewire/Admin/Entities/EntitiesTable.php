<?php

namespace App\Http\Livewire\Admin\Entities;

use App\Models\Entity;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class EntitiesTable extends DataTableComponent
{
    use LivewireAlert;

    protected $model = Entity::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setTableAttributes([
            'class' => 'table-sm table-bordered',
        ]);
        $this->setTableWrapperAttributes([
            'class' => 'table-responsive'
        ]);

    }

    public function builder(): \Illuminate\Database\Eloquent\Builder
    {
        return Entity::query()
            ->orderBy('created_at', 'desc');
    }

    public function columns(): array
    {
        return [
            Column::make("#", "id"),
            Column::make("Name", "name")
                ->searchable(),
            Column::make("Created", "created_at")
                ->format(function ($value) {
                    return $value->format('Y-m-d / h:i A');
                })->html(),
            Column::make("Actions", "id")->format(function ($id, $row, $column) {
                $deleteBtn = '<button wire:click="triggerDeleteItem(' . $id . ')"  class="btn btn-danger btn-sm me-1"><i class="bi bi-trash"></i></button>';
                $editBtn = '<a href="' . route('admin.entities.edit', $id) . '" class="btn btn-warning btn-sm me-1"><i class="bi bi-pen"></i></a>';
                $viewBtn = '<a href="' . route('admin.entities.clinics.index', $id) . '" class="btn btn-info btn-sm me-1"><i class="bi bi-list"></i> Clinics</a>';
                return $viewBtn . $editBtn . $deleteBtn;
            })->html(),

        ];
    }

    public function mount()
    {
    }

    public $itemToBeDeleted = null;

    protected $listeners = [
        'deleteItem',
        'refresh-items' => '$refresh',
    ];

    public function triggerDeleteItem(Entity $item): void
    {
        $this->confirm('Are you sure that you want to delete this item?', [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => true,
            'cancelButtonText' => 'Cancel',
            'confirmButtonText' => 'Yes',
            'onConfirmed' => 'deleteItem'
        ]);

        $this->itemToBeDeleted = $item;
    }

    public function deleteItem(): void
    {
        if ($this->itemToBeDeleted) {
            $this->itemToBeDeleted->delete();
        }

        $this->alert('success', 'Item successfully deleted.', [
            'position' => 'top-end',
            'timer' => 5000,
            'toast' => true,
        ]);

    }


}
