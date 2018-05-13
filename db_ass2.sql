-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 13, 2018 lúc 10:04 AM
-- Phiên bản máy phục vụ: 10.1.30-MariaDB
-- Phiên bản PHP: 7.1.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_ass2`
--

DELIMITER $$
--
-- Thủ tục
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllNews` ()  NO SQL
BEGIN 
	select * from posts where type = 0
    ORDER by id DESC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllNewsWithPaging` (IN `n` INT(10), IN `o` INT(10))  NO SQL
BEGIN
	SELECT * 
    FROM posts
    WHERE posts.type = 0
    ORDER BY id DESC
    LIMIT n OFFSET o;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllSpecialize` ()  NO SQL
BEGIN
	SELECT * FROM specializes;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllStudentNameByClassId` (IN `cid` INT(10))  NO SQL
BEGIN
	SELECT students.name, students.id as sid, class_s.id 
    FROM students, studies, class_s
    WHERE class_s.id = cid 
    	AND class_s.id = studies.class_id
    	AND students.id = studies.student_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllUser` ()  NO SQL
BEGIN
	SELECT * FROM users;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getClassList` ()  NO SQL
BEGIN
	select * 
    from class_s, studies, students 
    where class_s.id = studies.class_id and students.id = studies.student_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getClassNumber` ()  BEGIN
	SELECT COUNT(*) as number FROM class_s;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getCommentByPostId` (IN `pid` INT(10))  NO SQL
BEGIN
	SELECT users.name, comments.author_id, comments.post_id, comments.id as cid, comments.comment, comments.created_at, users.avatar, users.id
    FROM users, comments
    WHERE users.id = comments.author_id AND post_id = pid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getCustomerReview` ()  NO SQL
BEGIN 
	SELECT * FROM customer_reviews;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getFindUser` (IN `val` VARCHAR(255))  NO SQL
BEGIN
	SELECT *
    FROM users
    WHERE name LIKE CONCAT('%', @val , '%');
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getNewsById` (IN `newsid` INT(10))  NO SQL
BEGIN
	SELECT *
    FROM posts
    WHERE type = 0 AND id = newsid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getNumberOfTutorType` ()  NO SQL
BEGIN
	SELECT COUNT(s.specialize)
    FROM tutors as t, specializes as s, users as u
    WHERE u.id = t.user_id AND t.s_id = s.id
    GROUP BY s.specialize;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getRandomNewsList` ()  NO SQL
BEGIN
	SELECT * FROM posts WHERE type = 0 
    ORDER by rand() LIMIT 3;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetSpecialize` ()  NO SQL
BEGIN
	SELECT * FROM specializes;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getSpecializeBySID` (IN `sid` INT(10))  NO SQL
BEGIN
	SELECT * FROM specializes WHERE id = sid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getSpecializeListWithCountNumTutor` ()  NO SQL
BEGIN
	SELECT DISTINCT specializes.id as ids, specialize as s_name, (
        SELECT COUNT(*) 
        FROM tutors
        where s_id = ids
    ) as c
    FROM tutors, specializes
    WHERE tutors.s_id = specializes.id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getStudentList` ()  NO SQL
BEGIN
	select * FROM students;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getStudentNumber` ()  BEGIN
	SELECT COUNT(*) as number FROM students;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getTutorListBySpecializeId` (IN `sid` INT(10))  NO SQL
BEGIN
	SELECT *
    FROM specializes as s, tutors as t, users as u
    WHERE s.id = t.s_id AND u.id = t.user_id AND s.id = sid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getTutorListSortByPoint` ()  NO SQL
BEGIN
	SELECT * 
    FROM users, tutors, specializes
	WHERE users.id = tutors.user_id and tutors.s_id = specializes.id 
    ORDER BY tutors.point DESC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getTutorNumber` ()  BEGIN
   SELECT COUNT(*) as number FROM tutors;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getUserNumber` ()  NO SQL
BEGIN
	SELECT COUNT(*) as number FROM users;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `postAddCommentWithPostID` (IN `post` INT(10), IN `author` INT(10), IN `comment` TEXT CHARSET utf8, IN `created_at` DATETIME)  NO SQL
BEGIN
	INSERT INTO comments(author_id, post_id, comment, created_at)
    VALUES (author, post, comment, created_at);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `class_s`
--

CREATE TABLE `class_s` (
  `id` int(10) UNSIGNED NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(11) DEFAULT NULL,
  `student_num` int(11) NOT NULL,
  `shift` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tutor_id` int(10) UNSIGNED NOT NULL,
  `subject_id` int(10) UNSIGNED NOT NULL,
  `state` tinyint(1) NOT NULL,
  `begin_at` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `class_s`
