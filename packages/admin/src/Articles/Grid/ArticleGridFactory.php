<?php declare(strict_types = 1);

namespace Modette\Journalist\Admin\Articles\Grid;

interface ArticleGridFactory
{

	public function create(): ArticleGridControl;

}
