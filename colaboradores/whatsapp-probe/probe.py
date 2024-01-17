from textwrap import indent
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.chrome.service import Service as ChromeService
from webdriver_manager.chrome import ChromeDriverManager
from selenium.webdriver.chrome.options import Options
from selenium.webdriver.common.keys import Keys
import requests

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
import datetime
import random
import json


def recuperar_perfil(nome_perfil):
    # Diretório onde os perfis são salvos
    diretorio_base = r'C:\xampp\htdocs\hafnio\BOTS\agentes_sessoes'

    # Obter o diretório do perfil
    diretorio_perfil = os.path.join(diretorio_base, nome_perfil)

    # Verificar se o diretório do perfil existe
    if os.path.exists(diretorio_perfil):
        # Configurar as opções do Chrome WebDriver
        options = webdriver.ChromeOptions()
        options.add_argument('--user-data-dir=' + diretorio_perfil)

        # Iniciar o Chrome WebDriver com as opções configuradas
        driver = webdriver.Chrome(options=options)
        driver.get('https://web.whatsapp.com')

        return driver

    else:
        print('O agente', nome_perfil, 'não existe.')
    # Exemplo de uso:

def open(perfil):
    # Recuperar o perfil1
    perfil_recuperado = recuperar_perfil(perfil)

    return perfil_recuperado


# Api Calls
def get_ofertas(base_url, endpoint):

    try:

        url = base_url+endpoint  # Replace with your API endpoint URL

        data = {
            'none': 1
        }

        response = requests.post(url, data=data)

        if response.status_code == 200:

            parsed_response = json.loads(response.text)
            return parsed_response

        else:
            print("Request failed. get_ofertas() Status code:",
                  response.status_code)
            return "error"

    except Exception as e:
        print('exception pegar_ofertas')
        print(e)
        return "error"

def get_agentes(base_url, endpoint):

    try:

        url = base_url+endpoint  # Replace with your API endpoint URL

        data = {
            'agente_id': 1
        }

        response = requests.post(url, data=data)

        if response.status_code == 200:

            parsed_response = json.loads(response.text)
            return parsed_response

        else:
            print("Request failed. get_agentes() Status code:",
                  response.status_code)
            return "error"

    except Exception as e:
        print('exception get_agentes')
        print(e)
        return "error"

def get_agente(base_url, endpoint, agente_choosed):

    try:

        url = base_url+endpoint  # Replace with your API endpoint URL

        data = {
            'agente_id': agente_choosed
        }

        response = requests.post(url, data=data)

        if response.status_code == 200:

            parsed_response = json.loads(response.text)
            return parsed_response

        else:
            print("Request failed. get_agente() Status code:",
                  response.status_code)
            return "error"

    except Exception as e:
        print('exception pegar_agente')
        print(e)
        return "error"

def get_oferta(base_url, endpoint, oferta_choosed):

    try:

        url = base_url+endpoint  # Replace with your API endpoint URL

        data = {
            'oferta_id': oferta_choosed
        }

        response = requests.post(url, data=data)

        if response.status_code == 200:

            parsed_response = json.loads(response.text)
            return parsed_response

        else:
            print("Request failed. get_oferta() Status code:",
                  response.status_code)
            return "error"

    except Exception as e:
        print('exception get_oferta')
        print(e)
        return "error"

def check_envios_qtd(base_url, endpoint, agente_choosed, oferta_id):

    try:

        url = base_url+endpoint  # Replace with your API endpoint URL

        data = {
            'agente_id': agente_choosed,
            'oferta_id': oferta_id
        }

        response = requests.post(url, data=data)

        if response.status_code == 200:

            parsed_response = json.loads(response.text)
            return parsed_response

        else:
            print("Request failed. check_envios_qtd() Status code:",
                  response.status_code)
            return "error"

    except Exception as e:
        print('exception check_envios_qtd')
        print(e)
        return "error"

