Create Database "php_blog"

create table "users"

CREATE TABLE `users` (
  `id` int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` enum('Author','Admin') DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
);

insert one record:
INSERT INTO `users` (`id`, `username`, `email`, `role`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Random', 'random@gmail.com', 'Admin', 'password', '2022-09-22 12:12:12', '2022-09-22 12:12:12')


create table "posts"

CREATE TABLE `posts` (
 `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
 `user_id` int(11) DEFAULT NULL,
 `title` varchar(255) NOT NULL,
 `slug` varchar(255) NOT NULL UNIQUE,
 `views` int(11) NOT NULL DEFAULT '0',
 `image` varchar(255) NOT NULL,
 `body` text NOT NULL,
 `published` tinyint(1) NOT NULL,
 `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
 `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
);

insert two example record:

INSERT INTO `posts` (`id`, `user_id`, `title`, `slug`, `views`, `image`, `body`, `published`, `created_at`, `updated_at`) VALUES
(1, 1, 'PHP and MySQl Web Dev', 'PHP and MySQl Web Dev', 0, 'banner.jpg', 'coding every day', 1, '2022-09-22 12:12:12', '2022-09-22 12:12:12'),
(2, 1, 'Second post on blog', 'Second post on blog', 0, 'banner.jpg', 'This is example text', 0, '2022-09-23 12:12:12', '2022-09-23 12:12:12')

CREATE TABLE `topics` (
 `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
 `name` varchar(255) NOT NULL,
 `slug` varchar(255) NOT NULL UNIQUE,
);

CREATE TABLE `post_topic` (
 `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
 `post_id` int(11) NOT NULL,
 `topic_id` int(11) NOT NULL,
);