<?php

use Core\Container;

test('it resolves a callable binding', function () {
    // Arrange
    $container = new Container();
    $container->bind('foo', fn () => 'bar');

    // Act
    $result = $container->resolve('foo');

    // Assert
    expect($result)->toBe('bar');
});

test('it throws when resolving an unknown binding', function () {
    // Arrange
    $container = new Container();

    // Act: Pest invokes this callback during the exception assertion.
    $resolveMissingBinding = fn () => $container->resolve('foo');

    // Assert
    expect($resolveMissingBinding)
        ->toThrow(Exception::class, 'No binding found for foo');
});
