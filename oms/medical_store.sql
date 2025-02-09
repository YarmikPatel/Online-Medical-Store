-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2025 at 12:39 PM
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
-- Database: `medical_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `admin_id` int(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  `admin_name` varchar(30) NOT NULL,
  `apass` varchar(30) NOT NULL,
  `mobile_no` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`admin_id`, `code`, `admin_name`, `apass`, `mobile_no`) VALUES
(1, 'T_66Y_59', 'Tirth Barot', 'admin001_tirthb', 9313810977),
(2, 'T_66Y_59', 'Yarmik Kansagara', 'admin001_yarmik', 9725259041);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `pname` varchar(30) NOT NULL,
  `image` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `final_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `name`) VALUES
(1, 'Kids'),
(2, 'Teenagers'),
(3, 'Men'),
(4, 'Female'),
(5, 'Senior Citizen');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `fid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `date` date NOT NULL,
  `email_id` varchar(20) NOT NULL,
  `msg` varchar(150) NOT NULL,
  `star` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_history`
--

CREATE TABLE `order_history` (
  `oid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `status` enum('pending','shipped','out for delivery','delivered','cancelled') DEFAULT 'pending',
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `oid` int(11) NOT NULL,
  `amout` int(11) NOT NULL,
  `payment_type` enum('credit_card','debit_card','cash_on_delivery') NOT NULL,
  `card_no` int(11) DEFAULT NULL,
  `exdate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prescription_detail`
--

CREATE TABLE `prescription_detail` (
  `pre_id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `illeness` varchar(100) DEFAULT NULL,
  `mname` varchar(30) DEFAULT NULL,
  `dosage_schedule` varchar(100) DEFAULT NULL,
  `doctor_name` varchar(50) DEFAULT NULL,
  `hospital_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pid` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `pname` varchar(30) NOT NULL,
  `descript` varchar(50) NOT NULL,
  `illeness` varchar(100) DEFAULT NULL,
  `dosage_schedule` varchar(100) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pid`, `category_id`, `pname`, `descript`, `illeness`, `dosage_schedule`, `price`, `stock`, `image`) VALUES
(1, 2, 'Acetaminophen/Tylenol', 'Pain reliver and fever reduces. Applicable for Tee', 'Pain Relief, Fever', 'Adults: 325-1000mg every 4-6 hours. Max: 4000 mg/day. Children: Dose based on age and weight.', 50, 200, 'AcetaminophenTylenol.jpg'),
(2, 2, 'Acne/Acnestar Soap', 'Soap for acne treatment.', 'Acne', 'Use as directed on the product label for cleansing affected areas.', 100, 200, 'Acnestar Soap 75 gm.jpg'),
(3, 2, 'Adapalene/Adapalene gel', 'Topical gel for acne treatment.', 'Acne', 'Apply a thin film to affected areas once daily at bedtime.', 90, 200, 'Adapalene gel.jpg'),
(4, 4, 'Ibuprofen/Advil', 'Pain reliever and fever reducer, and anit-inflamma', 'Pain Relief, Fever, Inflammation', 'Adults: 200-400 mg every 4-6 hrs. Max: 1200 mg/day. Children: Dose based on age and weight.', 30, 200, 'Advil.jpg'),
(5, 5, 'Aloe Vera/Aloe Vera Ark', 'Soothes and moistrurizes skin.', 'Skin Soothing', 'Apply topically to affected areas as needed.', 60, 200, 'aloe_vera_ark.jpg'),
(6, 3, 'Amlodipine', 'Calcium channel blocker to treat high blood pressu', 'High Blood Pressure', 'Adult starting dose: 5-10 mg once daily. Dose may be adjusted as needed.', 80, 200, 'amlodipine.jpg'),
(7, 5, 'Blood Gulcose Monitoring', 'Blood glucose monitoring bluetooth device with dia', 'Diabetes', 'Use as directed by your healthcare provider and the device instructions.', 110, 200, 'Apollo Pharmacy Smart Blood Glucose Monitoring Bluetooth System with Diabetes.jpg'),
(8, 1, 'Aptivate/Aptivate Syrup', 'Cough syrup.', 'Cough', 'Adults: 2-4 teaspoons every 4-6 hrs. Children: Dose based on age and weight.', 150, 200, 'Aptivate Syrup, 450 ml.jpg'),
(9, 2, 'Ascoril/Ascoril LS Oral Drops', 'Cough expectorant.', 'Cough', 'Adults: 20-40 dropas every 4-6 hrs. Children: Dose based on age and weight.', 100, 200, 'Ascoril LS Oral Drops.jpg'),
(10, 3, 'Liver Care/Ayush Kalp Liver Ca', 'Herbal tea for liver support.', 'Liver Support.', 'Prepare and consume as per instructions on the product packaging.', 250, 300, 'Ayush Kalp Liver Care Herbal Tea, 60 gm.jpg'),
(11, 5, 'Bael/Baelprashan Drop.', 'Ayurvedic medicine for digestive health.', 'Digestive issues.', 'Adults: 1-2 teaspoons twice daily. Children: Dose based on age and weight.', 200, 200, 'baalprashan_drop.jpg'),
(12, 1, 'Baby Shampoo', 'Shampoo for babies', 'Hair and Scalp Care.', 'Use as needed for gentle hair cleansing.', 300, 300, 'Baby Shampoo.jpg'),
(13, 1, 'Baby Powder', 'Absorbs moisture and prevents skin irritation.', 'Diaper Rash, Skin Chafing.', 'Apply liberally to affected areas as needed.', 320, 300, 'baby_powder.jpg'),
(14, 3, 'Shaving Cream/Barbasol Shave C', 'Shaving cream for men.', 'Shaving', 'Apply to skin before shaving.', 300, 200, 'Barbasol Shave Cream.jpg'),
(15, 3, 'Shave Cream/Bbb Better Body Bo', 'Shaving cream for men.', 'Shaving', 'Apply to skin before shaving.', 250, 200, 'Bbb Better Body Bombay Blood Orange Eternal Youth Facial Serum.jpg'),
(16, 4, 'Dandruff Shampoo/Be Bodywise 1', 'Shampoo for treating dandruff.', 'Dandruff', 'Apply to wet hair, lather, and leave on for 5 minutes before rinsing.', 300, 200, 'Be Bodywise 1 Ketoconazole Dandruff Shampoo, 100 ml.jpg'),
(17, 4, 'Biotin/Bio-combination', 'Dietary supplement containing biotin.', 'Hair, Skin, Nails', 'Take as directed on the product label.', 400, 200, 'bio-combination.jpg'),
(18, 5, 'Blood Glucose Meter', 'Device for measuring blood sugar levels.', 'Diabetes', 'Use as directed by your healthcare provider and the device instructions.', 500, 200, 'Blood Glucose Meter.jpg'),
(19, 5, 'Blood Pressure Monitor', 'Device for measuring blood pressure.', 'Hypertension', 'Use as directed by your healthcare provider and the device instructioins.', 200, 200, 'Blood Pressure meter.jpg'),
(20, 5, 'Bone Health', 'Products for bone health support.', 'Bone Health', 'Take as directed on the product label.', 300, 200, 'Bone Health.jpg'),
(21, 3, 'Brain Booster/Brain Pro', 'Supplement for brain function.', 'Cognitive Enhancement.', 'As directed on the product.', 500, 200, 'brain_pro.jpg'),
(22, 2, 'Bug Spray/Bug Soother 32oz Spr', 'Insect repellent.', 'Insect repellent.', 'Apply liberally to expoxed skin as needed.', 100, 200, 'BugSoother32ozSpray_2000x.jpg'),
(23, 5, 'Calcium/Calcium Forte+ Tablet', 'Calcium supplement.', 'Calcium Deficiency.', 'Adults: 500-1000 mg daily. Children: Dose based on age and weight.', 100, 200, 'Calcimax Forte+ Tablet.jpg'),
(24, 1, 'Paracetamol/Calpol Pediatric D', 'Fever and pain reliever.', 'Fever, Pain.', 'Children: Dose based on age and weight.', 100, 200, 'Calpol Pediatric Drops.jpg'),
(25, 1, 'Carbamazepiine/Carbamazepine o', 'Anticonvulsant medication.', 'Epilepsy, Trigeminal Neuralgia', 'Adults: Strating dose 100-200 mg daily, increased gradually. Children: Dose based on age and weight.', 500, 200, 'carbamazepine oral suspension usp.jpg'),
(26, 2, 'Cetirizine/Cetirizine Syrup', 'Antihistamine for allergies.', 'Allergies.', 'Adults: 5-10 mg once or twice daily. Children: Dose based on age and weight.', 700, 200, 'Cetirizine syrup.jpg'),
(27, 3, 'Cilinidipine', 'Calcium channel blocker for high blood pressure.', 'Hypertension.', 'Adults: Starting dose 5-10 mg once daily, increased gradually.', 600, 200, 'cilnidipine.jpg'),
(28, 4, 'Cinnarizine/Cinnarizine mouth ', 'Antihistamine for vertigo and motion sickness.', 'Vertigo, Motion Sickness', 'Take as directed on the product label.', 500, 200, 'cinnarizine mouth dissolving.jpg'),
(29, 5, 'Collagen', 'Supplement for joint and skin health.', 'Joint Health, Skin Health.', 'Take as directed on the product label.', 500, 200, 'collagen.jpg'),
(30, 3, 'Confido', 'Ayurvedic medicine for male sexual health.', 'Erectile Dysfunction.', 'As directed on the product lable.', 150, 200, 'confido.jpg'),
(31, 3, 'Contraception', 'Contraceptive methods.', 'Pregnancy Prevention.', 'As directed by healthcare professional.', 150, 200, 'Contraception.jpg'),
(32, 2, 'Sunscreen/Coppertone Sport Sun', 'Sunscreen for sports and active lifestyles.', 'Sun Protection.', 'Apply liberally to exposed skin 15-20 minutes before sun exposure. Reapply every 2 hrs.', 100, 200, 'Coppertone Sport Sunscreen Spray.jpg'),
(33, 3, 'Cough and Cold', 'Medications for cough and cold symptoms.', 'Cough, Cold', 'Refer to product insert for specific symptoms and dosage.', 100, 200, 'CoughandCold.jpg'),
(34, 4, 'Creatine/Creatine Monohydrdate', 'Supplement for muscle growth and performance.', 'Muscle Growth.', 'Adults: 3-5 gms per day. Consult with a healthcare professional for personalized dosage.', 200, 200, 'Creaine MonoHydrate.jpg'),
(35, 4, 'Curcumin', 'Supplement with anti-inflammatory and antioxidant ', 'Inflammation, Antioxidant', 'Adults: 500-1500 mg daily. Consult with a healthcare professional.', 300, 200, 'curcumin.jpg'),
(36, 3, 'Dabur Arjuna/Dabur Arjuna for ', 'Ayurvedic medicine for heart health.', 'Heart Health.', 'As directed on the product lable.', 150, 200, 'Dabur Arjuna for Heart Health, 60 Tablets.jpg'),
(37, 3, 'Diabetes', 'Medications and lifestyle management for diabetes.', 'Diabetes.', 'As directed by healthcare professional.', 400, 200, 'Daibetes.jpg'),
(38, 2, 'Dodaorant/Deodorant Body odor', 'Deodorant to control body odor.', 'Body Odor.', 'Apply to underarms as needed.', 350, 200, 'Deodrant Body odor.jpg'),
(39, 3, 'Diabetes Care', 'Products for diabetes management.', 'Diabetes.', 'As directed by healthcare professional.', 400, 200, 'diabetes care.jpg'),
(40, 5, 'Digestive Health/Digene Acidit', 'Relieves indigestion, gas, and acidity.', 'Indigestion Gas.', 'Adults: 1-2 teaspoons after meals, Children: Dose based on age and weight.', 200, 200, 'Digene Acidity & Gas Relief Gel Mixed Fruit Flavour, 200 ml.jpg'),
(41, 2, 'Digital Thermometer', 'Measures body temperature.', 'Fever.', 'Follow device instructions for accurate temperature reading.', 100, 200, 'Digital_Thermometer_For_Fever.jpg'),
(42, 1, 'Diyappa/diyappa Appeizer Syrup', 'Syrup to improve appetite.', 'Appetite Stimulant.', 'Children: Dose based on age and weight.', 240, 200, 'dipya_appeizer_syrup.jpg'),
(43, 3, 'Dolo/Dolo 500 Tablet', 'Pain reliever and fever reducer.', 'Pain, Fever.', 'Adults: 500 mg every 4-6 hrs. Max: 4000 mg/day. children: Dose based on age and weight.', 20, 200, 'Dolo 500 Tablet.jpg'),
(44, 3, 'Duloflex', 'Muscle relaxant.', 'Muscle Relaxation.', 'Adults: 25-50 mg daily. Consult with a healthcare professional for personalized dosage.', 600, 200, 'ducloflex.jpg'),
(45, 4, 'Vitamin E/Evion 400 mg Strip O', 'Vitamin E supplement.', 'Antioxidant', 'Adults: 400 IU daily. Consult with a healthcare professional for personalized dosage.', 300, 200, 'Evion 400mg Strip Of 10 Capsules.jpg'),
(46, 2, 'Facewash', 'Cleaness the skin.', 'Skin Cleansing.', 'Use as directed on the product label.', 100, 200, 'facewash.jpg'),
(47, 5, 'Multivitamins/Fast and Up Vita', 'Multivamin supplement.', 'Vitamin Deficiency.', 'Adults: 1 sachedt per day. Consult with a healthcare professional for personalized dosage.', 250, 200, 'Fast&Up Vitalize Multivitamins Orange Flavour, 20 Effervescent Tablets.jpg'),
(48, 2, 'First Aid', 'Products for treating minor injuries.', 'Minor Injuries.', 'As needed for specific injuries (e.g., bandages for cuts, antiseptic for wounds)', 900, 200, 'First Aid.jpg'),
(49, 4, 'Folic Acid/Folvite Tablet', 'Vitamin B9 supplement.', 'Pregnancy Anemia.', 'Adults: 400-800 mcg daily. Consult with a healthcare professional for personalized dosage.', 200, 200, 'Folvite Tablet.jpg'),
(50, 1, 'FormulaD', 'Infant formula for feeding.', 'Infant Nutrition.', 'As directed on the product label.', 150, 200, 'formulaD.jpg'),
(51, 3, 'Pre-Shave Gel/Gillette Series ', 'Pre-shave gel for sensitive skin.', 'Shaving.', 'Apply to skin before shaving.', 150, 200, 'Gillette Series Sensitive Pre Shave Gel, 60 gm.jpg'),
(52, 4, 'Hair Care', 'Products for hair loss treatment.', 'Hari Loss', 'Varies depending on the cause. Consult with a dermatologist or healthcare professional for treatment', 400, 200, 'Hair Care.jpg'),
(53, 1, 'Hair Growth/Hair Growth Syrup', 'Supplements for promoting hair height growth', 'Height Growith.', 'Dosage varies depending on age and product. Consult with a pediatrician.', 300, 200, 'height_growth_syrup.jpg'),
(54, 4, 'Hair Loss ', 'Products for hair loss treatment.', 'Hair Loss', 'Varies depending on the cause. Consult with a dermatologist or healthcare professional for treatment', 400, 200, 'Hair Loss.jpg'),
(55, 1, 'Honey/Hone Cough Syrup', 'Honey based cough syrup.', 'Cough', 'Adults: 1-2 teaspoons every 4-6 hrs. Children: Dose based on age and weight.', 200, 200, 'honey_cough_syrup.jpg'),
(56, 1, 'Immunity/Himalaya Immusante, 2', 'Herbal supplement for immune support.', 'Immune Support.', 'Adults: 1-2 tablets daily, Children: Dose based on age and weight. Consult with a pediatrician.', 400, 200, 'Himalaya Immusante, 20 Tablets.jpg'),
(57, 1, 'Horlicks/Junior Horlicks Choco', 'Nutrittional drink for children.', 'Nutritional Supplement.', 'As directed on the product label.', 100, 200, 'Junior Horlicks Chocolate Flavour Nutrition Powder 500 gm Jar.jpg'),
(58, 1, 'Kids Body Powder', 'Absorbs moisture and prevents skin irriation.', 'Diaper Rash, Skin Chafing.', 'Apply liberally to affected areas as needed.', 30, 200, 'Kids Body Powder.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `uid` int(11) NOT NULL,
  `uname` varchar(30) DEFAULT NULL,
  `full_name` varchar(60) NOT NULL,
  `upass` varchar(20) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `email_id` varchar(20) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`uid`, `uname`, `full_name`, `upass`, `mobile`, `email_id`, `address`) VALUES
(1, 'Tirth Barot', 'Tirth Barot', 'user', 9313810977, 'tirth@gmail.com', 'A-15 Shubham Bunglows beside SVM school near Revaba Township');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD UNIQUE KEY `admin_id` (`admin_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `uid` (`uid`),
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`fid`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `order_history`
--
ALTER TABLE `order_history`
  ADD PRIMARY KEY (`oid`),
  ADD KEY `uid` (`uid`),
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payid`),
  ADD KEY `uid` (`uid`),
  ADD KEY `oid` (`oid`);

--
-- Indexes for table `prescription_detail`
--
ALTER TABLE `prescription_detail`
  ADD PRIMARY KEY (`pre_id`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `uname` (`uname`),
  ADD UNIQUE KEY `email_id` (`email_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_info`
--
ALTER TABLE `admin_info`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_history`
--
ALTER TABLE `order_history`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prescription_detail`
--
ALTER TABLE `prescription_detail`
  MODIFY `pre_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `registration` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`pid`) REFERENCES `product` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `registration` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_history`
--
ALTER TABLE `order_history`
  ADD CONSTRAINT `order_history_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `registration` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_history_ibfk_2` FOREIGN KEY (`pid`) REFERENCES `product` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `registration` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`oid`) REFERENCES `order_history` (`oid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prescription_detail`
--
ALTER TABLE `prescription_detail`
  ADD CONSTRAINT `prescription_detail_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `registration` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
