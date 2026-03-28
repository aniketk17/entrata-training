# 🗄️ Database Module – Work Summary

## 📌 Overview

As part of my pre-training preparation, I completed the Database module with a focus on both conceptual understanding and practical implementation. This repository contains all the artifacts created during the learning process.

---

## 🎯 What I Have Done

### 1. Understood Database Fundamentals

I studied the basics of databases, including:

* What a database is and why it is used
* Different types of databases (Relational and Non-relational)
* The role of DBMS and how RDBMS differs from it

---

### 2. Practiced SQL Basics

I implemented core SQL operations on a sample schema:

* Created tables using `CREATE TABLE`
* Performed data insertion, updates, and deletion
* Retrieved data using `SELECT` queries

📁 Implemented in:

* `basics/schema.sql`
* `basics/queries.sql`

---

### 3. Worked with SQL Joins

I practiced combining data from multiple tables using:

* INNER JOIN
* LEFT JOIN
* RIGHT JOIN

I used these joins to model relationships between users and their orders.

---

### 4. Explored PostgreSQL Features

While working with PostgreSQL, I:

* Used `SERIAL` for auto-increment fields
* Applied constraints such as PRIMARY KEY, FOREIGN KEY, UNIQUE, and CHECK
* Added indexes to improve query performance
* Used clauses like `LIMIT`, `OFFSET`, and `RETURNING`

📁 Implemented in:

* `basics/schema.sql`

---

### 5. Implemented SQL Functions

I created and tested:

* Aggregate queries (`COUNT`, `SUM`, `AVG`)
* Custom functions using PL/pgSQL
* Functions returning scalar values and result sets

📁 Implemented in:

* `advanced/functions.sql`

---

### 6. Implemented Triggers

I implemented triggers to automate database behavior:

* Logging on INSERT, UPDATE, and DELETE operations
* Conditional trigger for tracking status changes

This helped me understand event-driven execution inside the database.

📁 Implemented in:

* `advanced/triggers.sql`

---

### 7. Integrated Database with PHP

I connected PostgreSQL with PHP and:

* Established database connection using `pg_connect()`
* Executed queries and fetched results
* Understood how backend applications interact with databases

📁 Implemented in:

* `php-integration/db_connect.php`

---
