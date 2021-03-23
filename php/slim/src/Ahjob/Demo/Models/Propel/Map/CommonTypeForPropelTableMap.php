<?php

namespace Ahjob\Demo\Models\Propel\Map;

use Ahjob\Demo\Models\Propel\CommonTypeForPropel;
use Ahjob\Demo\Models\Propel\CommonTypeForPropelQuery;
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
 * This class defines the structure of the 't_types' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class CommonTypeForPropelTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Ahjob.Demo.Models.Propel.Map.CommonTypeForPropelTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 't_types';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Ahjob\\Demo\\Models\\Propel\\CommonTypeForPropel';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Ahjob.Demo.Models.Propel.CommonTypeForPropel';

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
     * the column name for the type_id field
     */
    const COL_TYPE_ID = 't_types.type_id';

    /**
     * the column name for the parent_id field
     */
    const COL_PARENT_ID = 't_types.parent_id';

    /**
     * the column name for the left_seq field
     */
    const COL_LEFT_SEQ = 't_types.left_seq';

    /**
     * the column name for the right_seq field
     */
    const COL_RIGHT_SEQ = 't_types.right_seq';

    /**
     * the column name for the level field
     */
    const COL_LEVEL = 't_types.level';

    /**
     * the column name for the type_name field
     */
    const COL_TYPE_NAME = 't_types.type_name';

    /**
     * the column name for the node_path field
     */
    const COL_NODE_PATH = 't_types.node_path';

    /**
     * the column name for the file_js field
     */
    const COL_FILE_JS = 't_types.file_js';

    /**
     * the column name for the file_php field
     */
    const COL_FILE_PHP = 't_types.file_php';

    /**
     * the column name for the type_show field
     */
    const COL_TYPE_SHOW = 't_types.type_show';

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
        self::TYPE_PHPNAME       => array('TypeId', 'ParentId', 'LeftSeq', 'RightSeq', 'Level', 'TypeName', 'NodePath', 'FileJs', 'FilePhp', 'TypeShow', ),
        self::TYPE_CAMELNAME     => array('typeId', 'parentId', 'leftSeq', 'rightSeq', 'level', 'typeName', 'nodePath', 'fileJs', 'filePhp', 'typeShow', ),
        self::TYPE_COLNAME       => array(CommonTypeForPropelTableMap::COL_TYPE_ID, CommonTypeForPropelTableMap::COL_PARENT_ID, CommonTypeForPropelTableMap::COL_LEFT_SEQ, CommonTypeForPropelTableMap::COL_RIGHT_SEQ, CommonTypeForPropelTableMap::COL_LEVEL, CommonTypeForPropelTableMap::COL_TYPE_NAME, CommonTypeForPropelTableMap::COL_NODE_PATH, CommonTypeForPropelTableMap::COL_FILE_JS, CommonTypeForPropelTableMap::COL_FILE_PHP, CommonTypeForPropelTableMap::COL_TYPE_SHOW, ),
        self::TYPE_FIELDNAME     => array('type_id', 'parent_id', 'left_seq', 'right_seq', 'level', 'type_name', 'node_path', 'file_js', 'file_php', 'type_show', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('TypeId' => 0, 'ParentId' => 1, 'LeftSeq' => 2, 'RightSeq' => 3, 'Level' => 4, 'TypeName' => 5, 'NodePath' => 6, 'FileJs' => 7, 'FilePhp' => 8, 'TypeShow' => 9, ),
        self::TYPE_CAMELNAME     => array('typeId' => 0, 'parentId' => 1, 'leftSeq' => 2, 'rightSeq' => 3, 'level' => 4, 'typeName' => 5, 'nodePath' => 6, 'fileJs' => 7, 'filePhp' => 8, 'typeShow' => 9, ),
        self::TYPE_COLNAME       => array(CommonTypeForPropelTableMap::COL_TYPE_ID => 0, CommonTypeForPropelTableMap::COL_PARENT_ID => 1, CommonTypeForPropelTableMap::COL_LEFT_SEQ => 2, CommonTypeForPropelTableMap::COL_RIGHT_SEQ => 3, CommonTypeForPropelTableMap::COL_LEVEL => 4, CommonTypeForPropelTableMap::COL_TYPE_NAME => 5, CommonTypeForPropelTableMap::COL_NODE_PATH => 6, CommonTypeForPropelTableMap::COL_FILE_JS => 7, CommonTypeForPropelTableMap::COL_FILE_PHP => 8, CommonTypeForPropelTableMap::COL_TYPE_SHOW => 9, ),
        self::TYPE_FIELDNAME     => array('type_id' => 0, 'parent_id' => 1, 'left_seq' => 2, 'right_seq' => 3, 'level' => 4, 'type_name' => 5, 'node_path' => 6, 'file_js' => 7, 'file_php' => 8, 'type_show' => 9, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
    );

    /**
     * Holds a list of column names and their normalized version.
     *
     * @var string[]
     */
    protected $normalizedColumnNameMap = [

        'TypeId' => 'TYPE_ID',
        'CommonTypeForPropel.TypeId' => 'TYPE_ID',
        'typeId' => 'TYPE_ID',
        'commonTypeForPropel.typeId' => 'TYPE_ID',
        'CommonTypeForPropelTableMap::COL_TYPE_ID' => 'TYPE_ID',
        'COL_TYPE_ID' => 'TYPE_ID',
        'type_id' => 'TYPE_ID',
        't_types.type_id' => 'TYPE_ID',
        'ParentId' => 'PARENT_ID',
        'CommonTypeForPropel.ParentId' => 'PARENT_ID',
        'parentId' => 'PARENT_ID',
        'commonTypeForPropel.parentId' => 'PARENT_ID',
        'CommonTypeForPropelTableMap::COL_PARENT_ID' => 'PARENT_ID',
        'COL_PARENT_ID' => 'PARENT_ID',
        'parent_id' => 'PARENT_ID',
        't_types.parent_id' => 'PARENT_ID',
        'LeftSeq' => 'LEFT_SEQ',
        'CommonTypeForPropel.LeftSeq' => 'LEFT_SEQ',
        'leftSeq' => 'LEFT_SEQ',
        'commonTypeForPropel.leftSeq' => 'LEFT_SEQ',
        'CommonTypeForPropelTableMap::COL_LEFT_SEQ' => 'LEFT_SEQ',
        'COL_LEFT_SEQ' => 'LEFT_SEQ',
        'left_seq' => 'LEFT_SEQ',
        't_types.left_seq' => 'LEFT_SEQ',
        'RightSeq' => 'RIGHT_SEQ',
        'CommonTypeForPropel.RightSeq' => 'RIGHT_SEQ',
        'rightSeq' => 'RIGHT_SEQ',
        'commonTypeForPropel.rightSeq' => 'RIGHT_SEQ',
        'CommonTypeForPropelTableMap::COL_RIGHT_SEQ' => 'RIGHT_SEQ',
        'COL_RIGHT_SEQ' => 'RIGHT_SEQ',
        'right_seq' => 'RIGHT_SEQ',
        't_types.right_seq' => 'RIGHT_SEQ',
        'Level' => 'LEVEL',
        'CommonTypeForPropel.Level' => 'LEVEL',
        'level' => 'LEVEL',
        'commonTypeForPropel.level' => 'LEVEL',
        'CommonTypeForPropelTableMap::COL_LEVEL' => 'LEVEL',
        'COL_LEVEL' => 'LEVEL',
        'level' => 'LEVEL',
        't_types.level' => 'LEVEL',
        'TypeName' => 'TYPE_NAME',
        'CommonTypeForPropel.TypeName' => 'TYPE_NAME',
        'typeName' => 'TYPE_NAME',
        'commonTypeForPropel.typeName' => 'TYPE_NAME',
        'CommonTypeForPropelTableMap::COL_TYPE_NAME' => 'TYPE_NAME',
        'COL_TYPE_NAME' => 'TYPE_NAME',
        'type_name' => 'TYPE_NAME',
        't_types.type_name' => 'TYPE_NAME',
        'NodePath' => 'NODE_PATH',
        'CommonTypeForPropel.NodePath' => 'NODE_PATH',
        'nodePath' => 'NODE_PATH',
        'commonTypeForPropel.nodePath' => 'NODE_PATH',
        'CommonTypeForPropelTableMap::COL_NODE_PATH' => 'NODE_PATH',
        'COL_NODE_PATH' => 'NODE_PATH',
        'node_path' => 'NODE_PATH',
        't_types.node_path' => 'NODE_PATH',
        'FileJs' => 'FILE_JS',
        'CommonTypeForPropel.FileJs' => 'FILE_JS',
        'fileJs' => 'FILE_JS',
        'commonTypeForPropel.fileJs' => 'FILE_JS',
        'CommonTypeForPropelTableMap::COL_FILE_JS' => 'FILE_JS',
        'COL_FILE_JS' => 'FILE_JS',
        'file_js' => 'FILE_JS',
        't_types.file_js' => 'FILE_JS',
        'FilePhp' => 'FILE_PHP',
        'CommonTypeForPropel.FilePhp' => 'FILE_PHP',
        'filePhp' => 'FILE_PHP',
        'commonTypeForPropel.filePhp' => 'FILE_PHP',
        'CommonTypeForPropelTableMap::COL_FILE_PHP' => 'FILE_PHP',
        'COL_FILE_PHP' => 'FILE_PHP',
        'file_php' => 'FILE_PHP',
        't_types.file_php' => 'FILE_PHP',
        'TypeShow' => 'TYPE_SHOW',
        'CommonTypeForPropel.TypeShow' => 'TYPE_SHOW',
        'typeShow' => 'TYPE_SHOW',
        'commonTypeForPropel.typeShow' => 'TYPE_SHOW',
        'CommonTypeForPropelTableMap::COL_TYPE_SHOW' => 'TYPE_SHOW',
        'COL_TYPE_SHOW' => 'TYPE_SHOW',
        'type_show' => 'TYPE_SHOW',
        't_types.type_show' => 'TYPE_SHOW',
    ];

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
        $this->setName('t_types');
        $this->setPhpName('CommonTypeForPropel');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Ahjob\\Demo\\Models\\Propel\\CommonTypeForPropel');
        $this->setPackage('Ahjob.Demo.Models.Propel');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('type_id', 'TypeId', 'INTEGER', true, null, null);
        $this->addColumn('parent_id', 'ParentId', 'INTEGER', true, null, 0);
        $this->addColumn('left_seq', 'LeftSeq', 'INTEGER', true, null, 0);
        $this->addColumn('right_seq', 'RightSeq', 'INTEGER', true, null, 0);
        $this->addColumn('level', 'Level', 'SMALLINT', true, null, 0);
        $this->addColumn('type_name', 'TypeName', 'VARCHAR', true, 60, '');
        $this->addColumn('node_path', 'NodePath', 'VARCHAR', true, 30, '');
        $this->addColumn('file_js', 'FileJs', 'INTEGER', true, null, 0);
        $this->addColumn('file_php', 'FilePhp', 'INTEGER', true, null, 0);
        $this->addColumn('type_show', 'TypeShow', 'TINYINT', true, null, 0);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('TypeId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('TypeId', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('TypeId', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('TypeId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('TypeId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('TypeId', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('TypeId', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? CommonTypeForPropelTableMap::CLASS_DEFAULT : CommonTypeForPropelTableMap::OM_CLASS;
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
     * @return array           (CommonTypeForPropel object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = CommonTypeForPropelTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = CommonTypeForPropelTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + CommonTypeForPropelTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = CommonTypeForPropelTableMap::OM_CLASS;
            /** @var CommonTypeForPropel $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            CommonTypeForPropelTableMap::addInstanceToPool($obj, $key);
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
            $key = CommonTypeForPropelTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = CommonTypeForPropelTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var CommonTypeForPropel $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                CommonTypeForPropelTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(CommonTypeForPropelTableMap::COL_TYPE_ID);
            $criteria->addSelectColumn(CommonTypeForPropelTableMap::COL_PARENT_ID);
            $criteria->addSelectColumn(CommonTypeForPropelTableMap::COL_LEFT_SEQ);
            $criteria->addSelectColumn(CommonTypeForPropelTableMap::COL_RIGHT_SEQ);
            $criteria->addSelectColumn(CommonTypeForPropelTableMap::COL_LEVEL);
            $criteria->addSelectColumn(CommonTypeForPropelTableMap::COL_TYPE_NAME);
            $criteria->addSelectColumn(CommonTypeForPropelTableMap::COL_NODE_PATH);
            $criteria->addSelectColumn(CommonTypeForPropelTableMap::COL_FILE_JS);
            $criteria->addSelectColumn(CommonTypeForPropelTableMap::COL_FILE_PHP);
            $criteria->addSelectColumn(CommonTypeForPropelTableMap::COL_TYPE_SHOW);
        } else {
            $criteria->addSelectColumn($alias . '.type_id');
            $criteria->addSelectColumn($alias . '.parent_id');
            $criteria->addSelectColumn($alias . '.left_seq');
            $criteria->addSelectColumn($alias . '.right_seq');
            $criteria->addSelectColumn($alias . '.level');
            $criteria->addSelectColumn($alias . '.type_name');
            $criteria->addSelectColumn($alias . '.node_path');
            $criteria->addSelectColumn($alias . '.file_js');
            $criteria->addSelectColumn($alias . '.file_php');
            $criteria->addSelectColumn($alias . '.type_show');
        }
    }

    /**
     * Remove all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be removed as they are only loaded on demand.
     *
     * @param Criteria $criteria object containing the columns to remove.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function removeSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->removeSelectColumn(CommonTypeForPropelTableMap::COL_TYPE_ID);
            $criteria->removeSelectColumn(CommonTypeForPropelTableMap::COL_PARENT_ID);
            $criteria->removeSelectColumn(CommonTypeForPropelTableMap::COL_LEFT_SEQ);
            $criteria->removeSelectColumn(CommonTypeForPropelTableMap::COL_RIGHT_SEQ);
            $criteria->removeSelectColumn(CommonTypeForPropelTableMap::COL_LEVEL);
            $criteria->removeSelectColumn(CommonTypeForPropelTableMap::COL_TYPE_NAME);
            $criteria->removeSelectColumn(CommonTypeForPropelTableMap::COL_NODE_PATH);
            $criteria->removeSelectColumn(CommonTypeForPropelTableMap::COL_FILE_JS);
            $criteria->removeSelectColumn(CommonTypeForPropelTableMap::COL_FILE_PHP);
            $criteria->removeSelectColumn(CommonTypeForPropelTableMap::COL_TYPE_SHOW);
        } else {
            $criteria->removeSelectColumn($alias . '.type_id');
            $criteria->removeSelectColumn($alias . '.parent_id');
            $criteria->removeSelectColumn($alias . '.left_seq');
            $criteria->removeSelectColumn($alias . '.right_seq');
            $criteria->removeSelectColumn($alias . '.level');
            $criteria->removeSelectColumn($alias . '.type_name');
            $criteria->removeSelectColumn($alias . '.node_path');
            $criteria->removeSelectColumn($alias . '.file_js');
            $criteria->removeSelectColumn($alias . '.file_php');
            $criteria->removeSelectColumn($alias . '.type_show');
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
        return Propel::getServiceContainer()->getDatabaseMap(CommonTypeForPropelTableMap::DATABASE_NAME)->getTable(CommonTypeForPropelTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(CommonTypeForPropelTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(CommonTypeForPropelTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new CommonTypeForPropelTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a CommonTypeForPropel or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or CommonTypeForPropel object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(CommonTypeForPropelTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Ahjob\Demo\Models\Propel\CommonTypeForPropel) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(CommonTypeForPropelTableMap::DATABASE_NAME);
            $criteria->add(CommonTypeForPropelTableMap::COL_TYPE_ID, (array) $values, Criteria::IN);
        }

        $query = CommonTypeForPropelQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            CommonTypeForPropelTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                CommonTypeForPropelTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the t_types table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return CommonTypeForPropelQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a CommonTypeForPropel or Criteria object.
     *
     * @param mixed               $criteria Criteria or CommonTypeForPropel object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CommonTypeForPropelTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from CommonTypeForPropel object
        }

        if ($criteria->containsKey(CommonTypeForPropelTableMap::COL_TYPE_ID) && $criteria->keyContainsValue(CommonTypeForPropelTableMap::COL_TYPE_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.CommonTypeForPropelTableMap::COL_TYPE_ID.')');
        }


        // Set the correct dbName
        $query = CommonTypeForPropelQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // CommonTypeForPropelTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
CommonTypeForPropelTableMap::buildTableMap();
