/*==============================================================*/
/* DBMS name:      Microsoft SQL Server 2005                    */
/* Created on:     11/19/2016 11:16:18 AM                       */
/*==============================================================*/


if exists (select 1
            from  sysobjects
           where  id = object_id('Account')
            and   type = 'U')
   drop table Account
go

if exists (select 1
            from  sysobjects
           where  id = object_id('Bank')
            and   type = 'U')
   drop table Bank
go

if exists (select 1
            from  sysobjects
           where  id = object_id('Client')
            and   type = 'U')
   drop table Client
go

if exists (select 1
            from  sysobjects
           where  id = object_id('Department')
            and   type = 'U')
   drop table Department
go

if exists (select 1
            from  sysobjects
           where  id = object_id('Manager')
            and   type = 'U')
   drop table Manager
go

if exists (select 1
            from  sysobjects
           where  id = object_id('"Open"')
            and   type = 'U')
   drop table "Open"
go

if exists (select 1
            from  sysobjects
           where  id = object_id('Staff')
            and   type = 'U')
   drop table Staff
go

if exists (select 1
            from  sysobjects
           where  id = object_id('Stock')
            and   type = 'U')
   drop table Stock
go

if exists (select 1
            from  sysobjects
           where  id = object_id('buysome')
            and   type = 'U')
   drop table buysome
go

if exists (select 1
            from  sysobjects
           where  id = object_id('charge')
            and   type = 'U')
   drop table charge
go

if exists (select 1
            from  sysobjects
           where  id = object_id('devide')
            and   type = 'U')
   drop table devide
go

if exists (select 1
            from  sysobjects
           where  id = object_id('locate')
            and   type = 'U')
   drop table locate
go

if exists (select 1
            from  sysobjects
           where  id = object_id('manage')
            and   type = 'U')
   drop table manage
go

/*==============================================================*/
/* Table: Account                                               */
/*==============================================================*/
create table Account (
   AID                  int                  not null,
   "Key"                char(20)             null,
   Balance              int                  null,
   constraint PK_ACCOUNT primary key nonclustered (AID)
)
go

/*==============================================================*/
/* Table: Bank                                                  */
/*==============================================================*/
create table Bank (
   BID                  int                  not null,
   Number_of_Staff      int                  null,
   BName                char(20)             null,
   Address              char(20)             null,
   constraint PK_BANK primary key nonclustered (BID)
)
go

/*==============================================================*/
/* Table: Client                                                */
/*==============================================================*/
create table Client (
   CID                  int                  not null,
   CName                char(20)             null,
   CAge                 int                  null,
   constraint PK_CLIENT primary key nonclustered (CID)
)
go

/*==============================================================*/
/* Table: Department                                            */
/*==============================================================*/
create table Department (
   DepartmentID         int                  not null,
   DepartmentName       char(20)             null,
   constraint PK_DEPARTMENT primary key nonclustered (DepartmentID)
)
go

/*==============================================================*/
/* Table: Manager                                               */
/*==============================================================*/
create table Manager (
   MID                  int                  not null,
   MName                char(20)             null,
   MAge                 int                  null,
   Mgt_Key              char(20)             null,
   constraint PK_MANAGER primary key nonclustered (MID)
)
go

/*==============================================================*/
/* Table: "Open"                                                */
/*==============================================================*/
create table "Open" (
   CID                  int                  not null,
   AID                  int                  not null,
   OpenDate             datetime             null,
   constraint PK_OPEN primary key (CID, AID)
)
go

/*==============================================================*/
/* Table: Staff                                                 */
/*==============================================================*/
create table Staff (
   StaffID              int                  not null,
   StaffName            char(20)             null,
   Permission           int                  null,
   StaffAge             int                  null,
   Salary               int                  null,
   Staff_Key            char(20)             null,
   constraint PK_STAFF primary key nonclustered (StaffID)
)
go

/*==============================================================*/
/* Table: Stock                                                 */
/*==============================================================*/
create table Stock (
   SID                  int                  not null,
   Price                int                  null,
   Benefit              float                null,
   Sname                char(20)             null,
   constraint PK_STOCK primary key nonclustered (SID)
)
go

/*==============================================================*/
/* Table: buysome                                               */
/*==============================================================*/
create table buysome (
   AID                  int                  not null,
   SID                  int                  not null,
   BuyDate              datetime             null,
   Quantity             int                  null,
   constraint PK_BUYSOME primary key (AID, SID)
)
go

/*==============================================================*/
/* Table: charge                                                */
/*==============================================================*/
create table charge (
   DepartmentID         int                  not null,
   MID                  int                  not null,
   constraint PK_CHARGE primary key (DepartmentID, MID)
)
go

/*==============================================================*/
/* Table: devide                                                */
/*==============================================================*/
create table devide (
   BID                  int                  not null,
   DepartmentID         int                  not null,
   constraint PK_DEVIDE primary key (BID, DepartmentID)
)
go

/*==============================================================*/
/* Table: locate                                                */
/*==============================================================*/
create table locate (
   BID                  int                  not null,
   AID                  int                  not null,
   constraint PK_LOCATE primary key (BID, AID)
)
go

/*==============================================================*/
/* Table: manage                                                */
/*==============================================================*/
create table manage (
   MID                  int                  not null,
   StaffID              int                  not null,
   constraint PK_MANAGE primary key (MID, StaffID)
)
go

