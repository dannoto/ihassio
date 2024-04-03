import pandas as pd
import mysql.connector

# Pega os dados de checkout das planilhas vindas do semrush e joga no banco de dados

# Caminho para a planilha
caminho_planilha = r'C:\Users\danta\Documents\SEMRUSH\CLICKBANK\CLICKBANK.xlsx'  # Substitua pelo caminho correto

# Carregar a planilha
dados = pd.read_excel(caminho_planilha)

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
    
def update_to_database():
    return True

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
    
    

# Iterar sobre as linhas da planilha
for index, row in dados.iterrows():
    
  
    print("Domain:", row['Domain'])
    print("Category:", row['Category'])
    print("Source Type:", row['Source Type'])
    print("Traffic Share:", row['Traffic Share'])
    print("Visits:", row['Visits'])
    print("Changes:", row['Changes'])
    print("Total Visits:", row['Total Visits'])
    print("Unique visits:", row['Unique visits'])
    print("Month:", row['Month'])
    print("Platform:", row['Platform'])  # Adicione esta linha se a coluna Platform existir na planilha
    processado = 0 
    
    add_to_database(row['Domain'], row['Category'], row['Source Type'],  row['Traffic Share'], row['Visits'], row['Changes'], row['Total Visits'], row['Unique visits'],  row['Month'], row['Platform'], processado)

    