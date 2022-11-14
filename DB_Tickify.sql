create table category_table(
category_id serial,
category_name varchar(255),
primary key (category_id)
);

create table account_table(
account_id serial,
user_name varchar(255),
e_mail varchar(255),
account_password varchar(255),
account_access varchar(255),

primary key (account_id)
);


create table event_table(
event_id serial,
category_id int not null,
account_id int not null,
max_seats int,
event_name varchar(255),
short_description varchar(255),
time_of_event timestamp,
address varchar(255),

primary key (event_id),
foreign key (category_id) references category_table(category_id),
foreign key (account_id) references account_table(account_id)
);

create table ticket_category_table(
ticket_cat_id serial,
event_id int not null,
category_name varchar(255),
ticket_price money,
quantity int,

primary key(ticket_cat_id),
foreign key (event_id) references event_table(event_id)
);


create table payments_details_table(
account_id int not null,
card_number int,
CVV numeric(3,0),
expire_date date,

foreign key(account_id) references account_table(account_id)
);

create table cart_table(
ticket_cat_id int not null,
account_id int not null,
quantity smallint,

foreign key (ticket_cat_id) references ticket_category_table(ticket_cat_id),
foreign key (account_id) references account_table(account_id)
);

create table past_orders_table(
past_order_id int not null,
account_id int not null,
time_of_order timestamp,

primary key(past_order_id),
foreign key(account_id) references account_table(account_id)
);

create table ticket_table(
ticket_id serial,
ticket_cat_id int not null,
past_order_id int default null,
seat_no int,

primary key(ticket_id),
foreign key (ticket_cat_id) references ticket_category_table(ticket_cat_id),
foreign key (past_order_id) references past_orders_table(past_order_id)
);

--rights can be
alter table account_table
	add check (account_access = 'customer' or account_access = 'organizer'  or account_access = 'administrator');
