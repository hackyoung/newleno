<?php

namespace Model\Map;

use Model\Task;
use Model\TaskQuery;
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
    const CLASS_NAME = 'Model.Map.TaskTableMap';

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
    const OM_CLASS = '\\Model\\Task';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Model.Task';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 11;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 11;

    /**
     * the column name for the id field
     */
    const COL_ID = 'task.id';

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
     * the column name for the min_price field
     */
    const COL_MIN_PRICE = 'task.min_price';

    /**
     * the column name for the max_price field
     */
    const COL_MAX_PRICE = 'task.max_price';

    /**
     * the column name for the creator_id field
     */
    const COL_CREATOR_ID = 'task.creator_id';

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
     * the column name for the removed field
     */
    const COL_REMOVED = 'task.removed';

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
        self::TYPE_PHPNAME       => array('Id', 'Title', 'Description', 'Requirement', 'MinPrice', 'MaxPrice', 'CreatorId', 'CatId', 'Created', 'Updated', 'Removed', ),
        self::TYPE_CAMELNAME     => array('id', 'title', 'description', 'requirement', 'minPrice', 'maxPrice', 'creatorId', 'catId', 'created', 'updated', 'removed', ),
        self::TYPE_COLNAME       => array(TaskTableMap::COL_ID, TaskTableMap::COL_TITLE, TaskTableMap::COL_DESCRIPTION, TaskTableMap::COL_REQUIREMENT, TaskTableMap::COL_MIN_PRICE, TaskTableMap::COL_MAX_PRICE, TaskTableMap::COL_CREATOR_ID, TaskTableMap::COL_CAT_ID, TaskTableMap::COL_CREATED, TaskTableMap::COL_UPDATED, TaskTableMap::COL_REMOVED, ),
        self::TYPE_FIELDNAME     => array('id', 'title', 'description', 'requirement', 'min_price', 'max_price', 'creator_id', 'cat_id', 'created', 'updated', 'removed', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Title' => 1, 'Description' => 2, 'Requirement' => 3, 'MinPrice' => 4, 'MaxPrice' => 5, 'CreatorId' => 6, 'CatId' => 7, 'Created' => 8, 'Updated' => 9, 'Removed' => 10, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'title' => 1, 'description' => 2, 'requirement' => 3, 'minPrice' => 4, 'maxPrice' => 5, 'creatorId' => 6, 'catId' => 7, 'created' => 8, 'updated' => 9, 'removed' => 10, ),
        self::TYPE_COLNAME       => array(TaskTableMap::COL_ID => 0, TaskTableMap::COL_TITLE => 1, TaskTableMap::COL_DESCRIPTION => 2, TaskTableMap::COL_REQUIREMENT => 3, TaskTableMap::COL_MIN_PRICE => 4, TaskTableMap::COL_MAX_PRICE => 5, TaskTableMap::COL_CREATOR_ID => 6, TaskTableMap::COL_CAT_ID => 7, TaskTableMap::COL_CREATED => 8, TaskTableMap::COL_UPDATED => 9, TaskTableMap::COL_REMOVED => 10, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'title' => 1, 'description' => 2, 'requirement' => 3, 'min_price' => 4, 'max_price' => 5, 'creator_id' => 6, 'cat_id' => 7, 'created' => 8, 'updated' => 9, 'removed' => 10, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
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
        $this->setClassName('\\Model\\Task');
        $this->setPackage('Model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('title', 'Title', 'VARCHAR', true, 64, null);
        $this->addColumn('description', 'Description', 'VARCHAR', true, 256, null);
        $this->addColumn('requirement', 'Requirement', 'VARCHAR', true, 128, null);
        $this->addColumn('min_price', 'MinPrice', 'INTEGER', true, null, null);
        $this->addColumn('max_price', 'MaxPrice', 'INTEGER', true, null, null);
        $this->addForeignKey('creator_id', 'CreatorId', 'INTEGER', 'user', 'id', true, null, null);
        $this->addForeignKey('cat_id', 'CatId', 'INTEGER', 'category', 'id', true, null, null);
        $this->addColumn('created', 'Created', 'TIMESTAMP', true, null, null);
        $this->addColumn('updated', 'Updated', 'TIMESTAMP', true, null, null);
        $this->addColumn('removed', 'Removed', 'TIMESTAMP', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('User', '\\Model\\User', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':creator_id',
    1 => ':id',
  ),
), null, null, null, false);
        $this->addRelation('Category', '\\Model\\Category', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':cat_id',
    1 => ':id',
  ),
), null, null, null, false);
        $this->addRelation('Order', '\\Model\\Order', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':task_id',
    1 => ':id',
  ),
), null, null, 'Orders', false);
        $this->addRelation('TaskTech', '\\Model\\TaskTech', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':task_id',
    1 => ':id',
  ),
), null, null, 'TaskTeches', false);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)
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
            $criteria->addSelectColumn(TaskTableMap::COL_ID);
            $criteria->addSelectColumn(TaskTableMap::COL_TITLE);
            $criteria->addSelectColumn(TaskTableMap::COL_DESCRIPTION);
            $criteria->addSelectColumn(TaskTableMap::COL_REQUIREMENT);
            $criteria->addSelectColumn(TaskTableMap::COL_MIN_PRICE);
            $criteria->addSelectColumn(TaskTableMap::COL_MAX_PRICE);
            $criteria->addSelectColumn(TaskTableMap::COL_CREATOR_ID);
            $criteria->addSelectColumn(TaskTableMap::COL_CAT_ID);
            $criteria->addSelectColumn(TaskTableMap::COL_CREATED);
            $criteria->addSelectColumn(TaskTableMap::COL_UPDATED);
            $criteria->addSelectColumn(TaskTableMap::COL_REMOVED);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.title');
            $criteria->addSelectColumn($alias . '.description');
            $criteria->addSelectColumn($alias . '.requirement');
            $criteria->addSelectColumn($alias . '.min_price');
            $criteria->addSelectColumn($alias . '.max_price');
            $criteria->addSelectColumn($alias . '.creator_id');
            $criteria->addSelectColumn($alias . '.cat_id');
            $criteria->addSelectColumn($alias . '.created');
            $criteria->addSelectColumn($alias . '.updated');
            $criteria->addSelectColumn($alias . '.removed');
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
        } elseif ($values instanceof \Model\Task) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(TaskTableMap::DATABASE_NAME);
            $criteria->add(TaskTableMap::COL_ID, (array) $values, Criteria::IN);
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

        if ($criteria->containsKey(TaskTableMap::COL_ID) && $criteria->keyContainsValue(TaskTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.TaskTableMap::COL_ID.')');
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
