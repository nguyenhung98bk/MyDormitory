--
-- PostgreSQL database dump
--

-- Dumped from database version 9.4.4
-- Dumped by pg_dump version 9.4.4
-- Started on 2016-09-22 17:09:51

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- TOC entry 6 (class 2615 OID 24690)
-- Name: NhaCC; Type: SCHEMA; Schema: -; Owner: postgres
--

CREATE SCHEMA "NhaCC";


ALTER SCHEMA "NhaCC" OWNER TO postgres;

--
-- TOC entry 8 (class 2615 OID 16394)
-- Name: store; Type: SCHEMA; Schema: -; Owner: postgres
--

CREATE SCHEMA store;


ALTER SCHEMA store OWNER TO postgres;

--
-- TOC entry 185 (class 3079 OID 11855)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 2070 (class 0 OID 0)
-- Dependencies: 185
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = "NhaCC", pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 177 (class 1259 OID 24691)
-- Name: Cungcap; Type: TABLE; Schema: NhaCC; Owner: postgres; Tablespace: 
--

CREATE TABLE "Cungcap" (
    "MSNCC" integer NOT NULL,
    "MSMH" integer NOT NULL,
    "Giatien" integer
);


ALTER TABLE "Cungcap" OWNER TO postgres;

--
-- TOC entry 178 (class 1259 OID 24694)
-- Name: Mathang; Type: TABLE; Schema: NhaCC; Owner: postgres; Tablespace: 
--

CREATE TABLE "Mathang" (
    "MSMH" integer NOT NULL,
    "TenMH" character varying(30),
    "Mausac" character varying(10)
);


ALTER TABLE "Mathang" OWNER TO postgres;

--
-- TOC entry 179 (class 1259 OID 24697)
-- Name: NCC; Type: TABLE; Schema: NhaCC; Owner: postgres; Tablespace: 
--

CREATE TABLE "NCC" (
    "MSNCC" integer NOT NULL,
    "TenNCC" character varying(30),
    "DiaChi" character varying(100)
);


ALTER TABLE "NCC" OWNER TO postgres;

SET search_path = public, pg_catalog;

--
-- TOC entry 184 (class 1259 OID 32928)
-- Name: orders; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE orders (
    orderid integer NOT NULL,
    customerid integer NOT NULL
);


ALTER TABLE orders OWNER TO postgres;

--
-- TOC entry 183 (class 1259 OID 32926)
-- Name: orders_orderid_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE orders_orderid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE orders_orderid_seq OWNER TO postgres;

--
-- TOC entry 2071 (class 0 OID 0)
-- Dependencies: 183
-- Name: orders_orderid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE orders_orderid_seq OWNED BY orders.orderid;


--
-- TOC entry 180 (class 1259 OID 32852)
-- Name: sujects; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE sujects (
    sid character(5) NOT NULL,
    sname character varying(20),
    scredits integer,
    sid_required character(5)
);


ALTER TABLE sujects OWNER TO postgres;

--
-- TOC entry 182 (class 1259 OID 32920)
-- Name: users; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE users (
    userid integer NOT NULL
);


ALTER TABLE users OWNER TO postgres;

--
-- TOC entry 181 (class 1259 OID 32918)
-- Name: users_userid_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE users_userid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE users_userid_seq OWNER TO postgres;

--
-- TOC entry 2072 (class 0 OID 0)
-- Dependencies: 181
-- Name: users_userid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE users_userid_seq OWNED BY users.userid;


SET search_path = store, pg_catalog;

--
-- TOC entry 174 (class 1259 OID 16395)
-- Name: Customer; Type: TABLE; Schema: store; Owner: postgres; Tablespace: 
--

CREATE TABLE "Customer" (
    "CustomerID" character(6) NOT NULL,
    "LastName" character varying(20),
    "FirstName" character varying(10),
    "Address" character varying(50),
    "City" character varying(20),
    "State" character(2),
    "Zip" character(5),
    "Phone" character varying(15)
);


ALTER TABLE "Customer" OWNER TO postgres;

--
-- TOC entry 175 (class 1259 OID 16403)
-- Name: Order; Type: TABLE; Schema: store; Owner: postgres; Tablespace: 
--

CREATE TABLE "Order" (
    "ProductID" character(6) NOT NULL,
    "OrderID" character(6) NOT NULL,
    "CustomerID" character(6) NOT NULL,
    "PurchaseDate" date,
    "Quantity" integer,
    "TotalCost" money
);


ALTER TABLE "Order" OWNER TO postgres;

--
-- TOC entry 176 (class 1259 OID 16406)
-- Name: Product; Type: TABLE; Schema: store; Owner: postgres; Tablespace: 
--

CREATE TABLE "Product" (
    "ProductID" character(6) NOT NULL,
    "ProductName" character varying(40),
    "Model" character varying(10),
    "Manufacturer" character varying(40),
    "UnitPrice" money,
    "Inventory" integer
);


ALTER TABLE "Product" OWNER TO postgres;

SET search_path = public, pg_catalog;

--
-- TOC entry 1918 (class 2604 OID 32931)
-- Name: orderid; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY orders ALTER COLUMN orderid SET DEFAULT nextval('orders_orderid_seq'::regclass);


