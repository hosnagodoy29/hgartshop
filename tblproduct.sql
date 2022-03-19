--
-- Table structure for table `tblproduct`
--

CREATE TABLE `products` (
  `id` int(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `price` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `products` (`id`, `name`, `code`, `image`, `price`) VALUES
(1, 'High Quality Acrylic Paint Brush Set', 'brush1', 'pics/brush1.jpg', 162.92),
(2, '12pcs. Acrylic Watercolor Oil Painting', 'brush2', 'pics/brush2.jpg', 261.93),
(3, 'Set Miniature Detail Artist Paint Brushes', 'brush3', 'pics/brush3.jpg', 237.38),
(4, 'Wooden Handle Art Brush Set', 'brush4', 'pics/brush4.jpg', 261.94);

--
-- Indexes for table `tblproduct`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_code` (`code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblproduct`
--
ALTER TABLE `products`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;
