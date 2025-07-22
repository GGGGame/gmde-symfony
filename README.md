# Esercitazione Pimcore 11

#### **Descrizione:**

1. **Importazione da CSV:**
   
   - Creare un comando Symfony (`bin/console app:import-cars path/al/file.csv`) che importi un file CSV contenente informazioni di automobili da salvare in Pimcore.
   
   - La prima riga del CSV contiene l'header da cui è possibile recuperare tutte informazioni degli oggetti.
   
   - Il candidato dovrà creare il DataObject in Pimcore più strutturato possibile per rappresentare le informazioni contenute all'interno del CSV.
   
   - Durante l'import, gestire duplicati (aggiornare l'oggetto esistente se è già stato importato in precedenza) e loggare eventuali errori o anomalie.
     
     - **[NiceToHave]** Utilizzare l'ApplicationLogger di Pimcore per memorizzare gli errori o le anomalie.

2. **API di dettaglio:**
   
   - Creare un endpoint API REST (`/api/models/{id}`) che restituisca i dettagli di un oggetto, serializzando i dati in formato JSON.
     
     - Ovviamente non è obbligatorio inserire TUTTI i dati, ma almeno quelli principali e qualcuno di esempio.

3. **API di ricerca:**
   
   - Creare un endpoint API REST (`/api/models/search?query=...`) che cerchi sugli oggetti in base a una ricerca *contains* sul campo che sul CSV è indicato come `Model`.
   
   - L'API dovrà restituire un elenco di risultati contenente solo informazioni di base (es. `id`, `name`, `model`).

---

#### **Requisiti tecnici:**

- Utilizzare Pimcore 11.

- Usare le best practice di Symfony per Command, Controller, Dependency Injection e Routing.

- Utilizzare i DataObject di Pimcore per modellare i dati.

- Scrivere codice chiaro e mantenibile, con adeguati commenti e logging dove necessario.

---

#### **Consegna:**

- Repository Git (GitHub o altro) o file ZIP con il codice completo.

- Eventuale README con breve spiegazione delle scelte fatte, requisiti di ambiente e istruzioni di esecuzione (installazione, import, test delle API).

---
---

## 🚀 Installazione

```bash
git clone <repository-url>
cd gmde-symfony
composer install
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
```

---

## 📥 Importazione CSV

```bash
php bin/console app:import-cars ./public/vehicle.csv -b {BatchSize}
```


- Il comando importa i dati in batch (default: 1000 record per batch).
- il parametro -b è opzionale.
- Errori e warning vengono loggati in `var/log/`.
- I duplicati vengono aggiornati, non reinseriti.

---

## 🔎 API REST

### Dettaglio veicolo

```
GET /api/models/{id}
```
**Risposta:**  
```json
{
  "id": 1,
  "brand": "Tesla",
  "model": "Model S",
  "year": 2023,
  "engine": { ... },
  "fuelSpecs": { ... },
  ...
}
```

### Ricerca veicoli

```
GET /api/models/search?query=ferrari
```
**Risposta:**  
```json
[
  {
    "id": 1,
    "brand": "Tesla",
    "model": "Model S"
  },
  ...
]
```

- E' possibile modificare la paginazione inserendo i parametri:

```
GET /api/models/search?query=ferrari&page=2&limit=10
```

---

## 📝 Note

- **Configurazione batch:** modificabile in `GenericImporter`.
- **Logging:** consultare `var/log/dev.log` per dettagli su errori e progressi.
- **Validazione:** i vincoli sono definiti tramite annotazioni Symfony Validator sulle Entity.

---