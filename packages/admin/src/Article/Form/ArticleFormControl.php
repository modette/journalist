<?php declare(strict_types = 1);

namespace Modette\Journalist\Admin\Article\Form;

use Modette\UI\Base\Control\BaseControl;
use Modette\UI\Forms\FormFactory;
use Nette\Application\UI\Form;
use Nette\Forms\Controls\TextArea;
use Nette\Forms\Controls\TextInput;

abstract class ArticleFormControl extends BaseControl
{

	/** @var FormFactory */
	private $formFactory;

	public function __construct(FormFactory $formFactory)
	{
		parent::__construct();
		$this->formFactory = $formFactory;
	}

	protected function createForm(): Form
	{
		$form = $this->formFactory->create();

		$form['title'] = new TextInput('title');
		$form['perex'] = new TextArea('perex');
		$form['content'] = new TextArea('content');

		return $form;
	}

	abstract public function createComponentForm(): Form;

	public function render(): void
	{
		$this->template->setFile(__DIR__ . '/templates/default.latte');
		$this->template->render();
	}

}
