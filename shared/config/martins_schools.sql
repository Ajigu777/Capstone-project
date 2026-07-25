-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2026 at 10:59 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `martins_schools`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `body` text NOT NULL,
  `posted_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `school_id`, `title`, `body`, `posted_by`, `created_at`) VALUES
(1, 1, 'School Resumption Notice', 'We are pleased to welcome all students back for the new academic session. Resumption is on Monday, 14th September 2026. Students should arrive before 8:00 AM in complete school uniform.', 0, '2026-07-17 01:45:46'),
(2, 1, 'Mid-Term Examination', 'The Mid-Term Examination will commence on Monday, 5th October 2026. Students are advised to complete all assignments and prepare adequately.', 0, '2026-07-17 01:45:46'),
(3, 1, 'PTA General Meeting', 'The Parents-Teachers Association meeting will hold on Saturday at 10:00 AM in the school hall. Parents are encouraged to attend.', 0, '2026-07-17 01:45:46'),
(4, 1, 'School Fees Reminder', 'Parents are kindly reminded to pay all outstanding school fees before the end of the current term to avoid any inconvenience.', 0, '2026-07-17 01:45:46'),
(5, 1, 'Inter-House Sports Competition', 'The Annual Inter-House Sports Competition will take place next Friday. Parents and guardians are invited to support their children.', 0, '2026-07-17 01:45:46'),
(6, 1, 'Holiday Notice', 'The school will proceed on a mid-term break this Friday. Academic activities will resume on the scheduled resumption date.', 0, '2026-07-17 01:45:46'),
(7, 1, 'Admission in Progress', 'Admission into Nursery, Primary and Secondary classes for the new academic session is currently ongoing. Interested parents should contact the admission office.', 0, '2026-07-17 01:45:46'),
(8, 1, 'Computer Club Registration', 'Registration for the Computer Club is now open. Interested students should register with the ICT coordinator before Friday.', 0, '2026-07-17 01:45:46'),
(9, 1, 'Outstanding Academic Performance', 'Congratulations to all students who performed excellently in the recently concluded examinations. Keep striving for excellence.', 0, '2026-07-17 01:45:46'),
(10, 1, 'Morning Assembly Reminder', 'All students are reminded that morning assembly begins promptly at 7:45 AM every school day. Students should arrive early.', 0, '2026-07-17 01:45:46'),
(11, 1, 'Library Week', 'The school library will host Library Week with reading competitions, quizzes and book exhibitions. Students are encouraged to participate.', 0, '2026-07-17 01:45:46'),
(12, 1, 'Science Fair', 'The Annual Science Fair will hold next month. Students interested in presenting projects should submit their proposals to the Science Department.', 0, '2026-07-17 01:45:46'),
(13, 1, 'Career Day', 'Career Day will feature professionals from various industries to inspire students about future career opportunities.', 0, '2026-07-17 01:45:46'),
(14, 1, 'Health Awareness Programme', 'A free medical check-up and health awareness programme will be conducted for all students this week.', 0, '2026-07-17 01:45:46'),
(15, 1, 'Independence Day Celebration', 'The school will commemorate Nigeria\'s Independence Day with cultural displays, debates and educational activities.', 0, '2026-07-17 01:45:46'),
(16, 2, 'Term 1 Exam Timetable Released', 'The Term 1 examination timetable has been posted on the noticeboard and shared with all class teachers. Please confirm your subject slots with the exams office by Friday.', NULL, '2026-07-10 16:00:00'),
(17, 2, 'Staff Meeting - All Departments', 'A mandatory staff meeting for all department heads will hold this Thursday at 2:00 PM in the staff room. Please bring your term progress reports.', NULL, '2026-07-08 18:30:00'),
(18, 2, 'Reminder: Submit Continuous Assessment Scores', 'All teachers are reminded to submit CA1 and CA2 scores via the Results module before the end of this week.', NULL, '2026-07-03 22:00:00'),
(19, 2, 'Inter-House Sports Volunteers Needed', 'We are looking for staff volunteers to help supervise the upcoming inter-house sports competition. Please see the admin office if you are available.', NULL, '2026-06-28 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `class_id` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  `status` enum('present','absent','late') NOT NULL,
  `marked_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `student_id`, `class_id`, `date`, `status`, `marked_by`) VALUES
