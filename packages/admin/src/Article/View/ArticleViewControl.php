<?php declare(strict_types = 1);

namespace Modette\Journalist\Admin\Article\View;

use Modette\Journalist\Core\Article\Article;
use Modette\UI\Base\Control\BaseControl;

class ArticleViewControl extends BaseControl
{

	public function __construct(Article $article)
	{
		parent::__construct();
	}

	public function render(): void
	{
		$this->template->setFile(__DIR__ . '/templates/default.latte');
		$this->template->render();
	}

}