<?php

namespace Modules\PanelCore\DataGrid;

use Carbon\Carbon;
use Illuminate\Support\Facades\Event;
use Modules\PanelCore\DataGrid\Columns\Core\Action;
use Modules\PanelCore\DataGrid\Columns\Core\Column;

abstract class DataGrid
{
    /**
     * set index columns, ex: id.
     *
     * @var int
     */
    protected $index = null;

    protected $tableName = null;

    /**
     * Default sort order of datagrid
     *
     * @var string
     */
    protected $sortOrder = 'asc';


    public $sortColumnOrder;
    public $sortColumnIndex;

    /**
     * Situation handling property when working with custom columns in datagrid, helps abstaining
     * aliases on custom column.
     *
     * @var bool
     */
    protected $enableFilterMap = false;

    /**
     * This is array where aliases and custom column's name are passed
     *
     * @var array
     */
    protected $filterMap = [];

    /**
     * array to hold all the columns which will be displayed on frontend.
     *
     * @var array
     */
    protected array $columns = [];


    /**
     * @var array
     */
    protected $completeColumnDetails = [];

    /**
     * Hold query builder instance of the query prepared by executing datagrid
     * class method setQueryBuilder
     *
     * @var array
     */
    protected $queryBuilder = [];

    /**
     * Final result of the datagrid program that is collection object.
     *
     * @var array
     */
    protected $collection = [];

    /**
     * Set of handly click tools which you could be using for various operations.
     * ex: dyanmic and static redirects, deleting, etc.
     *
     * @var array
     */
    protected $actions = [];

    /**
     * Works on selection of values index column as comma separated list as response
     * to your endpoint set as route.
     *
     * @var array
     */
    protected $massActions = [];

    /**
     * Parsed value of the url parameters
     *
     * @var array
     */
    protected $parse;

    /**
     * To show mass action or not.
     *
     * @var bool
     */
    protected $enableMassAction = false;

    /**
     * To enable actions or not.
     */
    protected $enableAction = true;

    /**
     * To enable actions or not.
     */
    protected $enableAutoIncrement = false;

    /**
     * paginate the collection or not
     *
     * @var bool
     */
    protected $paginate = true;

    /**
     * If paginated then value of pagination.
     *
     * @var int
     */
    protected $itemsPerPage = 10;

    /**
     * @var array
     */
    protected $operators = [
        'eq' => "=",
        'lt' => "<",
        'gt' => ">",
        'lte' => "<=",
        'gte' => ">=",
        'neqs' => "<>",
        'neqn' => "!=",
        'eqo' => "<=>",
        'like' => "like",
        'blike' => "like binary",
        'nlike' => "not like",
        'ilike' => "ilike",
        'and' => "&",
        'bor' => "|",
        'regex' => "regexp",
        'notregex' => "not regexp",
    ];

    /**
     * @var array
     */
    protected $bindings = [
        0 => "select",
        1 => "from",
        2 => "join",
        3 => "where",
        4 => "having",
        5 => "order",
        6 => "union",
    ];

    /**
     * @var array
     */
    protected $selectcomponents = [
        0 => "aggregate",
        1 => "columns",
        2 => "from",
        3 => "joins",
        4 => "wheres",
        5 => "groups",
        6 => "havings",
        7 => "orders",
        8 => "limit",
        9 => "offset",
        10 => "lock",
    ];

    abstract public function prepareQueryBuilder();


    abstract public function addColumns();

    /**
     * @return void
     */
    public function __construct()
    {
        $this->invoker = $this;
    }

    /**
     * Parse the URL and get it ready to be used.
     *
     * @return array
     */
    private function parseRequest()
    {
        $result = [];
        $unparsed = url()->full();

        $route = request()->route() ? request()->route()->getName() : "";

        if ($route == 'admin.datagrid.export') {
            $unparsed = url()->previous();
        }


        if (count(request()->all()) > 1) {
            $result = request()->all();
        }
        $this->itemsPerPage = isset($result['perPage']) ? $result['perPage']['eq'] : $this->itemsPerPage;

        unset($result['perPage']);

        return $result;
    }

    public function setTableName()
    {
        $this->tableName .= ".";
    }

