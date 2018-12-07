<?php declare(strict_types = 1);

namespace Modette\Journalist\Admin\Article\Form;

use Modette\UI\Forms\FormFactory;
use Nette\Application\UI\Form;
use Nette\Forms\Controls\TextArea;
use Nette\Forms\Controls\TextInput;

class ArticleFormFactory
{

	/** @var FormFactory */
	private $formFactory;

	public function __construct(FormFactory $formFactory)
	{
		$this->formFactory = $formFactory;
	}

	public function createForm(): Form
	{
		$form = $this->formFactory->create();

		$form['title'] = new TextInput('title');
		$form['perex'] = new TextArea('perex');
		$form['content'] = new TextArea('content');

		return $form;
	}

}
