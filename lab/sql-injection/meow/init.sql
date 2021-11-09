CREATE TABLE IF NOT EXISTS `news` (
  `id` int NOT NULL PRIMARY KEY,
  `title` text NOT NULL,
  `content` text NOT NULL
);

CREATE TABLE IF NOT EXISTS `flag` (
  `id` int NOT NULL PRIMARY KEY,
  `the_flag` text NOT NULL
);


INSERT IGNORE INTO `news` (`id`, `title`, `content`) VALUES
(1, 'meow', 'meow'),
(2, 'cat', 'owo'),
(3, 'chiwawa', 'qwq'),
(4, 'dog', 'oAo'),
(5, 'shark', 'A.');

INSERT IGNORE INTO `flag` (`id`, `the_flag`) VALUES (1, 'FLAG{lab_flag}');