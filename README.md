# Serial Enforcing Interface Database

A simple **web-based criminal records management system** built with **PHP**, **MySQL**, and **HTML/CSS**.  
The project allows creating, viewing, updating, and deleting **person profiles** and their associated **criminal records**.

---

<img width="722" height="560" alt="Screenshot 2025-11-28 152613" src="https://github.com/user-attachments/assets/e97d7aa9-df3b-4dc3-8e15-60138ff914a5" />
<img width="1194" height="822" alt="Screenshot 2025-11-28 152632" src="https://github.com/user-attachments/assets/832ad64b-43f1-4a5f-bbfe-e1969f809798" />

---

## Features

- **Profile Management**
  - Create a new profile with:
    - Picture upload
    - First, middle, and last names
    - Date of birth
    - State of residence
  - View existing profiles
  - Delete profiles

- **Criminal Record Management**
  - Add multiple criminal offenses per profile
  - Each record includes:
    - Offense date
    - Type of offense
    - Disposition outcome
    - Detailed location (prefix, street, unit, city, state, ZIP, county)
    - Sentence/penalty (optional)
  - Delete individual offenses

- **Landing Page**
  - Navigation to:
    - Profile catalog
    - Profile creation form
    - External “Exit” link

---

## Tech Stack

- **Frontend:** HTML5, <img width="1041" height="529" alt="Screenshot 2025-11-28 152205" src="https://github.com/user-attachments/assets/8d60882a-d29e-4e0d-8a60-1e1441a660d6" />
CSS3  
- **Backend:** PHP 7+  
- **Database:** MySQL (tested with MariaDB)  
- **File Handling:** JSON intermediary for staging profile data before database commit  

---
Profile pictures are AI-generated using thispersondoesnotexist.com
This project is **educational** and not intended for production use.
