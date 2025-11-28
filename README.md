# Serial Enforcing Interface Database

A simple **web-based criminal records management system** built with **PHP**, **MySQL**, and **HTML/CSS**.  
The project allows creating, viewing, updating, and deleting **person profiles** and their associated **criminal records**.

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

- **Frontend:** HTML5, CSS3  
- **Backend:** PHP 7+  
- **Database:** MySQL (tested with MariaDB)  
- **File Handling:** JSON intermediary for staging profile data before database commit  

---


