<?php

namespace App\Http\Livewire\Dashboard\Forms;

use App\Models\Clinic;
use App\Models\Form;
use Illuminate\Support\Str;
use Livewire\Component;

class Edit extends Component
{
    public $clinic;
    public $form;
    public array $fieldTypes = [];
    public array $fields = [];

    public string $display_name = '';
    public string $field_type = '';
    public string $validation_rules = '';


    public array $predefinedQuestions = [];

    public function mount(Clinic $clinic, Form $form): void
    {

        $this->form = $form;
        $this->fields = $form->fields;
        $this->fieldTypes = Form::FIELD_TYPE_ARRAY;

        $this->loadPredefinedQuestions();

        $this->clinic = $clinic;

    }

    public function addNewField(): void
    {

      $validated = $this->validate([
          'display_name' => 'required',
          'field_type' => 'required',
          'validation_rules' => 'required',
      ]);

      $this->fields[] = [
          'display_name' => $validated['display_name'],
          'name' => Str::replace(' ', '_', Str::lower($validated['display_name'])),
          'type' => $validated['field_type'],
          'validation' => $validated['validation_rules'],
      ];

        $this->saveFields();

        $this->display_name = '';
        $this->field_type = '';
        $this->validation_rules = '';
    }

    public function removeField($index): void
    {
        unset($this->fields[$index]);
        $this->loadPredefinedQuestions();
        $this->saveFields();
    }

    public function saveFields(): void
    {
        $this->form->update([
            'fields' => $this->fields
        ]);
    }

    public function loadPredefinedQuestions(): void
    {
        $this->predefinedQuestions = $this->your_array_diff(Form::VISITOR_FORM_FIELDS, $this->fields);
    }
    public function addFromPredefinedQuestions($index): void
    {
        $this->fields[] = $this->predefinedQuestions[$index];
        $this->loadPredefinedQuestions();
        $this->saveFields();
    }

    function your_array_diff($arraya, $arrayb) {

        foreach ($arraya as $keya => $valuea) {
            if (in_array($valuea, $arrayb)) {
                unset($arraya[$keya]);
            }
        }
        return $arraya;
    }




    public function render()
    {
        return view('livewire.dashboard.forms.edit');
    }
}
