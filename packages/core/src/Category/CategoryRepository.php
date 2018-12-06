<?php declare(strict_types = 1);

namespace Modette\Journalist\Core\Category;

use Modette\Journalist\Core\Category\Mapper\CategoryMapper;
use Nextras\Orm\Repository\IDependencyProvider;
use Nextras\Orm\Repository\Repository;

class CategoryRepository extends Repository
{

	public static function getEntityClassNames(): array
	{
		return [
			Category::class,
		];
	}

	public function __construct(CategoryMapper $mapper, IDependencyProvider $dependencyProvider = null)
	{
		parent::__construct($mapper, $dependencyProvider);
	}

}