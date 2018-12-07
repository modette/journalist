<?php declare(strict_types = 1);

namespace Modette\Journalist\Admin\Article\Create;

use Modette\Journalist\Admin\Article\Form\ArticleFormFactory;
use Modette\Journalist\Core\Article\Article;
use Modette\Journalist\Core\Article\ArticleRepository;
use Modette\UI\Base\Control\BaseControl;
use Nette\Application\UI\Form;

/**
 * @method onSuccess(Article $article): void
 */
class CreateArticleControl extends BaseControl
{

	/** @var callable[] function(Article $article): void */
	public $onSuccess = [];

	/** @var ArticleFormFactory */
	private $formFactory;

	/** @var ArticleRepository */
	private $articleRepository;

	public function __construct(ArticleFormFactory $formFactory, ArticleRepository $articleRepository)
	{
		parent::__construct();
		$this->formFactory = $formFactory;
		$this->articleRepository = $articleRepository;
	}

	public function createComponentCreateArticleForm(): Form
	{
		$form = $this->formFactory->createForm();

		$form->onSuccess[] = function (Form $form): void {
			$this->createArticle($form);
		};

		return $form;
	}

	private function createArticle(Form $form): void
	{
		$article = new Article();
		$this->articleRepository->persistAndFlush($article);
		$this->onSuccess($article);
	}

	public function render(): void
	{
		$this->template->setFile(__DIR__ . '/templates/default.latte');
		$this->template->render();
	}

}