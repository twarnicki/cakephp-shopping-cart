/*
 Navicat Premium Data Transfer

 Source Server         : kende.com
 Source Server Type    : MySQL
 Source Server Version : 50528
 Source Host           : kende.com
 Source Database       : shop

 Target Server Type    : MySQL
 Target Server Version : 50528
 File Encoding         : utf-8

 Date: 12/02/2012 05:13:44 AM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `carts`
-- ----------------------------
DROP TABLE IF EXISTS `carts`;
CREATE TABLE `carts` (
  `id` char(36) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `sessionid` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_id` char(36) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `weight` decimal(6,2) DEFAULT NULL,
  `price` decimal(6,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `weight_total` decimal(6,2) DEFAULT NULL,
  `subtotal` decimal(6,2) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `order_items`
-- ----------------------------
DROP TABLE IF EXISTS `order_items`;
CREATE TABLE `order_items` (
  `id` char(36) COLLATE utf8_unicode_ci NOT NULL,
  `order_id` char(36) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` char(36) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `quantity` int(11) NOT NULL,
  `weight` decimal(8,2) unsigned NOT NULL DEFAULT '0.00',
  `price` decimal(8,2) unsigned NOT NULL,
  `subtotal` decimal(8,2) unsigned NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
--  Table structure for `orders`
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` char(36) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `billing_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `billing_address2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `billing_city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `billing_zip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `billing_state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `billing_country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `shipping_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `shipping_address2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `shipping_city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `shipping_zip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `shipping_state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `shipping_country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `weight` decimal(8,2) unsigned NOT NULL DEFAULT '0.00',
  `order_item_count` int(11) NOT NULL,
  `subtotal` decimal(8,2) NOT NULL,
  `tax` decimal(8,2) NOT NULL,
  `shipping` decimal(8,2) NOT NULL,
  `total` decimal(8,2) unsigned NOT NULL,
  `order_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `authorization` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `transaction` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
--  Table structure for `products`
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` char(36) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `weight` decimal(8,2) NOT NULL,
  `active` int(1) NOT NULL,
  `views` int(11) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`),
  KEY `modified` (`modified`),
  KEY `name_slug` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
--  Records of `products`
-- ----------------------------
BEGIN;
INSERT INTO `products` VALUES ('baf7d29c-2b09-11e2-8a48-f23c91934b7a', 'Street Bike 1', 'product1', 'description product 1', 'product1.jpg', '9.95', '1.00', '1', '14', '2011-10-12 04:04:08', '2012-12-02 04:20:31'), ('baf99ba0-2b09-11e2-8a48-f23c91934b7a', 'Specialized Epic S-Works 10', 'product10', 'description producy 10', '10.jpg', '99.99', '10.00', '0', '9', '2011-10-12 04:04:10', '2011-11-27 07:43:26'), ('baf99dd2-2b09-11e2-8a48-f23c91934b7a', 'Seattle 2', 'product2', 'description product 2', '2.jpg', '19.95', '2.00', '1', '9', '2011-10-12 04:04:08', '2011-11-28 15:49:29'), ('baf9a001-2b09-11e2-8a48-f23c91934b7a', 'Taxi 3', 'product3', 'description product 3', '3.jpg', '19.95', '3.00', '0', '9', '2011-10-12 04:04:10', '2011-11-28 00:50:07'), ('baf9a22d-2b09-11e2-8a48-f23c91934b7a', 'Specialized Langster 4', 'product4', 'description product 4', '4.jpg', '19.95', '4.00', '1', '8', '2011-10-12 04:04:10', '2011-11-27 13:08:33'), ('baf9a3f0-2b09-11e2-8a48-f23c91934b7a', 'Tokyo 5', 'product5', 'description product 5', '5.jpg', '19.95', '5.00', '1', '8', '2011-10-12 04:04:10', '2011-11-28 15:43:53'), ('baf9a5d0-2b09-11e2-8a48-f23c91934b7a', 'Hoffman Bikes Condor 6', 'product6', 'description product 6', '6.jpg', '49.95', '6.00', '1', '25', '2011-10-12 04:04:10', '2011-11-27 04:19:02'), ('baf9a7d8-2b09-11e2-8a48-f23c91934b7a', 'Specialized Carbon S-Works 7', 'product7', 'description product 7', '7.jpg', '19.95', '7.00', '1', '9', '2011-10-12 04:04:10', '2011-11-27 09:43:42'), ('baf9a9bb-2b09-11e2-8a48-f23c91934b7a', 'Mountain Bike 8', 'product8', 'description product 8', '8.jpg', '79.95', '8.00', '1', '9', '2011-10-12 04:04:10', '2011-11-27 12:05:26'), ('baf9abc4-2b09-11e2-8a48-f23c91934b7a', 'Allez 9', 'product9', 'description product 9', '9.jpg', '19.95', '9.00', '1', '8', '2011-10-12 04:04:10', '2011-11-28 00:50:03');
COMMIT;

-- ----------------------------
--  Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` char(36) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` int(1) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
--  Records of `users`
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES ('4e800ecf-b5bc-4fc6-b78f-67884317134f', 'admin', '6cfb5e7ba5fa202e923f45c534b87344440591e9', '1', '2011-09-26 00:34:07', '2011-09-26 00:34:07');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
