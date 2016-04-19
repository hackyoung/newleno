<?php

namespace Base;

use \Task as ChildTask;
use \TaskQuery as ChildTaskQuery;
use \Exception;
use \PDO;
use Map\TaskTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'task' table.
 *
 *
 *
 * @method     ChildTaskQuery orderByTaskId($order = Criteria::ASC) Order by the task_id column
 * @method     ChildTaskQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     ChildTaskQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     ChildTaskQuery orderByRequirement($order = Criteria::ASC) Order by the requirement column
 * @method     ChildTaskQuery orderByTechIds($order = Criteria::ASC) Order by the tech_ids column
 * @method     ChildTaskQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildTaskQuery orderByMinPrice($order = Criteria::ASC) Order by the min_price column
 * @method     ChildTaskQuery orderByMaxPrice($order = Criteria::ASC) Order by the max_price column
 * @method     ChildTaskQuery orderByPrice($order = Criteria::ASC) Order by the price column
 * @method     ChildTaskQuery orderByCreatorId($order = Criteria::ASC) Order by the creator_id column
 * @method     ChildTaskQuery orderByHelperId($order = Criteria::ASC) Order by the helper_id column
 * @method     ChildTaskQuery orderByCatId($order = Criteria::ASC) Order by the cat_id column
 * @method     ChildTaskQuery orderByCreated($order = Criteria::ASC) Order by the created column
 * @method     ChildTaskQuery orderByUpdated($order = Criteria::ASC) Order by the updated column
 * @method     ChildTaskQuery orderByDeleted($order = Criteria::ASC) Order by the deleted column
 *
 * @method     ChildTaskQuery groupByTaskId() Group by the task_id column
 * @method     ChildTaskQuery groupByTitle() Group by the title column
 * @method     ChildTaskQuery groupByDescription() Group by the description column
 * @method     ChildTaskQuery groupByRequirement() Group by the requirement column
 * @method     ChildTaskQuery groupByTechIds() Group by the tech_ids column
 * @method     ChildTaskQuery groupByStatus() Group by the status column
 * @method     ChildTaskQuery groupByMinPrice() Group by the min_price column
 * @method     ChildTaskQuery groupByMaxPrice() Group by the max_price column
 * @method     ChildTaskQuery groupByPrice() Group by the price column
 * @method     ChildTaskQuery groupByCreatorId() Group by the creator_id column
 * @method     ChildTaskQuery groupByHelperId() Group by the helper_id column
 * @method     ChildTaskQuery groupByCatId() Group by the cat_id column
 * @method     ChildTaskQuery groupByCreated() Group by the created column
 * @method     ChildTaskQuery groupByUpdated() Group by the updated column
 * @method     ChildTaskQuery groupByDeleted() Group by the deleted column
 *
 * @method     ChildTaskQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildTaskQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildTaskQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildTaskQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildTaskQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildTaskQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildTaskQuery leftJoinUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the User relation
 * @method     ChildTaskQuery rightJoinUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the User relation
 * @method     ChildTaskQuery innerJoinUser($relationAlias = null) Adds a INNER JOIN clause to the query using the User relation
 *
 * @method     ChildTaskQuery joinWithUser($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the User relation
 *
 * @method     ChildTaskQuery leftJoinWithUser() Adds a LEFT JOIN clause and with to the query using the User relation
 * @method     ChildTaskQuery rightJoinWithUser() Adds a RIGHT JOIN clause and with to the query using the User relation
 * @method     ChildTaskQuery innerJoinWithUser() Adds a INNER JOIN clause and with to the query using the User relation
 *
 * @method     ChildTaskQuery leftJoinCate($relationAlias = null) Adds a LEFT JOIN clause to the query using the Cate relation
 * @method     ChildTaskQuery rightJoinCate($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Cate relation
 * @method     ChildTaskQuery innerJoinCate($relationAlias = null) Adds a INNER JOIN clause to the query using the Cate relation
 *
 * @method     ChildTaskQuery joinWithCate($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Cate relation
 *
 * @method     ChildTaskQuery leftJoinWithCate() Adds a LEFT JOIN clause and with to the query using the Cate relation
 * @method     ChildTaskQuery rightJoinWithCate() Adds a RIGHT JOIN clause and with to the query using the Cate relation
 * @method     ChildTaskQuery innerJoinWithCate() Adds a INNER JOIN clause and with to the query using the Cate relation
 *
 * @method     \UserQuery|\CateQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildTask findOne(ConnectionInterface $con = null) Return the first ChildTask matching the query
 * @method     ChildTask findOneOrCreate(ConnectionInterface $con = null) Return the first ChildTask matching the query, or a new ChildTask object populated from the query conditions when no match is found
 *
 * @method     ChildTask findOneByTaskId(int $task_id) Return the first ChildTask filtered by the task_id column
 * @method     ChildTask findOneByTitle(string $title) Return the first ChildTask filtered by the title column
 * @method     ChildTask findOneByDescription(string $description) Return the first ChildTask filtered by the description column
 * @method     ChildTask findOneByRequirement(string $requirement) Return the first ChildTask filtered by the requirement column
 * @method     ChildTask findOneByTechIds(string $tech_ids) Return the first ChildTask filtered by the tech_ids column
 * @method     ChildTask findOneByStatus(string $status) Return the first ChildTask filtered by the status column
 * @method     ChildTask findOneByMinPrice(int $min_price) Return the first ChildTask filtered by the min_price column
 * @method     ChildTask findOneByMaxPrice(int $max_price) Return the first ChildTask filtered by the max_price column
 * @method     ChildTask findOneByPrice(int $price) Return the first ChildTask filtered by the price column
 * @method     ChildTask findOneByCreatorId(int $creator_id) Return the first ChildTask filtered by the creator_id column
 * @method     ChildTask findOneByHelperId(int $helper_id) Return the first ChildTask filtered by the helper_id column
 * @method     ChildTask findOneByCatId(int $cat_id) Return the first ChildTask filtered by the cat_id column
 * @method     ChildTask findOneByCreated(string $created) Return the first ChildTask filtered by the created column
 * @method     ChildTask findOneByUpdated(string $updated) Return the first ChildTask filtered by the updated column
 * @method     ChildTask findOneByDeleted(string $deleted) Return the first ChildTask filtered by the deleted column *

 * @method     ChildTask requirePk($key, ConnectionInterface $con = null) Return the ChildTask by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTask requireOne(ConnectionInterface $con = null) Return the first ChildTask matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTask requireOneByTaskId(int $task_id) Return the first ChildTask filtered by the task_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTask requireOneByTitle(string $title) Return the first ChildTask filtered by the title column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTask requireOneByDescription(string $description) Return the first ChildTask filtered by the description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTask requireOneByRequirement(string $requirement) Return the first ChildTask filtered by the requirement column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTask requireOneByTechIds(string $tech_ids) Return the first ChildTask filtered by the tech_ids column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTask requireOneByStatus(string $status) Return the first ChildTask filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTask requireOneByMinPrice(int $min_price) Return the first ChildTask filtered by the min_price column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTask requireOneByMaxPrice(int $max_price) Return the first ChildTask filtered by the max_price column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTask requireOneByPrice(int $price) Return the first ChildTask filtered by the price column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTask requireOneByCreatorId(int $creator_id) Return the first ChildTask filtered by the creator_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTask requireOneByHelperId(int $helper_id) Return the first ChildTask filtered by the helper_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTask requireOneByCatId(int $cat_id) Return the first ChildTask filtered by the cat_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTask requireOneByCreated(string $created) Return the first ChildTask filtered by the created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTask requireOneByUpdated(string $updated) Return the first ChildTask filtered by the updated column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTask requireOneByDeleted(string $deleted) Return the first ChildTask filtered by the deleted column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTask[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildTask objects based on current ModelCriteria
 * @method     ChildTask[]|ObjectCollection findByTaskId(int $task_id) Return ChildTask objects filtered by the task_id column
 * @method     ChildTask[]|ObjectCollection findByTitle(string $title) Return ChildTask objects filtered by the title column
 * @method     ChildTask[]|ObjectCollection findByDescription(string $description) Return ChildTask objects filtered by the description column
 * @method     ChildTask[]|ObjectCollection findByRequirement(string $requirement) Return ChildTask objects filtered by the requirement column
 * @method     ChildTask[]|ObjectCollection findByTechIds(string $tech_ids) Return ChildTask objects filtered by the tech_ids column
 * @method     ChildTask[]|ObjectCollection findByStatus(string $status) Return ChildTask objects filtered by the status column
 * @method     ChildTask[]|ObjectCollection findByMinPrice(int $min_price) Return ChildTask objects filtered by the min_price column
 * @method     ChildTask[]|ObjectCollection findByMaxPrice(int $max_price) Return ChildTask objects filtered by the max_price column
 * @method     ChildTask[]|ObjectCollection findByPrice(int $price) Return ChildTask objects filtered by the price column
 * @method     ChildTask[]|ObjectCollection findByCreatorId(int $creator_id) Return ChildTask objects filtered by the creator_id column
 * @method     ChildTask[]|ObjectCollection findByHelperId(int $helper_id) Return ChildTask objects filtered by the helper_id column
 * @method     ChildTask[]|ObjectCollection findByCatId(int $cat_id) Return ChildTask objects filtered by the cat_id column
 * @method     ChildTask[]|ObjectCollection findByCreated(string $created) Return ChildTask objects filtered by the created column
 * @method     ChildTask[]|ObjectCollection findByUpdated(string $updated) Return ChildTask objects filtered by the updated column
 * @method     ChildTask[]|ObjectCollection findByDeleted(string $deleted) Return ChildTask objects filtered by the deleted column
 * @method     ChildTask[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class TaskQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\TaskQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'leno', $modelName = '\\Task', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildTaskQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildTaskQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildTaskQuery) {
            return $criteria;
        }
        $query = new ChildTaskQuery();
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
     * @return ChildTask|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(TaskTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = TaskTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildTask A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT task_id, title, description, requirement, tech_ids, status, min_price, max_price, price, creator_id, helper_id, cat_id, created, updated, deleted FROM task WHERE task_id = :p0';
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
            /** @var ChildTask $obj */
            $obj = new ChildTask();
            $obj->hydrate($row);
            TaskTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildTask|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildTaskQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TaskTableMap::COL_TASK_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildTaskQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TaskTableMap::COL_TASK_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the task_id column
     *
     * Example usage:
     * <code>
     * $query->filterByTaskId(1234); // WHERE task_id = 1234
     * $query->filterByTaskId(array(12, 34)); // WHERE task_id IN (12, 34)
     * $query->filterByTaskId(array('min' => 12)); // WHERE task_id > 12
     * </code>
     *
     * @param     mixed $taskId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTaskQuery The current query, for fluid interface
     */
    public function filterByTaskId($taskId = null, $comparison = null)
    {
        if (is_array($taskId)) {
            $useMinMax = false;
            if (isset($taskId['min'])) {
                $this->addUsingAlias(TaskTableMap::COL_TASK_ID, $taskId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($taskId['max'])) {
                $this->addUsingAlias(TaskTableMap::COL_TASK_ID, $taskId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TaskTableMap::COL_TASK_ID, $taskId, $comparison);
    }

    /**
     * Filter the query on the title column
     *
     * Example usage:
     * <code>
     * $query->filterByTitle('fooValue');   // WHERE title = 'fooValue'
     * $query->filterByTitle('%fooValue%'); // WHERE title LIKE '%fooValue%'
     * </code>
     *
     * @param     string $title The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTaskQuery The current query, for fluid interface
     */
    public function filterByTitle($title = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($title)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $title)) {
                $title = str_replace('*', '%', $title);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TaskTableMap::COL_TITLE, $title, $comparison);
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
     * @return $this|ChildTaskQuery The current query, for fluid interface
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

        return $this->addUsingAlias(TaskTableMap::COL_DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query on the requirement column
     *
     * Example usage:
     * <code>
     * $query->filterByRequirement('fooValue');   // WHERE requirement = 'fooValue'
     * $query->filterByRequirement('%fooValue%'); // WHERE requirement LIKE '%fooValue%'
     * </code>
     *
     * @param     string $requirement The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTaskQuery The current query, for fluid interface
     */
    public function filterByRequirement($requirement = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($requirement)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $requirement)) {
                $requirement = str_replace('*', '%', $requirement);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TaskTableMap::COL_REQUIREMENT, $requirement, $comparison);
    }

    /**
     * Filter the query on the tech_ids column
     *
     * Example usage:
     * <code>
     * $query->filterByTechIds('fooValue');   // WHERE tech_ids = 'fooValue'
     * $query->filterByTechIds('%fooValue%'); // WHERE tech_ids LIKE '%fooValue%'
     * </code>
     *
     * @param     string $techIds The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTaskQuery The current query, for fluid interface
     */
    public function filterByTechIds($techIds = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($techIds)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $techIds)) {
                $techIds = str_replace('*', '%', $techIds);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TaskTableMap::COL_TECH_IDS, $techIds, $comparison);
    }

    /**
     * Filter the query on the status column
     *
     * Example usage:
     * <code>
     * $query->filterByStatus('fooValue');   // WHERE status = 'fooValue'
     * $query->filterByStatus('%fooValue%'); // WHERE status LIKE '%fooValue%'
     * </code>
     *
     * @param     string $status The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTaskQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($status)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $status)) {
                $status = str_replace('*', '%', $status);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TaskTableMap::COL_STATUS, $status, $comparison);
    }

    /**
     * Filter the query on the min_price column
     *
     * Example usage:
     * <code>
     * $query->filterByMinPrice(1234); // WHERE min_price = 1234
     * $query->filterByMinPrice(array(12, 34)); // WHERE min_price IN (12, 34)
     * $query->filterByMinPrice(array('min' => 12)); // WHERE min_price > 12
     * </code>
     *
     * @param     mixed $minPrice The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTaskQuery The current query, for fluid interface
     */
    public function filterByMinPrice($minPrice = null, $comparison = null)
    {
        if (is_array($minPrice)) {
            $useMinMax = false;
            if (isset($minPrice['min'])) {
                $this->addUsingAlias(TaskTableMap::COL_MIN_PRICE, $minPrice['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($minPrice['max'])) {
                $this->addUsingAlias(TaskTableMap::COL_MIN_PRICE, $minPrice['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TaskTableMap::COL_MIN_PRICE, $minPrice, $comparison);
    }

    /**
     * Filter the query on the max_price column
     *
     * Example usage:
     * <code>
     * $query->filterByMaxPrice(1234); // WHERE max_price = 1234
     * $query->filterByMaxPrice(array(12, 34)); // WHERE max_price IN (12, 34)
     * $query->filterByMaxPrice(array('min' => 12)); // WHERE max_price > 12
     * </code>
     *
     * @param     mixed $maxPrice The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTaskQuery The current query, for fluid interface
     */
    public function filterByMaxPrice($maxPrice = null, $comparison = null)
    {
        if (is_array($maxPrice)) {
            $useMinMax = false;
            if (isset($maxPrice['min'])) {
                $this->addUsingAlias(TaskTableMap::COL_MAX_PRICE, $maxPrice['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($maxPrice['max'])) {
                $this->addUsingAlias(TaskTableMap::COL_MAX_PRICE, $maxPrice['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TaskTableMap::COL_MAX_PRICE, $maxPrice, $comparison);
    }

    /**
     * Filter the query on the price column
     *
     * Example usage:
     * <code>
     * $query->filterByPrice(1234); // WHERE price = 1234
     * $query->filterByPrice(array(12, 34)); // WHERE price IN (12, 34)
     * $query->filterByPrice(array('min' => 12)); // WHERE price > 12
     * </code>
     *
     * @param     mixed $price The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTaskQuery The current query, for fluid interface
     */
    public function filterByPrice($price = null, $comparison = null)
    {
        if (is_array($price)) {
            $useMinMax = false;
            if (isset($price['min'])) {
                $this->addUsingAlias(TaskTableMap::COL_PRICE, $price['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($price['max'])) {
                $this->addUsingAlias(TaskTableMap::COL_PRICE, $price['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TaskTableMap::COL_PRICE, $price, $comparison);
    }

    /**
     * Filter the query on the creator_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatorId(1234); // WHERE creator_id = 1234
     * $query->filterByCreatorId(array(12, 34)); // WHERE creator_id IN (12, 34)
     * $query->filterByCreatorId(array('min' => 12)); // WHERE creator_id > 12
     * </code>
     *
     * @see       filterByUser()
     *
     * @param     mixed $creatorId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTaskQuery The current query, for fluid interface
     */
    public function filterByCreatorId($creatorId = null, $comparison = null)
    {
        if (is_array($creatorId)) {
            $useMinMax = false;
            if (isset($creatorId['min'])) {
                $this->addUsingAlias(TaskTableMap::COL_CREATOR_ID, $creatorId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($creatorId['max'])) {
                $this->addUsingAlias(TaskTableMap::COL_CREATOR_ID, $creatorId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TaskTableMap::COL_CREATOR_ID, $creatorId, $comparison);
    }

    /**
     * Filter the query on the helper_id column
     *
     * Example usage:
     * <code>
     * $query->filterByHelperId(1234); // WHERE helper_id = 1234
     * $query->filterByHelperId(array(12, 34)); // WHERE helper_id IN (12, 34)
     * $query->filterByHelperId(array('min' => 12)); // WHERE helper_id > 12
     * </code>
     *
     * @see       filterByUser()
     *
     * @param     mixed $helperId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTaskQuery The current query, for fluid interface
     */
    public function filterByHelperId($helperId = null, $comparison = null)
    {
        if (is_array($helperId)) {
            $useMinMax = false;
            if (isset($helperId['min'])) {
                $this->addUsingAlias(TaskTableMap::COL_HELPER_ID, $helperId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($helperId['max'])) {
                $this->addUsingAlias(TaskTableMap::COL_HELPER_ID, $helperId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TaskTableMap::COL_HELPER_ID, $helperId, $comparison);
    }

    /**
     * Filter the query on the cat_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCatId(1234); // WHERE cat_id = 1234
     * $query->filterByCatId(array(12, 34)); // WHERE cat_id IN (12, 34)
     * $query->filterByCatId(array('min' => 12)); // WHERE cat_id > 12
     * </code>
     *
     * @see       filterByCate()
     *
     * @param     mixed $catId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTaskQuery The current query, for fluid interface
     */
    public function filterByCatId($catId = null, $comparison = null)
    {
        if (is_array($catId)) {
            $useMinMax = false;
            if (isset($catId['min'])) {
                $this->addUsingAlias(TaskTableMap::COL_CAT_ID, $catId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($catId['max'])) {
                $this->addUsingAlias(TaskTableMap::COL_CAT_ID, $catId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TaskTableMap::COL_CAT_ID, $catId, $comparison);
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
     * @return $this|ChildTaskQuery The current query, for fluid interface
     */
    public function filterByCreated($created = null, $comparison = null)
    {
        if (is_array($created)) {
            $useMinMax = false;
            if (isset($created['min'])) {
                $this->addUsingAlias(TaskTableMap::COL_CREATED, $created['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($created['max'])) {
                $this->addUsingAlias(TaskTableMap::COL_CREATED, $created['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TaskTableMap::COL_CREATED, $created, $comparison);
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
     * @return $this|ChildTaskQuery The current query, for fluid interface
     */
    public function filterByUpdated($updated = null, $comparison = null)
    {
        if (is_array($updated)) {
            $useMinMax = false;
            if (isset($updated['min'])) {
                $this->addUsingAlias(TaskTableMap::COL_UPDATED, $updated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updated['max'])) {
                $this->addUsingAlias(TaskTableMap::COL_UPDATED, $updated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TaskTableMap::COL_UPDATED, $updated, $comparison);
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
     * @return $this|ChildTaskQuery The current query, for fluid interface
     */
    public function filterByDeleted($deleted = null, $comparison = null)
    {
        if (is_array($deleted)) {
            $useMinMax = false;
            if (isset($deleted['min'])) {
                $this->addUsingAlias(TaskTableMap::COL_DELETED, $deleted['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($deleted['max'])) {
                $this->addUsingAlias(TaskTableMap::COL_DELETED, $deleted['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TaskTableMap::COL_DELETED, $deleted, $comparison);
    }

    /**
     * Filter the query by a related \User object
     *
     * @param \User $user The related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildTaskQuery The current query, for fluid interface
     */
    public function filterByUser($user, $comparison = null)
    {
        if ($user instanceof \User) {
            return $this
                ->addUsingAlias(TaskTableMap::COL_CREATOR_ID, $user->getUserId(), $comparison)
                ->addUsingAlias(TaskTableMap::COL_HELPER_ID, $user->getUserId(), $comparison);
        } else {
            throw new PropelException('filterByUser() only accepts arguments of type \User');
        }
    }

    /**
     * Adds a JOIN clause to the query using the User relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildTaskQuery The current query, for fluid interface
     */
    public function joinUser($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('User');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'User');
        }

        return $this;
    }

    /**
     * Use the User relation User object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \UserQuery A secondary query class using the current class as primary query
     */
    public function useUserQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinUser($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'User', '\UserQuery');
    }

    /**
     * Filter the query by a related \Cate object
     *
     * @param \Cate|ObjectCollection $cate The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildTaskQuery The current query, for fluid interface
     */
    public function filterByCate($cate, $comparison = null)
    {
        if ($cate instanceof \Cate) {
            return $this
                ->addUsingAlias(TaskTableMap::COL_CAT_ID, $cate->getCatId(), $comparison);
        } elseif ($cate instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TaskTableMap::COL_CAT_ID, $cate->toKeyValue('PrimaryKey', 'CatId'), $comparison);
        } else {
            throw new PropelException('filterByCate() only accepts arguments of type \Cate or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Cate relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildTaskQuery The current query, for fluid interface
     */
    public function joinCate($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Cate');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Cate');
        }

        return $this;
    }

    /**
     * Use the Cate relation Cate object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CateQuery A secondary query class using the current class as primary query
     */
    public function useCateQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCate($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Cate', '\CateQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildTask $task Object to remove from the list of results
     *
     * @return $this|ChildTaskQuery The current query, for fluid interface
     */
    public function prune($task = null)
    {
        if ($task) {
            $this->addUsingAlias(TaskTableMap::COL_TASK_ID, $task->getTaskId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the task table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TaskTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            TaskTableMap::clearInstancePool();
            TaskTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(TaskTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(TaskTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            TaskTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            TaskTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // TaskQuery
