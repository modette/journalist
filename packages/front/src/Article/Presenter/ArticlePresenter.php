<?php declare(strict_types = 1);

namespace Modette\Journalist\Front\Article\Presenter;

use Modette\Front\Base\Presenter\BaseFrontPresenter;
use Modette\Journalist\Core\Article\Article;
use Modette\Journalist\Core\Article\ArticleRepository;
use Modette\Journalist\Front\Article\Grid\ArticleGridFactory;
use Modette\Journalist\Front\Article\View\ArticleViewFactory;
use Nette\Application\BadRequestException;

class ArticlePresenter extends BaseFrontPresenter
{

	/** @var ArticleRepository */
	private $articleRepository;

	/** @var ArticleViewFactory */
	private $articleViewFactory;

	/** @var ArticleGridFactory */
	private $articleGridFactory;

	public function __construct(
		ArticleRepository $articleRepository,
		ArticleViewFactory $articleViewFactory,
		ArticleGridFactory $articleGridFactory
	)
	{
		parent::__construct();
		$this->articleRepository = $articleRepository;
		$this->articleViewFactory = $articleViewFactory;
		$this->articleGridFactory = $articleGridFactory;
	}

	/**
	 * @todo - tady by se měl načítat spíš pomocí url article (url vychází z názvu)
	 */
	private function loadArticle(string $id): Article
	{
		$article = $this->articleRepository->getById($id);

		if ($article === null) {
			throw new BadRequestException();
		}

		return $article;
	}

	public function actionView(string $id): void
	{
		$this['articleView'] = $this->articleViewFactory->create($this->loadArticle($id));
	}

	public function actionList(int $page = 1): void
	{
		$this['articleGrid'] = $this->articleGridFactory->create();
	}

}