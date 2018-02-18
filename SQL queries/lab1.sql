---------------------------------------------------------
--=====================================================--
--------Student Name: Yashwanth Reddy Kuruganti----------
----------------Database Assignment 1--------------------
--=====================================================--
--              Book Store Maintanence Database        --
---------------------------------------------------------

/*--------Customer Table Creation------------*/
create table Customer(C_Id number,C_Name varchar(10),Credit_Limit number,
Income_Level character check(Income_Level in ('L','M','H')),
Gender character check(Gender in ('M','F')),
primary key(C_Id));

/*------WareHouse Table Creation-------*/
create table WareHouse(Warehouse_Id NUMBER,Location VARCHAR(20),Quantity_In_Stock number,
primary key(Warehouse_Id));

/*------Book Table Creation-------*/
create table Book(Book_Id number,Book_Name varchar(20),Warehouse_Id number,Quantity_On_Hand number,
Warranty_Period number,Purchased_Price number,
primary key(Book_Id),
foreign key(Warehouse_Id) references WareHouse(Warehouse_Id)on delete cascade);

/*------Orders Table Creation-------*/
create table Orders(Order_Id number,Order_Date date,C_Id number,Order_Status varchar(10) check(Order_Status in ('C','P')),
primary key(Order_Id),
foreign key(C_Id) references Customer(C_Id)on delete cascade);

/*------OrderItems Table Creation-------*/
create table OrderItems(Order_Id number,Book_Id number,Unit_Price number,Quantity number,
primary key(Order_Id,Book_Id),
foreign key(Order_Id) references Orders(Order_Id) on delete cascade,
foreign key(Book_Id) references Book(Book_Id) on delete cascade);

------------------------------------------------------------
/****************Data Insertion into Tables****************/
------------------------------------------------------------
/*-----Customer Table Data Insertion------*/
insert into Customer VALUES (1,'Jone',140,'L','F');
insert into Customer VALUES (2,'Chris',230,'M','M');
insert into Customer VALUES (3,'Saywer',480,'H','F');
insert into Customer VALUES (4,'Kropy',500,'H','M');
insert into Customer VALUES (5,'Lucy',220,'M','M');
insert into Customer VALUES (6,'Mando',100,'L','F');
insert into Customer VALUES (7,'Bunny',300,'M','F');

/*-----WareHouse Table Data Insertion------*/
insert into WareHouse VALUES(1,'Los Angles',1100);
insert into WareHouse VALUES(2,'Chicago',800);
insert into WareHouse VALUES(3,'New York',700);

/*-----Book Table Data Insertion------*/
insert into Book VALUES (1,'Life with dog',1,18,90,6);
insert into Book VALUES (2,'Inferno',1,25,180,8);
insert into Book VALUES (3,'Doctor sleep',3,9,365,10);
insert into Book VALUES (4,'Disappear',2,60,30,15);
insert into Book VALUES (5,'Six years',2,50,365,7);
insert into Book VALUES (6,'The lowland',1,5,120,25);
insert into Book VALUES (7,'Wave',3,11,60,20);
insert into Book VALUES (8,'Lost world',2,20,30,15);
insert into Book VALUES (9,'Whiskey beach',3,33,150,10);

/*-----Orders Table Data Insertion------*/
insert into Orders VALUES (1,'2016-08-01',1,'P');
insert into Orders VALUES (2,'2016-08-27',2,'C');
insert into Orders VALUES (3,'2016-06-20',3,'C');
insert into Orders VALUES (4,'2016-08-01',4,'C');
insert into Orders VALUES (5,'2016-08-31',1,'P');
insert into Orders VALUES (6,'2016-09-01',4,'P');
insert into Orders VALUES (7,'2016-07-20',6,'C');
insert into Orders VALUES (8,'2016-08-11',2,'C');

