CREATE TABLE IF NOT EXISTS `my_chart_data` (
  `category` date NOT NULL,
  `value1` int(11) NOT NULL,
  `value2` int(11) NOT NULL
);

INSERT INTO `my_chart_data` (`category`, `value1`, `value2`) VALUES
('2013-08-24', 417, 127),
('2013-08-25', 417, 356),
('2013-08-26', 531, 585),
('2013-08-27', 333, 910),
('2013-08-28', 552, 30),
('2013-08-29', 492, 371),
('2013-08-30', 379, 781),
('2013-08-31', 767, 494),
('2013-09-01', 169, 364),
('2013-09-02', 314, 476),
('2013-09-03', 437, 759);