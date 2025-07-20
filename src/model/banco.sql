#CREATE DATABASE SR_CTISM;
#USE SR_CTISM;

#Tabela dos administradores
CREATE TABLE IF NOT EXISTS administrador(
	num INT AUTO_INCREMENT PRIMARY KEY,
    nome varchar(99) NOT NULL,
    cod INT UNIQUE NOT NULL
);

#Tabela dos alunos
CREATE TABLE IF NOT EXISTS alunos(
	num INT AUTO_INCREMENT PRIMARY KEY,
    nome varchar(99) NOT NULL,
    matricula INT UNIQUE NOT NULL
);

#Tabela de mensagens
CREATE TABLE IF NOT EXISTS mensagem(
	num INT AUTO_INCREMENT PRIMARY KEY,
    upVotes INT DEFAULT 0,
    downVotes INT DEFAULT 0,
    dono INT,
    mensagem TEXT NOT NULL,
    
    FOREIGN KEY (dono) REFERENCES alunos(matricula)
);

#Tabela de mensagens denunciadas
CREATE TABLE IF NOT EXISTS denuncias(
	num INT PRIMARY KEY AUTO_INCREMENT,
    mensagem_id INT,
    denunciante_id INT,
    #UNIQUE para que se possa votar somente uma vez por mensagem
    UNIQUE (denunciante_id, mensagem_id),
    motivo TEXT,
    data_hora DATETIME DEFAULT CURRENT_TIMESTAMP,
    
    FOREIGN KEY (denunciante_id) REFERENCES alunos(matricula),
    FOREIGN KEY (mensagem_id) REFERENCES mensagem(num)
);

#Tabela de usuários banidos
CREATE TABLE IF NOT EXISTS banidos(
	id_banido INT ,
    id_moderador INT,
    PRIMARY KEY (id_banido, data_banimento_inicio),
    motivo TEXT,
    data_banimento_inicio DATETIME DEFAULT CURRENT_TIMESTAMP,
    data_banimento_fim DATETIME,
    
    FOREIGN KEY (id_banido) REFERENCES alunos(matricula),
    FOREIGN KEY (id_moderador) REFERENCES administrador(cod)
);

#Tabela de mensagens mais votadas
CREATE TABLE IF NOT EXISTS mensagens_mais_votadas(
	cod INT PRIMARY KEY AUTO_INCREMENT,
	id_mensagem INT,
    id_dono INT,
    #Não pode ser vazio pois precisa de no mínimo 1 voto
	num_votos INT NOT NULL,
	
    FOREIGN KEY (id_mensagem) REFERENCES mensagem(num),
    FOREIGN KEY (id_dono) REFERENCES alunos(matricula)
);