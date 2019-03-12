<?php declare(strict_types = 1);

namespace Modette\Journalist\Core\Article\Event;

use Modette\Journalist\Core\Article\Article;
use Symfony\Component\EventDispatcher\Event;

abstract class ArticlePersistEvent extends Event
{

	/** @var Article */
	private $article;

	public function __construct(Article $article)
	{
		$this->article = $article;
	}

	public function getArticle(): Article
	{
		return $this->article;
	}

}