(237, 144, 6, '2026-11-26', 'present', 1),
(238, 145, 6, '2026-11-26', 'present', 1),
(239, 146, 6, '2026-11-26', 'present', 1),
(240, 147, 6, '2026-11-26', 'present', 1),
(241, 132, 1, '2026-07-09', 'absent', NULL),
(242, 133, 1, '2026-07-09', 'present', NULL),
(243, 134, 1, '2026-07-09', 'present', NULL),
(244, 135, 1, '2026-07-09', 'late', NULL),
(245, 136, 2, '2026-07-09', 'present', NULL),
(246, 137, 2, '2026-07-09', 'present', NULL),
(247, 138, 2, '2026-07-09', 'present', NULL),
(248, 139, 2, '2026-07-09', 'present', NULL),
(249, 156, 3, '2026-07-09', 'present', NULL),
(250, 157, 3, '2026-07-09', 'present', NULL),
(251, 158, 3, '2026-07-09', 'present', NULL),
(252, 159, 3, '2026-07-09', 'present', NULL),
(253, 140, 5, '2026-07-09', 'late', NULL),
(254, 141, 5, '2026-07-09', 'present', NULL),
(255, 142, 5, '2026-07-09', 'present', NULL),
(256, 143, 5, '2026-07-09', 'absent', NULL),
(257, 144, 6, '2026-07-09', 'present', NULL),
(258, 145, 6, '2026-07-09', 'late', NULL),
(259, 146, 6, '2026-07-09', 'present', NULL),
(260, 147, 6, '2026-07-09', 'present', NULL),
(261, 152, 7, '2026-07-09', 'present', NULL),
(262, 153, 7, '2026-07-09', 'present', NULL),
(263, 154, 7, '2026-07-09', 'absent', NULL),
(264, 155, 7, '2026-07-09', 'late', NULL),
(265, 160, 8, '2026-07-09', 'late', NULL),
(266, 161, 8, '2026-07-09', 'present', NULL),
(267, 162, 8, '2026-07-09', 'present', NULL),
(268, 163, 8, '2026-07-09', 'present', NULL),
(269, 164, 9, '2026-07-09', 'present', NULL),
(270, 165, 9, '2026-07-09', 'absent', NULL),
(271, 166, 9, '2026-07-09', 'present', NULL),
(272, 167, 9, '2026-07-09', 'present', NULL),
(273, 148, 12, '2026-07-09', 'present', NULL),
(274, 149, 12, '2026-07-09', 'present', NULL),
(275, 150, 12, '2026-07-09', 'late', NULL),
(276, 151, 12, '2026-07-09', 'present', NULL),
(277, 168, 13, '2026-07-09', 'present', NULL),
(278, 169, 13, '2026-07-09', 'present', NULL),
(279, 170, 13, '2026-07-09', 'late', NULL),
(280, 171, 13, '2026-07-09', 'present', NULL),
(281, 172, 14, '2026-07-09', 'present', NULL),
(282, 173, 14, '2026-07-09', 'present', NULL),
(283, 174, 14, '2026-07-09', 'present', NULL),
(284, 175, 14, '2026-07-09', 'late', NULL),
(285, 176, 15, '2026-07-09', 'absent', NULL),
(286, 177, 15, '2026-07-09', 'present', NULL),
(287, 178, 15, '2026-07-09', 'present', NULL),
(288, 179, 15, '2026-07-09', 'present', NULL),
(304, 132, 1, '2026-07-10', 'late', NULL),
(305, 133, 1, '2026-07-10', 'present', NULL),
(306, 134, 1, '2026-07-10', 'present', NULL),
(307, 135, 1, '2026-07-10', 'present', NULL),
(308, 136, 2, '2026-07-10', 'present', NULL),
(309, 137, 2, '2026-07-10', 'present', NULL),
(310, 138, 2, '2026-07-10', 'late', NULL),
(311, 139, 2, '2026-07-10', 'present', NULL),
(312, 156, 3, '2026-07-10', 'absent', NULL),
(313, 157, 3, '2026-07-10', 'present', NULL),
(314, 158, 3, '2026-07-10', 'present', NULL),
(315, 159, 3, '2026-07-10', 'present', NULL),
(316, 140, 5, '2026-07-10', 'present', NULL),
(317, 141, 5, '2026-07-10', 'present', NULL),
(318, 142, 5, '2026-07-10', 'present', NULL),
(319, 143, 5, '2026-07-10', 'absent', NULL),
(320, 144, 6, '2026-07-10', 'late', NULL),
(321, 145, 6, '2026-07-10', 'present', NULL),
(322, 146, 6, '2026-07-10', 'present', NULL),
(323, 147, 6, '2026-07-10', 'present', NULL),
(324, 152, 7, '2026-07-10', 'present', NULL),
(325, 153, 7, '2026-07-10', 'present', NULL),
(326, 154, 7, '2026-07-10', 'present', NULL),
(327, 155, 7, '2026-07-10', 'present', NULL),
(328, 160, 8, '2026-07-10', 'present', NULL),
(329, 161, 8, '2026-07-10', 'present', NULL),
(330, 162, 8, '2026-07-10', 'late', NULL),
(331, 163, 8, '2026-07-10', 'present', NULL),
(332, 164, 9, '2026-07-10', 'present', NULL),
(333, 165, 9, '2026-07-10', 'present', NULL),
(334, 166, 9, '2026-07-10', 'present', NULL),
(335, 167, 9, '2026-07-10', 'present', NULL),
(336, 148, 12, '2026-07-10', 'present', NULL),
(337, 149, 12, '2026-07-10', 'present', NULL),
(338, 150, 12, '2026-07-10', 'late', NULL),
(339, 151, 12, '2026-07-10', 'present', NULL),
(340, 168, 13, '2026-07-10', 'late', NULL),
(341, 169, 13, '2026-07-10', 'absent', NULL),
(342, 170, 13, '2026-07-10', 'present', NULL),
(343, 171, 13, '2026-07-10', 'present', NULL),
(344, 172, 14, '2026-07-10', 'present', NULL),
(345, 173, 14, '2026-07-10', 'present', NULL),
(346, 174, 14, '2026-07-10', 'late', NULL),
(347, 175, 14, '2026-07-10', 'present', NULL),
(348, 176, 15, '2026-07-10', 'present', NULL),
(349, 177, 15, '2026-07-10', 'present', NULL),
(350, 178, 15, '2026-07-10', 'present', NULL),
(351, 179, 15, '2026-07-10', 'present', NULL),
(367, 132, 1, '2026-07-11', 'late', NULL),
(368, 133, 1, '2026-07-11', 'present', NULL),
(369, 134, 1, '2026-07-11', 'present', NULL),
(370, 135, 1, '2026-07-11', 'absent', NULL),
(371, 136, 2, '2026-07-11', 'late', NULL),
(372, 137, 2, '2026-07-11', 'present', NULL),
(373, 138, 2, '2026-07-11', 'present', NULL),
(374, 139, 2, '2026-07-11', 'present', NULL),
(375, 156, 3, '2026-07-11', 'late', NULL),
(376, 157, 3, '2026-07-11', 'present', NULL),
(377, 158, 3, '2026-07-11', 'present', NULL),
(378, 159, 3, '2026-07-11', 'present', NULL),
(379, 140, 5, '2026-07-11', 'late', NULL),
(380, 141, 5, '2026-07-11', 'present', NULL),
(381, 142, 5, '2026-07-11', 'present', NULL),
(382, 143, 5, '2026-07-11', 'present', NULL),
(383, 144, 6, '2026-07-11', 'absent', NULL),
(384, 145, 6, '2026-07-11', 'present', NULL),
(385, 146, 6, '2026-07-11', 'present', NULL),
(386, 147, 6, '2026-07-11', 'present', NULL),
(387, 152, 7, '2026-07-11', 'late', NULL),
(388, 153, 7, '2026-07-11', 'absent', NULL),
(389, 154, 7, '2026-07-11', 'present', NULL),
(390, 155, 7, '2026-07-11', 'present', NULL),
(391, 160, 8, '2026-07-11', 'late', NULL),
(392, 161, 8, '2026-07-11', 'present', NULL),
(393, 162, 8, '2026-07-11', 'absent', NULL),
(394, 163, 8, '2026-07-11', 'present', NULL),
(395, 164, 9, '2026-07-11', 'late', NULL),
(396, 165, 9, '2026-07-11', 'present', NULL),
(397, 166, 9, '2026-07-11', 'present', NULL),
(398, 167, 9, '2026-07-11', 'present', NULL),
(399, 148, 12, '2026-07-11', 'late', NULL),
(400, 149, 12, '2026-07-11', 'present', NULL),
(401, 150, 12, '2026-07-11', 'present', NULL),
(402, 151, 12, '2026-07-11', 'present', NULL),
(403, 168, 13, '2026-07-11', 'late', NULL),
(404, 169, 13, '2026-07-11', 'present', NULL),
(405, 170, 13, '2026-07-11', 'present', NULL),
(406, 171, 13, '2026-07-11', 'absent', NULL),
(407, 172, 14, '2026-07-11', 'late', NULL),
(408, 173, 14, '2026-07-11', 'present', NULL),
(409, 174, 14, '2026-07-11', 'present', NULL),
(410, 175, 14, '2026-07-11', 'present', NULL),
(411, 176, 15, '2026-07-11', 'late', NULL),
(412, 177, 15, '2026-07-11', 'present', NULL),
(413, 178, 15, '2026-07-11', 'present', NULL),
(414, 179, 15, '2026-07-11', 'present', NULL),
(430, 132, 1, '2026-07-12', 'present', NULL),
(431, 133, 1, '2026-07-12', 'absent', NULL),
(432, 134, 1, '2026-07-12', 'present', NULL),
(433, 135, 1, '2026-07-12', 'late', NULL),
(434, 136, 2, '2026-07-12', 'present', NULL),
(435, 137, 2, '2026-07-12', 'present', NULL),
(436, 138, 2, '2026-07-12', 'present', NULL),
(437, 139, 2, '2026-07-12', 'present', NULL),
(438, 156, 3, '2026-07-12', 'present', NULL),
(439, 157, 3, '2026-07-12', 'present', NULL),
(440, 158, 3, '2026-07-12', 'present', NULL),
(441, 159, 3, '2026-07-12', 'present', NULL),
(442, 140, 5, '2026-07-12', 'absent', NULL),
(443, 141, 5, '2026-07-12', 'present', NULL),
(444, 142, 5, '2026-07-12', 'present', NULL),
(445, 143, 5, '2026-07-12', 'present', NULL),
(446, 144, 6, '2026-07-12', 'present', NULL),
(447, 145, 6, '2026-07-12', 'late', NULL),
(448, 146, 6, '2026-07-12', 'present', NULL),
(449, 147, 6, '2026-07-12', 'absent', NULL),
(450, 152, 7, '2026-07-12', 'present', NULL),
(451, 153, 7, '2026-07-12', 'present', NULL),
(452, 154, 7, '2026-07-12', 'absent', NULL),
(453, 155, 7, '2026-07-12', 'late', NULL),
(454, 160, 8, '2026-07-12', 'late', NULL),
(455, 161, 8, '2026-07-12', 'absent', NULL),
(456, 162, 8, '2026-07-12', 'present', NULL),
(457, 163, 8, '2026-07-12', 'present', NULL),
(458, 164, 9, '2026-07-12', 'present', NULL),
(459, 165, 9, '2026-07-12', 'late', NULL),
(460, 166, 9, '2026-07-12', 'present', NULL),
(461, 167, 9, '2026-07-12', 'present', NULL),
(462, 148, 12, '2026-07-12', 'present', NULL),
(463, 149, 12, '2026-07-12', 'present', NULL),
(464, 150, 12, '2026-07-12', 'late', NULL),
(465, 151, 12, '2026-07-12', 'present', NULL),
(466, 168, 13, '2026-07-12', 'absent', NULL),
(467, 169, 13, '2026-07-12', 'present', NULL),
(468, 170, 13, '2026-07-12', 'late', NULL),
(469, 171, 13, '2026-07-12', 'present', NULL),
(470, 172, 14, '2026-07-12', 'present', NULL),
(471, 173, 14, '2026-07-12', 'present', NULL),
(472, 174, 14, '2026-07-12', 'present', NULL),
(473, 175, 14, '2026-07-12', 'absent', NULL),
(474, 176, 15, '2026-07-12', 'present', NULL),
(475, 177, 15, '2026-07-12', 'present', NULL),
(476, 178, 15, '2026-07-12', 'present', NULL),
(477, 179, 15, '2026-07-12', 'present', NULL),
(493, 132, 1, '2026-07-13', 'late', NULL),
(494, 133, 1, '2026-07-13', 'present', NULL),
(495, 134, 1, '2026-07-13', 'present', NULL),
(496, 135, 1, '2026-07-13', 'late', NULL),
(497, 136, 2, '2026-07-13', 'absent', NULL),
(498, 137, 2, '2026-07-13', 'present', NULL),
(499, 138, 2, '2026-07-13', 'late', NULL),
(500, 139, 2, '2026-07-13', 'present', NULL),
(501, 156, 3, '2026-07-13', 'late', NULL),
(502, 157, 3, '2026-07-13', 'present', NULL),
(503, 158, 3, '2026-07-13', 'present', NULL),
(504, 159, 3, '2026-07-13', 'late', NULL),
(505, 140, 5, '2026-07-13', 'present', NULL),
(506, 141, 5, '2026-07-13', 'late', NULL),
(507, 142, 5, '2026-07-13', 'present', NULL),
(508, 143, 5, '2026-07-13', 'present', NULL),
(509, 144, 6, '2026-07-13', 'absent', NULL),
(510, 145, 6, '2026-07-13', 'present', NULL),
(511, 146, 6, '2026-07-13', 'present', NULL),
(512, 147, 6, '2026-07-13', 'late', NULL),
(513, 152, 7, '2026-07-13', 'absent', NULL),
(514, 153, 7, '2026-07-13', 'late', NULL),
(515, 154, 7, '2026-07-13', 'present', NULL),
(516, 155, 7, '2026-07-13', 'present', NULL),
(517, 160, 8, '2026-07-13', 'absent', NULL),
(518, 161, 8, '2026-07-13', 'present', NULL),
(519, 162, 8, '2026-07-13', 'late', NULL),
(520, 163, 8, '2026-07-13', 'present', NULL),
(521, 164, 9, '2026-07-13', 'present', NULL),
(522, 165, 9, '2026-07-13', 'late', NULL),
(523, 166, 9, '2026-07-13', 'present', NULL),
(524, 167, 9, '2026-07-13', 'present', NULL),
(525, 148, 12, '2026-07-13', 'present', NULL),
(526, 149, 12, '2026-07-13', 'present', NULL),
(527, 150, 12, '2026-07-13', 'late', NULL),
(528, 151, 12, '2026-07-13', 'present', NULL),
(529, 168, 13, '2026-07-13', 'absent', NULL),
(530, 169, 13, '2026-07-13', 'present', NULL),
(531, 170, 13, '2026-07-13', 'present', NULL),
(532, 171, 13, '2026-07-13', 'late', NULL),
(533, 172, 14, '2026-07-13', 'present', NULL),
(534, 173, 14, '2026-07-13', 'present', NULL),
(535, 174, 14, '2026-07-13', 'late', NULL),
(536, 175, 14, '2026-07-13', 'present', NULL),
(537, 176, 15, '2026-07-13', 'absent', NULL),
(538, 177, 15, '2026-07-13', 'late', NULL),
(539, 178, 15, '2026-07-13', 'present', NULL),
(540, 179, 15, '2026-07-13', 'present', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `level` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `school_id`, `name`, `level`) VALUES
(1, 1, 'Primary 1', 'Lower Primary'),
(2, 1, 'Primary 2', 'Lower Primary'),
(3, 2, 'JSS 1', 'Junior Secondary'),
(5, 1, 'Primary 3', 'Lower Primary'),
(6, 1, 'Primary 4', 'Higher Primary'),
(7, 1, 'Primary 6', 'Higher Primary'),
(8, 2, 'JSS 2', 'Junior Secondary'),
(9, 2, 'JSS 3', 'Junior Secondary'),
(12, 1, 'Primary 5', 'Upper Primary'),
(13, 2, 'SS 1', 'Senior Secondary'),
(14, 2, 'SS 2', 'Senior Secondary'),
(15, 2, 'SS 3', 'Senior Secondary');

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `term` varchar(20) DEFAULT NULL,
  `session` varchar(20) DEFAULT NULL,
  `amount_due` decimal(10,2) NOT NULL,
  `amount_paid` decimal(10,2) DEFAULT 0.00,
  `status` enum('unpaid','partial','paid') DEFAULT 'unpaid'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`id`, `student_id`, `term`, `session`, `amount_due`, `amount_paid`, `status`) VALUES
