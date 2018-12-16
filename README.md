
# Despegar
 An small booking project for testing purpose

## Requirements
- PHP ^7.1
- Composer ^1.6.5
- MySQL ^5.7

## Installation Instructions

1. Download the repository from github:
    - git clone https://github.com/phmarcano/despegar.git
   
2. Inside the folder despegar, execute:
    - composer install
  
3. Import the file dump.sql to MySql:
    - /despegar/data/dump.sql

4. Set your mysql credentials in the file: 
    - /despegar/.env

5. Open the web browser and go to the URL:
    - {Your server path}/index.php?controller=booking&action=create