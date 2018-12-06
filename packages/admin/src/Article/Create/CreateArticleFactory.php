<?php declare(strict_types = 1);

namespace Modette\Journalist\Admin\Article\Create;

interface CreateArticleFactory
{

	public function create(): CreateArticleControl;

}
