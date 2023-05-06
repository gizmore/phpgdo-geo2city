# phpgdo-geo2city

GDOv7 module for mapping geocoordinates to cities.
Depends on phpgdo-country-coordinates for a rough country lookup,
then queries it's database for the more exact city.

You have to download the file `allCountries.zip`,
from [geonames.org](http://download.geonames.org/export/dump/),
and put it into the install/ directory of this module,
prior to running the installation.


## phpgdo-geo2city: Dependencies

This module depends on
[ZIP](https://github.com/gizmore/phpgdo-zip),
[Maps](https://github.com/gizmore/phpgdo-maps),
[Country](https://github.com/gizmore/phpgdo-country) and
[CountryCoordinates](https://github.com/gizmore/phpgdo-country-coordinates).


## phpgdo-geo2city: [License](./LICENSE)

As the main data dump is not my property,
i release this module under the "Creative Commons Attribution 4.0 License".

[License](./LICENSE)
