CREATE TABLE phong (
	sncur int not null,
	snmax int not null,
	sophong int not null,
	msphong int not null,
	mskhu int not null
    );
    
create table Khuktx (
	mskhu int not null,
	tenkhu varchar(5) not null,
	mscb int not null,
	giaphong int not null,
	gioitinh varchar(5) not null
    );
    
create table Canboquanly (
	mscb int not null,
	tencb varchar(30) not null,
	nscb date,
	gtcb varchar(4) not null,
	sdt varchar(15) not null,
	uscb varchar(30) not null
    );
    
create table phieudangky (
	msphong int not null,
	mssv int not null,
	kyo int not null,
	loaidk varchar(20) not null,
	trangthaidk varchar(20) not null,
	ngaydk date,
	ngaychapnhan date
    );
create table sinhvien (
	mssv int not null,
    tensv varchar (30) not null,
    nssv date,
	gtsv varchar(4) not null,
	lop varchar(10) not null,
	qqsv varchar(20) not null,
	ussv varchar(30) not null,
	sdt varchar(20) not null
    );
    
create table Accounts (
	taikhoan varchar(30) not null,
	matkhau varchar(30) not null,
	ltt varchar(10) not null
	);
    
INSERT into phong values ('0', '10', '100', '1', '1');
INSERT into phong values ('0', '10', '101', '2', '1');
INSERT into phong values ('0', '10', '102', '3', '1');
INSERT into phong values ('0', '10', '103', '4', '1');
INSERT into phong values ('0', '10', '104', '5', '1');
INSERT into phong values ('0', '10', '100', '6', '2');
INSERT into phong values ('0', '10', '101', '7', '2');
INSERT into phong values ('0', '10', '102', '8', '2');
INSERT into phong values ('0', '10', '103', '9', '2');
INSERT into phong values ('0', '10', '104', '10', '2');
INSERT into phong values ('0', '10', '100', '11', '3');
INSERT into phong values ('0', '10', '101', '12', '3');
INSERT into phong values ('0', '10', '102', '13', '3');
INSERT into phong values ('0', '10', '103', '14', '3');
INSERT into phong values ('0', '10', '104', '15', '3');

INSERT into Khuktx values ('1', 'B1', '1001','1400','Nu');
INSERT into Khuktx values ('2', 'B2', '1002','1500','Nam');
INSERT into Khuktx values ('3', 'B3', '1003','1300','Nam');

INSERT into Canboquanly values ('1001', 'Nguyen Thu Ha', date '1970-6-1','nu','0983774999','nguyenthuha');
INSERT into Canboquanly values ('1002', 'Nguyen Van Hoang', date '1965-8-12','nam','0989666888','nguyenvanhoang');
INSERT into Canboquanly values ('1003', 'Bui Van Minh', date '1972-2-26','nam','0989123456','buivanminh');

INSERT into Accounts values ('nguyenthuha', '1001', 'quanly');
INSERT into Accounts values ('nguyenvanhoang', '1002', 'quanly');
INSERT into Accounts values ('buivanminh', '1003', 'quanly');

alter table phong add constraint pkey_ttp primary key (msphong);
alter table Khuktx add constraint pkey_kkt primary key (mskhu);
alter table phieudangky add constraint pkey_dk primary key (mssv);
alter table Canboquanly add constraint pkey_cbql primary key (mscb);
alter table Sinhvien add constraint pkey_sv primary key (mssv);
alter table Accounts add constraint pkey_tk primary key (taikhoan);

alter table phong add constraint fk_ttp_ktx foreign key (mskhu) references Khuktx(mskhu);
alter table Khuktx add constraint fk_ktx_cbql foreign key (mscb) references Canboquanly(mscb);
alter table phieudangky add constraint fk_dk_ttp foreign key (msphong) references phong(msphong);
alter table phieudangky add constraint fk_dk_sv foreign key (mssv) references Sinhvien(mssv);
alter table Sinhvien add constraint fk_sv_ac foreign key (ussv) references Accounts(taikhoan);
alter table Canboquanly add constraint fk_cb_ac foreign key (uscb) references Accounts(taikhoan);


select * from phong,khuktx ;

