CREATE TABLE users (
  id INT PRIMARY KEY,
  name VARCHAR(100),
  email VARCHAR(100),
  password VARCHAR(100)
);

CREATE TABLE skills (
  id INT PRIMARY KEY,
  user_id INT,
  skill_name VARCHAR(100),
  type VARCHAR(10)
);
