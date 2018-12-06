<?php declare(strict_types = 1);

namespace Modette\Journalist\Front\Article\Presenter;

use Modette\Front\Presenter\Front\BaseFrontPresenter;

class ArticlePresenter extends BaseFrontPresenter
{

	public function actionView(string $id): void
	{
		// /blog/article/{id}
	}

	public function actionList(int $page = 1): void
	{
		// /blog/article/list
	}

}