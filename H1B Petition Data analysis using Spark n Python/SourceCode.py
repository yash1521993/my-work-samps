from pyspark.sql import SparkSession
from pyspark.sql import Row
from pyspark.sql.types import *
import json

from pyspark.sql import SQLContext

spark = SparkSession \
        .builder \
        .appName("Project") \
        .getOrCreate()
sc = spark.sparkContext
sqlContext = SQLContext(sc)

#main code starts here
#inputCSV=sc.textFile("/data2/AnalysisMY/h1b_kaggle.csv")
inputCSV = sqlContext.read.format('com.databricks.spark.csv').options(header='true', inferschema='true').load('/data2/AnalysisMY/h1b_kaggle.csv')
inputCSV.createOrReplaceTempView("h1bpetetionsData")
#inputCSV.select("year").show()

##		PREDICT		##

minSal=spark.sql("select Year,EMPLOYER_NAME,JOB_TITLE,max(CAST(PREVAILING_WAGE as INT)) \
from h1bpetetionsData where CASE_STATUS='CERTIFIED' and Year in (2011,2012,2013,2014,2015,2016) group by Year,EMPLOYER_NAME,JOB_TITLE")
minSal.show()

start = time.time()
#1	count total no of records in h1b_kaggle
getCount=spark.sql("select count(*) from h1bpetetionsData")
getCount.show()
print (time.time()-start)

#2 	get a snapshot of dataSet
geth1Bdata=spark.sql("select * from h1bpetetionsData")
geth1Bdata.show()

#3	year wise count
getCountbyYear=spark.sql("select distinct Year,count(*) as No_of_Petetions from h1bpetetionsData group by year having count(*)>15 order by year ")
getCountbyYear.show()

#4 	get count by case status
grpByCaseStatus=spark.sql("select CASE_STATUS, count(*) as No_of_Petetions from h1bpetetionsData group by CASE_STATUS")
grpByCaseStatus.show()

