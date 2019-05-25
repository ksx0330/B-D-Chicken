#최상위 폴더부터 모든 PHP 팔의 dbconnect include를 바꿔주는 스크립트. 
#첫 번째 인자: 최상위 경로(./WebProgramming)
#두 번째 인자: 바꿀 위치(/home/ltaeng/Downloads/con/dbconnect.php)
#ex) python3 DBPath.py ./WebProgramming /home/ltaeng/Downloads/con/dbconnect.php

import sys, os

def changeDatabase(path):
    with open(path, "r") as file:
        data = file.readlines()

    for idx in range(len(data)):
        res = data[idx].find('dbconnect.php')
        if res != -1:
            data[idx] = 'include "' + changePath + '";\n'
            #print (data[idx])

    with open(path, "w") as file:
        file.writelines(data)

def checkPHP(dirName):
    fileNames = os.listdir(dirName)
    for fileName in fileNames:
        if fileName == 'sql' or fileName == 'Backup':
            continue

        full_filename = os.path.join(dirName, fileName)
        if os.path.isdir(full_filename):
            checkPHP(full_filename)
        else:
            ext = os.path.splitext(full_filename)[-1]
            if ext == '.php':
                print (full_filename)
                changeDatabase(full_filename)

mainPath = sys.argv[1]
changePath = sys.argv[2]

checkPHP(mainPath)

