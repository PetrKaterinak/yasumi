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

namespace Yasumi\tests\Lithuania;

use Yasumi\Holiday;
use Yasumi\tests\HolidayTestCase;

/**
 * Class containing tests for International Workers' Day in Lithuania.
 *
 * @author Gedas Lukošius <gedas@lukosius.me>
 */
class InternationalWorkersDayTest extends LithuaniaBaseTestCase implements HolidayTestCase
{
    /**
     * The name of the holiday to be tested.
     */
    public const HOLIDAY = 'internationalWorkersDay';

    /**
     * @return array<array> list of test dates for the holiday defined in this test
     *
     * @throws \Exception
     */
    public function holidayDataProvider(): array
    {
        return $this->generateRandomDates(5, 1, self::TIMEZONE);
    }

    /**
     * @dataProvider holidayDataProvider
     */
    public function testHoliday(int $year, \DateTimeInterface $expected): void
    {
        $this->assertHoliday(self::REGION, self::HOLIDAY, $year, $expected);
    }

    /**
     * @throws \Exception
     */
    public function testTranslation(): void
    {
        $this->assertTranslatedHolidayName(
            self::REGION,
            self::HOLIDAY,
            $this->generateRandomYear(),
            [self::LOCALE => 'Tarptautinė darbo diena']
        );
    }

    /**
     * @throws \Exception
     */
    public function testHolidayType(): void
    {
        $this->assertHolidayType(self::REGION, self::HOLIDAY, $this->generateRandomYear(), Holiday::TYPE_OFFICIAL);
    }
}
