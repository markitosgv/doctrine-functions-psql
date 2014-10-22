<?php

namespace Gesdinet\Tests;

class DateTest extends DQLFunctionTest
{
    const FAKE_ENTITY = 'Gesdinet\Tests\Fixtures\Entity\Fake';

    /**
     * Test that Doctrine able to parse DQL without exceptions
     *
     * @dataProvider partsProvider
     */
    public function testDateParts($function, $sql)
    {

        $query = $this->em->createQuery(
            sprintf("SELECT %s(s0_.somedate) FROM %s as s0_", strtoupper($function), self::FAKE_ENTITY)
        );

        $this->assertEquals(
            $query->getSQL(),
            sprintf("SELECT %ss0_.somedate) AS sclr0 FROM some_fake s0_", strtoupper($sql))
        );
    }

    /**
     * Data provider
     * @codeCoverageIgnore
     */
    public function partsProvider()
    {
        return [
            ['month', 'extract(month from '],
            ['dayofmonth', 'extract(day from '],
            ['dayofweek', 'extract(dow from '],
            ['dayofyear', 'extract(doy from '],
            ['quarter', 'extract(quarter from '],
            ['week', 'extract(week from '],
            ['year', 'extract(year from '],
            ['minute', 'extract(minute from '],
            ['hour', 'extract(hour from '],
            ['second', 'extract(second from ']
        ];
    }

}
