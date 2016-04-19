<?php

namespace Base;

use \Cate as ChildCate;
use \CateQuery as ChildCateQuery;
use \TaskQuery as ChildTaskQuery;
use \User as ChildUser;
use \UserQuery as ChildUserQuery;
use \DateTime;
use \Exception;
use \PDO;
use Map\TaskTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\BadMethodCallException;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Parser\AbstractParser;
use Propel\Runtime\Util\PropelDateTime;

/**
 * Base class that represents a row from the 'task' table.
 *
 *
 *
* @package    propel.generator..Base
*/
abstract class Task implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\TaskTableMap';


    /**
     * attribute to determine if this object has previously been saved.
     * @var boolean
     */
    protected $new = true;

    /**
     * attribute to determine whether this object has been deleted.
     * @var boolean
     */
    protected $deleted = false;

    /**
     * The columns that have been modified in current object.
     * Tracking modified columns allows us to only update modified columns.
     * @var array
     */
    protected $modifiedColumns = array();

    /**
     * The (virtual) columns that are added at runtime
     * The formatters can add supplementary columns based on a resultset
     * @var array
     */
    protected $virtualColumns = array();

    /**
     * The value for the task_id field.
     *
     * @var        int
     */
    protected $task_id;

    /**
     * The value for the title field.
     *
     * @var        string
     */
    protected $title;

    /**
     * The value for the description field.
     *
     * @var        string
     */
    protected $description;

    /**
     * The value for the requirement field.
     *
     * @var        string
     */
    protected $requirement;

    /**
     * The value for the tech_ids field.
     *
     * @var        string
     */
    protected $tech_ids;

    /**
     * The value for the status field.
     *
     * @var        string
     */
    protected $status;

    /**
     * The value for the min_price field.
     *
     * @var        int
     */
    protected $min_price;

    /**
     * The value for the max_price field.
     *
     * @var        int
     */
    protected $max_price;

    /**
     * The value for the price field.
     *
     * @var        int
     */
    protected $price;

    /**
     * The value for the creator_id field.
     *
     * @var        int
     */
    protected $creator_id;

    /**
     * The value for the helper_id field.
     *
     * @var        int
     */
    protected $helper_id;

    /**
     * The value for the cat_id field.
     *
     * @var        int
     */
    protected $cat_id;

    /**
     * The value for the created field.
     *
     * @var        DateTime
     */
    protected $created;

    /**
     * The value for the updated field.
     *
     * @var        DateTime
     */
    protected $updated;

    /**
     * The value for the deleted field.
     *
     * @var        DateTime
     */
    protected $deleted;

    /**
     * @var        ChildUser
     */
    protected $aUser;

    /**
     * @var        ChildCate
     */
    protected $aCate;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * Initializes internal state of Base\Task object.
     */
    public function __construct()
    {
    }

    /**
     * Returns whether the object has been modified.
     *
     * @return boolean True if the object has been modified.
     */
    public function isModified()
    {
        return !!$this->modifiedColumns;
    }

    /**
     * Has specified column been modified?
     *
     * @param  string  $col column fully qualified name (TableMap::TYPE_COLNAME), e.g. Book::AUTHOR_ID
     * @return boolean True if $col has been modified.
     */
    public function isColumnModified($col)
    {
        return $this->modifiedColumns && isset($this->modifiedColumns[$col]);
    }

    /**
     * Get the columns that have been modified in this object.
     * @return array A unique list of the modified column names for this object.
     */
    public function getModifiedColumns()
    {
        return $this->modifiedColumns ? array_keys($this->modifiedColumns) : [];
    }

    /**
     * Returns whether the object has ever been saved.  This will
     * be false, if the object was retrieved from storage or was created
     * and then saved.
     *
     * @return boolean true, if the object has never been persisted.
     */
    public function isNew()
    {
        return $this->new;
    }

    /**
     * Setter for the isNew attribute.  This method will be called
     * by Propel-generated children and objects.
     *
     * @param boolean $b the state of the object.
     */
    public function setNew($b)
    {
        $this->new = (boolean) $b;
    }

    /**
     * Whether this object has been deleted.
     * @return boolean The deleted state of this object.
     */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * Specify whether this object has been deleted.
     * @param  boolean $b The deleted state of this object.
     * @return void
     */
    public function setDeleted($b)
    {
        $this->deleted = (boolean) $b;
    }

    /**
     * Sets the modified state for the object to be false.
     * @param  string $col If supplied, only the specified column is reset.
     * @return void
     */
    public function resetModified($col = null)
    {
        if (null !== $col) {
            if (isset($this->modifiedColumns[$col])) {
                unset($this->modifiedColumns[$col]);
            }
        } else {
            $this->modifiedColumns = array();
        }
    }

    /**
     * Compares this with another <code>Task</code> instance.  If
     * <code>obj</code> is an instance of <code>Task</code>, delegates to
     * <code>equals(Task)</code>.  Otherwise, returns <code>false</code>.
     *
     * @param  mixed   $obj The object to compare to.
     * @return boolean Whether equal to the object specified.
     */
    public function equals($obj)
    {
        if (!$obj instanceof static) {
            return false;
        }

        if ($this === $obj) {
            return true;
        }

        if (null === $this->getPrimaryKey() || null === $obj->getPrimaryKey()) {
            return false;
        }

        return $this->getPrimaryKey() === $obj->getPrimaryKey();
    }

    /**
     * Get the associative array of the virtual columns in this object
     *
     * @return array
     */
    public function getVirtualColumns()
    {
        return $this->virtualColumns;
    }

    /**
     * Checks the existence of a virtual column in this object
     *
     * @param  string  $name The virtual column name
     * @return boolean
     */
    public function hasVirtualColumn($name)
    {
        return array_key_exists($name, $this->virtualColumns);
    }

    /**
     * Get the value of a virtual column in this object
     *
     * @param  string $name The virtual column name
     * @return mixed
     *
     * @throws PropelException
     */
    public function getVirtualColumn($name)
    {
        if (!$this->hasVirtualColumn($name)) {
            throw new PropelException(sprintf('Cannot get value of inexistent virtual column %s.', $name));
        }

        return $this->virtualColumns[$name];
    }

    /**
     * Set the value of a virtual column in this object
     *
     * @param string $name  The virtual column name
     * @param mixed  $value The value to give to the virtual column
     *
     * @return $this|Task The current object, for fluid interface
     */
    public function setVirtualColumn($name, $value)
    {
        $this->virtualColumns[$name] = $value;

        return $this;
    }

    /**
     * Logs a message using Propel::log().
     *
     * @param  string  $msg
     * @param  int     $priority One of the Propel::LOG_* logging levels
     * @return boolean
     */
    protected function log($msg, $priority = Propel::LOG_INFO)
    {
        return Propel::log(get_class($this) . ': ' . $msg, $priority);
    }

    /**
     * Export the current object properties to a string, using a given parser format
     * <code>
     * $book = BookQuery::create()->findPk(9012);
     * echo $book->exportTo('JSON');
     *  => {"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * @param  mixed   $parser                 A AbstractParser instance, or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param  boolean $includeLazyLoadColumns (optional) Whether to include lazy load(ed) columns. Defaults to TRUE.
     * @return string  The exported data
     */
    public function exportTo($parser, $includeLazyLoadColumns = true)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        return $parser->fromArray($this->toArray(TableMap::TYPE_PHPNAME, $includeLazyLoadColumns, array(), true));
    }

    /**
     * Clean up internal collections prior to serializing
     * Avoids recursive loops that turn into segmentation faults when serializing
     */
    public function __sleep()
    {
        $this->clearAllReferences();

        $cls = new \ReflectionClass($this);
        $propertyNames = [];
        $serializableProperties = array_diff($cls->getProperties(), $cls->getProperties(\ReflectionProperty::IS_STATIC));

        foreach($serializableProperties as $property) {
            $propertyNames[] = $property->getName();
        }

        return $propertyNames;
    }

    /**
     * Get the [task_id] column value.
     *
     * @return int
     */
    public function getTaskId()
    {
        return $this->task_id;
    }

    /**
     * Get the [title] column value.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Get the [description] column value.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Get the [requirement] column value.
     *
     * @return string
     */
    public function getRequirement()
    {
        return $this->requirement;
    }

    /**
     * Get the [tech_ids] column value.
     *
     * @return string
     */
    public function getTechIds()
    {
        return $this->tech_ids;
    }

    /**
     * Get the [status] column value.
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Get the [min_price] column value.
     *
     * @return int
     */
    public function getMinPrice()
    {
        return $this->min_price;
    }

    /**
     * Get the [max_price] column value.
     *
     * @return int
     */
    public function getMaxPrice()
    {
        return $this->max_price;
    }

    /**
     * Get the [price] column value.
     *
     * @return int
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Get the [creator_id] column value.
     *
     * @return int
     */
    public function getCreatorId()
    {
        return $this->creator_id;
    }

    /**
     * Get the [helper_id] column value.
     *
     * @return int
     */
    public function getHelperId()
    {
        return $this->helper_id;
    }

    /**
     * Get the [cat_id] column value.
     *
     * @return int
     */
    public function getCatId()
    {
        return $this->cat_id;
    }

    /**
     * Get the [optionally formatted] temporal [created] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getCreated($format = NULL)
    {
        if ($format === null) {
            return $this->created;
        } else {
            return $this->created instanceof \DateTimeInterface ? $this->created->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [updated] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getUpdated($format = NULL)
    {
        if ($format === null) {
            return $this->updated;
        } else {
            return $this->updated instanceof \DateTimeInterface ? $this->updated->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [deleted] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getDeleted($format = NULL)
    {
        if ($format === null) {
            return $this->deleted;
        } else {
            return $this->deleted instanceof \DateTimeInterface ? $this->deleted->format($format) : null;
        }
    }

    /**
     * Set the value of [task_id] column.
     *
     * @param int $v new value
     * @return $this|\Task The current object (for fluent API support)
     */
    public function setTaskId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->task_id !== $v) {
            $this->task_id = $v;
            $this->modifiedColumns[TaskTableMap::COL_TASK_ID] = true;
        }

        return $this;
    } // setTaskId()

    /**
     * Set the value of [title] column.
     *
     * @param string $v new value
     * @return $this|\Task The current object (for fluent API support)
     */
    public function setTitle($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->title !== $v) {
            $this->title = $v;
            $this->modifiedColumns[TaskTableMap::COL_TITLE] = true;
        }

        return $this;
    } // setTitle()

    /**
     * Set the value of [description] column.
     *
     * @param string $v new value
     * @return $this|\Task The current object (for fluent API support)
     */
    public function setDescription($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->description !== $v) {
            $this->description = $v;
            $this->modifiedColumns[TaskTableMap::COL_DESCRIPTION] = true;
        }

        return $this;
    } // setDescription()

    /**
     * Set the value of [requirement] column.
     *
     * @param string $v new value
     * @return $this|\Task The current object (for fluent API support)
     */
    public function setRequirement($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->requirement !== $v) {
            $this->requirement = $v;
            $this->modifiedColumns[TaskTableMap::COL_REQUIREMENT] = true;
        }

        return $this;
    } // setRequirement()

    /**
     * Set the value of [tech_ids] column.
     *
     * @param string $v new value
     * @return $this|\Task The current object (for fluent API support)
     */
    public function setTechIds($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->tech_ids !== $v) {
            $this->tech_ids = $v;
            $this->modifiedColumns[TaskTableMap::COL_TECH_IDS] = true;
        }

        return $this;
    } // setTechIds()

    /**
     * Set the value of [status] column.
     *
     * @param string $v new value
     * @return $this|\Task The current object (for fluent API support)
     */
    public function setStatus($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->status !== $v) {
            $this->status = $v;
            $this->modifiedColumns[TaskTableMap::COL_STATUS] = true;
        }

        return $this;
    } // setStatus()

    /**
     * Set the value of [min_price] column.
     *
     * @param int $v new value
     * @return $this|\Task The current object (for fluent API support)
     */
    public function setMinPrice($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->min_price !== $v) {
            $this->min_price = $v;
            $this->modifiedColumns[TaskTableMap::COL_MIN_PRICE] = true;
        }

        return $this;
    } // setMinPrice()

    /**
     * Set the value of [max_price] column.
     *
     * @param int $v new value
     * @return $this|\Task The current object (for fluent API support)
     */
    public function setMaxPrice($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->max_price !== $v) {
            $this->max_price = $v;
            $this->modifiedColumns[TaskTableMap::COL_MAX_PRICE] = true;
        }

        return $this;
    } // setMaxPrice()

    /**
     * Set the value of [price] column.
     *
     * @param int $v new value
     * @return $this|\Task The current object (for fluent API support)
     */
    public function setPrice($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->price !== $v) {
            $this->price = $v;
            $this->modifiedColumns[TaskTableMap::COL_PRICE] = true;
        }

        return $this;
    } // setPrice()

    /**
     * Set the value of [creator_id] column.
     *
     * @param int $v new value
     * @return $this|\Task The current object (for fluent API support)
     */
    public function setCreatorId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->creator_id !== $v) {
            $this->creator_id = $v;
            $this->modifiedColumns[TaskTableMap::COL_CREATOR_ID] = true;
        }

        if ($this->aUser !== null && $this->aUser->getUserId() !== $v) {
            $this->aUser = null;
        }

        return $this;
    } // setCreatorId()

    /**
     * Set the value of [helper_id] column.
     *
     * @param int $v new value
     * @return $this|\Task The current object (for fluent API support)
     */
    public function setHelperId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->helper_id !== $v) {
            $this->helper_id = $v;
            $this->modifiedColumns[TaskTableMap::COL_HELPER_ID] = true;
        }

        if ($this->aUser !== null && $this->aUser->getUserId() !== $v) {
            $this->aUser = null;
        }

        return $this;
    } // setHelperId()

    /**
     * Set the value of [cat_id] column.
     *
     * @param int $v new value
     * @return $this|\Task The current object (for fluent API support)
     */
    public function setCatId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->cat_id !== $v) {
            $this->cat_id = $v;
            $this->modifiedColumns[TaskTableMap::COL_CAT_ID] = true;
        }

        if ($this->aCate !== null && $this->aCate->getCatId() !== $v) {
            $this->aCate = null;
        }

        return $this;
    } // setCatId()

    /**
     * Sets the value of [created] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Task The current object (for fluent API support)
     */
    public function setCreated($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->created !== null || $dt !== null) {
            if ($this->created === null || $dt === null || $dt->format("Y-m-d H:i:s") !== $this->created->format("Y-m-d H:i:s")) {
                $this->created = $dt === null ? null : clone $dt;
                $this->modifiedColumns[TaskTableMap::COL_CREATED] = true;
            }
        } // if either are not null

        return $this;
    } // setCreated()

    /**
     * Sets the value of [updated] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Task The current object (for fluent API support)
     */
    public function setUpdated($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->updated !== null || $dt !== null) {
            if ($this->updated === null || $dt === null || $dt->format("Y-m-d H:i:s") !== $this->updated->format("Y-m-d H:i:s")) {
                $this->updated = $dt === null ? null : clone $dt;
                $this->modifiedColumns[TaskTableMap::COL_UPDATED] = true;
            }
        } // if either are not null

        return $this;
    } // setUpdated()

    /**
     * Sets the value of [deleted] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Task The current object (for fluent API support)
     */
    public function setDeleted($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->deleted !== null || $dt !== null) {
            if ($this->deleted === null || $dt === null || $dt->format("Y-m-d H:i:s") !== $this->deleted->format("Y-m-d H:i:s")) {
                $this->deleted = $dt === null ? null : clone $dt;
                $this->modifiedColumns[TaskTableMap::COL_DELETED] = true;
            }
        } // if either are not null

        return $this;
    } // setDeleted()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
        // otherwise, everything was equal, so return TRUE
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array   $row       The row returned by DataFetcher->fetch().
     * @param int     $startcol  0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @param string  $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                  One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                            TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false, $indexType = TableMap::TYPE_NUM)
    {
        try {

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : TaskTableMap::translateFieldName('TaskId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->task_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : TaskTableMap::translateFieldName('Title', TableMap::TYPE_PHPNAME, $indexType)];
            $this->title = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : TaskTableMap::translateFieldName('Description', TableMap::TYPE_PHPNAME, $indexType)];
            $this->description = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : TaskTableMap::translateFieldName('Requirement', TableMap::TYPE_PHPNAME, $indexType)];
            $this->requirement = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : TaskTableMap::translateFieldName('TechIds', TableMap::TYPE_PHPNAME, $indexType)];
            $this->tech_ids = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : TaskTableMap::translateFieldName('Status', TableMap::TYPE_PHPNAME, $indexType)];
            $this->status = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : TaskTableMap::translateFieldName('MinPrice', TableMap::TYPE_PHPNAME, $indexType)];
            $this->min_price = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : TaskTableMap::translateFieldName('MaxPrice', TableMap::TYPE_PHPNAME, $indexType)];
            $this->max_price = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : TaskTableMap::translateFieldName('Price', TableMap::TYPE_PHPNAME, $indexType)];
            $this->price = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : TaskTableMap::translateFieldName('CreatorId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->creator_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : TaskTableMap::translateFieldName('HelperId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->helper_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : TaskTableMap::translateFieldName('CatId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cat_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : TaskTableMap::translateFieldName('Created', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->created = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : TaskTableMap::translateFieldName('Updated', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->updated = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : TaskTableMap::translateFieldName('Deleted', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->deleted = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 15; // 15 = TaskTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Task'), 0, $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {
        if ($this->aUser !== null && $this->creator_id !== $this->aUser->getUserId()) {
            $this->aUser = null;
        }
        if ($this->aUser !== null && $this->helper_id !== $this->aUser->getUserId()) {
            $this->aUser = null;
        }
        if ($this->aCate !== null && $this->cat_id !== $this->aCate->getCatId()) {
            $this->aCate = null;
        }
    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param      boolean $deep (optional) Whether to also de-associated any related objects.
     * @param      ConnectionInterface $con (optional) The ConnectionInterface connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(TaskTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildTaskQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aUser = null;
            $this->aCate = null;
        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see Task::setDeleted()
     * @see Task::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(TaskTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildTaskQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $this->setDeleted(true);
            }
        });
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see doSave()
     */
    public function save(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(TaskTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con) {
            $ret = $this->preSave($con);
            $isInsert = $this->isNew();
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                TaskTableMap::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }

            return $affectedRows;
        });
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see save()
     */
    protected function doSave(ConnectionInterface $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            // We call the save method on the following object(s) if they
            // were passed to this object by their corresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aUser !== null) {
                if ($this->aUser->isModified() || $this->aUser->isNew()) {
                    $affectedRows += $this->aUser->save($con);
                }
                $this->setUser($this->aUser);
            }

            if ($this->aCate !== null) {
                if ($this->aCate->isModified() || $this->aCate->isNew()) {
                    $affectedRows += $this->aCate->save($con);
                }
                $this->setCate($this->aCate);
            }

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                    $affectedRows += 1;
                } else {
                    $affectedRows += $this->doUpdate($con);
                }
                $this->resetModified();
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @throws PropelException
     * @see doSave()
     */
    protected function doInsert(ConnectionInterface $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[TaskTableMap::COL_TASK_ID] = true;
        if (null !== $this->task_id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . TaskTableMap::COL_TASK_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(TaskTableMap::COL_TASK_ID)) {
            $modifiedColumns[':p' . $index++]  = 'task_id';
        }
        if ($this->isColumnModified(TaskTableMap::COL_TITLE)) {
            $modifiedColumns[':p' . $index++]  = 'title';
        }
        if ($this->isColumnModified(TaskTableMap::COL_DESCRIPTION)) {
            $modifiedColumns[':p' . $index++]  = 'description';
        }
        if ($this->isColumnModified(TaskTableMap::COL_REQUIREMENT)) {
            $modifiedColumns[':p' . $index++]  = 'requirement';
        }
        if ($this->isColumnModified(TaskTableMap::COL_TECH_IDS)) {
            $modifiedColumns[':p' . $index++]  = 'tech_ids';
        }
        if ($this->isColumnModified(TaskTableMap::COL_STATUS)) {
            $modifiedColumns[':p' . $index++]  = 'status';
        }
        if ($this->isColumnModified(TaskTableMap::COL_MIN_PRICE)) {
            $modifiedColumns[':p' . $index++]  = 'min_price';
        }
        if ($this->isColumnModified(TaskTableMap::COL_MAX_PRICE)) {
            $modifiedColumns[':p' . $index++]  = 'max_price';
        }
        if ($this->isColumnModified(TaskTableMap::COL_PRICE)) {
            $modifiedColumns[':p' . $index++]  = 'price';
        }
        if ($this->isColumnModified(TaskTableMap::COL_CREATOR_ID)) {
            $modifiedColumns[':p' . $index++]  = 'creator_id';
        }
        if ($this->isColumnModified(TaskTableMap::COL_HELPER_ID)) {
            $modifiedColumns[':p' . $index++]  = 'helper_id';
        }
        if ($this->isColumnModified(TaskTableMap::COL_CAT_ID)) {
            $modifiedColumns[':p' . $index++]  = 'cat_id';
        }
        if ($this->isColumnModified(TaskTableMap::COL_CREATED)) {
            $modifiedColumns[':p' . $index++]  = 'created';
        }
        if ($this->isColumnModified(TaskTableMap::COL_UPDATED)) {
            $modifiedColumns[':p' . $index++]  = 'updated';
        }
        if ($this->isColumnModified(TaskTableMap::COL_DELETED)) {
            $modifiedColumns[':p' . $index++]  = 'deleted';
        }

        $sql = sprintf(
            'INSERT INTO task (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'task_id':
                        $stmt->bindValue($identifier, $this->task_id, PDO::PARAM_INT);
                        break;
                    case 'title':
                        $stmt->bindValue($identifier, $this->title, PDO::PARAM_STR);
                        break;
                    case 'description':
                        $stmt->bindValue($identifier, $this->description, PDO::PARAM_STR);
                        break;
                    case 'requirement':
                        $stmt->bindValue($identifier, $this->requirement, PDO::PARAM_STR);
                        break;
                    case 'tech_ids':
                        $stmt->bindValue($identifier, $this->tech_ids, PDO::PARAM_STR);
                        break;
                    case 'status':
                        $stmt->bindValue($identifier, $this->status, PDO::PARAM_STR);
                        break;
                    case 'min_price':
                        $stmt->bindValue($identifier, $this->min_price, PDO::PARAM_INT);
                        break;
                    case 'max_price':
                        $stmt->bindValue($identifier, $this->max_price, PDO::PARAM_INT);
                        break;
                    case 'price':
                        $stmt->bindValue($identifier, $this->price, PDO::PARAM_INT);
                        break;
                    case 'creator_id':
                        $stmt->bindValue($identifier, $this->creator_id, PDO::PARAM_INT);
                        break;
                    case 'helper_id':
                        $stmt->bindValue($identifier, $this->helper_id, PDO::PARAM_INT);
                        break;
                    case 'cat_id':
                        $stmt->bindValue($identifier, $this->cat_id, PDO::PARAM_INT);
                        break;
                    case 'created':
                        $stmt->bindValue($identifier, $this->created ? $this->created->format("Y-m-d H:i:s") : null, PDO::PARAM_STR);
                        break;
                    case 'updated':
                        $stmt->bindValue($identifier, $this->updated ? $this->updated->format("Y-m-d H:i:s") : null, PDO::PARAM_STR);
                        break;
                    case 'deleted':
                        $stmt->bindValue($identifier, $this->deleted ? $this->deleted->format("Y-m-d H:i:s") : null, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        try {
            $pk = $con->lastInsertId();
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }
        $this->setTaskId($pk);

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @return Integer Number of updated rows
     * @see doSave()
     */
    protected function doUpdate(ConnectionInterface $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();

        return $selectCriteria->doUpdate($valuesCriteria, $con);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param      string $name name
     * @param      string $type The type of fieldname the $name is of:
     *                     one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                     TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                     Defaults to TableMap::TYPE_PHPNAME.
     * @return mixed Value of field.
     */
    public function getByName($name, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = TaskTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param      int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getTaskId();
                break;
            case 1:
                return $this->getTitle();
                break;
            case 2:
                return $this->getDescription();
                break;
            case 3:
                return $this->getRequirement();
                break;
            case 4:
                return $this->getTechIds();
                break;
            case 5:
                return $this->getStatus();
                break;
            case 6:
                return $this->getMinPrice();
                break;
            case 7:
                return $this->getMaxPrice();
                break;
            case 8:
                return $this->getPrice();
                break;
            case 9:
                return $this->getCreatorId();
                break;
            case 10:
                return $this->getHelperId();
                break;
            case 11:
                return $this->getCatId();
                break;
            case 12:
                return $this->getCreated();
                break;
            case 13:
                return $this->getUpdated();
                break;
            case 14:
                return $this->getDeleted();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     *                    TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                    Defaults to TableMap::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = TableMap::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
    {

        if (isset($alreadyDumpedObjects['Task'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Task'][$this->hashCode()] = true;
        $keys = TaskTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getTaskId(),
            $keys[1] => $this->getTitle(),
            $keys[2] => $this->getDescription(),
            $keys[3] => $this->getRequirement(),
            $keys[4] => $this->getTechIds(),
            $keys[5] => $this->getStatus(),
            $keys[6] => $this->getMinPrice(),
            $keys[7] => $this->getMaxPrice(),
            $keys[8] => $this->getPrice(),
            $keys[9] => $this->getCreatorId(),
            $keys[10] => $this->getHelperId(),
            $keys[11] => $this->getCatId(),
            $keys[12] => $this->getCreated(),
            $keys[13] => $this->getUpdated(),
            $keys[14] => $this->getDeleted(),
        );
        if ($result[$keys[12]] instanceof \DateTime) {
            $result[$keys[12]] = $result[$keys[12]]->format('c');
        }

        if ($result[$keys[13]] instanceof \DateTime) {
            $result[$keys[13]] = $result[$keys[13]]->format('c');
        }

        if ($result[$keys[14]] instanceof \DateTime) {
            $result[$keys[14]] = $result[$keys[14]]->format('c');
        }

        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aUser) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'user';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'user';
                        break;
                    default:
                        $key = 'User';
                }

                $result[$key] = $this->aUser->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aCate) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'cate';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'category';
                        break;
                    default:
                        $key = 'Cate';
                }

                $result[$key] = $this->aCate->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
        }

        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param  string $name
     * @param  mixed  $value field value
     * @param  string $type The type of fieldname the $name is of:
     *                one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                Defaults to TableMap::TYPE_PHPNAME.
     * @return $this|\Task
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = TaskTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Task
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setTaskId($value);
                break;
            case 1:
                $this->setTitle($value);
                break;
            case 2:
                $this->setDescription($value);
                break;
            case 3:
                $this->setRequirement($value);
                break;
            case 4:
                $this->setTechIds($value);
                break;
            case 5:
                $this->setStatus($value);
                break;
            case 6:
                $this->setMinPrice($value);
                break;
            case 7:
                $this->setMaxPrice($value);
                break;
            case 8:
                $this->setPrice($value);
                break;
            case 9:
                $this->setCreatorId($value);
                break;
            case 10:
                $this->setHelperId($value);
                break;
            case 11:
                $this->setCatId($value);
                break;
            case 12:
                $this->setCreated($value);
                break;
            case 13:
                $this->setUpdated($value);
                break;
            case 14:
                $this->setDeleted($value);
                break;
        } // switch()

        return $this;
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param      array  $arr     An array to populate the object from.
     * @param      string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = TableMap::TYPE_PHPNAME)
    {
        $keys = TaskTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setTaskId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setTitle($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setDescription($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setRequirement($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setTechIds($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setStatus($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setMinPrice($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setMaxPrice($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setPrice($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setCreatorId($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setHelperId($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setCatId($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setCreated($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setUpdated($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setDeleted($arr[$keys[14]]);
        }
    }

     /**
     * Populate the current object from a string, using a given parser format
     * <code>
     * $book = new Book();
     * $book->importFrom('JSON', '{"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param mixed $parser A AbstractParser instance,
     *                       or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param string $data The source data to import from
     * @param string $keyType The type of keys the array uses.
     *
     * @return $this|\Task The current object, for fluid interface
     */
    public function importFrom($parser, $data, $keyType = TableMap::TYPE_PHPNAME)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        $this->fromArray($parser->toArray($data), $keyType);

        return $this;
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(TaskTableMap::DATABASE_NAME);

        if ($this->isColumnModified(TaskTableMap::COL_TASK_ID)) {
            $criteria->add(TaskTableMap::COL_TASK_ID, $this->task_id);
        }
        if ($this->isColumnModified(TaskTableMap::COL_TITLE)) {
            $criteria->add(TaskTableMap::COL_TITLE, $this->title);
        }
        if ($this->isColumnModified(TaskTableMap::COL_DESCRIPTION)) {
            $criteria->add(TaskTableMap::COL_DESCRIPTION, $this->description);
        }
        if ($this->isColumnModified(TaskTableMap::COL_REQUIREMENT)) {
            $criteria->add(TaskTableMap::COL_REQUIREMENT, $this->requirement);
        }
        if ($this->isColumnModified(TaskTableMap::COL_TECH_IDS)) {
            $criteria->add(TaskTableMap::COL_TECH_IDS, $this->tech_ids);
        }
        if ($this->isColumnModified(TaskTableMap::COL_STATUS)) {
            $criteria->add(TaskTableMap::COL_STATUS, $this->status);
        }
        if ($this->isColumnModified(TaskTableMap::COL_MIN_PRICE)) {
            $criteria->add(TaskTableMap::COL_MIN_PRICE, $this->min_price);
        }
        if ($this->isColumnModified(TaskTableMap::COL_MAX_PRICE)) {
            $criteria->add(TaskTableMap::COL_MAX_PRICE, $this->max_price);
        }
        if ($this->isColumnModified(TaskTableMap::COL_PRICE)) {
            $criteria->add(TaskTableMap::COL_PRICE, $this->price);
        }
        if ($this->isColumnModified(TaskTableMap::COL_CREATOR_ID)) {
            $criteria->add(TaskTableMap::COL_CREATOR_ID, $this->creator_id);
        }
        if ($this->isColumnModified(TaskTableMap::COL_HELPER_ID)) {
            $criteria->add(TaskTableMap::COL_HELPER_ID, $this->helper_id);
        }
        if ($this->isColumnModified(TaskTableMap::COL_CAT_ID)) {
            $criteria->add(TaskTableMap::COL_CAT_ID, $this->cat_id);
        }
        if ($this->isColumnModified(TaskTableMap::COL_CREATED)) {
            $criteria->add(TaskTableMap::COL_CREATED, $this->created);
        }
        if ($this->isColumnModified(TaskTableMap::COL_UPDATED)) {
            $criteria->add(TaskTableMap::COL_UPDATED, $this->updated);
        }
        if ($this->isColumnModified(TaskTableMap::COL_DELETED)) {
            $criteria->add(TaskTableMap::COL_DELETED, $this->deleted);
        }

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @throws LogicException if no primary key is defined
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = ChildTaskQuery::create();
        $criteria->add(TaskTableMap::COL_TASK_ID, $this->task_id);

        return $criteria;
    }

    /**
     * If the primary key is not null, return the hashcode of the
     * primary key. Otherwise, return the hash code of the object.
     *
     * @return int Hashcode
     */
    public function hashCode()
    {
        $validPk = null !== $this->getTaskId();

        $validPrimaryKeyFKs = 0;
        $primaryKeyFKs = [];

        if ($validPk) {
            return crc32(json_encode($this->getPrimaryKey(), JSON_UNESCAPED_UNICODE));
        } elseif ($validPrimaryKeyFKs) {
            return crc32(json_encode($primaryKeyFKs, JSON_UNESCAPED_UNICODE));
        }

        return spl_object_hash($this);
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getTaskId();
    }

    /**
     * Generic method to set the primary key (task_id column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setTaskId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getTaskId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Task (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setTitle($this->getTitle());
        $copyObj->setDescription($this->getDescription());
        $copyObj->setRequirement($this->getRequirement());
        $copyObj->setTechIds($this->getTechIds());
        $copyObj->setStatus($this->getStatus());
        $copyObj->setMinPrice($this->getMinPrice());
        $copyObj->setMaxPrice($this->getMaxPrice());
        $copyObj->setPrice($this->getPrice());
        $copyObj->setCreatorId($this->getCreatorId());
        $copyObj->setHelperId($this->getHelperId());
        $copyObj->setCatId($this->getCatId());
        $copyObj->setCreated($this->getCreated());
        $copyObj->setUpdated($this->getUpdated());
        $copyObj->setDeleted($this->getDeleted());
        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setTaskId(NULL); // this is a auto-increment column, so set to default value
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param  boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return \Task Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }

    /**
     * Declares an association between this object and a ChildUser object.
     *
     * @param  ChildUser $v
     * @return $this|\Task The current object (for fluent API support)
     * @throws PropelException
     */
    public function setUser(ChildUser $v = null)
    {
        if ($v === null) {
            $this->setCreatorId(NULL);
        } else {
            $this->setCreatorId($v->getUserId());
        }

        if ($v === null) {
            $this->setHelperId(NULL);
        } else {
            $this->setHelperId($v->getUserId());
        }

        $this->aUser = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildUser object, it will not be re-added.
        if ($v !== null) {
            $v->addTask($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildUser object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildUser The associated ChildUser object.
     * @throws PropelException
     */
    public function getUser(ConnectionInterface $con = null)
    {
        if ($this->aUser === null && ($this->creator_id !== null && $this->helper_id !== null)) {
            $this->aUser = ChildUserQuery::create()
                ->filterByTask($this) // here
                ->findOne($con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aUser->addTasks($this);
             */
        }

        return $this->aUser;
    }

    /**
     * Declares an association between this object and a ChildCate object.
     *
     * @param  ChildCate $v
     * @return $this|\Task The current object (for fluent API support)
     * @throws PropelException
     */
    public function setCate(ChildCate $v = null)
    {
        if ($v === null) {
            $this->setCatId(NULL);
        } else {
            $this->setCatId($v->getCatId());
        }

        $this->aCate = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildCate object, it will not be re-added.
        if ($v !== null) {
            $v->addTask($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildCate object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildCate The associated ChildCate object.
     * @throws PropelException
     */
    public function getCate(ConnectionInterface $con = null)
    {
        if ($this->aCate === null && ($this->cat_id !== null)) {
            $this->aCate = ChildCateQuery::create()->findPk($this->cat_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aCate->addTasks($this);
             */
        }

        return $this->aCate;
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aUser) {
            $this->aUser->removeTask($this);
        }
        if (null !== $this->aCate) {
            $this->aCate->removeTask($this);
        }
        $this->task_id = null;
        $this->title = null;
        $this->description = null;
        $this->requirement = null;
        $this->tech_ids = null;
        $this->status = null;
        $this->min_price = null;
        $this->max_price = null;
        $this->price = null;
        $this->creator_id = null;
        $this->helper_id = null;
        $this->cat_id = null;
        $this->created = null;
        $this->updated = null;
        $this->deleted = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references and back-references to other model objects or collections of model objects.
     *
     * This method is used to reset all php object references (not the actual reference in the database).
     * Necessary for object serialisation.
     *
     * @param      boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep) {
        } // if ($deep)

        $this->aUser = null;
        $this->aCate = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(TaskTableMap::DEFAULT_STRING_FORMAT);
    }

    /**
     * Code to be run before persisting the object
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preSave')) {
            return parent::preSave($con);
        }
        return true;
    }

    /**
     * Code to be run after persisting the object
     * @param ConnectionInterface $con
     */
    public function postSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postSave')) {
            parent::postSave($con);
        }
    }

    /**
     * Code to be run before inserting to database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preInsert')) {
            return parent::preInsert($con);
        }
        return true;
    }

    /**
     * Code to be run after inserting to database
     * @param ConnectionInterface $con
     */
    public function postInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postInsert')) {
            parent::postInsert($con);
        }
    }

    /**
     * Code to be run before updating the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preUpdate')) {
            return parent::preUpdate($con);
        }
        return true;
    }

    /**
     * Code to be run after updating the object in database
     * @param ConnectionInterface $con
     */
    public function postUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postUpdate')) {
            parent::postUpdate($con);
        }
    }

    /**
     * Code to be run before deleting the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preDelete')) {
            return parent::preDelete($con);
        }
        return true;
    }

    /**
     * Code to be run after deleting the object in database
     * @param ConnectionInterface $con
     */
    public function postDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postDelete')) {
            parent::postDelete($con);
        }
    }


    /**
     * Derived method to catches calls to undefined methods.
     *
     * Provides magic import/export method support (fromXML()/toXML(), fromYAML()/toYAML(), etc.).
     * Allows to define default __call() behavior if you overwrite __call()
     *
     * @param string $name
     * @param mixed  $params
     *
     * @return array|string
     */
    public function __call($name, $params)
    {
        if (0 === strpos($name, 'get')) {
            $virtualColumn = substr($name, 3);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }

            $virtualColumn = lcfirst($virtualColumn);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }
        }

        if (0 === strpos($name, 'from')) {
            $format = substr($name, 4);

            return $this->importFrom($format, reset($params));
        }

        if (0 === strpos($name, 'to')) {
            $format = substr($name, 2);
            $includeLazyLoadColumns = isset($params[0]) ? $params[0] : true;

            return $this->exportTo($format, $includeLazyLoadColumns);
        }

        throw new BadMethodCallException(sprintf('Call to undefined method: %s.', $name));
    }

}