# Getting top 10 employers per year and their respective sum of each case status types
start = time.time()				
g5=spark.sql("select * from ( (SELECT R.Year,R.EMPLOYER_NAME, count(*) as No_of_petitions ,SUM(R.CERTIFIED_WITHDRAWN_count) as No_of_CERTIFIED_WITHDRAWN, SUM(R.WITHDRAWN_count) as No_of_WITHDRAWN, SUM(R.CERTIFIED_count) as No_of_CERTIFIED, SUM(R.DENIED_count) as no_of_DENIED FROM ( select *, \
CASE WHEN CASE_STATUS = 'CERTIFIED-WITHDRAWN' then 1 \
else 0 \
end as CERTIFIED_WITHDRAWN_count, \
CASE WHEN CASE_STATUS = 'WITHDRAWN' then 1 \
else 0 \
end as WITHDRAWN_count, \
CASE WHEN CASE_STATUS = 'CERTIFIED' then 1 \
else 0 \
end as CERTIFIED_count, \
CASE WHEN CASE_STATUS = 'DENIED' then 1 \
else 0 \
end as DENIED_count \
from h1bpetetionsData ) AS R \
WHERE R.Year = 2011 \
GROUP BY R.Year,R.EMPLOYER_NAME \
ORDER BY No_of_petitions DESC LIMIT 10) \
UNION \
(SELECT R.Year,R.EMPLOYER_NAME, count(*) as No_of_petitions ,SUM(R.CERTIFIED_WITHDRAWN_count) as No_of_CERTIFIED_WITHDRAWN, SUM(R.WITHDRAWN_count) as No_of_WITHDRAWN, SUM(R.CERTIFIED_count) as No_of_CERTIFIED, SUM(R.DENIED_count) as no_of_DENIED FROM ( select *, \
CASE WHEN CASE_STATUS = 'CERTIFIED-WITHDRAWN' then 1 \
else 0 \
end as CERTIFIED_WITHDRAWN_count, \
CASE WHEN CASE_STATUS = 'WITHDRAWN' then 1 \
else 0 \
end as WITHDRAWN_count, \
CASE WHEN CASE_STATUS = 'CERTIFIED' then 1 \
else 0 \
end as CERTIFIED_count, \
CASE WHEN CASE_STATUS = 'DENIED' then 1 \
else 0 \
end as DENIED_count \
from h1bpetetionsData ) AS R \
WHERE R.Year = 2012 \
GROUP BY R.Year,R.EMPLOYER_NAME \
ORDER BY No_of_petitions DESC LIMIT 10) \
UNION \
(SELECT R.Year,R.EMPLOYER_NAME, count(*) as No_of_petitions ,SUM(R.CERTIFIED_WITHDRAWN_count) as No_of_CERTIFIED_WITHDRAWN, SUM(R.WITHDRAWN_count) as No_of_WITHDRAWN, SUM(R.CERTIFIED_count) as No_of_CERTIFIED, SUM(R.DENIED_count) as no_of_DENIED FROM ( select *, \
CASE WHEN CASE_STATUS = 'CERTIFIED-WITHDRAWN' then 1 \
else 0 \
end as CERTIFIED_WITHDRAWN_count, \
CASE WHEN CASE_STATUS = 'WITHDRAWN' then 1 \
else 0 \
end as WITHDRAWN_count, \
CASE WHEN CASE_STATUS = 'CERTIFIED' then 1 \
else 0 \
end as CERTIFIED_count, \
CASE WHEN CASE_STATUS = 'DENIED' then 1 \
else 0 \
end as DENIED_count \
from h1bpetetionsData ) AS R \
WHERE R.Year = 2013 \
GROUP BY R.Year,R.EMPLOYER_NAME \
ORDER BY No_of_petitions DESC LIMIT 10) \
UNION \
(SELECT R.Year,R.EMPLOYER_NAME, count(*) as No_of_petitions ,SUM(R.CERTIFIED_WITHDRAWN_count) as No_of_CERTIFIED_WITHDRAWN, SUM(R.WITHDRAWN_count) as No_of_WITHDRAWN, SUM(R.CERTIFIED_count) as No_of_CERTIFIED, SUM(R.DENIED_count) as no_of_DENIED FROM ( select *, \
CASE WHEN CASE_STATUS = 'CERTIFIED-WITHDRAWN' then 1 \
else 0 \
end as CERTIFIED_WITHDRAWN_count, \
CASE WHEN CASE_STATUS = 'WITHDRAWN' then 1 \
else 0 \
end as WITHDRAWN_count, \
CASE WHEN CASE_STATUS = 'CERTIFIED' then 1 \
else 0 \
end as CERTIFIED_count, \
CASE WHEN CASE_STATUS = 'DENIED' then 1 \
else 0 \
end as DENIED_count \
from h1bpetetionsData ) AS R \
WHERE R.Year = 2014 \
GROUP BY R.Year,R.EMPLOYER_NAME \
ORDER BY No_of_petitions DESC LIMIT 10) \
UNION \
(SELECT R.Year,R.EMPLOYER_NAME, count(*) as No_of_petitions ,SUM(R.CERTIFIED_WITHDRAWN_count) as No_of_CERTIFIED_WITHDRAWN, SUM(R.WITHDRAWN_count) as No_of_WITHDRAWN, SUM(R.CERTIFIED_count) as No_of_CERTIFIED, SUM(R.DENIED_count) as no_of_DENIED FROM ( select *, \
CASE WHEN CASE_STATUS = 'CERTIFIED-WITHDRAWN' then 1 \
else 0 \
end as CERTIFIED_WITHDRAWN_count, \
CASE WHEN CASE_STATUS = 'WITHDRAWN' then 1 \
else 0 \
end as WITHDRAWN_count, \
CASE WHEN CASE_STATUS = 'CERTIFIED' then 1 \
else 0 \
end as CERTIFIED_count, \
CASE WHEN CASE_STATUS = 'DENIED' then 1 \
else 0 \
end as DENIED_count \
from h1bpetetionsData ) AS R \
WHERE R.Year = 2015 \
GROUP BY R.Year,R.EMPLOYER_NAME \
ORDER BY No_of_petitions DESC LIMIT 10) \
UNION \
(SELECT R.Year,R.EMPLOYER_NAME, count(*) as No_of_petitions ,SUM(R.CERTIFIED_WITHDRAWN_count) as No_of_CERTIFIED_WITHDRAWN, SUM(R.WITHDRAWN_count) as No_of_WITHDRAWN, SUM(R.CERTIFIED_count) as No_of_CERTIFIED, SUM(R.DENIED_count) as no_of_DENIED FROM ( select *, \
CASE WHEN CASE_STATUS = 'CERTIFIED-WITHDRAWN' then 1 \
else 0 \
end as CERTIFIED_WITHDRAWN_count, \
CASE WHEN CASE_STATUS = 'WITHDRAWN' then 1 \
else 0 \
end as WITHDRAWN_count, \
CASE WHEN CASE_STATUS = 'CERTIFIED' then 1 \
else 0 \
end as CERTIFIED_count, \
CASE WHEN CASE_STATUS = 'DENIED' then 1 \
else 0 \
end as DENIED_count \
from h1bpetetionsData ) AS R \
WHERE R.Year = 2016 \
GROUP BY R.Year,R.EMPLOYER_NAME \
ORDER BY No_of_petitions DESC LIMIT 10)) as Result \
ORDER BY Result.Year, Result.No_of_petitions DESC")
g5.show(80,False)
print (time.time()-start)

