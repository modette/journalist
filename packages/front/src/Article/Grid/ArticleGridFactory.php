<?php declare(strict_types = 1);

namespace Modette\Journalist\Front\Article\Grid;

interface ArticleGridFactory
{

	public function create(): ArticleGridControl;

}
