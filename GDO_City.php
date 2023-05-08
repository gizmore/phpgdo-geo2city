<?php

namespace GDO\Geo2City;

use GDO\Core\GDO;
use GDO\Core\GDT_Char;
use GDO\Core\GDT_Object;
use GDO\Core\GDT_String;
use GDO\Core\GDT_UInt;
use GDO\Country\GDT_Country;
use GDO\CountryCoordinates\Module_CountryCoordinates;
use GDO\Maps\GDT_Position;

class GDO_City extends GDO
{

	public function gdoColumns(): array
	{
		return [
			GDT_UInt::make('city_id')->primary(),
			GDT_String::make('city_name')->notNull(),
			GDT_Position::make('city_geo')->notNull(),
			GDT_Country::make('city_country'),
			GDT_UInt::make('city_population')->bytes(8),
		];
	}

	public static function byGeo(float $lat, float $lng): self
	{
	}

}
