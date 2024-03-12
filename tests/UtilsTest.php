<?php declare(strict_types=1);

namespace Tests;

use BadMethodCallException;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use TypeError;

final class UtilsTest extends TestCase
{
    #[Test]
    public function comparisons(): void
    {
        $role = Role::Administrator;

        // equalsAny
        $this->assertTrue($role->equalsAny(['admin']));
        $this->assertTrue($role->equalsAny([Role::Administrator]));
        $this->assertTrue($role->equalsAny(['admin', 'audit', 'mod']));
        $this->assertTrue($role->equalsAny([Role::Administrator, Role::Auditor]));
        $this->assertTrue($role->equalsAny([Role::Administrator, 'audit']));
        $this->assertFalse($role->equalsAny([Role::Moderator, 'audit']));

        // equals
        $this->assertTrue($role->equals('admin'));
        $this->assertTrue($role->equals(Role::Administrator));

        $this->assertFalse($role->equals('mod'));
        $this->assertFalse($role->equals(Role::Moderator));

        $this->expectException(TypeError::class);
        $role->equals(1);
    }

    #[Test]
    public function array_listing(): void
    {
        $this->assertSame([
            'Administrator' => 'admin',
            'Auditor' => 'audit',
            'Moderator' => 'mod',
        ], Role::toArray());
    }

    #[Test]
    public function name_listing(): void
    {
        $this->assertSame([
            'Administrator',
            'Auditor',
            'Moderator',
        ], Role::toNames());
    }

    #[Test]
    public function value_listing(): void
    {
        $this->assertSame([
            'admin',
            'audit',
            'mod',
        ], Role::toValues());
    }

    #[Test]
    public function assertions(): void
    {
        $role = Role::Moderator;

        $this->assertTrue($role->isModerator());
        $this->assertFalse($role->isAuditor());
        $this->assertFalse($role->isAdministrator());

        $this->expectException(BadMethodCallException::class);
        $role->isAdmin();
    }
}
