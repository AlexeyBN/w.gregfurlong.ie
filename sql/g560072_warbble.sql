-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Авг 20 2015 г., 17:09
-- Версия сервера: 5.5.43-0ubuntu0.14.04.1
-- Версия PHP: 5.5.9-1ubuntu4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `g560072_warbble`
--

-- --------------------------------------------------------

--
-- Структура таблицы `graph`
--

CREATE TABLE IF NOT EXISTS `graph` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `followers` bigint(20) DEFAULT NULL,
  `social` bigint(20) DEFAULT NULL,
  `webclicks` bigint(20) DEFAULT NULL,
  `coupon` bigint(20) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `graph`
--

INSERT INTO `graph` (`id`, `user_id`, `followers`, `social`, `webclicks`, `coupon`, `date`) VALUES
(4, 57, 1, 10, 10, 10, '2015-07-08'),
(3, 57, 1, 10, 10, 10, '2015-07-07'),
(5, 66, 1, 10, 10, 10, '2015-08-13'),
(6, 67, 1, 10, 10, 10, '2015-08-13'),
(7, 68, 1, 10, 10, 10, '2015-08-13'),
(8, 70, 1, 10, 10, 10, '2015-08-13'),
(9, 68, 0, 10, 10, 10, '2015-08-14'),
(10, 71, 2, 10, 10, 10, '2015-08-14'),
(11, 71, 2, 10, 10, 10, '2015-08-17'),
(12, 73, 2, 10, 10, 10, '2015-08-17'),
(13, 74, 2, 10, 10, 10, '2015-08-17'),
(14, 75, 2, 10, 10, 10, '2015-08-17'),
(15, 75, 2, 10, 10, 10, '2015-08-18'),
(16, 75, 2, 10, 10, 10, '2015-08-19'),
(17, 79, 2, 10, 10, 10, '2015-08-19'),
(18, 79, 2, 10, 10, 10, '2015-08-20'),
(19, 84, 2, 10, 10, 10, '2015-08-20');

-- --------------------------------------------------------

--
-- Структура таблицы `tweets`
--

CREATE TABLE IF NOT EXISTS `tweets` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `text` text NOT NULL,
  `date` int(11) NOT NULL,
  `offset` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `tweets`
--

INSERT INTO `tweets` (`id`, `user_id`, `text`, `date`, `offset`, `status`) VALUES
(5, 75, 'asdasdasdas', 1439919600, 180, 0),
(6, 72, 'qweqwe', 1440622800, 180, 0),
(15, 79, 'asdasdad', 1440068760, 180, 1),
(16, 84, 'asdasdasdasdasasd', 1439856000, 180, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(10) unsigned NOT NULL,
  `user_key` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `first_name` varchar(20) CHARACTER SET utf8 NOT NULL,
  `last_name` varchar(40) CHARACTER SET utf8 NOT NULL,
  `email` varchar(60) CHARACTER SET utf8 NOT NULL,
  `pass` varchar(40) CHARACTER SET utf8 NOT NULL,
  `website` varchar(60) CHARACTER SET utf8 DEFAULT NULL,
  `yahoo` varchar(60) CHARACTER SET utf8 DEFAULT NULL,
  `bio` text CHARACTER SET utf8,
  `avatar` varchar(60) CHARACTER SET utf8 DEFAULT NULL,
  `user_level` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `active` char(32) CHARACTER SET utf8 DEFAULT NULL,
  `registration_date` datetime NOT NULL,
  `oauth_uid` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `oauth_provider` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `twitter_oauth_token` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `twitter_oauth_token_secret` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `type` int(1) DEFAULT '2',
  `company` varchar(100) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `user_key`, `first_name`, `last_name`, `email`, `pass`, `website`, `yahoo`, `bio`, `avatar`, `user_level`, `active`, `registration_date`, `oauth_uid`, `oauth_provider`, `username`, `twitter_oauth_token`, `twitter_oauth_token_secret`, `type`, `company`) VALUES
