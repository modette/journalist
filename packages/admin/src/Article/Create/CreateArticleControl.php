<?php declare(strict_types = 1);

namespace Modette\Journalist\Admin\Article\Create;

use Modette\Accounts\Core\Person\Person;
use Modette\Journalist\Admin\Article\Form\ArticleFormControl;
use Modette\Journalist\Core\Article\Article;
use Modette\Journalist\Core\Article\Create\CreateArticleAccessor;
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

	/** @var CreateArticleAccessor */
	private $createArticleAccessor;

	public function __construct(FormFactory $formFactory, CreateArticleAccessor $createArticleAccessor)
	{
		parent::__construct($formFactory);
		$this->createArticleAccessor = $createArticleAccessor;
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
		$facade = $this->createArticleAccessor->get();

		$author = new Author(new Person('', '', ''), ''); //TODO - author
		$article = $facade->createEntity($values->title, $values->perex, $values->content, $author);

		$facade->save($article);
		$this->onSuccess($article);
	}

}