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
        sql = "SELECT * FROM traffic_analysis WHERE processado = 1 "

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
    
def update_to_database(id, total_visits, unique_visits):
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
        sql = "UPDATE traffic_analysis SET total_visits = %s, unique_visits= %s, processado=%s WHERE id = %s"

        # Executar a instrução SQL de atualização com os valores fornecidos
        cursor.execute(sql, (total_visits, unique_visits, 2, id))

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
    
def tem_mil(valor):
    return 'mil' in valor

def tem_mi(valor):
    return 'mi' in valor

def tem_bi(valor):
    return 'bi' in valor

def replace_mil(valor):
    return float(valor.replace(' mil', '').replace(',', '.')) * 1000

def replace_mi(valor):
    return float(valor.replace(' mi', '').replace(',', '.')) * 1000000

def replace_bi(valor):
    return float(valor.replace(' bi', '').replace(',', '.')) * 1000000000

def formatar_valor(valor):
    if tem_mil(valor):
        return replace_mil(valor)
    elif tem_mi(valor):
        return replace_mi(valor)
    elif tem_bi(valor):
        return replace_bi(valor)
    else:
        # Se o formato não for reconhecido, retorna o valor original
        return valor



# driver = webdriver.Firefox()
    
# driver.get("https://pt.semrush.com/login/")
# next = input('Depois de fazer login aperte enter: ')
    
    
dados = get_to_database()
    
for data in dados:
    id = data[0]
    total_visitas = data[7]
    visitas_unicas = data[8]
    
    total_visitas_formatado = formatar_valor(total_visitas)
    visitas_unicas_formatado = formatar_valor(visitas_unicas)

    print(f'ORIGINAL TOTAL VISITAS: {total_visitas} | {total_visitas_formatado}')
    print(f'ORIGINAL VISITAS UNICAS: {visitas_unicas} | {visitas_unicas_formatado}')
    # print(f'TAXA: {visitas_unicas} | {visitas_unicas_formatado}')

 


    update_to_database(id, total_visitas_formatado, visitas_unicas_formatado)
                
    # except Exception as e:
    #     print(e)
    