/*-----OrderItems Table Data Insertion------*/
insert into OrderItems VALUES (1,1,19,2);
insert into OrderItems VALUES (1,2,20,1);
insert into OrderItems VALUES (2,1,17,1);
insert into OrderItems VALUES (3,4,20,2);
insert into OrderItems VALUES (3,2,25,3);
insert into OrderItems VALUES (3,8,16,1);
insert into OrderItems VALUES (4,4,21,10);
insert into OrderItems VALUES (5,2,10,2);
insert into OrderItems VALUES (5,8,28,1);
insert into OrderItems VALUES (6,9,16,10);
insert into OrderItems VALUES (7,5,12,3);
insert into OrderItems VALUES (7,7,25,1);
insert into OrderItems VALUES (8,4,30,2);


/****************Queries****************/
--1
Select count(Case When Customer.Gender='M' then 1 End) as NoofMaleCustomers,
count(Case When Customer.Gender='F' then 1 End) NoofFemaleCustomers
from Customer;

--2     
Select C_Name,
  (select Avg(CREDIT_LIMIT) 
   from customer 
   where income_level='M') 
Avg_Credit_Limit
from Customer
where Income_Level='M';

--3
Select Customer.C_Name
from Customer, Orders
where Customer.Income_Level='H' and Orders.C_Id=Customer.C_Id and Orders.Order_Status='C';

--4   Return the name of the customer who has placed more orders than any other customer.
Select C.C_Name
From Customer C, Orders O
WHERE C.C_Id = O.C_Id
group by C.C_Name
having count(C.C_Id) = (Select Max(C.C_Id) from
                        (Select Count(*)C_Id from Orders group by C_Id)
                        C);
    
--5
Select C_Name
From Customer C,Orders O
Where C.C_Id=O.C_Id and C.Income_Level!='H' 
and Order_Id in ( Select Order_Id from OrderItems 
                  group by Order_Id 
                  having sum(Quantity)>=3 )
group by C_Name;


--6
Select sum(OI.Quantity*OI.Unit_Price) Sale_Revenue,((sum(OI.Quantity*OI.Unit_Price))-sum(B.Purchased_Price*OI.Quantity)) Profit
From OrderItems OI,Orders O,Book B
Where OI.Order_Id=O.Order_Id and OI.Book_Id=B.Book_Id and O.Order_Status = 'C';

--7
Select C.C_Name--,sum(Quantity*Unit_Price)
from Customer C,Orders O,OrderItems OI
where C.C_Id=O.C_Id and O.Order_Id=OI.Order_Id and O.Order_Status='P' 
group by C.C_Name,C.Credit_limit
having ( sum(OI.Quantity*OI.Unit_Price)> C.Credit_Limit/2 );


--8
Select O.Order_Id,B.Book_Name,O.Order_Date,B.Warranty_Period
from Orders O,OrderItems OI,Book B
where B.Book_Id=OI.Book_Id and OI.Order_Id=O.Order_Id and Quantity_On_Hand>10 and current_date-O.Order_date>B.Warranty_Period;

--9)Return the name/names of the customers who have purchased at least two books in August 2016. (Including all processing and completed orders)
Select  C_Name
from Customer C,Book B,Orders O,OrderItems OI
where C.C_Id=O.C_Id and B.Book_ID=OI.Book_Id and OI.Order_Id=O.Order_Id and OI.Quantity>=2
and O.Order_Date between to_date('2016-08-01')and to_date('2016-08-31')
group by C_Name;

--10
Select C.C_Name
from Customer C,Book B,Orders O,OrderItems OI
where C.C_Id=O.C_Id and B.Book_ID=OI.Book_Id and OI.Order_Id=O.Order_Id 
group by C.C_Name,OI.Order_Id
having count(distinct B.Warehouse_Id)>=2;

--11)Return the total number of male customers who did not place any order in August 2016.
Select count(Gender)No_Of_Male_Customers
from Customer C,Book B,Orders O,OrderItems OI
where C.C_Id=O.C_Id and B.Book_ID=OI.Book_Id and OI.Order_Id=O.Order_Id and C.Gender='M'
and O.Order_Date not between to_date('2016-08-01')and to_date('2016-08-31');

--12 Which book/books have not  been ordered by high level income customers yet?
Select B.Book_Id,B.Book_Name
from Book B 
where B.Book_Id not in (Select Book_Id from Customer C,Orders O,OrderItems OI
where C.C_Id=O.C_Id and OI.Order_Id=O.Order_Id and C.Income_Level='H');