(20, 132, 'Term 1', '2025/2026', 50000.00, 50000.00, 'paid'),
(21, 133, 'Term 1', '2025/2026', 50000.00, 25000.00, 'partial'),
(22, 134, 'Term 1', '2025/2026', 50000.00, 0.00, 'unpaid'),
(23, 135, 'Term 1', '2025/2026', 50000.00, 50000.00, 'paid'),
(24, 136, 'Term 1', '2025/2026', 50000.00, 25000.00, 'partial'),
(25, 137, 'Term 1', '2025/2026', 50000.00, 0.00, 'unpaid'),
(26, 138, 'Term 1', '2025/2026', 50000.00, 50000.00, 'paid'),
(27, 139, 'Term 1', '2025/2026', 50000.00, 25000.00, 'partial'),
(28, 140, 'Term 1', '2025/2026', 50000.00, 0.00, 'unpaid'),
(29, 141, 'Term 1', '2025/2026', 50000.00, 50000.00, 'paid'),
(30, 142, 'Term 1', '2025/2026', 50000.00, 25000.00, 'partial'),
(31, 143, 'Term 1', '2025/2026', 50000.00, 0.00, 'unpaid'),
(32, 144, 'Term 1', '2025/2026', 50000.00, 50000.00, 'paid'),
(33, 145, 'Term 1', '2025/2026', 50000.00, 25000.00, 'partial'),
(34, 146, 'Term 1', '2025/2026', 50000.00, 0.00, 'unpaid'),
(35, 147, 'Term 1', '2025/2026', 50000.00, 50000.00, 'paid'),
(36, 148, 'Term 1', '2025/2026', 50000.00, 25000.00, 'partial'),
(37, 149, 'Term 1', '2025/2026', 50000.00, 0.00, 'unpaid'),
(38, 150, 'Term 1', '2025/2026', 50000.00, 50000.00, 'paid'),
(39, 151, 'Term 1', '2025/2026', 50000.00, 25000.00, 'partial'),
(40, 152, 'Term 1', '2025/2026', 50000.00, 0.00, 'unpaid'),
(41, 153, 'Term 1', '2025/2026', 50000.00, 50000.00, 'paid'),
(42, 154, 'Term 1', '2025/2026', 50000.00, 25000.00, 'partial'),
(43, 155, 'Term 1', '2025/2026', 50000.00, 0.00, 'unpaid'),
(44, 156, 'Term 1', '2025/2026', 50000.00, 50000.00, 'paid'),
(45, 157, 'Term 1', '2025/2026', 50000.00, 25000.00, 'partial'),
(46, 158, 'Term 1', '2025/2026', 50000.00, 0.00, 'unpaid'),
(47, 159, 'Term 1', '2025/2026', 50000.00, 50000.00, 'paid'),
(48, 160, 'Term 1', '2025/2026', 50000.00, 25000.00, 'partial'),
(49, 161, 'Term 1', '2025/2026', 50000.00, 0.00, 'unpaid'),
(50, 162, 'Term 1', '2025/2026', 50000.00, 50000.00, 'paid'),
(51, 163, 'Term 1', '2025/2026', 50000.00, 25000.00, 'partial'),
(52, 164, 'Term 1', '2025/2026', 50000.00, 0.00, 'unpaid'),
(53, 165, 'Term 1', '2025/2026', 50000.00, 50000.00, 'paid'),
(54, 166, 'Term 1', '2025/2026', 50000.00, 25000.00, 'partial'),
(55, 167, 'Term 1', '2025/2026', 50000.00, 0.00, 'unpaid'),
(56, 168, 'Term 1', '2025/2026', 50000.00, 50000.00, 'paid'),
(57, 169, 'Term 1', '2025/2026', 50000.00, 25000.00, 'partial'),
(58, 170, 'Term 1', '2025/2026', 50000.00, 0.00, 'unpaid'),
(59, 171, 'Term 1', '2025/2026', 50000.00, 50000.00, 'paid'),
(60, 172, 'Term 1', '2025/2026', 50000.00, 25000.00, 'partial'),
(61, 173, 'Term 1', '2025/2026', 50000.00, 0.00, 'unpaid'),
(62, 174, 'Term 1', '2025/2026', 50000.00, 50000.00, 'paid'),
(63, 175, 'Term 1', '2025/2026', 50000.00, 25000.00, 'partial'),
(64, 176, 'Term 1', '2025/2026', 50000.00, 0.00, 'unpaid'),
(65, 177, 'Term 1', '2025/2026', 50000.00, 50000.00, 'paid'),
(66, 178, 'Term 1', '2025/2026', 50000.00, 25000.00, 'partial'),
(67, 179, 'Term 1', '2025/2026', 50000.00, 0.00, 'unpaid');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `caption` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `news_events`
--

