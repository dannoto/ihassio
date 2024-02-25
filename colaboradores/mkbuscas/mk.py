
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
from selenium.webdriver.firefox.firefox_profile import FirefoxProfile
from selenium.webdriver.firefox.options import Options
from webdriver_manager.firefox import GeckoDriverManager
import winsound
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC


class Mk:

    def __init__(self):

       
        base_url = "https://ccoanalitica.com/hassio/instaapi/"
        options = Options()
        options.headless = False  # Você pode definir como True para executar em modo headless
        profile = FirefoxProfile()
        driver = webdriver.Firefox(executable_path=GeckoDriverManager().install(), options=options, firefox_profile=profile)
        
        
        driver.get('https://mksearch.tech/login')
        next = input('Aperte após fazer login')
        
        
        while True:
   
            tarefas =  self.get_tarefas (base_url) 
            
            try:
                
                if len(tarefas) > 0 :    

                    for tarefa in tarefas:
                        
                        # Pega leads
                        leads = self.get_tarefas_leads(base_url, tarefa['id'])
                        print(f"================= {tarefa['tarefa_nome']} --- {tarefa['id']} ===========")
                        
                        for lead in leads:
                             
                            nome = lead['full_name']
                            username = lead['username']
                            email = lead['email']
                            telefone = lead['telefone']
                            tag = lead['tag_id']
                       
                            # Trata Leads
                            if len(email) > 0:
                                
                                if self.check_provedor(email):
                                    
                                    print('[*] check_provedor E-mail validado. Nao precisa mk')
                                    
                                else: 
                                    
                                    print('[*] check_provedor E-mail sem validação. Visitando mk')
                                    
                                    if self.higienizacao_telefone_instagram(telefone):
                                    
                                        mk_cpf = self.mk_telefone(driver, telefone, nome)
                                        
                                        print(f"cpf encontrado: {mk_cpf}")

                                    
                                        # if mk_cpf != False:
                                            
                                        #     mk_email = self.mk_email(mk_cpf)
                                            
                                        #     if mk_email != False:
                                        #         print('[!] E-mail encontrado.')
                                                
                                        #         self.add_persona(nome, username, mk_email, telefone, tag)
                                                
                                        #     else:
                                        #         print('[!] Nenhum e-mail encontrado.')
                                    else:
                                        print('SEM TELEFONE // telefone invalido ')
                                
                            else:
                                
                                if self.higienizacao_telefone_instagram(telefone):
                                    mk_cpf = self.mk_telefone(driver, telefone, nome)
                                    
                                    print(f"cpf encontrado: {mk_cpf}")
                                    
                                    # if mk_cpf != False:
                                        
                                    #     mk_email = self.mk_email(mk_cpf)
                                        
                                    #     if mk_email != False:
                                    #         print('[!] E-mail encontrado.')
                                            
                                    #         self.add_persona(nome, username, mk_email, telefone, tag)
                                            
                                    #     else:
                                    #         print('[!] Nenhum e-mail encontrado.')
                                    
                                else:
                                        print('SEM TELEFONE // telefone invalido ')
                            
                            time.sleep(5)                       
                else:
                    
                    print('\n [!] Nenhnuma tarefa ativa. ')
                    time.sleep(5)
                
            except Exception as e:
                    print('\n [!] Erro no while.')
                    print(e)
                    
            time.sleep(5)
    
    def get_tarefas(self, base_url):
        
        url = base_url+"/get_tarefas_finalizadas"
        
        response = requests.get(url)

        if response.status_code == 200:
            
            print("Requisição get_tarefas Ativas bem-sucedida!")
            data = json.loads(response.content)
            
            return data
        
        else:
            print("Erro na requisição get_tarefas Ativas:", response.status_code)
            return False   
        
    def get_tarefas_leads(self, base_url,  tarefa_id):
        
        url = base_url+"/get_tarefas_leads?tarefa_id="+tarefa_id
        
        response = requests.get(url)

        if response.status_code == 200:
            
            print("Requisição get_tarefas Ativas bem-sucedida!")
            data = json.loads(response.content)
            
            return data
        
        else:
            print("Erro na requisição get_tarefas Ativas:", response.status_code)
            return False   
        
    def check_provedor(email):
        
        provedores_permitidos = ["gmail.com", "hotmail.com", "outlook.com"]
        # Divide o e-mail em nome de usuário e provedor
        usuario, provedor = email.split('@', 1)
        
        # Verifica se o provedor está na lista de provedores permitidos
        if provedor.lower() in provedores_permitidos:
            return True
        else:
            return False
    
    def mk_telefone(self, driver, telefone, primeiro_nome_instagram):
        
        primeiro_nome_instagram = self.higienizar_nome_instagram(primeiro_nome_instagram)
        telefone = telefone
        
        # ------------------------
        
        try:
        
            padrao = r'^55'
            telefone_formatado = re.sub(padrao, '', telefone)
            
            driver.get('https://mksearch.tech/dashboard/consulta/telefonetop/')
            
            time.sleep(3)
                    
            telefone_input = driver.find_element(By.XPATH, '//*[@id="doc"]')
            telefone_input.send_keys(telefone_formatado)
            
            # Verificando captcha
            codigo_fonte = driver.page_source
            print('[!] Verificando Recaptcha')
            
            if "Adicione o reCAPTCHA aqui" in codigo_fonte:
                
                print('[*] Recaptcha encontrado!!')
                winsound.Beep(1000, 1500)  
                next = input('Aperte enter depois do repatcha')
                
            else:
                print('[*] Recaptcha não encontrado!!')
            # Verificando captcha
            
            time.sleep(3)

            # Botao para enviar e fazer a busca XPATH: 
            botao_pesquisar = driver.find_element(By.XPATH, '/html/body/div[2]/div[3]/div/div/div/div/div[2]/div[2]/div/div/center/div/button[1]')
            botao_pesquisar.click()
            
            time.sleep(8)
            
            # -------- resultado ----------
            
            elemento_resultado = driver.find_element(By.ID, "resultado")

            if "Nada encontrado" in elemento_resultado.text:
                print("[!] Nenhum resultado encontrado.")
            else:
                print("[!] Resultados encontrados.")

                # Encontra todos os elementos de informação do telefone
                elementos_info_telefone = elemento_resultado.find_elements(By.XPATH, "//div[@id='api-data']")

                # Loop sobre os elementos de informação do telefone
                for elemento_info in elementos_info_telefone:
                    # Extrai o nome e o CPF
                    nome_completo_mk = elemento_info.find_element(By.XPATH, ".//p[contains(., 'NOME:')]").text.split(":")[1].strip()
                    cpf = elemento_info.find_element(By.XPATH, ".//p[contains(., 'CPF:')]").text.split(":")[1].strip()

                    nome_completo_mk = self.higienizar_nome_mk(nome_completo_mk)

                    # Verifica se o primeiro nome corresponde ao nome fornecido
                    if primeiro_nome_instagram in nome_completo_mk:
                        print('[!] Deu Match !! ')
                        print("Nome:", nome_completo_mk)
                        print("CPF:", cpf)
                        return cpf
                        
                    else:
                        print('[!] Não Deu Match !! ')
                        # Exibe o nome e o CPF
                        print("Nome:", nome_completo_mk)
                        print("CPF:", cpf)
                        
                return False

        except Exception as e:
            
            print(f'mk_telefone exception: {e}')
            
    def higienizar_nome_instagram(self, nome_completo):
        print('higienizado instagram: '+nome_completo)

        primeiro_nome = nome_completo.split()[0]
        # Remove caracteres especiais e deixa apenas letras e espaços
        primeiro_nome_limpo = re.sub(r'[^a-zA-Z\s]', '', primeiro_nome)
        # print('higienizado instagram: '+primeiro_nome_limpo.lower())
        return primeiro_nome_limpo.lower()
    
    def higienizar_nome_mk(self, nome_completo):
        
        # Remove caracteres especiais e deixa apenas letras e espaços
        nome_completo = re.sub(r'[^a-zA-Z\s]', '', nome_completo)
        # print('higienizado mk: '+nome_completo.lower())
        return nome_completo.lower()
    
    def higienizacao_telefone_instagram(self, telefone):
        # Verifica se o número começa com "55" e possui 13 dígitos
        if len(telefone) == 13 and telefone[:2] == "55" and telefone.isdigit():
            return True
        else:
            return False
            
Mk()