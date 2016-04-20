<?php

namespace Model\Base;

use \Exception;
use \PDO;
use Model\TaskTech as ChildTaskTech;
use Model\TaskTechQuery as ChildTaskTechQuery;
use Model\Map\TaskTechTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'task_tech' table.
 *
 * 任务-技术关联表
 *
 * @method     ChildTaskTechQuery orderByTaskId($order = Criteria::ASC) Order by the task_id column
 * @method     ChildTaskTechQuery orderByTechId($order = Criteria::ASC) Order by the tech_id column
 *
 * @method     ChildTaskTechQuery groupByTaskId() Group by the task_id column
 * @method     ChildTaskTechQuery groupByTechId() Group by the tech_id column
 *
 * @method     ChildTaskTechQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildTaskTechQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildTaskTechQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildTaskTechQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildTaskTechQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildTaskTechQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildTaskTechQuery leftJoinTask($relationAlias = null) Adds a LEFT JOIN clause to the query using the Task relation
 * @method     ChildTaskTechQuery rightJoinTask($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Task relation
 * @method     ChildTaskTechQuery innerJoinTask($relationAlias = null) Adds a INNER JOIN clause to the query using the Task relation
 *
 * @method     ChildTaskTechQuery joinWithTask($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Task relation
 *
 * @method     ChildTaskTechQuery leftJoinWithTask() Adds a LEFT JOIN clause and with to the query using the Task relation
 * @method     ChildTaskTechQuery rightJoinWithTask() Adds a RIGHT JOIN clause and with to the query using the Task relation
 * @method     ChildTaskTechQuery innerJoinWithTask() Adds a INNER JOIN clause and with to the query using the Task relation
 *
 * @method     ChildTaskTechQuery leftJoinTech($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tech relation
 * @method     ChildTaskTechQuery rightJoinTech($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tech relation
 * @method     ChildTaskTechQuery innerJoinTech($relationAlias = null) Adds a INNER JOIN clause to the query using the Tech relation
 *
 * @method     ChildTaskTechQuery joinWithTech($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Tech relation
 *
 * @method     ChildTaskTechQuery leftJoinWithTech() Adds a LEFT JOIN clause and with to the query using the Tech relation
 * @method     ChildTaskTechQuery rightJoinWithTech() Adds a RIGHT JOIN clause and with to the query using the Tech relation
 * @method     ChildTaskTechQuery innerJoinWithTech() Adds a INNER JOIN clause and with to the query using the Tech relation
 *
 * @method     \Model\TaskQuery|\Model\TechQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildTaskTech findOne(ConnectionInterface $con = null) Return the first ChildTaskTech matching the query
 * @method     ChildTaskTech findOneOrCreate(ConnectionInterface $con = null) Return the first ChildTaskTech matching the query, or a new ChildTaskTech object populated from the query conditions when no match is found
 *
 * @method     ChildTaskTech findOneByTaskId(string $task_id) Return the first ChildTaskTech filtered by the task_id column
 * @method     ChildTaskTech findOneByTechId(string $tech_id) Return the first ChildTaskTech filtered by the tech_id column *

 * @method     ChildTaskTech requirePk($key, ConnectionInterface $con = null) Return the ChildTaskTech by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTaskTech requireOne(ConnectionInterface $con = null) Return the first ChildTaskTech matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTaskTech requireOneByTaskId(string $task_id) Return the first ChildTaskTech filtered by the task_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTaskTech requireOneByTechId(string $tech_id) Return the first ChildTaskTech filtered by the tech_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTaskTech[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildTaskTech objects based on current ModelCriteria
 * @method     ChildTaskTech[]|ObjectCollection findByTaskId(string $task_id) Return ChildTaskTech objects filtered by the task_id column
 * @method     ChildTaskTech[]|ObjectCollection findByTechId(string $tech_id) Return ChildTaskTech objects filtered by the tech_id column
 * @method     ChildTaskTech[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class TaskTechQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Model\Base\TaskTechQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'leno', $modelName = '\\Model\\TaskTech', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildTaskTechQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildTaskTechQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildTaskTechQuery) {
            return $criteria;
        }
        $query = new ChildTaskTechQuery();
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
     * $obj = $c->findPk(array(12, 34), $con);
     * </code>
     *
     * @param array[$task_id, $tech_id] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildTaskTech|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(TaskTechTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = TaskTechTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
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
     * @return ChildTaskTech A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT task_id, tech_id FROM task_tech WHERE task_id = :p0 AND tech_id = :p1';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_STR);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildTaskTech $obj */
            $obj = new ChildTaskTech();
            $obj->hydrate($row);
            TaskTechTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
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
     * @return ChildTaskTech|array|mixed the result, formatted by the current formatter
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
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
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
     * @return $this|ChildTaskTechQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(TaskTechTableMap::COL_TASK_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(TaskTechTableMap::COL_TECH_ID, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildTaskTechQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(TaskTechTableMap::COL_TASK_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(TaskTechTableMap::COL_TECH_ID, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the task_id column
     *
     * Example usage:
     * <code>
     * $query->filterByTaskId('fooValue');   // WHERE task_id = 'fooValue'
     * $query->filterByTaskId('%fooValue%'); // WHERE task_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $taskId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTaskTechQuery The current query, for fluid interface
     */
    public function filterByTaskId($taskId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($taskId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $taskId)) {
                $taskId = str_replace('*', '%', $taskId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TaskTechTableMap::COL_TASK_ID, $taskId, $comparison);
    }

    /**
     * Filter the query on the tech_id column
     *
     * Example usage:
     * <code>
     * $query->filterByTechId('fooValue');   // WHERE tech_id = 'fooValue'
     * $query->filterByTechId('%fooValue%'); // WHERE tech_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $techId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTaskTechQuery The current query, for fluid interface
     */
    public function filterByTechId($techId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($techId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $techId)) {
                $techId = str_replace('*', '%', $techId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TaskTechTableMap::COL_TECH_ID, $techId, $comparison);
    }

    /**
     * Filter the query by a related \Model\Task object
     *
     * @param \Model\Task|ObjectCollection $task The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildTaskTechQuery The current query, for fluid interface
     */
    public function filterByTask($task, $comparison = null)
    {
        if ($task instanceof \Model\Task) {
            return $this
                ->addUsingAlias(TaskTechTableMap::COL_TASK_ID, $task->getId(), $comparison);
        } elseif ($task instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TaskTechTableMap::COL_TASK_ID, $task->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByTask() only accepts arguments of type \Model\Task or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Task relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildTaskTechQuery The current query, for fluid interface
     */
    public function joinTask($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Task');

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
            $this->addJoinObject($join, 'Task');
        }

        return $this;
    }

    /**
     * Use the Task relation Task object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Model\TaskQuery A secondary query class using the current class as primary query
     */
    public function useTaskQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTask($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Task', '\Model\TaskQuery');
    }

    /**
     * Filter the query by a related \Model\Tech object
     *
     * @param \Model\Tech|ObjectCollection $tech The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildTaskTechQuery The current query, for fluid interface
     */
    public function filterByTech($tech, $comparison = null)
    {
        if ($tech instanceof \Model\Tech) {
            return $this
                ->addUsingAlias(TaskTechTableMap::COL_TECH_ID, $tech->getId(), $comparison);
        } elseif ($tech instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TaskTechTableMap::COL_TECH_ID, $tech->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByTech() only accepts arguments of type \Model\Tech or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Tech relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildTaskTechQuery The current query, for fluid interface
     */
    public function joinTech($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Tech');

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
            $this->addJoinObject($join, 'Tech');
        }

        return $this;
    }

    /**
     * Use the Tech relation Tech object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Model\TechQuery A secondary query class using the current class as primary query
     */
    public function useTechQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTech($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Tech', '\Model\TechQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildTaskTech $taskTech Object to remove from the list of results
     *
     * @return $this|ChildTaskTechQuery The current query, for fluid interface
     */
    public function prune($taskTech = null)
    {
        if ($taskTech) {
            $this->addCond('pruneCond0', $this->getAliasedColName(TaskTechTableMap::COL_TASK_ID), $taskTech->getTaskId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(TaskTechTableMap::COL_TECH_ID), $taskTech->getTechId(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the task_tech table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TaskTechTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            TaskTechTableMap::clearInstancePool();
            TaskTechTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(TaskTechTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(TaskTechTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            TaskTechTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            TaskTechTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // TaskTechQuery
