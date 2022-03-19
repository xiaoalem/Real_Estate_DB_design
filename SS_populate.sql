insert into contact (email, company)
    with names as (
        select 'adm@intracorp.com', 'intracorp development' from dual union all
        select 'adm-contact@lion.com', 'lion development' from dual union all
        select 'admin@westwall.com', 'westwall development' from dual union all
        select 'adm-opt@cressey.com', 'cressey development' from dual union all
        select 'opt-internal@concord.com', 'concord development' from dual union all
        select 'admin@wall.com', 'wall development' from dual union all
        select 'admin@westbank.com', 'westbank development' from DUAL union all
        select 'admin@westbroadwaynotary.com', 'west broadway notary' from DUAL union all
        select 'admin@kerrisdalenotary.com', 'kerrisdale notary' from DUAL union all
        select 'admin@threeroadnotary.com', 'No. 3 Road notary' from DUAL union all
        select 'admin@wesbrooknotary.com', 'wesbrook notary' from DUAL union all
        select 'admin@ironwoodnotary.com', 'ironwood notary' from dual union all
        select 'jkwang@pacific.com', 'pacific realty' from DUAL union all
        select 'rwu@onepacific.com', 'one pacific realty' from DUAL union all
        select 'efeng@equitable.com', 'equitable realty' from DUAL union all
        select 'cbrown@sterling.com', 'sterling realty' from DUAL union all
        select 'mmason@boldrealty.com', 'bold realty' from DUAL union all
        select 'mcook@sequoiarealty.com', 'sequoia realty' from DUAL union all
        select 'tsmith@orchardrealty.com', 'orchard realty' from DUAL union all
        select 'jdamon@blueskyrealty.com', 'bluesky realty' from DUAL union all
        select 'mbale@anchorrealty.com', 'anchor realty' from DUAL union all
        select 'cfreeman@axisrealty.com', 'axis realty' from DUAL union all
        select 'cchoi@summerwood.com', 'summerwood realty' from DUAL union all
        select 'pkwai@sunshinerealty.com', 'sunshine realty' from DUAL
    )
select * from names;


insert into POST_SYSTEM (POSTCODE, CITY, PROVINCE)
    with names as (
        select 'V7C9O1', 'Vancouver', 'BC' from DUAL union all
        select 'A4G0Z5', 'Calgary', 'AB' from DUAL union all
        select 'V901M4', 'Surrey', 'BC' from DUAL union all
        select 'V3X1P0', 'Vancouver', 'BC' FROM DUAL UNION ALL
        SELECT 'V9T1G5', 'Vancouver', 'BC' FROM DUAL UNION ALL
        SELECT 'V5T1S0', 'Vancouver', 'BC' FROM DUAL UNION ALL
        SELECT 'V6P0C3', 'Vancouver', 'BC' FROM DUAL UNION ALL
        SELECT 'V6S1Z5', 'Vancouver', 'BC' FROM DUAL UNION ALL
        SELECT 'V5Y0G8', 'Vancouver', 'BC' FROM DUAL UNION ALL
        SELECT 'V6Y1Z4', 'Vancouver', 'BC' FROM DUAL UNION ALL
        SELECT 'V1S9K0', 'Vancouver', 'BC' FROM DUAL
    )
select * from names;


INSERT INTO PAYMENT(DOWN_PAY, MORTGAGE, SELL_PRICE)
    WITH names AS (
        select 732000, 768000, 1500000 from DUAL union all
        select 290500, 689500, 980000 from DUAL union all
        select 1310000, 1250000, 2560000 from DUAL union all
        select 13850000, 13000000, 26850000 from DUAL union all
        select 265000, 180000, 445000 from DUAL union all
        select 1750000, 1300000, 3050000 from DUAL union all
        select 4100000, 2400000, 6500000 from DUAL union all
        select 243000, 567000, 810000 from DUAL union all
        select 613200, 1430800, 2044000 from DUAL union all
        select 300000, 450000, 750000 from DUAL union all
        select 982800, 1474200, 2457000 from DUAL union all
        select 350000, 400000, 750000 from DUAL union all
        select 1440000, 3360000, 4800000 from DUAL union all
        select 2856000, 6664000, 9520000 from DUAL union all
        select 608000, 912000, 1520000 from DUAL
    )
