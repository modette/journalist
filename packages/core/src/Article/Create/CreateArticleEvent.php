<?php declare(strict_types = 1);

namespace Modette\Journalist\Core\Article\Create;

use Modette\Journalist\Core\Article\Event\ArticlePersistEvent;

class CreateArticleEvent extends ArticlePersistEvent
{

	public const NAME = self::class;

}