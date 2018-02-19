/*5. Find the names of the top 3 airports with the most inbound traffic.*/
loadFlightdata = LOAD 's3://assignment1/exercise2.csv' USING PigStorage(',');
loadAirportdata = LOAD 's3://assignment1/airports.csv' USING PigStorage(',');
removeSchar =  FOREACH loadAirportdata generate REPLACE($0, '\\"', ''), REPLACE($1, '\\"', ''), $2, $3, $4, $5, $6;
joinFlightAirport = JOIN loadFlightdata by $17, removeSchar by $0;
grpFlightbyCar = GROUP joinFlightAirport BY ($17,$30);
--DESCRIBE groupFlights1;
--DUMP groupFlights1;
countFlights = FOREACH grpFlightbyCar GENERATE group, COUNT(joinFlightAirport) AS count1;
setOrder = ORDER countFlights BY count1 DESC;
onlytop3 = LIMIT setOrder 3;
HighestInport =  FOREACH onlytop3 GENERATE group;
STORE HighestInport INTO 's3://assignment1/MostInboundTraffic';