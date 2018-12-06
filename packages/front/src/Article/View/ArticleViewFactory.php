<?php declare(strict_types = 1);

namespace Modette\Journalist\Front\Article\View;

interface ArticleViewFactory
{

	public function create(): ArticleViewControl;

}
