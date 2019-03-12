<?php declare(strict_types = 1);

namespace Modette\Journalist\Admin\Articles\Grid;

use Modette\UI\Base\Control\BaseControl;

class ArticleGridControl extends BaseControl
{

	protected function createComponentGrid(): void
	{
		//TODO - create datagrid
	}

	public function render(): void
	{
		$this->template->setFile(__DIR__ . '/templates/default.latte');
		$this->template->render();
	}

}