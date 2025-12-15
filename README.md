# Kobliat Mini Router

## Installation

### Dependencies

To run this application you will need the follwing to be installed on your device:

-   PHP
-   Composer
-   Node
-   NPM
-   SQLite3

#### PHP & Composer

Run the following command according to your operating system.

##### Linux

```
/bin/bash -c "$(curl -fsSL https://php.new/install/linux/8.4)"
```

##### macOS

```
/bin/bash -c "$(curl -fsSL https://php.new/install/mac/8.4)"

```

##### Windows

```
# Run as administrator...
Set-ExecutionPolicy Bypass -Scope Process -Force; [System.Net.ServicePointManager]::SecurityProtocol = [System.Net.ServicePointManager]::SecurityProtocol -bor 3072; iex ((New-Object System.Net.WebClient).DownloadString('https://php.new/install/windows/8.4'))

```

### SQLite3

Run the following command for SQLite3

#### Linux

```
sudo apt install sqlite3

```

#### macOS

```
brew install sqlite

```

#### Windows

Download from: https://www.sqlite.org/download.html

### Clone from Git Hub

Pick the directory you wish to keep the project files and run the following command.

```
git clone https://github.com/LLB-1/Kobliat-Mini-Router.git
```

### Copy .env.example

In the file structure of the project, find `.env.example` and **copy** **& paste**
the file and rename it to `.env`

### Run Dependencies

Run

```
composer install
npm install
npm run build
php artisan migrate (choose yes)
php artisan key:generate

```

### Edit database field

Before using the application, you must add one record into the `customers` .
The fields must be exactly as follows

| id  | name    | external_id | created_at          | updated_at          |
| --- | ------- | ----------- | ------------------- | ------------------- |
| 0   | Kobliat | 0           | 2025-12-14 16:30:45 | 2025-12-14 16:30:45 |

## Run the Application

Now that everything has been sucessfully installed, you can simply run the following command in the route directory of the project in the terminal:

```
compser run dev
```

In the terminal **ctr+click** on the local host URL to open the application eg. `NFO  Server running on [http://127.0.0.1:8001].` or head to your local host in your chosen web browser.

## Testing the API

Execute the following cUrl commands in your terminal while running the application in order to test teh API.

### Send Message to Kobliat

```
curl -X POST http://localhost:8000/api/messages \
  -H "Content-Type: application/json" \
  -d '{"external_user_id":1,"customer_name":"John Doe","message":"Hello, I need assistance","message_id":"msg_123","sent_at":"2025-12-14 20:30:00"}'
```

### Get List of Conversations

```
curl http://localhost:8000/api/conversations -H "Accept: application/json"
```

### Get a Conversation

```
curl http://localhost:8000/api/conversations/{conversation_id} -H "Accept: application/json"
```
