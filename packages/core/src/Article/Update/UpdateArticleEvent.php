<?php declare(strict_types = 1);

namespace Modette\Journalist\Core\Article\Update;

use Modette\Journalist\Core\Article\Event\ArticlePersistEvent;

class UpdateArticleEvent extends ArticlePersistEvent
{

	public const NAME = self::class;

}