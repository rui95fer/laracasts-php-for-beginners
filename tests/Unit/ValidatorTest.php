<?php

use Core\Validator;

test('it validates strings', function () {
    expect(Validator::string('foobar'))->toBeTrue();
    expect(Validator::string(false))->toBeFalse();
    expect(Validator::string(''))->toBeFalse();
    expect(Validator::string('foobar', 20))->toBeFalse();
    expect(Validator::string('foo', 3))->toBeTrue();
    expect(Validator::string('foo', 4))->toBeFalse();
});

test('it validates email addresses', function () {
    expect(Validator::email('foobar'))->toBeFalse();
    expect(Validator::email('learner@example.com'))->toBeTrue();
});

test('it checks whether a value is greater than an amount', function () {
    expect(Validator::greaterThan(10, 1))->toBeTrue();
    expect(Validator::greaterThan(10, 100))->toBeFalse();
    expect(Validator::greaterThan(10, 10))->toBeFalse();
});
