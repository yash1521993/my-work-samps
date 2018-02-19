/*3. Compute the busiest routes. You can create a frequency table for the unordered pair (i,j) where i and j are distinct airport codes.*/
loadFlightdata = LOAD 's3://assignment1/exercise2.csv' USING PigStorage(',');
groupOrigDest = GROUP loadFlightdata BY ($16, $17);
freqOrigDest = FOREACH groupOrigDest GENERATE group, COUNT(loadFlightdata) as freqOD;
busiestRoute = ORDER freqOrigDest BY freqOD DESC;
--DUMP busiestRoute;
STORE busiestRoute INTO 's3://assignment1/busiestRoutes';