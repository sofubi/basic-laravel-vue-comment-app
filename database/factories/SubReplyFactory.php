<?php

namespace Database\Factories;

use App\Models\SubReply;
use App\Models\User;
use App\Models\Reply;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubReplyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SubReply::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random()->id,
            'reply_id' => Reply::all()->random()->id,
            'content' => $this->faker->paragraph
        ];
    }
}
