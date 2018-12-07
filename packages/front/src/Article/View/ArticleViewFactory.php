<?php declare(strict_types = 1);

namespace Modette\Journalist\Front\Article\View;

use Modette\Journalist\Core\Article\Article;

interface ArticleViewFactory
{

	public function create(Article $article): ArticleViewControl;

}
