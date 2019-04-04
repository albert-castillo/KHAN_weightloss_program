CREATE DATABASE sadrockclimbingdatabase;
USE sadrockclimbingdatabase;


CREATE TABLE `products` (
  `productID` 		int(50) 		NOT NULL AUTO_INCREMENT,
  `manufacturer` 	varchar(50) 	NOT NULL,
  `listPrice` 		int(50) 		NOT NULL,
  `productCode` 	varchar(50) 	NOT NULL,
  `productDesc` 	TEXT 			NOT NULL,
  `productName` 	varchar(50) 	NOT NULL,
  `categoryID` 		varchar(50) 	NOT NULL,
  `discountPercent` int(50) 		NOT NULL,
  PRIMARY KEY (`productID`)
);



INSERT INTO `products`(`productID`, `manufacturer`, `listPrice`, `productCode`, `productDesc`, `productName`, `categoryID`,`discountPercent`) VALUES

(1, 'Black Diamond', 30, 'positron', 'Get this package of 3 multifunction, lightweight and compact keylock lockers. The Black Diamond Positron Screwgate Locking Carabiner has a low-profile, non-snagging nose thats easy to clip and clean.', 'Positron Screwgate Locking Carabiner - Package of 3', '3',''),
(2, 'Black Diamond', 10, 'rocklock', 'The largest belay and rappel locker from Black Diamond, the versatile RockLock Screwgate Carabiner features a keylock nose and is Munter Hitch compatible.', 'RockLock Screwgate Locking Carabiner', '3',''),
(3, 'Black Diamond', 5, 'neutrino', 'The burly and robust Black Diamond Neutrino wiregate carabiner that we all know and love has been redesigned with an I-beam cross-section.', 'Neutrino Wiregate Carabiner', '3',''),
(4, 'Petzl', 20, 'amd', 'The Petzl AMD Triact is an asymmetric (D-shaped) aluminum, autolocking carabiner thats best-suited for connecting a belay system or for holding equipment.', 'AMD Triact Autolocking Carabiner', '3',''),
(5, 'Metolius', 3, 'quicklink', 'The Metolius 10mm Quick Link carabiner is aggressively priced, making it a great leaver biner.', '10mm Quick Link Carabiner', '3',''),
(6, 'Petzl', 15, 'attache', 'Thanks to its compact shape and screw-lock locking system, the Petzl Attache 3D Screw-Lock Carabiner offers the versatility needed for anchoring, tying in and belaying on multipitch climbs.', 'Attache 3D Screw-Lock Carabiner', '3',''),
(7, 'Black Diamond', 150, 'nondry', 'Designed for heavy use and year-round climbing, the burly Black Diamond 9.9mm Non-Dry rope boasts a thick diameter for heavy use on varied climbs.', '9.9mmX 60mm Non-Dry Rope', '7',''),
(8, 'Edelrid', 160, 'boaeco', 'The Edelrid Boa Eco is a robust, all-round rope thats made of high-quality yarns left over from production, giving it a unique look but the same handling and strength as other Edelrid ropes.', 'Boa Eco 9.8mmX60mm Non-Dry Rope', '7',''),
(9, 'Mammut', 80, 'eternity', 'The Mammut Eternity Classic 9.8mm non-dry rope is light enough for moving fast on difficult routes, but also has enough durability to withstand frequent use.', 'Eternity Classic 9.8mmX60mm Non-Dry Rope', '7',''),
(10, 'Sterling', 140, 'evolution', 'If youre just getting into climbing or steadily moving through the ranks, the Sterling Evolution VR10 10.2mm x 60m dry rope is an easy choice with its durable, beefy core and 10.2mm diameter.', 'Evolution VR10 10.2mm x 60m Dry-Core Rope', '7',''),
(11, 'Maxim', 200, 'honnold', 'The Alex Honnold Signature Bi-Pattern Glider 9.9mm x 70m Dry Rope is a durable, light line with the supple feel Maxim ropes are known for, making it great for cragging and alpine rock climbing.', 'Alex Honnold Signature Bi-Pattern Glider 9.9mm x 60m Dry Rope', '7',''),
(12, 'Black Diamond', 20, 'mojo', 'The Black Diamond Mojo Zip Chalk Bag features a rear zippered pocket that holds small essentials like your keys, a route topo or a smartphone.', 'Mojo Zip Chalk Bag', '4',''),
(13, 'Black Diamond', 10, 'pure', 'Black Diamond Uncut White Gold Pure chalk is specifically blended for climbing to keep your hands dry when youre working through hard moves.', 'Uncut White Gold Pure Chalk Loose - 300 grams', '4',''),
(14, 'Metolius', 5, 'super', 'Keep the clouds of chalk dust to a minimum with the refillable Metolius Super Chalk Sock.', 'Refillable Super Chalk Sock', '4',''),
(15, 'Edelrid', 10, 'trifid', 'Love chalk-covered hands but hate chalk-covered gear? The Edelrid Trifit Twist chalk bag rescues you from unwanted spillage with a dustproof twist closure system that keeps your chalk safe and sound.', 'Trifid Twist Chalk Bag', '4',''),
(16, 'FrictionLabs', 20, 'gorilla', 'With texture that falls in between the super chunky Bam Bam blend and the fine Unicorn Dust blend, Gorilla Grip chalk features nuggets floating in fine white powder for superb grip on tough routes.', 'Gorilla Grip Chunky Chalk', '4',''),
(17, 'Black Diamond', 80, 'freewire', 'With 6 light and versatile FreeWire draws, the 12cm Black Diamond FreeWire Quickpack is ideal for the sport climber on a budget.', 'FreeWire Quickdraw Quickpack - 12cm', '6',''),
(18, 'Black Diamond', 100, 'positronq', 'The Black Diamond Positron Quickpack offers 6 versatile 12cm Positron quickdraw sets for multi-discipline, full keylock functionality.', 'Positron Quickdraw Quickpack - 12cm', '6',''),
(19, 'Black Diamond', 90, 'posiwireq', 'Black Diamond PosiWire Quickpack gives you 6 PosiWire 12cm quickdraws that combine smooth clipping and cleaning of a Positron carabiner with light weight, multipurpose function of a HotWire carabiner.', 'PosiWire Quickdraw Quickpack - 12cm', '6',''),
(20, 'C.A.M.P. USA', 70, 'orbit', 'Lightweight, reliable and available here in a 6-pack, the redesigned C.A.M.P. USA Orbit Wire Express KS quickdraw is a solid workhorse and entry-level quickdraw for all-around climbing.', 'Orbit Wire Express KS Quickdraws - Package of 6', '6',''),
(21, 'Black Diamond', 130, 'ozq', 'Get 6 of the lightest quickdraws from Black Diamond with the Oz Quickdraw Quickpack. The Oz features the snag-free functionality of HoodWire Technology, making it perfect for lightweight missions.', 'Oz Quickdraw Quickpack - 12cm - Package of 6', '6',''),
(22, 'SMC', 15, 'crx', 'One of the strongest and lightest pulleys available, the SMC CRx Crevasse Rescue pulley provides the mechanical advantage you need in the unlikely event you must haul your partner out of a crevasse.', 'CRx Crevasse Rescue Pulley', '5',''),
(23, 'Petzl', 120, 'microtraxion', 'Carry the lightweight, efficient Petzl Micro Traxion pulley on adventures that can require crevasse rescue, gear hauling and self-rescue.', 'Micro Traxion Pulley', '5',''),
(24, 'Petzl', 140, 'protraxion', 'With its large-diameter sheave and great efficiency, the Petzl Pro Traxion Pulley is ideal for hauling heavy loads. The integrated cam allows the rope to move through without slipping backwards.', 'Pro Traxion Pulley', '5',''),
(25, 'Black Diamond', 50, 'rotor', 'The Black Diamond Rotor Swivel helps you haul bags on your big wall climbs without tangling ropes.', 'Rotor Swivel', '5',''),
(26, 'Petzl', 60, 'swivel', 'This device comes in handy in hauling or rescue situtations in which rope twist might become a problem.', 'Swivel - Small', '5',''),
(27, 'Petzl', 100, 'grigri', 'The compact and lightweight GRIGRI 2 Belay Device with assisted braking delivers excellent control for top-rope climbing and lead climbing.', 'GRIGRI 2 Belay Device', '2',''),
(28, 'Black Diamond', 30, 'atcg', 'Updated with new colors, the versatile Black Diamond ATC-Guide belay device offers complete belay and rappel functions and can be used with a variety of rope sizes.', 'ATC-Guide Belay Device', '2',''),
(29, 'Black Diamond', 45, 'atcp', 'Adding a higher level of security to your belay, the lightweight Black Diamond ATC Pilot belay device lends easy rope payout, which is less tiring for belayers and more secure for climbers.', 'ATC Pilot Belay Device', '2',''),
(30, 'Mammut', 20, 'smart', 'Made for gym/sport climbing and climb-and-lower cragging, the Mammut Smart 2.0 geometry-assisted belay device adds security over a tube-style device, while remaining lightweight and easy to use.', 'Smart 2.0 Belay Device', '2',''),
(31, 'SMC', 5, 'rigging', 'The SMC Rigging/Descending ring is the strongest aluminum ring of its size and can be used in a number of ways while climbing.', 'Rigging/Descending Ring', '2',''),
(32, 'Black Diamond', 30, 'burrito', 'The big brother to the Black Diamond Little Burrito, the Full Rope Burrito manages your 70m rope, making it easy to shove into your pack without a mess.', 'Full Rope Burrito Rope Bag', '1',''),
(33, 'Metolius', 30, 'dirt', 'A popular rope bag with a large tarp and generous capacity, the Metolius Dirt Bag II rope bag is a lightweight option for toting your ropes to the rock.', 'Dirt Bag II Rope Bag', '1',''),
(34, 'Edelrid', 30, 'liner', 'Keep your rope tidy, easy to carry and protected from dust and dirt in the Edelrid liner rope bag. Its sized to accommodate ropes up to 80m long.', 'Liner Rope Bag', '1',''),
(35, 'Black Diamond', 60, 'gym', 'Specially designed to haul and organize your gym climbing gear, the Black Diamond Gym Solution 35 bag is the go-to for hard days on the plastic proj.', 'Gym Solution 35 Bag', '1','');