CREATE TABLE `news_events` (
  `id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `body` text DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `published_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `news_events`
--

INSERT INTO `news_events` (`id`, `school_id`, `title`, `body`, `image_path`, `published_at`) VALUES
(1, 1, 'Term 1 Resumption Date Confirmed', 'Crestview Primary School will resume for Term 1 of the 2026/2027 session on the second Monday of September. Please ensure all admission paperwork is completed before resumption.', NULL, '2026-07-12 16:00:00'),
(2, 1, 'Parent-Teacher Meeting Scheduled', 'Our termly Parent-Teacher meeting will hold at the school hall. This is a great opportunity to discuss your child\'s progress with their class teacher.', NULL, '2026-06-28 17:00:00'),
(3, 2, 'Term 1 Resumption Date Confirmed', 'Horizon Secondary School will resume for Term 1 of the 2026/2027 session on the second Monday of September. New JSS1 and SSS1 students should report a day earlier for orientation.', NULL, '2026-07-12 16:00:00'),
(4, 2, 'Career Guidance Week Announced', 'Horizon will host a Career Guidance Week for SSS2 and SSS3 students next term, featuring guest speakers from various industries and university representatives.', NULL, '2026-06-28 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `term` varchar(20) DEFAULT NULL,
  `session` varchar(20) DEFAULT NULL,
  `score` decimal(5,2) DEFAULT NULL,
  `grade` varchar(5) DEFAULT NULL,
  `entered_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `student_id`, `subject`, `term`, `session`, `score`, `grade`, `entered_by`) VALUES
(31, 132, 'Mathematics', 'Term 1', '2025/2026', 74.00, 'B', NULL),
(32, 133, 'Mathematics', 'Term 1', '2025/2026', 81.00, 'A', NULL),
(33, 134, 'Mathematics', 'Term 1', '2025/2026', 88.00, 'A', NULL),
(34, 135, 'Mathematics', 'Term 1', '2025/2026', 95.00, 'A', NULL),
(35, 136, 'Mathematics', 'Term 1', '2025/2026', 52.00, 'D', NULL),
(36, 137, 'Mathematics', 'Term 1', '2025/2026', 59.00, 'D', NULL),
(37, 138, 'Mathematics', 'Term 1', '2025/2026', 66.00, 'C', NULL),
(38, 139, 'Mathematics', 'Term 1', '2025/2026', 73.00, 'B', NULL),
(39, 140, 'Mathematics', 'Term 1', '2025/2026', 80.00, 'A', NULL),
(40, 141, 'Mathematics', 'Term 1', '2025/2026', 87.00, 'A', NULL),
(41, 142, 'Mathematics', 'Term 1', '2025/2026', 94.00, 'A', NULL),
(42, 143, 'Mathematics', 'Term 1', '2025/2026', 51.00, 'D', NULL),
(43, 144, 'Mathematics', 'Term 1', '2025/2026', 58.00, 'D', NULL),
(44, 145, 'Mathematics', 'Term 1', '2025/2026', 65.00, 'C', NULL),
(45, 146, 'Mathematics', 'Term 1', '2025/2026', 72.00, 'B', NULL),
(46, 147, 'Mathematics', 'Term 1', '2025/2026', 79.00, 'B', NULL),
(47, 148, 'Mathematics', 'Term 1', '2025/2026', 86.00, 'A', NULL),
(48, 149, 'Mathematics', 'Term 1', '2025/2026', 93.00, 'A', NULL),
(49, 150, 'Mathematics', 'Term 1', '2025/2026', 50.00, 'D', NULL),
(50, 151, 'Mathematics', 'Term 1', '2025/2026', 57.00, 'D', NULL),
(51, 152, 'Mathematics', 'Term 1', '2025/2026', 64.00, 'C', NULL),
(52, 153, 'Mathematics', 'Term 1', '2025/2026', 71.00, 'B', NULL),
(53, 154, 'Mathematics', 'Term 1', '2025/2026', 78.00, 'B', NULL),
(54, 155, 'Mathematics', 'Term 1', '2025/2026', 85.00, 'A', NULL),
(55, 156, 'Mathematics', 'Term 1', '2025/2026', 92.00, 'A', NULL),
(56, 157, 'Mathematics', 'Term 1', '2025/2026', 99.00, 'A', NULL),
(57, 158, 'Mathematics', 'Term 1', '2025/2026', 56.00, 'D', NULL),
(58, 159, 'Mathematics', 'Term 1', '2025/2026', 63.00, 'C', NULL),
(59, 160, 'Mathematics', 'Term 1', '2025/2026', 70.00, 'B', NULL),
(60, 161, 'Mathematics', 'Term 1', '2025/2026', 77.00, 'B', NULL),
(61, 162, 'Mathematics', 'Term 1', '2025/2026', 84.00, 'A', NULL),
(62, 163, 'Mathematics', 'Term 1', '2025/2026', 91.00, 'A', NULL),
(63, 164, 'Mathematics', 'Term 1', '2025/2026', 98.00, 'A', NULL),
(64, 165, 'Mathematics', 'Term 1', '2025/2026', 55.00, 'D', NULL),
(65, 166, 'Mathematics', 'Term 1', '2025/2026', 62.00, 'C', NULL),
(66, 167, 'Mathematics', 'Term 1', '2025/2026', 69.00, 'C', NULL),
(67, 168, 'Mathematics', 'Term 1', '2025/2026', 76.00, 'B', NULL),
(68, 169, 'Mathematics', 'Term 1', '2025/2026', 83.00, 'A', NULL),
(69, 170, 'Mathematics', 'Term 1', '2025/2026', 90.00, 'A', NULL),
(70, 171, 'Mathematics', 'Term 1', '2025/2026', 97.00, 'A', NULL),
(71, 172, 'Mathematics', 'Term 1', '2025/2026', 54.00, 'D', NULL),
(72, 173, 'Mathematics', 'Term 1', '2025/2026', 61.00, 'C', NULL),
(73, 174, 'Mathematics', 'Term 1', '2025/2026', 68.00, 'C', NULL),
(74, 175, 'Mathematics', 'Term 1', '2025/2026', 75.00, 'B', NULL),
(75, 176, 'Mathematics', 'Term 1', '2025/2026', 82.00, 'A', NULL),
(76, 177, 'Mathematics', 'Term 1', '2025/2026', 89.00, 'A', NULL),
(77, 178, 'Mathematics', 'Term 1', '2025/2026', 96.00, 'A', NULL),
(78, 179, 'Mathematics', 'Term 1', '2025/2026', 53.00, 'D', NULL),
(94, 132, 'English Language', 'Term 1', '2025/2026', 67.00, 'C', NULL),
(95, 133, 'English Language', 'Term 1', '2025/2026', 78.00, 'B', NULL),
(96, 134, 'English Language', 'Term 1', '2025/2026', 89.00, 'A', NULL),
(97, 135, 'English Language', 'Term 1', '2025/2026', 45.00, 'F', NULL),
(98, 136, 'English Language', 'Term 1', '2025/2026', 56.00, 'D', NULL),
(99, 137, 'English Language', 'Term 1', '2025/2026', 67.00, 'C', NULL),
(100, 138, 'English Language', 'Term 1', '2025/2026', 78.00, 'B', NULL),
(101, 139, 'English Language', 'Term 1', '2025/2026', 89.00, 'A', NULL),
(102, 140, 'English Language', 'Term 1', '2025/2026', 45.00, 'F', NULL),
(103, 141, 'English Language', 'Term 1', '2025/2026', 56.00, 'D', NULL),
(104, 142, 'English Language', 'Term 1', '2025/2026', 67.00, 'C', NULL),
(105, 143, 'English Language', 'Term 1', '2025/2026', 78.00, 'B', NULL),
(106, 144, 'English Language', 'Term 1', '2025/2026', 89.00, 'A', NULL),
(107, 145, 'English Language', 'Term 1', '2025/2026', 45.00, 'F', NULL),
(108, 146, 'English Language', 'Term 1', '2025/2026', 56.00, 'D', NULL),
(109, 147, 'English Language', 'Term 1', '2025/2026', 67.00, 'C', NULL),
(110, 148, 'English Language', 'Term 1', '2025/2026', 78.00, 'B', NULL),
(111, 149, 'English Language', 'Term 1', '2025/2026', 89.00, 'A', NULL),
(112, 150, 'English Language', 'Term 1', '2025/2026', 45.00, 'F', NULL),
(113, 151, 'English Language', 'Term 1', '2025/2026', 56.00, 'D', NULL),
(114, 152, 'English Language', 'Term 1', '2025/2026', 67.00, 'C', NULL),
(115, 153, 'English Language', 'Term 1', '2025/2026', 78.00, 'B', NULL),
(116, 154, 'English Language', 'Term 1', '2025/2026', 89.00, 'A', NULL),
(117, 155, 'English Language', 'Term 1', '2025/2026', 45.00, 'F', NULL),
(118, 156, 'English Language', 'Term 1', '2025/2026', 56.00, 'D', NULL),
(119, 157, 'English Language', 'Term 1', '2025/2026', 67.00, 'C', NULL),
(120, 158, 'English Language', 'Term 1', '2025/2026', 78.00, 'B', NULL),
(121, 159, 'English Language', 'Term 1', '2025/2026', 89.00, 'A', NULL),
(122, 160, 'English Language', 'Term 1', '2025/2026', 45.00, 'F', NULL),
(123, 161, 'English Language', 'Term 1', '2025/2026', 56.00, 'D', NULL),
(124, 162, 'English Language', 'Term 1', '2025/2026', 67.00, 'C', NULL),
(125, 163, 'English Language', 'Term 1', '2025/2026', 78.00, 'B', NULL),
(126, 164, 'English Language', 'Term 1', '2025/2026', 89.00, 'A', NULL),
(127, 165, 'English Language', 'Term 1', '2025/2026', 45.00, 'F', NULL),
(128, 166, 'English Language', 'Term 1', '2025/2026', 56.00, 'D', NULL),
(129, 167, 'English Language', 'Term 1', '2025/2026', 67.00, 'C', NULL),
(130, 168, 'English Language', 'Term 1', '2025/2026', 78.00, 'B', NULL),
(131, 169, 'English Language', 'Term 1', '2025/2026', 89.00, 'A', NULL),
(132, 170, 'English Language', 'Term 1', '2025/2026', 45.00, 'F', NULL),
(133, 171, 'English Language', 'Term 1', '2025/2026', 56.00, 'D', NULL),
(134, 172, 'English Language', 'Term 1', '2025/2026', 67.00, 'C', NULL),
(135, 173, 'English Language', 'Term 1', '2025/2026', 78.00, 'B', NULL),
(136, 174, 'English Language', 'Term 1', '2025/2026', 89.00, 'A', NULL),
(137, 175, 'English Language', 'Term 1', '2025/2026', 45.00, 'F', NULL),
(138, 176, 'English Language', 'Term 1', '2025/2026', 56.00, 'D', NULL),
(139, 177, 'English Language', 'Term 1', '2025/2026', 67.00, 'C', NULL),
(140, 178, 'English Language', 'Term 1', '2025/2026', 78.00, 'B', NULL),
(141, 179, 'English Language', 'Term 1', '2025/2026', 89.00, 'A', NULL),
(157, 132, 'Basic Science', 'Term 1', '2025/2026', 76.00, 'B', NULL),
(158, 133, 'Basic Science', 'Term 1', '2025/2026', 89.00, 'A', NULL),
(159, 134, 'Basic Science', 'Term 1', '2025/2026', 42.00, 'F', NULL),
(160, 135, 'Basic Science', 'Term 1', '2025/2026', 55.00, 'D', NULL),
(161, 136, 'Basic Science', 'Term 1', '2025/2026', 68.00, 'C', NULL),
(162, 137, 'Basic Science', 'Term 1', '2025/2026', 81.00, 'A', NULL),
(163, 138, 'Basic Science', 'Term 1', '2025/2026', 94.00, 'A', NULL),
(164, 139, 'Basic Science', 'Term 1', '2025/2026', 47.00, 'F', NULL),
(165, 140, 'Basic Science', 'Term 1', '2025/2026', 60.00, 'C', NULL),
(166, 141, 'Basic Science', 'Term 1', '2025/2026', 73.00, 'B', NULL),
(167, 142, 'Basic Science', 'Term 1', '2025/2026', 86.00, 'A', NULL),
(168, 143, 'Basic Science', 'Term 1', '2025/2026', 99.00, 'A', NULL),
(169, 144, 'Basic Science', 'Term 1', '2025/2026', 52.00, 'D', NULL),
(170, 145, 'Basic Science', 'Term 1', '2025/2026', 65.00, 'C', NULL),
(171, 146, 'Basic Science', 'Term 1', '2025/2026', 78.00, 'B', NULL),
(172, 147, 'Basic Science', 'Term 1', '2025/2026', 91.00, 'A', NULL),
(173, 148, 'Basic Science', 'Term 1', '2025/2026', 44.00, 'F', NULL),
(174, 149, 'Basic Science', 'Term 1', '2025/2026', 57.00, 'D', NULL),
(175, 150, 'Basic Science', 'Term 1', '2025/2026', 70.00, 'B', NULL),
(176, 151, 'Basic Science', 'Term 1', '2025/2026', 83.00, 'A', NULL),
(177, 152, 'Basic Science', 'Term 1', '2025/2026', 96.00, 'A', NULL),
(178, 153, 'Basic Science', 'Term 1', '2025/2026', 49.00, 'F', NULL),
(179, 154, 'Basic Science', 'Term 1', '2025/2026', 62.00, 'C', NULL),
(180, 155, 'Basic Science', 'Term 1', '2025/2026', 75.00, 'B', NULL),
(181, 156, 'Basic Science', 'Term 1', '2025/2026', 88.00, 'A', NULL),
(182, 157, 'Basic Science', 'Term 1', '2025/2026', 41.00, 'F', NULL),
(183, 158, 'Basic Science', 'Term 1', '2025/2026', 54.00, 'D', NULL),
(184, 159, 'Basic Science', 'Term 1', '2025/2026', 67.00, 'C', NULL),
(185, 160, 'Basic Science', 'Term 1', '2025/2026', 80.00, 'A', NULL),
(186, 161, 'Basic Science', 'Term 1', '2025/2026', 93.00, 'A', NULL),
(187, 162, 'Basic Science', 'Term 1', '2025/2026', 46.00, 'F', NULL),
(188, 163, 'Basic Science', 'Term 1', '2025/2026', 59.00, 'D', NULL),
(189, 164, 'Basic Science', 'Term 1', '2025/2026', 72.00, 'B', NULL),
(190, 165, 'Basic Science', 'Term 1', '2025/2026', 85.00, 'A', NULL),
(191, 166, 'Basic Science', 'Term 1', '2025/2026', 98.00, 'A', NULL),
(192, 167, 'Basic Science', 'Term 1', '2025/2026', 51.00, 'D', NULL),
(193, 168, 'Basic Science', 'Term 1', '2025/2026', 64.00, 'C', NULL),
(194, 169, 'Basic Science', 'Term 1', '2025/2026', 77.00, 'B', NULL),
(195, 170, 'Basic Science', 'Term 1', '2025/2026', 90.00, 'A', NULL),
(196, 171, 'Basic Science', 'Term 1', '2025/2026', 43.00, 'F', NULL),
(197, 172, 'Basic Science', 'Term 1', '2025/2026', 56.00, 'D', NULL),
(198, 173, 'Basic Science', 'Term 1', '2025/2026', 69.00, 'C', NULL),
(199, 174, 'Basic Science', 'Term 1', '2025/2026', 82.00, 'A', NULL),
(200, 175, 'Basic Science', 'Term 1', '2025/2026', 95.00, 'A', NULL),
(201, 176, 'Basic Science', 'Term 1', '2025/2026', 48.00, 'F', NULL),
(202, 177, 'Basic Science', 'Term 1', '2025/2026', 61.00, 'C', NULL),
(203, 178, 'Basic Science', 'Term 1', '2025/2026', 74.00, 'B', NULL),
(204, 179, 'Basic Science', 'Term 1', '2025/2026', 87.00, 'A', NULL),
(220, 132, 'Social Studies', 'Term 1', '2025/2026', 91.00, 'A', NULL),
(221, 133, 'Social Studies', 'Term 1', '2025/2026', 94.00, 'A', NULL),
(222, 134, 'Social Studies', 'Term 1', '2025/2026', 97.00, 'A', NULL),
(223, 135, 'Social Studies', 'Term 1', '2025/2026', 55.00, 'D', NULL),
(224, 136, 'Social Studies', 'Term 1', '2025/2026', 58.00, 'D', NULL),
(225, 137, 'Social Studies', 'Term 1', '2025/2026', 61.00, 'C', NULL),
(226, 138, 'Social Studies', 'Term 1', '2025/2026', 64.00, 'C', NULL),
(227, 139, 'Social Studies', 'Term 1', '2025/2026', 67.00, 'C', NULL),
(228, 140, 'Social Studies', 'Term 1', '2025/2026', 70.00, 'B', NULL),
(229, 141, 'Social Studies', 'Term 1', '2025/2026', 73.00, 'B', NULL),
(230, 142, 'Social Studies', 'Term 1', '2025/2026', 76.00, 'B', NULL),
(231, 143, 'Social Studies', 'Term 1', '2025/2026', 79.00, 'B', NULL),
(232, 144, 'Social Studies', 'Term 1', '2025/2026', 82.00, 'A', NULL),
(233, 145, 'Social Studies', 'Term 1', '2025/2026', 85.00, 'A', NULL),
(234, 146, 'Social Studies', 'Term 1', '2025/2026', 88.00, 'A', NULL),
(235, 147, 'Social Studies', 'Term 1', '2025/2026', 91.00, 'A', NULL),
(236, 148, 'Social Studies', 'Term 1', '2025/2026', 94.00, 'A', NULL),
(237, 149, 'Social Studies', 'Term 1', '2025/2026', 97.00, 'A', NULL),
(238, 150, 'Social Studies', 'Term 1', '2025/2026', 55.00, 'D', NULL),
(239, 151, 'Social Studies', 'Term 1', '2025/2026', 58.00, 'D', NULL),
(240, 152, 'Social Studies', 'Term 1', '2025/2026', 61.00, 'C', NULL),
(241, 153, 'Social Studies', 'Term 1', '2025/2026', 64.00, 'C', NULL),
(242, 154, 'Social Studies', 'Term 1', '2025/2026', 67.00, 'C', NULL),
(243, 155, 'Social Studies', 'Term 1', '2025/2026', 70.00, 'B', NULL),
(244, 156, 'Social Studies', 'Term 1', '2025/2026', 73.00, 'B', NULL),
(245, 157, 'Social Studies', 'Term 1', '2025/2026', 76.00, 'B', NULL),
(246, 158, 'Social Studies', 'Term 1', '2025/2026', 79.00, 'B', NULL),
(247, 159, 'Social Studies', 'Term 1', '2025/2026', 82.00, 'A', NULL),
(248, 160, 'Social Studies', 'Term 1', '2025/2026', 85.00, 'A', NULL),
(249, 161, 'Social Studies', 'Term 1', '2025/2026', 88.00, 'A', NULL),
(250, 162, 'Social Studies', 'Term 1', '2025/2026', 91.00, 'A', NULL),
(251, 163, 'Social Studies', 'Term 1', '2025/2026', 94.00, 'A', NULL),
(252, 164, 'Social Studies', 'Term 1', '2025/2026', 97.00, 'A', NULL),
(253, 165, 'Social Studies', 'Term 1', '2025/2026', 55.00, 'D', NULL),
(254, 166, 'Social Studies', 'Term 1', '2025/2026', 58.00, 'D', NULL),
(255, 167, 'Social Studies', 'Term 1', '2025/2026', 61.00, 'C', NULL),
(256, 168, 'Social Studies', 'Term 1', '2025/2026', 64.00, 'C', NULL),
(257, 169, 'Social Studies', 'Term 1', '2025/2026', 67.00, 'C', NULL),
(258, 170, 'Social Studies', 'Term 1', '2025/2026', 70.00, 'B', NULL),
(259, 171, 'Social Studies', 'Term 1', '2025/2026', 73.00, 'B', NULL),
(260, 172, 'Social Studies', 'Term 1', '2025/2026', 76.00, 'B', NULL),
(261, 173, 'Social Studies', 'Term 1', '2025/2026', 79.00, 'B', NULL),
(262, 174, 'Social Studies', 'Term 1', '2025/2026', 82.00, 'A', NULL),
(263, 175, 'Social Studies', 'Term 1', '2025/2026', 85.00, 'A', NULL),
(264, 176, 'Social Studies', 'Term 1', '2025/2026', 88.00, 'A', NULL),
(265, 177, 'Social Studies', 'Term 1', '2025/2026', 91.00, 'A', NULL),
(266, 178, 'Social Studies', 'Term 1', '2025/2026', 94.00, 'A', NULL),
(267, 179, 'Social Studies', 'Term 1', '2025/2026', 97.00, 'A', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `logo_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `name`, `slug`, `address`, `phone`, `email`, `logo_path`) VALUES
(1, 'Crestview Primary School', 'crestview', '12 Crestview Road, Zaria', '08000000001', 'info@crestview.example', NULL),
(2, 'Horizon Secondary School', 'horizon', '45 Horizon Avenue, Zaria', '08000000002', 'info@horizon.example', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `class_id` int(11) DEFAULT NULL,
  `admission_no` varchar(50) NOT NULL,
  `name` varchar(150) NOT NULL,
  `dob` date DEFAULT NULL,
  `guardian_name` varchar(150) DEFAULT NULL,
  `guardian_phone` varchar(30) DEFAULT NULL,
  `photo_path` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `school_id`, `class_id`, `admission_no`, `name`, `dob`, `guardian_name`, `guardian_phone`, `photo_path`, `status`, `created_at`) VALUES
(132, 1, 1, 'CRV-101', 'Fatima Yusuf', '2020-02-11', 'Ibrahim Yusuf', '08012340101', NULL, 'active', '2026-07-18 19:34:30'),
(133, 1, 1, 'CRV-102', 'Emeka Nwosu', '2020-05-19', 'Chinwe Nwosu', '08012340102', NULL, 'active', '2026-07-18 19:34:30'),
(134, 1, 1, 'CRV-103', 'Halima Suleiman', '2020-01-30', 'Suleiman Danjuma', '08012340103', NULL, 'active', '2026-07-18 19:34:30'),
(135, 1, 1, 'CRV-104', 'Tobenna Eze', '2020-09-08', 'Ngozi Eze', '08012340104', NULL, 'active', '2026-07-18 19:34:30'),
(136, 1, 2, 'CRV-105', 'Amina Bello', '2019-03-14', 'Musa Bello', '08012340105', NULL, 'active', '2026-07-18 19:34:30'),
(137, 1, 2, 'CRV-106', 'David Okafor', '2019-07-02', 'Grace Okafor', '08012340106', NULL, 'active', '2026-07-18 19:34:30'),
(138, 1, 2, 'CRV-107', 'Zainab Ahmed', '2019-11-23', 'Ahmed Lawal', '08012340107', NULL, 'active', '2026-07-18 19:34:30'),
(139, 1, 2, 'CRV-108', 'Chukwuemeka Obi', '2019-04-17', 'Adaeze Obi', '08012340108', NULL, 'active', '2026-07-18 19:34:30'),
(140, 1, 5, 'CRV-109', 'Maryam Sani', '2018-06-25', 'Sani Abubakar', '08012340109', NULL, 'active', '2026-07-18 19:34:30'),
(141, 1, 5, 'CRV-110', 'Peter Nnamdi', '2018-02-14', 'Chioma Nnamdi', '08012340110', NULL, 'active', '2026-07-18 19:34:30'),
(142, 1, 5, 'CRV-111', 'Rukayya Ibrahim', '2018-10-05', 'Ibrahim Musa', '08012340111', NULL, 'active', '2026-07-18 19:34:30'),
(143, 1, 5, 'CRV-112', 'Samuel Okon', '2018-08-30', 'Blessing Okon', '08012340112', NULL, 'active', '2026-07-18 19:34:30'),
(144, 1, 6, 'CRV-113', 'Aisha Garba', '2017-01-19', 'Garba Muhammad', '08012340113', NULL, 'active', '2026-07-18 19:34:30'),
(145, 1, 6, 'CRV-114', 'John Adeyemi', '2017-05-27', 'Folake Adeyemi', '08012340114', NULL, 'active', '2026-07-18 19:34:30'),
(146, 1, 6, 'CRV-115', 'Hauwa Bala', '2017-09-12', 'Bala Usman', '08012340115', NULL, 'active', '2026-07-18 19:34:30'),
(147, 1, 6, 'CRV-116', 'Victor Chukwu', '2017-03-03', 'Ifeoma Chukwu', '08012340116', NULL, 'active', '2026-07-18 19:34:30'),
(148, 1, 12, 'CRV-117', 'Khadija Nuhu', '2016-12-01', 'Nuhu Aliyu', '08012340117', NULL, 'active', '2026-07-18 19:34:30'),
(149, 1, 12, 'CRV-118', 'Daniel Ogundipe', '2016-04-22', 'Bisi Ogundipe', '08012340118', NULL, 'active', '2026-07-18 19:34:30'),
(150, 1, 12, 'CRV-119', 'Safiya Umar', '2016-08-16', 'Umar Bello', '08012340119', NULL, 'active', '2026-07-18 19:34:30'),
(151, 1, 12, 'CRV-120', 'Michael Eze', '2016-06-09', 'Uche Eze', '08012340120', NULL, 'active', '2026-07-18 19:34:30'),
(152, 1, 7, 'CRV-121', 'Zulaikha Musa', '2015-02-28', 'Musa Ibrahim', '08012340121', NULL, 'active', '2026-07-18 19:34:30'),
(153, 1, 7, 'CRV-122', 'Emmanuel Bassey', '2015-07-15', 'Comfort Bassey', '08012340122', NULL, 'active', '2026-07-18 19:34:30'),
(154, 1, 7, 'CRV-123', 'Amina Lawal', '2015-11-04', 'Lawal Sani', '08012340123', NULL, 'active', '2026-07-18 19:34:30'),
(155, 1, 7, 'CRV-124', 'Joseph Nwachukwu', '2015-05-20', 'Ngozi Nwachukwu', '08012340124', NULL, 'active', '2026-07-18 19:34:30'),
(156, 2, 3, 'HZN-201', 'Chidinma Eze', '2014-01-20', 'Peter Eze', '08012340201', NULL, 'active', '2026-07-18 19:34:30'),
(157, 2, 3, 'HZN-202', 'Abdullahi Yakubu', '2014-03-11', 'Yakubu Sale', '08012340202', NULL, 'active', '2026-07-18 19:34:30'),
(158, 2, 3, 'HZN-203', 'Blessing Okoro', '2014-09-25', 'Ijeoma Okoro', '08012340203', NULL, 'active', '2026-07-18 19:34:30'),
(159, 2, 3, 'HZN-204', 'Nasiru Bello', '2014-06-07', 'Bello Hassan', '08012340204', NULL, 'active', '2026-07-18 19:34:30'),
(160, 2, 8, 'HZN-205', 'Ruth Adeboye', '2013-04-16', 'Samuel Adeboye', '08012340205', NULL, 'active', '2026-07-18 19:34:30'),
(161, 2, 8, 'HZN-206', 'Ibrahim Danladi', '2013-08-02', 'Danladi Musa', '08012340206', NULL, 'active', '2026-07-18 19:34:30'),
(162, 2, 8, 'HZN-207', 'Chiamaka Nnaji', '2013-12-19', 'Obinna Nnaji', '08012340207', NULL, 'active', '2026-07-18 19:34:30'),
(163, 2, 8, 'HZN-208', 'Fatima Abdullahi', '2013-02-28', 'Abdullahi Musa', '08012340208', NULL, 'active', '2026-07-18 19:34:30'),
(164, 2, 9, 'HZN-209', 'Tunde Bakare', '2012-05-13', 'Kayode Bakare', '08012340209', NULL, 'active', '2026-07-18 19:34:30'),
(165, 2, 9, 'HZN-210', 'Amaka Chukwuma', '2012-10-30', 'Chukwuma Obi', '08012340210', NULL, 'active', '2026-07-18 19:34:30'),
(166, 2, 9, 'HZN-211', 'Hassan Garba', '2012-01-17', 'Garba Nuhu', '08012340211', NULL, 'active', '2026-07-18 19:34:30'),
(167, 2, 9, 'HZN-212', 'Grace Okafor', '2012-07-24', 'Emeka Okafor', '08012340212', NULL, 'active', '2026-07-18 19:34:30'),
(168, 2, 13, 'HZN-213', 'Musa Abdullahi', '2011-03-05', 'Abdullahi Sale', '08012340213', NULL, 'active', '2026-07-18 19:34:30'),
(169, 2, 13, 'HZN-214', 'Ijeoma Chukwu', '2011-06-18', 'Nnamdi Chukwu', '08012340214', NULL, 'active', '2026-07-18 19:34:30'),
(170, 2, 13, 'HZN-215', 'Yusuf Suleiman', '2011-09-29', 'Suleiman Bala', '08012340215', NULL, 'active', '2026-07-18 19:34:30'),
(171, 2, 13, 'HZN-216', 'Patience Etim', '2011-11-11', 'Etim Okon', '08012340216', NULL, 'active', '2026-07-18 19:34:30'),
(172, 2, 14, 'HZN-217', 'Aliyu Mohammed', '2010-02-09', 'Mohammed Nuhu', '08012340217', NULL, 'active', '2026-07-18 19:34:30'),
(173, 2, 14, 'HZN-218', 'Ngozi Uba', '2010-05-22', 'Uba Chukwuma', '08012340218', NULL, 'active', '2026-07-18 19:34:30'),
(174, 2, 14, 'HZN-219', 'Sadiq Umar', '2010-08-14', 'Umar Aliyu', '08012340219', NULL, 'active', '2026-07-18 19:34:30'),
(175, 2, 14, 'HZN-220', 'Comfort Bassey', '2010-12-03', 'Bassey Effiong', '08012340220', NULL, 'active', '2026-07-18 19:34:30'),
(176, 2, 15, 'HZN-221', 'Kabiru Lawal', '2009-01-27', 'Lawal Ibrahim', '08012340221', NULL, 'active', '2026-07-18 19:34:31'),
(177, 2, 15, 'HZN-222', 'Chinwe Okeke', '2009-04-06', 'Okeke Uzoma', '08012340222', NULL, 'active', '2026-07-18 19:34:31'),
(178, 2, 15, 'HZN-223', 'Bello Idris', '2009-07-19', 'Idris Hassan', '08012340223', NULL, 'active', '2026-07-18 19:34:31'),
(179, 2, 15, 'HZN-224', 'Esther Adamu', '2009-10-08', 'Adamu Yohanna', '08012340224', NULL, 'active', '2026-07-18 19:34:31');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(150) NOT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `school_id`, `user_id`, `name`, `subject`, `phone`) VALUES
(5, 2, 3, 'Jane Okoro', 'Vice Principal', '08030000021'),
(6, 2, 16, 'Michael Johnson', 'Principal', '08030000016'),
(7, 1, 4, 'Grace Adeyemi', 'Mathematics', '08030000001'),
(8, 1, 5, 'Samuel Okafor', 'English Language', '08030000002'),
(9, 1, 6, 'Esther Ibrahim', 'Basic Science', '08030000003'),
(10, 1, 7, 'David Ojo', 'Social Studies', '08030000004'),
(11, 1, 8, 'Mercy Chukwu', 'Civic Education', '08030000005'),
(12, 1, 9, 'Peter Bello', 'Computer Studies', '08030000006'),
(13, 1, 10, 'Janet Eze', 'Cultural & Creative Arts', '08030000007'),
(14, 1, 11, 'Emmanuel Musa', 'Physical & Health Education', '08030000008'),
(15, 1, 12, 'Deborah Okeke', 'Agricultural Science', '08030000009'),
(16, 1, 13, 'Victor Adebayo', 'Yoruba Language', '08030000010'),
(17, 1, 14, 'Rosemary Nwosu', 'Home Economics', '08030000011'),
(18, 1, 15, 'Felix Yakubu', 'Music', '08030000012'),
(19, 2, 17, 'Fatima Suleiman', 'English Language', '08030000017'),
(20, 2, 18, 'Ibrahim Garba', 'Physics', '08030000018'),
(21, 2, 19, 'Blessing Umeh', 'Chemistry', '08030000019'),
(22, 2, 20, 'Daniel Yakubu', 'Economics', '08030000020'),
(23, 2, 21, 'Patricia Chukwu', 'Geography', '08030000022'),
(24, 2, 22, 'Henry Onoh', 'Computer Science', '08030000023'),
(25, 2, 23, 'Rebecca Edet', 'Biology', '08030000024'),
(26, 2, 24, 'Christopher Eze', 'Further Mathematics', '08030000025'),
(27, 2, 25, 'Ngozi Okafor', 'Literature in English', '08030000026'),
(28, 2, 26, 'John Adebayo', 'Government', '08030000027'),
(29, 2, 27, 'Mary Bassey', 'Financial Accounting', '08030000028'),
(30, 2, 28, 'Kingsley Obi', 'Agricultural Science', '08030000029'),
(31, 2, 29, 'Joy Ekanem', 'Christian Religious Studies', '08030000030'),
(32, 2, 30, 'Paul Nnamdi', 'Civic Education', '08030000031'),
(33, 2, 31, 'Hauwa Aliyu', 'Islamic Religious Studies', '08030000032'),
(34, 2, 32, 'Joseph Olatunji', 'Technical Drawing', '08030000033'),
(35, 2, 33, 'Gloria Akpan', 'Commerce', '08030000034');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `role` enum('admin','teacher') NOT NULL DEFAULT 'teacher',
  `failed_attempts` int(11) DEFAULT 0,
  `last_login` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `school_id`, `name`, `email`, `password_hash`, `role`, `failed_attempts`, `last_login`, `created_at`) VALUES
