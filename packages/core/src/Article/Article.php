<?php declare(strict_types = 1);

namespace Modette\Journalist\Core\Article;

use Modette\Journalist\Core\Author\Author;
use Modette\Journalist\Core\Category\Category;
use Modette\Journalist\Core\Tag\Tag;
use Modette\Orm\Property\CreatedAt;
use Modette\Orm\Property\UUID;
use Modette\Orm\Property\UpdatedAt;
use Nextras\Dbal\Utils\DateTimeImmutable;
use Nextras\Orm\Entity\Entity;
use Nextras\Orm\Relationships\ManyHasMany;

/**
 * @property string            $title
 * @property string            $perex
 * @property string            $content
 * @property DateTimeImmutable $publishedAt
 * @property Author            $author      {m:1 Author::$articles}
 * @property Tag[]|ManyHasMany $tags        {m:m Tag, isMain = true}
 * @property Category          $category    {m:1 Category::$articles}
 *
 * @todo - změna url článku -> redirect ze staré na novou
 * @todo - history
 * @todo - publikace
 * @todo - stavy vytváření a ověření článku
 * @todo - verzování a zamykání
 */
class Article extends Entity
{

	use UUID;
	use CreatedAt;
	use UpdatedAt;

	public function __construct(string $title, string $perex, string $content, Author $author)
	{
		parent::__construct();
		$this->title = $title;
		$this->perex = $perex;
		$this->content = $content;
		$this->author = $author;
		$this->publishedAt = new DateTimeImmutable('now');
	}

}