<?php

namespace Database\Factories;

use App\Models\Clinic;
use App\Models\Entity;
use App\Models\Form;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Clinic>
 */
class ClinicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $entity = Entity::first();

        return [
            'name' => ucfirst($this->faker->name),
            'slug' => '',
            'description' => $this->faker->paragraph(4),
            'subscription' => $this->faker->date,
            'entity_id' => $entity->id,
            'patient_visit_form_id' => null,


        ];
    }

    public function configure(): static
    {
        return $this->afterMaking(function (Clinic $clinic) {
            // ...
        })->afterCreating(function (Clinic $clinic) {

            $form = Form::create([
                'formable_id' => $clinic->id,
                'formable_type' => Clinic::class,
                'name' => 'Visitor Form',
                'fields' => [],
//                'fields' => Form::VISITOR_FORM_FIELDS,
            ]);

            $clinic->update([
                'patient_visit_form_id' => $form->id,
            ]);
        });
    }


}
