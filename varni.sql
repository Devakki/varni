-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2021 at 02:35 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `varni`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `user_agent`, `last_activity`, `data`, `timestamp`) VALUES
('0nv4bde45h5okhi61hspbdqkv05mbn11', '::1', '', 0, '__ci_last_regenerate|i:1626939831;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('12j8li3fnu6tvhcu7r91i43epam5695u', '::1', '', 0, '__ci_last_regenerate|i:1626893232;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('13u71qtrqng0t172683qrs4aujfnor6e', '::1', '', 0, '__ci_last_regenerate|i:1626186580;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('1avgqpjtbvuvq60q0thnctio4nirhpkq', '::1', '', 0, '__ci_last_regenerate|i:1626786615;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('1g4s2q0r4qvdje28rjrdb8dsrc3ove7m', '::1', '', 0, '__ci_last_regenerate|i:1625683763;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('1n832ad58m6h0fhvenij6tcpsjsjge75', '::1', '', 0, '__ci_last_regenerate|i:1626701579;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('25r1qv4c9hsb1h725khee2a4lmotdplp', '::1', '', 0, '__ci_last_regenerate|i:1626955652;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('292rjjv7877qkv4sai30uc36n4tqn3b3', '::1', '', 0, '__ci_last_regenerate|i:1625489948;', '0000-00-00 00:00:00'),
('2aqk9132i2ro7a7795anqi8q9hsemkja', '::1', '', 0, '__ci_last_regenerate|i:1626934887;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('2cl012e2svlglloehs8vp7jsqqqno27a', '::1', '', 0, '__ci_last_regenerate|i:1626853315;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('2qkk4khlp11ctc3osrlejmmiciefjo5h', '::1', '', 0, '__ci_last_regenerate|i:1625541944;', '0000-00-00 00:00:00'),
('2ubnn443obr5aql2d9jh32ga47g4pt4h', '::1', '', 0, '__ci_last_regenerate|i:1626893947;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('35vqnshm09qta6ino7nlmi1qdk265qer', '::1', '', 0, '__ci_last_regenerate|i:1626950665;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('3guquvimfiij8ufmo7drtnjghabsqah2', '::1', '', 0, '__ci_last_regenerate|i:1626932914;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('41lj01bn3htftvu10stt2c7603prr9af', '::1', '', 0, '__ci_last_regenerate|i:1626326364;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('432qg7jk7307e6d0hq0mqo3mvq2u5vug', '::1', '', 0, '__ci_last_regenerate|i:1625510596;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('44u1r8lqfbkeq5g2o8lh9vcge476ftiq', '::1', '', 0, '__ci_last_regenerate|i:1626187528;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('4jlesiki6ejbrje63e9c5sms87ftrr5c', '::1', '', 0, '__ci_last_regenerate|i:1626199755;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('4mhocd4k2ubd2l142uchbd40cdvtge5r', '::1', '', 0, '__ci_last_regenerate|i:1626938339;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('5a55thc8avo08tgbp8b2krstffjhacqm', '::1', '', 0, '__ci_last_regenerate|i:1626329516;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('5bu6vmva1i56o05e0r8c2gpme2t7oaon', '::1', '', 0, '__ci_last_regenerate|i:1626199755;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('5q56q953pgnhb1o41v1pip63qpecdin9', '::1', '', 0, '__ci_last_regenerate|i:1626895265;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('6pu9mmgsj3ofkhhkbce2u413i9sl18vh', '::1', '', 0, '__ci_last_regenerate|i:1626327632;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('70sfbrtv9sitjoisli3ot1saropc2giq', '::1', '', 0, '__ci_last_regenerate|i:1626198329;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('727ouat9hq6abtp6m6j5nlk6tvfgmgrk', '::1', '', 0, '__ci_last_regenerate|i:1626894276;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('7bdu5jkiujgbhdsarhjpeo5nfhi833gd', '::1', '', 0, '__ci_last_regenerate|i:1626852630;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('7h9inhl07nhkr948f8tlust9tjacj1ls', '::1', '', 0, '__ci_last_regenerate|i:1625813228;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('7hh81flp17l1srsegdgv13ngnfrkioh3', '::1', '', 0, '__ci_last_regenerate|i:1626321474;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('7mcpk1a8b9oobod69n68ghr16ehc3vkr', '::1', '', 0, '__ci_last_regenerate|i:1626286925;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('7sk6tfhujuk99niid72a89u9amrbeu50', '::1', '', 0, '__ci_last_regenerate|i:1626899060;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('8131pt7fq0mrtm3smko8l0qs9q7fq3hc', '::1', '', 0, '__ci_last_regenerate|i:1626952735;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('81c2a9pks0i0fd4sq0g3qvbaspisdhjf', '::1', '', 0, '__ci_last_regenerate|i:1625489948;', '0000-00-00 00:00:00'),
('824ce6of1u8qh561q1s1jjgkm9iornsf', '::1', '', 0, '__ci_last_regenerate|i:1626934436;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('8p6q7eijkt5sgeneeimuvlue0hqgcrvh', '::1', '', 0, '__ci_last_regenerate|i:1626323550;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('90tteqihpaqs9ki3tbt17a8c7v19i075', '::1', '', 0, '__ci_last_regenerate|i:1626318110;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('9a99qah0o7praavijqpkiseagd4dndph', '::1', '', 0, '__ci_last_regenerate|i:1626936657;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('9gkmqk6cki3eec821475kigvdg4bs2a9', '::1', '', 0, '__ci_last_regenerate|i:1625685086;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('9h7ue7f62fqmb71fkumacn1pbf3t6ofl', '::1', '', 0, '__ci_last_regenerate|i:1626288019;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('9k08h60947a8t2g6ejuei6eiv0rofpek', '::1', '', 0, '__ci_last_regenerate|i:1625509146;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('9vokg00rsldk9jpr2iiao5v8er5r35nh', '::1', '', 0, '__ci_last_regenerate|i:1625776765;', '0000-00-00 00:00:00'),
('9vs8vthdce5tdtm5h39f3putb1ibkqs0', '::1', '', 0, '__ci_last_regenerate|i:1626329913;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('a03p6isr6rbar5t6i7q7mt95jjg0q7ui', '::1', '', 0, '__ci_last_regenerate|i:1626326678;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('a6osc8ehcpoj9abm2b270vettc9fdfmk', '::1', '', 0, '__ci_last_regenerate|i:1626318869;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('a9ot3n9v3gusmgqcdda27dise5j0oekh', '::1', '', 0, '__ci_last_regenerate|i:1626186883;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('accgo9jol68sjj15siaalsn6pd1k6189', '::1', '', 0, '__ci_last_regenerate|i:1626197545;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('aouauarqglakf1o2menhdnhtpi6k82ke', '::1', '', 0, '__ci_last_regenerate|i:1626953351;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('assoamknl56mna2ifq8lfeo24m6ma41r', '::1', '', 0, '__ci_last_regenerate|i:1625681953;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('atd6qktdkhltf8f41v75oafda0jnjs85', '::1', '', 0, '__ci_last_regenerate|i:1626937691;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('b7obi0uovfnkqu2imbl3enko34q7tdbu', '::1', '', 0, '__ci_last_regenerate|i:1626894945;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('b85sqfknsj91jc8v31g1a4cn7dnerjvp', '::1', '', 0, '__ci_last_regenerate|i:1626787911;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('bjedflto4jvp8t6p5uniqskqdfk65o05', '::1', '', 0, '__ci_last_regenerate|i:1626192652;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('bkg8g3dp8kclkv6clq216h1jtq9m3nta', '::1', '', 0, '__ci_last_regenerate|i:1625510145;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('bo2vkoshuksn8qrfmqnjmj2qvopsfbcu', '::1', '', 0, '__ci_last_regenerate|i:1626287297;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('bolh2l3cii0ga7jpodkjhqaekrpr8ijb', '::1', '', 0, '__ci_last_regenerate|i:1626787911;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('bp3lm8t8c46kif2bdhn9es3o7k6864lp', '::1', '', 0, '__ci_last_regenerate|i:1626899370;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('bup94vuveo65bn98eaiooh6bvqf7hrju', '::1', '', 0, '__ci_last_regenerate|i:1626935604;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('cfpnpci2fapkqhjksscug6b4p0espujl', '::1', '', 0, '__ci_last_regenerate|i:1626319206;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('cg2s77vp7qvjlstql17k914l4clu2sjm', '::1', '', 0, '__ci_last_regenerate|i:1626785865;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('cjt3b1126r2eavv5q3jmccaf8e8vq37n', '::1', '', 0, '__ci_last_regenerate|i:1626323004;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('cl794t0m42rsc9sh6hdap05rd36tt4d2', '::1', '', 0, '__ci_last_regenerate|i:1626955982;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('csmftb522nokja37k7rul0946mnoa4sg', '::1', '', 0, '__ci_last_regenerate|i:1626893621;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('ctu3oei3m7b3ho866vrt3i9vt2uhmh1d', '::1', '', 0, '__ci_last_regenerate|i:1626322124;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('d01bau3nkpsc5uqd9k5e6qnjdlv64irg', '::1', '', 0, '__ci_last_regenerate|i:1626936023;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('dr4vhglbj5elefq8g6d2cn3t3elm0ej6', '::1', '', 0, '__ci_last_regenerate|i:1626931826;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('dtb6sak445bhvj1n3v58m8gbqbdkbqq2', '::1', '', 0, '__ci_last_regenerate|i:1626939463;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('e4mrvmjra7kfvhui1oq5hqultlf2fagq', '::1', '', 0, '__ci_last_regenerate|i:1626810197;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('e989n8davj49gdjeshgp9e863fev4qvq', '::1', '', 0, '__ci_last_regenerate|i:1625680766;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('esaivvlruk751ar6qc9v13dfj847et45', '::1', '', 0, '__ci_last_regenerate|i:1626853617;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('eul09guiaror61r7vdphjkh5u8k4eg83', '::1', '', 0, '__ci_last_regenerate|i:1626852999;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('f3noitsqo7tv3er7ulitc1hd2417h2ee', '::1', '', 0, '__ci_last_regenerate|i:1625488916;', '0000-00-00 00:00:00'),
('f8n46lqsd8ecd21hv5ge85vsd9r2t4kr', '::1', '', 0, '__ci_last_regenerate|i:1626951789;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";status|s:7:\"success\";msg|s:17:\"Patla Color Added\";', '0000-00-00 00:00:00'),
('fdblkdvs9jfq83k3k0fvbcmunejlatqu', '::1', '', 0, '__ci_last_regenerate|i:1625509803;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('fgfhfaemtnne5k4h4oogilrvkkaq01uv', '::1', '', 0, '__ci_last_regenerate|i:1626326052;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('fqvomo849en18dllt115g3hs17rcoodj', '::1', '', 0, '__ci_last_regenerate|i:1626854006;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('gkchaao3mlijav54orv56frc924usif0', '::1', '', 0, '__ci_last_regenerate|i:1626786228;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('gkqqah3ef6l5m6a7mb7bn9772kc8io3g', '::1', '', 0, '__ci_last_regenerate|i:1625767380;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('gtif9b2d0t38bl2alsmmufpcek3c3d5j', '::1', '', 0, '__ci_last_regenerate|i:1626809279;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('gvfgsakf4khe1gb0nh63cib3elvagpp4', '::1', '', 0, '__ci_last_regenerate|i:1626809896;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('h8kl5fo57nri9dopm0cef31n2fbcv826', '::1', '', 0, '__ci_last_regenerate|i:1626932256;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('hiej3ooopmdpquukqajanb8rhg06p5gv', '::1', '', 0, '__ci_last_regenerate|i:1626854006;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('hk2f3qm5p3ag9bt35lad767j3u89tp7j', '::1', '', 0, '__ci_last_regenerate|i:1626952090;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('hnsiaafbp4951vk4v5ulievmgganvvid', '::1', '', 0, '__ci_last_regenerate|i:1626187863;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('hppvv7pcrfhvdl4u1j2npn783eg2imd6', '::1', '', 0, '__ci_last_regenerate|i:1626954042;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('hqrfj09f1s68g4hfiodi41gi3h32cb5u', '::1', '', 0, '__ci_last_regenerate|i:1626931505;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('i3505jogrktncmtoa5ra3v92fe782o33', '::1', '', 0, '__ci_last_regenerate|i:1625685393;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('i37t5sgo25c5c97la9udm7nbdhpe4jso', '::1', '', 0, '__ci_last_regenerate|i:1626809584;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('i79s1bpco35ahb5kjaj4ek32922lcbn8', '::1', '', 0, '__ci_last_regenerate|i:1626322677;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('i949bvpai50e7rgnvgr6sue0faog8s1d', '::1', '', 0, '__ci_last_regenerate|i:1626327292;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('iamjvl4k6o302qaau1amn083hr1tm7c5', '::1', '', 0, '__ci_last_regenerate|i:1626954730;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('itcanpjae0t65b7luj71ar9skkdne22h', '::1', '', 0, '__ci_last_regenerate|i:1626321806;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('iv5k6ds0l1rjasrj089kq08ge7tu6qo2', '::1', '', 0, '__ci_last_regenerate|i:1626787559;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('j2h2qkqpfrge74vck61757hikgs9kl26', '::1', '', 0, '__ci_last_regenerate|i:1626936993;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('j6vpsd7ngq7g2g8tppaet8a9uvlbujit', '::1', '', 0, '__ci_last_regenerate|i:1626956620;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('jgqec590m37k77vc1suo4ppubu76uunb', '::1', '', 0, '__ci_last_regenerate|i:1626894609;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('k5asig5h06vgh4v319v32o557rp16k1r', '::1', '', 0, '__ci_last_regenerate|i:1626187187;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('k5s0v1f1tbeqgrpsmc6jifqkr6atpfqb', '::1', '', 0, '__ci_last_regenerate|i:1626327936;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('kkep56t4kh2de0nv12jd4mjqkdb04q6g', '::1', '', 0, '__ci_last_regenerate|i:1626197914;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('kotldmvbh1ksmmes2hpeks20kcfiatff', '::1', '', 0, '__ci_last_regenerate|i:1626955337;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('kpibnv2772rgpiam8c24p39437istad4', '::1', '', 0, '__ci_last_regenerate|i:1625800894;', '0000-00-00 00:00:00'),
('kvadigujg04285dmjlfobe4s31k9af0l', '::1', '', 0, '__ci_last_regenerate|i:1626288019;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('l26tjv6l497b7o83u3dnohvob3fj9b6j', '::1', '', 0, '__ci_last_regenerate|i:1625681559;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";status|s:7:\"success\";msg|s:14:\"Printing Added\";', '0000-00-00 00:00:00'),
('l418hck8e50l9bsceueo5vl11gr76kkh', '::1', '', 0, '__ci_last_regenerate|i:1626191780;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('l7gs5h9u0l3ltohuegod52t0i9ks7bub', '::1', '', 0, '__ci_last_regenerate|i:1626198839;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('l9n6qla3bfsnkjrmtliulejlggfcogc6', '::1', '', 0, '__ci_last_regenerate|i:1626937375;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('li1quqihhc893dt3u2il05k7o13uc5dl', '::1', '', 0, '__ci_last_regenerate|i:1626785455;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('ljb4kpbaospc8omg9f55k323h2lpt050', '::1', '', 0, '__ci_last_regenerate|i:1625680435;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('lnvur0h33ins97anib8aethug63lrcnh', '::1', '', 0, '__ci_last_regenerate|i:1625685393;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('lq1ke4o03jenqud0bjh88qrmfnhchti9', '::1', '', 0, '__ci_last_regenerate|i:1626784865;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('mbja03uolb9okdmtucup9c9k09ac6lhe', '::1', '', 0, '__ci_last_regenerate|i:1626763754;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('mmp2debe4glmtnq1lra22j5lvisol4li', '::1', '', 0, '__ci_last_regenerate|i:1626939831;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('mnk37d652t6kt0b8k4c3eqpe0gqgi7sh', '::1', '', 0, '__ci_last_regenerate|i:1626787022;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('molk7qcsv1sfif037chht57lfkbnfrgq', '::1', '', 0, '__ci_last_regenerate|i:1626192961;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('nd4ivtg1f8nra2gg1pne3hoojmbs9p4o', '::1', '', 0, '__ci_last_regenerate|i:1626935233;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('np5i5q3j528hfm61sg3gr5qaco67dmvo', '::1', '', 0, '__ci_last_regenerate|i:1626896454;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('nrdp8j73dv1n9f8taleeooc9ee6ud7di', '::1', '', 0, '__ci_last_regenerate|i:1626952401;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('nttne447kjjgki5ackotaso0i7eb2sbc', '::1', '', 0, '__ci_last_regenerate|i:1625642253;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('nvjqn3gcfut1s6uomn4cf7srphisevl6', '::1', '', 0, '__ci_last_regenerate|i:1626951405;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('o7ubkh2ppmmab910fnhe5mj8vsoqhch9', '::1', '', 0, '__ci_last_regenerate|i:1626330280;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('o8rf9a8egh6mgfkgk0km06cme054nrll', '::1', '', 0, '__ci_last_regenerate|i:1626956304;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('p2uptv5lkkio6gbovn139q0ihiqlai6r', '::1', '', 0, '__ci_last_regenerate|i:1626954348;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('pbm6u34dq0ho2t1u4s2l755njg634bjq', '::1', '', 0, '__ci_last_regenerate|i:1626936349;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('pf320bq85m1tc2buhdfgptvc7fh16un5', '::1', '', 0, '__ci_last_regenerate|i:1625595932;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('q9dkurr71jnu2p0ht0mirbp77uuoj9p1', '::1', '', 0, '__ci_last_regenerate|i:1626939146;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('qjb4not30g1g7iql5gcd7kpngs0tdrpc', '::1', '', 0, '__ci_last_regenerate|i:1626957077;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('qt7gmns0mhm5ac2nll6g8foouoq2t507', '::1', '', 0, '__ci_last_regenerate|i:1626933533;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('qtor8k7cuoovekjdujvuseqtfttlgpon', '::1', '', 0, '__ci_last_regenerate|i:1626810509;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('r645ncdjjuq4cth455dmj0r1qkbvh0gi', '::1', '', 0, '__ci_last_regenerate|i:1626323851;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('r7653mn3e2bheu71l1v1mag83j7r4s9g', '::1', '', 0, '__ci_last_regenerate|i:1626899370;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('rdej3atd2s4qjvim94ju0sl2segs37ec', '::1', '', 0, '__ci_last_regenerate|i:1625643553;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('rinij2o9rql9584t1djd2e2qsju2i753', '::1', '', 0, '__ci_last_regenerate|i:1626938641;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('riso1t0m7jpbm76o3eejenk70lj50d8e', '::1', '', 0, '__ci_last_regenerate|i:1626951082;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('s3n9fpge7u2fk0pbnpansqmm7omsi2ro', '::1', '', 0, '__ci_last_regenerate|i:1625767380;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('s6sf5kpc2qr6dc0jd5c88ashts8i4v75', '::1', '', 0, '__ci_last_regenerate|i:1626318470;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('scuvjh11v3rshtq65nordbi123jfp7nk', '::1', '', 0, '__ci_last_regenerate|i:1626895836;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('sd7gspoqm0iq4mh1rdeil5emvj5v7o0n', '::1', '', 0, '__ci_last_regenerate|i:1626326979;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('sjc56o27sc32mcjs9nsngvpr0pm1udan', '::1', '', 0, '__ci_last_regenerate|i:1626957077;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('snk6oeqf3gripar1qjp5fb1ja2kmnska', '::1', '', 0, '__ci_last_regenerate|i:1625683261;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('so28dc0i0qb1gbll6bkm8j5v4dqkv3t4', '::1', '', 0, '__ci_last_regenerate|i:1626933230;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('stfm01e030t1fn4iog7rrfieh20o382u', '::1', '', 0, '__ci_last_regenerate|i:1626325733;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('t6dkju9d71b52g9c5s86ngt2dq6b92b6', '::1', '', 0, '__ci_last_regenerate|i:1625509495;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('t8ack76fela0fpb9dm6eenpmknhdckbk', '::1', '', 0, '__ci_last_regenerate|i:1626199449;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('t9klq77fkuvbn1t032kepekbmpjq6k62', '::1', '', 0, '__ci_last_regenerate|i:1626330280;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('tnln2a5oltd5bmiqju7gsl6t55lfa6rp', '::1', '', 0, '__ci_last_regenerate|i:1626784534;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('u0st1h4cog70ss9jm20tccn0ick1554o', '::1', '', 0, '__ci_last_regenerate|i:1626157646;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('u18ce203c6rnbqvicqmquif2tjv6t2hk', '::1', '', 0, '__ci_last_regenerate|i:1626192105;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('u5fia2nghnjctl97oacjkl6oahhfv9d7', '::1', '', 0, '__ci_last_regenerate|i:1625643553;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('ui5dosl38v8lv29ar81eo1v90jt2rrab', '::1', '', 0, '__ci_last_regenerate|i:1626896153;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('ujer5lnt8gt64rurml61h90vnld4nlrt', '::1', '', 0, '__ci_last_regenerate|i:1626317729;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('ukqi46agoc0sheuavk5d0c615s8h4uau', '::1', '', 0, '__ci_last_regenerate|i:1626701579;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('undnb07jd6jhgo8kecna0t5m62jiedvs', '::1', '', 0, '__ci_last_regenerate|i:1626199145;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('v0bi7qh3j3mogsq0gomtuoo65l0lmejt', '::1', '', 0, '__ci_last_regenerate|i:1625510596;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('veld0vvp1gi0udstkidb9hqs95ijm3jh', '::1', '', 0, '__ci_last_regenerate|i:1625641909;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('vkalc7hahem3qt7l7nrlcesbrtae5chn', '::1', '', 0, '__ci_last_regenerate|i:1626810509;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00'),
('vo7skr5nu64q06mbahvog4tcdi7l9eln', '::1', '', 0, '__ci_last_regenerate|i:1626953050;auth_user_id|s:2:\"25\";auth_user_email|s:5:\"admin\";auth_role_id|s:1:\"1\";', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `color_id` int(20) NOT NULL,
  `color_name` varchar(50) NOT NULL,
  `rate` double NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `modify_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`color_id`, `color_name`, `rate`, `user_id`, `created_at`, `modify_at`, `status`) VALUES
(1, 'Red', 0, 25, '2021-06-27 11:59:00', '2021-07-22 11:23:43', 1),
(2, 'Blue', 0, 25, '2021-07-22 04:53:48', '2021-07-22 11:23:48', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cut`
--

CREATE TABLE `cut` (
  `id_cut` int(11) NOT NULL,
  `challan_no` int(11) NOT NULL,
  `date` date NOT NULL,
  `name` varchar(100) NOT NULL,
  `party_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `total_purchase_mtr` double NOT NULL,
  `total_pcs` double NOT NULL,
  `total_fent` double NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `modify_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cut`
--

INSERT INTO `cut` (`id_cut`, `challan_no`, `date`, `name`, `party_id`, `item_id`, `total_purchase_mtr`, `total_pcs`, `total_fent`, `status`, `user_id`, `created_at`, `modify_at`) VALUES
(6, 1, '2021-07-20', 'Test', 1, 2, 3000, 200, 400, 1, 25, '2021-07-20 06:56:47', '2021-07-20 13:26:47');

-- --------------------------------------------------------

--
-- Table structure for table `cut_lot`
--

CREATE TABLE `cut_lot` (
  `cutlot_id` int(11) NOT NULL,
  `cut_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `challan_no` varchar(255) NOT NULL,
  `party_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `p_mtr` double NOT NULL,
  `pcs` int(11) NOT NULL,
  `fent` double NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `modify_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cut_lot`
--

INSERT INTO `cut_lot` (`cutlot_id`, `cut_id`, `date`, `challan_no`, `party_id`, `item_id`, `p_mtr`, `pcs`, `fent`, `status`, `created_at`, `modify_at`) VALUES
(7, 6, '2021-07-20', '8090', 1, 2, 1000, 102, 200, 0, '2021-07-21 01:16:58', '2021-07-20 19:46:58'),
(6, 6, '2021-07-20', '2015', 1, 2, 2000, 100, 200, 1, '2021-07-20 06:56:47', '2021-07-20 13:26:47');

-- --------------------------------------------------------

--
-- Table structure for table `devide`
--

CREATE TABLE `devide` (
  `devide_id` int(11) NOT NULL,
  `challan_no` int(11) NOT NULL,
  `party_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `patla_id` int(11) NOT NULL,
  `cutlot_id` int(11) NOT NULL,
  `cutlot_challan` varchar(255) NOT NULL,
  `total_pcs` double NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `devide`
--

INSERT INTO `devide` (`devide_id`, `challan_no`, `party_id`, `item_id`, `date`, `patla_id`, `cutlot_id`, `cutlot_challan`, `total_pcs`, `user_id`, `status`, `created_at`) VALUES
(6, 1, 1, 2, '2021-07-24', 1, 7, '8090', 105, 25, 0, '2021-07-22 12:20:47'),
(7, 2, 1, 2, '2021-07-23', 1, 6, '2015', 100, 25, 1, '2021-07-22 12:23:41'),
(8, 3, 1, 2, '2021-07-22', 1, 6, '2015', 100, 25, 1, '2021-07-22 12:24:33'),
(9, 4, 1, 2, '2021-07-22', 1, 7, '8090', 102, 25, 1, '2021-07-22 10:58:06');

-- --------------------------------------------------------

--
-- Table structure for table `em_user`
--

CREATE TABLE `em_user` (
  `emuser_id` int(20) NOT NULL,
  `em_name` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `modify_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `em_user`
--

INSERT INTO `em_user` (`emuser_id`, `em_name`, `user_id`, `status`, `created_at`, `modify_at`) VALUES
(1, 'NIKUNJ', 25, 1, '2020-03-01 12:43:01', '2020-07-21 12:33:11'),
(2, 'CHARANIYA', 0, 1, '2020-03-02 02:34:03', '2020-07-21 12:34:07'),
(3, 'OM', 25, 0, '2020-03-02 02:34:20', '2020-07-21 12:34:04'),
(4, 'MAHADEV', 25, 1, '2020-03-02 02:34:27', '2020-07-21 12:34:04'),
(5, 'KHODIYAR', 25, 1, '2020-03-02 02:34:46', '2020-07-21 12:34:04'),
(6, 'BHAVESH (RADHE)', 25, 1, '2020-03-02 02:34:52', '2020-07-21 12:34:04'),
(7, 'CHANDAN FASHION', 25, 1, '2020-03-02 02:35:00', '2020-07-21 12:34:04'),
(8, 'JAY KHODAL', 25, 1, '2020-03-02 02:35:13', '2020-07-21 12:34:04'),
(9, 'ASHVINBHAI (SANADA)', 25, 1, '2020-03-02 02:35:25', '2020-07-21 12:34:04'),
(10, 'NILKANTH', 25, 1, '2020-03-02 02:35:31', '2020-07-21 12:34:04'),
(11, 'RAMNATH CREATION', 25, 1, '2020-03-02 02:35:40', '2020-07-21 12:34:04'),
(12, 'PANKAJBHAI (OM)', 25, 1, '2020-03-02 02:36:16', '2020-07-21 12:34:04'),
(13, 'HEMATBHAI', 25, 1, '2020-03-02 02:36:23', '2020-07-21 12:34:04'),
(14, 'ROHIT', 25, 1, '2020-03-02 02:36:31', '2020-07-21 12:34:04'),
(15, 'ASHRAY', 25, 1, '2020-03-02 02:37:00', '2020-07-21 12:34:04'),
(16, 'JAYDEV SHREEJI (KIRITBHAI)', 25, 1, '2020-03-02 02:37:06', '2020-07-21 12:34:04'),
(17, 'DEVIKRUPA', 25, 1, '2020-03-02 02:37:12', '2020-07-21 12:34:04'),
(18, 'RAIYARAJ (SURESHBAI - ROHIT)', 25, 1, '2020-03-02 02:37:41', '2020-07-21 12:34:04'),
(19, 'SHREEJI (KISHORBHAI)', 25, 1, '2020-03-02 02:37:53', '2020-07-21 12:34:04'),
(20, 'ARUNBHAI', 25, 1, '2020-03-02 02:38:06', '2020-07-21 12:34:04'),
(21, 'HARI OM', 25, 1, '2020-03-02 02:38:36', '2020-07-21 12:34:04'),
(22, 'SHREE GANESH (KAILASHBHAI)', 25, 1, '2020-03-02 02:39:09', '2020-07-21 12:34:04'),
(23, 'LAXMI', 25, 1, '2020-03-02 03:11:20', '2020-07-21 12:34:04'),
(25, 'HIREN', 25, 1, '2020-03-02 03:47:09', '2020-07-21 12:34:04'),
(26, 'VIJAYBHAI', 25, 1, '2020-03-02 03:48:48', '2020-07-21 12:34:04'),
(27, 'SIDDHESHWAR', 25, 1, '2020-03-02 03:48:55', '2020-07-21 12:34:04'),
(28, 'DEV FASHION', 25, 1, '2020-03-02 07:00:10', '2020-07-21 12:34:04'),
(29, 'SHREE NATHJI', 25, 1, '2020-03-03 08:57:23', '2020-07-21 12:34:04'),
(30, 'CHATURBHAI', 25, 1, '2020-03-03 06:15:53', '2020-07-21 12:34:04'),
(31, 'BUTANI', 25, 1, '2020-03-06 08:36:21', '2020-07-21 12:34:04'),
(32, 'JAY KHODIYAR (HASUBHAI)', 25, 1, '2020-03-06 09:09:03', '2020-07-21 12:34:04'),
(33, 'GHANSHYAM  ', 25, 1, '2020-03-06 02:12:07', '2020-07-21 12:34:04'),
(34, 'MAHESHWARI', 25, 1, '2020-04-22 09:23:59', '2020-07-21 12:34:04'),
(35, 'RAJKOT (PANKAJ)', 25, 1, '2020-04-22 10:42:12', '2020-07-21 12:34:04'),
(36, 'JAY DRVARKADHISH (KHBHALIYA)', 25, 1, '2020-07-28 12:23:42', '2020-07-28 06:53:42'),
(37, 'NEW RAMDEV (HIMAT BHAI)', 25, 1, '2020-07-28 12:24:00', '2020-07-28 06:54:00'),
(38, 'SHREEJI (PRAKASH BHAI)', 25, 1, '2020-07-28 12:24:20', '2020-07-28 06:54:20'),
(39, 'MARUTI (ASHVIN BHAI)', 25, 1, '2020-07-28 12:24:34', '2020-07-28 06:54:34'),
(40, 'PAMBHR SAVAN BHAI', 25, 1, '2020-08-04 04:26:14', '2020-08-04 10:56:14'),
(41, 'SHRI KHODAL (PARB VAVDI)', 25, 1, '2020-08-04 04:37:06', '2020-08-04 11:07:06'),
(42, 'KIRIT BHAI', 25, 1, '2020-08-08 03:21:53', '2020-08-08 09:51:53'),
(43, 'GAJANAD (KALU BHAI)', 25, 1, '2020-09-10 09:12:46', '2020-09-10 03:42:46'),
(44, 'GOPAL BHAI  SAKROLA', 25, 1, '2020-09-13 03:58:30', '2020-09-13 10:28:30'),
(45, 'MITESHBHAI', 25, 1, '2020-10-18 05:57:48', '2020-10-18 12:27:48'),
(46, 'SHREE HARI (RONAK)', 25, 1, '2020-12-23 09:37:34', '2020-12-23 04:07:34'),
(47, 'JENTIBHAI (JAY KHODIYAR)', 25, 1, '2021-01-20 05:13:55', '2021-01-20 11:43:55'),
(48, 'SHYAM ABHUSHN', 25, 1, '2021-01-24 06:40:42', '2021-01-24 13:10:42'),
(49, 'ATUL BHAI ( VRAJ )', 25, 1, '2021-03-03 11:01:27', '2021-03-03 05:31:27'),
(50, 'KALUBHAI (GALATH)', 25, 1, '2021-03-06 11:15:52', '2021-03-06 05:45:52'),
(51, 'DILABHAI (SAKROLA)', 25, 1, '2021-03-06 11:20:36', '2021-03-06 05:50:36'),
(52, 'KRISHNA (ASHVIN BHAI)', 25, 1, '2021-03-07 09:03:23', '2021-03-07 03:33:23'),
(53, 'SIYARAM (RAJ)', 25, 1, '2021-03-07 09:05:19', '2021-03-07 03:35:19'),
(54, 'NIKUNJ ( KHA HADMATIYA)', 25, 1, '2021-03-07 09:07:06', '2021-03-07 03:37:06'),
(55, 'BALAJI  CREATION', 25, 1, '2021-03-07 09:07:41', '2021-03-07 03:37:41');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` int(20) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `hsn_code` varchar(20) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `modify_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `item_name`, `user_id`, `hsn_code`, `created_at`, `modify_at`, `status`) VALUES
(1, 'Item 1', 25, '1320', '2021-06-27 11:58:43', '2021-06-27 06:28:43', 1),
(2, '64 X 64', 25, '5302', '2021-06-28 09:22:46', '2021-06-28 15:52:46', 1);

-- --------------------------------------------------------

--
-- Table structure for table `log_acvity`
--

CREATE TABLE `log_acvity` (
  `log_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_login` tinyint(4) DEFAULT NULL,
  `is_logout` tinyint(4) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log_acvity`
--

INSERT INTO `log_acvity` (`log_id`, `user_id`, `is_login`, `is_logout`, `description`, `created_at`) VALUES
(1, 25, NULL, NULL, 'Stock insert id 1', '2021-07-03 12:14:54'),
(2, 25, NULL, NULL, 'Cut insert id 1', '2021-07-03 12:15:25'),
(3, 25, NULL, NULL, 'Stock insert id 2', '2021-07-03 12:17:34'),
(4, 25, NULL, NULL, 'Cut insert id 2', '2021-07-03 12:23:28'),
(5, 25, NULL, NULL, 'Cut insert id 3', '2021-07-03 12:23:48'),
(6, 25, NULL, NULL, 'Devide insert challan no 1', '2021-07-03 12:30:47'),
(7, 25, NULL, NULL, 'Patla Color insert id 1', '2021-07-03 03:24:59'),
(8, 25, 1, NULL, 'Login successful', '2021-07-03 11:47:05'),
(9, 25, 1, NULL, 'Login successful', '2021-07-04 09:23:25'),
(10, 25, 1, NULL, 'Login successful', '2021-07-05 11:23:57'),
(11, 25, 1, NULL, 'Login successful', '2021-07-05 11:44:07'),
(12, 25, NULL, NULL, 'ReturnDevide insert challan no 1', '2021-07-05 11:51:48'),
(13, 25, NULL, NULL, 'ReturnDevide insert challan no 1', '2021-07-05 11:52:23'),
(14, 25, NULL, NULL, 'ReturnDevide insert challan no 1', '2021-07-05 11:53:08'),
(15, 25, 1, NULL, 'Login successful', '2021-07-06 11:55:36'),
(16, 25, 1, NULL, 'Login successful', '2021-07-07 12:36:27'),
(17, 25, 1, NULL, 'Login successful', '2021-07-07 11:15:14'),
(18, 25, NULL, NULL, 'printing insert Lotno ', '2021-07-07 11:28:38'),
(19, 25, NULL, NULL, 'printing insert Lotno ', '2021-07-07 11:29:26'),
(20, 25, NULL, NULL, 'printing insert Lotno ', '2021-07-07 11:30:21'),
(21, 25, 1, NULL, 'Login successful', '2021-07-08 11:11:13'),
(22, 25, 1, NULL, 'Login successful', '2021-07-09 12:17:13'),
(23, 25, 1, NULL, 'Login successful', '2021-07-13 11:57:31'),
(24, 25, 1, NULL, 'Login successful', '2021-07-13 07:23:18'),
(25, 25, 1, NULL, 'Login successful', '2021-07-14 11:48:16'),
(26, 25, 1, NULL, 'Login successful', '2021-07-15 08:20:32'),
(27, 25, NULL, NULL, 'Stock insert id 3', '2021-07-15 10:03:16'),
(28, 25, NULL, NULL, 'Cut insert id 4', '2021-07-15 10:03:41'),
(29, 25, NULL, NULL, 'Devide insert challan no 3', '2021-07-15 10:04:02'),
(30, 25, NULL, NULL, 'Devide insert challan no 3', '2021-07-15 10:07:11'),
(31, 25, NULL, NULL, 'Devide insert challan no 2', '2021-07-15 10:39:09'),
(32, 25, NULL, NULL, 'ReturnDevide insert challan no 3', '2021-07-15 10:39:24'),
(33, 25, NULL, NULL, 'Patla Color insert id 2', '2021-07-15 10:40:03'),
(34, 25, NULL, NULL, 'printing insert Lotno ', '2021-07-15 10:41:55'),
(35, 25, NULL, NULL, 'Stock insert id 4', '2021-07-15 11:42:54'),
(36, 25, NULL, NULL, 'Cut insert id 5', '2021-07-15 11:43:34'),
(37, 25, NULL, NULL, 'Devide insert challan no 4', '2021-07-15 11:43:59'),
(38, 25, NULL, NULL, 'ReturnDevide insert challan no 4', '2021-07-15 11:44:14'),
(39, 25, NULL, NULL, 'Patla Color insert id 3', '2021-07-15 11:44:38'),
(40, 25, NULL, NULL, 'printing insert Lotno ', '2021-07-15 11:45:13'),
(41, 25, 1, NULL, 'Login successful', '2021-07-19 06:59:04'),
(42, 25, 1, NULL, 'Login successful', '2021-07-20 12:19:24'),
(43, 25, 1, NULL, 'Login successful', '2021-07-20 06:00:25'),
(44, 25, NULL, NULL, 'Stock insert id 5', '2021-07-20 06:00:56'),
(45, 25, NULL, NULL, 'Stock Deleted 5', '2021-07-20 06:11:08'),
(46, 25, NULL, NULL, 'Stock Deleted 4', '2021-07-20 06:11:10'),
(47, 25, NULL, NULL, 'Stock Deleted 3', '2021-07-20 06:11:12'),
(48, 25, NULL, NULL, 'Stock Deleted 2', '2021-07-20 06:11:14'),
(49, 25, NULL, NULL, 'Stock Deleted 1', '2021-07-20 06:11:16'),
(50, 25, NULL, NULL, 'item Update Item Number1', '2021-07-20 06:11:44'),
(51, 25, NULL, NULL, 'Party Update Party1', '2021-07-20 06:11:55'),
(52, 25, NULL, NULL, 'Stock insert id 6', '2021-07-20 06:12:19'),
(53, 25, NULL, NULL, 'Stock insert id 7', '2021-07-20 06:12:39'),
(54, 25, NULL, NULL, 'Cut insert id 6', '2021-07-20 06:56:47'),
(55, 25, 1, NULL, 'Login successful', '2021-07-21 12:52:30'),
(56, 25, NULL, NULL, 'Stock insert id 8', '2021-07-21 12:59:55'),
(57, 25, NULL, NULL, 'Cut Update Lotno  ', '2021-07-21 01:14:55'),
(58, 25, NULL, NULL, 'Cut Update Lotno  ', '2021-07-21 01:15:07'),
(59, 25, NULL, NULL, 'Cut Update Lotno  ', '2021-07-21 01:15:17'),
(60, 25, NULL, NULL, 'Cut Update Lotno  ', '2021-07-21 01:16:37'),
(61, 25, NULL, NULL, 'Cut Update Lotno  ', '2021-07-21 01:16:58'),
(62, 25, 1, NULL, 'Login successful', '2021-07-21 12:55:08'),
(63, 25, 1, NULL, 'Login successful', '2021-07-22 12:11:00'),
(64, 25, NULL, NULL, 'Devide insert challan no 7', '2021-07-22 12:17:12'),
(65, 25, NULL, NULL, 'Devide insert challan no 7', '2021-07-22 12:17:50'),
(66, 25, NULL, NULL, 'Devide insert challan no 7', '2021-07-22 12:18:40'),
(67, 25, NULL, NULL, 'Devide insert challan no 7', '2021-07-22 12:20:17'),
(68, 25, NULL, NULL, 'Devide insert challan no 7', '2021-07-22 12:20:40'),
(69, 25, NULL, NULL, 'Devide insert challan no 7', '2021-07-22 12:20:47'),
(70, 25, NULL, NULL, 'Devide insert challan no 6', '2021-07-22 12:23:41'),
(71, 25, NULL, NULL, 'Devide insert challan no 6', '2021-07-22 12:24:33'),
(72, 25, NULL, NULL, 'Devide Update id 8', '2021-07-22 12:51:30'),
(73, 25, NULL, NULL, 'Devide Update id 8', '2021-07-22 12:51:38'),
(74, 25, NULL, NULL, 'Devide Update id 8', '2021-07-22 12:51:44'),
(75, 25, NULL, NULL, 'Devide Update id 8', '2021-07-22 12:52:52'),
(76, 25, NULL, NULL, 'Cut Update id  6', '2021-07-22 01:10:25'),
(77, 25, NULL, NULL, 'Cut Update id  6', '2021-07-22 01:13:30'),
(78, 25, NULL, NULL, 'Cut Update id  6', '2021-07-22 01:13:37'),
(79, 25, 1, NULL, 'Login successful', '2021-07-22 10:50:02'),
(80, 25, NULL, NULL, 'Devide insert challan no 7', '2021-07-22 10:58:06'),
(81, 25, NULL, NULL, 'Return Devide insert ID 4', '2021-07-22 11:46:38'),
(82, 25, NULL, NULL, 'Return Devide insert ID 5', '2021-07-22 11:47:02'),
(83, 25, NULL, NULL, 'Return Devide Update ID 5', '2021-07-22 12:26:33'),
(84, 25, NULL, NULL, 'Return Devide Update ID 5', '2021-07-22 12:26:42'),
(85, 25, NULL, NULL, 'Return Devide Update ID 5', '2021-07-22 12:26:53'),
(86, 25, NULL, NULL, 'Stock insert id 9', '2021-07-22 12:53:11'),
(87, 25, NULL, NULL, 'item Update Item 1', '2021-07-22 12:54:52'),
(88, 25, 1, NULL, 'Login successful', '2021-07-22 04:09:22'),
(89, 25, NULL, NULL, 'Patla Color insert id 4', '2021-07-22 04:15:41'),
(90, 25, NULL, NULL, 'Patla Color insert id 5', '2021-07-22 04:15:48'),
(91, 25, NULL, NULL, 'Patla Color insert id 6', '2021-07-22 04:21:50'),
(92, 25, NULL, NULL, 'Patla Color insert id 7', '2021-07-22 04:22:20'),
(93, 25, NULL, NULL, 'Patla Color insert id 8', '2021-07-22 04:29:30'),
(94, 25, NULL, NULL, 'Color update Red', '2021-07-22 04:53:43'),
(95, 25, NULL, NULL, 'Color insert Blue', '2021-07-22 04:53:48'),
(96, 25, NULL, NULL, 'Patla Color Update id 8', '2021-07-22 05:13:08'),
(97, 25, NULL, NULL, 'Patla Color Update id 8', '2021-07-22 05:13:35'),
(98, 25, NULL, NULL, 'Patla Color Update id 8', '2021-07-22 05:13:43'),
(99, 25, NULL, NULL, 'Patla Color Update id 8', '2021-07-22 05:13:50');

-- --------------------------------------------------------

--
-- Table structure for table `master_admin`
--

CREATE TABLE `master_admin` (
  `id_master` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `role_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `modify_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_admin`
--

INSERT INTO `master_admin` (`id_master`, `username`, `email`, `password`, `phone`, `role_id`, `status`, `created_at`, `modify_at`) VALUES
(22, 'v_padiya', NULL, 'bec1be33398c96bda2024ae27b3e7349', '7016298987', 2, 0, '2020-03-23 00:00:00', '2020-03-22 18:06:39'),
(23, 'viral01441', NULL, '8cead2a560889867ef990b833cdefafb', 'viral441', 1, 0, '2020-03-24 00:00:00', '2020-07-21 07:11:38'),
(25, 'admin', NULL, 'admin', '9427101441', 1, 1, '2020-07-02 10:37:07', '2021-06-27 06:02:30'),
(26, 'rb_print', NULL, 'f6c623ab41f39eb2a97bb2efec6c851b', '9427101441', 3, 1, '2020-07-21 03:47:54', '2020-07-22 13:23:55'),
(27, 'rb_process', NULL, 'a39de36cd0c8cbae2ca4cf552fbb95e2', '9427101441', 4, 1, '2020-07-21 04:28:43', '2020-07-22 13:24:16'),
(28, 'rb_ghadi', NULL, '77866e78a84c0a7ac1b7bb73db8e8874', '9427101441', 5, 1, '2020-07-21 04:30:10', '2020-07-22 13:24:34'),
(29, 'rb_emdevide', NULL, 'ecfdb358090eba6b4df8b18c9747ac38', '9427101441', 6, 1, '2020-07-21 04:30:55', '2020-07-22 13:24:55'),
(30, 'rb_packing', NULL, '9167a172d100ec72442f006c040b7774', '9427101441', 7, 1, '2020-07-21 04:31:49', '2020-07-22 13:25:17'),
(31, 'rb_stock cut devide', NULL, '0c7caf28c3b3a5151bc381fcfc77b648', '8758610170', 2, 1, '2020-07-24 10:47:30', '2020-07-24 05:17:30');

-- --------------------------------------------------------

--
-- Table structure for table `packing`
--

CREATE TABLE `packing` (
  `packing_id` int(11) NOT NULL,
  `party_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `challan_no` int(11) NOT NULL,
  `bala_no` varchar(12) NOT NULL,
  `cut` double NOT NULL,
  `pcs` int(11) NOT NULL,
  `mno` varchar(123) NOT NULL,
  `unique_code` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `packing`
--

INSERT INTO `packing` (`packing_id`, `party_id`, `item_id`, `challan_no`, `bala_no`, `cut`, `pcs`, `mno`, `unique_code`, `status`, `created_at`) VALUES
(1, 1, 1, 2, '1234', 5.5, 120, 'apple', '', 1, '2021-07-13 '),
(2, 1, 1, 2, '1235', 5.5, 230, 'apple', '', 1, '2021-07-13 ');

-- --------------------------------------------------------

--
-- Table structure for table `party`
--

CREATE TABLE `party` (
  `party_id` int(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `party_name` varchar(50) NOT NULL,
  `srt_name` varchar(100) NOT NULL,
  `mobile_number` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `address` varchar(500) NOT NULL,
  `gst_number` varchar(30) NOT NULL,
  `pan_number` varchar(25) NOT NULL,
  `created_at` datetime NOT NULL,
  `modify_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `party`
--

INSERT INTO `party` (`party_id`, `user_id`, `party_name`, `srt_name`, `mobile_number`, `city`, `address`, `gst_number`, `pan_number`, `created_at`, `modify_at`, `status`) VALUES
(1, 25, 'Party1', 'Ljsdfh', '12312341234', 'ckzjcn', 'jnk', 'BKHDSVF871294', 'kj', '2021-06-27 11:58:56', '2021-06-27 06:28:56', 1);

-- --------------------------------------------------------

--
-- Table structure for table `patla`
--

CREATE TABLE `patla` (
  `patla_id` int(20) NOT NULL,
  `patla_name` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `mobile_no` varchar(12) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 25,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `is_delete` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `modify_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patla`
--

INSERT INTO `patla` (`patla_id`, `patla_name`, `address`, `mobile_no`, `user_id`, `status`, `is_delete`, `created_at`, `modify_at`) VALUES
(1, 'Axay', 'jetpur', '9033752754', 25, 1, 1, '2021-06-28 10:58:39', '2021-06-28 17:29:13');

-- --------------------------------------------------------

--
-- Table structure for table `patla_color`
--

CREATE TABLE `patla_color` (
  `patlacolor_id` int(11) NOT NULL,
  `patla_id` int(11) NOT NULL,
  `challan_no` int(11) NOT NULL COMMENT 'invoice_no',
  `date` date NOT NULL,
  `month` varchar(12) NOT NULL,
  `year` year(4) NOT NULL,
  `total_qty` double NOT NULL,
  `total` double NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patla_color`
--

INSERT INTO `patla_color` (`patlacolor_id`, `patla_id`, `challan_no`, `date`, `month`, `year`, `total_qty`, `total`, `status`, `created_at`) VALUES
(6, 1, 1, '2021-07-22', '07', 2021, 100, 2000, 1, '2021-07-21 22:51:50'),
(7, 1, 2, '2021-07-22', '07', 2021, 100, 2000, 1, '2021-07-21 22:52:20'),
(8, 1, 3, '2021-07-22', '07', 2021, 1000, 102000, 1, '2021-07-22 11:43:50');

-- --------------------------------------------------------

--
-- Table structure for table `patla_color_lot`
--

CREATE TABLE `patla_color_lot` (
  `pcd_id` int(11) NOT NULL,
  `patlacolor_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `qty` double NOT NULL,
  `rate` double NOT NULL,
  `amount` double NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patla_color_lot`
--

INSERT INTO `patla_color_lot` (`pcd_id`, `patlacolor_id`, `color_id`, `qty`, `rate`, `amount`, `status`, `created_at`) VALUES
(6, 4, 1, 100, 200, 20000, 1, '2021-07-22 04:15:41'),
(7, 5, 1, 100, 200, 20000, 1, '2021-07-22 04:15:48'),
(8, 6, 1, 100, 20, 2000, 1, '2021-07-22 04:21:50'),
(9, 7, 1, 100, 20, 2000, 1, '2021-07-22 04:22:20'),
(10, 8, 2, 1000, 102, 102000, 1, '2021-07-22 04:29:30');

-- --------------------------------------------------------

--
-- Table structure for table `printing`
--

CREATE TABLE `printing` (
  `printing_id` int(11) NOT NULL,
  `Print_Code` varchar(11) NOT NULL,
  `challan_no` int(11) NOT NULL,
  `party_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `patla_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `t_design` int(11) NOT NULL,
  `t_pcs` double NOT NULL,
  `t_missprint` double NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `modify_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `printing`
--

INSERT INTO `printing` (`printing_id`, `Print_Code`, `challan_no`, `party_id`, `item_id`, `patla_id`, `date`, `t_design`, `t_pcs`, `t_missprint`, `user_id`, `status`, `created_at`, `modify_at`) VALUES
(1, 'print_1', 1, 1, 2, 1, '2021-07-07', 1, 1000, 0, 25, 1, '2021-07-07 11:30:21', '2021-07-07 18:00:21'),
(2, '', 3, 1, 1, 1, '2021-07-15', 1, 1000, 10, 25, 1, '2021-07-15 10:41:55', '2021-07-15 05:11:55'),
(3, '', 4, 1, 1, 1, '2021-07-15', 2, 253, 8, 25, 1, '2021-07-15 11:45:13', '2021-07-15 06:15:13');

-- --------------------------------------------------------

--
-- Table structure for table `priting_lot`
--

CREATE TABLE `priting_lot` (
  `pl_id` int(11) NOT NULL,
  `printing_id` int(11) NOT NULL,
  `challan_no` int(11) NOT NULL,
  `date` date NOT NULL,
  `party_id` int(11) NOT NULL,
  `unique_design` varchar(255) NOT NULL,
  `design_no` varchar(50) NOT NULL,
  `color` varchar(50) NOT NULL,
  `pcs` double NOT NULL,
  `miss_pcs` double NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `modify_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `priting_lot`
--

INSERT INTO `priting_lot` (`pl_id`, `printing_id`, `challan_no`, `date`, `party_id`, `unique_design`, `design_no`, `color`, `pcs`, `miss_pcs`, `status`, `created_at`, `modify_at`) VALUES
(2, 1, 1, '2021-07-07', 1, 'CfektRIoPDliWmbssC', '2131', 'red', 1000, 0, 1, '2021-07-07 11:30:21', '2021-07-07 18:00:21'),
(3, 2, 3, '2021-07-15', 1, '8Y4IjFl2qUJdtv3EUX', '123', 'red', 1000, 10, 1, '2021-07-15 10:41:55', '2021-07-15 05:11:55'),
(4, 3, 4, '2021-07-15', 1, 'r8nkxdcPfVzBo2E6DA', 'avbh', 're', 12, 1, 1, '2021-07-15 11:45:13', '2021-07-15 06:15:13'),
(5, 3, 4, '2021-07-15', 1, 'nCBMKUUvl4PilGm6Xs', '234', 'rerd', 241, 7, 1, '2021-07-15 11:45:13', '2021-07-15 06:15:13');

-- --------------------------------------------------------

--
-- Table structure for table `process`
--

CREATE TABLE `process` (
  `process_id` int(11) NOT NULL,
  `challan_no` int(11) NOT NULL,
  `name` varchar(35) NOT NULL,
  `address` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `lot_no` int(11) NOT NULL,
  `vahicle` varchar(100) NOT NULL,
  `vahicle_no` varchar(50) NOT NULL,
  `sb_id` int(11) NOT NULL COMMENT 'sub process id',
  `tarsport_id` int(11) DEFAULT NULL,
  `t_design` int(11) NOT NULL,
  `t_pcs` int(11) NOT NULL,
  `cloth_value` double NOT NULL,
  `process_value` double NOT NULL COMMENT 'process(silicate,kanji,dhulai)  sb_val',
  `sub_total` double NOT NULL,
  `tax` double NOT NULL,
  `g_total` double NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `modify_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `process_lot`
--

CREATE TABLE `process_lot` (
  `pl_id` int(11) NOT NULL,
  `process_id` int(11) NOT NULL,
  `lot_no` int(11) NOT NULL,
  `sb_id` int(11) NOT NULL COMMENT 'sub process id',
  `unique_design` varchar(255) NOT NULL,
  `design_no` varchar(100) NOT NULL,
  `color` varchar(100) NOT NULL,
  `pcs` int(11) NOT NULL,
  `patla_Id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `modify_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `return_devide`
--

CREATE TABLE `return_devide` (
  `returndevide_id` int(11) NOT NULL,
  `challan_no` int(11) NOT NULL,
  `party_id` int(11) NOT NULL,
  `cutlot_id` int(11) NOT NULL,
  `devide_id` int(11) NOT NULL,
  `devide_challan_no` varchar(255) NOT NULL,
  `item_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `patla_id` int(11) NOT NULL,
  `total_pcs` int(11) NOT NULL,
  `miss_pcs` int(11) NOT NULL,
  `rate` double NOT NULL,
  `g_total` double NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `return_devide`
--

INSERT INTO `return_devide` (`returndevide_id`, `challan_no`, `party_id`, `cutlot_id`, `devide_id`, `devide_challan_no`, `item_id`, `date`, `patla_id`, `total_pcs`, `miss_pcs`, `rate`, `g_total`, `user_id`, `status`, `created_at`) VALUES
(4, 5, 1, 7, 6, '8090', 2, '2021-07-22', 1, 105, 0, 20, 2100, 25, 1, '2021-07-22 11:46:38'),
(5, 6, 1, 7, 6, '8090', 2, '2021-07-22', 1, 104, 0, 20, 2080, 25, 1, '2021-07-22 11:47:02');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `modify_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `name`, `status`, `created_at`, `modify_at`) VALUES
(1, 'SuperAdmin', 1, '2020-01-08 12:06:35', '2020-07-20 13:35:24'),
(2, 'Stock-Cut-Devide', 1, '2020-01-14 12:06:35', '2020-07-21 09:41:42'),
(3, 'Printing', 1, '2020-01-08 12:06:35', '2020-07-20 13:35:24'),
(4, 'Process', 1, '2020-01-14 12:06:35', '2020-07-21 09:41:42'),
(5, 'Ghadi', 1, '2020-01-14 12:06:35', '2020-07-21 09:41:42'),
(6, 'EM Devide - Embroidery', 1, '2020-01-08 12:06:35', '2020-07-20 13:35:24'),
(7, 'Packing', 1, '2020-01-14 12:06:35', '2020-07-21 09:41:42');

-- --------------------------------------------------------

--
-- Table structure for table `sell_invoice`
--

CREATE TABLE `sell_invoice` (
  `id_sell` int(11) NOT NULL,
  `bill_type` varchar(50) NOT NULL,
  `gst_type` int(11) NOT NULL DEFAULT 1,
  `party_id` int(11) NOT NULL,
  `invoice_no` int(11) NOT NULL,
  `transport_id` int(11) DEFAULT NULL,
  `transport_name` varchar(100) DEFAULT NULL,
  `buyer_name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `mobile` int(10) NOT NULL,
  `subtotal` double NOT NULL,
  `advance` double NOT NULL DEFAULT 0,
  `baki` double NOT NULL DEFAULT 0,
  `discount` double NOT NULL DEFAULT 0,
  `all_gst` double NOT NULL,
  `cur_year` int(11) NOT NULL DEFAULT 2021,
  `grandtotal` double NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `modify_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sell_invoice`
--

INSERT INTO `sell_invoice` (`id_sell`, `bill_type`, `gst_type`, `party_id`, `invoice_no`, `transport_id`, `transport_name`, `buyer_name`, `address`, `city`, `state`, `country`, `date`, `mobile`, `subtotal`, `advance`, `baki`, `discount`, `all_gst`, `cur_year`, `grandtotal`, `status`, `created_at`, `modify_at`) VALUES
(1, 'debit', 2, 1, 1, NULL, NULL, 'Xyz', 'jnk', 'ckzjcn', 'West bangal', 'india', '2021-07-15', 2147483647, 24750, 0, 0, 0, 4455, 2021, 29205, 1, '2021-07-15 09:41:51', '2021-07-15 04:11:51'),
(2, 'debit', 2, 1, 2, 0, NULL, 'Xyz', 'jnk', 'ckzjcn', 'West bangal', 'india', '2021-07-15', 2147483647, 7986, 0, 0, 0, 1437.48, 2021, 9423, 1, '2021-07-15 10:42:30', '2021-07-15 05:12:30'),
(3, 'debit', 1, 1, 3, NULL, NULL, 'Xyz', 'jnk', 'ckzjcn', 'West bangal', 'india', '2021-07-15', 2147483647, 297000, 0, 0, 0, 53460, 2021, 350460, 1, '2021-07-15 11:56:19', '2021-07-15 06:26:19');

-- --------------------------------------------------------

--
-- Table structure for table `sell_product`
--

CREATE TABLE `sell_product` (
  `id_sellproduct` int(11) NOT NULL,
  `sellinvoice_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `Description` text NOT NULL,
  `cut_mtr` double NOT NULL,
  `t_mtr` double NOT NULL,
  `quality` varchar(50) NOT NULL,
  `price` double NOT NULL,
  `date` date NOT NULL,
  `total` double NOT NULL,
  `sgst_p` double DEFAULT NULL,
  `cgst_p` double DEFAULT NULL,
  `sgst` double DEFAULT NULL,
  `cgst` double DEFAULT NULL,
  `igst_p` double DEFAULT NULL,
  `igst` double DEFAULT NULL,
  `amount` double NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `modify_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sell_product`
--

INSERT INTO `sell_product` (`id_sellproduct`, `sellinvoice_id`, `item_id`, `Description`, `cut_mtr`, `t_mtr`, `quality`, `price`, `date`, `total`, `sgst_p`, `cgst_p`, `sgst`, `cgst`, `igst_p`, `igst`, `amount`, `status`, `created_at`, `modify_at`) VALUES
(1, 1, 1, '', 5.5, 550, '100', 45, '2021-07-15', 24750, NULL, NULL, NULL, NULL, 18, 4455, 29205, 1, '2021-07-15 09:41:51', '2021-07-15 04:11:51'),
(2, 2, 1, '', 5.5, 665.5, '121', 12, '2021-07-15', 7986, NULL, NULL, NULL, NULL, 18, 1437.48, 9423.48, 1, '2021-07-15 10:42:30', '2021-07-15 05:12:30');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `s_key` varchar(255) NOT NULL,
  `s_value` varchar(255) NOT NULL,
  `s_index` int(11) NOT NULL,
  `modify_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `s_key`, `s_value`, `s_index`, `modify_at`) VALUES
(1, 'sgst', '9', 1, '2021-01-25 09:38:30'),
(2, 'cgst', '9', 1, '2021-01-25 09:38:33'),
(3, 'igst', '18.0', 1, '2021-01-25 09:40:05'),
(4, 'hsn', '2222555', 2, '2020-02-12 06:29:20');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `stock_id` int(20) NOT NULL,
  `party_id` int(11) NOT NULL,
  `challan_no` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `marchant_no` varchar(20) DEFAULT NULL,
  `item_id` int(20) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `t_bala` int(11) NOT NULL,
  `gst_no` varchar(30) NOT NULL,
  `pan_no` varchar(24) NOT NULL,
  `total_meter` double NOT NULL,
  `transport_id` int(11) NOT NULL,
  `lot_no` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `modify_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stock_id`, `party_id`, `challan_no`, `date`, `marchant_no`, `item_id`, `mobile`, `t_bala`, `gst_no`, `pan_no`, `total_meter`, `transport_id`, `lot_no`, `user_id`, `status`, `created_at`, `modify_at`) VALUES
(6, 1, '20020', '2021-07-20', NULL, 1, '12312341234', 2, 'BKHDSVF871294', 'kj', 20000, 1, NULL, 25, 1, '2021-07-20 06:12:19', '2021-07-20 12:42:19'),
(7, 1, '2015', '2021-07-20', NULL, 2, '12312341234', 2, 'BKHDSVF871294', 'kj', 2000, 1, NULL, 25, 0, '2021-07-20 06:12:39', '2021-07-20 12:42:39'),
(8, 1, '8090', '2021-07-21', NULL, 2, '12312341234', 1, 'BKHDSVF871294', 'kj', 1000, 1, NULL, 25, 0, '2021-07-21 12:59:55', '2021-07-20 19:29:55'),
(9, 1, '101', '2021-07-22', NULL, 1, '12312341234', 1, 'BKHDSVF871294', 'kj', 2000, 1, NULL, 25, 1, '2021-07-22 12:53:11', '2021-07-22 07:23:11');

-- --------------------------------------------------------

--
-- Table structure for table `stock_product`
--

CREATE TABLE `stock_product` (
  `stockproduct_id` int(20) NOT NULL,
  `stock_id` int(20) NOT NULL,
  `bala_no` varchar(20) NOT NULL,
  `mtr` double NOT NULL,
  `lr_no` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `modify_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock_product`
--

INSERT INTO `stock_product` (`stockproduct_id`, `stock_id`, `bala_no`, `mtr`, `lr_no`, `created_at`, `modify_at`, `status`) VALUES
(9, 6, '200', 10000, '1000', '2021-07-20 18:07:12', '2021-07-20 12:42:19', 1),
(10, 6, '201', 10000, '1000', '2021-07-20 18:07:12', '2021-07-20 12:42:19', 1),
(11, 7, '200', 1000, '1000', '2021-07-20 18:07:12', '2021-07-20 12:42:39', 1),
(12, 7, '201', 1000, '1000', '2021-07-20 18:07:12', '2021-07-20 12:42:39', 1),
(13, 8, '2000', 1000, '1000', '2021-07-21 00:07:59', '2021-07-20 19:29:55', 1),
(14, 9, '1000', 2000, '10002', '2021-07-22 12:07:53', '2021-07-22 07:23:11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sub_process`
--

CREATE TABLE `sub_process` (
  `id_sub_process` int(11) NOT NULL,
  `by_seq` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `is_status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modify_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_process`
--

INSERT INTO `sub_process` (`id_sub_process`, `by_seq`, `name`, `status`, `is_status`, `created_at`, `modify_at`) VALUES
(1, 1, 'silicate', 1, 1, '2021-07-07 18:42:54', '2021-07-07 18:42:54');

-- --------------------------------------------------------

--
-- Table structure for table `transport`
--

CREATE TABLE `transport` (
  `transport_id` int(20) NOT NULL,
  `transport_name` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `modify_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transport`
--

INSERT INTO `transport` (`transport_id`, `transport_name`, `user_id`, `created_at`, `modify_at`, `status`) VALUES
(1, 'Abc', 25, '2021-06-27 11:59:00', '2021-06-27 06:29:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transpoter`
--

CREATE TABLE `transpoter` (
  `transport_id` int(20) NOT NULL,
  `transport_name` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `modify_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transpoter`
--

INSERT INTO `transpoter` (`transport_id`, `transport_name`, `user_id`, `created_at`, `modify_at`, `status`) VALUES
(1, 'Abc', 25, '2021-06-27 11:59:00', '2021-06-27 06:29:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `userprofile`
--

CREATE TABLE `userprofile` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `modify_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userprofile`
--

INSERT INTO `userprofile` (`id`, `user_id`, `name`, `image`, `created_at`, `modify_at`) VALUES
(1, 18, 'SAMARPAN ENTERPRISE', '1588620822_larklogo_sm.png', '2020-03-16 10:19:44', '2020-05-04 19:33:42'),
(2, 17, 'SAMARPAN SILVER', '1584604041_logo_sm (1).png', '2020-03-18 09:45:41', '2020-03-19 07:47:21'),
(3, 20, 'DHAVAL LIMBASIYA', '1584647302_Dhaval Limbasiya.jpg', '2020-03-20 01:16:42', '2020-03-19 19:48:22'),
(4, 22, 'VIRAL PADIYA', '1584900503_images.png', '2020-03-22 11:38:23', '2020-03-22 18:08:23'),
(5, 21, 'DHAVAL LIMBASIYA', '1591098945_larklogo_sm.png', '2020-04-06 02:08:06', '2020-06-02 11:55:45'),
(6, 24, 'viral padiya', '1592414981_unnamed.jpg', '2020-06-17 10:40:56', '2020-06-17 17:29:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`color_id`);

--
-- Indexes for table `cut`
--
ALTER TABLE `cut`
  ADD PRIMARY KEY (`id_cut`);

--
-- Indexes for table `cut_lot`
--
ALTER TABLE `cut_lot`
  ADD PRIMARY KEY (`cutlot_id`);

--
-- Indexes for table `devide`
--
ALTER TABLE `devide`
  ADD PRIMARY KEY (`devide_id`);

--
-- Indexes for table `em_user`
--
ALTER TABLE `em_user`
  ADD PRIMARY KEY (`emuser_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `log_acvity`
--
ALTER TABLE `log_acvity`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `master_admin`
--
ALTER TABLE `master_admin`
  ADD PRIMARY KEY (`id_master`);

--
-- Indexes for table `packing`
--
ALTER TABLE `packing`
  ADD PRIMARY KEY (`packing_id`);

--
-- Indexes for table `party`
--
ALTER TABLE `party`
  ADD PRIMARY KEY (`party_id`);

--
-- Indexes for table `patla`
--
ALTER TABLE `patla`
  ADD PRIMARY KEY (`patla_id`);

--
-- Indexes for table `patla_color`
--
ALTER TABLE `patla_color`
  ADD PRIMARY KEY (`patlacolor_id`);

--
-- Indexes for table `patla_color_lot`
--
ALTER TABLE `patla_color_lot`
  ADD PRIMARY KEY (`pcd_id`);

--
-- Indexes for table `printing`
--
ALTER TABLE `printing`
  ADD PRIMARY KEY (`printing_id`),
  ADD KEY `printcode` (`Print_Code`);

--
-- Indexes for table `priting_lot`
--
ALTER TABLE `priting_lot`
  ADD PRIMARY KEY (`pl_id`);

--
-- Indexes for table `process`
--
ALTER TABLE `process`
  ADD PRIMARY KEY (`process_id`);

--
-- Indexes for table `process_lot`
--
ALTER TABLE `process_lot`
  ADD PRIMARY KEY (`pl_id`);

--
-- Indexes for table `return_devide`
--
ALTER TABLE `return_devide`
  ADD PRIMARY KEY (`returndevide_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `sell_invoice`
--
ALTER TABLE `sell_invoice`
  ADD PRIMARY KEY (`id_sell`);

--
-- Indexes for table `sell_product`
--
ALTER TABLE `sell_product`
  ADD PRIMARY KEY (`id_sellproduct`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `stock_product`
--
ALTER TABLE `stock_product`
  ADD PRIMARY KEY (`stockproduct_id`);

--
-- Indexes for table `sub_process`
--
ALTER TABLE `sub_process`
  ADD PRIMARY KEY (`id_sub_process`),
  ADD UNIQUE KEY `by_seq` (`by_seq`);

--
-- Indexes for table `transport`
--
ALTER TABLE `transport`
  ADD PRIMARY KEY (`transport_id`);

--
-- Indexes for table `transpoter`
--
ALTER TABLE `transpoter`
  ADD PRIMARY KEY (`transport_id`);

--
-- Indexes for table `userprofile`
--
ALTER TABLE `userprofile`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `color_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cut`
--
ALTER TABLE `cut`
  MODIFY `id_cut` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cut_lot`
--
ALTER TABLE `cut_lot`
  MODIFY `cutlot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `devide`
--
ALTER TABLE `devide`
  MODIFY `devide_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `em_user`
--
ALTER TABLE `em_user`
  MODIFY `emuser_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `log_acvity`
--
ALTER TABLE `log_acvity`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `master_admin`
--
ALTER TABLE `master_admin`
  MODIFY `id_master` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `packing`
--
ALTER TABLE `packing`
  MODIFY `packing_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `party`
--
ALTER TABLE `party`
  MODIFY `party_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `patla`
--
ALTER TABLE `patla`
  MODIFY `patla_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `patla_color`
--
ALTER TABLE `patla_color`
  MODIFY `patlacolor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `patla_color_lot`
--
ALTER TABLE `patla_color_lot`
  MODIFY `pcd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `printing`
--
ALTER TABLE `printing`
  MODIFY `printing_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `priting_lot`
--
ALTER TABLE `priting_lot`
  MODIFY `pl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `process`
--
ALTER TABLE `process`
  MODIFY `process_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `process_lot`
--
ALTER TABLE `process_lot`
  MODIFY `pl_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `return_devide`
--
ALTER TABLE `return_devide`
  MODIFY `returndevide_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sell_invoice`
--
ALTER TABLE `sell_invoice`
  MODIFY `id_sell` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sell_product`
--
ALTER TABLE `sell_product`
  MODIFY `id_sellproduct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `stock_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `stock_product`
--
ALTER TABLE `stock_product`
  MODIFY `stockproduct_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `sub_process`
--
ALTER TABLE `sub_process`
  MODIFY `id_sub_process` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transport`
--
ALTER TABLE `transport`
  MODIFY `transport_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transpoter`
--
ALTER TABLE `transpoter`
  MODIFY `transport_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `userprofile`
--
ALTER TABLE `userprofile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