def get_leads(base_url, endpoint, oferta_id, limite):

    try:

        url = base_url+endpoint  # Replace with your API endpoint URL

        data = {
            'oferta_id': oferta_id,
            "limite": limite
        }

        response = requests.post(url, data=data)

        if response.status_code == 200:

            parsed_response = json.loads(response.text)
            return parsed_response

        else:
            print("Request failed. get_leads() Status code:",
                  response.status_code)
            return "error"

    except Exception as e:
        print('exception get_leads')
        print(e)
        return "error"

def get_lead(base_url, endpoint, lead_id):

    try:

        url = base_url+endpoint  # Replace with your API endpoint URL

        data = {
            'lead_id': lead_id,
        }

        response = requests.post(url, data=data)

        if response.status_code == 200:

            parsed_response = json.loads(response.text)
            return parsed_response

        else:
            print("Request failed. get_leads() Status code:",
                  response.status_code)
            return "error"

    except Exception as e:
        print('exception get_leads')
        print(e)
        return "error"

def check_envio(oferta_id, endpoint, lead_id ):
    
    try:

        url = base_url+endpoint  # Replace with your API endpoint URL

        data = {
            'oferta_id': oferta_id,
            "lead_id": lead_id
        }

        response = requests.post(url, data=data)

        if response.status_code == 200:

            parsed_response = json.loads(response.text)
            return parsed_response['status']

        else:
            print("Request failed. check_envio() Status code:",
                  response.status_code)
            return "error"

    except Exception as e:
        print('exception check_envio')
        print(e)
        return "error"

def oferta_enviada(base_url, endpoint, oferta_id, lead_id, agente_id):
    
    try:

        url = base_url+endpoint  # Replace with your API endpoint URL

        data = {
            'oferta_id': oferta_id,
            "lead_id": lead_id,
            'agente_id': agente_id
        }

        response = requests.post(url, data=data)

        if response.status_code == 200:

            parsed_response = json.loads(response.text)
            return parsed_response

        else:
            print("Request failed. oferta_enviada() Status code:",
                  response.status_code)
            return "error"

    except Exception as e:
        print('exception oferta_enviada')
        print(e)
        return "error"

def get_leads_fase_dois(base_url, endpoint, agente_choosed, oferta_id):
    
    try:

        url = base_url+endpoint  # Replace with your API endpoint URL

        data = {
            'oferta_id': oferta_id,
            "agente_id": agente_choosed
        }

        response = requests.post(url, data=data)

        if response.status_code == 200:

            parsed_response = json.loads(response.text)
            return parsed_response

        else:
            print("Request failed. get_leads_fase_dois() Status code:",
                  response.status_code)
            return "error"

    except Exception as e:
        print('exception get_leads_fase_dois')
        print(e)
        return "error"

def check_envio_fase_dois(oferta_id, endpoint, lead_id):

    try:

        url = base_url+endpoint  # Replace with your API endpoint URL

        data = {
            'lead_id': lead_id,
            "oferta_id": oferta_id
        }

        response = requests.post(url, data=data)

        if response.status_code == 200:

            parsed_response = json.loads(response.text)
            return parsed_response['status']

        else:
            print("Request failed. check_envio_fase_dois() Status code:",
                  response.status_code)
            return "error"

    except Exception as e:
        print('exception check_envio_fase_dois')
        print(e)
        return "error"

def oferta_enviada_fase_dois(base_url, endpoint, oferta_id, lead_id, agente_id):

    try:

        url = base_url+endpoint  # Replace with your API endpoint URL

        data = {
            'lead_id': lead_id,
            "oferta_id": oferta_id,
            'agente_id': agente_id
        }

        response = requests.post(url, data=data)

        if response.status_code == 200:

            parsed_response = json.loads(response.text)
            return parsed_response

        else:
            print("Request failed. oferta_enviada_fase_dois() Status code:",
                  response.status_code)
            return "error"

    except Exception as e:
        print('exception oferta_enviada_fase_dois')
        print(e)
        return "error"

