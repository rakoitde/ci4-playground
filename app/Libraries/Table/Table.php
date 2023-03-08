<?php

namespace App\Libraries\Table;

use App\Libraries\Table\Traits\hasAttributes;
use App\Libraries\Table\Traits\hasClass;
use App\Libraries\Table\Traits\hasView;

use App\Libraries\Table\Columns\Column;
use App\Libraries\Table\Rows\tHeadRow;
use App\Libraries\Table\Rows\tBodyRow;
use App\Libraries\Table\Rows\tFootRow;

use CodeIgniter\Config\BaseConfig;

use CodeIgniter\HTTP\RequestInterface;

class Table
{

    use hasAttributes;
    use hasClass;
    use hasView;

    private array $columns;

    private tHead $thead;

    private tBody $tbody;

    private Caption $caption;

    protected string $modelname;

    protected string $id;

    protected BaseConfig $config;

    protected BaseConfig $theme;

    protected array $values;

    public $pager;

    protected bool $paginate;

    protected int $perpage;

    protected int $total;

    protected RequestInterface $request;

    public function Model(string $modelname)
    {
    	$this->modelname = $modelname;
    }

    public function getEntities()
    {
        $this->total = $this->model->countAllResults();

        $entities = $this->model;

        if ($this->paginate) { 
            $result = $entities->paginate(); 
            $this->pager = $entities->pager;
d($entities->pager->links());
            return $result;
        }

        return $entities->findAll($this->perpage);
    }

    public function tHead(string $innerhtml = ""): tHead
    {
    	if (!isset($this->thead)) { $this->thead = new tHead($innerhtml); }
    	return $this->thead;
    }

    public function tBody(string $innerhtml = ""): tBody
    {
    	if (!isset($this->tbody)) { $this->tbody = new tBody($innerhtml); }
    	return $this->tbody;
    }

    public function tFoot(string $innerhtml = ""): tFoot
    {
    	if (!isset($this->tfoot)) { $this->tfoot = new tFoot($innerhtml); }
    	return $this->tfoot;
    }

    public function Caption(string $caption = ""): Caption
    {
    	if (!isset($this->caption)) { $this->caption = new Caption($caption); }
    	return $this->caption;
    }

    protected function Columns(Column ...$columns)
    {
        $this->columns = $columns;
    }

    public function getSelectableColumns(): array
    {
    	$columns = [];
    	foreach ($this->columns as $column) {
    		if ($column->isSelectable()) { $columns[] = $column; }
    	}
    	return $columns;
    }

    public function getHeaders()
    {
        $innerhtml = '';
        foreach ($this->columns as $column) {
            $innerhtml .= $column->getHeaderCell();
        }

        $row = (new tHeadRow())->Render($innerhtml);

        return $row;
    }

    public function getFooter()
    {
        $innerhtml = '';
        foreach ($this->columns as $column) {
            $innerhtml .= $column->getFooterCell( $this->values[$column->name] );
        }

        $row = (new tFootRow())->Render($innerhtml);

        return $row;
    }

    public function getRows($rows): string
    {
        $this->values = [];
    	$innerhtml = '';

        foreach ($rows as $row) {
            $innerhtml.= $this->getRowHtml($row);
        }

        return $innerhtml;
    }

    public function getRowHtml($row)
    {

       
        $innerhtml = '';

        foreach ($this->columns as $column) {
            $this->values[$column->name][]   = $row->{$column->name};
            $innerhtml .= $column->getCell($row);
        }

        $row = (new tBodyRow())->Data('id', $row->id)->Render($innerhtml);

        return $row;
    }

	public function __construct()
	{
		$this->config = config('App\Libraries\Table\Config\Table');
		$this->theme = config($this->config->theme);
		$this->model = model($this->modelname);

        $this->request = \Config\Services::request();


        $this->paginate = $this->config->paginate;
        $this->perpage = $this->request->getGet('_perpage') ?? $this->config->perpage;
        $this->getEntities();
		
	    $this->Class($this->theme->table['classes']);
		$this->id = $this->model->table;
		$this->Attribute('id', $this->model->table);
		$this->defineColumns();
	}


    public function __toString()
    {
    	$this->view = $this->theme->table['view'];


    	$view = $this->Render(
    		$this->tHead( $this->getHeaders() ),
    		$this->tBody( 
    			$this->getRows( 
    				$this->getEntities() 
    			) 
    		),
    		$this->tFoot( $this->getFooter() ),
    		$this->Caption(),
    	);

        return $view;
    }


}