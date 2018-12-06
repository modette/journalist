<?php declare(strict_types = 1);

namespace Modette\Journalist\Core\Tag;

use Modette\Journalist\Core\Article\Article;
use Modette\Orm\Property\CreatedAt;
use Modette\Orm\Property\PrimaryUUID;
use Modette\Orm\Property\UpdatedAt;
use Nextras\Orm\Entity\Entity;
use Nextras\Orm\Relationships\ManyHasMany;

/**
 * @property-read string                $name
 * @property      Article[]|ManyHasMany $articles {m:m Article::$tags}
 */
class Tag extends Entity
{

	use PrimaryUUID;
	use CreatedAt;
	use UpdatedAt;

	public function __construct(string $name)
	{
		parent::__construct();
		$this->setReadOnlyValue('name', $name);
	}

}