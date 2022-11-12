-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2022 at 02:29 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bwajes+`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) UNSIGNED NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `admin_type` tinyint(1) UNSIGNED NOT NULL,
  `gender` varchar(1) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `phone` varchar(16) DEFAULT NULL,
  `suspended` tinyint(1) UNSIGNED NOT NULL,
  `bio` text DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country` tinyint(3) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `registered_by` int(11) UNSIGNED NOT NULL,
  `updated_by` int(11) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `first_name`, `last_name`, `email`, `username`, `admin_type`, `gender`, `password`, `profile_image`, `phone`, `suspended`, `bio`, `website`, `birthdate`, `address`, `city`, `state`, `country`, `active`, `registered_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Andrew', 'Adelodun', 'andrewadelodun@gmail.com', 'retr64554df', 1, 'M', '$2y$10$dvaOr7240Hs/3YPl26YJtuOrDoLkaMIZPRnClRGacpjLSbqxRxB5m', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, '2022-08-08 17:46:00', '2022-08-25 14:35:39'),
(2, 'Seun', 'Lanre', 'seunlanre@gmail.com', 'B+seuqczlv', 2, 'M', '$2y$10$QU2Z/0h12R80dk/XiHiViuqWC3JBhEqWk5t9jSrWfNKg9PF3rzqe6', '1661292510_business.jpg', '+2349045634567', 0, '<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. A, laboriosam tenetur iste molestiae voluptatum quod vel quas, recusandae veniam, iure nemo odit aliquam ipsam ex deleniti nisi quam esse illo pariatur dolorum nobis aut? Maiores, veniam? Recusandae culpa modi labore et quos temporibus? Eligendi deleniti quam explicabo, quibusdam modi nostrum non temporibus quo tempore architecto consectetur repudiandae asperiores! Quam facilis fuga possimus, aperiam architecto dolorum cupiditate provident ipsum. Modi iure perferendis distinctio blanditiis hic recusandae maxime sunt sapiente laborum magni ratione accusamus, quasi similique voluptas, repellat minus inventore repudiandae? Quisquam maiores explicabo consectetur, ipsam quidem omnis tempore nulla nihil ullam, esse dolorem at libero. Nulla ipsum doloribus sunt consequuntur quasi ea corporis eveniet illo minima quisquam, placeat eius aliquam nostrum?</p>', 'http://localhost:9090/bwajesplus-app/admin/register-admin', NULL, '4, Moshalasi Street, Off Ade-Adenaike Street, Irawo Bus Stop', 'Ikorodu', 'Lagos', NULL, 0, 1, 6, '2022-08-23 22:08:30', '2022-08-23 23:08:30'),
(3, 'Niyi', 'Sola', 'niyisola@gmail.com', 'B+niyawhim', 1, 'M', '$2y$10$k4RK/lYe03gvAzHJ0BmzvOIRhvOg.PTmkQ1wF17ZABoXZ50z0mV.K', '1663375352_dog.jpg', '+2347045533567', 0, '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic veritatis nemo veniam fugit placeat quaerat unde, quos necessitatibus tenetur doloremque ipsum omnis laborum mollitia optio quasi dignissimos, adipisci esse quod reprehenderit ullam? Beatae dolore et similique ullam! Veniam tenetur, dolore tempore, hic consequuntur earum nisi ex natus fugiat quod ullam quaerat, obcaecati vero maxime accusamus aut esse. Adipisci nesciunt ducimus debitis quis dolorum saepe maiores corporis nihil accusamus, accusantium, consequuntur totam maxime tempore deserunt ut voluptas corrupti. Nobis minima laboriosam voluptates. Quidem earum minus quas rem mollitia rerum, nostrum fugiat dolore at quod laboriosam quaerat aliquam. Eaque perferendis illo labore?</p>', 'http://localhost:9090/bwajesplus-app/settings', '1999-07-13', '4, Moshalasi Street, Off Ade-Adenaike Street, Irawo Bus Stop', 'Ikorodu', 'Lagos', 130, 0, 1, 3, '2022-08-23 22:28:41', '2022-09-17 01:42:32'),
(4, 'Ngozi', 'Chidera', 'chidera@gmail.com', 'B+ngovdrbz', 1, 'F', '$2y$10$AkFHKLWDnf2uIZmsNQfjYeUdgCCpwsAITD6QEq2MxTPpF./boGoi.', '1663285200_ankara.jpg', '+2349047434567', 0, '<p><img alt=\"\" src=\"http://localhost:9090/bwajesplus-app/admin/upload_photos/1665055048_business4.jpg\" style=\"height:168px; width:300px\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti dignissimos sunt recusandae velit, voluptatem quas sapiente quis veniam iusto dolorum dicta aliquid, numquam dolor! Atque voluptate libero magni necessitatibus reiciendis, fuga laudantium. Repellendus porro exercitationem, ipsam mollitia omnis quasi consequuntur veniam rem facilis nam qui consequatur excepturi quia quidem hic iusto impedit dolorem expedita voluptatum earum illum. Aut, laborum reprehenderit! Quis voluptatum similique ipsum voluptates consectetur voluptatem mollitia cum rerum ad, explicabo neque repellat sit alias voluptatibus necessitatibus aspernatur architecto distinctio, porro vero! Aperiam soluta eligendi quos. Ab voluptates aut maiores repellendus sint, officiis eaque unde laborum beatae molestias, molestiae necessitatibus qui iusto reiciendis laboriosam illo incidunt nihil consequatur. Rerum praesentium, impedit, quos itaque a quasi ut voluptatem debitis neque eveniet mollitia architecto tempore quaerat vitae fuga ipsum! Quas nulla porro expedita&nbsp;</p>', 'http://localhost:9090/bwajesplus-app/admin/register-admin', '1995-02-14', '4, Moshalasi Street, Off Ade-Adenaike Street, Irawo Bus Stop', 'Ikorodu', 'Lagos', 130, 1, 3, 6, '2022-09-15 23:40:00', '2022-10-06 12:18:26'),
(5, 'Basic', 'Test', 'basic-test@bwajes-plus.andadel.com', 'B+basuhpmr', 2, 'F', '$2y$10$hMlYdS.RHTyVc04GmVTSourQNDWq7lOQxwaARYgxVrMpupVm9hgwO', '1665043821_author (1).jpg', '+2349045634567', 0, '<p>This is the testing account for basic admin&nbsp;This is the testing account for basic admin&nbsp;This is the testing account for basic admin&nbsp;This is the testing account for basic admin&nbsp;This is the testing account for basic admin&nbsp;This is the testing account for basic admin&nbsp;This is the testing account for basic admin&nbsp;This is the testing account for basic admin&nbsp;</p>', 'http://localhost:9090/bwajesplus-app/basic', '2022-10-02', '3, Basic Way', 'Toronto', 'Ontario', 36, 0, 4, 6, '2022-10-06 08:10:21', '2022-10-06 13:18:58'),
(6, 'Super', 'Test', 'super-test@bwajes-plus.andadel.com', 'B+supqlphi', 1, 'F', '$2y$10$btdsMsh0NZPefcf9VsnREO0c/9lgY75Wia9AB.i6zgTQxkgmgDSKe', '1665045457_blogging2.jpg', '+2349045634567', 0, '<p>This is the testing account for super admin&nbsp;This is the testing account for super admin&nbsp;This is the testing account for super admin&nbsp;This is the testing account for super admin&nbsp;This is the testing account for super admin&nbsp;This is the testing account for super admin&nbsp;This is the testing account for super admin&nbsp;This is the testing account for super admin&nbsp;This is the testing account for super admin&nbsp;This is the testing account for super admin&nbsp;This is the testing account for super admin&nbsp;</p>', 'http://localhost:9090/bwajesplus-app/super', '2022-09-12', '3, Super Way', 'Toronto', 'Ontario', 36, 1, 4, 4, '2022-10-06 08:37:37', '2022-10-06 09:37:37'),
(8, 'Andrew', 'Adelodun', 'andrewadelodun2@gmail.com', 'B+andwezrj', 2, 'M', '$2y$10$IqznPiQyJGW5031qI6g6fOPUE78i75RdRPOOeXD/3Exo.jueRL4ee', '1665059560_error-404.png', '+34545456', 0, '<p>andrewadelodun@gmail.com&nbsp;andrewadelodun@gmail.com&nbsp;andrewadelodun@gmail.com&nbsp;andrewadelodun@gmail.com&nbsp;andrewadelodun@gmail.com&nbsp;andrewadelodun@gmail.com&nbsp;andrewadelodun@gmail.com&nbsp;andrewadelodun@gmail.com&nbsp;andrewadelodun@gmail.com&nbsp;andrewadelodun@gmail.com&nbsp;andrewadelodun@gmail.com&nbsp;andrewadelodun@gmail.com&nbsp;andrewadelodun@gmail.com&nbsp;andrewadelodun@gmail.com&nbsp;andrewadelodun@gmail.com&nbsp;andrewadelodun@gmail.com&nbsp;andrewadelodun@gmail.com&nbsp;andrewadelodun@gmail.com&nbsp;andrewadelodun@gmail.com&nbsp;andrewadelodun@gmail.com&nbsp;andrewadelodun@gmail.com&nbsp;andrewadelodun@gmail.com&nbsp;andrewadelodun@gmail.com&nbsp;andrewadelodun@gmail.com&nbsp;andrewadelodun@gmail.com&nbsp;andrewadelodun@gmail.com&nbsp;andrewadelodun@gmail.com&nbsp;andrewadelodun@gmail.com&nbsp;andrewadelodun@gmail.com&nbsp;</p>', 'http://localhost:9090/bwajesplus-app/admin/register-admin', '2022-09-26', '3, frhgjgh', 'ltyys', 'sdsds', 19, 0, 6, 6, '2022-10-06 12:32:40', '2022-10-06 13:32:40');

-- --------------------------------------------------------

--
-- Table structure for table `admin_passwords`
--

CREATE TABLE `admin_passwords` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_passwords`
--

INSERT INTO `admin_passwords` (`id`, `email`, `password`, `created_at`) VALUES
(1, 'seunlanre@gmail.com', '$2y$10$QU2Z/0h12R80dk/XiHiViuqWC3JBhEqWk5t9jSrWfNKg9PF3rzqe6', '2022-08-23 22:08:30'),
(2, 'niyisola@gmail.com', '$2y$10$k4RK/lYe03gvAzHJ0BmzvOIRhvOg.PTmkQ1wF17ZABoXZ50z0mV.K', '2022-08-23 22:28:41'),
(3, 'chidera@gmail.com', '$2y$10$TLcKTB9K6akCvuyfMTQE4eJjfjK5Egi/NcgVP0.K1dLD9tHmSKHRW', '2022-09-15 23:40:00'),
(4, 'chidera@gmail.com', '$2y$10$/I9mPf8xsFqLaUKzR0ct6.TJn/3C6WyMOSnIsF9mJJ7W3gMLDBOAq', '2022-09-17 00:53:36'),
(5, 'basic-test@bwajes-plus.andadel.com', '$2y$10$hMlYdS.RHTyVc04GmVTSourQNDWq7lOQxwaARYgxVrMpupVm9hgwO', '2022-10-06 08:10:21'),
(6, 'super-test@bwajes-plus.andadel.com', '$2y$10$btdsMsh0NZPefcf9VsnREO0c/9lgY75Wia9AB.i6zgTQxkgmgDSKe', '2022-10-06 08:37:37'),
(7, 'andrewadelodun2@gmail.com', '$2y$10$IqznPiQyJGW5031qI6g6fOPUE78i75RdRPOOeXD/3Exo.jueRL4ee', '2022-10-06 12:32:40');

-- --------------------------------------------------------

--
-- Table structure for table `admin_sent_emails`
--

