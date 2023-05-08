<?php
declare(strict_types=1);
namespace GDO\Geo2City\Test;

use GDO\Geo2City\GDO_City;
use GDO\Tests\TestCase;

final class GeoCityTest extends TestCase
{

	public function testPeineLookup(): void
	{
		$city = GDO_City::getByGeoPos(52.315066076668074, 10.245814842318602);
	}

}
