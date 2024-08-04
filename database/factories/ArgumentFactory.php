<?php

namespace Database\Factories;

use App\Models\Mock;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Argument>
 */
class ArgumentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $records = Mock::all();
        $count = count($records);
        $random_mock = $records[rand(0, $count)];

        $functionName = $random_mock->function;

        $reflection = new \ReflectionMethod(get_class(fake()), $functionName);
        $parameters = $reflection->getParameters();

        /* $arguments = array_map(function($param) {
            $type = $param->getType();
            $type = $type ? $type->getName() : 'mixed';
            return ['name' => $param->getName(), 'type' => $type];
        }, $parameters);

        $created_arguments = array_map(function($argument) {
            $arg = Argument::create($argument);

            return $arg[0]->id;
        }, $arguments); */

        return [
        ];
    }
}