SELECT * FROM names;


insert into REALTOR (rid, email, name, phone_num)
with names as (
    select 1, 'jkwang@pacific.com', 'Junkong Wang', '7786541236' from DUAL union all
    select 2, 'rwu@onepacific.com', 'Rachel Wu', '7785471256' from DUAL union all
    select 3, 'efeng@equitable.com', 'Elaine Feng', '7789568874' from DUAL union all
    select 4, 'cbrown@sterling.com', 'Christina Brown', '7785689321' from DUAL union all
    select 5, 'mmason@boldrealty.com', 'Mike Mason', '7784571234' from DUAL union all
    select 6, 'mcook@sequoiarealty.com', 'Michael Cook', '7789453216' from DUAL union all
    select 7, 'tsmith@orchardrealty.com', 'Tim Smith', '7784514789' from DUAL union all
    select 8, 'jdamon@blueskyrealty.com', 'John Damon', '6048967410' from DUAL union all
    select 9, 'mbale@anchorrealty.com', 'Matt Bale', '6042548734' from DUAL union all
    select 10, 'cfreeman@axisrealty.com', 'Chris Freeman', '6041478523' from DUAL union all
    select 11, 'cchoi@summerwood.com', 'Chloe Choi', '6045841234' from DUAL union all
    select 12, 'pkwai@sunshinerealty.com', 'Peng Kwai', '6041117789' from DUAL
)
select * from names;


insert into SERVED_OWNER (OID, RID, PHONE_NUM, EMAIL, COMMISSION_TO_R)
with names as (
    select 1, 12, '2251336478', 'adm@intracorp.com',100000 from DUAL union all
    select 2, 2, '2252100981', 'sethwashingtong@hotmail.com', 0 from DUAL union all
    select 3, 3, '6047899871', 'adm-contact@lion.com', 85000 from DUAL union all
    select 4, 3, '6042264567', 'admin@westwall.com', 95300 from DUAL union all
    select 5, 4, '7782256049', 'gavinyang@gmail.com', 0 from DUAL union all
    select 6, 7, '7788879981', 'ericp@gmail.com', 23000 from DUAL union all
    select 7, 9, '4159876541', 'adm-opt@cressey.com', 120000 from DUAL union all
    select 8, 9, '4152136458', 'opt-internal@concord.com', 75000 from DUAL union all
    select 9, 3, '7789820013', 'evastena@yahoo.fi', 5500 from DUAL union all
    select 10, 5, '7785689321', 'cbrown@sterling.com', 150000 from DUAL union all
    select 11, 12, '6041010255', 'admin@westbank.com', 50000 from DUAL union all
    select 12, 9, '2256987612','teliah@yahoo.fi', 8500 from DUAL union all
    select 13, 12, '6041117789', 'pkwai@sunshinerealty.com', 5000 from DUAL union all
    select 14, 2, '7785471256', 'rwu@onepacific.com', 10000 from DUAL union all
    select 15, 9, '6042548734', 'mbale@anchorrealty.com', 9850 from DUAL
)
select * from names;


insert into SERVED_BUYER(bid, rid, name, phone_num, email, commission_to_r)
    select 1, 3, 'Emma Smith', '6048889275', 'emmasmith@hotmail.com', 0 from DUAL union all
    select 2, 2, 'Paul Josh', '7785598122', 'joshpaul@hotmail.com', 50000 from DUAL union all
    select 3, 12, 'Eric Green', '2252255118', 'erricgg@hotmail.com', 25000 from DUAL union all
    select 4, 6, 'Claire Underwood', '6045589752', 'cuw@gmail.com', 10000 from DUAL union all
    select 5, 12, 'Doug Stamper', '6047789980', 'douglstp@gmail.com', 8000 from DUAL;


