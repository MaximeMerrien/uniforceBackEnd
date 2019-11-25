# SonarQube

Lien vers [SonarQube](https://www.sonarqube.org/downloads/)

Lien vers le [Scanner](https://docs.sonarqube.org/latest/analysis/scan/sonarscanner/)

**Attention :** Il faut au moins le [JDK 11](https://www.oracle.com/technetwork/java/javase/downloads/jdk11-downloads-5066655.html) pour que Sonar puisse fonctionner

***

* Télécharger **SonarQube** et le **Scanner**
* Lancer le serveur Sonar en allant dans _<install_folder>\bin\windows-x86-64_ et en cliquant sur **StartSonar**
* Aller sur http://localhost:9000, et se loger avec _admin / admin_
* Cliquer sur le **+** et faire **Create new project** (_Project key : uniforce_, _Display name : uniforce_)
* Pour le token, mettre quelque chose du style _uniforce_nom_ (**e.g.** uniforce_maxime)

Pour analyser le projet, il faut avoir un fichier de configuration sonar (sonar-project.properties)
* Mettre le Scanner dans son **PATH** (variable d'environnement système -> **e.g.** _C:\Users\maxim\Documents\IMIE\A5\sonar-scanner-cli-4.2.0.1873-windows\sonar-scanner-4.2.0.1873-windows\bin_)
* Ouvrir une invite de commande, se déplacer dans le dossier du projet **uniforce**, et faire **sonar-scanner -D"sonar.projectKey=uniforce" -D"sonar.sources=." -D"sonar.host.url=http://localhost:9000" -D"sonar.login=_tokenInterface_"**
