<?php declare(strict_types = 1);

namespace Modette\Journalist\Admin\Article\View;

use Modette\Journalist\Core\Article\Article;

interface ArticleViewFactory
{

	public function create(Article $article): ArticleViewControl;

}
