<?php

declare(strict_types=1);

/*
 * This file is part of the Yasumi package.
 *
 * Copyright (c) 2015 - 2022 AzuyaLabs
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Sacha Telgenhof <me@sachatelgenhof.com>
 */

namespace Yasumi\tests\Estonia;

use PHPUnit\Framework\TestCase;
use Yasumi\tests\YasumiBase;

/**
 * Base class for test cases of the Estonia holiday provider.
 *
 * @author Gedas Lukošius <gedas@lukosius.me>
 */
abstract class EstoniaBaseTestCase extends TestCase
{
    use YasumiBase;

    /**
     * Name of the country to be tested.
     */
    public const REGION = 'Estonia';

    /**
     * Timezone in which this provider has holidays defined.
     */
    public const TIMEZONE = 'Europe/Tallinn';

    /**
     * Locale that is considered common for this provider.
     */
    public const LOCALE = 'et_EE';
}
