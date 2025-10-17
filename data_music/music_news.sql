-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 17, 2025 lúc 07:46 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `music_news`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`, `image`) VALUES
(9, 'Nhạc pop', 'nhac-pop', '2025-04-16 19:00:16', '2025-05-07 10:01:54', ''),
(10, 'Nhạc rap', 'nhac-rap', '2025-04-16 19:00:16', '2025-04-16 19:00:16', NULL),
(12, 'Nhạc Jazz', 'nhac-jazz', '2025-04-25 08:37:27', '2025-04-25 08:37:27', NULL),
(13, 'Nhạc R&B', 'nhac-rb', '2025-04-25 08:37:46', '2025-04-25 08:37:46', NULL),
(14, 'Nhạc Ballad', 'nhac-ballad', '2025-04-25 08:38:05', '2025-04-25 08:38:05', NULL),
(15, 'Nhạc EDM', 'nhac-edm', '2025-04-25 08:38:38', '2025-04-25 08:38:38', NULL),
(16, 'Nhạc Love', 'nhac-love', '2025-04-25 08:39:10', '2025-04-25 08:39:10', NULL),
(17, 'Nhạc Blues', 'nhac-blues', '2025-04-25 08:39:27', '2025-04-25 08:39:27', NULL),
(18, 'Nhạc Dance', 'nhac-dance', '2025-04-25 08:39:44', '2025-04-25 08:39:44', NULL),
(19, 'Nhạc Acoustic', 'nhac-acoustic', '2025-04-25 08:39:59', '2025-04-25 08:39:59', NULL),
(20, 'Nhạc trẻ sung', 'nhac-tre-sung', '2025-04-27 07:29:16', '2025-05-07 10:05:05', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `news_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `news_id`, `user_id`, `content`, `created_at`, `updated_at`) VALUES
(3, 2, 6, 'Sương đẹp trai quá', '2025-04-23 19:10:11', '2025-05-15 03:45:16'),
(4, 2, 5, 'Chỉ cần có bray thì tôi sẽ không bỏ lỡ tập nào', '2025-04-23 19:36:34', '2025-04-23 19:36:34'),
(5, 1, 5, 'Tôi yêu chị Taylor Swift', '2025-04-26 04:25:42', '2025-04-26 04:25:42'),
(6, 8, 5, 'Hay mà', '2025-04-27 07:50:11', '2025-04-27 07:50:11'),
(7, 9, 5, 'hahha', '2025-04-27 08:23:48', '2025-04-27 08:23:48'),
(9, 9, 8, 'Nhạc hay quá à ;)) hy vọng tôi cũng có một em ghệ mới để đi chơi', '2025-05-05 05:35:09', '2025-05-15 03:51:50'),
(10, 10, 5, 'Chị gái à sao chị đẹp thế💓💓💓💓💓💓. You so Pretty', '2025-05-05 11:14:06', '2025-05-15 03:53:40'),
(11, 7, 9, 'hay nha bro', '2025-05-07 08:12:28', '2025-05-07 08:12:44'),
(12, 10, 9, 'girl đâu mà xinh thế nhợ.', '2025-05-07 08:14:15', '2025-05-07 08:14:15'),
(13, 10, 11, 'Chị này đẹp yoh  ( ˘ ³˘) 💕', '2025-05-07 17:45:40', '2025-05-07 18:36:19'),
(14, 5, 6, 'Tôi yêu nhạc của chị ấy, Laufey your music is so good. ❤️❤️❤️❤️❤️❤️❤️❤️❤️', '2025-05-07 18:29:06', '2025-05-07 18:29:06'),
(15, 5, 5, '🎀🫶🏻💌💓', '2025-05-07 18:31:25', '2025-05-07 18:31:25'),
(16, 201, 5, 'Bài hay quá trời, tôi nghe nó cả ngày ko chán luôn', '2025-05-16 01:44:14', '2025-05-16 01:44:14'),
(19, 202, 5, 'Anh trai đẹp chai quá hà', '2025-05-25 06:12:58', '2025-05-25 06:12:58'),
(20, 205, 5, 'Trong MV chỉ thương bạn แคลร์ (Claire), sẳn sang ngốc nghếch để được ở cạnh người mình thích, người mình yêu. Nhưng cái kết lại ko trọn vẹn với sự đánh đổi chị ấy đã làm với anh zai อันดับแรก (First). Thật buồn cho một mối tình. 😞😖😖', '2025-06-05 02:12:33', '2025-06-05 02:12:33'),
(21, 12, 5, 'The king of best OG pop US-UK', '2025-06-05 17:25:12', '2025-06-05 17:25:12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mediable_type` varchar(255) NOT NULL,
  `mediable_id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_04_17_011402_create_categories_table', 2),
(6, '2025_04_17_014628_create_news_table', 3),
(7, '2025_04_17_031636_create_comments_table', 4),
(8, '2025_04_23_152101_add_is_featured_to_news_table', 5),
(9, '2025_04_24_022352_add_image_to_categories_table', 6),
(10, '2025_04_25_155816_add_avatar_to_users_table', 7),
(11, '2025_04_26_135557_add_role_to_users_table', 8),
(12, '2025_04_26_140216_add_is_admin_to_users_table', 9),
(13, '2025_04_27_144223_create_media_table', 10),
(15, '2025_04_27_150112_add_audio_and_video_to_news_table', 11);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `summary` text NOT NULL,
  `content` longtext NOT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `audio` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `audio_url` varchar(255) DEFAULT NULL,
  `video_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `category_id`, `title`, `slug`, `summary`, `content`, `views`, `is_featured`, `image`, `created_at`, `updated_at`, `audio`, `video`, `audio_url`, `video_url`) VALUES
