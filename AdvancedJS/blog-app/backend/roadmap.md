# 🚀 Blog Application Backend Roadmap (Updated with Categories & Voting)

## 📌 Overview

This roadmap extends the blog backend to include:

* **Categories (e.g., Coding, Entertainment)**
* **Upvotes / Downvotes system**

---

# 🏗️ 1. Updated Database Design

## 🔹 User Schema

```js
{
  name: String,
  email: { type: String, unique: true },
  password: String,
  isVerified: Boolean,
  createdAt: Date
}
```

---

## 🔹 Category Schema (NEW)

```js
{
  name: { type: String, unique: true }, // e.g. Coding, Entertainment
  createdAt: Date
}
```

👉 Pre-populate common categories:

* Coding
* Entertainment
* Tech
* Lifestyle

---

## 🔹 Post Schema (UPDATED)

```js
{
  title: String,
  content: String,
  author: ObjectId (ref: User),

  category: ObjectId (ref: Category), // NEW

  imageUrl: String,

  upvotes: [ObjectId],   // users who upvoted
  downvotes: [ObjectId], // users who downvoted

  createdAt: Date,
  updatedAt: Date
}
```

---

# 🔁 2. Voting Logic (IMPORTANT)

## Rules:

* A user can:

  * ✅ Upvote OR Downvote
  * ❌ Not both at same time
* Clicking again → remove vote (toggle)

---

## 🧠 Voting Algorithm

### 🔹 Upvote

```js
if (post.upvotes.includes(userId)) {
  // remove upvote (toggle)
  post.upvotes = post.upvotes.filter(id => id !== userId);
} else {
  post.upvotes.push(userId);
  post.downvotes = post.downvotes.filter(id => id !== userId);
}
```

---

### 🔹 Downvote

```js
if (post.downvotes.includes(userId)) {
  post.downvotes = post.downvotes.filter(id => id !== userId);
} else {
  post.downvotes.push(userId);
  post.upvotes = post.upvotes.filter(id => id !== userId);
}
```

---

## 🔢 Vote Count

```js
const score = post.upvotes.length - post.downvotes.length;
```

---

# 🧩 3. API Updates

---

## 📂 Category Routes (NEW)

| Method | Endpoint    | Description        |
| ------ | ----------- | ------------------ |
| POST   | /categories | Create category    |
| GET    | /categories | Get all categories |

---

## 📝 Post Routes (UPDATED)

| Method | Endpoint               | Description                 |
| ------ | ---------------------- | --------------------------- |
| POST   | /posts                 | Create post (with category) |
| GET    | /posts                 | Get all posts               |
| GET    | /posts?category=coding | Filter by category          |
| PUT    | /posts/:id             | Update post                 |
| DELETE | /posts/:id             | Delete post                 |

---

## 👍 Voting Routes (NEW)

| Method | Endpoint            | Description   |
| ------ | ------------------- | ------------- |
| POST   | /posts/:id/upvote   | Upvote post   |
| POST   | /posts/:id/downvote | Downvote post |

---

# 🔍 4. Filtering & Query Features

## 🔹 Filter by Category

```bash
GET /posts?category=CODING_ID
```

---

## 🔹 Sort by Popularity

```bash
GET /posts?sort=popular
```

### Logic:

* Sort by `(upvotes - downvotes)`

---

## 🔹 Sort by Latest

```bash
GET /posts?sort=latest
```

---

# 🛡️ 5. Validation Updates

* Ensure category exists before assigning
* Prevent duplicate category names
* Validate vote actions (user must be logged in)

---

# ⚙️ 6. Controller Responsibilities

## 🔹 Category Controller

* Create category
* Get all categories

## 🔹 Post Controller

* Create post with category
* Fetch posts with filters
* Handle sorting

## 🔹 Vote Controller (can be separate or inside post)

* Upvote logic
* Downvote logic

---

# 📦 7. Example Request Payload

## Create Post

```json
{
  "title": "Understanding Node.js",
  "content": "Event loop explained...",
  "category": "CATEGORY_ID"
}
```

---

# 📊 8. Response Example

```json
{
  "title": "Understanding Node.js",
  "category": "Coding",
  "upvotes": 10,
  "downvotes": 2,
  "score": 8
}
```

---

# 🔥 9. Advanced Enhancements

* Prevent spam voting (rate limit)
* Add “trending posts” (based on score + time)
* Cache popular posts (Redis)
* Add comments system

---

---


A **feature-rich blog backend** similar to:

* Medium (categories)
* Reddit (upvotes/downvotes)

---
