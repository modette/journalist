<?php declare(strict_types = 1);

namespace Modette\Journalist\Admin\Article\Create;

use Modette\Accounts\Core\Person\Person;
use Modette\Journalist\Admin\Article\Form\ArticleFormControl;
use Modette\Journalist\Core\Article\Article;
use Modette\Journalist\Core\Article\ArticleRepository;
use Modette\Journalist\Core\Author\Author;
use Modette\UI\Forms\FormFactory;
use Nette\Application\UI\Form;

/**
 * @method onSuccess(Article $article): void
 */
class CreateArticleControl extends ArticleFormControl
{

	/** @var array<callable(Article $article): void> */
	public $onSuccess = [];

	/** @var ArticleRepository */
	private $articleRepository;

	public function __construct(FormFactory $formFactory, ArticleRepository $articleRepository)
	{
		parent::__construct($formFactory);
		$this->articleRepository = $articleRepository;
	}

	public function createComponentForm(): Form
	{
		$form = $this->createForm();

		$form->onSuccess[] = function (Form $form): void {
			$this->processForm($form);
		};

		return $form;
	}

	private function processForm(Form $form): void
	{
		$values = $form->getValues();

		$author = new Author(new Person('', '', ''), ''); //TODO - author
		$article = new Article($values->title, $values->perex, $values->content, $author);
		$this->articleRepository->persistAndFlush($article);
		$this->onSuccess($article);
	}

}