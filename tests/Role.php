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

    private const string ADMINISTRATOR = 'admin';
    private const string AUDITOR = 'audit';
    private const string MODERATOR = 'mod';

    case Administrator = self::ADMINISTRATOR;
    case Auditor = self::AUDITOR;
    case Moderator = self::MODERATOR;
}