(1, 1, 'Admin Crestview', 'admin@crestview.example', '482c811da5d5b4bc6d497ffa98491e38', 'admin', 0, NULL, '2026-07-17 01:00:07'),
(2, 2, 'Admin Horizon', 'admin@horizon.example', '482c811da5d5b4bc6d497ffa98491e38', 'admin', 0, NULL, '2026-07-17 01:00:07'),
(3, 1, 'Teacher Jane', 'jane@crestview.example', '482c811da5d5b4bc6d497ffa98491e38', 'teacher', 0, NULL, '2026-07-17 01:00:07'),
(4, 1, 'Grace Adeyemi', 'grace.adeyemi@martinsschools.edu.ng', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'teacher', 0, NULL, '2026-07-17 02:53:37'),
(5, 1, 'Samuel Okafor', 'samuel.okafor@martinsschools.edu.ng', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'teacher', 0, NULL, '2026-07-17 02:53:37'),
(6, 1, 'Esther Ibrahim', 'esther.ibrahim@martinsschools.edu.ng', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'teacher', 0, NULL, '2026-07-17 02:53:37'),
(7, 1, 'David Ojo', 'david.ojo@martinsschools.edu.ng', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'teacher', 0, NULL, '2026-07-17 02:53:37'),
(8, 1, 'Mercy Chukwu', 'mercy.chukwu@martinsschools.edu.ng', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'teacher', 0, NULL, '2026-07-17 02:53:37'),
(9, 1, 'Peter Bello', 'peter.bello@martinsschools.edu.ng', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'teacher', 0, NULL, '2026-07-17 02:53:37'),
(10, 1, 'Janet Eze', 'janet.eze@martinsschools.edu.ng', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'teacher', 0, NULL, '2026-07-17 02:53:37'),
(11, 1, 'Emmanuel Musa', 'emmanuel.musa@martinsschools.edu.ng', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'teacher', 0, NULL, '2026-07-17 02:53:37'),
(12, 1, 'Deborah Okeke', 'deborah.okeke@martinsschools.edu.ng', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'teacher', 0, NULL, '2026-07-17 02:53:37'),
(13, 1, 'Victor Adebayo', 'victor.adebayo@martinsschools.edu.ng', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'teacher', 0, NULL, '2026-07-17 02:53:37'),
(14, 1, 'Rosemary Nwosu', 'rosemary.nwosu@martinsschools.edu.ng', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'teacher', 0, NULL, '2026-07-17 17:16:58'),
(15, 1, 'Felix Yakubu', 'felix.yakubu@martinsschools.edu.ng', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'teacher', 0, NULL, '2026-07-17 17:16:58'),
(16, 2, 'Michael Johnson', 'michael.johnson@martinsschools.edu.ng', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'teacher', 0, NULL, '2026-07-17 17:16:58'),
(17, 2, 'Fatima Suleiman', 'fatima.suleiman@martinsschools.edu.ng', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'teacher', 0, NULL, '2026-07-17 17:16:58'),
(18, 2, 'Ibrahim Garba', 'ibrahim.garba@martinsschools.edu.ng', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'teacher', 0, NULL, '2026-07-17 17:16:58'),
(19, 2, 'Blessing Umeh', 'blessing.umeh@martinsschools.edu.ng', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'teacher', 0, NULL, '2026-07-17 17:16:58'),
(20, 2, 'Daniel Yakubu', 'daniel.yakubu@martinsschools.edu.ng', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'teacher', 0, NULL, '2026-07-17 17:16:58'),
(21, 2, 'Patricia Chukwu', 'patricia.chukwu@martinsschools.edu.ng', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'teacher', 0, NULL, '2026-07-17 17:16:58'),
(22, 2, 'Henry Onoh', 'henry.onoh@martinsschools.edu.ng', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'teacher', 0, NULL, '2026-07-17 17:16:58'),
(23, 2, 'Rebecca Edet', 'rebecca.edet@martinsschools.edu.ng', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'teacher', 0, NULL, '2026-07-17 17:16:58'),
(24, 2, 'Christopher Eze', 'christopher.eze@martinsschools.edu.ng', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'teacher', 0, NULL, '2026-07-17 17:16:58'),
(25, 2, 'Ngozi Okafor', 'ngozi.okafor@martinsschools.edu.ng', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'teacher', 0, NULL, '2026-07-17 17:16:58'),
(26, 2, 'John Adebayo', 'john.adebayo@martinsschools.edu.ng', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'teacher', 0, NULL, '2026-07-17 17:16:58'),
(27, 2, 'Mary Bassey', 'mary.bassey@martinsschools.edu.ng', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'teacher', 0, NULL, '2026-07-17 17:16:58'),
(28, 2, 'Kingsley Obi', 'kingsley.obi@martinsschools.edu.ng', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'teacher', 0, NULL, '2026-07-17 17:16:58'),
(29, 2, 'Joy Ekanem', 'joy.ekanem@martinsschools.edu.ng', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'teacher', 0, NULL, '2026-07-17 17:16:58'),
(30, 2, 'Paul Nnamdi', 'paul.nnamdi@martinsschools.edu.ng', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'teacher', 0, NULL, '2026-07-17 17:16:58'),
(31, 2, 'Hauwa Aliyu', 'hauwa.aliyu@martinsschools.edu.ng', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'teacher', 0, NULL, '2026-07-17 17:16:58'),
(32, 2, 'Joseph Olatunji', 'joseph.olatunji@martinsschools.edu.ng', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'teacher', 0, NULL, '2026-07-17 17:16:58'),
(33, 2, 'Gloria Akpan', 'gloria.akpan@martinsschools.edu.ng', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'teacher', 0, NULL, '2026-07-17 17:16:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `school_id` (`school_id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `class_id` (`class_id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_school_class` (`school_id`,`name`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `school_id` (`school_id`);

--
-- Indexes for table `news_events`
--
ALTER TABLE `news_events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `school_id` (`school_id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `school_id` (`school_id`),
  ADD KEY `class_id` (`class_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `school_id` (`school_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `school_id` (`school_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=541;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news_events`
--
ALTER TABLE `news_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=268;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `announcements`
--
ALTER TABLE `announcements`
  ADD CONSTRAINT `announcements_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`);

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `attendance_ibfk_2` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`);

--
-- Constraints for table `classes`
--
ALTER TABLE `classes`
  ADD CONSTRAINT `classes_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`);

--
-- Constraints for table `fees`
--
ALTER TABLE `fees`
  ADD CONSTRAINT `fees_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);

--
-- Constraints for table `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `gallery_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`);

--
-- Constraints for table `news_events`
--
ALTER TABLE `news_events`
  ADD CONSTRAINT `news_events_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`);

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`),
  ADD CONSTRAINT `students_ibfk_2` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`);

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teachers_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`),
  ADD CONSTRAINT `teachers_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
