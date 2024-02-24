from selenium import webdriver
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.common.by import By
import mysql.connector
import logging
import time
import requests
import json
import re
from urllib.parse import urlparse
import time
import datetime
import random
from bs4 import BeautifulSoup


class Mk:

    def __init__(self):

       
        base_url = "https://ccoanalitica.com/hassio/instaapi/"
        
        while True:
   
            tarefas =  self.getTarefas(base_url) 
            
            try:
                
                if len(tarefas) > 0 :    

                    for tarefa in tarefas:
                        
                        # Pega leads
                        # Trata Leads
                        
                        # Abra mkbuscar e pesquisa telefone
                        # Verifica se o resultado possui o nome
                        
                        # Se tiver o nome pega o cpf
                        
                        # Abra o mkbuscas e pesquisa o cpf
                        # procura por emails gmail, hotmail e outlook
                        # adiciona persona 
                        
                        
                        print(tarefa)
                        
                else:
                    
                    print('\n [!] Nenhnuma tarefa ativa. ')
                    time.sleep(5)
                
            except Exception as e:
                    print('\n [!] Erro no while.')
                    print(e)
                    
            time.sleep(5)
    
    def getTarefas(self, base_url):
        
        
        url = base_url+"/get_tarefas_finalizadas"
        
        response = requests.get(url)

        if response.status_code == 200:
            
            print("Requisição getTarefasAtivas bem-sucedida!")
            data = json.loads(response.content)
            print(data)
            return data
        
        else:
            print("Erro na requisição getTarefasAtivas:", response.status_code)
            return False   
        
      
Mk()