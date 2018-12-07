<?php declare(strict_types = 1);

namespace Modette\Journalist\Admin\Article\Edit;

use Modette\Journalist\Core\Article\Article;

interface EditArticleFactory
{

	public function create(Article $article): EditArticleControl;

}
