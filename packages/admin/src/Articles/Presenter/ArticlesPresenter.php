<?php declare(strict_types = 1);

namespace Modette\Journalist\Admin\Articles\Presenter;

use Modette\Admin\Base\Presenter\BaseAdminPresenter;
use Modette\Journalist\Admin\Articles\Grid\ArticleGridControl;
use Modette\Journalist\Admin\Articles\Grid\ArticleGridFactory;

class ArticlesPresenter extends BaseAdminPresenter
{

	/** @var ArticleGridFactory */
	private $articleGridFactory;

	public function __construct(ArticleGridFactory $articleGridFactory)
	{
		parent::__construct();
		$this->articleGridFactory = $articleGridFactory;
	}

	public function actionDefault(): void
	{
	}

	protected function createComponentGrid(): ArticleGridControl
	{
		return $this->articleGridFactory->create();
	}

}