INSERT INTO developer (oid, email, representative)
   WITH names AS (
    SELECT 1, 'adm@intracorp.com', 'Joey Chow' FROM DUAL UNION ALL
    SELECT 3, 'adm-contact@lion.com', 'Vincent Luo' FROM DUAL UNION ALL
    SELECT 4, 'admin@westwall.com', 'Mack Underwood' FROM DUAL UNION ALL
    SELECT 7, 'adm-opt@cressey.com', 'Maria Krovski' FROM DUAL UNION ALL
    SELECT 8, 'opt-internal@concord.com', 'Nicolas Ng' FROM DUAL UNION ALL
    SELECT 11, 'admin@westbank.com', 'Mei Li' FROM DUAL)
   SELECT * FROM names;


insert into title (TITID, pid, district, type)
    select 1, 1, 'City of Calgary', 'joint tenancy' FROM DUAL UNION ALL
    select 3, 2, 'City of Vancouver', 'tenancy in common' FROM DUAL UNION ALL
    select 9, 3, 'City of Vancouver', 'joint tenancy'FROM DUAL UNION ALL
    select 6, 4, 'City of Vancouver', 'sole ownership' FROM DUAL UNION ALL
    select 2, 5, 'City of Surrey', 'sole ownership' FROM DUAL UNION ALL
    select 8, 6, 'City of Vancouver', 'sole ownership' FROM DUAL UNION ALL
    select 7, 7, 'City of Vancouver', 'joint tenancy' FROM DUAL UNION ALL
    select 5, 8, 'City of Vancouver', 'joint tenancy' FROM DUAL UNION ALL
    select 4, 9, 'City of Vancouver', 'sole ownership' FROM DUAL UNION ALL
    select 10, 10, 'City of Vancouver', 'sole ownership' FROM DUAL UNION ALL
    select 11, 11, 'City of Vancouver', 'sole ownership' FROM DUAL UNION ALL
    select 12, 12, 'City of Vancouver', 'sole ownership' FROM DUAL UNION ALL
    select 13, 13, 'City of Vancouver', 'sole ownership' FROM DUAL UNION ALL
    select 14, 14, 'City of Vancouver', 'sole ownership' FROM DUAL UNION ALL
    select 15, 15, 'City of Vancouver', 'sole ownership' FROM DUAL;


insert into PROPERTY(pid, titid, list_price, sq_footage, year_built, aid)
    select 1, 1, 2560000, 2056, 2019, 2 FROM DUAL UNION ALL
    select 2, 3, 810000, 780, 2021, 5 FROM DUAL UNION ALL
    select 3, 9, 980000, 879, 2020, 3 FROM DUAL UNION ALL
    select 4, 6, 750000, 530, 2021, 1 FROM DUAL UNION ALL
    select 5, 2, 445000, 1308, 2020, 4 FROM DUAL UNION ALL
    select 6, 8, 1500000, 1024, 2018, 7 FROM DUAL UNION ALL
    select 7, 7, 750000, 750, 2019, 8 FROM DUAL UNION ALL
    select 8, 5, 4800000,3500, 2021, 9 FROM DUAL UNION ALL
    select 9, 4, 26850000, 784, 2019, 6 FROM DUAL UNION ALL
    select 10, 10, 2044000, 1350, 2020, 10 FROM DUAL UNION ALL
    select 11, 11, 2457000, 1500, 2020, 11 FROM DUAL UNION ALL
    select 12, 12, 9520000, 4000, 2020, 12 FROM DUAL UNION ALL
    select 13, 13, 6500000, 2500, 2020, 13 FROM DUAL UNION ALL
    select 14, 14, 1520000, 1600, 2021, 14 FROM DUAL UNION ALL
    select 15, 15, 3050000, 2000, 2019, 15 FROM DUAL;


