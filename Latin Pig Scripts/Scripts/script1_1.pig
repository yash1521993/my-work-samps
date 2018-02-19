/*1) Count the occurrences of each word in exercise1.txt*/
getLine = LOAD 's3://assignment1/exercise1.txt' AS (line: chararray); 
getWords = FOREACH getLine GENERATE FLATTEN(TOKENIZE(line)) AS word;
wordsSet = GROUP getWords BY word;
countWords = FOREACH wordsSet GENERATE group, COUNT(getWords);
STORE countWords INTO 's3://assignment1/wordCount';