CREATE TABLE `admin_sent_emails` (
  `id` int(11) UNSIGNED NOT NULL,
  `set_from_name` varchar(50) DEFAULT NULL,
  `set_from_email` varchar(255) NOT NULL,
  `subject` varchar(60) NOT NULL,
  `body` text NOT NULL,
  `admin_id` int(11) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_sent_emails`
--

INSERT INTO `admin_sent_emails` (`id`, `set_from_name`, `set_from_email`, `subject`, `body`, `admin_id`, `created_at`) VALUES
(1, 'Billing', 'billings@bwajes-plus.andadel.com', 'The first subject', 'The first body The first body The first body', 3, '2022-09-05 19:26:20'),
(3, 'bwajes+', 'myphptestemail@gmail.com', 'Some subject Some subject Some subject Some subject', '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Facere assumenda vel in eius, itaque placeat asperiores dignissimos error, veniam illum adipisci reiciendis totam perspiciatis eligendi deserunt officiis quae mollitia incidunt. Dolorem perspiciatis ipsam in omnis. Corporis adipisci vero dolorem quos dignissimos dicta in laborum eveniet libero officiis quae iste itaque, nemo voluptatem similique necessitatibus quam porro, praesentium unde? In tempora ratione animi soluta facere esse saepe odit perferendis cumque fugit iste possimus quia adipisci, quae illo quidem quis unde laborum ab, iure doloremque velit at ea facilis? Iste tempore eos totam fuga ex tempora atque quo magni nulla earum qui recusandae hic eligendi quod repellat, dignissimos molestias ut labore. Hic, quam sint quibusdam maiores quisquam illum tempore incidunt necessitatibus, similique laboriosam tenetur nobis nemo? Voluptatum mollitia cum architecto eaque nobis aspernatur ea quidem iste aperiam. Nihil asperiores tempora natus cum quos ipsa maiores eum quas, esse recusandae sapiente ullam consequuntur laudantium suscipit praesentium dolor iste accusantium pariatur! Id, fugiat amet voluptates, repellat similique impedit placeat nisi ratione sit ea aspernatur atque suscipit nam neque doloribus voluptate alias iure tenetur necessitatibus animi natus adipisci veniam a. Deleniti facere illum, eos, repudiandae nesciunt magni esse quod molestiae tempore, veritatis atque. Quas eveniet, dignissimos fugiat quaerat magni omnis voluptates harum, quos ut cum distinctio nam hic. Veniam, facilis voluptatibus vitae libero sequi impedit vel aut sed commodi et praesentium maxime sint, eius porro hic fugiat molestias sit qui officiis accusamus cumque atque dolorem? Eius quo corrupti exercitationem amet voluptatum autem ratione natus porro sequi tempore debitis aut vero in aperiam sapiente beatae, mollitia velit commodi quaerat adipisci ducimus cupiditate perferendis, labore architecto? Omnis, quasi fugit! Ea corrupti quis, porro quo error laudantium? Saepe quis dolorem, reprehenderit nulla architecto nisi delectus rerum error iure adipisci id ducimus similique inventore. Ullam, cupiditate ipsum tempora ut dolorem voluptatem. Magni velit aperiam reiciendis. Aliquam, deleniti inventore labore tempore enim vel unde dignissimos beatae, expedita, quibusdam adipisci modi tempora vero harum nobis iure tenetur illo dolore maiores quia in dolores deserunt fugit quasi? Expedita culpa perspiciatis rerum incidunt officia earum ducimus possimus perferendis quam facere saepe accusamus debitis in molestias vitae magni doloremque sequi facilis minima numquam dignissimos, aut nobis. Id a fuga sapiente dignissimos obcaecati ipsum cum voluptatum! Adipisci labore voluptatibus maiores praesentium ipsa aut pariatur, veniam sequi, doloremque dolor, ad illo nesciunt rerum debitis ipsam quae ex laborum? Quam sequi quis similique amet aliquam dolorum dolor fugiat beatae dolores rem ratione placeat eum nemo, veniam, libero consequatur itaque cum alias odit. Dignissimos officiis cumque repudiandae magnam et, excepturi reprehenderit nobis praesentium velit ut ab voluptates in neque, quasi explicabo at accusamus. Doloremque quis repellendus vitae saepe autem nostrum beatae dolorem iure non obcaecati cupiditate sit, placeat dignissimos velit cumque facere nesciunt. Quisquam pariatur asperiores perspiciatis officiis illo? Quam unde culpa incidunt fuga consectetur ipsum, eligendi veritatis asperiores maxime architecto distinctio suscipit numquam! Amet id earum corrupti, ullam laudantium quod dolorem cumque. Doloribus iure labore consectetur praesentium voluptate veritatis velit, fugit quis tenetur quisquam, laborum hic facere sed magnam delectus optio, cum maxime. Alias rem dignissimos ex vero, error distinctio, voluptate aperiam quos porro nobis repellendus culpa. Reprehenderit aut, fuga iste explicabo molestias animi? Minima maiores praesentium facilis, laborum minus assumenda mollitia perferendis iure quidem autem officia vitae corporis voluptatibus quis sunt inventore ipsam iusto? Illo ad, dolores recusandae laudantium debitis reprehenderit in atque adipisci. Voluptas rerum explicabo architecto aut iusto, nostrum laborum sint et facilis dolor fuga animi, pariatur maiores cum, laboriosam accusamus totam consequatur quod. Vero saepe iusto fugiat, velit doloribus repudiandae impedit excepturi atque! Commodi distinctio accusamus delectus quae, doloremque sequi iusto corporis, perspiciatis ipsam itaque ipsum, ab modi cum voluptas. Dolorum, culpa pariatur? Ad neque iusto eum debitis, atque expedita numquam officia veritatis fugiat voluptatum nostrum nobis consequuntur illo necessitatibus vel cum asperiores autem id, obcaecati sunt doloribus. Officiis sed rem adipisci similique nesciunt alias accusamus delectus corrupti aperiam omnis reprehenderit dolorum nulla optio molestiae quasi quibusdam fugiat recusandae voluptatibus laudantium, in sit. Qui explicabo adipisci at atque impedit. Optio necessitatibus officiis sed non modi quidem aperiam ab animi, repellat exercitationem, delectus magnam vel ea facilis reprehenderit! Pariatur voluptas numquam dignissimos sequi natus dolor cum temporibus rem nesciunt cumque, suscipit ipsam voluptatem omnis magni totam, maiores necessitatibus placeat modi alias reiciendis. Maxime porro quasi iusto et suscipit id, nulla quam eos incidunt quas similique unde nemo consequatur nesciunt labore dolor animi ipsa quod corporis laudantium? Harum veniam odit sint dolore deserunt fugiat nobis est ut quaerat praesentium? Aliquid, amet modi temporibus fugiat soluta eum cum magnam voluptatem omnis excepturi earum nesciunt adipisci, voluptatibus necessitatibus praesentium quia asperiores debitis enim minus dolor atque consectetur rerum? Dolore ab recusandae sequi ducimus consectetur, neque, labore sed laboriosam quaerat aperiam error ipsam nesciunt pariatur nihil qui eveniet, autem expedita asperiores. Praesentium vel minima aliquam atque deserunt dolor deleniti itaque fugiat ad repellendus ipsum rem sed voluptates asperiores a hic ratione perspiciatis enim architecto quasi, sequi, voluptatibus autem sint neque! Aperiam nemo architecto optio unde accusamus, commodi odit, ipsa quas nam quod rem. Magni reiciendis fugit nobis hic, provident minima repellat ipsam explicabo, magnam, quisquam eaque alias ullam? Ratione maiores molestias quibusdam fugiat illo ipsum modi. Fuga tenetur, saepe quam repudiandae, ut pariatur aspernatur aperiam illo excepturi itaque recusandae placeat vero laborum aliquid inventore, dicta tempore dolore eos cumque at. Culpa, repudiandae sequi! Veniam eos, debitis incidunt fuga porro quod nostrum dolorem non. Temporibus reprehenderit, vel aspernatur culpa error adipisci doloremque velit nisi reiciendis, natus cupiditate non! Quis et provident dolor animi cupiditate quo expedita quia autem eius doloribus odio ex vero eligendi laudantium quisquam cum, aliquam atque voluptas quas fuga corrupti quam dicta. Fugit deserunt alias repudiandae error provident ipsum praesentium velit voluptatem, et possimus unde voluptatum, perferendis laudantium temporibus! Blanditiis tempore ea sed fugiat facilis non? Reiciendis sed quae deleniti, nemo accusamus neque nisi cupiditate ad fugiat voluptas id eveniet aspernatur fuga deserunt veritatis necessitatibus labore hic eos alias voluptate quaerat placeat, omnis distinctio tempora? Corrupti nemo a reiciendis expedita est autem temporibus itaque libero voluptate!</p>', 3, '2022-09-06 18:26:35'),
(4, 'bwajes+', 'myphptestemail@gmail.com', 'Some subject Some subject Some subject Some subject', '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Facere assumenda vel in eius, itaque placeat asperiores dignissimos error, veniam illum adipisci reiciendis totam perspiciatis eligendi deserunt officiis quae mollitia incidunt. Dolorem perspiciatis ipsam in omnis. Corporis adipisci vero dolorem quos dignissimos dicta in laborum eveniet libero officiis quae iste itaque, nemo voluptatem similique necessitatibus quam porro, praesentium unde? In tempora ratione animi soluta facere esse saepe odit perferendis cumque fugit iste possimus quia adipisci, quae illo quidem quis unde laborum ab, iure doloremque velit at ea facilis? Iste tempore eos totam fuga ex tempora atque quo magni nulla earum qui recusandae hic eligendi quod repellat, dignissimos molestias ut labore. Hic, quam sint quibusdam maiores quisquam illum tempore incidunt necessitatibus, similique laboriosam tenetur nobis nemo? Voluptatum mollitia cum architecto eaque nobis aspernatur ea quidem iste aperiam. Nihil asperiores tempora natus cum quos ipsa maiores eum quas, esse recusandae sapiente ullam consequuntur laudantium suscipit praesentium dolor iste accusantium pariatur! Id, fugiat amet voluptates, repellat similique impedit placeat nisi ratione sit ea aspernatur atque suscipit nam neque doloribus voluptate alias iure tenetur necessitatibus animi natus adipisci veniam a. Deleniti facere illum, eos, repudiandae nesciunt magni esse quod molestiae tempore, veritatis atque. Quas eveniet, dignissimos fugiat quaerat magni omnis voluptates harum, quos ut cum distinctio nam hic. Veniam, facilis voluptatibus vitae libero sequi impedit vel aut sed commodi et praesentium maxime sint, eius porro hic fugiat molestias sit qui officiis accusamus cumque atque dolorem? Eius quo corrupti exercitationem amet voluptatum autem ratione natus porro sequi tempore debitis aut vero in aperiam sapiente beatae, mollitia velit commodi quaerat adipisci ducimus cupiditate perferendis, labore architecto? Omnis, quasi fugit! Ea corrupti quis, porro quo error laudantium? Saepe quis dolorem, reprehenderit nulla architecto nisi delectus rerum error iure adipisci id ducimus similique inventore. Ullam, cupiditate ipsum tempora ut dolorem voluptatem. Magni velit aperiam reiciendis. Aliquam, deleniti inventore labore tempore enim vel unde dignissimos beatae, expedita, quibusdam adipisci modi tempora vero harum nobis iure tenetur illo dolore maiores quia in dolores deserunt fugit quasi? Expedita culpa perspiciatis rerum incidunt officia earum ducimus possimus perferendis quam facere saepe accusamus debitis in molestias vitae magni doloremque sequi facilis minima numquam dignissimos, aut nobis. Id a fuga sapiente dignissimos obcaecati ipsum cum voluptatum! Adipisci labore voluptatibus maiores praesentium ipsa aut pariatur, veniam sequi, doloremque dolor, ad illo nesciunt rerum debitis ipsam quae ex laborum? Quam sequi quis similique amet aliquam dolorum dolor fugiat beatae dolores rem ratione placeat eum nemo, veniam, libero consequatur itaque cum alias odit. Dignissimos officiis cumque repudiandae magnam et, excepturi reprehenderit nobis praesentium velit ut ab voluptates in neque, quasi explicabo at accusamus. Doloremque quis repellendus vitae saepe autem nostrum beatae dolorem iure non obcaecati cupiditate sit, placeat dignissimos velit cumque facere nesciunt. Quisquam pariatur asperiores perspiciatis officiis illo? Quam unde culpa incidunt fuga consectetur ipsum, eligendi veritatis asperiores maxime architecto distinctio suscipit numquam! Amet id earum corrupti, ullam laudantium quod dolorem cumque. Doloribus iure labore consectetur praesentium voluptate veritatis velit, fugit quis tenetur quisquam, laborum hic facere sed magnam delectus optio, cum maxime. Alias rem dignissimos ex vero, error distinctio, voluptate aperiam quos porro nobis repellendus culpa. Reprehenderit aut, fuga iste explicabo molestias animi? Minima maiores praesentium facilis, laborum minus assumenda mollitia perferendis iure quidem autem officia vitae corporis voluptatibus quis sunt inventore ipsam iusto? Illo ad, dolores recusandae laudantium debitis reprehenderit in atque adipisci. Voluptas rerum explicabo architecto aut iusto, nostrum laborum sint et facilis dolor fuga animi, pariatur maiores cum, laboriosam accusamus totam consequatur quod. Vero saepe iusto fugiat, velit doloribus repudiandae impedit excepturi atque! Commodi distinctio accusamus delectus quae, doloremque sequi iusto corporis, perspiciatis ipsam itaque ipsum, ab modi cum voluptas. Dolorum, culpa pariatur? Ad neque iusto eum debitis, atque expedita numquam officia veritatis fugiat voluptatum nostrum nobis consequuntur illo necessitatibus vel cum asperiores autem id, obcaecati sunt doloribus. Officiis sed rem adipisci similique nesciunt alias accusamus delectus corrupti aperiam omnis reprehenderit dolorum nulla optio molestiae quasi quibusdam fugiat recusandae voluptatibus laudantium, in sit. Qui explicabo adipisci at atque impedit. Optio necessitatibus officiis sed non modi quidem aperiam ab animi, repellat exercitationem, delectus magnam vel ea facilis reprehenderit! Pariatur voluptas numquam dignissimos sequi natus dolor cum temporibus rem nesciunt cumque, suscipit ipsam voluptatem omnis magni totam, maiores necessitatibus placeat modi alias reiciendis. Maxime porro quasi iusto et suscipit id, nulla quam eos incidunt quas similique unde nemo consequatur nesciunt labore dolor animi ipsa quod corporis laudantium? Harum veniam odit sint dolore deserunt fugiat nobis est ut quaerat praesentium? Aliquid, amet modi temporibus fugiat soluta eum cum magnam voluptatem omnis excepturi earum nesciunt adipisci, voluptatibus necessitatibus praesentium quia asperiores debitis enim minus dolor atque consectetur rerum? Dolore ab recusandae sequi ducimus consectetur, neque, labore sed laboriosam quaerat aperiam error ipsam nesciunt pariatur nihil qui eveniet, autem expedita asperiores. Praesentium vel minima aliquam atque deserunt dolor deleniti itaque fugiat ad repellendus ipsum rem sed voluptates asperiores a hic ratione perspiciatis enim architecto quasi, sequi, voluptatibus autem sint neque! Aperiam nemo architecto optio unde accusamus, commodi odit, ipsa quas nam quod rem. Magni reiciendis fugit nobis hic, provident minima repellat ipsam explicabo, magnam, quisquam eaque alias ullam? Ratione maiores molestias quibusdam fugiat illo ipsum modi. Fuga tenetur, saepe quam repudiandae, ut pariatur aspernatur aperiam illo excepturi itaque recusandae placeat vero laborum aliquid inventore, dicta tempore dolore eos cumque at. Culpa, repudiandae sequi! Veniam eos, debitis incidunt fuga porro quod nostrum dolorem non. Temporibus reprehenderit, vel aspernatur culpa error adipisci doloremque velit nisi reiciendis, natus cupiditate non! Quis et provident dolor animi cupiditate quo expedita quia autem eius doloribus odio ex vero eligendi laudantium quisquam cum, aliquam atque voluptas quas fuga corrupti quam dicta. Fugit deserunt alias repudiandae error provident ipsum praesentium velit voluptatem, et possimus unde voluptatum, perferendis laudantium temporibus! Blanditiis tempore ea sed fugiat facilis non? Reiciendis sed quae deleniti, nemo accusamus neque nisi cupiditate ad fugiat voluptas id eveniet aspernatur fuga deserunt veritatis necessitatibus labore hic eos alias voluptate quaerat placeat, omnis distinctio tempora? Corrupti nemo a reiciendis expedita est autem temporibus itaque libero voluptate!</p>', 3, '2022-09-06 18:30:41'),
(5, 'bwajes+', 'myphptestemail@gmail.com', 'A subject Some subject Some subject Some subject', '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Facere assumenda vel in eius, itaque placeat asperiores dignissimos error, veniam illum adipisci reiciendis totam perspiciatis eligendi deserunt officiis quae mollitia incidunt. Dolorem perspiciatis ipsam in omnis. Corporis adipisci vero dolorem quos dignissimos dicta in laborum eveniet libero officiis quae iste itaque, nemo voluptatem similique necessitatibus quam porro, praesentium unde? In tempora ratione animi soluta facere esse saepe odit perferendis cumque fugit iste possimus quia adipisci, quae illo quidem quis unde laborum ab, iure doloremque velit at ea facilis? Iste tempore eos totam fuga ex tempora atque quo magni nulla earum qui recusandae hic eligendi quod repellat, dignissimos molestias ut labore. Hic, quam sint quibusdam maiores quisquam illum tempore incidunt necessitatibus, similique laboriosam tenetur nobis nemo? Voluptatum mollitia cum architecto eaque nobis aspernatur ea quidem iste aperiam. Nihil asperiores tempora natus cum quos ipsa maiores eum quas, esse recusandae sapiente ullam consequuntur laudantium suscipit praesentium dolor iste accusantium pariatur! Id, fugiat amet voluptates, repellat similique impedit placeat nisi ratione sit ea aspernatur atque suscipit nam neque doloribus voluptate alias iure tenetur necessitatibus animi natus adipisci veniam a. Deleniti facere illum, eos, repudiandae nesciunt magni esse quod molestiae tempore, veritatis atque. Quas eveniet, dignissimos fugiat quaerat magni omnis voluptates harum, quos ut cum distinctio nam hic. Veniam, facilis voluptatibus vitae libero sequi impedit vel aut sed commodi et praesentium maxime sint, eius porro hic fugiat molestias sit qui officiis accusamus cumque atque dolorem? Eius quo corrupti exercitationem amet voluptatum autem ratione natus porro sequi tempore debitis aut vero in aperiam sapiente beatae, mollitia velit commodi quaerat adipisci ducimus cupiditate perferendis, labore architecto? Omnis, quasi fugit! Ea corrupti quis, porro quo error laudantium? Saepe quis dolorem, reprehenderit nulla architecto nisi delectus rerum error iure adipisci id ducimus similique inventore. Ullam, cupiditate ipsum tempora ut dolorem voluptatem. Magni velit aperiam reiciendis. Aliquam, deleniti inventore labore tempore enim vel unde dignissimos beatae, expedita, quibusdam adipisci modi tempora vero harum nobis iure tenetur illo dolore maiores quia in dolores deserunt fugit quasi? Expedita culpa perspiciatis rerum incidunt officia earum ducimus possimus perferendis quam facere saepe accusamus debitis in molestias vitae magni doloremque sequi facilis minima numquam dignissimos, aut nobis. Id a fuga sapiente dignissimos obcaecati ipsum cum voluptatum! Adipisci labore voluptatibus maiores praesentium ipsa aut pariatur, veniam sequi, doloremque dolor, ad illo nesciunt rerum debitis ipsam quae ex laborum? Quam sequi quis similique amet aliquam dolorum dolor fugiat beatae dolores rem ratione placeat eum nemo, veniam, libero consequatur itaque cum alias odit. Dignissimos officiis cumque repudiandae magnam et, excepturi reprehenderit nobis praesentium velit ut ab voluptates in neque, quasi explicabo at accusamus. Doloremque quis repellendus vitae saepe autem nostrum beatae dolorem iure non obcaecati cupiditate sit, placeat dignissimos velit cumque facere nesciunt. Quisquam pariatur asperiores perspiciatis officiis illo? Quam unde culpa incidunt fuga consectetur ipsum, eligendi veritatis asperiores maxime architecto distinctio suscipit numquam! Amet id earum corrupti, ullam laudantium quod dolorem cumque. Doloribus iure labore consectetur praesentium voluptate veritatis velit, fugit quis tenetur quisquam, laborum hic facere sed magnam delectus optio, cum maxime. Alias rem dignissimos ex vero, error distinctio, voluptate aperiam quos porro nobis repellendus culpa. Reprehenderit aut, fuga iste explicabo molestias animi? Minima maiores praesentium facilis, laborum minus assumenda mollitia perferendis iure quidem autem officia vitae corporis voluptatibus quis sunt inventore ipsam iusto? Illo ad, dolores recusandae laudantium debitis reprehenderit in atque adipisci. Voluptas rerum explicabo architecto aut iusto, nostrum laborum sint et facilis dolor fuga animi, pariatur maiores cum, laboriosam accusamus totam consequatur quod. Vero saepe iusto fugiat, velit doloribus repudiandae impedit excepturi atque! Commodi distinctio accusamus delectus quae, doloremque sequi iusto corporis, perspiciatis ipsam itaque ipsum, ab modi cum voluptas. Dolorum, culpa pariatur? Ad neque iusto eum debitis, atque expedita numquam officia veritatis fugiat voluptatum nostrum nobis consequuntur illo necessitatibus vel cum asperiores autem id, obcaecati sunt doloribus. Officiis sed rem adipisci similique nesciunt alias accusamus delectus corrupti aperiam omnis reprehenderit dolorum nulla optio molestiae quasi quibusdam fugiat recusandae voluptatibus laudantium, in sit. Qui explicabo adipisci at atque impedit. Optio necessitatibus officiis sed non modi quidem aperiam ab animi, repellat exercitationem, delectus magnam vel ea facilis reprehenderit! Pariatur voluptas numquam dignissimos sequi natus dolor cum temporibus rem nesciunt cumque, suscipit ipsam voluptatem omnis magni totam, maiores necessitatibus placeat modi alias reiciendis. Maxime porro quasi iusto et suscipit id, nulla quam eos incidunt quas similique unde nemo consequatur nesciunt labore dolor animi ipsa quod corporis laudantium? Harum veniam odit sint dolore deserunt fugiat nobis est ut quaerat praesentium? Aliquid, amet modi temporibus fugiat soluta eum cum magnam voluptatem omnis excepturi earum nesciunt adipisci, voluptatibus necessitatibus praesentium quia asperiores debitis enim minus dolor atque consectetur rerum? Dolore ab recusandae sequi ducimus consectetur, neque, labore sed laboriosam quaerat aperiam error ipsam nesciunt pariatur nihil qui eveniet, autem expedita asperiores. Praesentium vel minima aliquam atque deserunt dolor deleniti itaque fugiat ad repellendus ipsum rem sed voluptates asperiores a hic ratione perspiciatis enim architecto quasi, sequi, voluptatibus autem sint neque! Aperiam nemo architecto optio unde accusamus, commodi odit, ipsa quas nam quod rem. Magni reiciendis fugit nobis hic, provident minima repellat ipsam explicabo, magnam, quisquam eaque alias ullam? Ratione maiores molestias quibusdam fugiat illo ipsum modi. Fuga tenetur, saepe quam repudiandae, ut pariatur aspernatur aperiam illo excepturi itaque recusandae placeat vero laborum aliquid inventore, dicta tempore dolore eos cumque at. Culpa, repudiandae sequi! Veniam eos, debitis incidunt fuga porro quod nostrum dolorem non. Temporibus reprehenderit, vel aspernatur culpa error adipisci doloremque velit nisi reiciendis, natus cupiditate non! Quis et provident dolor animi cupiditate quo expedita quia autem eius doloribus odio ex vero eligendi laudantium quisquam cum, aliquam atque voluptas quas fuga corrupti quam dicta. Fugit deserunt alias repudiandae error provident ipsum praesentium velit voluptatem, et possimus unde voluptatum, perferendis laudantium temporibus! Blanditiis tempore ea sed fugiat facilis non? Reiciendis sed quae deleniti, nemo accusamus neque nisi cupiditate ad fugiat voluptas id eveniet aspernatur fuga deserunt veritatis necessitatibus labore hic eos alias voluptate quaerat placeat, omnis distinctio tempora? Corrupti nemo a reiciendis expedita est autem temporibus itaque libero voluptate!</p>', 3, '2022-09-06 18:34:50'),
(6, 'bwajes+', 'myphptestemail@gmail.com', 'A subject Some subject Some subject Some subject', '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Facere assumenda vel in eius, itaque placeat asperiores dignissimos error, veniam illum adipisci reiciendis totam perspiciatis eligendi deserunt officiis quae mollitia incidunt. Dolorem perspiciatis ipsam in omnis. Corporis adipisci vero dolorem quos dignissimos dicta in laborum eveniet libero officiis quae iste itaque, nemo voluptatem similique necessitatibus quam porro, praesentium unde? In tempora ratione animi soluta facere esse saepe odit perferendis cumque fugit iste possimus quia adipisci, quae illo quidem quis unde laborum ab, iure doloremque velit at ea facilis? Iste tempore eos totam fuga ex tempora atque quo magni nulla earum qui recusandae hic eligendi quod repellat, dignissimos molestias ut labore. Hic, quam sint quibusdam maiores quisquam illum tempore incidunt necessitatibus, similique laboriosam tenetur nobis nemo? Voluptatum mollitia cum architecto eaque nobis aspernatur ea quidem iste aperiam. Nihil asperiores tempora natus cum quos ipsa maiores eum quas, esse recusandae sapiente ullam consequuntur laudantium suscipit praesentium dolor iste accusantium pariatur! Id, fugiat amet voluptates, repellat similique impedit placeat nisi ratione sit ea aspernatur atque suscipit nam neque doloribus voluptate alias iure tenetur necessitatibus animi natus adipisci veniam a. Deleniti facere illum, eos, repudiandae nesciunt magni esse quod molestiae tempore, veritatis atque. Quas eveniet, dignissimos fugiat quaerat magni omnis voluptates harum, quos ut cum distinctio nam hic. Veniam, facilis voluptatibus vitae libero sequi impedit vel aut sed commodi et praesentium maxime sint, eius porro hic fugiat molestias sit qui officiis accusamus cumque atque dolorem? Eius quo corrupti exercitationem amet voluptatum autem ratione natus porro sequi tempore debitis aut vero in aperiam sapiente beatae, mollitia velit commodi quaerat adipisci ducimus cupiditate perferendis, labore architecto? Omnis, quasi fugit! Ea corrupti quis, porro quo error laudantium? Saepe quis dolorem, reprehenderit nulla architecto nisi delectus rerum error iure adipisci id ducimus similique inventore. Ullam, cupiditate ipsum tempora ut dolorem voluptatem. Magni velit aperiam reiciendis. Aliquam, deleniti inventore labore tempore enim vel unde dignissimos beatae, expedita, quibusdam adipisci modi tempora vero harum nobis iure tenetur illo dolore maiores quia in dolores deserunt fugit quasi? Expedita culpa perspiciatis rerum incidunt officia earum ducimus possimus perferendis quam facere saepe accusamus debitis in molestias vitae magni doloremque sequi facilis minima numquam dignissimos, aut nobis. Id a fuga sapiente dignissimos obcaecati ipsum cum voluptatum! Adipisci labore voluptatibus maiores praesentium ipsa aut pariatur, veniam sequi, doloremque dolor, ad illo nesciunt rerum debitis ipsam quae ex laborum? Quam sequi quis similique amet aliquam dolorum dolor fugiat beatae dolores rem ratione placeat eum nemo, veniam, libero consequatur itaque cum alias odit. Dignissimos officiis cumque repudiandae magnam et, excepturi reprehenderit nobis praesentium velit ut ab voluptates in neque, quasi explicabo at accusamus. Doloremque quis repellendus vitae saepe autem nostrum beatae dolorem iure non obcaecati cupiditate sit, placeat dignissimos velit cumque facere nesciunt. Quisquam pariatur asperiores perspiciatis officiis illo? Quam unde culpa incidunt fuga consectetur ipsum, eligendi veritatis asperiores maxime architecto distinctio suscipit numquam! Amet id earum corrupti, ullam laudantium quod dolorem cumque. Doloribus iure labore consectetur praesentium voluptate veritatis velit, fugit quis tenetur quisquam, laborum hic facere sed magnam delectus optio, cum maxime. Alias rem dignissimos ex vero, error distinctio, voluptate aperiam quos porro nobis repellendus culpa. Reprehenderit aut, fuga iste explicabo molestias animi? Minima maiores praesentium facilis, laborum minus assumenda mollitia perferendis iure quidem autem officia vitae corporis voluptatibus quis sunt inventore ipsam iusto? Illo ad, dolores recusandae laudantium debitis reprehenderit in atque adipisci. Voluptas rerum explicabo architecto aut iusto, nostrum laborum sint et facilis dolor fuga animi, pariatur maiores cum, laboriosam accusamus totam consequatur quod. Vero saepe iusto fugiat, velit doloribus repudiandae impedit excepturi atque! Commodi distinctio accusamus delectus quae, doloremque sequi iusto corporis, perspiciatis ipsam itaque ipsum, ab modi cum voluptas. Dolorum, culpa pariatur? Ad neque iusto eum debitis, atque expedita numquam officia veritatis fugiat voluptatum nostrum nobis consequuntur illo necessitatibus vel cum asperiores autem id, obcaecati sunt doloribus. Officiis sed rem adipisci similique nesciunt alias accusamus delectus corrupti aperiam omnis reprehenderit dolorum nulla optio molestiae quasi quibusdam fugiat recusandae voluptatibus laudantium, in sit. Qui explicabo adipisci at atque impedit. Optio necessitatibus officiis sed non modi quidem aperiam ab animi, repellat exercitationem, delectus magnam vel ea facilis reprehenderit! Pariatur voluptas numquam dignissimos sequi natus dolor cum temporibus rem nesciunt cumque, suscipit ipsam voluptatem omnis magni totam, maiores necessitatibus placeat modi alias reiciendis. Maxime porro quasi iusto et suscipit id, nulla quam eos incidunt quas similique unde nemo consequatur nesciunt labore dolor animi ipsa quod corporis laudantium? Harum veniam odit sint dolore deserunt fugiat nobis est ut quaerat praesentium? Aliquid, amet modi temporibus fugiat soluta eum cum magnam voluptatem omnis excepturi earum nesciunt adipisci, voluptatibus necessitatibus praesentium quia asperiores debitis enim minus dolor atque consectetur rerum? Dolore ab recusandae sequi ducimus consectetur, neque, labore sed laboriosam quaerat aperiam error ipsam nesciunt pariatur nihil qui eveniet, autem expedita asperiores. Praesentium vel minima aliquam atque deserunt dolor deleniti itaque fugiat ad repellendus ipsum rem sed voluptates asperiores a hic ratione perspiciatis enim architecto quasi, sequi, voluptatibus autem sint neque! Aperiam nemo architecto optio unde accusamus, commodi odit, ipsa quas nam quod rem. Magni reiciendis fugit nobis hic, provident minima repellat ipsam explicabo, magnam, quisquam eaque alias ullam? Ratione maiores molestias quibusdam fugiat illo ipsum modi. Fuga tenetur, saepe quam repudiandae, ut pariatur aspernatur aperiam illo excepturi itaque recusandae placeat vero laborum aliquid inventore, dicta tempore dolore eos cumque at. Culpa, repudiandae sequi! Veniam eos, debitis incidunt fuga porro quod nostrum dolorem non. Temporibus reprehenderit, vel aspernatur culpa error adipisci doloremque velit nisi reiciendis, natus cupiditate non! Quis et provident dolor animi cupiditate quo expedita quia autem eius doloribus odio ex vero eligendi laudantium quisquam cum, aliquam atque voluptas quas fuga corrupti quam dicta. Fugit deserunt alias repudiandae error provident ipsum praesentium velit voluptatem, et possimus unde voluptatum, perferendis laudantium temporibus! Blanditiis tempore ea sed fugiat facilis non? Reiciendis sed quae deleniti, nemo accusamus neque nisi cupiditate ad fugiat voluptas id eveniet aspernatur fuga deserunt veritatis necessitatibus labore hic eos alias voluptate quaerat placeat, omnis distinctio tempora? Corrupti nemo a reiciendis expedita est autem temporibus itaque libero voluptate!</p>', 3, '2022-09-06 18:37:55'),
(7, 'bwajes+', 'myphptestemail@gmail.com', 'de subject Some subject Some subject Some subject', '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Facere assumenda vel in eius, itaque placeat asperiores dignissimos error, veniam illum adipisci reiciendis totam perspiciatis eligendi deserunt officiis quae mollitia incidunt. Dolorem perspiciatis ipsam in omnis. Corporis adipisci vero dolorem quos dignissimos dicta in laborum eveniet libero officiis quae iste itaque, nemo voluptatem similique necessitatibus quam porro, praesentium unde? In tempora ratione animi soluta facere esse saepe odit perferendis cumque fugit iste possimus quia adipisci, quae illo quidem quis unde laborum ab, iure doloremque velit at ea facilis? Iste tempore eos totam fuga ex tempora atque quo magni nulla earum qui recusandae hic eligendi quod repellat, dignissimos molestias ut labore. Hic, quam sint quibusdam maiores quisquam illum tempore incidunt necessitatibus, similique laboriosam tenetur nobis nemo? Voluptatum mollitia cum architecto eaque nobis aspernatur ea quidem iste aperiam. Nihil asperiores tempora natus cum quos ipsa maiores eum quas, esse recusandae sapiente ullam consequuntur laudantium suscipit praesentium dolor iste accusantium pariatur! Id, fugiat amet voluptates, repellat similique impedit placeat nisi ratione sit ea aspernatur atque suscipit nam neque doloribus voluptate alias iure tenetur necessitatibus animi natus adipisci veniam a. Deleniti facere illum, eos, repudiandae nesciunt magni esse quod molestiae tempore, veritatis atque. Quas eveniet, dignissimos fugiat quaerat magni omnis voluptates harum, quos ut cum distinctio nam hic. Veniam, facilis voluptatibus vitae libero sequi impedit vel aut sed commodi et praesentium maxime sint, eius porro hic fugiat molestias sit qui officiis accusamus cumque atque dolorem? Eius quo corrupti exercitationem amet voluptatum autem ratione natus porro sequi tempore debitis aut vero in aperiam sapiente beatae, mollitia velit commodi quaerat adipisci ducimus cupiditate perferendis, labore architecto? Omnis, quasi fugit! Ea corrupti quis, porro quo error laudantium? Saepe quis dolorem, reprehenderit nulla architecto nisi delectus rerum error iure adipisci id ducimus similique inventore. Ullam, cupiditate ipsum tempora ut dolorem voluptatem. Magni velit aperiam reiciendis. Aliquam, deleniti inventore labore tempore enim vel unde dignissimos beatae, expedita, quibusdam adipisci modi tempora vero harum nobis iure tenetur illo dolore maiores quia in dolores deserunt fugit quasi? Expedita culpa perspiciatis rerum incidunt officia earum ducimus possimus perferendis quam facere saepe accusamus debitis in molestias vitae magni doloremque sequi facilis minima numquam dignissimos, aut nobis. Id a fuga sapiente dignissimos obcaecati ipsum cum voluptatum! Adipisci labore voluptatibus maiores praesentium ipsa aut pariatur, veniam sequi, doloremque dolor, ad illo nesciunt rerum debitis ipsam quae ex laborum? Quam sequi quis similique amet aliquam dolorum dolor fugiat beatae dolores rem ratione placeat eum nemo, veniam, libero consequatur itaque cum alias odit. Dignissimos officiis cumque repudiandae magnam et, excepturi reprehenderit nobis praesentium velit ut ab voluptates in neque, quasi explicabo at accusamus. Doloremque quis repellendus vitae saepe autem nostrum beatae dolorem iure non obcaecati cupiditate sit, placeat dignissimos velit cumque facere nesciunt. Quisquam pariatur asperiores perspiciatis officiis illo? Quam unde culpa incidunt fuga consectetur ipsum, eligendi veritatis asperiores maxime architecto distinctio suscipit numquam! Amet id earum corrupti, ullam laudantium quod dolorem cumque. Doloribus iure labore consectetur praesentium voluptate veritatis velit, fugit quis tenetur quisquam, laborum hic facere sed magnam delectus optio, cum maxime. Alias rem dignissimos ex vero, error distinctio, voluptate aperiam quos porro nobis repellendus culpa. Reprehenderit aut, fuga iste explicabo molestias animi? Minima maiores praesentium facilis, laborum minus assumenda mollitia perferendis iure quidem autem officia vitae corporis voluptatibus quis sunt inventore ipsam iusto? Illo ad, dolores recusandae laudantium debitis reprehenderit in atque adipisci. Voluptas rerum explicabo architecto aut iusto, nostrum laborum sint et facilis dolor fuga animi, pariatur maiores cum, laboriosam accusamus totam consequatur quod. Vero saepe iusto fugiat, velit doloribus repudiandae impedit excepturi atque! Commodi distinctio accusamus delectus quae, doloremque sequi iusto corporis, perspiciatis ipsam itaque ipsum, ab modi cum voluptas. Dolorum, culpa pariatur? Ad neque iusto eum debitis, atque expedita numquam officia veritatis fugiat voluptatum nostrum nobis consequuntur illo necessitatibus vel cum asperiores autem id, obcaecati sunt doloribus. Officiis sed rem adipisci similique nesciunt alias accusamus delectus corrupti aperiam omnis reprehenderit dolorum nulla optio molestiae quasi quibusdam fugiat recusandae voluptatibus laudantium, in sit. Qui explicabo adipisci at atque impedit. Optio necessitatibus officiis sed non modi quidem aperiam ab animi, repellat exercitationem, delectus magnam vel ea facilis reprehenderit! Pariatur voluptas numquam dignissimos sequi natus dolor cum temporibus rem nesciunt cumque, suscipit ipsam voluptatem omnis magni totam, maiores necessitatibus placeat modi alias reiciendis. Maxime porro quasi iusto et suscipit id, nulla quam eos incidunt quas similique unde nemo consequatur nesciunt labore dolor animi ipsa quod corporis laudantium? Harum veniam odit sint dolore deserunt fugiat nobis est ut quaerat praesentium? Aliquid, amet modi temporibus fugiat soluta eum cum magnam voluptatem omnis excepturi earum nesciunt adipisci, voluptatibus necessitatibus praesentium quia asperiores debitis enim minus dolor atque consectetur rerum? Dolore ab recusandae sequi ducimus consectetur, neque, labore sed laboriosam quaerat aperiam error ipsam nesciunt pariatur nihil qui eveniet, autem expedita asperiores. Praesentium vel minima aliquam atque deserunt dolor deleniti itaque fugiat ad repellendus ipsum rem sed voluptates asperiores a hic ratione perspiciatis enim architecto quasi, sequi, voluptatibus autem sint neque! Aperiam nemo architecto optio unde accusamus, commodi odit, ipsa quas nam quod rem. Magni reiciendis fugit nobis hic, provident minima repellat ipsam explicabo, magnam, quisquam eaque alias ullam? Ratione maiores molestias quibusdam fugiat illo ipsum modi. Fuga tenetur, saepe quam repudiandae, ut pariatur aspernatur aperiam illo excepturi itaque recusandae placeat vero laborum aliquid inventore, dicta tempore dolore eos cumque at. Culpa, repudiandae sequi! Veniam eos, debitis incidunt fuga porro quod nostrum dolorem non. Temporibus reprehenderit, vel aspernatur culpa error adipisci doloremque velit nisi reiciendis, natus cupiditate non! Quis et provident dolor animi cupiditate quo expedita quia autem eius doloribus odio ex vero eligendi laudantium quisquam cum, aliquam atque voluptas quas fuga corrupti quam dicta. Fugit deserunt alias repudiandae error provident ipsum praesentium velit voluptatem, et possimus unde voluptatum, perferendis laudantium temporibus! Blanditiis tempore ea sed fugiat facilis non? Reiciendis sed quae deleniti, nemo accusamus neque nisi cupiditate ad fugiat voluptas id eveniet aspernatur fuga deserunt veritatis necessitatibus labore hic eos alias voluptate quaerat placeat, omnis distinctio tempora? Corrupti nemo a reiciendis expedita est autem temporibus itaque libero voluptate!</p>', 3, '2022-09-06 18:42:00'),
(8, 'bwajes+', 'myphptestemail@gmail.com', 'Some subject Some subject Some subject Some subject', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores facere eligendi voluptatibus ad, dolorem neque provident, ipsam voluptatem quo minus atque saepe hic porro accusantium totam quas expedita ullam, harum ea incidunt dignissimos commodi. Odio natus assumenda laboriosam sunt quisquam ducimus temporibus totam nam, illo soluta repellendus repudiandae dolorum cumque dicta provident explicabo facilis maiores asperiores. Pariatur totam iusto optio aliquid asperiores dicta placeat fuga eum unde aut, natus sed mollitia sint perferendis consequatur, expedita esse, aliquam velit ipsam eius. Quo sunt velit, quia consequatur corporis ex aliquam, vel qui provident corrupti illo blanditiis libero ipsam rem quaerat temporibus vitae laborum obcaecati esse? Unde, a veniam quibusdam voluptates sit tempore accusamus laudantium. Sunt praesentium fugit, quibusdam nam qui a nemo possimus recusandae reiciendis maxime doloribus tempora, dignissimos minima explicabo deserunt. Doloribus ipsa aut, dicta voluptatum laborum nemo repellat, non ipsam hic, delectus repudiandae impedit. Optio non adipisci ducimus omnis assumenda velit molestiae dolorum iste ullam, voluptates tempore, qui animi. Odio suscipit dolorum velit autem itaque nostrum enim tempore voluptatibus. Deserunt eos quis, beatae velit, expedita eius odio reprehenderit quidem sequi magni facilis dolorem tempore sint. Asperiores quos veniam, dolore, ducimus assumenda animi architecto quia, similique incidunt quo earum iure totam sequi ipsam voluptas nobis maiores iusto? Ut molestiae expedita pariatur omnis atque assumenda culpa id quae totam praesentium beatae nisi ad molestias, blanditiis iusto dolorum corporis, est porro voluptates nemo, alias repellendus quia itaque nesciunt! Ullam aut laudantium quasi ab. Tempora, corporis accusantium. Eos esse nihil consequuntur mollitia vero ab sapiente soluta ut. Pariatur eaque, iure assumenda veniam officia ipsum aut. Ex facilis nisi, omnis nulla similique animi fugiat culpa quasi quia laboriosam, esse sit odit obcaecati aut iusto voluptate enim. Eaque quo blanditiis excepturi ratione enim neque dolor id corrupti quasi minima a vitae error laudantium officia expedita ullam porro, ea harum soluta temporibus ad dolorum hic distinctio commodi? Architecto officia et maxime! Obcaecati eveniet beatae veniam quis quas repellat, nesciunt nulla totam ipsam voluptatem dolores error a, atque necessitatibus expedita. Est similique natus sed nemo ex dolorem veniam, aut esse nam, sunt facilis, nesciunt nobis earum inventore voluptatum! Ex, molestias iste recusandae itaque odio, ducimus deleniti qui iusto, asperiores aut fugiat quaerat consequatur hic impedit nobis provident assumenda repudiandae. Placeat nisi possimus earum. Quod ipsa accusamus quia? Id nemo facilis voluptas dolores ut architecto iure assumenda? Ea exercitationem ipsum temporibus magnam animi ipsa porro illum accusantium eum, culpa fuga corporis optio, consectetur atque blanditiis nesciunt eveniet enim expedita architecto consequuntur quas maiores itaque velit at. Maiores dignissimos aliquid veritatis neque temporibus atque error distinctio, provident dolorum aspernatur hic illum consequatur quidem sit molestiae culpa earum quae odit reiciendis harum eius voluptas obcaecati vel magni? Dolore ullam incidunt minus obcaecati laboriosam rerum esse nemo quas quo natus at nesciunt sint perspiciatis doloremque aperiam delectus, similique quisquam neque maiores. Dicta expedita eius iste? Et aperiam ipsa repudiandae. Neque repudiandae, suscipit facilis necessitatibus corrupti sapiente sequi nulla? Explicabo voluptas repudiandae optio possimus neque ab repellendus, pariatur dolores. Quae fuga voluptatum maiores a, debitis, similique aliquid nam enim reprehenderit qui iusto nesciunt corrupti distinctio rerum, sapiente possimus? Rerum odio atque doloremque consectetur perspiciatis aspernatur rem asperiores cupiditate libero dolor ipsum fuga esse nobis minima corrupti nesciunt, deleniti ipsam animi nam, at eos, pariatur quis hic! Mollitia similique deleniti illo odio nemo vero! Asperiores voluptate necessitatibus iste totam perferendis consequatur doloremque, architecto nobis unde amet natus saepe in quas, blanditiis earum, illum quidem ex animi officia pariatur sed nemo odit deleniti. Porro, cum! Accusamus nemo aspernatur nesciunt modi repudiandae repellat necessitatibus dolor enim asperiores. Officiis minus corporis iure similique neque reiciendis velit saepe a quis delectus facilis nemo, quisquam nulla sed ducimus ipsum hic optio quasi vero veritatis pariatur veniam asperiores. Tenetur aliquid, ad quo repellat corrupti dolores pariatur quisquam excepturi. Tempora dolores explicabo aliquid amet vero eligendi quia odio! Nulla quas iure voluptatem quos voluptates, architecto impedit commodi laborum eos nesciunt, corrupti debitis blanditiis saepe aliquam deserunt magnam explicabo id repellendus vitae! Magnam sit quibusdam distinctio est iusto vitae consequuntur, esse tempore, a velit modi provident voluptatibus, non assumenda dicta deleniti asperiores nam quas delectus eligendi pariatur aliquam consequatur! Explicabo quas aspernatur deserunt sit, dolorem deleniti odio esse quos perspiciatis eveniet provident quod dolore voluptatum ipsum. Architecto porro harum ab minus quibusdam sapiente cupiditate incidunt tenetur, laborum provident rem natus ad tempora. Excepturi, voluptatibus? Quis, corrupti. Sequi, soluta culpa. Consequuntur sunt facere fugit corrupti ut reiciendis magnam dolore dolorum, fuga, dolor minus sequi reprehenderit ad nostrum veniam eligendi neque unde, iste optio ducimus! Quidem, voluptatum perferendis distinctio in quos illum cupiditate, iure ratione illo sapiente rem quaerat eaque consequuntur est. Necessitatibus, provident. Illum hic sapiente accusantium nisi eum distinctio quae expedita est ab! Perferendis animi id, exercitationem alias, magnam illo laborum debitis, numquam fuga mollitia harum et eum vero officia nesciunt veritatis distinctio qui facere explicabo omnis cupiditate. Ex dolorem praesentium neque magni, consectetur, quod fugiat repellat voluptatum non sunt provident esse et soluta minus vitae saepe natus voluptas. Nulla delectus accusantium vero aliquam architecto pariatur ut sunt nihil, id aspernatur saepe eaque, quos magni rem quas, vitae tenetur neque! Assumenda error consequatur explicabo modi debitis velit omnis eum soluta nesciunt. Recusandae id aliquam, ad optio, quibusdam eveniet molestiae quos quod fugit officia non incidunt repellat minus, eius beatae nulla inventore quasi earum enim repudiandae. Quos assumenda laboriosam voluptates! Explicabo soluta dolor deleniti repellat quas fugiat? Cum qui eos et, magnam ea culpa sit facilis molestias aspernatur. Nobis consequatur qui nihil reiciendis similique magni sunt, nemo, consequuntur alias voluptate praesentium hic minima, sapiente at corrupti quae distinctio rem harum excepturi iure facilis beatae quibusdam explicabo a. Nulla eos dolorem earum quisquam at! Assumenda minima totam delectus earum unde, dolorem alias quam natus, quaerat laudantium quia facilis repudiandae consequuntur illum ipsam autem sed in. Consequuntur, sit eum reprehenderit obcaecati aut facilis dolore quidem sapiente, quaerat rerum autem quam corrupti totam, soluta ratione voluptatibus. Repellendus, debitis sed. Tempora mollitia doloremque, iusto aspernatur ea iure hic similique nobis nostrum explicabo vitae sit! Consequatur, laborum aperiam.<img alt=\"\" src=\"http://localhost:9090/bwajesplus-app/admin/../images/1662491339_business.jpg\" style=\"height:435px; width:705px\" /></p>', 3, '2022-09-06 19:09:20');
INSERT INTO `admin_sent_emails` (`id`, `set_from_name`, `set_from_email`, `subject`, `body`, `admin_id`, `created_at`) VALUES
(9, 'bwajes+', 'myphptestemail@gmail.com', 'er subject Some subject Some subject Some subject', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores facere eligendi voluptatibus ad, dolorem neque provident, ipsam voluptatem quo minus atque saepe hic porro accusantium totam quas expedita ullam, harum ea incidunt dignissimos commodi. Odio natus assumenda laboriosam sunt quisquam ducimus temporibus totam nam, illo soluta repellendus repudiandae dolorum cumque dicta provident explicabo facilis maiores asperiores. Pariatur totam iusto optio aliquid asperiores dicta placeat fuga eum unde aut, natus sed mollitia sint perferendis consequatur, expedita esse, aliquam velit ipsam eius. Quo sunt velit, quia consequatur corporis ex aliquam, vel qui provident corrupti illo blanditiis libero ipsam rem quaerat temporibus vitae laborum obcaecati esse? Unde, a veniam quibusdam voluptates sit tempore accusamus laudantium. Sunt praesentium fugit, quibusdam nam qui a nemo possimus recusandae reiciendis maxime doloribus tempora, dignissimos minima explicabo deserunt. Doloribus ipsa aut, dicta voluptatum laborum nemo repellat, non ipsam hic, delectus repudiandae impedit. Optio non adipisci ducimus omnis assumenda velit molestiae dolorum iste ullam, voluptates tempore, qui animi. Odio suscipit dolorum velit autem itaque nostrum enim tempore voluptatibus. Deserunt eos quis, beatae velit, expedita eius odio reprehenderit quidem sequi magni facilis dolorem tempore sint. Asperiores quos veniam, dolore, ducimus assumenda animi architecto quia, similique incidunt quo earum iure totam sequi ipsam voluptas nobis maiores iusto? Ut molestiae expedita pariatur omnis atque assumenda culpa id quae totam praesentium beatae nisi ad molestias, blanditiis iusto dolorum corporis, est porro voluptates nemo, alias repellendus quia itaque nesciunt! Ullam aut laudantium quasi ab. Tempora, corporis accusantium. Eos esse nihil consequuntur mollitia vero ab sapiente soluta ut. Pariatur eaque, iure assumenda veniam officia ipsum aut. Ex facilis nisi, omnis nulla similique animi fugiat culpa quasi quia laboriosam, esse sit odit obcaecati aut iusto voluptate enim. Eaque quo blanditiis excepturi ratione enim neque dolor id corrupti quasi minima a vitae error laudantium officia expedita ullam porro, ea harum soluta temporibus ad dolorum hic distinctio commodi? Architecto officia et maxime! Obcaecati eveniet beatae veniam quis quas repellat, nesciunt nulla totam ipsam voluptatem dolores error a, atque necessitatibus expedita. Est similique natus sed nemo ex dolorem veniam, aut esse nam, sunt facilis, nesciunt nobis earum inventore voluptatum! Ex, molestias iste recusandae itaque odio, ducimus deleniti qui iusto, asperiores aut fugiat quaerat consequatur hic impedit nobis provident assumenda repudiandae. Placeat nisi possimus earum. Quod ipsa accusamus quia? Id nemo facilis voluptas dolores ut architecto iure assumenda? Ea exercitationem ipsum temporibus magnam animi ipsa porro illum accusantium eum, culpa fuga corporis optio, consectetur atque blanditiis nesciunt eveniet enim expedita architecto consequuntur quas maiores itaque velit at. Maiores dignissimos aliquid veritatis neque temporibus atque error distinctio, provident dolorum aspernatur hic illum consequatur quidem sit molestiae culpa earum quae odit reiciendis harum eius voluptas obcaecati vel magni? Dolore ullam incidunt minus obcaecati laboriosam rerum esse nemo quas quo natus at nesciunt sint perspiciatis doloremque aperiam delectus, similique quisquam neque maiores. Dicta expedita eius iste? Et aperiam ipsa repudiandae. Neque repudiandae, suscipit facilis necessitatibus corrupti sapiente sequi nulla? Explicabo voluptas repudiandae optio possimus neque ab repellendus, pariatur dolores. Quae fuga voluptatum maiores a, debitis, similique aliquid nam enim reprehenderit qui iusto nesciunt corrupti distinctio rerum, sapiente possimus? Rerum odio atque doloremque consectetur perspiciatis aspernatur rem asperiores cupiditate libero dolor ipsum fuga esse nobis minima corrupti nesciunt, deleniti ipsam animi nam, at eos, pariatur quis hic! Mollitia similique deleniti illo odio nemo vero! Asperiores voluptate necessitatibus iste totam perferendis consequatur doloremque, architecto nobis unde amet natus saepe in quas, blanditiis earum, illum quidem ex animi officia pariatur sed nemo odit deleniti. Porro, cum! Accusamus nemo aspernatur nesciunt modi repudiandae repellat necessitatibus dolor enim asperiores. Officiis minus corporis iure similique neque reiciendis velit saepe a quis delectus facilis nemo, quisquam nulla sed ducimus ipsum hic optio quasi vero veritatis pariatur veniam asperiores. Tenetur aliquid, ad quo repellat corrupti dolores pariatur quisquam excepturi. Tempora dolores explicabo aliquid amet vero eligendi quia odio! Nulla quas iure voluptatem quos voluptates, architecto impedit commodi laborum eos nesciunt, corrupti debitis blanditiis saepe aliquam deserunt magnam explicabo id repellendus vitae! Magnam sit quibusdam distinctio est iusto vitae consequuntur, esse tempore, a velit modi provident voluptatibus, non assumenda dicta deleniti asperiores nam quas delectus eligendi pariatur aliquam consequatur! Explicabo quas aspernatur deserunt sit, dolorem deleniti odio esse quos perspiciatis eveniet provident quod dolore voluptatum ipsum. Architecto porro harum ab minus quibusdam sapiente cupiditate incidunt tenetur, laborum provident rem natus ad tempora. Excepturi, voluptatibus? Quis, corrupti. Sequi, soluta culpa. Consequuntur sunt facere fugit corrupti ut reiciendis magnam dolore dolorum, fuga, dolor minus sequi reprehenderit ad nostrum veniam eligendi neque unde, iste optio ducimus! Quidem, voluptatum perferendis distinctio in quos illum cupiditate, iure ratione illo sapiente rem quaerat eaque consequuntur est. Necessitatibus, provident. Illum hic sapiente accusantium nisi eum distinctio quae expedita est ab! Perferendis animi id, exercitationem alias, magnam illo laborum debitis, numquam fuga mollitia harum et eum vero officia nesciunt veritatis distinctio qui facere explicabo omnis cupiditate. Ex dolorem praesentium neque magni, consectetur, quod fugiat repellat voluptatum non sunt provident esse et soluta minus vitae saepe natus voluptas. Nulla delectus accusantium vero aliquam architecto pariatur ut sunt nihil, id aspernatur saepe eaque, quos magni rem quas, vitae tenetur neque! Assumenda error consequatur explicabo modi debitis velit omnis eum soluta nesciunt. Recusandae id aliquam, ad optio, quibusdam eveniet molestiae quos quod fugit officia non incidunt repellat minus, eius beatae nulla inventore quasi earum enim repudiandae. Quos assumenda laboriosam voluptates! Explicabo soluta dolor deleniti repellat quas fugiat? Cum qui eos et, magnam ea culpa sit facilis molestias aspernatur. Nobis consequatur qui nihil reiciendis similique magni sunt, nemo, consequuntur alias voluptate praesentium hic minima, sapiente at corrupti quae distinctio rem harum excepturi iure facilis beatae quibusdam explicabo a. Nulla eos dolorem earum quisquam at! Assumenda minima totam delectus earum unde, dolorem alias quam natus, quaerat laudantium quia facilis repudiandae consequuntur illum ipsam autem sed in. Consequuntur, sit eum reprehenderit obcaecati aut facilis dolore quidem sapiente, quaerat rerum autem quam corrupti totam, soluta ratione voluptatibus. Repellendus, debitis sed. Tempora mollitia doloremque, iusto aspernatur ea iure hic similique nobis nostrum explicabo vitae sit! Consequatur, laborum aperiam.</p>', 3, '2022-09-06 19:10:46'),
(10, 'bwajes+', 'myphptestemail@gmail.com', 'A subject Some subject qz Some subject Some subject', 'fdhhjdmmmm', 3, '2022-09-06 19:11:56'),
(11, 'bwajes+', 'myphptestemail@gmail.com', 'Bome subject Some subject Some subject Some subject', 'dgdfhdfdfq', 3, '2022-09-06 19:15:04'),
(12, 'bwajes+', 'myphptestemail@gmail.com', 'Some subject Some subject Some subject Some subject', '<p><img alt=\"\" src=\"http://localhost:9090/bwajesplus-app/admin/../images/1662491937_author (1).jpg\" style=\"height:168px; width:300px\" />Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores facere eligendi voluptatibus ad, dolorem neque provident, ipsam voluptatem quo minus atque saepe hic porro accusantium totam quas expedita ullam, harum ea incidunt dignissimos commodi. Odio natus assumenda laboriosam sunt quisquam ducimus temporibus totam nam, illo soluta repellendus repudiandae dolorum cumque dicta provident explicabo facilis maiores asperiores. Pariatur totam iusto optio aliquid asperiores dicta placeat fuga eum unde aut, natus sed mollitia sint perferendis consequatur, expedita esse, aliquam velit ipsam eius. Quo sunt velit, quia consequatur corporis ex aliquam, vel qui provident corrupti illo blanditiis libero ipsam rem quaerat temporibus vitae laborum obcaecati esse? Unde, a veniam quibusdam voluptates sit tempore accusamus laudantium. Sunt praesentium fugit, quibusdam nam qui a nemo possimus recusandae reiciendis maxime doloribus tempora, dignissimos minima explicabo deserunt. Doloribus ipsa aut, dicta voluptatum laborum nemo repellat, non ipsam hic, delectus repudiandae impedit. Optio non adipisci ducimus omnis assumenda velit molestiae dolorum iste ullam, voluptates tempore, qui animi. Odio suscipit dolorum velit autem itaque nostrum enim tempore voluptatibus. Deserunt eos quis, beatae velit, expedita eius odio reprehenderit quidem sequi magni facilis dolorem tempore sint. Asperiores quos veniam, dolore, ducimus assumenda animi architecto quia, similique incidunt quo earum iure totam sequi ipsam voluptas nobis maiores iusto? Ut molestiae expedita pariatur omnis atque assumenda culpa id quae totam praesentium beatae nisi ad molestias, blanditiis iusto dolorum corporis, est porro voluptates nemo, alias repellendus quia itaque nesciunt! Ullam aut laudantium quasi ab. Tempora, corporis accusantium. Eos esse nihil consequuntur mollitia vero ab sapiente soluta ut. Pariatur eaque, iure assumenda veniam officia ipsum aut. Ex facilis nisi, omnis nulla similique animi fugiat culpa quasi quia laboriosam, esse sit odit obcaecati aut iusto voluptate enim. Eaque quo blanditiis excepturi ratione enim neque dolor id corrupti quasi minima a vitae error laudantium officia expedita ullam porro, ea harum soluta temporibus ad dolorum hic distinctio commodi? Architecto officia et maxime! Obcaecati eveniet beatae veniam quis quas repellat, nesciunt nulla totam ipsam voluptatem dolores error a, atque necessitatibus expedita. Est similique natus sed nemo ex dolorem veniam, aut esse nam, sunt facilis, nesciunt nobis earum inventore voluptatum! Ex, molestias iste recusandae itaque odio, ducimus deleniti qui iusto, asperiores aut fugiat quaerat consequatur hic impedit nobis provident assumenda repudiandae. Placeat nisi possimus earum. Quod ipsa accusamus quia? Id nemo facilis voluptas dolores ut architecto iure assumenda? Ea exercitationem ipsum temporibus magnam animi ipsa porro illum accusantium eum, culpa fuga corporis optio, consectetur atque blanditiis nesciunt eveniet enim expedita architecto consequuntur quas maiores itaque velit at. Maiores dignissimos aliquid veritatis neque temporibus atque error distinctio, provident dolorum aspernatur hic illum consequatur quidem sit molestiae culpa earum quae odit reiciendis harum eius voluptas obcaecati vel magni? Dolore ullam incidunt minus obcaecati laboriosam rerum esse nemo quas quo natus at nesciunt sint perspiciatis doloremque aperiam delectus, similique quisquam neque maiores. Dicta expedita eius iste? Et aperiam ipsa repudiandae. Neque repudiandae, suscipit facilis necessitatibus corrupti sapiente sequi nulla? Explicabo voluptas repudiandae optio possimus neque ab repellendus, pariatur dolores. Quae fuga voluptatum maiores a, debitis, similique aliquid nam enim reprehenderit qui iusto nesciunt corrupti distinctio rerum, sapiente possimus? Rerum odio atque doloremque consectetur perspiciatis aspernatur rem asperiores cupiditate libero dolor ipsum fuga esse nobis minima corrupti nesciunt, deleniti ipsam animi nam, at eos, pariatur quis hic! Mollitia similique deleniti illo odio nemo vero! Asperiores voluptate necessitatibus iste totam perferendis consequatur doloremque, architecto nobis unde amet natus saepe in quas, blanditiis earum, illum quidem ex animi officia pariatur sed nemo odit deleniti. Porro, cum! Accusamus nemo aspernatur nesciunt modi repudiandae repellat necessitatibus dolor enim asperiores. Officiis minus corporis iure similique neque reiciendis velit saepe a quis delectus facilis nemo, quisquam nulla sed ducimus ipsum hic optio quasi vero veritatis pariatur veniam asperiores. Tenetur aliquid, ad quo repellat corrupti dolores pariatur quisquam excepturi. Tempora dolores explicabo aliquid amet vero eligendi quia odio! Nulla quas iure voluptatem quos voluptates, architecto impedit commodi laborum eos nesciunt, corrupti debitis blanditiis saepe aliquam deserunt magnam explicabo id repellendus vitae! Magnam sit quibusdam distinctio est iusto vitae consequuntur, esse tempore, a velit modi provident voluptatibus, non assumenda dicta deleniti asperiores nam quas delectus eligendi pariatur aliquam consequatur! Explicabo quas aspernatur deserunt sit, dolorem deleniti odio esse quos perspiciatis eveniet provident quod dolore voluptatum ipsum. Architecto porro harum ab minus quibusdam sapiente cupiditate incidunt tenetur, laborum provident rem natus ad tempora. Excepturi, voluptatibus? Quis, corrupti. Sequi, soluta culpa. Consequuntur sunt facere fugit corrupti ut reiciendis magnam dolore dolorum, fuga, dolor minus sequi reprehenderit ad nostrum veniam eligendi neque unde, iste optio ducimus! Quidem, voluptatum perferendis distinctio in quos illum cupiditate, iure ratione illo sapiente rem quaerat eaque consequuntur est. Necessitatibus, provident. Illum hic sapiente accusantium nisi eum distinctio quae expedita est ab! Perferendis animi id, exercitationem alias, magnam illo laborum debitis, numquam fuga mollitia harum et eum vero officia nesciunt veritatis distinctio qui facere explicabo omnis cupiditate. Ex dolorem praesentium neque magni, consectetur, quod fugiat repellat voluptatum non sunt provident esse et soluta minus vitae saepe natus voluptas. Nulla delectus accusantium vero aliquam architecto pariatur ut sunt nihil, id aspernatur saepe eaque, quos magni rem quas, vitae tenetur neque! Assumenda error consequatur explicabo modi debitis velit omnis eum soluta nesciunt. Recusandae id aliquam, ad optio, quibusdam eveniet molestiae quos quod fugit officia non incidunt repellat minus, eius beatae nulla inventore quasi earum enim repudiandae. Quos assumenda laboriosam voluptates! Explicabo soluta dolor deleniti repellat quas fugiat? Cum qui eos et, magnam ea culpa sit facilis molestias aspernatur. Nobis consequatur qui nihil reiciendis similique magni sunt, nemo, consequuntur alias voluptate praesentium hic minima, sapiente at corrupti quae distinctio rem harum excepturi iure facilis beatae quibusdam explicabo a. Nulla eos dolorem earum quisquam at! Assumenda minima totam delectus earum unde, dolorem alias quam natus, quaerat laudantium quia facilis repudiandae consequuntur illum ipsam autem sed in. Consequuntur, sit eum reprehenderit obcaecati aut facilis dolore quidem sapiente, quaerat rerum autem quam corrupti totam, soluta ratione voluptatibus. Repellendus, debitis sed. Tempora mollitia doloremque, iusto aspernatur ea iure hic similique nobis nostrum explicabo vitae sit! Consequatur, laborum aperiam.</p>', 3, '2022-09-06 19:19:13'),
(13, 'bwajes+', 'myphptestemail@gmail.com', 'Some subject Some subject Some subject Some subject', '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Debitis, sit. Mollitia, assumenda blanditiis earum esse perferendis nam, optio dolorem natus vel ipsa magnam repellat? Eaque ducimus labore assumenda expedita, ullam esse. Deserunt asperiores ipsa aspernatur officia veritatis, eligendi nesciunt mollitia quisquam cumque laboriosam repellat quo quasi hic porro modi sapiente? Blanditiis nam sint corrupti animi unde quisquam consequuntur ipsam, ex molestiae perferendis facere veniam obcaecati! Ad quia velit atque ipsam iure eligendi recusandae nobis. Magni, consectetur. Amet modi iure ab officiis tempora dolore, at consequatur labore enim rem corporis nobis in optio dolorem eveniet provident. Enim praesentium excepturi impedit et?</p>', 3, '2022-09-08 17:03:38'),
(14, 'bwajes+', 'myphptestemail@gmail.com', 'Some subject Some subject Some subject Some subject', '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Debitis, sit. Mollitia, assumenda blanditiis earum esse perferendis nam, optio dolorem natus vel ipsa magnam repellat? Eaque ducimus labore assumenda expedita, ullam esse. Deserunt asperiores ipsa aspernatur officia veritatis, eligendi nesciunt mollitia quisquam cumque laboriosam repellat quo quasi hic porro modi sapiente? Blanditiis nam sint corrupti animi unde quisquam consequuntur ipsam, ex molestiae perferendis facere veniam obcaecati! Ad quia velit atque ipsam iure eligendi recusandae nobis. Magni, consectetur. Amet modi iure ab officiis tempora dolore, at consequatur labore enim rem corporis nobis in optio dolorem eveniet provident. Enim praesentium excepturi impedit et?</p>', 3, '2022-09-08 17:05:07'),
(15, 'bwajes+', 'myphptestemail@gmail.com', 'Some subject Some subject Some subject Some subject', '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Debitis, sit. Mollitia, assumenda blanditiis earum esse perferendis nam, optio dolorem natus vel ipsa magnam repellat? Eaque ducimus labore assumenda expedita, ullam esse. Deserunt asperiores ipsa aspernatur officia veritatis, eligendi nesciunt mollitia quisquam cumque laboriosam repellat quo quasi hic porro modi sapiente? Blanditiis nam sint corrupti animi unde quisquam consequuntur ipsam, ex molestiae perferendis facere veniam obcaecati! Ad quia velit atque ipsam iure eligendi recusandae nobis. Magni, consectetur. Amet modi iure ab officiis tempora dolore, at consequatur labore enim rem corporis nobis in optio dolorem eveniet provident. Enim praesentium excepturi impedit et?</p>', 3, '2022-09-08 17:05:37'),
(16, 'bwajes+', 'myphptestemail@gmail.com', 'Some subject Some subject Some subject Some subject', '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Debitis, sit. Mollitia, assumenda blanditiis earum esse perferendis nam, optio dolorem natus vel ipsa magnam repellat? Eaque ducimus labore assumenda expedita, ullam esse. Deserunt asperiores ipsa aspernatur officia veritatis, eligendi nesciunt mollitia quisquam cumque laboriosam repellat quo quasi hic porro modi sapiente? Blanditiis nam sint corrupti animi unde quisquam consequuntur ipsam, ex molestiae perferendis facere veniam obcaecati! Ad quia velit atque ipsam iure eligendi recusandae nobis. Magni, consectetur. Amet modi iure ab officiis tempora dolore, at consequatur labore enim rem corporis nobis in optio dolorem eveniet provident. Enim praesentium excepturi impedit et?</p>', 3, '2022-09-08 17:11:03'),
(17, 'bwajes+', 'myphptestemail@gmail.com', 'bwajes+ Some subject Some subject Some subject', '<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Maxime omnis nihil eveniet voluptate blanditiis tempora fuga architecto a odio nostrum quibusdam eligendi, enim at reiciendis mollitia vitae illum sunt dignissimos porro molestiae. Voluptatibus saepe amet id hic nesciunt cumque, aspernatur optio molestiae unde ducimus, illo tempora nam ea possimus, iusto quidem beatae! Omnis dolor eos maxime provident, consectetur officiis beatae perferendis quas ex minus eveniet libero quia! Ex natus eveniet odio blanditiis hic, doloremque nesciunt id, labore eum magnam maxime velit optio qui suscipit dolor voluptatem rerum et vel tempore perspiciatis ad neque, non beatae? Esse est corrupti praesentium commodi?</p>', 3, '2022-09-09 06:59:11'),
(18, 'bwajes+', 'myphptestemail@gmail.com', 'bwajes+ Some subject Some subject Some subject', '<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Maxime omnis nihil eveniet voluptate blanditiis tempora fuga architecto a odio nostrum quibusdam eligendi, enim at reiciendis mollitia vitae illum sunt dignissimos porro molestiae. Voluptatibus saepe amet id hic nesciunt cumque, aspernatur optio molestiae unde ducimus, illo tempora nam ea possimus, iusto quidem beatae! Omnis dolor eos maxime provident, consectetur officiis beatae perferendis quas ex minus eveniet libero quia! Ex natus eveniet odio blanditiis hic, doloremque nesciunt id, labore eum magnam maxime velit optio qui suscipit dolor voluptatem rerum et vel tempore perspiciatis ad neque, non beatae? Esse est corrupti praesentium commodi?<img alt=\"\" src=\"http://localhost:9090/bwajesplus-app/admin/upload_photos/1662706784_attract.jpg\" style=\"height:183px; width:275px\" /></p>', 3, '2022-09-09 06:59:50'),
(19, 'bwajes+', 'myphptestemail@gmail.com', '2 bwajes+ Some subject Some subject Some subject', '<p>A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;</p>', 3, '2022-09-11 12:05:26'),
(20, 'test sender', 'myphptestemail@gmail.com', '2 bwajes+ Some subject Some subject Some subject', '<p>A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;</p>', 3, '2022-09-11 12:07:11'),
(21, 'test sender', 'myphptestemail@gmail.com', '2 bwajes+ Some subject Some subject Some subject', '<p>A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;</p>', 3, '2022-09-11 12:08:02'),
(22, 'IT Team', 'it@bwajes-plus.andadel.com', '2 bwajes+ Some subject Some subject Some subject', '<p>A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;</p>', 3, '2022-09-11 12:09:10'),
(23, 'IT Team', 'it@bwajes-plus.andadel.com', '2 bwajes+ Some subject Some subject Some subject', '<p>A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;A random mesage&nbsp;</p>', 3, '2022-09-11 12:10:10'),
(24, 'bwajes+', 'myphptestemail@gmail.com', 'Some subject Some subject Some subject Some subject', '<p>Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;</p>', 3, '2022-09-11 12:24:09'),
(25, 'bwajes+', 'myphptestemail@gmail.com', 'Some subject Some subject Some subject Some subject', '<p>Some body Some body Some body Some body Some body Some body Some body Some body Some body Some body Some body Some body Some body Some body Some body Some body Some body Some body Some body Some body Some body Some body Some body Some body Some body Some body Some body Some body Some body Some body Some body Some body Some body Some body Some body Some body Some body Some body Some body Some body Some body Some body Some body Some body Some body Some body Some body Some body Some body Some body Some body Some body Some body Some body Some body Some body Some body Some body </p>', 3, '2022-09-11 12:35:50'),
(26, 'bwajes+', 'myphptestemail@gmail.com', 'Some subject Some subject Some subject Some subject', '&lt;p&gt;Some body&amp;nbsp;Some body&amp;nbsp;Some body&amp;nbsp;Some body&amp;nbsp;Some body&amp;nbsp;Some body&amp;nbsp;Some body&amp;nbsp;Some body&amp;nbsp;Some body&amp;nbsp;Some body&amp;nbsp;Some body&amp;nbsp;Some body&amp;nbsp;Some body&amp;nbsp;Some body&amp;nbsp;Some body&amp;nbsp;Some body&amp;nbsp;Some body&amp;nbsp;Some body&amp;nbsp;Some body&amp;nbsp;Some body&amp;nbsp;Some body&amp;nbsp;Some body&amp;nbsp;Some body&amp;nbsp;Some body&amp;nbsp;Some body&amp;nbsp;Some body&amp;nbsp;Some body&amp;nbsp;Some body&amp;nbsp;Some body&amp;nbsp;Some body&amp;nbsp;Some body&amp;nbsp;Some body&amp;nbsp;Some body&amp;nbsp;Some body&amp;nbsp;Some body&amp;nbsp;Some body&amp;nbsp;Some body&amp;nbsp;Some body&amp;nbsp;Some body&amp;nbsp;Some body&amp;nbsp;Some body&amp;nbsp;Some body&amp;nbsp;Some body&amp;nbsp;Some body&amp;nbsp;Some body&amp;nbsp;Some body&amp;nbsp;Some body&amp;nbsp;Some body&amp;nbsp;Some body&amp;nbsp;Some body&amp;nbsp;Some body&amp;nbsp;Some body&amp;nbsp;Some body&amp;nbsp;Some body&amp;nbsp;Some body&amp;nbsp;Some body&amp;nbsp;Some body&amp;nbsp;Some body&amp;nbsp;&lt;/p&gt;', 3, '2022-09-11 12:37:10'),
(27, 'bwajes+', 'myphptestemail@gmail.com', 'Some subject Some subject Some subject Some subject', 'Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;', 3, '2022-09-11 12:38:07'),
(28, 'bwajes+', 'myphptestemail@gmail.com', 'Some subject Some subject Some subject Some subject', 'Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;', 3, '2022-09-11 12:38:39'),
(29, 'bwajes+', 'myphptestemail@gmail.com', 'Some subject Some subject Some subject Some subject', 'Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;', 3, '2022-09-11 12:38:58'),
(30, 'bwajes+', 'myphptestemail@gmail.com', 'Some subject Some subject Some subject Some subject', '<p>Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;Some body&nbsp;</p>', 3, '2022-09-11 12:39:23'),
(31, 'bwajes+', 'myphptestemail@gmail.com', 'Some subject Some subject Some subject Some subject', '<p>Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;</p>', 3, '2022-09-11 12:40:18'),
(32, 'bwajes+', 'myphptestemail@gmail.com', 'Some subject Some subject Some subject Some subject', '<p>Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;</p>', 3, '2022-09-11 12:41:06'),
(34, 'bwajes+', 'myphptestemail@gmail.com', 'Some subject Some subject Some subject Some subject', '<p>Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;</p>', 3, '2022-09-11 12:43:11'),
(35, 'bwajes+', 'myphptestemail@gmail.com', 'Some subject Some subject Some subject Some subject', '<p>Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;</p>', 3, '2022-09-11 13:04:58'),
(36, 'bwajes+', 'myphptestemail@gmail.com', 'Some subject Some subject Some subject Some subject', 'a<p>Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;</p>', 3, '2022-09-11 13:06:47'),
(37, 'bwajes+', 'myphptestemail@gmail.com', 'Some subject Some subject Some subject Some subject', 'a<p>Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;</p>', 3, '2022-09-11 13:07:50'),
(38, 'bwajes+', 'myphptestemail@gmail.com', '6 Some subject Some subject Some subject Some subject', '<img src=\"http://localhost:9090/bwajesplus-app/admin/email_track/40e14c87db4d1a853c85fde62c3b2047\" width=\"1\" height=\"1\"><p>Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;</p>', 3, '2022-09-11 14:26:40'),
(39, 'bwajes+', 'myphptestemail@gmail.com', '6 Some subject Some subject Some subject Some subject', '<img src=\"http://localhost:9090/bwajesplus-app/admin/email_track/d35583179d7d0ce7e7b9b55dc4328a9a\" width=\"1\" height=\"1\"><p>Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;</p>', 3, '2022-09-11 14:34:31'),
(40, 'bwajes+', 'myphptestemail@gmail.com', '6 Some subject Some subject Some subject Some subject', '<img src=\"http://localhost:9090/bwajesplus-app/admin/email_track/da7ef253229d16812f123f0a48f3fa6b\" width=\"1\" height=\"1\"><p>Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;</p>', 3, '2022-09-11 14:34:45'),
(41, 'bwajes+', 'myphptestemail@gmail.com', 'h bwajes+ Some subject Some subject Some subject', '<img src=\"http://localhost:9090/bwajesplus-app/admin/email_track/bc8bda1115ef8f0d3fd511058faf8aee\" width=\"1\" height=\"1\"><p>h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;</p>', 3, '2022-09-12 17:41:51'),
(42, 'bwajes+', 'myphptestemail@gmail.com', 'h bwajes+ Some subject Some subject Some subject', '<img src=\"http://localhost:9090/bwajesplus-app/admin/email_track/bc8bda1115ef8f0d3fd511058faf8aee\" width=\"1\" height=\"1\"><p>h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;</p><img src=\"http://localhost:9090/bwajesplus-app/admin/email_track/866d2802ca46d0d1aff0f1da439c16d7\" width=\"1\" height=\"1\"><p>h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;</p>', 3, '2022-09-12 17:41:56'),
(43, 'bwajes+', 'myphptestemail@gmail.com', 'h bwajes+ Some subject Some subject Some subject', '<img src=\"http://localhost:9090/bwajesplus-app/admin/email_track/bc8bda1115ef8f0d3fd511058faf8aee\" width=\"1\" height=\"1\"><p>h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;</p><img src=\"http://localhost:9090/bwajesplus-app/admin/email_track/866d2802ca46d0d1aff0f1da439c16d7\" width=\"1\" height=\"1\"><p>h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;</p><img src=\"http://localhost:9090/bwajesplus-app/admin/email_track/54069250a505a13f9970caab40c8dbc8\" width=\"1\" height=\"1\"><p>h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;</p>', 3, '2022-09-12 17:41:59'),
(44, 'bwajes+', 'myphptestemail@gmail.com', 'h bwajes+ Some subject Some subject Some subject', '<img src=\"http://localhost:9090/bwajesplus-app/admin/email_track/bc8bda1115ef8f0d3fd511058faf8aee\" width=\"1\" height=\"1\"><p>h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;</p><img src=\"http://localhost:9090/bwajesplus-app/admin/email_track/866d2802ca46d0d1aff0f1da439c16d7\" width=\"1\" height=\"1\"><p>h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;</p><img src=\"http://localhost:9090/bwajesplus-app/admin/email_track/54069250a505a13f9970caab40c8dbc8\" width=\"1\" height=\"1\"><p>h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;</p><img src=\"http://localhost:9090/bwajesplus-app/admin/email_track/bac742c0468af0689523e22adea3d42b\" width=\"1\" height=\"1\"><p>h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;</p>', 3, '2022-09-12 17:42:02'),
(45, 'bwajes+', 'myphptestemail@gmail.com', 'h bwajes+ Some subject Some subject Some subject', '<img src=\"http://localhost:9090/bwajesplus-app/admin/email_track/bc8bda1115ef8f0d3fd511058faf8aee\" width=\"1\" height=\"1\"><p>h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;</p><img src=\"http://localhost:9090/bwajesplus-app/admin/email_track/866d2802ca46d0d1aff0f1da439c16d7\" width=\"1\" height=\"1\"><p>h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;</p><img src=\"http://localhost:9090/bwajesplus-app/admin/email_track/54069250a505a13f9970caab40c8dbc8\" width=\"1\" height=\"1\"><p>h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;</p><img src=\"http://localhost:9090/bwajesplus-app/admin/email_track/bac742c0468af0689523e22adea3d42b\" width=\"1\" height=\"1\"><p>h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;</p><img src=\"http://localhost:9090/bwajesplus-app/admin/email_track/80ba1e8de1e11d9b59929671df92a9f9\" width=\"1\" height=\"1\"><p>h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;</p>', 3, '2022-09-12 17:42:05');
INSERT INTO `admin_sent_emails` (`id`, `set_from_name`, `set_from_email`, `subject`, `body`, `admin_id`, `created_at`) VALUES
(46, 'bwajes+', 'myphptestemail@gmail.com', 'h bwajes+ Some subject Some subject Some subject', '<img src=\"http://localhost:9090/bwajesplus-app/admin/email_track/bc8bda1115ef8f0d3fd511058faf8aee\" width=\"1\" height=\"1\"><p>h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;</p><img src=\"http://localhost:9090/bwajesplus-app/admin/email_track/866d2802ca46d0d1aff0f1da439c16d7\" width=\"1\" height=\"1\"><p>h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;</p><img src=\"http://localhost:9090/bwajesplus-app/admin/email_track/54069250a505a13f9970caab40c8dbc8\" width=\"1\" height=\"1\"><p>h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;</p><img src=\"http://localhost:9090/bwajesplus-app/admin/email_track/bac742c0468af0689523e22adea3d42b\" width=\"1\" height=\"1\"><p>h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;</p><img src=\"http://localhost:9090/bwajesplus-app/admin/email_track/80ba1e8de1e11d9b59929671df92a9f9\" width=\"1\" height=\"1\"><p>h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;</p><img src=\"http://localhost:9090/bwajesplus-app/admin/email_track/406c592c6256c7f4caab36f4ba7edfc5\" width=\"1\" height=\"1\"><p>h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;</p>', 3, '2022-09-12 17:42:08'),
(47, 'bwajes+', 'myphptestemail@gmail.com', 'h bwajes+ Some subject Some subject Some subject', '<img src=\"http://localhost:9090/bwajesplus-app/admin/email_track/bc8bda1115ef8f0d3fd511058faf8aee\" width=\"1\" height=\"1\"><p>h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;</p><img src=\"http://localhost:9090/bwajesplus-app/admin/email_track/866d2802ca46d0d1aff0f1da439c16d7\" width=\"1\" height=\"1\"><p>h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;</p><img src=\"http://localhost:9090/bwajesplus-app/admin/email_track/54069250a505a13f9970caab40c8dbc8\" width=\"1\" height=\"1\"><p>h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;</p><img src=\"http://localhost:9090/bwajesplus-app/admin/email_track/bac742c0468af0689523e22adea3d42b\" width=\"1\" height=\"1\"><p>h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;</p><img src=\"http://localhost:9090/bwajesplus-app/admin/email_track/80ba1e8de1e11d9b59929671df92a9f9\" width=\"1\" height=\"1\"><p>h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;</p><img src=\"http://localhost:9090/bwajesplus-app/admin/email_track/406c592c6256c7f4caab36f4ba7edfc5\" width=\"1\" height=\"1\"><p>h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;</p><img src=\"http://localhost:9090/bwajesplus-app/admin/email_track/ce3d8f10a26c9ff99dbe2c2fdfb01ffb\" width=\"1\" height=\"1\"><p>h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;h bwajes+ Some subject Some subject Some subject&nbsp;</p>', 3, '2022-09-12 17:42:11'),
(48, 'IT Team', 'it@bwajes-plus.andadel.com', 'h1 bwajes+ Some subject Some subject Some subject', '<img src=\"http://localhost:9090/bwajesplus-app/admin/email_track/59406c6d2e66284b2c3541d4f8935788\" width=\"1\" height=\"1\"><p>h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;</p>', 3, '2022-09-12 17:57:27'),
(49, 'IT Team', 'it@bwajes-plus.andadel.com', 'h2 bwajes+ Some subject Some subject Some subject', '<img src=\"http://localhost:9090/bwajesplus-app/admin/email_track/38a4b48623a1d8c10e2e6bfccf34fc5c\" width=\"1\" height=\"1\"><p>h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;</p>', 3, '2022-09-12 18:00:15'),
(50, 'IT Team', 'it@bwajes-plus.andadel.com', 'h2 bwajes+ Some subject Some subject Some subject', '<img src=\"http://localhost:9090/bwajesplus-app/admin/email_track/38a4b48623a1d8c10e2e6bfccf34fc5c\" width=\"1\" height=\"1\"><p>h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;</p><img src=\"http://localhost:9090/bwajesplus-app/admin/email_track/72a5d250cb121b906b9370c5eaa39b28\" width=\"1\" height=\"1\"><p>h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;</p>', 3, '2022-09-12 18:00:20'),
(51, 'IT Team', 'it@bwajes-plus.andadel.com', 'h2 bwajes+ Some subject Some subject Some subject', '<img src=\"http://localhost:9090/bwajesplus-app/admin/email_track/38a4b48623a1d8c10e2e6bfccf34fc5c\" width=\"1\" height=\"1\"><p>h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;</p><img src=\"http://localhost:9090/bwajesplus-app/admin/email_track/72a5d250cb121b906b9370c5eaa39b28\" width=\"1\" height=\"1\"><p>h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;</p><img src=\"http://localhost:9090/bwajesplus-app/admin/email_track/cf84ebf5f53691ebce2c647a8b981343\" width=\"1\" height=\"1\"><p>h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;</p>', 3, '2022-09-12 18:00:24'),
(52, 'IT Team', 'it@bwajes-plus.andadel.com', 'h2 bwajes+ Some subject Some subject Some subject', '<img src=\"http://localhost:9090/bwajesplus-app/admin/email_track/38a4b48623a1d8c10e2e6bfccf34fc5c\" width=\"1\" height=\"1\"><p>h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;</p><img src=\"http://localhost:9090/bwajesplus-app/admin/email_track/72a5d250cb121b906b9370c5eaa39b28\" width=\"1\" height=\"1\"><p>h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;</p><img src=\"http://localhost:9090/bwajesplus-app/admin/email_track/cf84ebf5f53691ebce2c647a8b981343\" width=\"1\" height=\"1\"><p>h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;</p><img src=\"http://localhost:9090/bwajesplus-app/admin/email_track/04bf2c9645b844f7ac2b8dd6b9f6c334\" width=\"1\" height=\"1\"><p>h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;</p>', 3, '2022-09-12 18:00:27'),
(53, 'IT Team', 'it@bwajes-plus.andadel.com', 'h2 bwajes+ Some subject Some subject Some subject', '<img src=\"http://localhost:9090/bwajesplus-app/admin/email_track/38a4b48623a1d8c10e2e6bfccf34fc5c\" width=\"1\" height=\"1\"><p>h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;</p><img src=\"http://localhost:9090/bwajesplus-app/admin/email_track/72a5d250cb121b906b9370c5eaa39b28\" width=\"1\" height=\"1\"><p>h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;</p><img src=\"http://localhost:9090/bwajesplus-app/admin/email_track/cf84ebf5f53691ebce2c647a8b981343\" width=\"1\" height=\"1\"><p>h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;</p><img src=\"http://localhost:9090/bwajesplus-app/admin/email_track/04bf2c9645b844f7ac2b8dd6b9f6c334\" width=\"1\" height=\"1\"><p>h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;</p><img src=\"http://localhost:9090/bwajesplus-app/admin/email_track/e44fdcac36b66ff5f269a8e8d099a176\" width=\"1\" height=\"1\"><p>h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;</p>', 3, '2022-09-12 18:00:31'),
(54, 'IT Team', 'it@bwajes-plus.andadel.com', 'h2 bwajes+ Some subject Some subject Some subject', '<img src=\"http://localhost:9090/bwajesplus-app/admin/email_track/38a4b48623a1d8c10e2e6bfccf34fc5c\" width=\"1\" height=\"1\"><p>h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;</p><img src=\"http://localhost:9090/bwajesplus-app/admin/email_track/72a5d250cb121b906b9370c5eaa39b28\" width=\"1\" height=\"1\"><p>h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;</p><img src=\"http://localhost:9090/bwajesplus-app/admin/email_track/cf84ebf5f53691ebce2c647a8b981343\" width=\"1\" height=\"1\"><p>h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;</p><img src=\"http://localhost:9090/bwajesplus-app/admin/email_track/04bf2c9645b844f7ac2b8dd6b9f6c334\" width=\"1\" height=\"1\"><p>h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;</p><img src=\"http://localhost:9090/bwajesplus-app/admin/email_track/e44fdcac36b66ff5f269a8e8d099a176\" width=\"1\" height=\"1\"><p>h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;</p><img src=\"http://localhost:9090/bwajesplus-app/admin/email_track/0b9e9b68149de35a4958ccd8eb1c3f02\" width=\"1\" height=\"1\"><p>h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;</p>', 3, '2022-09-12 18:00:35'),
(55, 'IT Team', 'it@bwajes-plus.andadel.com', 'h2 bwajes+ Some subject Some subject Some subject', '<img src=\"http://localhost:9090/bwajesplus-app/admin/email_track/38a4b48623a1d8c10e2e6bfccf34fc5c\" width=\"1\" height=\"1\"><p>h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;</p><img src=\"http://localhost:9090/bwajesplus-app/admin/email_track/72a5d250cb121b906b9370c5eaa39b28\" width=\"1\" height=\"1\"><p>h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;</p><img src=\"http://localhost:9090/bwajesplus-app/admin/email_track/cf84ebf5f53691ebce2c647a8b981343\" width=\"1\" height=\"1\"><p>h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;</p><img src=\"http://localhost:9090/bwajesplus-app/admin/email_track/04bf2c9645b844f7ac2b8dd6b9f6c334\" width=\"1\" height=\"1\"><p>h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;</p><img src=\"http://localhost:9090/bwajesplus-app/admin/email_track/e44fdcac36b66ff5f269a8e8d099a176\" width=\"1\" height=\"1\"><p>h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;</p><img src=\"http://localhost:9090/bwajesplus-app/admin/email_track/0b9e9b68149de35a4958ccd8eb1c3f02\" width=\"1\" height=\"1\"><p>h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;</p><img src=\"http://localhost:9090/bwajesplus-app/admin/email_track/1e74797f633cf5216085c42ed0cba017\" width=\"1\" height=\"1\"><p>h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;h1 bwajes+ Some subject Some subject Some subject&nbsp;</p>', 3, '2022-09-12 18:00:38'),
(56, 'bwajes+', 'myphptestemail@gmail.com', 'die Some subject Some subject Some subject Some subject', '\r\n<p>die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;</p>', 3, '2022-09-13 10:10:44'),
(57, 'bwajes+', 'myphptestemail@gmail.com', 'die Some subject Some subject Some subject Some subject', '\r\n<p>die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;</p>', 3, '2022-09-13 10:12:29'),
(58, 'bwajes+', 'myphptestemail@gmail.com', 'die Some subject Some subject Some subject Some subject', '\r\n<p>die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;</p>', 3, '2022-09-13 10:15:25'),
(59, 'bwajes+', 'myphptestemail@gmail.com', 'die Some subject Some subject Some subject Some subject', '\r\n<p>die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;</p>', 3, '2022-09-13 10:17:05'),
(60, 'bwajes+', 'myphptestemail@gmail.com', 'die Some subject Some subject Some subject Some subject', '\r\n<p>die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;</p>', 3, '2022-09-13 10:28:05'),
(61, 'bwajes+', 'myphptestemail@gmail.com', 'die Some subject Some subject Some subject Some subject', '\r\n<p>die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;</p>', 3, '2022-09-13 10:28:33'),
(62, 'bwajes+', 'myphptestemail@gmail.com', 'die Some subject Some subject Some subject Some subject', '\r\n<p>die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;</p>', 3, '2022-09-13 10:29:13'),
(63, 'bwajes+', 'myphptestemail@gmail.com', 'die Some subject Some subject Some subject Some subject', '\r\n<p>die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;</p>', 3, '2022-09-13 10:29:47'),
(64, 'bwajes+', 'myphptestemail@gmail.com', 'die Some subject Some subject Some subject Some subject', '\r\n<p>die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;</p>', 3, '2022-09-13 10:35:17'),
(65, 'bwajes+', 'myphptestemail@gmail.com', 'die Some subject Some subject Some subject Some subject', 'Dear esteemed\r\n<p>die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;</p>', 3, '2022-09-13 10:38:10'),
(66, 'bwajes+', 'myphptestemail@gmail.com', 'die Some subject Some subject Some subject Some subject', '\r\n<p>die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;</p>', 3, '2022-09-13 10:40:12'),
(67, 'bwajes+', 'myphptestemail@gmail.com', 'die Some subject Some subject Some subject Some subject', 'Dear\r\n<p>die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;</p>', 3, '2022-09-13 10:40:41'),
(68, 'bwajes+', 'myphptestemail@gmail.com', 'die Some subject Some subject Some subject Some subject', 'Dear\r\n<p>die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;</p>', 3, '2022-09-13 10:42:03'),
(69, 'bwajes+', 'myphptestemail@gmail.com', 'die Some subject Some subject Some subject Some subject', 'Dear\r\n<p>die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;</p>', 3, '2022-09-13 10:43:23'),
(70, 'bwajes+', 'myphptestemail@gmail.com', 'die Some subject Some subject Some subject Some subject', '<p>die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;</p>', 3, '2022-09-13 10:46:05'),
(71, 'bwajes+', 'myphptestemail@gmail.com', 'die Some subject Some subject Some subject Some subject', '<p>die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;</p>', 3, '2022-09-13 10:47:37'),
(72, 'bwajes+', 'myphptestemail@gmail.com', 'die Some subject Some subject Some subject Some subject', '<p>die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;</p>', 3, '2022-09-13 10:50:21'),
(73, 'bwajes+', 'myphptestemail@gmail.com', '73 bwajes+ Some subject Some subject Some subject', '<p>73 bwajes+ Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;</p>', 3, '2022-09-13 10:59:36'),
(74, 'bwajes+', 'myphptestemail@gmail.com', '74 bwajes+ Some subject Some subject Some subject', '<p>74 bwajes+ Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;die Some subject Some subject Some subject Some subject&nbsp;</p>', 3, '2022-09-13 11:11:28'),
(75, 'bwajes+', 'myphptestemail@gmail.com', 'h2 bwajes+ Some subject Some subject Some subject', '<p>h2 bwajes+ Some subject Some subject Some subjecth2 bwajes+ Some subject Some subject Some subjecth2 bwajes+ Some subject Some subject Some subjecth2 bwajes+ Some subject Some subject Some subjecth2 bwajes+ Some subject Some subject Some subjecth2 bwajes+ Some subject Some subject Some subjecth2 bwajes+ Some subject Some subject Some subjecth2 bwajes+ Some subject Some subject Some subjecth2 bwajes+ Some subject Some subject Some subjecth2 bwajes+ Some subject Some subject Some subjecth2 bwajes+ Some subject Some subject Some subject</p>', 3, '2022-09-14 13:56:45'),
(76, 'bwajes+', 'myphptestemail@gmail.com', 'Some subject Some subject Some subject Some subject', '<p>76 bwajes+ Some subject Some subject Some subjecth2 bwajes+ Some subject Some subject Some subjecth2 bwajes+ Some subject Some subject Some subjecth2 bwajes+ Some subject Some subject Some subjecth2 bwajes+ Some subject Some subject Some subjecth2 bwajes+ Some subject Some subject Some subjecth2 bwajes+ Some subject Some subject Some subjecth2 bwajes+ Some subject Some subject Some subjecth2 bwajes+ Some subject Some subject Some subjecth2 bwajes+ Some subject Some subject Some subjecth2 bwajes+ Some subject Some subject Some subject</p>', 3, '2022-09-14 14:04:29'),
(77, 'bwajes+', 'myphptestemail@gmail.com', 'Some subject Some subject Some subject Some subject', '<p>76 bwajes+ Some subject Some subject Some subjecth2 bwajes+ Some subject Some subject Some subjecth2 bwajes+ Some subject Some subject Some subjecth2 bwajes+ Some subject Some subject Some subjecth2 bwajes+ Some subject Some subject Some subjecth2 bwajes+ Some subject Some subject Some subjecth2 bwajes+ Some subject Some subject Some subjecth2 bwajes+ Some subject Some subject Some subjecth2 bwajes+ Some subject Some subject Some subjecth2 bwajes+ Some subject Some subject Some subjecth2 bwajes+ Some subject Some subject Some subject</p>', 3, '2022-09-14 14:11:02');
INSERT INTO `admin_sent_emails` (`id`, `set_from_name`, `set_from_email`, `subject`, `body`, `admin_id`, `created_at`) VALUES
(78, 'bwajes+', 'myphptestemail@gmail.com', 'h bwajes+ Some subject Some subject Some subject', '<p>78 bwajes+ Some subject Some subject Some subjecth2 bwajes+ Some subject Some subject Some subjecth2 bwajes+ Some subject Some subject Some subjecth2 bwajes+ Some subject Some subject Some subjecth2 bwajes+ Some subject Some subject Some subjecth2 bwajes+ Some subject Some subject Some subjecth2 bwajes+ Some subject Some subject Some subjecth2 bwajes+ Some subject Some subject Some subjecth2 bwajes+ Some subject Some subject Some subjecth2 bwajes+ Some subject Some subject Some subjecth2 bwajes+ Some subject Some subject Some subject</p>', 3, '2022-09-14 14:15:13'),
(79, 'bwajes+', 'myphptestemail@gmail.com', 'Some subject Some subject Some subject Some subject', '<p>79&nbsp;Some subject Some subject Some subject Some subject&nbsp;79&nbsp;Some subject Some subject Some subject Some subject&nbsp;79&nbsp;Some subject Some subject Some subject Some subject&nbsp;79&nbsp;Some subject Some subject Some subject Some subject&nbsp;79&nbsp;Some subject Some subject Some subject Some subject&nbsp;79&nbsp;Some subject Some subject Some subject Some subject&nbsp;79&nbsp;Some subject Some subject Some subject Some subject&nbsp;79&nbsp;Some subject Some subject Some subject Some subject&nbsp;79&nbsp;Some subject Some subject Some subject Some subject&nbsp;</p>', 3, '2022-09-14 14:40:07'),
(80, 'bwajes+', 'myphptestemail@gmail.com', 'Some subject Some subject Some subject Some subject', '<p>80 Some subject Some subject Some subject Some subject&nbsp;79&nbsp;Some subject Some subject Some subject Some subject&nbsp;79&nbsp;Some subject Some subject Some subject Some subject&nbsp;79&nbsp;Some subject Some subject Some subject Some subject&nbsp;79&nbsp;Some subject Some subject Some subject Some subject&nbsp;79&nbsp;Some subject Some subject Some subject Some subject&nbsp;79&nbsp;Some subject Some subject Some subject Some subject&nbsp;79&nbsp;Some subject Some subject Some subject Some subject&nbsp;79&nbsp;Some subject Some subject Some subject Some subject&nbsp;</p>', 3, '2022-09-14 14:44:10'),
(81, 'Payment service', 'billing@bwajes-plus.andadel.com', 'Some billing Some subject Some subject Some subject', '<p>Some billing Some subject Some subject Some subject&nbsp;Some billing Some subject Some subject Some subject&nbsp;Some billing Some subject Some subject Some subject&nbsp;Some billing Some subject Some subject Some subject&nbsp;Some billing Some subject Some subject Some subject</p>', 4, '2022-09-17 13:03:26'),
(82, 'Payment service', 'billing@bwajes-plus.andadel.com', 'Some billing Some subject Some subject Some subject', '<p>Some billing Some subject Some subject Some subject&nbsp;Some billing Some subject Some subject Some subject&nbsp;Some billing Some subject Some subject Some subject&nbsp;Some billing Some subject Some subject Some subject&nbsp;Some billing Some subject Some subject Some subject</p>', 4, '2022-09-17 13:08:29'),
(83, 'Payment service', 'billing@bwajes-plus.andadel.com', 'Some billing Some subject Some subject Some subject', '<p>Some billing Some subject Some subject Some subject&nbsp;Some billing Some subject Some subject Some subject&nbsp;Some billing Some subject Some subject Some subject&nbsp;Some billing Some subject Some subject Some subject&nbsp;Some billing Some subject Some subject Some subject</p>', 4, '2022-09-17 13:09:49'),
(84, 'Payment service', 'billing@bwajes-plus.andadel.com', 'Some billing Some subject Some subject Some subject', '<p>Some billing Some subject Some subject Some subject&nbsp;Some billing Some subject Some subject Some subject&nbsp;Some billing Some subject Some subject Some subject&nbsp;Some billing Some subject Some subject Some subject&nbsp;Some billing Some subject Some subject Some subject</p>', 4, '2022-09-17 13:10:17'),
(85, 'Payment service', 'billing@bwajes-plus.andadel.com', 'Some billing Some subject Some subject Some subject', '<p>Some billing Some subject Some subject Some subject&nbsp;Some billing Some subject Some subject Some subject&nbsp;Some billing Some subject Some subject Some subject&nbsp;Some billing Some subject Some subject Some subject&nbsp;Some billing Some subject Some subject Some subject</p>', 4, '2022-09-17 13:13:04'),
(86, 'bwajes+', 'myphptestemail@gmail.com', 'DeleteSome subject Some subject Some subject Some subject', '<p>DeleteSome subject Some subject Some subject Some subject&nbsp;DeleteSome subject Some subject Some subject Some subject&nbsp;DeleteSome subject Some subject Some subject Some subject&nbsp;DeleteSome subject Some subject Some subject Some subject&nbsp;DeleteSome subject Some subject Some subject Some subject&nbsp;DeleteSome subject Some subject Some subject Some subject&nbsp;DeleteSome subject Some subject Some subject Some subject&nbsp;DeleteSome subject Some subject Some subject Some subject&nbsp;DeleteSome subject Some subject Some subject Some subject&nbsp;DeleteSome subject Some subject Some subject Some subject&nbsp;</p>', 4, '2022-09-18 18:01:53'),
(87, 'bwajes+', 'myphptestemail@gmail.com', 'Some subject Some subject Some subject Some subject', '<p>Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;</p>', 4, '2022-09-18 20:07:24'),
(88, 'bwajes+', 'myphptestemail@gmail.com', 'Some subject Some subject Some subject Some subject', '<p>Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;</p>', 4, '2022-09-18 20:19:39'),
(89, 'bwajes+', 'myphptestemail@gmail.com', '6 Some subject Some subject Some subject Some subject', '<p>6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;</p>', 4, '2022-09-19 06:46:27'),
(90, 'bwajes+', 'myphptestemail@gmail.com', '6 Some subject Some subject Some subject Some subject', '<p>6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;</p>', 4, '2022-09-19 06:57:55'),
(91, 'bwajes+', 'myphptestemail@gmail.com', '6 Some subject Some subject Some subject Some subject', '<p>6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;</p>', 4, '2022-09-19 06:59:47'),
(92, 'bwajes+', 'myphptestemail@gmail.com', '6 Some subject Some subject Some subject Some subject', '<p>6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;</p>', 4, '2022-09-19 07:00:07'),
(93, 'bwajes+', 'myphptestemail@gmail.com', 'Some subject Some subject Some subject Some subject', '<p>6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;</p>', 4, '2022-09-19 07:05:44'),
(94, 'bwajes+', 'myphptestemail@gmail.com', 'Some subject Some subject Some subject Some subject', '<p>Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;</p>', 4, '2022-09-19 07:07:15'),
(95, 'bwajes+', 'myphptestemail@gmail.com', 'Some subject Some subject Some subject Some subject', '<p>Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;</p>', 4, '2022-09-19 07:07:51'),
(96, 'bwajes+', 'myphptestemail@gmail.com', 'Some subject Some subject Some subject Some subject', '<p>Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;</p>', 4, '2022-09-19 07:09:28'),
(97, 'bwajes+', 'myphptestemail@gmail.com', 'Some subject Some subject Some subject Some subject', '<p>Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;</p>', 4, '2022-09-19 07:10:56'),
(98, 'bwajes+', 'myphptestemail@gmail.com', 'Some subject Some subject Some subject Some subject', '<p>Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;</p>', 4, '2022-09-19 07:14:11'),
(99, 'bwajes+', 'myphptestemail@gmail.com', 'Some subject Some subject Some subject Some subject', '<p>Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;</p>', 4, '2022-09-19 07:15:47'),
(100, 'bwajes+', 'myphptestemail@gmail.com', 'Some subject Some subject Some subject Some subject', '<p>Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;</p>', 4, '2022-09-19 07:16:52'),
(101, 'bwajes+', 'myphptestemail@gmail.com', 'Some subject Some subject Some subject Some subject', '<p>Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;</p>', 4, '2022-09-19 07:17:38'),
(102, 'bwajes+', 'myphptestemail@gmail.com', 'Some subject Some subject Some subject Some subject', '<p>Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;</p>', 4, '2022-09-19 07:17:50'),
(103, 'bwajes+', 'myphptestemail@gmail.com', '6 Some subject Some subject Some subject Some subject', '<p>Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;</p>', 4, '2022-09-19 07:18:19'),
(104, 'bwajes+', 'myphptestemail@gmail.com', 'bwajes+ Some subject Some subject Some subject', '<p>Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;</p>', 4, '2022-09-19 07:18:36'),
(105, 'bwajes+', 'myphptestemail@gmail.com', '2 bwajes+ Some subject Some subject Some subject', '<p>Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;</p>', 4, '2022-09-19 07:18:58'),
(106, 'bwajes+', 'myphptestemail@gmail.com', 'Some subject Some subject Some subject Some subject', '<p>Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;</p>', 4, '2022-09-19 07:19:20'),
(107, 'bwajes+', 'myphptestemail@gmail.com', 'Some billing Some subject Some subject Some subject', '<p>Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;</p>', 4, '2022-09-19 07:19:44'),
(108, 'bwajes+', 'myphptestemail@gmail.com', 'Some billing Some subject Some subject Some subject', '<p>Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;</p>', 4, '2022-09-19 07:20:12'),
(109, 'bwajes+', 'myphptestemail@gmail.com', 'Some subject Some subject Some subject Some subject', '<p>Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;</p>', 4, '2022-09-30 09:50:45'),
(110, 'bwajes+', 'myphptestemail@gmail.com', 'Some subject Some subject Some subject Some subject', '<p>Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', 4, '2022-10-04 17:21:59'),
(111, 'bwajes+', 'myphptestemail@gmail.com', '6 Some subject Some subject Some subject Some subject', '<p><img alt=\"\" src=\"http://localhost:9090/bwajesplus-app/admin/upload_photos/1665000938_abstract.jpg\" style=\"height:413px; width:900px\" /></p>\r\n\r\n<p>6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;</p>', 4, '2022-10-05 20:16:14'),
(112, 'bwajes+', 'myphptestemail@gmail.com', 'Some billing Some subject Some subject Some subject', '<p><img alt=\"\" src=\"http://localhost:9090/bwajesplus-app/admin/upload_photos/1665001410_abstract.jpg\" style=\"height:344px; width:750px\" /></p>\r\n\r\n<p>6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;</p>', 4, '2022-10-05 20:24:00'),
(113, 'bwajes+', 'myphptestemail@gmail.com', '6 Some subject Some subject Some subject Some subject', '<p><img alt=\"\" src=\"http://localhost:9090/bwajesplus-app/admin/upload_photos/1665001606_abstract.jpg\" style=\"height:344px; width:750px\" /></p>\r\n\r\n<p>6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;</p>', 4, '2022-10-05 20:26:57'),
(114, 'bwajes+', 'myphptestemail@gmail.com', 'Some billing Some subject Some subject Some subject', '<p><img alt=\"\" src=\"http://localhost:9090/bwajesplus-app/admin/upload_photos/1665001857_abstract.jpg\" style=\"height:292px; width:635px\" /></p>\r\n\r\n<p>6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;</p>', 4, '2022-10-05 20:31:19'),
(115, 'bwajes+', 'myphptestemail@gmail.com', 'Some subject Some subject Some subject Some subject', '<p><img alt=\"\" src=\"http://localhost:9090/bwajesplus-app/admin/upload_photos/1665002102_author.jpg\" style=\"height:354px; width:632px\" /></p>\r\n\r\n<p>6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;6 Some subject Some subject Some subject Some subject&nbsp;</p>', 4, '2022-10-05 20:35:25'),
(116, 'bwajes+', 'myphptestemail@gmail.com', 'Some subject Some subject Some subject Some subject', '<p>Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;</p>', 4, '2022-10-11 12:10:51'),
(117, 'bwajes+', 'myphptestemail@gmail.com', 'Some subject Some subject Some subject Some subject', '<p>Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;</p>', 4, '2022-10-11 12:17:49'),
(118, 'bwajes+', 'myphptestemail@gmail.com', '6 Some subject Some subject Some subject Some subject', '<p>Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;</p>', 4, '2022-10-11 12:30:19'),
(119, 'bwajes+', 'myphptestemail@gmail.com', 'bwajes+ Some subject Some subject Some subject', '<p>Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;</p>', 4, '2022-10-11 12:31:15'),
(120, 'bwajes+', 'myphptestemail@gmail.com', 'Some subject Some subject Some subject Some subject', '<p>Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;</p>', 4, '2022-10-11 12:31:54'),
(121, 'bwajes+', 'myphptestemail@gmail.com', 'Some subject Some subject Some subject Some subject', '<p>Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;</p>', 4, '2022-10-11 12:36:21'),
(122, 'bwajes+', 'myphptestemail@gmail.com', 'Some subject Some subject Some subject Some subject', '<p>Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;</p>', 4, '2022-10-11 12:39:51'),
(123, 'bwajes+', 'myphptestemail@gmail.com', 'Some subject Some subject Some subject Some subject', '<p>Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;</p>', 4, '2022-10-11 12:40:53'),
(124, 'bwajes+', 'myphptestemail@gmail.com', 'Some subject Some subject Some subject Some subject', '<p>Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;</p>', 4, '2022-10-11 12:53:47'),
(125, 'bwajes+', 'myphptestemail@gmail.com', 'Some subject Some subject Some subject Some subject', '<p>Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;</p>', 4, '2022-10-11 12:56:11'),
(126, 'bwajes+', 'myphptestemail@gmail.com', '6 Some subject Some subject Some subject Some subject', '<p>Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;</p>', 4, '2022-10-11 12:58:59'),
(127, 'bwajes+', 'myphptestemail@gmail.com', '6 Some subject Some subject Some subject Some subject', '<p>Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;</p>', 4, '2022-10-11 13:04:03'),
(128, 'bwajes+', 'myphptestemail@gmail.com', 'Some subject Some subject Some subject Some subject', '<p>Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;Some subject Some subject Some subject Some subject&nbsp;</p>', 4, '2022-10-11 13:05:27');

-- --------------------------------------------------------

--
-- Table structure for table `admin_statistics`
--

CREATE TABLE `admin_statistics` (
  `id` int(11) UNSIGNED NOT NULL,
  `admin_id` int(11) UNSIGNED NOT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `last_logout` timestamp NULL DEFAULT NULL,
  `browser` varchar(255) NOT NULL,
  `os` varchar(255) NOT NULL,
  `device_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_statistics`
--

INSERT INTO `admin_statistics` (`id`, `admin_id`, `last_login`, `last_logout`, `browser`, `os`, `device_name`, `created_at`, `updated_at`) VALUES
(14, 3, '2022-10-06 12:25:02', '2022-10-06 12:25:27', 'Chrome', 'Windows 10', 'Unknown', '2022-08-27 13:04:46', '2022-10-06 12:25:27'),
(15, 4, '2022-11-12 13:21:36', '2022-10-11 17:10:36', 'Chrome', 'Windows 10', 'Unknown', '2022-09-17 00:44:12', '2022-11-12 13:21:36'),
(16, 5, '2022-10-07 10:36:22', '2022-10-07 10:37:15', 'Chrome', 'Windows 10', 'Unknown', '2022-10-06 09:35:59', '2022-10-07 10:37:15'),
(17, 6, '2022-10-06 13:44:36', '2022-10-06 13:44:35', 'Chrome', 'Windows 10', 'Unknown', '2022-10-06 09:37:52', '2022-10-06 13:44:36'),
(18, 2, '2022-10-06 12:26:04', '2022-10-06 12:26:14', 'Chrome', 'Windows 10', 'Unknown', '2022-10-06 12:24:37', '2022-10-06 12:26:14'),
(19, 8, '2022-10-06 13:33:13', '2022-10-06 12:35:06', 'Chrome', 'Windows 10', 'Unknown', '2022-10-06 12:33:14', '2022-10-06 12:35:06');

-- --------------------------------------------------------

--
-- Table structure for table `admin_type`
--

CREATE TABLE `admin_type` (
  `id` tinyint(1) UNSIGNED NOT NULL,
  `type` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_type`
--

INSERT INTO `admin_type` (`id`, `type`, `created_at`, `updated_at`) VALUES
(1, 'super', '2022-08-23 12:07:51', '2022-08-23 12:07:51'),
(2, 'basic', '2022-08-23 12:07:51', '2022-08-23 12:07:51');

-- --------------------------------------------------------

--
-- Table structure for table `affiliate_programmes`
--

CREATE TABLE `affiliate_programmes` (
  `id` tinyint(2) UNSIGNED NOT NULL,
  `url` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `shown` tinyint(1) NOT NULL DEFAULT 0,
  `created_by` int(11) UNSIGNED NOT NULL,
  `updated_by` int(11) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `affiliate_programmes`
--

INSERT INTO `affiliate_programmes` (`id`, `url`, `name`, `image`, `shown`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(2, 'https://google.com', 'hostinger', 'Hosting24-blue.png', 0, 1, 1, '2022-08-08 17:46:45', '2022-08-08 17:46:45'),
(3, 'https://google.com', 'coursera', 'coursera.png', 0, 1, 1, '2022-08-08 18:57:23', '2022-08-08 18:57:23');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) UNSIGNED NOT NULL,
  `post_id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL COMMENT 'This is the id of the user who created the post that people can comment on. It''s purpose is to make sure that a bwajes+ user only see notification for his/her posts only',
  `parent_id` int(11) UNSIGNED NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `website` varchar(255) DEFAULT NULL,
  `comment` text NOT NULL,
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `unsubscribed` tinyint(1) NOT NULL DEFAULT 0,
  `unsubscribed_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `user_id`, `parent_id`, `first_name`, `email`, `website`, `comment`, `status`, `unsubscribed`, `unsubscribed_date`, `created_at`, `updated_at`) VALUES
(1, 32, 122, 0, 'Andrew', 'andrewadelodun@gmail.com', NULL, 'Description Description Description Description comment', 1, 0, NULL, '2022-07-31 17:04:32', '2022-07-31 17:04:32'),
(9, 32, 122, 1, 'Remi', 'remin8934@gmail.com', NULL, 'Replying Andrew', 1, 0, NULL, '2022-09-23 14:11:56', '2022-09-23 14:11:56'),
(10, 32, 122, 9, 'Theresa', 'the033@gmail.com', NULL, 'Replying Remi', 1, 0, NULL, '2022-09-23 14:14:04', '2022-09-23 14:14:04'),
(11, 32, 122, 0, 'Emmanuel', 'andreloun@gmail.com', NULL, 'Added a comment', 1, 0, NULL, '2022-09-23 14:17:19', '2022-09-23 14:17:19'),
(12, 32, 122, 10, 'Goodness', 'goodness@fmail.com', NULL, 'Replying Theresa', 1, 0, NULL, '2022-09-25 12:10:01', '2022-09-25 12:10:01'),
(13, 32, 122, 9, 'Bello', 'bello@gmail.com', NULL, 'Is form reset working?', 1, 0, NULL, '2022-09-25 12:12:25', '2022-09-25 12:12:25'),
(14, 32, 122, 13, 'Shina', 'shina@gmail.com', NULL, 'Form reset should be working now', 1, 0, NULL, '2022-09-25 12:15:56', '2022-09-25 12:15:56'),
(15, 32, 122, 12, 'Samuel', 'andrewadelodun@gmail.com', NULL, 'compulsory comment', 0, 0, NULL, '2022-10-05 13:31:54', '2022-10-05 13:31:54');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `country` varchar(255) NOT NULL,
  `created_by` int(11) UNSIGNED NOT NULL,
  `updated_by` int(11) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(4, 'Afghanistan', 3, 6, '2022-09-05 14:44:16', '2022-10-06 10:36:11'),
(5, 'Albania', 3, 3, '2022-09-05 14:44:24', '2022-09-05 14:44:24'),
(6, 'Algeria', 3, 3, '2022-09-05 14:44:36', '2022-09-05 14:44:36'),
(7, 'Andorra', 3, 3, '2022-09-05 14:44:50', '2022-09-05 14:44:50'),
(8, 'Angola', 3, 3, '2022-09-05 14:45:00', '2022-09-05 14:45:00'),
(9, 'Antigua and Barbuda', 3, 3, '2022-09-05 14:45:25', '2022-09-05 14:45:25'),
(10, 'Argentina', 3, 3, '2022-09-05 14:45:41', '2022-09-05 14:45:41'),
(11, 'Armenia', 3, 3, '2022-09-05 14:45:49', '2022-09-05 14:45:49'),
(12, 'Australia', 3, 3, '2022-09-05 14:46:00', '2022-09-05 14:46:00'),
(13, 'Austria', 3, 3, '2022-09-05 14:46:12', '2022-09-05 14:46:12'),
(14, 'Azerbaijan', 3, 3, '2022-09-05 14:46:31', '2022-09-05 14:46:31'),
(15, 'Bahamas', 3, 3, '2022-09-05 14:46:38', '2022-09-05 14:46:38'),
(16, 'Bahrain', 3, 3, '2022-09-05 14:46:49', '2022-09-05 14:46:49'),
(17, 'Bangladesh', 3, 3, '2022-09-05 14:47:01', '2022-09-05 14:47:01'),
(18, 'Barbados', 3, 3, '2022-09-05 14:47:27', '2022-09-05 14:47:27'),
(19, 'Belarus', 3, 3, '2022-09-05 14:47:39', '2022-09-05 14:47:39'),
(20, 'Belgium', 3, 3, '2022-09-05 14:47:47', '2022-09-05 14:47:47'),
(21, 'Belize', 3, 3, '2022-09-05 14:47:57', '2022-09-05 14:47:57'),
(22, 'Benin', 3, 3, '2022-09-05 14:48:06', '2022-09-05 14:48:06'),
(23, 'Bhutan', 3, 3, '2022-09-05 14:48:16', '2022-09-05 14:48:16'),
(24, 'Bolivia', 3, 3, '2022-09-05 14:48:27', '2022-09-05 14:48:27'),
(25, 'Bosnia and Herzegovina', 3, 3, '2022-09-05 14:48:56', '2022-09-05 14:48:56'),
(26, 'Botswana', 3, 3, '2022-09-05 14:49:10', '2022-09-05 14:49:10'),
(27, 'Brazil', 3, 3, '2022-09-05 14:49:17', '2022-09-05 14:49:17'),
(28, 'Brunei', 3, 3, '2022-09-05 14:49:26', '2022-09-05 14:49:26'),
(29, 'Bulgaria', 3, 3, '2022-09-05 14:49:39', '2022-09-05 14:49:39'),
(30, 'Burkina Faso', 3, 3, '2022-09-05 14:49:59', '2022-09-05 14:49:59'),
(31, 'Burundi', 3, 3, '2022-09-05 14:50:11', '2022-09-05 14:50:11'),
(32, 'Cote d\'Ivoire', 3, 3, '2022-09-05 14:50:41', '2022-09-05 14:50:41'),
(33, 'Cape verde', 3, 3, '2022-09-05 14:51:17', '2022-09-05 14:51:17'),
(34, 'Cambodia', 3, 3, '2022-09-05 14:51:29', '2022-09-05 14:51:29'),
(35, 'Cameroon', 3, 3, '2022-09-05 14:51:39', '2022-09-05 14:51:39'),
(36, 'Canada', 3, 3, '2022-09-05 14:51:49', '2022-09-05 14:51:49'),
(37, 'Central African Republic', 3, 3, '2022-09-05 14:52:07', '2022-09-05 14:52:07'),
(38, 'Chad', 3, 3, '2022-09-05 14:52:14', '2022-09-05 14:52:14'),
(39, 'Chile', 3, 3, '2022-09-05 14:52:21', '2022-09-05 14:52:21'),
(40, 'China', 3, 3, '2022-09-05 14:52:29', '2022-09-05 14:52:29'),
(41, 'Colombia', 3, 3, '2022-09-05 14:52:41', '2022-09-05 14:52:41'),
(42, 'Comoros', 3, 3, '2022-09-05 14:52:55', '2022-09-05 14:52:55'),
(43, 'Congo (Congo-Brazzaville)', 3, 3, '2022-09-05 14:53:25', '2022-09-05 14:53:25'),
(44, 'Costa Rica', 3, 3, '2022-09-05 14:53:42', '2022-09-05 14:53:42'),
(45, 'Croatia', 3, 3, '2022-09-05 14:53:53', '2022-09-05 14:53:53'),
(46, 'Cuba', 3, 3, '2022-09-05 14:54:06', '2022-09-05 14:54:06'),
(47, 'Cyprus', 3, 3, '2022-09-05 14:54:17', '2022-09-05 14:54:17'),
(48, 'Czechia (Czech Republic)', 3, 3, '2022-09-05 14:54:57', '2022-09-05 14:54:57'),
(49, 'Democratic Republic of Congo', 3, 3, '2022-09-05 14:55:30', '2022-09-05 14:55:30'),
(50, 'Denmark', 3, 3, '2022-09-05 14:55:38', '2022-09-05 14:55:38'),
(51, 'Djibouti', 3, 3, '2022-09-05 14:56:03', '2022-09-05 14:56:03'),
(52, 'Dominica', 3, 3, '2022-09-05 14:56:16', '2022-09-05 14:56:16'),
(53, 'Dominican Republic', 3, 3, '2022-09-05 14:56:28', '2022-09-05 14:56:28'),
(54, 'Ecuador', 3, 3, '2022-09-05 14:56:39', '2022-09-05 14:56:39'),
(55, 'Egypt', 3, 3, '2022-09-05 14:56:48', '2022-09-05 14:56:48'),
(56, 'El savador', 3, 3, '2022-09-05 14:56:57', '2022-09-05 14:56:57'),
(57, 'Equatorial Guinea', 3, 3, '2022-09-05 14:57:36', '2022-09-05 14:57:36'),
(58, 'Eritrea', 3, 3, '2022-09-05 14:57:51', '2022-09-05 14:57:51'),
(59, 'Estonia', 3, 3, '2022-09-05 14:57:58', '2022-09-05 14:57:58'),
(60, 'Eswatini (fmr. Swaziland)', 3, 3, '2022-09-05 14:58:31', '2022-09-05 14:58:31'),
(61, 'Ethiopia', 3, 3, '2022-09-05 14:58:41', '2022-09-05 14:58:41'),
(62, 'Fiji', 3, 3, '2022-09-05 14:58:46', '2022-09-05 14:58:46'),
(63, 'Finland', 3, 3, '2022-09-05 14:58:58', '2022-09-05 14:58:58'),
(64, 'France', 3, 3, '2022-09-05 14:59:12', '2022-09-05 14:59:12'),
(65, 'Gabon', 3, 3, '2022-09-05 14:59:19', '2022-09-05 14:59:19'),
(66, 'Gambia', 3, 3, '2022-09-05 14:59:28', '2022-09-05 14:59:28'),
(67, 'Georgia', 3, 3, '2022-09-05 14:59:37', '2022-09-05 14:59:37'),
(68, 'Germany', 3, 3, '2022-09-05 14:59:46', '2022-09-05 14:59:46'),
(69, 'Ghana', 3, 3, '2022-09-05 14:59:57', '2022-09-05 14:59:57'),
(70, 'Greece', 3, 3, '2022-09-05 15:00:02', '2022-09-05 15:00:02'),
(71, 'Grenada', 3, 3, '2022-09-05 15:00:16', '2022-09-05 15:00:16'),
(72, 'Guatemala', 3, 3, '2022-09-05 15:00:32', '2022-09-05 15:00:32'),
(73, 'Guinea', 3, 3, '2022-09-05 15:00:39', '2022-09-05 15:00:39'),
(74, 'Guinea-Bissau', 3, 3, '2022-09-05 15:00:54', '2022-09-05 15:00:54'),
(75, 'Guyana', 3, 3, '2022-09-05 15:01:03', '2022-09-05 15:01:03'),
(76, 'Haiti', 3, 3, '2022-09-05 15:01:09', '2022-09-05 15:01:09'),
(77, 'Holy See', 3, 3, '2022-09-05 15:02:00', '2022-09-05 15:02:00'),
(78, 'Honduras', 3, 3, '2022-09-05 15:02:20', '2022-09-05 15:02:20'),
(79, 'Hungary', 3, 3, '2022-09-05 15:02:29', '2022-09-05 15:02:29'),
(80, 'Iceland', 3, 3, '2022-09-05 15:02:38', '2022-09-05 15:02:38'),
(81, 'India', 3, 3, '2022-09-05 15:02:48', '2022-09-05 15:02:48'),
(82, 'Indonesia', 3, 3, '2022-09-05 15:02:56', '2022-09-05 15:02:56'),
(83, 'Iran', 3, 3, '2022-09-05 15:03:03', '2022-09-05 15:03:03'),
(84, 'Iraq', 3, 3, '2022-09-05 15:03:09', '2022-09-05 15:03:09'),
(85, 'Ireland', 3, 3, '2022-09-05 15:03:18', '2022-09-05 15:03:18'),
(86, 'Isreal', 3, 3, '2022-09-05 15:03:31', '2022-09-05 15:03:31'),
(87, 'Italy', 3, 3, '2022-09-05 15:03:37', '2022-09-05 15:03:37'),
(88, 'Jamaica', 3, 3, '2022-09-05 15:03:46', '2022-09-05 15:03:46'),
(89, 'Japan', 3, 3, '2022-09-05 15:03:54', '2022-09-05 15:03:54'),
(90, 'Jordan', 3, 3, '2022-09-05 15:04:02', '2022-09-05 15:04:02'),
(91, 'Kazakhstan', 3, 3, '2022-09-05 15:04:26', '2022-09-05 15:04:26'),
(92, 'Kenya', 3, 3, '2022-09-05 15:04:33', '2022-09-05 15:04:33'),
(93, 'Kiribati', 3, 3, '2022-09-05 15:04:45', '2022-09-05 15:04:45'),
(94, 'Kuwait', 3, 3, '2022-09-05 15:04:58', '2022-09-05 15:04:58'),
(95, 'Kyrgyzstan', 3, 3, '2022-09-05 15:05:25', '2022-09-05 15:05:25'),
(96, 'Laos', 3, 3, '2022-09-05 15:05:33', '2022-09-05 15:05:33'),
(97, 'Latvia', 3, 3, '2022-09-05 15:05:43', '2022-09-05 15:05:43'),
(98, 'Lebanon', 3, 3, '2022-09-05 15:05:53', '2022-09-05 15:05:53'),
(99, 'Lesotho', 3, 3, '2022-09-05 15:06:07', '2022-09-05 15:06:07'),
(100, 'Liberia', 3, 3, '2022-09-05 15:06:15', '2022-09-05 15:06:15'),
(101, 'Libya', 3, 3, '2022-09-05 15:06:22', '2022-09-05 15:06:22'),
(102, 'Liechtenstein', 3, 3, '2022-09-05 15:06:50', '2022-09-05 15:06:50'),
(103, 'Lithuania', 3, 3, '2022-09-05 15:07:03', '2022-09-05 15:07:03'),
(104, 'Luxembourg', 3, 3, '2022-09-05 15:07:25', '2022-09-05 15:07:25'),
(105, 'Madagascar', 3, 3, '2022-09-05 15:07:38', '2022-09-05 15:07:38'),
(106, 'Malawi', 3, 3, '2022-09-05 15:07:46', '2022-09-05 15:07:46'),
(107, 'Malaysia', 3, 3, '2022-09-05 15:07:59', '2022-09-05 15:07:59'),
(108, 'Maldives', 3, 3, '2022-09-05 15:08:14', '2022-09-05 15:08:14'),
(109, 'Mali', 3, 3, '2022-09-05 15:08:20', '2022-09-05 15:08:20'),
(110, 'Malta', 3, 3, '2022-09-05 15:08:28', '2022-09-05 15:08:28'),
(111, 'Marshall Islands', 3, 3, '2022-09-05 15:08:43', '2022-09-05 15:08:43'),
(112, 'Mauritania', 3, 3, '2022-09-05 15:09:01', '2022-09-05 15:09:01'),
(113, 'Mauritius', 3, 3, '2022-09-05 15:09:14', '2022-09-05 15:09:14'),
(114, 'Mexico', 3, 3, '2022-09-05 15:09:24', '2022-09-05 15:09:24'),
(115, 'Micronesia', 3, 3, '2022-09-05 15:09:37', '2022-09-05 15:09:37'),
(116, 'Moldova', 3, 3, '2022-09-05 15:09:43', '2022-09-05 15:09:43'),
(117, 'Monaco', 3, 3, '2022-09-05 15:09:52', '2022-09-05 15:09:52'),
(118, 'Mongolia', 3, 3, '2022-09-05 15:10:00', '2022-09-05 15:10:00'),
(119, 'Montenegro', 3, 3, '2022-09-05 15:10:16', '2022-09-05 15:10:16'),
(120, 'Morocco', 3, 3, '2022-09-05 15:10:25', '2022-09-05 15:10:25'),
(121, 'Mozambique', 3, 3, '2022-09-05 15:10:37', '2022-09-05 15:10:37'),
(122, 'Myanmar (formerly Burma)', 3, 3, '2022-09-05 15:11:31', '2022-09-05 15:11:31'),
(123, 'Namibia', 3, 3, '2022-09-05 15:11:43', '2022-09-05 15:11:43'),
(124, 'Nauru', 3, 3, '2022-09-05 15:11:53', '2022-09-05 15:11:53'),
(125, 'Nepal', 3, 3, '2022-09-05 15:12:00', '2022-09-05 15:12:00'),
(126, 'Netherlands', 3, 3, '2022-09-05 15:12:11', '2022-09-05 15:12:11'),
(127, 'New Zealand', 3, 3, '2022-09-05 15:12:24', '2022-09-05 15:12:24'),
(128, 'Nicaragua', 3, 3, '2022-09-05 15:12:36', '2022-09-05 15:12:36'),
(129, 'Niger', 3, 3, '2022-09-05 15:12:47', '2022-09-05 15:12:47'),
(130, 'Nigeria', 3, 3, '2022-09-05 15:12:53', '2022-09-05 15:12:53'),
(131, 'North Korea', 3, 3, '2022-09-05 15:13:08', '2022-09-05 15:13:08'),
(132, 'North Macedonia', 3, 3, '2022-09-05 15:13:28', '2022-09-05 15:13:28'),
(133, 'Norway', 3, 3, '2022-09-05 15:13:37', '2022-09-05 15:13:37'),
(134, 'Oman', 3, 3, '2022-09-05 15:13:43', '2022-09-05 15:13:43'),
(135, 'Pakistan', 3, 3, '2022-09-05 15:13:51', '2022-09-05 15:13:51'),
(136, 'Palau', 3, 3, '2022-09-05 15:14:00', '2022-09-05 15:14:00'),
(137, 'Palestine State', 3, 3, '2022-09-05 15:14:20', '2022-09-05 15:14:20'),
(138, 'Panama', 3, 3, '2022-09-05 15:14:27', '2022-09-05 15:14:27'),
(139, 'Papua New Guinea', 3, 3, '2022-09-05 15:14:50', '2022-09-05 15:14:50'),
(140, 'Paraguay', 3, 3, '2022-09-05 15:15:04', '2022-09-05 15:15:04'),
(141, 'Peru', 3, 3, '2022-09-05 15:15:10', '2022-09-05 15:15:10'),
(142, 'Philippines', 3, 3, '2022-09-05 15:15:25', '2022-09-05 15:15:25'),
(143, 'Poland', 3, 3, '2022-09-05 15:15:36', '2022-09-05 15:15:36'),
(144, 'Portugal', 3, 3, '2022-09-05 15:15:43', '2022-09-05 15:15:43'),
(145, 'Qatar', 3, 3, '2022-09-05 15:15:58', '2022-09-05 15:15:58'),
(146, 'Romania', 3, 3, '2022-09-05 15:16:07', '2022-09-05 15:16:07'),
(147, 'Russia', 3, 3, '2022-09-05 15:16:16', '2022-09-05 15:16:16'),
(148, 'Rwanda', 3, 3, '2022-09-05 15:16:25', '2022-09-05 15:16:25'),
(149, 'Saint Kitts and Nevis', 3, 3, '2022-09-05 15:16:57', '2022-09-05 15:16:57'),
(150, 'Saint Lucia', 3, 3, '2022-09-05 15:17:06', '2022-09-05 15:17:06'),
(151, 'Saint Vincent and the Grenadines', 3, 3, '2022-09-05 15:17:34', '2022-09-05 15:17:34'),
(152, 'Samoa', 3, 3, '2022-09-05 15:17:42', '2022-09-05 15:17:42'),
(153, 'San Marino', 3, 3, '2022-09-05 15:17:54', '2022-09-05 15:17:54'),
(154, 'Sao Tome and Principe', 3, 3, '2022-09-05 15:18:24', '2022-09-05 15:18:24'),
(155, 'Saudi Arabia', 3, 3, '2022-09-05 15:18:43', '2022-09-05 15:18:43'),
(156, 'Senegal', 3, 3, '2022-09-05 15:18:59', '2022-09-05 15:18:59'),
(157, 'Serbia', 3, 3, '2022-09-05 15:19:10', '2022-09-05 15:19:10'),
(158, 'Seychelles', 3, 3, '2022-09-05 15:19:22', '2022-09-05 15:19:22'),
(159, 'Sierra Leone', 3, 3, '2022-09-05 15:19:39', '2022-09-05 15:19:39'),
(160, 'Singapore', 3, 3, '2022-09-05 15:19:51', '2022-09-05 15:19:51'),
(161, 'Slovakia', 3, 3, '2022-09-05 15:19:59', '2022-09-05 15:19:59'),
(162, 'Slovenia', 3, 3, '2022-09-05 15:20:09', '2022-09-05 15:20:09'),
(163, 'Solomon Islands', 3, 3, '2022-09-05 15:20:26', '2022-09-05 15:20:26'),
(164, 'Somalia', 3, 3, '2022-09-05 15:20:35', '2022-09-05 15:20:35'),
(165, 'South Korea', 3, 3, '2022-09-05 15:20:49', '2022-09-05 15:20:49'),
(166, 'South Korea', 3, 3, '2022-09-05 15:22:22', '2022-09-05 15:22:22'),
(167, 'South Sudan', 3, 3, '2022-09-05 15:22:43', '2022-09-05 15:22:43'),
(168, 'Spain', 3, 3, '2022-09-05 15:23:42', '2022-09-05 15:23:42'),
(169, 'Sri Lanka', 3, 3, '2022-09-05 15:25:15', '2022-09-05 15:25:15'),
(170, 'Sudan', 3, 3, '2022-09-05 15:25:27', '2022-09-05 15:25:27'),
(171, 'Suriname', 3, 3, '2022-09-05 15:25:47', '2022-09-05 15:25:47'),
(172, 'Sweden', 3, 3, '2022-09-05 15:26:01', '2022-09-05 15:26:01'),
(173, 'Switzerland', 3, 3, '2022-09-05 15:26:18', '2022-09-05 15:26:18'),
(174, 'Syria', 3, 3, '2022-09-05 15:26:27', '2022-09-05 15:26:27'),
(175, 'Tajikistan', 3, 3, '2022-09-05 15:26:48', '2022-09-05 15:26:48'),
(176, 'Tanzania', 3, 3, '2022-09-05 15:27:11', '2022-09-05 15:27:11'),
(177, 'Thailand', 3, 3, '2022-09-05 15:27:22', '2022-09-05 15:27:22'),
(178, 'Timor-Leste', 3, 3, '2022-09-05 15:28:10', '2022-09-05 15:28:10'),
(179, 'Togo', 3, 3, '2022-09-05 15:28:18', '2022-09-05 15:28:18'),
(180, 'Tonga', 3, 3, '2022-09-05 15:28:27', '2022-09-05 15:28:27'),
(181, 'Trinidad and Tobago', 3, 3, '2022-09-05 15:29:04', '2022-09-05 15:29:04'),
(182, 'Tunisia', 3, 3, '2022-09-05 15:29:13', '2022-09-05 15:29:13'),
(183, 'Turkey', 3, 3, '2022-09-05 15:29:25', '2022-09-05 15:29:25'),
(184, 'Turkmenistan', 3, 3, '2022-09-05 15:29:39', '2022-09-05 15:29:39'),
(185, 'Tuvalu', 3, 3, '2022-09-05 15:29:52', '2022-09-05 15:29:52'),
(186, 'Uganda', 3, 3, '2022-09-05 15:30:00', '2022-09-05 15:30:00'),
(187, 'Ukraine', 3, 3, '2022-09-05 15:30:11', '2022-09-05 15:30:11'),
(188, 'United Arab Emirates', 3, 3, '2022-09-05 15:30:36', '2022-09-05 15:30:36'),
(189, 'United Kingdom', 3, 3, '2022-09-05 15:30:53', '2022-09-05 15:30:53'),
(190, 'United States of America', 3, 3, '2022-09-05 15:31:16', '2022-09-05 15:31:16'),
(191, 'Uruguay', 3, 3, '2022-09-05 15:31:26', '2022-09-05 15:31:26'),
(192, 'Uzbekistan', 3, 3, '2022-09-05 15:31:44', '2022-09-05 15:31:44'),
(193, 'Vanuatu', 3, 3, '2022-09-05 15:32:00', '2022-09-05 15:32:00'),
(194, 'Venezuela', 3, 3, '2022-09-05 15:32:10', '2022-09-05 15:32:10'),
(195, 'Vietnam', 3, 3, '2022-09-05 15:32:19', '2022-09-05 15:32:19'),
(196, 'Yemen', 3, 3, '2022-09-05 15:32:24', '2022-09-05 15:32:24'),
(197, 'Zambia', 3, 3, '2022-09-05 15:32:37', '2022-09-05 15:32:37'),
(198, 'Zimbabwe', 3, 3, '2022-09-05 15:32:50', '2022-09-05 15:32:50');

-- --------------------------------------------------------

--
-- Table structure for table `deleted_users`
--

CREATE TABLE `deleted_users` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `phone` varchar(16) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country` tinyint(3) UNSIGNED DEFAULT NULL,
  `unsubscribed` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `unsubscribed_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deleted_users`
--

INSERT INTO `deleted_users` (`id`, `user_id`, `first_name`, `last_name`, `email`, `gender`, `phone`, `website`, `birthdate`, `address`, `city`, `state`, `country`, `unsubscribed`, `unsubscribed_date`, `created_at`) VALUES
(1, 0, 'my', 'php', 'myphptestemail@gmail.com', 'M', '', '', '0000-00-00', '', '', '', 0, 0, NULL, '2022-07-30 10:26:44'),
(2, 0, 'my', 'php', 'myphptestemail@gmail.com', 'M', '', '', '0000-00-00', '', '', '', 0, 0, NULL, '2022-07-30 10:45:46'),
(3, 0, 'my', 'php', 'myphptestemail@gmail.com', 'M', '', '', '0000-00-00', '', '', '', 0, 0, NULL, '2022-07-31 14:42:10'),
(4, 0, 'my', 'php', 'myphptestemail@gmail.com', 'M', '', '', '0000-00-00', '', '', '', 0, 0, NULL, '2022-07-31 14:47:33'),
(5, 0, 'Andrew', 'Adelodun', 'andrewadelodun@gmail.com', 'M', '', NULL, '0000-00-00', '', '', '', 0, 0, NULL, '2022-07-31 15:00:15'),
(6, 0, 'Andrew', 'Adelodun', 'andrewadelodun@gmail.com', 'M', '', '', '0000-00-00', '', '', '', 0, 0, NULL, '2022-07-31 15:10:17'),
(7, 99, 'ADELODUN', 'OLUWADAMILARE', 'andrelodun@gmail.com', 'F', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2022-09-18 16:38:54'),
(8, 97, 'ADELODUN', 'OLUWADAMILARE', 'andrewadel@gmail.com', 'M', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2022-09-18 16:45:03'),
(9, 127, 'my', 'php', 'reciever@andadel.com', 'M', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2022-09-18 17:40:15'),
(10, 127, 'my', 'php', 'reciever@bwajes-plus.andadel.com', 'M', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2022-09-18 17:41:11'),
(11, 135, 'Samuel', 'Masheyi', 'samuel@andadel.com', 'M', '', '', NULL, NULL, NULL, NULL, NULL, 0, NULL, '2022-10-05 16:43:54'),
(12, 136, 'Samuel', 'Masheyi', 'samuel@andadel.com', 'M', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2022-10-05 17:48:02'),
(13, 136, 'Samuel', 'Masheyi', 'samuel@andadel.com', 'M', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2022-10-05 19:40:48'),
(14, 136, 'Samuel', 'Masheyi', 'samuel@andadel.com', 'M', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2022-10-05 19:41:26'),
(15, 136, 'Samuel', 'Masheyi', 'samuel@andadel.com', 'M', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2022-10-05 19:41:39'),
(16, 136, 'Samuel', 'Masheyi', 'samuel@andadel.com', 'M', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2022-10-05 19:41:57'),
(17, 136, 'Samuel', 'Masheyi', 'samuel@andadel.com', 'M', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2022-10-05 19:42:28'),
(18, 136, 'Samuel', 'Masheyi', 'samuel@andadel.com', 'M', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2022-10-05 19:44:23');

-- --------------------------------------------------------

--
-- Table structure for table `email_list`
--

CREATE TABLE `email_list` (
  `id` int(11) UNSIGNED NOT NULL,
  `first_name` varchar(30) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `source` tinyint(1) NOT NULL DEFAULT 2,
  `unsubscribed` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `unsubscribed_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `email_list`
--

INSERT INTO `email_list` (`id`, `first_name`, `email`, `source`, `unsubscribed`, `unsubscribed_date`, `created_at`, `updated_at`) VALUES
(122, 'ADELODUN', 'reciever@bwajes-plus.andadel.com', 1, 0, NULL, '2022-09-12 14:22:09', '2022-09-12 14:22:09'),
(136, 'Bello', 'bello@gmail.com', 3, 0, NULL, '2022-09-25 12:12:25', '2022-09-25 12:12:25'),
(143, 'user', 'reciever@andadel.com', 1, 0, NULL, '2022-09-30 13:57:42', '2022-09-30 13:57:42');

-- --------------------------------------------------------

--
-- Table structure for table `email_list_source`
--

CREATE TABLE `email_list_source` (
  `id` tinyint(1) NOT NULL,
  `source` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `email_list_source`
--

INSERT INTO `email_list_source` (`id`, `source`, `created_at`, `updated_at`) VALUES
(1, 'Registered user', '2022-05-25 13:07:28', '2022-05-25 13:07:28'),
(2, 'Subscriber', '2022-05-25 13:07:28', '2022-05-25 13:07:28'),
(3, 'Commenter', '2022-05-25 13:07:28', '2022-05-25 13:07:28'),
(4, 'Feedback/Issue', '2022-09-15 15:34:52', '2022-09-15 15:34:52');

-- --------------------------------------------------------

--
-- Table structure for table `email_tracking`
--

CREATE TABLE `email_tracking` (
  `id` int(11) UNSIGNED NOT NULL,
  `admin_sent_emails_id` int(11) UNSIGNED NOT NULL,
  `sent_to_email` varchar(255) NOT NULL,
  `email_track_code` varchar(255) NOT NULL,
  `email_status` tinyint(1) NOT NULL DEFAULT 0,
  `date_recieved` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_opened` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `email_tracking`
--

INSERT INTO `email_tracking` (`id`, `admin_sent_emails_id`, `sent_to_email`, `email_track_code`, `email_status`, `date_recieved`, `date_opened`) VALUES
(1, 10, 'andrewadelodun@gmail.com', '3068f7b39699855ae689905e331e2304', 1, '2022-09-06 19:11:56', '2022-09-12 14:05:33'),
(2, 10, 'jide@gmail.com', '454fdgfgfhffs', 0, '2022-09-06 20:44:51', NULL),
(3, 11, 'andrewadelodun@gmail.com', 'dfr4546565fgbcvxv', 1, '2022-09-06 20:45:20', '2022-09-14 10:04:07'),
(4, 11, 'jide@gmail.com', 'fdfz34354ccc45454', 1, '2022-09-06 20:45:46', '2022-09-13 10:03:46'),
(5, 6, 'andrewadelodun@gmail.com', 'sdsd678ssfsfd', 0, '2022-09-07 20:00:27', NULL),
(6, 11, 'andrewadelodun@gmail.com', 'dfdf4r4rdvdfd', 0, '2022-09-07 20:57:27', NULL),
(7, 41, 'who@gmail.com', 'bc8bda1115ef8f0d3fd511058faf8aee', 0, '2022-09-12 17:41:56', NULL),
(8, 42, 'andrelodun@gmail.com', '866d2802ca46d0d1aff0f1da439c16d7', 0, '2022-09-12 17:41:59', NULL),
(9, 43, 'andrewadelun@gmail.com', '54069250a505a13f9970caab40c8dbc8', 0, '2022-09-12 17:42:02', NULL),
(10, 44, 'andrewadelodun001@gmail.com', 'bac742c0468af0689523e22adea3d42b', 0, '2022-09-12 17:42:05', NULL),
(11, 45, 'andrewadelodun@gmail.com', '80ba1e8de1e11d9b59929671df92a9f9', 0, '2022-09-12 17:42:08', NULL),
(12, 46, 'andrew12adelodun@gmail.com', '406c592c6256c7f4caab36f4ba7edfc5', 0, '2022-09-12 17:42:11', NULL),
(13, 47, 'reciever@bwajes-plus.andadel.com', 'ce3d8f10a26c9ff99dbe2c2fdfb01ffb', 0, '2022-09-12 17:42:15', NULL),
(14, 48, 'who@gmail.com', '59406c6d2e66284b2c3541d4f8935788', 0, '2022-09-12 17:57:30', NULL),
(15, 49, 'who@gmail.com', '38a4b48623a1d8c10e2e6bfccf34fc5c', 0, '2022-09-12 18:00:20', NULL),
(16, 50, 'andrelodun@gmail.com', '72a5d250cb121b906b9370c5eaa39b28', 0, '2022-09-12 18:00:24', NULL),
(17, 51, 'andrewadelun@gmail.com', 'cf84ebf5f53691ebce2c647a8b981343', 0, '2022-09-12 18:00:27', NULL),
(18, 52, 'andrewadelodun001@gmail.com', '04bf2c9645b844f7ac2b8dd6b9f6c334', 0, '2022-09-12 18:00:31', NULL),
(19, 53, 'andrewadelodun@gmail.com', 'e44fdcac36b66ff5f269a8e8d099a176', 0, '2022-09-12 18:00:34', NULL),
(20, 54, 'andrew12adelodun@gmail.com', '0b9e9b68149de35a4958ccd8eb1c3f02', 0, '2022-09-12 18:00:37', NULL),
(21, 55, 'reciever@bwajes-plus.andadel.com', '1e74797f633cf5216085c42ed0cba017', 0, '2022-09-12 18:00:41', NULL),
(22, 72, 'who@gmail.com', 'b32770893c5f51e987b864264e494dee', 0, '2022-09-13 10:50:29', NULL),
(23, 72, 'andrelodun@gmail.com', 'f848c8cd081a35935113b74f35f854fd', 0, '2022-09-13 10:50:32', NULL),
(24, 72, 'andrewadelun@gmail.com', 'dca2cb41d60e5688d55aef8c792d8b53', 0, '2022-09-13 10:50:35', NULL),
(25, 72, 'andrewadelodun001@gmail.com', '6fe00ae9e518c03292b9af9b73b1d8b2', 0, '2022-09-13 10:50:37', NULL),
(26, 72, 'andrewadelodun@gmail.com', 'b3d5fcbf35f3591807892723b3ede49b', 0, '2022-09-13 10:50:40', NULL),
(27, 72, 'andrew12adelodun@gmail.com', 'a1007cc587e25ed620fb4d9e05ee1aef', 0, '2022-09-13 10:50:43', NULL),
(28, 72, 'reciever@bwajes-plus.andadel.com', '87bd74fc8ef983e46c5ed17aa75d2858', 0, '2022-09-13 10:50:48', NULL),
(29, 73, 'who@gmail.com', '83e2cf6944d60bcbd0efa8f31190b232', 0, '2022-09-13 10:59:39', NULL),
(30, 73, 'andrelodun@gmail.com', 'c4bdcb823cd198af3bbce05ae9101ccd', 0, '2022-09-13 10:59:42', NULL),
(31, 73, 'andrewadelun@gmail.com', 'e5fb1b7a7d011d02275d451a15a92b0c', 0, '2022-09-13 10:59:45', NULL),
(32, 73, 'andrewadelodun001@gmail.com', 'e500546de02d62c52b020fd479ed94dc', 0, '2022-09-13 10:59:47', NULL),
(33, 73, 'andrewadelodun@gmail.com', '479c7f942e2fdfde0188f03c6baffc2a', 0, '2022-09-13 10:59:49', NULL),
(34, 73, 'andrew12adelodun@gmail.com', 'd9466e03cbbc0b39845d35e40f58451c', 0, '2022-09-13 10:59:52', NULL),
(35, 73, 'reciever@bwajes-plus.andadel.com', '51098b050b03bb276bd0ca4256d9016f', 0, '2022-09-13 10:59:55', NULL),
(36, 74, 'who@gmail.com', '6e06b5b7ac6de9d585ab1703535e2f79', 0, '2022-09-13 11:11:31', NULL),
(37, 74, 'andrelodun@gmail.com', '6e06b5b7ac6de9d585ab1703535e2f79', 0, '2022-09-13 11:11:33', NULL),
(38, 74, 'andrewadelun@gmail.com', '6e06b5b7ac6de9d585ab1703535e2f79', 0, '2022-09-13 11:11:36', NULL),
(39, 74, 'andrewadelodun001@gmail.com', '6e06b5b7ac6de9d585ab1703535e2f79', 0, '2022-09-13 11:11:38', NULL),
(40, 74, 'andrewadelodun@gmail.com', '6e06b5b7ac6de9d585ab1703535e2f79', 0, '2022-09-13 11:11:40', NULL),
(41, 74, 'andrew12adelodun@gmail.com', '6e06b5b7ac6de9d585ab1703535e2f79', 0, '2022-09-13 11:11:43', NULL),
(42, 74, 'reciever@bwajes-plus.andadel.com', '6e06b5b7ac6de9d585ab1703535e2f79', 0, '2022-09-13 11:11:45', NULL),
(43, 75, 'andrelodun@gmail.com', '17b03a062f4e8a727f9a6e4d60a13041', 0, '2022-09-14 13:56:57', NULL),
(44, 75, 'andrewadelun@gmail.com', '27db69f3df2df5b1cc0c5bf922c27e6b', 0, '2022-09-14 13:57:02', NULL),
(45, 75, 'andrewadelodun001@gmail.com', '14d0b1a8db6c88735e62f49bf29148f6', 0, '2022-09-14 13:57:05', NULL),
(46, 75, 'andrewadelodun@gmail.com', 'dea3f868a99ec7ec11554d12c1737c14', 0, '2022-09-14 13:57:08', NULL),
(47, 75, 'andrew12adelodun@gmail.com', '8717a813f048da938eff7277a840dea6', 0, '2022-09-14 13:57:11', NULL),
(48, 75, 'reciever@bwajes-plus.andadel.com', 'aad0feb72b730f67a8fb49d8aa9b4c81', 1, '2022-09-14 13:57:14', '2022-09-14 14:14:33'),
(49, 77, 'andrelodun@gmail.com', '5b916f1de5fadf41fff018fa66bcbb07', 0, '2022-09-14 14:11:04', NULL),
(50, 77, 'andrewadelun@gmail.com', '552755eff2fc84b6a24c283b0bc0668e', 0, '2022-09-14 14:11:07', NULL),
(51, 77, 'andrewadelodun001@gmail.com', 'e8bfebd97aa0319553f0b591a91b7edb', 0, '2022-09-14 14:11:10', NULL),
(52, 77, 'andrewadelodun@gmail.com', '34c2281414acabd0966ca5c7ec299e5c', 0, '2022-09-14 14:11:13', NULL),
(53, 77, 'andrew12adelodun@gmail.com', '18b06f5903644a9c28ba85142c4d2eed', 0, '2022-09-14 14:11:17', NULL),
(54, 77, 'reciever@bwajes-plus.andadel.com', '00f5ac8305b50dd9bec084a4cfaee2e8', 1, '2022-09-14 14:11:19', '2022-09-14 14:18:10'),
(55, 78, 'andrelodun@gmail.com', 'f349a89fcf893b1f73ce4f4c65b9eb97', 0, '2022-09-14 14:15:16', NULL),
(56, 78, 'andrewadelun@gmail.com', '783535928519132526a52db6ce7c8d2b', 0, '2022-09-14 14:15:19', NULL),
(57, 78, 'andrewadelodun001@gmail.com', '9a376eba17590aa9f3329a59459a9f38', 0, '2022-09-14 14:15:22', NULL),
(58, 78, 'andrewadelodun@gmail.com', 'e6b0dacd8f036aa98dcca64c791ebb07', 0, '2022-09-14 14:15:26', NULL),
(59, 78, 'andrew12adelodun@gmail.com', '73c093df9bbda2afeaf975bd2ec368d7', 0, '2022-09-14 14:15:29', NULL),
(60, 78, 'reciever@bwajes-plus.andadel.com', '8e170813032f9ad634fec0e31c6bbb23', 1, '2022-09-14 14:15:36', '2022-09-14 14:20:21'),
(61, 79, 'andrelodun@gmail.com', '4cd062429182b3d63cb0638cc052ef0d', 0, '2022-09-14 14:40:13', NULL),
(62, 79, 'andrewadelun@gmail.com', 'deb38c040dad6d1afdfdc4a96723f099', 0, '2022-09-14 14:40:16', NULL),
(63, 79, 'andrewadelodun001@gmail.com', 'bef0912a673debe95a6d67441f85fe85', 0, '2022-09-14 14:40:20', NULL),
(64, 79, 'andrewadelodun@gmail.com', '317f2bc1785cb7a11a5a29480c5d035d', 0, '2022-09-14 14:40:24', NULL),
(65, 79, 'andrew12adelodun@gmail.com', '30cd8145682cdc5dd34c52a43206a2be', 0, '2022-09-14 14:40:27', NULL),
(66, 79, 'reciever@bwajes-plus.andadel.com', 'af6acabb478659bd82a6083688b01228', 0, '2022-09-14 14:40:29', NULL),
(67, 80, 'andrelodun@gmail.com', '5a28bec546242c9e7e0ebf3c8aa09deb', 0, '2022-09-14 14:44:13', NULL),
(68, 80, 'andrewadelun@gmail.com', '237093138060dc7916d9d160a4a562e2', 0, '2022-09-14 14:44:15', NULL),
(69, 80, 'andrewadelodun001@gmail.com', '5e2c715ab438435f00dbd994224cb957', 0, '2022-09-14 14:44:18', NULL),
(70, 80, 'andrewadelodun@gmail.com', 'a2ce6492b95b88a22841013e63b9632e', 0, '2022-09-14 14:44:21', NULL),
(71, 80, 'andrew12adelodun@gmail.com', '3a5db2afdda1a801fd5f4c2c5eb9624d', 0, '2022-09-14 14:44:24', NULL),
(72, 80, 'reciever@bwajes-plus.andadel.com', 'a7c912d84a452458dbf2779705be9862', 1, '2022-09-14 14:44:27', '2022-09-14 14:44:54'),
(73, 85, 'sb-u75sf6477041@personal.example.com', '73d00e44492873a843f0354e773c1492', 0, '2022-09-17 13:13:07', NULL),
(74, 85, 'reciever@bwajes-plus.andadel.com', '4a21455e972f45fed8f630df35a1e6e7', 1, '2022-09-17 13:13:09', '2022-09-17 13:30:06'),
(75, 86, 'myphptestemail@gmail.com', '2ade6a6f0ca66d22dfb36a0986918235', 0, '2022-09-18 18:01:56', NULL),
(76, 86, 'andrelodun@gmail.com', '1492ff3279e672dac30ed36faf41690d', 0, '2022-09-18 18:01:59', NULL),
(77, 86, 'andrewadel@gmail.com', '342fa11e732536c99be758f00d4fb1e4', 0, '2022-09-18 18:02:01', NULL),
(78, 86, 'reciever@andadel.com', '10c5d3fa2f72ed05b57814d014e6e200', 1, '2022-09-18 18:02:04', '2022-09-18 18:03:04'),
(79, 87, 'sb-u75sf6477041@personal.example.com', '40b5831915dde2aef7035abb0b4edccb', 0, '2022-09-18 20:07:27', NULL),
(80, 88, 'sb-u75sf6477041@personal.example.com', 'abfce634c63a1aa1fafbf7a6f3b878d3', 0, '2022-09-18 20:19:42', NULL),
(81, 88, 'reciever@bwajes-plus.andadel.com', '39f5c0841d0028501a466eb53dad8b2b', 1, '2022-09-18 20:19:44', '2022-10-05 17:30:44'),
(82, 92, 'sb-u75sf6477041@personal.example.com', '94bf766d0fd6482ef892284b2bc22159', 0, '2022-09-19 07:00:10', NULL),
(83, 92, 'reciever@bwajes-plus.andadel.com', 'b482ff5bbecb76898c66456308224a02', 1, '2022-09-19 07:00:13', '2022-09-19 07:00:30'),
(84, 93, 'sb-u75sf6477041@personal.example.com', 'fb0ca72aa28c1681fb69b37537663c91', 0, '2022-09-19 07:05:46', NULL),
(85, 94, 'reciever@bwajes-plus.andadel.com', 'f0386712bc5e2b97fed0b41524ca4a8a', 1, '2022-09-19 07:07:17', '2022-09-19 07:14:43'),
(86, 95, 'andrewadelodun001@gmail.com', '2e58466bb08e7ee8c5433a9820fba285', 0, '2022-09-19 07:07:53', NULL),
(87, 95, 'andrewadelodun@gmail.com', '0005889a0357b9c41a28ed68a6fef517', 0, '2022-09-19 07:07:56', NULL),
(88, 95, 'andrew12adelodun@gmail.com', 'f7f742b83b9fdcc5698fd227104cedcb', 0, '2022-09-19 07:07:59', NULL),
(89, 95, 'reciever@bwajes-plus.andadel.com', 'cf6e29e092f4b1d0f9bf967772fb703c', 1, '2022-09-19 07:08:01', '2022-09-19 07:23:47'),
(90, 98, 'okpe@gmail.com', 'e3ebc336d4f9034dab698cfe9210bc63', 0, '2022-09-19 07:14:13', NULL),
(91, 99, 'adelodun@gmail.com', '4eef659b008f182c54ad9b4a3d1a5432', 0, '2022-09-19 07:15:49', NULL),
(92, 99, 'andrewadel@gmail.com', '78d08b489f1720f28f3b510da7ebde1f', 0, '2022-09-19 07:15:51', NULL),
(93, 99, 'who@gmail.com', '02a7221c3ede03912531a9d688aaca10', 0, '2022-09-19 07:15:54', NULL),
(94, 99, 'andrewadelodun@gmail.com', '6b9c1c384acb797e9b6eaf5657f0c244', 0, '2022-09-19 07:15:56', NULL),
(95, 99, 'andrewadelodun@gmail.com', '831e2a27489c324a14d2b11d4339eedb', 0, '2022-09-19 07:15:58', NULL),
(96, 99, 'andrewadelodun001@gmail.com', 'ea1d1b317147b2556e64c3eb0a69fcac', 0, '2022-09-19 07:16:01', NULL),
(97, 99, 'andrewadelun@gmail.com', '24ebbd58c4425e65aa620fa7c255a177', 0, '2022-09-19 07:16:03', NULL),
(98, 99, 'myphptestemail@gmail.com', '4b5c31104543539cc5c6e391900a1c90', 0, '2022-09-19 07:16:05', NULL),
(99, 99, 'andrew12adelodun@gmail.com', '12e895c0a93f1a6527441eb63f2c07cb', 0, '2022-09-19 07:16:07', NULL),
(100, 99, 'reciever@bwajes-plus.andadel.com', '2404a0a16c9f36f66b714cbbc7e3b128', 1, '2022-09-19 07:16:10', '2022-10-05 17:30:37'),
(101, 100, 'andrewadelodun001@gmail.com', '2fad8d2c7ad3b6613411b53a51e570f1', 0, '2022-09-19 07:16:54', NULL),
(102, 100, 'andrewadelodun@gmail.com', '5068e4dc05890836c7f85bea6bd81532', 0, '2022-09-19 07:16:57', NULL),
(103, 100, 'andrew12adelodun@gmail.com', '8502ac9b508061bd4b2909c156b1ff84', 0, '2022-09-19 07:16:59', NULL),
(104, 100, 'reciever@bwajes-plus.andadel.com', '8a69baf6b935d481bfd0df6a865e7379', 1, '2022-09-19 07:17:01', '2022-09-19 07:23:37'),
(105, 102, 'andrewadelodun@gmail.com', '99e14ff6fc41d8729c0cb4a96f42c639', 0, '2022-09-19 07:17:52', NULL),
(106, 103, 'okpe@gmail.com', '144cb41d5658b162093f519f14fa7767', 0, '2022-09-19 07:18:22', NULL),
(107, 104, 'sb-u75sf6477041@personal.example.com', '717f3d10de7110d6918c523f1482c8fc', 0, '2022-09-19 07:18:39', NULL),
(108, 104, 'reciever@bwajes-plus.andadel.com', '552240794192c5692f3005e04dbeb0d0', 1, '2022-09-19 07:18:41', '2022-09-19 07:23:41'),
(109, 105, 'sb-u75sf6477041@personal.example.com', '59b2218bf0dadb26454075493e207b5f', 0, '2022-09-19 07:19:00', NULL),
(110, 106, 'reciever@bwajes-plus.andadel.com', 'eb39f583a5c6207d90a984fc8991f41d', 1, '2022-09-19 07:19:22', '2022-09-19 07:23:45'),
(111, 108, 'myphptestemail@gmail.com', '91b3fdad26a2d8c7aa241529da9609e1', 0, '2022-09-19 07:20:14', NULL),
(112, 108, 'andrelodun@gmail.com', 'b7facec5e306b62c92c9e04063480360', 0, '2022-09-19 07:20:16', NULL),
(113, 108, 'andrewadel@gmail.com', '2a4e173068c5f8e2eafc76c526b92717', 0, '2022-09-19 07:20:19', NULL),
(114, 108, 'reciever@andadel.com', '635007640ae4b8cbb425a8e843cdf4c2', 1, '2022-09-19 07:20:21', '2022-09-26 21:23:10'),
(115, 109, 'andrewadelodun001@gmail.com', '63701e541bf256c8870b85421c6e1c7c', 0, '2022-09-30 09:50:48', NULL),
(116, 109, 'andrewadelodun@gmail.com', '3953f9322155e9bfaa8b0786d5667651', 0, '2022-09-30 09:50:50', NULL),
(117, 109, 'andrew12adelodun@gmail.com', '853ce0281c5ac015f79d1b295d100d07', 0, '2022-09-30 09:50:53', NULL),
(118, 109, 'reciever@bwajes-plus.andadel.com', 'ad3a2bf028a5cb80fb3ae6d83b35233a', 1, '2022-09-30 09:50:56', '2022-09-30 09:51:21'),
(119, 109, 'reciever@andadel.com', '53d3427664add24ffa8b0775e1524dd9', 1, '2022-09-30 09:50:58', '2022-09-30 09:51:36'),
(120, 110, 'andrewadelodun001@gmail.com', '4007ff5c2ef812d856e6c24a7a3ef570', 0, '2022-10-04 17:22:03', NULL),
(121, 110, 'andrewadelodun@gmail.com', '7b1ce441ab7175f50510be877b4a2e50', 0, '2022-10-04 17:22:06', NULL),
(122, 110, 'andrew12adelodun@gmail.com', '854d0f72dc676e82a7625bcf73d8cb46', 0, '2022-10-04 17:22:08', NULL),
(123, 110, 'reciever@bwajes-plus.andadel.com', '885cd520cbb9d5c497246edf0861102f', 1, '2022-10-04 17:22:11', '2022-10-04 17:23:25'),
(124, 110, 'dun@gmail.com', 'a16b18150fcc01808f0fc52242cc42ff', 0, '2022-10-04 17:22:14', NULL),
(125, 110, 'd@gmail.com', 'ada548035a2fe67ab18f173246a6cf59', 0, '2022-10-04 17:22:16', NULL),
(126, 110, 'duny@gmail.com', 'c186c4565648d29001ac42dc69165cf2', 0, '2022-10-04 17:22:19', NULL),
(127, 110, 'reciever@andadel.com', '186ae7ad1628d22376154dc0107e5264', 1, '2022-10-04 17:22:22', '2022-10-04 17:23:22'),
(128, 111, 'andrewadelodun001@gmail.com', '6f75bf020e25451491059cd200362ee3', 0, '2022-10-05 20:16:17', NULL),
(129, 111, 'andrewadelodun@gmail.com', '542ac384753144c5d5b86ac1ab817a56', 0, '2022-10-05 20:16:19', NULL),
(130, 111, 'andrew12adelodun@gmail.com', '06ff06e8c2745d5358b919d8a91dcc99', 0, '2022-10-05 20:16:22', NULL),
(131, 111, 'reciever@bwajes-plus.andadel.com', 'fd4584ddf41f6276a2fef9f48ccf0ac1', 0, '2022-10-05 20:16:24', NULL),
(132, 111, 'dun@gmail.com', '7a7fdf48799d720ec68db1e4bf4b352c', 0, '2022-10-05 20:16:27', NULL),
(133, 111, 'd@gmail.com', '4677eb60ae5eed4b2a54c727f11a4140', 0, '2022-10-05 20:16:30', NULL),
(134, 111, 'duny@gmail.com', 'd2a9c87f8ac9c2c2a00983bfa7935692', 0, '2022-10-05 20:16:32', NULL),
(135, 111, 'reciever@andadel.com', '6c58fbaeca0cb778a44a64b631644c3e', 1, '2022-10-05 20:16:34', '2022-10-05 20:16:52'),
(136, 111, 'samuel@andadel.com', '88158b54a396750cc9ac7e9e107967a1', 0, '2022-10-05 20:16:37', NULL),
(137, 112, 'solataiwo@gmail.com', '19b77fcb31345ddd2f91555c9eb2c3b2', 0, '2022-10-05 20:24:03', NULL),
(138, 113, 'andrewadelodun001@gmail.com', '0755b278099178b94910a73d8c2c03de', 0, '2022-10-05 20:26:59', NULL),
(139, 113, 'andrewadelodun@gmail.com', 'd18e6c962d0b3b37603abea3ff3d8e28', 0, '2022-10-05 20:27:01', NULL),
(140, 113, 'andrew12adelodun@gmail.com', '504c685af2f103533bdd27947162838e', 0, '2022-10-05 20:27:04', NULL),
(141, 113, 'reciever@bwajes-plus.andadel.com', '32597feb716e0d6c053e2905f78dd3a8', 1, '2022-10-05 20:27:06', '2022-10-05 20:27:15'),
(142, 113, 'dun@gmail.com', '318b8ca696afd88a90c4e46e27ffeb9b', 0, '2022-10-05 20:27:09', NULL),
(143, 113, 'd@gmail.com', 'a349a22ebcce7582f2f6b000bccdb762', 0, '2022-10-05 20:27:11', NULL),
(144, 113, 'duny@gmail.com', '7b2e977c18f0db480cf67f0743a03c1a', 0, '2022-10-05 20:27:14', NULL),
(145, 113, 'reciever@andadel.com', 'a9cb85f3b26ac6204d4b75789132c317', 0, '2022-10-05 20:27:16', NULL),
(146, 113, 'samuel@andadel.com', 'caacd2eee4b4b99a72fc298cfb8e9cfb', 0, '2022-10-05 20:27:22', NULL),
(147, 114, 'andrewadelodun001@gmail.com', 'f4ea1147b0c97be55919d2c349f6e91c', 0, '2022-10-05 20:31:21', NULL),
(148, 114, 'andrewadelodun@gmail.com', 'c8142c9e18ca0ef77c633f8e13235036', 0, '2022-10-05 20:31:24', NULL),
(149, 114, 'andrew12adelodun@gmail.com', '15669fc0b9365fc14bb95ef7c0d4a92b', 0, '2022-10-05 20:31:26', NULL),
(150, 114, 'reciever@bwajes-plus.andadel.com', 'f268a0618cf9fe621d9d693a3b810e88', 1, '2022-10-05 20:31:28', '2022-10-05 20:31:40'),
(151, 114, 'dun@gmail.com', 'ba294c5cf8bea5514309969c24b7614a', 0, '2022-10-05 20:31:31', NULL),
(152, 114, 'd@gmail.com', 'cf8cf96276e904e7bfa4b6327ceb7b82', 0, '2022-10-05 20:31:33', NULL),
(153, 114, 'duny@gmail.com', '269879182b741c6444cf85e38c1bcaa8', 0, '2022-10-05 20:31:36', NULL),
(154, 114, 'reciever@andadel.com', 'd4afb16785673c4b9d07e39f4f367b8d', 1, '2022-10-05 20:31:38', '2022-10-05 20:31:54'),
(155, 114, 'samuel@andadel.com', 'cba0ad049ab303fc165d5051c12e63cd', 1, '2022-10-05 20:31:40', '2022-10-05 20:31:59'),
(156, 115, 'andrewadelodun001@gmail.com', 'c9ff73d2019981ddfcea5610be3cd6e3', 0, '2022-10-05 20:35:28', NULL),
(157, 115, 'andrewadelodun@gmail.com', '344a60db1add2b096aac7f818fdb0175', 0, '2022-10-05 20:35:30', NULL),
(158, 115, 'andrew12adelodun@gmail.com', 'dd64694985f1da774c831ec7739e0865', 0, '2022-10-05 20:35:33', NULL),
(159, 115, 'reciever@bwajes-plus.andadel.com', 'd2993247ccbfe6798c3b80f9b031353e', 1, '2022-10-05 20:35:35', '2022-10-05 20:35:42'),
(160, 115, 'dun@gmail.com', '9bddccaf4c776bb56f0be6deea5b0494', 0, '2022-10-05 20:35:37', NULL),
(161, 115, 'd@gmail.com', 'ebcb9e4e362b4509c1b490c0af797901', 0, '2022-10-05 20:35:40', NULL),
(162, 115, 'duny@gmail.com', 'be11bfdf8882da609fe58e2331d596c5', 0, '2022-10-05 20:35:42', NULL),
(163, 115, 'reciever@andadel.com', 'cbc350307ae9dd26183d4f6a1c88c877', 1, '2022-10-05 20:35:44', '2022-10-05 20:36:06'),
(164, 115, 'samuel@andadel.com', '8306ec6293c560d09a99ece7b31d4f1e', 1, '2022-10-05 20:35:47', '2022-10-05 20:36:10'),
(165, 116, 'adelodun@gmail.com', '723bf672793f9c4e5be700d8bf9f6693', 0, '2022-10-11 12:10:55', NULL),
(166, 116, 'andrewadel@gmail.com', '2f3652b60d6d318511a625e2d5aa0a78', 0, '2022-10-11 12:10:57', NULL),
(167, 116, 'who@gmail.com', '5c068e1ae8efdb8794d4746825317fd2', 0, '2022-10-11 12:11:00', NULL),
(168, 116, 'andrewadelodun@gmail.com', '7b7dd372f8d94f88c349c3cfc2b28167', 0, '2022-10-11 12:11:02', NULL),
(169, 116, 'andrewadelodun@gmail.com', 'd94f1328049b4e36f276ba37be30cc85', 0, '2022-10-11 12:11:05', NULL),
(170, 116, 'andrewadelodun001@gmail.com', 'ed4407040eae7bedb093aa1793eca3ec', 0, '2022-10-11 12:11:07', NULL),
(171, 116, 'andrewadelun@gmail.com', '4006502c286a1150ee307ef4e843d580', 0, '2022-10-11 12:11:10', NULL),
(172, 116, 'myphptestemail@gmail.com', 'a7b5e9efbef68df73e3bb54892bd7573', 0, '2022-10-11 12:11:12', NULL),
(173, 116, 'andrew12adelodun@gmail.com', '6043ad6dc5248868f90efde3b4e5d051', 0, '2022-10-11 12:11:14', NULL),
(174, 116, 'reciever@bwajes-plus.andadel.com', '5e77b5d2f27588ca1ab9f407dfddfca5', 1, '2022-10-11 12:11:17', '2022-10-11 13:48:13'),
(175, 116, 'solataiwo@gmail.com', '2613afe67e97d91bd8870e774808555b', 0, '2022-10-11 12:11:19', NULL),
(176, 116, 'feedback@gmail.com', 'f0872e59abf25deb0848dfd0f1846d85', 0, '2022-10-11 12:11:22', NULL),
(177, 116, 'chizzy@gmail.com', '272d6606d66c421f6f9ec5049935c93b', 0, '2022-10-11 12:11:24', NULL),
(178, 116, 'andrewadelodun@gmail.com', 'ce15390dbe16055abe1e94c7900eefea', 0, '2022-10-11 12:11:27', NULL),
(179, 116, 'andrewadelodun@gmail.com', 'e93a36dd945ecf3e823b9dee950279c5', 0, '2022-10-11 12:11:29', NULL),
(180, 116, 'grace419@gmail.com', '4212d3819f0b635a216efccaf1d9daa0', 0, '2022-10-11 12:11:32', NULL),
(181, 116, 'faruq698@gmail.com', 'c34cfb73d36811d755ccbe30002b8a82', 0, '2022-10-11 12:11:34', NULL),
(182, 116, 'andrewadelodun@gmail.com', '6871133058666ff52479cafc4228cfe5', 0, '2022-10-11 12:11:37', NULL),
(183, 116, 'remin8934@gmail.com', 'ef9bee358eb05a0ecc3214d08303ece3', 0, '2022-10-11 12:11:39', NULL),
(184, 116, 'the033@gmail.com', '29e473e872bbb08296cce773c2bf6cf2', 0, '2022-10-11 12:11:41', NULL),
(185, 116, 'andreloun@gmail.com', '05dde6238f506e2ae51c90995e6a5051', 0, '2022-10-11 12:11:47', NULL),
(186, 116, 'goodness@fmail.com', 'b8e6d26765e67dfef26c5f33f18e701d', 0, '2022-10-11 12:11:49', NULL),
(187, 116, 'bello@gmail.com', '6771e5b927ee8fde975fa02ab09c4b0d', 0, '2022-10-11 12:11:52', NULL),
(188, 116, 'shina@gmail.com', '18cf527cfca2577be486c62ec465bdb5', 0, '2022-10-11 12:11:54', NULL),
(189, 116, 'reciever@andadel.com', 'd4e40d27a243dd34d77cc17f21acb2af', 0, '2022-10-11 12:11:57', NULL),
(190, 116, 'dun@gmail.com', 'f03a521f07dcc596767fb181014f8d95', 0, '2022-10-11 12:11:59', NULL),
(191, 116, 'd@gmail.com', '3cad73ae0d73e186ad87de919c2d7184', 0, '2022-10-11 12:12:02', NULL),
(192, 116, 'duny@gmail.com', '422ecbd9ee655dee1c3ac70cbc7f7b2d', 0, '2022-10-11 12:12:04', NULL),
(193, 116, 'reciever@andadel.com', 'eb35e3d7815e38078c5a867b938ed4ea', 0, '2022-10-11 12:12:07', NULL),
(194, 116, 'samuel@andadel.com', 'c3d2b8113b60184137ad859adf1108bf', 0, '2022-10-11 12:12:09', NULL),
(195, 117, 'reciever@bwajes-plus.andadel.com', 'b3ddac7d3390455c4a8486e9bc2b100f', 1, '2022-10-11 12:17:52', '2022-10-11 13:48:17'),
(196, 117, 'andrewadelodun@gmail.com', '0c23fb3bb85203d09e5fdbe8bebac7d5', 0, '2022-10-11 12:17:54', NULL),
(197, 117, 'andrewadelodun@gmail.com', '637c8aa1a42125797d7510673994202b', 0, '2022-10-11 12:17:57', NULL),
(198, 117, 'grace419@gmail.com', 'e09a38d0ab0feebe08ae7ecf3d6b09b2', 0, '2022-10-11 12:17:59', NULL),
(199, 117, 'faruq698@gmail.com', '28b0fdedf0f4b89df426d366f02cde1e', 0, '2022-10-11 12:18:02', NULL),
(200, 117, 'andrewadelodun@gmail.com', 'c454a8d2a9b9143b2a2a17f64ee77e2c', 0, '2022-10-11 12:18:04', NULL),
(201, 117, 'remin8934@gmail.com', '98607a4716e74257a7dda56dec7fd5f6', 0, '2022-10-11 12:18:06', NULL),
(202, 117, 'the033@gmail.com', 'd706bc9ac32ebd4cfde48eb2f467e531', 0, '2022-10-11 12:18:09', NULL),
(203, 117, 'andreloun@gmail.com', '2f032f1ddcb7302a814b0aa68b6e6e7d', 0, '2022-10-11 12:18:11', NULL),
(204, 117, 'goodness@fmail.com', '0a65ad6c5536f3d85d9a195e5cc4d2c3', 0, '2022-10-11 12:18:13', NULL),
(205, 117, 'bello@gmail.com', '00b839a7679ef328c1430bfc2655f096', 0, '2022-10-11 12:18:16', NULL),
(206, 117, 'shina@gmail.com', '47633f0b775a51081fa05b6dc7514498', 0, '2022-10-11 12:18:19', NULL),
(207, 117, 'reciever@andadel.com', '69b7204ee6f65dd322fc9d8ae4f8a639', 0, '2022-10-11 12:18:22', NULL),
(208, 117, 'dun@gmail.com', 'd2d1622b1a30c282004e29c10296f1e5', 0, '2022-10-11 12:18:25', NULL),
(209, 117, 'd@gmail.com', 'eabe02fde517b48af295ddc0788d8111', 0, '2022-10-11 12:18:28', NULL),
(210, 117, 'duny@gmail.com', 'd1594f3eba36d83820f956445b7c2da9', 0, '2022-10-11 12:18:30', NULL),
(211, 117, 'reciever@andadel.com', '25b2fa27fe11bf5e780f18f56dfceafc', 0, '2022-10-11 12:18:32', NULL),
(212, 117, 'andrewadelodun@gmail.com', 'dabb6d8b81a798b6379cf723ac2b8100', 0, '2022-10-11 12:18:35', NULL),
(213, 117, 'samuel@andadel.com', '4f1c5904f66add20597ab0dac7b1d736', 0, '2022-10-11 12:18:37', NULL),
(214, 118, 'andrewadelodun@gmail.com', '38f7b46076ae6a8ede06e126ab754935', 0, '2022-10-11 12:30:22', NULL),
(215, 118, 'reciever@bwajes-plus.andadel.com', '9574149355ab2cfa7fcd01aa28310a5a', 1, '2022-10-11 12:30:24', '2022-10-11 13:48:11'),
(216, 118, 'samuel@andadel.com', '77f1b96f35da01f4e24ac247b0beb293', 0, '2022-10-11 12:30:26', NULL),
(217, 119, 'sb-u75sf6477041@personal.example.com', '32aa7b9130013b765413984c3965bddb', 0, '2022-10-11 12:31:18', NULL),
(218, 119, 'reciever@bwajes-plus.andadel.com', '2a644f1ce67a3f582b8bab8e2911866a', 1, '2022-10-11 12:31:20', '2022-10-11 13:48:08'),
(219, 121, 'sb-u75sf6477041@personal.example.com', '3f50ea8a3a4d77c60689a27c86afce8f', 0, '2022-10-11 12:36:28', NULL),
(220, 122, 'sb-u75sf6477041@personal.example.com', 'b0319e61b0fc2f3afb2f8e514e5c7ea6', 0, '2022-10-11 12:39:56', NULL),
(221, 122, 'sb-u75sf6477041@personal.example.com', 'd592334327d25709bbb9244d94985eac', 0, '2022-10-11 12:40:00', NULL),
(222, 122, 'sb-u75sf6477041@personal.example.com', 'e63fa814dc934f3ec0ef15af756943e7', 0, '2022-10-11 12:40:05', NULL),
(223, 124, 'sb-u75sf6477041@personal.example.com', '9d56fb740d7b05e2818a9b63d921f6b7', 0, '2022-10-11 12:53:52', NULL),
(224, 124, 'sb-u75sf6477041@personal.example.com', 'e4ac75517f66cb01704b0db485491417', 0, '2022-10-11 12:53:56', NULL),
(225, 124, 'sb-u75sf6477041@personal.example.com', '187c650fdcc54a974db40a43458fb211', 0, '2022-10-11 12:54:01', NULL),
(226, 125, 'samuel@andadel.com', 'afd67e777b8791b2196abc4f1f5e3263', 0, '2022-10-11 12:56:17', NULL),
(227, 125, 'reciever@bwajes-plus.andadel.com', '6f0d7aebf2c29eb4312370124c0546a7', 1, '2022-10-11 12:56:21', '2022-10-11 13:48:03'),
(228, 125, 'sb-u75sf6477041@personal.example.com', '1a1b7fe099677e9b55866681451ea793', 0, '2022-10-11 12:56:26', NULL),
(229, 126, 'sb-u75sf6477041@personal.example.com', '3d8c38c876ac4c006530898c7597f89a', 0, '2022-10-11 12:59:04', NULL),
(230, 126, 'sb-u75sf6477041@personal.example.com', '5184808d0cb26df97e53b3f469a58e1e', 0, '2022-10-11 12:59:08', NULL),
(231, 126, 'reciever@bwajes-plus.andadel.com', '2db44e2a621d96c8e39db03f6ad0a22f', 1, '2022-10-11 12:59:12', '2022-10-11 13:48:04'),
(232, 127, 'sb-u75sf6477041@personal.example.com', 'bf44c514f07e8a33c78cb73483c531bf', 0, '2022-10-11 13:04:08', NULL),
(233, 127, 'sb-u75sf6477041@personal.example.com', '6ecf6366a634cb5024b50209d637dbd0', 0, '2022-10-11 13:04:13', NULL),
(234, 127, 'reciever@bwajes-plus.andadel.com', '934e342edaf7cc975da7bb938709eb8b', 1, '2022-10-11 13:04:18', '2022-10-11 13:48:05'),
(235, 128, 'reciever@bwajes-plus.andadel.com', '8cb2dc616447e1c16ded1b73d2ca006a', 1, '2022-10-11 13:05:30', '2022-10-11 13:47:52'),
(236, 128, 'bello@gmail.com', '7d199483f787788e5be4504257f9d6ff', 0, '2022-10-11 13:05:32', NULL),
(237, 128, 'reciever@andadel.com', '9977ff3cb397c3539079c2cb18db6a1a', 0, '2022-10-11 13:05:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(11) UNSIGNED NOT NULL,
  `FAQ` varchar(255) NOT NULL,
  `answer` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) UNSIGNED DEFAULT NULL,
  `updated_by` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `FAQ`, `answer`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(2, 'Faq with photo edited', '<p>Faq without photo Faq without photo <img alt=\"\" src=\"http://localhost:9090/bwajesplus-app/admin/upload_photos/1663260226_life.jpg\" style=\"height:180px; width:279px\" />Faq without photo edited</p>', '2022-09-15 16:43:54', '2022-09-15 19:39:47', 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `forgot_password`
--

CREATE TABLE `forgot_password` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `selector` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `expires` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `issues`
--

CREATE TABLE `issues` (
  `id` int(11) UNSIGNED NOT NULL,
  `first_name` varchar(30) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `subject` varchar(255) NOT NULL,
  `feedback_type` varchar(255) NOT NULL,
  `comments` text NOT NULL,
  `version` varchar(255) NOT NULL,
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `unsubscribed` tinyint(1) NOT NULL DEFAULT 0,
  `unsubscribed_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `issues`
--

INSERT INTO `issues` (`id`, `first_name`, `email`, `subject`, `feedback_type`, `comments`, `version`, `status`, `unsubscribed`, `unsubscribed_date`, `created_at`) VALUES
(1, 'Okpe', 'okpe@gmail.com', 'My subject', 'bug', 'comments comments comments', '1.0.0', 1, 0, NULL, '2022-09-15 15:01:40'),
(3, 'Lambert', 'feedback@gmail.com', 'Some subject Some subject Some subject Some subject', 'Error/Bug report', 'Some subject Some subject Some subject Some subject Some subject Some subject Some subject Some subject Some subject Some subject Some subject Some subject Some subject Some subject Some subject Some subject', 'version 1.0.0', 1, 0, NULL, '2022-09-21 20:17:46');

-- --------------------------------------------------------

--
-- Table structure for table `legal`
--

CREATE TABLE `legal` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) UNSIGNED DEFAULT NULL,
  `updated_by` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `legal`
--

INSERT INTO `legal` (`id`, `name`, `content`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(2, 'privacy with photo1', '<p><img alt=\"\" src=\"http://localhost:9090/bwajesplus-app/admin/../images/1662469609_ankara.jpg\" style=\"float:left; height:183px; width:275px\" />Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus alias ea blanditiis veniam. Sit eligendi hic incidunt mollitia quo consectetur, commodi ex autem dolorum saepe laborum. Recusandae molestias debitis necessitatibus ipsum error? Sit tenetur dignissimos facilis recusandae, incidunt rerum, sapiente nam iste quibusdam, fugit nulla eius nesciunt! Quaerat dolor cumque itaque, accusantium omnis amet eveniet distinctio provident aspernatur sequi inventore? Ab provident culpa aut quos natus ipsa veritatis hic veniam! Dolorem numquam eum laudantium voluptatem facere ad, eveniet architecto molestias magni autem ut doloribus consectetur! Eveniet, praesentium reprehenderit non quibusdam dicta doloremque tempora dignissimos. Perferendis libero aliquid sunt. Fugit, quos ipsa quod quisquam aspernatur quo ratione, suscipit accusantium nemo laudantium, ab ducimus. Eligendi, hic perspiciatis atque odio nostrum id necessitatibus architecto debitis? Nam eligendi assumenda maxime eum perferendis laborum magnam nisi velit qui ipsam! Atque enim officia pariatur quod sint quisquam voluptate ab? Vitae tempore temporibus illo sit ipsum, rerum nisi quasi deleniti, repellat ex maxime fuga in possimus enim laborum quas soluta corrupti ea, pariatur deserunt facere modi quaerat. Deleniti voluptatem recusandae debitis. Obcaecati error quae ipsum dolorem tempora commodi deserunt debitis, optio illo quas dolor autem repellendus pariatur, nemo consequuntur odio laudantium eligendi enim aliquam voluptates! Quia inventore rerum accusamus quam tenetur earum distinctio, nihil provident ducimus possimus optio nisi, minima doloribus eveniet ipsam a. Provident, est. Pariatur nobis iste illum accusantium fuga error incidunt assumenda, earum rem odio hic facere, adipisci quisquam sunt mollitia, qui veniam iure cumque minima nisi? Quo, consectetur accusamus. Alias sed provident aperiam! Quas tempora nisi consectetur iusto necessitatibus. Nam ea eos nemo in modi molestiae inventore veniam minus eveniet magnam dolore tempora excepturi, accusantium, neque earum officia! Natus nam quaerat debitis nulla obcaecati animi, id, quod voluptate adipisci, esse harum est facere reiciendis repellendus perferendis! Perferendis quasi dolorem illo fugit autem dolor vero pariatur ullam, cum labore excepturi nisi fugiat adipisci dolore natus possimus rem corrupti modi voluptas voluptate soluta nobis ut necessitatibus tempore? Et consequuntur labore, officia, eaque repudiandae voluptatum expedita sapiente beatae qui, recusandae praesentium nihil eveniet iste? Magnam ipsum quae est blanditiis sapiente voluptate soluta veniam, distinctio sequi adipisci totam, laboriosam ad illo modi qui ab. Voluptate dolorem animi accusantium ratione corporis placeat magnam eum vel, corrupti, voluptates quod totam dolore sit eveniet illo iusto sapiente reiciendis labore unde dicta ullam in nulla! Eius iure, in tempora at voluptatibus earum est laboriosam commodi reiciendis nisi corporis veritatis dicta repellat eum doloremque ipsa ea veniam harum natus, quibusdam maiores error. Nesciunt harum minima laborum placeat voluptatum dolor repudiandae quo voluptatem, quis eaque distinctio impedit facilis dolore facere pariatur, cupiditate maxime dolorum ipsum molestias tempore alias tempora enim modi! Cum, nostrum eos? Blanditiis ratione saepe voluptates obcaecati voluptatum quasi est, nostrum sint possimus quisquam, recusandae sequi, culpa veniam sed sit eos alias odio minus incidunt! Cumque possimus eum optio fugit mollitia ex id dolores, voluptates voluptas, veritatis pariatur nobis velit libero ea quae quia, praesentium ducimus facere error dolore voluptatibus necessitatibus natus? Explicabo, fugit quas expedita tempore harum officia, et sunt, alias aliquam eum in itaque cumque iste nesciunt consectetur velit? Quos, rerum ipsa nulla odio impedit vero voluptas necessitatibus facilis, culpa ratione, dolorem doloremque dolores rem incidunt reprehenderit aliquam! Tenetur ipsa eum dolorum eos repudiandae! Minima laborum possimus ipsa assumenda! Dolores, in nihil doloribus minus ipsum facilis assumenda veniam tempora unde quo eos pariatur placeat eius ullam necessitatibus incidunt perferendis ipsam voluptates, distinctio id! Quibusdam, labore velit dolore cumque repellendus cum in iure optio quas! Minus qui quidem fuga esse dignissimos facere exercitationem saepe neque blanditiis? Repellat neque deserunt ad corrupti ea incidunt, obcaecati aspernatur cupiditate minus minima adipisci molestiae, vitae assumenda tempora aliquid et beatae dignissimos optio voluptate, rerum expedita nesciunt provident nisi? Ratione reiciendis molestias suscipit accusamus quas praesentium, dicta a quo, expedita corrupti quia dolorum, vel amet voluptates labore. Quaerat cumque fuga dignissimos. Nesciunt odio illo voluptatem quis culpa accusantium quas facere pariatur eius aliquam fugiat labore, distinctio quod saepe nihil eveniet consequuntur. Voluptate, dolores debitis a quos neque reiciendis iste quis itaque eaque odio ex dolor sed similique nesciunt blanditiis labore in? Minus impedit harum doloribus asperiores quos repellat vero nesciunt ullam exercitationem id blanditiis aut facilis dolor accusamus deserunt excepturi, debitis molestias, sint vitae. Consequatur exercitationem aliquid animi consectetur earum, vel minus similique accusamus architecto quia voluptate debitis, perferendis tenetur aut omnis. Obcaecati voluptatibus soluta, similique consectetur, aut voluptatem totam dolor natus molestias doloribus magnam maiores distinctio amet tempora laboriosam. Facilis illo recusandae libero explicabo, perferendis quis assumenda porro, eligendi nulla dolor quod aut enim deleniti possimus placeat. Beatae velit doloremque deleniti ut adipisci ducimus nemo accusamus eos, animi quos porro laborum vel est obcaecati sequi? Nam iusto expedita ut nostrum iste harum, natus molestias accusantium ullam excepturi? Sapiente quod odit a deleniti similique eligendi vitae inventore praesentium. Cum animi illum architecto tempora! Debitis dicta delectus ullam qui nihil placeat, architecto, earum porro illo tempora et consectetur blanditiis excepturi nesciunt alias voluptatem asperiores ad tenetur provident eum nam id nemo! Qui a vitae repudiandae magni quis recusandae asperiores, eveniet voluptatem doloribus ullam dolor sapiente eius ratione necessitatibus, accusamus quam rerum libero quidem, quod impedit dignissimos officiis minus! Quae, odio sequi aliquid velit, deleniti mollitia error repudiandae nemo assumenda voluptas vero nulla eius! Dignissimos vero ullam, consequuntur magni quibusdam nihil error incidunt maiores sunt dolorum ea cumque quo deleniti dolorem atque repudiandae modi distinctio velit vel dolores, suscipit molestiae aliquam esse magnam? Accusantium quidem nisi hic quam fugit laudantium magnam cumque ipsam, animi voluptate voluptates, at vero atque fuga corporis alias, natus libero incidunt nemo nostrum inventore soluta. Similique placeat corrupti amet molestiae reprehenderit voluptas, excepturi, voluptatem mollitia possimus quas neque nemo ad eveniet in necessitatibus aliquid veniam. Veniam fuga ipsam, sunt amet quidem fugit, itaque voluptatum laborum at magni qui dolorum tempore iusto, architecto odio. Esse perspiciatis id illum facilis consequatur amet quod ipsam distinctio, consectetur nihil, cumque placeat quis? Non sed, laboriosam libero quos doloribus sequi unde ducimus reiciendis molestias eos recusandae, eveniet consectetur qui. Vitae modi, veniam sit incidunt tenetur labore quasi necessitatibus?<img alt=\"\" src=\"http://localhost:9090/bwajesplus-app/admin/../images/1662464463_abstract.jpg\" style=\"height:152px; width:331px\" /></p>\r\n\r\n<p>1111</p>', '2022-09-06 11:41:35', '2022-09-06 13:07:51', 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `payment_prices`
--

CREATE TABLE `payment_prices` (
  `id` tinyint(2) UNSIGNED NOT NULL,
  `subject` varchar(255) NOT NULL,
  `description` tinytext NOT NULL,
  `amount_per_month` decimal(10,2) NOT NULL,
  `rate` tinyint(3) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_prices`
--

INSERT INTO `payment_prices` (`id`, `subject`, `description`, `amount_per_month`, `rate`, `created_at`, `updated_at`) VALUES
(1, 'Ad removal', 'Payment to remove ads on all user\'s posts.\r\nThe amount price is a monthly figure. The rate is to ensure longer term commitment from users i.e the higher the rate, the more expensive the shorter term commitments become.', '12.24', 20, '2022-08-06 19:31:22', '2022-09-16 23:06:20');

-- --------------------------------------------------------

--
-- Table structure for table `payment_subscriptions`
--

CREATE TABLE `payment_subscriptions` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `agreement_id` varchar(255) NOT NULL,
  `interval_value` tinyint(2) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `amount_with_currency` varchar(255) NOT NULL,
  `payer_id` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `first_name` varchar(60) NOT NULL,
  `last_name` varchar(60) NOT NULL,
  `start_date` timestamp NULL DEFAULT NULL,
  `last_date` timestamp NULL DEFAULT NULL,
  `payment_method` varchar(20) NOT NULL,
  `unsubscribed` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `unsubscribed_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_subscriptions`
--

INSERT INTO `payment_subscriptions` (`id`, `user_id`, `agreement_id`, `interval_value`, `amount`, `amount_with_currency`, `payer_id`, `email`, `first_name`, `last_name`, `start_date`, `last_date`, `payment_method`, `unsubscribed`, `unsubscribed_date`, `created_at`, `updated_at`) VALUES
(14, 122, 'I-6GGNUKSSUNVS', 1, '14.69', 'USD 14.69', 'PMTGPWSLBTFEL', 'sb-u75sf6477041@personal.example.com', 'John', 'Doe', '2022-09-16 22:23:38', NULL, 'paypal', 0, NULL, '2022-09-16 19:24:13', '2022-09-16 19:24:13'),
(16, 127, 'I-16X8GHAHSRVF', 1, '14.69', 'USD 14.69', 'PMTGPWSLBTFEL', 'sb-u75sf6477041@personal.example.com', 'John', 'Doe', '2022-09-17 15:56:53', NULL, 'paypal', 0, NULL, '2022-09-17 12:57:58', '2022-09-17 12:57:58'),
(26, 137, 'I-YNDUGTF3S680', 3, '39.17', 'USD 39.17', 'PMTGPWSLBTFEL', 'reciever@bwajes-plus.andadel.com', 'John', 'Doe', '2022-10-10 21:03:37', NULL, 'paypal', 0, NULL, '2022-10-10 18:04:54', '2022-10-10 18:07:41');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(60) NOT NULL,
  `description` varchar(160) NOT NULL,
  `post` text NOT NULL,
  `cover_photo` varchar(255) NOT NULL,
  `suspended` tinyint(1) NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL,
  `category_id` tinyint(2) UNSIGNED DEFAULT NULL,
  `type_id` tinyint(2) UNSIGNED DEFAULT NULL,
  `published` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `description`, `post`, `cover_photo`, `suspended`, `user_id`, `category_id`, `type_id`, `published`, `created_at`, `updated_at`) VALUES
(32, 'Description Description Description title', 'Description Description Description Description', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas feugiat consequat diam. Maecenas metus. Vivamus diam purus, cursus a, commodo non, facilisis vitae, nulla. Aenean dictum lacinia tortor. Nunc iaculis, nibh non iaculis aliquam, orci felis euismod neque, sed ornare massa mauris sed velit. Nulla pretium mi et risus. Fusce mi pede, tempor id, cursus ac, ullamcorper nec, enim. Sed tortor. Curabitur molestie. Duis velit augue, condimentum at, ultrices a, luctus ut, orci. Donec pellentesque egestas eros. Integer cursus, augue in cursus faucibus, eros pede bibendum sem, in tempus tellus justo quis ligula. Etiam eget tortor. Vestibulum rutrum, est ut placerat elementum, lectus nisl aliquam velit, tempor aliquam eros nunc nonummy metus. In eros metus, gravida a, gravida sed, lobortis id, turpis. Ut ultrices, ipsum at venenatis fringilla, sem nulla lacinia tellus, eget aliquet turpis mauris non enim. Nam turpis. Suspendisse lacinia. Curabitur ac tortor ut ipsum egestas elementum. Nunc imperdiet gravida mauris.</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas feugiat consequat diam. Maecenas metus. Vivamus diam purus, cursus a, commodo non, facilisis vitae, nulla. Aenean dictum lacinia tortor. Nunc iaculis, nibh non iaculis aliquam, orci felis euismod neque, sed ornare massa mauris sed velit. Nulla pretium mi et risus. Fusce mi pede, tempor id, cursus ac, ullamcorper nec, enim. Sed tortor. Curabitur molestie. Duis velit augue, condimentum at, ultrices a, luctus ut, orci. Donec pellentesque egestas eros. Integer cursus, augue in cursus faucibus, eros pede bibendum sem, in tempus tellus justo quis ligula. Etiam eget tortor. Vestibulum rutrum, est ut placerat elementum, lectus nisl aliquam velit, tempor aliquam eros nunc nonummy metus. In eros metus, gravida a, gravida sed, lobortis id, turpis. Ut ultrices, ipsum at venenatis fringilla, sem nulla lacinia tellus, eget aliquet turpis mauris non enim. Nam turpis. Suspendisse lacinia. Curabitur ac tortor ut ipsum egestas elementum. Nunc imperdiet gravida mauris.</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas feugiat consequat diam. Maecenas metus. Vivamus diam purus, cursus a, commodo non, facilisis vitae, nulla. Aenean dictum lacinia tortor. Nunc iaculis, nibh non iaculis aliquam, orci felis euismod neque, sed ornare massa mauris sed velit. Nulla pretium mi et risus. Fusce mi pede, tempor id, cursus ac, ullamcorper nec, enim. Sed tortor. Curabitur molestie. Duis velit augue, condimentum at, ultrices a, luctus ut, orci. Donec pellentesque egestas eros. Integer cursus, augue in cursus faucibus, eros pede bibendum sem, in tempus tellus justo quis ligula. Etiam eget tortor. Vestibulum rutrum, est ut placerat elementum, lectus nisl aliquam velit, tempor aliquam eros nunc nonummy metus. In eros metus, gravida a, gravida sed, lobortis id, turpis. Ut ultrices, ipsum at venenatis fringilla, sem nulla lacinia tellus, eget aliquet turpis mauris non enim. Nam turpis. Suspendisse lacinia. Curabitur ac tortor ut ipsum egestas elementum. Nunc imperdiet gravida mauris.</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas feugiat consequat diam. Maecenas metus. Vivamus diam purus, cursus a, commodo non, facilisis vitae, nulla. Aenean dictum lacinia tortor. Nunc iaculis, nibh non iaculis aliquam, orci felis euismod neque, sed ornare massa mauris sed velit. Nulla pretium mi et risus. Fusce mi pede, tempor id, cursus ac, ullamcorper nec, enim. Sed tortor. Curabitur molestie. Duis velit augue, condimentum at, ultrices a, luctus ut, orci. Donec pellentesque egestas eros. Integer cursus, augue in cursus faucibus, eros pede bibendum sem, in tempus tellus justo quis ligula. Etiam eget tortor. Vestibulum rutrum, est ut placerat elementum, lectus nisl aliquam velit, tempor aliquam eros nunc nonummy metus. In eros metus, gravida a, gravida sed, lobortis id, turpis. Ut ultrices, ipsum at venenatis fringilla, sem nulla lacinia tellus, eget aliquet turpis mauris non enim. Nam turpis. Suspendisse lacinia. Curabitur ac tortor ut ipsum egestas elementum. Nunc imperdiet gravida mauris.</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas feugiat consequat diam. Maecenas metus. Vivamus diam purus, cursus a, commodo non, facilisis vitae, nulla. Aenean dictum lacinia tortor. Nunc iaculis, nibh non iaculis aliquam, orci felis euismod neque, sed ornare massa mauris sed velit. Nulla pretium mi et risus. Fusce mi pede, tempor id, cursus ac, ullamcorper nec, enim. Sed tortor. Curabitur molestie. Duis velit augue, condimentum at, ultrices a, luctus ut, orci. Donec pellentesque egestas eros. Integer cursus, augue in cursus faucibus, eros pede bibendum sem, in tempus tellus justo quis ligula. Etiam eget tortor. Vestibulum rutrum, est ut placerat elementum, lectus nisl aliquam velit, tempor aliquam eros nunc nonummy metus. In eros metus, gravida a, gravida sed, lobortis id, turpis. Ut ultrices, ipsum at venenatis fringilla, sem nulla lacinia tellus, eget aliquet turpis mauris non enim. Nam turpis. Suspendisse lacinia. Curabitur ac tortor ut ipsum egestas elementum. Nunc imperdiet gravida mauris.</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', '1659286979_attract.jpg', 0, 122, 2, 3, 1, '2022-07-31 17:02:59', '2022-07-31 17:02:59'),
(41, 'The new age', 'The new age description of the next generation', '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quos doloribus aspernatur cumque deleniti labore hic! Harum provident nam laudantium dolor, totam est impedit omnis voluptatum rem laborum ipsam officiis rerum, quidem recusandae assumenda neque dicta iure! Iste voluptates eaque, sapiente dolore provident dolorum? Dolor, incidunt. Reprehenderit tempora quia enim nulla omnis possimus quo iusto doloribus aliquid accusantium eos, rem quos dolores deserunt officiis eaque error. Nulla suscipit tempore atque impedit nemo ipsam est explicabo maxime repellat eligendi officiis totam molestiae, omnis vel repellendus ratione quibusdam similique, placeat eaque tenetur. Voluptates veniam perspiciatis hic omnis quasi reiciendis tempore et quos! Ex aliquam, ea placeat dolor adipisci in maxime maiores harum, quis porro recusandae tenetur. Quis repellat ab porro laboriosam minima rem consectetur facere eum a amet dolorem sequi beatae vel fugit blanditiis, illo magni nobis. Neque, corporis incidunt! Nisi vitae, temporibus doloribus fugit, tenetur hic inventore molestias corrupti aperiam ad accusamus dolor, suscipit placeat debitis ab voluptates ratione fuga eum culpa expedita beatae corporis recusandae. Perspiciatis sapiente, tenetur eligendi possimus, fuga reprehenderit cum sed ipsa facere a dolore itaque fugit pariatur fugiat voluptatem veniam aliquid commodi distinctio non alias in cupiditate, similique minus. Suscipit deleniti hic veniam id cupiditate. Veritatis libero est deserunt, ea cupiditate nemo, mollitia facilis sint dolores totam officia. Corporis iure inventore recusandae quos eaque assumenda sint quibusdam molestiae, vel ipsum cum hic mollitia. Voluptatibus quia facere sunt omnis adipisci exercitationem, dignissimos, quidem modi, consectetur tempore harum a excepturi vero architecto? Placeat aspernatur, rerum autem a aliquam reprehenderit atque veritatis quae laudantium veniam temporibus enim velit corporis facere. Illum impedit quibusdam ducimus, dignissimos omnis quas! Libero odio neque dignissimos quia corrupti quidem facilis totam dicta, provident praesentium atque deleniti, repudiandae excepturi temporibus obcaecati eos culpa voluptates nihil iste nemo accusantium repellendus nisi sint aperiam! Sit officiis unde dolorem accusamus sapiente mollitia rerum reiciendis. Reiciendis sit mollitia alias nihil ipsa natus ullam nam qui voluptates cumque, molestiae ut ducimus cupiditate id similique optio tempore eum quas unde? Earum saepe quaerat ipsum iste, nesciunt porro laudantium, neque itaque, ad maxime eos. Porro repudiandae voluptatem adipisci quia accusantium doloremque corrupti ipsa necessitatibus minus ea pariatur consectetur, libero distinctio voluptatibus possimus est eos in? Distinctio, aperiam architecto mollitia vel sit quos voluptatum amet cumque ex ut nihil eligendi natus cum nam enim cupiditate ipsam reiciendis, incidunt provident at. Possimus quo quas nam nobis delectus reprehenderit sequi, nisi, quos dolore minima omnis dolores dolorem, necessitatibus eius mollitia illo modi quisquam repellendus. Dolores at doloremque quaerat nesciunt libero modi qui accusantium ab atque quas dolore eos ipsam vitae exercitationem, reiciendis totam provident voluptatibus soluta ut! Dolor cupiditate tenetur id atque quisquam vero perferendis! Deleniti accusamus sint dolorem, earum veritatis reiciendis quam ullam blanditiis ducimus aliquid placeat officiis a dolores excepturi eligendi illo hic at, voluptas nulla modi sed necessitatibus. Tempora provident placeat delectus labore incidunt cum nulla ratione explicabo hic, nam, reprehenderit veritatis tempore dignissimos adipisci facilis, nobis ducimus! Velit dolorum eveniet, est odio delectus libero impedit distinctio iusto quas repudiandae ullam atque nostrum magni, ex quia dignissimos nisi repellendus, beatae sapiente necessitatibus! Vel, veritatis rem! Eius omnis modi velit culpa nisi commodi! Similique, sint, eaque itaque neque consectetur doloribus esse dicta corporis ipsam quas voluptate rerum deserunt possimus, velit rem nobis accusamus ea reprehenderit voluptatem. Numquam, ratione! Fugit praesentium odit quod quo, ab nobis impedit totam error exercitationem inventore officia est enim recusandae illum officiis! Earum saepe voluptatem vero itaque ex id dignissimos? Pariatur, suscipit obcaecati voluptatum corporis dicta, totam officia rerum beatae distinctio hic tenetur soluta voluptas impedit quod consequuntur ratione earum sit maxime, perspiciatis debitis provident sapiente tempora voluptate. Provident, molestias libero doloribus corrupti laudantium animi dolore. Obcaecati ex quam debitis quae beatae magnam. Est, deleniti ipsam. Ullam consectetur repudiandae ipsa voluptates quia ut corporis est, eos libero labore tenetur at assumenda commodi accusamus quidem exercitationem? Distinctio beatae, animi facilis exercitationem praesentium tenetur asperiores nisi error aut odit quis sequi vel possimus nesciunt consequuntur fugit dicta magni voluptate perferendis soluta. Vitae consequatur laborum quia tempore ut nam ducimus consectetur itaque ipsam, non voluptas optio minus atque accusamus dolore nobis maxime odit ipsum esse earum ipsa commodi accusantium voluptatem. Ipsam et voluptates assumenda quasi dolores, fuga reprehenderit nihil magni fugiat. Quos minus nostrum assumenda rerum, perferendis illum amet recusandae distinctio beatae aspernatur exercitationem molestiae consectetur similique officia autem sunt velit temporibus? Reiciendis dolores vitae perspiciatis quisquam laudantium, labore voluptates, nostrum adipisci ea odit unde optio asperiores enim beatae. Delectus nostrum autem vitae exercitationem explicabo. Veritatis sit sapiente numquam rerum consectetur! Blanditiis, corporis alias nihil soluta ducimus, maxime esse commodi incidunt impedit, est saepe! Vel aperiam molestias voluptate quo eum cumque unde, aut dolorem, quaerat reprehenderit alias animi, soluta voluptatibus accusantium deleniti. Sequi quod, nobis architecto beatae, itaque incidunt sed maiores tempora quam vero atque eveniet exercitationem sapiente! Explicabo dicta debitis velit architecto officiis consequatur, quidem omnis modi aliquid quod eum ad voluptates. Soluta maiores tempore ducimus, ipsam laudantium animi eligendi. Inventore magnam, molestias eveniet commodi, nihil sunt tempore, quo veritatis tempora voluptatum ut provident nam adipisci consequatur laudantium tenetur quos eum. Non, magnam? Rerum aspernatur assumenda aliquid eligendi ipsa quod dicta perferendis commodi deleniti! Quidem illum adipisci quibusdam asperiores rerum sint harum a corrupti perferendis iure reprehenderit libero quae, illo quaerat deserunt optio et eos consectetur placeat delectus ab eveniet! Ipsum animi deleniti culpa aliquam cumque. Molestiae laudantium at qui, cupiditate praesentium animi. Ipsa aliquam, quae temporibus eos magnam nostrum. Nisi accusamus in enim, officia necessitatibus voluptatibus, ipsa quidem nobis molestiae, suscipit facere fugiat aperiam dolores natus voluptas beatae explicabo quos eveniet neque ducimus. Esse maiores ullam corporis accusamus ea quaerat? Fuga illum sequi error sunt vel dicta, nobis doloribus dignissimos perferendis iure inventore eum ipsum quos explicabo repudiandae officiis maxime earum repellat blanditiis ad eos amet sapiente non ea. Cupiditate repudiandae inventore cum mollitia at earum rem, corporis ullam alias sed maiores minus quod quidem dolorem suscipit. Quod similique nulla in itaque iure laudantium provident pariatur commodi possimus. Recusandae numquam, nesciunt esse laudantium dolores aperiam corrupti mollitia dolor dolorum maiores fugit!</p>', '1665424658_bright.jpg', 0, 137, 6, 13, 1, '2022-10-10 17:57:38', '2022-10-10 17:57:38');

-- --------------------------------------------------------

--
-- Table structure for table `post_category`
--

CREATE TABLE `post_category` (
  `id` tinyint(2) UNSIGNED NOT NULL,
  `category` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) UNSIGNED DEFAULT NULL,
  `updated_by` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post_category`
--

INSERT INTO `post_category` (`id`, `category`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'journal', '2021-11-04 11:15:43', '2021-11-04 11:15:43', NULL, NULL),
(2, 'blog', '2021-11-04 11:15:43', '2021-11-04 11:15:43', NULL, NULL),
(3, 'report', '2021-11-04 11:15:43', '2021-11-04 11:15:43', NULL, NULL),
(4, 'writing', '2021-11-04 11:15:43', '2021-11-04 11:15:43', NULL, NULL),
(5, 'story', '2021-11-04 11:15:43', '2021-11-04 11:15:43', NULL, NULL),
(6, 'article', '2021-11-04 11:15:43', '2021-11-04 11:15:43', NULL, NULL),
(7, 'academic', '2022-06-06 10:37:46', '2022-06-06 10:37:46', NULL, NULL),
(9, 'test', '2022-09-06 09:56:26', '2022-09-06 10:13:16', 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `post_statistics`
--

CREATE TABLE `post_statistics` (
  `id` int(11) UNSIGNED NOT NULL,
  `post_id` int(11) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `post_type`
--

CREATE TABLE `post_type` (
  `id` tinyint(2) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) UNSIGNED DEFAULT NULL,
  `updated_by` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post_type`
--

INSERT INTO `post_type` (`id`, `type`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'academic & education', '2021-11-04 11:26:06', '2021-11-04 11:26:06', NULL, NULL),
(2, 'art', '2021-11-04 11:26:06', '2021-11-04 11:26:06', NULL, NULL),
(3, 'environment', '2021-11-04 11:26:06', '2021-11-04 11:26:06', NULL, NULL),
(4, 'health & fitness', '2021-11-04 11:26:06', '2021-11-04 11:26:06', NULL, NULL),
(5, 'business & career', '2021-11-04 11:26:06', '2021-11-04 11:26:06', NULL, NULL),
(6, 'religion', '2021-11-04 11:26:06', '2021-11-04 11:26:06', NULL, NULL),
(7, 'entertainment', '2021-11-04 11:26:06', '2021-11-04 11:26:06', NULL, NULL),
(8, 'technology', '2021-11-04 11:26:06', '2021-11-04 11:26:06', NULL, NULL),
(9, 'family & friends', '2021-11-04 11:26:06', '2021-11-04 11:26:06', NULL, NULL),
(10, 'government, politics and law', '2021-11-04 11:26:06', '2021-11-04 11:26:06', NULL, NULL),
(11, 'science and research', '2021-11-04 11:26:06', '2021-11-04 11:26:06', NULL, NULL),
(12, 'lifestyle', '2021-11-04 11:26:06', '2021-11-04 11:26:06', NULL, NULL),
(13, 'sport', '2021-11-04 11:26:06', '2021-11-04 11:26:06', NULL, NULL),
(14, 'wealth', '2021-11-04 11:26:06', '2021-11-04 11:26:06', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `rating` tinyint(1) UNSIGNED NOT NULL,
  `reason` text DEFAULT NULL,
  `suggestion` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `user_id`, `rating`, `reason`, `suggestion`, `created_at`) VALUES
(11, 122, 4, NULL, NULL, '2022-08-09 10:33:16'),
(12, 122, 5, NULL, NULL, '2022-08-09 10:33:32'),
(13, 122, 3, NULL, NULL, '2022-08-09 10:34:44'),
(14, 122, 3, NULL, NULL, '2022-10-05 13:58:27');

-- --------------------------------------------------------

--
-- Table structure for table `reported_posts`
--

CREATE TABLE `reported_posts` (
  `report_id` tinyint(2) UNSIGNED NOT NULL,
  `post_id` int(11) UNSIGNED NOT NULL,
  `end_user_ip` varchar(255) NOT NULL,
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reported_posts`
--

INSERT INTO `reported_posts` (`report_id`, `post_id`, `end_user_ip`, `status`, `created_at`) VALUES
(1, 32, '34.6787.44', 1, '2022-08-31 14:24:31'),
(2, 32, '::1', 1, '2022-09-22 20:56:02'),
(8, 32, '2435.44.43', 1, '2022-08-31 14:25:30'),
(1, 32, '::1', 1, '2022-09-22 21:01:34');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` tinyint(2) UNSIGNED NOT NULL,
  `report` varchar(255) NOT NULL,
  `created_by` int(11) UNSIGNED NOT NULL,
  `updated_by` int(11) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `report`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'nudity', 3, 3, '2022-08-30 11:49:25', '2022-08-30 11:49:25'),
(2, 'violence', 3, 3, '2022-08-30 11:49:51', '2022-08-30 11:49:51'),
(3, 'harassment', 3, 3, '2022-08-30 11:50:22', '2022-08-30 11:50:22'),
(4, 'suicide or self-injury', 3, 3, '2022-08-30 11:51:01', '2022-08-30 11:51:01'),
(5, 'false information', 3, 3, '2022-08-30 11:51:21', '2022-08-30 11:51:21'),
(6, 'spam', 3, 3, '2022-08-30 11:51:27', '2022-08-30 11:51:27'),
(7, 'unauthorized sales', 3, 3, '2022-08-30 11:51:48', '2022-08-30 11:51:48'),
(8, 'hate speech', 3, 3, '2022-08-30 11:52:09', '2022-08-30 11:52:09'),
(9, 'terrorism', 3, 3, '2022-08-30 11:52:19', '2022-08-30 11:52:19');

-- --------------------------------------------------------

--
-- Table structure for table `subscriber_list`
--

CREATE TABLE `subscriber_list` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `unsubscribed` tinyint(1) NOT NULL DEFAULT 0,
  `unsubscribed_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscriber_list`
--

INSERT INTO `subscriber_list` (`id`, `email`, `unsubscribed`, `unsubscribed_date`, `created_at`) VALUES
(1, 'solataiwo@gmail.com', 0, NULL, '2022-09-20 15:12:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `business_name` varchar(255) NOT NULL,
  `gender` varchar(1) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `phone` varchar(16) DEFAULT NULL,
  `no_of_private_post_allowed` int(11) NOT NULL DEFAULT 10,
  `suspended` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `bio` text DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country` tinyint(3) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `unsubscribed` tinyint(1) NOT NULL DEFAULT 0,
  `unsubscribed_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `business_name`, `gender`, `password`, `profile_image`, `phone`, `no_of_private_post_allowed`, `suspended`, `bio`, `website`, `birthdate`, `address`, `city`, `state`, `country`, `active`, `unsubscribed`, `unsubscribed_date`, `created_at`, `updated_at`) VALUES
(122, 'Andrew', 'Adelodun', 'andrewadelodun@gmail.com', 'Andadel', 'M', '$2y$10$B63crKXdlB64j/Rjv88JTeqpKzRHSqPaPOH2Ao7r8C3bILt30scw6', '1659524388_journal2.jpg', '+234 904 563 452', 17, 0, NULL, NULL, NULL, NULL, NULL, NULL, 20, 0, 0, '2022-09-09 10:10:21', '2022-07-31 15:12:29', '2022-09-05 16:01:20'),
(127, 'ADELODUN', 'OLUWADAMILARE', 'reciever@bwajes-plus.andadel.com', 'U & E', 'M', '$2y$10$mE8/CPv/eU5Pp1Eq68EnRuwdbwbTDTW9V.zu1bwZatC.z1amZmMIK', '1663670611_lion.jpg', NULL, 10, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, '2022-09-12 14:22:10', '2022-09-20 11:43:31'),
(137, 'Samuel', 'Masheyi', 'samuel@andadel.com', 'Masheyi LTD', 'M', '$2y$10$fKH7k6WED81wafGH7LPRv.ccOSKhbYdKulJE0rjXFK9PJEY53hGfK', NULL, NULL, 10, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, '2022-10-05 19:50:52', '2022-10-05 20:50:52');

-- --------------------------------------------------------

--
-- Table structure for table `user_passwords`
--

CREATE TABLE `user_passwords` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_passwords`
--

INSERT INTO `user_passwords` (`id`, `email`, `password`, `created_at`) VALUES
(13, 'andrew12adelodun@gmail.com', '$2y$10$iyjHDaYJdCIyXJuZ38/n4.rVdxeTxnEDAAuT2u21XPwzMT3hMrjR6', '2022-09-09 10:26:29'),
(14, 'reciever@bwajes-plus.andadel.com', '$2y$10$YTenVNCKBVJNZwNcI0l6mOT3z0JqzF8WgSZmYzlGIQUTkv0gVgtQq', '2022-09-12 12:40:42'),
(15, 'reciever@bwajes-plus.andadel.com', '$2y$10$OB5XbXGr3WHA5DEPrioNSuZOYBkmao4WS/tiCwOwvHVVUkx64xAA6', '2022-09-12 12:43:53'),
(16, 'reciever@bwajes-plus.andadel.com', '$2y$10$tbF4qDepzAaLw6pRyvdBEuDKypb41OiLFg4AcOl8KoK5gHpKV1G8K', '2022-09-12 12:53:54'),
(17, 'reciever@bwajes-plus.andadel.com', '$2y$10$mKkTcoCLDZ1JVbTU5ykgye92RO98cs5aggfzNOv00t1dNivsO9n9i', '2022-09-12 14:22:10'),
(18, 'reciever@andadel.com', '$2y$10$UR2cdhINKqiXePEFYw7uAeTfqe/cPXqrG/fFlINJl/bDwXFs4Ooye', '2022-09-30 09:39:36'),
(22, 'samuel@andadel.com', '$2y$10$fKH7k6WED81wafGH7LPRv.ccOSKhbYdKulJE0rjXFK9PJEY53hGfK', '2022-10-05 19:51:24'),
(23, 'duny@gmail.com', '$2y$10$4Xnhx9G8hj.XxEcCATNoeesvTFpVgjaNV7pLsD3p8ENHk4Ly0Msvy', '2022-10-09 17:07:00'),
(24, 'duny@gmail.com', '$2y$10$vbA1h77T3Yq5hNnoEtazMu0qFN2GJZCNh7GSFLlC0.l3Zs2g3vR/O', '2022-10-09 17:15:15'),
(25, 'duny@gmail.com', '$2y$10$GF35KCfn0k3PpMwScI/h3uvDyl1iKHa4AcXDyW/4kpAXvK1/3cJK6', '2022-10-09 17:18:17'),
(26, 'duny@gmail.com', '$2y$10$YQT08IJfr7KIxPSM76filO6bNVOwyGuyPhUVfF7CZzrxwRjCxG1/m', '2022-10-09 17:19:56'),
(27, 'duny@gmail.com', '$2y$10$jf.9i036HIGeT5e5ZBbAgeOBrgplRiEOI/.82HDYzzwfa0mNw2v7e', '2022-10-09 17:21:21'),
(28, 'duny@gmail.com', '$2y$10$eBSNlY8H3mqdDC1Ixev2f.WM3IHrwhlwbVgdH51NlDG7QJ4WSldjW', '2022-10-09 17:29:26'),
(29, 'duny@gmail.com', '$2y$10$Cb1IUecAEWHXeld1NL2Nyu/bRYgbgihm6KTqhsX2iT1AUqP53OOgu', '2022-10-09 17:30:38'),
(30, 'duny@gmail.com', '$2y$10$FmvOeVunN6gqqQ1vYab4c.dNrzL1MbOj9fNCGBWdipqm2Q.DILpxm', '2022-10-09 17:34:00'),
(31, 'duny@gmail.com', '$2y$10$GUdZI5yPhHiXfKEvu0lY4OAIKK8XmTjZK/E804N4jmLBe6syiSjua', '2022-10-09 17:35:33');

-- --------------------------------------------------------

--
-- Table structure for table `user_sent_emails`
--

CREATE TABLE `user_sent_emails` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `title` varchar(60) NOT NULL,
  `message` text NOT NULL,
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sent_emails`
--

INSERT INTO `user_sent_emails` (`id`, `user_id`, `email`, `department`, `title`, `message`, `status`, `created_at`) VALUES
(5, 122, 'andrewadelodun@gmail.com', 'myphptestemail@gmail.com', 'some random title some random title', 'some random message some random message some random message', 1, '2022-09-08 16:31:34'),
(6, 127, 'reciever@bwajes-plus.andadel.com', 'myphptestemail@gmail.com', 'perspiciatis iusto accusantium ut', 'perspiciatis iusto accusantium ut perspiciatis iusto accusantium ut perspiciatis iusto accusantium ut', 1, '2022-09-14 16:28:09'),
(7, 122, 'andrewadelodun@gmail.com', 'reciever@bwajes-plus.andadel.com', 'support support support support', 'support support support support support support support support support support support support support support support support support support support support', 1, '2022-09-14 16:38:20'),
(8, 122, 'andrewadelodun@gmail.com', 'reciever@bwajes-plus.andadel.com', 'Title Message Title Message', 'Title Message Title Message Title Message Title Message Title Message Title Message Title Message Title Message Title Message Title Message Title Message', 1, '2022-09-14 17:07:53'),
(9, 122, 'andrewadelodun@gmail.com', 'reciever@bwajes-plus.andadel.com', 'Choose Support Department', 'Choose Support Department Choose Support Department Choose Support Department Choose Support Department Choose Support Department', 1, '2022-09-14 17:09:43'),
(12, 122, 'andrewadelodun@gmail.com', 'sender@bwajes-plus.andadel.com', 'Some Message Some Message', 'Some Message Some Message Some Message Some Message', 1, '2022-10-05 13:55:26'),
(13, 122, 'andrewadelodun@gmail.com', 'sender@bwajes-plus.andadel.com', 'Some Message Some Message', 'Some Message Some Message Some Message Some Message', 1, '2022-10-05 13:57:09'),
(15, 127, 'reciever@bwajes-plus.andadel.com', 'reciever@bwajes-plus.andadel.com', 'perspiciatis iusto accusantium ut', 'perspiciatis iusto accusantium ut  perspiciatis iusto accusantium ut', 1, '2022-10-06 13:39:08');

-- --------------------------------------------------------

--
-- Table structure for table `user_statistics`
--

CREATE TABLE `user_statistics` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `last_logout` timestamp NULL DEFAULT NULL,
  `browser` varchar(255) NOT NULL,
  `os` varchar(255) NOT NULL,
  `device_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_statistics`
--

INSERT INTO `user_statistics` (`id`, `user_id`, `last_login`, `last_logout`, `browser`, `os`, `device_name`, `created_at`, `updated_at`) VALUES
(13, 122, '2022-10-10 17:00:00', '2022-10-10 17:14:18', 'Chrome', 'Windows 10', 'Unknown', '2022-07-31 15:12:36', '2022-10-10 17:14:18'),
(16, 127, '2022-10-11 18:22:10', '2022-10-11 19:33:12', 'Chrome', 'Windows 10', 'Unknown', '2022-09-14 21:46:26', '2022-10-11 19:33:12'),
(19, 137, '2022-10-11 18:14:53', '2022-10-11 19:32:51', 'Chrome', 'Windows 10', 'Unknown', '2022-10-05 19:52:32', '2022-10-11 19:32:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_email` (`email`),
  ADD UNIQUE KEY `uk_username` (`username`),
  ADD KEY `fk_admin_type` (`admin_type`),
  ADD KEY `fk_adcountry_id` (`country`);

--
-- Indexes for table `admin_passwords`
--
ALTER TABLE `admin_passwords`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_sent_emails`
--
ALTER TABLE `admin_sent_emails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_a_id` (`admin_id`);

--
-- Indexes for table `admin_statistics`
--
ALTER TABLE `admin_statistics`
  ADD PRIMARY KEY (`id`,`admin_id`),
  ADD KEY `fk_asid` (`admin_id`);

--
-- Indexes for table `admin_type`
--
ALTER TABLE `admin_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `affiliate_programmes`
--
ALTER TABLE `affiliate_programmes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_created_by` (`created_by`),
  ADD KEY `fk_updated_by` (`updated_by`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_post_in_comment_id` (`post_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_c_country_id` (`created_by`),
  ADD KEY `fk_u_country_id` (`updated_by`);

--
-- Indexes for table `deleted_users`
--
ALTER TABLE `deleted_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_list`
--
ALTER TABLE `email_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_source_id` (`source`);

--
-- Indexes for table `email_list_source`
--
ALTER TABLE `email_list_source`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_tracking`
--
ALTER TABLE `email_tracking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_eta_id` (`admin_sent_emails_id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_fad_id` (`created_by`),
  ADD KEY `fk_fadmin_id` (`updated_by`);

--
-- Indexes for table `forgot_password`
--
ALTER TABLE `forgot_password`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issues`
--
ALTER TABLE `issues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `legal`
--
ALTER TABLE `legal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ad_id` (`created_by`),
  ADD KEY `fk_adm_id` (`updated_by`);

--
-- Indexes for table `payment_prices`
--
ALTER TABLE `payment_prices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_subscriptions`
--
ALTER TABLE `payment_subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_type_id` (`type_id`),
  ADD KEY `fk_category_id` (`category_id`),
  ADD KEY `fk_u_id` (`user_id`);

--
-- Indexes for table `post_category`
--
ALTER TABLE `post_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pcc_id` (`created_by`),
  ADD KEY `fk_pcu_id` (`updated_by`);

--
-- Indexes for table `post_statistics`
--
ALTER TABLE `post_statistics`
  ADD PRIMARY KEY (`id`,`post_id`),
  ADD KEY `fk_pid` (`post_id`);

--
-- Indexes for table `post_type`
--
ALTER TABLE `post_type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ptc_id` (`created_by`),
  ADD KEY `fk_ptu_id` (`updated_by`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Indexes for table `reported_posts`
--
ALTER TABLE `reported_posts`
  ADD KEY `fk_post_id` (`post_id`),
  ADD KEY `fk_report_id` (`report_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_crt_rep_admin_id` (`created_by`),
  ADD KEY `fk_upt_rep_admin_id` (`updated_by`);

--
-- Indexes for table `subscriber_list`
--
ALTER TABLE `subscriber_list`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_email` (`email`),
  ADD KEY `fk_uscountry_id` (`country`);

--
-- Indexes for table `user_passwords`
--
ALTER TABLE `user_passwords`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sent_emails`
--
ALTER TABLE `user_sent_emails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ur_id` (`user_id`);

--
-- Indexes for table `user_statistics`
--
ALTER TABLE `user_statistics`
  ADD PRIMARY KEY (`id`,`user_id`),
  ADD KEY `fk_usid` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `admin_passwords`
--
ALTER TABLE `admin_passwords`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `admin_sent_emails`
--
ALTER TABLE `admin_sent_emails`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `admin_statistics`
--
ALTER TABLE `admin_statistics`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `admin_type`
--
ALTER TABLE `admin_type`
  MODIFY `id` tinyint(1) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `affiliate_programmes`
--
ALTER TABLE `affiliate_programmes`
  MODIFY `id` tinyint(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;

--
-- AUTO_INCREMENT for table `deleted_users`
--
ALTER TABLE `deleted_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `email_list`
--
ALTER TABLE `email_list`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT for table `email_list_source`
--
ALTER TABLE `email_list_source`
  MODIFY `id` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `email_tracking`
--
ALTER TABLE `email_tracking`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=238;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `forgot_password`
--
ALTER TABLE `forgot_password`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `issues`
--
ALTER TABLE `issues`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `legal`
--
ALTER TABLE `legal`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment_prices`
--
ALTER TABLE `payment_prices`
  MODIFY `id` tinyint(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment_subscriptions`
--
ALTER TABLE `payment_subscriptions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `post_category`
--
ALTER TABLE `post_category`
  MODIFY `id` tinyint(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `post_statistics`
--
ALTER TABLE `post_statistics`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_type`
--
ALTER TABLE `post_type`
  MODIFY `id` tinyint(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` tinyint(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `subscriber_list`
--
ALTER TABLE `subscriber_list`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `user_passwords`
--
ALTER TABLE `user_passwords`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `user_sent_emails`
--
ALTER TABLE `user_sent_emails`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_statistics`
--
ALTER TABLE `user_statistics`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `fk_adcountry_id` FOREIGN KEY (`country`) REFERENCES `countries` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_admin_type` FOREIGN KEY (`admin_type`) REFERENCES `admin_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `admin_sent_emails`
--
ALTER TABLE `admin_sent_emails`
  ADD CONSTRAINT `fk_a_id` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Constraints for table `admin_statistics`
--
ALTER TABLE `admin_statistics`
  ADD CONSTRAINT `fk_asid` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `affiliate_programmes`
--
ALTER TABLE `affiliate_programmes`
  ADD CONSTRAINT `fk_created_by` FOREIGN KEY (`created_by`) REFERENCES `admin` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `admin` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_post_in_comment_id` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `countries`
--
ALTER TABLE `countries`
  ADD CONSTRAINT `fk_c_country_id` FOREIGN KEY (`created_by`) REFERENCES `admin` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_u_country_id` FOREIGN KEY (`updated_by`) REFERENCES `admin` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `email_list`
--
ALTER TABLE `email_list`
  ADD CONSTRAINT `fk_source_id` FOREIGN KEY (`source`) REFERENCES `email_list_source` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `email_tracking`
--
ALTER TABLE `email_tracking`
  ADD CONSTRAINT `fk_eta_id` FOREIGN KEY (`admin_sent_emails_id`) REFERENCES `admin_sent_emails` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `faqs`
--
ALTER TABLE `faqs`
  ADD CONSTRAINT `fk_fad_id` FOREIGN KEY (`created_by`) REFERENCES `admin` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_fadmin_id` FOREIGN KEY (`updated_by`) REFERENCES `admin` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Constraints for table `legal`
--
ALTER TABLE `legal`
  ADD CONSTRAINT `fk_ad_id` FOREIGN KEY (`created_by`) REFERENCES `admin` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_adm_id` FOREIGN KEY (`updated_by`) REFERENCES `admin` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `fk_category_id` FOREIGN KEY (`category_id`) REFERENCES `post_category` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_type_id` FOREIGN KEY (`type_id`) REFERENCES `post_type` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_u_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `post_category`
--
ALTER TABLE `post_category`
  ADD CONSTRAINT `fk_pcc_id` FOREIGN KEY (`created_by`) REFERENCES `admin` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pcu_id` FOREIGN KEY (`updated_by`) REFERENCES `admin` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Constraints for table `post_statistics`
--
ALTER TABLE `post_statistics`
  ADD CONSTRAINT `fk_pid` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `post_type`
--
ALTER TABLE `post_type`
  ADD CONSTRAINT `fk_ptc_id` FOREIGN KEY (`created_by`) REFERENCES `admin` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ptu_id` FOREIGN KEY (`updated_by`) REFERENCES `admin` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Constraints for table `reported_posts`
--
ALTER TABLE `reported_posts`
  ADD CONSTRAINT `fk_post_id` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_report_id` FOREIGN KEY (`report_id`) REFERENCES `reports` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `fk_crt_rep_admin_id` FOREIGN KEY (`created_by`) REFERENCES `admin` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_upt_rep_admin_id` FOREIGN KEY (`updated_by`) REFERENCES `admin` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_uscountry_id` FOREIGN KEY (`country`) REFERENCES `countries` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Constraints for table `user_sent_emails`
--
ALTER TABLE `user_sent_emails`
  ADD CONSTRAINT `fk_ur_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Constraints for table `user_statistics`
--
ALTER TABLE `user_statistics`
  ADD CONSTRAINT `fk_usid` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
