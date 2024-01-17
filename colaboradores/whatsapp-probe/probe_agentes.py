import os
import json
import requests

from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.chrome.service import Service as ChromeService
from webdriver_manager.chrome import ChromeDriverManager
from selenium.webdriver.chrome.options import Options
from selenium.webdriver.common.keys import Keys

# Função para criar um novo perfil
def criar_perfil(nome_perfil):
    # Diretório onde os perfis serão salvos
    diretorio_base = r'C:\xampp\htdocs\hafnio\BOTS\agentes_sessoes'

    # Criar um diretório para o perfil
    diretorio_perfil = os.path.join(diretorio_base, nome_perfil)
    os.makedirs(diretorio_perfil, exist_ok=True)

    # Configurar as opções do Chrome WebDriver
    options = webdriver.ChromeOptions()
    options.add_argument('--user-data-dir=' + diretorio_perfil)

    # Iniciar o Chrome WebDriver com as opções configuradas
    driver = webdriver.Chrome(options=options)

    return driver
# Função para recuperar um perfil existente
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
        # driver.get('https://web.whatsapp.com')

        return driver

    else:
        print('O perfil', nome_perfil, 'não existe.')
# Exemplo de uso:
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
            print("Request failed. get_agente() Status code:",
                  response.status_code)
            return "error"

    except Exception as e:
        print('exception pegar_agente')
        print(e)
        return "error"
    
def get_agente(base_url, endpoint, agente_id):

    try:

        url = base_url+endpoint  # Replace with your API endpoint URL

        data = {
            'agente_id': agente_id
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
        print('exception get_agente')
        print(e)
        return "error"
    
def ativar_agente(base_url, endpoint, agente_id):
     
    try:

        url = base_url+endpoint  # Replace with your API endpoint URL

        data = {
            'agente_id': agente_id
        }

        response = requests.post(url, data=data)

        if response.status_code == 200:

            parsed_response = json.loads(response.text)
            return parsed_response

        else:
            print("Request failed. ativar_agente() Status code:",
                  response.status_code)
            return "error"

    except Exception as e:
        print('exception ativar_agente')
        print(e)
        return "error"

def desativar_agente(base_url, endpoint, agente_id):
     
    try:

        url = base_url+endpoint  # Replace with your API endpoint URL

        data = {
            'agente_id': agente_id
        }

        response = requests.post(url, data=data)

        if response.status_code == 200:

            parsed_response = json.loads(response.text)
            return parsed_response

        else:
            print("Request failed. ativar_agente() Status code:",
                  response.status_code)
            return "error"

    except Exception as e:
        print('exception ativar_agente')
        print(e)
        return "error"

def generate(perfil, agente_id, base_url):
    # Criar um novo perfil
    perfil1 = criar_perfil(perfil)

    # Abrir o WhatsApp no perfil1 e fazer login...
    perfil1.get('https://web.whatsapp.com')
    # ... fazer o login ...

    resposta = input('============= \n Ja escaneou, deu certo? [sim/nao]: ')

    if resposta == "sim":
        ativar_agente(base_url, "ativar_agente", agente_id)
    elif resposta == "nao":
        exit()
    # Fechar o navegador do perfil1
    perfil1.quit()

def open(perfil, agente_id, base_url):
    # Recuperar o perfil1
    perfil_recuperado = recuperar_perfil(perfil)

    # Abrir o WhatsApp no perfil recuperado
    perfil_recuperado.get('https://web.whatsapp.com')

    resposta = input('============= \n Ja analisou, deu certo? [sim/nao]: ')

    if resposta == "nao":
        desativar_agente(base_url, "desativar_agente", agente_id)
    elif resposta == "sim":
        exit()
    # Fechar o navegador do perfil1
    perfil_recuperado.quit()


base_url = "https://ccoanalitica.com/hafnio/api/"

print('\n ==== ESCOLHA QUAL NUMERO LOGAR ==== \n')

agentes = get_agentes(base_url, "get_agentes")

if agentes != "false":
    # print(agentes)
    for agente in agentes:
        status = ""

        if agente['agente_status'] == "1":
            status = "INATIVO"
        elif agente['agente_status'] == "0":
            status = "ATIVADO"

        print(' ['+str(agente['id'])+'] - '+status+' - '+str(agente['agente_numero'])+'  ')


    agente_id = input('\n DIGITE A OPÇÃO: ')

    agente_data = get_agente(base_url, "get_agente", agente_id)

    # print(agente_data)

    if agente_data != "false":

        print('\n 1 >> ATIVAR | 2 >> CHECAR \n')
        acao = input('\n DIGITE A OPÇÃO: ')

        if acao == "1":

            generate(agente_data['agente_numero'], agente_data['id'], base_url)

        elif acao == "2":

            open(agente_data['agente_numero'], agente_data['id'], base_url)
else:
    print('get_agentes retornou false.')




# Agora você está conectado novamente ao WhatsApp no perfil1

# Fazer o que você precisa fazer com o perfil1...

# Fechar o navegador do perfil1 recuperado
# perfil_recuperado.quit()

# Remover o diretório do perfil1
# shutil.rmtree(os.path.join(tempfile.gettempdir(), 'perfil1'))
