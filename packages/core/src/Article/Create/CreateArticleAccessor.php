<?php declare(strict_types = 1);

namespace Modette\Journalist\Core\Article\Create;

interface CreateArticleAccessor
{

	public function get(): CreateArticleFacade;

}