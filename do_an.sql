-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 10, 2024 lúc 08:31 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `do_an`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `username`, `password`, `name`) VALUES
(1, 'khoacntt', 'cntt1111', 'Nhật Tinh Ngao'),
(2, 'congtrinh', 'conngtrinh1111', 'ChiPu');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin_roles`
--

CREATE TABLE `tbl_admin_roles` (
  `admin_role_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin_roles`
--

INSERT INTO `tbl_admin_roles` (`admin_role_id`, `admin_id`, `role_id`) VALUES
(1, 1, 1),
(7, 2, 2),
(8, 2, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_chucvu`
--

CREATE TABLE `tbl_chucvu` (
  `chucvu_id` int(11) NOT NULL,
  `chucvu_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_chucvu`
--

INSERT INTO `tbl_chucvu` (`chucvu_id`, `chucvu_name`) VALUES
(1, 'Giảng viên'),
(2, 'Phó khoa'),
(3, 'Trưởng khoa');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_class`
--

CREATE TABLE `tbl_class` (
  `class_id` int(11) NOT NULL,
  `class_code` varchar(100) NOT NULL,
  `class_name` varchar(100) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `course_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_class`
--

INSERT INTO `tbl_class` (`class_id`, `class_code`, `class_name`, `faculty_id`, `teacher_id`, `course_id`) VALUES
(1, 'CNTT6', 'Công nghệ thông tin 6 ', 1, 45, 3),
(2, 'CNTT5', 'Công nghệ thông tin 5 ', 1, 46, 3),
(3, 'CNTT1', 'Công nghệ thông tin 1 ', 1, 47, 3),
(4, 'CNTT2', 'Công nghệ thông tin 2 ', 1, 48, 3),
(5, 'CNTT3', 'Công nghệ thông tin 3 ', 1, 49, 3),
(6, 'CNTT4', 'Công nghệ thông tin 4 ', 1, 50, 3),
(7, 'CNTT-VS', 'Công nghệ thông tin Việt Anh', 1, 51, 3),
(9, 'CT1', 'Công trình 1', 2, 66, 1),
(10, 'CNTT1-61', 'Công nghệ thông tin 1', 1, 53, 1),
(11, 'CNTT2-61', 'Công nghệ thông tin 2', 1, 53, 1),
(12, 'CNTT3-61', 'Công nghệ thông tin 3', 1, 54, 1),
(13, 'CNTT4-61', 'Công nghệ thông tin 4', 1, 55, 1),
(14, 'CNTT5-61', 'Công nghệ thông tin 5', 1, 56, 1),
(15, 'CNTT6-61', 'Công nghệ thông tin 6', 1, 57, 1),
(16, 'CNTT-VA-61', 'Công nghệ thông tin Việt anh', 1, 58, 1),
(17, 'CNTT1-62', 'Công nghệ thông tin 1', 1, 55, 2),
(18, 'CNTT1-64', 'Công nghệ thông tin 1', 1, 56, 4),
(19, 'CT2-63', 'Công trình 2', 2, 72, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_classroom`
--

CREATE TABLE `tbl_classroom` (
  `classroom_id` int(11) NOT NULL,
  `building_name` varchar(100) NOT NULL,
  `room_name` varchar(100) NOT NULL,
  `capacity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_classroom`
--

INSERT INTO `tbl_classroom` (`classroom_id`, `building_name`, `room_name`, `capacity`) VALUES
(3, 'A2', '101', 100),
(4, 'A2', '102', 100),
(5, 'A2', '201', 100),
(6, 'A2', '202', 100),
(7, 'A2', '103', 100),
(8, 'A2', '104', 50);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_class_section`
--

CREATE TABLE `tbl_class_section` (
  `class_section_id` int(11) NOT NULL,
  `class_section_code` varchar(100) NOT NULL,
  `class_section_name` varchar(100) NOT NULL,
  `semester_subject_id` int(11) NOT NULL,
  `class_section_capacity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_class_section`
--

INSERT INTO `tbl_class_section` (`class_section_id`, `class_section_code`, `class_section_name`, `semester_subject_id`, `class_section_capacity`) VALUES
(1, 'LTW_61.01', 'Lập trình web (N01)', 1, 10),
(2, 'LTW_61.02', 'Lập trình web (N02)', 1, 10),
(3, 'CSDL_N01', 'Cơ sở dữ liệu (N01)', 5, 20),
(4, 'MNT_N01', 'Mạng máy tính (N01)', 11, 20),
(5, 'CD_N01', 'Cầu đường (N01)', 8, 30),
(6, 'CD_N02', 'Cầu đường (N02)', 8, 30),
(7, 'THDC_N01', 'Tin học đại cương (N01)', 4, 10),
(8, 'THDC_N02', 'Tin học đại cương (N02)', 4, 30),
(9, 'CDTC_N01', 'Cầu đường trên cao (N01)', 12, 20),
(10, 'CDTC_N02', 'Cầu đường trên cao (N02)', 12, 10),
(11, 'CSDL_N02', 'Cơ sở dữ liệu (N02)', 5, 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_course`
--

CREATE TABLE `tbl_course` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `year_of_admission` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_course`
--

INSERT INTO `tbl_course` (`course_id`, `course_name`, `year_of_admission`) VALUES
(1, 'K61', 2020),
(2, 'K62', 2021),
(3, 'K63', 2022),
(4, 'K64', 2023);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_education`
--

CREATE TABLE `tbl_education` (
  `education_id` int(11) NOT NULL,
  `education_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_education`
--

INSERT INTO `tbl_education` (`education_id`, `education_name`) VALUES
(1, 'GS - Tiến sĩ'),
(2, 'PGS - Tiến sĩ'),
(3, 'Tiến sĩ'),
(4, 'Thạc sĩ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_enrollmentdetail`
--

CREATE TABLE `tbl_enrollmentdetail` (
  `enrollmentDetail_id` int(11) NOT NULL,
  `enrollment_id` int(11) NOT NULL,
  `class_section_id` int(11) NOT NULL,
  `enrollmentDetail_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_enrollmentdetail`
--

INSERT INTO `tbl_enrollmentdetail` (`enrollmentDetail_id`, `enrollment_id`, `class_section_id`, `enrollmentDetail_date`) VALUES
(1, 1, 1, '2024-03-30'),
(2, 2, 2, '2024-03-30'),
(4, 3, 9, '2024-03-30'),
(5, 4, 9, '2024-03-30'),
(6, 5, 2, '2024-03-30'),
(17, 5, 8, '2024-03-30'),
(19, 6, 7, '2024-03-30'),
(20, 6, 2, '2024-03-30'),
(21, 7, 2, '2024-04-01'),
(22, 7, 11, '2024-04-02'),
(23, 7, 8, '2024-04-02'),
(30, 8, 2, '2024-04-03'),
(32, 8, 8, '2024-04-03'),
(34, 1, 4, '2024-04-03'),
(35, 9, 11, '2024-04-04'),
(36, 10, 11, '2024-04-04'),
(37, 10, 1, '2024-04-04'),
(38, 2, 3, '2024-04-05'),
(39, 2, 8, '2024-04-05'),
(40, 11, 2, '2024-04-09'),
(41, 11, 8, '2024-04-09'),
(42, 11, 11, '2024-04-09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_enrollments`
--

CREATE TABLE `tbl_enrollments` (
  `enrollment_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `semester_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_enrollments`
--

INSERT INTO `tbl_enrollments` (`enrollment_id`, `student_id`, `semester_id`) VALUES
(1, 19, 5),
(2, 4, 1),
(3, 62, 25),
(4, 65, 26),
(5, 5, 1),
(6, 15, 1),
(7, 6, 1),
(8, 7, 1),
(9, 8, 1),
(10, 9, 1),
(11, 11, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_faculty`
--

CREATE TABLE `tbl_faculty` (
  `faculty_id` int(11) NOT NULL,
  `faculty_code` varchar(100) NOT NULL,
  `faculty_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_faculty`
--

INSERT INTO `tbl_faculty` (`faculty_id`, `faculty_code`, `faculty_name`) VALUES
(1, 'MK01CNTT', 'Công nghệ thông tin'),
(2, 'MK02CT', 'Công trình'),
(3, 'MK03CK', 'Cơ khí'),
(4, 'MK04VTKT', 'Vận tải kinh tế'),
(5, 'MK05DDT', 'Điện - điện tử'),
(6, 'MK06LLCT', 'Lý luận chính trị'),
(7, 'MK07KTXD', 'Kỹ thuật xây dựng'),
(8, 'MK08QLXD', 'Quản lý xây dựng'),
(9, 'MK09DTQT', 'Đào tạo quốc tế'),
(10, 'MK10GDQP', 'Giáo dục quốc phòng'),
(11, 'MK11MTVATGT', 'Môi trường và an toàn giao thông'),
(12, 'MK12CB ', 'Cơ bản 1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_grades`
--

CREATE TABLE `tbl_grades` (
  `grades_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `semester_subject_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_gradesdetail`
--

CREATE TABLE `tbl_gradesdetail` (
  `gradesDetail_id` int(11) NOT NULL,
  `grades_id` int(11) NOT NULL,
  `process_points` float NOT NULL,
  `test_score` float NOT NULL,
  `final_grades` float NOT NULL,
  `attempt_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_major`
--

CREATE TABLE `tbl_major` (
  `major_id` int(11) NOT NULL,
  `major_code` varchar(100) DEFAULT NULL,
  `major_name` varchar(100) NOT NULL,
  `faculty_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_major`
--

INSERT INTO `tbl_major` (`major_id`, `major_code`, `major_name`, `faculty_id`) VALUES
(1, 'CN01CNTT', 'Công nghệ phần mềm', 1),
(2, 'CN02CNTT', 'An toàn thông tin', 1),
(3, 'CN02KTXDDS', 'Kỹ thuật xây dựng Đường sắt', 2),
(4, 'CN03CKGTCC', 'Cơ khí giao thông công chính', 3),
(5, 'CN05KTDTVTHCN', 'Kỹ thuật điện tử và Tin học công nghiệp', 5),
(6, 'CN04KTVTDL', 'Kinh tế vận tải du lịch', 4),
(7, 'CN06CTH', 'Chính trị học', 6),
(8, 'CN07XDDDVCN', 'Xây dựng dân dụng và Công nghiệp', 7),
(9, 'CN08QLXD', 'Quản lý xây dựng', 8),
(10, 'CN09CNTT', 'Công nghệ thông tin', 9),
(11, 'CN10GDQP', 'Giáo dục quốc phòng', 10),
(12, 'CN02KTXDCDB', 'Kỹ thuật xây dựng Cầu - Đường bộ', 2),
(13, 'CN02KTXDDSDT', 'Kỹ thuật xây dựng Đường sắt đô thị', 2),
(14, 'CN02KTXDCH', 'Kỹ thuật xây dựng Cầu hầm', 2),
(15, 'CN02KTXDDHM', 'Kỹ thuật xây dựng Đường hầm - Metro', 2),
(16, 'CN02KTXDCDS', 'Kỹ thuật xây dựng Cầu - Đường sắt', 2),
(17, 'CN02DKTXDCTGT', 'Địa kỹ thuật xây dựng Công trình giao thông', 2),
(18, 'CN03DMTX', 'Đầu máy toa xe', 3),
(19, 'CN03CGXDCD', 'Cơ giới hóa xây dựng cầu đường', 3),
(20, 'CN03KTMDL', 'Kỹ thuật Máy động lực', 3),
(21, 'CN03TDM', 'Tàu điện Metro', 3),
(22, 'CN03CNCTCK', 'Công nghệ chế tạo cơ khí', 3),
(23, 'CN04KTVTHK', 'Kinh tế vận tải hàng không', 4),
(24, 'CN04KTVTOT', 'Kinh tế vận tải ô tô', 4),
(25, 'CN04KTVTDS', 'Kinh tế vận tải đường sắt', 4),
(26, 'CN04KTVTTB', 'Kinh tế vận tải thủy bộ', 4),
(27, 'CN04VTTMQT', 'Vận tải thương mại quốc tế', 4),
(28, 'CN05TTBTCNVGT', 'Trang thiết bị trong Công nghiệp và Giao thông', 5),
(29, 'CN05HTDGTVCN', 'Hệ thống điện Giao thông và Công nghiệp', 5),
(30, 'CN05KTDKVTDHGT', 'Kỹ thuật điều khiển và Tự động hóa GT', 5),
(31, 'CN05KTTHDS', 'Kỹ thuật tín hiệu Đường sắt', 5),
(32, 'CN05TDH', 'Tự động hóa', 5),
(33, 'CN06THCT', 'Triết học Chính trị', 6),
(34, 'CN06LSCT', 'Lịch sử Chính trị', 6),
(35, 'CN06CTQT', 'Chính trị quốc tế', 6),
(36, 'CN06CTSS', 'Chính trị so sánh', 6),
(37, 'CN06LLXHCT', 'Lý luận xã hội chính trị', 6),
(38, 'CN07KCXD', 'Kết cấu xây dựng', 7),
(39, 'CN07KTHTDT', 'Kỹ thuật hạ tầng đô thị', 7),
(40, 'CN07VLVCNXD', 'Vật liệu và Công nghiệp xây dựng', 7),
(41, 'CN08KTXDCTGT', 'Kinh tế xây dựng Công trình giao thông', 8),
(42, 'CN08KTQLKTCD', 'Kinh tế quản lý khai thác cầu đường', 8),
(43, 'CN11KTATGT', 'Kỹ thuật An toàn giao thông', 11),
(44, 'CN11KTMT', 'Kỹ thuật môi trường', 11),
(45, 'CN12TUD', 'Toán ứng dụng', 12);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_posts`
--

CREATE TABLE `tbl_posts` (
  `posts_id` int(11) NOT NULL,
  `posts_title` varchar(255) NOT NULL,
  `posts_content` text NOT NULL,
  `admin_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_posts`
--

INSERT INTO `tbl_posts` (`posts_id`, `posts_title`, `posts_content`, `admin_id`, `created_at`) VALUES
(2, 'ko co tieu de', '<p><strong>bbbbb &nbsp;&nbsp;</strong><i>gggg</i></p>', 1, '2024-03-14 05:16:00'),
(3, 'hhhh', '<p>&nbsp;</p><ol><li><h2>hh</h2></li></ol><ul><li>&nbsp;</li></ul>', 1, '2024-03-14 12:31:33');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_roles`
--

CREATE TABLE `tbl_roles` (
  `role_id` int(11) NOT NULL,
  `role_name` enum('Admin','Editor','Write','Delete','Add') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_roles`
--

INSERT INTO `tbl_roles` (`role_id`, `role_name`) VALUES
(1, 'Admin'),
(2, 'Editor'),
(3, 'Add'),
(4, 'Delete'),
(5, 'Write');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_schedule`
--

CREATE TABLE `tbl_schedule` (
  `schedule_id` int(11) NOT NULL,
  `start_end_date_id` int(11) NOT NULL,
  `classroom_id` int(11) NOT NULL,
  `schedule_time` enum('1, 2, 3','4, 5, 6','7, 8, 9','10, 11, 12') NOT NULL,
  `schedule_day` enum('2','3','4','5','6','7') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_schedule`
--

INSERT INTO `tbl_schedule` (`schedule_id`, `start_end_date_id`, `classroom_id`, `schedule_time`, `schedule_day`) VALUES
(1, 1, 3, '1, 2, 3', '2'),
(2, 2, 3, '1, 2, 3', '4'),
(5, 3, 3, '4, 5, 6', '4'),
(6, 4, 3, '4, 5, 6', '2'),
(7, 5, 3, '1, 2, 3', '4'),
(8, 6, 3, '7, 8, 9', '3'),
(9, 7, 3, '4, 5, 6', '4'),
(10, 8, 3, '7, 8, 9', '7'),
(11, 9, 3, '10, 11, 12', '5'),
(12, 10, 4, '4, 5, 6', '2'),
(13, 11, 7, '10, 11, 12', '6');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_semester`
--

CREATE TABLE `tbl_semester` (
  `semester_id` int(11) NOT NULL,
  `semester_name` enum('1','2') NOT NULL,
  `school_year` varchar(100) NOT NULL,
  `course_id` int(11) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `start` date DEFAULT NULL,
  `end` date DEFAULT NULL,
  `IsOpenForRegistration` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_semester`
--

INSERT INTO `tbl_semester` (`semester_id`, `semester_name`, `school_year`, `course_id`, `faculty_id`, `start`, `end`, `IsOpenForRegistration`) VALUES
(1, '1', '2020_2021', 1, 1, '2024-04-04', '2024-04-14', 1),
(2, '2', '2020_2021', 1, 1, '2024-04-08', '2024-04-14', 0),
(3, '1', '2021_2022', 1, 1, '2024-04-08', '2024-04-14', 0),
(4, '2', '2021_2022', 1, 1, '2024-04-08', '2024-04-14', 0),
(5, '1', '2021_2022', 2, 1, '2024-04-08', '2024-04-14', 1),
(6, '2', '2021_2022', 2, 1, '2024-04-08', '2024-04-14', 0),
(7, '1', '2022_2023', 1, 1, '2024-04-08', '2024-04-14', 0),
(8, '2', '2022_2023', 1, 1, '2024-04-08', '2024-04-14', 0),
(9, '1', '2022_2023', 2, 1, '2024-04-08', '2024-04-14', 0),
(10, '2', '2022_2023', 2, 1, '2024-04-08', '2024-04-14', 0),
(11, '1', '2022_2023', 3, 1, '2024-04-08', '2024-04-14', 0),
(12, '2', '2022_2023', 3, 1, '2024-04-08', '2024-04-14', 0),
(13, '1', '2023_2024', 1, 1, '2024-04-08', '2024-04-14', 0),
(14, '2', '2023_2024', 1, 1, '2024-04-08', '2024-04-14', 0),
(15, '1', '2023_2024', 2, 1, '2024-04-08', '2024-04-14', 0),
(16, '2', '2023_2024', 2, 1, '2024-04-08', '2024-04-14', 0),
(17, '1', '2023_2024', 3, 1, '2024-04-08', '2024-04-14', 0),
(18, '2', '2023_2024', 3, 1, '2024-04-08', '2024-04-14', 0),
(19, '1', '2023_2024', 4, 1, '2024-04-08', '2024-04-14', 0),
(20, '2', '2023_2024', 4, 1, '2024-04-08', '2024-04-14', 0),
(24, '1', '2020_2021', 1, 2, '2024-04-08', '2024-04-14', 0),
(25, '2', '2020-2021', 1, 2, '2024-04-08', '2024-04-14', 1),
(26, '1', '2023-2024', 3, 2, '2024-04-08', '2024-04-14', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_semester_subject`
--

CREATE TABLE `tbl_semester_subject` (
  `semester_subject_id` int(11) NOT NULL,
  `semester_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_semester_subject`
--

INSERT INTO `tbl_semester_subject` (`semester_subject_id`, `semester_id`, `subject_id`) VALUES
(1, 1, 1),
(4, 1, 2),
(5, 1, 23),
(9, 5, 1),
(11, 5, 24),
(10, 6, 24),
(8, 24, 41),
(12, 25, 43),
(13, 26, 43);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_start_end_date`
--

CREATE TABLE `tbl_start_end_date` (
  `start_end_date_id` int(11) NOT NULL,
  `class_section_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_start_end_date`
--

INSERT INTO `tbl_start_end_date` (`start_end_date_id`, `class_section_id`, `start_date`, `end_date`) VALUES
(1, 1, '2024-09-01', '2024-12-20'),
(2, 2, '2024-09-01', '2024-12-20'),
(3, 3, '2024-04-17', '2024-04-02'),
(4, 4, '2024-04-10', '2024-04-10'),
(5, 5, '2024-04-17', '2024-04-02'),
(6, 6, '2024-04-10', '2024-04-10'),
(7, 7, '2024-04-10', '2024-04-10'),
(8, 8, '2024-04-10', '2024-04-10'),
(9, 9, '2024-04-10', '2024-04-10'),
(10, 10, '2024-04-07', '2024-04-30'),
(11, 11, '2024-04-10', '2024-04-27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_student`
--

CREATE TABLE `tbl_student` (
  `student_id` int(11) NOT NULL,
  `student_code` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `student_avatar` varchar(100) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_student`
--

INSERT INTO `tbl_student` (`student_id`, `student_code`, `first_name`, `last_name`, `date_of_birth`, `gender`, `address`, `email`, `phone`, `student_avatar`, `faculty_id`, `class_id`, `course_id`) VALUES
(4, '201200143', 'Đỗ Duy                                             ', 'Long                                                      ', '2024-03-01', 'male', 'Hà Nội                                                     ', 'dolong1@gmail.com                    ', '0987475642                                                     ', 'anh.png', 1, 10, 1),
(5, '201200147', 'Nguyễn', 'Hương', '2002-06-15', 'female', 'Hồ Chí Minh', 'nguyenhuong@gmail.com', '0978654328', 'anh.png', 1, 10, 1),
(6, '201200148', 'Trần', 'Nam', '2002-09-22', 'male', 'Đà Nẵng', 'trannam@gmail.com', '0934123789', 'anh.png', 1, 10, 1),
(7, '201200149', 'Lê', 'Hà', '2002-02-28', 'female', 'Hải Phòng', 'leha@gmail.com', '0912345670', 'anh.png', 1, 10, 1),
(8, '201200150', 'Phạm', 'Linh', '2002-08-10', 'male', 'Ninh Bình', 'phamlinh@gmail.com', '0945678901', 'anh.png', 1, 10, 1),
(9, '201200151', 'Vũ', 'Hải', '2002-03-05', 'male', 'Quảng Ninh', 'vuhai@gmail.com', '0965432109', 'anh.png', 1, 10, 1),
(10, '201200152', 'Ngô', 'Lan', '2002-07-18', 'female', 'Thanh Hóa', 'ngolan@gmail.com', '0923456789', 'anh.png', 1, 10, 1),
(11, '201200153', 'Phan', 'Minh', '2002-01-12', 'male', 'Hà Giang', 'phanminh@gmail.com', '0998765432', 'anh.png', 1, 10, 1),
(12, '201200154', 'Hoàng', 'My', '2002-05-20', 'female', 'Lào Cai', 'hoangmy@gmail.com', '0954321897', 'anh.png', 1, 10, 1),
(13, '201200155', 'Trịnh', 'Thị', '2002-04-08', 'male', 'Bắc Ninh', 'trinhthi@gmail.com', '0987654321', 'anh.png', 1, 10, 1),
(14, '201200156', 'Dương', 'Hữu', '2002-10-16', 'male', 'Thái Bình', 'duonghuu@gmail.com', '0976543214', 'anh.png', 1, 10, 1),
(15, '201200157', 'Võ', 'Như', '2002-12-02', 'female', 'Nam Định', 'vonhu@gmail.com', '0967890124', 'anh.png', 1, 10, 1),
(16, '201200158', 'Lý', 'Khánh', '2002-08-25', 'male', 'Hà Nam', 'lykhanh@gmail.com', '0932109875', 'anh.png', 1, 10, 1),
(17, '201200159', 'Bùi', 'Quỳnh', '2002-06-30', 'male', 'Phú Thọ', 'buiquynh@gmail.com', '0943216789', 'anh.png', 1, 10, 1),
(18, '201200160', 'Hoàng', 'Tuấn', '2002-09-10', 'male', 'Bắc Giang', 'hoangtuan@gmail.com', '0912345678', 'anh.png', 1, 10, 1),
(19, '201200161', 'Phùng', 'Duy', '2002-02-15', 'male', 'Vĩnh Phúc', 'phungduy@gmail.com', '0987654320', 'anh.png', 1, 17, 2),
(20, '201200162', 'Lê', 'Thu', '2002-05-22', 'female', 'Yên Bái', 'lethu@gmail.com', '0976543210', 'anh.png', 1, 10, 1),
(21, '201200163', 'Trương', 'Hải', '2002-11-08', 'male', 'Lạng Sơn', 'truonghai@gmail.com', '0967890123', 'anh.png', 1, 10, 1),
(22, '201200164', 'Đặng', 'Tâm', '2002-07-12', 'male', 'Cao Bằng', 'dangtam@gmail.com', '0932109876', 'anh.png', 1, 10, 1),
(23, '201201111', 'Lữ', 'Pố', '2004-07-14', 'male', 'Ha Noi', 'lupo@gmail.com', '0372687311', 'anh.png', 1, 10, 1),
(51, '301200143', 'Thoại', 'Phạm', '2004-11-05', 'female', 'Hà Nội', 'phmamthooai@gmail.com', '987004324', 'anh.png', 1, 1, 3),
(52, '301200144', 'Phạm', 'Thoại', '2004-11-05', 'female', 'Hà Nội', 'phmamthoai@gmail.com', '987004323', 'anh.png', 1, 18, 4),
(57, '201200700', 'Nguyễn Đức', 'Toàn', '2004-03-16', 'male', 'Thanh Hóa', 'ductoan@gmail.com', '0982166333', 'anh.png', 2, 9, 3),
(61, '201200701', 'Nguyễn Đức', 'Dũng', '2004-03-16', 'male', 'Thanh Hóa', 'ducdung16@gmail.com', '0982166433', 'anh.png', 2, 9, 3),
(62, '201200702', 'Nguyễn Thị', 'Lý', '2003-02-22', 'male', 'Thanh Hóa', 'thily22@gmail.com', '0982172126', 'anh.png', 2, 9, 1),
(63, '201200707', 'Nguyễn Bá', 'Nam', '2004-06-27', 'male', 'Bắc Ninh', 'banam27@gmail.com', '0982172666', 'anh_img.png', 2, 9, 1),
(64, '201200802', 'Nguyễn', 'Anh Tuấn', '2005-03-25', 'male', 'Thái Bình', 'anhtuan180705@gmai.com', '0982175151', 'anh_img.png', 2, 19, 3),
(65, '201200803', 'Nguyễn', 'Anh Tú', '2005-03-25', 'male', 'Thái Bình', 'anhtu180715@gmai.com', '0982175121', '', 2, 19, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_student_account`
--

CREATE TABLE `tbl_student_account` (
  `student_account_id` int(11) NOT NULL,
  `student_code` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_student_account`
--

INSERT INTO `tbl_student_account` (`student_account_id`, `student_code`, `password`, `student_id`) VALUES
(116, '201200143', '12345', 4),
(117, '201200147', '12345', 5),
(118, '201200148', '12345', 6),
(119, '201200149', '12345', 7),
(120, '201200150', '12345', 8),
(121, '201200151', '12345', 9),
(122, '201200152', '12345', 10),
(123, '201200153', '12345', 11),
(124, '201200154', '12345', 12),
(125, '201200155', '12345', 13),
(126, '201200156', '12345', 14),
(127, '201200157', '12345', 15),
(128, '201200158', '12345', 16),
(129, '201200159', '12345', 17),
(130, '201200160', '12345', 18),
(131, '201200161', '12345', 19),
(132, '201200162', '12345', 20),
(133, '201200163', '12345', 21),
(134, '201200164', '12345', 22),
(135, '201200700', '12345', 57),
(136, '201200701', '12345', 61),
(137, '201200702', '12345', 62),
(138, '201200707', '12345', 63),
(139, '201200802', '12345', 64),
(140, '201200803', '12345', 65),
(141, '201201111', '12345', 23),
(142, '301200143', '12345', 51),
(143, '301200144', '12345', 52);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_subject`
--

CREATE TABLE `tbl_subject` (
  `subject_id` int(11) NOT NULL,
  `subject_code` varchar(100) NOT NULL,
  `subject_name` varchar(100) NOT NULL,
  `subject_credit` int(11) NOT NULL,
  `major_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_subject`
--

INSERT INTO `tbl_subject` (`subject_id`, `subject_code`, `subject_name`, `subject_credit`, `major_id`) VALUES
(1, 'MH01LTW', 'Lập trình web', 3, 1),
(2, 'MH02THDC', 'Tin học đại cương', 3, 1),
(23, 'MH03CSDL', 'Cơ sở dữ liệu', 3, 1),
(24, 'MH04MMT', 'Mạng máy tính', 2, 1),
(25, 'MH05NNLTC', 'Ngôn ngữ lập trình C', 3, 1),
(26, 'MH06ATTT', 'An toàn thông tin', 2, 1),
(27, 'MH07PTVTKHT', 'Phân tích và thiết kế hệ thống', 3, 1),
(28, 'MH08QTCSDL', 'Quản trị cơ sở dữ liệu', 2, 1),
(29, 'MH09HDH', 'Hệ điều hành', 3, 1),
(30, 'MH10CNW', 'Công nghệ web', 2, 1),
(31, 'MH11QLDA', 'Quản lý dự án', 3, 1),
(32, 'MH12TGMT', 'Thị giác máy tính', 2, 1),
(33, 'MH13HM', 'Học máy', 3, 1),
(34, 'MH14LTP', 'Lập trình Python', 2, 1),
(35, 'MH15TTNT', 'Trí tuệ nhân tạo', 3, 1),
(37, 'MH16CNA', 'Công nghệ ảo', 3, 1),
(38, 'MH17KDDT', 'Kinh doanh điện tử', 2, 1),
(41, 'CT', 'Công trình cầu đường', 3, 17),
(43, 'CTt', 'Công trình đường trên cao', 3, 17);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_teacher`
--

CREATE TABLE `tbl_teacher` (
  `teacher_id` int(11) NOT NULL,
  `teacher_code` varchar(100) NOT NULL,
  `teacher_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `teacher_date_of_birth` date NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `chucvu_id` int(11) NOT NULL,
  `teacher_avatar` varchar(100) NOT NULL,
  `education_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_teacher`
--

INSERT INTO `tbl_teacher` (`teacher_id`, `teacher_code`, `teacher_name`, `email`, `phone`, `address`, `teacher_date_of_birth`, `gender`, `faculty_id`, `chucvu_id`, `teacher_avatar`, `education_id`) VALUES
(45, 'GV0000001', 'Đinh Công Tùng', 'ct01@gmail.com', '0123456789', 'Hà Nội', '1985-03-15', 'Male', 1, 1, 'gv1.jpg', 4),
(46, 'GV0000002', 'Nguyễn Hiếu Cường', 'hc02@gmail.com', '0789654567', 'Hà Nội', '1988-07-22', 'Male', 1, 1, 'gv1.jpg', 3),
(47, 'GV0000003', 'Nguyễn Quốc Tuấn', 'qt03@gmail.com', '0000000003', 'Hà Nội', '1992-05-10', 'Male', 1, 1, 'gv1.jpg', 3),
(48, 'GV0000004', 'Nguyễn Thanh Toàn', 'tt04@gmail.com', '0000000004', 'Hà Nội', '1987-11-30', 'Male', 1, 1, 'gv1.jpg', 4),
(49, 'GV0000005', 'Hoàng Văn Thông', 'vt05@gmail.com', '6509008976', 'Hà Nội', '1995-04-18', 'Male', 1, 1, 'gv1.jpg', 3),
(50, 'GV0000006', 'Nguyễn Trần Hiếu', 'th06@gmail.com', '0000000006', 'Hà Nội', '1984-09-25', 'Male', 1, 1, 'gv1.jpg', 3),
(51, 'GV0000007', 'Đào Thị Lệ Thủy', 'lt07@gmail.com', '0000000007', 'Hà Nội', '1993-12-07', 'Female', 1, 1, 'gv1.jpg', 3),
(52, 'GV0000008', 'Lại Mạnh Dũng', 'md08@gmail.com', '0000000008', 'Hà Nội', '1989-08-14', 'Male', 1, 1, 'gv1.jpg', 3),
(53, 'GV0000009', 'Bùi Ngọc Dũng', 'nd09@gmail.com', '0000000009', 'Hà Nội', '1991-06-02', 'Male', 1, 1, 'gv1.jpg', 3),
(54, 'GV0000010', 'Nguyễn Đức Dư', 'dd10@gmail.com', '0000000010', 'Hà Nội', '1986-02-28', 'Male', 1, 1, 'gv1.jpg', 3),
(55, 'GV0000011', 'Nguyễn Kim Sao', 'ks11@gmail.com', '0000000011', 'Hà Nội', '1994-10-05', 'Female', 1, 1, 'gv1.jpg', 3),
(56, 'GV0000012', 'Lương Thái Lê', 'tl12@gmail.com', '0000000012', 'Hà Nội', '1997-07-12', 'Female', 1, 1, 'gv1.jpg', 3),
(57, 'GV0000013', 'Nguyễn Thu Hường', 'th13@gmail.com', '0000000013', 'Hà Nội', '1983-03-20', 'Female', 1, 1, 'gv1.jpg', 4),
(58, 'GV0000014', 'Phạm Đình Phong', 'dp14@gmail.com', '0000000014', 'Hà Nội', '1996-09-08', 'Male', 1, 1, 'gv1.jpg', 3),
(59, 'GV0000015', 'Nguyễn Trọng Phúc', 'tp15@gmail.com', '0000000015', 'Hà Nội', '1982-04-15', 'Male', 1, 1, 'gv1.jpg', 3),
(60, 'GV0000016', 'Nguyễn Việt Hưng', 'vh16@gmail.com', '0000000016', 'Hà Nội', '1998-11-22', 'Male', 1, 1, 'gv1.jpg', 3),
(61, 'GV0000017', 'Cao Thị Luyến', 'tl17@gmail.com', '0000000017', 'Hà Nội', '1981-06-30', 'Female', 1, 1, 'gv1.jpg', 3),
(62, 'GV0000018', 'Đỗ Văn Đức', 'vd18@gmail.com', '0000000018', 'Hà Nội', '1999-01-14', 'Male', 1, 1, 'gv1.jpg', 3),
(63, 'GV0000019', 'Phạm Xuân Tích', 'xt19@gmail.com', '0000000019', 'Hà Nội', '1990-01-01', 'Male', 1, 1, 'gv1.jpg', 3),
(64, 'GV0000020', 'Nguyễn Thị Hồng Hoa', 'hh20@gmail.com', '0000000020', 'Hà Nội', '1980-08-18', 'Female', 1, 1, 'gv1.jpg', 3),
(65, 'GV1234567', 'Nguyễn Anh A', 'nanha@gmail.com', '0372687318', 'Ha Noi', '2024-03-05', 'Male', 1, 1, 'gv1.jpg', 4),
(66, 'GV1111222', 'Nguyễn Anh B', 'nanhb28@gmail.com', '0372687000', 'Ha Noi', '2024-02-28', 'Female', 2, 1, 'gv1.jpg', 4),
(70, 'GV0000021', 'Nguyễn Văn A', 'nguyenvana@gmail.com', '0981341555', 'Hà Nội', '1956-03-08', 'Male', 2, 2, 'gv-1.jpg', 2),
(71, 'GV0000022', 'Nguyễn Văn B', 'nguyenvanB@gmail.com', '0981341555', 'Hà Nội', '1956-03-08', 'Male', 2, 2, 'gv-1.jpg', 2),
(72, 'GV0000023', 'Nguyễn thị A', 'nguyenthiB@gmail.com', '0981341555', 'Hà Nội', '1956-03-08', 'Female', 2, 2, 'gv-1.jpg', 1),
(73, 'GV0000024', 'Nguyễn Thị B', 'nguyenthiB@gmail.com', '0981341555', 'Hà Nội', '1956-03-08', 'Female', 2, 2, 'gv-1.jpg', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_teacher_account`
--

CREATE TABLE `tbl_teacher_account` (
  `teacher_account_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_teacher_account`
--

INSERT INTO `tbl_teacher_account` (`teacher_account_id`, `email`, `password`, `teacher_id`) VALUES
(102, 'GV0000001', '$2y$12$ykL2cXEhZBMlUKIUrtoQxu4ehJQ5FMCMtrYrCQ0odbPhrJ796FRai', 45),
(103, 'GV0000002', '$2y$12$ykL2cXEhZBMlUKIUrtoQxu4ehJQ5FMCMtrYrCQ0odbPhrJ796FRai', 46),
(104, 'GV0000003', '$2y$12$ykL2cXEhZBMlUKIUrtoQxu4ehJQ5FMCMtrYrCQ0odbPhrJ796FRai', 47),
(105, 'GV0000004', '$2y$12$ykL2cXEhZBMlUKIUrtoQxu4ehJQ5FMCMtrYrCQ0odbPhrJ796FRai', 48),
(106, 'GV0000005', '$2y$12$ykL2cXEhZBMlUKIUrtoQxu4ehJQ5FMCMtrYrCQ0odbPhrJ796FRai', 49),
(107, 'GV0000006', '$2y$12$ykL2cXEhZBMlUKIUrtoQxu4ehJQ5FMCMtrYrCQ0odbPhrJ796FRai', 50),
(108, 'GV0000007', '$2y$12$ykL2cXEhZBMlUKIUrtoQxu4ehJQ5FMCMtrYrCQ0odbPhrJ796FRai', 51),
(109, 'GV0000008', '$2y$12$ykL2cXEhZBMlUKIUrtoQxu4ehJQ5FMCMtrYrCQ0odbPhrJ796FRai', 52),
(110, 'GV0000009', '$2y$12$ykL2cXEhZBMlUKIUrtoQxu4ehJQ5FMCMtrYrCQ0odbPhrJ796FRai', 53),
(111, 'GV0000010', '$2y$12$ykL2cXEhZBMlUKIUrtoQxu4ehJQ5FMCMtrYrCQ0odbPhrJ796FRai', 54),
(112, 'GV0000011', '$2y$12$ykL2cXEhZBMlUKIUrtoQxu4ehJQ5FMCMtrYrCQ0odbPhrJ796FRai', 55),
(113, 'GV0000012', '$2y$12$ykL2cXEhZBMlUKIUrtoQxu4ehJQ5FMCMtrYrCQ0odbPhrJ796FRai', 56),
(114, 'GV0000013', '$2y$12$ykL2cXEhZBMlUKIUrtoQxu4ehJQ5FMCMtrYrCQ0odbPhrJ796FRai', 57),
(115, 'GV0000014', '$2y$12$ykL2cXEhZBMlUKIUrtoQxu4ehJQ5FMCMtrYrCQ0odbPhrJ796FRai', 58),
(116, 'GV0000015', '$2y$12$ykL2cXEhZBMlUKIUrtoQxu4ehJQ5FMCMtrYrCQ0odbPhrJ796FRai', 59),
(117, 'GV0000016', '$2y$12$ykL2cXEhZBMlUKIUrtoQxu4ehJQ5FMCMtrYrCQ0odbPhrJ796FRai', 60),
(118, 'GV0000017', '$2y$12$ykL2cXEhZBMlUKIUrtoQxu4ehJQ5FMCMtrYrCQ0odbPhrJ796FRai', 61),
(119, 'GV0000018', '$2y$12$ykL2cXEhZBMlUKIUrtoQxu4ehJQ5FMCMtrYrCQ0odbPhrJ796FRai', 62),
(120, 'GV0000019', '$2y$12$ykL2cXEhZBMlUKIUrtoQxu4ehJQ5FMCMtrYrCQ0odbPhrJ796FRai', 63),
(121, 'GV0000020', '$2y$12$ykL2cXEhZBMlUKIUrtoQxu4ehJQ5FMCMtrYrCQ0odbPhrJ796FRai', 64);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_teacher_assignment`
--

CREATE TABLE `tbl_teacher_assignment` (
  `assignment_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `class_section_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_email` (`username`);

--
-- Chỉ mục cho bảng `tbl_admin_roles`
--
ALTER TABLE `tbl_admin_roles`
  ADD PRIMARY KEY (`admin_role_id`),
  ADD KEY `FK_admin` (`admin_id`),
  ADD KEY `FK_role` (`role_id`);

--
-- Chỉ mục cho bảng `tbl_chucvu`
--
ALTER TABLE `tbl_chucvu`
  ADD PRIMARY KEY (`chucvu_id`);

--
-- Chỉ mục cho bảng `tbl_class`
--
ALTER TABLE `tbl_class`
  ADD PRIMARY KEY (`class_id`),
  ADD UNIQUE KEY `class_code` (`class_code`),
  ADD KEY `FK_class_major` (`faculty_id`),
  ADD KEY `FK_class_teacher` (`teacher_id`),
  ADD KEY `FK_class_course` (`course_id`);

--
-- Chỉ mục cho bảng `tbl_classroom`
--
ALTER TABLE `tbl_classroom`
  ADD PRIMARY KEY (`classroom_id`);

--
-- Chỉ mục cho bảng `tbl_class_section`
--
ALTER TABLE `tbl_class_section`
  ADD PRIMARY KEY (`class_section_id`),
  ADD UNIQUE KEY `unique_class_section_code` (`class_section_code`) USING BTREE,
  ADD KEY `FK_semester_subject_section` (`semester_subject_id`);

--
-- Chỉ mục cho bảng `tbl_course`
--
ALTER TABLE `tbl_course`
  ADD PRIMARY KEY (`course_id`),
  ADD UNIQUE KEY `course_name` (`course_name`),
  ADD UNIQUE KEY `year_of_admission` (`year_of_admission`);

--
-- Chỉ mục cho bảng `tbl_education`
--
ALTER TABLE `tbl_education`
  ADD PRIMARY KEY (`education_id`);

--
-- Chỉ mục cho bảng `tbl_enrollmentdetail`
--
ALTER TABLE `tbl_enrollmentdetail`
  ADD PRIMARY KEY (`enrollmentDetail_id`),
  ADD KEY `FK_enrollDetail_enrollment` (`enrollment_id`),
  ADD KEY `FK_enrollDetail_section` (`class_section_id`);

--
-- Chỉ mục cho bảng `tbl_enrollments`
--
ALTER TABLE `tbl_enrollments`
  ADD PRIMARY KEY (`enrollment_id`),
  ADD KEY `FK_enrollment_student` (`student_id`),
  ADD KEY `FK_enrollment_semester` (`semester_id`);

--
-- Chỉ mục cho bảng `tbl_faculty`
--
ALTER TABLE `tbl_faculty`
  ADD PRIMARY KEY (`faculty_id`),
  ADD UNIQUE KEY `faculty_code` (`faculty_code`);

--
-- Chỉ mục cho bảng `tbl_grades`
--
ALTER TABLE `tbl_grades`
  ADD PRIMARY KEY (`grades_id`),
  ADD KEY `FK_grades_student` (`student_id`),
  ADD KEY `FK_grades_subject` (`semester_subject_id`);

--
-- Chỉ mục cho bảng `tbl_gradesdetail`
--
ALTER TABLE `tbl_gradesdetail`
  ADD PRIMARY KEY (`gradesDetail_id`),
  ADD KEY `FK_detail_grades` (`grades_id`);

--
-- Chỉ mục cho bảng `tbl_major`
--
ALTER TABLE `tbl_major`
  ADD PRIMARY KEY (`major_id`),
  ADD UNIQUE KEY `major_code` (`major_code`),
  ADD KEY `FK_major_faculty` (`faculty_id`) USING BTREE;

--
-- Chỉ mục cho bảng `tbl_posts`
--
ALTER TABLE `tbl_posts`
  ADD PRIMARY KEY (`posts_id`),
  ADD KEY `FK_post_admin` (`admin_id`);

--
-- Chỉ mục cho bảng `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Chỉ mục cho bảng `tbl_schedule`
--
ALTER TABLE `tbl_schedule`
  ADD PRIMARY KEY (`schedule_id`),
  ADD KEY `FK_schedu_classroom` (`classroom_id`),
  ADD KEY `FK_schedu_date` (`start_end_date_id`);

--
-- Chỉ mục cho bảng `tbl_semester`
--
ALTER TABLE `tbl_semester`
  ADD PRIMARY KEY (`semester_id`),
  ADD UNIQUE KEY `semester_name` (`semester_name`,`school_year`,`course_id`,`faculty_id`),
  ADD KEY `FK_semester_course` (`course_id`),
  ADD KEY `PK_semester_faculty` (`faculty_id`);

--
-- Chỉ mục cho bảng `tbl_semester_subject`
--
ALTER TABLE `tbl_semester_subject`
  ADD PRIMARY KEY (`semester_subject_id`),
  ADD UNIQUE KEY `semester_id` (`semester_id`,`subject_id`),
  ADD KEY `FK_semester_nn` (`semester_id`),
  ADD KEY `FK_subject_nn` (`subject_id`);

--
-- Chỉ mục cho bảng `tbl_start_end_date`
--
ALTER TABLE `tbl_start_end_date`
  ADD PRIMARY KEY (`start_end_date_id`),
  ADD KEY `FK_class_section_date` (`class_section_id`);

--
-- Chỉ mục cho bảng `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `unique_student_code` (`student_code`),
  ADD UNIQUE KEY `unique_student_phone` (`phone`),
  ADD UNIQUE KEY `unique_student_email` (`email`),
  ADD KEY `FK_student_class` (`class_id`),
  ADD KEY `fk_student_course` (`course_id`),
  ADD KEY `FK_student_facult` (`faculty_id`);

--
-- Chỉ mục cho bảng `tbl_student_account`
--
ALTER TABLE `tbl_student_account`
  ADD PRIMARY KEY (`student_account_id`),
  ADD UNIQUE KEY `unique_user_email` (`student_code`),
  ADD UNIQUE KEY `unique_studentId` (`student_id`),
  ADD KEY `FK_user_student` (`student_id`);

--
-- Chỉ mục cho bảng `tbl_subject`
--
ALTER TABLE `tbl_subject`
  ADD PRIMARY KEY (`subject_id`),
  ADD UNIQUE KEY `unique_subject_name` (`subject_name`),
  ADD UNIQUE KEY `unique_subject_code` (`subject_code`),
  ADD KEY `FK_subject_major` (`major_id`);

--
-- Chỉ mục cho bảng `tbl_teacher`
--
ALTER TABLE `tbl_teacher`
  ADD PRIMARY KEY (`teacher_id`),
  ADD UNIQUE KEY `unique_teacher_code` (`teacher_code`),
  ADD KEY `FK_teacher_faculty` (`faculty_id`) USING BTREE,
  ADD KEY `FK_teacher_chuvu` (`chucvu_id`),
  ADD KEY `FK_teacher_education` (`education_id`);

--
-- Chỉ mục cho bảng `tbl_teacher_account`
--
ALTER TABLE `tbl_teacher_account`
  ADD PRIMARY KEY (`teacher_account_id`),
  ADD UNIQUE KEY `unique_admin_email` (`email`),
  ADD UNIQUE KEY `unique_admin_teacherId` (`teacher_id`),
  ADD KEY `FK_admin_teacher` (`teacher_id`);

--
-- Chỉ mục cho bảng `tbl_teacher_assignment`
--
ALTER TABLE `tbl_teacher_assignment`
  ADD PRIMARY KEY (`assignment_id`),
  ADD KEY `FK_teacher` (`teacher_id`),
  ADD KEY `FK_teacher_assignment` (`class_section_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `tbl_admin_roles`
--
ALTER TABLE `tbl_admin_roles`
  MODIFY `admin_role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `tbl_chucvu`
--
ALTER TABLE `tbl_chucvu`
  MODIFY `chucvu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tbl_class`
--
ALTER TABLE `tbl_class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `tbl_classroom`
--
ALTER TABLE `tbl_classroom`
  MODIFY `classroom_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `tbl_class_section`
--
ALTER TABLE `tbl_class_section`
  MODIFY `class_section_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `tbl_course`
--
ALTER TABLE `tbl_course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `tbl_education`
--
ALTER TABLE `tbl_education`
  MODIFY `education_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tbl_enrollmentdetail`
--
ALTER TABLE `tbl_enrollmentdetail`
  MODIFY `enrollmentDetail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `tbl_enrollments`
--
ALTER TABLE `tbl_enrollments`
  MODIFY `enrollment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `tbl_faculty`
--
ALTER TABLE `tbl_faculty`
  MODIFY `faculty_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `tbl_grades`
--
ALTER TABLE `tbl_grades`
  MODIFY `grades_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_gradesdetail`
--
ALTER TABLE `tbl_gradesdetail`
  MODIFY `gradesDetail_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_major`
--
ALTER TABLE `tbl_major`
  MODIFY `major_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT cho bảng `tbl_posts`
--
ALTER TABLE `tbl_posts`
  MODIFY `posts_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tbl_roles`
--
ALTER TABLE `tbl_roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tbl_schedule`
--
ALTER TABLE `tbl_schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `tbl_semester`
--
ALTER TABLE `tbl_semester`
  MODIFY `semester_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `tbl_semester_subject`
--
ALTER TABLE `tbl_semester_subject`
  MODIFY `semester_subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `tbl_start_end_date`
--
ALTER TABLE `tbl_start_end_date`
  MODIFY `start_end_date_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT cho bảng `tbl_student_account`
--
ALTER TABLE `tbl_student_account`
  MODIFY `student_account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT cho bảng `tbl_subject`
--
ALTER TABLE `tbl_subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT cho bảng `tbl_teacher`
--
ALTER TABLE `tbl_teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT cho bảng `tbl_teacher_account`
--
ALTER TABLE `tbl_teacher_account`
  MODIFY `teacher_account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT cho bảng `tbl_teacher_assignment`
--
ALTER TABLE `tbl_teacher_assignment`
  MODIFY `assignment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_admin_roles`
--
ALTER TABLE `tbl_admin_roles`
  ADD CONSTRAINT `FK_admin` FOREIGN KEY (`admin_id`) REFERENCES `tbl_admin` (`admin_id`),
  ADD CONSTRAINT `FK_role` FOREIGN KEY (`role_id`) REFERENCES `tbl_roles` (`role_id`);

--
-- Các ràng buộc cho bảng `tbl_class`
--
ALTER TABLE `tbl_class`
  ADD CONSTRAINT `FK_class_course` FOREIGN KEY (`course_id`) REFERENCES `tbl_course` (`course_id`),
  ADD CONSTRAINT `FK_class_faculty` FOREIGN KEY (`faculty_id`) REFERENCES `tbl_faculty` (`faculty_id`),
  ADD CONSTRAINT `FK_class_teacher` FOREIGN KEY (`teacher_id`) REFERENCES `tbl_teacher` (`teacher_id`);

--
-- Các ràng buộc cho bảng `tbl_class_section`
--
ALTER TABLE `tbl_class_section`
  ADD CONSTRAINT `FK_semester_subject_section` FOREIGN KEY (`semester_subject_id`) REFERENCES `tbl_semester_subject` (`semester_subject_id`);

--
-- Các ràng buộc cho bảng `tbl_enrollmentdetail`
--
ALTER TABLE `tbl_enrollmentdetail`
  ADD CONSTRAINT `FK_enrollDetail_enrollment` FOREIGN KEY (`enrollment_id`) REFERENCES `tbl_enrollments` (`enrollment_id`),
  ADD CONSTRAINT `FK_enrollDetail_section` FOREIGN KEY (`class_section_id`) REFERENCES `tbl_class_section` (`class_section_id`);

--
-- Các ràng buộc cho bảng `tbl_enrollments`
--
ALTER TABLE `tbl_enrollments`
  ADD CONSTRAINT `FK_enrollment_semester` FOREIGN KEY (`semester_id`) REFERENCES `tbl_semester` (`semester_id`),
  ADD CONSTRAINT `FK_enrollment_student` FOREIGN KEY (`student_id`) REFERENCES `tbl_student` (`student_id`);

--
-- Các ràng buộc cho bảng `tbl_grades`
--
ALTER TABLE `tbl_grades`
  ADD CONSTRAINT `FK_grades_student` FOREIGN KEY (`student_id`) REFERENCES `tbl_student` (`student_id`),
  ADD CONSTRAINT `PK_semester_grades` FOREIGN KEY (`semester_subject_id`) REFERENCES `tbl_semester_subject` (`semester_subject_id`);

--
-- Các ràng buộc cho bảng `tbl_gradesdetail`
--
ALTER TABLE `tbl_gradesdetail`
  ADD CONSTRAINT `FK_detail_grades` FOREIGN KEY (`grades_id`) REFERENCES `tbl_grades` (`grades_id`);

--
-- Các ràng buộc cho bảng `tbl_major`
--
ALTER TABLE `tbl_major`
  ADD CONSTRAINT `FK_major_faculty` FOREIGN KEY (`faculty_id`) REFERENCES `tbl_faculty` (`faculty_id`);

--
-- Các ràng buộc cho bảng `tbl_posts`
--
ALTER TABLE `tbl_posts`
  ADD CONSTRAINT `FK_post_admin` FOREIGN KEY (`admin_id`) REFERENCES `tbl_admin` (`admin_id`);

--
-- Các ràng buộc cho bảng `tbl_schedule`
--
ALTER TABLE `tbl_schedule`
  ADD CONSTRAINT `FK_schedu_classroom` FOREIGN KEY (`classroom_id`) REFERENCES `tbl_classroom` (`classroom_id`),
  ADD CONSTRAINT `FK_schedu_date` FOREIGN KEY (`start_end_date_id`) REFERENCES `tbl_start_end_date` (`start_end_date_id`);

--
-- Các ràng buộc cho bảng `tbl_semester`
--
ALTER TABLE `tbl_semester`
  ADD CONSTRAINT `FK_semester_course` FOREIGN KEY (`course_id`) REFERENCES `tbl_course` (`course_id`),
  ADD CONSTRAINT `PK_semester_faculty` FOREIGN KEY (`faculty_id`) REFERENCES `tbl_faculty` (`faculty_id`);

--
-- Các ràng buộc cho bảng `tbl_semester_subject`
--
ALTER TABLE `tbl_semester_subject`
  ADD CONSTRAINT `FK_semester_nn` FOREIGN KEY (`semester_id`) REFERENCES `tbl_semester` (`semester_id`),
  ADD CONSTRAINT `FK_subject_nn` FOREIGN KEY (`subject_id`) REFERENCES `tbl_subject` (`subject_id`);

--
-- Các ràng buộc cho bảng `tbl_start_end_date`
--
ALTER TABLE `tbl_start_end_date`
  ADD CONSTRAINT `FK_class_section_date` FOREIGN KEY (`class_section_id`) REFERENCES `tbl_class_section` (`class_section_id`);

--
-- Các ràng buộc cho bảng `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD CONSTRAINT `FK_student_class` FOREIGN KEY (`class_id`) REFERENCES `tbl_class` (`class_id`),
  ADD CONSTRAINT `FK_student_facult` FOREIGN KEY (`faculty_id`) REFERENCES `tbl_faculty` (`faculty_id`),
  ADD CONSTRAINT `fk_student_course` FOREIGN KEY (`course_id`) REFERENCES `tbl_course` (`course_id`);

--
-- Các ràng buộc cho bảng `tbl_student_account`
--
ALTER TABLE `tbl_student_account`
  ADD CONSTRAINT `FK_user_student` FOREIGN KEY (`student_id`) REFERENCES `tbl_student` (`student_id`);

--
-- Các ràng buộc cho bảng `tbl_subject`
--
ALTER TABLE `tbl_subject`
  ADD CONSTRAINT `FK_subject_major` FOREIGN KEY (`major_id`) REFERENCES `tbl_major` (`major_id`);

--
-- Các ràng buộc cho bảng `tbl_teacher`
--
ALTER TABLE `tbl_teacher`
  ADD CONSTRAINT `FK_teacher_chuvu` FOREIGN KEY (`chucvu_id`) REFERENCES `tbl_chucvu` (`chucvu_id`),
  ADD CONSTRAINT `FK_teacher_education` FOREIGN KEY (`education_id`) REFERENCES `tbl_education` (`education_id`),
  ADD CONSTRAINT `FK_teacher_faculty` FOREIGN KEY (`faculty_id`) REFERENCES `tbl_faculty` (`faculty_id`);

--
-- Các ràng buộc cho bảng `tbl_teacher_account`
--
ALTER TABLE `tbl_teacher_account`
  ADD CONSTRAINT `FK_admin_teacher` FOREIGN KEY (`teacher_id`) REFERENCES `tbl_teacher` (`teacher_id`);

--
-- Các ràng buộc cho bảng `tbl_teacher_assignment`
--
ALTER TABLE `tbl_teacher_assignment`
  ADD CONSTRAINT `FK_teacher` FOREIGN KEY (`teacher_id`) REFERENCES `tbl_teacher` (`teacher_id`),
  ADD CONSTRAINT `FK_teacher_assignment` FOREIGN KEY (`class_section_id`) REFERENCES `tbl_class_section` (`class_section_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