--

INSERT INTO `class_s` (`id`, `address`, `level`, `student_num`, `shift`, `tutor_id`, `subject_id`, `state`, `begin_at`, `created_at`, `updated_at`) VALUES
(1, '12', 2, 1, '12', 2, 1, 0, NULL, NULL, NULL),
(2, 'Số nhà 12, Trần Hưng Đạo', 2, 1, '3-5-7, 19h-20h30', 2, 1, 0, '2018-05-19', NULL, NULL),
(3, 'KTX khu A', 2, 1, 'Thứ 2-4-6, 7h đến 9h tối', 5, 2, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `author_id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `author_id`, `post_id`, `comment`, `created_at`, `updated_at`) VALUES
(2, 1, 1, '<p>Ch&uacute;c mừng</p>', '2018-05-09 17:00:00', NULL),
(5, 4, 1, '<p>Đ&acirc;y l&agrave; comment</p>', '2018-05-09 19:58:18', NULL),
(6, 8, 5, '<p>Ch&uacute;c mừng</p>', '2018-05-12 14:55:28', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer_reviews`
--

CREATE TABLE `customer_reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customer_reviews`
--

INSERT INTO `customer_reviews` (`id`, `name`, `phone`, `email`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Trần Hải Hà', '09887787765', 'haiha@hotmail.com', 'Xin Chào trung tâm, từ khi con tôi tham gia lớp luyện thi đại học của thầy Khương, thành tích của cháu tốt hơn hẳn. Nếu cháu đậu đại học với thành tích cao, tôi sẽ giới thiệu cho bạn bè của tôi về trung tâm. Cảm ơn rất nhiều', NULL, NULL),
(2, 'Nguyễn Hoàng Hải Triều', '0988776655', 'haitrieu@gmail.com', 'Tôi thấy chất lượng trung tâm khá tốt, hi vọng sẽ được làm việc với trung tâm nhiều hơn', NULL, NULL),
(3, 'Đỗ Tuấn Anh', '099912332', NULL, 'Chúc trung tâm có nhiều học viên hơn nữa :))', '2018-05-12 11:42:19', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `exams`
--

CREATE TABLE `exams` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `class_id` int(10) UNSIGNED NOT NULL,
  `question` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_04_25_001647_create_posts_table', 1),
(4, '2018_04_25_002747_create_comments_table', 1),
(5, '2018_04_25_003026_create_specializes_table', 1),
(6, '2018_04_25_003236_create_tutors_table', 1),
(7, '2018_04_25_004314_create_students_table', 1),
(8, '2018_04_25_005121_create_parents_table', 1),
(9, '2018_04_25_005739_create_subject_types_table', 1),
(10, '2018_04_25_005952_create_subjects_table', 1),
(11, '2018_04_25_010445_create_class_s_table', 1),
(12, '2018_04_25_011328_create_studies_table', 1),
(13, '2018_04_25_011551_create_scores_table', 1),
(14, '2018_04_25_011848_create_question_banks_table', 1),
(15, '2018_04_25_012224_create_exams_table', 1),
(16, '2018_04_25_012544_create_study_registers_table', 1),
(17, '2018_04_25_012911_create_tutor_registers_table', 1),
(18, '2018_04_25_013257_create_customer_reviews_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `parents`
--

CREATE TABLE `parents` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `author_id` int(10) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `files` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`id`, `author_id`, `title`, `description`, `content`, `images`, `files`, `type`, `created_at`, `updated_at`) VALUES
(1, 1, 'Bài viết đầu tiên', '<p>Đ&acirc;y l&agrave; b&agrave;o viết đầu ti&ecirc;n, chả c&oacute; g&igrave; đặc biệt</p>', '<p>&quot;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&quot;</p>', 'upload/images/post/news\\31369209_1082634105212560_8349483201575518208_n.jpg', NULL, 0, '2018-05-07 18:12:35', NULL),
(2, 8, 'Obama Thăm các trung tâm gia sư', '<p>Nhận thấy tầm quan trọng trong gi&aacute;o dục học sinh, tổng thống obama đ&atilde; đ&iacute;ch th&acirc;n sang VN để thăm c&aacute;c trung t&acirc;m gia sư tại th&agrave;nh phố Hồ Ch&iacute; Minh</p>', '<h3>The standard Lorem Ipsum passage, used since the 1500s</h3>\r\n\r\n<p>&quot;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&quot;</p>\r\n\r\n<h3>Section 1.10.32 of &quot;de Finibus Bonorum et Malorum&quot;, written by Cicero in 45 BC</h3>\r\n\r\n<p>&quot;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?&quot;</p>\r\n\r\n<h3>1914 translation by H. Rackham</h3>\r\n\r\n<p>&quot;But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?&quot;</p>', 'upload/images/post/news\\1-2-obama-png-image.png', NULL, 0, '2018-05-12 12:17:21', NULL),
(3, 8, 'Tổng Thống obama đến thăm các trung tâm gia sư tại VN', '<p>Nhận thấy sự quan trọng trong gi&aacute;o dục trẻ, Tổng thống Obama đ&atilde; sang thăm c&aacute;c trung t&acirc;m gia sư tại th&agrave;nh phố Hồ Ch&iacute; Minh</p>', '<h3>The standard Lorem Ipsum passage, used since the 1500s</h3>\r\n\r\n<p>&quot;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&quot;</p>\r\n\r\n<h3>Section 1.10.32 of &quot;de Finibus Bonorum et Malorum&quot;, written by Cicero in 45 BC</h3>\r\n\r\n<p>&quot;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?&quot;</p>\r\n\r\n<h3>1914 translation by H. Rackham</h3>\r\n\r\n<p>&quot;But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?&quot;</p>', 'upload/images/post/news\\1-2-obama-png-image.png', NULL, 0, '2018-05-12 12:18:57', NULL),
(4, 8, 'Đây là một bài đăng giả', '<p>&nbsp;</p>\r\n\r\n<p>Where does it come from?</p>', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>', 'upload/images/post/news\\21395677969.jpg', NULL, 0, '2018-05-12 14:27:09', NULL),
(5, 8, 'Chúc mừng sinh nhật lazada 6 năm', '<h2>Where can I get some?</h2>', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', 'upload/images/post/news\\Capture.PNG', NULL, 0, '2018-05-12 14:30:57', NULL),
(6, 8, 'Thành lập CLB tiếng anh tại trung tâm', '<h3>The standard Lorem Ipsum passage, used since the 1500s</h3>\r\n\r\n<p>&quot;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&quot;</p>', '<h3>The standard Lorem Ipsum passage, used since the 1500s</h3>\r\n\r\n<p>&quot;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&quot;</p>', 'upload/images/post/news\\clb.jpg', NULL, 0, '2018-05-12 14:33:16', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `question_banks`
--

CREATE TABLE `question_banks` (
  `id` int(10) UNSIGNED NOT NULL,
  `subject_id` int(10) UNSIGNED NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `correct_answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `incorrect_answer1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `incorrect_answer2` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `incorrect_answer3` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `explain` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `scores`
--

CREATE TABLE `scores` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `subject_id` int(10) UNSIGNED NOT NULL,
  `avg1` double(8,2) DEFAULT NULL,
  `avg2` double(8,2) DEFAULT NULL,
  `avg3` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `scores`
--

INSERT INTO `scores` (`id`, `student_id`, `subject_id`, `avg1`, `avg2`, `avg3`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 12.00, 12.00, 0.00, NULL, NULL),
(2, 2, 1, 12.00, 12.00, 0.00, NULL, NULL),
(3, 3, 2, 3.40, 4.50, 0.00, NULL, NULL),
(4, 4, 2, 6.50, 5.60, 0.00, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `specializes`
--

CREATE TABLE `specializes` (
  `id` int(10) UNSIGNED NOT NULL,
  `specialize` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `specializes`
--

INSERT INTO `specializes` (`id`, `specialize`, `created_at`, `updated_at`) VALUES
(1, 'Gia sư Toán cấp 3', NULL, NULL),
(2, 'Gia sư Lý cấp 3', NULL, NULL),
(3, 'Gia sư Hóa cấp 3', NULL, NULL),
(4, 'Gia sư tin học văn phòng', NULL, NULL),
(5, 'Gia sư Anh văn giao tiếp', NULL, NULL),
(6, 'Gia sư sinh học cấp 3', NULL, NULL),
(7, 'Gia sư ôn thi đại học', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `students`
--

CREATE TABLE `students` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hometown` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sex` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_s` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `students`
--

INSERT INTO `students` (`id`, `name`, `dob`, `address`, `hometown`, `sex`, `phone`, `school`, `class_s`, `avatar`, `created_at`, `updated_at`) VALUES
(1, 'Trần Văn Đạo', '1212-12-12', '12', '121', '1', '12', '12', '12', 'index.png', NULL, NULL),
(2, 'Trần Văn Đạo', '1212-12-12', '12', '121', '1', '12', '12', '12', 'index.png', NULL, NULL),
(3, 'Ngô Anh Tài', '2001-01-08', 'quận 1, hcm', 'HCM', '1', '09778887765', 'THPT Thủ Đức', '12', 'index.png', NULL, NULL),
(4, 'Đỗ Mình Phương', '2001-02-23', 'KTX khu A', 'Nam Định', '0', '0991234637', 'THPT Lý Tự Trọng', '12', 'index.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `studies`
--

CREATE TABLE `studies` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `class_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `study_registers`
--

CREATE TABLE `study_registers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hometown` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sex` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_s` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shift` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avg1` float DEFAULT NULL,
  `avg2` float DEFAULT NULL,
  `subject_id` int(10) UNSIGNED NOT NULL,
  `tutor_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `study_registers`
--

INSERT INTO `study_registers` (`id`, `name`, `dob`, `address`, `hometown`, `sex`, `phone`, `school`, `class_s`, `shift`, `avg1`, `avg2`, `subject_id`, `tutor_id`, `created_at`, `updated_at`) VALUES
(2, 'Lê Phương Ngọc Anh', '2001-01-01', 'Di Linh', 'Bình Thuận', '0', '0999876671', 'THPT Di Linh', '12', 'Thứ 2-4-6, 7h đến 9h tối', 5.5, 5.4, 1, NULL, NULL, NULL),
(3, 'Vương Thị Tú Oanh', '2002-03-04', 'KTX xã hội hóa', 'Cần Thơ', '0', '1463680546', 'THPT Lý Tự Trọng', '11', 'Thứ 3-5-7, 17h-21h', 3.4, 5.4, 2, NULL, NULL, NULL),
(4, 'Ngô Thị Hồng Thắm', '2010-02-01', 'Linh Trung, Thủ Đức', 'HCM', '0', '0678846693', 'TH Thủ Đức', '5', 'thứ 3-5-7, 17h-21h', 6.5, 7.1, 5, NULL, NULL, NULL),
(5, 'Ninh Đình Phúc', '2007-01-02', '97984 Grover Drive', 'Hà Nội', '1', '4322748422', 'THCS Phúc Đức', '7', 'Thứ 2: 7h, Thứ 6: 5h, thứ 7, cn: 8h', 5.5, 5.4, 6, NULL, NULL, NULL),
(6, 'Phan Thị Anh Quỳnh', '2001-01-01', '144 Đường số 114, Quận 9, TPHCM', 'HCM', '0', '0156075881', 'THPT Lý Tự Trọng', '12', 'thứ 3-5-7, 17h-21h', 6.5, 6.5, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `subjects`
--

CREATE TABLE `subjects` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_type` int(10) UNSIGNED NOT NULL,
  `state` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `subject_type`, `state`, `created_at`, `updated_at`) VALUES
(1, 'Toán 12', 1, 1, '2018-05-04 17:54:10', NULL),
(2, 'Toán 11', 1, 1, '2018-05-04 17:54:24', NULL),
(3, 'Văn 11', 4, 1, '2018-05-04 17:54:51', NULL),
(4, 'Hóa 11', 3, 1, '2018-05-04 17:55:00', NULL),
(5, 'Toán 5', 1, 1, '2018-05-12 10:58:14', NULL),
(6, 'Vật lý 7', 2, 1, '2018-05-12 11:01:24', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `subject_types`
--

CREATE TABLE `subject_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `subject_types`
--

INSERT INTO `subject_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Toán học', NULL, NULL),
(2, 'Vật lý', NULL, NULL),
(3, 'Hóa học', NULL, NULL),
(4, 'Văn học', NULL, NULL),
(5, 'Sinh học', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tutors`
--

CREATE TABLE `tutors` (
  `id` int(10) UNSIGNED NOT NULL,
  `s_id` int(10) UNSIGNED NOT NULL,
  `achievement` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `point` double(8,2) NOT NULL,
  `count` int(11) NOT NULL,
  `num_class` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tutors`
--

INSERT INTO `tutors` (`id`, `s_id`, `achievement`, `user_id`, `point`, `count`, `num_class`, `created_at`, `updated_at`) VALUES
(2, 2, 'asdasd', 7, 0.00, 0, 0, NULL, NULL),
(3, 2, 'Chuyên lý', 9, 0.00, 0, 0, NULL, NULL),
(4, 7, NULL, 10, 0.00, 0, 0, NULL, NULL),
(5, 1, 'Chuyên toán, giải 3 cấp tỉnh', 11, 0.00, 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tutor_registers`
--

CREATE TABLE `tutor_registers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hometown` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sex` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specialize_id` int(10) UNSIGNED NOT NULL,
  `achievements` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tutor_registers`
--

INSERT INTO `tutor_registers` (`id`, `name`, `dob`, `address`, `hometown`, `sex`, `phone`, `email`, `school`, `specialize_id`, `achievements`, `created_at`, `updated_at`) VALUES
(3, 'Sỳ Nghi Bình', '1998-10-02', 'Liên Đầm', 'Thanh Hóa', '0', '09887675543', 'nghibinh@gmail.com', 'Đại học Ngân hàng TP HCM', 5, 'IELTS 7.2', '2018-05-12 10:00:02', NULL),
(4, 'Nguyễn Thị Kim Thoa', '1998-02-03', 'Bảo Lộc', 'Tiền Giang', '0', '01237882736', 'kimthoa@hotmail.com', 'Đại Học Sài Gòn', 5, 'TOIEC 900', '2018-05-12 10:03:45', NULL),
(5, 'Trịnh Đức Tuấn', '1980-12-31', '33 Hanson Point', 'USA', '1', '9232573423', 'svampouille3@ucoz.com', 'harvard', 7, NULL, '2018-05-12 10:05:20', NULL),
(6, 'Đặng Thị Thu Hương', '1990-12-02', 'KTX khu A', 'Đà Lạt', '0', '0181909278', 'fcossington1@nba.com', 'Đại học Kinh Tế', 4, NULL, '2018-05-12 10:07:03', NULL),
(8, 'Nguyễn Thị Thu Thủy', '1999-09-08', 'quận 1, hcm', 'HCM', '0', '8031170002', 'thuthuy@gmail.com', 'Đại học Kinh Tế', 2, NULL, '2018-05-12 10:10:06', NULL),
(9, 'Nguyễn Đức Thắng', '1998-10-02', 'Di Linh', 'Hà Nội', '1', '09475887341', 'ducthang@gmail.com', 'Đại học Nông Lâm', 4, 'Giải 3 tin học văn phòng', '2018-05-12 10:11:25', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hometown` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sex` int(11) NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` tinyint(1) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `dob`, `address`, `hometown`, `sex`, `phone`, `email`, `avatar`, `type`, `username`, `password`, `state`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Hoàng Công Lý', '1993-03-01', 'HCM', 'HCM', 1, '0987654321', 'libach202@hotmail.com', 'C13009A1-77CF-43FA-B9F9-9A79E6617D81.jpeg', 2, 'congly1311', '$2y$10$THmSEmgsZuW4g5UO0/T8FOSAj3gxlcQXXqUny8qo.fOsNTJpyurge', 1, 'TVnu1oduwgBFuSm7rhKBE11ihg6eMzktNCYydChaxyl5y60uOgckE98OV8sg', NULL, NULL),
(2, 'Nguyễn Kỳ Duyên', '1998-12-01', 'HCM', 'HCM', 0, '0987654321', 'wurpro@gmail.com', 'C13009A1-77CF-43FA-B9F9-9A79E6617D81.jpeg', 2, 'kyduyen123', '$2y$10$6tB/1hZe.vuQqbTuE0yA.O5d5OK5eIT/vKVpkQ6KhqXkiBBTIgJZa', 1, NULL, '2018-05-04 15:54:05', NULL),
(3, 'Dương Quá', '1998-12-01', 'HCM', 'Dương Châu', 1, '0987654321', 'wurpro@gmail.com', 'C13009A1-77CF-43FA-B9F9-9A79E6617D81.jpeg', 2, 'duongqua', '$2y$10$TIkqSRUekYch3u0s9.qiyeyaNi4P6KpKujdEXpKl1vqeWnr7KgieS', 1, NULL, '2018-05-04 16:02:34', NULL),
(4, 'Nghi BInh', '1998-11-13', 'HCM', 'Liên Đầm', 0, '0987654321', 'libach202@hotmail.com', 'C:\\xampp\\tmp\\php1922.tmp', 1, 'baruver', '$2y$10$IAhGYmYlG58mwArKLA7S5.yhKa7A2CRhY3VsIFEoZ/99RgBmUTKJO', 1, 'I8Zefo0CJbqVfnNrjSkdjtms647teZNAiaBezboRfxhXmeIBMsumgi4RMF5A', NULL, NULL),
(7, 'Nguyễn Kỳ Duyên', '2223-02-01', 'HCM', 'HCM', 0, '0987654331', 'sadasdsad@gamil.ds', 'index.png', 0, 'nguyen_ky_duyen', '$2y$10$WaiwBU3QkaE90ce3Zpccqe.ybYulCQM7R6A1aXgB6JQckr7tQ3TeO', 1, NULL, NULL, NULL),
(8, 'Sỳ Nghi Bình', '1998-11-13', 'HCM', 'HCM', 0, '1234567890', 'libach202@hotmail.com', 'upload/images/user/avatar\\31488528_956981631133542_8411825549525123072_n.jpg', 1, 'cankuro.19', '$2y$10$YjrKdI2BAjFZ7RWPLaq1K.PyrkFAn.Lsu5whJcqGiN.24yYx9leZe', 1, '3v4d3d3rLF7Krx9eZNZGQ5l1c7HNvhrberVA2wKNMRoAa2aC6mEpMiV3dWWX', NULL, NULL),
(9, 'Charlton Mully', '1996-01-01', '1 Garrison Trail', '1320 Fordem Street', 0, '4133682106', 'cmully0@wikipedia.org', 'index.png', 0, 'charlton_mully', '$2y$10$Q3DkGuczZvlXrtehbNtcxun1Hb7jBLbpsQ6YDx0B0BWGt/GbZdrVu', 1, NULL, NULL, NULL),
(10, 'Phạm Thị Thanh Huyền', '1997-08-09', 'KTX khu A', 'Hà Nội', 0, '2569766739', 'thanhhuyen@abc.com', 'index.png', 0, 'pham_thi_thanh_huyen', '$2y$10$wCqulQdcWvLhgltt.rqgPuDKUX2zFa6.dxxFDcGjjqtcBtT/PPXt2', 1, NULL, NULL, NULL),
(11, 'Judas Walsh', '1999-06-02', '041 Lotheville Lane', '98145 Hanson Alley', 0, '8729481244', 'jwalsh0@dailymail.co.uk', 'index.png', 0, 'judas_walsh', '$2y$10$KUdIIa0SNGw5LyUFYRFrJOnNpu.1lMF5Yqaw2hrb76Zx.MRR2LwZG', 1, NULL, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `class_s`
--
ALTER TABLE `class_s`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_s_tutor_id_foreign` (`tutor_id`),
  ADD KEY `class_s_subject_id_foreign` (`subject_id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_author_id_foreign` (`author_id`),
  ADD KEY `comments_post_id_foreign` (`post_id`);

--
-- Chỉ mục cho bảng `customer_reviews`
--
ALTER TABLE `customer_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exams_student_id_foreign` (`student_id`),
  ADD KEY `exams_class_id_foreign` (`class_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parents_student_id_foreign` (`student_id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_author_id_foreign` (`author_id`);

--
-- Chỉ mục cho bảng `question_banks`
--
ALTER TABLE `question_banks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_banks_subject_id_foreign` (`subject_id`);

--
-- Chỉ mục cho bảng `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `scores_student_id_foreign` (`student_id`),
  ADD KEY `scores_subject_id_foreign` (`subject_id`);

--
-- Chỉ mục cho bảng `specializes`
--
ALTER TABLE `specializes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `studies`
--
ALTER TABLE `studies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `studies_student_id_foreign` (`student_id`),
  ADD KEY `studies_class_id_foreign` (`class_id`);

--
-- Chỉ mục cho bảng `study_registers`
--
ALTER TABLE `study_registers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `study_registers_subject_id_foreign` (`subject_id`),
  ADD KEY `study_registers_tutor_id_foreign` (`tutor_id`);

--
-- Chỉ mục cho bảng `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subjects_subject_type_foreign` (`subject_type`);

--
-- Chỉ mục cho bảng `subject_types`
--
ALTER TABLE `subject_types`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tutors`
--
ALTER TABLE `tutors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tutors_s_id_foreign` (`s_id`),
  ADD KEY `tutors_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `tutor_registers`
--
ALTER TABLE `tutor_registers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tutor_registers_specialize_id_foreign` (`specialize_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `class_s`
--
ALTER TABLE `class_s`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `customer_reviews`
--
ALTER TABLE `customer_reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `exams`
--
ALTER TABLE `exams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `parents`
--
ALTER TABLE `parents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `question_banks`
--
ALTER TABLE `question_banks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `scores`
--
ALTER TABLE `scores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `specializes`
--
ALTER TABLE `specializes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `studies`
--
ALTER TABLE `studies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `study_registers`
--
ALTER TABLE `study_registers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `subject_types`
--
ALTER TABLE `subject_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tutors`
--
ALTER TABLE `tutors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tutor_registers`
--
ALTER TABLE `tutor_registers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `class_s`
--
ALTER TABLE `class_s`
  ADD CONSTRAINT `class_s_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `class_s_tutor_id_foreign` FOREIGN KEY (`tutor_id`) REFERENCES `tutors` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `exams`
--
ALTER TABLE `exams`
  ADD CONSTRAINT `exams_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `class_s` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `exams_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `parents`
--
ALTER TABLE `parents`
  ADD CONSTRAINT `parents_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `question_banks`
--
ALTER TABLE `question_banks`
  ADD CONSTRAINT `question_banks_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `scores`
--
ALTER TABLE `scores`
  ADD CONSTRAINT `scores_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `scores_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `studies`
--
ALTER TABLE `studies`
  ADD CONSTRAINT `studies_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `class_s` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `studies_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `study_registers`
--
ALTER TABLE `study_registers`
  ADD CONSTRAINT `study_registers_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `study_registers_tutor_id_foreign` FOREIGN KEY (`tutor_id`) REFERENCES `tutors` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_subject_type_foreign` FOREIGN KEY (`subject_type`) REFERENCES `subject_types` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tutors`
--
ALTER TABLE `tutors`
  ADD CONSTRAINT `tutors_s_id_foreign` FOREIGN KEY (`s_id`) REFERENCES `specializes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tutors_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tutor_registers`
--
ALTER TABLE `tutor_registers`
  ADD CONSTRAINT `tutor_registers_specialize_id_foreign` FOREIGN KEY (`specialize_id`) REFERENCES `specializes` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
