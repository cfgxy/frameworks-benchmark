package com.example.data;

import javax.persistence.*;

@Entity
@Table(name = "t_types")
public class CommonType {
    @Id
    @GeneratedValue(strategy = GenerationType.AUTO)
    private Long typeId;

    private Long parentId;
    private Long leftSeq;
    private Long rightSeq;
    private Long level;
    private String typeName;
    private String nodePath;
    private Boolean fileJs;
    private Boolean filePhp;
    private Boolean typeShow;

    public Long getTypeId() {
        return typeId;
    }

    public void setTypeId(Long typeId) {
        this.typeId = typeId;
    }

    public Long getParentId() {
        return parentId;
    }

    public void setParentId(Long parentId) {
        this.parentId = parentId;
    }

    public Long getLeftSeq() {
        return leftSeq;
    }

    public void setLeftSeq(Long leftSeq) {
        this.leftSeq = leftSeq;
    }

    public Long getRightSeq() {
        return rightSeq;
    }

    public void setRightSeq(Long rightSeq) {
        this.rightSeq = rightSeq;
    }

    public Long getLevel() {
        return level;
    }

    public void setLevel(Long level) {
        this.level = level;
    }

    public String getTypeName() {
        return typeName;
    }

    public void setTypeName(String typeName) {
        this.typeName = typeName;
    }

    public String getNodePath() {
        return nodePath;
    }

    public void setNodePath(String nodePath) {
        this.nodePath = nodePath;
    }

    public Boolean getFileJs() {
        return fileJs;
    }

    public void setFileJs(Boolean fileJs) {
        this.fileJs = fileJs;
    }

    public Boolean getFilePhp() {
        return filePhp;
    }

    public void setFilePhp(Boolean filePhp) {
        this.filePhp = filePhp;
    }

    public Boolean getTypeShow() {
        return typeShow;
    }

    public void setTypeShow(Boolean typeShow) {
        this.typeShow = typeShow;
    }
}
