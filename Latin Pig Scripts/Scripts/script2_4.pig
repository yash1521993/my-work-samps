/*4. Find the names of the 10 most popular carriers*/
loadFlightdata = LOAD 's3://assignment1/exercise2.csv' USING PigStorage(',');
loadCarrierdata = LOAD 's3://assignment1/carriers.csv' USING PigStorage(',');
removeSchar =  FOREACH loadCarrierdata generate REPLACE($0, '\\"', ''), REPLACE($1, '\\"', '') AS descript;
joinFlightCarrier = JOIN loadFlightdata by $8, removeSchar by $0;
grpFlightbyCar = GROUP joinFlightCarrier BY ($8,$30);
--DUMP groupFlights1;
countFlights = FOREACH grpFlightbyCar GENERATE group, COUNT(joinFlightCarrier) AS count1;
setOrder = ORDER countFlights BY count1 DESC;
onlytop10 = LIMIT setOrder 10;
popularCarriers =  FOREACH onlytop10 GENERATE group;
--DESCRIBE popularCarriers;
STORE popularCarriers INTO 's3://assignment1/10mostPopularCarriers';