<?php declare(strict_types = 1);

namespace Modette\Journalist\Admin\Article\Grid;

use Modette\UI\Base\Control\BaseControl;

class ArticleGridControl extends BaseControl
{

	public function render(): void
	{
		$this->template->setFile(__DIR__ . '/templates/default.latte');
		$this->template->render();
	}

}