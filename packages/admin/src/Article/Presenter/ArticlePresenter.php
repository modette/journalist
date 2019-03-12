<?php declare(strict_types = 1);

namespace Modette\Journalist\Admin\Article\Presenter;

use Modette\Admin\Base\Presenter\BaseAdminPresenter;
use Modette\Journalist\Admin\Article\Create\CreateArticleControl;
use Modette\Journalist\Admin\Article\Create\CreateArticleFactory;
use Modette\Journalist\Admin\Article\Edit\EditArticleControl;
use Modette\Journalist\Admin\Article\Edit\EditArticleFactory;
use Modette\Journalist\Core\Article\Article;
use Modette\Journalist\Core\Article\ArticleRepository;

class ArticlePresenter extends BaseAdminPresenter
{

	/** @var ArticleRepository */
	private $articleRepository;

	/** @var CreateArticleFactory */
	private $createArticleFactory;

	/** @var EditArticleFactory */
	private $editArticleFactory;

	public function __construct(
		ArticleRepository $articleRepository,
		CreateArticleFactory $createArticleFactory,
		EditArticleFactory $editArticleFactory
	)
	{
		parent::__construct();
		$this->articleRepository = $articleRepository;
		$this->createArticleFactory = $createArticleFactory;
		$this->editArticleFactory = $editArticleFactory;
	}

	public function actionCreate(): void
	{
	}

	protected function createComponentCreate(): CreateArticleControl
	{
		$control = $this->createArticleFactory->create();

		$control->onSuccess[] = function (Article $article): void {
			$this->flashSuccess('Article saved');
			$this->redirect('view', [
				'id' => $article->id,
			]);
		};

		return $control;
	}

	public function actionEdit(string $id): void
	{
		$this->getArticle();
	}

	protected function createComponentEdit(): EditArticleControl
	{
		$control = $this->editArticleFactory->create($this->getArticle());

		$control->onSuccess[] = function (Article $article): void {
			$this->flashSuccess('Article edited');
			$this->redirect('view', [
				'id' => $article->id,
			]);
		};

		return $control;
	}

	private function getArticle(): Article
	{
		$id = $this->getParameter('id');
		$article = $this->articleRepository->getById($id);

		if ($article === null) {
			$this->flashError('Article not found');
			$this->redirect(':Modette:Journalist:Admin:Articles:');
		}

		return $article;
	}

}