insert into transaction(tid, pid, down_pay, mortgage)
    select 1, 6, 732000, 768000 FROM DUAL UNION ALL
    select 2, 3, 290500, 689500 FROM DUAL UNION ALL
    select 3, 1, 1310000, 1250000 FROM DUAL UNION ALL
    select 4, 9, 13850000, 13000000 FROM DUAL UNION ALL
    select 5, 5, 265000, 180000 FROM DUAL UNION ALL
    select 6, 15, 1750000, 1300000 FROM DUAL UNION ALL
    select 7, 13, 4100000, 2400000 FROM DUAL UNION ALL
    select 8, 2, 243000, 567000 FROM DUAL UNION ALL
    select 9, 10, 613200, 1430800 FROM DUAL UNION ALL
    select 10, 4, 300000, 450000 FROM DUAL UNION ALL
    select 11, 11, 982800, 1474200 FROM DUAL UNION ALL
    select 12, 7, 350000, 400000 FROM DUAL UNION ALL
    select 13, 8, 1440000, 3360000 FROM DUAL UNION ALL
    select 14, 12, 2856000, 6664000 FROM DUAL UNION ALL
    select 15, 14, 608000, 912000 FROM DUAL;


insert into ADDRESS(aid, pid, unit_num, street_num, street_name, postcode, city, PROVINCE)
with names as (
    select 1, 4, '12', '2255', 'Cambie', 'V7C9O1', 'Vancouver', 'BC' FROM DUAL UNION ALL
    select 2, 1, null, '120', '1st Ave', 'A4G0Z5', 'Calgary', 'AB' FROM DUAL UNION ALL
    select 3, 3, '36', '1875',	'Cambie', 'V7C9O1', 'Vancouver', 'BC' FROM DUAL UNION ALL
    select 4, 5, '1802', '1880', '10th Ave', 'V901M4',  'Surrey', 'BC' FROM DUAL UNION ALL
    select 5, 2, '51',	'2550', '4th Ave', 'V3X1P0',  'Vancouver', 'BC' FROM DUAL UNION ALL
    select 6, 9, null,	'125',	'10 Ave',  'A4G0Z5', 'Calgary', 'AB' FROM DUAL UNION ALL
    select 7, 6, '211',	'150',	'Elm St', 'V9T1G5', 'Vancouver', 'BC' FROM DUAL UNION ALL
    select 8, 7, '516',	'3380',	'Yew St', 'V5T1S0', 'Vancouver', 'BC' FROM DUAL UNION ALL
    select 9, 8, null, '6161',	'Dunbar St', 'V1S9K0', 'Vancouver', 'BC'FROM DUAL UNION ALL
    select 10, 10, '1002', '5236', '2nd Ave W', 'V6P0C3', 'Vancouver', 'BC' FROM DUAL UNION ALL
    select 11, 11, '1107', '4578', 'Granville St', 'V6S1Z5',  'Vancouver', 'BC' FROM DUAL UNION ALL
    select 12, 12, null, '67',	'1st Ave W','V5Y0G8', 'Vancouver', 'BC' FROM DUAL UNION ALL
    select 13, 13, null, '2627', '30th Ave W', 'V6Y1Z4', 'Vancouver', 'BC' FROM DUAL UNION ALL
    select 14, 14, '22', '1206', 'Elm St', 'V9T1G5', 'Vancouver', 'BC' FROM DUAL UNION ALL
    select 15, 15, '7','5950', 'Dunbar St', 'V1S9K0', 'Vancouver', 'BC' from DUAL
)select * from names;


insert into OWNS (OID, PID)
with names as (
    select 2, 9 FROM DUAL UNION ALL
    select 3, 6 FROM DUAL UNION ALL
    select 4, 1 FROM DUAL UNION ALL
    select 5, 7 FROM DUAL UNION ALL
    select 6, 4 FROM DUAL UNION ALL
    select 7, 8 FROM DUAL UNION ALL
    select 9, 2 FROM DUAL UNION ALL
    select 10, 5 FROM DUAL UNION ALL
    select 12, 3 FROM DUAL UNION ALL
    select 6, 10 FROM DUAL UNION ALL
    select 4, 11 FROM DUAL UNION ALL
    select 2, 12 FROM DUAL UNION ALL
    select 5, 13 FROM DUAL UNION ALL
    select 9, 14 FROM DUAL UNION ALL
    select 1, 15 FROM DUAL
)
select * from names;