# AVERAGE SALARY PER STATE for each year
g6 = spark.sql("Select H1_state_sal.Year, H1_state_sal.State,AVG(PREVAILING_WAGE) AS Average_State_Salary, count(*) as No_of_jobs from (Select SUBSTRING(WORKSITE, INSTR(WORKSITE,', ')+2) as State, PREVAILING_WAGE, year from h1bpetetionsData) as H1_state_sal where H1_state_sal.State != 'NA' and H1_state_sal.Year in (2011,2012,2013,2014,2015,2016) group by H1_state_sal.Year,H1_state_sal.State HAVING count(*) > 10 Order By H1_state_sal.Year, Average_State_Salary DESC ")
g6.show(360,False)

# Average SALARY PER STATE for all the years
start = time.time()
g7 = spark.sql("Select H1_state_sal.State,AVG(PREVAILING_WAGE) AS Average_State_Salary, count(*) as No_of_jobs from (Select SUBSTRING(WORKSITE, INSTR(WORKSITE,', ')+2) as State, PREVAILING_WAGE from h1bpetetionsData) as H1_state_sal where H1_state_sal.State != 'NA' group by H1_state_sal.State HAVING count(*) > 10 Order By Average_State_Salary DESC ")
g7.show(360,False)
print (time.time()-start)