CREATE TABLE `categories` (
  `categoryID` 		int(50) 		NOT NULL AUTO_INCREMENT,
  `categoryName` 	varchar(50) 	NOT NULL,
  PRIMARY KEY (`categoryID`)
);

INSERT INTO `categories`(`categoryID`, `categoryName`) VALUES

(1, 'Bag'),
(2, 'Belay Rappel'),
(3, 'Carabiner'),
(4, 'Chalk'),
(5, 'Pulley'),
(6, 'Quickdraw'),
(7, 'Rope');

CREATE TABLE orders (
  `orderID`       			INT(50)        	NOT NULL   AUTO_INCREMENT,
  `customerID`     			INT(50)        	NOT NULL,
  `orderDate`      			DATETIME       	NOT NULL,
  `productID` 				int(50) 		NOT NULL,
  `quantity` 				int(50) 		NOT NULL,
  `listPrice` 				int(50) 		NOT NULL,
  `discountpercentage` 		int(50) 		NOT NULL,
  `lineitemnetprice` 		int(50) 		NOT NULL,
  PRIMARY KEY (orderID)
);

-- create the users and grant priveleges to those users
GRANT SELECT, INSERT, DELETE, UPDATE
ON sadrockclimbingdatabase.*
TO master_user@localhost
IDENTIFIED BY 'pa55word';

GRANT SELECT
ON products
TO master_tester@localhost
IDENTIFIED BY 'pa55word';

