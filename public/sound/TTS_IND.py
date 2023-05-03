# -*- coding: utf-8 -*-
"""
Created on Sat Dec  4 19:38:08 2021

@author: Upekkha Lau
"""

import os
from google.cloud import texttospeech_v1
import fitz
import regex as re
path = 'C:/Users/Upekkha Lau/Desktop/ProDS/GoogleTextToSpeech/GoogleTTS/Data/Indonesia/'
filelist = os.listdir(path)
    
for book in filelist:
    path = 'C:/Users/Upekkha Lau/Desktop/ProDS/GoogleTextToSpeech/GoogleTTS/Data/Indonesia/' + book
    file = fitz.open(path)
    lastPage = file.page_count
    
    # print("Total Page : " + str(lastPage))
    # startPage = int(input("Starting page:"))
    # endPage = int(input("Last page:"))
    startPage = 1
    endPage = lastPage
    
    os.environ['GOOGLE_APPLICATION_CREDENTIALS'] = 'C:/Users/Upekkha Lau/Desktop/ProDS/GoogleTextToSpeech/GoogleTTS/audiobookconverter-cd6624d68e4e.json'
    client = texttospeech_v1.TextToSpeechClient()
    
    #setting TTS ID
    voiceId = texttospeech_v1.VoiceSelectionParams(
        language_code='id-ID',
        ssml_gender=texttospeech_v1.SsmlVoiceGender.MALE
    )
    audio_configId = texttospeech_v1.AudioConfig(
        audio_encoding=texttospeech_v1.AudioEncoding.MP3    
    )
    
    text = ""
    for pageNumber, page in enumerate(file.pages(), start=startPage):
        if pageNumber <= endPage:
            text = text + page.getText()
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
        
    textHasil = textHasil[:5000]
    synthesis_input = texttospeech_v1.SynthesisInput(text=textHasil)
    
    response = client.synthesize_speech(
        input=synthesis_input,
        voice=voiceId,
        audio_config=audio_configId
    )
    book = book[:-4]
    with open(book + '.mp3', 'wb') as output:
        output.write(response.audio_content)