# Top Five cities in a state with top number of petitions 
g8 = spark.sql("Select * from ((Select H1B.State, H1B.City, H1B.Employer_Name, count(*) as No_of_petetions from (Select SUBSTRING(WORKSITE, INSTR(WORKSITE,', ')+2) as State, SUBSTRING(WORKSITE, 0, INSTR(WORKSITE,', ') -1 ) as City, EMPLOYER_NAME from h1bpetetionsData) as H1B WHERE H1B.State = 'CALIFORNIA' group by H1B.State, H1B.City, H1B.Employer_Name HAVING count(*) > 10 Order BY H1B.State ASC, No_of_petetions Desc LIMIT 5) UNION (Select H1B.State, H1B.City, H1B.Employer_Name, count(*) as No_of_petetions from (Select SUBSTRING(WORKSITE, INSTR(WORKSITE,', ')+2) as State, SUBSTRING(WORKSITE, 0, INSTR(WORKSITE,', ') -1 ) as City, EMPLOYER_NAME from h1bpetetionsData) as H1B WHERE H1B.State = 'TEXAS' group by H1B.State, H1B.City, H1B.Employer_Name HAVING count(*) > 10 Order BY H1B.State ASC, No_of_petetions Desc LIMIT 5) UNION (Select H1B.State, H1B.City, H1B.Employer_Name, count(*) as No_of_petetions from (Select SUBSTRING(WORKSITE, INSTR(WORKSITE,', ')+2) as State, SUBSTRING(WORKSITE, 0, INSTR(WORKSITE,', ') -1 ) as City, EMPLOYER_NAME from h1bpetetionsData) as H1B WHERE H1B.State = 'ILLINOIS' group by H1B.State, H1B.City, H1B.Employer_Name HAVING count(*) > 10 Order BY H1B.State ASC, No_of_petetions Desc LIMIT 5) UNION (Select H1B.State, H1B.City, H1B.Employer_Name, count(*) as No_of_petetions from (Select SUBSTRING(WORKSITE, INSTR(WORKSITE,', ')+2) as State, SUBSTRING(WORKSITE, 0, INSTR(WORKSITE,', ') -1 ) as City, EMPLOYER_NAME from h1bpetetionsData) as H1B WHERE H1B.State = 'FLORIDA' group by H1B.State, H1B.City, H1B.Employer_Name HAVING count(*) > 10 Order BY H1B.State ASC, No_of_petetions Desc LIMIT 5) UNION (Select H1B.State, H1B.City, H1B.Employer_Name, count(*) as No_of_petetions from (Select SUBSTRING(WORKSITE, INSTR(WORKSITE,', ')+2) as State, SUBSTRING(WORKSITE, 0, INSTR(WORKSITE,', ') -1 ) as City, EMPLOYER_NAME from h1bpetetionsData) as H1B WHERE H1B.State = 'NEW YORK' group by H1B.State, H1B.City, H1B.Employer_Name HAVING count(*) > 10 Order BY H1B.State ASC, No_of_petetions Desc LIMIT 5) UNION (Select H1B.State, H1B.City, H1B.Employer_Name, count(*) as No_of_petetions from (Select SUBSTRING(WORKSITE, INSTR(WORKSITE,', ')+2) as State, SUBSTRING(WORKSITE, 0, INSTR(WORKSITE,', ') -1 ) as City, EMPLOYER_NAME from h1bpetetionsData) as H1B WHERE H1B.State = 'WASHINGTON' group by H1B.State, H1B.City, H1B.Employer_Name HAVING count(*) > 10 Order BY H1B.State ASC, No_of_petetions Desc LIMIT 5) UNION (Select H1B.State, H1B.City, H1B.Employer_Name, count(*) as No_of_petetions from (Select SUBSTRING(WORKSITE, INSTR(WORKSITE,', ')+2) as State, SUBSTRING(WORKSITE, 0, INSTR(WORKSITE,', ') -1 ) as City, EMPLOYER_NAME from h1bpetetionsData) as H1B WHERE H1B.State = 'WEST VIRGINIA' group by H1B.State, H1B.City, H1B.Employer_Name HAVING count(*) > 10 Order BY H1B.State ASC, No_of_petetions Desc LIMIT 5)) as Result order by Result.State, Result.No_of_petetions DESC")
g8.show(100,False)


#	for each employer name get all soc_names in descending order for all the years
emp =spark.sql("select EMPLOYER_NAME,SOC_NAME,count(*) as Petetion_Count from h1bpetetionsData where SOC_NAME!='NA' group by EMPLOYER_NAME,SOC_NAME order by Petetion_Count desc LIMIT 30")
emp.show(50, False)


#	for each employer name get all soc_names in descending order for all the years
emp1 =spark.sql("select Year, EMPLOYER_NAME,SOC_NAME,count(*) as Petetion_Count from h1bpetetionsData where Year in (2011,2012,2013,2014,2015,2016) and SOC_NAME!='NA' group by Year,EMPLOYER_NAME,SOC_NAME order by Petetion_Count desc,EMPLOYER_NAME,Year desc LIMIT 50")
emp1.show(150, False)

