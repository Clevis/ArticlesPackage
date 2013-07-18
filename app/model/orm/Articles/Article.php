<?php

namespace Clevis\Articles;

use Orm;
use Clevis;
use DateTime;
use Clevis\Skeleton\Entity;


/**
 * Entity representing an article
 *
 * @property string $title
 * @property string $intro
 * @property string $text
 * @property DateTime $createdAt {default now}
 * @property bool $visible {default true}
 *
 * @property Clevis\Users\User $createdBy {m:1 Clevis\Users\UsersRepository $createdArticles}
 */
class Article extends Entity
{

	public static function getExtendingRelations()
	{
		return array(
			'Clevis\\Users\\User' => array(
				array('Orm\\OneToMany', 'createdArticles', '1:m', 'Clevis\\Articles\\ArticlesRepository', 'createdBy')
			)
		);
	}

}
