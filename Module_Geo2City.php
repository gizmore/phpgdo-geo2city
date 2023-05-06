<?php
declare(strict_types=1);

namespace GDO\Geo2City;

use GDO\Core\GDO_Module;
use GDO\Geo2City\install\Installer;

/**
 * Geoposition city lookup module.
 * @version 7.0.3
 */
class Module_Geo2City extends GDO_Module
{

	public string $license = 'CC-4.0-A';


	public function onInstall(): void
	{
		Installer::onInstall();
	}

	public function onLoadLanguage(): void
	{
		$this->loadLanguage('lang/geo2city');
	}


	public function getDependencies(): array
	{
		return [
			'Geo2Country',
			'ZIP',
		];
	}

	public function getClasses(): array
	{
		return [
			GDO_City::class,
		];
	}

}
