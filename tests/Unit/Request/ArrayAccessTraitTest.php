<?php

namespace AlibabaCloud\Client\Tests\Unit\Request;

use PHPUnit\Framework\TestCase;
use AlibabaCloud\Client\Exception\ClientException;
use AlibabaCloud\Client\Tests\Mock\Services\Rds\DeleteDatabaseRequest;

/**
 * Class ArrayAccessTraitTest
 *
 * @package   AlibabaCloud\Client\Tests\Unit\Request
 *
 * @coversDefaultClass \AlibabaCloud\Client\Traits\ArrayAccessTrait
 */
class ArrayAccessTraitTest extends TestCase
{
    /**
     * @throws ClientException
     */
    public function testArrayAccess()
    {
        // Setup
        $request = new DeleteDatabaseRequest();

        self::assertFalse(isset($request->object));
        $request->object = 'object';
        self::assertTrue(isset($request->object));
        self::assertEquals('object', $request->object);

        self::assertFalse(isset($request['array']));
        $request['array'] = 'array';
        self::assertTrue(isset($request['array']));
        self::assertEquals('array', $request['array']);

        self::assertEquals(null, $request['not_exists']);

        unset($request['array']);
        self::assertFalse(isset($request['array']));
    }
}
