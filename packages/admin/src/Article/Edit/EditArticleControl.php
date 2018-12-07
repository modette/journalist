<?php declare(strict_types = 1);

namespace Modette\Journalist\Admin\Article\Edit;

use Modette\Journalist\Admin\Article\Form\ArticleFormFactory;
use Modette\Journalist\Core\Article\Article;
use Modette\Journalist\Core\Article\ArticleRepository;
use Modette\UI\Base\Control\BaseControl;
use Nette\Application\UI\Form;

/**
 * @method onSuccess(Article $article): void
 */
class EditArticleControl extends BaseControl
{

	/** @var callable[] function(Article $article): void */
	public $onSuccess = [];

	/** @var Article */
	private $article;

	/** @var ArticleFormFactory */
	private $articleFormFactory;

	/** @var ArticleRepository */
	private $articleRepository;

	public function __construct(Article $article, ArticleFormFactory $articleFormFactory, ArticleRepository $articleRepository)
	{
		parent::__construct();
		$this->article = $article;
		$this->articleFormFactory = $articleFormFactory;
		$this->articleRepository = $articleRepository;
	}

	public function createComponentCreateArticleForm(): Form
	{
		$form = $this->articleFormFactory->createForm();

		$form->setDefaults([
			'title' => $this->article->title,
		]);

		$form->onSuccess[] = function (Form $form): void {
			$this->updateArticle($form);
		};

		return $form;
	}

	private function updateArticle(Form $form): void
	{
		//TODO - set into article entity values from form (mapper would be useful)
		$this->articleRepository->persistAndFlush($this->article);
		$this->onSuccess($this->article);
	}

	public function render(): void
	{
		$this->template->setFile(__DIR__ . '/templates/default.latte');
		$this->template->render();
	}

}