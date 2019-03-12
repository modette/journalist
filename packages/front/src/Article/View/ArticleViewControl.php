<?php declare(strict_types = 1);

namespace Modette\Journalist\Front\Article\View;

use Modette\Journalist\Core\Article\Article;
use Modette\UI\Base\Control\BaseControl;

/**
 * @property ArticleTemplate $template
 */
class ArticleViewControl extends BaseControl
{

	/** @var Article */
	private $article;

	public function __construct(Article $article)
	{
		parent::__construct();
		$this->article = $article;
	}

	public function render(): void
	{
		$this->template->article = $this->article;

		$this->template->setFile(__DIR__ . '/templates/default.latte');
		$this->template->render();
	}

}