<?php declare(strict_types = 1);

namespace Modette\Journalist\Core\Article\Create;

use Modette\Core\Exception\Logic\InvalidStateException;
use Modette\Journalist\Core\Article\Article;
use Modette\Journalist\Core\Article\ArticleRepository;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class CreateArticleFacade
{

	/** @var ArticleRepository */
	private $articleRepository;

	/** @var EventDispatcherInterface */
	private $eventDispatcher;

	public function __construct(ArticleRepository $articleRepository, EventDispatcherInterface $eventDispatcher)
	{
		$this->articleRepository = $articleRepository;
		$this->eventDispatcher = $eventDispatcher;
	}

	public function create(Article $article): void
	{
		if ($article->isPersisted()) {
			throw new InvalidStateException(sprintf('Entity of type "%s" is already persisted. Use update facade to update entity.', Article::class));
		}

		$this->articleRepository->persistAndFlush($article);
		$this->eventDispatcher->dispatch(CreateArticleEvent::NAME, new CreateArticleEvent($article));
	}

}