#  Fases
def envio_fase_um(driver, oferta_data, leads_data, limit_choosed, agente_choosed):

    for lead in leads_data:

        try:

            oferta_envios = check_envios_qtd(base_url, "check_envios_qtd", agente_choosed, oferta_data['id'])

            print("OFERTA ENVIADAS HOJE: "+str(oferta_envios))
            if int(oferta_envios) >= int(limit_choosed):
                print('\n[!] O LIMITE FOI ATINGIDO. ENCERRANDO... \n')
                break

            print('\n =============== INICIANDO ENVIO FASE 1 - '+lead['telefone']+' | '+lead['nome']+' ================= \n')

            # Definindo saudação
            agora = datetime.datetime.now()
            if agora.hour < 12:
                saudacao = "Oi, bom dia"
            elif agora.hour < 18:
                saudacao = "Oi, boa tarde"
            else:
                saudacao = "Oi, boa noite"
            
            # Checando formatação do numero
            if len(lead['telefone']) == 13:
                # Checando se o numero ja foi enviado
                if check_envio(oferta_data['id'], "check_envio", lead['id']) == "false":

                    # Abrindo Janela do Chat
                    print('\n [!] ABRINDO CHAT DA CONVERSA... \n')
                    time.sleep(random.uniform(5, 15)) 
                    driver.get("https://web.whatsapp.com/send/?phone="+lead['telefone']+"&text&type=phone_number&app_absent=0")

                    # Clica no campo texto
                    time.sleep(random.uniform(10, 25))  
                    print('\n [!] SELECIONANDO INPUT... \n')
                    driver.find_element(by=By.XPATH, value="/html/body/div[1]/div/div/div[5]/div/footer/div[1]/div/span[2]/div/div[2]/div[1]/div").click()

                    # Digitando texto
                    time.sleep(random.uniform(1, 10)) 
                    print('\n [!] DIGITANTO TEXTO... \n')
                    input_element = driver.find_element(by=By.XPATH, value="/html/body/div[1]/div/div/div[5]/div/footer/div[1]/div/span[2]/div/div[2]/div[1]")
                    text_to_type = saudacao
                    time.sleep(random.uniform(1, 5)) 
                    for char in text_to_type:
                        input_element.send_keys(char)
                        time.sleep(random.uniform(0.1, 0.5)) 

                    # Enviando texto
                    time.sleep(random.uniform(1, 7)) 
                    driver.find_element(by=By.XPATH, value="/html/body/div[1]/div/div/div[5]/div/footer/div[1]/div/span[2]/div/div[2]/div[1]").send_keys(Keys.ENTER)

                    #  Registrando o envio
                    print('\n [!] REGISTRANDO ENVIO... \n')
                    oferta_enviada(base_url, "oferta_enviada", oferta_data['id'], lead['id'], agente_choosed)

                    time.sleep(3)

                elif check_envio(oferta_data['id'],"check_envio", lead['id']) == "true":

                    print("\n [!] OFERTA JÁ FOI ENVIADA. \n")

            else:
                print("\n [!] FORMATAÇÃO INCORRETA \n")

            print('\n ================================ \n')

        except Exception as e:
            print('\n [!] EXCEPTION '+lead['telefone'])
            print(e)
            print('\n ================================ \n')

        tempo = random.randint(60, 120)
        print('Aguardando '+str(tempo) + ' segundos até o próximo envio.')
        time.sleep(tempo)

    

                    #  Rodando fase 2 - Oferta

