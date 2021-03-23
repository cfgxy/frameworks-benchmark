<?php


namespace Ahjob\Demo\Models\Doctrine;

use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\GeneratedValue;

/**
 * @Entity
 * @Table(name="t_types")
 */
class CommonTypeForDoctrine
{
    /**
     * @Id
     * @Column(name="type_id", type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    protected int $type_id;

    /**
     * @Column(name="parent_id", type="integer")
     */
    protected int $parent_id;

    /**
     * @Column(name="left_seq", type="integer")
     */
    protected int $left_seq;

    /**
     * @Column(name="right_seq", type="integer")
     */
    protected int $right_seq;

    /**
     * @Column(name="level", type="integer")
     */
    protected int $level;

    /**
     * @Column(name="type_name", type="text")
     */
    protected string $type_name;

    /**
     * @Column(name="node_path", type="text")
     */
    protected string $node_path;

    /**
     * @Column(name="file_js", type="boolean", options={"default" = true})
     */
    protected bool $file_js;

    /**
     * @Column(name="file_php", type="boolean", options={"default" = true})
     */
    protected bool $file_php;

    /**
     * @Column(name="type_show", type="boolean", options={"default" = true})
     */
    protected bool $type_show;

    /**
     * @return int
     */
    public function getTypeId(): int
    {
        return $this->type_id;
    }

    /**
     * @param int $type_id
     */
    public function setTypeId(int $type_id): void
    {
        $this->type_id = $type_id;
    }

    /**
     * @return int
     */
    public function getParentId(): int
    {
        return $this->parent_id;
    }

    /**
     * @param int $parent_id
     */
    public function setParentId(int $parent_id): void
    {
        $this->parent_id = $parent_id;
    }

    /**
     * @return int
     */
    public function getLeftSeq(): int
    {
        return $this->left_seq;
    }

    /**
     * @param int $left_seq
     */
    public function setLeftSeq(int $left_seq): void
    {
        $this->left_seq = $left_seq;
    }

    /**
     * @return int
     */
    public function getRightSeq(): int
    {
        return $this->right_seq;
    }

    /**
     * @param int $right_seq
     */
    public function setRightSeq(int $right_seq): void
    {
        $this->right_seq = $right_seq;
    }

    /**
     * @return int
     */
    public function getLevel(): int
    {
        return $this->level;
    }

    /**
     * @param int $level
     */
    public function setLevel(int $level): void
    {
        $this->level = $level;
    }

    /**
     * @return string
     */
    public function getTypeName(): string
    {
        return $this->type_name;
    }

    /**
     * @param string $type_name
     */
    public function setTypeName(string $type_name): void
    {
        $this->type_name = $type_name;
    }

    /**
     * @return string
     */
    public function getNodePath(): string
    {
        return $this->node_path;
    }

    /**
     * @param string $node_path
     */
    public function setNodePath(string $node_path): void
    {
        $this->node_path = $node_path;
    }

    /**
     * @return bool
     */
    public function isFileJs(): bool
    {
        return $this->file_js;
    }

    /**
     * @param bool $file_js
     */
    public function setFileJs(bool $file_js): void
    {
        $this->file_js = $file_js;
    }

    /**
     * @return bool
     */
    public function isFilePhp(): bool
    {
        return $this->file_php;
    }

    /**
     * @param bool $file_php
     */
    public function setFilePhp(bool $file_php): void
    {
        $this->file_php = $file_php;
    }

    /**
     * @return bool
     */
    public function isTypeShow(): bool
    {
        return $this->type_show;
    }

    /**
     * @param bool $type_show
     */
    public function setTypeShow(bool $type_show): void
    {
        $this->type_show = $type_show;
    }


}