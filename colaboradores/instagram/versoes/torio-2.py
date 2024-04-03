#  Captura dados de contato e interaçoes do instagram 
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

# Tório

class Scraper:

    def __init__(self):
        
        headers = {
            'Accept': '*/*',
            'Accept-Encoding': 'gzip, deflate, br',
            'Accept-Language': 'pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7',
            'Cookie': 'ig_did=393560CC-54FB-4EC2-B039-675BE71DC24B; datr=MdZSZY-jagBUo9wTQKzc-gBv; ig_nrcb=1; fbm_124024574287414=base_domain=.instagram.com; mid=ZaS_XQALAAHjqL_c82_6N8_woF1-; ds_user_id=42804341242; ps_n=0; ps_l=0; csrftoken=IZtJUlvwZ7478EgwrLsOOuK8MbyqJchy; shbid="11631\05442804341242\0541739543822:01f7d7496fe7e4cb8859246c806ff8291525c8c5b6c12ca3759ee8c8b88ac065515c4863"; shbts="1708007822\05442804341242\0541739543822:01f72337fb0e60e23798dc2a1dc2b070b75cf1dfa6cacc86d599811a33f753e410e85687"; fbsr_124024574287414=mQXTeX820w7JwrO9GuERMEXPRRMsytJJyohx-WZ7e1s.eyJ1c2VyX2lkIjoiMTAwMDg5NDAyNTYzMTE3IiwiY29kZSI6IkFRQ19qdWw3X0Y1bWF1T2tRc1c1czg2V3Jhc3ZGQWF2eGR4bXdEaWplX0Z1V0VLT24xN0NVQmszWXVXc2Q0bzlfdmdtcmVSNUxwanZtNThaZUZoN20tbFhmdFR4RnoxZUhVcXdIOGhHdmVtbENJbkxJeVJ5U0RRMU5CSFNlRVVyR0p0bXhSQUdEbkVadGR6a3NnVGJaeG9WLXNsQ2FNSGRwYXd6ZGtjbl90bXgyb2RVMERUaGxXbjU0c2h2QVlRX1lSUUJjNlUtVFhiOGY0RE5IVGplalR6bk9qazJac3lRdWNRQWtLaXRPQTBMMWZROW9TQkpoZ2gwcHNZb0FNUXo4Q0dxRkZhMmdyV1VrZ3VRb0k1QVUwTy02QW15LW1WckRnVEVxUThBcjlCbG54NTVfOHFuaUVCNjNiZXZyeEZWSnhGdmNNZ190Q2xsNG5KbmgwYVdDUE0xUHpPYlVPVnJQREtMZXRZdkVrbTVmQSIsIm9hdXRoX3Rva2VuIjoiRUFBQnd6TGl4bmpZQk81RFdMUGZzTlhVOVJ2M2dXWkFEeXJsSktGUFkzaHBOY2h1cVVkWEN0WWhsVDFQWkJPY2dibEJGSjRVdnM2MVRrTXdYZ2JUMFlhSGRnTGJBalVmSlA5WG9wdGFzU0hpS3paQnVyMTFobzcwWkJwa2U5Z0w1YnhoUXhWOTRrQUMxYnVnelZFNVk5ZnAwbGpaQjM0QUI5VmZNRElBbDY0SzZtTWl4TWMwYTBsa1pBM3JaQUNzMkxFSGRDMFpEIiwiYWxnb3JpdGhtIjoiSE1BQy1TSEEyNTYiLCJpc3N1ZWRfYXQiOjE3MDgyMzA0ODZ9; sessionid=42804341242%3APYMfL3cYxVBKmN%3A1%3AAYdRMIyHaPadTX1oxlY7GNsoV6pCCjhEgvgl2x-d5U0; rur="LDC\05442804341242\0541739766581:01f781f3d7e2230a25bc80331389b519dee2112914e2123bd5354d9524e0efc7b00192eb"',
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
            'X-Csrftoken': 'IZtJUlvwZ7478EgwrLsOOuK8MbyqJchy',
            'X-Ig-App-Id': '936619743392459',
            'X-Ig-Www-Claim': 'hmac.AR2kovJ4-DcOAF0d43NiUcqAx69DUcqPe2rRZLMjoHsdi9v6',
            'X-Requested-With': 'XMLHttpRequest'
        }
        
        
        base_url = "https://ccoanalitica.com/hassio/instaapi/"
        
        
        while True:
   
            tarefas =  self.getTarefasAtivas(base_url) 
            
            try:
            
                if len(tarefas) > 0 :    

                    for tarefa in tarefas:
                        
                        if (tarefa['tarefa_tipo'] == "post"):
                            
                            print('\n [!] Iniciando tarefa tipo: '+tarefa['tarefa_tipo'])
                            
                            self.updateTarefaStatus(base_url, tarefa['id'], 2)  # Stautus Processando
                            
                            # Extraindo Informaçoes
                            self.extractFromPost( headers, base_url,  tarefa['tarefa_url'], tarefa['id'], tarefa['tarefa_tag'])
                            
                            self.updateTarefaStatus(base_url, tarefa['id'], 3)  # Stautus Finalizado

                    
                        elif (tarefa['tarefa_tipo'] == "feed"):
                            
                            print('[!] Iniciando tarefa tipo: '+tarefa['tarefa_tipo'])
                            
                            self.updateTarefaStatus(base_url, tarefa['id'], 2)  # Stautus Processando
                            
                            username = self.extrair_username_url(tarefa['tarefa_url'])
                            print(username)
                            
                            self.extractFromFeed(headers, username, base_url, tarefa['id'], tarefa['tarefa_tag'])
                            
                            self.updateTarefaStatus(base_url, tarefa['id'], 3)  # Stautus Finalizado

                        
                        # elif (tarefa['tarefa_tipo'] == "tag"):
                        #     print('[!] Iniciando tarefa tipo: '+tarefa['tarefa_tipo'])
                            
                        #     self.updateTarefaStatus(base_url, tarefa['id'], 2)  # Stautus Processando
                            
                        #     # self.extractFromPost( headers, tarefa['tarefa_url'] )
                            
                        #     self.updateTarefaStatus(base_url, tarefa['id'], 3)  # Stautus Finalizado

                            
                        # elif (tarefa['tarefa_tipo'] == "location"):
                            
                        #     print('[!] Iniciando tarefa tipo: '+tarefa['tarefa_tipo'])
                            
                        #     self.updateTarefaStatus(base_url, tarefa['id'], 2)  # Stautus Processando
                            
                        #     # self.extractFromPost( headers, tarefa['tarefa_url'] )
                            
                        #     self.updateTarefaStatus(base_url, tarefa['id'], 3)  # Stautus Finalizado
                else:
                    
                    print('\n [!] Nenhnuma tarefa ativa. ')
                    time.sleep(5)
                    
            except Exception as e:
                print('\n [!] Erro no while.')
                print(e)
                    
      
        
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
        
        
        # {
        #     "data": {
        #         "user": {
        #             "ai_agent_type": null,
        #             "biography": "Âncora @cnnbrasil \nBastidores CNN, 14h às 16h. \nNotícias no “X”: @tainafalcao \nNordestina. Sagitariana. Poetisa. \nMeu livro: “Não te devo respostas”",
        #             "bio_links": [],
        #             "fb_profile_biolink": null,
        #             "biography_with_entities": {
        #                 "raw_text": "Âncora @cnnbrasil \nBastidores CNN, 14h às 16h. \nNotícias no “X”: @tainafalcao \nNordestina. Sagitariana. Poetisa. \nMeu livro: “Não te devo respostas”",
        #                 "entities": [
        #                     {
        #                         "user": {
        #                             "username": "cnnbrasil"
        #                         },
        #                         "hashtag": null
        #                     },
        #                     {
        #                         "user": {
        #                             "username": "tainafalcao"
        #                         },
        #                         "hashtag": null
        #                     }
        #                 ]
        #             },
        #             "blocked_by_viewer": false,
        #             "restricted_by_viewer": false,
        #             "country_block": false,
        #             "eimu_id": "109740567087323",
        #             "external_url": null,
        #             "external_url_linkshimmed": null,
        #             "edge_followed_by": {
        #                 "count": 73599
        #             },
        #             "fbid": "17841401521960023",
        #             "followed_by_viewer": true,
        #             "edge_follow": {
        #                 "count": 1996
        #             },
        #             "follows_viewer": false,
        #             "full_name": "Tainá Falcão",
        #             "group_metadata": null,
        #             "has_ar_effects": false,
        #             "has_clips": true,
        #             "has_guides": false,
        #             "has_channel": false,
        #             "has_blocked_viewer": false,
        #             "highlight_reel_count": 25,
        #             "has_requested_viewer": false,
        #             "hide_like_and_view_counts": true,
        #             "id": "1522732",
        #             "is_business_account": false,
        #             "is_professional_account": true,
        #             "is_supervision_enabled": false,
        #             "is_guardian_of_viewer": false,
        #             "is_supervised_by_viewer": false,
        #             "is_supervised_user": false,
        #             "is_embeds_disabled": false,
        #             "is_joined_recently": false,
        #             "guardian_id": null,
        #             "business_address_json": null,
        #             "business_contact_method": "UNKNOWN",
        #             "business_email": null,
        #             "business_phone_number": null,
        #             "business_category_name": null,
        #             "overall_category_name": null,
        #             "category_enum": null,
        #             "category_name": "Jornalista",
        #             "is_private": false,
        #             "is_verified": true,
        #             "is_verified_by_mv4b": false,
        #             "is_regulated_c18": false,
        #             "edge_mutual_followed_by": {
        #                 "count": 2,
        #                 "edges": [
        #                     {
        #                         "node": {
        #                             "username": "carolnogueira_jornalista"
        #                         }
        #                     },
        #                     {
        #                         "node": {
        #                             "username": "elisaveeck"
        #                         }
        #                     }
        #                 ]
        #             },
        #             "pinned_channels_list_count": 0,
        #             "profile_pic_url": "https://instagram.fgyn11-1.fna.fbcdn.net/v/t51.2885-19/283697360_719514882428394_4790863883756660183_n.jpg?stp=dst-jpg_s150x150\u0026_nc_ht=instagram.fgyn11-1.fna.fbcdn.net\u0026_nc_cat=106\u0026_nc_ohc=B2y_li5o7f0AX9Bs4Xj\u0026edm=AOQ1c0wBAAAA\u0026ccb=7-5\u0026oh=00_AfAgwFpzcAeMT8KnnUo9JaGrjyTCMT_uxa3vY_IRIxp-iw\u0026oe=659BDD0D\u0026_nc_sid=8b3546",
        #             "profile_pic_url_hd": "https://instagram.fgyn11-1.fna.fbcdn.net/v/t51.2885-19/283697360_719514882428394_4790863883756660183_n.jpg?stp=dst-jpg_s320x320\u0026_nc_ht=instagram.fgyn11-1.fna.fbcdn.net\u0026_nc_cat=106\u0026_nc_ohc=B2y_li5o7f0AX9Bs4Xj\u0026edm=AOQ1c0wBAAAA\u0026ccb=7-5\u0026oh=00_AfA_VvCVPBYCUcEzDszPSWbzQ2SMXYq-AesCFtTb3YbCOg\u0026oe=659BDD0D\u0026_nc_sid=8b3546",
        #             "requested_by_viewer": false,
        #             "should_show_category": true,
        #             "should_show_public_contacts": false,
        #             "show_account_transparency_details": true,
        #             "transparency_label": null,
        #             "transparency_product": null,
        #             "username": "tainafalcao",
        #             "connected_fb_page": null,
        #             "pronouns": [],
        #             "edge_owner_to_timeline_media": {
        #                 "count": 1039,
        #                 "page_info": {
        #                     "has_next_page": true,
        #                     "end_cursor": ""
        #                 },
        #                 "edges": []
        #             }
        #         }
        #     },
        #     "status": "ok"
        # }

        url = 'https://www.instagram.com/api/v1/users/web_profile_info/?username='+username
        
        # atraso = random.uniform(30, 60)
        # time.sleep(atraso)
        time.sleep(10)
        
        response = requests.get(url, headers=headers)

        if response.status_code == 200:

            data = json.loads(response.content)
            # print(data['data']['user']['username'])
            return data
        
        else:
            
            # atraso = random.uniform(600, 1200)
            # print('[!!] Erro de Requisicao, aguardando: '+str(atraso)+' minutos.')
            # time.sleep(atraso)
            print("Erro na requisição getUserProfile:", response.status_code)
            print(response)
            return False
            
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
        
        if  telefone != None:
            
            print('[encontrado telefone default do instagram]')
            return telefone
        
        # Verificando se existe link do wpp com numero ex: wa.me/5562993616
        elif self.extrair_numero_whatsapp(links) != False:
            
            print('[encontrado telefone no link do instagram]')
            
            return self.extrair_numero_whatsapp( links)
        
        # Verificando telefone na bio do lead principal
        elif self.extrair_numeros_bio(biografia) != False:
            
            print('[encontrado telefone na bio do instagram]')
            return self.extrair_numeros_bio( links)
        
        
        # Verificando telefones nas bios das mencoes do lead principal
        level_one_mencoes_telefone = self.level_one_mencoes_telefone(mencoes, headers)
        if level_one_mencoes_telefone != False:
            
            print('encontrado telefone level_one_mencoes_telefone')
            return level_one_mencoes_telefone
        
        # Verificando telefones nos links do lead principal
        level_one_links_telefone = self.level_one_links_telefone(links, headers)
        if level_one_links_telefone != False:
            
            print('encontrado telefone level_one_link_telefone')
            return level_one_links_telefone
        
    def level_one_mencoes_telefone(self, mencoes, headers):
       
        # Verifica as mencoes do lead principal em busca de telefones
        mencoes = mencoes.split(", ")

        # print(len(mencoes))
        # print(mencoes)
        print('\n =========== [VERIFICANDO TELEFONE POR MENCOES] ================ \n')
        try:
            for mencao in mencoes:
                
                print(f'VISITANDO: {mencao}')
                user_data = self.getUserProfile(headers, mencao)
        
                numero_from_bio = self.extrair_numeros_bio(user_data['data']['user']['biography'])
                
                
                
                if numero_from_bio != False:
                    print(f'{mencao} : {numero_from_bio}')
                    return numero_from_bio
                    break
                
        except Exception as e:
            print('nao existem mencoes')
            return False
         
    def level_one_links_telefone(self, links, headers):
       
        # Verifica os links lead principal em busca de telefones        
        numero_from_links = self.extrair_numeros_links(links)
        return numero_from_links
         
    def extrair_numeros_bio(self, biografia):
        # Remover caracteres especiais e letras
        # numeros = re.sub(r'[^0-9]', '', biografia)

        # # Padronizar para o formato desejado
        # match = re.match(r'^(55)?(\d{2})?(9\d{8})$', numeros)

        # if match:
        #     codigo_pais = match.group(1) if match.group(1) else '55'
        #     ddd = match.group(2) if match.group(2) else ''
        #     numero = match.group(3)
            
        #     numero_formatado = f'{codigo_pais}{ddd}{numero}'
        #     return numero_formatado
        # else:
        #     return False
        # Remover caracteres especiais e letras
        numeros = re.sub(r'[^0-9]', '', biografia)
        print('\n =========== [VERIFICANDO TELEFONE POR BIO] ================ \n')
        # Padronizar para o formato desejado
        match = re.match(r'^(55)?(\d{2})?(9\d{8})$', numeros)

        if match:
            codigo_pais = match.group(1) if match.group(1) else '55'
            ddd = match.group(2) if match.group(2) else ''
            numero = match.group(3)
            
            numero_formatado = f'{codigo_pais}{ddd}{numero}'
            return numero_formatado
        else:
            # Verificar se o número não possui o código do país "55"
            match_without_country_code = re.match(r'^(\d{2})?(9\d{8})$', numeros)
            if match_without_country_code:
                ddd = match_without_country_code.group(1) if match_without_country_code.group(1) else ''
                numero = match_without_country_code.group(2)
                numero_formatado = f'55{ddd}{numero}'  # Adicionando "55" como código do país
                print(numero_formatado)
                return numero_formatado
            else:
                return False
    
    def extrair_numeros_links(self, links):

        links = links.split(", ")
        print('\n =========== [VERIFICANDO TELEFONE POR LINKS] ================ \n')
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
               
            except Exception as e:
                print(f"Ocorreu um erro ao acessar {link}: {e}")

        return False

    def extrair_numero_whatsapp(self, link):
        # Expressão regular para identificar links do WhatsApp
        padrao_whatsapp = r'https://(?:api\.|)wa\.me/|https://(?:web\.|)whatsapp\.com/send\?phone=|https://(?:api\.|)whatsapp\.com/send\?phone='
        
        # Verifica se o link corresponde ao padrão do WhatsApp
        if re.search(padrao_whatsapp, link):
            # Extrai o número de telefone do link
            padrao_numero = r'(\d+)'
            numeros = re.findall(padrao_numero, link)
            if numeros:
                numero = ''.join(numeros)
                print(f"Número extraído do link: {numero}")
                
                if self.verificar_numero_whatsapp(numero) == True:
                    return numero
                else:
                    return False
                
            else:
                print("Link do WhatsApp, mas número não encontrado.")
                return False
        else:
            # print("É um link externo")
            return False
            
    def verificar_numero_whatsapp(self, numero):
        # Expressão regular para verificar o padrão de número do WhatsApp no Brasil
        padrao_numero = r'^55\d{2}9\d{8}$'  # [55][ddd][9][número de 9 dígitos]

        # Verifica se o número corresponde ao padrão
        if re.match(padrao_numero, numero):
            print(f"O número '{numero}' segue o padrão de número do WhatsApp no Brasil.")
            return True
        else:
            print(f"O número '{numero}' não segue o padrão esperado.")
            return False
    
    # Extracao de Telefones
         
    # Extração Emails
    def extractEmail(self, email, biografia, links, headers, mencoes):
        
        print('\n =========== [EXTRAÇAO DE EMAILS] ================ \n')
        
        if  email != None:
            
            print('[VERIFICANDO EMAIL DEFAULT DO INSTAGRAM]')
            print(email)
            return email
        
        elif self.extrair_email_bio( biografia) != False:
                       
            print('[VERIFICANDO EMAIL NA BIO DO INSTAGRAM]')
            return self.extrair_email_bio( biografia)
        
        # Verificando telefones nas bios das mencoes do lead principal
        level_one_mencoes_email = self.level_one_mencoes_email(mencoes, headers)
        if level_one_mencoes_email != False:
            
            
            return level_one_mencoes_email
        
        # Verificando telefones nos links do lead principal
        level_one_links_email = self.level_one_links_email(links, headers)
        if level_one_links_email != False:
            
            return level_one_links_email       
          
    def extrair_email_bio(self, biografia):
        # Expressão regular para encontrar e-mails válidos
        padrao_email = r'\b[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Z|a-z]{2,}\b'

        # Encontrar e-mails na string fornecida
        match = re.search(padrao_email, biografia)
        
        # Retornar lista de e-mails encontrados
        if match:
            print( match.group())
            return match.group()
        else:
            return False
        
    def level_one_mencoes_email(self, mencoes, headers):
       
        # Verifica as mencoes do lead principal em busca de telefones
        mencoes = mencoes.split(", ")

        print('\n =========== [VERIFICANDO EMAILS POR MENCOES] ================ \n')
        
        try:
            for mencao in mencoes:
                
                print(f'VISITANDO: {mencao}')
                user_data = self.getUserProfile(headers, mencao)
        
                email = self.extrair_email_bio(user_data['data']['user']['biography'])
                
                if email != False:
                    print(f'{mencao} : {email}')
                    return email
                    break
            return False
                
        except Exception as e:
            print('\n =========== [NAO EXISTEM MENÇOES] ================ \n')
            return False
         
    def level_one_links_email(self, links, headers):

        links = links.split(", ")
        print('\n =========== [VERIFICANDO EMAILS POR LINKS] ================ \n')
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

                # Regex para extrair endereços de e-mail
                padrao_email = re.compile(r'[\w\.-]+@[\w\.-]+')

                # Encontra todos os endereços de e-mail no código-fonte
                emails_encontrados = padrao_email.findall(html_content)

                if emails_encontrados:
                    print(f'EMAIL ENCONTRADO: {emails_encontrados[0]}')
                    return emails_encontrados[0]  # Retorna o primeiro endereço de e-mail encontrado
             
                
            except Exception as e:
                print(f"ERRO AO ACESSAR: [{link}]  {e}")

        return False
    #Extracao Emails
    
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