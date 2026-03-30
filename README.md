Valisin harjutuse keskkonnaks WSL Ubuntu, pääsen ligi CMD-s.

Andmebaasi paigaldamine:
  Kasutatud käsud:
  
      sudo apt update
      sudo apt install mariadb-server -y
      
      mariadb --version
        mariadb  Ver 15.1 Distrib 10.11.14-MariaDB, for debian-linux-gnu (x86_64) using  EditLine wrapper'
        
      systemctl status mariadb
        ● mariadb.service - MariaDB 10.11.14 database server
             Loaded: loaded (/usr/lib/systemd/system/mariadb.service; enabled; preset: enabled)
             Active: active (running) since Mon 2026-03-30 13:21:07 EEST; 3min 20s ago
  
MariaDB esmane turvaseadistus:

    sudo mysql_secure_installation
Lisasin root parooli
Unix_socket auth Y
remove anonymous users: Y
disallow root login remotely: Y
remove test database: Y
reload privilege tables: Y

Võrguturbe konfigureerimine:
muutsin faili /etc//mysql/mariadb.conf.d/50-server.cnf
<img width="330" height="82" alt="image" src="https://github.com/user-attachments/assets/f703cceb-5857-4940-b1d8-00a34205db4e" />

        sudo systemctl restart mariadb
         ss -tlnp | grep 3306
            LISTEN 0      80          127.0.0.1:3306      0.0.0.0:*
<img width="718" height="347" alt="image" src="https://github.com/user-attachments/assets/a398a682-774c-4795-b562-44982e992d1c" />

Githubist oma anmdebaasi kloonimine:

      git --version
      git clone https://github.com/kadrilaumets/cr
      cd ~/cr/db
      sudo mariadb -u root
      CREATE DATABASE cr;
      EXIT;
      sudo mariadb -u root cr < cr.sql

Kontroll:

      sudo mariadb -u root
      USE cr;
      SHOW TABLES;
      SELECT * FROM cars LIMIT 5;
      EXIT;
      
<img width="1018" height="490" alt="image" src="https://github.com/user-attachments/assets/056a19c1-e74a-4eb5-97f9-43dcb9304720" />

