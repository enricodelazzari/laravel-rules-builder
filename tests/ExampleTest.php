<?php

use Maize\RulesBuilder\Builder;

it('can add rules from string', function () {
    $rules = Builder::new()
        ->add('title', 'required|string|max:20')
        ->get();

    expect($rules)->toBe([
        'title' => 'required|string|max:20',
    ]);
});

it('can add rules from array', function () {
    $rules = Builder::new()
        ->add('title', ['required', 'string', 'max:20'])
        ->get();

    expect($rules)->toBe([
        'title' => ['required', 'string', 'max:20'],
    ]);
});

it('can add multiple rules', function () {
    $rules = Builder::new()
        ->add('title', 'required|string|max:20')
        ->add('description', ['required', 'string', 'max:1000'])
        ->get();

    expect($rules)->toBe([
        'title' => 'required|string|max:20',
        'description' => ['required', 'string', 'max:1000'],
    ]);
});

it('can add rules for multiple attributes', function () {
    $rules = Builder::new()
        ->add(['title', 'description'], 'required|string')
        ->get();

    expect($rules)->toBe([
        'title' => 'required|string',
        'description' => 'required|string',
    ]);
});

it('can add rules from string for multiple attributes using an associative array', function () {
    $rules = Builder::new()
        ->add([
            'title' => 'max:20',
            'description' => 'max:1000',
        ], fn ($rule) => "required|string|{$rule}")
        ->get();

    expect($rules)->toBe([
        'title' => 'required|string|max:20',
        'description' => 'required|string|max:1000',
    ]);
});

it('can add rules from array for multiple attributes using an associative array', function () {
    $rules = Builder::new()
        ->add([
            'title' => 'max:20',
            'description' => 'max:1000',
        ], fn ($rule) => [
            'required',
            'string',
            $rule,
        ])
        ->get();

    expect($rules)->toBe([
        'title' => ['required', 'string', 'max:20'],
        'description' => ['required', 'string', 'max:1000'],
    ]);
});
