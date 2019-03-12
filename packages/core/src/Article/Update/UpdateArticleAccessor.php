<?php declare(strict_types = 1);

namespace Modette\Journalist\Core\Article\Update;

interface UpdateArticleAccessor
{

	public function get(): UpdateArticleFacade;

}