start = time.time()
#Sucess ratio of the H1B petitions
g10 = spark.sql("select Result.Year,Result.EMPLOYER_NAME, Result.No_of_petitions ,ROUND((No_of_CERTIFIED/No_of_petitions) * 100.0,2) as ratio from ( (SELECT R.Year,R.EMPLOYER_NAME, count(*) as No_of_petitions ,SUM(R.CERTIFIED_WITHDRAWN_count) as No_of_CERTIFIED_WITHDRAWN, SUM(R.WITHDRAWN_count) as No_of_WITHDRAWN, SUM(R.CERTIFIED_count) as No_of_CERTIFIED, SUM(R.DENIED_count) as no_of_DENIED FROM ( select *, \
CASE WHEN CASE_STATUS = 'CERTIFIED-WITHDRAWN' then 1 \
else 0 \
end as CERTIFIED_WITHDRAWN_count, \
CASE WHEN CASE_STATUS = 'WITHDRAWN' then 1 \
else 0 \
end as WITHDRAWN_count, \
CASE WHEN CASE_STATUS = 'CERTIFIED' then 1 \
else 0 \
end as CERTIFIED_count, \
CASE WHEN CASE_STATUS = 'DENIED' then 1 \
else 0 \
end as DENIED_count \
from h1bpetetionsData ) AS R \
WHERE R.Year = 2011 \
GROUP BY R.Year,R.EMPLOYER_NAME \
ORDER BY No_of_petitions DESC LIMIT 10) \
UNION \
(SELECT R.Year,R.EMPLOYER_NAME, count(*) as No_of_petitions ,SUM(R.CERTIFIED_WITHDRAWN_count) as No_of_CERTIFIED_WITHDRAWN, SUM(R.WITHDRAWN_count) as No_of_WITHDRAWN, SUM(R.CERTIFIED_count) as No_of_CERTIFIED, SUM(R.DENIED_count) as no_of_DENIED FROM ( select *, \
CASE WHEN CASE_STATUS = 'CERTIFIED-WITHDRAWN' then 1 \
else 0 \
end as CERTIFIED_WITHDRAWN_count, \
CASE WHEN CASE_STATUS = 'WITHDRAWN' then 1 \
else 0 \
end as WITHDRAWN_count, \
CASE WHEN CASE_STATUS = 'CERTIFIED' then 1 \
else 0 \
end as CERTIFIED_count, \
CASE WHEN CASE_STATUS = 'DENIED' then 1 \
else 0 \
end as DENIED_count \
from h1bpetetionsData ) AS R \
WHERE R.Year = 2012 \
GROUP BY R.Year,R.EMPLOYER_NAME \
ORDER BY No_of_petitions DESC LIMIT 10) \
UNION \
(SELECT R.Year,R.EMPLOYER_NAME, count(*) as No_of_petitions ,SUM(R.CERTIFIED_WITHDRAWN_count) as No_of_CERTIFIED_WITHDRAWN, SUM(R.WITHDRAWN_count) as No_of_WITHDRAWN, SUM(R.CERTIFIED_count) as No_of_CERTIFIED, SUM(R.DENIED_count) as no_of_DENIED FROM ( select *, \
CASE WHEN CASE_STATUS = 'CERTIFIED-WITHDRAWN' then 1 \
else 0 \
end as CERTIFIED_WITHDRAWN_count, \
CASE WHEN CASE_STATUS = 'WITHDRAWN' then 1 \
else 0 \
end as WITHDRAWN_count, \
CASE WHEN CASE_STATUS = 'CERTIFIED' then 1 \
else 0 \
end as CERTIFIED_count, \
CASE WHEN CASE_STATUS = 'DENIED' then 1 \
else 0 \
end as DENIED_count \
from h1bpetetionsData ) AS R \
WHERE R.Year = 2013 \
GROUP BY R.Year,R.EMPLOYER_NAME \
ORDER BY No_of_petitions DESC LIMIT 10) \
UNION \
(SELECT R.Year,R.EMPLOYER_NAME, count(*) as No_of_petitions ,SUM(R.CERTIFIED_WITHDRAWN_count) as No_of_CERTIFIED_WITHDRAWN, SUM(R.WITHDRAWN_count) as No_of_WITHDRAWN, SUM(R.CERTIFIED_count) as No_of_CERTIFIED, SUM(R.DENIED_count) as no_of_DENIED FROM ( select *, \
CASE WHEN CASE_STATUS = 'CERTIFIED-WITHDRAWN' then 1 \
else 0 \
end as CERTIFIED_WITHDRAWN_count, \
CASE WHEN CASE_STATUS = 'WITHDRAWN' then 1 \
else 0 \
end as WITHDRAWN_count, \
CASE WHEN CASE_STATUS = 'CERTIFIED' then 1 \
else 0 \
end as CERTIFIED_count, \
CASE WHEN CASE_STATUS = 'DENIED' then 1 \
else 0 \
end as DENIED_count \
from h1bpetetionsData ) AS R \
WHERE R.Year = 2014 \
GROUP BY R.Year,R.EMPLOYER_NAME \
ORDER BY No_of_petitions DESC LIMIT 10) \
UNION \
(SELECT R.Year,R.EMPLOYER_NAME, count(*) as No_of_petitions ,SUM(R.CERTIFIED_WITHDRAWN_count) as No_of_CERTIFIED_WITHDRAWN, SUM(R.WITHDRAWN_count) as No_of_WITHDRAWN, SUM(R.CERTIFIED_count) as No_of_CERTIFIED, SUM(R.DENIED_count) as no_of_DENIED FROM ( select *, \
CASE WHEN CASE_STATUS = 'CERTIFIED-WITHDRAWN' then 1 \
else 0 \
end as CERTIFIED_WITHDRAWN_count, \
CASE WHEN CASE_STATUS = 'WITHDRAWN' then 1 \
else 0 \
end as WITHDRAWN_count, \
CASE WHEN CASE_STATUS = 'CERTIFIED' then 1 \
else 0 \
end as CERTIFIED_count, \
CASE WHEN CASE_STATUS = 'DENIED' then 1 \
else 0 \
end as DENIED_count \
from h1bpetetionsData ) AS R \
WHERE R.Year = 2015 \
GROUP BY R.Year,R.EMPLOYER_NAME \
ORDER BY No_of_petitions DESC LIMIT 10) \
UNION \
(SELECT R.Year,R.EMPLOYER_NAME, count(*) as No_of_petitions ,SUM(R.CERTIFIED_WITHDRAWN_count) as No_of_CERTIFIED_WITHDRAWN, SUM(R.WITHDRAWN_count) as No_of_WITHDRAWN, SUM(R.CERTIFIED_count) as No_of_CERTIFIED, SUM(R.DENIED_count) as no_of_DENIED FROM ( select *, \
CASE WHEN CASE_STATUS = 'CERTIFIED-WITHDRAWN' then 1 \
else 0 \
end as CERTIFIED_WITHDRAWN_count, \
CASE WHEN CASE_STATUS = 'WITHDRAWN' then 1 \
else 0 \
end as WITHDRAWN_count, \
CASE WHEN CASE_STATUS = 'CERTIFIED' then 1 \
else 0 \
end as CERTIFIED_count, \
CASE WHEN CASE_STATUS = 'DENIED' then 1 \
else 0 \
end as DENIED_count \
from h1bpetetionsData ) AS R \
WHERE R.Year = 2016 \
GROUP BY R.Year,R.EMPLOYER_NAME \
ORDER BY No_of_petitions DESC LIMIT 10)) as Result \
ORDER BY Result.Year, ratio DESC")
g10.show(80,False)
print (time.time()-start)

