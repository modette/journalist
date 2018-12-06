<?php declare(strict_types = 1);

namespace Modette\Journalist\Admin\Article\Presenter;

use Modette\Admin\Presenters\Admin\BaseAdminPresenter;

class ArticlePresenter extends BaseAdminPresenter
{

	public function actionView(string $id): void
	{
		// /admin/blog/article/{id}
	}

	public function actionCreate(): void
	{
		// /admin/blog/article/create
	}

	public function actionEdit(string $id): void
	{
		// /admin/blog/article/edit{id}
	}

	public function actionList(int $page = 1): void
	{
		// /admin/blog/article/list
	}

}