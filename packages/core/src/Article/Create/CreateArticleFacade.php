<?php declare(strict_types = 1);

namespace Modette\Journalist\Core\Article\Create;

use Modette\Journalist\Core\Article\Article;
use Modette\Journalist\Core\Article\ArticleRepository;
use Modette\Orm\Facade\CreateEntityFacade;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class CreateArticleFacade extends CreateEntityFacade
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
		$this->check($article);
		$this->articleRepository->persistAndFlush($article);
		$this->eventDispatcher->dispatch(CreateArticleEvent::NAME, new CreateArticleEvent($article));
	}

	/**
	 * @param Article[] $articles
	 */
	public function createMultiple(array $articles): void
	{
		foreach ($articles as $article) {
			$this->check($article);
			$this->articleRepository->persist($article);
		}

		$this->articleRepository->flush();

		//TODO - event with all articles
		foreach ($articles as $article) {
			$this->eventDispatcher->dispatch(CreateArticleEvent::NAME, new CreateArticleEvent($article));
		}
	}

}