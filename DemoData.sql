
--
-- Datenbank: `blog`
--


--
-- Daten für Tabelle `article`
--

INSERT INTO `article` (`title`, `content`, `id`, `author`) VALUES
('article 1 title', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam', 1, 1),
('article 2 title', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam', 2, 2),
('Test Title article 3', 'Lorem ipsum', 3, 1);

-- --------------------------------------------------------



--
-- Daten für Tabelle `author`
--

INSERT INTO `author` (`id`, `firstName`, `lastName`, `email`) VALUES
(1, 'Patrick', 'Mustermann', 'patrick.mustermann@test.de'),
(2, 'lorem FN', 'ipsum LN', 'lorem.ipsum@email.com');



