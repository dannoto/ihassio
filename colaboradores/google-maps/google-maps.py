from textwrap import indent
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.chrome.service import Service as ChromeService
from webdriver_manager.chrome import ChromeDriverManager
from selenium.webdriver.chrome.options import Options
import os
import urllib.request
import re
from unidecode import unidecode
import string
import validators
from urllib.parse import urlparse
import time
import mysql.connector
import logging

from selenium import webdriver
from selenium.webdriver.firefox.options import Options
from webdriver_manager.firefox import GeckoDriverManager
import os

import requests

class Scraper:

    def __init__(self):

       

        self.leads = []

        cidade = input('Digite a cidade: ')

        cidade = self.getCidade(cidade)

        if cidade != False:
            print(cidade)
        else:
            exit()


        segmento = input('Digite o segmento: ')

        segmento = self.getSegmento(segmento)

        if segmento != False:
            print(segmento)
        else:
            exit()



        cidade.replace(" ", "%20e")
        segmento.replace(" ", "%20e")

        self.Run(cidade, segmento)

        # print()

    def toDatabase(self, nome, site, cidade, segmento, telefone, email, endereco):

        mydb = mysql.connector.connect(
                host="149.62.37.204",
                user="u785878414_cco_lead",
                password="Effizienz10",
                database="u785878414_cco_lead"
        )

        mycursor = mydb.cursor()

     

        query = ("SELECT * FROM leads WHERE telefone = %s LIMIT 1")
        mycursor.execute(query, (telefone,))
        resultado = mycursor.fetchone()

        if resultado and len(telefone) > 0 :
            print('[**] JÁ EXISTE NO BANCO: '+nome)
        else:

            try: 
            
                mycursor = mydb.cursor()
                
                sql = "INSERT INTO leads (nome, site, cidade, segmento, telefone, email, endereco) VALUES (%s, %s, %s, %s, %s, %s, %s)"
                val = (nome, site, cidade, segmento, telefone, email, endereco)

                mycursor.execute(sql, val)

                # Salve as mudanças no banco de dados
                mydb.commit()



                if mycursor.rowcount:
                    
                    print('=====================')
                    print('[**] INSERIDO COM SUCESSO')
                    print(nome)
                    print(cidade)
                    print(site)
                    print(nome)
                    print(segmento)
                    print(telefone)
                    print(email)
                    print(endereco)
                    print('=====================')
            except:

                print('=====================')
                print('[!] ERRO AO INSERIR NO BANCO DE DADOS')
                print(nome)

    def getCidade(self, cidade = ""):

        # Faz a conexão com o banco de dados
        mydb = mysql.connector.connect(
            host="149.62.37.204",
            user="u785878414_cco_lead",
            password="Effizienz10",
            database="u785878414_cco_lead"
        )

        # Cria o cursor para executar as queries
        mycursor = mydb.cursor()

        if len(cidade) > 0:

            query = ("SELECT * FROM tb_cidades WHERE nome = %s LIMIT 1")
            mycursor.execute(query, (cidade,))
            resultado = mycursor.fetchone()

            if resultado:

                nome_cidade = resultado[3]
                # print(resultado)
                return nome_cidade
            else:
                print("Cidade não encontrada.")
                return False

        else:

            mycursor.execute(
                "SELECT nome FROM tb_cidades ORDER BY RAND() LIMIT 1")
            resultado = mycursor.fetchone()
            return resultado[0]

    def getSegmento(self, segmento = ""):

        # Faz a conexão com o banco de dados
        mydb = mysql.connector.connect(
            host="149.62.37.204",
            user="u785878414_cco_lead",
            password="Effizienz10",
            database="u785878414_cco_lead"
        )

        # Cria o cursor para executar as queries
        mycursor = mydb.cursor()

        if len(segmento) > 0:

            query = ("SELECT * FROM profissoes WHERE nome = %s LIMIT 1")
            mycursor.execute(query, (segmento,))
            resultado = mycursor.fetchone()

            if resultado:

                nome_segmento = resultado[1]
                # print(resultado)
                return nome_segmento
            else:
                print("Profissao não encontrada.")
                return False

        else:

            mycursor.execute(
                "SELECT nome FROM profissoes ORDER BY RAND() LIMIT 1")
            resultado = mycursor.fetchone()
            return resultado[0]
        

    def validate_phone(self, phone):

        padrao_telefone = r'\(\d{2}\)\s\d{4,5}\-\d{4}'
        telefone_encontrado = re.findall(padrao_telefone, phone)
        return bool(telefone_encontrado)

    def validate_url(self, url):

        url_regex = r'^(?:https?:\/\/)?(?:www\.)?[\w-]+(?:\.[\w-]+)+[\w.,@?^=%&:/~+#-]*$'
        return re.match(url_regex, url) is not None

    def Run(self, cidade, segmento):

        cidade  = cidade
        segmento = segmento

        # os.environ['WDM_LOG_LEVEL'] = '0'
        # os.environ['WDM_LOG'] = '0'
        # options = Options()
        # options.add_argument("start-maximized")
        # options.add_experimental_option('excludeSwitches', ['enable-logging'])

        # driver = webdriver.Chrome(service=ChromeService(
        #     executable_path=ChromeDriverManager().install()))
        # # chrome_path = "./chromedriver.exe"

        # driver = webdriver.Chrome()
        
        os.environ['WDM_LOG_LEVEL'] = '0'
        os.environ['WDM_LOG'] = '0'

        options = Options()
        options.add_argument("--start-maximized")

        driver = webdriver.Firefox(executable_path=GeckoDriverManager().install())

        # Abre o navegador Firefox
        driver = webdriver.Firefox(options=options)

        
        
        driver.get("https://www.google.com/localservices/prolist?hl=pt-BR&gl=br&cs=1&ssta=1&q="+segmento+" em "+cidade+"&oq="+segmento+" em "+cidade+"&src=2")

        exist = True

        while exist:
            

            #  Clicando na div
            divs = driver.find_elements(
                by=By.XPATH, value="//div[@jsname = 'gam5T']")

            for div in divs:

                site = ""
                nome = ""
                telefone = ""
                email = ""
                segmento = segmento
                endereco = ""

                #  Clicando nos items e pegando os dados.
                try:

                    div.click()
                    time.sleep(3)

                    contact_items = driver.find_elements(
                        by=By.CSS_SELECTOR, value="#overview-panel > span > div.RNs83 > div > div > div")

                    for contact_item in contact_items:

                        divs = contact_item.find_elements(
                            by=By.CSS_SELECTOR, value="div > div > a")

                        # Percorra todos os elementos div encontrados e extraia o número de telefone de cada um
                        for div in divs:

                            if len(div.text) > 0:

                                if self.validate_url(div.text):

                                    site = div.text
                                    
                                    # Capturar o email
                                    
                                    url = site

                                    # Faz a requisição HTTP
                                    response = requests.get(url)

                                    # Verifica se a requisição foi bem-sucedida (código de status 200)
                                    if response.status_code == 200:
                                        # Obtém o conteúdo HTML da página
                                        html_content = response.text

                                        # Define um padrão regex para encontrar endereços de e-mail
                                        email_pattern = re.compile(r'\b[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Z|a-z]{2,}\b')

                                        # Encontra todos os endereços de e-mail no conteúdo HTML
                                        emails = re.findall(email_pattern, html_content)
                                        
                                        email = emails[0]
                                        
                                        print('Email encontrado: '+email)

                                        # Imprime os endereços de e-mail encontrados
                                        # if emails:
                                        #     print("Endereços de e-mail encontrados:")
                                            
                                        #     for email in emails:
                                        #         print(email)
                                        # else:
                                        #     print("Nenhum endereço de e-mail encontrado.")
                                    else:
                                        print(f"A requisição falhou com o código de status {response.status_code}")

                                    
                                    
                                    # Capturar o email
                                    
                                    
                                    
                                    
                                    # print('site')
                                    # print(site)

                                elif self.validate_phone(div.text):

                                    telefone = div.text
                                    telefone = re.findall('\d', telefone)
                                    telefone_sem_formatacao = ''.join(telefone)
                                    telefone = "55"+telefone_sem_formatacao

                                    # print('telefone')
                                    # print(telefone)

                                else:

                                    endereco = div.text

                                    # print('endereco')
                                    # print(endereco)

                                nome = divs = contact_item.find_element(by=By.XPATH, value="//*[@id='yDmH0d']/c-wiz/div/div[3]/div/div/div[2]/div[3]/div[1]/c-wiz/div/c-wiz/div/div/div[3]/c-wiz[1]/div[1]/c-wiz/div").text
                                # print('nome')
                                # print(nome)

                    self.toDatabase( nome, site, cidade, segmento, telefone, email, endereco)

                    print("===================")

                except Exception as e:  # work on python 2.x
                    print(e)

                # self.Get(div, driver)
                time.sleep(5)

            #  Clicando no botão de próximo
            try:

                next = driver.find_element(by=By.XPATH, value=(
                    "//*[contains(text(), 'Próxima >')]"))
                next.click()

                time.sleep(5)

            except:

                print('[!] RENOVANDO CIDADE E SEGMENTO ALEATÓRIO')
            
                time.sleep(3)

                driver.close()

                cidade = self.getCidade("")
                if cidade != False:
                    print(cidade)
                else:
                    exit()

                segmento = self.getSegmento("advogado")
                if segmento != False:
                    print(segmento)
                else:
                    exit()

                self.Run( cidade, segmento)




                # exist = False

        print('[!] CAPTAÇÃO ENCERRADA')



Scraper()

