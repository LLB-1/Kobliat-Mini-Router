# 🚦 Kobliat Mini Router

A `Laravel` based test project to show case API enpoints and user friendly GUI experiences.

---

## 🧰 Installation

### 📦 Dependencies

Ensure the following tools are installed on your system:

* 🐘 **PHP** (8.4)
* 🎼 **Composer**
* 🟢 **Node.js**
* 📦 **NPM**
* 🗄️ **SQLite3**

---

### 🐘 PHP & 🎼 Composer

Run the command that matches your operating system:

#### 🐧 Linux

```bash
/bin/bash -c "$(curl -fsSL https://php.new/install/linux/8.4)"
```

#### 🍎 macOS

```bash
/bin/bash -c "$(curl -fsSL https://php.new/install/mac/8.4)"
```

#### 🪟 Windows

```powershell
# Run as administrator
Set-ExecutionPolicy Bypass -Scope Process -Force;
[System.Net.ServicePointManager]::SecurityProtocol = \
  [System.Net.ServicePointManager]::SecurityProtocol -bor 3072;
iex ((New-Object System.Net.WebClient)
  .DownloadString('https://php.new/install/windows/8.4'))
```

---

### 🗄️ SQLite3

Install SQLite3 using the following commands:

#### 🐧 Linux

```bash
sudo apt install sqlite3
```

#### 🍎 macOS

```bash
brew install sqlite
```

#### 🪟 Windows

⬇️ Download directly from:

👉 [https://www.sqlite.org/download.html](https://www.sqlite.org/download.html)

---

### 🧬 Clone from GitHub

Choose a directory for the project and run:

```bash
git clone https://github.com/LLB-1/Kobliat-Mini-Router.git
```

---

### ⚙️ Environment Setup

1. Locate the `.env.example` file
2. **Copy & paste** it in the same directory
3. Rename the copy to `.env`

---

### 📦 Install Project Dependencies

Run the following commands from the project root:

```bash
composer install
npm install
npm run build
php artisan migrate   # choose "yes" when prompted
php artisan key:generate
```

---

### 🗃️ Seed Required Database Record

Before using the application, **manually insert** one record into the `customers` table.

The fields **must match exactly**:

| id | name    | external_id | created_at          | updated_at          |
| -- | ------- | ----------- | ------------------- | ------------------- |
| 0  | Kobliat | 0           | 2025-12-14 16:30:45 | 2025-12-14 16:30:45 |

---

## ▶️ Run the Application

From the project root, run:

```bash
composer run dev
```

In your terminal, **Ctrl + Click** the local URL (example below) or open it manually in your browser:

```text
INFO  Server running on [http://127.0.0.1:8001]
```

---

## 🧪 Testing the API

Use the following `curl` commands while the application is running.

---

### ✉️ Send a Message

```bash
curl -X POST http://localhost:8000/api/messages \
  -H "Content-Type: application/json" \
  -d '{
    "external_user_id": 1,
    "customer_name": "John Doe",
    "message": "Hello, I need assistance",
    "message_id": "msg_123",
    "sent_at": "2025-12-14 20:30:00"
  }'
```

---

### 📜 Get All Conversations

```bash
curl http://localhost:8000/api/conversations \
  -H "Accept: application/json"
```

---

### 💬 Get a Single Conversation

```bash
curl http://localhost:8000/api/conversations/{conversation_id} \
  -H "Accept: application/json"
```

---

✅ You are now ready to use **Kobliat Mini Router**.

## 🛠️ Developer Notes

### 📌 Assumptions

* 🔐 **User authentication is intentionally omitted** from this project.

  * All non-external (local) messages are associated with a default `user_id = 0`.
* 📡 **API requests require all fields to be populated**.

  * For successful responses, follow the example `curl` commands exactly and ensure no fields are omitted or left empty.

---

### 🔄 What Would I Change?

#### 🎨 Styling Best Practices

* The frontend correctly leverages **slots** and **reusable components** ,however, **styling is fully hard-coded** within components.
* A cleaner and more scalable approach would be to:

  * Centralize styles in `app.css`
  * Introduce reusable utility classes or a design system

This would satisfy my personal standards more for frontend work.

---

#### 📚 Documentation

* Existing documentation is minimal and mostly uses the default `Laravel` comments made from `Artisan` etc.
* The project would benefit from:

  * More in-depth inline comments
  * Clear function- and class-level documentation
  * Explicit explanations of API contracts and data flow

---

#### 🔐 Authentication

* Adding authentication would remove the **ad-hoc handling** of local user messages.
* The current `user_id = 0` solution is a temporary, styled workaround.
## 📝 Personal Note

### 📖 Summary
This project represents my first experience working with **Laravel** outside of a guided tutorial. As a result, I significantly exceeded the original **3-hour time estimate**. Slowly I put effort towards gaining understanding of Laravel’s **MVC architecture** and routing mechanisms.

The experience was incredibly educational. As the day went on, things started to click, and towards the end of the process I was relying less and less on the assistance of AI and documentation and was able to solve problems independently. 

The `Laravel Bug` may have bitten me and more personal projects are stewing in the back of my mind.

---

### 📚 Learning Materials
Before starting this project, I worked through an introductory tutorial from the official Laravel documentation:

- https://laravel.com/learn/getting-started-with-laravel/what-are-we-building

I also referenced the standard Laravel documentation throughout development:

- https://laravel.com/docs/12.x

Additionally, the use of an **LLM** helped accelerate my learning process, explaining Laravel-specific conventions, behaviors, and framework features.