--
-- TOC entry 1917 (class 2604 OID 32923)
-- Name: userid; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY users ALTER COLUMN userid SET DEFAULT nextval('users_userid_seq'::regclass);


SET search_path = "NhaCC", pg_catalog;

--
-- TOC entry 2054 (class 0 OID 24691)
-- Dependencies: 177
-- Data for Name: Cungcap; Type: TABLE DATA; Schema: NhaCC; Owner: postgres
--

COPY "Cungcap" ("MSNCC", "MSMH", "Giatien") FROM stdin;
1	1	150
1	2	250
1	3	350
1	4	50
2	1	50
2	2	450
2	3	250
2	4	150
\.


--
-- TOC entry 2055 (class 0 OID 24694)
-- Dependencies: 178
-- Data for Name: Mathang; Type: TABLE DATA; Schema: NhaCC; Owner: postgres
--

COPY "Mathang" ("MSMH", "TenMH", "Mausac") FROM stdin;
1	Mat hang 1	do
2	Mat hang 2	xanh
3	Mat hang 3	xanh
4	Mat hang 4	do
\.


--
-- TOC entry 2056 (class 0 OID 24697)
-- Dependencies: 179
-- Data for Name: NCC; Type: TABLE DATA; Schema: NhaCC; Owner: postgres
--

COPY "NCC" ("MSNCC", "TenNCC", "DiaChi") FROM stdin;
1	Cong ty A	Dia chi A
2	Cong ty B	Dia chi B
3	Cong ty C	Dia chi C
\.


SET search_path = public, pg_catalog;

--
-- TOC entry 2061 (class 0 OID 32928)
-- Dependencies: 184
-- Data for Name: orders; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY orders (orderid, customerid) FROM stdin;
\.


--
-- TOC entry 2076 (class 0 OID 0)
-- Dependencies: 183
-- Name: orders_orderid_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('orders_orderid_seq', 1, false);


--
-- TOC entry 2057 (class 0 OID 32852)
-- Dependencies: 180
-- Data for Name: sujects; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY sujects (sid, sname, scredits, sid_required) FROM stdin;
IT010	Tr¡ tu? nhƒn t?o	3	IT005
IT005	Cau truc DL va GT	2	IT001
IT001	Tin hoc dai cuong	2	\N
IT006	CSDL	3	IT001
\.


--
-- TOC entry 2059 (class 0 OID 32920)
-- Dependencies: 182
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY users (userid) FROM stdin;
\.


--
-- TOC entry 2077 (class 0 OID 0)
-- Dependencies: 181
-- Name: users_userid_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('users_userid_seq', 1, false);


SET search_path = store, pg_catalog;

--
-- TOC entry 2051 (class 0 OID 16395)
-- Dependencies: 174
-- Data for Name: Customer; Type: TABLE DATA; Schema: store; Owner: postgres
--

COPY "Customer" ("CustomerID", "LastName", "FirstName", "Address", "City", "State", "Zip", "Phone") FROM stdin;
BLU003	AAAA	Katie	342 Pine	Hammond	IN	46200	555-9242
BLU001	Blum	Jessica	229 State	Whiting	IN	46300	555-0921
BLU005	Bbbbbbbb	Rich	123 Main St.	Chicago	IL	60633	555-1234
WIL001	Williams	Frank	456 Oak St.	Hammond	IN	46102	\N
\.


--
-- TOC entry 2052 (class 0 OID 16403)
-- Dependencies: 175
-- Data for Name: Order; Type: TABLE DATA; Schema: store; Owner: postgres
--

COPY "Order" ("ProductID", "OrderID", "CustomerID", "PurchaseDate", "Quantity", "TotalCost") FROM stdin;
LAP001	ODR001	BLU001	2012-08-21	1	$1.30
LAP002	ODR002	BLU003	2012-02-03	2	$2.00
LAP001	ORD003	WIL001	2012-06-06	1	$1.30
\.


--
-- TOC entry 2053 (class 0 OID 16406)
-- Dependencies: 176
-- Data for Name: Product; Type: TABLE DATA; Schema: store; Owner: postgres
--

COPY "Product" ("ProductID", "ProductName", "Model", "Manufacturer", "UnitPrice", "Inventory") FROM stdin;
LAP001	Vaio CR31Z	CR	Sony Vaio	$1.30	5
LAP002	HP AZE	HP	\N	$1.00	18
LAP003	HP 34	HP	HP	$1,000.00	200
\.


SET search_path = "NhaCC", pg_catalog;

--
-- TOC entry 1926 (class 2606 OID 24701)
-- Name: pk-Cungcap; Type: CONSTRAINT; Schema: NhaCC; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY "Cungcap"
    ADD CONSTRAINT "pk-Cungcap" PRIMARY KEY ("MSNCC", "MSMH");


--
-- TOC entry 1928 (class 2606 OID 24703)
-- Name: pk-Mathang; Type: CONSTRAINT; Schema: NhaCC; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY "Mathang"
    ADD CONSTRAINT "pk-Mathang" PRIMARY KEY ("MSMH");


