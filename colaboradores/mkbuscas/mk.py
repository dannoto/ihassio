
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
from unidecode import unidecode



class Mk:

    def __init__(self):

       
        base_url = "https://ccoanalitica.com/hassio/instaapi/"
        options = Options()
        options.headless = False  # Você pode definir como True para executar em modo headless
        profile = FirefoxProfile()
        driver = webdriver.Firefox(executable_path=GeckoDriverManager().install(), options=options, firefox_profile=profile)
        
        
        driver.get('https://mksearch.tech/login')
        next = input('Aperte após fazer login')
        print(next)
        
        # cnpj = "22529787832"
        # telefone = "5516991738784"
        # username = "insta_thiago"
        # lead_id = "2563"
        # tag = "161"
        # persona_data = self.mk_email(driver, cnpj, telefone, username, lead_id, tag )
        
        # self.add_persona(base_url, persona_data)
               
        while True:
   
            tarefas =  self.get_tarefas (base_url) 
            
            try:
                
                if len(tarefas) > 0 :    

                    for tarefa in tarefas:
                        
                        # Pega leads
                        leads = self.get_tarefas_leads(base_url, tarefa['id'])

                        print(f"\n======LEAD ENCONTRADOS:{len(leads)} =========== {tarefa['tarefa_nome']} --- {tarefa['id']} ===========\n")
                        
                        for lead in leads:
                             
                            nome = lead['full_name']
                            username = lead['username']
                            email = lead['email']
                            telefone = lead['telefone']
                            tag = lead['tag_id']
                            lead_id = lead['id']
                            
                            # Trata Leads
                            try:
                                if len(email) > 0:
                                    
                                    if self.check_provedor(email):
                                        
                                        print('[*] Já tem e-mail válido \n')
                                        
                                        persona_data = {
                                            "nome": nome,
                                            "nascimento": "",
                                            "rg": "",
                                            "cpf": "",
                                            "sexo": "",
                                            "endereco":"",
                                            "cep": "",
                                            "estado": "",
                                            "cidade": "",
                                            "bairro": "",
                                            "email": email,
                                            "telefone": telefone,
                                            "username": username,
                                            "tag": tag,
                                            "lead_id": lead_id 
                                        }
                                        
                                        self.add_persona(base_url, persona_data)
                                        self.add_convertido(base_url,lead_id)
                                        
                                    else: 
                                        
                                        # print('[*] check_provedor E-mail sem validação. Visitando mk')
                                        
                                        if self.higienizacao_telefone_instagram(telefone):
                                            
                                            print(f" ====== LEAD: {nome} - {tarefa['id']} ======")
                                            mk_cpf = self.mk_telefone(driver, telefone, nome)
                                            
                                            print(f"[!] Cpf Encontrado: {mk_cpf} \n")

                                        
                                            if mk_cpf != False:
                                                
                                                persona_data = self.mk_email(driver, mk_cpf, telefone, username, lead_id, tag)
                                                
                                                if persona_data != False:
                                                    print('[!] ADICIONANDO PERSONA.')
                                                    
                                                    self.add_persona(base_url, persona_data)
                                                    print('Adicionando CONVERTIDO')
                                                    self.add_convertido(base_url,lead_id)
                                                    
                                                else:
                                                    
                                                    persona_data = {
                                                        "nome": nome,
                                                        "nascimento": "",
                                                        "rg": "",
                                                        "cpf": mk_cpf,
                                                        "sexo": "",
                                                        "endereco":"",
                                                        "cep": "",
                                                        "estado": "",
                                                        "cidade": "",
                                                        "bairro": "",
                                                        "email": email,
                                                        "telefone": telefone,
                                                        "username": username,
                                                        "tag": tag,
                                                        "lead_id": lead_id 
                                                    }
                                                    
                                                    self.add_persona(base_url, persona_data)
                                                    self.add_convertido(base_url,lead_id)
                                                    print('[!] NAO VAMOS ADICIONANDO PERSONA. SEM EMAIL ENCONTRADO')
                                            else:
                                                
                                                persona_data = {
                                                    "nome": nome,
                                                    "nascimento": "",
                                                    "rg": "",
                                                    "cpf": "",
                                                    "sexo": "",
                                                    "endereco":"",
                                                    "cep": "",
                                                    "estado": "",
                                                    "cidade": "",
                                                    "bairro": "",
                                                    "email": email,
                                                    "telefone": telefone,
                                                    "username": username,
                                                    "tag": tag,
                                                    "lead_id": lead_id 
                                                }
                                                
                                                self.add_persona(base_url, persona_data)
                                                self.add_convertido(base_url,lead_id)
                                            
                                            time.sleep(5)    
                                        else:
                                            
                                            print(lead['full_name']+' Telefone Inválido - INAPTO')
                                            self.add_inapto(base_url,lead_id)
                                           
                                    
                                else:
                                
                                    if self.higienizacao_telefone_instagram(telefone):
                                        print(f" ====== LEAD: {nome} - {tarefa['id']} ======")
                                        mk_cpf = self.mk_telefone(driver, telefone, nome)
                                        
                                        print(f"[!] Cpf Encontrado: {mk_cpf} \n")
                                        
                                        if mk_cpf != False:
                                            
                                            persona_data = self.mk_email(driver, mk_cpf,  telefone, username, lead_id, tag)
                                            
                                            if persona_data != False:
                                                print('[!] ADICIONANDO PERSONA.')
                                                
                                                self.add_persona(base_url, persona_data)
                                                print('Adicionando CONVERTIDO')
                                                self.add_convertido(base_url,lead_id)
                                                
                                            else:
                                                
                                                persona_data = {
                                                        "nome": nome,
                                                        "nascimento": "",
                                                        "rg": "",
                                                        "cpf": mk_cpf,
                                                        "sexo": "",
                                                        "endereco":"",
                                                        "cep": "",
                                                        "estado": "",
                                                        "cidade": "",
                                                        "bairro": "",
                                                        "email": email,
                                                        "telefone": telefone,
                                                        "username": username,
                                                        "tag": tag,
                                                        "lead_id": lead_id 
                                                }
                                                    
                                                self.add_persona(base_url, persona_data)
                                                self.add_convertido(base_url,lead_id)
                                                print('[!] NAO VAMOS ADICIONANDO PERSONA. SEM EMAIL ENCONTRADO')
                                        else:
                                            
                                            persona_data = {
                                                    "nome": nome,
                                                    "nascimento": "",
                                                    "rg": "",
                                                    "cpf": "",
                                                    "sexo": "",
                                                    "endereco":"",
                                                    "cep": "",
                                                    "estado": "",
                                                    "cidade": "",
                                                    "bairro": "",
                                                    "email": email,
                                                    "telefone": telefone,
                                                    "username": username,
                                                    "tag": tag,
                                                    "lead_id": lead_id 
                                            }
                                                
                                            self.add_persona(base_url, persona_data)
                                            self.add_convertido(base_url,lead_id)
                                        
                                        time.sleep(5)    
                                    else:
                                        
                                        print(lead['full_name']+' Telefone Inválido - INAPTO')
                                        self.add_inapto(base_url,lead_id)
                                       
                                            
                            except Exception as e:
                                print(f'EXCEPTION NO MK {e}')
                                winsound.Beep(1000, 1500)  
                                next = input('Aperte enter para continuar')
                                print(next)
                     
                        print(f'==== TAREFA CONCLUIDA  =========')   
                        winsound.Beep(1000, 1500)          
                        self.add_concluido(base_url, tarefa['id'])
                        next = input("Digita para continuar")
                                               
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
        
    def check_provedor(self, email):
        
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
                
                print('[*] Recaptcha encontrado')
                winsound.Beep(1000, 1500)  
                next = input('[!!!] Aperte enter depois do repatcha')
                print(next)
            else:
                print('[*] Recaptcha NÃO encontrado')
            # Verificando captcha
            
            time.sleep(3)

            # Botao para enviar e fazer a busca XPATH: 
            botao_pesquisar = driver.find_element(By.XPATH, '/html/body/div[2]/div[3]/div/div/div/div/div[2]/div[2]/div/div/center/div/button[1]')
            botao_pesquisar.click()
            
            time.sleep(13)
            
            # -------- resultado ----------
            
            elemento_resultado = driver.find_element(By.ID, "resultado")

            if "Nada encontrado" in elemento_resultado.text:
                print("[!] Nenhum resultado encontrado.")
                return False
            else:

                # Encontra todos os elementos de informação do telefone
                elementos_info_telefone = elemento_resultado.find_elements(By.XPATH, "//div[@id='api-data']")
                print(f"[!] Resultados encontrados: {len(elementos_info_telefone)}")
                
                # Loop sobre os elementos de informação do telefone
                for elemento_info in elementos_info_telefone:
                    # Extrai o nome e o CPF
                    nome_completo_mk = elemento_info.find_element(By.XPATH, ".//p[contains(., 'NOME:')]").text.split(":")[1].strip()
                    cpf = elemento_info.find_element(By.XPATH, ".//p[contains(., 'CPF:')]").text.split(":")[1].strip()

                    nome_completo_mk = self.higienizar_nome_mk(nome_completo_mk)

                    # Verifica se o primeiro nome corresponde ao nome fornecido
                    if primeiro_nome_instagram in nome_completo_mk:
                        print('[!] DEU MATCH  ')
                        print("Nome:", nome_completo_mk)
                        print("CPF:", cpf)
                        return cpf
                        
                    else:
                        print('[!] NÃO DEU MATCH ')
                        # Exibe o nome e o CPF
                        print("Nome:", nome_completo_mk)
                        print("CPF:", cpf)
                        
                return False

        except Exception as e:
            
            print(f'mk_telefone exception: {e}')
            next = input('continuar apert enteder')
            print(next)
       
    def mk_email(self, driver, cnpj, telefone, username, lead_id, tag ):    
    
		
        driver.get('https://mksearch.tech/dashboard/consulta/cpfreceita/')
        
        print(f'=================== [BUSCANDO E-MAILS: {cnpj}] ==============')
            
        time.sleep(3)
                    
        cnpj_input = driver.find_element(By.XPATH, '//*[@id="doc"]')
        cnpj_input.send_keys(cnpj)
            
        # Verificando captcha
        codigo_fonte = driver.page_source
        print('[!] Verificando Recaptcha')
            
        if "Adicione o reCAPTCHA aqui" in codigo_fonte:
                
            print('[*] Recaptcha encontrado')
            winsound.Beep(1000, 1500)  
            next = input('[!!!] Aperte enter depois do repatcha')
            print(next)
        else:
            print('[*] Recaptcha NÃO encontrado')
            # Verificando captcha
            
        time.sleep(3)

        # Botao para enviar e fazer a busca XPATH: 
        botao_pesquisar = driver.find_element(By.XPATH, '/html/body/div[2]/div[3]/div/div/div/div/div[2]/div[2]/div/div/center/div/button[1]')
        botao_pesquisar.click()
        
        time.sleep(10)
        
        # Resultado
        elemento_resultado = driver.find_element(By.ID, "resultado")

        if "Nada encontrado" in elemento_resultado.text:
            print("[!] Nenhum resultado encontrado.")
            return False
        else:
            
            tabela_contatos = driver.find_element(By.XPATH, "/html/body/div[2]/div[3]/div/div/div/div/div[3]/div/div/div/table")
            # tabela_contatos = '<table style="font-size: 18px; border-collapse: collapse;"><tbody><tr><th colspan="2" style="background-color: #ccc;"><i class="fas fa-address-book icon"></i>CONTATOS</th></tr><tr><td>Contatos ID:</td><td>13180026</td></tr><tr><td>CPF:</td><td>08805728764</td></tr><tr><td>Nome:</td><td>SABRINA LYRA NASCIMENTO DE SOUZA</td></tr><tr><td>Sexo:</td><td>F</td></tr><tr><td>Data de Nascimento:</td><td>1979-04-26 00:00:00</td></tr><tr><td>Nome da Mãe:</td><td>TANIA MARCIA LYRA NASCIMENTO</td></tr><tr><td>Nome do Pai:</td><td>Sem informação</td></tr><tr><td>Cadastro ID:</td><td>3974</td></tr><tr><td>Estado Civil:</td><td>Sem informação</td></tr><tr><td>RG:</td><td>Sem informação</td></tr><tr><td>Nacionalidade:</td><td>Sem informação</td></tr><tr><td>Contatos ID do Cônjuge:</td><td>Sem informação</td></tr><tr><td>Sócio:</td><td>False</td></tr><tr><td>Situação Cadastral:</td><td>2</td></tr><tr><td>Data Situação Cadastral:</td><td>2019-02-06 00:00:00</td></tr><tr><td>Data Informação:</td><td>Sem informação</td></tr><tr><td>CBO:</td><td>252105</td></tr><tr><td>Órgão Emissor:</td><td>Sem informação</td></tr><tr><td>UF Emissão:</td><td>Sem informação</td></tr><tr><td>Data OB:</td><td>Sem informação</td></tr><tr><td>CD Mosaic:</td><td>F18</td></tr><tr><td>Renda:</td><td>1046,59</td></tr><tr><td>Faixa de Renda ID:</td><td>2</td></tr><tr><td>Título Eleitor:</td><td>Sem informação</td></tr><tr><td>CD Mosaic Novo:</td><td>G24</td></tr><tr><td>CD Mosaic Secundário:</td><td>H27</td></tr><tr><th colspan="2" style="background-color: #ccc;"><i class="fas fa-envelope icon"></i>E-MAIL</th></tr><tr><td>Contatos ID:</td><td>13180026</td></tr><tr><td>E-mail:</td><td>sabrinalyra.nasc@gmail.com</td></tr><tr><td>Prioridade:</td><td>1</td></tr><tr><td>Score:</td><td>OTIMO</td></tr><tr><td>E-mail Pessoal:</td><td>S</td></tr><tr><td>E-mail Duplicado:</td><td>N</td></tr><tr><td>Blacklist:</td><td>N</td></tr><tr><td>Estrutura:</td><td>VALIDA</td></tr><tr><td>Status VT:</td><td>CONFIRMADO</td></tr><tr><td>Domínio:</td><td>PUBLICO</td></tr><tr><td>Mapas:</td><td>3</td></tr><tr><td>Peso:</td><td>5</td></tr><tr><td>Cadastro ID:</td><td>3988</td></tr><tr><td>Data de Inclusão:</td><td>2018-03-28 15:18:30.870000000</td></tr><tr><td>Contatos ID:</td><td>13180026</td></tr><tr><td>E-mail:</td><td>sabrina.lyra@r7.com</td></tr><tr><td>Prioridade:</td><td>2</td></tr><tr><td>Score:</td><td>OTIMO</td></tr><tr><td>E-mail Pessoal:</td><td>S</td></tr><tr><td>E-mail Duplicado:</td><td>N</td></tr><tr><td>Blacklist:</td><td>N</td></tr><tr><td>Estrutura:</td><td>VALIDA</td></tr><tr><td>Status VT:</td><td>SEM EVIDENCIA</td></tr><tr><td>Domínio:</td><td>PUBLICO</td></tr><tr><td>Mapas:</td><td>3</td></tr><tr><td>Peso:</td><td>6</td></tr><tr><td>Cadastro ID:</td><td>3925</td></tr><tr><td>Data de Inclusão:</td><td>2016-06-02 17:06:07.310000000</td></tr><tr><td>Contatos ID:</td><td>13180026</td></tr><tr><td>E-mail:</td><td>sheillapopstar@hotmail.com</td></tr><tr><td>Prioridade:</td><td>3</td></tr><tr><td>Score:</td><td>BOM</td></tr><tr><td>E-mail Pessoal:</td><td>N</td></tr><tr><td>E-mail Duplicado:</td><td>N</td></tr><tr><td>Blacklist:</td><td>N</td></tr><tr><td>Estrutura:</td><td>VALIDA</td></tr><tr><td>Status VT:</td><td>SEM EVIDENCIA</td></tr><tr><td>Domínio:</td><td>PUBLICO</td></tr><tr><td>Mapas:</td><td>3</td></tr><tr><td>Peso:</td><td>12</td></tr><tr><td>Cadastro ID:</td><td>3922</td></tr><tr><td>Data de Inclusão:</td><td>2016-05-06 16:27:29.653000000</td></tr><tr><td>Contatos ID:</td><td>13180026</td></tr><tr><td>E-mail:</td><td>afo@floripa.com.br</td></tr><tr><td>Prioridade:</td><td>4</td></tr><tr><td>Score:</td><td>POTENCIALMENTE BOM</td></tr><tr><td>E-mail Pessoal:</td><td>N</td></tr><tr><td>E-mail Duplicado:</td><td>N</td></tr><tr><td>Blacklist:</td><td>N</td></tr><tr><td>Estrutura:</td><td>VALIDA</td></tr><tr><td>Status VT:</td><td>SEM EVIDENCIA</td></tr><tr><td>Domínio:</td><td>DESCONHECIDO</td></tr><tr><td>Mapas:</td><td>1</td></tr><tr><td>Peso:</td><td>60</td></tr><tr><td>Cadastro ID:</td><td>3868</td></tr><tr><td>Data de Inclusão:</td><td>2014-11-14 16:22:00</td></tr><tr><th colspan="2" style="background-color: #ccc;"><i class="fas fa-map-marker-alt icon"></i>ENDEREÇOS</th></tr><tr><td>Contatos ID:</td><td>13180026</td></tr><tr><td>Tipo de Logradouro:</td><td>AV</td></tr><tr><td>Logradouro:</td><td>COLARES JUNIOR</td></tr><tr><td>Número:</td><td>931</td></tr><tr><td>Complemento:</td><td>C</td></tr><tr><td>Bairro:</td><td>VL NOVA DE COLARES</td></tr><tr><td>Cidade:</td><td>SERRA</td></tr><tr><td>UF:</td><td>ES</td></tr><tr><td>CEP:</td><td>29172810</td></tr><tr><td>Data de Atualização:</td><td>2019-10-21 10:12:26.067</td></tr><tr><td>Data de Inclusão:</td><td>2015-03-20 17:07:58.443</td></tr><tr><td>Tipo de Endereço ID:</td><td>1</td></tr><tr><td>Contatos ID:</td><td>13180026</td></tr><tr><td>Tipo de Logradouro:</td><td>R</td></tr><tr><td>Logradouro:</td><td>DAS PALMEIRAS</td></tr><tr><td>Número:</td><td>14</td></tr><tr><td>Complemento:</td><td>Sem informação</td></tr><tr><td>Bairro:</td><td>FEU ROSA</td></tr><tr><td>Cidade:</td><td>SERRA</td></tr><tr><td>UF:</td><td>ES</td></tr><tr><td>CEP:</td><td>29172170</td></tr><tr><td>Data de Atualização:</td><td>2016-08-11 10:51:06.487</td></tr><tr><td>Data de Inclusão:</td><td>2013-07-29 11:21:18.953</td></tr><tr><td>Tipo de Endereço ID:</td><td>2</td></tr><tr><td>Contatos ID:</td><td>13180026</td></tr><tr><td>Tipo de Logradouro:</td><td>AV</td></tr><tr><td>Logradouro:</td><td>COLARES JUNIOR</td></tr><tr><td>Número:</td><td>931</td></tr><tr><td>Complemento:</td><td>Sem informação</td></tr><tr><td>Bairro:</td><td>VL NOVA DE COLARES</td></tr><tr><td>Cidade:</td><td>SERRA</td></tr><tr><td>UF:</td><td>ES</td></tr><tr><td>CEP:</td><td>29172810</td></tr><tr><td>Data de Atualização:</td><td>NULL</td></tr><tr><td>Data de Inclusão:</td><td>2018-12-17 10:12:30.510</td></tr><tr><td>Tipo de Endereço ID:</td><td>1</td></tr><tr><td>Contatos ID:</td><td>13180026</td></tr><tr><td>Tipo de Logradouro:</td><td>AV</td></tr><tr><td>Logradouro:</td><td>COLARES JUNIOR</td></tr><tr><td>Número:</td><td>931</td></tr><tr><td>Complemento:</td><td>C PX C CHA</td></tr><tr><td>Bairro:</td><td>VL NOVA DE COLARES</td></tr><tr><td>Cidade:</td><td>SERRA</td></tr><tr><td>UF:</td><td>ES</td></tr><tr><td>CEP:</td><td>29172810</td></tr><tr><td>Data de Atualização:</td><td>NULL</td></tr><tr><td>Data de Inclusão:</td><td>2018-02-19 14:45:57.493</td></tr><tr><td>Tipo de Endereço ID:</td><td>1</td></tr><tr><td>Contatos ID:</td><td>13180026</td></tr><tr><td>Tipo de Logradouro:</td><td>AV</td></tr><tr><td>Logradouro:</td><td>COLARES JUNIOR</td></tr><tr><td>Número:</td><td>163</td></tr><tr><td>Complemento:</td><td>Sem informação</td></tr><tr><td>Bairro:</td><td>VL NOVA DE COLARES</td></tr><tr><td>Cidade:</td><td>SERRA</td></tr><tr><td>UF:</td><td>ES</td></tr><tr><td>CEP:</td><td>29172810</td></tr><tr><td>Data de Atualização:</td><td>NULL</td></tr><tr><td>Data de Inclusão:</td><td>2014-08-10 05:35:23.433</td></tr><tr><td>Tipo de Endereço ID:</td><td>1</td></tr><tr><th colspan="2" style="background-color: #ccc;"><i class="fas fa-phone icon"></i>HISTÓRICO DE TELEFONES</th></tr><tr><td>Contatos ID:</td><td>13180026</td></tr><tr><td>DDD:</td><td>27</td></tr><tr><td>Número de Telefone:</td><td>988175503</td></tr><tr><td>Tipo de Telefone:</td><td>3</td></tr><tr><td>Data de Inclusão:</td><td>2009-12-15 18:27:00</td></tr><tr><td>Data de Informação:</td><td>Sem informação</td></tr><tr><td>Sigilo:</td><td>Sem informação</td></tr><tr><td>NSU:</td><td>Sem informação</td></tr><tr><td>Classificação:</td><td>D</td></tr><tr><td>Contatos ID:</td><td>13180026</td></tr><tr><td>DDD:</td><td>27</td></tr><tr><td>Número de Telefone:</td><td>32520487</td></tr><tr><td>Tipo de Telefone:</td><td>1</td></tr><tr><td>Data de Inclusão:</td><td>2012-05-05 01:00:00</td></tr><tr><td>Data de Informação:</td><td>2011-08-23 00:00:00</td></tr><tr><td>Sigilo:</td><td>Sem informação</td></tr><tr><td>NSU:</td><td>000000536940630</td></tr><tr><td>Classificação:</td><td>A0</td></tr><tr><td>Contatos ID:</td><td>13180026</td></tr><tr><td>DDD:</td><td>27</td></tr><tr><td>Número de Telefone:</td><td>992251183</td></tr><tr><td>Tipo de Telefone:</td><td>3</td></tr><tr><td>Data de Inclusão:</td><td>2013-07-18 16:50:00</td></tr><tr><td>Data de Informação:</td><td>Sem informação</td></tr><tr><td>Sigilo:</td><td>Sem informação</td></tr><tr><td>NSU:</td><td>Sem informação</td></tr><tr><td>Classificação:</td><td>A0</td></tr><tr><td>Contatos ID:</td><td>13180026</td></tr><tr><td>DDD:</td><td>27</td></tr><tr><td>Número de Telefone:</td><td>991395521</td></tr><tr><td>Tipo de Telefone:</td><td>3</td></tr><tr><td>Data de Inclusão:</td><td>2016-09-23 14:11:00</td></tr><tr><td>Data de Informação:</td><td>Sem informação</td></tr><tr><td>Sigilo:</td><td>Sem informação</td></tr><tr><td>NSU:</td><td>Sem informação</td></tr><tr><td>Classificação:</td><td>D</td></tr><tr><td>Contatos ID:</td><td>13180026</td></tr><tr><td>DDD:</td><td>27</td></tr><tr><td>Número de Telefone:</td><td>988179418</td></tr><tr><td>Tipo de Telefone:</td><td>3</td></tr><tr><td>Data de Inclusão:</td><td>2018-02-01 03:38:00</td></tr><tr><td>Data de Informação:</td><td>Sem informação</td></tr><tr><td>Sigilo:</td><td>Sem informação</td></tr><tr><td>NSU:</td><td>Sem informação</td></tr><tr><td>Classificação:</td><td>D</td></tr><tr><th colspan="2" style="background-color: #ccc;"><i class="fas fa-chart-bar icon"></i>MODELOS ANALYTICS SCORE</th></tr><tr><td>Contatos ID:</td><td>13180026</td></tr><tr><td>CSB8:</td><td>331</td></tr><tr><td>Faixa do CSB8:</td><td>MEDIO</td></tr><tr><td>CSBA:</td><td>349</td></tr><tr><td>Faixa do CSBA:</td><td>ALTO</td></tr><tr><th colspan="2" style="background-color: #ccc;"><i class="fas fa-money-bill-wave icon"></i>PODER AQUISITIVO</th></tr><tr><td>Código do Poder Aquisitivo:</td><td>3</td></tr><tr><td>Poder Aquisitivo:</td><td>MEDIO BAIXO</td></tr><tr><td>Renda do Poder Aquisitivo:</td><td>1046,5948867912862</td></tr><tr><td>Faixa do Poder Aquisitivo:</td><td>De R$ 1018 at� R$ 1630</td></tr><tr><th colspan="2" style="background-color: #ccc;"><i class="fas fa-info-circle icon"></i>OUTRAS INFORMAÇÕES</th></tr><tr><td>Profissão:</td><td>Sem informação</td></tr><tr><td colspan="2">Sem informação de PIS</td></tr><tr><td colspan="2"> - Sem informação de Título Eleitor (TSE)</td></tr><tr><td>Universitário:</td><td>Sem informação</td></tr><tr><th colspan="2" style="background-color: #ccc;"><i class="fas fa-users icon"></i>MAPA DE PARENTES</th></tr><tr><td>CPF Completo:</td><td>08805728764</td></tr><tr><td>Nome:</td><td>SABRINA LYRA NASCIMENTO DE SOUZA</td></tr><tr><td>CPF de Vínculo:</td><td>81509634720</td></tr><tr><td>Nome de Vínculo:</td><td>WALDINA LYRA DA SILVA</td></tr><tr><td>Vínculo:</td><td>AVO</td></tr><tr><td>CPF Completo:</td><td>08805728764</td></tr><tr><td>Nome:</td><td>SABRINA LYRA NASCIMENTO DE SOUZA</td></tr><tr><td>CPF de Vínculo:</td><td>10676194702</td></tr><tr><td>Nome de Vínculo:</td><td>RAPHAEL LYRA NASCIMENTO</td></tr><tr><td>Vínculo:</td><td>IRMA(O)</td></tr><tr><td>CPF Completo:</td><td>08805728764</td></tr><tr><td>Nome:</td><td>SABRINA LYRA NASCIMENTO DE SOUZA</td></tr><tr><td>CPF de Vínculo:</td><td>04226899717</td></tr><tr><td>Nome de Vínculo:</td><td>TANIA MARCIA LYRA NASCIMENTO</td></tr><tr><td>Vínculo:</td><td>MAE</td></tr><tr><td>CPF Completo:</td><td>08805728764</td></tr><tr><td>Nome:</td><td>SABRINA LYRA NASCIMENTO DE SOUZA</td></tr><tr><td>CPF de Vínculo:</td><td>09116553799</td></tr><tr><td>Nome de Vínculo:</td><td>RICARDO LYRA NASCIMENTO</td></tr><tr><td>Vínculo:</td><td>IRMA(O)</td></tr><tr><th colspan="2" style="background-color: #ccc;"><i class="fas fa-file-alt icon"></i>IRPF</th></tr><tr><td>Documento:</td><td>08805728764</td></tr><tr><td>Instituição Bancária:</td><td>Sem informação</td></tr><tr><td>Código da Agência:</td><td>Sem informação</td></tr><tr><td>Lote:</td><td>Sem informação</td></tr><tr><td>Ano de Referência:</td><td>2014</td></tr><tr><td>Data do Lote:</td><td>Sem informação</td></tr><tr><td>Situação na Receita Federal:</td><td>SALDO INEXISTENTE DE IMPOSTO A PAGAR OU A RESTITUIR </td></tr><tr><td>Data da Consulta:</td><td>Sem informação</td></tr></tbody></table>'
            # Inicialize as variáveis para armazenar os dados
            dados_contato = {}
            emails = []

            # Itere sobre as linhas da tabela
            linhas = tabela_contatos.find_elements(By.TAG_NAME, "tr")
            for linha in linhas:
                
               
                colunas = linha.find_elements(By.TAG_NAME, "td")
               

                # Verifique se a linha tem duas colunas
                if len(colunas) == 2:
                    # Armazene os dados na variável dados_contato
                    chave = colunas[0].text.replace(":", "").strip()
                    valor = colunas[1].text.strip()
                    # print(f'{chave} : {valor}')
                    dados_contato[chave] = valor
                    

                    # Capture os e-mails e os filtre conforme as condições fornecidas
                    if chave == "E-mail":
                        emails.append(valor)

            # Filtre os e-mails
            email_mk = ""
       

            for email in emails:
                if "gmail.com" in email:
                    email_mk = email
                    break
                elif "hotmail.com" in email:
                    email_mk = email
                    break
                elif "outlook.com" in email:
                    email_mk = email
                    break

            # Monte o objeto com os dados
            objeto_resultado = {
                "nome": dados_contato.get("Nome", ""),
                "nascimento": dados_contato.get("Data de Nascimento", ""),
                "rg": dados_contato.get("RG", ""),
                
                "cpf": dados_contato.get("CPF", ""),

                "sexo": dados_contato.get("Sexo", ""),

				"endereco": dados_contato.get("Logradouro", ""),
    
                "cep": dados_contato.get("CEP", ""),
                "estado": dados_contato.get("UF", ""),
                
                "cidade": dados_contato.get("Cidade", ""),

                "bairro": dados_contato.get("Bairro", ""),
                "email": email_mk,
                "telefone": telefone,
                "username": username,
                "tag": tag,
                "lead_id": lead_id 
            }
            
            
            
            if len(email_mk) >0 :
                
                print(objeto_resultado)

                
                print(f'[!] Email encontrado: {email_mk}')
                
                
                return objeto_resultado
            
            else:
                
                print(f'[!] Email NÃO encontrado: {email_mk}')
                return False
                
    def higienizar_nome_instagram(self, nome_completo):
        # print('higienizado instagram: '+nome_completo)
                                                                                                                                                             
        primeiro_nome = nome_completo.split()[0]
        # Remove caracteres especiais e deixa apenas letras e espaços
        primeiro_nome_limpo = re.sub(r'[^a-zA-Z\s]', '', primeiro_nome)
        # print('higienizado instagram: '+unidecode(primeiro_nome.lower()))
        return unidecode(primeiro_nome_limpo.lower())
    
    def higienizar_nome_mk(self, nome_completo):
        
        # Remove caracteres especiais e deixa apenas letras e espaços
        nome_completo = re.sub(r'[^a-zA-Z\s]', '', nome_completo)
        # print('higienizado mk: '+unidecode(nome_completo.lower()))
        return unidecode(nome_completo.lower())
    
    def higienizacao_telefone_instagram(self, telefone):
        # Verifica se o número começa com "55" e possui 13 dígitos
        if len(telefone) == 13 and telefone[:2] == "55" and telefone.isdigit():
            return True
        else:
            return False

    def add_persona(self, base_url,  person_data):
        
        url = base_url+"/add_person"
        
        response = requests.post(url, json=person_data)


        if response.status_code == 200:
            
            print("Requisição add_person bem-sucedida!")
            data = response.content
            
            print('\n ============= INICIO RESPOSTA ADD PERSONA ============= \n')
            print(data)
            print('\n ============= FIM RESPOSTA ADD PERSONA ============= \n')
            
            

            
            return data
        
        else:
            print("Erro na requisição add_person :", response.status_code)
            return False  
       
    def add_convertido(self, base_url, lead_id):
        
        url = base_url+"/add_convertido?lead_id="+lead_id
        
        response = requests.get(url)


        if response.status_code == 200:
            
            print("Requisição add_convertido bem-sucedida!")
            data = response.content
            
            print('\n ============= INICIO RESPOSTA ADD CONVERTIDO ============= \n')
            print(data)
            print('\n ============= FIM RESPOSTA ADD CONVERTIDO ============= \n')
            
            

            
            return data
        
        else:
            print("Erro na requisição add_convertido :", response.status_code)
            return False 
        
    def add_inapto(self,  base_url, lead_id):
        
        url = base_url+"/add_inapto?lead_id="+lead_id
        
        response = requests.get(url)


        if response.status_code == 200:
            
            print("Requisição add_inapto bem-sucedida!")
            data = response.content
            
            print('\n ============= INICIO RESPOSTA ADD INAPTO ============= \n')
            print(data)
            print('\n ============= FIM RESPOSTA ADD INAPTO ============= \n')
            
        
            return data
        
        else:
            print("Erro na requisição add_inapto :", response.status_code)
            return False 
    
    def add_concluido(self,  base_url, tarefa_id):
        
        url = base_url+"/add_concluido?tarefa_id="+tarefa_id
        
        response = requests.get(url)


        if response.status_code == 200:
            
            print("Requisição add_concluido bem-sucedida!")
            data = response.content
            
            print('\n ============= INICIO RESPOSTA ADD CONCLUIDO ============= \n')
            print(data)
            print('\n ============= FIM RESPOSTA ADD CONCLUIDO ============= \n')
            
        
            return data
        
        else:
            print("Erro na requisição add_concluido :", response.status_code)
            return False 
        
Mk()