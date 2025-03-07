<?php

declare(strict_types=1);
/*
 * This file is part of the Yasumi package.
 *
 * Copyright (c) 2015 - 2023 AzuyaLabs
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Sacha Telgenhof <me at sachatelgenhof dot com>
 */

namespace Yasumi\tests\USA;

use Yasumi\Holiday;
use Yasumi\tests\HolidayTestCase;

/**
 * Class to test Memorial Day.
 */
class MemorialDayTest extends USABaseTestCase implements HolidayTestCase
{
    /**
     * The name of the holiday.
     */
    public const HOLIDAY = 'memorialDay';

    /**
     * The year in which the holiday was first established.
     */
    public const ESTABLISHMENT_YEAR = 1865;

    /**
     * Tests Memorial Day on or after 1968. Memorial Day was established since 1865 on May 30 and was changed in 1968
     * to the last Monday in May.
     *
     * @throws \Exception
     */
    public function testMemorialDayOnAfter1968(): void
    {
        $year = $this->generateRandomYear(1968);
        $this->assertHoliday(
            self::REGION,
            self::HOLIDAY,
            $year,
            new \DateTime("last monday of may $year", new \DateTimeZone(self::TIMEZONE))
        );
    }

    /**
     * Tests Memorial Day between 1865 and 1967. Memorial Day was established since 1865 on May 30 and was changed in
     * 1968 to the last Monday in May.
     *
     * @throws \Exception
     */
    public function testMemorialDayBetween1865And1967(): void
    {
        $year = $this->generateRandomYear(self::ESTABLISHMENT_YEAR, 1967);
        $this->assertHoliday(
            self::REGION,
            self::HOLIDAY,
            $year,
            new \DateTime("$year-5-30", new \DateTimeZone(self::TIMEZONE))
        );
    }

    /**
     * Tests Memorial Day before 1865. Memorial Day was established since 1865 on May 30 and was changed in 1968 to the
     * last Monday in May.
     *
     * @throws \Exception
     */
    public function testMemorialDayBefore1865(): void
    {
        $this->assertNotHoliday(
            self::REGION,
            self::HOLIDAY,
            $this->generateRandomYear(1000, self::ESTABLISHMENT_YEAR - 1)
        );
    }

    /**
     * Tests translated name of the holiday defined in this test.
     *
     * @throws \Exception
     */
    public function testTranslation(): void
    {
        $this->assertTranslatedHolidayName(
            self::REGION,
            self::HOLIDAY,
            $this->generateRandomYear(self::ESTABLISHMENT_YEAR),
            [self::LOCALE => 'Memorial Day']
        );
    }

    /**
     * Tests type of the holiday defined in this test.
     *
     * @throws \Exception
     */
    public function testHolidayType(): void
    {
        $this->assertHolidayType(
            self::REGION,
            self::HOLIDAY,
            $this->generateRandomYear(self::ESTABLISHMENT_YEAR),
            Holiday::TYPE_OFFICIAL
        );
    }
}
