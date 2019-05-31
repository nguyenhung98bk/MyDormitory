CREATE TABLE phong (
	sncur int not null,
	snmax int not null,
	sophong int not null,
	gioitinh varchar(5) not null,
	msphong int not null,
	mskhu int not null,
	CHECK (sncur < snmax or sncur = snmax),
	CHECK (sncur = 0 or sncur > 0)
    );
    
create table khuktx (
	mskhu int not null,
	tenkhu varchar(5) not null,
	giaphong int not null,
	CHECK (giaphong = 0 or giaphong > 0)
    );
    
create table canboquanly (
	mscb int not null,
	tencb varchar(30) not null,
	nscb date,
	gtcb varchar(5) not null,
	qqcb varchar(20) not null,
	sdt varchar(11) not null,
	uscb varchar(30) not null,
	mskhu int not null
    );
    
create table phieudangky(
	msphong int not null,
	mssv int not null,
	kyo int not null,
	trangthaidk varchar(20) not null,
	ngaydk date,
	ngayduyet date,
	lephi int not null,
	mscb int,
	CHECK (lephi > 0)
    );

create table sinhvien (
	mssv int not null,
    tensv varchar (30) not null,
    nssv date,
	gtsv varchar(5) not null,
	lop varchar(10) not null,
	qqsv varchar(20) not null,
	ussv varchar(30) not null,
	sdt varchar(11) not null
    );
    
create table accounts (
	taikhoan varchar(30) not null,
	matkhau varchar(30) not null,
	ltk varchar(10) not null
	);
    
INSERT into phong values (0, 3, 101, 'nam', 01, 1);
INSERT into phong values (0, 3, 102, 'nam', 02, 1);
INSERT into phong values (0, 3, 103, 'nam', 03, 1);
INSERT into phong values (0, 3, 104, 'nam', 04, 1);
INSERT into phong values (0, 3, 105, 'nam', 05, 1);
INSERT into phong values (0, 3, 201, 'nu', 06, 1);
INSERT into phong values (0, 3, 202, 'nu', 07, 1);
INSERT into phong values (0, 3, 203, 'nu', 08, 1);
INSERT into phong values (0, 3, 204, 'nu', 09, 1);
INSERT into phong values (0, 3, 205, 'nu', 10, 1);
INSERT into phong values (0, 3, 301, 'nu', 11, 1);
INSERT into phong values (0, 3, 302, 'nu', 12, 1);
INSERT into phong values (0, 3, 303, 'nu', 13, 1);
INSERT into phong values (0, 3, 304, 'nu', 14, 1);
INSERT into phong values (0, 3, 305, 'nu', 15, 1);
INSERT into phong values (0, 3, 401, 'nam', 16, 1);
INSERT into phong values (0, 3, 402, 'nam', 17, 1);
INSERT into phong values (0, 3, 403, 'nam', 18, 1);
INSERT into phong values (0, 3, 404, 'nam', 19, 1);
INSERT into phong values (0, 3, 405, 'nam', 20, 1);

INSERT into phong values (0, 4, 101, 'nu', 21, 2);
INSERT into phong values (0, 4, 102, 'nu', 22, 2);
INSERT into phong values (0, 4, 103, 'nu', 23, 2);
INSERT into phong values (0, 4, 104, 'nu', 24, 2);
INSERT into phong values (0, 4, 105, 'nu', 25, 2);
INSERT into phong values (0, 4, 201, 'nu', 26, 2);
INSERT into phong values (0, 4, 202, 'nu', 27, 2);
INSERT into phong values (0, 4, 203, 'nu', 28, 2);
INSERT into phong values (0, 4, 204, 'nu', 29, 2);
INSERT into phong values (0, 4, 205, 'nu', 30, 2);
INSERT into phong values (0, 4, 301, 'nu', 31, 2);
INSERT into phong values (0, 4, 302, 'nu', 32, 2);
INSERT into phong values (0, 4, 303, 'nu', 33, 2);
INSERT into phong values (0, 4, 304, 'nu', 34, 2);
INSERT into phong values (0, 4, 305, 'nu', 35, 2);
INSERT into phong values (0, 4, 401, 'nu', 36, 2);
INSERT into phong values (0, 4, 402, 'nu', 37, 2);
INSERT into phong values (0, 4, 403, 'nu', 38, 2);
INSERT into phong values (0, 4, 404, 'nu', 39, 2);
INSERT into phong values (0, 4, 405, 'nu', 40, 2);

