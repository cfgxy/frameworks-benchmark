<?php

namespace App\Models\Propel\Base;

use \Exception;
use \PDO;
use App\Models\Propel\CommonTypeForPropelQuery as ChildCommonTypeForPropelQuery;
use App\Models\Propel\Map\CommonTypeForPropelTableMap;
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

/**
 * Base class that represents a row from the 't_types' table.
 *
 *
 *
 * @package    propel.generator.App.Models.Propel.Base
 */
abstract class CommonTypeForPropel implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\App\\Models\\Propel\\Map\\CommonTypeForPropelTableMap';


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
     * The value for the type_id field.
     *
     * @var        int
     */
    protected $type_id;

    /**
     * The value for the parent_id field.
     *
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $parent_id;

    /**
     * The value for the left_seq field.
     *
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $left_seq;

    /**
     * The value for the right_seq field.
     *
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $right_seq;

    /**
     * The value for the level field.
     *
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $level;

    /**
     * The value for the type_name field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $type_name;

    /**
     * The value for the node_path field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $node_path;

    /**
     * The value for the file_js field.
     *
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $file_js;

    /**
     * The value for the file_php field.
     *
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $file_php;

    /**
     * The value for the type_show field.
     *
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $type_show;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see __construct()
     */
    public function applyDefaultValues()
    {
        $this->parent_id = 0;
        $this->left_seq = 0;
        $this->right_seq = 0;
        $this->level = 0;
        $this->type_name = '';
        $this->node_path = '';
        $this->file_js = 0;
        $this->file_php = 0;
        $this->type_show = 0;
    }

    /**
     * Initializes internal state of App\Models\Propel\Base\CommonTypeForPropel object.
     * @see applyDefaults()
     */
    public function __construct()
    {
        $this->applyDefaultValues();
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
     * Compares this with another <code>CommonTypeForPropel</code> instance.  If
     * <code>obj</code> is an instance of <code>CommonTypeForPropel</code>, delegates to
     * <code>equals(CommonTypeForPropel)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this The current object, for fluid interface
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
     * @return void
     */
    protected function log($msg, $priority = Propel::LOG_INFO)
    {
        Propel::log(get_class($this) . ': ' . $msg, $priority);
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
     * Get the [type_id] column value.
     *
     * @return int
     */
    public function getTypeId()
    {
        return $this->type_id;
    }

    /**
     * Get the [parent_id] column value.
     *
     * @return int
     */
    public function getParentId()
    {
        return $this->parent_id;
    }

    /**
     * Get the [left_seq] column value.
     *
     * @return int
     */
    public function getLeftSeq()
    {
        return $this->left_seq;
    }

    /**
     * Get the [right_seq] column value.
     *
     * @return int
     */
    public function getRightSeq()
    {
        return $this->right_seq;
    }

    /**
     * Get the [level] column value.
     *
     * @return int
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Get the [type_name] column value.
     *
     * @return string
     */
    public function getTypeName()
    {
        return $this->type_name;
    }

    /**
     * Get the [node_path] column value.
     *
     * @return string
     */
    public function getNodePath()
    {
        return $this->node_path;
    }

    /**
     * Get the [file_js] column value.
     *
     * @return int
     */
    public function getFileJs()
    {
        return $this->file_js;
    }

    /**
     * Get the [file_php] column value.
     *
     * @return int
     */
    public function getFilePhp()
    {
        return $this->file_php;
    }

    /**
     * Get the [type_show] column value.
     *
     * @return int
     */
    public function getTypeShow()
    {
        return $this->type_show;
    }

    /**
     * Set the value of [type_id] column.
     *
     * @param int $v New value
     * @return $this|\App\Models\Propel\CommonTypeForPropel The current object (for fluent API support)
     */
    public function setTypeId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->type_id !== $v) {
            $this->type_id = $v;
            $this->modifiedColumns[CommonTypeForPropelTableMap::COL_TYPE_ID] = true;
        }

        return $this;
    } // setTypeId()

    /**
     * Set the value of [parent_id] column.
     *
     * @param int $v New value
     * @return $this|\App\Models\Propel\CommonTypeForPropel The current object (for fluent API support)
     */
    public function setParentId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->parent_id !== $v) {
            $this->parent_id = $v;
            $this->modifiedColumns[CommonTypeForPropelTableMap::COL_PARENT_ID] = true;
        }

        return $this;
    } // setParentId()

    /**
     * Set the value of [left_seq] column.
     *
     * @param int $v New value
     * @return $this|\App\Models\Propel\CommonTypeForPropel The current object (for fluent API support)
     */
    public function setLeftSeq($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->left_seq !== $v) {
            $this->left_seq = $v;
            $this->modifiedColumns[CommonTypeForPropelTableMap::COL_LEFT_SEQ] = true;
        }

        return $this;
    } // setLeftSeq()

    /**
     * Set the value of [right_seq] column.
     *
     * @param int $v New value
     * @return $this|\App\Models\Propel\CommonTypeForPropel The current object (for fluent API support)
     */
    public function setRightSeq($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->right_seq !== $v) {
            $this->right_seq = $v;
            $this->modifiedColumns[CommonTypeForPropelTableMap::COL_RIGHT_SEQ] = true;
        }

        return $this;
    } // setRightSeq()

    /**
     * Set the value of [level] column.
     *
     * @param int $v New value
     * @return $this|\App\Models\Propel\CommonTypeForPropel The current object (for fluent API support)
     */
    public function setLevel($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->level !== $v) {
            $this->level = $v;
            $this->modifiedColumns[CommonTypeForPropelTableMap::COL_LEVEL] = true;
        }

        return $this;
    } // setLevel()

    /**
     * Set the value of [type_name] column.
     *
     * @param string $v New value
     * @return $this|\App\Models\Propel\CommonTypeForPropel The current object (for fluent API support)
     */
    public function setTypeName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->type_name !== $v) {
            $this->type_name = $v;
            $this->modifiedColumns[CommonTypeForPropelTableMap::COL_TYPE_NAME] = true;
        }

        return $this;
    } // setTypeName()

    /**
     * Set the value of [node_path] column.
     *
     * @param string $v New value
     * @return $this|\App\Models\Propel\CommonTypeForPropel The current object (for fluent API support)
     */
    public function setNodePath($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->node_path !== $v) {
            $this->node_path = $v;
            $this->modifiedColumns[CommonTypeForPropelTableMap::COL_NODE_PATH] = true;
        }

        return $this;
    } // setNodePath()

    /**
     * Set the value of [file_js] column.
     *
     * @param int $v New value
     * @return $this|\App\Models\Propel\CommonTypeForPropel The current object (for fluent API support)
     */
    public function setFileJs($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->file_js !== $v) {
            $this->file_js = $v;
            $this->modifiedColumns[CommonTypeForPropelTableMap::COL_FILE_JS] = true;
        }

        return $this;
    } // setFileJs()

    /**
     * Set the value of [file_php] column.
     *
     * @param int $v New value
     * @return $this|\App\Models\Propel\CommonTypeForPropel The current object (for fluent API support)
     */
    public function setFilePhp($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->file_php !== $v) {
            $this->file_php = $v;
            $this->modifiedColumns[CommonTypeForPropelTableMap::COL_FILE_PHP] = true;
        }

        return $this;
    } // setFilePhp()

    /**
     * Set the value of [type_show] column.
     *
     * @param int $v New value
     * @return $this|\App\Models\Propel\CommonTypeForPropel The current object (for fluent API support)
     */
    public function setTypeShow($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->type_show !== $v) {
            $this->type_show = $v;
            $this->modifiedColumns[CommonTypeForPropelTableMap::COL_TYPE_SHOW] = true;
        }

        return $this;
    } // setTypeShow()

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
            if ($this->parent_id !== 0) {
                return false;
            }

            if ($this->left_seq !== 0) {
                return false;
            }

            if ($this->right_seq !== 0) {
                return false;
            }

            if ($this->level !== 0) {
                return false;
            }

            if ($this->type_name !== '') {
                return false;
            }

            if ($this->node_path !== '') {
                return false;
            }

            if ($this->file_js !== 0) {
                return false;
            }

            if ($this->file_php !== 0) {
                return false;
            }

            if ($this->type_show !== 0) {
                return false;
            }

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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : CommonTypeForPropelTableMap::translateFieldName('TypeId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->type_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : CommonTypeForPropelTableMap::translateFieldName('ParentId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->parent_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : CommonTypeForPropelTableMap::translateFieldName('LeftSeq', TableMap::TYPE_PHPNAME, $indexType)];
            $this->left_seq = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : CommonTypeForPropelTableMap::translateFieldName('RightSeq', TableMap::TYPE_PHPNAME, $indexType)];
            $this->right_seq = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : CommonTypeForPropelTableMap::translateFieldName('Level', TableMap::TYPE_PHPNAME, $indexType)];
            $this->level = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : CommonTypeForPropelTableMap::translateFieldName('TypeName', TableMap::TYPE_PHPNAME, $indexType)];
            $this->type_name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : CommonTypeForPropelTableMap::translateFieldName('NodePath', TableMap::TYPE_PHPNAME, $indexType)];
            $this->node_path = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : CommonTypeForPropelTableMap::translateFieldName('FileJs', TableMap::TYPE_PHPNAME, $indexType)];
            $this->file_js = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : CommonTypeForPropelTableMap::translateFieldName('FilePhp', TableMap::TYPE_PHPNAME, $indexType)];
            $this->file_php = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : CommonTypeForPropelTableMap::translateFieldName('TypeShow', TableMap::TYPE_PHPNAME, $indexType)];
            $this->type_show = (null !== $col) ? (int) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 10; // 10 = CommonTypeForPropelTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\App\\Models\\Propel\\CommonTypeForPropel'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(CommonTypeForPropelTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildCommonTypeForPropelQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see CommonTypeForPropel::setDeleted()
     * @see CommonTypeForPropel::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(CommonTypeForPropelTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildCommonTypeForPropelQuery::create()
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

        if ($this->alreadyInSave) {
            return 0;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(CommonTypeForPropelTableMap::DATABASE_NAME);
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
                CommonTypeForPropelTableMap::addInstanceToPool($this);
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

        $this->modifiedColumns[CommonTypeForPropelTableMap::COL_TYPE_ID] = true;
        if (null !== $this->type_id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . CommonTypeForPropelTableMap::COL_TYPE_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(CommonTypeForPropelTableMap::COL_TYPE_ID)) {
            $modifiedColumns[':p' . $index++]  = 'type_id';
        }
        if ($this->isColumnModified(CommonTypeForPropelTableMap::COL_PARENT_ID)) {
            $modifiedColumns[':p' . $index++]  = 'parent_id';
        }
        if ($this->isColumnModified(CommonTypeForPropelTableMap::COL_LEFT_SEQ)) {
            $modifiedColumns[':p' . $index++]  = 'left_seq';
        }
        if ($this->isColumnModified(CommonTypeForPropelTableMap::COL_RIGHT_SEQ)) {
            $modifiedColumns[':p' . $index++]  = 'right_seq';
        }
        if ($this->isColumnModified(CommonTypeForPropelTableMap::COL_LEVEL)) {
            $modifiedColumns[':p' . $index++]  = 'level';
        }
        if ($this->isColumnModified(CommonTypeForPropelTableMap::COL_TYPE_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'type_name';
        }
        if ($this->isColumnModified(CommonTypeForPropelTableMap::COL_NODE_PATH)) {
            $modifiedColumns[':p' . $index++]  = 'node_path';
        }
        if ($this->isColumnModified(CommonTypeForPropelTableMap::COL_FILE_JS)) {
            $modifiedColumns[':p' . $index++]  = 'file_js';
        }
        if ($this->isColumnModified(CommonTypeForPropelTableMap::COL_FILE_PHP)) {
            $modifiedColumns[':p' . $index++]  = 'file_php';
        }
        if ($this->isColumnModified(CommonTypeForPropelTableMap::COL_TYPE_SHOW)) {
            $modifiedColumns[':p' . $index++]  = 'type_show';
        }

        $sql = sprintf(
            'INSERT INTO t_types (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'type_id':
                        $stmt->bindValue($identifier, $this->type_id, PDO::PARAM_INT);
                        break;
                    case 'parent_id':
                        $stmt->bindValue($identifier, $this->parent_id, PDO::PARAM_INT);
                        break;
                    case 'left_seq':
                        $stmt->bindValue($identifier, $this->left_seq, PDO::PARAM_INT);
                        break;
                    case 'right_seq':
                        $stmt->bindValue($identifier, $this->right_seq, PDO::PARAM_INT);
                        break;
                    case 'level':
                        $stmt->bindValue($identifier, $this->level, PDO::PARAM_INT);
                        break;
                    case 'type_name':
                        $stmt->bindValue($identifier, $this->type_name, PDO::PARAM_STR);
                        break;
                    case 'node_path':
                        $stmt->bindValue($identifier, $this->node_path, PDO::PARAM_STR);
                        break;
                    case 'file_js':
                        $stmt->bindValue($identifier, $this->file_js, PDO::PARAM_INT);
                        break;
                    case 'file_php':
                        $stmt->bindValue($identifier, $this->file_php, PDO::PARAM_INT);
                        break;
                    case 'type_show':
                        $stmt->bindValue($identifier, $this->type_show, PDO::PARAM_INT);
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
        $this->setTypeId($pk);

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
        $pos = CommonTypeForPropelTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getTypeId();
                break;
            case 1:
                return $this->getParentId();
                break;
            case 2:
                return $this->getLeftSeq();
                break;
            case 3:
                return $this->getRightSeq();
                break;
            case 4:
                return $this->getLevel();
                break;
            case 5:
                return $this->getTypeName();
                break;
            case 6:
                return $this->getNodePath();
                break;
            case 7:
                return $this->getFileJs();
                break;
            case 8:
                return $this->getFilePhp();
                break;
            case 9:
                return $this->getTypeShow();
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
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = TableMap::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array())
    {

        if (isset($alreadyDumpedObjects['CommonTypeForPropel'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['CommonTypeForPropel'][$this->hashCode()] = true;
        $keys = CommonTypeForPropelTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getTypeId(),
            $keys[1] => $this->getParentId(),
            $keys[2] => $this->getLeftSeq(),
            $keys[3] => $this->getRightSeq(),
            $keys[4] => $this->getLevel(),
            $keys[5] => $this->getTypeName(),
            $keys[6] => $this->getNodePath(),
            $keys[7] => $this->getFileJs(),
            $keys[8] => $this->getFilePhp(),
            $keys[9] => $this->getTypeShow(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
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
     * @return $this|\App\Models\Propel\CommonTypeForPropel
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = CommonTypeForPropelTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\App\Models\Propel\CommonTypeForPropel
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setTypeId($value);
                break;
            case 1:
                $this->setParentId($value);
                break;
            case 2:
                $this->setLeftSeq($value);
                break;
            case 3:
                $this->setRightSeq($value);
                break;
            case 4:
                $this->setLevel($value);
                break;
            case 5:
                $this->setTypeName($value);
                break;
            case 6:
                $this->setNodePath($value);
                break;
            case 7:
                $this->setFileJs($value);
                break;
            case 8:
                $this->setFilePhp($value);
                break;
            case 9:
                $this->setTypeShow($value);
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
        $keys = CommonTypeForPropelTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setTypeId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setParentId($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setLeftSeq($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setRightSeq($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setLevel($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setTypeName($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setNodePath($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setFileJs($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setFilePhp($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setTypeShow($arr[$keys[9]]);
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
     * @return $this|\App\Models\Propel\CommonTypeForPropel The current object, for fluid interface
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
        $criteria = new Criteria(CommonTypeForPropelTableMap::DATABASE_NAME);

        if ($this->isColumnModified(CommonTypeForPropelTableMap::COL_TYPE_ID)) {
            $criteria->add(CommonTypeForPropelTableMap::COL_TYPE_ID, $this->type_id);
        }
        if ($this->isColumnModified(CommonTypeForPropelTableMap::COL_PARENT_ID)) {
            $criteria->add(CommonTypeForPropelTableMap::COL_PARENT_ID, $this->parent_id);
        }
        if ($this->isColumnModified(CommonTypeForPropelTableMap::COL_LEFT_SEQ)) {
            $criteria->add(CommonTypeForPropelTableMap::COL_LEFT_SEQ, $this->left_seq);
        }
        if ($this->isColumnModified(CommonTypeForPropelTableMap::COL_RIGHT_SEQ)) {
            $criteria->add(CommonTypeForPropelTableMap::COL_RIGHT_SEQ, $this->right_seq);
        }
        if ($this->isColumnModified(CommonTypeForPropelTableMap::COL_LEVEL)) {
            $criteria->add(CommonTypeForPropelTableMap::COL_LEVEL, $this->level);
        }
        if ($this->isColumnModified(CommonTypeForPropelTableMap::COL_TYPE_NAME)) {
            $criteria->add(CommonTypeForPropelTableMap::COL_TYPE_NAME, $this->type_name);
        }
        if ($this->isColumnModified(CommonTypeForPropelTableMap::COL_NODE_PATH)) {
            $criteria->add(CommonTypeForPropelTableMap::COL_NODE_PATH, $this->node_path);
        }
        if ($this->isColumnModified(CommonTypeForPropelTableMap::COL_FILE_JS)) {
            $criteria->add(CommonTypeForPropelTableMap::COL_FILE_JS, $this->file_js);
        }
        if ($this->isColumnModified(CommonTypeForPropelTableMap::COL_FILE_PHP)) {
            $criteria->add(CommonTypeForPropelTableMap::COL_FILE_PHP, $this->file_php);
        }
        if ($this->isColumnModified(CommonTypeForPropelTableMap::COL_TYPE_SHOW)) {
            $criteria->add(CommonTypeForPropelTableMap::COL_TYPE_SHOW, $this->type_show);
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
        $criteria = ChildCommonTypeForPropelQuery::create();
        $criteria->add(CommonTypeForPropelTableMap::COL_TYPE_ID, $this->type_id);

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
        $validPk = null !== $this->getTypeId();

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
        return $this->getTypeId();
    }

    /**
     * Generic method to set the primary key (type_id column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setTypeId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getTypeId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \App\Models\Propel\CommonTypeForPropel (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setParentId($this->getParentId());
        $copyObj->setLeftSeq($this->getLeftSeq());
        $copyObj->setRightSeq($this->getRightSeq());
        $copyObj->setLevel($this->getLevel());
        $copyObj->setTypeName($this->getTypeName());
        $copyObj->setNodePath($this->getNodePath());
        $copyObj->setFileJs($this->getFileJs());
        $copyObj->setFilePhp($this->getFilePhp());
        $copyObj->setTypeShow($this->getTypeShow());
        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setTypeId(NULL); // this is a auto-increment column, so set to default value
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
     * @return \App\Models\Propel\CommonTypeForPropel Clone of current object.
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
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        $this->type_id = null;
        $this->parent_id = null;
        $this->left_seq = null;
        $this->right_seq = null;
        $this->level = null;
        $this->type_name = null;
        $this->node_path = null;
        $this->file_js = null;
        $this->file_php = null;
        $this->type_show = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
        $this->applyDefaultValues();
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

    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(CommonTypeForPropelTableMap::DEFAULT_STRING_FORMAT);
    }

    /**
     * Code to be run before persisting the object
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preSave(ConnectionInterface $con = null)
    {
                return true;
    }

    /**
     * Code to be run after persisting the object
     * @param ConnectionInterface $con
     */
    public function postSave(ConnectionInterface $con = null)
    {
            }

    /**
     * Code to be run before inserting to database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preInsert(ConnectionInterface $con = null)
    {
                return true;
    }

    /**
     * Code to be run after inserting to database
     * @param ConnectionInterface $con
     */
    public function postInsert(ConnectionInterface $con = null)
    {
            }

    /**
     * Code to be run before updating the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preUpdate(ConnectionInterface $con = null)
    {
                return true;
    }

    /**
     * Code to be run after updating the object in database
     * @param ConnectionInterface $con
     */
    public function postUpdate(ConnectionInterface $con = null)
    {
            }

    /**
     * Code to be run before deleting the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preDelete(ConnectionInterface $con = null)
    {
                return true;
    }

    /**
     * Code to be run after deleting the object in database
     * @param ConnectionInterface $con
     */
    public function postDelete(ConnectionInterface $con = null)
    {
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
