#Find Text Similarity Using Cosine Formula
#https://stackoverflow.com/questions/15173225/calculate-cosine-similarity-given-2-sentence-strings

import re, math
#import pandas as pd
from collections import Counter
import json
import sys


#---------------------Function to find similarity between 2 texts-------------------------------------
#Compile a regular expression pattern into a regular expression object trough Compile method.  r'\w+  indicates alpha numeric
WORD = re.compile(r'\w+')

def get_cosine(vec1, vec2):
     intersection = set(vec1.keys()) & set(vec2.keys())
     numerator = sum([vec1[x] * vec2[x] for x in intersection])

     sum1 = sum([vec1[x]**2 for x in vec1.keys()])
     sum2 = sum([vec2[x]**2 for x in vec2.keys()])
     denominator = math.sqrt(sum1) * math.sqrt(sum2)

     if not denominator:
        return 0.0
     else:
        return float(numerator) / denominator

def text_to_vector(text):
     words = WORD.findall(text)
     return Counter(words)



#-------------------Get case_id from php file----------------
case_id = sys.argv[1]
case_ids = ''
#case_id = '4/PW/2019'
#------------------------------Database------------------------------------------------
import pymysql
#connect
db=pymysql.connect("localhost","root","root","COURTCAL" )
cur = db.cursor()

#--------------------------------------Retrive sections for input case---------------------
cur.execute("select sections from Form_FIR where case_id = %s", (case_id,))
input_section = cur.fetchall()

#print(cur.rowcount)
if(cur.rowcount == 0):
    print('Case ID is invalid')
else:

    #print(case_id)
    #print(input_section)

    #----------Extract number from selected sections i.e if input section is Section 44,Section 94 then fetch only number which is [44, 94]
    numbers = re.findall('\d+',str(input_section))
    numbers = str(list(map(int,numbers)))
    #print(numbers)

    #create vector for input section
    vector1 = text_to_vector(numbers)


    #----------------Retrive sections of all cases except input case from mysql-----------------------
    cur.execute("select case_id, sections from Form_FIR where case_id != %s", (case_id,))
    #fetch data and save into variables
    a = cur.fetchall()
    #print(a)

    similarities = {}
    #a[i][0] = case id        a[i][1] = sections for that case
    for i in range(len(a)):
        #fetch number from selected sections
        numbers = re.findall('\d+',str(a[i][1]))
        numbers = str(list(map(int,numbers)))
        
        #create vector for ith entry
        vector2 = text_to_vector(numbers)
        
        #Create dictionary element as {case_id : section_similarity}
        similarities[str(a[i][0])] = get_cosine(vector1, vector2)*100

    #print(similarities)

    #-------------------------Remove case from similar cases if case similarity < 20% And Create List of case_id for similar case-------------------
    case_ids = ''
    for k, v in list(similarities.items()):
        if(v < 20):
            del similarities[k]
        else:
        	case_ids += k + "::"

    print(case_ids)
