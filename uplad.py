import base64
import sqlite3
import os
import mysql.connector
import logging

# Conectar ao banco de dados SQLite (se não existir, será criado)

mydb = mysql.connector.connect(
            host="localhost",
            user="root",
            password="",
            database="ihassio"
        )

        # Cria o cursor para executar as queries
cursor = mydb.cursor()
# Criar a tabela se ainda não existir
# cursor.execute('''
#     CREATE TABLE IF NOT EXISTS person_classificacao_imagem (
#         person_id INTEGER,
#         imagem TEXT,
#         is_delete INTEGER,
#         type TEXT
#     )
# ''')

# Configurações padrão
person_id = 14
is_delete = 0

# Caminho para a pasta com as imagens e vídeos
caminho_pasta = r'C:\xampp\htdocs\ihassio\naillycarvalho'

# Iterar sobre os arquivos na pasta
for arquivo in os.listdir(caminho_pasta):
    caminho_arquivo = os.path.join(caminho_pasta, arquivo)

    # Verificar se é um arquivo de imagem (.jpg)
    if arquivo.lower().endswith('.jpg'):
        with open(caminho_arquivo, 'rb') as imagem_arquivo:
            imagem_base64 = base64.b64encode(imagem_arquivo.read()).decode('utf-8')

            # Inserir na tabela
        
            
            sql = " INSERT INTO person_classificacao_imagem  ( person_id, imagem, is_deleted, type) VALUES (%s, %s, %s, %s)"
            val = (person_id, imagem_base64, is_delete, 'imagem')
            print('Foi imaem ')
            cursor.execute(sql, val)
            mydb.commit()
      

    # Verificar se é um arquivo de vídeo (.mp4)
    # elif arquivo.lower().endswith('.mp4'):
    #     with open(caminho_arquivo, 'rb') as video_arquivo:
    #         video_base64 = base64.b64encode(video_arquivo.read()).decode('utf-8')

    #         # Inserir na tabela
    #         sql = " INSERT INTO person_classificacao_imagem  ( person_id, imagem, is_deleted, type) VALUES (%s, %s, %s, %s)"
    #         val = (person_id, video_base64, is_delete, 'video')
    #         print('Foi video ')

    #         cursor.execute(sql, val)
    #         mydb.commit()
         
# Commitar as mudanças no banco de dados
# cursor.commit()

# Fechar a conexão
cursor.close()
