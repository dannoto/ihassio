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
import winsound

from bs4 import BeautifulSoup

# Tório

class Scraper:

    def __init__(self):
        
        

        headers = {
            'Accept': '*/*',
            'Accept-Encoding': 'gzip, deflate, br',
            'Accept-Language': 'pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7',
            'Cookie': 'mid=Za3bsQALAAHLYNzBTZb261Ix_FGu; ig_did=4BEF3526-6852-49ED-90EA-D3ECB83AFB02; datr=sdutZWNkTufTIFoebxODGU3d; ps_n=0; ps_l=0; ig_nrcb=1; csrftoken=rX3pA46Rn8fwBHijfIjfAfplAvqooySR; ds_user_id=64756447548; sessionid=64756447548%3AnCfIMdGoCsbgRX%3A0%3AAYcHZ8DUSqB2i1PfjYOGbTY19WcQlZtDo3xLwawKGA; rur="VLL\05464756447548\0541740770008:01f77445f6b18a090dcfe515202c5ee4455995cffdec9a61ecef9195c847a0df4643903e"',
            'Dpr': '1',
            'Referer': 'https://www.instagram.com/p/C07F4jjrEy2/?img_index=1',
            'Sec-Ch-Prefers-Color-Scheme': 'light',
            'Sec-Ch-Ua': '"Opera";v="105", "Chromium";v="119", "Not?A_Brand";v="24"',
            'Sec-Ch-Ua-Full-Version-List': '"Opera";v="105.0.4970.60", "Chromium";v="119.0.6045.199", "Not?A_Brand";v="24.0.0.0"',
            'Sec-Ch-Ua-Mobile': '?0',
            'Sec-Ch-Ua-Model': '""',
            'Sec-Ch-Ua-Platform': '"Windows"',
            'Sec-Ch-Ua-Platform-Version': '"10.0.0"',
            'Sec-Fetch-Dest': 'empty',
            'Sec-Fetch-Mode': 'cors',
            'Sec-Fetch-Site': 'same-origin',
            'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36 OPR/105.0.0.0',
            'Viewport-Width': '1312',
            'X-Asbd-Id': '129477',
            'X-Csrftoken': 'rX3pA46Rn8fwBHijfIjfAfplAvqooySR',
            'X-Ig-App-Id': '936619743392459',
            'X-Ig-Www-Claim': 'hmac.AR2kovJ4-DcOAF0d43NiUcqAx69DUcqPe2rRZLMjoHsdi9v6',
            'X-Requested-With': 'XMLHttpRequest'
        }

        base_url = "https://ccoanalitica.com/hassio/instaapi/"
        
        self.header_data = self.get_headers(base_url)
        # self.header_count = len(self.header_data)
        # print(self.header_data)
        # self.header_current = 0
        
        
        # headers = self.header_data[self.header_current]
        
        # self.getUserProfile(headers, "realdanielribeiro")
        
      
        # while True:
   
        #     tarefas =  self.getTarefasAtivas(base_url) 
            
        #     try:
            
        #         if len(tarefas) > 0 :    

        #             for tarefa in tarefas:
                        
        #                 if (tarefa['tarefa_tipo'] == "post"):
                            
        #                     print('\n [!] Iniciando tarefa tipo: '+tarefa['tarefa_tipo'])
                            
        #                     self.updateTarefaStatus(base_url, tarefa['id'], 2)  # Stautus Processando
                            
        #                     # Extraindo Informaçoes
        #                     self.extractFromPost( headers, base_url,  tarefa['tarefa_url'], tarefa['id'], tarefa['tarefa_tag'])
                            
        #                     self.updateTarefaStatus(base_url, tarefa['id'], 3)  # Stautus Finalizado

                    
        #                 elif (tarefa['tarefa_tipo'] == "feed"):
                            
        #                     print('[!] Iniciando tarefa tipo: '+tarefa['tarefa_tipo'])
                            
        #                     self.updateTarefaStatus(base_url, tarefa['id'], 2)  # Stautus Processando
                            
        #                     username = self.extrair_username_url(tarefa['tarefa_url'])
        #                     print(username)
                            
        #                     self.extractFromFeed(headers, username, base_url, tarefa['id'], tarefa['tarefa_tag'])
                            
        #                     self.updateTarefaStatus(base_url, tarefa['id'], 3)  # Stautus Finalizado

                        
        #                 # elif (tarefa['tarefa_tipo'] == "tag"):
        #                 #     print('[!] Iniciando tarefa tipo: '+tarefa['tarefa_tipo'])
                            
        #                 #     self.updateTarefaStatus(base_url, tarefa['id'], 2)  # Stautus Processando
                            
        #                 #     # self.extractFromPost( headers, tarefa['tarefa_url'] )
                            
        #                 #     self.updateTarefaStatus(base_url, tarefa['id'], 3)  # Stautus Finalizado

                            
        #                 # elif (tarefa['tarefa_tipo'] == "location"):
                            
        #                 #     print('[!] Iniciando tarefa tipo: '+tarefa['tarefa_tipo'])
                            
        #                 #     self.updateTarefaStatus(base_url, tarefa['id'], 2)  # Stautus Processando
                            
        #                 #     # self.extractFromPost( headers, tarefa['tarefa_url'] )
                            
        #                 #     self.updateTarefaStatus(base_url, tarefa['id'], 3)  # Stautus Finalizado
        #         else:
                    
        #             print('\n [!] Nenhnuma tarefa ativa. ')
        #             time.sleep(5)
                    
        #     except Exception as e:
        #         print('\n [!] Erro no while - TROQUE A HEADER.')
        #         print(e)
        #         next = input('Digite enter para coontinuar: ')
        #         print(next)
                    
    def get_headers(self, base_url):
        
        # print('[!] Mudando status para Processando: '+str(tarefa_id)+'')
        
        url = base_url+"/get_headers"
        
        response = requests.get(url)

        if response.status_code == 200:
            
            # print("Requisição updateTarefaStatus bem-sucedida!")
            data = json.loads(response.content)
            print(data)
        
            return data
        
        else:
            # print("Erro na requisição updateTarefaStatus:", response.status_code)
            return False   
        
    def updateTarefaStatus(self, base_url, tarefa_id, tarefa_status):
        
        # print('[!] Mudando status para Processando: '+str(tarefa_id)+'')
        
        url = base_url+"/update_tarefa_status?tarefa_id="+str(tarefa_id)+"&tarefa_status="+str(tarefa_status)+" "
        
        response = requests.get(url)

        if response.status_code == 200:
            
            # print("Requisição updateTarefaStatus bem-sucedida!")
            data = json.loads(response.content)
        
            return data
        
        else:
            # print("Erro na requisição updateTarefaStatus:", response.status_code)
            return False   
        
    def getTarefasAtivas(self, base_url):
        
        
        url = base_url+"/get_tarefas_ativas"
        
        response = requests.get(url)

        if response.status_code == 200:
            
            # print("Requisição getTarefasAtivas bem-sucedida!")
            data = json.loads(response.content)
        
            return data
        
        else:
            # print("Erro na requisição getTarefasAtivas:", response.status_code)
            return False   
               
    def addInstaLeadDemanda(self, base_url, demanda):
                
        url = base_url + "add_instalead_demanda"
        # print(url)
        data = {
            'tarefa_id': demanda['tarefa_id'],
            'tag_id': demanda['tag_id'],
            'username': demanda['username'],
            'full_name': demanda['full_name'],
            'interacao_tipo': demanda['interacao_tipo'],
            'interacao_conteudo': demanda['interacao_conteudo'],
            'interacao_data': demanda['interacao_data'],
            'post_id': demanda['post_id'],
            'post_slug': demanda['post_slug'],
            'post_data': demanda['post_data'],
            'post_descricao': demanda['post_descricao'],
            'post_imagem': demanda['post_imagem']
        }
        # print(data)

        response = requests.post(url, data=data)

        if response.status_code == 200:
            print("Requisição updateTarefaStatus bem-sucedida!")
            response_data = json.loads(response.content)
            
            # print(response_data)
            return response_data
        else:
            print("Erro na requisição updateTarefaStatus:", response.status_code)
            return False  

    def addInstaLead(self, base_url, persona):
                
        url = base_url + "add_instalead"
        # print(persona['username'])
        data = {
            'tarefa_id': persona['tarefa_id'],
            'tag_id': persona['tag_id'],
            'username': persona['username'],
            'full_name': persona['full_name'],
            'is_private': persona['is_private'],
            'biografia': persona['biografia'],
            'links': persona['links'],
            'mencoes': persona['mencoes'],
            'categoria': persona['categoria'],
            'email': persona['email'],
            'telefone': persona['telefone'],
            'convertido	': 0
        }
        # print(data)

        response = requests.post(url, data=data)

        if response.status_code == 200:
            # print("Requisição updateTarefaStatus bem-sucedida!")
            response_data = json.loads(response.content)
            
            # print(response_data)
            return response_data
        else:
            # print("Erro na requisição updateTarefaStatus:", response.status_code)
            return False  

    def timeStampToDateTime(self, timestamp):
        # Converter o timestamp para um objeto de data e hora
        data_hora = datetime.datetime.fromtimestamp(timestamp)

        # Imprimir a data e hora no formato desejado (por exemplo, AAAA-MM-DD HH:MM:SS)
        formato_desejado = "%Y-%m-%d %H:%M:%S"
        data_hora_formatada = data_hora.strftime(formato_desejado)

        # print("Timestamp:", timestamp)
        # print("Data e Hora:", data_hora_formatada)    
        
        return data_hora_formatada
    
    def getURLPostSlug(self, url):
        # Extrai a slu
        parsed_url = urlparse(url)
        path = parsed_url.path
        print('path '+path)
        return path
        
    def getPostId(self, headers, url):
        
        
        url_extracted = self.getURLPostSlug(url)
        
        params={'route_urls[0]': url_extracted, }
        
       
        response = requests.get(url, data=params, headers=headers)

        if response.status_code == 200:
            
       
            
            pattern = r'"media_id":"(\d+)"'
            match = re.search(pattern, response.content.decode('utf-8'))

            if match:
                media_id = match.group(1)  # Obtendo o valor do media_id capturado pelo grupo (\d+)
                print("[!] Media ID encontrado:", media_id)
                return media_id
            else:
                print("[?] Nenhuma correspondência para media_id encontrada.")
                return False
            

        else:
            print("[!] Erro na requisição getPostId:", response.status_code)
            return False
    
    def getPost(self, headers, post_id):
        
        url = 'https://www.instagram.com/api/v1/media/'+post_id+'/info/'
        
        response = requests.get(url, headers=headers)

        if response.status_code == 200:
            
            print("Requisição getPost bem-sucedida!")
            data = json.loads(response.content)
            
            # print(data['items'][0]['created_at_utc'])
            
            return data['items'][0]
        
        else:
            print("Erro na requisição getPost:", response.status_code)
            return False   
        
    def getComments(self, headers, media_id):
        
        url = 'https://www.instagram.com/api/v1/media/'+media_id+'/comments/'
        response = requests.get(url, headers=headers)

        if response.status_code == 200:
            print("Requisição getComments bem-sucedida!")
            data = json.loads(response.content)
            return data
        else:
            print("Erro na requisição getComments:", response.status_code)
            return False
        
    def getLikes(self, headers, media_id):
        # {
        #     "pk": "18191452135304158",
        #     "user_id": "485182985",
        #     "type": 0,
        #     "did_report_as_spam": false,
        #     "created_at": 1702757367,
        #     "created_at_utc": 1702757367,
        #     "content_type": "comment",
        #     "status": "Active",
        #     "bit_flags": 0,
        #     "share_enabled": false,
        #     "is_ranked_comment": false,
        #     "media_id": "3259224632035396790",
        #     "user": {
        #         "pk": "485182985",
        #         "pk_id": "485182985",
        #         "username": "shennysesilva",
        #         "full_name": "Shennyse Silva",
        #         "is_private": true,
        #         "strong_id__": "485182985",
        #         "fbid_v2": "17841401889557580",
        #         "is_verified": false,
        #         "profile_pic_id": "3268832239004609667_485182985",
        #         "profile_pic_url": "https://instagram.fgyn11-1.fna.fbcdn.net/v/t51.2885-19/413289070_7389228837767375_1666387982918105989_n.jpg?stp=dst-jpg_s150x150\\u0026_nc_ht=instagram.fgyn11-1.fna.fbcdn.net\\u0026_nc_cat=111\\u0026_nc_ohc=9c8gP586kR0AX-zkAa1\\u0026edm=AId3EpQBAAAA\\u0026ccb=7-5\\u0026oh=00_AfB0USQf_uDc0h2BU_4EFTUjg--lr5jlRzkb6rGJqWNvfw\\u0026oe=659AA2D6\\u0026_nc_sid=f5838a",
        #         "is_mentionable": true,
        #         "latest_reel_media": 0,
        #         "latest_besties_reel_media": 0
        #     },
        #     "text":"Parab\xc3\xa9ns!!! Sucesso, Carl\xc3\xa3o!\xf0\x9f\x91\x8f",
        #     "is_covered": false,
        #     "inline_composer_display_condition": "never",
        #     "has_liked_comment": false,
        #     "comment_like_count": 1,
        #     "preview_child_comments": [],
        #     "other_preview_users": [],
        #     "private_reply_status": 0,
        #     "has_translation": true
        # }
        url = 'https://www.instagram.com/api/v1/media/'+media_id+'/likers/'
        response = requests.get(url, headers=headers)

        if response.status_code == 200:
            print("Requisição getLikes bem-sucedida!")
            data = json.loads(response.content)

            return data
        else:
            print("Erro na requisição getLikes:", response.status_code)
            return False
    
    def extrair_username_url(self, url):
        
        parsed_url = urlparse(url)
        path = parsed_url.path.rstrip('/')  # Remove a barra final, se houver
        username = path.rsplit('/', 1)[-1]  # Obtém o último segmento da URL
        return username

        
    def getUserProfileManually(self, headers, username, driver):  
        
        try:
            
            driver.get("https://www.instagram.com/"+username)
            driver.execute_cdp_cmd("Network.setExtraHTTPHeaders", {"headers": headers})

            atraso = random.uniform(5, 25)
            time.sleep(atraso)
            
            # Nome
            nome = ""
            categoria = ""
            biografia = ""
            links = ""
            
            try:
                nome =  driver.find_element(By.XPATH, "/html/body/div[2]/div/div/div[2]/div/div/div[1]/div[2]/section/main/div/header/section/div[3]/div[1]/span").text
            except Exception as e:
                print('Erro: ', e)
                
            try:
                categoria =  driver.find_element(By.XPATH, "/html/body/div[2]/div/div/div[2]/div/div/div[1]/div[2]/section/main/div/header/section/div[3]/div[3]/div").text
            except Exception as e:
                print('Erro: ', e)
                
            try:
                biografia =  driver.find_element(By.XPATH, "/html/body/div[2]/div/div/div[2]/div/div/div[1]/div[2]/section/main/div/header/section/div[3]/h1").text
            except Exception as e:
                print('Erro: ', e)
                
            try:
                links =  driver.find_elements(By.XPATH, "/html/body/div[2]/div/div/div[2]/div/div/div[1]/div[2]/section/main/div/header/section/div[3]/div[4]/a")
            except Exception as e:
                print('Erro: ', e)
            
            print("\n\nNome: ", nome)
            print("Categoria: ", categoria)
            print("Biografia: ", biografia)
            
            for link in links:
                print(link.get_attribute("href"))


        except Exception as e:
            print('Erro: ', e)
        
    def getUserProfile(self, headers, username):   
  

        url = 'https://www.instagram.com/api/v1/users/web_profile_info/?username='+username
        
        atraso = random.uniform(10, 30)
        time.sleep(atraso)
        # time.sleep(10)
        
        response = requests.get(url, headers=headers)
        
        try:
            
            print(f'currente header: {self.header_current}')
            self.header_current = 32

            if response.status_code == 200:

                data = json.loads(response.content)
                # print(data['data']['user']['username'])
                return data
            
            else:
                
                # atraso = random.uniform(600, 1200)
                # print('[!!] Erro de Requisicao, aguardando: '+str(atraso)+' minutos.')
                # time.sleep(atraso)
                winsound.Beep(1000, 1500) 
                print("=========== ERRO NA REQUISICAO - TROCANDO AS HEADERS =============== getUserProfile:", response.status_code)
                # next = input('Aperte enteder para continuar: ')
                # print(next)
                # print(response)
                # return False
            
        except Exception as e:
            
            winsound.Beep(1000, 1500) 
            print("=========== EXCEPTION NA REQUISICAO - TROCANDO AS HEADERS =============== getUserProfile:", e)
            # next = input('Aperte enteder para continuar: ')
            # print(next)
            # return False
            
            
            
    def extractFromLocation(self, headers, location):
         return True
    
    def extractFromHashtag(self, headers, hashtag):
        return True
    
    def extractFromPost(self, headers, base_url, post_url, tarefa_id, tag_id):
        
        print("[!] Analisando URL: "+post_url)

        media_id = self.getPostId(headers, post_url)
        post_dados = self.getPost( headers, media_id)
        
        post_likes = self.getLikes(headers, media_id)
        post_comments = self.getComments(headers, media_id)
        
        user_data = []
        
        print("\n ======= Extraindo Interacoes ======= \n")
        
        print("\n [!] Extraindo Likes \n")
        
        for like in post_likes['users']:
                        
            username = like['username']
            full_name = like['full_name']
            text = ""
            interacao_tipo = "like"
            interacao_data = self.timeStampToDateTime(post_dados['caption']['created_at_utc'])
           
            post_id = post_dados['pk']
            post_slug = post_dados['code']
            post_data = self.timeStampToDateTime(post_dados['caption']['created_at_utc'])
            
            post_descricao = post_dados['caption']['text']
            post_imagem = post_dados['image_versions2']['candidates'][0]['url']
            
            # Verifica se o username já existe no user_data
            user_exists = False
            for user_info in user_data:
                if user_info['username'] == username:
                    # print('substituindo: '+user_info['username'])
                    user_info['full_name'] = full_name  # Atualiza o nome completo
                    user_info['interacao_tipo'] = interacao_tipo  # Atualiza o tipo de interação
                    user_info['interacao_data'] = interacao_data 
                    user_exists = True
                    break

            # Se o username não existir, adiciona ao user_data
            if not user_exists:
                user_data.append({
                    'tarefa_id': tarefa_id,
                    'tag_id': tag_id,
                    'username': username,
                    'full_name': full_name,
                    'interacao_tipo': interacao_tipo,
                    'interacao_conteudo': text,
                    'interacao_data': interacao_data,
                    'post_id':post_id,
                    'post_slug':post_slug,
                    'post_data': post_data,
                    'post_descricao': post_descricao,
                    'post_imagem':post_imagem                 
                })

        print("\n ======= Exibindo Comentários ======= \n")
        
        print("\n [!] Extraindo Comentários \n")

        for comment in post_comments['comments']:
  
            username = comment['user']['username']
            full_name =comment['user']['full_name']
            text = comment['text']
            interacao_tipo = "comentario"
            interacao_data =  self.timeStampToDateTime(comment['created_at_utc'])
            
            post_id = post_dados['pk']
            post_slug = post_dados['code']
            post_data = self.timeStampToDateTime(post_dados['caption']['created_at_utc'])
            
            post_descricao = post_dados['caption']['text']
            post_imagem = post_dados['image_versions2']['candidates'][0]['url']

            
            # Verifica se o username já existe no user_data
            user_exists = False
            for user_info in user_data:
                if user_info['username'] == username:
                    # print('substituindo: '+user_info['username'])
                    user_info['full_name'] = full_name  # Atualiza o nome completo
                    user_info['interacao_tipo'] = interacao_tipo  # Atualiza o tipo de interação
                    user_info['text'] = text  # Atualiza o texto do comentário
                    user_info['interacao_data'] = interacao_data 
                    user_exists = True
                    break

            # Se o username não existir, adiciona ao user_data
            if not user_exists:
                user_data.append({
                    'tarefa_id': tarefa_id,
                    'tag_id': tag_id,
                    'username': username,
                    'full_name': full_name,
                    'interacao_tipo': interacao_tipo,
                    'interacao_conteudo': text,
                    'interacao_data': interacao_data,
                    'post_id':post_id,
                    'post_slug':post_slug,
                    'post_data': post_data,
                    'post_descricao': post_descricao,
                    'post_imagem':post_imagem 
                })
                
        print("Demandas Capturadas: ", len(user_data))
        
        for user in user_data:
            
            self.addInstaLeadDemanda( base_url, user)
        
        # Entrair Usuarios             
        self.extractUserInfo( headers, user_data, base_url, tarefa_id, tag_id)

    def extractUserInfo(self, headers, demandas, base_url, tarefa_id, tag_id):
        
        print('[!] Extraindo user infos pelas demandas')
        
        # driver = webdriver.Firefox()
        
        personas = []
        
        demandas = demandas
        
        for demanda in demandas:
            
            try: 
            
                user_data = self.getUserProfile(headers, demanda['username'])
                # user_data = self.getUserProfileManually(headers, demanda['username'], driver)

                # Links
                links = ""
                
                try:
                    for link in user_data['data']['user']['bio_links']:
                        
                        if links:  # Verifica se a string já possui conteúdo
                            links += ", " + link['url']  # Adiciona o link à string, separado por vírgula
                        else:
                            links += link['url']
                except Exception as e:
                    print('[**] Erro ao capturar links:', e)
                    
                # Mencoes
                
                mencoes= ""
                
                try:
                    for mencao in user_data['data']['user']['biography_with_entities']['entities']:
                        if mencoes:  # Verifica se a string já possui conteúdo
                            mencoes += ", " + mencao['user']['username']  # Adiciona a menção à string, separada por vírgula
                        else:
                            mencoes += mencao['user']['username']
                except Exception as e:
                    print('[**] Erro ao capturar menções:', e)
        
                persona = {
                        'tarefa_id': tarefa_id,
                        'tag_id': tag_id,
                        'username': user_data['data']['user']['username'],
                        'full_name': user_data['data']['user']['full_name'],
                        'is_private': user_data['data']['user']['is_private'],
                        'biografia': user_data['data']['user']['biography'],
                        'links': links,
                        'mencoes': mencoes,
                        'categoria': user_data['data']['user']['category_name'],
                        'email': self.extractEmail(user_data['data']['user']['business_email'], user_data['data']['user']['biography'], links, headers, mencoes),
                        'telefone': self.extractTelefone(user_data['data']['user']['business_phone_number'], links, user_data['data']['user']['biography'], mencoes, headers),
                    }
                
                
                self.addInstaLead( base_url, persona)
          
            except Exception as e:
                print('[**] Erro ao capturar person:', e)
    
       
    # Extracao de Telefones
    def extractTelefone(self, telefone, links, biografia, mencoes, headers):
        
        print('\n =========== [EXTRAÇAO DE TELEFONE] ================ \n')
        
        print('\n [**][VERIF. TELEFONE VIA API] \n')
        
        if  telefone != None:
            print(telefone)            
            return telefone
        
        print('\n [**][VERIF. TELEFONE PELA BIOGRAFIA] \n')
        
        biografia = biografia.replace('(', "")
        biografia = biografia.replace(')', "")
        biografia = biografia.replace('-', "")

        treze = r"\b\d{13}\b"
        # Encontra todos os números no texto
        numeros_treze = re.findall(treze, biografia)
        if numeros_treze:
            numero = str(numeros_treze[0])
            numero = numero.replace(' ', "")
           
            print(numero)
            return numero
        
        onze_espaco = r"\b\d{2}\s\d{9}\b"
        # Encontra todos os números no texto
        numeros_onze_espaco = re.findall(onze_espaco, biografia)
        if numeros_onze_espaco:
            numero = str(numeros_onze_espaco[0])
            numero = numero.replace(' ', "")
            numero = "55"+numero
            print(numero)
            return numero
            
        onze_sem_espaco = r"\b\d{11}\b"
        # Encontra todos os números no texto
        numeros_onze_sem_espaco = re.findall(onze_sem_espaco, biografia)
        if numeros_onze_sem_espaco:
            numero = str(numeros_onze_sem_espaco[0])
            numero = numero.replace(' ', "")
            numero = "55"+numero
            print(numero)
            return numero
            
        dez_espaco = r"\b\d{2}\s\d{8}\b"
        # Encontra todos os números no texto
        numeros_dez_espaco = re.findall(dez_espaco, biografia)
        if numeros_dez_espaco:
            numero = str(numeros_dez_espaco[0])
            numero = numero.replace(' ', "")
            numero = "55"+numero
            print(numero)
            return numero
            
        dez_sem_espaco = r"\b\d{10}\b"
        # Encontra todos os números no texto
        numeros_dez_sem_espaco = re.findall(dez_sem_espaco, biografia)
        if numeros_dez_sem_espaco:
            numero = str(numeros_dez_sem_espaco[0])
            numero = numero.replace(' ', "")
            numero = "55"+numero
            print(numero)
            return numero
            
        print('\n [**][VERIF. TELEFONE PELA BIOGRAFIA DAS MENÇOES] \n')

        mencoes = mencoes.split(", ")
        
        print(f'MENCOES: {mencoes}')
        
        if len(mencoes) == 1 and len(mencoes[0]) == 0:
            
            print('NAO EXISTEM MENÇÕES')
            
        else:
      
            try:
                for mencao in mencoes:
                    
                    print(f'VISITANDO: {mencao}')
                    
                    user_data = self.getUserProfile(headers, mencao)
            
                    biografia = user_data['data']['user']['biography']
                    biografia = biografia.replace('(', "")
                    biografia = biografia.replace(')', "")
                    biografia = biografia.replace('-', "")

                    treze = r"\b\d{13}\b"
                    # Encontra todos os números no texto
                    numeros_treze = re.findall(treze, biografia)
                    if numeros_treze:
                        numero = str(numeros_treze[0])
                        numero = numero.replace(' ', "")
                       
                        print(numero)
                        return numero
                    
                    onze_espaco = r"\b\d{2}\s\d{9}\b"
                    # Encontra todos os números no texto
                    numeros_onze_espaco = re.findall(onze_espaco, biografia)
                    if numeros_onze_espaco:
                        numero = str(numeros_onze_espaco[0])
                        numero = numero.replace(' ', "")
                        numero = "55"+numero
                        print(numero)
                        return numero
                        
                    onze_sem_espaco = r"\b\d{11}\b"
                    # Encontra todos os números no texto
                    numeros_onze_sem_espaco = re.findall(onze_sem_espaco, biografia)
                    if numeros_onze_sem_espaco:
                        numero = str(numeros_onze_sem_espaco[0])
                        numero = numero.replace(' ', "")
                        numero = "55"+numero
                        print(numero)
                        return numero
                        
                    dez_espaco = r"\b\d{2}\s\d{8}\b"
                    # Encontra todos os números no texto
                    numeros_dez_espaco = re.findall(dez_espaco, biografia)
                    if numeros_dez_espaco:
                        numero = str(numeros_dez_espaco[0])
                        numero = numero.replace(' ', "")
                        numero = "55"+numero
                        print(numero)
                        return numero
                        
                    dez_sem_espaco = r"\b\d{10}\b"
                    # Encontra todos os números no texto
                    numeros_dez_sem_espaco = re.findall(dez_sem_espaco, biografia)
                    if numeros_dez_sem_espaco:
                        numero = str(numeros_dez_sem_espaco[0])
                        numero = numero.replace(' ', "")
                        numero = "55"+numero
                        print(numero)
                        return numero       
            except Exception as e:
                print(f'ERRO MENCOES {mencoes}')
                
        print('\n [**][VERIF. TELEFONE POR LINKS] \n')
        
        links = links.split(", ")
        
        print(f'LINKS: {links}')
        
        if len(links) == 1 and len(links[0]) == 0:
            
            print('NAO EXISTEM LINKS')
            
        else:
            
            for link in links:
            
                print(f'VISITANDO: {link}')
                
                if not link.startswith('https://'):
                    if link.startswith('http://'):
                        link = link.replace('http://', 'https://')
                    else:
                        link = 'https://' + link
                
                try:

                    response = requests.get(link)
        
                    soup = BeautifulSoup(response.content, 'html.parser')

                    a_tags = soup.find_all('a')
                
                    for a_tag in a_tags:
                        href = a_tag.get('href')
                        if href:
                            # print(href)
                            padrao_whatsapp = re.compile(r'\b55\d{11}')

                            # Encontra todos os números do WhatsApp na string
                            numeros_whatsapp = padrao_whatsapp.findall(href)

                            if len(numeros_whatsapp) > 0:
                                print(numeros_whatsapp[0])
                                return numeros_whatsapp[0] 
                    biografia = str(response.content) 
                    biografia = biografia.replace('(', "")
                    biografia = biografia.replace(')', "")
                    biografia = biografia.replace('-', "")
        
                    treze = r"\b\d{13}\b"
                    # Encontra todos os números no texto
                    numeros_treze = re.findall(treze, biografia)
                    if numeros_treze:
                        numero = str(numeros_treze[0])
                        numero = numero.replace(' ', "")
                     
                        print(numero)
                        return numero
                    
                    onze_espaco = r"\b\d{2}\s\d{9}\b"
                    # Encontra todos os números no texto
                    numeros_onze_espaco = re.findall(onze_espaco, biografia)
                    if numeros_onze_espaco:
                        numero = str(numeros_onze_espaco[0])
                        numero = numero.replace(' ', "")
                        numero = "55"+numero
                        print(numero)
                        return numero
                        
                    onze_sem_espaco = r"\b\d{11}\b"
                    # Encontra todos os números no texto
                    numeros_onze_sem_espaco = re.findall(onze_sem_espaco, biografia)
                    if numeros_onze_sem_espaco:
                        numero = str(numeros_onze_sem_espaco[0])
                        numero = numero.replace(' ', "")
                        numero = "55"+numero
                        print(numero)
                        return numero
                        
                    dez_espaco = r"\b\d{2}\s\d{8}\b"
                    # Encontra todos os números no texto
                    numeros_dez_espaco = re.findall(dez_espaco, biografia)
                    if numeros_dez_espaco:
                        numero = str(numeros_dez_espaco[0])
                        numero = numero.replace(' ', "")
                        numero = "55"+numero
                        print(numero)
                        return numero
                        
                    dez_sem_espaco = r"\b\d{10}\b"
                    # Encontra todos os números no texto
                    numeros_dez_sem_espaco = re.findall(dez_sem_espaco, biografia)
                    if numeros_dez_sem_espaco:
                        numero = str(numeros_dez_sem_espaco[0])
                        numero = numero.replace(' ', "")
                        numero = "55"+numero
                        print(numero)
                        return numero
                    
                
                except Exception as e:
                    print(f"Ocorreu um erro ao acessar {link}: {e}")
                
       
    # Extracao de Telefones
         
    # Extração Emails
    def extractEmail(self, email, biografia, links, headers, mencoes):
        
        print('\n =========== [EXTRAÇAO DE EMAILS] ================ \n')
        
        print('\n [**][VERIF. EMAIL VIA API] \n')
        
        if  email != None:
            print(email)
            return email
        
        print('\n [**][VERIF. EMAIL PELA BIOGRAFIA] \n')
        
        padrao_email = r'\b[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Z|a-z]{2,}\b'
        match = re.search(padrao_email, biografia)
        
        if match:
            print( match.group())
            return match.group()


        print('\n [**][VERIF. EMAIL PELA BIOGRAFIA DAS MENÇOES] \n')

        mencoes = mencoes.split(", ")
        
        print(f'MENCOES: {mencoes}')
        
        if len(mencoes) == 1 and len(mencoes[0]) == 0:
            
            print('NAO EXISTEM MENÇÕES')
            
        else:
            
            for mencao in mencoes:
                    
                print(f'VISITANDO MENÇÃO: {mencao}')
                user_data = self.getUserProfile(headers, mencao)
                    
                padrao_email = r'\b[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Z|a-z]{2,}\b'
                match = re.search(padrao_email, user_data['data']['user']['biography'])
                
                if match:
                    print( match.group())
                    return match.group()

        print('\n [**][VERIF. EMAIL PELOS LINKS] \n')
        
        links = links.split(", ")
        
        print(f'LINKS: {links}')
        
        if len(links) == 1 and len(links[0]) == 0:
            
            print('NAO EXISTEM LINKS')
            
        else:

            for link in links:
                
                print(f'VISITANDO: {link}')
                
                if not link.startswith('https://'):
                    if link.startswith('http://'):
                        link = link.replace('http://', 'https://')
                    else:
                        link = 'https://' + link
                try:

                    response = requests.get(link)
        
                        # Extrai o conteúdo HTML da resposta
                    html_content = response.text

                    # print(html_content)
                    # Regex para extrair endereços de e-mail
                    padrao_email = re.compile(r'[\w\.-]+@[\w\.-]+')

                    # Encontra todos os endereços de e-mail no código-fonte
                    emails_encontrados = padrao_email.findall(html_content)

                    if emails_encontrados:
                        print(f'EMAIL ENCONTRADO: {emails_encontrados[0]}')
                        return emails_encontrados[0]  # Retorna o primeiro endereço de e-mail encontrado
                
                    
                except Exception as e:
                    print(f"ERRO AO ACESSAR: [{link}]  {e}")

  
    # Feed
    def getUserFeed(self, headers, user_id):
        
        url = 'https://www.instagram.com/api/v1/feed/user/'+user_id+'/?count=33'
        response = requests.get(url, headers=headers)

        if response.status_code == 200:
            # print("Requisição getUserProfile bem-sucedida!")
            data = json.loads(response.content)
            
            
            # count = 0
            
            # for item in data['items']:
                
            #     count = count +1
                
            #     print('\n')
            #     print(count)
            #     print(item['caption']['text'])
            #     print('\n')
            # print(data)
            return data
        else:
            print("Erro na requisição getUserProfile:", response.status_code)
            return False
                    
    def extractFromFeePost(self, headers, base_url, media_id, tarefa_id, tag_id):
        
        # Verifica os posts advindo da funcao extractFromFeed()
        
        print("[!] Analisando URL: "+media_id)

        # media_id = self.getPostId(headers, post_url)
        post_dados = self.getPost( headers, media_id)
        
        post_likes = self.getLikes(headers, media_id)
        post_comments = self.getComments(headers, media_id)
        
        user_data = []
        
        print("\n ======= Extraindo Interacoes ======= \n")
        
        print("\n [!] Extraindo Likes \n")
        
        for like in post_likes['users']:
                        
            username = like['username']
            full_name = like['full_name']
            text = ""
            interacao_tipo = "like"
            interacao_data = self.timeStampToDateTime(post_dados['caption']['created_at_utc'])
           
            post_id = post_dados['pk']
            post_slug = post_dados['code']
            post_data = self.timeStampToDateTime(post_dados['caption']['created_at_utc'])
            
            post_descricao = post_dados['caption']['text']
            post_imagem = post_dados['image_versions2']['candidates'][0]['url']
            
            # Verifica se o username já existe no user_data
            user_exists = False
            for user_info in user_data:
                if user_info['username'] == username:
                    # print('substituindo: '+user_info['username'])
                    user_info['full_name'] = full_name  # Atualiza o nome completo
                    user_info['interacao_tipo'] = interacao_tipo  # Atualiza o tipo de interação
                    user_info['interacao_data'] = interacao_data 
                    user_exists = True
                    break

            # Se o username não existir, adiciona ao user_data
            if not user_exists:
                user_data.append({
                    'tarefa_id': tarefa_id,
                    'tag_id': tag_id,
                    'username': username,
                    'full_name': full_name,
                    'interacao_tipo': interacao_tipo,
                    'interacao_conteudo': text,
                    'interacao_data': interacao_data,
                    'post_id':post_id,
                    'post_slug':post_slug,
                    'post_data': post_data,
                    'post_descricao': post_descricao,
                    'post_imagem':post_imagem                 
                })

        print("\n ======= Exibindo Comentários ======= \n")
        
        print("\n [!] Extraindo Comentários \n")

        for comment in post_comments['comments']:
  
            username = comment['user']['username']
            full_name =comment['user']['full_name']
            text = comment['text']
            interacao_tipo = "comentario"
            interacao_data =  self.timeStampToDateTime(comment['created_at_utc'])
            
            post_id = post_dados['pk']
            post_slug = post_dados['code']
            post_data = self.timeStampToDateTime(post_dados['caption']['created_at_utc'])
            
            post_descricao = post_dados['caption']['text']
            post_imagem = post_dados['image_versions2']['candidates'][0]['url']

            
            # Verifica se o username já existe no user_data
            user_exists = False
            for user_info in user_data:
                if user_info['username'] == username:
                    # print('substituindo: '+user_info['username'])
                    user_info['full_name'] = full_name  # Atualiza o nome completo
                    user_info['interacao_tipo'] = interacao_tipo  # Atualiza o tipo de interação
                    user_info['text'] = text  # Atualiza o texto do comentário
                    user_info['interacao_data'] = interacao_data 
                    user_exists = True
                    break

            # Se o username não existir, adiciona ao user_data
            if not user_exists:
                user_data.append({
                    'tarefa_id': tarefa_id,
                    'tag_id': tag_id,
                    'username': username,
                    'full_name': full_name,
                    'interacao_tipo': interacao_tipo,
                    'interacao_conteudo': text,
                    'interacao_data': interacao_data,
                    'post_id':post_id,
                    'post_slug':post_slug,
                    'post_data': post_data,
                    'post_descricao': post_descricao,
                    'post_imagem':post_imagem 
                })
                
        print("Demandas Capturadas: ", len(user_data))
        
        for user in user_data:
            
            self.addInstaLeadDemanda( base_url, user)
         
        
        # Entrair Usuarios             
        self.extractUserInfo( headers, user_data, base_url, tarefa_id, tag_id)
         
    def extractFromFeed(self, headers, username, base_url, tarefa_id, tag_id):
      
        user_data = self.getUserProfile(headers, username)
        user_feed = self.getUserFeed(headers, user_data['data']['user']['id'])
        
        for post in user_feed['items']:
            
            try:
                
                print('\n[!] Analisando POST/POR FEED\n')
                print('\n[!] Usuário: ', str(user_data['data']['user']['username']))
                print('\n[!] Post URL: https://instagram.com/p/'+str(post['code']))
                print('\n[!] Post ID: https://instagram.com/p/'+str(post['pk']))

                # print('\n[!] Post Conteudo: ', str(post['caption']['text']))


                self.extractFromFeePost( headers, base_url, str(post['pk']), tarefa_id, tag_id)
                
            except Exception as e:
                
                print('\n [!] Erro na extracao de post/por feeed.')
                print(e)
            
        
        
Scraper()