INSERT into phong values (0, 6, 101, 'nam', 41, 3);
INSERT into phong values (0, 6, 102, 'nam', 42, 3);
INSERT into phong values (0, 6, 103, 'nam', 43, 3);
INSERT into phong values (0, 6, 104, 'nam', 44, 3);
INSERT into phong values (0, 6, 105, 'nam', 45, 3);
INSERT into phong values (0, 6, 201, 'nam', 46, 3);
INSERT into phong values (0, 6, 202, 'nam', 47, 3);
INSERT into phong values (0, 6, 203, 'nam', 48, 3);
INSERT into phong values (0, 6, 204, 'nam', 49, 3);
INSERT into phong values (0, 6, 205, 'nam', 50, 3);
INSERT into phong values (0, 6, 301, 'nam', 51, 3);
INSERT into phong values (0, 6, 302, 'nam', 52, 3);
INSERT into phong values (0, 6, 303, 'nam', 53, 3);
INSERT into phong values (0, 6, 304, 'nam', 54, 3);
INSERT into phong values (0, 6, 305, 'nam', 55, 3);
INSERT into phong values (0, 6, 401, 'nam', 56, 3);
INSERT into phong values (0, 6, 402, 'nam', 57, 3);
INSERT into phong values (0, 6, 403, 'nam', 58, 3);
INSERT into phong values (0, 6, 404, 'nam', 59, 3);
INSERT into phong values (0, 6, 405, 'nam', 60, 3);

INSERT into khuktx values (1, 'B1', 400000);
INSERT into khuktx values (2, 'B2', 300000);
INSERT into khuktx values (3, 'B3', 200000);

INSERT into canboquanly values (1001, 'Nguyen Thu Ha', date '1970-6-1','nu','Ha Noi','0983774999','cb1',1);
INSERT into canboquanly values (1002, 'Nguyen Van Hoang', date '1965-8-12','nam','Ha Noi','0989666888','cb2',2);
INSERT into canboquanly values (1003, 'Bui Van Minh', date '1972-2-26','nam','Ha Noi','0989123456','cb3',3);
INSERT into canboquanly values (1004, 'Nguyen Thi Lan', date '1972-3-21','nu','Ha Noi','0989123448','cb4',1);

INSERT into accounts values ('cb1', '1001', 'quanly');
INSERT into accounts values ('cb2', '1002', 'quanly');
INSERT into accounts values ('cb3', '1003', 'quanly');
INSERT into accounts values ('cb4', '1004', 'quanly');
INSERT into accounts values ('admin','admin','admin');

alter table phong add constraint pkey_ttp primary key (msphong);
alter table khuktx add constraint pkey_kkt primary key (mskhu);
alter table canboquanly add constraint pkey_cbql primary key (mscb);
alter table sinhvien add constraint pkey_sv primary key (mssv);
alter table accounts add constraint pkey_tk primary key (taikhoan);
alter table phieudangky add constraint pkey_id primary key (msphong,mssv,kyo);

alter table phong add constraint fk_p_k foreign key (mskhu) references khuktx(mskhu);
alter table canboquanly add constraint fk_c_k foreign key (mskhu) references khuktx(mskhu);
alter table phieudangky add constraint fk_pdk_p foreign key (msphong) references phong(msphong);
alter table phieudangky add constraint fk_pdk_s foreign key (mssv) references sinhvien(mssv);
alter table sinhvien add constraint fk_s_a foreign key (ussv) references accounts(taikhoan);
alter table canboquanly add constraint fk_c_a foreign key (uscb) references accounts(taikhoan);
