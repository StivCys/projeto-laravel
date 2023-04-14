<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\SiteContato;
use Faker\Generator as Faker;

$factory->define(SiteContato::class, function (Faker $faker) {
    return [
        //array
        'nome'=>$faker->name,
        'telefone'=>$faker->phoneNumber,
        'email'=>$faker->email,
        'motivo_contatos_id'=>$faker->numberBetween(1,4),
        'mensagem'=>$faker->text(150),
    ];
});
