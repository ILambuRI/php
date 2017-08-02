<?php
class Controller
{
	private $model;
	private $view;

	public function __construct()
	{		
		$this->model = new Model();
		$this->view = new View();
		try
		{
		$this->model->setOption(123,'name','Name1')
					->setOption(2321,'fsd','Name2')
					->setOption(342,'sg','Name3')
					->setOption(6534,'dht','Name4')
					->setOption(6745,'sfse','Name5','selected');

		$this->model->setLi('Pole1')
					->setLi('Pole2')
					->setLi('Pole3')
					->setLi('Pole4')
					->setLi('Pole5');

		$str = Model::getSelect(3, 'class', 'name', true);
		$this->view->select = $str;

		$str = Model::getOl('A', false, false, true);
		$this->view->ol = $str;
		}
		catch(Exception $e)
		{
			$this->view->info = $e->getMessage();
		}

		$this->view->display(TEMPLATE);		
	}	
					
}
