<?php declare(strict_types = 1);

namespace Modette\Journalist\Admin\Article\View;

interface ArticleViewFactory
{

	public function create(): ArticleViewControl;

}
