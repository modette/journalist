<?php declare(strict_types = 1);

namespace Modette\Journalist\Front\Article\View;

use Modette\Journalist\Core\Article\Article;
use Modette\UI\Base\Control\BaseControl;

class ArticleViewControl extends BaseControl
{

	/** @var Article */
	private $article;

	public function __construct(Article $article)
	{
		parent::__construct();
		$this->article = $article;
	}

}