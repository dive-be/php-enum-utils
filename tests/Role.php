<?php declare(strict_types=1);

namespace Tests;

use Dive\Enum\WithUtilities;

/**
 * @method bool isAdministrator()
 * @method bool isAuditor()
 * @method bool isModerator()
 */
enum Role: string
{
    use WithUtilities;

    private const ADMINISTRATOR = 'admin';
    private const AUDITOR = 'audit';
    private const MODERATOR = 'mod';

    case Administrator = self::ADMINISTRATOR;
    case Auditor = self::AUDITOR;
    case Moderator = self::MODERATOR;
}
