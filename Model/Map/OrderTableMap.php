<?php

namespace Model\Map;

use Model\Order;
use Model\OrderQuery;
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
 * This class defines the structure of the 'order' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class OrderTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Model.Map.OrderTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'leno';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'order';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Model\\Order';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Model.Order';

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
     * the column name for the order_id field
     */
    const COL_ORDER_ID = 'order.order_id';

    /**
     * the column name for the task_id field
     */
    const COL_TASK_ID = 'order.task_id';

    /**
     * the column name for the amount field
     */
    const COL_AMOUNT = 'order.amount';

    /**
     * the column name for the boss_id field
     */
    const COL_BOSS_ID = 'order.boss_id';

    /**
     * the column name for the worker_id field
     */
    const COL_WORKER_ID = 'order.worker_id';

    /**
     * the column name for the progress field
     */
    const COL_PROGRESS = 'order.progress';

    /**
     * the column name for the worker_deposit field
     */
    const COL_WORKER_DEPOSIT = 'order.worker_deposit';

    /**
     * the column name for the boss_deposit field
     */
    const COL_BOSS_DEPOSIT = 'order.boss_deposit';

    /**
     * the column name for the done field
     */
    const COL_DONE = 'order.done';

    /**
     * the column name for the status field
     */
    const COL_STATUS = 'order.status';

    /**
     * the column name for the created field
     */
    const COL_CREATED = 'order.created';

    /**
     * the column name for the updated field
     */
    const COL_UPDATED = 'order.updated';

    /**
     * the column name for the removed field
     */
    const COL_REMOVED = 'order.removed';

    /**
     * the column name for the created_at field
     */
    const COL_CREATED_AT = 'order.created_at';

    /**
     * the column name for the updated_at field
     */
    const COL_UPDATED_AT = 'order.updated_at';

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
        self::TYPE_PHPNAME       => array('OrderId', 'TaskId', 'Amount', 'BossId', 'WorkerId', 'Progress', 'WorkerDeposit', 'BossDeposit', 'Done', 'Status', 'Created', 'Updated', 'Removed', 'CreatedAt', 'UpdatedAt', ),
        self::TYPE_CAMELNAME     => array('orderId', 'taskId', 'amount', 'bossId', 'workerId', 'progress', 'workerDeposit', 'bossDeposit', 'done', 'status', 'created', 'updated', 'removed', 'createdAt', 'updatedAt', ),
        self::TYPE_COLNAME       => array(OrderTableMap::COL_ORDER_ID, OrderTableMap::COL_TASK_ID, OrderTableMap::COL_AMOUNT, OrderTableMap::COL_BOSS_ID, OrderTableMap::COL_WORKER_ID, OrderTableMap::COL_PROGRESS, OrderTableMap::COL_WORKER_DEPOSIT, OrderTableMap::COL_BOSS_DEPOSIT, OrderTableMap::COL_DONE, OrderTableMap::COL_STATUS, OrderTableMap::COL_CREATED, OrderTableMap::COL_UPDATED, OrderTableMap::COL_REMOVED, OrderTableMap::COL_CREATED_AT, OrderTableMap::COL_UPDATED_AT, ),
        self::TYPE_FIELDNAME     => array('order_id', 'task_id', 'amount', 'boss_id', 'worker_id', 'progress', 'worker_deposit', 'boss_deposit', 'done', 'status', 'created', 'updated', 'removed', 'created_at', 'updated_at', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('OrderId' => 0, 'TaskId' => 1, 'Amount' => 2, 'BossId' => 3, 'WorkerId' => 4, 'Progress' => 5, 'WorkerDeposit' => 6, 'BossDeposit' => 7, 'Done' => 8, 'Status' => 9, 'Created' => 10, 'Updated' => 11, 'Removed' => 12, 'CreatedAt' => 13, 'UpdatedAt' => 14, ),
        self::TYPE_CAMELNAME     => array('orderId' => 0, 'taskId' => 1, 'amount' => 2, 'bossId' => 3, 'workerId' => 4, 'progress' => 5, 'workerDeposit' => 6, 'bossDeposit' => 7, 'done' => 8, 'status' => 9, 'created' => 10, 'updated' => 11, 'removed' => 12, 'createdAt' => 13, 'updatedAt' => 14, ),
        self::TYPE_COLNAME       => array(OrderTableMap::COL_ORDER_ID => 0, OrderTableMap::COL_TASK_ID => 1, OrderTableMap::COL_AMOUNT => 2, OrderTableMap::COL_BOSS_ID => 3, OrderTableMap::COL_WORKER_ID => 4, OrderTableMap::COL_PROGRESS => 5, OrderTableMap::COL_WORKER_DEPOSIT => 6, OrderTableMap::COL_BOSS_DEPOSIT => 7, OrderTableMap::COL_DONE => 8, OrderTableMap::COL_STATUS => 9, OrderTableMap::COL_CREATED => 10, OrderTableMap::COL_UPDATED => 11, OrderTableMap::COL_REMOVED => 12, OrderTableMap::COL_CREATED_AT => 13, OrderTableMap::COL_UPDATED_AT => 14, ),
        self::TYPE_FIELDNAME     => array('order_id' => 0, 'task_id' => 1, 'amount' => 2, 'boss_id' => 3, 'worker_id' => 4, 'progress' => 5, 'worker_deposit' => 6, 'boss_deposit' => 7, 'done' => 8, 'status' => 9, 'created' => 10, 'updated' => 11, 'removed' => 12, 'created_at' => 13, 'updated_at' => 14, ),
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
        $this->setName('order');
        $this->setPhpName('Order');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Model\\Order');
        $this->setPackage('Model');
        $this->setUseIdGenerator(true);
        $this->setPrimaryKeyMethodInfo('order_order_id_seq');
        // columns
        $this->addPrimaryKey('order_id', 'OrderId', 'INTEGER', true, null, null);
        $this->addForeignKey('task_id', 'TaskId', 'INTEGER', 'task', 'id', true, null, null);
        $this->addColumn('amount', 'Amount', 'INTEGER', true, null, null);
        $this->addForeignKey('boss_id', 'BossId', 'INTEGER', 'user', 'id', true, null, null);
        $this->addForeignKey('worker_id', 'WorkerId', 'INTEGER', 'user', 'id', true, null, null);
        $this->addColumn('progress', 'Progress', 'INTEGER', true, null, null);
        $this->addColumn('worker_deposit', 'WorkerDeposit', 'INTEGER', false, null, null);
        $this->addColumn('boss_deposit', 'BossDeposit', 'INTEGER', false, null, null);
        $this->addColumn('done', 'Done', 'TIMESTAMP', true, null, null);
        $this->addColumn('status', 'Status', 'VARCHAR', true, null, null);
        $this->addColumn('created', 'Created', 'TIMESTAMP', true, null, null);
        $this->addColumn('updated', 'Updated', 'TIMESTAMP', true, null, null);
        $this->addColumn('removed', 'Removed', 'TIMESTAMP', false, null, null);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Task', '\\Model\\Task', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':task_id',
    1 => ':id',
  ),
), null, null, null, false);
        $this->addRelation('User', '\\Model\\User', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':boss_id',
    1 => ':id',
  ),
  1 =>
  array (
    0 => ':worker_id',
    1 => ':id',
  ),
), null, null, null, false);
    } // buildRelations()

    /**
     *
     * Gets the list of behaviors registered for this table
     *
     * @return array Associative array (name => parameters) of behaviors
     */
    public function getBehaviors()
    {
        return array(
            'timestampable' => array('create_column' => 'created_at', 'update_column' => 'updated_at', 'disable_created_at' => 'false', 'disable_updated_at' => 'false', 'created_column' => 'create_on', 'updated_column' => 'update_on', ),
        );
    } // getBehaviors()

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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('OrderId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('OrderId', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('OrderId', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('OrderId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('OrderId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('OrderId', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('OrderId', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? OrderTableMap::CLASS_DEFAULT : OrderTableMap::OM_CLASS;
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
     * @return array           (Order object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = OrderTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = OrderTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + OrderTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = OrderTableMap::OM_CLASS;
            /** @var Order $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            OrderTableMap::addInstanceToPool($obj, $key);
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
            $key = OrderTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = OrderTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Order $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                OrderTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(OrderTableMap::COL_ORDER_ID);
            $criteria->addSelectColumn(OrderTableMap::COL_TASK_ID);
            $criteria->addSelectColumn(OrderTableMap::COL_AMOUNT);
            $criteria->addSelectColumn(OrderTableMap::COL_BOSS_ID);
            $criteria->addSelectColumn(OrderTableMap::COL_WORKER_ID);
            $criteria->addSelectColumn(OrderTableMap::COL_PROGRESS);
            $criteria->addSelectColumn(OrderTableMap::COL_WORKER_DEPOSIT);
            $criteria->addSelectColumn(OrderTableMap::COL_BOSS_DEPOSIT);
            $criteria->addSelectColumn(OrderTableMap::COL_DONE);
            $criteria->addSelectColumn(OrderTableMap::COL_STATUS);
            $criteria->addSelectColumn(OrderTableMap::COL_CREATED);
            $criteria->addSelectColumn(OrderTableMap::COL_UPDATED);
            $criteria->addSelectColumn(OrderTableMap::COL_REMOVED);
            $criteria->addSelectColumn(OrderTableMap::COL_CREATED_AT);
            $criteria->addSelectColumn(OrderTableMap::COL_UPDATED_AT);
        } else {
            $criteria->addSelectColumn($alias . '.order_id');
            $criteria->addSelectColumn($alias . '.task_id');
            $criteria->addSelectColumn($alias . '.amount');
            $criteria->addSelectColumn($alias . '.boss_id');
            $criteria->addSelectColumn($alias . '.worker_id');
            $criteria->addSelectColumn($alias . '.progress');
            $criteria->addSelectColumn($alias . '.worker_deposit');
            $criteria->addSelectColumn($alias . '.boss_deposit');
            $criteria->addSelectColumn($alias . '.done');
            $criteria->addSelectColumn($alias . '.status');
            $criteria->addSelectColumn($alias . '.created');
            $criteria->addSelectColumn($alias . '.updated');
            $criteria->addSelectColumn($alias . '.removed');
            $criteria->addSelectColumn($alias . '.created_at');
            $criteria->addSelectColumn($alias . '.updated_at');
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
        return Propel::getServiceContainer()->getDatabaseMap(OrderTableMap::DATABASE_NAME)->getTable(OrderTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(OrderTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(OrderTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new OrderTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Order or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Order object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(OrderTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Model\Order) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(OrderTableMap::DATABASE_NAME);
            $criteria->add(OrderTableMap::COL_ORDER_ID, (array) $values, Criteria::IN);
        }

        $query = OrderQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            OrderTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                OrderTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the order table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return OrderQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Order or Criteria object.
     *
     * @param mixed               $criteria Criteria or Order object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OrderTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Order object
        }

        if ($criteria->containsKey(OrderTableMap::COL_ORDER_ID) && $criteria->keyContainsValue(OrderTableMap::COL_ORDER_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.OrderTableMap::COL_ORDER_ID.')');
        }


        // Set the correct dbName
        $query = OrderQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // OrderTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
OrderTableMap::buildTableMap();
