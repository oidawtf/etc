-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 02, 2013 at 11:12 PM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `etc`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE IF NOT EXISTS `booking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `FK_user` int(11) NOT NULL,
  `seat_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `FK_user`, `seat_id`) VALUES
(1, 2, 15),
(2, 2, 16),
(3, 1, 4),
(4, 1, 5),
(5, 1, 6),
(6, 1, 8),
(7, 1, 13),
(8, 1, 19),
(9, 1, 18);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `date` datetime NOT NULL,
  `image` varchar(50) DEFAULT NULL,
  `description` varchar(10000) NOT NULL,
  `link` varchar(300) NOT NULL,
  `type` varchar(50) NOT NULL,
  `is_major` tinyint(1) DEFAULT NULL,
  `price` decimal(9,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `name`, `date`, `image`, `description`, `link`, `type`, `is_major`, `price`) VALUES
(1, 'Opera Ball', '2014-02-02 19:00:00', 'images/events/opera_ball.jpg', 'The Vienna Opera Ball (Wiener Opernball in German) is an annual Austrian society event which takes place in the building of the Vienna State Opera in Vienna, Austria (Wien, Österreich) on the Thursday preceding Ash Wednesday (a religious holiday). Together with the New Year Concert, the Opera Ball is one of the highlights of the Viennese carnival season. The dress code is evening dress: white tie and tails for men; usually floor-length gowns for women.  Each year, almost overnight, the auditorium of the Vienna State Opera is turned into a large ballroom. On the eve of the event, the rows of seats are removed from the stalls, and a new floor, level with the stage, is built. Vienna Opera Ball, Poster  In a joint venture, ORF and BR broadcast live from the ball for several hours each year.  The Opera Ball was first held in 1935, but was suspended during World War II. It was revived after the war; it has been held annually ever since, with the exception of 1991, when it was cancelled due to the Persian Gulf War. Since 2008, Desirée Treichl-Stürgkh has been the chairman (supervising organizer) of the Vienna Opera Ball.  In recent years, the Opernballdemo, a left-wing demonstration along the Ringstraße against the kind of capitalism represented by, as the protesters see it, many of the well-to-do guests at the Opera Ball, has regularly taken place on the same night. There have been occasional outbreaks of violence.  In 1995 Austrian writer Josef Haslinger published a novel entitled Opernball in which thousands of people are killed in a Neo-Nazi terrorist attack taking place during that society event. The novel was the basis of a 1998 made-for-TV movie by Urs Egger with the same title.  The only ball officially associated with the Vienna Opera Ball is the Dubai Opera Ball. A similar ball takes place in New York City and another in Budapest, but they are not affiliated with the Vienna Opera Ball.', 'http://en.wikipedia.org/wiki/Vienna_Opera_Ball', 'event', 1, 120.00),
(2, 'Fight Club', '2013-06-05 20:00:00', 'images/events/fight_club.jpg', 'Fight Club is a 1999 American film based on the 1996 novel of the same name by Chuck Palahniuk. The film was directed by David Fincher and stars Edward Norton, Brad Pitt, and Helena Bonham Carter. Norton plays the unnamed protagonist, an "everyman" who is discontented with his white-collar job. He forms a "fight club" with soap maker Tyler Durden, played by Pitt, and becomes embroiled in a relationship with him and a dissolute woman, Marla Singer, played by Bonham Carter.  Palahniuk''s novel was optioned by 20th Century Fox producer Laura Ziskin, who hired Jim Uhls to write the film adaptation. Fincher was one of four directors the producers considered and hired him because of his enthusiasm for the film. Fincher developed the script with Uhls and sought screenwriting advice from the cast and others in the film industry. The director and the cast compared the film to Rebel Without a Cause (1955) and The Graduate (1967). Fincher intended Fight Club''s violence to serve as a metaphor for the conflict between a generation of young people and the value system of advertising. The director copied the homoerotic overtones from Palahniuk''s novel to make audiences uncomfortable and keep them from anticipating the twist ending.[1]  Studio executives did not like the film and they restructured Fincher''s intended marketing campaign to try to reduce anticipated losses. Fight Club failed to meet the studio''s expectations at the box office and received polarized reactions from critics. It was cited as one of the most controversial and talked-about films of 1999. However, the film later found commercial success with its DVD release, which established Fight Club as a cult film. Critical reception of Fight Club has since become more positive.  In 2008, Fight Club was named the 10th greatest movie of all time by Empire magazine in its issue of The 500 Greatest Movies of All Time.', 'http://en.wikipedia.org/wiki/Fight_Club', 'cinema', 0, 15.50),
(3, 'Swan Lake', '2013-05-10 21:30:00', 'images/events/swan_lake.jpg', 'Swan Lake (Russian: Лебединое озеро, Lebedinoye ozero) ballet, Op. 20, by Pyotr Ilyich Tchaikovsky, was composed in 1875–1876. The scenario, initially in four acts, was fashioned from Russian folk tales[1] and tells the story of Odette, a princess turned into a swan by an evil sorcerer''s curse. The choreographer of the original production was Julius Reisinger. The ballet was premiered by the Bolshoi Ballet on 4 March [O.S. 20 February] 1877[2][3] at the Bolshoi Theatre in Moscow, billed as The Lake of the Swans. Although it is presented in many different versions, most ballet companies base their stagings both choreographically and musically on the 1895 revival of Marius Petipa and Lev Ivanov, first staged for the Imperial Ballet on 15 January 1895, at the Mariinsky Theatre in St. Petersburg. For this revival, Tchaikovsky''s score was revised by the St. Petersburg Imperial Theatre''s chief conductor and composer Riccardo Drigo.', 'http://en.wikipedia.org/wiki/Swan_lake', 'theater', NULL, 29.95);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `password`, `email`, `is_admin`) VALUES
(1, 'Hugo', 'Stieglitz', '123456', 'hugo@mailinator.com', 1),
(2, 'Birgit', 'P.', '123456', 'birgit@mailinator.com', NULL),
(3, 'Harry', 'Hirsch', '123456', 'hirsch@mailinator.com', 1),
(4, 'Andreas', 'R.', '123456', 'andi@mailinator.com', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
