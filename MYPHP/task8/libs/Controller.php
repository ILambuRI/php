<?php

class Controller
{
	private $model;
	private $view;

	public function __construct()
	{		
		$this->model = new Model();
		$this->view = new View();	
			
		if(strlen($_POST['request']) >= 1)
		{	
			try
			{
				$this->view->links = $this->model->getHtml($_POST['request'])->htmlParser();
				$this->view->info = SEARCH_SUCCESS . $_POST['request'];
			}
			catch(Exception $e)
			{
				$this->view->info = $e->getMessage();	           
			}

			$this->view->display(TEMPLATE);
		}
		else
		{
			$this->view->info = INFO;
			$this->view->display(TEMPLATE);
		}	
	}			
}
