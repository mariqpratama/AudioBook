import os
import fitz
import re
import nltk
from scipy import spatial
import pandas as pd

path = 'D:/MedSos/Line/Codes/allData/'
filelist = os.listdir(path)

books = []
booksTokenize = {}

for book in filelist:
    path = 'D:/MedSos/Line/Codes/allData/' + book
    file = fitz.open(path)
    endPage = file.page_count
    startPage = 1
    text = ""
    for pageNumber, page in enumerate(file.pages(), start=startPage):
        if pageNumber <= endPage:
            text = text + page.getText().lower().strip()
            text = re.sub('[^a-zA-Z0-9 ]', '', text)
            text = re.sub(' +', ' ', text)
        else:
            break
        
    cleanText = ''
    for word in text.split(' '):
        cleanText = cleanText + re.sub('http\S+|www\S+','', word) + ' '
        
    sentToken = cleanText.split('\n')
    
    textHasil = ''
    for sent in sentToken:
        if len(sent.split())!=1:
            textHasil = textHasil + sent + ' '
        else:
            textHasil = textHasil + re.sub('^[0-9]', '', sent)
    
    books.append(textHasil.lower())
    
# print([nltk.word_tokenize(books[1])])
for i in range(len(books)):
    bookName = filelist[i]
    bookName = re.sub('.pdf', '', bookName)
    booksTokenize[bookName] = ([nltk.word_tokenize(books[i])])
    
# searchKey = input("Type Keywords Here:").lower()
searchKey = "main"
# searchKey = "di musim panas hidup seekor keledai"

#simpan seluruh keyword
keyWords = []
for word in searchKey.split():
    keyWords.append(word.lower())
    
TFVector = {}
for book in booksTokenize:
    for sentence in booksTokenize[book]:
        for words in sentence:
            TFVector[words] = 0
            
bookVector = {}
bookList = []
for book in booksTokenize:
    curVector = []
    tempDict = TFVector.copy()
    for sentence in booksTokenize[book]:
        for words in sentence:
            tempDict[words] = 1
    for temp in tempDict:
        curVector.append(tempDict[temp])
    bookVector[book] = curVector
    bookList.append(curVector)
    
bookList_df = pd.DataFrame(bookList)
bookList_df.to_csv('tfVektor.csv', index=False, header=False)

keyWordDict = []
tempDict = TFVector.copy()
for word in searchKey.split():
    if word in tempDict:
        tempDict[word] = 1
for word in tempDict:
    keyWordDict.append(tempDict[word])
    
bookScoreTFIDF = booksTokenize.copy()
for book in bookVector:
    bookScoreTFIDF[book] = spatial.distance.cosine(bookVector[book], keyWordDict)
    
sortedbookScoreTFIDF = sorted(bookScoreTFIDF, key=bookScoreTFIDF.get, reverse=False)

for book in sortedbookScoreTFIDF:
    if bookScoreTFIDF[book] != 1:
        print(book)
        
vektorList = pd.DataFrame(TFVector, index=[0])
vektorList.to_csv('vektorList.csv', index=False, header=True)