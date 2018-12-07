<?php declare(strict_types = 1);

namespace Modette\Journalist\Admin\Article\Presenter;

use Modette\Admin\Base\Presenter\BaseAdminPresenter;
use Modette\Journalist\Admin\Article\Create\CreateArticleFactory;
use Modette\Journalist\Admin\Article\Edit\EditArticleFactory;
use Modette\Journalist\Admin\Article\Grid\ArticleGridFactory;
use Modette\Journalist\Admin\Article\View\ArticleViewFactory;
use Modette\Journalist\Core\Article\Article;
use Modette\Journalist\Core\Article\ArticleRepository;

class ArticlePresenter extends BaseAdminPresenter
{

	/** @var ArticleRepository */
	private $articleRepository;

	/** @var ArticleViewFactory */
	private $articleViewFactory;

	/** @var CreateArticleFactory */
	private $createArticleFactory;

	/** @var EditArticleFactory */
	private $editArticleFactory;

	/** @var ArticleGridFactory */
	private $articleGridFactory;

	public function __construct(
		ArticleRepository $articleRepository,
		ArticleViewFactory $articleViewFactory,
		CreateArticleFactory $createArticleFactory,
		EditArticleFactory $editArticleFactory,
		ArticleGridFactory $articleGridFactory
	)
	{
		parent::__construct();
		$this->articleRepository = $articleRepository;
		$this->articleViewFactory = $articleViewFactory;
		$this->createArticleFactory = $createArticleFactory;
		$this->editArticleFactory = $editArticleFactory;
		$this->articleGridFactory = $articleGridFactory;
	}

	private function loadArticle(string $id): Article
	{
		$article = $this->articleRepository->getById($id);

		if ($article === null) {
			$this->flashError('Article not found');
			$this->redirect('list');
		}

		return $article;
	}

	public function actionView(string $id): void
	{
		// /admin/blog/article/{id}
		$this['articleView'] = $this->articleViewFactory->create($this->loadArticle($id));
	}

	public function actionCreate(): void
	{
		// /admin/blog/article/create
		$this['createArticle'] = $this->createArticleFactory->create();

		$this['createArticle']->onSuccess[] = function (Article $article): void {
			$this->flashSuccess('Article saved');
			$this->redirect('view', [
				'id' => $article->id,
			]);
		};
	}

	public function actionEdit(string $id): void
	{
		// /admin/blog/article/edit/{id}
		$this['editArticle'] = $this->editArticleFactory->create($this->loadArticle($id));

		$this['editArticle']->onSuccess[] = function (Article $article): void {
			$this->flashSuccess('Article edited');
			$this->redirect('view', [
				'id' => $article->id,
			]);
		};
	}

	public function actionList(int $page = 1): void
	{
		// /admin/blog/article/list
		$this['articleGrid'] = $this->articleGridFactory->create();
	}

}