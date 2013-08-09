<?php

namespace Clevis\Articles;

use Nette\Configurator;
use Nette\DI\Container;


/**
 * Registrátor balíčku
 */
class Package
{

	/**
	 * Registrace balíčku do konfigurátoru
	 *
	 * @param Configurator
	 */
	public static function register(Configurator $configurator)
	{
		// registrace konfigurace
		$configurator->addConfig(__DIR__ . '/config.neon', FALSE);

		/** @var Container $container */
		$configurator->onAfter[] = function (Container $container) {

			// registrace rout
			//$container->router[] = new Router;

			// registrace jmenného prostoru presenterů
			$container->getService('nette.presenterFactory')->registerNamespace(__NAMESPACE__);

			// registrace rozšiřujících vazeb na entity
			$container->getService('entityRelationsRegistry')
				->addRelation('Clevis\\Articles\\Article', 'Clevis\\Users\\User');
		};
	}

}
