# per-voi-wagliuni-DNA

Dentro z-doc, ho editato il docker-composer.yml eliminando alcuni container non necessari e
impostato alcune variabili per velocizzare il tempo di sviluppo e montaggio dello stack docker.
Ovvero:

## .env (Docker)
```
APP_CODE_PATH=../../
```

## docker-compose

Prima
```
machine:
    image: dnafactory/machine
    volumes:
      - apps:/var/www
      - sites:/etc/nginx/sites-enabled
      - logs:/var/log
```
Sostituito il volume apps (gestito da docker, accessibile solo da dentro i containers) con un percorso fisico montato nel container.

Dopo
```
machine:
    image: dnafactory/machine
    volumes:
      - ${APP_CODE_PATH}:/var/www/html
```
In questo modo avviato il container con nginx e dato il comando "service nginx start" e "service php7.3-fpm start" per avviare il demone "php", ci troviamo nginx che ha come root server direttamente la struttura di cartelle dell'app laravel

## Installazione laravel

Nella root del progetto, trovate il .env gia configurato per lo stack docker presente, ovviamente per effettuare un test date il comando 

```
composer install
```
e successivamente per verificare la connessione al DB:
```
vendor/bin/phpunit tests/Unit/CheckDBTest.php
```

## Lista esercizi
A questo punto trovate nella cartella
```
App/Exercise
```
Gli esercizi risolti, non vi basta altro che dare i comando seguenti per testare singolarmente gli esercizi:

#### \App\Exercise\One
```
vendor/bin/phpunit --filter testExercise tests/Unit/ExerciseOneTest.php
```

#### \App\Exercise\Two
```
vendor/bin/phpunit --filter testExercise tests/Unit/ExerciseTwoTest.php
```
#### \App\Exercise\Three
```
vendor/bin/phpunit --filter testExercise tests/Unit/ExerciseThreeTest.php
```
#### \App\Exercise\Four
```
vendor/bin/phpunit --filter testExercise tests/Unit/ExerciseFourTest.php
```
#### \App\Exercise\Five
```
vendor/bin/phpunit --filter testExercise tests/Unit/ExerciseFiveTest.php
```
#### \App\Exercise\Six
```
vendor/bin/phpunit --filter testExercise tests/Unit/ExerciseSixTest.php
```
