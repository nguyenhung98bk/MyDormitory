create view view_dellstore as
	select Customers.customerid,Customers.firstname,Customers.lastname,Customers.email,
		Customers.phone,cust_hist.orderid,Orderlines.orderlineid,cust_hist.prod_id,Products.title,Orderlines.quantity
	from Orderlines,cust_hist,Products,Customers
	where Customers.customerid=cust_hist.customerid
	and cust_hist.orderid=Orderlines.prod_id
	and Orderlines.prod_id=Products.prod_id
	