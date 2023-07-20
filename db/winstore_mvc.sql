-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2023 at 04:42 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `winstore_mvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` int(11) NOT NULL,
  `total` int(11) NOT NULL DEFAULT 0,
  `payment` int(11) NOT NULL,
  `date_buy` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_staff` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bill_detail`
--

CREATE TABLE `bill_detail` (
  `id` int(11) NOT NULL,
  `id_bill` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `id_staff` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `id_staff`) VALUES
(14, 'Quần kaki', 1),
(16, 'Quần jeans', 1),
(17, 'Quần shorts', 1),
(18, 'Áo nỉ', 1),
(19, 'Áo len', 1),
(20, 'Áo khoác', 1),
(21, 'Áo phông', 1),
(22, 'Quần vải', 1),
(27, 'hfghdhfh', 1),
(28, 'fhfhfdhdfgh', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories_post`
--

CREATE TABLE `categories_post` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `id_staff` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories_post`
--

INSERT INTO `categories_post` (`id`, `name`, `id_staff`) VALUES
(1, 'Tin tức', 1),
(3, 'Khuyến mãi', 1);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `content` longtext NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date_comment` datetime NOT NULL,
  `star` tinyint(5) NOT NULL DEFAULT 5
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `content`, `id_product`, `id_user`, `date_comment`, `star`) VALUES
(1, 'hhtht', 3, 8, '2023-02-23 20:54:59', 5),
(2, 'hahah', 3, 8, '2023-02-23 21:34:09', 3),
(3, 'cham', 3, 8, '2023-02-23 21:35:01', 5),
(4, 'Xịn', 40, 8, '2023-02-24 00:20:19', 5),
(5, 'SP tot', 15, 9, '2023-02-24 08:46:56', 5),
(6, 'Sp Tot', 23, 9, '2023-02-24 08:47:09', 5),
(7, 'hihi\r\n', 23, 9, '2023-02-24 08:49:36', 5),
(8, 'hih', 15, 9, '2023-02-24 08:49:50', 5),
(9, 'hi', 28, 9, '2023-02-24 08:50:09', 5);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `describe_short` longtext NOT NULL COMMENT 'mô tả ngắn',
  `content` longtext NOT NULL COMMENT 'mô tả',
  `img` longtext NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 là hiển thị',
  `view` int(11) NOT NULL DEFAULT 0,
  `post_date` datetime NOT NULL,
  `id_category_post` int(11) NOT NULL,
  `id_staff` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `describe_short`, `content`, `img`, `status`, `view`, `post_date`, `id_category_post`, `id_staff`) VALUES
(4, 'Preppy Style là gì? Học cách phối đồ đơn giản theo phong cách Preppy', 'Preppy style là phong cách thời trang học đường đang “làm mưa làm gió” trong giới trẻ. Không khó để bắt gặp hình ảnh các bạn trẻ phối đồ đa sắc từ các items có mảng màu color block tinh tế, typo và hình thêu cổ điển ấn tượng. Các outfit theo phong cách này mang đậm nét sang trọng, thanh lịch nhưng không kém phần trẻ trung. Điều gì làm nên “sức hút” của Preppy Style? Cùng CANIFA tìm hiểu nhé!', '<h2><strong>Preppy Style l&agrave; g&igrave; ?&nbsp;</strong></h2>\r\n\r\n<p>Phong c&aacute;ch Preppy (hay c&ograve;n gọi preppie hay prep) l&agrave; một thuật ngữ c&oacute; từ những năm 1920s, n&oacute;i về n&eacute;t văn h&oacute;a đến từ giới trung lưu v&agrave; thượng lưu nước Mỹ, bao gồm: c&aacute;c nghi thức ứng xử, phong c&aacute;ch lối sống, phong c&aacute;ch trang điểm v&agrave; xu hướng thời trang. Điều n&agrave;y được thể hiện r&otilde; nhất ở c&aacute;ch ăn mặc của c&aacute;c sinh vi&ecirc;n trường dự bị đại học tư thục tại Bắc Mỹ. Preppy Style được biết đến với c&aacute;c n&eacute;t đặc trưng như: lịch thiệp, sạch sẽ, giản dị v&agrave; mang t&iacute;nh thẩm mỹ.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"https://canifa.com/blog/wp-content/uploads/2022/12/phong-cach-preppy-style-4.png\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Phong c&aacute;ch thời trang n&agrave;y xuất ph&aacute;t từ c&aacute;c bộ đồng phục học sinh thuộc giới thượng lưu. Preppy c&oacute; sự h&ograve;a trộn tinh tế, h&agrave;i h&ograve;a giữa n&eacute;t cổ điển v&agrave; hiện đại. Theo d&ograve;ng chảy của thời trang, Preppy Style tiếp tục được kế thừa v&agrave; biến h&oacute;a cho ph&ugrave; hợp với phong c&aacute;ch hiện đại, mang t&iacute;nh ứng dụng cao hơn v&agrave; ph&ugrave; hợp với đa dạng đối tượng, thay v&igrave; chỉ g&oacute;i gọn trong tầng lớp thượng lưu như trước đ&oacute;.</p>\r\n\r\n<h2><strong>Lịch sử h&igrave;nh th&agrave;nh v&agrave; ph&aacute;t triển của Preppy</strong></h2>\r\n\r\n<p>Thuật ngữ &ldquo;preppy&rdquo; (hay c&ograve;n gọi l&agrave; preparatory school) bắt nguồn từ nửa đầu thế kỷ 20 (1900-1950). Nguồn gốc h&igrave;nh th&agrave;nh phong c&aacute;ch n&agrave;y xuất ph&aacute;t từ đồng phục của c&aacute;c nh&oacute;m sinh vi&ecirc;n c&aacute;c trường học thuộc Ivy League &ndash; nh&oacute;m trường d&agrave;nh cho tầng lớp trung lưu v&agrave; thượng lưu, lu&ocirc;n được biết đến với th&agrave;nh t&iacute;ch học tập nổi bật.</p>\r\n\r\n<p>V&agrave;o những năm 1930, ta chứng kiến sự &ldquo;l&ecirc;n ng&ocirc;i&rdquo; của c&aacute;c trang phục denim, những trang phục rộng th&ugrave;ng th&igrave;nh cũng bắt đầu trở th&agrave;nh xu hướng.</p>\r\n\r\n<p>Cho đến năm 1980, một cuốn s&aacute;ch mang t&ecirc;n&nbsp;<em>Cẩm nang Preppy</em>&nbsp;ph&aacute;t h&agrave;nh với mục đ&iacute;ch ban đầu l&agrave; mỉa mai những người theo đuổi văn ho&aacute; preppy. Tuy nhi&ecirc;n, cuốn s&aacute;ch n&agrave;y lại truyền cảm hứng cho h&agrave;ng ng&agrave;n người. Từ đ&oacute;, cụm từ &ldquo;preppy&rdquo; kh&ocirc;ng c&ograve;n chỉ l&agrave; thuật ngữ n&oacute;i về văn h&oacute;a của giới thượng lưu, m&agrave; đ&atilde; trở th&agrave;nh một phong c&aacute;ch ấn tượng trong l&agrave;ng thời trang thế giới. Phong c&aacute;ch n&agrave;y dần nổi tiếng v&agrave; dễ d&agrave;ng bắt gặp tr&ecirc;n đường phố. Hiện nay, preppy style vẫn l&agrave; phong c&aacute;ch thời trang kinh điển mang n&eacute;t đẹp sang trọng v&agrave; thanh lịch.</p>\r\n\r\n<h2><strong>Đặc điểm nhận biết phong c&aacute;ch Preppy</strong></h2>\r\n\r\n<p>L&agrave; một phong c&aacute;ch thời trang nam cao cấp v&agrave; nữ cổ điển, Preppy lu&ocirc;n ch&uacute; trọng giữ những đặc t&iacute;nh cốt l&otilde;i của trang phục đ&oacute; ch&iacute;nh l&agrave; form d&aacute;ng chuẩn, đường cắt may gọn g&agrave;ng, tinh tế, chất liệu đạt chất lượng cao. Đặc trưng của phong c&aacute;ch n&agrave;y l&agrave; sự cổ điển, n&eacute;t đồng điệu trong c&aacute;ch phối giữa trang phục, cả c&aacute;ch trang điểm, v&agrave; tất cả h&igrave;nh th&agrave;nh n&ecirc;n một phong th&aacute;i tri thức v&agrave; sang trọng.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"https://canifa.com/blog/wp-content/uploads/2022/12/phong-cach-preppy-style-1-1360x907.jpg\" /></p>\r\n\r\n<p>Ca sĩ Anh T&uacute;, Orange v&agrave; diễn vi&ecirc;n Avin Lu biến h&oacute;a với trang phục nỉ Canifa theo phong c&aacute;ch Preppy cực trendy v&agrave; đầy kh&iacute; chất.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>M&agrave;u sắc trang phục chủ yếu thường nghi&ecirc;ng về tone m&agrave;u vintage như x&aacute;m, đỏ đậm, trắng, xanh denim nhạt, đen, xanh l&aacute; c&acirc;y đậm. Họa tiết trang phục cũng l&agrave; một phần đặc trưng gi&uacute;p nhận diện phong c&aacute;ch n&agrave;y với họa tiết chấm bi, kẻ caro 1 m&agrave;u nhiều t&ocirc;ng, kẻ &ocirc; vu&ocirc;ng bản lớn hoặc kiểu kẻ ngang.&nbsp;</li>\r\n	<li>Họa tiết trang phục cũng l&agrave; một yếu tố đặc trưng để nhận diện phong c&aacute;ch n&agrave;y. C&aacute;c họa tiết ti&ecirc;u biểu bao gồm: chấm bi, kẻ caro 1 m&agrave;u nhiều t&ocirc;ng, kẻ &ocirc; vu&ocirc;ng bản lớn hoặc kiểu kẻ ngang.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Đa phần c&aacute;c trang phục theo Preppy Style thường k&iacute;n đ&aacute;o n&ecirc;n sẽ t&ocirc;n l&ecirc;n được vẻ đẹp tinh tế, sang chảnh. Ch&iacute;nh v&igrave; vậy, phong c&aacute;ch n&agrave;y hạn chế c&aacute;c phụ kiện rườm r&agrave; v&agrave; những đường cut-out t&aacute;o bạo. Preppy mang những đặc t&iacute;nh cốt l&otilde;i của c&aacute;c thiết kế đi ngược sự khi&ecirc;m tốn v&agrave; dệt may chất lượng th&ocirc;ng thường. Một bộ trang phục qu&aacute; h&agrave;o nho&aacute;ng, kết cấu phức tạp l&agrave; sự th&agrave;nh c&ocirc;ng cơ bản để đ&aacute;nh gi&aacute; được một người theo đuổi phong c&aacute;ch preppy.</p>\r\n\r\n<h2><strong>Phối đồ đơn giản theo phong c&aacute;ch Preppy</strong></h2>\r\n\r\n<h3><strong>&Aacute;o nỉ phối c&ugrave;ng ch&acirc;n v&aacute;y jeans cho n&agrave;ng th&ecirc;m năng động</strong></h3>\r\n\r\n<p>Ch&acirc;n v&aacute;y jean mix c&ugrave;ng&nbsp;&aacute;o nỉ&nbsp;l&agrave; c&aacute;ch phối thời trang kinh điển m&agrave; chắc chắn n&agrave;ng kh&ocirc;ng thể bỏ qua. Sự trẻ trung v&agrave; thoải m&aacute;i của chiếc &aacute;o nỉ kết hợp c&ugrave;ng sự tinh tế v&agrave; năng động của ch&acirc;n v&aacute;y jeans sẽ gi&uacute;p n&agrave;ng tạo n&ecirc;n một vẻ ngo&agrave;i c&aacute; t&iacute;nh v&agrave; nổi bật. Đặc biệt, t&ocirc;ng m&agrave;u đỏ v&agrave; xanh khi kết hợp sẽ mang đến một vẻ ngo&agrave;i nổi bật cho những c&ocirc; n&agrave;ng theo đuổi phong c&aacute;ch Preppy.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"https://canifa.com/blog/wp-content/uploads/2022/12/phong-cach-preppy-style-2-1-1360x680.png\" /></p>\r\n\r\n<p>&ldquo;Chơi&rdquo; với m&agrave;u sắc với phong c&aacute;ch Preppy từ nỉ Canifa.</p>\r\n\r\n<h3><strong>Combo &aacute;o nỉ, &aacute;o bomber v&agrave; quần jeans trẻ trung cho ch&agrave;ng</strong></h3>\r\n\r\n<p>Kết hợp &aacute;o kho&aacute;c nỉ với quần jeans đen v&agrave; th&ecirc;m một đ&ocirc;i sneaker c&ugrave;ng tone để l&agrave;m nổi bật trang phục của những anh ch&agrave;ng năng động. C&aacute;ch phối hợp n&agrave;y tuy rất đơn giản nhưng đem đến cho bạn một set đồ trẻ trung v&agrave; c&aacute; t&iacute;nh. Tone m&agrave;u tương phản v&agrave; cổ điển theo phong c&aacute;ch Preppy.</p>\r\n\r\n<p><img alt=\"\" src=\"https://canifa.com/blog/wp-content/uploads/2022/12/phong-cach-preppy-style-3-1360x680.png\" /></p>\r\n\r\n<p>Vẫn l&agrave; phong c&aacute;ch Preppy, nhưng c&oacute; đa dạng c&aacute;ch phối đồ cho từng c&aacute; t&iacute;nh.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a href=\"https://canifa.com/do-ni\"><strong>MUA NGAY 1.000+ ITEMS NỈ MỚI NHẤT TẠI CANIFA</strong></a></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>&Aacute;o nỉ hoodie phối c&ugrave;ng ch&acirc;n v&aacute;y cho b&eacute; g&aacute;i dễ thương</strong></h3>\r\n\r\n<p>Chỉ với hai items đơn giản v&agrave; xinh xắn, b&eacute; g&aacute;i đ&atilde; c&oacute; thể sở hữu một bộ trang phục ấn tượng cực k&igrave; năng động v&agrave; phong c&aacute;ch. Ch&acirc;n v&aacute;y kết hợp với &aacute;o nỉ hoodie l&agrave; lựa chọn l&yacute; tưởng cho c&aacute;c b&eacute; khi đi chơi v&agrave; đi&nbsp; đến trường. Ba mẹ c&oacute; thể sắm th&ecirc;m cho b&eacute; một chiếc mũ v&agrave; một đ&ocirc;i sneakers để b&eacute; con của bạn c&oacute; một ng&agrave;y vui chơi v&agrave; học tập tr&agrave;n đầy năng lượng nh&eacute;!</p>\r\n\r\n<p><img alt=\"\" src=\"https://canifa.com/blog/wp-content/uploads/2022/12/phong-cach-preppy-style-5.jpg\" /></p>\r\n\r\n<h3><strong>&Aacute;o hoodie phối c&ugrave;ng quần jogger cho b&eacute; trai th&ecirc;m c&aacute; t&iacute;nh</strong></h3>\r\n\r\n<p>Trong những ng&agrave;y trời se lạnh th&igrave; quần jogger v&agrave; &aacute;o hoodie l&agrave; phong c&aacute;ch ăn mặc bạn c&oacute; thể sắm ngay cho b&eacute; trai nh&agrave; m&igrave;nh. Đặc biệt, một chiếc &aacute;o hoodie t&ocirc;ng xanh phối c&ugrave;ng quần jogger đen sẽ tạo n&ecirc;n một set đồ khỏe khoắn v&agrave; c&aacute; t&iacute;nh cho b&eacute;. Để trở n&ecirc;n c&aacute; t&iacute;nh hơn, bạn c&oacute; thể mặc th&ecirc;m cho b&eacute; một chiếc &aacute;o kho&aacute;c gile c&oacute; m&agrave;u đối lập với quần jogger v&agrave; &aacute;o bomber để tạo điểm nhấn.</p>\r\n\r\n<p><img alt=\"\" src=\"https://canifa.com/blog/wp-content/uploads/2022/12/phong-cach-preppy-style-6.jpg\" /></p>\r\n\r\n<p>Tr&ecirc;n đ&acirc;y l&agrave; những chia sẻ về phong c&aacute;ch Preppy Style v&agrave; những outfit hơi hướng retro, cổ điển v&agrave; nổi bật cho cả gia đ&igrave;nh. Nếu bạn muốn theo đuổi xu hướng Preppy Style thực thụ th&igrave; đừng ngại thử những outfit m&agrave; Canifa đ&atilde; gợi &yacute; nh&eacute;. Đừng qu&ecirc;n thường xuy&ecirc;n gh&eacute; blog của Canifa để t&igrave;m hiểu th&ecirc;m về thời trang v&agrave; xu hướng mới nhất!</p>\r\n', 'do-ni-canifa-young-at-heart.png', 0, 2, '2023-02-19 05:19:10', 1, 1),
(5, 'Những mẫu áo khoác nam đẹp và phổ biến nhất 2022', 'Mùa đông về, lại là mùa của những chiếc áo khoác lên ngôi. Đây cũng sẽ là item không thể thiếu dành cho anh em trong tiết trời se lạnh này. Chúng không chỉ giúp giữ ấm mà còn làm nổi bật lên phong cách thời trang của mình.\r\n\r\nTrải qua từng năm những phong cách, thiết kế áo khoác ngày càng thay đổi làm cho các đấng mày râu khó có sự lựa chọn phù hợp. Hãy cùng CANIFA tìm hiểu những mẫu áo khoác nam đẹp và phổ biến nhất năm 2022 nhé !                                     ', '<h2><strong>&Aacute;o kho&aacute;c gi&oacute;</strong></h2>\r\n\r\n<p>&Aacute;o kho&aacute;c gi&oacute; đang l&agrave; một trong những mẫu &aacute;o kho&aacute;c phổ biến v&agrave; được sử dụng nhiều nhất hiện nay. Với tiết trời kh&ocirc;ng qu&aacute; lạnh buốt th&igrave; &aacute;o kho&aacute;c gi&oacute; thật sự rất ph&ugrave; hợp, những chiếc &aacute;o kho&aacute;c n&agrave;y được thiết kế với khả năng chắn gi&oacute; cao, chống nước tốt v&agrave; rất dễ d&agrave;ng vận động. Chiếc &aacute;o kho&aacute;c gi&oacute; n&agrave;y th&iacute;ch hợp cho c&aacute;c bạn nam y&ecirc;u th&iacute;ch sự thoải m&aacute;i, thể thao v&agrave; du lịch.</p>\r\n\r\n<p><strong>Mua ngay :&nbsp;<a href=\"https://canifa.com/nam/ao-khoac-gio.html\">&Aacute;o kho&aacute;c gi&oacute; nam</a>&nbsp;</strong></p>\r\n\r\n<p><img alt=\"Áo khoác gió 3 giây 4 cản\" src=\"https://canifa.com/blog/wp-content/uploads/2022/10/ao-khoac-gio-nam.jpg\" /></p>\r\n\r\n<p>&Aacute;o kho&aacute;c gi&oacute; 3 gi&acirc;y 4 cản</p>\r\n\r\n<p><img alt=\"Mẫu áo khoác gió hot nhất hiện nay\" src=\"https://canifa.com/blog/wp-content/uploads/2022/10/ao-khoac-gio-nam-2.jpg\" /></p>\r\n\r\n<p>Mẫu &aacute;o kho&aacute;c gi&oacute; hot nhất hiện nay</p>\r\n\r\n<h2><strong>&Aacute;o kho&aacute;c dạ</strong></h2>\r\n\r\n<p>&Aacute;o kho&aacute;c dạ l&agrave; những chiếc &aacute;o kho&aacute;c được thiết kế đẹp mắt v&agrave; v&ocirc; c&ugrave;ng ấn tượng. Đ&acirc;y l&agrave; mẫu &aacute;o kho&aacute;c giữ ấm rất tốt nhưng vẫn đảm bảo t&iacute;nh thời trang cao. Những chiếc &aacute;o kho&aacute;c dạ gi&uacute;p cho người mặc to&aacute;t l&ecirc;n vẻ điển trai, nam t&iacute;nh nhưng cũng rất trẻ trung v&agrave; năng động. Chiếc &aacute;o n&agrave;y cũng dễ phối đồ v&agrave; l&agrave; outfit kh&ocirc;ng thể thiếu trong tủ đồ của anh em trong m&ugrave;a đ&ocirc;ng n&agrave;y.</p>\r\n\r\n<p><img alt=\"Áo khoác dạ nam đẹp\" src=\"https://canifa.com/blog/wp-content/uploads/2022/10/ao-khoac-da-nam.jpg\" /></p>\r\n\r\n<p>&Aacute;o kho&aacute;c dạ nam đẹp</p>\r\n\r\n<h2><strong>&Aacute;o kho&aacute;c cardigan</strong></h2>\r\n\r\n<p>&Aacute;o kho&aacute;c cardigan cho nam l&agrave; một trong những item linh hoạt nhất, ph&ugrave; hợp với nhiều thời tiết trong năm. Với chất liệu len, thiết kế mỏng nhẹ, m&agrave;u sắc, kiểu d&aacute;ng đa dạng khiến bạn thoải m&aacute;i phối đồ với nhiều phong c&aacute;ch thời trang kh&aacute;c nhau.</p>\r\n\r\n<p><img alt=\"Áo khoác cardigan nam sự lựa chọn tuyệt vời\" src=\"https://canifa.com/blog/wp-content/uploads/2022/10/ao-cardigan-nam-1360x1360.jpg\" /></p>\r\n\r\n<p>&Aacute;o kho&aacute;c cardigan nam sự lựa chọn tuyệt vời</p>\r\n\r\n<h2><strong>&Aacute;o kho&aacute;c l&ocirc;ng vũ</strong></h2>\r\n\r\n<p>&Aacute;o kho&aacute;c l&ocirc;ng vũ l&agrave; chiếc &aacute;o kho&aacute;c được mệnh danh l&agrave; &ldquo;kẻ hủy diệt&rdquo; m&ugrave;a đ&ocirc;ng. Những chiếc &aacute;o kho&aacute;c n&agrave;y với khả năng giữ ấm cực tốt, những cũng kh&ocirc;ng qu&aacute; d&agrave;y v&agrave; nặng l&agrave;m cho người mặc kh&ocirc;ng bị b&iacute; b&aacute;ch, kh&oacute; chịu.</p>\r\n\r\n<p><img alt=\"Áo khoác lông vũ nam đẹp\" src=\"https://canifa.com/blog/wp-content/uploads/2022/10/ao-khoac-long-vu-nam-2.jpg\" /></p>\r\n\r\n<p>Mẫu &aacute;o kho&aacute;c l&ocirc;ng vũ nam đẹp</p>\r\n\r\n<p>&Aacute;o kho&aacute;c l&ocirc;ng vũ cũng rất dễ d&agrave;ng cho anh em phối đồ khi c&oacute; thể kết hợp được với nhiều trang phục kh&aacute;c nhau như &aacute;o thun, quần jean, quần &acirc;u v&agrave; &aacute;o sơ mi. Bạn c&oacute; thể diện chiếc &aacute;o n&agrave;y ở mọi nơi như khi đi học, đi l&agrave;m, đi chơi &hellip;</p>\r\n\r\n<p><img alt=\"\" src=\"https://canifa.com/blog/wp-content/uploads/2022/10/ao-khoac-long-vu-nam-1.jpg\" /></p>\r\n\r\n<h2><strong>&Aacute;o kho&aacute;c nỉ</strong></h2>\r\n\r\n<p>Đ&acirc;y l&agrave; chiếc &aacute;o kho&aacute;c d&agrave;nh cho những anh em n&agrave;o th&iacute;ch phong c&aacute;ch đơn giản. Th&iacute;ch hợp để mặc đi thể thao, dạo phố. Mẫu &aacute;o kho&aacute;c n&agrave;y rất được ưa chuộng bởi khả năng giữ ấm tốt v&agrave; v&ocirc; c&ugrave;ng thoải m&aacute;i. V&igrave; vậy, đ&acirc;y l&agrave; một trong những mẫu &aacute;o kho&aacute;c phổ biến nhất hiện nay.</p>\r\n\r\n<p><img alt=\"Áo khoác nỉ nam cho phong cách đơn giản \" src=\"https://canifa.com/blog/wp-content/uploads/2022/10/ao-khoac-ni-nam-1.jpg\" /></p>\r\n\r\n<p>&Aacute;o kho&aacute;c nỉ nam cho phong c&aacute;ch đơn giản</p>\r\n\r\n<h2><strong>&Aacute;o kho&aacute;c bomber</strong></h2>\r\n\r\n<p>&Aacute;o kho&aacute;c bomber nam l&agrave; item c&oacute; thiết kế điển h&igrave;nh: bo thun ở cổ &aacute;o, cổ tay v&agrave; gấu &aacute;o, d&acirc;y kh&oacute;a k&eacute;o thẳng t&aacute;ch biệt với cổ &aacute;o tạo n&ecirc;n sự mạnh mẽ. &Aacute;o được thiết kế với đa dạng kiểu d&aacute;ng, m&agrave;u sắc cũng như chất liệu. &Aacute;o c&oacute; thể dễ d&agrave;ng phối với &aacute;o sơ mi, &aacute;o thun hoặc &aacute;o len mang đến phong c&aacute;ch thời trang v&ocirc; c&ugrave;ng thanh lịch v&agrave; trẻ trung.</p>\r\n\r\n<p><img alt=\"Áo khoác bomber nam\" src=\"https://canifa.com/blog/wp-content/uploads/2022/10/ao-khoac-bomber.jpg\" /></p>\r\n\r\n<p>&Aacute;o kho&aacute;c bomber nam</p>\r\n\r\n<h2><strong>&Aacute;o kho&aacute;c da</strong></h2>\r\n\r\n<p>Nhắc đến những&nbsp;<em><a href=\"https://canifa.com/blog/mau-ao-khoac-nam-dep/\">mẫu &aacute;o kho&aacute;c nam phổ biển hiện nay</a></em>&nbsp;ch&uacute;ng ta kh&ocirc;ng thể bỏ qua được mẫu &aacute;o kho&aacute;c da d&agrave;nh cho anh em. Những chiếc &aacute;o n&agrave;y mang c&aacute; t&iacute;nh mạnh mẽ, thời trang. Thiết kế &aacute;o kho&aacute;c da với nhiều m&agrave;u sắc kh&aacute;c nhau n&ecirc;n cũng rất dễ cho anh phối đồ, bạn c&oacute; thể kết hợp với quần jean, quần &acirc;u, &aacute;o thun hay &aacute;o sơ mi đều tạo cho m&igrave;nh phong c&aacute;ch v&ocirc; c&ugrave;ng c&aacute; t&iacute;nh.</p>\r\n\r\n<p><img alt=\"Áo khoác da cho anh em cá tính\" src=\"https://canifa.com/blog/wp-content/uploads/2022/10/ai-khoac-da.jpg\" /></p>\r\n\r\n<p>&Aacute;o kho&aacute;c da cho anh em c&aacute; t&iacute;nh</p>\r\n', 'mau-ao-khoac-nam-dep-2022.jpg', 0, 0, '2023-02-19 05:41:46', 1, 1),
(7, '7 loại vải may áo chống nắng chất lượng nhất hiện nay', 'Sử dụng áo chống nắng hàng ngày nhưng bạn có biết sản phẩm ấy làm từ chất liệu vải nào, liệu đấy có phải là loại vải có khả năng chống tia cực tím tối ưu nhất chưa? Đây là điều rất nhiều người bỏ qua, dẫn tới việc mua phải sản phẩm giá thành cao nhưng không thực sự hiệu quả. Cùng Canifa tìm hiểu top 6 loại vải may áo chống nắng chất lượng nhất hiện nay và lựa chọn cho mình sản phẩm phù hợp nhất nhé.                               ', '<h2><strong>UPF &ndash; Chỉ số đ&aacute;nh gi&aacute; khả năng cản tia UV của vải &aacute;o chống nắng</strong></h2>\r\n\r\n<p>Nếu như&nbsp;<a href=\"https://en.wikipedia.org/wiki/SPF\">SPF</a>&nbsp;(Sun Protection Factor) l&agrave; chỉ số đ&aacute;nh gi&aacute; cho kem chống nắng th&igrave; UPF (Ultraviolet Protection Factor) l&agrave; chỉ số đ&aacute;nh gi&aacute; mức độ bảo vệ của vải khỏi c&aacute;c&nbsp;<a href=\"https://canifa.com/blog/tia-uv-la-gi/\">tia UV</a>, &aacute;p dụng với c&aacute;c sản phẩm may mặc như mũ, khẩu trang, &aacute;o chống nắng,&hellip; Chỉ số n&agrave;y được t&iacute;nh dựa theo tỉ lệ tia cực t&iacute;m c&oacute; thể xuy&ecirc;n thấu qua chất liệu. Chỉ số UPF c&agrave;ng cao th&igrave; khả năng chặn tia UVA v&agrave; UVB c&agrave;ng lớn.&nbsp;</p>\r\n\r\n<p>V&iacute; dụ:&nbsp;</p>\r\n\r\n<p>&ndash; UPF 10 cho thấy loại vải n&agrave;y cho ph&eacute;p 1/10 (khoảng 10%) lượng tia tử ngoại đi qua v&agrave; chặn được 90% bức xạ UV đi qua n&oacute;.&nbsp;</p>\r\n\r\n<p>&ndash; UPF 30 (như &aacute;o chống nắng Canifa 2022) cho thấy loại vải n&agrave;y cho ph&eacute;p 1/30 (khoảng 3.3%) lượng tia tử ngoại đi qua v&agrave; chặn được 96.7% bức xạ UV đi qua n&oacute;.&nbsp;</p>\r\n\r\n<p>Theo đ&oacute;, loại vải may &aacute;o chống nắng l&yacute; tưởng cần c&oacute; chỉ số UPF từ 30 trở l&ecirc;n, với khả năng chống tia UV vượt 95%.</p>\r\n\r\n<p>Chỉ số UPF của c&aacute;c sản phẩm chống nắng cần c&oacute; chứng nhận của c&aacute;c tổ chức uy t&iacute;n, k&egrave;m theo kết quả b&aacute;o c&aacute;o sau khi kiểm tra bằng c&aacute;c thiết bị của ph&ograve;ng th&iacute; nghiệm (quang phổ hoặc đo bức xạ quang). Một số tổ chức h&agrave;ng đầu thế giới l&agrave; ARPANSA (&Uacute;c) v&agrave; SZU (Đức). Tại Việt Nam, việc kiểm định được thực hiện bởi Viện nghi&ecirc;n cứu Dệt may.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"Xếp loại chỉ số UFP\" src=\"https://canifa.com/blog/wp-content/uploads/2022/05/Chat-lieu-vai-ao-chong-nang-tot-1.png\" /></p>\r\n\r\n<p>Xếp loại chỉ số UFP</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>C&aacute;c yếu tố ảnh hưởng đến chất lượng của vải &aacute;o chống nắng</strong></h2>\r\n\r\n<p>Hiện nay tr&ecirc;n thị trường c&oacute; rất nhiểu loại &aacute;o chống nắng được l&agrave;m từ c&aacute;c chất liệu kh&aacute;c nhau. Tuy nhi&ecirc;n, kh&ocirc;ng phải chất liệu n&agrave;o cũng c&oacute; mức độ chắn nắng v&agrave; cản UV tương đương nhau. C&oacute; 3 yếu tố quan trọng quyết định hiệu quả chống nắng của vải.&nbsp;</p>\r\n\r\n<h3><strong>Chất liệu chuy&ecirc;n dụng&nbsp;</strong></h3>\r\n\r\n<p>Kh&ocirc;ng giống như c&aacute;c sản phẩm thời trang kh&aacute;c, &aacute;o chống nắng cần được l&agrave;m từ c&aacute;c chất liệu đặc biệt. Chất liệu quyết định rất lớn đến khả năng bảo vệ l&agrave;n da khỏi sự x&acirc;m hại của &aacute;nh nắng mặt trời.&nbsp;</p>\r\n\r\n<p>Về cơ bản, t&aacute;c dụng chống nắng của c&aacute;c loại vải đều dựa tr&ecirc;n hai nguy&ecirc;n l&yacute; l&agrave; che chắn nắng (sunscreen) v&agrave; phản chiếu nắng (sunblock). Tuỳ theo từng chất liệu m&agrave; hai cơ chế n&agrave;y hoạt động ở c&aacute;c mức độ kh&aacute;c nhau. Dẫn đến mỗi chất liệu c&oacute; chỉ số UPF kh&aacute;c nhau, khả năng ngăn chặn tia UV xuy&ecirc;n qua cũng kh&aacute;c nhau.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"Chất liệu vải chuyên dụng\" src=\"https://canifa.com/blog/wp-content/uploads/2022/05/Chat-lieu-vai-ao-chong-nang-tot-2.png\" /></p>\r\n\r\n<p>Chất liệu vải chuy&ecirc;n dụng</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&ndash; C&aacute;c chất liệu c&oacute; độ b&oacute;ng cao sẽ phản chiếu &aacute;nh s&aacute;ng tốt hơn c&aacute;c chất vải th&ocirc;. V&iacute; dụ như rayon phản chiếu nhiều tia UV hơn, trong khi đ&oacute; vải lanh lại c&oacute; xu hướng hấp thụ tia cực t&iacute;m hơn l&agrave; phản xạ.</p>\r\n\r\n<p>&ndash; C&aacute;c chất liệu mỏng nhẹ như lụa, satin c&oacute; khả năng bảo vệ da k&eacute;m hơn so với c&aacute;c chất vải d&agrave;y như jeans, cotton.&nbsp;</p>\r\n\r\n<p>&ndash; C&aacute;c sợi tổng hợp v&agrave; b&aacute;n tổng hợp như polyester, acrylic, nylon, lycra, rayon c&oacute; khả năng phản chiếu tia tử ngoại tốt hơn sợi tự nhi&ecirc;n. Ngo&agrave;i ra, sợi tổng hợp c&ograve;n c&oacute; khả năng thấm h&uacute;t nhanh, tho&aacute;ng kh&iacute;, kh&ocirc;ng nhăn v&agrave; kh&ocirc;ng co r&uacute;t khi giặt.&nbsp;</p>\r\n\r\n<p>Ng&agrave;y nay, c&aacute;c nh&agrave; sản xuất c&ograve;n ứng dụng c&ocirc;ng nghệ ti&ecirc;n tiến, gia cố th&ecirc;m c&aacute;c th&agrave;nh phần, ho&aacute; chất chặn tia cực t&iacute;m v&agrave;o c&aacute;c sợi chỉ v&agrave; thuốc nhuộm để tăng hiệu quả chặn tia UV của vải. C&aacute;c cải tiến n&agrave;y đều phải được chứng minh qua nhiều thử nghiệm v&agrave; kiểm định khắt khe, đảm bảo cải thiện chất lượng của &aacute;o chống nắng, tối ưu gi&aacute; th&agrave;nh v&agrave; an to&agrave;n tuyệt đối cho sức khoẻ của người ti&ecirc;u d&ugrave;ng.&nbsp;</p>\r\n\r\n<h3><strong>Kết cấu sợi dệt&nbsp;</strong></h3>\r\n\r\n<p>Khi đặt vải dưới k&iacute;nh hiển vi, ch&uacute;ng ta c&oacute; thể nh&igrave;n r&otilde; rất nhiều khoảng trống đan xen giữa c&aacute;c sợi vải. Đ&oacute; những l&agrave; những lỗ hổng khiến tia UV c&oacute; thể xuy&ecirc;n qua v&agrave; trực tiếp g&acirc;y hại tới l&agrave;n da. V&igrave; vậy, vải dệt c&agrave;ng chặt, lỗ hổng c&agrave;ng b&eacute; th&igrave; tỉ lệ tia UV lọt qua c&agrave;ng &iacute;t. C&aacute;c chất liệu d&agrave;y nhưng lại c&oacute; mật độ sợi vải thưa th&igrave; hiệu quả cản nắng v&agrave; chặn UV vẫn kh&ocirc;ng được tối ưu.&nbsp;</p>\r\n\r\n<p><img alt=\"Kết cấu sợi vải chống nắng\" src=\"https://canifa.com/blog/wp-content/uploads/2022/05/Chat-lieu-vai-ao-chong-nang-tot-3-1.png\" /></p>\r\n\r\n<p>Ngo&agrave;i ra, c&aacute;ch đan sợi cũng ảnh hưởng lớn đến khả năng chống nắng của vải. Kỹ thuật dệt Twill cho ra c&aacute;c loại vải c&oacute; thiết kế sợi đan ch&eacute;o, bền chắc, hai mặt kh&ocirc;ng giống nhau. Do đ&oacute;, c&aacute;c loại vải ứng dụng kỹ thuật dệt ch&eacute;o c&oacute; t&aacute;c dụng chống tia cực t&iacute;m tốt hơn c&aacute;c loại vải c&oacute; sợi đan vu&ocirc;ng g&oacute;c.&nbsp;</p>\r\n\r\n<p><img alt=\"Kết cấu sợi vải chống nắng\" src=\"https://canifa.com/blog/wp-content/uploads/2022/05/Chat-lieu-vai-ao-chong-nang-tot-4.png\" /></p>\r\n\r\n<p>Một số chất liệu c&oacute; độ đ&agrave;n hồi cao cũng gi&uacute;p c&aacute;c sợi vải thắt chặt với nhau, l&agrave;m giảm khoảng c&aacute;ch giữa c&aacute;c sợi vải, thu nhỏ c&aacute;c lỗ hổng, từ đ&oacute; tối ưu khả năng ngăn chặn tia UV đi xuy&ecirc;n qua.&nbsp;</p>\r\n\r\n<h3><strong>M&agrave;u sắc vải</strong></h3>\r\n\r\n<p>Sai lầm của nhiều người khi chọn mua &aacute;o chống nắng l&agrave; ưu ti&ecirc;n c&aacute;c sản phẩm s&aacute;ng m&agrave;u v&igrave; cho rằng vải s&aacute;ng m&agrave;u chống tia cực t&iacute;m hiệu quả hơn so với vải tối m&agrave;u. Thực tế, theo c&aacute;c chuy&ecirc;n gia, c&ugrave;ng một chất liệu vải, gam m&agrave;u tối bảo vệ da tối ưu hơn v&igrave; ch&uacute;ng c&oacute; khả năng hấp thụ tia UV tốt hơn, ngăn kh&ocirc;ng cho tia UV tiếp cận với da. Tuy nhi&ecirc;n, m&agrave;u tối lại c&oacute; xu hướng hấp thụ nhiệt mạnh hơn, g&acirc;y ra cảm gi&aacute;c n&oacute;ng bức.&nbsp;</p>\r\n\r\n<p>Do đ&oacute;, nếu vẫn muốn mặc trang phục s&aacute;ng m&agrave;u, bạn n&ecirc;n chọn những gam m&agrave;u tươi tắn nhưng ở t&ocirc;ng trầm hoặc thẫm để vừa ph&ugrave; hợp với nhu cầu, gu thẩm mỹ của bản th&acirc;n, vừa chống nắng tốt m&agrave; vẫn mang lại cảm gi&aacute;c m&aacute;t mẻ khi mặc.&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"https://canifa.com/blog/wp-content/uploads/2022/07/Chat-lieu-vai-ao-chong-nang-tot-5.jpg\" /></p>\r\n\r\n<p>M&agrave;u sắc vải</p>\r\n\r\n<h2><strong>Top 7 loại vải</strong>&nbsp;<strong>&aacute;o chống nắng tốt nhất hiện nay&nbsp;</strong></h2>\r\n\r\n<p><img alt=\"6 loại vải áo chống nắng tốt nhất hiện nay\" src=\"https://canifa.com/blog/wp-content/uploads/2022/05/Chat-lieu-vai-ao-chong-nang-tot-6-1360x331.png\" /></p>\r\n\r\n<h3><strong>Vải Polyester</strong></h3>\r\n\r\n<p>Theo Trung t&acirc;m Th&ocirc;ng tin C&ocirc;ng nghệ sinh học Quốc Gia Hoa Kỳ, một trong những chất liệu thuộc top đầu bảng về khả năng chống tia UV l&agrave;&nbsp;<a href=\"https://canifa.com/blog/vai-polyester-la-gi/\" rel=\"noreferrer noopener\" target=\"_blank\">Polyester</a>&nbsp;(hay c&ograve;n gọi l&agrave; vải PE hoặc vải thun lạnh). Chất liệu n&agrave;y c&oacute; chỉ số UPF từ 12-77, gấp 3-4 lần so với c&aacute;c loại vải l&agrave;m từ sợi tự nhi&ecirc;n (cotton, visco, rayon, lanh, lụa,&hellip;). Ch&uacute;ng đặc biệt vượt trội về khả năng hấp thụ tia UVB &ndash; loại tia c&oacute; năng lượng nhiều hơn tia UVA, t&aacute;c động mạnh l&ecirc;n bề mặt da, g&acirc;y r&aacute;m đỏ, ch&aacute;y nắng v&agrave; thậm ch&iacute; l&agrave; ung thư da.</p>\r\n\r\n<p>Ngo&agrave;i ra, vải Polyester c&oacute; kết cấu mỏng nhẹ v&agrave; t&iacute;nh c&aacute;ch nhiệt cao, tạo cảm gi&aacute;c dễ chịu, tho&aacute;ng m&aacute;t khi mặc. Một ưu điểm vượt trội kh&aacute;c l&agrave; khả năng chống nhăn, chống co r&uacute;t, bai d&atilde;o v&agrave; rất bền m&agrave;u. Do đ&oacute;, với &aacute;o chống nắng l&agrave;m từ chất liệu Polyester, bạn c&oacute; thể gấp gọn cho v&agrave;o t&uacute;i, cốp xe, vali m&agrave; kh&ocirc;ng lo mất phom &aacute;o. Bề mặt vải mịn nhẵn, khả năng tho&aacute;t hơi nước nhanh gi&uacute;p hạn chế bụi bẩn, nấm mốc.&nbsp;</p>\r\n\r\n<p>Hiện nay tr&ecirc;n thị trường, d&ograve;ng&nbsp;<a href=\"https://canifa.com/nu/ao-chong-nang.html\" rel=\"noreferrer noopener\" target=\"_blank\">&Aacute;o kho&aacute;c chống nắng</a>&nbsp;cho cả gia đ&igrave;nh của Canifa với chất liệu vải Polyester được người ti&ecirc;u d&ugrave;ng đ&aacute;nh gi&aacute; rất cao bởi chất lượng vượt trội (cản tới 96.7% tia UV), gi&aacute; cả hợp l&yacute; v&agrave; mẫu m&atilde; thời trang.&nbsp;</p>\r\n\r\n<p><img alt=\"Vải polyester áo chống nắng\" src=\"https://canifa.com/blog/wp-content/uploads/2022/05/Chat-lieu-vai-ao-chong-nang-tot-7.png\" /></p>\r\n\r\n<p>Vải Polyester</p>\r\n\r\n<p>B&ecirc;n cạnh th&agrave;nh phần ch&iacute;nh l&agrave; Polyester, Canifa c&ograve;n kết hợp th&ecirc;m th&agrave;nh phần sợi Spandex nhằm tăng th&ecirc;m độ mềm mịn m&aacute;t v&agrave; co gi&atilde;n cho sản phẩm. Nhờ đ&oacute;, bề mặt &aacute;o mượt m&agrave;, khi sờ kh&ocirc;ng mang lại cảm gi&aacute;c nh&aacute;m hay th&ocirc; r&aacute;p, kh&oacute; chịu cho da, kh&ocirc;ng xuất hiện l&ocirc;ng vải.&nbsp;</p>\r\n\r\n<p>Đặc biệt, việc kết hợp hai c&ocirc;ng nghệ ti&ecirc;n tiến bậc nhất l&agrave; Wicking (si&ecirc;u h&uacute;t ấm) v&agrave; DryTech (nhanh kh&ocirc;), &aacute;o chống nắng Canifa g&acirc;y ấn tượng với khả năng thấm h&uacute;t mồ h&ocirc;i vượt trội v&agrave; hạ nhiệt cơ thể nhanh ch&oacute;ng, ngăn cảm gi&aacute;c b&iacute; bức khi di chuyển trong điều kiện thời tiết oi bức của m&ugrave;a h&egrave;. BST 2022 l&agrave; phi&ecirc;n bản n&acirc;ng cấp với t&iacute;nh năng tho&aacute;t ẩm một chiều, ngăn kh&ocirc;ng cho mồ h&ocirc;i thấm ngược v&agrave;o cơ thể, ngăn ngừa nguy cơ cảm lạnh m&ugrave;a h&egrave; v&agrave; hạn chế k&iacute;ch ứng da do tho&aacute;t nhiệt kh&ocirc;ng kịp thời.&nbsp;</p>\r\n\r\n<p><strong>Xem th&ecirc;m:&nbsp;<a href=\"https://canifa.com/blog/kinh-nghiem-chon-mua-ao-chong-nang-bao-ve-co-the-cho-ngay-he/\">Kinh nghiệm mua &aacute;o chống nắng</a></strong></p>\r\n\r\n<h3><strong>Vải cotton</strong></h3>\r\n\r\n<p>Chỉ số UPF của vải cotton thấp, dao động từ 5-10, do đ&oacute;&nbsp;<a href=\"https://canifa.com/blog/glossary/vai-cotton/\" rel=\"noreferrer noopener\" target=\"_blank\">vải cotton</a>&nbsp;chỉ chặn được khoảng 5-10% tia UVA, c&ograve;n đến 90-95% tia cực t&iacute;m vẫn xuy&ecirc;n qua v&agrave; g&acirc;y hại cho da. C&oacute; thể thấy rằng, đ&acirc;y kh&ocirc;ng phải l&agrave; chất liệu l&yacute; tưởng để sản xuất &aacute;o chống nắng.</p>\r\n\r\n<p>Tuy nhi&ecirc;n, ưu điểm của cotton l&agrave; khả năng thấm h&uacute;t mồ h&ocirc;i, hạ nhiệt v&agrave; l&agrave;m m&aacute;t cơ thể vượt trội, th&agrave;nh phần từ sợi tự nhi&ecirc;n n&ecirc;n th&acirc;n thiện với l&agrave;n da. Do đ&oacute;, thay v&igrave; lựa chọn &aacute;o chống nắng l&agrave;m từ cotton th&igrave; bạn c&oacute; thể c&acirc;n nhắc sử dụng &aacute;o ba lỗ l&agrave;m từ chất liệu n&agrave;y để mặc l&oacute;t, hoặc &aacute;o thun cotton nhằm &ldquo;hạ nhiệt&rdquo; cho m&ugrave;a h&egrave;.&nbsp;</p>\r\n\r\n<h3><strong>Vải lanh</strong></h3>\r\n\r\n<p>Theo nghi&ecirc;n cứu của c&aacute;c nh&agrave; khoa học thuộc Viện Triemli (Zurich, Switzerland), cũng giống cotton,&nbsp; vải lanh (linen) l&agrave; chất liệu truyền thống được ưa chuộng trong m&ugrave;a h&egrave;, nhưng thực tế lại hạn chế trong khả năng bảo vệ cơ thể khỏi c&aacute;c tia tử ngoại. Chỉ số UPF của linen l&agrave; 5, đa phần c&aacute;c tia c&oacute; hại c&oacute; thể dễ d&agrave;ng xuy&ecirc;n qua chất liệu n&agrave;y. V&igrave; thế&nbsp;<strong><em>&aacute;o chống nắng vải lanh</em></strong>&nbsp;thường kh&ocirc;ng được ưa chuộng.</p>\r\n\r\n<p>Song v&igrave; t&iacute;nh chất nhẹ m&aacute;t, thấm h&uacute;t mồ h&ocirc;i v&agrave; bay hơi nhanh, khả năng chống v&agrave; chịu nhiệt tốt,&nbsp;<a href=\"https://canifa.com/blog/glossary/vai-linen/\">vải linen</a>&nbsp;thường được ứng dụng cho v&aacute;y qu&acirc;y chống nắng &ndash; một item được kết hợp sử dụng với &aacute;o chống nắng d&aacute;ng ngắn để tăng hiệu quả che chắn, cản nắng, bảo vệ da v&ugrave;ng ch&acirc;n khỏi nguy cơ đen sạm, kh&ocirc;ng đều m&agrave;u. C&ugrave;ng với đ&oacute; những chiếc &aacute;o chống nắng to&agrave;n th&acirc;n bằng vải lanh cũng kh&ocirc;ng phải l&agrave; lựa chọn tồi.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>Vải d&ugrave;</strong></h3>\r\n\r\n<p>Vải d&ugrave; chống tia cực t&iacute;m cực hiệu quả với chỉ số UPF l&ecirc;n tới 45++. Li&ecirc;n kết kh&eacute;p k&iacute;n, bền chặt tạo n&ecirc;n kết cấu vải kh&ocirc;ng c&oacute; lỗ hổng. V&igrave; thế, chất liệu n&agrave;y c&oacute; thể cản đến gần 98% tia UV g&acirc;y hại cho da, cao hơn rất nhiều so với c&aacute;c loại vải th&ocirc;ng thường.&nbsp;</p>\r\n\r\n<p>Tuy nhi&ecirc;n, cũng ch&iacute;nh v&igrave; kết cấu kh&ocirc;ng c&oacute; lỗ hổng n&ecirc;n vải c&oacute; khả năng thấm h&uacute;t mồ h&ocirc;i, tho&aacute;t hơi nước v&agrave; tho&aacute;t nhiệt k&eacute;m. Mặc &aacute;o chống nắng bằng vải d&ugrave; khi di chuyển dưới trời nắng trong thời gian d&agrave;i sẽ g&acirc;y cảm gi&aacute;c n&oacute;ng bức, kh&oacute; chịu, thậm ch&iacute; sốc nhiệt. Nếu vẫn muốn sử dụng &aacute;o chống nắng l&agrave;m từ chất liệu n&agrave;y, bạn n&ecirc;n lựa chọn c&aacute;c sản phẩm được may th&ecirc;m một lớp vải l&agrave;m m&aacute;t b&ecirc;n trong, gi&uacute;p điều ho&agrave; nhiệt độ, duy tr&igrave; cảm gi&aacute;c thoải m&aacute;i khi mặc.</p>\r\n\r\n<h3><strong>Vải th&ocirc;</strong></h3>\r\n\r\n<p>Vải th&ocirc; l&agrave; loại vải được dệt từ c&aacute;c sợi tự nhi&ecirc;n như sợi b&ocirc;ng, sợi gai,&hellip; C&aacute;c sợi n&agrave;y đều c&oacute; chỉ số UPF thấp, do đ&oacute;, cũng giống như &aacute;o chống nắng l&agrave;m từ vải lanh hay cotton, &aacute;o chống nắng l&agrave;m từ vải th&ocirc; kh&ocirc;ng c&oacute; khả năng cản tia UV hiệu quả.&nbsp;</p>\r\n\r\n<p>Ưu điểm lớn nhất của d&ograve;ng &aacute;o n&agrave;y l&agrave; mềm mại, mượt m&agrave;, tho&aacute;ng m&aacute;t v&agrave; chống nhăn. Cảm gi&aacute;c m&aacute;t mẻ khi mặc khiến người d&ugrave;ng lầm tưởng rằng sản phẩm chống nắng tối ưu, song thực tế, chất liệu n&agrave;y kh&ocirc;ng được c&aacute;c thương hiệu h&agrave;ng đầu lựa chọn để sản xuất &aacute;o chống nắng cao cấp.&nbsp;</p>\r\n\r\n<h3><strong>Vải b&ograve;</strong></h3>\r\n\r\n<p>C&aacute;c nh&agrave; sản xuất thường sử dụng kỹ thuật dệt ch&eacute;o Twill để l&agrave;m n&ecirc;n&nbsp;<a href=\"https://canifa.com/blog/hoi-va-dap-ve-jeans-cung-canifa/\" rel=\"noreferrer noopener\" target=\"_blank\">vải b&ograve;</a>&nbsp;(denim / jean). V&igrave; thế, c&aacute;c sợi vải thắt chặt với nhau, giảm thiểu khoảng c&aacute;ch giữa c&aacute;c sợi vải, ngăn kh&ocirc;ng cho &aacute;nh nắng v&agrave; tia cực t&iacute;m lọt qua. Cơ chế chống tia cực t&iacute;m của chất liệu n&agrave;y l&agrave; hấp thu c&aacute;c bức xạ trước khi ch&uacute;ng kịp tiếp cận với l&agrave;n da. V&igrave; vậy&nbsp;<em><strong>&aacute;o chống nắng vải b&ograve;</strong></em>&nbsp;cũng được sử dụng kh&aacute; phổ biến hiện nay.</p>\r\n\r\n<p>Nhưng nhược điểm dễ thấy nhất của chất liệu n&agrave;y l&agrave; kết cấu d&agrave;y, g&acirc;y ra cảm gi&aacute;c b&iacute; bức khi mặc. Ngo&agrave;i ra, độ đ&agrave;n hồi k&eacute;m, bề mặt th&ocirc; r&aacute;p, ma s&aacute;t tr&ecirc;n da cũng l&agrave; một trải nghiệm kh&ocirc;ng mong muốn khi sử dụng trang phục được l&agrave;m từ chất liệu n&agrave;y. Khi mặc &aacute;o chống nắng vải b&ograve;, người d&ugrave;ng dễ cảm thấy n&oacute;ng bức, đổ nhiều mồ h&ocirc;i v&agrave; c&oacute; m&ugrave;i h&ocirc;i kh&oacute; chịu.&nbsp;V&igrave; vậy m&agrave; &aacute;o chống nắng vải b&ograve; chỉ th&iacute;ch hợp l&agrave;m &aacute;o ngắn v&agrave; những chiếc &aacute;o chống nắng to&agrave;n th&acirc;n bằng vải b&ograve; thường kh&ocirc;ng được sản xuất v&agrave; kh&ocirc;ng xuất hiện tr&ecirc;n thị trường.</p>\r\n\r\n<p>&Aacute;o l&agrave;m từ chất liệu n&agrave;y cũng kh&ocirc;ng dễ để giặt v&agrave; vắt bằng tay m&agrave; phải sử dụng m&aacute;y giặt, đồng thời, rất l&acirc;u kh&ocirc;, kh&oacute; để gấp gọn khi kh&ocirc;ng d&ugrave;ng đến.&nbsp;</p>\r\n\r\n<h3><strong>Vải thun lạnh</strong></h3>\r\n\r\n<p>Vải thun lạnh thường được dệt từ 100% sợi polyester (sợi PE), co gi&atilde;n 2 chiều hoặc 4 chiều. Ngo&agrave;i ra, để gia tăng th&ecirc;m độ m&aacute;t hay thấm h&uacute;t mồ h&ocirc;i m&agrave; một số vải thun lạnh c&ograve;n được pha th&agrave;nh phần sợi polyurethane v&agrave; ceramic. Bề mặt vải b&oacute;ng lo&aacute;ng, mượt m&agrave;, khi sờ sẽ kh&ocirc;ng bị nh&aacute;m hay xuất hiện l&ocirc;ng vải.</p>\r\n\r\n<p>Sở dĩ vải thun lạnh trở th&agrave;nh&nbsp;vải thun may &aacute;o chống nắng&nbsp;được ưa chuộng h&agrave;ng đầu v&igrave; độ thấm h&uacute;t mồ h&ocirc;i cao. Khi mặc những chiếc &aacute;o chống nắng thun lạnh mang lại cảm gi&aacute;c m&aacute;t lạnh, tho&aacute;ng m&aacute;t v&ocirc; c&ugrave;ng dễ chịu như ch&iacute;nh c&aacute;i t&ecirc;n của chất liệu. Loại vải n&agrave;y cũng &iacute;t khi nhăn hay chảy xệ trong qu&aacute; tr&igrave;nh sử dụng n&ecirc;n độ bền kh&aacute; cao.&nbsp;</p>\r\n\r\n<p>Bề mặt vải kh&aacute; mềm mại v&agrave; nữ t&iacute;nh n&ecirc;n nam giới c&oacute; thể cảm thấy kh&ocirc;ng thoải m&aacute;i khi diện &aacute;o chống nắng bằng chất liệu n&agrave;y. C&ugrave;ng với đ&oacute; một số loại vải thun lạnh c&oacute; gi&aacute; th&agrave;nh kh&aacute; cao hơn c&aacute;c loại vải may &aacute;o chống nắng th&ocirc;ng thường.</p>\r\n\r\n<h2>Lựa chọn &aacute;o chống nắng ph&ugrave; hợp</h2>\r\n\r\n<p>T&oacute;m lại, khi mua &aacute;o chống nắng, bạn cần lưu &yacute; c&aacute;c ti&ecirc;u ch&iacute; về chất liệu vải như sau: chỉ số UPF cao, kết cấu dệt chặt, thiết kế d&aacute;ng su&ocirc;ng vừa phải, m&agrave;u sắc tươi tắn t&ocirc;ng trầm.&nbsp;</p>\r\n\r\n<p>Qua ph&acirc;n t&iacute;ch chi tiết về từng loại vải &aacute;o chống nắng, Canifa hi vọng bạn sẽ c&oacute; cơ sở ch&iacute;nh x&aacute;c hơn để dễ d&agrave;ng chọn được sản phẩm &aacute;o chống nắng chất lượng nhất v&agrave; ph&ugrave; hợp với nhu cầu c&aacute; nh&acirc;n.&nbsp;</p>\r\n\r\n<p>Hiện nay, ng&agrave;y c&agrave;ng c&oacute; nhiều d&ograve;ng &aacute;o chống nắng với c&ocirc;ng năng tối ưu hơn, thiết kế &ldquo;th&ocirc;ng minh&rdquo; v&agrave; rất thời trang. Một trong những sản phẩm &aacute;o chống nắng b&aacute;n chạy tại thị trường s&ocirc;i đ&ocirc;ng năm nay l&agrave; &aacute;o chống nắng Canifa phi&ecirc;n bản n&acirc;ng cấp 2022, với chỉ số UPF 30+, t&iacute;ch hợp c&ocirc;ng nghệ tản nhiệt, l&agrave;m m&aacute;t, nhanh kh&ocirc;, khử m&ugrave;i tới 24h. Canifa mang đến bảng m&agrave;u trẻ trung, đa dạng, ph&ugrave; hợp với mọi giới t&iacute;nh, độ tuổi.&nbsp;</p>\r\n\r\n<p><img alt=\"chất liệu vải chống nắng tốt\" src=\"https://canifa.com/blog/wp-content/uploads/2022/05/Chat-lieu-vai-ao-chong-nang-tot-8.png\" /></p>\r\n\r\n<p>B&ecirc;n cạnh c&ocirc;ng năng vượt trội, sản phẩm c&ograve;n ghi điểm bởi phom &aacute;o su&ocirc;ng đơn giản, dễ mặc, chi tiết phối lưới b&ecirc;n sườn tăng độ tho&aacute;ng kh&iacute;, mũ rộng v&agrave;nh v&agrave; tay &aacute;o xỏ tiện lợi. Đ&acirc;y l&agrave; item bạn n&ecirc;n c&acirc;n nhắc lựa chọn để bảo vệ l&agrave;n da, sức khoẻ của ch&iacute;nh m&igrave;nh v&agrave; người th&acirc;n trong m&ugrave;a h&egrave; năm nay đấy.</p>\r\n\r\n<p><img alt=\"chất liệu vải chống nắng tốt\" src=\"https://canifa.com/blog/wp-content/uploads/2022/05/Chat-lieu-vai-ao-chong-nang-tot-9.png\" /></p>\r\n\r\n<p>Ch&agrave;o th&aacute;ng h&egrave;, Canifa gửi tặng bạn rất nhiều ưu đ&atilde;i để c&oacute; thể sở hữu &Aacute;o chống nắng Phi&ecirc;n bản n&acirc;ng cấp 2022 với mức gi&aacute; ưu đ&atilde;i nhất trong chất lượng tuyệt vời nhất.&nbsp;</p>\r\n', 'vai-may-ao-chong-nang.jpg', 0, 0, '2023-02-23 07:46:14', 1, 1),
(8, 'ƯU ĐÃI PHIÊN NGANG – TẶNG 5% KHI ĐẶT VÉ', 'Hè đến rồi, cả nhà mình đã có kế hoạch du lịch gì chưaaa? ☀️Nhân dịp mùa du lịch đến, Canifa cùng Bamboo hợp tác mang đến cho gia đình mình cơ hội trải nghiệm những ưu đãi vô cùng hấp dẫn. Cả nhà chỉ cần lên đồ thật đẹp để chuẩn bị cho những chuyến du hí khắp nơi thôiii. Việc còn lại cứ để các ưu đãi của CanifaxBamboo lo:                                     ', '<p>H&egrave; đến rồi, cả nh&agrave; m&igrave;nh đ&atilde; c&oacute; kế hoạch du lịch g&igrave; chưaaa???</p>\r\n\r\n<p>Nh&acirc;n dịp m&ugrave;a du lịch đến, Canifa c&ugrave;ng Bamboo hợp t&aacute;c mang đến cho gia đ&igrave;nh m&igrave;nh cơ hội trải nghiệm những ưu đ&atilde;i v&ocirc; c&ugrave;ng hấp dẫn. Cả nh&agrave; chỉ cần l&ecirc;n đồ thật đẹp để chuẩn bị cho những chuyến du h&iacute; khắp nơi th&ocirc;iii. Việc c&ograve;n lại cứ để c&aacute;c ưu đ&atilde;i của CanifaxBamboo lo:</p>\r\n\r\n<p>&nbsp;Thẻ Canifa hạng Diamond ngang thẻ hạng Gold Bamboo<br />\r\nChỉ d&agrave;nh ri&ecirc;ng cho người đăng k&yacute; SỚM nhất<br />\r\n&nbsp;Thẻ Canifa hạng Gold, Silver &amp; Green ngang thẻ hạng Emerald Bamboo<br />\r\n&nbsp;TẶNG NGAY 5% KHI ĐẶT V&Eacute; TR&Ecirc;N APP BAMBOO</p>\r\n\r\n<p>&ndash; Thời gian:&nbsp;<strong>Từ ng&agrave;y 01/07 &ndash; 31/12/2022</strong></p>\r\n\r\n<p>&nbsp;Biển xanh c&aacute;t trắng, n&uacute;i non h&ugrave;ng vĩ v&agrave; những địa điểm du lịch cực HOT đang vẫy gọi cả nh&agrave; đến đ&oacute;. Nhanh nhanh gh&eacute; Canifa mua sắm để hưởng ngay c&aacute;c ưu đ&atilde;i du lịch của Bamboo th&ocirc;i n&agrave;ooo!!!</p>\r\n', '3-4-01-768x1023.jpg', 0, 0, '2023-02-23 07:52:53', 3, 1);
INSERT INTO `posts` (`id`, `title`, `describe_short`, `content`, `img`, `status`, `view`, `post_date`, `id_category_post`, `id_staff`) VALUES
(9, 'Vải voan là gì ? Ưu nhược điểm và ứng dụng tuyệt vời của Vải voan', 'Tiếng anh của vải voan là Veil, trong tiếng Pháp được gọi là Voile. Vải voan là một loại vải dệt trơn, nhẹ, thường được làm từ 100% cotton hoặc cotton pha. Nó có số lượng sợi chỉ cao hơn hầu hết các loại vải cotton, mang lại cảm giác mềm mượt. Vải voan là một sự lựa chọn hoàn hảo cho mùa hè vì nhẹ và rất thoáng khí.                                     ', '<h2><strong>Vải voan l&agrave; g&igrave; ?</strong></h2>\r\n\r\n<p>Tiếng anh của vải voan l&agrave; Veil, trong tiếng Ph&aacute;p được gọi l&agrave; Voile.</p>\r\n\r\n<p><em><strong><a href=\"https://canifa.com/blog/vai-voan/\">Vải voan</a></strong></em>&nbsp;l&agrave; một loại vải dệt trơn, nhẹ, thường được l&agrave;m từ 100% cotton hoặc cotton pha. N&oacute; c&oacute; số lượng sợi chỉ cao hơn hầu hết c&aacute;c loại vải cotton, mang lại cảm gi&aacute;c mềm mượt. Vải voan l&agrave; một sự lựa chọn ho&agrave;n hảo cho m&ugrave;a h&egrave; v&igrave; nhẹ v&agrave; rất tho&aacute;ng kh&iacute;.</p>\r\n\r\n<p><strong>Xem th&ecirc;m :&nbsp;<a href=\"https://canifa.com/blog/glossary/vai-cotton/\">Vải cotton l&agrave; g&igrave; ?</a></strong></p>\r\n\r\n<p>C&oacute; rất nhiều người bị nhầm lẫn giữa voan v&agrave;&nbsp;<a href=\"https://en.wikipedia.org/wiki/Chiffon_(fabric)\">chiffon</a>&nbsp;v&igrave; ch&uacute;ng c&oacute; c&ugrave;ng nguồn gốc từ lụa. Tuy nhi&ecirc;n, ch&uacute;ng c&oacute; c&aacute;ch dệt kh&aacute;c nhau n&ecirc;n được gọi với 2 c&aacute;i t&ecirc;n kh&aacute;c nhau. So với chiffon, kết cấu của voan chắc chắn hơn, kh&oacute; x&eacute; v&agrave; r&uacute;t sợi hơn rất nhiều.</p>\r\n\r\n<p><img alt=\"vải voan\" src=\"https://canifa.com/blog/wp-content/uploads/2022/06/vai-voan-2.jpg\" /></p>\r\n\r\n<p>Vải voan</p>\r\n\r\n<h2><strong>Nguồn gốc của vải voan</strong></h2>\r\n\r\n<p>Voan ban đầu được l&agrave;m ho&agrave;n to&agrave;n từ lụa . Năm 1938, một phi&ecirc;n bản voan nylon được ph&aacute;t minh, sau đ&oacute; v&agrave;o năm 1958 với sự ra đời của voan polyester, trở n&ecirc;n v&ocirc; c&ugrave;ng phổ biến do t&iacute;nh đ&agrave;n hồi v&agrave; gi&aacute; th&agrave;nh rẻ. Dưới k&iacute;nh l&uacute;p, voan giống như một tấm lưới hoặc lưới mịn, gi&uacute;p n&oacute; c&oacute; độ trong suốt.</p>\r\n\r\n<p><img alt=\"vải voan\" src=\"https://canifa.com/blog/wp-content/uploads/2022/06/vai-voan-3.jpg\" /></p>\r\n\r\n<p>Voan thường được sử dụng nhiều nhất trong trang phục dạ hội, đặc biệt l&agrave; như một lớp phủ, mang lại vẻ ngo&agrave;i thanh lịch v&agrave; bồng bềnh cho &aacute;o cho&agrave;ng . N&oacute; cũng l&agrave; một loại vải phổ biến được sử dụng trong &aacute;o c&aacute;nh , ruy băng , khăn qu&agrave;ng cổ v&agrave; nội y . Giống như c&aacute;c loại vải cr&ecirc;pe kh&aacute;c , voan c&oacute; thể kh&oacute; sử dụng v&igrave; kết cấu nhẹ v&agrave; trơn của n&oacute;. Do t&iacute;nh chất mỏng manh n&agrave;y, voan phải được giặt tay rất nhẹ nh&agrave;ng.</p>\r\n\r\n<p>V&igrave; voan l&agrave; một loại vải nhẹ n&ecirc;n dễ bị sờn n&ecirc;n phải sử dụng c&aacute;c đường may kiểu Ph&aacute;p hoặc buộc để vải kh&ocirc;ng bị sờn. Voan mịn v&agrave; b&oacute;ng hơn so với c&aacute;c loại vải tương tự .</p>\r\n\r\n<h2><strong>Đặc điểm của vải voan</strong></h2>\r\n\r\n<p>Vải voan hiện nay đ&atilde; được biến tấu v&agrave; ph&aacute;t triển hơn rất nhiều để ph&ugrave; hợp với xu hướng thời trang ng&agrave;y nay, nhưng về cơ bản vải voan vẫn giữ được những đặc điểm nổi bật của m&igrave;nh.</p>\r\n\r\n<h3>Ưu điểm</h3>\r\n\r\n<p>C&aacute;c trang phục&nbsp;<a href=\"https://canifa.com/nu.html\">thời trang</a>&nbsp;được l&agrave;m từ vải voan sẽ kh&ocirc;ng bị nhăn v&agrave; tạo nếp gấp, đ&acirc;y l&agrave; đặc điểm nổi bật m&agrave; kh&ocirc;ng phải chất liệu vải n&agrave;o cũng c&oacute;. Sản phẩm từ vải voan sẽ mang lại cảm gi&aacute;c m&aacute;t mẻ, th&ocirc;ng tho&aacute;ng, to&aacute;t l&ecirc;n vẻ sang trọng, dịu d&agrave;ng cho người mặc. Hơn thế nữa vải voan c&oacute; m&agrave;u sắc đa dạng v&agrave; c&aacute;c trang phục được l&agrave;m từ vải voan cũng v&ocirc; c&ugrave;ng phong ph&uacute;.</p>\r\n\r\n<p><img alt=\"vải voan Mát mẻ, thông thoáng\" src=\"https://canifa.com/blog/wp-content/uploads/2022/06/uu-diem-cua-vai-voan.jpg\" /></p>\r\n\r\n<p>M&aacute;t mẻ, th&ocirc;ng tho&aacute;ng</p>\r\n\r\n<h3>Nhược điểm</h3>\r\n\r\n<p>Vải n&agrave;o cũng c&oacute; những ưu nhược điểm ri&ecirc;ng, vải voan cũng kh&ocirc;ng phải ngoại lệ. V&igrave; chất vải kh&aacute; mỏng n&ecirc;n dễ bị r&aacute;ch khi sinh hoạt v&agrave; di chuyển. Vải cũng dễ bắt lửa n&ecirc;n kh&ocirc;ng ph&ugrave; hợp để may&nbsp;<a href=\"https://canifa.com/girl.html\">quần &aacute;o trẻ em</a>. Th&ecirc;m nữa vải voan kh&ocirc;ng c&oacute; độ co gi&atilde;n cần thiết v&agrave; c&oacute; độ b&aacute;m bụi kh&aacute; cao.</p>\r\n\r\n<h2><strong>C&aacute;c loại vải voan</strong></h2>\r\n\r\n<p>Xu hướng ph&aacute;t triển của ng&agrave;nh thời trang ng&agrave;y c&agrave;ng cao, ch&iacute;nh v&igrave; vậy m&agrave; vải voan cũng được biến tấu th&agrave;nh rất nhiều loại kh&aacute;c nhau để ph&ugrave; hợp với nhu cầu của từng người. C&ugrave;ng Canifa điểm danh 1 v&agrave;i loại vải vải voan phổ biến hiện nay :</p>\r\n\r\n<h3>Vải voan lụa</h3>\r\n\r\n<p>Vải voan lụa được sản xuất từ sợi tơ lụa, l&agrave; chất liệu v&ocirc; c&ugrave;ng quen thuộc trong ng&agrave;nh may mặc bởi n&oacute; sở hữu rất nhiều t&iacute;nh năng vượt trội. Vải voan lụa đem đến cảm gi&aacute;c rất mềm mại, nhẹ nh&agrave;ng v&agrave; rất sang. Trước đ&acirc;y, vải voan lụa chỉ được sử dụng cho tầng lớp thượng lưu. Tuy nhi&ecirc;n, hiện nay ai cũng c&oacute; thể dễ d&agrave;ng mua v&agrave; sở hữu những sản phẩm l&agrave;m từ vải voan lụa.</p>\r\n\r\n<p><img alt=\"Vải voan lụa\" src=\"https://canifa.com/blog/wp-content/uploads/2022/06/vai-voan-lua.jpg\" /></p>\r\n\r\n<p>Vải voan lụa</p>\r\n\r\n<h3>Vải voan lưới</h3>\r\n\r\n<p>Vải voan lưới được h&igrave;nh th&agrave;nh bằng c&aacute;ch dệt c&aacute;c sợi ngang qua, kết hợp với đ&oacute; l&agrave; c&aacute;c sợi dọc với trọng lượng nhất định. Tạo n&ecirc;n một loại vải với dạng lưới, chất liệu vải n&agrave;y cũng rất mềm mỏng, mịn m&agrave;ng.</p>\r\n\r\n<p><img alt=\"Vải voan lưới\" src=\"https://canifa.com/blog/wp-content/uploads/2022/06/vai-voan-luoi-1.jpg\" /></p>\r\n\r\n<p>Vải voan lưới</p>\r\n\r\n<h3>Vải voan hoa</h3>\r\n\r\n<p>Vải Voan hoa kh&ocirc;ng chỉ dừng lại ở những tấm vải đơn sắc, để đ&aacute;p ứng được hầu hết nhu cầu sử dụng. Một số nh&agrave; sản xuất đ&atilde; biến tấu th&agrave;nh vải voan hoa, chất liệu vải n&agrave;y cũng c&oacute; những t&iacute;nh năng nổi bật của ch&uacute;ng. Đ&oacute; l&agrave; mềm mại, mịn m&agrave;ng, bay bổng, gi&uacute;p cho người d&ugrave;ng lu&ocirc;n c&oacute; cảm gi&aacute;c thoải m&aacute;i khi mặc.</p>\r\n\r\n<p><img alt=\"vải voan hoa\" src=\"https://canifa.com/blog/wp-content/uploads/2022/06/vai-voan-hoa.jpg\" /></p>\r\n\r\n<p>Vải voan hoa</p>\r\n\r\n<h3>Vải voan tơ</h3>\r\n\r\n<p>Vải voan tơ ch&iacute;nh l&agrave; một loại vải được h&igrave;nh th&agrave;nh từ sợi nh&acirc;n tạo. Mang lại cảm gi&aacute;c mềm mại, nhẹ nh&agrave;ng, bay bổng, thoải m&aacute;i cho người d&ugrave;ng.</p>\r\n\r\n<p><img alt=\"Vải voan tơ\" src=\"https://canifa.com/blog/wp-content/uploads/2022/06/vai-voan-to.jpg\" /></p>\r\n\r\n<p>Vải voan tơ</p>\r\n\r\n<h3>Vải voan c&aacute;t</h3>\r\n\r\n<p>Vải voan c&aacute;t c&oacute; m&igrave;nh d&agrave;y hơn c&aacute;c loại vải kh&aacute;c một ch&uacute;t, v&agrave; c&oacute; rất nhiều m&agrave;u sắc bắt mắt. Th&ecirc;m v&agrave;o đ&oacute;, n&oacute; cũng ch&iacute;nh l&agrave; chất liệu vải mỏng, nhẹ như lụa.</p>\r\n\r\n<p><img alt=\"Vải voan cát\" src=\"https://canifa.com/blog/wp-content/uploads/2022/06/vai-voan-cat.jpg\" /></p>\r\n\r\n<p>Vải voan c&aacute;t</p>\r\n\r\n<h3>Vải voan k&iacute;nh</h3>\r\n\r\n<p>Vải voan k&iacute;nh l&agrave; vải được dệt từ sợi nh&acirc;n tạo. Đ&acirc;y l&agrave; một ph&acirc;n loại của chất voan nhưng bề mặt được xử l&yacute; tinh tế với lớp phủ &oacute;ng &aacute;nh như mặt k&iacute;nh. Vẫn giữ được những đặc trưng nổi bật của vải voan nhưng c&oacute; th&ecirc;m đặc trưng bề mặt vải, gi&uacute;p vải c&agrave;ng trở n&ecirc;n độc đ&aacute;o v&agrave; y&ecirc;u th&iacute;ch hơn nữa.</p>\r\n\r\n<p><img alt=\"Vải voan kính\" src=\"https://canifa.com/blog/wp-content/uploads/2022/06/vai-voan-kinh.jpg\" /></p>\r\n\r\n<p>Vải voan k&iacute;nh</p>\r\n\r\n<h2><strong>Ứng dụng của vải voan</strong></h2>\r\n\r\n<p>Voan sử dụng rất rộng r&atilde;i v&agrave; l&agrave; chất liệu kh&ocirc;ng thể thiếu trong ng&agrave;nh may mặc. Vải rất th&iacute;ch hợp để tạo ra c&aacute;c kiểu v&aacute;y đầm nhẹ nh&agrave;ng, nữ t&iacute;nh vừa mềm mỏng vừa m&aacute;t vừa nhẹ.</p>\r\n\r\n<p>Với sự mềm mại v&agrave; nhẹ nh&agrave;ng, vải được sử dụng rộng r&atilde;i để may c&aacute;c loại r&egrave;m cửa, khăn cho&agrave;ng đầu c&ocirc; d&acirc;u, hoa voan..</p>\r\n\r\n<p><img alt=\"Sử dụng phổ biến làm rèm cửa\" src=\"https://canifa.com/blog/wp-content/uploads/2022/06/vai-voan-lam-rem.jpg\" /></p>\r\n\r\n<p>Sử dụng phổ biến l&agrave;m r&egrave;m cửa</p>\r\n\r\n<p>Vải voan với sự chắc chắn hơn chiffon ho&agrave;n to&agrave;n đ&aacute;p ứng được sự đa dạng trong nhu cầu v&aacute;y cưới của mọi người. Từ đơn giản, thanh mảnh đến thanh lịch, quyến rũ hay bay bổng, lộng lẫy v&agrave; hơn hết l&agrave; sự l&atilde;ng mạn th&igrave; vải đều c&oacute; thể thiết kế v&agrave; đạt được đến mức thẩm mỹ tuyệt đẹp.</p>\r\n\r\n<p><strong>Mua ngay :&nbsp;<a href=\"https://canifa.com/nu/vay-lien.html\">V&aacute;y liền đẹp</a></strong></p>\r\n\r\n<h2><strong>Bảo quản vải voan</strong></h2>\r\n\r\n<p>Voan l&agrave; một loại trang phục mềm mại nhưng kh&ocirc;ng kh&oacute; giặt như một số loại vải kh&aacute;c như ren. Bạn vẫn c&oacute; thể giặt c&aacute;c sản phẩm l&agrave;m từ voan bằng m&aacute;y giặt cho thuận tiện; nhanh ch&oacute;ng nhưng cần lưu &yacute; một số vấn đề như sau.</p>\r\n\r\n<p>Khi giặt quần &aacute;o voan Nếu trang phục của bạn c&oacute; khuy (n&uacute;t) th&igrave; h&atilde;y cởi ra trước khi giặt; để tr&aacute;nh t&igrave;nh trạng bị r&aacute;ch trong khi vận h&agrave;nh m&aacute;y giặt. Bạn kh&ocirc;ng n&ecirc;n giặt trang phục voan ngay; v&agrave; kh&ocirc;ng n&ecirc;n ng&acirc;m n&oacute; trong nước hoặc x&agrave; ph&ograve;ng trước khi giặt. Ngo&agrave;i ra, để hạn chế t&igrave;nh trạng phai m&agrave;u khi giặt, h&atilde;y giặt voan với sữa tắm hoặc dầu gội (những loại h&oacute;a chất tẩy rửa nhẹ)</p>\r\n\r\n<p>Khi phơi, h&atilde;y sử dụng m&oacute;c treo bằng gỗ hoặc loại m&oacute;c c&oacute; bọc vải. Kh&ocirc;ng n&ecirc;n sử dụng m&oacute;c nhựa bởi v&igrave; n&oacute; c&oacute; thể l&agrave;m đổi m&agrave;u trang phục. Cũng kh&ocirc;ng n&ecirc;n sử dụng m&oacute;c sắt v&igrave; n&oacute; c&oacute; thể l&agrave;m hỏng vải. Đối với trang phục c&oacute; độ co gi&atilde;n, hay phơi ngang tr&ecirc;n m&oacute;c v&agrave; lật mặt tr&aacute;i của trang phục khi phơi.</p>\r\n\r\n<p>Hy vọng những chia sẻ tr&ecirc;n sẽ gi&uacute;p bạn c&oacute; th&ecirc;m những kiến thức hữu &iacute;ch về Vải voan để c&oacute; thể lựa chọn, ph&acirc;n biệt cũng như bảo quản chất liệu vải voan một c&aacute;ch ch&iacute;nh x&aacute;c nhất.</p>\r\n', 'vai-voan-1.jpg', 0, 0, '2023-02-23 07:54:35', 1, 1),
(10, 'Gen Z là gì ? Tìm hiểu phong cách thời trang của Gen Z', 'Thế hệ Z (Gen Z) được được sinh ra trong thời đại bùng nổ Internet nên được tiếp cận với công nghệ ngay từ nhỏ. Gen Z được mệnh danh là công dân của thời đại số, có tư duy về tiền tệ, kinh tế, và được kỳ vọng là thế hệ vàng góp phần thay đổi và kiến tạo thế giới mới phát triển trong tương lai.                         ', '<h2>Gen Z l&agrave; g&igrave; ?</h2>\r\n\r\n<p><strong><em>Thế hệ Z (tiếng Anh: Generation Z, viết tắt: Gen Z)</em></strong>, đ&ocirc;i khi c&ograve;n được gọi l&agrave; Zoomers, l&agrave; nh&oacute;m nh&acirc;n khẩu học nằm giữa thế hệ Millennials v&agrave; thế hệ Alpha. C&aacute;c nh&agrave; nghi&ecirc;n cứu v&agrave; c&aacute;c phương tiện truyền th&ocirc;ng phổ biến nhận định khoảng thời gian được sinh ra của thế hệ n&agrave;y l&agrave; từ năm 1997 đến năm 2012 theo một nghi&ecirc;n cứu đến từ trung t&acirc;m nghi&ecirc;n cứu Pew (hoặc từ những năm cuối thập ni&ecirc;n 1990 đến những năm đầu thập ni&ecirc;n 2010). Hầu hết c&aacute;c th&agrave;nh vi&ecirc;n của&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Th%E1%BA%BF_h%E1%BB%87_Z\">thế hệ Z</a>&nbsp;l&agrave; con của những người thuộc thế hệ X.</p>\r\n\r\n<p><img alt=\"thế hệ gen z\" src=\"https://canifa.com/blog/wp-content/uploads/2022/08/gen-z-la-gi-2.jpg\" /></p>\r\n\r\n<p>Thế hệ Gen Z</p>\r\n\r\n<h2>Tại sao lại gọi l&agrave; Gen Z</h2>\r\n\r\n<p>Những người sinh năm từ 1995 đến năm 2012, l&agrave; thế hệ kế sau gen Y n&ecirc;n được gọi l&agrave; thế hệ Z hay Gen Z. Thuật ngữ Gen Z xuất hiện đầu ti&ecirc;n trong một b&agrave;i b&aacute;o xuất bản v&agrave;o th&aacute;ng 9 năm 2000.</p>\r\n\r\n<p>Thế hệ Z (Gen Z) được được sinh ra trong thời đại b&ugrave;ng nổ Internet n&ecirc;n được tiếp cận với c&ocirc;ng nghệ ngay từ nhỏ. Gen Z được mệnh danh l&agrave; c&ocirc;ng d&acirc;n của thời đại số, c&oacute; tư duy về tiền tệ, kinh tế, v&agrave; được kỳ vọng l&agrave; thế hệ v&agrave;ng g&oacute;p phần thay đổi v&agrave; kiến tạo thế giới mới ph&aacute;t triển trong tương lai.</p>\r\n\r\n<p><img alt=\"các gen z hiện nay\" src=\"https://canifa.com/blog/wp-content/uploads/2022/08/gen-z-la-gi-3.jpg\" /></p>\r\n\r\n<p>C&aacute;c Gen Z</p>\r\n\r\n<h2>Đặc điểm của thế hệ Gen Z</h2>\r\n\r\n<p>Tại Việt Nam thế hệ Gen Z chiếm 1/3 d&acirc;n số cả nước v&igrave; vậy Gen Z&nbsp; c&oacute; tầm ảnh hưởng rất lớn tới đời sống x&atilde; hội hiện nay.</p>\r\n\r\n<h3>Được tiếp x&uacute;c với c&ocirc;ng nghệ từ sớm</h3>\r\n\r\n<p>Sinh ra trong thời đại b&ugrave;ng nổ Internet, đa số c&aacute;c bạn trẻ thuộc thế hệ Z Việt Nam cảm thấy rất thoải m&aacute;i v&agrave; dễ d&agrave;ng bắt kịp với xu hướng mới của c&ocirc;ng nghệ, Internet v&agrave; c&aacute;c phương tiện truyền th&ocirc;ng x&atilde; hội như Facebook, Tiktok, Google, Youtube, Instagram&hellip;</p>\r\n\r\n<p>C&ugrave;ng với đ&oacute; Gen Z sử dụng v&ocirc; c&ugrave;ng th&agrave;nh thạo smartphone, laptop, tablet &hellip; v&agrave; v&ocirc; v&agrave;n c&aacute;c sản phẩm c&ocirc;ng nghệ hiện đại.</p>\r\n\r\n<h3>Tạo xu hướng mới</h3>\r\n\r\n<p>Kh&ocirc;ng chỉ bắt kịp với những xu hướng mới tr&ecirc;n thế giới, ch&iacute;nh Gen Z đ&atilde; v&agrave; đang trở th&agrave;nh những người tạo n&ecirc;n xu hướng, ti&ecirc;n phong cho những tr&agrave;o lưu mới của x&atilde; hội.</p>\r\n\r\n<p>C&aacute;c Gen Z tại Việt Nam tạo ra trend kh&ocirc;ng chỉ ảnh hưởng đến người trong độ tuổi của họ m&agrave; sức ảnh hưởng đ&oacute; c&ograve;n lan những người sinh ra ở giai đoạn về trước. Nhiều c&acirc;u n&oacute;i trở th&agrave;nh tr&agrave;o lưu cửa miệng, xuất hiện cả trong c&aacute;c chương tr&igrave;nh giải tr&iacute; tr&ecirc;n TV hay c&aacute;c chương tr&igrave;nh quảng c&aacute;o.</p>\r\n\r\n<p><img alt=\"phong cách thời trang gen z\" src=\"https://canifa.com/blog/wp-content/uploads/2022/08/phong-cach-thoi-trang-gen-z.jpg\" /></p>\r\n\r\n<p>Gen Z tạo phong c&aacute;ch mới</p>\r\n\r\n<p><a href=\"https://canifa.com/canifa-z\">Xem ngay :&nbsp;<strong>BST CANIFA Z</strong></a></p>\r\n\r\n<h3>Ảnh hưởng đến người ti&ecirc;u d&ugrave;ng</h3>\r\n\r\n<p>Gen Z tạo sức ảnh hưởng lớn đến thị trường ti&ecirc;u d&ugrave;ng hiện nay. D&ugrave; đ&acirc;y l&agrave; thế hệ chưa tạo ra nhiều tiền khi phần lớn người trong nh&oacute;m tuổi n&agrave;y bắt đầu đi l&agrave;m v&agrave; số tiền kiếm ra cũng kh&ocirc;ng qu&aacute; lớn. Nhưng đ&acirc;y lại l&agrave; thế hệ c&oacute; ch&iacute;nh kiến cao v&agrave; họ c&oacute; sức ảnh hưởng trực tiếp đến quyết định của những người nắm giữ t&agrave;i ch&iacute;nh trong gia đ&igrave;nh.</p>\r\n\r\n<h3>Khả năng độc lập trong học tập v&agrave; tư duy s&aacute;ng tạo</h3>\r\n\r\n<p>Gen Z l&agrave; thế hệ được đ&aacute;nh gi&aacute; c&oacute; khả năng tự học tốt hơn nhiều so với gen Y v&agrave; gen X L&yacute; do l&agrave; bởi thế hệ n&agrave;y được tiếp x&uacute;c từ sớm với internet, nhiều nguồn t&agrave;i liệu trong v&agrave; ngo&agrave;i nước. B&ecirc;n cạnh đ&oacute;, họ được hưởng m&ocirc;i trường gi&aacute;o dục năng động, s&aacute;ng tạo với nhiều c&aacute;i mới kết hợp,. Hơn thế nữa, với khả năng tư duy s&aacute;ng tạo n&ecirc;n Gen Z c&oacute; thể l&agrave;m ra nội dung tốt v&agrave; độc đ&aacute;o.</p>\r\n\r\n<h2>Phong c&aacute;ch thời trang của Gen Z</h2>\r\n\r\n<h3>Phong c&aacute;ch Athleisure</h3>\r\n\r\n<p>Athleisure được biết l&agrave; bản phối nhịp nh&agrave;ng giữa phong c&aacute;ch sporty (thể thao) v&agrave; casual (thường phục). Phong c&aacute;ch&nbsp;<a href=\"https://canifa.com/nam.html\">thời trang</a>&nbsp;được ưa chuộng bởi Gen Z cũng v&igrave; sự thoải m&aacute;i, t&iacute;nh ứng dụng cao, hiện đại v&agrave; v&ocirc; c&ugrave;ng c&aacute; t&iacute;nh. Do ưu ti&ecirc;n trang phục thoải m&aacute;i, mang lại vẻ năng động nhưng cũng kh&ocirc;ng k&eacute;m phần s&agrave;nh điệu, &aacute;o bra thể thao, &aacute;o polo, quần tập yoga, gi&agrave;y sneakers&hellip; l&agrave; những m&oacute;n đồ kh&ocirc;ng n&ecirc;n bỏ qua đối với t&iacute;n đồ phong c&aacute;ch n&agrave;y.</p>\r\n\r\n<p>Athleisure đ&atilde; tạo n&ecirc;n một l&agrave;n s&oacute;ng thời trang mới trong văn ho&aacute; đại ch&uacute;ng của giới trẻ đặc biệt l&agrave; thế hệ Z. C&oacute; thể n&oacute;i đ&acirc;y l&agrave; phong c&aacute;ch &ldquo;ruột&rdquo; của hầu hết It Girl đ&igrave;nh đ&aacute;m. Kh&ocirc;ng kh&oacute; để bắt gặp những bộ &ldquo;outfit&rdquo; đậm chất athleisure c&ugrave;ng với &aacute;o croptop, quần jogger v&agrave; gi&agrave;y sneakers được c&aacute;c IT girl, trend-setter quốc tế như Kendall Jenner, Bella Hadid, Gigi Hadid,&hellip; nhiệt t&igrave;nh lăng x&ecirc;. Sau đ&acirc;y l&agrave; loạt tips để mọi t&iacute;n đồ kh&ocirc;ng thể bất bại tr&ecirc;n mọi s&agrave;n diễn với bộ c&aacute;nh Athleisure của m&igrave;nh.</p>\r\n\r\n<p><img alt=\"thời trang gen z\" src=\"https://canifa.com/blog/wp-content/uploads/2022/08/phong-cach-thoi-trang-gen-z-2.jpg\" /></p>\r\n\r\n<p>Thời trang Gen Z</p>\r\n\r\n<h3>Phong c&aacute;ch Aesthetic</h3>\r\n\r\n<p>Thời trang theo phong c&aacute;ch&nbsp;<a href=\"https://canifa.com/blog/aesthetic-la-gi/\">Aesthetic</a>&nbsp;l&agrave; sự tự do, cởi mở v&agrave; tiếp thu những điều mới lạ, độc đ&aacute;o v&agrave; n&oacute; kh&ocirc;ng ngừng ph&aacute;t triển. N&oacute; như một nền tảng để quảng b&aacute; v&agrave; bảo tồn văn h&oacute;a thời trang. Khi đến với phong c&aacute;ch n&agrave;y, bạn được tự do s&aacute;ng tạo v&agrave; kh&ocirc;ng bị r&agrave;ng buộc bởi bất kỳ quy tắc n&agrave;o. Với giới trẻ n&oacute;i chung v&agrave; Gen Z n&oacute;i ri&ecirc;ng, phong c&aacute;ch n&agrave;y đ&atilde; trở th&agrave;nh nguồn cảm hứng, c&aacute;ch sống v&agrave; ho&agrave;n thiện phong c&aacute;ch, thương hiệu c&aacute; nh&acirc;n hiệu quả.</p>\r\n\r\n<h3>Phong c&aacute;ch Unisex</h3>\r\n\r\n<p>Thời trang Unisex c&oacute; phần độc lập hơn nhiều so với c&aacute;c xu hướng quần &aacute;o kh&aacute;c tr&ecirc;n thị trường hiện nay. C&aacute;c nh&agrave; thiết kế đưa ra những sản phẩm hướng đến người ti&ecirc;u d&ugrave;ng ri&ecirc;ng biệt. Với những ai y&ecirc;u th&iacute;ch phong c&aacute;ch trẻ trung, c&aacute; t&iacute;nh v&agrave; ph&oacute;ng kho&aacute;ng th&igrave; unisex ch&iacute;nh l&agrave; sự lựa chọn ho&agrave;n hảo nhất.</p>\r\n\r\n<p>Unisex vốn được coi l&agrave; một nh&aacute;nh nhỏ của tr&agrave;o lưu harajuku đến từ Nhật Bản. Tr&ecirc;n thực tế hiện nay, thị trường thời trang cũng c&oacute; ri&ecirc;ng những cửa h&agrave;ng phục vụ cho c&aacute;c t&iacute;n đồ thời trang &ldquo;kh&ocirc;ng giới t&iacute;nh&rdquo;. Thời trang Unisex mang lại sự mạnh mẽ cho con g&aacute;i, quyến rũ cho con trai. V&igrave; thế m&agrave; n&oacute; c&agrave;ng g&acirc;y t&ograve; m&ograve;, k&iacute;ch th&iacute;ch sự ham muốn ph&aacute; c&aacute;ch, thử nghiệm v&agrave; chinh phục của giới trẻ, nhất l&agrave; thế hệ Gen Z.</p>\r\n\r\n<p><img alt=\"áo phông unisex\" src=\"https://canifa.com/blog/wp-content/uploads/2022/08/thoi-trang-gen-z.jpg\" /></p>\r\n\r\n<p>&Aacute;o ph&ocirc;ng unisex</p>\r\n\r\n<h3>Phong c&aacute;ch thời trang đầy m&agrave;u sắc Tie-dye</h3>\r\n\r\n<p>Sắc nhuộm tie-dye được tạo th&agrave;nh bằng kỹ thuật Shibori của Nhật Bản. Kỹ thuật n&agrave;y ngăn kh&ocirc;ng cho thuốc nhuộm tiếp cận một phần vải. Từ đ&oacute; tạo ra c&aacute;c h&igrave;nh ảnh ảo gi&aacute;c xen kẽ lạ mắt. Tie-dye đ&atilde; tồn tại hơn 2.000 năm. Nhưng xu hướng n&agrave;y thực sự nổi l&ecirc;n l&agrave; nhờ sự &ldquo;lăng x&ecirc;&rdquo; của văn h&oacute;a Hippie. NTK Halston bắt đầu sử dụng ch&uacute;ng trong c&aacute;c bộ sưu tập của m&igrave;nh. Từ đ&acirc;y sắc nhuộm tie-dye đ&atilde; lan toả, trở th&agrave;nh mốt thời trang thịnh h&agrave;nh v&agrave; được rất nhiều c&aacute;c bạn Gen Z y&ecirc;u th&iacute;ch.</p>\r\n\r\n<p>Tr&ecirc;n đ&acirc;y,&nbsp;<a href=\"https://canifa.com/\">CANIFA</a>&nbsp;đ&atilde; giải m&atilde; cho bạn biết được&nbsp;<a href=\"https://canifa.com/blog/gen-z-la-gi/\">Gen Z l&agrave; g&igrave;</a>&nbsp;? Định h&igrave;nh cho bạn biết được 1 v&agrave;i phong c&aacute;ch thời trang Gen Z hiện nay để bạn c&oacute; thể lựa chọn cho m&igrave;nh phong c&aacute;ch thời trang ph&ugrave; hợp với bản th&acirc;n.</p>\r\n', 'gen-z-la-gi-2.jpg', 0, 65, '2023-02-23 07:55:27', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `sale` int(11) DEFAULT 0,
  `img` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `describe` longtext NOT NULL,
  `special` int(1) NOT NULL DEFAULT 0 COMMENT 'sp đặc biệt',
  `view` int(11) NOT NULL DEFAULT 0,
  `describe_short` longtext NOT NULL COMMENT 'mô tả ngắn',
  `id_category` int(11) NOT NULL,
  `id_staff` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `sale`, `img`, `date`, `describe`, `special`, `view`, `describe_short`, `id_category`, `id_staff`) VALUES
(3, 'Áo nỉ nam DOWNTOWN', 399000, 349000, '8tw22w047-sb398-xl-1.webp', '2023-02-17 01:59:50', '', 0, 30, '', 18, 1),
(15, 'Áo nỉ nam CNF', 399000, 349000, '8tw22w046-sk010-xl-1.webp', '2023-02-17 21:03:59', '', 1, 5, '', 18, 1),
(16, 'Áo len nam', 399000, 349000, '8te22w004-sn255-xl-1.webp', '2023-02-17 21:04:47', '', 0, 0, '', 14, 1),
(17, 'Áo len cổ lọ nam', 499000, 399000, '8tt22w001-sk010-xl-1.webp', '2023-02-17 21:06:35', '', 0, 0, '', 19, 1),
(22, 'Áo phông dài tay nam black panther', 499000, 399000, '8tl22w013-sk010-xl-1.webp', '2023-02-18 20:31:20', '', 0, 0, '', 21, 1),
(23, 'Áo phông nam dài tay Mavel', 379000, 329000, '8tl21w009-sw001-l-1.webp', '2023-02-22 02:19:10', '', 0, 2, '', 21, 2),
(24, 'Áo phông nam cotton New York', 329000, 259000, '8tl21w006-sg322-l-1.webp', '2023-02-23 04:38:30', '', 0, 0, '', 21, 1),
(25, 'Áo phông nam dài tay cotton Florida', 329000, 259000, '8tl21w005-sa534-l-1.webp', '2023-02-23 04:40:26', '', 0, 0, '', 21, 1),
(26, 'Quần vải nam', 699000, 599000, '8bp21w010-db056-l-1.webp', '2023-02-23 04:40:57', '', 0, 4, '', 22, 1),
(27, 'Quần vải nam 1', 699000, 599000, '8bp21w008-sb861-l-1.webp', '2023-02-23 04:41:29', '', 0, 0, '', 22, 1),
(28, 'Quần jeans nam', 599000, 499000, '8bj22a002-sj675-31-1-u.webp', '2023-02-23 04:49:50', '', 0, 2, '', 14, 1),
(29, 'Áo phông ngắn tay Canifa Z Street Tag', 399000, 279000, '5ts22s024-sk010-4.webp', '2023-02-23 04:50:13', '', 0, 0, '', 21, 1),
(30, 'Áo phông unisex người lớn', 229000, 0, '5ts22w016-sk010-m-1.webp', '2023-02-23 04:51:49', '', 1, 0, '', 21, 1),
(31, 'Áo phông unisex người lớn Canifa Z', 229000, 0, '5ts22w014-sk001-m-2.webp', '2023-02-23 04:52:51', '', 0, 0, '', 21, 1),
(32, 'Áo khoác chần bông bé gái', 749000, 0, '1ot22c004-fa094-130-1.webp', '2023-02-23 04:53:30', '', 0, 0, '', 20, 1),
(33, 'Áo khoác gilet chần bông bé gái hoạ tiết.', 399000, 0, '1ot22w022-fb417-130-1.webp', '2023-02-23 05:01:36', '', 0, 0, '', 20, 1),
(34, 'Áo len lông cừu Úc nam', 899000, 859000, '8te22w011-sr148-xl-1.webp', '2023-02-23 05:05:07', '', 0, 0, '', 19, 1),
(35, 'Áo len nam R', 599000, 549000, '8te22w016-sa580-xl-1.webp', '2023-02-23 05:05:34', '', 0, 0, '', 19, 1),
(36, 'Áo len gilet nam', 499000, 299000, '8te22w012-sk010-xl-1.webp', '2023-02-23 05:05:56', '', 0, 0, '', 19, 1),
(37, 'Áo len nữ', 699000, 499000, '6te22c002-fn018-m-1.webp', '2023-02-23 05:06:29', '', 0, 0, '', 19, 1),
(38, 'Áo nỉ có mũ nam có hình in', 649000, 499000, '8tw22w044-sk010-xl-1.webp', '2023-02-23 05:07:06', '', 1, 0, '', 18, 1),
(39, 'Áo nỉ có mũ nam 1928', 489000, 429000, '8tw22c003-sw011-xl-1.webp', '2023-02-23 05:07:30', '', 0, 0, '', 14, 1),
(40, 'Áo nỉ có mũ nam', 499000, 279000, '8tw22c004-sg025-xl-1.webp', '2023-02-23 05:08:09', '', 1, 1, '', 18, 1),
(41, 'Quần jeans bé trai túi hộp', 349000, 0, '2bj22c002-sj648-2-thumb.webp', '2023-02-23 05:09:02', '', 0, 0, '', 16, 1),
(42, 'Quần jeans xanh nam ', 549000, 499000, '8bj22a005-sj759-2-thumb.webp', '2023-02-23 05:09:29', '', 0, 0, '', 16, 1),
(43, 'Quần jeans nam mới nhất', 419000, 0, '8bj22a006-sj754-1.webp', '2023-02-23 05:09:53', '', 0, 0, '', 16, 1),
(44, 'Quần kaki nam ', 489000, 0, '8bk22s002-sk010-31-1-u.webp', '2023-02-23 05:10:27', '', 0, 0, '', 14, 1),
(45, 'Quần kaki xám nam', 299000, 0, '8bk22a007-sa106-31-1.webp', '2023-02-23 05:10:54', '', 0, 0, '', 14, 1),
(46, 'Quần kaki nam jogger có túi', 399000, 0, '8bk22w002-sa344-31-1.webp', '2023-02-23 05:11:16', '', 0, 1, '', 14, 1),
(47, 'Quần kaki nam cotton slimfit', 399000, 199000, '8bk21s001-sn040-31-1.webp', '2023-02-23 05:11:43', '', 0, 0, '', 14, 1),
(48, 'Quần short bé gái', 279000, 0, '1bs22c006-sj734-2-thumb.webp', '2023-02-23 05:12:11', '', 0, 0, '', 17, 1),
(49, 'Quần short bé trai', 249000, 0, '2bs22w003-se182-2.webp', '2023-02-23 05:13:03', '', 0, 0, '', 17, 1),
(50, 'Quần short loan bé trai', 269000, 0, '2bs22s014-fy037-2-thumb.webp', '2023-02-23 05:13:24', '', 0, 0, '', 17, 1),
(51, 'Quần short nỉ bé trai', 379000, 299000, '2bs22c003-se129-2-thumb.webp', '2023-02-23 05:13:50', '', 0, 0, '', 17, 1),
(52, 'Quần short active nam', 279000, 0, '8bs22s007-sk010-xl-1.webp', '2023-02-23 05:14:09', '', 1, 0, '', 17, 1),
(53, 'Quần Âu Nam Ống Đứng ', 559000, 0, 'qam3191-bee-2.webp', '2023-02-23 05:14:54', '', 0, 0, '', 22, 1),
(54, 'Quần vải Nữ Ống Suông 2 Ly', 379000, 0, 'qan5156-gda4.webp', '2023-02-23 05:15:22', '', 0, 3, '', 22, 1);

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE `staffs` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` longtext NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `img` longtext NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `cmnd` int(12) NOT NULL COMMENT 'số cmnd',
  `role` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 là ad, 1 là nv'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`id`, `username`, `password`, `full_name`, `img`, `email`, `phone`, `address`, `cmnd`, `role`) VALUES
(1, 'voquyduc', '$2y$10$sIVez6ifQkpaTOlderPQROw3UUbqkCZHUJdBD6EBY3THZr6Z7vKQK', 'Võ Quý Đức', 'androi.png', 'voquyduc2003@gmail.com', '0332143234', 'Ha Tinh', 184444061, 0),
(2, 'huuhoang', '$2y$10$BX0y2kiTwZKwB0Wei..5fuEXnOlmfu8p0zqFf1iWMNIChSng6Boem', 'Nguyễn Hữu Hoàng', 'mau-ao-khoac-nam-dep-2022.jpg', 'nguyenhuuhoang4369@gmail.com', '0987654321', 'Hà Tĩnh', 2147483647, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` longtext NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `img` longtext NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 = chưa kích hoạt'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `full_name`, `img`, `email`, `phone`, `address`, `activated`) VALUES
(1, 'test1', '$2y$10$Qzq4AdhDcDRMTAPmks2FXOmWJVu3x7gYPt3cjoa41ZPrHWiE2EghO', 'test1111', '3-4-01-768x1023.jpg', 'test1@gmail.com', '0987654321', 'abcvwvrwev', 1),
(2, 'huuhoang', '$2y$10$mUqs0GX0uBzqIkty8IGQuu2snQx4FR1Dh9BdMZoIGfhULBAe5cAJO', 'Nguyễn Hữu Hoàng', 'mau-ao-khoac-nam-dep-2022.jpg', 'nguyenhuuhoang4369@gmail.com', '0123456789', 'Hà Tĩnh', 0),
(4, 'abcxyz', '$2y$10$wWP0y5vOGmjy97BShn1xzOc63VzCaxATh.Aiy5KSz4DO3cYM5uDVy', 'abcxyz1', '', 'abcxyz@gmail.com', '1234567890', 'Hà Tĩnh', 1),
(5, 'voquyduc', '$2y$10$91KQw97fPt9IB6Nya8qWc.ev6sgZv4IxA0/cIER8PcJ/2WLGLpblC', 'Võ Quý Đức', '5ts22s024-sk010-4.webp', 'voquyduc2003@gmail.com', '0332143234', 'Hà Tĩnh', 1),
(8, 'hoailinh', '$2y$10$plzOGxZR0TAa/GQ2DOFZBelezc6uCAOijv2Rygg9hnE4cnUn16xZy', 'Nguyễn Hoài Linh', 'sv3.jpg', 'hoailinh25022003@gmail.com', '0945230976', 'Một nơi rất xa', 1),
(9, 'khachhang1', '$2y$10$UOt3byep4ZbirgMPFYfJ5eId8tNkMCzZoIN1YUbdgNmwtYPWY/M4i', 'khachhang1', '0106_hinh-nen-4k-may-tinh48.jpg', 'khachhang1@gmail.com', '0987654321', 'Da nang', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_DM_NV` (`id_staff`);

--
-- Indexes for table `categories_post`
--
ALTER TABLE `categories_post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_DMBV_NV` (`id_staff`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_BL_KH` (`id_user`),
  ADD KEY `FK_BL_SP` (`id_product`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_BV_NV` (`id_staff`),
  ADD KEY `FK_BV_DMBV` (`id_category_post`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_SP_DM` (`id_category`),
  ADD KEY `FK_SP_NV` (`id_staff`);

--
-- Indexes for table `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bill_detail`
--
ALTER TABLE `bill_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `categories_post`
--
ALTER TABLE `categories_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `FK_DM_NV` FOREIGN KEY (`id_staff`) REFERENCES `staffs` (`id`);

--
-- Constraints for table `categories_post`
--
ALTER TABLE `categories_post`
  ADD CONSTRAINT `FK_DMBV_NV` FOREIGN KEY (`id_staff`) REFERENCES `staffs` (`id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `FK_BL_KH` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `FK_BL_SP` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `FK_BV_DMBV` FOREIGN KEY (`id_category_post`) REFERENCES `categories_post` (`id`),
  ADD CONSTRAINT `FK_BV_NV` FOREIGN KEY (`id_staff`) REFERENCES `staffs` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_SP_DM` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `FK_SP_NV` FOREIGN KEY (`id_staff`) REFERENCES `staffs` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
