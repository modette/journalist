<?php declare(strict_types = 1);

namespace Modette\Journalist\Front\Articles\Grid;

interface ArticleGridFactory
{

	public function create(): ArticleGridControl;

}
