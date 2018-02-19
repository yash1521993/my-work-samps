/*2) List the 10 most popular words in exercise1.txt*/
getLine = LOAD 's3://assignment1/exercise1.txt' AS (line: chararray); 
getWords = FOREACH getLine GENERATE  FLATTEN(TOKENIZE(line)) AS word;
wordsSet = GROUP getWords BY word;
countWords = FOREACH wordsSet GENERATE group, COUNT(getWords) AS totalCount;
setOrder = ORDER countWords BY totalCount DESC;
onlytop10 = LIMIT setOrder 10;
STORE onlytop10 INTO 's3://assignment1/onlytop10';