--13  13) Find the item that has the largest  selling volume for customers in different gender

Select C.Gender,B.Book_name
From Customer C,Orders O,OrderItems OI,Book B
Where C.C_Id = O.C_Id and O.Order_Id = OI.Order_Id and OI.Book_Id = B.Book_Id
Group by C.Gender, B.Book_name
Having sum(Quantity) = 
(Select max(G.Quantity1) From 
  (Select sum(Quantity) as Quantity1 
  From Customer C1, Orders O1, OrderItems OI1, Book B1
  Where C1.C_Id = O1.C_Id and O1.Order_Id = OI1.Order_Id and OI1.Book_Id = B1.Book_Id and C.Gender = C1.Gender
  Group by C1.Gender, B1.Book_Id) G);

--14
Select Order_Id
from OrderItems
group by Order_Id
order by sum(Unit_Price*Quantity);

--15 Return the name of the book, which is ordered by more customers than any other book.
Select B.Book_Name
from Book B,OrderItems OI
Where B.Book_Id=OI.Book_Id
group by B.Book_Name
having sum(OI.Quantity) = (
Select max(Sum_Quan) FROM 
(Select sum(OI.Quantity) as Sum_Quan
                        from Book B,OrderItems OI
                        Where B.Book_Id=OI.Book_Id
                        group by B.Book_Name)
                        Temp
 );

--16 Calculate the average profit of each book; and find the most and least profitable book
Create View vProfit As 
Select B.Book_Name,(sum(OI.Unit_Price*OI.Quantity)-sum(B.Purchased_Price*OI.Quantity))/sum(OI.Quantity) as ViewProf
from Book B,OrderItems OI
where B.Book_Id = OI.Book_Id
group by B.Book_name;


Select VPL.Book_Name Min_Profit_Book, VPM.Book_Name Max_Profit_Book
from vProfit VPL,vProfit VPM
Where VPL.ViewProf = (Select MIN(ViewProf) FROM vProfit) 
and VPM.ViewProf = (Select MAX(ViewProf) FROM vProfit);


/*******************************************************/
------Update-----
--1 Decrease the credit limit of all female customers by 30%. Then if there exists any “processing” order that exceed the customer’s
--- credit limit, delete such orders.

Update Customer
Set Credit_Limit=Credit_Limit-Credit_Limit*0.3
where Gender='F';

Delete from Orders O
where exists 
(Select O.Order_Id from OrderItems OI,Customer C
where C.C_Id=O.C_Id and OI.Order_Id=O.Order_Id and O.Order_Status='P'
group by O.Order_Id,C.Credit_Limit
having sum(OI.Unit_Price*OI.Quantity)>C.Credit_Limit);

--2 After all the “processing” orders are completed; you first update their statuses to “completed” 
--and then update the On_Hand_Quantity in Book table.

Create Trigger Quantity_Update_Trigger
  After Update On Orders  for each row
  When(Old.Order_Status = 'P')
  Begin
    Update Book B Set Quantity_On_Hand = Quantity_On_Hand - (Select Quantity from OrderItems Where Book_Id = B.Book_Id 
    and Order_id =: Old.order_Id)
    WHERE B.Book_Id IN(
    Select Book_Id from OrderItems OI Where OI.Order_Id =: Old.Order_id);
  END;
/

Update Orders Set Order_Status = 'C' Where Order_Status = 'P';

--3
Delete from Customer where C_Name='Kropy';

--4 Increase the warranty period by 30 days for all the products stored in warehouse “Chicago”. If total days more than 365, than set it as 365.
Update Book
set Warranty_Period=
  (Case 
  when Warranty_Period=365 then 365
  else Warranty_Period+30
  end)
Where Warehouse_Id in (Select Warehouse_Id from Warehouse Where Location='Chicago');


/********Drop Views and Tables**********/
Drop view vProfit;

Drop table OrderItems;
Drop table Orders;
Drop table customer;
Drop table Book;
Drop table WareHouse;  



