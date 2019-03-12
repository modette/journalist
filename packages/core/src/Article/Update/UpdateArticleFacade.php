<?php declare(strict_types = 1);

namespace Modette\Journalist\Core\Article\Update;

use Modette\Journalist\Core\Article\Article;
use Modette\Journalist\Core\Article\ArticleRepository;
use Modette\Orm\Facade\UpdateEntityFacade;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class UpdateArticleFacade extends UpdateEntityFacade
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
		$this->check($article);
		$this->articleRepository->flush();
		$this->eventDispatcher->dispatch(UpdateArticleEvent::NAME, new UpdateArticleEvent($article));
	}

	/**
	 * @param Article[] $articles
	 */
	public function updateMultiple(array $articles): void
	{
		foreach ($articles as $article) {
			$this->check($article);
		}

		$this->articleRepository->flush();

		//TODO - event with all articles
		foreach ($articles as $article) {
			$this->eventDispatcher->dispatch(UpdateArticleEvent::NAME, new UpdateArticleEvent($article));
		}
	}

}