(1, NULL, 'admin', 'tran', 'tphieuit@gmail.com', '4af96c504e234e052c6d23bc9bf1412831b8276e', NULL, NULL, NULL, NULL, 1, NULL, '2015-05-04 02:05:45', NULL, NULL, NULL, NULL, NULL, 2, 'emmettogallachoir@gmail.com'),
(2, NULL, 'admin', 'hieu', 'nookenvinhieu92@gmail.com', '4af96c504e234e052c6d23bc9bf1412831b8276e', NULL, NULL, NULL, NULL, 1, NULL, '2015-05-04 12:55:13', NULL, NULL, NULL, NULL, NULL, 2, 'emmettogallachoir@gmail.com'),
(4, NULL, 'admin', 'test', 'gregfurlong@warbble.com', 'ff5b937ce5390d1068d39f8932a2bf9dbe5f2296', NULL, NULL, NULL, NULL, 1, NULL, '2015-05-04 13:19:19', NULL, NULL, NULL, NULL, NULL, 2, 'emmettogallachoir@gmail.com'),
(7, NULL, 'Há»“', 'Há»¯u Hiá»n', 'huuhienqt@gmail.com', 'f5bb0c8de146c67b44babbf4e6584cc0', '', NULL, '', 'uploads/avatars/', 1, NULL, '2015-05-07 01:08:48', NULL, NULL, NULL, NULL, NULL, 2, 'emmettogallachoir@gmail.com'),
(8, 'cedaae1e4cd0ad1f06247afe78e3af15', 'Greg', 'Furlong', 'greg.furlong@gmail.com', '2ac9cb7dc02b3c0083eb70898e549b63', 'gregfurlong.com', NULL, 'Tcctctctccc', 'uploads/avatars/', 1, NULL, '2015-08-07 17:06:57', NULL, NULL, NULL, NULL, NULL, 0, 'admin'),
(9, NULL, 'emmett', 'gallagher', 'emmettogallachoir@gmail.com', '97d2e95287858b7094e45f48c23abaf7', NULL, NULL, NULL, NULL, 1, NULL, '2015-05-12 20:23:54', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(10, NULL, 'Canh', 'Luong', 'hoaicanhqt@gmail.com', '4297f44b13955235245b2497399d7a93', NULL, NULL, NULL, NULL, 1, NULL, '2015-05-19 15:58:05', NULL, NULL, NULL, NULL, NULL, 2, 'langletonthuong92@gmail.com'),
(11, NULL, 'Há»“', 'Hiá»n', 'nhiha60591@gmail.com', '', NULL, NULL, NULL, NULL, 1, NULL, '2015-06-01 15:05:18', NULL, NULL, NULL, NULL, NULL, 2, 'langletonthuong92@gmail.com'),
(12, NULL, 'LÃ£ng Xáº¹c', 'Hiáº¿u', 'zazo92s2@gmail.com', '', NULL, NULL, NULL, NULL, 1, NULL, '2015-05-29 18:36:39', NULL, NULL, NULL, NULL, NULL, 2, 'langletonthuong92@gmail.com'),
(13, NULL, 'Tá»•n ThÆ°Æ¡ng', 'Láº·ng Láº½', 'langletonthuong92@gmail.com', '', NULL, NULL, NULL, NULL, 1, NULL, '2015-05-27 16:44:59', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(14, NULL, 'Pháº¡m', 'HÃ¹ng', 'fallinglove209@gmail.com', '', NULL, NULL, NULL, NULL, 1, NULL, '2015-05-31 15:54:40', NULL, NULL, NULL, NULL, NULL, 2, 'langletonthuong92@gmail.com'),
(25, NULL, 'Paul', 'Hahn', 'paul.hahn918@gmail.com', '040b7cf4a55014e185813e0644502ea9', NULL, NULL, NULL, NULL, 1, NULL, '2015-06-26 13:22:31', NULL, NULL, NULL, NULL, NULL, 2, 'emmettogallachoir@gmail.com'),
(41, NULL, 'a', 'a', 'test@test.com', '6a204bd89f3c8348afd5c77c717a097a', NULL, NULL, NULL, NULL, 1, NULL, '2015-06-29 13:17:03', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(46, NULL, 'ff', 'ff', 'f@b.com', '6a204bd89f3c8348afd5c77c717a097a', NULL, NULL, NULL, NULL, 1, NULL, '2015-07-01 17:07:58', NULL, NULL, NULL, NULL, NULL, 2, 'aron.jonsson711@gmail.com'),
(57, NULL, 'WarbbleHQ', 'WarbbleHQ', '3356910579', '', NULL, NULL, NULL, NULL, 1, NULL, '2015-07-08 11:10:55', NULL, NULL, NULL, NULL, NULL, 2, NULL),
(58, NULL, 'Emmett', 'Gallagher', 'emmettogallachoir@hotmail.com', '76c3a377bbc631ff29cb15287ea3c7e3', NULL, NULL, NULL, NULL, 1, NULL, '2015-07-10 17:19:17', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(59, NULL, 'Rich', 'Springer', 'springer.richard@gmail.com', '', NULL, NULL, NULL, NULL, 1, NULL, '2015-07-10 17:25:49', NULL, NULL, NULL, NULL, NULL, 2, NULL),
(60, NULL, 'Vadim', 'Kravtsov', 'vadim.photoman@gmail.com', '', NULL, NULL, NULL, NULL, 1, NULL, '2015-07-13 07:50:59', NULL, NULL, NULL, NULL, NULL, 2, NULL),
(64, NULL, 'Test', 'Tester', 'test11@test.com', '245eb0261df514f537b429ec6061df50', NULL, NULL, NULL, NULL, 1, 'eccc4b47f08386e701a3afafde1802ae', '2015-08-13 12:01:45', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(65, NULL, 'Test', 'Tester', 'testerdev@mailinator.com', '245eb0261df514f537b429ec6061df50', NULL, NULL, NULL, NULL, 1, NULL, '2015-08-13 12:03:24', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(72, NULL, 'qwe', 'qwe', 'qwe@qwe.qwe', '76d80224611fc919a5d54f0ff9fba446', NULL, NULL, NULL, NULL, 1, NULL, '2015-05-04 02:05:45', NULL, NULL, NULL, '2449285284-D7oSOF0mNbHCuZHCCXVErwNVzIcfiQNn4XeTS9Z', 'XAUeUBITX2ZVMU299wdoyi33Y3L6Ics0roLJJjG968ZfX', 4, 'emmettogallachoir@gmail.com'),
(79, NULL, 'GoshaSerij', 'GoshaSerij', '2449285284', '', NULL, NULL, NULL, NULL, 1, NULL, '2015-08-20 14:01:36', NULL, NULL, NULL, '2449285284-D7oSOF0mNbHCuZHCCXVErwNVzIcfiQNn4XeTS9Z', 'XAUeUBITX2ZVMU299wdoyi33Y3L6Ics0roLJJjG968ZfX', 3, NULL),
(83, NULL, 'Gosha', 'Sery', 'vnutrr@mail.ru', '', NULL, NULL, NULL, NULL, 1, NULL, '2015-08-20 08:43:25', NULL, NULL, NULL, NULL, NULL, 5, NULL),
(84, NULL, 'devua31', 'devua31', '3367402498', '', NULL, NULL, NULL, NULL, 1, NULL, '2015-08-20 15:26:00', NULL, NULL, NULL, 'rrrrr3367402498-9pcAa4VqwArDe9Tl2rtWMr1vgp39pTjAjZ9B9QA', 'MBtylUNIuBTHpTYP0D7CZG3j8p7vziPOnAxqoYSDxT5IX', 3, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `user_meta`
--

CREATE TABLE IF NOT EXISTS `user_meta` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `user_meta`
--

INSERT INTO `user_meta` (`id`, `user_id`, `meta_key`, `meta_value`) VALUES
(1, 11, 'social_id', '828222477246660'),
(2, 11, 'social_type', 'facebook'),
(3, 11, 'social_id', '828222477246660'),
(4, 12, 'social_type', 'facebook'),
(5, 12, 'social_id', '347120268819515'),
(6, 13, 'social_type', 'facebook'),
(7, 13, 'social_id', '591579534318548'),
(8, 8, 'social_type', 'facebook'),
(9, 8, 'social_id', '10153962843360616'),
(10, 14, 'social_type', 'facebook'),
(11, 14, 'social_id', '574273749342305'),
(34, 57, 'social_type', 'twitter'),
(35, 57, 'social_id', '3356910579'),
(36, 59, 'social_type', 'facebook'),
(37, 59, 'social_id', '10152843060126784'),
(38, 60, 'social_type', 'facebook'),
(39, 60, 'social_id', '382964928568282'),
(44, 68, 'social_type', 'twitter'),
(45, 68, 'social_id', '2449285284'),
(46, 70, 'social_type', 'twitter'),
(47, 70, 'social_id', '3384532955'),
(65, 79, 'social_type', 'twitter'),
(66, 79, 'social_id', '2449285284'),
(67, 79, 'twitter_meta', 'O:8:"stdClass":42:{s:2:"id";i:2449285284;s:6:"id_str";s:10:"2449285284";s:4:"name";s:19:"Ð“Ð¾ÑˆÐ° Ð¡ÐµÑ€Ñ‹Ð¹";s:11:"screen_name";s:10:"GoshaSerij";s:8:"location";s:0:"";s:11:"description";s:0:"";s:3:"url";N;s:8:"entities";O:8:"stdClass":1:{s:11:"description";O:8:"stdClass":1:{s:4:"urls";a:0:{}}}s:9:"protected";b:0;s:15:"followers_count";i:2;s:13:"friends_count";i:14;s:12:"listed_count";i:0;s:10:"created_at";s:30:"Thu Apr 17 07:55:53 +0000 2014";s:16:"favourites_count";i:1;s:10:"utc_offset";i:-25200;s:9:"time_zone";s:26:"Pacific Time (US & Canada)";s:11:"geo_enabled";b:0;s:8:"verified";b:0;s:14:"statuses_count";i:18;s:4:"lang";s:2:"ru";s:6:"status";O:8:"stdClass":22:{s:10:"created_at";s:30:"Thu Aug 20 11:01:20 +0000 2015";s:2:"id";i:634319296760541184;s:6:"id_str";s:18:"634319296760541184";s:4:"text";s:27:"RT @devua31: one more tweet";s:6:"source";s:66:"<a href="http://twitter.com" rel="nofollow">Twitter Web Client</a>";s:9:"truncated";b:0;s:21:"in_reply_to_status_id";N;s:25:"in_reply_to_status_id_str";N;s:19:"in_reply_to_user_id";N;s:23:"in_reply_to_user_id_str";N;s:23:"in_reply_to_screen_name";N;s:3:"geo";N;s:11:"coordinates";N;s:5:"place";N;s:12:"contributors";N;s:16:"retweeted_status";O:8:"stdClass":21:{s:10:"created_at";s:30:"Thu Aug 20 11:00:31 +0000 2015";s:2:"id";i:634319092900564992;s:6:"id_str";s:18:"634319092900564992";s:4:"text";s:14:"one more tweet";s:6:"source";s:66:"<a href="http://twitter.com" rel="nofollow">Twitter Web Client</a>";s:9:"truncated";b:0;s:21:"in_reply_to_status_id";N;s:25:"in_reply_to_status_id_str";N;s:19:"in_reply_to_user_id";N;s:23:"in_reply_to_user_id_str";N;s:23:"in_reply_to_screen_name";N;s:3:"geo";N;s:11:"coordinates";N;s:5:"place";N;s:12:"contributors";N;s:13:"retweet_count";i:1;s:14:"favorite_count";i:0;s:8:"entities";O:8:"stdClass":4:{s:8:"hashtags";a:0:{}s:7:"symbols";a:0:{}s:13:"user_mentions";a:0:{}s:4:"urls";a:0:{}}s:9:"favorited";b:0;s:9:"retweeted";b:1;s:4:"lang";s:2:"en";}s:13:"retweet_count";i:1;s:14:"favorite_count";i:0;s:8:"entities";O:8:"stdClass":4:{s:8:"hashtags";a:0:{}s:7:"symbols";a:0:{}s:13:"user_mentions";a:1:{i:0;O:8:"stdClass":5:{s:11:"screen_name";s:7:"devua31";s:4:"name";s:6:"dev 31";s:2:"id";i:3367402498;s:6:"id_str";s:10:"3367402498";s:7:"indices";a:2:{i:0;i:3;i:1;i:11;}}}s:4:"urls";a:0:{}}s:9:"favorited";b:0;s:9:"retweeted";b:1;s:4:"lang";s:2:"en";}s:20:"contributors_enabled";b:0;s:13:"is_translator";b:0;s:22:"is_translation_enabled";b:0;s:24:"profile_background_color";s:6:"C0DEED";s:28:"profile_background_image_url";s:48:"http://abs.twimg.com/images/themes/theme1/bg.png";s:34:"profile_background_image_url_https";s:49:"https://abs.twimg.com/images/themes/theme1/bg.png";s:23:"profile_background_tile";b:0;s:17:"profile_image_url";s:74:"http://pbs.twimg.com/profile_images/632101586441900033/gFvVra6P_normal.jpg";s:23:"profile_image_url_https";s:75:"https://pbs.twimg.com/profile_images/632101586441900033/gFvVra6P_normal.jpg";s:18:"profile_banner_url";s:59:"https://pbs.twimg.com/profile_banners/2449285284/1439539753";s:18:"profile_link_color";s:6:"0084B4";s:28:"profile_sidebar_border_color";s:6:"C0DEED";s:26:"profile_sidebar_fill_color";s:6:"DDEEF6";s:18:"profile_text_color";s:6:"333333";s:28:"profile_use_background_image";b:1;s:20:"has_extended_profile";b:0;s:15:"default_profile";b:1;s:21:"default_profile_image";b:0;s:9:"following";b:0;s:19:"follow_request_sent";b:0;s:13:"notifications";b:0;}'),
(68, 83, 'social_type', 'facebook'),
(69, 83, 'social_id', '1637150986523247'),
(70, 84, 'social_type', 'twitter'),
(71, 84, 'social_id', '3367402498'),
(72, 84, 'twitter_meta', 'O:8:"stdClass":41:{s:2:"id";i:3367402498;s:6:"id_str";s:10:"3367402498";s:4:"name";s:6:"dev 31";s:11:"screen_name";s:7:"devua31";s:8:"location";s:0:"";s:11:"description";s:0:"";s:3:"url";N;s:8:"entities";O:8:"stdClass":1:{s:11:"description";O:8:"stdClass":1:{s:4:"urls";a:0:{}}}s:9:"protected";b:0;s:15:"followers_count";i:2;s:13:"friends_count";i:42;s:12:"listed_count";i:0;s:10:"created_at";s:30:"Thu Jul 09 09:12:44 +0000 2015";s:16:"favourites_count";i:0;s:10:"utc_offset";i:-25200;s:9:"time_zone";s:26:"Pacific Time (US & Canada)";s:11:"geo_enabled";b:0;s:8:"verified";b:0;s:14:"statuses_count";i:11;s:4:"lang";s:2:"ru";s:6:"status";O:8:"stdClass":21:{s:10:"created_at";s:30:"Thu Aug 20 11:25:01 +0000 2015";s:2:"id";i:634325258544279552;s:6:"id_str";s:18:"634325258544279552";s:4:"text";s:18:"I''m going to lanch";s:6:"source";s:61:"<a href="http://w.gregfurlong.ie/" rel="nofollow">Warbble</a>";s:9:"truncated";b:0;s:21:"in_reply_to_status_id";N;s:25:"in_reply_to_status_id_str";N;s:19:"in_reply_to_user_id";N;s:23:"in_reply_to_user_id_str";N;s:23:"in_reply_to_screen_name";N;s:3:"geo";N;s:11:"coordinates";N;s:5:"place";N;s:12:"contributors";N;s:13:"retweet_count";i:0;s:14:"favorite_count";i:0;s:8:"entities";O:8:"stdClass":4:{s:8:"hashtags";a:0:{}s:7:"symbols";a:0:{}s:13:"user_mentions";a:0:{}s:4:"urls";a:0:{}}s:9:"favorited";b:0;s:9:"retweeted";b:0;s:4:"lang";s:2:"en";}s:20:"contributors_enabled";b:0;s:13:"is_translator";b:0;s:22:"is_translation_enabled";b:1;s:24:"profile_background_color";s:6:"C0DEED";s:28:"profile_background_image_url";s:48:"http://abs.twimg.com/images/themes/theme1/bg.png";s:34:"profile_background_image_url_https";s:49:"https://abs.twimg.com/images/themes/theme1/bg.png";s:23:"profile_background_tile";b:0;s:17:"profile_image_url";s:74:"http://pbs.twimg.com/profile_images/619074350495350784/7EmEve1n_normal.png";s:23:"profile_image_url_https";s:75:"https://pbs.twimg.com/profile_images/619074350495350784/7EmEve1n_normal.png";s:18:"profile_link_color";s:6:"0084B4";s:28:"profile_sidebar_border_color";s:6:"C0DEED";s:26:"profile_sidebar_fill_color";s:6:"DDEEF6";s:18:"profile_text_color";s:6:"333333";s:28:"profile_use_background_image";b:1;s:20:"has_extended_profile";b:0;s:15:"default_profile";b:1;s:21:"default_profile_image";b:0;s:9:"following";b:0;s:19:"follow_request_sent";b:0;s:13:"notifications";b:0;}');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `graph`
--
ALTER TABLE `graph`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tweets`
--
ALTER TABLE `tweets`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `login` (`email`,`pass`);

--
-- Индексы таблицы `user_meta`
--
ALTER TABLE `user_meta`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `graph`
--
ALTER TABLE `graph`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT для таблицы `tweets`
--
ALTER TABLE `tweets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=85;
--
-- AUTO_INCREMENT для таблицы `user_meta`
--
ALTER TABLE `user_meta`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=73;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
