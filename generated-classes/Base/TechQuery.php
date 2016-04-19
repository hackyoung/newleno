<?php

namespace Base;

use \Tech as ChildTech;
use \TechQuery as ChildTechQuery;
use \Exception;
use \PDO;
use Map\TechTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'tech' table.
 *
 *
 *
 * @method     ChildTechQuery orderByTechId($order = Criteria::ASC) Order by the tech_id column
 * @method     ChildTechQuery orderByLabel($order = Criteria::ASC) Order by the label column
 * @method     ChildTechQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     ChildTechQuery orderByUrl($order = Criteria::ASC) Order by the url column
 * @method     ChildTechQuery orderByHot($order = Criteria::ASC) Order by the hot column
 * @method     ChildTechQuery orderByCreated($order = Criteria::ASC) Order by the created column
 * @method     ChildTechQuery orderByUpdated($order = Criteria::ASC) Order by the updated column
 * @method     ChildTechQuery orderByDeleted($order = Criteria::ASC) Order by the deleted column
 *
 * @method     ChildTechQuery groupByTechId() Group by the tech_id column
 * @method     ChildTechQuery groupByLabel() Group by the label column
 * @method     ChildTechQuery groupByDescription() Group by the description column
 * @method     ChildTechQuery groupByUrl() Group by the url column
 * @method     ChildTechQuery groupByHot() Group by the hot column
 * @method     ChildTechQuery groupByCreated() Group by the created column
 * @method     ChildTechQuery groupByUpdated() Group by the updated column
 * @method     ChildTechQuery groupByDeleted() Group by the deleted column
 *
 * @method     ChildTechQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildTechQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildTechQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildTechQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildTechQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildTechQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildTech findOne(ConnectionInterface $con = null) Return the first ChildTech matching the query
 * @method     ChildTech findOneOrCreate(ConnectionInterface $con = null) Return the first ChildTech matching the query, or a new ChildTech object populated from the query conditions when no match is found
 *
 * @method     ChildTech findOneByTechId(int $tech_id) Return the first ChildTech filtered by the tech_id column
 * @method     ChildTech findOneByLabel(string $label) Return the first ChildTech filtered by the label column
 * @method     ChildTech findOneByDescription(string $description) Return the first ChildTech filtered by the description column
 * @method     ChildTech findOneByUrl(string $url) Return the first ChildTech filtered by the url column
 * @method     ChildTech findOneByHot(int $hot) Return the first ChildTech filtered by the hot column
 * @method     ChildTech findOneByCreated(string $created) Return the first ChildTech filtered by the created column
 * @method     ChildTech findOneByUpdated(string $updated) Return the first ChildTech filtered by the updated column
 * @method     ChildTech findOneByDeleted(string $deleted) Return the first ChildTech filtered by the deleted column *

 * @method     ChildTech requirePk($key, ConnectionInterface $con = null) Return the ChildTech by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTech requireOne(ConnectionInterface $con = null) Return the first ChildTech matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTech requireOneByTechId(int $tech_id) Return the first ChildTech filtered by the tech_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTech requireOneByLabel(string $label) Return the first ChildTech filtered by the label column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTech requireOneByDescription(string $description) Return the first ChildTech filtered by the description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTech requireOneByUrl(string $url) Return the first ChildTech filtered by the url column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTech requireOneByHot(int $hot) Return the first ChildTech filtered by the hot column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTech requireOneByCreated(string $created) Return the first ChildTech filtered by the created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTech requireOneByUpdated(string $updated) Return the first ChildTech filtered by the updated column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTech requireOneByDeleted(string $deleted) Return the first ChildTech filtered by the deleted column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTech[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildTech objects based on current ModelCriteria
 * @method     ChildTech[]|ObjectCollection findByTechId(int $tech_id) Return ChildTech objects filtered by the tech_id column
 * @method     ChildTech[]|ObjectCollection findByLabel(string $label) Return ChildTech objects filtered by the label column
 * @method     ChildTech[]|ObjectCollection findByDescription(string $description) Return ChildTech objects filtered by the description column
 * @method     ChildTech[]|ObjectCollection findByUrl(string $url) Return ChildTech objects filtered by the url column
 * @method     ChildTech[]|ObjectCollection findByHot(int $hot) Return ChildTech objects filtered by the hot column
 * @method     ChildTech[]|ObjectCollection findByCreated(string $created) Return ChildTech objects filtered by the created column
 * @method     ChildTech[]|ObjectCollection findByUpdated(string $updated) Return ChildTech objects filtered by the updated column
 * @method     ChildTech[]|ObjectCollection findByDeleted(string $deleted) Return ChildTech objects filtered by the deleted column
 * @method     ChildTech[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class TechQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\TechQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'leno', $modelName = '\\Tech', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildTechQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildTechQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildTechQuery) {
            return $criteria;
        }
        $query = new ChildTechQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildTech|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(TechTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = TechTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildTech A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT tech_id, label, description, url, hot, created, updated, deleted FROM tech WHERE tech_id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildTech $obj */
            $obj = new ChildTech();
            $obj->hydrate($row);
            TechTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildTech|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildTechQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TechTableMap::COL_TECH_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildTechQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TechTableMap::COL_TECH_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the tech_id column
     *
     * Example usage:
     * <code>
     * $query->filterByTechId(1234); // WHERE tech_id = 1234
     * $query->filterByTechId(array(12, 34)); // WHERE tech_id IN (12, 34)
     * $query->filterByTechId(array('min' => 12)); // WHERE tech_id > 12
     * </code>
     *
     * @param     mixed $techId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTechQuery The current query, for fluid interface
     */
    public function filterByTechId($techId = null, $comparison = null)
    {
        if (is_array($techId)) {
            $useMinMax = false;
            if (isset($techId['min'])) {
                $this->addUsingAlias(TechTableMap::COL_TECH_ID, $techId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($techId['max'])) {
                $this->addUsingAlias(TechTableMap::COL_TECH_ID, $techId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TechTableMap::COL_TECH_ID, $techId, $comparison);
    }

    /**
     * Filter the query on the label column
     *
     * Example usage:
     * <code>
     * $query->filterByLabel('fooValue');   // WHERE label = 'fooValue'
     * $query->filterByLabel('%fooValue%'); // WHERE label LIKE '%fooValue%'
     * </code>
     *
     * @param     string $label The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTechQuery The current query, for fluid interface
     */
    public function filterByLabel($label = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($label)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $label)) {
                $label = str_replace('*', '%', $label);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TechTableMap::COL_LABEL, $label, $comparison);
    }

    /**
     * Filter the query on the description column
     *
     * Example usage:
     * <code>
     * $query->filterByDescription('fooValue');   // WHERE description = 'fooValue'
     * $query->filterByDescription('%fooValue%'); // WHERE description LIKE '%fooValue%'
     * </code>
     *
     * @param     string $description The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTechQuery The current query, for fluid interface
     */
    public function filterByDescription($description = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($description)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $description)) {
                $description = str_replace('*', '%', $description);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TechTableMap::COL_DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query on the url column
     *
     * Example usage:
     * <code>
     * $query->filterByUrl('fooValue');   // WHERE url = 'fooValue'
     * $query->filterByUrl('%fooValue%'); // WHERE url LIKE '%fooValue%'
     * </code>
     *
     * @param     string $url The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTechQuery The current query, for fluid interface
     */
    public function filterByUrl($url = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($url)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $url)) {
                $url = str_replace('*', '%', $url);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TechTableMap::COL_URL, $url, $comparison);
    }

    /**
     * Filter the query on the hot column
     *
     * Example usage:
     * <code>
     * $query->filterByHot(1234); // WHERE hot = 1234
     * $query->filterByHot(array(12, 34)); // WHERE hot IN (12, 34)
     * $query->filterByHot(array('min' => 12)); // WHERE hot > 12
     * </code>
     *
     * @param     mixed $hot The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTechQuery The current query, for fluid interface
     */
    public function filterByHot($hot = null, $comparison = null)
    {
        if (is_array($hot)) {
            $useMinMax = false;
            if (isset($hot['min'])) {
                $this->addUsingAlias(TechTableMap::COL_HOT, $hot['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($hot['max'])) {
                $this->addUsingAlias(TechTableMap::COL_HOT, $hot['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TechTableMap::COL_HOT, $hot, $comparison);
    }

    /**
     * Filter the query on the created column
     *
     * Example usage:
     * <code>
     * $query->filterByCreated('2011-03-14'); // WHERE created = '2011-03-14'
     * $query->filterByCreated('now'); // WHERE created = '2011-03-14'
     * $query->filterByCreated(array('max' => 'yesterday')); // WHERE created > '2011-03-13'
     * </code>
     *
     * @param     mixed $created The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTechQuery The current query, for fluid interface
     */
    public function filterByCreated($created = null, $comparison = null)
    {
        if (is_array($created)) {
            $useMinMax = false;
            if (isset($created['min'])) {
                $this->addUsingAlias(TechTableMap::COL_CREATED, $created['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($created['max'])) {
                $this->addUsingAlias(TechTableMap::COL_CREATED, $created['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TechTableMap::COL_CREATED, $created, $comparison);
    }

    /**
     * Filter the query on the updated column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdated('2011-03-14'); // WHERE updated = '2011-03-14'
     * $query->filterByUpdated('now'); // WHERE updated = '2011-03-14'
     * $query->filterByUpdated(array('max' => 'yesterday')); // WHERE updated > '2011-03-13'
     * </code>
     *
     * @param     mixed $updated The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTechQuery The current query, for fluid interface
     */
    public function filterByUpdated($updated = null, $comparison = null)
    {
        if (is_array($updated)) {
            $useMinMax = false;
            if (isset($updated['min'])) {
                $this->addUsingAlias(TechTableMap::COL_UPDATED, $updated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updated['max'])) {
                $this->addUsingAlias(TechTableMap::COL_UPDATED, $updated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TechTableMap::COL_UPDATED, $updated, $comparison);
    }

    /**
     * Filter the query on the deleted column
     *
     * Example usage:
     * <code>
     * $query->filterByDeleted('2011-03-14'); // WHERE deleted = '2011-03-14'
     * $query->filterByDeleted('now'); // WHERE deleted = '2011-03-14'
     * $query->filterByDeleted(array('max' => 'yesterday')); // WHERE deleted > '2011-03-13'
     * </code>
     *
     * @param     mixed $deleted The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTechQuery The current query, for fluid interface
     */
    public function filterByDeleted($deleted = null, $comparison = null)
    {
        if (is_array($deleted)) {
            $useMinMax = false;
            if (isset($deleted['min'])) {
                $this->addUsingAlias(TechTableMap::COL_DELETED, $deleted['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($deleted['max'])) {
                $this->addUsingAlias(TechTableMap::COL_DELETED, $deleted['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TechTableMap::COL_DELETED, $deleted, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildTech $tech Object to remove from the list of results
     *
     * @return $this|ChildTechQuery The current query, for fluid interface
     */
    public function prune($tech = null)
    {
        if ($tech) {
            $this->addUsingAlias(TechTableMap::COL_TECH_ID, $tech->getTechId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the tech table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TechTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            TechTableMap::clearInstancePool();
            TechTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TechTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(TechTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            TechTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            TechTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // TechQuery
