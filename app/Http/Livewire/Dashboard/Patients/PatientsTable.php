<?php

namespace App\Http\Livewire\Dashboard\Patients;


use App\Models\Clinic;
use App\Models\Patient;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class PatientsTable extends DataTableComponent
{

    use LivewireAlert;

    protected $model = Patient::class;

    public $clinic;

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
        return Patient::query()
            ->where('clinic_id', $this->clinic->id)
            ->orderBy('created_at', 'desc');
    }

    public function columns(): array
    {
        return [
            Column::make("#", "id"),
            Column::make("Name", "name")
                ->searchable(),
            Column::make("Phone", "primary_phone_number")
                ->searchable(),
            Column::make("Phone", "secondary_phone_number")
                ->searchable(),

            Column::make("Actions", "id")->format(function ($value, $row, $column) {

                $patient = Patient::find($value);

                $deleteBtn = '<button wire:click="triggerDeleteItem(' . $value . ')"  class="btn btn-danger btn-sm me-1"><i class="bi bi-trash"></i></button>';
                $editBtn = '<a href="'. route('dashboard.patients.edit', ['clinic' => $this->clinic->slug, 'patient' => $patient->id]) .'" class="btn btn-warning btn-sm me-1"><i class="bi bi-pen"></i></a>';
                $viewBtn = '<a href="'. route('dashboard.patients.show', ['clinic' => $this->clinic->slug, 'patient' => $patient->id]) .'" class="btn btn-info btn-sm me-1"><i class="bi bi-list"></i> View</a>';
                $visitsBtn = '<a target="_bank" class="btn btn-info btn-sm me-1"><i class="bi bi-list"></i> Visits</a>';

                return $visitsBtn . $viewBtn . $editBtn . $deleteBtn;
            })->html(),

        ];
    }

    public function mount(Clinic $clinic) {
        $this->clinic = $clinic;
    }

    public $itemToBeDeleted = null;

    protected $listeners = [
        'deleteItem',
        'refresh-items' => '$refresh',
    ];

    public function triggerDeleteItem(Post $item): void
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
