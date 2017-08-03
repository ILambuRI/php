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
			$this->buildAll();
		}
		catch(Exception $e)
		{
			$this->view->info = $e->getMessage();
		}

		$this->view->display(TEMPLATE);		
	}

	public function buildAll()
	{
		/* Select */
		$atr = ['class'=>'option', 'name'=>'name'];
		$this->model->setOption('Name1',$atr)
					->setOption('Name2',$atr)
					->setOption('Name3')
					->setOption('Name4',$atr)
					->setOption('Name5','','selected');

		$atr = ['class'=>'s', 'name'=>'center'];
		$str = Model::getSelect(1, $atr);
		$this->view->select = $str;

		/* ol */
		$this->model->setLi('Pole1')->setLi('Pole2')->setLi('Pole3')
					->setLi('Pole4')->setLi('Pole5');

		$atr = ['class'=>'drop', 'name'=>'center'];
		$str = Model::getOl($atr, true);
		$this->view->ol = $str;

		/* ul */
		$this->model->setLi('Pole3')->setLi('Pole4')->setLi('Pole5')
					->setLi('Pole6')->setLi('Pole7');

		$atr = ['class'=>'drop', 'type'=>'circle'];
		$str = Model::getUl($atr);
		$this->view->ul = $str;

		/* dl-dt-dd */
		$atr_dt = ['class'=>'DT', 'name'=>'text'];	
		$atr_dd = ['class'=>'DD', 'name'=>'alltxt'];
		$this->model->setDt('Pole3', $atr_dt)->setDd('Text text text text text text text text')
					->setDt('Pole4', $atr_dt)->setDd('Text text text text text text text text')
					->setDt('Pole5')->setDd('Text text text text text text text text', $atr_dd)
					->setDt('Pole6')->setDd('Text text text text text text text text', $atr_dd)
					->setDt('Pole7', $atr_dt)->setDd('Text text text text text text text text');

		$atr = ['class'=>'class', 'name'=>'title'];	
		$str = Model::getDl($atr);
		$this->view->dl = $str;

		/* radio */
		$atr1 = ['type'=>'radio', 'name'=>'gr1'];
		$atr2 = ['type'=>'radio', 'name'=>'gr2'];
		$atr_sub = ['type'=>'submit'];
		$this->model->setInput('Name1', '<br>', $atr1)
					->setInput('Name2', '<br>', $atr1)
					->setInput('Name1', '', $atr2)
					->setInput('Name2', '', $atr2, true)
					->setInput('Name3', '<br>', $atr2)
					->setInput('', '',$atr_sub);

		$atr = ['method'=>'POST'];
		$str = Model::getForm($atr);
		$this->view->radio = $str;

		/* chekbox */
		$atr = ['type'=>'checkbox'];
		$atr_sub = ['type'=>'submit'];
		$this->model->setInput('Name1', '<br>', $atr)
					->setInput('Name2', '<br>', $atr)
					->setInput('Name1', '', $atr)
					->setInput('Name2', '', $atr, true)
					->setInput('Name3', '<br>', $atr)
					->setInput('', '',$atr_sub);

		$atr = ['method'=>'POST'];
		$str = Model::getForm($atr);
		$this->view->check = $str;

		/* Table */
		$this->model->setTd('Name', 1)->setTd('Name', 1)->setTd('Name', 1)
					->setTd('Name', 1)->setTd('Name', 1)->setTd('Name', 1)
					->setTr();
		$this->model->setTd('Name2')->setTd('Name2')->setTd('Name2')
					->setTd('Name2')->setTd('Name2')->setTd('Name2')
					->setTr();
		$this->model->setTd('Name3')->setTd('Name3')->setTd('Name3')
					->setTd('Name3')->setTd('Name3')->setTd('Name3')
					->setTr();

		$atr = ['class'=>'table table-hover', 'align'=>'center'];
		$str = Model::getTable($atr);
		$this->view->table = $str;
	}
}
