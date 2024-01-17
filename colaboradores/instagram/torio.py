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

# Tório

class Scraper:

    def __init__(self):
        
        headers = {
            'Accept': '*/*',
            'Accept-Encoding': 'gzip, deflate, br',
            'Accept-Language': 'pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7',
            'Cookie': 'ig_did=393560CC-54FB-4EC2-B039-675BE71DC24B; datr=MdZSZY-jagBUo9wTQKzc-gBv; ig_nrcb=1; mid=ZVLWMgALAAE9_lzPYkNGpAX8syLZ; fbm_124024574287414=base_domain=.instagram.com; shbid="7447\05461013886138\0541736281530:01f7e6f2ca54fae6835fc34adf4e7734a20e22e1775dba712ea0d0aa1deccd375fa9bfc6"; shbts="1704745530\05461013886138\0541736281530:01f77ffe7b4b9b0bcf8d5af8e8ccb4d635b73eb2a866f195cb40d033fffd7d00c38bea72"; csrftoken=xl32QuXdjPdCJv5Cj43OO4GJytGwQG3z; ds_user_id=61013886138; fbsr_124024574287414=MWeRkWYmMm_Qk-gJFQu11lOKQGtv82eqzpgAR-QfhKY.eyJ1c2VyX2lkIjoiMTAwMDg5NDAyNTYzMTE3IiwiY29kZSI6IkFRRHpuUDMxRkdrYUJIVUJIR0VuU3l2b1RtdnZSbW5tb1VHZ1lqUEdCYTVuVy1TRllURlNIZzZHeVNRY21DaFZnX2xzRTFvcVJRdktDbkRJdUM0OXNqNTlvNFEwNlhmZk9wQzVsLVA2ZGljRmk1S09rbHU1NVJLbXZZamVNa2JzSV9pR1M5YmpVM1ZhTDFwWmE4eEZta3JUQ2NOb29zcWFfZ2RFMkZEMS1yem8zaFZQMEExNF8yNjhBczI5M281VWZONnV3NV8yQ19VRFdCSllpWmpvdVFfUVZ6TnNGd0dYS3NJRGQtUjl4YWlhQmxIQmpBclM4QVZuREN4ckotajdCVlh4UjBRZmhqLUt6Ukt4SXp5Um5mLS1EamZHVVVLQzlPOHRISUhMMHVCUVNfSlNvUzMzVDMtNnFlTWJMTVRiYnF3aERaZm9yc0ZUM2VRQ3QxQTZ0SHgzT3FQTnhmSDhPX0g4RG15eExuSHRhdyIsIm9hdXRoX3Rva2VuIjoiRUFBQnd6TGl4bmpZQk94akxsaWF2MUlKdlpBSjd1cE5pV0lzYTVRMUUxWXU1SllBc244bWJjY29sZ0pMNU45NDNERWM0Qml0MGJvUkZuVjlFNUFnSm1jQzVCMXVublpDN0NzVUh6eXJaQnF6VmRBR1NlS0p4d1BJWFpDbm1OM3RyZ3lkSlFNQ0FkYTB0QnNja2dHcWpkcVJ2N3diNkkzS3BxQkpPWVlkSVZNOVNrZTZhbkVKa2w4SE1PbjF4Z0RDYXdld1pEIiwiYWxnb3JpdGhtIjoiSE1BQy1TSEEyNTYiLCJpc3N1ZWRfYXQiOjE3MDQ3NDk3ODF9; sessionid=61013886138%3APm1MnN0e4YHBcg%3A0%3AAYeN2T5DAXz1PRQ3ZrKBbiJsNybNe_P2OT8bO7N-ww; fbsr_124024574287414=MWeRkWYmMm_Qk-gJFQu11lOKQGtv82eqzpgAR-QfhKY.eyJ1c2VyX2lkIjoiMTAwMDg5NDAyNTYzMTE3IiwiY29kZSI6IkFRRHpuUDMxRkdrYUJIVUJIR0VuU3l2b1RtdnZSbW5tb1VHZ1lqUEdCYTVuVy1TRllURlNIZzZHeVNRY21DaFZnX2xzRTFvcVJRdktDbkRJdUM0OXNqNTlvNFEwNlhmZk9wQzVsLVA2ZGljRmk1S09rbHU1NVJLbXZZamVNa2JzSV9pR1M5YmpVM1ZhTDFwWmE4eEZta3JUQ2NOb29zcWFfZ2RFMkZEMS1yem8zaFZQMEExNF8yNjhBczI5M281VWZONnV3NV8yQ19VRFdCSllpWmpvdVFfUVZ6TnNGd0dYS3NJRGQtUjl4YWlhQmxIQmpBclM4QVZuREN4ckotajdCVlh4UjBRZmhqLUt6Ukt4SXp5Um5mLS1EamZHVVVLQzlPOHRISUhMMHVCUVNfSlNvUzMzVDMtNnFlTWJMTVRiYnF3aERaZm9yc0ZUM2VRQ3QxQTZ0SHgzT3FQTnhmSDhPX0g4RG15eExuSHRhdyIsIm9hdXRoX3Rva2VuIjoiRUFBQnd6TGl4bmpZQk94akxsaWF2MUlKdlpBSjd1cE5pV0lzYTVRMUUxWXU1SllBc244bWJjY29sZ0pMNU45NDNERWM0Qml0MGJvUkZuVjlFNUFnSm1jQzVCMXVublpDN0NzVUh6eXJaQnF6VmRBR1NlS0p4d1BJWFpDbm1OM3RyZ3lkSlFNQ0FkYTB0QnNja2dHcWpkcVJ2N3diNkkzS3BxQkpPWVlkSVZNOVNrZTZhbkVKa2w4SE1PbjF4Z0RDYXdld1pEIiwiYWxnb3JpdGhtIjoiSE1BQy1TSEEyNTYiLCJpc3N1ZWRfYXQiOjE3MDQ3NDk3ODF9; rur="NHA\05461013886138\0541736286104:01f7c01305a83dd28ab99d8eb3588d003f041400719e10bd58c582627384a44bc6768429"',
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
            'X-Csrftoken': 'xl32QuXdjPdCJv5Cj43OO4GJytGwQG3z',
            'X-Ig-App-Id': '936619743392459',
            'X-Ig-Www-Claim': 'hmac.AR2kovJ4-DcOAF0d43NiUcqAx69DUcqPe2rRZLMjoHsdi9v6',
            'X-Requested-With': 'XMLHttpRequest'
        }
        
        
        
        base_url = "http://localhost/ihassio/instaapi/"
        
        
        
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
        
        atraso = random.uniform(30, 60)
        time.sleep(atraso)
        
        response = requests.get(url, headers=headers)

        if response.status_code == 200:

            data = json.loads(response.content)
            # print(data['data']['user']['username'])
            return data
        
        else:
            
            atraso = random.uniform(600, 1200)
            print('[!!] Erro de Requisicao, aguardando: '+str(atraso)+' minutos.')
            time.sleep(atraso)
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
                        'email': self.extractEmail(user_data['data']['user']['business_email'], user_data['data']['user']['biography'], links),
                        'telefone': self.extractTelefone(user_data['data']['user']['business_phone_number'], links),
                    }
                
                
                self.addInstaLead( base_url, persona)
          
            except Exception as e:
                print('[**] Erro ao capturar person:', e)
    
    def extractEmail(self, email, biografia, links):
        
        if  email != None:
            
            print('verificando email')
            
            return email
        
        elif self.extrair_email_bio( biografia) != False:
            
            print('verificando email na bio')
            
            return self.extrair_email_bio( biografia)
        
        else:
            print('verificando email link externo')
            return False
            
    def extractTelefone(self, telefone, links):
        
        if  telefone != None:
            print('verificando telefone')
            
            return telefone
        
        elif self.extrair_numero_whatsapp(links) != False:
            
            print('verificando telefone na bio')
            
            return self.extrair_numero_whatsapp( links)
        
        else:
            print('verificando telefone link externo')
            return False
            
    def extrair_email_bio(self, biografia):
        # Expressão regular para encontrar e-mails válidos
        padrao_email = r'\b[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Z|a-z]{2,}\b'

        # Encontrar e-mails na string fornecida
        match = re.search(padrao_email, biografia)
        
        # Retornar lista de e-mails encontrados
        if match:
            return match.group()
        else:
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
                return False
                print("Link do WhatsApp, mas número não encontrado.")
        else:
            return False
            print("É um link externo")
    # Função para verificar se o número segue o padrão [55][ddd][9][número de 9 dígitos]
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