    /**
     * Add the index as alias of the column and use the column to make things happen
     *
     * @param string $alias
     * @param string $column
     * @return void
     */
    public function addFilter($alias, $column)
    {
        $this->filterMap[$alias] = $column;

        $this->enableFilterMap = true;
    }

    /**
     * @param Column $column
     * @return void
     */
    public function addColumn(Column $column)
    {

        array_push($this->columns, $column);

        $this->setCompleteColumnDetails($column);
    }

    /**
     * @param array $columns
     * @return void
     */
    public function addMultiColumn(...$columns)
    {
        $this->columns = $columns;
        $this->setCompleteColumnsDetails($columns);
    }

    /**
     * @param array $column
     * @return void
     */
    public function setCompleteColumnDetails($column)
    {
        array_push($this->completeColumnDetails, $column);
    }

    /**
     * @param $columns
     * @return void
     */
    public function setCompleteColumnsDetails($columns)
    {
        $this->completeColumnDetails = $columns;
    }

    /**
     * @param \Illuminate\Database\Query\Builder $queryBuilder
     * @return void
     */
    public function setQueryBuilder($queryBuilder)
    {
        $this->queryBuilder = $queryBuilder;
    }

    /**
     * @param Action $action
     * @return void
     */
    public function addAction(Action $action)
    {
        array_push($this->actions, $action);
        $this->enableAction = true;

    }

    public function addMultiAction(Action  ...$actions)
    {
        $this->actions = $actions;
        $this->enableAction = true;
    }


    /**
     * @param array $massAction
     * @return void
     */
    public function addMassAction($massAction)
    {
        if (isset($massAction['label'])) {
            $eventName = strtolower($massAction['label']);
            $eventName = explode(' ', $eventName);
            $eventName = implode('.', $eventName);
        } else {
            $eventName = null;
        }

        array_push($this->massActions, $massAction);

        $this->enableMassAction = true;

    }

    /**
     * @return array
     */
    public function getCollection()
    {

        $parseRequest = $this->parseRequest();

        foreach ($parseRequest as $key => $value) {
            if ($key == 'locale') {
                if (!is_array($value)) {
                    unset($parseRequest[$key]);
                }
            }
//            elseif (!is_array($value)) {
//                unset($parseRequest[$key]);
//            }
        }

//        if (request()->method() == "POST") {
////            dd($parseRequest);
//        }


        if (count($parseRequest)) {
            $filteredOrSortedCollection = $this->sortOrFilterCollection($this->collection = $this->queryBuilder, $parseRequest);

            if ($this->paginate) {
                if ($this->itemsPerPage > 0)
                    return $this->mapData($filteredOrSortedCollection->orderBy($this->index, $this->sortOrder)->paginate($this->itemsPerPage)->appends(request()->except('page')));
            } else {
                return $this->mapData($filteredOrSortedCollection->orderBy($this->index, $this->sortOrder)->get());
            }
        }

        if ($this->paginate) {
            if ($this->itemsPerPage > 0) {
                $this->collection = $this->queryBuilder->orderBy($this->index, $this->sortOrder)->paginate($this->itemsPerPage)->appends(request()->except('page'));
            }
        } else {
            $this->collection = $this->queryBuilder->orderBy($this->index, $this->sortOrder)->get();
        }


        return $this->mapData($this->collection);
    }

    /**
     * To find the alias of the column and by taking the column name.
     *
     * @param array $columnAlias
     * @return array
     */
    public function findColumnType($columnAlias)
    {
        foreach ($this->completeColumnDetails as $column) {
            if ($column->index == $columnAlias) {
                return [$column->type, $column->index];
            }
        }
    }

