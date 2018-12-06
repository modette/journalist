<?php declare(strict_types = 1);

namespace Modette\Journalist\Core\Author;

use Modette\Journalist\Core\Article\Article;
use Modette\Orm\Property\CreatedAt;
use Modette\Orm\Property\PrimaryUUID;
use Modette\Orm\Property\UpdatedAt;
use Nextras\Orm\Entity\Entity;
use Nextras\Orm\Relationships\OneHasMany;

/**
 * @property string               $description
 * @property-read Person          $person
 * @property Article[]|OneHasMany $articles    {1:m Article::$author}
 * @todo - person
 * @todo - optional description?
 */
class Author extends Entity
{

	use PrimaryUUID;
	use CreatedAt;
	use UpdatedAt;

	public function __construct(Person $person, string $description)
	{
		parent::__construct();
		$this->setReadOnlyValue('person', $person);
		$this->description = $description;
	}

}