CREATE TABLE `redacted_table` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL
);

INSERT INTO `redacted_table` (`id`, `username`, `email`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', '##REDACTED##');
