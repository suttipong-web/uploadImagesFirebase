DROP TABLE IF EXISTS `tbl_rooms`;

CREATE TABLE `tbl_rooms` (
    `roomid` smallint(4) NOT NULL,
    `roomName` varchar(250) DEFAULT NULL,
    `detail` varchar(255) DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_general_ci;

--
-- Dumping data for table `tbl_rooms`
--

INSERT INTO
    `tbl_rooms` (
        `roomid`,
        `roomName`,
        `detail`
    )
VALUES (1, 'Room 1', 'แห้ง'),
    (2, 'Room 2', 'เปียก');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_station`
--

DROP TABLE IF EXISTS `tbl_station`;

CREATE TABLE `tbl_station` (
    `stationId` smallint(4) NOT NULL,
    `stationName` varchar(200) DEFAULT NULL,
    `roomId` smallint(4) DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_general_ci;

--
-- Dumping data for table `tbl_station`
--

INSERT INTO
    `tbl_station` (
        `stationId`,
        `stationName`,
        `roomId`
    )
VALUES (1, 'Station 1', 1),
    (2, 'Station 2', 1),
    (3, 'Station 3', 1),
    (4, 'Station 4', 2),
    (5, 'Station 5', 2),
    (6, 'Station 6', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_station_case`
--

DROP TABLE IF EXISTS `tbl_station_case`;

CREATE TABLE `tbl_station_case` (
    `caseId` int(6) NOT NULL,
    `listId` int(6) DEFAULT NULL,
    `case_title` varchar(100) DEFAULT NULL,
    `description` varchar(254) DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_general_ci;

--
-- Dumping data for table `tbl_station_case`
--

INSERT INTO
    `tbl_station_case` (
        `caseId`,
        `listId`,
        `case_title`,
        `description`
    )
VALUES (2, 1, '5 ML', NULL),
    (3, 1, '10 ML', NULL),
    (4, 1, '15 ML', NULL),
    (5, 1, '20 ML', NULL),
    (6, 1, '25 ML', NULL),
    (7, 2, '5 ML', NULL),
    (8, 2, '10 ML', NULL),
    (9, 2, '15 ML', NULL),
    (10, 2, '20 ML', NULL),
    (11, 2, '25 ML', NULL),
    (12, 2, '30 ML', NULL),
    (13, 2, '35 ML', NULL),
    (14, 2, '40 ML', NULL),
    (15, 2, '45 ML', NULL),
    (16, 2, '50 ML', NULL),
    (17, 3, '5 ML', NULL),
    (18, 3, '10 ML', NULL),
    (19, 3, '15 ML', NULL),
    (20, 3, '20 ML', NULL),
    (21, 3, '25 ML', NULL),
    (22, 3, '30 ML', NULL),
    (23, 3, '35 ML', NULL),
    (24, 3, '40 ML', NULL),
    (25, 3, '45 ML', NULL),
    (26, 3, '50 ML', NULL),
    (27, 3, '55 ML', NULL),
    (28, 3, '60 ML', NULL),
    (29, 3, '65 ML', NULL),
    (30, 3, '70 ML', NULL),
    (31, 3, '75 ML', NULL),
    (32, 4, '10 ML', NULL),
    (33, 4, '20 ML', NULL),
    (34, 4, '30 ML', NULL),
    (35, 4, '40 ML', NULL),
    (36, 4, '50 ML', NULL),
    (37, 4, '60 ML', NULL),
    (38, 4, '70 ML', NULL),
    (39, 4, '80 ML', NULL),
    (40, 4, '90 ML', NULL),
    (41, 4, '100 ML', NULL),
    (42, 5, '10 ML', NULL),
    (43, 5, '20 ML', NULL),
    (44, 5, '30 ML', NULL),
    (45, 5, '40 ML', NULL),
    (46, 5, '50 ML', NULL),
    (47, 5, '60 ML', NULL),
    (48, 5, '70 ML', NULL),
    (49, 5, '80 ML', NULL),
    (50, 5, '90 ML', NULL),
    (51, 5, '100 ML', NULL),
    (52, 5, '110 ML', NULL),
    (53, 5, '120 ML', NULL),
    (54, 5, '130 ML', NULL),
    (55, 5, '140 ML', NULL),
    (56, 5, '150 ML', NULL),
    (57, 6, 'Random 1 ', NULL),
    (58, 6, 'Random 2', NULL),
    (59, 6, 'Random 3', NULL),
    (60, 6, 'Random 4', NULL),
    (61, 6, 'Random 5', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_station_list`
--

DROP TABLE IF EXISTS `tbl_station_list`;

CREATE TABLE `tbl_station_list` (
    `listId` int(6) NOT NULL,
    `station_title` varchar(254) DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_general_ci;

--
-- Dumping data for table `tbl_station_list`
--

INSERT INTO
    `tbl_station_list` (`listId`, `station_title`)
VALUES (1, 'PACKING GAUZE 1.5” x 36”'),
    (2, 'SWAB 3” x 18”'),
    (3, 'SWAB 6” x 18”'),
    (4, 'SWAB 12” x 12”'),
    (5, 'SWAB 18” x 18”'),
    (
        6,
        'Random: swab 15” x 15” & Gauze 4”x 4”'
    );

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_rooms`
--
ALTER TABLE `tbl_rooms` ADD PRIMARY KEY (`roomid`);

--
-- Indexes for table `tbl_station`
--
ALTER TABLE `tbl_station` ADD PRIMARY KEY (`stationId`);

--
-- Indexes for table `tbl_station_case`
--
ALTER TABLE `tbl_station_case` ADD PRIMARY KEY (`caseId`);

--
-- Indexes for table `tbl_station_list`
--
ALTER TABLE `tbl_station_list` ADD PRIMARY KEY (`listId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_rooms`
--
ALTER TABLE `tbl_rooms`
MODIFY `roomid` smallint(4) NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 3;

--
-- AUTO_INCREMENT for table `tbl_station`
--
ALTER TABLE `tbl_station`
MODIFY `stationId` smallint(4) NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 7;

--
-- AUTO_INCREMENT for table `tbl_station_case`
--
ALTER TABLE `tbl_station_case`
MODIFY `caseId` int(6) NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 62;

--
-- AUTO_INCREMENT for table `tbl_station_list`
--
ALTER TABLE `tbl_station_list`
MODIFY `listId` int(6) NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 7;