def envio_fase_dois(driver, oferta_data, agente_choosed):
    
    ofertas_historico = get_leads_fase_dois(base_url, "get_leads_fase_dois", agente_choosed, oferta_data['id'])

    if ofertas_historico != 0:
        for oferta in ofertas_historico:


            lead = get_lead(base_url, "get_lead",  oferta['lead_id'])

            try:

                print('\n =============== INICIANDO ENVIO FASE 2 - '+lead['telefone']+' | '+lead['nome']+' ================= \n')

                # Definindo conteudos
                oferta_conteudo = oferta_data['oferta_conteudo']
                oferta_link = "" + oferta_data['oferta_url']+oferta['id']+"/"+oferta_data['oferta_slug']
                
                # Checando formatação do numero
                if len(lead['telefone']) == 13:
                    # Checando se o numero ja foi enviado
                    if check_envio_fase_dois(oferta_data['id'], "check_envio_fase_dois", lead['id']) == "false":

                        # Abrindo Janela do Chat
                        print('\n [!] ABRINDO CHAT DA CONVERSA... \n')
                        time.sleep(random.uniform(5, 15)) 
                        driver.get("https://web.whatsapp.com/send/?phone="+lead['telefone']+"&text&type=phone_number&app_absent=0")
                        # time.sleep(random.uniform(1, 10)) 

                        # Clica no campo texto
                        time.sleep(random.uniform(10, 25)) 
                        print('\n [!] SELECIONANDO INPUT... \n')
                        driver.find_element(by=By.XPATH, value="/html/body/div[1]/div/div/div[5]/div/footer/div[1]/div/span[2]/div/div[2]/div[1]/div").click()

                        # Digitando texto da oferta
                        time.sleep(random.uniform(1, 10)) 
                        print('\n [!] DIGITANTO O CONTEUDO DA OFERTA... \n')
                        input_element = driver.find_element(by=By.XPATH, value="/html/body/div[1]/div/div/div[5]/div/footer/div[1]/div/span[2]/div/div[2]/div[1]")
                        oferta_conteudo = oferta_conteudo

                        # lines = oferta_conteudo.split('\n')

                        # count = 0 

                        # for line in lines:

                        #     for char in line:
                        #         input_element.send_keys(char)
                        #         time.sleep(random.uniform(0.09, 0.15)) 
                        #     # input_element.send_keys(line)
                        #       # This simulates Shift + Enter to create a new line
                        #     count = count + 1
                        #     # if count == 10:
                        #     #     input_element.send_keys(Keys.ENTER)
                        #     # else:
                            # input_element.send_keys(Keys.SHIFT, Keys.ENTER)

                            # if count > 10:
                            #     time.sleep(random.uniform(0.01, 0.05))
                            # else:
                            #     time.sleep(random.uniform(0.1, 0.5))

                        # time.sleep(random.uniform(1, 5)) 
                        # for char in oferta_conteudo:
                        #     input_element.send_keys(char)
                        #     time.sleep(random.uniform(0.1, 0.5)) 
                        input_element.send_keys("/primeiro")

                        # Enviando texto
                        time.sleep(random.uniform(1, 7)) 
                        driver.find_element(by=By.XPATH, value="/html/body/div[1]/div/div/div[5]/div/footer/div[1]/div/span[2]/div/div[2]/div[1]").send_keys(Keys.ENTER)
                        driver.find_element(by=By.XPATH, value="/html/body/div[1]/div/div/div[5]/div/footer/div[1]/div/span[2]/div/div[2]/div[1]").send_keys(Keys.ENTER)

                        # Digitando texto link
                        print('\n [!] DIGITANTO O LINK DA OFERTA... \n')
                        input_element = driver.find_element(by=By.XPATH, value="/html/body/div[1]/div/div/div[5]/div/footer/div[1]/div/span[2]/div/div[2]/div[1]")
                        oferta_link = oferta_link
                        time.sleep(random.uniform(1, 5)) 

                        
                        for char in oferta_link:
                            input_element.send_keys(char)
                            time.sleep(random.uniform(0.09, 0.15)) 

                        # Enviando texto
                        time.sleep(random.uniform(1, 7)) 
                        driver.find_element(by=By.XPATH, value="/html/body/div[1]/div/div/div[5]/div/footer/div[1]/div/span[2]/div/div[2]/div[1]").send_keys(Keys.ENTER)

                        #  Registrando o envio
                        print('\n [!] REGISTRANDO ENVIO... \n')
                        oferta_enviada_fase_dois(base_url, "oferta_enviada_fase_dois", oferta_data['id'], lead['id'], agente_choosed)

                        time.sleep(3)

                    elif check_envio_fase_dois(oferta_data['id'],"check_envio_fase_dois", lead['id']) == "true":

                        print("\n [!] OFERTA JÁ FOI ENVIADA. \n")

                else:
                    print("\n [!] FORMATAÇÃO INCORRETA \n")

                print('\n ================================ \n')

            except Exception as e:
                print('\n [!] EXCEPTION '+lead['telefone'])
                print(e)
                print('\n ================================ \n')

            tempo = random.randint(180, 300)
            print('Aguardando '+str(tempo) + ' segundos até o próximo envio.')
            time.sleep(tempo)
    else:
        print('\n ============================== \n [!] FINALIZADO A FASE 2, REINICIANDO...')
        return "false"

    
