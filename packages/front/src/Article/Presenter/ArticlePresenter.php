<?php declare(strict_types = 1);

namespace Modette\Journalist\Front\Article\Presenter;

use Modette\Front\Base\Presenter\BaseFrontPresenter;
use Modette\Journalist\Core\Article\Article;
use Modette\Journalist\Core\Article\ArticleRepository;
use Modette\Journalist\Front\Article\View\ArticleViewControl;
use Modette\Journalist\Front\Article\View\ArticleViewFactory;

class ArticlePresenter extends BaseFrontPresenter
{

	/** @var ArticleRepository */
	private $articleRepository;

	/** @var ArticleViewFactory */
	private $articleViewFactory;

	public function __construct(
		ArticleRepository $articleRepository,
		ArticleViewFactory $articleViewFactory
	)
	{
		parent::__construct();
		$this->articleRepository = $articleRepository;
		$this->articleViewFactory = $articleViewFactory;
	}

	public function actionDefault(string $id): void
	{
		$this->getArticle();
	}

	protected function createComponentView(): ArticleViewControl
	{
		return $this->articleViewFactory->create($this->getArticle());
	}

	private function getArticle(): Article
	{
		$id = $this->getParameter('id'); // TODO - use article url instead
		$article = $this->articleRepository->getById($id);

		if ($article === null) {
			$this->error('Article does not exists'); // TODO - article not found page
		}

		return $article;
	}

}