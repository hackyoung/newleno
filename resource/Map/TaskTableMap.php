<?php

namespace Map;

use \Task;
use \TaskQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'task' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class TaskTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.TaskTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'leno';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'task';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Task';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Task';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 15;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 15;

    /**
     * the column name for the task_id field
     */
    const COL_TASK_ID = 'task.task_id';

    /**
     * the column name for the title field
     */
    const COL_TITLE = 'task.title';

    /**
     * the column name for the description field
     */
    const COL_DESCRIPTION = 'task.description';

    /**
     * the column name for the requirement field
     */
    const COL_REQUIREMENT = 'task.requirement';

    /**
     * the column name for the tech_ids field
     */
    const COL_TECH_IDS = 'task.tech_ids';

    /**
     * the column name for the status field
     */
    const COL_STATUS = 'task.status';

    /**
     * the column name for the min_price field
     */
    const COL_MIN_PRICE = 'task.min_price';

    /**
     * the column name for the max_price field
     */
    const COL_MAX_PRICE = 'task.max_price';

    /**
     * the column name for the price field
     */
    const COL_PRICE = 'task.price';

    /**
     * the column name for the creator_id field
     */
    const COL_CREATOR_ID = 'task.creator_id';

    /**
     * the column name for the helper_id field
     */
    const COL_HELPER_ID = 'task.helper_id';

    /**
     * the column name for the cat_id field
     */
    const COL_CAT_ID = 'task.cat_id';

    /**
     * the column name for the created field
     */
    const COL_CREATED = 'task.created';

    /**
     * the column name for the updated field
     */
    const COL_UPDATED = 'task.updated';

    /**
     * the column name for the deleted field
     */
    const COL_DELETED = 'task.deleted';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('TaskId', 'Title', 'Description', 'Requirement', 'TechIds', 'Status', 'MinPrice', 'MaxPrice', 'Price', 'CreatorId', 'HelperId', 'CatId', 'Created', 'Updated', 'Deleted', ),
        self::TYPE_CAMELNAME     => array('taskId', 'title', 'description', 'requirement', 'techIds', 'status', 'minPrice', 'maxPrice', 'price', 'creatorId', 'helperId', 'catId', 'created', 'updated', 'deleted', ),
        self::TYPE_COLNAME       => array(TaskTableMap::COL_TASK_ID, TaskTableMap::COL_TITLE, TaskTableMap::COL_DESCRIPTION, TaskTableMap::COL_REQUIREMENT, TaskTableMap::COL_TECH_IDS, TaskTableMap::COL_STATUS, TaskTableMap::COL_MIN_PRICE, TaskTableMap::COL_MAX_PRICE, TaskTableMap::COL_PRICE, TaskTableMap::COL_CREATOR_ID, TaskTableMap::COL_HELPER_ID, TaskTableMap::COL_CAT_ID, TaskTableMap::COL_CREATED, TaskTableMap::COL_UPDATED, TaskTableMap::COL_DELETED, ),
        self::TYPE_FIELDNAME     => array('task_id', 'title', 'description', 'requirement', 'tech_ids', 'status', 'min_price', 'max_price', 'price', 'creator_id', 'helper_id', 'cat_id', 'created', 'updated', 'deleted', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('TaskId' => 0, 'Title' => 1, 'Description' => 2, 'Requirement' => 3, 'TechIds' => 4, 'Status' => 5, 'MinPrice' => 6, 'MaxPrice' => 7, 'Price' => 8, 'CreatorId' => 9, 'HelperId' => 10, 'CatId' => 11, 'Created' => 12, 'Updated' => 13, 'Deleted' => 14, ),
        self::TYPE_CAMELNAME     => array('taskId' => 0, 'title' => 1, 'description' => 2, 'requirement' => 3, 'techIds' => 4, 'status' => 5, 'minPrice' => 6, 'maxPrice' => 7, 'price' => 8, 'creatorId' => 9, 'helperId' => 10, 'catId' => 11, 'created' => 12, 'updated' => 13, 'deleted' => 14, ),
        self::TYPE_COLNAME       => array(TaskTableMap::COL_TASK_ID => 0, TaskTableMap::COL_TITLE => 1, TaskTableMap::COL_DESCRIPTION => 2, TaskTableMap::COL_REQUIREMENT => 3, TaskTableMap::COL_TECH_IDS => 4, TaskTableMap::COL_STATUS => 5, TaskTableMap::COL_MIN_PRICE => 6, TaskTableMap::COL_MAX_PRICE => 7, TaskTableMap::COL_PRICE => 8, TaskTableMap::COL_CREATOR_ID => 9, TaskTableMap::COL_HELPER_ID => 10, TaskTableMap::COL_CAT_ID => 11, TaskTableMap::COL_CREATED => 12, TaskTableMap::COL_UPDATED => 13, TaskTableMap::COL_DELETED => 14, ),
        self::TYPE_FIELDNAME     => array('task_id' => 0, 'title' => 1, 'description' => 2, 'requirement' => 3, 'tech_ids' => 4, 'status' => 5, 'min_price' => 6, 'max_price' => 7, 'price' => 8, 'creator_id' => 9, 'helper_id' => 10, 'cat_id' => 11, 'created' => 12, 'updated' => 13, 'deleted' => 14, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('task');
        $this->setPhpName('Task');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Task');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('task_id', 'TaskId', 'INTEGER', true, null, null);
        $this->addColumn('title', 'Title', 'VARCHAR', true, 64, null);
        $this->addColumn('description', 'Description', 'VARCHAR', true, 256, null);
        $this->addColumn('requirement', 'Requirement', 'VARCHAR', true, 128, null);
        $this->addColumn('tech_ids', 'TechIds', 'VARCHAR', true, 128, null);
        $this->addColumn('status', 'Status', 'VARCHAR', true, 16, null);
        $this->addColumn('min_price', 'MinPrice', 'INTEGER', true, null, null);
        $this->addColumn('max_price', 'MaxPrice', 'INTEGER', true, null, null);
        $this->addColumn('price', 'Price', 'INTEGER', true, null, null);
        $this->addForeignKey('creator_id', 'CreatorId', 'INTEGER', 'user', 'user_id', true, null, null);
        $this->addForeignKey('helper_id', 'HelperId', 'INTEGER', 'user', 'user_id', true, null, null);
        $this->addForeignKey('cat_id', 'CatId', 'INTEGER', 'category', 'cat_id', true, null, null);
        $this->addColumn('created', 'Created', 'TIMESTAMP', true, null, null);
        $this->addColumn('updated', 'Updated', 'TIMESTAMP', true, null, null);
        $this->addColumn('deleted', 'Deleted', 'TIMESTAMP', true, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('User', '\\User', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':creator_id',
    1 => ':user_id',
  ),
  1 =>
  array (
    0 => ':helper_id',
    1 => ':user_id',
  ),
), null, null, null, false);
        $this->addRelation('Cate', '\\Cate', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':cat_id',
    1 => ':cat_id',
  ),
), null, null, null, false);
    } // buildRelations()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('TaskId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('TaskId', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('TaskId', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('TaskId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('TaskId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('TaskId', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('TaskId', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? TaskTableMap::CLASS_DEFAULT : TaskTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (Task object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = TaskTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = TaskTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + TaskTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = TaskTableMap::OM_CLASS;
            /** @var Task $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            TaskTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = TaskTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = TaskTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Task $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                TaskTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(TaskTableMap::COL_TASK_ID);
            $criteria->addSelectColumn(TaskTableMap::COL_TITLE);
            $criteria->addSelectColumn(TaskTableMap::COL_DESCRIPTION);
            $criteria->addSelectColumn(TaskTableMap::COL_REQUIREMENT);
            $criteria->addSelectColumn(TaskTableMap::COL_TECH_IDS);
            $criteria->addSelectColumn(TaskTableMap::COL_STATUS);
            $criteria->addSelectColumn(TaskTableMap::COL_MIN_PRICE);
            $criteria->addSelectColumn(TaskTableMap::COL_MAX_PRICE);
            $criteria->addSelectColumn(TaskTableMap::COL_PRICE);
            $criteria->addSelectColumn(TaskTableMap::COL_CREATOR_ID);
            $criteria->addSelectColumn(TaskTableMap::COL_HELPER_ID);
            $criteria->addSelectColumn(TaskTableMap::COL_CAT_ID);
            $criteria->addSelectColumn(TaskTableMap::COL_CREATED);
            $criteria->addSelectColumn(TaskTableMap::COL_UPDATED);
            $criteria->addSelectColumn(TaskTableMap::COL_DELETED);
        } else {
            $criteria->addSelectColumn($alias . '.task_id');
            $criteria->addSelectColumn($alias . '.title');
            $criteria->addSelectColumn($alias . '.description');
            $criteria->addSelectColumn($alias . '.requirement');
            $criteria->addSelectColumn($alias . '.tech_ids');
            $criteria->addSelectColumn($alias . '.status');
            $criteria->addSelectColumn($alias . '.min_price');
            $criteria->addSelectColumn($alias . '.max_price');
            $criteria->addSelectColumn($alias . '.price');
            $criteria->addSelectColumn($alias . '.creator_id');
            $criteria->addSelectColumn($alias . '.helper_id');
            $criteria->addSelectColumn($alias . '.cat_id');
            $criteria->addSelectColumn($alias . '.created');
            $criteria->addSelectColumn($alias . '.updated');
            $criteria->addSelectColumn($alias . '.deleted');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(TaskTableMap::DATABASE_NAME)->getTable(TaskTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(TaskTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(TaskTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new TaskTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Task or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Task object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TaskTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Task) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(TaskTableMap::DATABASE_NAME);
            $criteria->add(TaskTableMap::COL_TASK_ID, (array) $values, Criteria::IN);
        }

        $query = TaskQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            TaskTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                TaskTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the task table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return TaskQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Task or Criteria object.
     *
     * @param mixed               $criteria Criteria or Task object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TaskTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Task object
        }

        if ($criteria->containsKey(TaskTableMap::COL_TASK_ID) && $criteria->keyContainsValue(TaskTableMap::COL_TASK_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.TaskTableMap::COL_TASK_ID.')');
        }


        // Set the correct dbName
        $query = TaskQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // TaskTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
TaskTableMap::buildTableMap();