if __name__ == "__main__":

    try:

        base_url = "https://ccoanalitica.com/hafnio/api/"

        while True:

            # Escolhendo Oferta
            ofertas = get_ofertas(base_url, "get_ofertas")
            # print(ofertas)
            print('\n=====================\n [!] ESCOLHA A OFERTA \n')
            for oferta in ofertas:
                print("["+str(oferta['id'])+"] - "+str(oferta['oferta_titulo'])+"")
            oferta_choosed = input('\n ========== \n Digite a opção de oferta: ')

            #  Escolhendo agente
            agentes = get_agentes(base_url, "get_agentes")
            # print(agentes)
            print('\n=====================\n [!] ESCOLHA O AGENTE \n')

            

            for agente in agentes:

                status = ""
                if agente['agente_status'] == "1":
                    status = "INATIVO"
                elif agente['agente_status'] == "0":
                    status = "ATIVADO"

                print("["+str(agente['id'])+"] - "+str(status)+" - "+str(agente['agente_numero'])+"")

            agente_choosed = input('\n ========== \n Digite a opção de agente: ')

            # Escolhendo o limite de envio
            print('\n=====================\n [!] ESCOLHA O LIMITE DE ENVIO \n')
            limit_choosed = input('\n ========== \n Digite o limite. Ex: 50: ')

            # Recuperando agente
            agente_data = get_agente(base_url, "get_agente", agente_choosed)
            oferta_data = get_oferta(base_url, "get_oferta", oferta_choosed)
            

            # Resumo
            print('\n=====================\n [!] RESUMO DA OPERAÇÃO')
            print(' OFERTA: '+str(oferta_data['oferta_titulo'])+" ")
            print(' AGENTE: '+str(agente_data['agente_numero'])+" ")
            print(' LIMITE: '+str(limit_choosed)+" ")
            print(' =================================== ')

        
            print('\n Digite "sim" para cotinuar e "nao" para abortar. \n')
            proceeed = input('Deseja continuar?: ')

            if proceeed == "sim":
                driver = open(agente_data['agente_numero'])

                # print('\n *************** [!] ESCANEIE SEU QR CODE *************** \n')
                # input('APERTE ENTER PARA COTINUAR: ')

            if proceeed == "sim":

                while True:

                    # Pegando dados da oferta
                    oferta_data = get_oferta(base_url, "get_oferta", oferta_choosed)

                    # Checando envios totais
                    oferta_envios = check_envios_qtd(base_url, "check_envios_qtd", agente_choosed, oferta_data['id'])
                    print("OFERTA ENVIADAS HOJE: "+str(oferta_envios))

                    if int(oferta_envios) >= int(limit_choosed):
                        print('\n[!] O LIMITE FOI ATINGIDO. ENCERRANDO... \n')
                        exit()

                    # Acessando leads do publico. Default 10.
                    leads_data = get_leads(base_url, "get_leads", oferta_data['id'], 10)

                    # print(leads_data)
                    
                    #  Rodando fase 1 - Saudação
                    if leads_data != 0:
                        envio_fase_um(driver, oferta_data, leads_data, limit_choosed, agente_choosed)
                    else:
                        print('\n ============================== \n [!] NENHUM LEAD PARA FASE 1, INDO PARA FASE 2')

                    #  Rodando fase 2 - Oferta
                    status_fase_dois = envio_fase_dois(driver, oferta_data, agente_choosed)

                    if status_fase_dois == "false":
                        pass
                    

            elif proceeed == "nao":
                print('\n [!] ABORTANDO... \n')
                exit()
            else:
                print(
                    '\n [**] Nenhum comando encontrado! Voce é imbecil? Leia o que esta escrito ANTES DE AGIR! \n')
                exit()

    except Exception as e:

        print("main() exception")
        print(e)
