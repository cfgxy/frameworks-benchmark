<?php

namespace App\Models\Propel\Base;

use \Exception;
use \PDO;
use App\Models\Propel\CommonTypeForPropel as ChildCommonTypeForPropel;
use App\Models\Propel\CommonTypeForPropelQuery as ChildCommonTypeForPropelQuery;
use App\Models\Propel\Map\CommonTypeForPropelTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 't_types' table.
 *
 *
 *
 * @method     ChildCommonTypeForPropelQuery orderByTypeId($order = Criteria::ASC) Order by the type_id column
 * @method     ChildCommonTypeForPropelQuery orderByParentId($order = Criteria::ASC) Order by the parent_id column
 * @method     ChildCommonTypeForPropelQuery orderByLeftSeq($order = Criteria::ASC) Order by the left_seq column
 * @method     ChildCommonTypeForPropelQuery orderByRightSeq($order = Criteria::ASC) Order by the right_seq column
 * @method     ChildCommonTypeForPropelQuery orderByLevel($order = Criteria::ASC) Order by the level column
 * @method     ChildCommonTypeForPropelQuery orderByTypeName($order = Criteria::ASC) Order by the type_name column
 * @method     ChildCommonTypeForPropelQuery orderByNodePath($order = Criteria::ASC) Order by the node_path column
 * @method     ChildCommonTypeForPropelQuery orderByFileJs($order = Criteria::ASC) Order by the file_js column
 * @method     ChildCommonTypeForPropelQuery orderByFilePhp($order = Criteria::ASC) Order by the file_php column
 * @method     ChildCommonTypeForPropelQuery orderByTypeShow($order = Criteria::ASC) Order by the type_show column
 *
 * @method     ChildCommonTypeForPropelQuery groupByTypeId() Group by the type_id column
 * @method     ChildCommonTypeForPropelQuery groupByParentId() Group by the parent_id column
 * @method     ChildCommonTypeForPropelQuery groupByLeftSeq() Group by the left_seq column
 * @method     ChildCommonTypeForPropelQuery groupByRightSeq() Group by the right_seq column
 * @method     ChildCommonTypeForPropelQuery groupByLevel() Group by the level column
 * @method     ChildCommonTypeForPropelQuery groupByTypeName() Group by the type_name column
 * @method     ChildCommonTypeForPropelQuery groupByNodePath() Group by the node_path column
 * @method     ChildCommonTypeForPropelQuery groupByFileJs() Group by the file_js column
 * @method     ChildCommonTypeForPropelQuery groupByFilePhp() Group by the file_php column
 * @method     ChildCommonTypeForPropelQuery groupByTypeShow() Group by the type_show column
 *
 * @method     ChildCommonTypeForPropelQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildCommonTypeForPropelQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildCommonTypeForPropelQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildCommonTypeForPropelQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildCommonTypeForPropelQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildCommonTypeForPropelQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildCommonTypeForPropel|null findOne(ConnectionInterface $con = null) Return the first ChildCommonTypeForPropel matching the query
 * @method     ChildCommonTypeForPropel findOneOrCreate(ConnectionInterface $con = null) Return the first ChildCommonTypeForPropel matching the query, or a new ChildCommonTypeForPropel object populated from the query conditions when no match is found
 *
 * @method     ChildCommonTypeForPropel|null findOneByTypeId(int $type_id) Return the first ChildCommonTypeForPropel filtered by the type_id column
 * @method     ChildCommonTypeForPropel|null findOneByParentId(int $parent_id) Return the first ChildCommonTypeForPropel filtered by the parent_id column
 * @method     ChildCommonTypeForPropel|null findOneByLeftSeq(int $left_seq) Return the first ChildCommonTypeForPropel filtered by the left_seq column
 * @method     ChildCommonTypeForPropel|null findOneByRightSeq(int $right_seq) Return the first ChildCommonTypeForPropel filtered by the right_seq column
 * @method     ChildCommonTypeForPropel|null findOneByLevel(int $level) Return the first ChildCommonTypeForPropel filtered by the level column
 * @method     ChildCommonTypeForPropel|null findOneByTypeName(string $type_name) Return the first ChildCommonTypeForPropel filtered by the type_name column
 * @method     ChildCommonTypeForPropel|null findOneByNodePath(string $node_path) Return the first ChildCommonTypeForPropel filtered by the node_path column
 * @method     ChildCommonTypeForPropel|null findOneByFileJs(int $file_js) Return the first ChildCommonTypeForPropel filtered by the file_js column
 * @method     ChildCommonTypeForPropel|null findOneByFilePhp(int $file_php) Return the first ChildCommonTypeForPropel filtered by the file_php column
 * @method     ChildCommonTypeForPropel|null findOneByTypeShow(int $type_show) Return the first ChildCommonTypeForPropel filtered by the type_show column *

 * @method     ChildCommonTypeForPropel requirePk($key, ConnectionInterface $con = null) Return the ChildCommonTypeForPropel by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCommonTypeForPropel requireOne(ConnectionInterface $con = null) Return the first ChildCommonTypeForPropel matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCommonTypeForPropel requireOneByTypeId(int $type_id) Return the first ChildCommonTypeForPropel filtered by the type_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCommonTypeForPropel requireOneByParentId(int $parent_id) Return the first ChildCommonTypeForPropel filtered by the parent_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCommonTypeForPropel requireOneByLeftSeq(int $left_seq) Return the first ChildCommonTypeForPropel filtered by the left_seq column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCommonTypeForPropel requireOneByRightSeq(int $right_seq) Return the first ChildCommonTypeForPropel filtered by the right_seq column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCommonTypeForPropel requireOneByLevel(int $level) Return the first ChildCommonTypeForPropel filtered by the level column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCommonTypeForPropel requireOneByTypeName(string $type_name) Return the first ChildCommonTypeForPropel filtered by the type_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCommonTypeForPropel requireOneByNodePath(string $node_path) Return the first ChildCommonTypeForPropel filtered by the node_path column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCommonTypeForPropel requireOneByFileJs(int $file_js) Return the first ChildCommonTypeForPropel filtered by the file_js column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCommonTypeForPropel requireOneByFilePhp(int $file_php) Return the first ChildCommonTypeForPropel filtered by the file_php column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCommonTypeForPropel requireOneByTypeShow(int $type_show) Return the first ChildCommonTypeForPropel filtered by the type_show column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCommonTypeForPropel[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildCommonTypeForPropel objects based on current ModelCriteria
 * @method     ChildCommonTypeForPropel[]|ObjectCollection findByTypeId(int $type_id) Return ChildCommonTypeForPropel objects filtered by the type_id column
 * @method     ChildCommonTypeForPropel[]|ObjectCollection findByParentId(int $parent_id) Return ChildCommonTypeForPropel objects filtered by the parent_id column
 * @method     ChildCommonTypeForPropel[]|ObjectCollection findByLeftSeq(int $left_seq) Return ChildCommonTypeForPropel objects filtered by the left_seq column
 * @method     ChildCommonTypeForPropel[]|ObjectCollection findByRightSeq(int $right_seq) Return ChildCommonTypeForPropel objects filtered by the right_seq column
 * @method     ChildCommonTypeForPropel[]|ObjectCollection findByLevel(int $level) Return ChildCommonTypeForPropel objects filtered by the level column
 * @method     ChildCommonTypeForPropel[]|ObjectCollection findByTypeName(string $type_name) Return ChildCommonTypeForPropel objects filtered by the type_name column
 * @method     ChildCommonTypeForPropel[]|ObjectCollection findByNodePath(string $node_path) Return ChildCommonTypeForPropel objects filtered by the node_path column
 * @method     ChildCommonTypeForPropel[]|ObjectCollection findByFileJs(int $file_js) Return ChildCommonTypeForPropel objects filtered by the file_js column
 * @method     ChildCommonTypeForPropel[]|ObjectCollection findByFilePhp(int $file_php) Return ChildCommonTypeForPropel objects filtered by the file_php column
 * @method     ChildCommonTypeForPropel[]|ObjectCollection findByTypeShow(int $type_show) Return ChildCommonTypeForPropel objects filtered by the type_show column
 * @method     ChildCommonTypeForPropel[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class CommonTypeForPropelQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \App\Models\Propel\Base\CommonTypeForPropelQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\App\\Models\\Propel\\CommonTypeForPropel', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildCommonTypeForPropelQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildCommonTypeForPropelQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildCommonTypeForPropelQuery) {
            return $criteria;
        }
        $query = new ChildCommonTypeForPropelQuery();
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
     * @return ChildCommonTypeForPropel|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CommonTypeForPropelTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = CommonTypeForPropelTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildCommonTypeForPropel A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT type_id, parent_id, left_seq, right_seq, level, type_name, node_path, file_js, file_php, type_show FROM t_types WHERE type_id = :p0';
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
            /** @var ChildCommonTypeForPropel $obj */
            $obj = new ChildCommonTypeForPropel();
            $obj->hydrate($row);
            CommonTypeForPropelTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildCommonTypeForPropel|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildCommonTypeForPropelQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CommonTypeForPropelTableMap::COL_TYPE_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildCommonTypeForPropelQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CommonTypeForPropelTableMap::COL_TYPE_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the type_id column
     *
     * Example usage:
     * <code>
     * $query->filterByTypeId(1234); // WHERE type_id = 1234
     * $query->filterByTypeId(array(12, 34)); // WHERE type_id IN (12, 34)
     * $query->filterByTypeId(array('min' => 12)); // WHERE type_id > 12
     * </code>
     *
     * @param     mixed $typeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCommonTypeForPropelQuery The current query, for fluid interface
     */
    public function filterByTypeId($typeId = null, $comparison = null)
    {
        if (is_array($typeId)) {
            $useMinMax = false;
            if (isset($typeId['min'])) {
                $this->addUsingAlias(CommonTypeForPropelTableMap::COL_TYPE_ID, $typeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($typeId['max'])) {
                $this->addUsingAlias(CommonTypeForPropelTableMap::COL_TYPE_ID, $typeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CommonTypeForPropelTableMap::COL_TYPE_ID, $typeId, $comparison);
    }

    /**
     * Filter the query on the parent_id column
     *
     * Example usage:
     * <code>
     * $query->filterByParentId(1234); // WHERE parent_id = 1234
     * $query->filterByParentId(array(12, 34)); // WHERE parent_id IN (12, 34)
     * $query->filterByParentId(array('min' => 12)); // WHERE parent_id > 12
     * </code>
     *
     * @param     mixed $parentId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCommonTypeForPropelQuery The current query, for fluid interface
     */
    public function filterByParentId($parentId = null, $comparison = null)
    {
        if (is_array($parentId)) {
            $useMinMax = false;
            if (isset($parentId['min'])) {
                $this->addUsingAlias(CommonTypeForPropelTableMap::COL_PARENT_ID, $parentId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($parentId['max'])) {
                $this->addUsingAlias(CommonTypeForPropelTableMap::COL_PARENT_ID, $parentId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CommonTypeForPropelTableMap::COL_PARENT_ID, $parentId, $comparison);
    }

    /**
     * Filter the query on the left_seq column
     *
     * Example usage:
     * <code>
     * $query->filterByLeftSeq(1234); // WHERE left_seq = 1234
     * $query->filterByLeftSeq(array(12, 34)); // WHERE left_seq IN (12, 34)
     * $query->filterByLeftSeq(array('min' => 12)); // WHERE left_seq > 12
     * </code>
     *
     * @param     mixed $leftSeq The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCommonTypeForPropelQuery The current query, for fluid interface
     */
    public function filterByLeftSeq($leftSeq = null, $comparison = null)
    {
        if (is_array($leftSeq)) {
            $useMinMax = false;
            if (isset($leftSeq['min'])) {
                $this->addUsingAlias(CommonTypeForPropelTableMap::COL_LEFT_SEQ, $leftSeq['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($leftSeq['max'])) {
                $this->addUsingAlias(CommonTypeForPropelTableMap::COL_LEFT_SEQ, $leftSeq['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CommonTypeForPropelTableMap::COL_LEFT_SEQ, $leftSeq, $comparison);
    }

    /**
     * Filter the query on the right_seq column
     *
     * Example usage:
     * <code>
     * $query->filterByRightSeq(1234); // WHERE right_seq = 1234
     * $query->filterByRightSeq(array(12, 34)); // WHERE right_seq IN (12, 34)
     * $query->filterByRightSeq(array('min' => 12)); // WHERE right_seq > 12
     * </code>
     *
     * @param     mixed $rightSeq The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCommonTypeForPropelQuery The current query, for fluid interface
     */
    public function filterByRightSeq($rightSeq = null, $comparison = null)
    {
        if (is_array($rightSeq)) {
            $useMinMax = false;
            if (isset($rightSeq['min'])) {
                $this->addUsingAlias(CommonTypeForPropelTableMap::COL_RIGHT_SEQ, $rightSeq['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rightSeq['max'])) {
                $this->addUsingAlias(CommonTypeForPropelTableMap::COL_RIGHT_SEQ, $rightSeq['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CommonTypeForPropelTableMap::COL_RIGHT_SEQ, $rightSeq, $comparison);
    }

    /**
     * Filter the query on the level column
     *
     * Example usage:
     * <code>
     * $query->filterByLevel(1234); // WHERE level = 1234
     * $query->filterByLevel(array(12, 34)); // WHERE level IN (12, 34)
     * $query->filterByLevel(array('min' => 12)); // WHERE level > 12
     * </code>
     *
     * @param     mixed $level The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCommonTypeForPropelQuery The current query, for fluid interface
     */
    public function filterByLevel($level = null, $comparison = null)
    {
        if (is_array($level)) {
            $useMinMax = false;
            if (isset($level['min'])) {
                $this->addUsingAlias(CommonTypeForPropelTableMap::COL_LEVEL, $level['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($level['max'])) {
                $this->addUsingAlias(CommonTypeForPropelTableMap::COL_LEVEL, $level['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CommonTypeForPropelTableMap::COL_LEVEL, $level, $comparison);
    }

    /**
     * Filter the query on the type_name column
     *
     * Example usage:
     * <code>
     * $query->filterByTypeName('fooValue');   // WHERE type_name = 'fooValue'
     * $query->filterByTypeName('%fooValue%', Criteria::LIKE); // WHERE type_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $typeName The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCommonTypeForPropelQuery The current query, for fluid interface
     */
    public function filterByTypeName($typeName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($typeName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CommonTypeForPropelTableMap::COL_TYPE_NAME, $typeName, $comparison);
    }

    /**
     * Filter the query on the node_path column
     *
     * Example usage:
     * <code>
     * $query->filterByNodePath('fooValue');   // WHERE node_path = 'fooValue'
     * $query->filterByNodePath('%fooValue%', Criteria::LIKE); // WHERE node_path LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nodePath The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCommonTypeForPropelQuery The current query, for fluid interface
     */
    public function filterByNodePath($nodePath = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nodePath)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CommonTypeForPropelTableMap::COL_NODE_PATH, $nodePath, $comparison);
    }

    /**
     * Filter the query on the file_js column
     *
     * Example usage:
     * <code>
     * $query->filterByFileJs(1234); // WHERE file_js = 1234
     * $query->filterByFileJs(array(12, 34)); // WHERE file_js IN (12, 34)
     * $query->filterByFileJs(array('min' => 12)); // WHERE file_js > 12
     * </code>
     *
     * @param     mixed $fileJs The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCommonTypeForPropelQuery The current query, for fluid interface
     */
    public function filterByFileJs($fileJs = null, $comparison = null)
    {
        if (is_array($fileJs)) {
            $useMinMax = false;
            if (isset($fileJs['min'])) {
                $this->addUsingAlias(CommonTypeForPropelTableMap::COL_FILE_JS, $fileJs['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fileJs['max'])) {
                $this->addUsingAlias(CommonTypeForPropelTableMap::COL_FILE_JS, $fileJs['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CommonTypeForPropelTableMap::COL_FILE_JS, $fileJs, $comparison);
    }

    /**
     * Filter the query on the file_php column
     *
     * Example usage:
     * <code>
     * $query->filterByFilePhp(1234); // WHERE file_php = 1234
     * $query->filterByFilePhp(array(12, 34)); // WHERE file_php IN (12, 34)
     * $query->filterByFilePhp(array('min' => 12)); // WHERE file_php > 12
     * </code>
     *
     * @param     mixed $filePhp The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCommonTypeForPropelQuery The current query, for fluid interface
     */
    public function filterByFilePhp($filePhp = null, $comparison = null)
    {
        if (is_array($filePhp)) {
            $useMinMax = false;
            if (isset($filePhp['min'])) {
                $this->addUsingAlias(CommonTypeForPropelTableMap::COL_FILE_PHP, $filePhp['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($filePhp['max'])) {
                $this->addUsingAlias(CommonTypeForPropelTableMap::COL_FILE_PHP, $filePhp['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CommonTypeForPropelTableMap::COL_FILE_PHP, $filePhp, $comparison);
    }

    /**
     * Filter the query on the type_show column
     *
     * Example usage:
     * <code>
     * $query->filterByTypeShow(1234); // WHERE type_show = 1234
     * $query->filterByTypeShow(array(12, 34)); // WHERE type_show IN (12, 34)
     * $query->filterByTypeShow(array('min' => 12)); // WHERE type_show > 12
     * </code>
     *
     * @param     mixed $typeShow The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCommonTypeForPropelQuery The current query, for fluid interface
     */
    public function filterByTypeShow($typeShow = null, $comparison = null)
    {
        if (is_array($typeShow)) {
            $useMinMax = false;
            if (isset($typeShow['min'])) {
                $this->addUsingAlias(CommonTypeForPropelTableMap::COL_TYPE_SHOW, $typeShow['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($typeShow['max'])) {
                $this->addUsingAlias(CommonTypeForPropelTableMap::COL_TYPE_SHOW, $typeShow['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CommonTypeForPropelTableMap::COL_TYPE_SHOW, $typeShow, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildCommonTypeForPropel $commonTypeForPropel Object to remove from the list of results
     *
     * @return $this|ChildCommonTypeForPropelQuery The current query, for fluid interface
     */
    public function prune($commonTypeForPropel = null)
    {
        if ($commonTypeForPropel) {
            $this->addUsingAlias(CommonTypeForPropelTableMap::COL_TYPE_ID, $commonTypeForPropel->getTypeId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the t_types table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CommonTypeForPropelTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            CommonTypeForPropelTableMap::clearInstancePool();
            CommonTypeForPropelTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(CommonTypeForPropelTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(CommonTypeForPropelTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            CommonTypeForPropelTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            CommonTypeForPropelTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // CommonTypeForPropelQuery
