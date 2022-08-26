-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2022 at 04:31 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `first_name`, `last_name`, `username`, `password`) VALUES
(1, 'mohamad', 'harmouche', 'mohamad111@gmail.com', 'mohamad111'),
(2, 'leader', 'xH', 'leader1@gmail.com', 'leader1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(1, 'Pizza', 'Food_Category_119.jpg', 'Yes', 'Yes'),
(2, 'Burger', 'Food_Category_515.jpg', 'Yes', 'Yes'),
(3, 'Sushi', 'Food_Category_427.jpg', 'Yes', 'Yes'),
(4, 'Drinks', 'Food_Category_145.jpg', 'No', 'Yes'),
(5, 'Dessert', 'Food_Category_918.jpg', 'No', 'Yes'),
(6, 'Salad', 'Food_Category_172.jpg', 'No', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_client`
--

CREATE TABLE `tbl_client` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_client`
--

INSERT INTO `tbl_client` (`id`, `first_name`, `last_name`, `username`, `password`, `phone`, `address`) VALUES
(1, 'mohamad', 'harmouche', 'mohamad@gmail.com ', 'mohamad', '71217525', 'Tripoli / Abi_samra / El_Islah / 1rst Floor.'),
(2, 'samer', 'harmouche', 'samer@gmail.com', 'samer', '76603702', 'Tripoli, Abi Samra,Islah,2rd floor'),
(3, 'ahmad', 'samad', 'ahmad@gmail.com', 'ahmad1', '70121233', 'Beirut,Hamra,3rd floor'),
(4, 'farah', 'harmouche', 'farah@gmail.com', 'farah', '70928222', 'Bahsas,Sou2,1rst floor'),
(5, 'ahmad', 'harmouche', 'ahmad1@gmail.com', 'ahmad', '70235070', 'Tripoli, Abi Samra,Islah,1rst floor');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food`
--

CREATE TABLE `tbl_food` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_food`
--

INSERT INTO `tbl_food` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(4, 'Gunkan Maki', 'The boat-shaped cubes of sushi rice are formed by hand and wrapped in a tall strip of seaweed to create a bowl that can be filled with fish eggs/crab amongst other things.', '23.00', '5234gunkan-maki.jpg', 3, 'Yes', 'Yes'),
(6, 'Ultimate Veggie Pizza', 'Veggie Pizza Toppings, Pizza Sauce, Baby Spinach, Part-Skim Mozzarella, Artichoke, Bell Pepper, Red Onion, Cherry Tomatoes, Olives, Sliced Almonds, Optional Garnishes. ', '19.00', 'Food_Name_226.jpg', 1, 'Yes', 'Yes'),
(7, 'Classic Beef Burger', 'olive oil, onion, peeled and finely chopped, pack British Beef Steak Mince, fat\r\n mixed dried herbs, egg, beaten\r\nslices mature Cheddar, white rolls, few round lettuce leaves, torn\r\nbeef tomato, sliced, ketchup.', '16.00', '4758classic-beef-burger.jpg', 2, 'Yes', 'Yes'),
(8, 'Veggie Burgers', 'ounces mushrooms, carrot, broccoli florets, onion, garlic cloves, olive oil,\r\n avocado oil, smoked paprika, chili powder, fine sea salt, fresh ground black pepper, drained and rinsed, eggs, tomato .', '22.00', 'Food_Name_425.jpg', 2, 'Yes', 'Yes'),
(9, 'Sahimi Sake (Salmon)', '2 tbsp soy sauce, 1 ½ tbsp dashi stock, 1 tbsp lemon juice, ½ tbsp rice vinegar, 1 tsp mirin, Salmon sashimi, Wasabi optional,  Ponzu sauce, combine all the ingredients, apart from the salmon, in a small bowl and whisk together.', '29.00', 'Food_Name_677.jpg', 3, 'Yes', 'Yes'),
(10, 'Pepperoni Pizza', '16 ounces pizza dough, store-bought or homemade, cup pizza sauce , slices pepperoni, ounces mozzarella cheese, grated, teaspoon ground black pepper, teaspoon fresh oregano, optional, Flour for rolling and shaping dough.', '32.00', 'Food_Name_495.jpg', 1, 'Yes', 'Yes'),
(11, 'Chicago Pizza', 'Generally, the toppings for Chicago pizza are ground beef, sausage, pepperoni, onion, mushrooms, and green peppers, placed underneath the tomato sauce.', '23.00', 'Food_Name_471.jpg', 1, 'No', 'Yes'),
(12, 'Nigiri Sushi', 'This is a small, delicious treat that features a thinly-sliced drapery of raw fish, laid over a cluster of sweet and salty vinegared rice. The roll is chilled, and the smooth taste of the fish combines with the sticky and tangy flavor of the rice.', '45.00', 'Food_Name_863.jpg', 3, 'No', 'Yes'),
(13, 'Turkey Burgers', 'ground turkey, teaspoon salt, teaspoon black pepper, minced onion, panko breadcrumbs, vegetable oil, avocados, mashed, 4 slices sharp Cheddar, 4 burger buns, split, tomato.', '32.00', 'Food_Name_993.jpg', 2, 'No', 'Yes'),
(14, 'Sicilian Pizza', 'Abundance of strong cheese and sauce , along with onions, anchovies, and herbs. Our version here is a riff on these Sicilian toppings, layered onto a golden, crispy bottomed, soft and chewy crust.\r\n\r\n', '18.00', 'Food_Name_835.jpg', 1, 'No', 'Yes'),
(15, 'Uramaki', 'Ushi rice (cooked), cucumber, avocado, salmon fillets, sweet potato, dried seaweed sheets, sesame seeds, masago (fish roe), wasabi paste\r\nsushi ginger, soy sauce .', '38.00', 'Food_Name_886.jpg', 3, 'No', 'Yes'),
(16, 'Wild Salmon Burgers', 'Skinless wild salmon fillet, Dijon mustard, canola oil, chopped fresh chives, reduced-sodium soy sauce, sesame oil, salt, freshly ground pepper, sesame seeds, peanut oil, grain buns, tomato slices, baby greens.', '41.00', 'Food_Name_151.jpg', 2, 'No', 'Yes'),
(17, 'Pepsi', 'Cane sugar, Apple extract, Color: plain caramel, Natural plant extracts (including natural caffeine and kola nut extract), citric, tartaric and lactic acids.\r\nStabilizer: gum Arabic, Thickener: xanthan gum.\r\n', '6.00', '2900pepsi.jpg', 4, 'No', 'Yes'),
(18, 'Donuts', 'Eggs, room temperature, granulated white sugar, pure vanilla extract, all-purpose flour, baking powder, kosher salt, freshly grated nutmeg, unsalted butter, melted and cooled to lukewarm, milk, room temperature, Chocolate.', '7.00', 'Food_Name_598.jpg', 5, 'No', 'Yes'),
(19, 'Asian Summer Slaw', 'Crunchy cabbage, Carrots, Scallions, Toasted peanuts, Cilantro, Simple lemony vinaigrette, Miso-ginger vinaigrette, red cabbage, green cabbage, toasted peanuts, cilantro.  ', '14.00', 'Food_Name_30.jpg', 6, 'No', 'Yes'),
(20, '7up', 'Granulated sugar, Natural plant extracts , Corn Syrup, Kool-Aid lemonade unsweetened drink mix, Very Hot water, bottle lime juice, Bottled lime juice, Clad soda water.', '6.00', 'Food_Name_568.jpg', 4, 'No', 'Yes'),
(21, 'Chocolate Ice Cream', 'Cacao, Powdered whole/skimmed milk, Morbi gel (E471), Citraconic, GRAINS, COVERINGS AND DECORATIONS, Dark and white coverings, Chopped Peanuts, Chopped Crispy.', '12.00', '5195ice.jpg', 5, 'No', 'Yes'),
(22, 'Greek Salad', 'English cucumber, cut lengthwise, seeded, and sliced, green bell pepper, chopped into 1-inch pieces, halved cherry tomatoes, feta cheese, thinly sliced red onion, pitted Kalamata olives, fresh mint leaves.', '18.00', 'Food_Name_907.jpg', 6, 'No', 'Yes'),
(23, 'Pepsi Diet', 'With its light, crisp taste, Diet Pepsi gives you all the refreshment you need - with zero sugar, zero calories and zero carbs. Light. Crisp. Refreshing. Diet Pepsi.', '6.00', '3683pepsi-diet.jpg', 4, 'No', 'Yes'),
(24, 'Oreo Crepe', 'flour, milk, eggs, salt, Oreo cookies, Nutella, Raspberry Jam, Heavy Cream.', '11.00', 'Food_Name_743.png', 5, 'No', 'Yes'),
(25, 'Watermelon Tomato Salad', 'Tomatoes, sliced into wedges, cut watermelon, jalapeño and/or a few Thai chilis, Thai basil or regular basil, toasted cashews, avocado, diced, Sea salt, to taste, if desired, Lime wedges, for serving.', '17.00', '3139Untitled-1.png', 6, 'No', 'Yes'),
(26, 'XXL Energy', ' production operations in Canada and the US. Focusing on developing unconventional natural gas assets, the company operates primarily in Colorado, Nevada, North Dakota.', '9.00', 'Food_Name_969.jpg', 4, 'No', 'Yes'),
(27, 'Chocolate Cake', 'ups all purpose flour, unsweetened cocoa powder,  regular Hershey\'s cocoa powder\r\nbaking powder, baking soda, white granulated sugar, milk, vegetable oil, vanilla extract, boiling water.', '15.00', 'Food_Name_926.jpg', 5, 'No', 'Yes'),
(28, 'Creamy Potato Salad', 'Potatoes, Celery, Radishes and red onion, Capers, Dill, chives, and celery seed, And the dressing, radishes, halved and thinly sliced, reserve some for garnish, sea salt, lemon juice, fresh dill. ', '18.00', 'Food_Name_179.jpg', 6, 'No', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_manager`
--

CREATE TABLE `tbl_manager` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_manager`
--

INSERT INTO `tbl_manager` (`id`, `full_name`, `username`, `password`) VALUES
(1, 'mohamad harmouche', 'admin', '64ef6363b95a28c2c1b91189a57fec54'),
(2, 'ahmad samad', 'ahmad111@gmail.com', '61243c7b9a4022cb3f8dc3106767ed12'),
(4, 'ahamd', 'admin2', 'c84258e9c39059a89ab77d846ddab909'),
(5, 'john', 'john@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `client_id` int(11) NOT NULL,
  `food_id` int(10) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `client_id`, `food_id`, `qty`, `total`, `order_date`, `status`) VALUES
(8, 2, 16, 1, '41.00', '2021-05-20 10:28:06', 'Delivered'),
(9, 2, 23, 1, '6.00', '2021-05-20 10:29:22', 'Cancelled'),
(10, 1, 7, 2, '32.00', '2021-05-20 10:42:52', 'Delivered'),
(11, 1, 17, 2, '12.00', '2021-05-20 10:42:58', 'On Delivery'),
(12, 1, 8, 5, '110.00', '2021-05-24 10:22:53', 'Ordered'),
(13, 1, 20, 5, '30.00', '2021-05-24 10:23:15', 'On Delivery');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_client`
--
ALTER TABLE `tbl_client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fcid` (`category_id`);

--
-- Indexes for table `tbl_manager`
--
ALTER TABLE `tbl_manager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `cid` (`client_id`),
  ADD KEY `fid` (`food_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_client`
--
ALTER TABLE `tbl_client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_manager`
--
ALTER TABLE `tbl_manager`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD CONSTRAINT `fcid` FOREIGN KEY (`category_id`) REFERENCES `tbl_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `cid` FOREIGN KEY (`client_id`) REFERENCES `tbl_client` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fid` FOREIGN KEY (`food_id`) REFERENCES `tbl_food` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
