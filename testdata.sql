
insert into Staff (StaffID, StaffName, Permission, StaffAge, Salary, Staff_Key) values (1, 'lyh', 2, 21, 10000, '123456')
go


insert into Staff (StaffID, StaffName, Permission, StaffAge, Salary, Staff_Key) values (2, 'js', 1, 23, 8000, '123456')
go

insert into Account (AID, "Key", Balance) values (2, 'MXS76 4G8IH4UV0T3HAC', 1000)
go


insert into Account (AID, "Key", Balance) values (1, 'BW4NU6MY5J3TMSI2TXWQ',15000)
go


insert into Account (AID, "Key", Balance) values (0, '058GXGFN7KTBS T 8S2A', 2000)
go

insert into buysome (AID, SID, BuyDate, Quantity) values (1, 1, '1-1-1 0:0:1', 200)
go


insert into buysome (AID, SID, BuyDate, Quantity) values (1, 0, '1-1-1 0:0:2', 100)
go


insert into buysome (AID, SID, BuyDate, Quantity) values (0, 0, '1-1-1 0:0:0', 100)
go


insert into charge (DepartmentID, MID) values (2, 1)
go


insert into charge (DepartmentID, MID) values (1, 2)
go

insert into Client (CID, CName, CAge) values (0, 'hec', 2)
go


insert into Client (CID, CName, CAge) values (2, 'robot', 0)
go


insert into Bank (BID, Number_of_Staff, BName, Address) values (1, 3, '光明银行', '北京')
go

insert into devide (BID, DepartmentID) values (1, 2)
go


insert into devide (BID, DepartmentID) values (1, 1)
go


insert into locate (BID, AID) values (1, 0)
go


insert into locate (BID, AID) values (1, 2)
go


insert into locate (BID, AID) values (1, 1)
go


insert into manage (MID, StaffID) values (2, 2)
go


insert into manage (MID, StaffID) values (1, 1)
go


insert into Stock (SID, Price, Benefit, Sname) values (2, 20, 0.02, '中国石油')
go


insert into Stock (SID, Price, Benefit, Sname) values (0, 15, 0.03, '中国石化')
go


insert into Stock (SID, Price, Benefit, Sname) values (1, 36, -0.01, '贵州茅台')
go


insert into "Open" (CID, AID, OpenDate) values (0, 1, '1-1-1 0:0:0')
go


insert into "Open" (CID, AID, OpenDate) values (2, 2, '1-1-1 0:0:0')
go


insert into "Open" (CID, AID, OpenDate) values (0, 0, '1-1-1 0:0:1')
go


insert into Manager (MID, MName, MAge, Mgt_Key) values (1, 'mhh', 41, '123456')
go

insert into Department (DepartmentID, DepartmentName) values (2, '人事部')
go


insert into Manager (MID, MName, MAge, Mgt_Key) values (2, 'gtx', 36, '123456')
go


insert into Department (DepartmentID, DepartmentName) values (1, '营业部')
go