(1, 9, 'Khi siêu sao nhạc Pop trở thành \"CEO\" có tầm ảnh hưởng nhất năm 2023', 'Taylor-Swift-pop-hot', 'Thế giới\r\nKhi siêu sao nhạc Pop trở thành \"CEO\" có tầm ảnh hưởng nhất năm 2023\r\nHải Miên Thứ Ba | 09/01/2024 10:47\r\n   \r\nNữ ca sĩ Taylor Swift. Ảnh: Getty Images.\r\nNăm 2023, nữ ca sĩ Taylor Swift đã đạt được những thành tích đáng chú ý, không hề thua kém bất kỳ nhà lãnh đạo doanh nghiệp nào thuộc top Fortune 500.', 'Taylor Swift: Từ siêu sao nhạc pop đến biểu tượng doanh nhân toàn cầu\r\n\r\nTheo trang CNN, năm 2023 đã chứng kiến một cuộc “xâm lăng mềm” toàn diện của Taylor Swift trên cả mặt trận nghệ thuật lẫn kinh doanh. Không chỉ là một trong những nghệ sĩ có ảnh hưởng nhất thập kỷ, cô còn chứng minh rằng sức mạnh văn hóa đại chúng hoàn toàn có thể song hành cùng tư duy quản trị và chiến lược kinh doanh sắc sảo.\r\n\r\n“The Eras Tour”: Không chỉ là một chuyến lưu diễn\r\nChuyến lưu diễn “The Eras Tour” không đơn thuần là một sự kiện âm nhạc – đó là một hiện tượng kinh tế. Tour diễn này đã lập kỷ lục khi bán hết sạch vé tại hàng chục sân vận động chỉ trong vài giờ mở bán. Theo dữ liệu từ Pollstar, “The Eras Tour” đã thu về hơn 1 tỷ USD, trở thành tour diễn có doanh thu cao nhất mọi thời đại, vượt qua những cái tên kỳ cựu như Elton John và U2.\r\n\r\nĐiều đáng chú ý là Swift không chỉ biểu diễn – cô nắm quyền kiểm soát toàn bộ khâu sáng tạo, sản xuất, marketing và thương mại hóa, bao gồm cả việc thiết kế concept cho từng chặng diễn để phản ánh từng “kỷ nguyên” trong sự nghiệp của mình.\r\n\r\nTư duy kinh doanh và sự kiểm soát tuyệt đối\r\nTaylor Swift là một trong những nghệ sĩ hiếm hoi sở hữu quyền sở hữu trí tuệ gần như toàn bộ các sản phẩm âm nhạc của mình. Việc tái thu âm và phát hành lại các album dưới dạng “Taylor’s Version” không chỉ là động thái đòi lại quyền sở hữu nghệ thuật mà còn là một chiến lược kinh doanh táo bạo giúp cô làm mới kho tàng âm nhạc cũ và mở rộng đối tượng khán giả.\r\n\r\nCô kiểm soát hình ảnh thương hiệu một cách nghiêm ngặt, từ thiết kế sản phẩm, giá vé, chiến dịch truyền thông, cho đến trải nghiệm của người hâm mộ – mọi thứ đều được lên kế hoạch chi tiết, nhất quán và tạo ra giá trị gia tăng liên tục.\r\n\r\nẢnh hưởng xã hội và kinh tế sâu rộng\r\nSwift đã tạo ra “hiệu ứng Taylor Swift” trong kinh tế địa phương: tại mỗi nơi cô đặt chân đến, các thành phố chứng kiến sự gia tăng mạnh mẽ về doanh thu du lịch, khách sạn, nhà hàng và dịch vụ. Theo Cục Dự trữ Liên bang Philadelphia, tour diễn của cô đã giúp cải thiện chỉ số kinh tế khu vực trong quý II năm 2023 – điều hiếm thấy đối với một cá nhân không làm trong lĩnh vực chính trị hay tài chính.\r\n\r\nBên cạnh đó, bộ phim tài liệu “Taylor Swift: The Eras Tour” đã thu về hơn 90 triệu USD ngay trong tuần đầu công chiếu tại Bắc Mỹ, trở thành bộ phim concert có doanh thu mở màn cao nhất mọi thời đại.\r\n\r\nVinh danh xứng đáng\r\nVới tất cả những thành tích kể trên, CNN Business đã vinh danh Taylor Swift là “CEO của năm 2023”, vượt qua hàng loạt CEO của các tập đoàn lớn. Không chỉ bởi cô là một nhà sáng tạo, mà còn bởi khả năng điều hành một đế chế toàn cầu với hàng triệu người hâm mộ – những người không chỉ nghe nhạc mà còn “sống cùng thương hiệu Taylor Swift”.\r\n\r\nÔng Armen Shaomian, phó giáo sư quản lý thể thao và giải trí tại Đại học Nam Carolina nhận định:\r\n\r\n“Cô ấy là ví dụ điển hình cho thế hệ doanh nhân mới – không cần văn phòng, không cần công ty truyền thống, chỉ cần tầm nhìn và một lượng người tin tưởng tuyệt đối.”\r\n\r\nTaylor Swift không còn là một nghệ sĩ đơn thuần – cô là một hiện tượng kinh doanh, một nhà lãnh đạo tinh thần và là minh chứng rõ ràng nhất cho câu nói: nghệ thuật có thể tạo ra giá trị vượt xa sân khấu.', 161, 0, 'news/vdnIaNTXlbAeAfchz5tAGuBeuyGiQYW1fI2JyWML.jpg', '2025-04-16 19:34:25', '2025-05-16 00:17:10', NULL, NULL, NULL, NULL),
(2, 10, 'Rap Việt mùa 4: B Ray đối đầu trực diện với Karik', 'rap-viet-mua4-moi', 'CoolKid và Young Puppy mang đến không khí dễ thương với \"Love somebody\".', 'Trước đêm thi, B Ray tự tin cho biết đã đã chuẩn bị các \"bom tấn\" để đối đầu với Karik. \"Làm tốt hơn những gì Karik đã làm\" là mục tiêu của B Ray trong trận đấu lần này.\r\n\r\nVới chủ đề gia đình, khai thác từ điểm bắt đầu đến kết thúc, bốn tiết mục của các chiến binh đội B Ray mang đến những màu sắc riêng như: tình yêu, đám cưới, sinh con và tuổi già.\r\n\r\n\"Một người ngạo nghễ như B Ray mà chỉ làm chủ đề gia đình, em không tin\", Suboi tuyên bố.\r\n\r\nTuy nhiên, B Ray đã mang đến nhiều bất ngờ với chiến thuật của mình.\r\n\r\nCoolKid và Young Puppy là cặp đấu đầu tiên trong Rap Việt mùa 4 tập 10. Cả hai mang đến tiết mục mở màn đầy mộng mơ tình yêu tuổi trẻ với ca khúc \"Love somebody\".\r\n\r\nHLV B Ray cho biết mình muốn thực hiện một ca khúc \"đánh\" vào thế hệ gen Z để thể hiện được chuẩn hệ tư tưởng \"socola kẹo mút\" từng rất thành công tại Rap Việt mùa trước.\r\n\r\nTrong đó CoolKid hóa thành chàng trai quyết tâm cưa đổ Young Puppy - cô gái đỏng đảnh.\r\n\r\nVới phần bình chọn từ khán giả trường quay, CoolKid và Young Puppy lần lượt nhận về 59% và 41% bình chọn.\r\n\r\nSau cùng, giám khảo chọn CoolKid là người đi tiếp, Young Puppy là người bước vào vòng 8bar (vòng giải cứu).', 146, 0, 'news/g2zGeA3BbiM3qo1ChN6nTWktduZlLZdtcVVzr7FG.jpg', '2025-04-16 19:34:25', '2025-05-18 06:24:36', NULL, NULL, NULL, NULL),
(5, 12, 'Laufey - Phép thuật âm nhạc của băng đảo Iceland', 'laufey-jazz-hot', 'Laufey, ngôi sao nhạc jazz của băng đảo Iceland nổi tiếng nhanh chóng nhờ Tiktok. Bản hit From the start (Điểm khởi đầu) lôi cuốn giới trẻ nhờ chất liệu jazz-pop hiện đại. Năm 2024, Laufey đoạt giải Grammy Album pop truyền thống xuất sắc nhất cho album Bewitched (Phép thuật).', 'Từ hòn đảo Iceland vươn ra thế giớp pop toàn cầu\r\nSinh ra và lớn lên tại Iceland, hòn đảo có khí hậu khắc nghiệt nhất châu Âu, Laufey thu hút lượng lớn fan khắp toàn cầu nhờ mạng xã hội. Ca sỹ sinh năm 2000 có tới 2,8 triệu lượt theo dõi trên Tiktok và 1,4 triệu người theo dõi trên Instagram. Laufey chia sẻ : “Tôi lớn lên tại Iceland, một hòn đảo xa xôi. Tôi đến trường Berklee, Mỹ để được đào tạo bài bản về nhạc. Mặc dù Tiktok không phải là cách lãng mạn nhất để khuyếch trương âm nhạc, nhưng không có cách trực tiếp nào kết nối tôi vớinền công nghiệp âm nhạc. Mạng xã hội giúp cho tôi có cơ hội được cả thế giới biết đến. Tôi biết ơn điều đó”.  \r\n\r\nLaufey xuất thân từ gia đình giàu truyền thống âm nhạc, mẹ cô là nhạc công violin cổ điển gốc Trung Quốc và ông bà ngoại cô đều là nhạc công. Do vậy, nhạc cổ điển là nền tảng âm nhạc chính của gia đình và thú vị hơn, jazz là thể loại ưa thích của cha cô, người gốc Iceland. Môi trường âm nhạc nuôi dưỡng tâm hồn và tài năng cô từ rất sớm. Khi 2 tuổi, cô được tặng cây violon, học piano năm 4 tuổi và học chơi cello từ rất sớm.\r\n\r\nCha mẹ cô rất khuyến khích Laufey theo đuổi con đường âm nhạc vì họ dịch chuyển thường xuyên giữa Washington (Mỹ) và London (Anh Quốc). Họ luôn tin tưởng con gái mình trở thành ca sỹ nổi tiếng. Đặc biệt, mẹ cô truyền cảm hứng cho Laufey theo đuổi giấc mơ âm nhạc. Năm 2014, cô tham gia chương trình phát hiện tài năng Ísland got talent và lọt vào bán kết. Năm 15 tuổi, cô đã chơi solo cello cho dàn nhạc giao hưởng Iceland. Cô theo học trường nhạc danh tiếng Berklee College of Music và tốt nghiệp năm 2021. Trước đó, năm 2020, cô tung ra đĩa đơn đầu tay Street by street và album ngắn (EP) - Typical of me (Điển hình của tôi) nhận được lời khen ngợi của giới phê bình như tạp chí âm nhạc uy tín Rolling Stone.\r\n\r\nĐịnh hình con đường âm nhạc\r\nKhi còn là cô bé 14 tuổi, giọng hát Laufey được đánh giá già giặn, màu hơi tối như các giọng ca kinh điển thế hệ trước. Cô thấy mình khác biệt với bạn bè cùng trang lứa do pha trộn hai dòng máu Iceland và Trung Quốc. Với nền tảng nhạc cổ điển sẵn có, Laufey luôn đắn đo theo đuổi dòng nhạc pha trộn giữa pop và jazz. Trường nhạc Berklee đã giúp cô thay đổi tư duy, quên đi lối mòn cũ và chuyển hướng theo sở thích cá nhân. Nữ ca sỹ đã khám phá ra tiềm năng, mức độ phù hợp với jazz-pop.\r\n\r\nCô có bước đột phá trong sự nghiệp với album đầu tay năm 2022 - Everything I know about love (Tất cả những điều em biết về tình yêu). Album đầu tay là bệ phóng giúp cô có lượng fan hâm mộ đông đảo nhờ ca từ pop hiện đại kết hợp giọng jazz cổ điển gợi nhớ  tượng đài như Ella Fitzgerald và Chet Baker. Laufey học tập hình mẫu ca sỹ - nhạc sỹ toàn năng, Taylor Swift hay Carole King là nguồn cảm hứng cho sự nghiệp. “Họ là những nữ nghệ sỹ có thể kể chuyện rất tốt bằng âm nhạc.”\r\n\r\nThay vì chờ đợi tìm cảm hứng đánh thức giác quan sáng tác, Laufey rèn luyện sống kỷ luật để sáng tác nhạc thường xuyên. Cô cho rằng nhạc sỹ có thể tự rèn luyện để thấy cảm hứng liên tục, đó là công cụ vĩ đại nhất trở thành nhạc sỹ chuyên nghiệp. Sau thế hệ Bjork thập niên 1980-1990, Laufey được coi niềm tự hào của băng đảo nhờ sức lan tỏa mãnh liệt. Ở góc độ khác, cô luôn tự hào dòng máu châu Á và kết nối với cộng đồng châu Á : “Tôi có rất nhiều fan châu Á và rõ ràng, trong văn hóa pop đại chúng có khoảng trống rất lớn cho những đứa trẻ châu Á như tôi. Tôi luôn nói rằng trở thành ca sỹ-nhạc sỹ là điều tôi muốn và cần phải như vậy”.\r\n\r\nAlbum vàng năm 2024 -Phép thuật (Bewitched)\r\nNhờ đòn bẩy của album đầu tay, album phòng thu thứ hai của Laufey làm nên chuyện lớn tại giải Grammy 2024. Thế giới tình yêu mộng mơ, hy vọng bất tận trong album Bewitched đoạt giải album Pop truyền thống xuất sắc nhất. Điều này chứng tỏ nỗ lực phi thường của cô gái trẻ tài năng 24 tuổi xứ băng đảo. Âm nhạc trong album là sự pha trộn hoàn hảo giữa jazz, pop và nhạc cổ điển. Nội dung album đề cập tâm trạng đang yêu, phải lòng ai đó của cô gái mang dòng máu lai.\r\n\r\nCa khúc mở đầu Dreamer (Kẻ mộng mơ) là bản nhạc có giai điệu tươi sáng “Không chàng trai nào đủ thông minh/ Để thử và làm tan vỡ trái tim bằng sứ của tôi.” Tiếp sau đó, cô chiêu đãi một loạt ca khúc ở nhiều trạng trái khi yêu khác nhau từ Must be love, Serendipity. Đặc biệt trong bài Lovesick (Tương tư), Laufey ko ngần ngại thổ lộ mặt tối của trải nghiệm đang yêu. Trái tim tan vỡ được thể hiện theo cách mới mẻ trong nhịp điệu piano, guitar rất cổ điển. Thông qua chất liệu pop, cô tô vẽ mãnh liệt tâm trạng đang yêu và nhớ nhung.\r\n\r\nĐối với Laufey, âm nhạc không bao giờ từ bỏ mọi giác quan khám phá bất kể tình huống đau khổ mức nào. Kỹ thuật thanh nhạc lẫn kiểm soát làn hơi gợi nhớ nữ minh tinh màn bạc Judy Garland (trong phim A star is born - Một ngôi sao ra đời). Ca khúc Letter to My 13 Year Old Self (Lá thư gửi tôi 13 tuổi) là bản nhạc đầy hồi ức thanh xuân mà Laufey ưa thích nhất trong album.\r\n\r\nFrom the start (Từ điểm xuất phát) là bản hit màu sắc tươi sáng, có sức lan tỏa mạnh mẽ trên mạng xã hội nhờ giai điệu bắt tai, lịch lãm. While you were sleeping (Khi anh đang ngủ) quay về pop ballad ngọt ngào như bộ phim lãng mạn tình cảm cùng tên. Chất giọng nhẹ nhàng của Laufey phù hợp với nhiều thể loại. Kết hợp với kỹ năng sáng tác, cô chiêu đãi khán giả nhiều món ăn tinh thần tinh tế. “Sáng tác nhạc như ghi chép lại nhật ký cuộc đời tôi. Tất cả những ca khúc đều là trải nghiệm cá nhân, có đôi chút phóng đại. Nếu tôi cảm thấy buồn bã, sáng tác một ca khúc như miếng băng bó vết thương, hỗ trợ tinh thần.”\r\n\r\nĐáng chú ý, ca khúc chủ đề - Bewitched - có thể coi là thỏi nam châm xuất sắc nhất album. Bài hát cô đọng nhất gu âm nhạc của Laufey, nhạc cổ điển và jazz, giọng hát mượt như nhung tán tỉnh giác quan của khán giả. Rõ ràng Laufey chịu ảnh hưởng khá lớn của Taylor Swift khi muốn thoát khỏi một khuôn mẫu, không phải jazz, ko phải nhạc cổ điển.\r\n\r\nỞ một góc độ khác, Laufey lại đưa người nghe trở về thập niên 1930-1940 với bản nhạc jazz hơi hướng cổ điển như Ella Fitzgerald hay Billie Holiday trong It happended to me (Điều xảy ra với em). Tương tự, Misty (Mịt mù) cũng là bản nhạc kinh điển do nghệ sỹ piano Errol Garner sáng tác nhạc, lời do Johny Burke viết. Không phải lần đầu Laufey hát lại ca khúc này theo chuẩn mực jazz cổ điển, ngân nga và phiêu linh điển hình. Nữ ca sỹ rất tâm đắc với bản nhạc nên đã ghi âm như bản gốc với piano, bass và trống.\r\n\r\nAlbum Bewitched (Phép thuật) giúp Laufey thực hiện ước mơ trở thành người kể chuyện thông minh qua âm nhạc. Quan trọng hơn, cô giúp thế hệ trẻ, Gen Z tiệm cận gần với phong cách jazz hiện đại pha lẫn nhạc cổ điển và pop.\r\n\r\n(Theo Rolling stone, Pitchfork, Elle, Havard Crimson)', 133, 0, 'news/GQ3ivnaEpMR46dlBd92p1Vgloh0GGOy1Q4NzfNcY.jpg', '2025-04-25 08:41:24', '2025-09-29 01:18:58', NULL, NULL, NULL, NULL),
(6, 10, 'Ngắn và Robber tạo \"cơn địa chấn\"', 'ngan-rober-mua4-moi', 'Sau câu chuyện tình yêu tuổi trẻ, cặp đấu Ram C và Vlary mang đến một lễ đường hạnh phúc với bản nhạc \"Nếu không có gì thay đổi\".\r\n\r\nKhách mời Hiếu Thứ Hai bày tỏ ấn tượng với phản ứng hóa học của hai thí sinh và nhận định đây sẽ là ca khúc tạo hiệu ứng sau khi phát hành.\r\n\r\nKết quả, RamC đã nhận được 55% bình chọn từ khán giả và tiến thẳng vào vòng sau theo lựa chọn của 2 giám khảo.', 'Ở tiết mục thứ ba trong Rap Việt mùa 4 tập 10, B Ray sắp xếp hai thí sinh khá chênh lệch là \"gà chiến\" Gill và nhân tố mới - em út Icy Famou$ mới chỉ 17 tuổi đối đầu.\r\n\r\nNói về quyết định của mình, HLV B Ray muốn Gill thử thách bản thân, làm cái gì đó mới mẻ so với những gì anh đã tính toán.\r\n\r\n\"Gill đã sẵn sàng tâm thế để đấu với người ngang trình và với tôi, điều đó quá an toàn cho Gill. Điều Gill chưa sẵn sàng chính là đấu với cậu bé 17 tuổi mang năng lượng háu chiến. Đây sẽ là thử thách cho cả hai\", B Ray cho hay.\r\n\r\nKhông làm thất vọng, Icy Famou$ đã phối hợp ăn ý cùng Gill đã đưa đến phần thi \"Trai họ Vũ\" đầy cuốn hút, cả hai pha thêm tí nghịch ngợm vào tiết mục bằng cách viết lời hóm hỉnh về người yêu cũ.\r\n\r\nTuy nhiên, đứng trước đối thủ giàu kinh nghiệm, Icy Famou$ buộc phải rơi vòng vòng 8bar để Gill bước tiếp vào vòng sau.\r\n\r\nTiết mục cuối cùng mang tên \"Qua từng khung hình\" do Ngắn và Robber đảm nhận. Trước đó, HLV B Ray mong muốn cả hai lôi được hết sự gai góc, trải đời và kinh nghiệm cuộc sống để thổi hồn vào bài rap. Nam HLV đặt kỳ vọng đây là tiết mục chung kết sớm.\r\n\r\nSau phần trình diễn, MC Trấn Thành khen: \"Đây phải gọi là tiết mục chung kết nha! Chúng ta vừa chứng kiến một cơn địa chấn tại đây\".\r\n\r\nKết quả nghiêng về phía Robber nhiều hơn khi anh nhận về 54% bình chọn. 2 giám khảo đã chọn Robber để đi tiếp.\r\n\r\nỞ vòng 8bar, với 2 bản beat và 8 khuôn nhạc, lần lượt 4 thí sinh chưa được lựa chọn của đội B Ray gồm Young Puppy, Vlary, Icy Famou$ và Ngắn đã tạo ra những giai điệu mới mẻ để thuyết phục HLV của mình.\r\n\r\nVới chủ đề dí dỏm \"Hãy ghẹo huấn luyện viên của bạn\", cả 4 thí sinh đã mang đến cho người nghe nhiều tràng cười thư giãn và thoải mái.\r\n\r\nCuối cùng B Ray quyết định chọn rapper chê mình \"mặt rỗ xấu trai\" - Ngắn là thành viên cuối cùng vào vòng Bứt phá sắp tới.\r\n\r\nNhư vậy, kết thúc vòng Đối đầu, các đội đồng đều với 6 thành viên gồm:\r\n\r\nĐội BigDaddy: 7dnight, $A Lil Van, Nhật Hoàng, Dangrangto, Coldzy và V# (Nón vàng).\r\n\r\nĐội Karik : Danmy, Mason Nguyễn, Lower, Manbo, Billy 100 và Queen B (Nón vàng).\r\n\r\nĐội Suboi: willistic, Shayda, Dacia, Saabirose, V High và Coldzy (Nón vàng).\r\n\r\nĐội B Ray : CoolKid, RamC, Gill, Robber, Ngắn và Tiêu Minh Phụng (Nón vàng).', 14, 0, 'news/UvxZo8qoDLKpBgsURExG1wXaDJljC5OFC83vpYZx.png', '2025-04-25 08:53:56', '2025-10-15 01:26:34', NULL, NULL, NULL, NULL),
(7, 13, 'Nhạc R&B - Rap - underground lên ngôi', 'nhac-rb', 'Ca sĩ Chí Thiện cập nhật nhanh xu hướng âm nhạc kết hợp giữa R&B với rap và underground qua ca khúc “Quan trọng là thần thái”. Cảnh trong MV cùng tên. (Ảnh do ca sĩ cung cấp)', 'Sau lễ trao giải Grammy hằng năm, âm nhạc thế giới mở ra xu hướng thịnh hành tại nhiều thị trường, tất nhiên có cả Việt. Lần này, xu hướng thịnh hành là sắc màu âm nhạc có sự kết hợp giữa phong cách R&B với rap và underground. Đối với những giọng ca lệ thuộc tuyệt đối vào âm nhạc thời thượng, sự thay đổi để bắt kịp xu hướng là sứ mệnh mang tính tồn vong. Điều này khiến thị trường âm nhạc trở nên nhộn nhịp và sôi động.\r\n\r\nSự biến chuyển thú vị\r\n\r\nDẫn đầu đề cử giải thưởng Grammy 2018 với lần lượt 8 và 7 đề cử nhưng cả 2 \"ông hoàng rapper\" Jay Z và Kenrick Lamar đều ra về tay trắng. Trong khi đó, Bruno Mars - \"ông hoàng R&B\" - mang về 4 tượng kèn vàng Grammy lần thứ 59 quan trọng nhất. Người được vinh danh trang trọng là Ed Sheeran với giải thưởng Trình diễn pop xuất sắc nhất dành cho ca khúc \"Shape of you\". Đây chính là mấu chốt thú vị tạo nên xu hướng âm nhạc thịnh hành hiện nay: Sự lên ngôi của R&B kết hợp với rap và underdround.\r\n\r\nR&B có sự nhộn nhịp cần thiết bởi tiết tấu rộn ràng. Rap có ưu thế về ý nghĩa thông điệp truyền tải. Nhưng cả R&B hay rap đều chung một nhà với underground. Khi đứng riêng lẻ, mỗi dòng nhạc đều đủ sức chinh phục khán giả. Sự thú vị sẽ tăng lên bội phần khi chúng được kết hợp cùng nhau, trong cùng ca khúc. Chọn cách tiếp cận bằng sự chân thật và cảm xúc chân thành, không theo bất cứ khuôn khổ nào, nhạc underground là cách để nghệ sĩ thể hiện sự tự do, phóng khoáng kèm theo những đoạn rap như lời tự sự chân thực về cuộc sống, về tình yêu của chính mình.\r\n\r\nNhững ca khúc \"Túy âm\", \"Kém duyên\", \"Con điên\", \"Em dạo này\"... gặt hái thành công thời gian gần đây ở thị trường nhạc Việt không phải là \"ăn may\" như nhiều người vẫn tưởng. Thực tế, chúng được xây dựng từ một công thức bài bản, đúc kết từ thành công của các ca khúc quốc tế: \"Shape of you\" của Ed Sheeran hay phong cách âm nhạc của \"24K Magic\" giúp Bruno Mars đại thắng tại lễ trao giải Grammy mới đây.\r\n\r\nRa mắt vào mùa đông, \"Shape of you\" là ca khúc pop, dance pha lẫn tropical house - thể loại nhạc thường được chơi trong các festival mùa hè. Nó khác với những gì ngọt ngào, du dương mà khán giả luôn yêu thích ở Ed. Lời hát \"Shape of you\" không cầu kỳ, không da diết, không có những câu khiến người ta ngẩn ngơ bồi hồi.\r\n\r\nTrong khi đó, \"24K Magic\" của Bruno Mars mang âm hưởng đặc sệt của funk, disco pha một chút contemporary R&B, được phối khí chủ yếu bởi synth - loại đàn tạo đa âm bằng bộ nút điều khiển. Âm nhạc của \"24K Magic\" ảnh hưởng sâu sắc bởi âm nhạc những năm 1990.\r\n\r\nTất cả điều đó khẳng định âm nhạc đủ sức chinh phục khán giả với những gì đơn giản nhất nhưng tinh tế nhất. Sự chân thật đáng yêu cùng với vẻ lạc quan chính là điều mà mọi người cần và tìm kiếm trong các tác phẩm âm nhạc hiện nay.\r\n\r\nNhững ca khúc ăn khách thời gian gần đây của nhạc Việt cũng được xây dựng từ chính công thức này. Điều thú vị là chúng đều được sản sinh từ giới underground. \"Kém duyên\" (Rum, Nit và Masew thể hiện) là câu chuyện tình yêu được kể trên nền nhạc mang đậm yếu tố dân gian khiến người nghe thú vị bởi cách chơi đùa giai điệu của tác giả. \"Con điên\" (Tamka PKL thể hiện) và \"Em dạo này\" (Ngọt) xuất hiện ấn tượng như một gia vị lạ giữa thị trường âm nhạc bội thực phong cách ballad.\r\n\r\nCác ca khúc này có điểm chung là sở hữu ca từ bình dị nhưng rất dễ thương và là \"nỗi lòng\" của những người trẻ. Đó là nỗi lòng của cánh mày râu về một cô bạn gái khó chiều đến mức phải gọi là \"con điên\" đã nhanh chóng gây bão cộng đồng nghe nhạc trên mạng; đó là cách anh chàng vừa thất tình bày tỏ tình cảm chẳng giống ai qua những câu hỏi mang đậm tính hoài niệm về thói quen của người yêu cũ nhưng không hề bi lụy.\r\n\r\n\"Yêu 5\", \"Em dạo này\", \"Từ ngày em đến\", \"Con điên\", \"Ta cứ đi cùng nhau\", \"Đưa nhau đi trốn\", \"Cô gái bàn bên\"… lần lượt là những màu sắc âm nhạc tạo nên được \"đế chế\" của riêng mình, không nhầm lẫn với bất cứ ca khúc nào mà người ta vẫn gọi là \"một màu\" khi ra đời.\r\nKhông còn chậm chân\r\n\r\n\"Quan trọng là thần thái\" - cụm từ \"hot\" nhất của giới trẻ hiện nay - trở thành chủ đề của nhiều ca khúc cũng đang \"hot\". Trong đó, ca sĩ Chí Thiện thể hiện sự nhanh nhạy với xu hướng của mình khi ra mắt ca khúc \"Quan trọng là thần thái\" bằng giai điệu bắt tai, mang phong cách hiện đại, lời ca hài hước, thú vị. Ca khúc mang phong cách R&B + rap + underground này đã tạo nên một Chí Thiện mới lạ vì trước đây, anh được mệnh danh là \"hoàng tử ballad\".\r\n\r\nNói vậy để thấy rằng dòng nhạc underground đang chi phối mạnh mẽ đến sự phát triển của thị trường nhạc Việt. Nghệ sĩ dòng mainstream (trình diễn trên sân khấu) không thể đứng ngoài cuộc trong việc làm mới bản thân và quan trọng nhất là để tồn tại. Bởi lẽ, thị hiếu khán giả là nhân tố chính quyết định sự tồn vong của một giọng ca thị trường - những người bị lệ thuộc xu hướng.\r\n\r\nKhi R&B, rap phủ bóng lễ trao giải Grammy lần thứ 59, người yêu nhạc cũng hiểu sắc màu âm nhạc thế giới thời gian tới là gì. Tuy nhiên, nhạc sĩ Quốc Bảo nhận định: \"Xu hướng cụ thể của âm nhạc thế giới hiện nay là sự pha trộn nhiều phong cách chứ không chủ đích khai thác lợi thế một thể loại như trước đây. Hơn hết, âm nhạc đã đạt được giới hạn thông điệp mà nó muốn là truyền tải sự lạc quan, tạo cảm hứng cho người nghe chứ không còn là não tình, ê chề như trước\".\r\n\r\nSo với vòng xoáy đổi mới của âm nhạc thế giới, nhạc Việt (thị trường) luôn chậm hơn vài bước. Thế nhưng, với sự cập nhật nhanh nhạy như hiện tại, các cây viết thừa sức có những giai điệu hợp thời nhất. \"Shape of you\" của Ed Sheeran chính là tinh thần cốt lõi cho nhiều sáng tác Việt hiện nay: chân thành, giản dị nhưng bắt tai. \"Một tinh thần sáng tác tự do và đầy ngẫu hứng\" - nhạc sĩ Châu Đăng Khoa khẳng định.', 11, 0, 'news/JrRRInG9rnpKQutAjpxXiz0vtnz6xwpQ4zxrAdW1.jpg', '2025-04-25 10:35:56', '2025-10-15 01:42:51', NULL, NULL, NULL, NULL),
(8, 10, 'Bùng nổ tranh luận quanh phát ngôn của 1 Anh Trai Chông Gai: “Ai cũng muốn được như HIEUTHUHAI”', 'hieuthuha-rap-hot', '“Miệng m** chê nhưng thâm tâm thì lại ước… Đã bao nhiêu lâu t** phải nghe mỗi 1 câu là rapper thì chỉ nên tập trung vào rap” - Neko Lê cho rằng việc HIEUTHUHAI tham gia gameshow không có gì là sai trái khi sự nổi tiếng dù gì cũng là mục tiêu đối với nghệ sĩ khi dấn thân vào showbiz.Anh chia sẻ: “Có rapper nào ở Việt Nam nói là không muốn giống như HIEUTHUHAI không? Ai cũng muốn được như HIEUTHUHAI mà cứ thấy chê người ta, luôn chỉ trích HIEUTHUHAI nổi tiếng nhờ gameshow. Thử xem bao nhiêu người chơi gameshow, có phải ai cũng được nổi tiếng như HIEUTHUHAI đâu”.', 'Neko Lê công nhận thành công của HIEUTHUHAI trong lĩnh vực gameshow, đồng thời khẳng định không ít rapper Việt mong muốn có được sự thành công đó. Tuy nhiên, nhận định này đang dấy lên tranh cãi lớn trên các nền tảng trực tuyến.\r\n\r\nHIEUTHUHAI từ lâu đã định vị bản thân là 1 rapper hoạt động theo hướng nghệ sĩ giải trí và anh đã - đang thành công trên con đường này. HIEUTHUHAI hiểu bản thân cần gì và phải làm gì. Hình ảnh của HIEUTHUHAI rất được lòng công chúng, ngoan hiền, trong sạch và có các sản phẩm được giới trẻ yêu thích - khác phần đông các rapper thường gắn liền với hình ảnh gai góc, đời tư phức tạp, thường rap về những góc khuất cuộc đời. Nhờ vào việc tham gia những chương trình giải trí như 2 ngày 1 Đêm, 7 Nụ Cười Xuân, Anh Trai Say Hi…. HIEUTHUHAI đã bước lên hàng ngũ mainstream, có sức ảnh hưởng lớn đối với khán giả đại chúng.\r\nTuy nhiên, không phải rapper nào cũng lựa chọn con đường như HIEUTHUHAI, và “thèm muốn” thành công như của HIEUTHUHAI theo cách Neko Lê đang nói. Hoạt động trong giới underground, các rapper có thể thỏa sức thể hiện cái tôi âm nhạc - nghệ sĩ tính của bản thân thông qua nhiều cách thức khác nhau, nhiều kĩ thuật rap khác nhau, với chủ đề đa dạng mở rộng hơn. Họ trút ra những cảm xúc, muộn phiền về mọi khía cạnh trong cuộc sống vào những câu từ, bản nhạc mà không sợ bị phán xét. Từ đây, âm nhạc của họ cũng đa sắc màu và cho thấy sự phát triển của cộng đồng Rap - Hip-hop tại Việt Nam đa dạng hơn nhiều.\r\n\r\nNhiều rapper không muốn bước ra khỏi vùng an toàn, tiến vào nền giải trí đại chúng. Họ có những góc khuất mà khán giả không quen thuộc, giữ lại cho mình chút gì đó riêng tư, cá nhân để được thể hiện trong cộng đồng Hip-hop underground. Những “cây cổ thụ” trong giới underground như Anh Mac, Skyler, DSK, Acy… đã đóng góp nhiều và góp phần đặt nền móng cho giới Hip-hop nước nhà. Họ không đi theo hướng gameshow để khuyếch đại tên tuổi mạnh mẽ hơn, thay vào đó là đứng đằng sau hoạt động bên ngoài tầm phủ sóng mainstream.\r\nVì thế, không thể nói rằng sự nổi tiếng là đích đến cuối cùng mà tất cả các rapper nhắm đến. Có rất nhiều rapper đi con đường khác với HIEUTHUHAI. Việc tham gia gameshow càng không phải là cách họ nghĩ đến để đánh bóng tên tuổi. Sự khác biệt của HIEUTHUHAI so với những underground rapper là định hướng sự nghiệp.\r\n\r\nCâu nói của Neko Lê gây ra 2 luồng ý kiến tranh cãi. Một bên đồng tình rằng HIEUTHUHAI nổi tiếng nhờ ngành nghề, lĩnh vực nào cũng được, miễn không phạm pháp hay sử dụng chiêu trò để đi lên. HIEUTHUHAI còn có một hình tượng sạch, tính cách dễ chịu, chăm chỉ nỗ lực vươn lên nên phù hợp làm thần tượng giới trẻ. Bên còn lại thì cho rằng HIEUTHUHAI chưa thể hiện tốt được ở chính sở trường của mình là rap. Các sản phẩm âm nhạc chưa thuyết phục về mặt chuyên môn.\r\n\r\nSuốt thời gian qua, HIEUTHUHAI bị gán mác là “rapper gameshow”. Nhiều fan rap Việt không phục trước những ca khúc mà HIEUTHUHAI cho ra mắt, họ cho rằng kỹ năng rap của Hiếu còn yếu nhưng lại “phất lên” thành sao hạng A nhờ tham gia các chương trình giải trí. Đặc biệt là sau hàng loạt các ca khúc hát nhiều hơn rap dạo gần đây, HIEUTHUHAI cho thấy rõ định hướng mở rộng tệp khán giả, chuyển sang nghệ sĩ giải trí đa tài nhiều hơn là bó hẹp bản thân ở 2 chữ rapper, điều này càng khiến anh nhận về nhiều tranh cãi khi những thử nghiệm âm nhạc không thuyết phục công chúng. HIEUTHUHAI vẫn có những thành tích về mặt top trending, streaming, tuy nhiên về chất lượng chuyên môn của sản phẩm thì vẫn còn rất nhiều điều đáng bàn.', 43, 0, 'news/KtB576jMtDTsOV1zHdxCj15P7ZL8DO2GNJ5n3ybM.jpg', '2025-04-27 07:37:53', '2025-06-05 17:23:20', 'audio/iZyNlFOVIb3R973BWCiIkpfBHivFAhWYIvfhvHgL.mp3', 'videos/V0qM44ERPWoa7tdRaNhydEThfsnsClGO6UhtZhOf.mp4', 'audio/EjeTPjx1DxKJ7vkphlTvJzAPBqmMYkd57fMdKg3n.mp3', 'videos/IEzwOWlG92Qg4prlG5Vnd0pXty5YdqEX5NAFfcHU.mp4'),
(9, 10, 'Rapper B Ray bị \'tuýt còi\' vì phát ngôn sai lệch lịch sử', 'bray-rap-hot', 'Đại diện Sở Văn hóa và Thể thao TP HCM cho biết nhắc nhở rapper B Ray vì phát ngôn sai về địa lý, lịch sử.\r\n\r\nCuối tháng 8, một số phát ngôn trên mạng xã hội của rapper B Ray (tên thật là Trần Thiện Thanh Bảo) khiến nhiều khán giả bức xúc. Các status liên quan chính trị, văn hóa, địa lý trong nước - được đăng trên trang cá nhân năm 2015-2016, lúc B Ray còn sống ở nước ngoài. Sau đó, rapper xóa các nội dung.\r\n\r\nChiều 5/9, tại buổi họp thường kỳ ở Trung tâm báo chí TP HCM, đại diện Sở cho biết đã mời B Ray, 31 tuổi, làm việc. Ở buổi này, rapper nói trước đây \"chưa hiểu đầy đủ về các vấn đề nên có phát ngôn lệch lạc\".\r\n\r\n\"Chúng tôi nghiêm khắc nhắc nhở ông Bảo về việc tiếp tục nâng cao tinh thần trách nhiệm của nghệ sĩ với khán giả trong hoạt động trình diễn cũng như ứng xử nơi công cộng, tuân thủ quy định pháp luật, quy tắc ứng xử của người hoạt động nghệ thuật\", đại diện Sở nói.', 'Hôm 27/8, trên fanpage hơn 1,8 triệu người theo dõi, rapper xin lỗi khán giả. \"Hơn hai năm qua, tôi tham gia các hoạt động cộng đồng, các dự án thiện nguyện trong nước để chia sẻ, thể hiện lòng biết ơn và sự thay đổi trong suy nghĩ, hành động của bản thân. Tôi mong được mọi người đón nhận để cống hiến nhiều hơn những hoạt động ý nghĩa, có ích cho nước nhà\", rapper cho biết.\r\n\r\nĐầu năm nay, B Ray cũng bị cơ quan chức năng \"tuýt còi\" vì bản rap Để ai cần có ca từ xúc phạm, trù ẻo phụ nữ. Rapper sau đó thừa nhận sai phạm vì biểu diễn ca khúc trong show tháng 12/2023 tại TP HCM, đồng thời gỡ bỏ ca khúc trên các nền tảng.\r\n\r\nB Ray quê ở TP HCM, theo gia đình sang Mỹ từ nhỏ, từng học ngành dược. Lớn lên, anh về nước theo đuổi âm nhạc. B Ray làm quen rap năm 14 tuổi, theo bạn bè học gieo vần viết ca khúc. Lúc đầu, anh chủ yếu rap bằng tiếng Anh, sau đó chuyển sang tiếng mẹ đẻ.\r\n\r\nRapper tạo dấu ấn qua các nhạc phẩm kết hợp Amee như Ex\'s Hate Me, Đen đá không đường, Anh nhà ở đâu thế. Anh từng ngồi ghế huấn luyện viên Rap Việt mùa ba, có các học trò gây chú ý như Double2T, 24K.Right. B Ray từng có thời gian nhận chỉ trích về phong cách, vướng ồn ào đạo nhái. Gần đây, rapper cho biết dần tiết chế trong sáng tác vì muốn hướng đến thông điệp tích cực trong âm nhạc.\r\n\r\nCuối tháng 8, nhà sản xuất Rap Việt mùa bốn công bố B Ray là một trong bảy gương mặt ngồi ghế \"nóng\", song chưa tiết lộ cụ thể vai trò giám khảo hay huấn luyện viên.', 45, 0, 'news/images/4nYA2gNevZeBM6fpgz2VzDkdGYzlz9l1wxFH66Cp.webp', '2025-04-27 08:15:25', '2025-06-05 17:23:45', 'audio/jCM3LQey96IVj2avEFIU7JXO7SJniU69vqtRGUhR.mp3', 'videos/wEFfemFOtmYSMsigWAexEuBvVBQNvUFdST0MUYF4.mp4', 'audio/7HSnRX7dQGucKFhLWkedwTs4y0aMT1LccD6h392r.mp3', 'videos/WQhw9wcwk0icQWa5zKmDqg9ciQjyWhwxcJotcJGF.mp4'),
(10, 10, 'ILLSLICK gây sốt với \"ตีหนึ่งที่คูเมือง\" – Bản tình ca lúc 1 giờ sáng khuấy đảo cộng đồng mạng Thái', 'rap-thai', 'Bangkok, Thái Lan – Chỉ sau vài ngày ra mắt, ca khúc “ตีหนึ่งที่คูเมือง” (tạm dịch: 1 giờ sáng ở Khu Mueang) của rapper đình đám ILLSLICK đã nhanh chóng tạo nên “cơn sốt” trên YouTube và các nền tảng mạng xã hội. Với chất giọng đặc trưng pha chút \"bụi\" và giai điệu rap ngọt ngào, bài hát trở thành bản tình ca “gây nghiện” mới trong lòng giới trẻ Thái Lan.\r\n\r\nNội dung ca khúc kể về một chàng trai đem lòng thương một cô gái quen qua livestream, mỗi đêm đều lặng lẽ đến Khu Mueang lúc 1 giờ sáng để hy vọng gặp cô ngoài đời. Câu chuyện tình đơn phương được lột tả nhẹ nhàng, sâu lắng nhưng vẫn đậm chất đường phố – đúng chất của ILLSLICK.\r\n\r\nMV chính thức của bài hát, với sự tham gia của hot TikToker Punn Rak Maew, góp phần đưa hình ảnh đáng yêu và gần gũi vào câu chuyện tình yêu hiện đại. Phần hình ảnh đậm chất Chiang Mai, pha nét retro nhẹ nhàng, khiến khán giả vừa nghe vừa “cảm” được cả không khí thành phố về đêm.\r\n\r\nSau chưa đầy một tuần, MV đã vượt mốc hơn 13 triệu lượt xem và tiếp tục lan truyền mạnh mẽ trên TikTok với hàng nghìn video sử dụng đoạn nhạc nền. Người hâm mộ dành nhiều lời khen cho cách kể chuyện sáng tạo và giai điệu dễ \"gây nghiện\" của bài hát.\r\n\r\n“ILLSLICK đã trở lại và tiếp tục khẳng định vị thế không ai thay thế trong lòng fan yêu nhạc rap lãng mạn,” một bình luận nổi bật trên mạng xã hội chia sẻ.\r\n\r\n“ตีหนึ่งที่คูเมือง” không chỉ là một bài hát – đó là cảm xúc của những tâm hồn cô đơn giữa thành phố về đêm, được truyền tải một cách chân thực và nghệ thuật qua phong cách rất riêng của ILLSLICK.', 'Phân Tích Chuyên Sâu – “ตีหนึ่งที่คูเมือง”\r\nCa khúc này là một bước đi đặc biệt của ILLSLICK, khi anh pha trộn giữa rap tự sự và âm hưởng R&B nhẹ nhàng, tạo nên không gian âm nhạc rất riêng – đượm buồn nhưng không bi lụy.\r\n\r\nChủ đề xoay quanh một mối tình đơn phương qua màn hình livestream – một bức tranh chân thực về thời đại số. Cái hay của bài hát là cách ILLSLICK kể chuyện rất đời, không cần kịch tính, không có cao trào bùng nổ, nhưng từng lời rap như lời thì thầm vào tai người nghe. Dòng cảm xúc mộc mạc, chân thành khiến người nghe cảm thấy như đang sống trong chính câu chuyện đó.\r\n\r\nMột chi tiết đáng chú ý: “ตีหนึ่ง” (1 giờ sáng) không chỉ là thời gian, mà là biểu tượng cho sự cô đơn, nỗi nhớ âm thầm, và những tâm hồn không ngủ – một motif quen thuộc trong âm nhạc của ILLSLICK.\r\n\r\nReview MV “ตีหนึ่งที่คูเมือง”\r\nMV không sử dụng nhiều hiệu ứng phức tạp, mà chọn cách kể chuyện giản dị, mang đậm chất điện ảnh. Những cảnh quay tại Chiang Mai về đêm – đặc biệt là quanh khu คูเมือง (Ku Mueang) – mang lại cảm giác vừa thơ mộng, vừa cô đơn.\r\n\r\nNữ chính – được biết đến là hot TikToker Punn Rak Maew – thể hiện hình ảnh một cô gái dễ thương, ngây thơ nhưng có phần xa cách, đúng với cảm giác “trên mạng thân thiết, ngoài đời xa lạ”. Ánh mắt cô và sự thờ ơ trong MV chính là điểm nhấn cho sự đơn phương trong câu chuyện.\r\n\r\nCách đạo diễn lồng ghép khung cảnh quán ăn, livestream, lái xe qua đêm,... giúp khán giả cảm nhận không gian lặng lẽ nhưng đầy cảm xúc, giống như một thước phim indie.\r\n\r\n🇹🇭🇻🇳 Bản dịch lời bài hát (tạm dịch)\r\n(Chỉ trích đoạn tiêu biểu để giữ bản quyền và tôn trọng nguyên tác):\r\n\r\n\"เธอเหมือนใครบางคนที่ฉันเคยรู้จัก\"\r\nEm giống như một người mà anh từng quen\r\n\"อยู่ดีๆ ก็หายไปจากฉัน\"\r\nRồi đột nhiên biến mất khỏi anh\r\n\"ทุกครั้งที่ฉันเปิดไลฟ์ เธอก็มา\"\r\nMỗi lần anh livestream, em đều vào xem\r\n\"แต่พอมาเจอกันจริงๆ เธอกลับไม่เหมือนเดิม\"\r\nNhưng khi gặp ngoài đời, em lại chẳng còn như trước nữa\r\n\r\nLời bài hát đầy những ẩn dụ nhẹ nhàng, thể hiện cảm xúc ngổn ngang và thất vọng của một chàng trai không tìm thấy sự thật từ thế giới ảo.', 239, 0, 'images/rgJMPOPPmWCxt9XMoyt4NfOOq6QcN75xQ4eppsl2.jpg', '2025-05-05 09:52:12', '2025-09-29 01:15:20', NULL, 'videos/otMo8anEyuIADDElCIjMDGmS3Ill2Axo29lpiw7g.mp4', NULL, NULL),
(11, 14, '🎶 \"VẾT THƯƠNG\" – Một Bản Ballad Mộc Mạc, Đầy Cảm Xúc Của Fishy', 'vet-thuong-mot-ban-ballad-moc-mac-day-cam-xuc-cua-fishy', 'Ca khúc \"VẾT THƯƠNG\" của Fishy chính thức được phát hành vào tháng 6 năm 2023, nhanh chóng thu hút sự chú ý của người yêu nhạc nhờ giai điệu nhẹ nhàng và ca từ đậm chất tự sự. Đây là một trong những sản phẩm âm nhạc tiêu biểu cho sự trưởng thành và phát triển trong phong cách âm nhạc của Fishy, với một bản ballad sâu lắng, dễ đi vào lòng người.', '🎼 Phân Tích Âm Nhạc\r\n\"VẾT THƯƠNG\" có tiết tấu chậm, phù hợp với thể loại pop ballad. Điểm nổi bật trong âm nhạc của bài hát chính là sự kết hợp giữa nhạc nền đơn giản nhưng đầy cảm xúc và giọng hát đầy nỗi niềm của Fishy.\r\n\r\nDàn nhạc: Phần đệm nhạc trong \"VẾT THƯƠNG\" được sử dụng rất tinh tế. Các nhạc cụ như piano, guitar acoustic kết hợp với nhịp trống nhẹ nhàng mang đến không gian âm nhạc mộc mạc nhưng rất sâu lắng, dễ gây xúc động.\r\n\r\nHòa âm: Lối hòa âm trong bài hát giúp nâng cao sự sâu sắc trong từng câu từ. Fishy sử dụng những đoạn cao trào ngắn nhưng đầy sức nặng, tạo nên điểm nhấn cho từng câu hát, khiến cho người nghe có thể cảm nhận được từng cảm xúc trong bài hát.\r\n\r\nGiọng hát: Giọng hát của Fishy trong \"VẾT THƯƠNG\" là một yếu tố quyết định sự thành công của bài hát. Cách anh thể hiện cảm xúc qua từng lời hát không chỉ mang lại sự chân thành mà còn khiến người nghe cảm nhận được một nỗi buồn rất riêng.\r\n\r\n🎥 Phân Tích MV\r\nMV của \"VẾT THƯƠNG\" được thực hiện với phong cách rất tối giản nhưng đầy ẩn ý. Mặc dù không có những cảnh quay quá phức tạp, nhưng mỗi cảnh đều toát lên một sự biểu cảm mạnh mẽ.\r\n\r\nCảnh quay: MV chủ yếu tập trung vào những cảnh quay đơn giản, nhưng lại mang đến cảm giác cô đơn, vắng lặng. Những khung cảnh đêm tối, ánh đèn yếu ớt, cùng với hình ảnh Fishy một mình trong không gian tĩnh lặng giúp làm nổi bật chủ đề cô đơn, tổn thương của bài hát.\r\n\r\nNhân vật chính: Nhân vật trong MV – do Fishy thể hiện – chính là biểu tượng của những nỗi đau âm ỉ, những vết thương lòng chưa thể lành. Cảm xúc của anh được thể hiện qua ánh mắt trầm tư, từng cử động nhẹ nhàng nhưng mang đậm sự đau khổ, tạo nên một sự đồng cảm mạnh mẽ với người xem.\r\n\r\nMàu sắc: Màu sắc trong MV chủ yếu là những gam màu tối và trầm, phù hợp với không khí của bài hát. Những màu sắc này càng làm nổi bật cảm giác u sầu, mong manh của nhân vật và nội dung bài hát.\r\n\r\n💬 Nội Dung Lời Bài Hát\r\nLời bài hát \"VẾT THƯƠNG\" nói về một người đang phải đối mặt với những tổn thương trong tình yêu. Những câu từ trong bài hát rất thực tế và dễ chạm đến cảm xúc của người nghe. Nội dung bài hát không chỉ đơn giản là nỗi đau trong tình yêu, mà còn là sự chấp nhận, cố gắng chữa lành vết thương và tìm kiếm một lối đi mới.\r\n\r\n\"Vết thương\" không chỉ là một tổn thương về thể xác mà còn là những vết cắt trong tâm hồn, những điều không thể chữa lành dễ dàng.\r\n\r\nCác câu hát trong bài thể hiện sự vật vã, dằn vặt khi phải đối mặt với tình yêu đã phai nhạt. Tuy nhiên, cuối cùng người hát vẫn nhận ra rằng, những vết thương này là một phần trong quá trình trưởng thành và tìm kiếm bình yên trong tâm hồn.\r\n\r\n🌟 Tương Lai và Sự Đón Nhận Của Khán Giả\r\n\"VẾT THƯƠNG\" không chỉ là một bản ballad đơn thuần, mà còn là một sản phẩm âm nhạc giàu cảm xúc, phản ánh được sự thấu hiểu sâu sắc về tâm lý con người trong tình yêu. Với sự thành công của ca khúc này, Fishy đã khẳng định vị thế của mình trong lòng người hâm mộ, đặc biệt là những ai yêu thích âm nhạc nhẹ nhàng, đầy tính tự sự.\r\n\r\nSau khi phát hành, \"VẾT THƯƠNG\" đã nhận được hàng triệu lượt nghe và chia sẻ trên các nền tảng âm nhạc trực tuyến như Spotify, Apple Music, YouTube, và Zing MP3. Khán giả yêu thích ca khúc này bởi tính gần gũi, dễ nghe nhưng cũng rất sâu sắc.', 24, 0, 'images/xg1juw7xleBCbS5jUwSfltSV4CVlJSfGhAU2ija4.jpg', '2025-05-05 11:08:28', '2025-06-05 17:22:48', NULL, 'news/videos/WybV23sDEhP83lreLpe2NC5IQ59KNIiCYGTofORi.mp4', NULL, 'videos/wGUWwryZ6cbl1sn3ABE16HCjrGOoHraWpzu9Hns8.mp4'),
(12, 9, 'Âm nhạc Michael Jackson vẫn nguyên sự ảnh hưởng với đại chúng', 'michael-Jackson-pop-hot', 'Âm nhạc Michael Jackson vẫn nguyên sự ảnh hưởng với đại chúng\r\nVNHN – Cách đây 10 năm, người yêu nhạc trên toàn thế giới đã vĩnh biệt “ông hoàng nhạc Pop” Michael Jackson. Một thập kỷ trôi qua, nhưng với hàng triệu người hâm mộ, âm nhạc và di sản của ông vẫn luôn sống động, thậm chí ngày càng được thế hệ mới tôn vinh, học hỏi và lan tỏa.', 'Biểu tượng không thể thay thế của thế kỷ 20\r\nMichael Jackson không chỉ là một ca sĩ – ông là biểu tượng văn hóa toàn cầu. Với những album huyền thoại như Thriller, Bad, Dangerous hay HIStory, ông đã thiết lập nên các chuẩn mực mới cho nền âm nhạc đại chúng. Thriller vẫn là album bán chạy nhất mọi thời đại, một kỳ tích chưa có nghệ sĩ nào vượt qua.\r\n\r\nTừ phong cách âm nhạc độc đáo, giọng hát đặc trưng, vũ đạo “moonwalk” mang tính biểu tượng đến cách ông kết hợp âm nhạc với hình ảnh và điện ảnh, Michael Jackson đã thay đổi cách nhìn về một nghệ sĩ biểu diễn. Ông đưa video âm nhạc lên một tầm cao mới – không chỉ là công cụ quảng bá, mà là một tác phẩm nghệ thuật thực sự.\r\n\r\nSự ảnh hưởng xuyên thế hệ\r\nDù đã qua đời, âm nhạc của Michael Jackson vẫn được hàng triệu người nghe hằng ngày. Những bản hit như Billie Jean, Beat It, Smooth Criminal, Man in the Mirror vẫn vang lên tại các sân khấu, trong phòng tập nhảy, trong phim ảnh và quảng cáo. Trên các nền tảng số như YouTube, Spotify, TikTok, âm nhạc của ông vẫn thu hút hàng tỷ lượt nghe, với không ít người trẻ lần đầu tiếp xúc và ngay lập tức bị chinh phục.\r\n\r\nKhông chỉ giới trẻ, nhiều nghệ sĩ nổi tiếng ngày nay như Bruno Mars, The Weeknd, Chris Brown, Beyoncé, và cả BTS cũng từng thừa nhận chịu ảnh hưởng từ Michael Jackson – từ phong cách trình diễn đến tư duy nghệ thuật. Ông đã truyền cảm hứng cho một thế hệ mới về sự sáng tạo, sự cống hiến và dám phá bỏ giới hạn trong nghệ thuật.\r\n\r\nDi sản vượt thời gian\r\nNgoài âm nhạc, Michael Jackson còn được biết đến với các hoạt động nhân đạo và tiếng nói vì cộng đồng. Ông sử dụng sự nổi tiếng để kêu gọi hòa bình, tình yêu và sự đoàn kết toàn cầu. Ca khúc Heal the World, We Are the World, Earth Song không chỉ là những bản ballad đầy cảm xúc mà còn là thông điệp nhân văn mạnh mẽ.\r\n\r\nDù đời tư của Michael từng vướng nhiều tranh cãi, nhưng những đóng góp của ông cho nghệ thuật và nhân loại là điều không thể phủ nhận. Qua thời gian, công chúng dường như càng trân trọng và hiểu sâu hơn về con người và tâm hồn của một nghệ sĩ đã dành cả đời cho khán giả.\r\n\r\nHuyền thoại chưa từng lụi tàn\r\nMột thập kỷ kể từ ngày Michael Jackson ra đi, các buổi biểu diễn tưởng niệm, các album tái phát hành, các phim tài liệu, các dự án nghệ thuật lấy cảm hứng từ ông vẫn liên tục xuất hiện. Không phải ai cũng có thể khiến cả thế giới lặng đi trong ngày mất, và cũng không phải ai có thể khiến hàng triệu con người vẫn khóc, vẫn nhảy theo nhạc của mình sau mười năm.\r\n\r\nMichael Jackson – “Vua nhạc Pop” – không chỉ là một cái tên trong lịch sử âm nhạc, mà là một phần của văn hóa đại chúng, một biểu tượng bất tử. Âm nhạc của ông vẫn đang sống, thở và truyền cảm hứng cho mọi thế hệ – như thể ông chưa từng rời xa.', 106, 0, 'news/yHNbH3NCrlzA57uJpp07gEDuS6wF61CFo9N46xz6.jpg', '2025-04-25 08:17:06', '2025-06-05 17:25:12', NULL, NULL, NULL, NULL),
(194, 9, 'Soobin x Jiyeon Kết Hợp Ngọt Ngào Trong \'Đẹp Nhất Là Em\': Tình Yêu Lãng Mạn Đưa V-pop Lên Tầm Cao Mớ', 'soobin-x-jiyeon-ket-hop-ngot-ngao-trong-dep-nhat-la-em-tinh-yeu-lang-man-dua-v-pop-len-tam-cao-mo', 'Ca khúc \"Đẹp Nhất Là Em\" của Soobin và Jiyeon là sự kết hợp ngọt ngào giữa hai nghệ sĩ tài năng, mang đến một bản ballad lãng mạn, đầy cảm xúc. MV được đầu tư công phu với những cảnh quay đẹp mắt, tạo nên một không gian tình yêu lãng mạn, khiến người xem không thể rời mắt. Sự hòa quyện giữa hai giọng ca đặc biệt của Soobin và Jiyeon mang đến một sản phẩm âm nhạc hoàn hảo, đánh dấu bước chuyển mình của cả hai nghệ sĩ trong sự nghiệp.', 'Soobin x Jiyeon - “Đẹp Nhất Là Em” (Official MV): Sự Kết Hợp Hoàn Hảo Của Hai Ngôi Sao V-pop\r\n\r\nSau nhiều ngày mong đợi, “Đẹp Nhất Là Em” – ca khúc kết hợp giữa Soobin và Jiyeon, chính thức ra mắt cùng với MV chính thức, mang đến một làn sóng cảm xúc mới cho khán giả yêu nhạc Việt. Đây là một trong những sản phẩm âm nhạc đáng chú ý trong năm 2025, với sự tham gia của hai nghệ sĩ nổi bật trong làng nhạc Việt: Soobin, một trong những giọng ca đình đám của V-pop, và Jiyeon, thành viên nhóm nhạc T-ara từng chiếm lĩnh thị trường âm nhạc Hàn Quốc.\r\n\r\nSoobin: Từ “Soobin Hoàng Sơn” đến Soobin Mới Mẻ\r\nSoobin, trước đây được biết đến là Soobin Hoàng Sơn, đã có một sự nghiệp âm nhạc đầy ấn tượng với những bản hit nổi bật như “Em Đã Thấy Anh Cùng Người Ấy”, “Đi Để Trở Về” hay “Vẫn Là Anh”. Khán giả yêu mến Soobin không chỉ bởi giọng hát đặc trưng, dễ cảm mà còn bởi khả năng sáng tạo trong việc thử sức với nhiều thể loại âm nhạc. Sự kết hợp của anh với Jiyeon lần này lại mở ra một hướng đi mới trong âm nhạc của Soobin – nhẹ nhàng, tình cảm nhưng cũng đầy lôi cuốn.\r\n\r\nJiyeon: Ngọc nữ K-pop Lên Ngôi tại V-pop\r\nJiyeon, thành viên của nhóm nhạc huyền thoại T-ara, không chỉ nổi bật với vẻ ngoài xinh đẹp, mà còn với giọng hát đầy cảm xúc và kỹ năng trình diễn hoàn hảo. Sau khi T-ara tan rã, Jiyeon đã bắt đầu con đường solo và không ngừng gây ấn tượng với những sản phẩm âm nhạc chất lượng. Sự xuất hiện của cô trong “Đẹp Nhất Là Em” đánh dấu một bước ngoặt quan trọng, khi cô chính thức tham gia vào thị trường âm nhạc Việt với tư cách là một nghệ sĩ solo, mang đến một màu sắc mới mẻ cho làng nhạc V-pop.\r\n\r\nMột Ca Khúc Ngọt Ngào, Đậm Đà Tình Cảm\r\n“Đẹp Nhất Là Em” là một ca khúc ballad với giai điệu nhẹ nhàng, lãng mạn, mang đến cho người nghe một cảm giác ngọt ngào, ấm áp. Lời ca của bài hát nói về một tình yêu đẹp, nơi mà người yêu luôn là “đẹp nhất” trong mắt người kia, một chủ đề gần gũi và dễ dàng chạm đến trái tim người nghe. Bản phối âm của ca khúc này được thực hiện một cách tỉ mỉ, kết hợp giữa âm thanh điện tử hiện đại và những nhạc cụ truyền thống, tạo nên một không gian âm nhạc lôi cuốn và sâu lắng.\r\n\r\nMV: Một Tác Phẩm Nghệ Thuật\r\nMV của “Đẹp Nhất Là Em” được đầu tư kỹ lưỡng về mặt hình ảnh. Được quay tại những địa điểm đẹp mắt và mang không khí lãng mạn, MV không chỉ làm nổi bật được tình yêu giữa hai nhân vật mà còn thể hiện được sự tinh tế trong từng khung hình. Sự kết hợp giữa cảnh quay lãng mạn và ánh sáng mờ ảo càng làm tăng thêm sự huyền bí, lôi cuốn cho MV.\r\n\r\nSự Kết Hợp Đầy Hứa Hẹn Của Soobin và Jiyeon\r\nKhông chỉ là một bản tình ca đẹp, “Đẹp Nhất Là Em” còn là minh chứng cho sức mạnh của sự kết hợp giữa hai nghệ sĩ tài năng đến từ những nền âm nhạc khác nhau. Soobin và Jiyeon đều có những đặc trưng riêng trong âm nhạc của mình, nhưng khi hợp tác cùng nhau, họ tạo ra một sự hòa quyện hoàn hảo giữa hai phong cách âm nhạc khác biệt. Khán giả không chỉ được chiêm ngưỡng hai giọng ca ngọt ngào mà còn cảm nhận được một không gian âm nhạc đầy mới mẻ và cuốn hút.\r\n\r\nCảm Xúc Của Khán Giả\r\nNgay từ khi ra mắt, “Đẹp Nhất Là Em” đã nhận được sự đón nhận nồng nhiệt từ phía người hâm mộ. Nhiều khán giả chia sẻ rằng họ bị cuốn hút ngay từ những câu hát đầu tiên và không thể ngừng nghe ca khúc này. Đặc biệt, sự kết hợp giữa giọng hát đầy tình cảm của Soobin và Jiyeon khiến bài hát trở nên đặc biệt và dễ dàng chạm đến trái tim người nghe.\r\n\r\nVới “Đẹp Nhất Là Em”, Soobin và Jiyeon đã chứng minh rằng âm nhạc không có biên giới và mọi thứ đều có thể hòa quyện để tạo ra những sản phẩm tuyệt vời. Đây là một bài hát không thể thiếu trong playlist của những người yêu nhạc lãng mạn và ngọt ngào.\r\n\r\nHãy cùng thưởng thức ca khúc này và để lại cảm xúc của bạn sau khi nghe!', 17, 0, 'images/kbKqVfJFQfdL3qOKQBM9qCxEQlVlddhRFIQ6fe9l.jpg', '2025-05-07 11:39:15', '2025-05-25 05:52:59', NULL, 'videos/YsBBL2UuWkIJunDb44jNlb0XWUf7lkMPNu5eXv7J.mp4', NULL, 'videos/9cmNTscEBi4zmhGfKc87nPfoyiSB1peBiDztIL9j.mp4'),
(201, 9, 'D GERRARD – “รถไฟบนฟ้า (Galaxy Express)”: Chuyến tàu tình yêu xuyên vũ trụ chinh phục triệu trái tim người nghe', 'd-gerrard-galaxy-express-chuyen-tau-tinh-yeu-xuyen-vu-tru-chinh-phuc-trieu-trai-tim-nguoi-nghe', 'Ngày 18 tháng 1 năm 2024, D GERRARD – ca sĩ trẻ tài năng đến từ Thái Lan – đã chính thức trình làng MV chính thức của ca khúc \"รถไฟบนฟ้า (Galaxy Express)\" trên kênh YouTube chính thức của mình. Ngay lập tức, bài hát đã tạo nên cơn sốt mạnh mẽ trong cộng đồng yêu nhạc Thái Lan và quốc tế với hơn 114 triệu lượt xem tính đến thời điểm hiện tại.', 'Một chuyến tàu đặc biệt xuyên qua không gian và cảm xúc\r\n\"รถไฟบนฟ้า\" mang ý nghĩa là “Tàu trên trời”, và “Galaxy Express” chính là tên gọi tượng trưng cho chuyến tàu xuyên vũ trụ của tình yêu và sự gắn kết. MV mở ra một hành trình hình ảnh đầy mơ mộng, nơi D GERRARD cùng hành khách trải nghiệm chuyến tàu đặc biệt xuyên qua những vì sao, những hành tinh trong dải Ngân Hà rộng lớn.\r\n\r\nLời bài hát được sáng tác đầy tâm huyết, khắc họa những cung bậc cảm xúc từ ngọt ngào, lãng mạn cho đến những giây phút cô đơn, chờ đợi và hy vọng trong tình yêu. Với giai điệu bắt tai, nhẹ nhàng pha chút sâu lắng, bài hát dễ dàng chạm đến trái tim của nhiều thế hệ người nghe.\r\n\r\nMV đầy màu sắc và ý tưởng sáng tạo độc đáo\r\nMV “Galaxy Express” được đạo diễn bởi Pichead Sungchom (@sjoii) – một trong những đạo diễn nổi bật với nhiều sản phẩm âm nhạc ấn tượng tại Thái Lan. Phong cách hình ảnh rực rỡ sắc màu pha trộn giữa ánh sáng neon và các hiệu ứng vũ trụ tạo nên không gian huyền ảo, cuốn hút người xem như đang phiêu lưu trong một thế giới khác biệt.\r\n\r\nD GERRARD không chỉ thể hiện giọng hát trong trẻo, truyền cảm mà còn xuất hiện trong MV với phong thái trẻ trung, năng động, làm nổi bật tinh thần của bài hát. Các cảnh quay chuyển đổi linh hoạt giữa không gian tàu vũ trụ và các góc nhìn cận cảnh, giúp truyền tải câu chuyện một cách rõ ràng và xúc động.\r\n\r\nTác phẩm được giới chuyên môn và khán giả đón nhận nồng nhiệt\r\nNgay sau khi ra mắt, “Galaxy Express” đã nhanh chóng leo lên các bảng xếp hạng nhạc số Thái Lan và lọt vào nhiều playlist nổi tiếng như \"All-Time Thai Hits\", \"Thai-Pop Supreme 2024\" trên các nền tảng Spotify và Apple Music. Ngoài ra, bài hát cũng được nhiều trang nhạc uy tín và kênh YouTube review nhạc quốc tế dành lời khen ngợi về sự phối khí, ca từ cũng như hình ảnh MV sáng tạo.\r\n\r\nNhiều người hâm mộ cũng thể hiện sự yêu thích bằng các video reaction, cover và remix trên các mạng xã hội, giúp bài hát lan tỏa rộng rãi hơn. Sự thành công này góp phần khẳng định vị trí vững chắc của D GERRARD trong làng nhạc Thái Lan cũng như thị trường âm nhạc Đông Nam Á.\r\n\r\nÝ nghĩa đặc biệt và tương lai của D GERRARD\r\n\"รถไฟบนฟ้า (Galaxy Express)\" không chỉ đơn thuần là một ca khúc pop nhẹ nhàng mà còn là biểu tượng cho những chuyến hành trình tình cảm đặc biệt, những cuộc gặp gỡ và chia ly trong cuộc sống. Bài hát như lời nhắn gửi về sự kiên nhẫn và hy vọng trong tình yêu dù có phải trải qua bao gian khó.\r\n\r\nVới sự thành công của “Galaxy Express”, D GERRARD tiếp tục khẳng định hướng đi âm nhạc riêng biệt, kết hợp yếu tố hiện đại và cảm xúc sâu sắc. Người hâm mộ đang rất mong chờ các sản phẩm tiếp theo của anh trong năm 2024.', 56, 0, 'images/j4kY8SmBtJYjtzaAGAhADUuro3r9LealLuyHMrnC.jpg', '2025-05-16 01:38:48', '2025-06-05 17:22:41', NULL, 'videos/24VZCsr9x9JY5MhvPjK3j6REk086jI7Rh9EfpAUv.mp4', NULL, NULL);
INSERT INTO `news` (`id`, `category_id`, `title`, `slug`, `summary`, `content`, `views`, `is_featured`, `image`, `created_at`, `updated_at`, `audio`, `video`, `audio_url`, `video_url`) VALUES
(202, 9, 'Bài hát \"ชอบตัวเองตอนอยู่กับเธอ\" (I Like Us) là đĩa đơn thứ ba của nghệ sĩ Thái Lan Billkin (Putthipong Assaratanakul), phát hành vào ngày 21 tháng 7 năm 2022. Đây cũng là sản phẩm âm nhạc đầu tiên dưới công ty riêng của anh – Billkin Entertainment .', 'bai-hat-i-like-us-la-dia-don-thu-ba-cua-nghe-si-thai-lan-billkin-putthipong-assaratanakul-phat-hanh-vao-ngay-21-thang-7-nam-2022-day-cung-la-san-pham-am-nhac-dau-tien-duoi-cong-ty-rieng-cua-anh-billkin-entertainment', '🎵 Nội dung và thông điệp bài hát\r\n\"ชอบตัวเองตอนอยู่กับเธอ\" là một bản pop soul mang âm hưởng vintage, kể về cảm giác khi một người trở nên tốt hơn, hạnh phúc hơn khi ở bên người mình yêu. Billkin chia sẻ rằng bài hát phản ánh cảm xúc tích cực khi có ai đó đặc biệt bước vào cuộc đời, khiến bản thân trở thành phiên bản tốt hơn .', '🎬 MV và sự tham gia của Juné\r\nMV của bài hát được đạo diễn bởi Kuy Teaw (จตุพงศ์ รุ่งเรืองเดชาภัทร์), lấy bối cảnh lớp học khiêu vũ mang phong cách thập niên 90. Nữ diễn viên Juné Plearnpichaya Komalarajun vào vai bạn nhảy của Billkin, cùng nhau thể hiện những khoảnh khắc lãng mạn thông qua điệu slow dance, biểu đạt quá trình hai người dần hiểu và yêu nhau .\r\n\r\n🏆 Thành tích nổi bật\r\nCa khúc đã đạt được nhiều thành công, bao gồm:\r\n\r\nMelody of the Year tại Line Melody Music Awards 2022\r\n\r\nBest Music of The Year tại TOTY Music Awards 2022\r\n\r\nStar Single Hits of The Year tại The Guitar Mag Awards 2023\r\n\r\nSilver Melody Awards tại Line Melody Music Awards 2024\r\n\r\nBest Male Artist 2024 .', 26, 0, 'images/qZrg6GXFyL92oyHFHOYsT5PxsLySFV5XkX9k5zLH.jpg', '2025-05-18 06:43:48', '2025-06-05 17:18:26', NULL, 'news/videos/jyYUwswwwGKfcvaGHCvuvNMLlK8IOd4llbQQNbv1.mp4', NULL, 'videos/mT5ho7tltFL4qey74l8xjueBVsWMfmTNxQ5xTLT7.mp4'),
(205, 9, 'PONCHET \"thả thính\" ngọt ngào trong ca khúc mới \"รักนะเด็กโง่ (Stupid Girl)\" – Khi yêu thương chân thành hóa thành giai điệu', 'ponchet-tha-thinh-ngot-ngao-trong-ca-khuc-moi-stupid-girl-khi-yeu-thuong-chan-thanh-hoa-thanh-giai-dieu', 'Bangkok, Thái Lan – Ngày 5/6/2025 – Giữa làn sóng nhạc trẻ Thái Lan đầy màu sắc, nam ca sĩ PONCHET một lần nữa khẳng định phong cách riêng của mình với ca khúc mới mang tên “รักนะเด็กโง่ (Stupid Girl)” – một bản tình ca vừa ngọt ngào vừa dí dỏm đang gây sốt trên mạng xã hội và các bảng xếp hạng âm nhạc trong khu vực.', '💗 Chân thành, dễ thương, và gần gũi – \"รักนะเด็กโง่\" là lời tỏ tình khiến trái tim tan chảy\r\nVới tựa đề dịch nghĩa nôm na là “Yêu em đấy, đồ ngốc”, ca khúc ngay lập tức tạo ấn tượng bởi sự hóm hỉnh trong tên gọi, nhưng lại mang theo chiều sâu cảm xúc bên trong. Lời bài hát là tâm sự của một chàng trai đang yêu – người nhìn thấy mọi sự vụng về, bướng bỉnh, ngốc nghếch của cô gái nhưng vẫn yêu hết lòng. Không cố gắng dùng những lời hoa mỹ, bài hát chọn cách truyền tải cảm xúc một cách gần gũi, đời thường và chân thật – đúng như tính cách âm nhạc của PONCHET.\r\n\r\n🎧 Phong cách âm nhạc nhẹ nhàng, hòa âm tinh tế\r\nCa khúc mang phong cách Pop pha chút R&B, với phần hòa âm sử dụng piano nền dịu dàng, nhịp trống nhẹ và âm thanh synth mờ ảo tạo nên không gian âm nhạc mộng mơ. Giọng hát của PONCHET tiếp tục là điểm nhấn, vừa tình cảm, vừa có chút lười biếng đúng kiểu \"bad boy lãng tử\" – nhưng lại khiến người nghe cảm thấy ấm áp.\r\n\r\n\"รักนะเด็กโง่\" được sáng tác bởi ทีม nhạc sĩ kỳ cựu của White Music, từng làm nên nhiều bản hit cho các nghệ sĩ hàng đầu Thái Lan, và được phối khí bởi Palm Sunday – một nhà sản xuất trẻ tài năng đang lên.\r\n\r\n🎬 MV – Một bộ phim học đường mini đầy cảm xúc\r\nMV chính thức được ra mắt trên YouTube White Music Official, được đầu tư chỉn chu cả về hình ảnh và nội dung. Câu chuyện kể về những khoảnh khắc nhỏ giữa hai người bạn học – từ lần đầu chạm mặt vụng về, những giây phút trêu đùa dễ thương, đến khoảnh khắc tỏ tình đơn giản mà đầy cảm xúc. MV mang tông màu pastel nhẹ nhàng, được quay theo phong cách điện ảnh học đường Nhật Bản, với những khung hình làm người xem như được trở lại tuổi học trò.\r\n\r\nMột điểm cộng lớn là diễn xuất tự nhiên của PONCHET, cùng nữ chính với vẻ đẹp trong sáng, đã giúp MV chạm đến cảm xúc của khán giả trẻ.\r\n\r\n📊 Hiệu ứng lan tỏa mạnh mẽ\r\nNgay sau khi phát hành, ca khúc đã nhanh chóng leo lên Top 3 Trending YouTube Thái Lan, đạt hơn 3 triệu lượt xem sau 48 giờ, và trở thành chủ đề nóng trên TikTok với hàng ngàn clip sử dụng đoạn điệp khúc:\r\n\r\n“รักนะเด็กโง่ แต่ก็รักมากนะเธอ”\r\n(Tạm dịch: Yêu em đấy đồ ngốc, mà yêu nhiều lắm cơ~)\r\n\r\nTrên Twitter, hashtag #รักนะเด็กโง่ lọt vào Top Trending trong đêm phát hành, kèm theo hàng loạt bình luận từ người hâm mộ như:\r\n\r\n💬 “Lời bài hát như viết cho mình vậy, vừa buồn cười vừa đáng yêu không chịu được!”\r\n💬 “Nghe xong chỉ muốn có người gọi mình là đồ ngốc và yêu mình thế này!”\r\n💬 “PONCHET làm nhạc rất có hồn, không chạy theo xu hướng mà tạo nên cái riêng.”\r\n\r\n📌 Một bước tiến mới cho PONCHET\r\nSau một thời gian hoạt động ổn định trong giới âm nhạc Thái Lan, PONCHET đang ngày càng chứng tỏ bản lĩnh nghệ sĩ thực thụ. Anh không ngừng đổi mới, thử sức với nhiều phong cách, nhưng vẫn giữ được chất riêng – vừa gần gũi, vừa lãng mạn và đậm chất cá nhân.\r\n\r\n“รักนะเด็กโง่” không chỉ là một ca khúc tình yêu đáng yêu, mà còn là một tuyên ngôn nhẹ nhàng về sự bao dung trong tình yêu – nơi mà người ta yêu nhau không vì sự hoàn hảo, mà vì chính những điều “ngốc nghếch” của đối phương.', 116, 0, 'images/b6o1XVecdenLBR0orKYD2ON8dxUAxJqysaqLhphD.jpg', '2025-06-05 01:41:08', '2025-10-15 01:45:37', NULL, 'news/videos/JbRaO0hNnz8Z6iGvYrnf54J8AzoGOxtLHKzT8DTE.mp4', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('htcatadc@gmail.com', '$2y$12$4FBDDUn2v0TpuNjvqbapp.rPdTMZob2VT1XDr5lotLS0ZiGNwT0Gm', '2025-05-06 09:02:44'),
('suongnie2k5@gmail.com', '$2y$12$12WsNB5opTIYmEHR3Pwq7eyBVH/TZ0FP3aCAdgJI0bFB9vCWZBYJu', '2025-05-16 03:39:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `is_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `avatar`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`, `is_admin`) VALUES
(4, 'User', 'User123@gmail.com', 'avatars/jFZE102gL3x3FcyekvfqtDuWoPWpRXPJ4EhqHzhv.jpg', NULL, '$2y$12$qTicqtBlPA55AkdvC9sy3O6Q5Wh91w4gMIUFHuZL0poj0.Co/gghi', NULL, '2025-04-16 18:56:14', '2025-05-07 11:04:06', 'user', 0),
(5, 'YSuongNie', 'suongnie2k5@gmail.com', 'avatars/2WuXn8UVVSVSgCOi9s6aqJ4irJloAfpdSE3Cp8Rt.jpg', NULL, '$2y$12$Ps7nJxxPluuF3x3xc0vE6Ou/brCyLETTewwtZSNltcqjCX/o0Za6W', 'ClPzivf3qaZ9fQrbZB5SlDiz98UNE5uo7uO2TaOWGJ63bqMwRNwhJOr0P6CH', '2025-04-23 07:25:15', '2025-05-17 22:55:50', 'admin', 1),
(6, 'LeVietDung', 'htcatadc@gmail.com', 'avatars/WOuA54MdpYufSGSGpg60Jkl7huIuVqIAp5HZLjKc.jpg', NULL, '$2y$12$4lgzsN47KjhnHlT//iqfGuiM25Gra1gjnhFSyr01PSQK4SKz6Kn7K', NULL, '2025-04-23 19:08:37', '2025-05-25 06:25:45', 'user', 0),
(8, 'Nghiaduong', 'nghia12@gmail.com', 'avatars/C89qxZcwd78m6slhzNK7k5XQun4gPX5TGUmPhGi6.webp', NULL, '$2y$12$xU3UYnrkOI7MyO7zEejbduGOQQQPmUf/MT1V29KNi8Lf7VvH8XSSm', NULL, '2025-05-05 05:33:36', '2025-05-05 05:35:43', 'user', 0),
(9, 'TANGON SƠN', 'tangon.son82@gmail.com', 'avatars/39t8ImC0oCxhIblAhuwmDAUHhnzd4CmTyUGaFl8i.jpg', NULL, '$2y$12$NvpykH18VhG4/oD22HBWm.A.C6BQo1eQtynf6VjU4FzDUcaX.O4Im', NULL, '2025-05-07 08:12:05', '2025-05-07 08:12:57', 'user', 0),
(10, 'sang', 'Sang@gmail.com', 'avatars/IMnzWBQrA4QSaWBSxI3FXUBMrmho5vVy9bgDJWxN.jpg', NULL, '$2y$12$LC7Yl1pSQdYPrWAsAG8/V.MbVUyyrjxoVZf0s7fypL.jzKYzbDhPW', NULL, '2025-05-07 10:53:08', '2025-05-15 03:26:35', 'user', 0),
(11, 'trung', 'trungpk62@gmail.com', 'avatars/IFRXpRyEtj7hIJkEJ4bXuvvqgbrOx76xRyZsUNXQ.jpg', NULL, '$2y$12$KDxa1cE3sWzc9nAI1NJGWup2vPif/QNtctTy5dGS9tbfVyFS4ggS2', NULL, '2025-05-07 17:44:53', '2025-05-16 03:21:47', 'user', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Chỉ mục cho bảng `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_news_id_foreign` (`news_id`),
  ADD KEY `comments_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Chỉ mục cho bảng `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_mediable_type_mediable_id_index` (`mediable_type`,`mediable_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `news_slug_unique` (`slug`),
  ADD KEY `news_category_id_foreign` (`category_id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=206;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_news_id_foreign` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
