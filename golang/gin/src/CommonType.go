package main

type CommonType struct {
	TypeID		int	`gorm:"primaryKey"`
	ParentID	int
	LeftSeq		int
	RightSeq	int
	Level		int
	TypeName	string
	NodePath	string
	FileJS		bool
	FilePHP		bool
	TypeShow	bool
}

func (CommonType) TableName() string {
	return "t_types"
}