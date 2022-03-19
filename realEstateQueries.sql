SELECT DISTINCT a.city
FROM property p, address a
WHERE p.pid = a.pid

SELECT pid FROM property

SELECT p.PID, LIST_PRICE, SQ_FOOTAGE, YEAR_BUILT, UNIT_NUM, STREET_NUM, STREET_NAME, CITY, PROVINCE
FROM property p, address a
WHERE p.pid = a.pid AND a.city = '$city' AND p.year_built > $yearStart AND p.year_built < $yearEnd

SELECT re.*, r_value.Total_Transaction_Value
FROM realtor re JOIN
     (SELECT r.rid, SUM(pa.sell_price) AS Total_Transaction_Value
      FROM realtor r, transaction t, facilitate f, payment pa, property p, address a
      WHERE r.rid = f.rid
        AND f.tid = t.tid
        AND t.down_pay = pa.down_pay
        AND t.mortgage = pa.mortgage
        AND t.pid = p.pid
        AND p.pid = a.pid
        AND a.city = '$city'
      GROUP BY r.rid) r_value on re.rid = r_value.rid
ORDER BY r_value.Total_Transaction_Value DESC

SELECT COUNT(*) FROM property p, property_tax t
WHERE  p.pid = $pid AND p.pid = t.pid AND t.year = $taxYear

UPDATE property_tax SET amount = $taxAmount WHERE pid = $pid AND year = $taxYear

INSERT INTO property_tax VALUES($taxYear, $pid, $taxAmount)

SELECT * FROM property_tax ORDER BY YEAR DESC, PID

SELECT * FROM lawyer



-- deletion
DELETE FROM served_buyer WHERE email = '$email'

-- nested aggregation
with type as (select * from property join $type using (pid) join address using (aid))
    select YEAR_BUILT, count(LIST_PRICE) cnt, ROUND(avg(LIST_PRICE)) avg, ROUND(AVG(sq_footage)) area
    from type
    where city = '$city' and LIST_PRICE >= (select median(list_price)
                                            from type
                                            where city = '$city')
group by YEAR_BUILT

-- division
select name, PHONE_NUM, EMAIL from REALTOR
minus
select name, PHONE_NUM, EMAIL from INDIVIDUAL_OWNER join SERVED_OWNER using (oid)