INSERT INTO INDIVIDUAL_OWNER (OID, NAME) VALUES (2, 'Seth Washington');
INSERT INTO INDIVIDUAL_OWNER (OID, NAME) VALUES (5, 'Gavin Yang');
INSERT INTO INDIVIDUAL_OWNER (OID, NAME) VALUES (6, 'Eric Pai');
INSERT INTO INDIVIDUAL_OWNER (OID, NAME) VALUES (9, 'Eva Stena');
INSERT INTO INDIVIDUAL_OWNER (OID, NAME) VALUES (12, 'Telia Lehto');
insert into INDIVIDUAL_OWNER (OID, NAME) values (15, 'Matt Bale');
insert into INDIVIDUAL_OWNER (OID, NAME) values (14, 'Rachel Wu');
insert into INDIVIDUAL_OWNER (OID, NAME) values (13, 'Peng Kwai');
insert into INDIVIDUAL_OWNER (OID, NAME) values (10, 'Christina Brown');


INSERT INTO LAWYER (LID, EMAIL, NAME, PHONE_NUM) VALUES (1, 'admin@westbroadwaynotary.com', 'Thomas Kroos', '6045749139');
INSERT INTO LAWYER (LID, EMAIL, NAME, PHONE_NUM) VALUES (2, 'admin@kerrisdalenotary.com', 'Kim Sun ', '6045187348');
INSERT INTO LAWYER (LID, EMAIL, NAME, PHONE_NUM) VALUES (3, 'admin@threeroadnotary.com', 'Luigi De Rossi', '6041524377');
INSERT INTO LAWYER (LID, EMAIL, NAME, PHONE_NUM) VALUES (4, 'admin@wesbrooknotary.com', 'Kevin Wang', '7789852134');
INSERT INTO LAWYER (LID, EMAIL, NAME, PHONE_NUM) VALUES (5, 'admin@ironwoodnotary.com', 'Emily Mackenzie', '7786592314');


insert into ASSESS_VAL (pid, year, amount)
with names as (
    select 1, '2019', 550000 FROM DUAL UNION ALL
    select 1, '2020', 543000 FROM DUAL UNION ALL
    select 1, '2021', 530000 FROM DUAL UNION ALL
    select 2, '2021', 800000 FROM DUAL UNION ALL
    select 3, '2020', 795000 FROM DUAL UNION ALL
    select 3, '2021', 805000 FROM DUAL UNION ALL
    select 4, '2021', 742100 FROM DUAL UNION ALL
    select 5, '2020', 728000 FROM DUAL UNION ALL
    select 5, '2021', 730000 FROM DUAL UNION ALL
    select 6, '2018', 1650000 FROM DUAL UNION ALL
    select 6, '2019', 1600000 FROM DUAL UNION ALL
    select 6, '2020', 1450000 FROM DUAL UNION ALL
    select 6, '2021', 1500000 FROM DUAL UNION ALL
    select 7, '2019', 775000 FROM DUAL UNION ALL
    select 7, '2020', 774000 FROM DUAL UNION ALL
    select 7, '2021', 750000 FROM DUAL UNION ALL
    select 8, '2021', 5000000 FROM DUAL UNION ALL
    select 9, '2019', 280000 FROM DUAL UNION ALL
    select 9, '2020', 261000 FROM DUAL UNION ALL
    select 9, '2021', 268500 FROM DUAL
)
select * from names;


