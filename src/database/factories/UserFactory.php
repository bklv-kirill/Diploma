<?php

namespace Database\Factories;

use App\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Http;

class UserFactory extends Factory
{

    protected static ?string $password;

    public function definition(): array
    {
        $gender   = rand(0, 1);
        $birthday = $this->faker->dateTimeBetween('-100 years', '-18 years');
        $about    = Http::get('https://fish-text.ru/get', [
            'type'   => 'sentence',
            'number' => 1,
        ])->json();

        return [
            'first_name'        => $this->faker->firstName([
                'female',
                'male',
            ][$gender]),
            'second_name'       => $this->faker->lastName([
                'female',
                'male',
            ][$gender]),
            'patronymic'        => $this->faker->lastName([
                'female',
                'male',
            ][$gender]),
            'gender'            => $gender,
            'birthday'          => $birthday,
            'phone'             => $this->faker->unique()->phoneNumber(),
            'about'             => $about['text'],
            'salary'            => $this->faker->randomFloat($nbMaxDecimals = 0,
                $min = 19242, $max = 350000),
            'city_id'           => City::query()->get()->random()->id,
            'email'             => $this->faker->unique()->email(),
            'email_verified_at' => now(),
            'password'          => $this->faker->password(),
            'is_bot'            => true,
        ];
    }

}
