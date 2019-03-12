<?php declare(strict_types = 1);

namespace Modette\Journalist\Core\Article\Update;

use Modette\Core\Exception\Logic\InvalidStateException;
use Modette\Journalist\Core\Article\Article;
use Modette\Journalist\Core\Article\ArticleRepository;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class UpdateArticleFacade
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

	public function update(Article $article): void
	{
		if (!$article->isPersisted()) {
			throw new InvalidStateException(sprintf('Entity of type "%s" is not persisted yet. Use create facade to create entity.', Article::class));
		}

		$this->articleRepository->flush();
		$this->eventDispatcher->dispatch(UpdateArticleEvent::NAME, new UpdateArticleEvent($article));
	}

}