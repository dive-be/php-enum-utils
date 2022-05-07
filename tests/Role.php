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

    case Administrator = 'admin';
    case Auditor = 'audit';
    case Moderator = 'mod';
}
