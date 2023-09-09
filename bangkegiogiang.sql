-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 27, 2023 lúc 03:07 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `bangkegiogiang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bangke`
--

CREATE TABLE `bangke` (
  `id_bang_ke` int(11) NOT NULL,
  `id_index` int(11) DEFAULT NULL,
  `id_giang_vien` int(11) DEFAULT NULL,
  `noi_dung` varchar(50) DEFAULT NULL,
  `sum_giang_day` float DEFAULT NULL,
  `sum_nckh` float DEFAULT NULL,
  `sum_kq` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `bangke`
--

INSERT INTO `bangke` (`id_bang_ke`, `id_index`, `id_giang_vien`, `noi_dung`, `sum_giang_day`, `sum_nckh`, `sum_kq`) VALUES
(41, 1, 1, 'Số giờ chuẩn quy định', 285, 75, 360),
(42, 1, 1, 'Số giờ giảm trừ', 0, 0, 0),
(43, 1, 1, 'Số giờ chuẩn thực tế (đã giảm trừ)', 285, 75, 360),
(44, 1, 1, 'Số giờ hoàn thành thực tế (giảng dạy và NCKH)', 62, 120, 182),
(45, 1, 1, 'Số giờ còn lại', -223, 45, -178),
(46, 2, 1, 'Số giờ chuẩn quy định', 285, 75, 360),
(47, 2, 1, 'Số giờ giảm trừ', 0, 0, 0),
(48, 2, 1, 'Số giờ chuẩn thực tế (đã giảm trừ)', 285, 75, 360),
(49, 2, 1, 'Số giờ hoàn thành thực tế (giảng dạy và NCKH)', 369, 122, 491),
(50, 2, 1, 'Số giờ còn lại', 84, 47, 131),
(66, 1, 2, 'Số giờ chuẩn quy định', 285, 75, 360),
(67, 1, 2, 'Số giờ giảm trừ', 0, 0, 0),
(68, 1, 2, 'Số giờ chuẩn thực tế (đã giảm trừ)', 285, 75, 360),
(69, 1, 2, 'Số giờ hoàn thành thực tế (giảng dạy và NCKH)', 62, 120, 182),
(70, 1, 2, 'Số giờ còn lại', -223, 45, -178),
(71, 2, 2, 'Số giờ chuẩn quy định', 285, 75, 360),
(72, 2, 2, 'Số giờ giảm trừ', 0, 0, 0),
(73, 2, 2, 'Số giờ chuẩn thực tế (đã giảm trừ)', 285, 75, 360),
(74, 2, 2, 'Số giờ hoàn thành thực tế (giảng dạy và NCKH)', 62, 120, 182),
(75, 2, 2, 'Số giờ còn lại', -223, 45, -178);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bangthamchieu`
--

CREATE TABLE `bangthamchieu` (
  `id_bang_tham_chieu` int(11) NOT NULL,
  `noi_dung` varchar(50) DEFAULT NULL,
  `sum_giang_day` float DEFAULT NULL,
  `sum_nckh` float DEFAULT NULL,
  `sum_kq` float DEFAULT NULL,
  `key_index` int(11) DEFAULT NULL,
  `ghi_chu` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `bangthamchieu`
--

INSERT INTO `bangthamchieu` (`id_bang_tham_chieu`, `noi_dung`, `sum_giang_day`, `sum_nckh`, `sum_kq`, `key_index`, `ghi_chu`) VALUES
(1, 'Số giờ chuẩn quy định', 285, 75, 360, 1, NULL),
(2, 'Số giờ giảm trừ\r\n', 0, 0, 0, 2, NULL),
(3, 'Số giờ chuẩn thực tế (đã giảm trừ)\r\n', 285, 75, 360, 3, '(3) = (1) - (2)'),
(4, 'Số giờ hoàn thành thực tế (giảng dạy và NCKH)', 0, 0, 0, 4, ''),
(5, 'Số giờ còn lại\r\n', 285, 75, 360, 5, '(5) = (4) - (3)');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `canbokhoa`
--

CREATE TABLE `canbokhoa` (
  `id_can_bo_khoa` int(11) NOT NULL,
  `ma_can_bo_khoa` varchar(50) DEFAULT NULL,
  `ten_can_bo_khoa` varchar(50) DEFAULT NULL,
  `gioi_tinh` tinyint(4) DEFAULT 1,
  `ngay_sinh` date DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `so_dien_thoai_1` varchar(11) DEFAULT NULL,
  `so_dien_thoai_2` varchar(11) DEFAULT NULL,
  `dia_chi_lien_lac` text DEFAULT NULL,
  `dia_chi_thuong_tru` text DEFAULT NULL,
  `id_trinh_do` int(11) DEFAULT NULL,
  `trang_thai` tinyint(4) DEFAULT 1,
  `id_khoa` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `canbokhoa`
--

INSERT INTO `canbokhoa` (`id_can_bo_khoa`, `ma_can_bo_khoa`, `ten_can_bo_khoa`, `gioi_tinh`, `ngay_sinh`, `email`, `so_dien_thoai_1`, `so_dien_thoai_2`, `dia_chi_lien_lac`, `dia_chi_thuong_tru`, `id_trinh_do`, `trang_thai`, `id_khoa`) VALUES
(1, 'cb1', 'Cán bộ khoa 1', 1, '2001-06-05', 'cb1@gmail.com', '0123456789', '0123456789', 'CT', 'CT', 1, 1, 1),
(2, 'cb2', 'Cán bộ khoa 2', 0, '2001-06-05', 'cb2@gmail.com', '0123456789', '0123456789', 'CT', 'CT', 1, 1, 1),
(11, 'cb1', 'Cán bộ khoa 1', NULL, '2006-05-01', 'cb1@gmail.com', '0123456789', '0123456789', 'CT', 'CT', 0, 1, 0),
(12, 'cb2', 'Cán bộ khoa 2', NULL, '2006-05-01', 'cb2@gmail.com', '0123456789', '0123456789', 'CT', 'CT', 0, 1, 0),
(13, 'cb1', 'Cán bộ khoa 1', NULL, '2006-05-01', 'cb1@gmail.com', '0123456789', '0123456789', 'CT', 'CT', 1, 1, 1),
(14, 'cb2', 'Cán bộ khoa 2', NULL, '2006-05-01', 'cb2@gmail.com', '0123456789', '0123456789', 'CT', 'CT', 1, 1, 1),
(15, 'cb1', 'Cán bộ khoa 1', NULL, '2006-05-01', 'cb1@gmail.com', '0123456789', '0123456789', 'CT', 'CT', 1, 1, 1),
(16, 'cb2', 'Cán bộ khoa 2', NULL, '2006-05-01', 'cb2@gmail.com', '0123456789', '0123456789', 'CT', 'CT', 1, 1, 1),
(17, 'cb1', 'Cán bộ khoa 1', NULL, '2006-05-01', 'cb1@gmail.com', '0123456789', '0123456789', 'CT', 'CT', 1, 1, 1),
(18, 'cb2', 'Cán bộ khoa 2', NULL, '2006-05-01', 'cb2@gmail.com', '0123456789', '0123456789', 'CT', 'CT', 1, 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `congviec`
--

CREATE TABLE `congviec` (
  `id_cong_viec` int(11) NOT NULL,
  `id_index` int(11) NOT NULL DEFAULT 0,
  `id_giang_vien` int(11) NOT NULL DEFAULT 0,
  `id_quy_doi` int(11) NOT NULL DEFAULT 0,
  `ten_cong_viec` varchar(50) DEFAULT NULL,
  `quy_doi_so_tiet` float DEFAULT NULL,
  `so_luong` float DEFAULT NULL,
  `tong_so_tiet` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `congviec`
--

INSERT INTO `congviec` (`id_cong_viec`, `id_index`, `id_giang_vien`, `id_quy_doi`, `ten_cong_viec`, `quy_doi_so_tiet`, `so_luong`, `tong_so_tiet`) VALUES
(50, 1, 1, 5, 'Tự Luận', 1, 60, 60),
(51, 1, 1, 6, 'Trắc nghiệm', 1.5, 0, 0),
(52, 1, 1, 7, 'Coi thi học kỳ', 0.65, 0, 0),
(53, 1, 1, 8, 'Chấm bài học kỳ', 0.0625, 0, 0),
(54, 1, 1, 9, 'Chấm 1', 4, 0, 0),
(55, 1, 1, 10, 'Chấm 2', 1.5, 0, 0),
(56, 1, 1, 11, 'Chấm 1', 4, 0, 0),
(57, 1, 1, 12, 'Chấm 2', 1, 0, 0),
(58, 1, 1, 13, 'Hướng Dẫn Chấm', 12, 0, 0),
(59, 1, 1, 14, 'Phản biện', 3, 0, 0),
(60, 1, 1, 15, 'Chủ tịch hội đồng', 1.5, 0, 0),
(61, 1, 1, 16, 'Thư Ký hội đồng', 1, 0, 0),
(62, 1, 1, 17, 'Chấm 1', 6, 0, 0),
(63, 1, 1, 18, 'Chấm 2', 1.5, 0, 0),
(64, 1, 1, 19, 'Công tác dự giờ', 1, 0, 0),
(65, 1, 1, 20, 'Công tác tuyển sinh', 2.5, 0, 0),
(66, 1, 1, 21, 'Tổ trưởng', 14, 0, 0),
(67, 1, 1, 22, 'Thành Viên', 10.5, 0, 0),
(68, 1, 1, 23, 'Chủ tịch', 20, 0, 0),
(69, 1, 1, 24, 'Phó chủ tịch', 15, 0, 0),
(70, 1, 1, 25, 'Thư ký', 15, 0, 0),
(71, 1, 1, 26, 'Thành viên', 10, 0, 0),
(72, 1, 1, 27, 'Đóng góp vào công tác kiểm định', 1, 0, 0),
(73, 2, 1, 5, 'Tự Luận', 1, 200, 200),
(74, 2, 1, 6, 'Trắc nghiệm', 1.5, 0, 0),
(75, 2, 1, 7, 'Coi thi học kỳ', 0.65, 0, 0),
(76, 2, 1, 8, 'Chấm bài học kỳ', 0.0625, 0, 0),
(77, 2, 1, 9, 'Chấm 1', 4, 0, 0),
(78, 2, 1, 10, 'Chấm 2', 1.5, 0, 0),
(79, 2, 1, 11, 'Chấm 1', 4, 0, 0),
(80, 2, 1, 12, 'Chấm 2', 1, 0, 0),
(81, 2, 1, 13, 'Hướng Dẫn Chấm', 12, 0, 0),
(82, 2, 1, 14, 'Phản biện', 3, 0, 0),
(83, 2, 1, 15, 'Chủ tịch hội đồng', 1.5, 0, 0),
(84, 2, 1, 16, 'Thư Ký hội đồng', 1, 0, 0),
(85, 2, 1, 17, 'Chấm 1', 6, 0, 0),
(86, 2, 1, 18, 'Chấm 2', 1.5, 0, 0),
(87, 2, 1, 19, 'Công tác dự giờ', 1, 0, 0),
(88, 2, 1, 20, 'Công tác tuyển sinh', 2.5, 0, 0),
(89, 2, 1, 21, 'Tổ trưởng', 14, 0, 0),
(90, 2, 1, 22, 'Thành Viên', 10.5, 0, 0),
(91, 2, 1, 23, 'Chủ tịch', 20, 0, 0),
(92, 2, 1, 24, 'Phó chủ tịch', 15, 0, 0),
(93, 2, 1, 25, 'Thư ký', 15, 0, 0),
(94, 2, 1, 26, 'Thành viên', 10, 0, 0),
(95, 2, 1, 27, 'Đóng góp vào công tác kiểm định', 1, 0, 0),
(96, 1, 2, 5, 'Tự Luận', 1, 30, 30),
(97, 1, 2, 6, 'Trắc nghiệm', 1.5, 30, 45),
(98, 1, 2, 7, 'Coi thi học kỳ', 0.65, 10, 6.5),
(99, 1, 2, 8, 'Chấm bài học kỳ', 0.0625, 10, 0.625),
(100, 1, 2, 9, 'Chấm 1', 4, 8, 32),
(101, 1, 2, 10, 'Chấm 2', 1.5, 9, 13.5),
(102, 1, 2, 11, 'Chấm 1', 4, 10, 40),
(103, 1, 2, 12, 'Chấm 2', 1, 0, 0),
(104, 1, 2, 13, 'Hướng Dẫn Chấm', 12, 10, 120),
(105, 1, 2, 14, 'Phản biện', 3, 10, 30),
(106, 1, 2, 15, 'Chủ tịch hội đồng', 1.5, 1, 1.5),
(107, 1, 2, 16, 'Thư Ký hội đồng', 1, 0, 0),
(108, 1, 2, 17, 'Chấm 1', 6, 10, 60),
(109, 1, 2, 18, 'Chấm 2', 1.5, 0, 0),
(110, 1, 2, 19, 'Công tác dự giờ', 1, 0, 0),
(111, 1, 2, 20, 'Công tác tuyển sinh', 2.5, 0, 0),
(112, 1, 2, 21, 'Tổ trưởng', 14, 3, 42),
(113, 1, 2, 22, 'Thành Viên', 10.5, 0, 0),
(114, 1, 2, 23, 'Chủ tịch', 20, 1, 20),
(115, 1, 2, 24, 'Phó chủ tịch', 15, 0, 0),
(116, 1, 2, 25, 'Thư ký', 15, 0, 0),
(117, 1, 2, 26, 'Thành viên', 10, 0, 0),
(118, 1, 2, 27, 'Đóng góp vào công tác kiểm định', 1, 0, 0),
(119, 2, 2, 5, 'Tự Luận', 1, 30, 30),
(120, 2, 2, 6, 'Trắc nghiệm', 1.5, 30, 45),
(121, 2, 2, 7, 'Coi thi học kỳ', 0.65, 10, 6.5),
(122, 2, 2, 8, 'Chấm bài học kỳ', 0.0625, 0, 0),
(123, 2, 2, 9, 'Chấm 1', 4, 10, 40),
(124, 2, 2, 10, 'Chấm 2', 1.5, 0, 0),
(125, 2, 2, 11, 'Chấm 1', 4, 10, 40),
(126, 2, 2, 12, 'Chấm 2', 1, 0, 0),
(127, 2, 2, 13, 'Hướng Dẫn Chấm', 12, 10, 120),
(128, 2, 2, 14, 'Phản biện', 3, 0, 0),
(129, 2, 2, 15, 'Chủ tịch hội đồng', 1.5, 0, 0),
(130, 2, 2, 16, 'Thư Ký hội đồng', 1, 0, 0),
(131, 2, 2, 17, 'Chấm 1', 6, 0, 0),
(132, 2, 2, 18, 'Chấm 2', 1.5, 0, 0),
(133, 2, 2, 19, 'Công tác dự giờ', 1, 0, 0),
(134, 2, 2, 20, 'Công tác tuyển sinh', 2.5, 0, 0),
(135, 2, 2, 21, 'Tổ trưởng', 14, 5, 70),
(136, 2, 2, 22, 'Thành Viên', 10.5, 0, 0),
(137, 2, 2, 23, 'Chủ tịch', 20, 0, 0),
(138, 2, 2, 24, 'Phó chủ tịch', 15, 0, 0),
(139, 2, 2, 25, 'Thư ký', 15, 0, 0),
(140, 2, 2, 26, 'Thành viên', 10, 0, 0),
(141, 2, 2, 27, 'Đóng góp vào công tác kiểm định', 1, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dongia`
--

CREATE TABLE `dongia` (
  `id_don_gia` int(11) NOT NULL,
  `don_gia` float DEFAULT NULL,
  `ghi_chu` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `dongia`
--

INSERT INTO `dongia` (`id_don_gia`, `don_gia`, `ghi_chu`) VALUES
(17, 95000, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giangday`
--

CREATE TABLE `giangday` (
  `id_giang_day` int(11) NOT NULL,
  `id_index` int(11) NOT NULL DEFAULT 0,
  `id_giang_vien` int(11) NOT NULL DEFAULT 0,
  `id_nhom_giang_day` int(11) NOT NULL DEFAULT 0,
  `ten_mon_hoc` varchar(50) DEFAULT NULL,
  `ten_lop_hoc` varchar(50) DEFAULT NULL,
  `so_sinh_vien` int(11) DEFAULT NULL,
  `so_nhom` int(11) DEFAULT NULL,
  `so_tiet_mon_hoc` float DEFAULT NULL,
  `so_tiet_thuc_giang` float DEFAULT NULL,
  `he_so_nhom` float DEFAULT NULL,
  `he_so_tin_chi` float DEFAULT NULL,
  `so_tiet_quy_chuan` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `giangday`
--

INSERT INTO `giangday` (`id_giang_day`, `id_index`, `id_giang_vien`, `id_nhom_giang_day`, `ten_mon_hoc`, `ten_lop_hoc`, `so_sinh_vien`, `so_nhom`, `so_tiet_mon_hoc`, `so_tiet_thuc_giang`, `he_so_nhom`, `he_so_tin_chi`, `so_tiet_quy_chuan`) VALUES
(3, 1, 1, 1, 'Môn 2', 'CNTT 13', 132, 2, 60, 60, 1, 1, 62),
(4, 2, 1, 1, 'ádsa', 'ád', 12, 123, 123, 123, 123, 123, 369),
(8, 1, 2, 1, 'Phân tích thuyết kế thuật toán', 'CNTT14 ', 100, 2, 60, 60, 1, 1, 62),
(9, 2, 2, 2, 'Phân tích thuyết kế thuật toán', 'CNTT 13', 120, 2, 60, 60, 1, 1, 62);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giangvien`
--

CREATE TABLE `giangvien` (
  `id_giang_vien` int(11) NOT NULL,
  `ma_giang_vien` varchar(50) DEFAULT NULL,
  `ten_giang_vien` varchar(50) DEFAULT NULL,
  `gioi_tinh` tinyint(4) DEFAULT 1,
  `ngay_sinh` date DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `so_dien_thoai_1` varchar(11) DEFAULT NULL,
  `so_dien_thoai_2` varchar(11) DEFAULT NULL,
  `dia_chi_lien_lac` text DEFAULT NULL,
  `dia_chi_thuong_tru` text DEFAULT NULL,
  `id_trinh_do` int(11) DEFAULT NULL,
  `trang_thai` tinyint(4) DEFAULT 1,
  `id_khoa` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `giangvien`
--

INSERT INTO `giangvien` (`id_giang_vien`, `ma_giang_vien`, `ten_giang_vien`, `gioi_tinh`, `ngay_sinh`, `email`, `so_dien_thoai_1`, `so_dien_thoai_2`, `dia_chi_lien_lac`, `dia_chi_thuong_tru`, `id_trinh_do`, `trang_thai`, `id_khoa`) VALUES
(2, 'gv2', 'Giảng viên 2', 0, '2001-06-05', 'gv2@gmail.com', '0123456789', '0123456789', 'CT', 'CT', 2, 1, 1),
(7, 'gv3', 'Giảng Viên 3', 1, '2001-06-20', 'gv3@gmail.com', '11111111111', '11111111111', '1111111111111', '1111111111111', 2, 1, 1),
(8, 'gv1', 'Giảng viên 1', 1, '2006-05-01', 'gv1@gmail.com', '0123456789', '0123456789', 'CT', 'CT', 2, 1, 1),
(9, 'gv2', 'Giảng viên 2', 0, '2006-05-01', 'gv2@gmail.com', '0123456789', '0123456789', 'CT', 'CT', 1, 1, 1),
(10, 'gák', 'gv3', 1, '0000-00-00', 'gv3@gamilc.om', '11111111111', '11111111111', '1111111111111', '1111111111111', 2, 1, 1),
(11, 'gv1', 'Giảng viên 1', 1, '2006-05-01', 'gv1@gmail.com', '0123456789', '0123456789', 'CT', 'CT', 2, 1, 1),
(12, 'gv2', 'Giảng viên 2', 0, '2006-05-01', 'gv2@gmail.com', '0123456789', '0123456789', 'CT', 'CT', 1, 1, 1),
(13, 'gák', 'gv3', 1, '0000-00-00', 'gv3@gamilc.om', '11111111111', '11111111111', '1111111111111', '1111111111111', 2, 1, 1),
(14, 'gv1', 'Giảng viên 1', 1, '2006-05-01', 'gv1@gmail.com', '0123456789', '0123456789', 'CT', 'CT', 2, 1, 1),
(15, 'gv2', 'Giảng viên 2', 0, '2006-05-01', 'gv2@gmail.com', '0123456789', '0123456789', 'CT', 'CT', 1, 1, 1),
(16, 'gák', 'gv3', 1, '0000-00-00', 'gv3@gamilc.om', '11111111111', '11111111111', '1111111111111', '1111111111111', 2, 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `indexcount`
--

CREATE TABLE `indexcount` (
  `id_index` int(11) NOT NULL,
  `ten_index` varchar(50) DEFAULT NULL,
  `ghi_chu` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `indexcount`
--

INSERT INTO `indexcount` (`id_index`, `ten_index`, `ghi_chu`) VALUES
(1, 'Đợt 1', ''),
(2, 'Đợt 2', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khoa`
--

CREATE TABLE `khoa` (
  `id_khoa` int(11) NOT NULL,
  `ten_khoa` varchar(50) DEFAULT NULL,
  `ghi_chu` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `khoa`
--

INSERT INTO `khoa` (`id_khoa`, `ten_khoa`, `ghi_chu`) VALUES
(1, 'Khoa KTCN', ''),
(2, 'Khoa QTKD', ''),
(4, 'Khoa Dược - Điều Dưỡng', 'Khoa Dược - Điều Dưỡng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nckh`
--

CREATE TABLE `nckh` (
  `id_nckh` int(11) NOT NULL,
  `id_index` int(11) NOT NULL DEFAULT 0,
  `id_giang_vien` int(11) NOT NULL DEFAULT 0,
  `noi_dung` varchar(50) DEFAULT NULL,
  `the_loai` varchar(50) DEFAULT NULL,
  `so_tiet_quy_chuan` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `nckh`
--

INSERT INTO `nckh` (`id_nckh`, `id_index`, `id_giang_vien`, `noi_dung`, `the_loai`, `so_tiet_quy_chuan`) VALUES
(3, 2, 1, '23', '1', 122),
(5, 1, 1, 'NCKH 1', 'NCKH 1', 120),
(6, 1, 2, 'NCKH 1', 'NCKH 2', 120),
(7, 2, 2, 'NCKH 1', 'NCKH 1', 120);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhomcongviec`
--

CREATE TABLE `nhomcongviec` (
  `id_nhom_cong_viec` int(11) NOT NULL,
  `ten_nhom_cong_viec` varchar(50) DEFAULT NULL,
  `ghi_chu` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `nhomcongviec`
--

INSERT INTO `nhomcongviec` (`id_nhom_cong_viec`, `ten_nhom_cong_viec`, `ghi_chu`) VALUES
(1, 'Nhom1', ''),
(2, 'Nhom2', ''),
(22, 'Ra đề', ''),
(23, 'Coi thi', ''),
(24, 'Chấm bài', ''),
(25, 'Niên luận', ''),
(26, 'Thực tập tốt nghiệp', ''),
(27, 'Đồ án, khóa luận đại học', ''),
(28, 'Hội đồng đồ án, khóa luận đại học', ''),
(29, 'Hướng dẫn chấm tiểu luận', ''),
(30, 'Công tác dự giờ', ''),
(31, 'Công tác tuyển sinh', ''),
(32, 'Tham gia Tổ đảm bảo chất lượng Khoa/ Bộ Môn', ''),
(33, 'Tham gia Hội đồng đảm bảo chất Lượng của Trường', ''),
(34, '\"Tham gia công tác kiểm định khoa (trước và sau kh', ''),
(35, 'Cố vấn học tập', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhomgiangday`
--

CREATE TABLE `nhomgiangday` (
  `id_nhom_giang_day` int(11) NOT NULL,
  `ten_nhom_giang_day` varchar(50) DEFAULT NULL,
  `ghi_chu` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nhomgiangday`
--

INSERT INTO `nhomgiangday` (`id_nhom_giang_day`, `ten_nhom_giang_day`, `ghi_chu`) VALUES
(1, 'Lý thuyết', NULL),
(2, 'Thực hành', NULL),
(3, 'Lý thuyết + Thực hành', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phannhom`
--

CREATE TABLE `phannhom` (
  `id_phan_nhom` int(11) NOT NULL,
  `ten_phan_nhom` varchar(50) DEFAULT NULL,
  `cap_bac` int(11) DEFAULT NULL,
  `ghi_chu` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `phannhom`
--

INSERT INTO `phannhom` (`id_phan_nhom`, `ten_phan_nhom`, `cap_bac`, `ghi_chu`) VALUES
(0, 'Quản trị', 1, ''),
(1, 'Cán bộ khoa', 0, NULL),
(2, 'Giảng viên', 2, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phanquyen`
--

CREATE TABLE `phanquyen` (
  `id_phan_quyen` int(11) NOT NULL,
  `ten_phan_quyen` varchar(50) DEFAULT NULL,
  `cap_bac` int(11) NOT NULL DEFAULT 3,
  `ghi_chu` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `phanquyen`
--

INSERT INTO `phanquyen` (`id_phan_quyen`, `ten_phan_quyen`, `cap_bac`, `ghi_chu`) VALUES
(1, 'Admin', 1, ''),
(2, 'Manager', 2, ''),
(3, 'User', 3, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quydoi`
--

CREATE TABLE `quydoi` (
  `id_quy_doi` int(11) NOT NULL,
  `id_nhom_cong_viec` int(11) NOT NULL DEFAULT 0,
  `ma_cong_viec` int(11) NOT NULL DEFAULT 0,
  `ten_cong_viec` varchar(50) DEFAULT NULL,
  `dieu_kien` text DEFAULT NULL,
  `quy_doi_so_tiet` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `quydoi`
--

INSERT INTO `quydoi` (`id_quy_doi`, `id_nhom_cong_viec`, `ma_cong_viec`, `ten_cong_viec`, `dieu_kien`, `quy_doi_so_tiet`) VALUES
(5, 22, 0, 'Tự Luận', '', 1),
(6, 23, 0, 'Trắc nghiệm', '', 1.5),
(7, 23, 0, 'Coi thi học kỳ', '', 0.65),
(8, 24, 0, 'Chấm bài học kỳ', '', 0.0625),
(9, 25, 0, 'Chấm 1', '', 4),
(10, 25, 0, 'Chấm 2', '', 1.5),
(11, 26, 0, 'Chấm 1', '', 4),
(12, 26, 0, 'Chấm 2', '', 1),
(13, 27, 0, 'Hướng Dẫn Chấm', '', 12),
(14, 27, 0, 'Phản biện', '', 3),
(15, 28, 0, 'Chủ tịch hội đồng', '', 1.5),
(16, 28, 0, 'Thư Ký hội đồng', '', 1),
(17, 29, 0, 'Chấm 1', '', 6),
(18, 29, 0, 'Chấm 2', '', 1.5),
(19, 30, 0, 'Công tác dự giờ', '', 1),
(20, 31, 0, 'Công tác tuyển sinh', '', 2.5),
(21, 32, 0, 'Tổ trưởng', '', 14),
(22, 32, 0, 'Thành Viên', '', 10.5),
(23, 33, 0, 'Chủ tịch', '', 20),
(24, 33, 0, 'Phó chủ tịch', '', 15),
(25, 33, 0, 'Thư ký', '', 15),
(26, 33, 0, 'Thành viên', '', 10),
(27, 34, 0, 'Đóng góp vào công tác kiểm định', '', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sumcongviec`
--

CREATE TABLE `sumcongviec` (
  `id_sum_cong_viec` int(11) NOT NULL,
  `id_index` int(11) DEFAULT NULL,
  `id_giang_vien` int(11) DEFAULT NULL,
  `sum_so_tiet` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sumggnckh`
--

CREATE TABLE `sumggnckh` (
  `id_sum_gg_nckh` int(11) NOT NULL,
  `id_index` int(11) DEFAULT NULL,
  `id_giang_vien` int(11) DEFAULT NULL,
  `sum_so_tiet` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sumthanhtoan`
--

CREATE TABLE `sumthanhtoan` (
  `id_sum_thanh_toan` int(11) NOT NULL,
  `id_index` int(11) DEFAULT NULL,
  `id_giang_vien` int(11) DEFAULT NULL,
  `id_don_gia` int(11) DEFAULT NULL,
  `so_tiet` float DEFAULT NULL,
  `don_gia` float DEFAULT NULL,
  `thanh_tien` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sumthanhtoan`
--

INSERT INTO `sumthanhtoan` (`id_sum_thanh_toan`, `id_index`, `id_giang_vien`, `id_don_gia`, `so_tiet`, `don_gia`, `thanh_tien`) VALUES
(57, 2, 2, 17, 173.5, 95000, 16482500),
(58, 1, 2, 17, 263.125, 95000, 24996900);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id_tai_khoan` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `mat_khau` varchar(50) DEFAULT NULL,
  `ghi_chu` text DEFAULT NULL,
  `id_phan_quyen` int(11) DEFAULT NULL,
  `id_phan_nhom` int(11) DEFAULT NULL,
  `id_nguoi_dung` int(11) DEFAULT NULL,
  `trang_thai` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`id_tai_khoan`, `email`, `mat_khau`, `ghi_chu`, `id_phan_quyen`, `id_phan_nhom`, `id_nguoi_dung`, `trang_thai`) VALUES
(2, 'gv1@gmail.com', '123456', '2023-06-20 03:23:26', 3, 2, 1, 1),
(3, 'gv2@gmail.com', '123456', '2023-06-20 03:23:26', 3, 2, 2, 1),
(4, 'admin@gmail.com', '123456', NULL, 1, 0, 0, 1),
(5, 'gv3@gmail.com', 'giangvien3@3223', '2023-06-20 06:28:37', 3, 2, 7, 1),
(6, 'gv1@gmail.com', 'giangvien1@0706', '2023-06-20 09:07:06', 3, 2, 8, 1),
(7, 'gv2@gmail.com', 'giangvien2@0706', '2023-06-20 09:07:06', 3, 2, 9, 1),
(8, 'gv3@gamilc.om', 'gv3@0706', '2023-06-20 09:07:06', 3, 2, 10, 1),
(9, 'gv1@gmail.com', 'giangvien1@0706', '2023-06-20 09:07:06', 3, 2, 11, 1),
(10, 'gv2@gmail.com', 'giangvien2@0706', '2023-06-20 09:07:06', 3, 2, 12, 1),
(11, 'gv3@gamilc.om', 'gv3@0706', '2023-06-20 09:07:06', 3, 2, 13, 1),
(12, 'gv1@gmail.com', 'giangvien1@0706', '2023-06-20 09:07:06', 3, 2, 14, 1),
(13, 'gv2@gmail.com', 'giangvien2@0706', '2023-06-20 09:07:06', 3, 2, 15, 1),
(14, 'gv3@gamilc.om', 'gv3@0706', '2023-06-20 09:07:06', 3, 2, 16, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trinhdo`
--

CREATE TABLE `trinhdo` (
  `id_trinh_do` int(11) NOT NULL,
  `ten_trinh_do` varchar(50) DEFAULT NULL,
  `ghi_chu` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `trinhdo`
--

INSERT INTO `trinhdo` (`id_trinh_do`, `ten_trinh_do`, `ghi_chu`) VALUES
(1, 'Đại học', NULL),
(2, 'Thạc sĩ', NULL),
(3, 'Tiến sĩ', NULL),
(4, 'Phó giáo sư', NULL),
(5, 'Giáo sư', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bangke`
--
ALTER TABLE `bangke`
  ADD PRIMARY KEY (`id_bang_ke`) USING BTREE;

--
-- Chỉ mục cho bảng `bangthamchieu`
--
ALTER TABLE `bangthamchieu`
  ADD PRIMARY KEY (`id_bang_tham_chieu`) USING BTREE,
  ADD UNIQUE KEY `key` (`key_index`) USING BTREE;

--
-- Chỉ mục cho bảng `canbokhoa`
--
ALTER TABLE `canbokhoa`
  ADD PRIMARY KEY (`id_can_bo_khoa`) USING BTREE;

--
-- Chỉ mục cho bảng `congviec`
--
ALTER TABLE `congviec`
  ADD PRIMARY KEY (`id_cong_viec`) USING BTREE;

--
-- Chỉ mục cho bảng `dongia`
--
ALTER TABLE `dongia`
  ADD PRIMARY KEY (`id_don_gia`);

--
-- Chỉ mục cho bảng `giangday`
--
ALTER TABLE `giangday`
  ADD PRIMARY KEY (`id_giang_day`);

--
-- Chỉ mục cho bảng `giangvien`
--
ALTER TABLE `giangvien`
  ADD PRIMARY KEY (`id_giang_vien`) USING BTREE;

--
-- Chỉ mục cho bảng `indexcount`
--
ALTER TABLE `indexcount`
  ADD PRIMARY KEY (`id_index`);

--
-- Chỉ mục cho bảng `khoa`
--
ALTER TABLE `khoa`
  ADD PRIMARY KEY (`id_khoa`) USING BTREE;

--
-- Chỉ mục cho bảng `nckh`
--
ALTER TABLE `nckh`
  ADD PRIMARY KEY (`id_nckh`) USING BTREE;

--
-- Chỉ mục cho bảng `nhomcongviec`
--
ALTER TABLE `nhomcongviec`
  ADD PRIMARY KEY (`id_nhom_cong_viec`) USING BTREE;

--
-- Chỉ mục cho bảng `nhomgiangday`
--
ALTER TABLE `nhomgiangday`
  ADD PRIMARY KEY (`id_nhom_giang_day`) USING BTREE;

--
-- Chỉ mục cho bảng `phannhom`
--
ALTER TABLE `phannhom`
  ADD PRIMARY KEY (`id_phan_nhom`) USING BTREE;

--
-- Chỉ mục cho bảng `phanquyen`
--
ALTER TABLE `phanquyen`
  ADD PRIMARY KEY (`id_phan_quyen`) USING BTREE;

--
-- Chỉ mục cho bảng `quydoi`
--
ALTER TABLE `quydoi`
  ADD PRIMARY KEY (`id_quy_doi`) USING BTREE;

--
-- Chỉ mục cho bảng `sumcongviec`
--
ALTER TABLE `sumcongviec`
  ADD PRIMARY KEY (`id_sum_cong_viec`) USING BTREE;

--
-- Chỉ mục cho bảng `sumggnckh`
--
ALTER TABLE `sumggnckh`
  ADD PRIMARY KEY (`id_sum_gg_nckh`) USING BTREE;

--
-- Chỉ mục cho bảng `sumthanhtoan`
--
ALTER TABLE `sumthanhtoan`
  ADD PRIMARY KEY (`id_sum_thanh_toan`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id_tai_khoan`) USING BTREE;

--
-- Chỉ mục cho bảng `trinhdo`
--
ALTER TABLE `trinhdo`
  ADD PRIMARY KEY (`id_trinh_do`) USING BTREE;

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bangke`
--
ALTER TABLE `bangke`
  MODIFY `id_bang_ke` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT cho bảng `bangthamchieu`
--
ALTER TABLE `bangthamchieu`
  MODIFY `id_bang_tham_chieu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `canbokhoa`
--
ALTER TABLE `canbokhoa`
  MODIFY `id_can_bo_khoa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `congviec`
--
ALTER TABLE `congviec`
  MODIFY `id_cong_viec` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT cho bảng `dongia`
--
ALTER TABLE `dongia`
  MODIFY `id_don_gia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `giangday`
--
ALTER TABLE `giangday`
  MODIFY `id_giang_day` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `giangvien`
--
ALTER TABLE `giangvien`
  MODIFY `id_giang_vien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `indexcount`
--
ALTER TABLE `indexcount`
  MODIFY `id_index` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `khoa`
--
ALTER TABLE `khoa`
  MODIFY `id_khoa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `nckh`
--
ALTER TABLE `nckh`
  MODIFY `id_nckh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `nhomcongviec`
--
ALTER TABLE `nhomcongviec`
  MODIFY `id_nhom_cong_viec` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `nhomgiangday`
--
ALTER TABLE `nhomgiangday`
  MODIFY `id_nhom_giang_day` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `phannhom`
--
ALTER TABLE `phannhom`
  MODIFY `id_phan_nhom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `phanquyen`
--
ALTER TABLE `phanquyen`
  MODIFY `id_phan_quyen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `quydoi`
--
ALTER TABLE `quydoi`
  MODIFY `id_quy_doi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `sumcongviec`
--
ALTER TABLE `sumcongviec`
  MODIFY `id_sum_cong_viec` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `sumggnckh`
--
ALTER TABLE `sumggnckh`
  MODIFY `id_sum_gg_nckh` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `sumthanhtoan`
--
ALTER TABLE `sumthanhtoan`
  MODIFY `id_sum_thanh_toan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id_tai_khoan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `trinhdo`
--
ALTER TABLE `trinhdo`
  MODIFY `id_trinh_do` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
