<?php
namespace GDO\Geo2City\install;

use GDO\Core\Website;
use GDO\Country\GDO_Country;
use GDO\Geo2City\GDO_City;
use GDO\Geo2City\Module_Geo2City;
use GDO\Util\FileUtil;

final class Installer
{

	public static function onInstall(): void
	{
		$module = Module_Geo2City::instance();
		$src = $module->filePath('install/data/allCountries.zip');
		$dst = $module->tempPath('data/');
		FileUtil::createDir($dst);

		Website::message('Geo2City', 'msg_extracting', [$src, $dst]);
		system("unzip '$src' -d $dst");

		$path = $dst . 'allCountries.txt';
		Website::message('Geo2City', 'msg_installing', [$path]);
		self::installB($path);

		Website::message('Geo2City', 'msg_cleanup', [$dst]);
		FileUtil::removeDir($dst);
	}


	private static function installB(string $path): bool
	{
		$datachunk = [];
		$fields = GDO_City::table()->gdoColumnsCache();
		if ($fh = fopen($path, 'r'))
		{
			while ($line = fgets($fh))
			{
				$data = explode("\t", $line);

				$datachunk[] = [
					'city_id' => $data[0],
					'city_name' => $data[1],
					'city_geo_lat' => $data[4],
					'city_geo_lng' => $data[5],
					'city_country' => GDO_Country::getById($data[8]),
					'city_population' => $data[14],
				];
				if (count($datachunk) > 250)
				{
					self::installChunk($fields, $datachunk);
				}
			}
			self::installChunk($fields, $datachunk);
			return fclose($fh);
		}
		return true;
	}

	private static function installChunk(array $fields, array $datachunk)
	{

	}


}