    /**
     * @param \Illuminate\Support\Collection $collection
     * @param array $parseInfo
     * @return \Illuminate\Support\Collection
     */
    public function sortOrFilterCollection($collection, $parseInfo)
    {


        foreach ($parseInfo as $key => $info) {

            if ($key == "sort") {
                $this->sortColumnOrder = $info['dir'];
                $this->sortColumnIndex = $info['column'];
                $collection->orderBy(
                    $info['column'],
                    $info['dir']
                );
            } elseif ($key == "search") {
                $collection->where(function ($collection) use ($info) {
                    foreach ($this->completeColumnDetails as $column) {
                        if ($column->isSearchable()) {
                            if ($this->enableFilterMap && isset($this->filterMap[$column->index])) {
                                $collection->orWhere($this->filterMap[$column->index], 'like', '%' . $info . '%');
                            } else {
                                $collection->orWhere($this->tableName . $column->index, 'like', '%' . $info . '%');
                            }
                        }
                    }
                });
            } else if ($key == "filter") {
//                foreach ($this->completeColumnDetails as $column) {
//                    if ($column->index == $columnName && !$column['filterable']) {
//                        return $collection;
//                    }
//                }

                foreach ($info as $filter) {
                    if (!isset($filter['column'])) {
                        continue;
                    }
                    $columnType = $this->findColumnType($filter['column'])[0] ?? null;

                    if ($filter['cond'] == "in") {
                        if ($this->enableFilterMap && isset($this->filterMap[$filter['column']])) {
                            $collection->whereIn(
                                $this->filterMap[$filter['column']],
                                $filter['val']
                            );
                        } else {
                            $collection->whereIn(
                                $this->tableName . $filter['column'],
                                $filter['val']
                            );
                        }
                    } else if ($filter['cond'] == "like" || $filter['cond'] == "nlike") {

                        if ($this->enableFilterMap && isset($this->filterMap[$filter['column']])) {
                            $collection->where(
                                $this->filterMap[$filter['column']],
                                $this->operators[$filter['cond']],
                                '%' . $filter['val'] . '%'
                            );
                        } else {
                            $collection->where(
                                $this->tableName . $filter['column'],
                                $this->operators[$filter['cond']],
                                '%' . $filter['val'] . '%'
                            );
                        }
                    } else {

                        if ($columnType == 'datetime') {
                            if ($this->enableFilterMap && isset($this->filterMap[$filter['column']])) {
                                $collection->whereDate(
                                    $this->filterMap[$filter['column']],
                                    $this->operators[$filter['cond']],
                                    Carbon::parse($filter['val'])
                                );
                            } else {
                                $collection->whereDate(
                                    $this->tableName . $filter['column'],
                                    $this->operators[$filter['cond']],
                                    Carbon::parse($filter['val'])
                                );
                            }
                        } else {
                            if ($this->enableFilterMap && isset($this->filterMap[$filter['column']])) {
                                $collection->where(
                                    $this->filterMap[$filter['column']],
                                    $this->operators[$filter['cond']],
                                    $filter['val']
                                );
                            } else {
                                $collection->where(
                                    $this->tableName . $filter['column'],
                                    $this->operators[$filter['cond']],
                                    $filter['val']
                                );
                            }
                        }

                    }
                }
            }
        }

        return $collection;
    }


    /**
     * @return void
     */
    public function prepareMassActions()
    {
    }

    /**
     * @return void
     */
    public function prepareActions()
    {
    }

    /**
     * @return object
     */
    public function data()
    {

        $this->setTableName();
        $this->addColumns();

        $this->prepareActions();

        $this->prepareMassActions();

        $this->prepareQueryBuilder();

        return (object)[
            'records' => $this->getCollection(),
            'columns' => $this->completeColumnDetails,
            'actions' => $this->actions,
            'massactions' => $this->massActions,
            'index' => $this->index,
            'enableMassActions' => $this->enableMassAction,
            'enableActions' => $this->enableAction,
            'paginated' => $this->paginate,
            'enableAutoIncrement' => $this->enableAutoIncrement,
            'norecords' => trans('ui::app.datagrid.no-records'),
            'sortColumnIndex' => $this->sortColumnIndex,
            'sortColumnOrder' => $this->sortColumnOrder,
        ];
    }

    /**
     * @return array
     */
    public function export()
    {
        $this->paginate = false;
        $this->setTableName();
        $this->addColumns();

        $this->prepareActions();

        $this->prepareMassActions();

        $this->prepareQueryBuilder();

        return [
            'records' => $this->getCollection(),
            'columns' => $this->completeColumnDetails,
        ];
    }

    /**
     * @param array $collection
     */
    protected function mapData($collection)
    {

        return $collection;
    }

}
