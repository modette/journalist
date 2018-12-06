<?php declare(strict_types = 1);

namespace Modette\Journalist\Core\Tag;

use Nextras\Orm\Repository\Repository;

class TagRepository extends Repository
{

	public static function getEntityClassNames(): array
	{
		return [
			Tag::class,
		];
	}

}