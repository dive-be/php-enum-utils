<?php declare(strict_types=1);

namespace Tests;

use BadMethodCallException;
use TypeError;

test('comparisons', function () {
    $role = Role::Administrator;

    expect($role->equals('admin'))->toBeTrue();
    expect($role->equals(Role::Administrator))->toBeTrue();

    expect($role->equals('mod'))->toBeFalse();
    expect($role->equals(Role::Moderator))->toBeFalse();

    expect(fn () => $role->equals(1))->toThrow(TypeError::class);
});

test('array listing', function () {
    expect(Role::toArray())->toBe(['Administrator' => 'admin', 'Auditor' => 'audit', 'Moderator' => 'mod']);
});

test('name listing', function () {
    expect(Role::toNames())->toBe(['Administrator', 'Auditor', 'Moderator']);
});

test('value listing', function () {
   expect(Role::toValues())->toBe(['admin', 'audit', 'mod']);
});

test('assertions', function () {
    $role = Role::Moderator;

    expect($role->isModerator())->toBeTrue();
    expect($role->isAuditor())->toBeFalse();
    expect($role->isAdministrator())->toBeFalse();

    expect(fn () => $role->isRickAstley())->toThrow(BadMethodCallException::class);
    expect(fn () => $role->rickRolled())->toThrow(BadMethodCallException::class);
    expect(fn () => $role->isAdmin())->toThrow(BadMethodCallException::class);
    expect(fn () => $role->isAudit())->toThrow(BadMethodCallException::class);
    expect(fn () => $role->isMod())->toThrow(BadMethodCallException::class);
    expect(fn () => $role->isadministrator())->toThrow(BadMethodCallException::class);
});
