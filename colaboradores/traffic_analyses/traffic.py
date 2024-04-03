import pandas as pd
import mysql.connector


import time

from selenium import webdriver
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.common.by import By

# Pega os dados do banco de dados e busca o trafego total no semrush


def get_to_database():
    
    try:
        # Conectar ao banco de dados MySQL
        conexao = mysql.connector.connect(
            host='localhost',
            user='root',
            password='',
            database='ihassio'
        )

        # Criar um cursor para executar comandos SQL
        cursor = conexao.cursor()

        # Definir a consulta SQL para obter os dados
        sql = "SELECT * FROM traffic_analysis WHERE processado = 0 "

        # Executar a consulta SQL
        cursor.execute(sql)

        # Recuperar todos os resultados da consulta
        dados = cursor.fetchall()

        return dados

    except mysql.connector.Error as erro:
        print("Erro ao conectar ao banco de dados:", erro)

    finally:
        # Fechar a conexão com o banco de dados
        if conexao.is_connected():
            cursor.close()
            conexao.close()
    
def update_to_database(id, total_visits, unique_visits, visit_per_page, average_duration, reject_tax):
    try:
        # Conectar ao banco de dados MySQL
        conexao = mysql.connector.connect(
            host='localhost',
            user='root',
            password='',
            database='ihassio'
        )

        # Criar um cursor para executar comandos SQL
        cursor = conexao.cursor()

        # Definir a instrução SQL de atualização
        sql = "UPDATE traffic_analysis SET total_visits = %s, unique_visits= %s, visit_per_page=%s, average_duration=%s, reject_tax=%s, processado=%s WHERE id = %s"

        # Executar a instrução SQL de atualização com os valores fornecidos
        cursor.execute(sql, (total_visits, unique_visits,  visit_per_page, average_duration, reject_tax, 1, id))

        # Confirmar a transação
        conexao.commit()

        print("Dados atualizados com sucesso.")

    except mysql.connector.Error as erro:
        print("Erro ao conectar ao banco de dados:", erro)

    finally:
        # Fechar a conexão com o banco de dados
        if conexao.is_connected():
            cursor.close()
            conexao.close()

def add_to_database(domain , category, source_type, traffic_share, visits, changes, total_visits, unique_visits, month, platform, processado):
    
    domain = str(domain) if not pd.isna(domain) else ''
    category = str(category) if not pd.isna(category) else ''
    source_type = str(source_type) if not pd.isna(source_type) else ''
    traffic_share = str(traffic_share) if not pd.isna(traffic_share) else ''
    visits = str(visits) if not pd.isna(visits) else ''
    changes = str(changes) if not pd.isna(changes) else ''
    total_visits = str(total_visits) if not pd.isna(total_visits) else ''
    unique_visits = str(unique_visits) if not pd.isna(unique_visits) else ''
    month = str(month) if not pd.isna(month) else ''
    platform = str(platform) if not pd.isna(platform) else ''
    
    # Conectar ao banco de dados MySQL
    conexao = mysql.connector.connect(
        host='localhost',  # Substitua pelo host do seu banco de dados
        user='root',  # Substitua pelo usuário do seu banco de dados
        password='',  # Substitua pela senha do seu banco de dados
        database='ihassio'  # Substitua pelo nome da sua base de dados
    )

    # Criar um cursor para executar comandos SQL
    cursor = conexao.cursor()

    # Definir a instrução SQL de inserção
    sql_insercao = """
        INSERT INTO traffic_analysis (domain, category, source_type, traffic_share, visits, changes, total_visits, unique_visits, month, platform, processado)
        VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)
    """

    # Valores da linha a serem inseridos na tabela
    valores = (domain, category, source_type, traffic_share, visits, changes, total_visits, unique_visits, month, platform, processado )

    # Executar a instrução SQL de inserção com os valores fornecidos
    cursor.execute(sql_insercao, valores)

    # Confirmar a transação
    conexao.commit()

    # Fechar a conexão com o banco de dados
    # conexao.close()
    
    

driver = webdriver.Firefox()
    
driver.get("https://pt.semrush.com/login/")
next = input('Depois de fazer login aperte enter: ')
    
    
dados = get_to_database()
    
for data in dados:
    id = data[0]
    dominio = data[1]
    plataform = data[10]

        
    # danrib2018@gmail.com
    # cco2023@
    
    # PAgina
    
    try:
        
        driver.get("https://pt.semrush.com/analytics/traffic/overview/?searchType=domain&q="+dominio)
        time.sleep(15)
        print(f'#{id} {dominio} - {plataform}')

        
        # visits totais
        total_visitas =  driver.find_element(By.CSS_SELECTOR, "#app-root > div:nth-child(2) > div:nth-child(2) > div:nth-child(1) > div:nth-child(5) > div:nth-child(3) > div:nth-child(1) > div:nth-child(1) > div:nth-child(1) > div:nth-child(1) > div:nth-child(1) > div:nth-child(1) > div:nth-child(1) > div:nth-child(1) > div:nth-child(2) > span:nth-child(1) > div:nth-child(1) > div:nth-child(1) > span:nth-child(1)").text
        #  Visitas unicas
        visitas_unicas =  driver.find_element(By.CSS_SELECTOR, "span.___SLink_15k1c_gg_ > span:nth-child(1)").text
        #  Pagina/visitas
        paginas_por_visita =  driver.find_element(By.CSS_SELECTOR, "#app-root > div:nth-child(2) > div:nth-child(2) > div:nth-child(1) > div:nth-child(5) > div:nth-child(3) > div:nth-child(1) > div:nth-child(1) > div:nth-child(1) > div:nth-child(1) > div:nth-child(1) > div:nth-child(1) > div:nth-child(1) > div:nth-child(7) > div:nth-child(2) > span:nth-child(1) > div:nth-child(1) > div:nth-child(1) > span:nth-child(1)").text
        # Duraçao media
        duracao_media =  driver.find_element(By.CSS_SELECTOR, "div.___SFlex_nssfg_gg_:nth-child(9) > div:nth-child(2) > span:nth-child(1) > div:nth-child(1) > div:nth-child(1) > span:nth-child(1)").text
        # Taxa de Rejeicao
        taxa_rejeicao =  driver.find_element(By.CSS_SELECTOR, "div.___SFlex_nssfg_gg_:nth-child(11) > div:nth-child(2) > span:nth-child(1) > div:nth-child(1) > div:nth-child(1) > span:nth-child(1)").text

        # total_visits = ""
        # unique_visits = ""
        print("Total Visitas", total_visitas)
        print("Visitas Únicas", visitas_unicas)
        print("Páginas por Visitas", paginas_por_visita)
        print("Duracao média", duracao_media)
        print("Taxa rejeicao", taxa_rejeicao)


        update_to_database(id, total_visitas, visitas_unicas, paginas_por_visita, duracao_media, taxa_rejeicao)
                
    except Exception as e:
        print(e)
    