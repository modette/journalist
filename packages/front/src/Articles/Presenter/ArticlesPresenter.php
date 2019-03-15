<?php declare(strict_types = 1);

namespace Modette\Journalist\Front\Articles\Presenter;

use Modette\Front\Base\Presenter\BaseFrontPresenter;
use Modette\Journalist\Front\Articles\Grid\ArticleGridControl;
use Modette\Journalist\Front\Articles\Grid\ArticleGridFactory;

class ArticlesPresenter extends BaseFrontPresenter
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

	public function renderDefault(): void
	{
		if (!$this->developmentServer) {
			$this['document-head-meta']->setRobots(['noindex', 'follow']);
		}
	}

	protected function createComponentGrid(): ArticleGridControl
	{
		return $this->articleGridFactory->create();
	}

}