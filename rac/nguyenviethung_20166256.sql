--1--
select * from Categories;
--2--
select title from products natural join categories
 where categoryname = 'Documentary';
--3--
select categoryname, count(*) as soluong from categories natural join products
 group by categoryname
 having count(*)>0;
--4--
select * from products where prod_id not in (select prod_id from Orderlines);
--5--
select distinct country from customers;
--6--
select country , count(customerid) as soluong from customers
group by country;
--7--
select * from Customers where customerid not in (select customerid from Orders);
--8--
select orderdate,count(orderid) as soluong from orders
group by orderdate
having count(orderid)>0;
--9--
select prod_id,sum(quantity) from orderlines 
where orderdate='3/2/2004'
group by prod_id;
--10--
select sum(totalamount)/ count(orderid) as giatritrungbinh from orders;
--11--
select products.*,sum(quantity) from products natural join orderlines
group by prod_id
having sum(quantity) >= all (select sum(quantity) 
							 from orderlines
							 group by prod_id);
--12--(top 20 nguoi co so luot mua nhieu nhat)
select firstname, lastname,count(orderid) from Customers natural join Orders
group by customerid
order by count(orderid) desc
limit 20;
--13--
select count(*) from Customers where creditcardexpiration='2008/09';
--14--
select Orderlines.orderlineid, Orderlines.prod_id,Products.title, Orderlines.quantity,
	CONCAT(round(Orders.totalamount/Orderlines.quantity,2),'$') AS Unitprice, CONCAT(Orders.totalamount,'$') AS amount
from Orderlines,Orders,Products
where Orderlines.prod_id=Products.prod_id AND Orderlines.orderid=Orders.orderid AND Orderlines.orderid=942;
--15--
select count(customerid) from Orders
where customerid=19887;
--16--
select coalesce(CONCAT(firstname,' ',lastname)) AS Ho_Ten,coalesce(CONCAT(address1,' ',address2)) AS address1,count(orderid) from Customers natural join Orders
group by customerid
having count(orderid) >= 4
order by count(orderid) desc;
--17--
select Orderlines.orderdate from Orderlines,Orders
where Orders.customerid=19887 AND Orderlines.orderid=Orders.orderid
group by Orders.customerid,Orderlines.orderdate,Orders.totalamount
having Orders.totalamount=(select MAX(Orders.totalamount)
from Orders
where customerid=19887);
--18--
select CONCAT(Customers.firstname,' ',Customers.lastname) AS Ho_Ten,sum(Orderlines.quantity) AS slln
from Orderlines,Customers,Orders,Products
where Products.title='AFFAIR ALAMO'
	AND Products.prod_id=Orderlines.prod_id
	AND Orderlines.orderid=Orders.orderid
	AND Orders.customerid=Customers.customerid
group by Orders.customerid,Customers.customerid
having sum(Orderlines.quantity) >= ALL(select sum(Orderlines.quantity) 
							 		from orderlines,Orders,Products
									where Products.title='AFFAIR ALAMO'
										AND Products.prod_id=Orderlines.prod_id
										AND Orderlines.orderid=Orders.orderid
							 		group by Orders.customerid);
--19a--
select distinct(Orders.customerid),Customers.age,Customers.income
into v_x
from Orderlines,Orders,Customers
where Orderlines.orderid=Orders.orderid 
	AND Customers.customerid=Orders.customerid;
select distinct(Orderlines.prod_id), count(v_x.customerid) AS sn_Dat_hang,
	round(AVG(v_x.age),2) AS tuoi_tb,round(AVG(v_x.income),2) AS thunhap_tb
from Orderlines,v_x
group by Orderlines.prod_id
order by Orderlines.prod_id;

select distinct(Orderlines.prod_id), count(distinct(Orders.customerid)) AS sn_Dat_hang,
	round(AVG(Customers.age),2) AS tuoi_tb,round(AVG(Customers.income),2) AS thunhap_tb
from Orderlines,Orders,Customers
where Orderlines.orderid=Orders.orderid 
	AND Customers.customerid=Orders.customerid
group by Orderlines.prod_id
order by Orderlines.prod_id;
--19b--
select gender, count(customerid) AS sn_Dat_hang,round(AVG(age),2) AS tuoi_tb, round(AVG(income),2) AS thunhap_tb
from 	Customers
where customerid in (select customerid 
					from Orders)
group by gender;
--20--
select Products.title,sum(Orderlines.quantity)
from Products,Orderlines,Orders,Customers
where Products.prod_id=Orderlines.prod_id
	AND Orderlines.orderid=Orders.orderid
	AND Customers.customerid=Orders.customerid
	AND Customers.gender='M'
	AND Customers.income > 65000
Group by products.prod_id
ORDER by sum(Orderlines.quantity) desc;
--21--
select * 
into high_price_products
from products
where prod_id=null;
--22--
INSERT INTO high_price_products(prod_id, category, title, actor, price, special, common_prod_id)
SELECT * 
FROM products
WHERE price > 21.99
--23--
UPDATE high_price_products SET category=2 WHERE category=1;
UPDATE high_price_products SET special=1 WHERE price = 29.99;
UPDATE high_price_products SET price=price+1 WHERE price >=23.00 AND price <= 26.99; 
DELETE FROM high_price_products WHERE price<23.00;
--24--
DROP TABLE high_price_products;