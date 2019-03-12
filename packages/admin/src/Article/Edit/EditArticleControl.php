<?php declare(strict_types = 1);

namespace Modette\Journalist\Admin\Article\Edit;

use Modette\Journalist\Admin\Article\Form\ArticleFormControl;
use Modette\Journalist\Core\Article\Article;
use Modette\Journalist\Core\Article\Update\UpdateArticleAccessor;
use Modette\UI\Forms\FormFactory;
use Nette\Application\UI\Form;

/**
 * @method onSuccess(Article $article): void
 */
class EditArticleControl extends ArticleFormControl
{

	/** @var array<callable(Article $article): void> */
	public $onSuccess = [];

	/** @var Article */
	private $article;

	/** @var UpdateArticleAccessor */
	private $updateArticleAccessor;

	public function __construct(Article $article, FormFactory $formFactory, UpdateArticleAccessor $updateArticleAccessor)
	{
		parent::__construct($formFactory);
		$this->article = $article;
		$this->updateArticleAccessor = $updateArticleAccessor;
	}

	public function createComponentForm(): Form
	{
		$form = $this->createForm();

		$form->setDefaults([
			'title' => $this->article->title,
		]);

		$form->onSuccess[] = function (Form $form): void {
			$this->processForm($form);
		};

		return $form;
	}

	private function processForm(Form $form): void
	{
		$values = $form->getValues();

		$this->article->title = $values->title;
		$this->article->perex = $values->perex;
		$this->article->content = $values->content;

		$this->updateArticleAccessor->get()->update($this->article);
		$this->onSuccess($this->article);
	}

}