########## interested query	###############
#	for a specific job role identify the top 5 companies that offer h1b and also check that for full time or not
#	'WEB DEVELOPER','DATA ANALYST','BIOMEDICAL AND IT ENGINEERING MANAGER','PHARMA/BIOTECHNOLOGY CONSULTANT','BIOINFORMATICS SCIENTIST (ITMI BIOINFORMATICIST)'
#	'CLINICAL DATA ANALYST','DATA SCIENTIST'BUSINESS ANALYST
#job=inputCSV.select("JOB_TITLE").distinct().orderby("JOB_TITLE",desc)
start = time.time()
job=spark.sql("select * from ((select JOB_TITLE, EMPLOYER_NAME,FULL_TIME_POSITION,count(*) as No_Of_H1b_sponsored from h1bpetetionsData where JOB_TITLE='BIOINFORMATICS SCIENTIST' group by JOB_TITLE,EMPLOYER_NAME,FULL_TIME_POSITION order by No_Of_H1b_sponsored desc limit 5)union (select JOB_TITLE, EMPLOYER_NAME,FULL_TIME_POSITION,count(*) as No_Of_H1b_sponsored from h1bpetetionsData where JOB_TITLE='DATA SCIENTIST' group by JOB_TITLE,EMPLOYER_NAME,FULL_TIME_POSITION order by No_Of_H1b_sponsored desc limit 5)union (select JOB_TITLE, EMPLOYER_NAME,FULL_TIME_POSITION,count(*) as No_Of_H1b_sponsored from h1bpetetionsData where JOB_TITLE='BIOMEDICAL AND IT ENGINEERING MANAGER' group by JOB_TITLE,EMPLOYER_NAME,FULL_TIME_POSITION order by No_Of_H1b_sponsored desc limit 5)union (select JOB_TITLE, EMPLOYER_NAME,FULL_TIME_POSITION,count(*) as No_Of_H1b_sponsored from h1bpetetionsData where JOB_TITLE='WEB DEVELOPER' group by JOB_TITLE,EMPLOYER_NAME,FULL_TIME_POSITION order by No_Of_H1b_sponsored desc limit 5) union (select JOB_TITLE, EMPLOYER_NAME,FULL_TIME_POSITION,count(*) as No_Of_H1b_sponsored from h1bpetetionsData where JOB_TITLE='PROFESSOR' group by JOB_TITLE,EMPLOYER_NAME,FULL_TIME_POSITION order by No_Of_H1b_sponsored desc limit 5)union (select JOB_TITLE, EMPLOYER_NAME,FULL_TIME_POSITION,count(*) as No_Of_H1b_sponsored from h1bpetetionsData where JOB_TITLE='BUSINESS ANALYST' group by JOB_TITLE,EMPLOYER_NAME,FULL_TIME_POSITION order by No_Of_H1b_sponsored desc limit 5)union (select JOB_TITLE, EMPLOYER_NAME,FULL_TIME_POSITION,count(*) as No_Of_H1b_sponsored from h1bpetetionsData where JOB_TITLE='DATA ANALYST' group by JOB_TITLE,EMPLOYER_NAME,FULL_TIME_POSITION order by No_Of_H1b_sponsored desc limit 5)union (select JOB_TITLE, EMPLOYER_NAME,FULL_TIME_POSITION,count(*) as No_Of_H1b_sponsored from h1bpetetionsData where JOB_TITLE='RESEARCH ASSOCIATE' group by JOB_TITLE,EMPLOYER_NAME,FULL_TIME_POSITION order by No_Of_H1b_sponsored desc limit 5)union (select JOB_TITLE, EMPLOYER_NAME,FULL_TIME_POSITION,count(*) as No_Of_H1b_sponsored from h1bpetetionsData where JOB_TITLE='PHARMACIST' group by JOB_TITLE,EMPLOYER_NAME,FULL_TIME_POSITION order by No_Of_H1b_sponsored desc limit 5)) as Result order by Result.Job_title, No_Of_H1b_sponsored Desc")
job.show(50,False)
print (time.time()-start)



#	minimum salary
q1=spark.sql("select job_title,min(cast(PREVAILING_WAGE as int)) as samp from h1bpetetionsData where case_status='CERTIFIED' group by job_title order by samp")
q1.show(50,False)


