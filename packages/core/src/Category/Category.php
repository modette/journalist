<?php declare(strict_types = 1);

namespace Modette\Journalist\Core\Category;

use Modette\Journalist\Core\Article\Article;
use Modette\Orm\Property\CreatedAt;
use Modette\Orm\Property\PrimaryUUID;
use Modette\Orm\Property\UpdatedAt;
use Nextras\Orm\Entity\Entity;
use Nextras\Orm\Relationships\OneHasMany;

/**
 * @property-read string                $name
 * @property-read Category|null         $parent      {m:1 Category::$categories}
 * @property      Category[]|OneHasMany $categories  {1:m Category::$parent}
 * @property      Article[]|OneHasMany  $articles    {1:m Article::$category}
 */
class Category extends Entity
{

	use PrimaryUUID;
	use CreatedAt;
	use UpdatedAt;

	public function __construct(string $name, ?Category $parent = null)
	{
		parent::__construct();
		$this->setReadOnlyValue('name', $name);
		$this->setReadOnlyValue('parent', $parent);
	}

}