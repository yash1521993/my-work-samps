/*1. Suppose a flight is called on time if the departure delay (attribute #16) and arrival delay(attribute #15) 
are both less than 15 minutes, compute the portion of the flights that are on time.*/
loadFlightdata = LOAD 's3://assignment1/exercise2.csv' USING PigStorage(',');
grouptotalFlights = GROUP loadFlightdata ALL;
counttotalFlights = FOREACH grouptotalFlights GENERATE COUNT(loadFlightdata)-1 AS totalFlightCount;
filterFlight = FILTER loadFlightdata BY ($14 < 15 AND $15 < 15);
groupFlights = GROUP filterFlight ALL; 
countFlights = FOREACH groupFlights GENERATE COUNT(filterFlight) AS portionCount, (DOUBLE)COUNT(filterFlight)/counttotalFlights.totalFlightCount AS proportion;
STORE countFlights INTO 's3://assignment1/OnTimeFlights';