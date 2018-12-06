<?php declare(strict_types = 1);

namespace Modette\Journalist\Admin\Article\Edit;

interface EditArticleFactory
{

	public function create(): EditArticleControl;

}