insert into PROPERTY_TAX (pid, year, amount)
with names as (
    select 1, '2019', 5000 FROM DUAL UNION ALL
    select 1, '2020', 5000 FROM DUAL UNION ALL
    select 1, '2021', 5100 FROM DUAL UNION ALL
    select 2, '2021', 3500 FROM DUAL UNION ALL
    select 3, '2020', 3400 FROM DUAL UNION ALL
    select 3, '2021', 3500 FROM DUAL UNION ALL
    select 4, '2021', 3120 FROM DUAL UNION ALL
    select 5, '2020', 3100 FROM DUAL UNION ALL
    select 5, '2021', 3150 FROM DUAL UNION ALL
    select 6, '2018', 4100 FROM DUAL UNION ALL
    select 6, '2019', 4200 FROM DUAL UNION ALL
    select 6, '2020', 4200 FROM DUAL UNION ALL
    select 6, '2021', 4213 FROM DUAL UNION ALL
    select 7, '2019', 3200 FROM DUAL UNION ALL
    select 7, '2020', 3200 FROM DUAL UNION ALL
    select 7, '2021', 3300 FROM DUAL UNION ALL
    select 8, '2021', 8500 FROM DUAL UNION ALL
    select 9, '2019', 4000 FROM DUAL UNION ALL
    select 9, '2020', 4000 FROM DUAL UNION ALL
    select 9, '2021', 4100 FROM DUAL
)
select * from names;


insert into CONDO(pid, floor, mgmt_company)
with names as (
    select 5, 18, 'Dwell' FROM DUAL UNION ALL
    select 6, 2, 'Dwell' FROM DUAL UNION ALL
    select 7, 5, 'Dwell' FROM DUAL UNION ALL
    select 10, 10, 'AMG' FROM DUAL UNION ALL
    select 11, 11, 'Northwest' FROM DUAL
)SELECT * from names;


insert into SF_HOUSE(pid, lot_size)
with names as (
    select 1, 4000 FROM DUAL UNION ALL
    select 8, 7500 FROM DUAL UNION ALL
    select 9, 2400 FROM DUAL UNION ALL
    select 12, 4200 FROM DUAL UNION ALL
    select 13, 3500 FROM DUAL
)SELECT * from names;


insert into TOWNHOUSE(pid, mgmt_company)
with names as (
    select 2, 'MidwestProperty' FROM DUAL UNION ALL
    select 3, 'ACCLProperty' FROM DUAL UNION ALL
    select 4, 'ACCLProperty' FROM DUAL UNION ALL
    select 14, 'Prata' FROM DUAL UNION ALL
    select 15, 'MMM' FROM DUAL
)SELECT * from names;


insert into REGISTER(psid, lid, registered_date)
    select 1, 1, '2017-09-01' FROM DUAL UNION ALL
    select 9, 2, '2018-10-23' FROM DUAL UNION ALL
    select 8, 3, '2016-08-03' FROM DUAL UNION ALL
    select 7, 4, '2018-06-05' FROM DUAL UNION ALL
    select 4, 5, '2018-11-11' FROM DUAL;


insert into AUTHORIZE(psid, lid, bid, authorized_date)
    SELECT 1, 1, 2, '2017-04-01' FROM DUAL UNION ALL
    select 9, 2, 4, '2018-03-16' FROM DUAL UNION ALL
    select 8, 3, 1, '2016-05-01' FROM DUAL UNION ALL
    select 7, 4, 3, '2018-01-14' FROM DUAL UNION ALL
    select 4, 5, 5, '2018-04-27' FROM DUAL;



insert into FACILITATE(tid, rid)
    SELECT 1, 3 FROM DUAL UNION ALL
    select 2, 9 FROM DUAL UNION ALL
    select 3, 3 FROM DUAL UNION ALL
    select 4, 2 FROM DUAL UNION ALL
    select 5, 5 FROM DUAL UNION ALL
    select 6, 12 FROM DUAL UNION ALL
    select 7, 4 FROM DUAL UNION ALL
    select 8, 3 FROM DUAL UNION ALL
    select 9, 7 FROM DUAL UNION ALL
    select 10, 7 FROM DUAL UNION ALL
    select 11, 3 FROM DUAL UNION ALL
    select 12, 4 FROM DUAL UNION ALL
    select 13, 9 FROM DUAL UNION ALL
    select 14, 2 FROM DUAL UNION ALL
    select 15, 3 FROM DUAL;


ALTER TABLE title
    ADD FOREIGN KEY (pid) references property (pid);

ALTER TABLE property
    ADD FOREIGN KEY (aid) references address (aid);

commit;
