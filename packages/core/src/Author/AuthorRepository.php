<?php declare(strict_types = 1);

namespace Modette\Journalist\Core\Author;

use Modette\Journalist\Core\Author\Mapper\AuthorMapper;
use Nextras\Orm\Repository\IDependencyProvider;
use Nextras\Orm\Repository\Repository;

class AuthorRepository extends Repository
{

	public static function getEntityClassNames(): array
	{
		return [
			Author::class,
		];
	}

	public function __construct(AuthorMapper $mapper, IDependencyProvider $dependencyProvider = null)
	{
		parent::__construct($mapper, $dependencyProvider);
	}

}