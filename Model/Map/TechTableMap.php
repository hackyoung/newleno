<?php

namespace Model\Map;

use Model\Tech;
use Model\TechQuery;
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
 * This class defines the structure of the 'tech' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class TechTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Model.Map.TechTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'leno';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'tech';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Model\\Tech';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Model.Tech';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 10;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 10;

    /**
     * the column name for the id field
     */
    const COL_ID = 'tech.id';

    /**
     * the column name for the label field
     */
    const COL_LABEL = 'tech.label';

    /**
     * the column name for the description field
     */
    const COL_DESCRIPTION = 'tech.description';

    /**
     * the column name for the url field
     */
    const COL_URL = 'tech.url';

    /**
     * the column name for the hot field
     */
    const COL_HOT = 'tech.hot';

    /**
     * the column name for the created field
     */
    const COL_CREATED = 'tech.created';

    /**
     * the column name for the updated field
     */
    const COL_UPDATED = 'tech.updated';

    /**
     * the column name for the removed field
     */
    const COL_REMOVED = 'tech.removed';

    /**
     * the column name for the created_at field
     */
    const COL_CREATED_AT = 'tech.created_at';

    /**
     * the column name for the updated_at field
     */
    const COL_UPDATED_AT = 'tech.updated_at';

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
        self::TYPE_PHPNAME       => array('Id', 'Label', 'Description', 'Url', 'Hot', 'Created', 'Updated', 'Removed', 'CreatedAt', 'UpdatedAt', ),
        self::TYPE_CAMELNAME     => array('id', 'label', 'description', 'url', 'hot', 'created', 'updated', 'removed', 'createdAt', 'updatedAt', ),
        self::TYPE_COLNAME       => array(TechTableMap::COL_ID, TechTableMap::COL_LABEL, TechTableMap::COL_DESCRIPTION, TechTableMap::COL_URL, TechTableMap::COL_HOT, TechTableMap::COL_CREATED, TechTableMap::COL_UPDATED, TechTableMap::COL_REMOVED, TechTableMap::COL_CREATED_AT, TechTableMap::COL_UPDATED_AT, ),
        self::TYPE_FIELDNAME     => array('id', 'label', 'description', 'url', 'hot', 'created', 'updated', 'removed', 'created_at', 'updated_at', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Label' => 1, 'Description' => 2, 'Url' => 3, 'Hot' => 4, 'Created' => 5, 'Updated' => 6, 'Removed' => 7, 'CreatedAt' => 8, 'UpdatedAt' => 9, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'label' => 1, 'description' => 2, 'url' => 3, 'hot' => 4, 'created' => 5, 'updated' => 6, 'removed' => 7, 'createdAt' => 8, 'updatedAt' => 9, ),
        self::TYPE_COLNAME       => array(TechTableMap::COL_ID => 0, TechTableMap::COL_LABEL => 1, TechTableMap::COL_DESCRIPTION => 2, TechTableMap::COL_URL => 3, TechTableMap::COL_HOT => 4, TechTableMap::COL_CREATED => 5, TechTableMap::COL_UPDATED => 6, TechTableMap::COL_REMOVED => 7, TechTableMap::COL_CREATED_AT => 8, TechTableMap::COL_UPDATED_AT => 9, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'label' => 1, 'description' => 2, 'url' => 3, 'hot' => 4, 'created' => 5, 'updated' => 6, 'removed' => 7, 'created_at' => 8, 'updated_at' => 9, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
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
        $this->setName('tech');
        $this->setPhpName('Tech');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Model\\Tech');
        $this->setPackage('Model');
        $this->setUseIdGenerator(true);
        $this->setPrimaryKeyMethodInfo('tech_id_seq');
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('label', 'Label', 'VARCHAR', true, 32, null);
        $this->addColumn('description', 'Description', 'VARCHAR', false, 256, null);
        $this->addColumn('url', 'Url', 'VARCHAR', false, 1024, null);
        $this->addColumn('hot', 'Hot', 'INTEGER', true, null, null);
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
        $this->addRelation('TaskTech', '\\Model\\TaskTech', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':tech_id',
    1 => ':id',
  ),
), null, null, 'TaskTeches', false);
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
        return $withPrefix ? TechTableMap::CLASS_DEFAULT : TechTableMap::OM_CLASS;
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
     * @return array           (Tech object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = TechTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = TechTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + TechTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = TechTableMap::OM_CLASS;
            /** @var Tech $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            TechTableMap::addInstanceToPool($obj, $key);
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
            $key = TechTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = TechTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Tech $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                TechTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(TechTableMap::COL_ID);
            $criteria->addSelectColumn(TechTableMap::COL_LABEL);
            $criteria->addSelectColumn(TechTableMap::COL_DESCRIPTION);
            $criteria->addSelectColumn(TechTableMap::COL_URL);
            $criteria->addSelectColumn(TechTableMap::COL_HOT);
            $criteria->addSelectColumn(TechTableMap::COL_CREATED);
            $criteria->addSelectColumn(TechTableMap::COL_UPDATED);
            $criteria->addSelectColumn(TechTableMap::COL_REMOVED);
            $criteria->addSelectColumn(TechTableMap::COL_CREATED_AT);
            $criteria->addSelectColumn(TechTableMap::COL_UPDATED_AT);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.label');
            $criteria->addSelectColumn($alias . '.description');
            $criteria->addSelectColumn($alias . '.url');
            $criteria->addSelectColumn($alias . '.hot');
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
        return Propel::getServiceContainer()->getDatabaseMap(TechTableMap::DATABASE_NAME)->getTable(TechTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(TechTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(TechTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new TechTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Tech or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Tech object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(TechTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Model\Tech) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(TechTableMap::DATABASE_NAME);
            $criteria->add(TechTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = TechQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            TechTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                TechTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the tech table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return TechQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Tech or Criteria object.
     *
     * @param mixed               $criteria Criteria or Tech object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TechTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Tech object
        }

        if ($criteria->containsKey(TechTableMap::COL_ID) && $criteria->keyContainsValue(TechTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.TechTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = TechQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // TechTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
TechTableMap::buildTableMap();