--
-- TOC entry 1930 (class 2606 OID 24705)
-- Name: pri-key-NCC; Type: CONSTRAINT; Schema: NhaCC; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY "NCC"
    ADD CONSTRAINT "pri-key-NCC" PRIMARY KEY ("MSNCC");


SET search_path = public, pg_catalog;

--
-- TOC entry 1934 (class 2606 OID 32925)
-- Name: pk; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY users
    ADD CONSTRAINT pk PRIMARY KEY (userid);


--
-- TOC entry 1936 (class 2606 OID 32933)
-- Name: pk_order; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY orders
    ADD CONSTRAINT pk_order PRIMARY KEY (orderid);


--
-- TOC entry 1932 (class 2606 OID 32856)
-- Name: sujects_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY sujects
    ADD CONSTRAINT sujects_pkey PRIMARY KEY (sid);


SET search_path = store, pg_catalog;

--
-- TOC entry 1920 (class 2606 OID 16414)
-- Name: pk_Customer; Type: CONSTRAINT; Schema: store; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY "Customer"
    ADD CONSTRAINT "pk_Customer" PRIMARY KEY ("CustomerID");


--
-- TOC entry 1924 (class 2606 OID 16420)
-- Name: pk_Product; Type: CONSTRAINT; Schema: store; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY "Product"
    ADD CONSTRAINT "pk_Product" PRIMARY KEY ("ProductID");


--
-- TOC entry 1922 (class 2606 OID 16422)
-- Name: pk_order; Type: CONSTRAINT; Schema: store; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY "Order"
    ADD CONSTRAINT pk_order PRIMARY KEY ("OrderID");


SET search_path = "NhaCC", pg_catalog;

--
-- TOC entry 1939 (class 2606 OID 24706)
-- Name: fk-Cungcap-Mathang; Type: FK CONSTRAINT; Schema: NhaCC; Owner: postgres
--

ALTER TABLE ONLY "Cungcap"
    ADD CONSTRAINT "fk-Cungcap-Mathang" FOREIGN KEY ("MSMH") REFERENCES "Mathang"("MSMH") ON DELETE CASCADE;


--
-- TOC entry 1940 (class 2606 OID 24711)
-- Name: pk-Cungcap-NCC; Type: FK CONSTRAINT; Schema: NhaCC; Owner: postgres
--

ALTER TABLE ONLY "Cungcap"
    ADD CONSTRAINT "pk-Cungcap-NCC" FOREIGN KEY ("MSNCC") REFERENCES "NCC"("MSNCC");


SET search_path = public, pg_catalog;

--
-- TOC entry 1941 (class 2606 OID 32934)
-- Name: fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY orders
    ADD CONSTRAINT fk FOREIGN KEY (customerid) REFERENCES users(userid);


SET search_path = store, pg_catalog;

--
-- TOC entry 1937 (class 2606 OID 16423)
-- Name: fk_order_customer; Type: FK CONSTRAINT; Schema: store; Owner: postgres
--

ALTER TABLE ONLY "Order"
    ADD CONSTRAINT fk_order_customer FOREIGN KEY ("CustomerID") REFERENCES "Customer"("CustomerID");


--
-- TOC entry 1938 (class 2606 OID 16428)
-- Name: fk_order_product; Type: FK CONSTRAINT; Schema: store; Owner: postgres
--

ALTER TABLE ONLY "Order"
    ADD CONSTRAINT fk_order_product FOREIGN KEY ("ProductID") REFERENCES "Product"("ProductID");


--
-- TOC entry 2068 (class 0 OID 0)
-- Dependencies: 7
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- TOC entry 2069 (class 0 OID 0)
-- Dependencies: 8
-- Name: store; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA store FROM PUBLIC;
REVOKE ALL ON SCHEMA store FROM postgres;


--
-- TOC entry 2073 (class 0 OID 0)
-- Dependencies: 174
-- Name: Customer; Type: ACL; Schema: store; Owner: postgres
--

REVOKE ALL ON TABLE "Customer" FROM PUBLIC;
REVOKE ALL ON TABLE "Customer" FROM postgres;
GRANT ALL ON TABLE "Customer" TO postgres;
GRANT SELECT ON TABLE "Customer" TO PUBLIC;


--
-- TOC entry 2074 (class 0 OID 0)
-- Dependencies: 175
-- Name: Order; Type: ACL; Schema: store; Owner: postgres
--

REVOKE ALL ON TABLE "Order" FROM PUBLIC;
REVOKE ALL ON TABLE "Order" FROM postgres;
GRANT ALL ON TABLE "Order" TO postgres;


--
-- TOC entry 2075 (class 0 OID 0)
-- Dependencies: 176
-- Name: Product; Type: ACL; Schema: store; Owner: postgres
--

REVOKE ALL ON TABLE "Product" FROM PUBLIC;
REVOKE ALL ON TABLE "Product" FROM postgres;
GRANT ALL ON TABLE "Product" TO postgres;


-- Completed on 2016-09-22 17:09:51

--
-- PostgreSQL database dump complete
--

