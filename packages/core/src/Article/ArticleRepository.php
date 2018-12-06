<?php declare(strict_types = 1);

namespace Modette\Journalist\Core\Article;

use Modette\Journalist\Core\Article\Mapper\ArticleMapper;
use Nextras\Orm\Repository\IDependencyProvider;
use Nextras\Orm\Repository\Repository;

class ArticleRepository extends Repository
{

	public static function getEntityClassNames(): array
	{
		return [
			Article::class,
		];
	}

	public function __construct(ArticleMapper $mapper, IDependencyProvider $dependencyProvider = null)
	{
		parent::__construct($mapper, $dependencyProvider);
	}

}