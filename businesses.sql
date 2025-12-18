-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2025 at 04:55 PM
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
-- Database: `businesses`
--

-- --------------------------------------------------------

--
-- Table structure for table `businesses`
--

CREATE TABLE `businesses` (
  `Logo` text NOT NULL,
  `BusinessName` varchar(100) NOT NULL,
  `Address` varchar(150) NOT NULL,
  `Category` varchar(255) NOT NULL,
  `Menu` varchar(100) NOT NULL,
  `Price` varchar(100) NOT NULL,
  `BusinessDescription` text NOT NULL,
  `MAPLOCATION` text NOT NULL,
  `BusinessImage` text NOT NULL,
  `Contact` text NOT NULL,
  `Num` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `new_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `businesses`
--

INSERT INTO `businesses` (`Logo`, `BusinessName`, `Address`, `Category`, `Menu`, `Price`, `BusinessDescription`, `MAPLOCATION`, `BusinessImage`, `Contact`, `Num`, `email`, `new_id`) VALUES
('img/1763784887_yammy.jpg', 'Yammy Food-Day Cafe', '792 Requino St., Sampalucan, Brgy. Calvario, Meycauayan, Bulacan', 'Food & Beverages', 'Coffee, Milktea, Meal, & Snacks', '₱39-₱399', 'It’s food day, it’s a yummy day! All meals are made fresh upon order at Yammy Food-Day. Drinks and rice meals range from 39–399 pesos. Open from 9 a.m. to 2 a.m. You can find it at Sampalucan, Calvario, Meycauayan, Bulacan.', 'https://maps.app.goo.gl/Eg3j2UHY6Lvv2t4w6', 'business_img/Yammy Food-Day Cafe/17657264410yammy1.jpg,business_img/Yammy Food-Day Cafe/17657264411yammy2.jpg,business_img/Yammy Food-Day Cafe/17657264412yammy3.jpg,business_img/Yammy Food-Day Cafe/17657264413yammy4.jpg', 'https://www.facebook.com/share/1C3zCyLpbK/', '0910 990 4205', 'yammyfooddaycafe@gmail.com', 1),
('img/jjj.jpg', 'JJJ Variety Scrap Shop', '80 L. Sullera St., Brgy. Pandayan, Meycauayan, Bulacan', 'Services', 'Scrap', '₱1-₱4,000', 'JJJ Variety Scrap is a local business that focuses on collecting, buying, and recycling various scrap materials such as metal, plastic, and paper. Wherein their prices of buying and selling start at 1 peso to 400 pesos. Don’t hesitate to drop by if you’re thinking of selling or buying any crafts that can still be useful, only from 8:00 am to 5:00 pm.', 'https://maps.app.goo.gl/zCnuhPtrBq68EWWz6?g_st=ac', 'business_img/JJJ/JUNKSHOP_1.jpg,business_img/JJJ/JUNKSHOP_4.jpg,business_img/JJJ/JUNKSHOP_5.jpg,business_img/JJJ/JUNKSHOP_6.jgp,business_img/JJJ/JUNKSHOP_7.jpg', '', '0977 334 0958', '', 2),
('img/aj.jpg', 'AJ House of Buy 1 Take 1', '255 Marcos Era St., Brgy. Hulo, Meycauayan, Bulacan', 'Food & Beverages', 'Burger & Milktea', '₱23-₱170', 'Burgers and milk tea for 23–170 pesos. Don\'t miss the chance to sit, try, and eat at As House of Buy 1, Take 1 in Hulo, Meycauayan, Bulacan. Open 24 hours.', 'https://maps.app.goo.gl/1f3QcfG4skPSrQuR9?g_st=ac\n', 'business_img/AJ/AJ_1.jpg,business_img/AJ/AJ_4.jpg,business_img/AJ/AJ_5.jpg,,business_img/AJ/AJ_6.jpg,business_img/AJ/AJ_7.jpg,business_img/AJ/AJ_8.jpg,business_img/AJ/AJ_9.jpg', 'https://www.facebook.com/profile.php?id=61566299454395', '0905 028 8649', '', 3),
('img/jiens.jpg', 'Jien\'s Food Retailing Products', '23 Parian St., Brgy Poblacion, Meycauayan, Bulacan', 'Food & Beverages', 'Milktea, Soda, & Coffee powder', '₱100-₱900', 'A store that is full of drinks that are made with love, milk tea, sodas, coffee powder, and more, Jien’s takes pride in providing quality products that satisfy every craving while bringing comfort and happiness to customers. Her products start at 100 to 900 pesos. More than just a shop, it’s a place where good taste and warm service come together to create an enjoyable experience. Stores open from 7 am until 7 pm only!', 'https://maps.app.goo.gl/K1Z3FBHAkV6QJv157?g_st=ac\n', 'business_img/JIEN\'S FOOD/Cups_1.jpg,business_img/JIEN\'S FOOD/Cups_3.jpg,business_img/JIEN\'S FOOD/Cups_4.jpg', '', '0952 548 3995', '', 4),
('', 'Manukan Business', '03 Bayugo, Brgy. Bayugo, Meycauayan, Bulacan', 'Food', 'Chicken Neck, Full Fried Chicken', '₱10-₱180', 'Served fried, bite satisfied. A fried chicken stall that sells chicken neck and whole fried chicken for 10–180 pesos. It is open from 7 a.m. to 11 p.m. at Barangay Bayugo. The business hours are long enough for you to catch up!', 'https://maps.app.goo.gl/fiyjTqMM3dX1ouFG6?g_st=ac', 'business_img/MANUKAN/MANUKAN1.jpg,business_img/MANUKAN/MANUKAN2.jpg', '', '0992 043 6148', '', 5),
('img/jas.jpg', 'JasGrace Bakery', 'Sitio Asana, Brgy. Ubihan, Meycauayan, Bulacan', 'Food', 'Pastries', '₱3-₱15', 'Want sweet pastries? JasGrace Bakery got you! Stop by at Sitio Asana Brgy. Ubihan to get your sweets and flavorful meryenda. They open from 6AM to 9PM.', 'https://maps.app.goo.gl/NDUy6uDWD9NndVoVA', 'business_img/JASGRACE/bakery_1.jpg,business_img/JASGRACE/bakery_2.jpg', '', '0947 714 4082', '', 6),
('', 'Maming Gala', '84 Fortune Market Access Road Brgy. Malhacan, Meycauayan, Bulacan', 'Food', 'Mami, Rice, Egg, & Bread', '₱30', 'A delicious and tasty Mamihan who\'s using a little stall or a cart to sell his mami. They will be full from their serving, it is a lot from the serving of meats, rice, and soup. It is budget-friendly, especially for students or people who work but are hungry. They open from 8 am to 7 pm every day!', 'https://maps.app.goo.gl/2zva5989yo8KbEZt6', 'business_img/MAMING GALA/MAMIHAN_1.jpeg,business_img/MAMING GALA/MAMIHAN_2.jpeg', '', '', '', 7),
('img/june.jpg', 'June Pangan Fried Chicken', '46 Fortune Market Access Road, Brgy. Malhacan, Meycauayan, Bulacan', 'Food', 'Chicken', '₱13-₱210', 'Are you looking for a cheap place to buy fried chicken? Come here to June Panga Fried Chicken. Not only is it inexpensive, it\'s also affordable. Located in Malhacan, 46 Fortune Market.', 'https://maps.app.goo.gl/qJmFFGVqHmxiV4BL8', 'business_img/JUNEPANGAN/JUNE.jpg', '', '', '', 8),
('img/wakito.jpg', 'Wakito\'s Pizza & Milktea', '19 Zamora, 18 Legaspi St., Brgy. Zamora, Meycauayan, Bulacan', 'Food & Beverages', 'Pizza & Milktea', '₱29-₱499', 'Looking for cheap and affordable snacks for groups of friends or couples? Come here to Wakito\'s Pizza & Milktea located at 18 Legaspi St., Zamora. Open from 2pm to 8pm, Monday to Sunday.', 'https://maps.app.goo.gl/UXFwzPeiw51rTcnD6', 'business_img/WAKITO/wakito1.jpg,business_img/WAKITO/wakito2.jpg', 'https://www.facebook.com/profile.php?id=61574041606741', '0936 906 1268', 'carloliver1313@gmail.com', 9),
('img/smile.jpg', 'Smile PC Computer Parts and Accessories', '221 Saluysoy Rd., 255 Everlasting St., Brgy. Saluysoy, Meycauayan, Bulacan', 'Accessories & Services', 'Computer Parts, & Printing Service', '₱3-₱40,000', 'Want to build your dream computer? Assemble with your desired computer parts!  What are you waiting for? Come to Smile PC Computer Parts and Accessories, where you\'ll find all brand-new items at a desirable price! They also provide printing services1 Located at 221 Saluysoy Rd., 225 Everlasting St., in front of PureGold Mini Mart.', 'https://maps.app.goo.gl/DUbFTxSPuyPdN71r5', 'business_img/SMILE/smile1.jpg,business_img/SMILE/smile2.jpg,business_img/SMILE/smile3.jpg', 'https://www.facebook.com/SmileGarriel', '0926 308 7283', ' smilepcparts@gmail.com', 10),
('img/frankie.jpg', 'Frankie\'s Inasal & Lechon Belly', '169 Everlasting St. Brgy. Saluysoy Meycauayan Bulacan', 'Food & Beverages', 'Inasal, Lechon Belly, Sisig, etc..', '₱70-₱149', 'Looking for a delicious place to eat at a cheap price? Come here to Frankie\'s Inasal at Lechon Belly. Truly worth it, affordable, and you\'ll be full. Located at 169 Everlasting, Saluysoy, Meycauayan, Bulacan.', 'https://maps.app.goo.gl/j1rBWZgmq5BW1UEr6', 'business_img/FRANKIE/1.jpg,business_img/FRANKIE/2.jpg,business_img/FRANKIE/3.jpg,business_img/FRANKIE/4.jpg', 'https://www.facebook.com/profile.php?id=61573604773068', '0968 327 5716 ', ' frankiesinasalatlechonbelly@gmail.com', 11),
('img/ashiana.jpg', 'Ashiana Salon and Spa', '143 Saluysoy Rd., Everlasting St., Brgy. Saluysoy, Meycauayan, Bulacan', 'Services', 'Hairstyling, Massage Therapy, & Nails', '₱500-₱2,000', 'Offers a smooth service that can make you beautiful within a day. You can go and make yourself feel more confident every day. If you are stressed, you can relax here while massaging your hands or even your feet. They are open at 10 am and closed at 7 pm.', 'https://maps.app.goo.gl/NyZAM4B9CeNHXM2y7?g_st=ac', 'business_img/ASHIANA SALON/ASHIANA_1.jpg,business_img/ASHIANA SALON/ASHIANA_2.jpg,business_img/ASHIANA SALON/ASHIANA_3.jpg', 'https://www.facebook.com/ashiana.spa', '0945 368 0745', 'spasalon2025@gmail.com', 12),
('', 'Aqua Mega Water Station', '01 Zamora, Poblacion Town Center, Brgy. Zamora, Meycauayan, Bulacan', 'Services', 'Mineral Water', '₱25', 'The Aqua Mega Water Station, the water that can prevent your thirst. It brings you energy when you drink their water. It is fresh and clean, so it is safe when you drink their water. You can trust them by looking at their station while working. They are open from 8:00 am to 5:00 pm.', 'https://maps.app.goo.gl/WyPh4EgqBTaMAohb9?g_st=ac', 'business_img/0/17657263250water1.jpg,business_img/0/17657263251water2.jpg', '', '', '', 13),
('img/jheff.jpg', 'Jheff\'s Fam Fried Chicken House', '01 Zamora, Brgy. Zamora, Meycauayan, Bulacan', 'Food', 'Chicken', '₱12-₱230', 'Are you hungry? Are you craving chicken? You should go to Jheff\'s Fam Fried Chicken House, they are selling the best fried chicken in town. Their shop is very clean and they also give you an affordable price, which is really student-friendly. So you guys can buy it even when you\'re craving it, so what are you waiting for? Buy now!', 'https://maps.app.goo.gl/hNNRqjkks1efmNPC6\n', 'business_img/JHEFF\'S FAM-CHICKEN/JHEFF\'S_1.jpg,business_img/JHEFF\'S FAM-CHICKEN/JHEFF\'S_2.jpg', 'https://www.facebook.com/profile.php?id=100064030267491', '', '', 14),
('img/project.jpg', 'Project Animalandia Pet Supplies', '62 Gov Licaros Ave, 045 Gallego Bldg, Hulo-Banga Rd., Rd.Brgy. Poblacion, Meycauayan Bulacan', 'Feeds & Accessories', 'Animal Feeds', '₱70-₱290', 'Looking for an affordable place to buy pet supplies and accessories for your babies? Come here to Project Animalandia Pet Supplies and Accessories Trading. Truly cheap and trusted supplies and accessories. Located at 045 Gallego Bldg., Poblacion, Meycauayan.', 'https://maps.app.goo.gl/qoq3rLHy8XXBrCuo8', 'business_img/PROJECT/PROJECT_5.jpg,business_img/PROJECT/PROJECT_1.jpg,business_img/PROJECT/PROJECT_2.jpg,business_img/PROJECT/PROJECT_3.jpg,business_img/PROJECT/PROJECT_4.jpg', 'https://www.facebook.com/projectanimalandia', '0935 503 4228', 'projectanimalandia@gmail.com', 15),
('', 'Felice\'s Doormat Basahan', '62 Gov Licaros Ave, Brgy. Poblacion, Meycauayan, Bulacan', 'Crafts & Accessories', 'Basahan', '₱10-₱100', 'At 80 years old, Lola Felice continues to inspire her community through her small but meaningful business of selling doormats, or basahan. Despite her age, Lola Felice\'s dedication, patience, and love for her craft show that hard work knows no limits. Her doormat prices start at 10 pesos to 100 pesos only. Drop by Lola Felice’s store and grab yours only from 6:00 am to 5:00 pm!\r\n', 'https://maps.app.goo.gl/9su2esCXrygBKn139?g_st=ac', 'business_img/1765725380_0_DOORMAT_1.jpg,business_img/1765725380_1_DOORMAT_2.jpg', '', '', '', 16),
('img/mike.jpg', 'Mike\'s Shoe & Bag', '03 Gen Pacheco St., Brgy. Calvario, Meycauayan, Bulacan', 'Services', 'Shoe & Bag', '₱50-₱500', 'Don’t throw it away when Mike Shoe & Bag can bring it back to life!\nFrom worn-out shoes to torn bags, they offer quality repairs at affordable prices ranging from ₱50 to ₱500. Reliable, skilled, and quick, they’ll have your items looking good as new. Drop by and let your items shine again at Gen. Pacheco Street, Meycauayan, 3023 Bulacan, near Sinag Pawnshop, open from 8:30 am to 7:30 pm.', 'https://maps.app.goo.gl/Egm7SYNBL39ubKUy7', 'business_img/MIKE\'S SHOES&KEY DUPLICATE/MIKE\'S_2.jpg,business_img/MIKE\'S SHOES&KEY DUPLICATE/MIKE\'S_1.jpg,business_img/MIKE\'S SHOES&KEY DUPLICATE/MIKE\'S_3.jpg', '', '', '', 17),
('', 'Rammart Abalos PARES', '96 Gasak, Northville 3, Brgy. Bayugo, Meycauayan, Bulacan', 'Food', 'Pares, Itlog & Mami', '₱30', 'Rammart Pares is a food spot that serves flavorful and affordable Filipino comfort food, especially its signature beef pares—known for its meat, rich soup, and perfectly paired rice. Rammart Pares has become a go-to place for students, workers, and families who crave a satisfying meal any time of the day. Rammart Pares continues to capture the taste and heart of its loyal customers. It proves that good food doesn’t have to be expensive to make people happy. He only sells from 7:00 am to 5:00 pm.', 'https://maps.app.goo.gl/jH9A2yCyg2nwAePT9?g_st=ac\n', 'business_img/PARES/pares_1.jpg,business_img/PARES/pares_2.jpg', 'https://www.facebook.com/raymartteo.abalos', '0916 955 3963', '', 18),
('img/pedoks.jpg', 'Pedok\'s Barber Shop', 'Estrano St., Blanco Bldg, Brgy. Bancal, Meycauayan, Bulacan', 'Services', 'Haircut Services', '₱80', 'Stay sharp and confident with a fresh cut from Pedok’s Barbershop! A place to go for clean, stylish, and affordable haircuts at just ₱80. Enjoy a clean, comfortable atmosphere and walk out looking your best. Level up your look at Estrano, Blanco Building, Bancal, Meycauayan, open from 9 am to 8 pm.\n', 'https://maps.app.goo.gl/ZYbDVzvo7Eqaai477', 'business_img/PEDOKS/Pedoks_2.jpg,business_img/PEDOKS/Pedoks_4.jpg', 'https://www.facebook.com/profile.php?id=61560741369759', '', '', 19),
('img/mytee.jpg', '98 Liquors and Prints', '407 Bantayan St., Brgy. Banga, Meycauayan, Bulacan', 'Services', 'Printing Services', '₱5-₱400', 'A convenient and student-friendly business where you print all the paperwork that you need. They also have shirt printing! You can print here some of your requirements needed, especially for school purposes, like paper for practical research, images, and more. They open from 9 am to 6 pm.', 'https://maps.app.goo.gl/TXTqJaSjqKZhU7cY9', 'business_img/PRINT SHOP/Print_1.jpg,business_img/PRINT SHOP/Print_2.jpg,business_img/PRINT SHOP/Print_3.jpg', 'https://www.facebook.com/profile.php?id=61578261114929#', '0951 718 8199', 'mytee.cp@gmail.com', 20),
('', 'Maulon\'s Bukohan', '274 Fortune Market Access Road, Brgy. Malhacan, Meycauayan, Bulacan', 'Food & Beverages', 'Buko', '₱10-₱25', 'Hot day? No worries, refresh yourself with the pure taste of Maulon’s Bukohan! Enjoy freshly opened buko for only ₱45 per piece, packed with natural sweetness and hydration straight from the coconut, served fresh and ready to cool you down. Keep calm and drink buko at 274 Malhacan Rd, Fortune Market, open from 7 am to 7 pm.', 'https://maps.app.goo.gl/YihBnhqLvF3sikbdA', 'business_img/BUKO/Buko_1.jpeg,business_img/BUKO/Buko_2.jpg', '', '', '', 21),
('', 'Aling Sol Sari Sari Store', 'Diez St., Brgy. Malhacan, Meycauayan, Bulacan', 'Food & Beverages', 'Food, Condiments, Drinks, Spices, & Tube Ice', '₱3-₱120', 'Aling Sol’s Sari-Sari Store is a small, lively neighborhood shop that serves as a convenient place for the community to buy their daily needs. From snacks, drinks, and canned goods to household items, the store offers a little bit of everything. More than just a business, it has become a friendly meeting spot where people exchange stories, laughter, and news. You can buy your basic needs at Aling Sol’s sari-sari store from 7:00 am to 9:00 pm only!', 'https://maps.app.goo.gl/VMgoUgkv7QTCDQZo9?g_st=ac', 'business_img/SARISARISTORE/SARISARI_1.jpeg', '', '', '', 22),
('', 'Florence Modiste Supply', '46 Gov Licaros Ave, Brgy. Poblacion, Meycauayan, Bulacan', 'Crafts & Accessories', 'Tailoring Supply', '₱1-₱150', 'Here lies tailoring supplies at Florence Modiste Supply. Price ranging from 1-150 pesos only. Fabric styles, designs, textures, and all are here! Come stop by at 46 Gov Licaros Ave, Brgy. Poblacion. They open from 8AM to 5PM.', 'https://maps.app.goo.gl/oYy2Ju899MQ8PDRr5', 'business_img/1765725269_0_FLO1.jpg,business_img/1765725269_1_FLO2.jpg,business_img/1765725269_2_FLO3.jpg,business_img/1765725269_3_FLO4.jpg', '', '', '', 23),
('img/shiotime.jpg', 'Eat\'s Time to Shio!\n', '24 General Pacheco St., Brgy. Calvario, Meycauayan, Bulacan', 'Food & Beverages', 'Siomai & Gulaman', '₱15-₱50', 'Hungry? Don’t wait, as Eat’s Time To Shio is the place to be! Grab 3pcs of tasty siomai for only ₱15 and cool down with a black gulaman for ₱10. Perfect for a quick snack or light meal, this local favorite brings flavor and satisfaction in every bite. Come hungry, leave happy, find them at St. Meycauayan, Calvario. They are open from 8 am to 8 pm.', 'https://maps.app.goo.gl/43aXkEaX4JU27uxJ6', 'business_img/SIOMAI/SIOMAI_1.jpg,business_img/SIOMAI/SIOMAI_2.jpg', 'https://www.facebook.com/profile.php?id=100092989676854', ' 0938 605 6543', 'Reverceofjungkook@gmail.com', 24),
('img/three.jpg', 'Three Angel\'s Ihaw-Ihaw', 'Sitio Asana, Brgy. Ubihan, Meycauayan, Bulacan', 'Food & Beverages', 'BBQ, Isaw, Betamax, etc', '₱5-₱20', 'Come get your favorite barbeque at Three Angel\'s Ihaw-Ihaw! They grill your usual ihaw-ihaw that ranges for only 5-20 pesos. Located at Sitio Asana Brgy. Ubihan. They open from 6PM to 9PM. ', 'https://maps.app.goo.gl/ifCYjcWJUdqn8AxJ9?g_st=ac', 'business_img/THREE/three angels_1.jpg,business_img/THREE/three angels_4.jpg', '', '', '', 25),
('img/happy.jpg', 'Happy Bubbles Laundry Hub', '02 J. Legaspi St., Brgy. Zamora, Meycauayan, Bulacan', 'Services', 'Laundry', '₱70-₱215', 'Wash, wash, wash! A laundry shop that you can find at Zamora, Legazpi St., cleans your clothes the best with bubbles that create happiness! Open from 7 a.m. to 7 p.m.', 'https://maps.app.goo.gl/aSZSr8F7ZjsRrye98', 'business_img/LAUNDRY/LAUNDRY_1.jpg,business_img/LAUNDRY/LAUNDRY_2.jpg,business_img/LAUNDRY/LAUNDRY_3.jpg', 'https://www.facebook.com/HappyBubblesLaundryHubMeycauayan', '0927 853 9665', '', 26),
('img/ramsey.jpg', 'Ramsey KTW Boogie Boogie Ukay-Ukay', '860 R-9, Aliw Complex, Brgy. Calvario, Meycauayan, Bulacan', 'Clothes & Accessories', 'Clothes & Accessories', '₱25-₱680', 'A thrift shop where you can find the fashion that you seek. Go on and pick the clothes that make up the best OOTD for you at Calvario, Meycauayan, Bulacan. Open from 8:30 a.m. to 8:30 p.m.', 'https://maps.app.goo.gl/hTw87ZyDd2LQxUVc9', 'business_img/UKAY2/UKAY-UKAY_1.jpg,business_img/UKAY2/UKAY-UKAY_2.jpg,business_img/UKAY2/business_img/UKAY2/UKAY-UKAY_3.jpg,business_img/UKAY2/UKAY-UKAY_4.jpg', '', '', '', 27),
('img/janjan.jpg', 'JanJan Lang Pastil', '44 General Pacheco St., Brgy. Calvario, Meycauayan, Bulacan', 'Food & Beverages', 'Pastil & Lemonade', '₱29-₱49', 'A pastil stall that offers pastil with rice and a buy 1, take 1 promo at Calvario, General Pacheco Street! Just 49 pesos for buy 1, take 1, and 29 pesos for a single order. Open from Sunday to Friday, 8 a.m. to 8 p.m.\r\n', 'https://maps.app.goo.gl/ifCYjcWJUdqn8AxJ9?g_st=ac', 'business_img\\PASTIL\\PASTIL_1.jpg,business_img\\PASTIL\\PASTIL_2.jpg', 'https://www.facebook.com/share/1JAKM1vQUx/', '0908 197 9811', '', 28);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `businesses`
--
ALTER TABLE `businesses`
  ADD PRIMARY KEY (`new_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `businesses`
--
ALTER TABLE `businesses`
  MODIFY `new_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
