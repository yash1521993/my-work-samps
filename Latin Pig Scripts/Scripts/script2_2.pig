/*2. Compute the proportion of on-time flights by carrier, ranked by carrier*/
loadFlightdata = LOAD 's3://assignment1/exercise2.csv' USING PigStorage(',');
filterFlight = FILTER loadFlightdata BY ($14 < 15 AND $15 < 15);
--total carrier count
groupCarrier = GROUP filterFlight ALL; 
countCarrier = FOREACH groupCarrier GENERATE COUNT(filterFlight) AS totalCarCount;
groupFlights = GROUP filterFlight BY $8;
countFlights = FOREACH groupFlights GENERATE group, COUNT(filterFlight)/(double)countCarrier.totalCarCount AS finalCount;
rankCarrier = RANK countFlights BY finalCount DESC;
--DUMP rankCarrier;
STORE rankCarrier INTO 's3://assignment1/OnTimeFlightsbyCarrier';